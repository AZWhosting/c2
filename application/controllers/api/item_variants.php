<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Item_variants extends REST_Controller {
	public $_database;
	public $server_host;
	public $server_user;
	public $server_pwd;
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		$institute = new Institute();
		$institute->where('id', $this->input->get_request_header('Institute'))->get();
		if($institute->exists()) {
			$conn = $institute->connection->get();
			$this->server_host = $conn->server_name;
			$this->server_user = $conn->username;
			$this->server_pwd = $conn->password;	
			$this->_database = $conn->inst_database;
		}
	}


	//GET 
	function index_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		
		$obj = new Item_variant(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				if(isset($value['operator'])){
					$obj->{$value['operator']}($value["field"], $value["dir"]);
				}else{
					$obj->order_by($value["field"], $value["dir"]);
				}
			}
		}
		
		//Filter		
		if(!empty($filter["filters"]) && isset($filter["filters"])){
	    	foreach ($filter['filters'] as $value) {
	    		if(isset($value['operator'])) {
	    			if($value['operator']=="startswith"){
	    				$obj->like($value['field'], $value['value'], 'after');
	    			}else if($value['operator']=="contains"){
	    				$obj->like($value['field'], $value['value'], 'both');
	    			}else{
						$obj->{$value['operator']}($value['field'], $value['value']);
	    			}
				}  else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}
		
		//Results
		if($page && $limit){
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
		}else{
			$obj->get_iterated();
			$data["count"] = $obj->result_count();
		}

		if($obj->exists()){
			foreach ($obj as $value) {
				$variantAttributes = new Attribute_value(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$variantAttributes->where_in("id", explode(",",$value->variants));

				$data["results"][] = array(
					"id" 					=> $value->id,
					"item_id" 				=> $value->item_id,
					"variant_attribute_id" 	=> $value->variant_attribute_id,
					"variants" 				=> $variantAttributes->get_raw()->result(),
					"variant_attribute" 	=> $value->variant_attribute->get_raw()->result()[0]
				);
			}
		}

		//Response Data		
		$this->response($data, 200);	
	}

	function test_get(){
		$raw = array(
			"color" => ["Red","Blue"],
			"size" => ["S","M","L"]
		);

		// $colors = array("Red","Blue");
		// $sizes = array("S","M","L");

		// $items = [];
		// foreach ($colors as $key => $value) {
		// 	foreach ($sizes as $k => $v) {
		// 		$items[$value][] = $v;
		// 	}
		// }

		// $final = [];
		// foreach ($items as $key => $value) {
		// 	foreach ($value as $k => $v) {
		// 		$final[] = array($key,$v);
		// 	}
		// }

		$variants = [];
		foreach ($raw as $key => $value) {
			$variants[$key] = $value;
		}

		$items = [];
		foreach ($variants as $key => $value) {
			foreach ($value as $ke => $val) {
				$items[] = $val;				
				// foreach ($val as $k => $v) {
				// 	$items[] = $v;
				// }
			}
		}

		// $final = [];
		// foreach ($items as $key => $value) {
		// 	foreach ($value as $k => $v) {
		// 		$final[] = array($key,$v);
		// 	}
		// }
		
		$data["results"] = $items;

		$this->response($data, 201);
	}

	//POST
	function index_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		
		foreach ($models as $value) {
			$obj = new Item_variant(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			//Variants
			$variants = [];
			if(isset($value->variants)){
				foreach ($value->variants as $v) {
					array_push($variants, $v->id);
				}
			}

			isset($value->item_id) 				? $obj->item_id 				= $value->item_id : "";
			isset($value->variant_attribute_id) ? $obj->variant_attribute_id 	= $value->variant_attribute_id : "";
			$obj->variants = implode(",",$variants);

	   		if($obj->save()){
	   			//Variants
	   			$items = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$items->get_by_id($obj->item_id);
				foreach ($variants as $v) {
					$attributeValues = new Attribute_value(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$attributeValues->get_by_id($v);
					$items->save($attributeValues);
				}

			   	$data["results"][] = array(
			   		"id" 					=> $obj->id,
					"item_id" 				=> $obj->item_id,
					"variant_attribute_id" 	=> $obj->variant_attribute_id,
					"variants" 				=> isset($value->variants) ? $value->variants : [],
					"variant_attribute" 	=> isset($value->variant_attribute) ? $value->variant_attribute : []
			   	);
		    }	
		}
		
		$data["count"] = count($data["results"]);
		$this->response($data, 201);		
	}
	
	//PUT
	function index_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {			
			$obj = new Item_variant(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			//Variants
			$variants = [];
			if(isset($value->variants)){
				foreach ($value->variants as $v) {
					array_push($variants, $v->id);
				}
			}

			// $existingVariants = explode(",",$obj->variants);
			// foreach ($variants as $v) {
			// 	if (in_array($v, $existingVariants)){

			// 	}else{

			// 	}
			// }

			isset($value->item_id) 				? $obj->item_id 				= $value->item_id : "";
			isset($value->variant_attribute_id) ? $obj->variant_attribute_id 	= $value->variant_attribute_id : "";
			$obj->variants = implode(",",$variants);

			if($obj->save()){				
				//Results
				$data["results"][] = array(
					"id" 					=> $obj->id,
					"item_id" 				=> $obj->item_id,
					"variant_attribute_id" 	=> $obj->variant_attribute_id,
					"variants" 				=> isset($value->variants) ? $value->variants : [],
					"variant_attribute" 	=> isset($value->variant_attribute) ? $value->variant_attribute : []
				);						
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}
	
	//DELETE
	function index_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Item_variant(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);							
		}

		//Response data
		$this->response($data, 200);
	}
}