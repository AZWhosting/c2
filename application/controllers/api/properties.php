<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Properties extends REST_Controller {
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

		$obj = new property(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter['filters'] as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}
		
		// $obj->order_by('id', 'desc');

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
				$contact = $value->contact->select('id, name, number, abbr, phone, locale, address')->get();		
		 		$data["results"][] = array(
		 			"id" 				=> $value->id,
		 			"name" 				=> $value->name,	
		 			"abbr"				=> $value->abbr,
		 			"code"				=> floatval($value->code),
		 			"contact" 			=> $contact->exists() ? array('id' => $contact->id, 'abbr' => $contact->abbr, 'number' => $contact->number, 'name'=> $contact->name, 'phone' => $contact->phone, 'url'=>base_url() . 'api/contacts/' . $contact->id, 'locale'=> $contact->locale, 'address' => $contact->address) : array('id' => 0, 'abbr' => 'null', 'number' => 'null', 'name'=> 'null', 'phone' => 'null', 'url'=> 'null', 'locale' => 'null', 'address' => 'null'),
					"address" 			=> $value->address
		 		);
			}
		}

		//Response Data		
		$this->response($data, 200);			
	}
	//POST
	function index_post() {
		$models = json_decode($this->post('models'));				
		$data["results"] = array();
		$data["count"] = 0;				
		
		foreach ($models as $value) {
			$obj = new Property(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->contact_id) 			? $obj->contact_id 			= $value->contact_id : "";
			isset($value->name) 				? $obj->name 				= $value->name: "";
			isset($value->code) 				? $obj->code 				= $value->code : "";	
			isset($value->abbr) 				? $obj->abbr 				= $value->abbr : "";				
			isset($value->address) 				? $obj->address 			= $value->address : "";
			isset($value->contact_id) 			? $obj->contact_id 			= $value->contact_id : "";
			$obj->sync = 1;
	   		if($obj->save()){

			   	$data["results"][] = array(
			   		"id" 					=> $obj->id,
			   		"name" 					=> $obj->name,
					"code" 					=> $obj->code,
					"abbr"					=> $obj->abbr,	
					"contact_id" 			=> $obj->contact_id,
					"address" 				=> $obj->address
			   	);
		    }	
		}
		
		// $data["count"] = count($data["results"]);
		// $this->response($data, 201);
		$this->response($models, 201);		
	}
	//POST
	function index_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;			
		
		foreach ($models as $value) {
			$obj = new property(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			isset($value->contact_id) 			? $obj->contact_id 			= $value->contact_id : "";
			isset($value->name) 				? $obj->name 				= $value->name: "";
			isset($value->code) 				? $obj->code 				= $value->code : "";	
			isset($value->abbr) 				? $obj->abbr 				= $value->abbr : "";				
			isset($value->address) 				? $obj->address 			= $value->address : "";
			isset($value->contact_id) 			? $obj->contact_id 			= $value->contact_id : "";
			$obj->sync = 1;
	   		if($obj->save()){
	   			
			   	$data["results"][] = array(
			   		"id" 					=> $obj->id,
			   		"name" 					=> $obj->name,
					"code" 					=> $obj->code,
					"abbr"					=> $obj->abbr,	
					"contact_id" 			=> $obj->contact_id,
					"address" 				=> $obj->address
			   	);
		    }	
		}
		
		$data["count"] = count($data["results"]);
		$this->response($data, 201);		
	}
}//End Of Class