<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Installments extends REST_Controller {
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
		$filters = $this->get("filter")["filters"];		
		$page 	= $this->get('page');		
		$limit 	= $this->get('limit');							
		$sort 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Installment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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

		if(!empty($limit) && !empty($page)){
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;							
		}

		if($obj->result_count()>0){			
			foreach ($obj as $value) {				
				//Results				
				$data["results"][] = array(
					"id" 			=> $value->id,
					"biller_id"		=> $value->biller_id,
					"contact_id" 	=> $value->contact_id,
					"start_month"	=> $value->start_month,
					"amount"		=> $value->amount,
					"step"			=> $value->step,
					"counter"		=> $value->counter,
					"status"		=> $value->status											
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
			$obj = new Installment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->biller_id 	= $value->biller_id;
			$obj->contact_id 	= $value->contact_id;
			$obj->start_month 	= $value->start_month;
			$obj->amount 		= $value->amount;
			$obj->step 			= $value->step;
			$obj->counter 		= $value->counter;
			$obj->status 		= $value->status;
			$obj->name 			= $value->name;
						
			if($obj->save()){
				$data["results"][] = array(
					"id" 			=> $obj->id,
					"biller_id"		=> $obj->biller_id,
					"contact_id" 	=> $obj->contact_id,
					"start_month"	=> $obj->start_month,
					"amount"		=> $obj->amount,
					"step"			=> $obj->step,
					"counter"		=> $obj->counter,
					"status"		=> $obj->status		
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
			$obj = new Installment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			$obj->biller_id 	= $value->biller_id;
			$obj->contact_id 	= $value->contact_id;
			$obj->start_month 	= $value->start_month;
			$obj->amount 		= $value->amount;
			$obj->step 			= $value->step;
			$obj->counter 		= $value->counter;
			$obj->status 		= $value->status;
			$obj->name 			= $value->name;

			if($obj->save()){				
				$data["results"][] = array(
					"id" 			=> $obj->id,
					"biller_id"		=> $obj->biller_id,
					"contact_id" 	=> $obj->contact_id,
					"start_month"	=> $obj->start_month,
					"amount"		=> $obj->amount,
					"step"			=> $obj->step,
					"counter"		=> $obj->counter,
					"status"		=> $obj->status	
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
			$obj = new Installment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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