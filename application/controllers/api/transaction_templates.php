<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Transaction_templates extends REST_Controller {
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

		$obj = new Transaction_template(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
		
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		

		if($obj->result_count()>0){			
			foreach ($obj as $value) {				
				//Results				
				$data["results"][] = array(
					"id" 					=> $value->id,
					"transaction_form_id" 	=> $value->transaction_form_id,					
					"user_id" 				=> $value->user_id,
					"type" 					=> $value->type,
					"name" 	 				=> $value->name,
					"color" 				=> $value->color,
					"title" 				=> $value->title,
					"note" 					=> $value->note,
					"moduls" 					=> $value->moduls,
					"created_at" 			=> $value->created_at,
					"updated_at" 			=> $value->updated_at	
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
			$obj = new Transaction_template(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
			isset($value->transaction_form_id)? $obj->transaction_form_id 	= $value->transaction_form_id : "";
			isset($value->user_id)? 			$obj->user_id 				= $value->user_id : "";
			isset($value->type)? 				$obj->type 					= $value->type : "";
			isset($value->name)? 				$obj->name 					= $value->name : "";
			isset($value->title)? 				$obj->title 				= $value->title : "";
			isset($value->note)? 				$obj->note 					= $value->note : "";
			isset($value->moduls)? 				$obj->moduls 				= $value->moduls : "";
			isset($value->color)? 				$obj->color 				= $value->color : "";	
						
			if($obj->save()){
				$data["results"][] = array(
					"id" 					=> $obj->id,
					"transaction_form_id" 	=> $obj->transaction_form_id,					
					"user_id" 				=> $obj->user_id,
					"type" 					=> $obj->type,
					"name" 	 				=> $obj->name,
					"color" 				=> $obj->color,
					"title" 				=> $obj->title,
					"note" 					=> $obj->note,
					"moduls" 				=> $obj->moduls,
					"created_at" 			=> $obj->created_at,
					"updated_at" 			=> $obj->updated_at
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
			$obj = new Transaction_template(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			isset($value->transaction_form_id)? $obj->transaction_form_id 	= $value->transaction_form_id : "";
			isset($value->user_id)? 			$obj->user_id 				= $value->user_id : "";
			isset($value->type)? 				$obj->type 					= $value->type : "";
			isset($value->name)? 				$obj->name 					= $value->name : "";
			isset($value->title)? 				$obj->title 				= $value->title : "";
			isset($value->note)? 				$obj->note 					= $value->note : "";
			isset($value->moduls)? 				$obj->moduls 				= $value->moduls : "";
			isset($value->color)? 				$obj->color 				= $value->color : "";			

			if($obj->save()){				
				$data["results"][] = array(
					"id" 					=> $obj->id,
					"transaction_form_id" 	=> $obj->transaction_form_id,					
					"user_id" 				=> $obj->user_id,
					"type" 					=> $obj->type,
					"name" 	 				=> $obj->name,
					"color" 				=> $obj->color,
					"title" 				=> $obj->title,
					"note" 					=> $obj->note,
					"moduls" 				=> $obj->moduls,
					"created_at" 			=> $obj->created_at,
					"updated_at" 			=> $obj->updated_at
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
			$obj = new Transaction_template(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
/* End of file transaction_template.php */
/* Location: ./application/controllers/api/transaction_template.php */