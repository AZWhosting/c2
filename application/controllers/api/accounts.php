<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Accounts extends REST_Controller {
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

		$obj = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);	

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
					if($value['operator']=="eq"){
						$obj->where($value['field'], $value['value']);
					}else{
						$obj->{$value['operator']}($value['field'], $value['value']);
					}
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}
		
		$obj->include_related("account_type", "name");
		
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
					"id" 					=> $value->id,		 			
					"account_type_id" 		=> $value->account_type_id,
					"sub_of_id" 			=> $value->sub_of_id,						
					"number" 				=> $value->number,
					"name" 					=> $value->name,
					"name_2" 				=> $value->name_2,					
					"description" 			=> $value->description,
					"bank_name" 			=> $value->bank_name,
					"bank_account_number" 	=> $value->bank_account_number,
					"locale" 				=> $value->locale,
					"is_taxable" 			=> intval($value->is_taxable),
					"status" 				=> $value->status,
					"is_system" 			=> $value->is_system,

				   	"account_type_name"		=> $value->account_type_name
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
		
		foreach ($models as $value) {
			$obj = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->account_type_id) 		? $obj->account_type_id 	= $value->account_type_id : "";
			isset($value->sub_of_id) 			? $obj->sub_of_id 			= $value->sub_of_id : $obj->sub_of_id = 0;
			isset($value->number) 				? $obj->number 				= $value->number : "";				
			isset($value->name) 				? $obj->name 				= $value->name : "";
			isset($value->name_2) 				? $obj->name_2 				= $value->name_2 : "";
			isset($value->description) 			? $obj->description 		= $value->description : "";
			isset($value->bank_name) 			? $obj->bank_name 			= $value->bank_name : "";
			isset($value->bank_account_number) 	? $obj->bank_account_number = $value->bank_account_number : "";
			isset($value->locale) 				? $obj->locale 				= $value->locale : "";			
			isset($value->is_taxable) 			? $obj->is_taxable 			= $value->is_taxable : "";			
			isset($value->status) 				? $obj->status 				= $value->status : "";
			isset($value->is_system) 			? $obj->is_system 			= $value->is_system : "";
			
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 					=> $obj->id,		 			
					"account_type_id" 		=> $obj->account_type_id,
					"sub_of_id" 			=> $obj->sub_of_id,						
					"number" 				=> $obj->number,
					"name" 					=> $obj->name,
					"name_2" 				=> $obj->name_2,					
					"description" 			=> $obj->description,
					"bank_name" 			=> $obj->bank_name,
					"bank_account_number" 	=> $obj->bank_account_number,
					"locale" 				=> $obj->locale,
					"is_taxable" 			=> intval($obj->is_taxable),
					"status" 				=> $obj->status,
					"is_system" 			=> $obj->is_system,

				   	"account_type" 			=> $obj->account_type->get_raw()->result()
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
			$obj = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			
			isset($value->account_type_id) 		? $obj->account_type_id 	= $value->account_type_id : "";
			isset($value->sub_of_id) 			? $obj->sub_of_id 			= $value->sub_of_id : $obj->sub_of_id = 0;
			isset($value->number) 				? $obj->number 				= $value->number : "";				
			isset($value->name) 				? $obj->name 				= $value->name : "";
			isset($value->name_2) 				? $obj->name_2 				= $value->name_2 : "";
			isset($value->description) 			? $obj->description 		= $value->description : "";
			isset($value->bank_name) 			? $obj->bank_name 			= $value->bank_name : "";
			isset($value->bank_account_number) 	? $obj->bank_account_number = $value->bank_account_number : "";
			isset($value->locale) 				? $obj->locale 				= $value->locale : "";			
			isset($value->is_taxable) 			? $obj->is_taxable 			= $value->is_taxable : "";			
			isset($value->status) 				? $obj->status 				= $value->status : "";
			isset($value->is_system) 			? $obj->is_system 			= $value->is_system : "";

			if($obj->save()){				
				//Results
				$data["results"][] = array(
					"id" 					=> $obj->id,		 			
					"account_type_id" 		=> $obj->account_type_id,
					"sub_of_id" 			=> $obj->sub_of_id,						
					"number" 				=> $obj->number,
					"name" 					=> $obj->name,
					"name_2" 				=> $obj->name_2,					
					"description" 			=> $obj->description,
					"bank_name" 			=> $obj->bank_name,
					"bank_account_number" 	=> $obj->bank_account_number,
					"locale" 				=> $obj->locale,
					"is_taxable" 			=> intval($obj->is_taxable),
					"status" 				=> $obj->status,
					"is_system" 			=> $obj->is_system,

				   	"account_type" 			=> $obj->account_type->get_raw()->result()
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
			$obj = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);							
		}

		//Response data
		$this->response($data, 200);
	}

	//GET TYPE
	function type_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Account_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		
		
		if($obj->result_count()>0){
			foreach ($obj as $value) {				
		 		$data["results"][] = array(
		 			"id" 					=> $value->id,									
					"sub_of_id" 			=> $value->sub_of_id,
					"number" 				=> $value->number,
					"name" 					=> $value->name,
					"name_2" 				=> $value->name_2,
					"nature" 				=> $value->nature,					
					"cash_flow_source" 		=> $value->cash_flow_source,
					"financial_statement" 	=> $value->financial_statement,					
					"is_system" 			=> $value->is_system						
		 		);
			}
		}

		//Response Data		
		$this->response($data, 200);			
	}
	
	//POST TYPE
	function type_post() {
		$models = json_decode($this->post('models'));

		foreach ($models as $value) {
			$obj = new Account_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			
			isset($value->sub_of_id) 			? $obj->sub_of_id 			= $value->sub_of_id : "";
			isset($value->number) 				? $obj->number 				= $value->number : "";				
			isset($value->name) 				? $obj->name 				= $value->name : "";
			isset($value->name_2) 				? $obj->name_2 				= $value->name_2 : "";
			isset($value->nature) 				? $obj->nature 				= $value->nature : "";			
			isset($value->cash_flow_source) 	? $obj->cash_flow_source 	= $value->cash_flow_source : "";			
			isset($value->financial_statement) 	? $obj->financial_statement = $value->financial_statement : "";
			isset($value->is_system) 			? $obj->is_system 			= $value->is_system : "";

			if($obj->save()){
				//Respsone
				$data["results"][] = array(					
					"id" 					=> $obj->id,
					"sub_of_id" 			=> $obj->sub_of_id,									
					"number" 				=> $obj->number,
					"name" 					=> $obj->name,
					"name_2" 				=> $obj->name_2,
					"nature" 				=> $obj->nature,					
					"cash_flow_source" 		=> $obj->cash_flow_source,
					"financial_statement" 	=> $obj->financial_statement,					
					"is_system" 			=> $obj->is_system	
				);				
			}		
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 201);
	}
	
	//PUT TYPE
	function type_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;

		foreach ($models as $value) {			
			$obj = new Account_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			isset($value->sub_of_id) 			? $obj->sub_of_id 			= $value->sub_of_id : "";
			isset($value->number) 				? $obj->number 				= $value->number : "";				
			isset($value->name) 				? $obj->name 				= $value->name : "";
			isset($value->name_2) 				? $obj->name_2 				= $value->name_2 : "";
			isset($value->nature) 				? $obj->nature 				= $value->nature : "";			
			isset($value->cash_flow_source) 	? $obj->cash_flow_source 	= $value->cash_flow_source : "";			
			isset($value->financial_statement) 	? $obj->financial_statement = $value->financial_statement : "";
			isset($value->is_system) 			? $obj->is_system 			= $value->is_system : "";

			if($obj->save()){				
				//Results
				$data["results"][] = array(
					"id" 					=> $obj->id,
					"sub_of_id" 			=> $obj->sub_of_id,									
					"number" 				=> $obj->number,
					"name" 					=> $obj->name,
					"name_2" 				=> $obj->name_2,
					"nature" 				=> $obj->nature,					
					"cash_flow_source" 		=> $obj->cash_flow_source,
					"financial_statement" 	=> $obj->financial_statement,					
					"is_system" 			=> $obj->is_system
				);						
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}
	
	//DELETE TYPE
	function type_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Account_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);							
		}

		//Response data
		$this->response($data, 200);
	}		 
	
	
}//End Of Class