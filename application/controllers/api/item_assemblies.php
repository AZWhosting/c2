<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Item_assemblies extends REST_Controller {
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

		$obj = new Item_assembly(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
		if(!empty($filter['filters']) && isset($filter['filters'])){
	    	foreach ($filter['filters'] as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
					$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->include_related("item", array("item_type_id","abbr","number","name","cost","price","locale","income_account_id","expense_account_id","inventory_account_id","nature"));
		$obj->include_related("measurement", array("name"));

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
				//Item
				$item = array(
					"id" 					=> $value->item_id,
					"item_type_id" 			=> $value->item_item_type_id,
					"abbr"					=> $value->item_abbr, 
					"number" 				=> $value->item_number, 
					"name" 					=> $value->item_name,
					"cost"					=> $value->item_cost,
					"price"					=> $value->item_price,
					"locale"				=> $value->item_locale,
					"income_account_id"		=> $value->item_income_account_id, 
					"expense_account_id" 	=> $value->item_expense_account_id, 
					"inventory_account_id" 	=> $value->item_inventory_account_id
				);
				
				//Measurement
				$measurement = array(
					"measurement_id" 	=> $value->measurement_id,
					"measurement"		=> $value->measurement_name ? $value->measurement_name : ""
				);

				//Results				
				$data["results"][] = array(
					"id" 				=> $value->id,					
					"assembly_id" 		=> $value->assembly_id,
					"item_id" 			=> $value->item_id,
					"quantity" 			=> $value->quantity,
					"measurement_id"	=> $value->measurement_id,

					"item" 				=> $item,
					"measurement" 		=> $measurement
				);
			}
		}

		//Response Data		
		$this->response($data, 200);		
	}
	
	//POST
	function index_post() {
		$models = json_decode($this->post('models'));

		foreach ($models as $value) {
			$obj = new Item_assembly(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
			
			isset($value->assembly_id) 		? $obj->assembly_id 	= $value->assembly_id : "";
			isset($value->item_id) 			? $obj->item_id 		= $value->item_id : "";
			isset($value->quantity) 		? $obj->quantity 		= $value->quantity : "";
			isset($value->measurement_id) 	? $obj->measurement_id 	= $value->measurement_id : "";
						
			if($obj->save()){
				$data["results"][] = array(
					"id" 				=> $obj->id,					
					"assembly_id" 		=> $obj->assembly_id,
					"item_id" 			=> $obj->item_id,
					"quantity" 			=> $obj->quantity,
					"measurement_id"	=> $obj->measurement_id
				);
			}
		}
		$data["count"] = count($data["results"]);
		
		$this->response($data, 201);						
	}

	//PUT
	function index_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;

		foreach ($models as $value) {			
			$obj = new Item_assembly(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			isset($value->assembly_id) 		? $obj->assembly_id 	= $value->assembly_id : "";
			isset($value->item_id) 			? $obj->item_id 		= $value->item_id : "";
			isset($value->quantity) 		? $obj->quantity 		= $value->quantity : "";
			isset($value->measurement_id) 	? $obj->measurement_id 	= $value->measurement_id : "";

			if($obj->save()){				
				$data["results"][] = array(
					"id" 				=> $obj->id,					
					"assembly_id" 		=> $obj->assembly_id,
					"item_id" 			=> $obj->item_id,
					"quantity" 			=> $obj->quantity,
					"measurement_id"	=> $obj->measurement_id
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
			$obj = new Item_assembly(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
/* End of file categories.php */
/* Location: ./application/controllers/api/categories.php */