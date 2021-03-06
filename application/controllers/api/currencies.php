<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Currencies extends REST_Controller {
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

		$obj = new Currency(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);	

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
					"id" 		=> $value->id,					
					"code" 		=> $value->code,
					"country" 	=> $value->country,
					"locale" 	=> $value->locale,
					"group" 	=> $value->group,					
					"status" 	=> $value->status
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
			$obj = new Currency(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
			$obj->code 		= $value->code;
			$obj->country 	= $value->country;
			$obj->locale 	= $value->locale;
			$obj->group 	= $value->group;
			$obj->status 	= $value->status;
									
			if($obj->save()){
				$data["results"][] = array(
					"id" 		=> $obj->id,					
					"code" 		=> $obj->code,
					"country" 	=> $obj->country,
					"locale" 	=> $obj->locale,
					"group" 	=> $obj->group,					
					"status" 	=> $obj->status
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
			$obj = new Currency(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			$obj->code 		= $value->code;
			$obj->country 	= $value->country;
			$obj->locale 	= $value->locale;
			$obj->group 	= $value->group;
			$obj->status 	= $value->status;			

			if($obj->save()){				
				$data["results"][] = array(
					"id" 		=> $obj->id,					
					"code" 		=> $obj->code,
					"country" 	=> $obj->country,
					"locale" 	=> $obj->locale,
					"group" 	=> $obj->group,					
					"status" 	=> $obj->status	
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
			$obj = new Currency(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);							
		}

		//Response data
		$this->response($data, 200);
	}


	//GET RATE
	function rate_get() {		
		$filter 	= $this->get("filter");		
		$page 		= $this->get('page');		
		$limit 		= $this->get('limit');								
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Currency_rate(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
				$data["results"][] = array(
					"id" 			=> $value->id,
					"currency_id" 	=> $value->currency_id,
					"user_id" 		=> $value->user_id,
					"rate" 			=> floatval($value->rate),
					"locale" 	 	=> $value->locale,
					"source" 	 	=> $value->source,
					"method" 		=> $value->method,
					"date" 			=> $value->date,
					"is_system" 	=> $value->is_system,

					"currency" 		=> $value->currency->get_raw()->result()	
				);
			}
		}

		//Response Data		
		$this->response($data, 200);		
	}
	
	//POST RATE
	function rate_post() {
		$models = json_decode($this->post('models'));

		foreach ($models as $value) {
			$obj = new Currency_rate(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
			
			isset($value->currency_id) 	? $obj->currency_id = $value->currency_id : "";
			isset($value->user_id) 		? $obj->user_id 	= $value->user_id : "";
			isset($value->rate) 		? $obj->rate 		= $value->rate : "";
			isset($value->locale) 		? $obj->locale 		= $value->locale : "";
			isset($value->source) 		? $obj->source 		= $value->source : "";
			isset($value->method) 		? $obj->method 		= $value->method : "";
			isset($value->date) 		? $obj->date 		= $value->date : "";
			isset($value->is_system) 	? $obj->is_system 	= $value->is_system : "";
						
			if($obj->save()){
				// Active Currency
				$cur = new Currency(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$cur->get_by_id($obj->currency_id);
				$cur->status = 1;
				$cur->save();

				$data["results"][] = array(
					"id" 			=> $obj->id,
					"currency_id" 	=> $obj->currency_id,
					"user_id" 		=> $obj->user_id,
					"rate" 			=> floatval($obj->rate),
					"locale" 	 	=> $obj->locale,
					"source" 	 	=> $obj->source,
					"method" 		=> $obj->method,
					"date" 			=> $obj->date,
					"is_system" 	=> $obj->is_system,

					"currency" 		=> $obj->currency->get_raw()->result()
				);
			}
		}
		$data["count"] = count($data["results"]);
		
		$this->response($data, 201);						
	}

	//PUT RATE
	function rate_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;

		foreach ($models as $value) {			
			$obj = new Currency_rate(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			
			isset($value->currency_id) 	? $obj->currency_id = $value->currency_id : "";
			isset($value->user_id) 		? $obj->user_id 	= $value->user_id : "";
			isset($value->rate) 		? $obj->rate 		= $value->rate : "";
			isset($value->locale) 		? $obj->locale 		= $value->locale : "";
			isset($value->source) 		? $obj->source 		= $value->source : "";
			isset($value->method) 		? $obj->method 		= $value->method : "";
			isset($value->date) 		? $obj->date 		= $value->date : "";
			isset($value->is_system) 	? $obj->is_system 	= $value->is_system : "";		

			if($obj->save()){
				// Active Currency
				$cur = new Currency(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$cur->get_by_id($obj->currency_id);
				$cur->status = 1;
				$cur->save();

				$data["results"][] = array(
					"id" 			=> $obj->id,
					"currency_id" 	=> $obj->currency_id,
					"user_id" 		=> $obj->user_id,
					"rate" 			=> floatval($obj->rate),
					"locale" 	 	=> $obj->locale,
					"source" 	 	=> $obj->source,
					"method" 		=> $obj->method,
					"date" 			=> $obj->date,
					"is_system" 	=> $obj->is_system,

					"currency" 		=> $obj->currency->get_raw()->result()	
				);		
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}
	
	//DELETE RATE
	function rate_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Currency_rate(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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