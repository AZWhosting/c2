<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Fees extends REST_Controller {
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

		$obj = new Fee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
		 			"id" 			=> $value->id,
					"company_id" 	=> $value->company_id, 		
					"utility_id" 	=> $value->utility_id, 		
					"type" 			=> $value->type,
					"name"			=> $value->name, 	
					"amount" 		=> floatval($value->amount),
					"unit" 			=> $value->unit,					
					"status" 		=> $value->status,

					"company" 		=> $value->company->get_raw()->result()					
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
			$obj = new Fee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->company_id 	= $value->company_id;
			$obj->utility_id 	= $value->utility_id;
			$obj->type 			= $value->type;						
		   	$obj->name 			= $value->name;
		   	$obj->amount 		= $value->amount;					   	
		   	$obj->unit 			= $value->unit;
		   	$obj->status 		= $value->status;
			
			if($obj->save()){
				//Respsone
				$data["results"][] = array(					
					"id" 				=> $obj->id,
					"company_id" 		=> $obj->company_id,
					"utility_id" 		=> $obj->utility_id,
					"type" 				=> $obj->type,
					"name" 				=> $obj->name,
					"amount" 			=> $obj->amount,
					"unit" 				=> $obj->unit,
					"status" 			=> $obj->status,

					"company" 			=> $obj->company->get_raw()->result()	
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
			$obj = new Fee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			$obj->company_id 	= $value->company_id;
			$obj->utility_id 	= $value->utility_id;
			$obj->type 			= $value->type;						
		   	$obj->name 			= $value->name;
		   	$obj->amount 		= $value->amount;					   	
		   	$obj->unit 			= $value->unit;
		   	$obj->status 		= $value->status;

			if($obj->save()){				
				//Results
				$data["results"][] = array(
					"id" 				=> $obj->id,
					"company_id" 		=> $obj->company_id,
					"utility_id" 		=> $obj->utility_id,
					"type" 				=> $obj->type,
					"name" 				=> $obj->name,
					"amount" 			=> $obj->amount,
					"unit" 				=> $obj->unit,
					"status" 			=> $obj->status,

					"company" 			=> $obj->company->get_raw()->result()
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
			$obj = new Fee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);							
		}

		//Response data
		$this->response($data, 200);
	}

	//GET ITEM
	function item_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Tariff_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
		 			"id" 		=> $value->id,
					"fee_id"	=> $value->fee_id,
					"usage" 	=> intval($value->usage),
					"price" 	=> floatval($value->price),
					"is_flat"	=> $value->is_flat=="true"?true:false					
		 		);
			}
		}

		//Response Data		
		$this->response($data, 200);			
	}
	
	//POST ITEM
	function item_post() {
		$models = json_decode($this->post('models'));

		foreach ($models as $value) {
			$obj = new Tariff_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->fee_id 	= $value->fee_id;
			$obj->usage 	= $value->usage;
			$obj->price 	= $value->price;						
		   	$obj->is_flat 	= $value->is_flat;
		   			
			if($obj->save()){
				//Respsone
				$data["results"][] = array(					
					"id" 		=> $obj->id,
					"fee_id"	=> $obj->fee_id,
					"usage" 	=> $obj->usage,
					"price" 	=> $obj->price,
					"is_flat"	=> $obj->is_flat=="true"?true:false	
				);				
			}		
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 201);
	}
	
	//PUT ITEM
	function item_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;

		foreach ($models as $value) {			
			$obj = new Tariff_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			$obj->fee_id 	= $value->fee_id;
			$obj->usage 	= $value->usage;
			$obj->price 	= $value->price;						
		   	$obj->is_flat 	= $value->is_flat;

			if($obj->save()){				
				//Results
				$data["results"][] = array(
					"id" 		=> $obj->id,
					"fee_id"	=> $obj->fee_id,
					"usage" 	=> $obj->usage,
					"price" 	=> $obj->price,
					"is_flat"	=> $obj->is_flat=="true"?true:false	
				);						
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}
	
	//DELETE ITEM
	function item_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Tariff_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
/* End of file fees.php */
/* Location: ./application/controllers/api/fees.php */