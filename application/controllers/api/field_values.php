<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Field_values extends REST_Controller {
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

		$obj = new Field_value(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
				//Results				
				$data["results"][] = array(
					"id" 				=> $value->id,
					"reference_id" 		=> $value->reference_id,
					"custom_field_id" 	=> $value->custom_field_id,
					"field_value" 		=> $value->field_value,
					"type" 	 			=> $value->type,

					"custom_fields" 	=> $value->custom_field->get_raw()->result()[0]
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
			$obj = new Field_value(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
			
			isset($value->reference_id) 	? $obj->reference_id 	= $value->reference_id : "";
			isset($value->custom_field_id) 	? $obj->custom_field_id = $value->custom_field_id : "";
			isset($value->field_value) 		? $obj->field_value 	= $value->field_value : "";
			isset($value->type) 			? $obj->type 			= $value->type : "";

			if(isset($value->custom_fields)){
				$obj->custom_field_id = $value->custom_fields->id;
			}

			if($obj->save()){
				$data["results"][] = array(
					"id" 				=> $obj->id,
					"reference_id" 		=> $obj->reference_id,
					"custom_field_id" 	=> $obj->custom_field_id,
					"field_value" 		=> $obj->field_value,
					"type" 	 			=> $obj->type
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
			$obj = new Field_value(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			
			isset($value->reference_id) 	? $obj->reference_id 	= $value->reference_id : "";
			isset($value->custom_field_id) 	? $obj->custom_field_id = $value->custom_field_id : "";
			isset($value->field_value) 		? $obj->field_value 	= $value->field_value : "";
			isset($value->type) 			? $obj->type 			= $value->type : "";

			if(isset($value->custom_fields)){
				$obj->custom_field_id = $value->custom_fields->id;
			}

			if($obj->save()){				
				$data["results"][] = array(
					"id" 				=> $obj->id,
					"reference_id" 		=> $obj->reference_id,
					"custom_field_id" 	=> $obj->custom_field_id,
					"field_value" 		=> $obj->field_value,
					"type" 	 			=> $obj->type
				);		
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}
	
	//DELETE
	function index_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $value) {
			$obj = new Field_value(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
/* End of file Field_value.php */
/* Location: ./application/controllers/api/Field_value.php */