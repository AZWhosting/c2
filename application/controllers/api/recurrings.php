<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Recurrings extends REST_Controller {
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
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Recurring(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
		if(!empty($filter["filters"]) && isset($filter["filters"])){
	    	foreach ($filter["filters"] as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
					$obj->where($value["field"], $value["value"]);
				}
			}
		}
		
		$obj->where("deleted <>", 1);

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
					"id" 				=> $value->id,
					"transaction_id"	=> $value->transaction_id,
					"user_id" 			=> $value->user_id,
				   	"name" 				=> $value->name,
				   	"type" 				=> $value->type,
				   	"start_date"		=> $value->start_date,
				   	"end_date" 			=> $value->end_date,
				   	"frequency"			=> $value->frequency,
					"month_option"		=> $value->month_option,
					"interval" 			=> $value->interval,
					"day" 				=> $value->day,
					"week" 				=> $value->week,
					"month" 			=> $value->month,
					"status" 			=> $value->status,
					"deleted" 			=> $value->deleted
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
		
		$number = "";
		foreach ($models as $value) {
			$obj = new Recurring(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->transaction_id) 	? $obj->transaction_id 	= $value->transaction_id : "";
			isset($value->user_id) 			? $obj->user_id 		= $value->user_id : "";
			isset($value->name) 			? $obj->name 			= $value->name : "";
			isset($value->type) 			? $obj->type 			= $value->type : "";
		   	isset($value->start_date) 		? $obj->start_date 		= $value->start_date : "";
		   	isset($value->end_date) 		? $obj->end_date 		= $value->end_date : "";
		   	isset($value->frequency) 		? $obj->frequency 		= $value->frequency : "";
		   	isset($value->month_option) 	? $obj->month_option 	= $value->month_option : "";
		   	isset($value->interval) 		? $obj->interval 		= $value->interval : "";
		   	isset($value->day) 				? $obj->day 			= $value->day : "";
		   	isset($value->week) 			? $obj->week 			= $value->week : "";
		   	isset($value->month) 			? $obj->month 			= $value->month : "";
		   	isset($value->status) 			? $obj->status 			= $value->status : "";
		   	isset($value->deleted) 			? $obj->deleted 		= $value->deleted : "";
		   	
	   		if($obj->save($related)){
			   	$data["results"][] = array(
			   		"id" 				=> $obj->id,
					"transaction_id"	=> $obj->transaction_id,
					"user_id" 			=> $obj->user_id,
				   	"name" 				=> $obj->name,
				   	"type" 				=> $obj->type,
				   	"start_date"		=> $obj->start_date,
				   	"end_date" 			=> $obj->end_date,
				   	"frequency"			=> $obj->frequency,
					"month_option"		=> $obj->month_option,
					"interval" 			=> $obj->interval,
					"day" 				=> $obj->day,
					"week" 				=> $obj->week,
					"month" 			=> $obj->month,
					"status" 			=> $obj->status,
					"deleted" 			=> $obj->deleted
			   	);
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}

	//PUT
	function index_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {
			$obj = new Recurring(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);			

			isset($value->transaction_id) 	? $obj->transaction_id 	= $value->transaction_id : "";
			isset($value->user_id) 			? $obj->user_id 		= $value->user_id : "";
			isset($value->name) 			? $obj->name 			= $value->name : "";
			isset($value->type) 			? $obj->type 			= $value->type : "";
		   	isset($value->start_date) 		? $obj->start_date 		= $value->start_date : "";
		   	isset($value->end_date) 		? $obj->end_date 		= $value->end_date : "";
		   	isset($value->frequency) 		? $obj->frequency 		= $value->frequency : "";
		   	isset($value->month_option) 	? $obj->month_option 	= $value->month_option : "";
		   	isset($value->interval) 		? $obj->interval 		= $value->interval : "";
		   	isset($value->day) 				? $obj->day 			= $value->day : "";
		   	isset($value->week) 			? $obj->week 			= $value->week : "";
		   	isset($value->month) 			? $obj->month 			= $value->month : "";
		   	isset($value->status) 			? $obj->status 			= $value->status : "";
		   	isset($value->deleted) 			? $obj->deleted 		= $value->deleted : "";

			if($obj->save($related)){
				//Results
				$data["results"][] = array(
					"id" 				=> $obj->id,
					"transaction_id"	=> $obj->transaction_id,
					"user_id" 			=> $obj->user_id,
				   	"name" 				=> $obj->name,
				   	"type" 				=> $obj->type,
				   	"start_date"		=> $obj->start_date,
				   	"end_date" 			=> $obj->end_date,
				   	"frequency"			=> $obj->frequency,
					"month_option"		=> $obj->month_option,
					"interval" 			=> $obj->interval,
					"day" 				=> $obj->day,
					"week" 				=> $obj->week,
					"month" 			=> $obj->month,
					"status" 			=> $obj->status,
					"deleted" 			=> $obj->deleted
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
			$obj = new Recurring(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
		}

		//Response data
		$this->response($data, 200);
	}
}
/* End of file recurrings.php */
/* Location: ./application/controllers/api/recurrings.php */
