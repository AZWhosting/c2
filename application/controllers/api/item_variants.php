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

	function test_get(){
		$traits = array(
			"00" => array("Red","Blue"),
			"11" => array("S","M","L")
		);

		$permutations = $this->permutations($traits);

		$items = [];
		for ($i=0; $i < count($permutations); $i++) { 
			foreach ($permutations[$i] as $value) {
				$items[] = $value;
			}
		}

		$data["traits"] = $traits;
		$data["permutations"] = $permutations;
		$data["items"] = $items;

		$this->response($data, 201);
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

	//POST
	function index_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		
		$traits = []; $item_id = 0;
		foreach ($models as $value) {
			$obj = new Item_variant(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			//Variants
			$variants = [];			
			if(isset($value->variants)){
				foreach ($value->variants as $v) {
					array_push($variants, $v->id);					
				}
			}
			$item_id = $value->item_id;
			$traits[$value->variant_attribute_id] = $variants;

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

		//Permutations
		$permutations = [];
		if(count($traits)>1){
			$permutations = $this->permutations($traits);
		}else{
			$permutations = $variants;
		}

		$items = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$items->get_by_id($item_id);

		for ($i=0; $i < count($permutations); $i++) {

			$subItems = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
			$subItems->item_type_id 		= $items->item_type_id;
  			$subItems->category_id 			= $items->category_id;
  			$subItems->item_group_id 		= $items->item_group_id;
  			$subItems->brand_id 			= $items->brand_id;
  			$subItems->sub_of_id 			= $items->id;
  			$subItems->measurement_id		= $items->measurement_id;
  			$subItems->abbr 				= $items->abbr;
  			$subItems->number 				= $items->number;
  			$subItems->name 				= $items->name;
  			$subItems->purchase_description	= $items->purchase_description;
  			$subItems->sale_description		= $items->sale_description;
  			$subItems->cost 				= $items->cost;
  			$subItems->price 				= $items->price;
  			$subItems->locale 				= $items->locale;
  			$subItems->order_point 			= $items->order_point;
  			$subItems->income_account_id 	= $items->income_account_id;
  			$subItems->expense_account_id  	= $items->expense_account_id;
  			$subItems->inventory_account_id = $items->inventory_account_id;
  			$subItems->image_url 			= $items->image_url;
  			$subItems->tags 				= $items->tags;
  			$subItems->nature 				= "variant";
  			$subItems->is_pattern 			= $items->is_pattern;
  			$subItems->status 				= $items->status;
  			$subItems->deleted 				= $items->deleted;

  			if($subItems->save()){
				foreach ($permutations[$i] as $value) {
					$attributeValues = new Attribute_value(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$attributeValues->get_by_id($value);
					$attributeValues->save($subItems);
				}
			}
		}

		$data["traits"] = $traits;
		$data["permutations"] = $permutations;
		
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

	//PERMUTATION
	function permutaion_post(){
		$models 			= json_decode($this->post('models'));
		$data["results"] 	= [];
		$data["count"] 		= 0;

		//Filter
		$traits = [];
		foreach ($models as $value) {
			//Variants
			$variants = [];			
			if(isset($value->variants)){
				foreach ($value->variants as $v) {
					array_push($variants, $v->id);					
				}
			}
			$traits[$value->variant_attribute_id] = $variants;
		}

		//Permutations
		$permutations = [];
		if(count($traits)>1){
			$permutations = $this->permutations($traits);
		}else{
			$permutations = $variants;
		}

		$data["results"] = $permutations;

		$this->response($data, 200);
	}

	//PERMUTATIONS
	public function permutations(array $array, $inb=false){
		switch (count($array)) {
			case 1:
				// Return the array as-is; returning the first item
				// of the array was confusing and unnecessary
				return $array[0];
				break;
			case 0:
				throw new InvalidArgumentException('Requires at least one array');
				break;
		}

		// We 'll need these, as array_shift destroys them
		$keys = array_keys($array);

		$a = array_shift($array);
		$k = array_shift($keys); // Get the key that $a had
		$b = $this->permutations($array, 'recursing');

		$return = array();
		foreach ($a as $v) {
			if($v){
				foreach ($b as $v2) {
					// array($k => $v) re-associates $v (each item in $a)
					// with the key that $a originally had
					// array_combine re-associates each item in $v2 with
					// the corresponding key it had in the original array
					// Also, using operator+ instead of array_merge
					// allows us to not lose the keys once more
					if (!is_array($v2)) $v2 = array($v2);
					if($inb == 'recursing') $return[] = array_merge(array($v), (array) $v2);
					else $return[] = array($k => $v) + array_combine($keys, $v2);
				}
			}
		}

		return $return;
	}
}