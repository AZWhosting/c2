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
		$filters 	= $this->get("filter");		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
		$obj->order_by("id", "ASC");
		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Filter		
		if(!empty($filters) && isset($filters["filters"])){
	    	foreach ($filters["filters"] as $value) {
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
		 			"id" 				=> $value->id,		
		 			"number" 			=> $value->number,	
		 			"name"				=> $value->name,
		 			"abbr"				=> $value->abbr,
		 			"representative"	=> $value->representative,
		 			"currency"			=> $value->currency->get_raw()->result(),
		 			"status"			=> $value->status,
		 			"expire_date"		=> $value->expire_date,
		 			"max_customer"		=> $value->max_customer,
		 			"description"		=> $value->description,
		 			"address"			=> $value->address,
		 			"province"			=> $value->province,
		 			"district"			=> $value->district,
		 			"email"				=> $value->email,
		 			"mobile"			=> $value->mobile,
		 			"telephone"			=> $value->telephone,
		 			"type" 				=> $value->type,
		 			"term_of_condition"	=> $value->term_of_condition

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
			$now = new DateTime();				
			
			isset($value->number) 				? $obj->number 				= $value->number : "";
			isset($value->name) 				? $obj->name 				= $value->name : "";
			isset($value->abbr) 				? $obj->abbr 				= $value->abbr : "";
			isset($value->representative) 		? $obj->representative 		= $value->representative : "";
			isset($value->currency) 			? $obj->currency_id 		= $value->currency : "";
			isset($value->status) 				? $obj->status 				= $value->status : "";
			isset($value->expire_date) 			? $obj->expire_date 		= $value->expire_date : "";
			isset($value->max_customer) 		? $obj->max_customer 		= $value->max_customer : "";
			isset($value->description) 			? $obj->description 		= $value->description : "";
			isset($value->address) 				? $obj->address 			= $value->address : "";
			isset($value->province) 			? $obj->province 			= $value->province : "";
			isset($value->district) 			? $obj->district 			= $value->district : "";
			isset($value->email) 				? $obj->email 				= $value->email : "";
			isset($value->mobile) 				? $obj->mobile 				= $value->mobile : "";
			isset($value->telephone) 			? $obj->telephone 			= $value->telephone : "";
			isset($value->term_of_condition) 	? $obj->term_of_condition 	= $value->term_of_condition : "";
			
			if($obj->save()){
				//Respsone
				$currency = $obj->currency->get();
				$data["results"][] = array(					
					"id" 				=> $obj->id,
					"number" 			=> $obj->number,
					"name" 				=> $obj->name,
					"abbr" 				=> $obj->abbr,
					"representative" 	=> $obj->representative,
					"currency" 			=> array('id'=> $currency->id, 'name' => $currency->name),
					"status" 			=> $obj->status,
					"expire_date" 		=> $obj->expire_date,
					"max_customer"		=> $obj->max_customer,
		 			"description"		=> $obj->description,
		 			"address"			=> $obj->address,
		 			"province"			=> $obj->province,
		 			"district"			=> $obj->district,
		 			"email"				=> $obj->email,
		 			"mobile"			=> $obj->mobile,
		 			"telephone"			=> $obj->telephone,
		 			"type"	 			=> $obj->type,
		 			"term_of_condition"	=> $obj->term_of_condition
					
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

			isset($value->number) 				? $obj->number 				= $value->number : "";
			isset($value->name) 				? $obj->name 				= $value->name : "";
			isset($value->abbr) 				? $obj->abbr 				= $value->abbr : "";
			isset($value->representative) 		? $obj->representative 		= $value->representative : "";
			isset($value->currency) 			? $obj->currency 			= $value->currency : "";
			isset($value->status) 				? $obj->status 				= $value->status : "";
			isset($value->expire_date) 			? $obj->expire_date 		= $value->expire_date : "";
			isset($value->max_customer) 		? $obj->max_customer 		= $value->max_customer : "";
			isset($value->description) 			? $obj->description 		= $value->description : "";
			isset($value->address) 				? $obj->address 			= $value->address : "";
			isset($value->province) 			? $obj->province 			= $value->province : "";
			isset($value->district) 			? $obj->district 			= $value->district : "";
			isset($value->email) 				? $obj->email 				= $value->email : "";
			isset($value->mobile) 				? $obj->mobile 				= $value->mobile : "";
			isset($value->telephone) 			? $obj->telephone 			= $value->telephone : "";
			isset($value->term_of_condition) 	? $obj->term_of_condition 	= $value->term_of_condition : "";
			
			if($obj->save()){				
				//Results
				// $currency = $obj->currency->get();
				$data["results"][] = array(
					"id" 				=> $obj->id,
					"number" 			=> $obj->number,
					"name" 				=> $obj->name,
					"abbr" 				=> $obj->abbr,
					"representative" 	=> $obj->representative,
					"currency" 			=> array('id'=> $obj->currency_id),
					"status" 			=> $obj->status,
					"expire_date" 		=> $obj->expire_date,
					"max_customer"		=> $obj->max_customer,
		 			"description"		=> $obj->description,
		 			"address"			=> $obj->address,
		 			"province"			=> $obj->province,
		 			"district"			=> $obj->district,
		 			"email"				=> $obj->email,
		 			"mobile"			=> $obj->mobile,
		 			"telephone"			=> $obj->telephone,
		 			"type"				=> $obj->type,
		 			"term_of_condition"	=> $obj->term_of_condition
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

	//Dashboard GET
	function dashboard_get() {		
		$filters 	= $this->get("filter");		
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
		if(!empty($filters) && isset($filters["filters"])){
	    	foreach ($filters["filters"] as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}

		//Results
		
		$locationCount = $obj->include_related('location')->result_count();
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		
		
		if($obj->result_count()>0){
			foreach ($obj as $value) {				
		 		$data["results"][] = array(
		 			"id" 				=> $value->id,		
		 			"number" 			=> $value->number,	
		 			"name"				=> $value->name,
		 			"abbr"				=> $value->abbr,
		 			"representative"	=> $value->representative,
		 			"currency"			=> $value->currency->get_raw()->result(),
		 			"status"			=> $value->status,
		 			"expire_date"		=> $value->expire_date,
		 			"max_customer"		=> $value->max_customer,
		 			"description"		=> $value->description,
		 			"address"			=> $value->address,
		 			"province"			=> $value->province,
		 			"district"			=> $value->district,
		 			"email"				=> $value->email,
		 			"mobile"			=> $value->mobile,

		 			"location_count" 	=> $locationCount,

		 			"active_customer" 	=> "",
		 			"inactive_customer" => "",
		 			"deposit"			=> "",
		 			"usage"				=> "",
		 			"sale"				=> "",
		 			"unpaid" 			=> "",

		 			"telephone"			=> $value->telephone,
		 			"term_of_condition"	=> $value->term_of_condition

		 		);
			}
		}

		//Response Data		
		$this->response($data, 200);			
	}
}

/* End of file branches.php */
/* Location: ./application/controllers/api/branches.php */