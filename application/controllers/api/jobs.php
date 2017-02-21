<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Jobs extends REST_Controller {
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

		$obj = new Job(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
					"id" 			=> $value->id,					
					"contact_id" 	=> $value->contact_id,
					"number" 		=> $value->number,
					"name" 	 		=> $value->name,
					"description" 	=> $value->description,

					"contact" 		=> $value->contact->get_raw()->result()	
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
			$obj = new Job(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
			
			isset($value->contact_id) 	? $obj->contact_id 		= $value->contact_id : "";
			isset($value->number) 		? $obj->number 			= $value->number : "";
			isset($value->name) 		? $obj->name 			= $value->name : "";
			isset($value->description) 	? $obj->description 	= $value->description : "";					
						
			if($obj->save()){
				$data["results"][] = array(
					"id" 			=> $obj->id,					
					"contact_id" 	=> $obj->contact_id,
					"number" 		=> $obj->number,
					"name" 	 		=> $obj->name,
					"description" 	=> $obj->description,

					"contact" 		=> $obj->contact->get_raw()->result()
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
			$obj = new Job(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			isset($value->contact_id) 	? $obj->contact_id 		= $value->contact_id : "";
			isset($value->number) 		? $obj->number 			= $value->number : "";
			isset($value->name) 		? $obj->name 			= $value->name : "";
			isset($value->description) 	? $obj->description 	= $value->description : "";

			if($obj->save()){				
				$data["results"][] = array(
					"id" 			=> $obj->id,					
					"contact_id" 	=> $obj->contact_id,
					"number" 		=> $obj->number,
					"name" 	 		=> $obj->name,
					"description" 	=> $obj->description,

					"contact" 		=> $obj->contact->get_raw()->result()	
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
			$obj = new Job(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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