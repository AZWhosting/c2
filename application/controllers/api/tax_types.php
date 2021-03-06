<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Tax_types extends REST_Controller {	
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
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Tax_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}
		
		//Filter		
		if(!empty($filters) && isset($filters)){
	    	foreach ($filters as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}		

		//Result		
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;				

		if($obj->result_count()>0){			
			foreach ($obj as $value) {							
				$data["results"][] = array(
					"id" 				=> $value->id,
					"sub_of_id" 		=> $value->sub_of_id,					
					"number" 			=> $value->number,
					"name" 				=> $value->name,
					"tax_system" 		=> $value->tax_system,
					"agency"			=> $value->agency,
					"end_date" 			=> $value->end_date,
					"submission_date" 	=> $value->submission_date,
					"frequency" 		=> $value->frequency,
					"description" 		=> $value->description,
					"is_system" 		=> $value->is_system
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
			$obj = new Tax_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			isset($value->sub_of_id) 		? $obj->sub_of_id 		= $value->sub_of_id : "";
			isset($value->number) 			? $obj->number 			= $value->number : "";
			isset($value->name) 			? $obj->name 			= $value->name : "";
			isset($value->tax_system) 		? $obj->tax_system 		= $value->tax_system : "";
			isset($value->agency) 			? $obj->agency 			= $value->agency : "";
			isset($value->end_date) 		? $obj->end_date 		= $value->end_date : "";
			isset($value->submission_date) 	? $obj->submission_date = $value->submission_date : "";
			isset($value->frequency) 		? $obj->frequency 		= $value->frequency : "";
			isset($value->description) 		? $obj->description 	= $value->description : "";
			isset($value->is_system) 		? $obj->is_system 		= $value->is_system : "";
						
			if($obj->save()){				
				//Respsone
				$data["results"][] = array(
					"id" 				=> $obj->id,
					"sub_of_id" 		=> $obj->sub_of_id,					
					"number" 			=> $obj->number,
					"name" 				=> $obj->name,
					"tax_system" 		=> $obj->tax_system,
					"agency" 			=> $obj->agency,
					"end_date" 			=> $obj->end_date,
					"submission_date" 	=> $obj->submission_date,
					"frequency" 		=> $obj->frequency,
					"description" 		=> $obj->description,
					"is_system" 		=> $obj->is_system
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
			$obj = new Tax_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			
			isset($value->sub_of_id) 		? $obj->sub_of_id 		= $value->sub_of_id : "";
			isset($value->number) 			? $obj->number 			= $value->number : "";
			isset($value->name) 			? $obj->name 			= $value->name : "";
			isset($value->tax_system) 		? $obj->tax_system 		= $value->tax_system : "";
			isset($value->agency) 			? $obj->agency 			= $value->agency : "";
			isset($value->end_date) 		? $obj->end_date 		= $value->end_date : "";
			isset($value->submission_date) 	? $obj->submission_date = $value->submission_date : "";
			isset($value->frequency) 		? $obj->frequency 		= $value->frequency : "";
			isset($value->description) 		? $obj->description 	= $value->description : "";
			isset($value->is_system) 		? $obj->is_system 		= $value->is_system : "";			
			
			if($obj->save()){				
				//Results
				$data["results"][] = array(
					"id" 				=> $obj->id,
					"sub_of_id" 		=> $obj->sub_of_id,					
					"number" 			=> $obj->number,
					"name" 				=> $obj->name,
					"tax_system" 		=> $obj->tax_system,
					"agency" 			=> $obj->agency,
					"end_date" 			=> $obj->end_date,
					"submission_date" 	=> $obj->submission_date,
					"frequency" 		=> $obj->frequency,
					"description" 		=> $obj->description,
					"is_system" 		=> $obj->is_system
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
			$obj = new Tax_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
/* End of file tax_types.php */
/* Location: ./application/controllers/api/tax_types.php */