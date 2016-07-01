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
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);	

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}
		
		//Filter		
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {
	    		if(!empty($value["operator"]) && isset($value["operator"])){
		    		if($value["operator"]=="where_in"){
		    			$obj->where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_in"){
		    			$obj->or_where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="where_not_in"){
		    			$obj->where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_not_in"){
		    			$obj->or_where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="like"){
		    			$obj->like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_like"){
		    			$obj->or_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="not_like"){
		    			$obj->not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_not_like"){
		    			$obj->or_not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="startswith"){
		    			$obj->like($value["field"], $value["value"], "after");
		    		}else if($value["operator"]=="endswith"){
		    			$obj->like($value["field"], $value["value"], "before");
		    		}else if($value["operator"]=="contains"){
		    			$obj->like($value["field"], $value["value"], "both");
		    		}else if($value["operator"]=="or_where"){
		    			$obj->or_where($value["field"], $value["value"]);		    				    		
		    		}else{
		    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
		    		}
	    		}else{	    			
	    			$obj->where($value["field"], $value["value"]);	    				    			
	    		}
			}									 			
		}		
		
		// Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;							

		if($obj->exists()){
			foreach ($obj as $value) {				
				$data["results"][] = array(
					"id" 				=> $value->id,		 			
					"account_type_id" 	=> $value->account_type_id,
					"sub_of" 			=> $value->sub_of,						
					"code" 				=> $value->code,
					"name" 				=> $value->name,
					"name_local" 		=> $value->name_local,					
					"description" 		=> $value->description,
					"is_taxable" 		=> $value->is_taxable,
					"status" 			=> $value->status,
					"is_system" 		=> $value->is_system,

				   	"account_type" 		=> $value->account_type->get_raw()->result()
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
			$obj = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->account_type_id) 	? $obj->account_type_id 	= $value->account_type_id : "";
			isset($value->sub_of) 			? $obj->sub_of 				= $value->sub_of : "";
			isset($value->code) 			? $obj->code 				= $value->code : "";				
			isset($value->name) 			? $obj->name 				= $value->name : "";
			isset($value->name_local) 		? $obj->name_local 			= $value->name_local : "";
			isset($value->description) 		? $obj->description 		= $value->description : "";			
			isset($value->is_taxable) 		? $obj->is_taxable 			= $value->is_taxable : "";			
			isset($value->status) 			? $obj->status 				= $value->status : "";
			isset($value->is_system) 		? $obj->is_system 			= $value->is_system : "";

	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 				=> $obj->id,		 			
					"account_type_id" 	=> $obj->account_type_id,
					"sub_of" 			=> $obj->sub_of,						
					"code" 				=> $obj->code,
					"name" 				=> $obj->name,
					"name_local" 		=> $obj->name_local,					
					"description" 		=> $obj->description,
					"is_taxable" 		=> $obj->is_taxable,
					"status" 			=> $obj->status,
					"is_system" 		=> $obj->is_system,

				   	"account_type" 		=> $obj->account_type->get_raw()->result()
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
			
			isset($value->account_type_id) 	? $obj->account_type_id 	= $value->account_type_id : "";
			isset($value->sub_of) 			? $obj->sub_of 				= $value->sub_of : "";
			isset($value->code) 			? $obj->code 				= $value->code : "";				
			isset($value->name) 			? $obj->name 				= $value->name : "";
			isset($value->name_local) 		? $obj->name_local 			= $value->name_local : "";
			isset($value->description) 		? $obj->description 		= $value->description : "";			
			isset($value->is_taxable) 		? $obj->is_taxable 			= $value->is_taxable : "";			
			isset($value->status) 			? $obj->status 				= $value->status : "";
			isset($value->is_system) 		? $obj->is_system 			= $value->is_system : "";

			if($obj->save()){				
				//Results
				$data["results"][] = array(
					"id" 				=> $obj->id,		 			
					"account_type_id" 	=> $obj->account_type_id,
					"sub_of" 			=> $obj->sub_of,						
					"code" 				=> $obj->code,
					"name" 				=> $obj->name,
					"name_local" 		=> $obj->name_local,					
					"description" 		=> $obj->description,
					"is_taxable" 		=> $obj->is_taxable,
					"status" 			=> $obj->status,
					"is_system" 		=> $obj->is_system,

				   	"account_type" 		=> $obj->account_type->get_raw()->result()
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
	    		if(!empty($value["operator"]) && isset($value["operator"])){
		    		if($value["operator"]=="where_in"){
		    			$obj->where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_in"){
		    			$obj->or_where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="where_not_in"){
		    			$obj->where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_not_in"){
		    			$obj->or_where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="like"){
		    			$obj->like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_like"){
		    			$obj->or_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="not_like"){
		    			$obj->not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_not_like"){
		    			$obj->or_not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="startswith"){
		    			$obj->like($value["field"], $value["value"], "after");
		    		}else if($value["operator"]=="endswith"){
		    			$obj->like($value["field"], $value["value"], "before");
		    		}else if($value["operator"]=="contains"){
		    			$obj->like($value["field"], $value["value"], "both");
		    		}else if($value["operator"]=="or_where"){
		    			$obj->or_where($value["field"], $value["value"]);		    		
		    		}else{
		    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
		    		}
	    		}else{
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
					"sub_of" 				=> $value->sub_of,
					"code" 					=> $value->code,
					"name" 					=> $value->name,
					"name_local" 			=> $value->name_local,
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
			$obj->sub_of 				= $value->sub_of;
			$obj->code 					= $value->code;			
			$obj->name 					= $value->name;
			$obj->name_local 			= $value->name_local;
			$obj->nature 				= $value->nature;
			$obj->cash_flow_source 		= $value->cash_flow_source;
			$obj->financial_statement 	= $value->financial_statement;
			$obj->is_system 			= $value->is_system;
			
			if($obj->save()){
				//Respsone
				$data["results"][] = array(					
					"id" 					=> $obj->id,
					"sub_of" 				=> $obj->sub_of,									
					"code" 					=> $obj->code,
					"name" 					=> $obj->name,
					"name_local" 			=> $obj->name_local,
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

			$obj->sub_of 				= $value->sub_of;
			$obj->code 					= $value->code;			
			$obj->name 					= $value->name;
			$obj->name_local 			= $value->name_local;
			$obj->nature 				= $value->nature;
			$obj->cash_flow_source 		= $value->cash_flow_source;
			$obj->financial_statement 	= $value->financial_statement;
			$obj->is_system 			= $value->is_system;

			if($obj->save()){				
				//Results
				$data["results"][] = array(
					"id" 					=> $obj->id,
					"sub_of" 				=> $obj->sub_of,									
					"code" 					=> $obj->code,
					"name" 					=> $obj->name,
					"name_local" 			=> $obj->name_local,
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