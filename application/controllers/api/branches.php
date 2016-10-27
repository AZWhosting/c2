<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Branches extends REST_Controller {
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

		$obj = new Branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
		 			"id" 				=> $value->id,					
					"utility_id" 		=> $value->utility_id,
					"currency_id" 		=> $value->currency_id,
					"province_id" 		=> $value->province_id,
					"country_id" 		=> $value->country_id,
					"name" 				=> $value->name,
					"description" 		=> $value->description,
					"abbr" 				=> $value->abbr,
					"representative" 	=> $value->representative,
					"email" 			=> $value->email,
					"mobile" 			=> $value->mobile,
					"phone" 			=> $value->phone,
					"address" 			=> $value->address,						
					"expire_date" 		=> $value->expire_date,
					"max_customer" 		=> $value->max_customer,
					"operation_license" => $value->operation_license,
					"term_of_condition" => $value->term_of_condition,
					"image_url" 		=> $value->image_url,
					"status" 			=> $value->status,

					"currency"			=> $value->currency->get_raw()->result(),			
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
			$obj = new Branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);						
			
			isset($value->utility_id) 			? $obj->utility_id 			= $value->utility_id : "";
			isset($value->currency_id) 			? $obj->currency_id 		= $value->currency_id : "";
			isset($value->province_id) 			? $obj->province_id 		= $value->province_id : "";
			isset($value->country_id) 			? $obj->country_id 			= $value->country_id : "";
			isset($value->name) 				? $obj->name 				= $value->name : "";
			isset($value->description) 			? $obj->description 		= $value->description : "";
			isset($value->abbr) 				? $obj->abbr 				= $value->abbr : "";
			isset($value->representative) 		? $obj->representative 		= $value->representative : "";
			isset($value->email) 				? $obj->email 				= $value->email : "";
			isset($value->mobile) 				? $obj->mobile 				= $value->mobile : "";
			isset($value->phone) 				? $obj->phone 				= $value->phone : "";
			isset($value->address) 				? $obj->address 			= $value->address : "";
			isset($value->expire_date) 			? $obj->expire_date 		= $value->expire_date : "";
			isset($value->max_customer) 		? $obj->max_customer 		= $value->max_customer : "";
			isset($value->operation_license) 	? $obj->operation_license 	= $value->operation_license : "";
			isset($value->term_of_condition) 	? $obj->term_of_condition 	= $value->term_of_condition : "";
			isset($value->image_url) 			? $obj->image_url 			= $value->image_url : "";
			isset($value->status) 				? $obj->status 				= $value->status : "";
			
			if($obj->save()){
				//Respsone
				$data["results"][] = array(					
					"id" 				=> $obj->id,
					"utility_id" 		=> $obj->utility_id,		 			
					"currency_id" 		=> $obj->currency_id,
					"province_id" 		=> $obj->province_id,
					"country_id" 		=> $obj->country_id,
					"name" 				=> $obj->name,
					"description" 		=> $obj->description,
					"abbr" 				=> $obj->abbr,
					"representative" 	=> $obj->representative,
					"email" 			=> $obj->email,
					"mobile" 			=> $obj->mobile,
					"phone" 			=> $obj->phone,
					"address" 			=> $obj->address,						
					"expire_date" 		=> $obj->expire_date,
					"max_customer" 		=> $obj->max_customer,
					"operation_license" => $obj->operation_license,
					"term_of_condition" => $obj->term_of_condition,
					"image_url" 		=> $obj->image_url,
					"status" 			=> $obj->status	
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
			$obj = new Branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			isset($value->utility_id) 			? $obj->utility_id 			= $value->utility_id : "";
			isset($value->currency_id) 			? $obj->currency_id 		= $value->currency_id : "";
			isset($value->province_id) 			? $obj->province_id 		= $value->province_id : "";
			isset($value->country_id) 			? $obj->country_id 			= $value->country_id : "";
			isset($value->name) 				? $obj->name 				= $value->name : "";
			isset($value->description) 			? $obj->description 		= $value->description : "";
			isset($value->abbr) 				? $obj->abbr 				= $value->abbr : "";
			isset($value->representative) 		? $obj->representative 		= $value->representative : "";
			isset($value->email) 				? $obj->email 				= $value->email : "";
			isset($value->mobile) 				? $obj->mobile 				= $value->mobile : "";
			isset($value->phone) 				? $obj->phone 				= $value->phone : "";
			isset($value->address) 				? $obj->address 			= $value->address : "";
			isset($value->expire_date) 			? $obj->expire_date 		= $value->expire_date : "";
			isset($value->max_customer) 		? $obj->max_customer 		= $value->max_customer : "";
			isset($value->operation_license) 	? $obj->operation_license 	= $value->operation_license : "";
			isset($value->term_of_condition) 	? $obj->term_of_condition 	= $value->term_of_condition : "";
			isset($value->image_url) 			? $obj->image_url 			= $value->image_url : "";
			isset($value->status) 				? $obj->status 				= $value->status : "";

			if($obj->save()){				
				//Results
				$data["results"][] = array(
					"id" 				=> $obj->id,
					"utility_id" 		=> $obj->utility_id,		 			
					"currency_id" 		=> $obj->currency_id,
					"province_id" 		=> $obj->province_id,
					"country_id" 		=> $obj->country_id,
					"name" 				=> $obj->name,
					"description" 		=> $obj->description,
					"abbr" 				=> $obj->abbr,
					"representative" 	=> $obj->representative,
					"email" 			=> $obj->email,
					"mobile" 			=> $obj->mobile,
					"phone" 			=> $obj->phone,
					"address" 			=> $obj->address,						
					"expire_date" 		=> $obj->expire_date,
					"max_customer" 		=> $obj->max_customer,
					"operation_license" => $obj->operation_license,
					"term_of_condition" => $obj->term_of_condition,
					"image_url" 		=> $obj->image_url,
					"status" 			=> $obj->status	
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
			$obj = new Branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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

/* End of file branches.php */
/* Location: ./application/controllers/api/branches.php */