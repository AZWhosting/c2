<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Measurements extends REST_Controller {	
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

		$obj = new Measurement(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}
		
		//Filter		
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter['filters'] as $value) {
	    		if(isset($value['operator'])) {
					if($value["operator"]=="measurement_category") {
	    				$obj->include_related("measurement_category", array("name"));
	    			}else if($value['operator']=="startswith"){
	    				$obj->like($value['field'], $value['value'], 'after');
	    			}else if($value['operator']=="contains"){
	    				$obj->like($value['field'], $value['value'], 'both');
					}else{
						$obj->{$value["operator"]}($value["field"], $value["value"]);
					}
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
				$data["results"][] = array(
					"id" 						=> $value->id,
					"measurement_category_id" 	=> $value->measurement_category_id,
					"name" 						=> $value->name,
					"description" 				=> $value->description,
					"is_system" 				=> intval($value->is_system),
					"category" 					=> $value->measurement_category_name
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
			$obj = new Measurement(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
			
			$obj->measurement_category_id 	= $value->measurement_category_id;
			$obj->name 						= $value->name;
			$obj->description 				= $value->description;
			$obj->is_system 				= 0;
			
			if($obj->save()){
				//Respsone
				$data["results"][] = array(
					"id" 						=> $obj->id,
					"measurement_category_id" 	=> $obj->measurement_category_id,
					"name" 						=> $obj->name,
					"description"				=> $obj->description,
					"is_system" 				=> $obj->is_system
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
			$obj = new Measurement(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			
			$obj->measurement_category_id 	= $value->measurement_category_id;
			$obj->name 						= $value->name;			
			$obj->description 				= $value->description;
			$obj->is_system 				= $value->is_system;		
			
			if($obj->save()){
				//Results
				$data["results"][] = array(
					"id" 						=> $obj->id,
					"measurement_category_id" 	=> $obj->measurement_category_id,
					"name" 						=> $obj->name,
					"description"				=> $obj->description,
					"is_system" 				=> $obj->is_system
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
			$obj = new Measurement(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
/* End of file products.php */
/* Location: ./application/controllers/api/products.php */