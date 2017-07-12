<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Cashier_sessions extends REST_Controller {
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
			date_default_timezone_set("$conn->time_zone");
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
		$obj = new Cashier_session(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
		 			"id"     			=> $value->id,
				   	"cashier_id" 		=> $value->cashier_id,
				   	"start_date" 		=> $value->start_date,
				   	"end_date" 			=> $value->end_date,
				   	"status" 			=> $value->status
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
			$obj = new Cashier_session(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->cashier_id) 			? $obj->cashier_id 			= $value->cashier_id : "";
			isset($value->start_date) 			? $obj->start_date 			= $value->start_date : "";
			isset($value->end_date) 			? $obj->end_date 			= $value->end_date : "";
			isset($value->status) 				? $obj->status 				= $value->status : "";

			if($obj->save()){
				//Respsone
				$data["results"][] = array(
					"id" 				=> $obj->id,
					"cashier_id" 		=> $obj->cashier_id,
					"start_date" 		=> $obj->start_date,
					"end_date" 			=> $obj->end_date,
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
			$obj = new Cashier_session(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			isset($value->cashier_id)? 		$obj->cashier_id 		= $value->cashier_id: "";
			isset($value->start_date)?		$obj->start_date 		= $value->start_date: "";
			isset($value->end_date)? 		$obj->end_date 			= $value->end_date: "";
			isset($value->status)? 			$obj->status 			= $value->status: "";
			if($obj->save()){
				//Results
				$data["results"][] = array(
					"id" 			=> $obj->id,
					"cashier_id" 	=> $obj->cashier_id,
					"start_date" 	=> $obj->start_date,
					"end_date" 		=> $obj->end_date,
					"status" 		=> $obj->status
				);
			}
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	//DELETE
	function index_delete() {
		$models = json_decode($this->delete('models'));
		foreach ($models as $key => $value) {
			$obj = new Cashier_session(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
		}
		//Response data
		$this->response($data, 200);
	}
	//Items
	function item_get() {
		$filters 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$obj = new Cashier_session_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
		 			"id"     				=> $value->id,
				   	"cashier_session_id" 	=> $value->cashier_session_id,
				   	"amount" 				=> $value->amount,
				   	"currency" 				=> $value->currency
		 		);
			}
		}
		//Response Data		
		$this->response($data, 200);
	}
	function item_post() {
		$models = json_decode($this->post('models'));
		foreach ($models as $value) {
			$obj = new Cashier_session_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->cashier_session_id) 	? $obj->cashier_session_id 	= $value->cashier_session_id : "";
			isset($value->amount) 			? $obj->amount 			= $value->amount : "";
			isset($value->currency) 		? $obj->currency 		= $value->currency : "";
			if($obj->save()){
				//Respsone
				$data["results"][] = array(
					"id" 					=> $obj->id,
					"cashier_session_id" 	=> $obj->cashier_session_id,
					"amount" 				=> $obj->amount,
					"currency" 				=> $obj->currency	
				);
			}
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	//Receive
	function receive_get() {
		$filters 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$obj = new Cashier_session_receive(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
		 			"id"     				=> $value->id,
				   	"cashier_session_id" 	=> $value->cashier_session_id,
				   	"amount" 				=> $value->amount,
				   	"transaction_id" 		=> $value->transaction_id,
				   	"contact_id" 			=> $value->contact_id,
				   	"time" 					=> $value->time
		 		);
			}
		}
		//Response Data		
		$this->response($data, 200);
	}
	function receive_post() {
		$models = json_decode($this->post('models'));
		foreach ($models as $value) {
			$obj = new Cashier_session_receive(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->cashier_session_id) 	? $obj->cashier_session_id 	= $value->cashier_session_id : "";
			isset($value->amount) 				? $obj->amount 				= $value->amount : "";
			isset($value->transaction_id) 		? $obj->transaction_id 		= $value->transaction_id : "";
			isset($value->contact_id) 			? $obj->contact_id 			= $value->contact_id : "";
			$obj->time = date("Y-m-d h:i:s");
			if($obj->save()){
				//Respsone
				$data["results"][] = array(
					"id" 						=> $obj->id,
					"cashier_session_id" 		=> $obj->cashier_session_id,
					"amount" 					=> $obj->amount,
					"contact_id" 				=> $obj->contact_id,
					"transaction_id" 			=> $obj->transaction_id,
					"time" 						=> $obj->time,
				);
			}
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	//Currency
	function currency_get() {
		$filters 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$obj = new Cashier_currency(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
		 			"id"     				=> $value->id,
				   	"cashier_session_id" 	=> $value->cashier_session_id,
				   	"type" 					=> $value->type,
				   	"currency" 				=> $value->currency,
				   	"locale" 				=> $value->locale,
				   	"amount" 				=> $value->amount
		 		);
			}
		}
		//Response Data		
		$this->response($data, 200);
	}
	function currency_post() {
		$models = json_decode($this->post('models'));
		foreach ($models as $value) {
			$obj = new Cashier_currency(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->cashier_session_id) 	? $obj->cashier_session_id 	= $value->cashier_session_id : 0;
			isset($value->type) 				? $obj->type 				= $value->type : 0;
			isset($value->currency) 			? $obj->currency 			= $value->currency : "KHR";
			isset($value->rate) 				? $obj->rate 				= $value->rate : 1;
			isset($value->locale) 				? $obj->locale 				= $value->locale : "km-KH";
			isset($value->amount) 				? $obj->amount 				= $value->amount : "";
			if($obj->save()){
				//Respsone
				$data["results"][] = array(
					"id" 						=> $obj->id,
					"cashier_session_id" 		=> $obj->cashier_session_id,
					"type" 						=> $obj->type,
					"currency" 					=> $obj->currency,
					"locale" 					=> $obj->locale,
					"rate" 						=> $obj->rate,
					"amount" 					=> $obj->amount
				);
			}
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	//Total Receive
	function total_receive_get() {
		$filters 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$obj = new Cashier_session_receive(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
		$Total = 0;
		$CountContact = 0;
		$con_id = array();
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		if($obj->result_count()>0){
			foreach ($obj as $value) {
		 		$Total += $value->amount;
		 		if (in_array($value->contact_id, $con_id)) {

		 		}else{
		 			$CountContact += 1;
		 			array_push($con_id, $value->contact_id);
		 		}
			}
		}
		$data["results"][] = array(	
		   	"total_amount" 				=> $Total,
		   	"total_contact" 			=> $CountContact
 		);
		//Response Data		
		$this->response($data, 200);
	}
}
/* End of file locations.php */
/* Location: ./application/controllers/api/locations.php */