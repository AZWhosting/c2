
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Offlines extends REST_Controller {	
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
	//Contact
	function contacts_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
		if(!empty($filter['filters']) && isset($filter['filters'])){
	    	foreach ($filter['filters'] as $value) {
	    		$obj->where($value["field"], $value["value"]);
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
		$itempro = [];
		if($obj->exists()){
			foreach ($obj as $value) {
		 		$data["results"][] = array(
		 			"id" 						=> $value->id,
					"contact_type_id" 			=> $value->contact_type_id,
					"abbr" 						=> $value->abbr,
					"number" 					=> $value->number,
					"name" 						=> $value->name,
					"gender"					=> $value->gender,
					"phone" 					=> $value->phone,
					"address" 					=> $value->address,
					"account_id" 				=> $value->account_id,
					"status" 					=> $value->sync
		 		);
			}
		}

		//Response Data		
		$this->response($data, 200);
	}
	//Contact
	function property_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Property(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
		if(!empty($filter['filters']) && isset($filter['filters'])){
	    	foreach ($filter['filters'] as $value) {
	    		$obj->where($value["field"], $value["value"]);
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
				$contact = $value->contact->get();
		 		$data["results"][] = array(
					"contact_name" 				=> $contact->name,
					"abbr" 						=> $value->abbr,
					"name" 						=> $value->name,
					"status" 					=> $value->sync,
					"code"						=> $value->code
		 		);
			}
		}
		//Response Data		
		$this->response($data, 200);
	}
	//Meter
	function meter_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");	

		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
	    	foreach ($filter["filters"] as $value) {
	    		$obj->where($value["field"], $value["value"]);
			}
		}		
		$obj->where("status", 1);
		//Get Result
		$obj->order_by('id','asc');
		//Results
		if($page && $limit){
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
		}else{
			$obj->get_iterated();
			$data["count"] = $obj->result_count();
		}
		if($obj->result_count()>0){			
			foreach ($obj as $value) {
				//Results				
				$data["results"][] = array(
					"id" 					=> floatval($value->id),
					"meter_number" 			=> $value->number,
					"property_id" 			=> $value->property_id,
					"contact_id" 			=> $value->contact_id,
					"type"					=> $value->type,
					"worder" 				=> $value->worder,
					"status" 				=> $value->status,
					"number_digit"			=> $value->number_digit,
					"plan_id"				=> $value->plan_id,
					"starting_no" 			=> $value->startup_reading,
					"location_id" 			=> intval($value->location_id),
					"pole_id" 				=> intval($value->pole_id),
					"box_id" 				=> intval($value->box_id),
					"ampere_id" 			=> intval($value->ampere_id),
					"phase_id" 				=> intval($value->phase_id),
					"voltage_id" 			=> intval($value->voltage_id),
					"branch_id" 			=> intval($value->branch_id),
					"multiplier" 			=> $value->multiplier,
					"date_used" 			=> $value->date_used,
					"reactive_id" 			=> intval($value->reactive_id),
					"reactive_status" 		=> $value->reactive_status,
					"status_sync"			=> $value->sync
				);
			}
		}
		//Response Data		
		$this->response($data, 200);	
	}
	//Record
	function record_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");	
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
	    	foreach ($filter["filters"] as $value) {
	    		$obj->where($value["field"], $value["value"]);
			}
		}		
		$obj->where("deleted <>", 1);
		//Get Result
		$obj->order_by('id','asc');
		//Results
		if($page && $limit){
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
		}else{
			$obj->get_iterated();
			$data["count"] = $obj->result_count();
		}
		if($obj->result_count()>0){			
			foreach ($obj as $value) {
				$meter = $value->meter->get();
				//Results				
				$data["results"][] = array(
					"meter_number" 			=> $meter->number,
					"previous" 				=> $value->previous,
					"current" 				=> $value->current,
					"usage" 				=> $value->usage,
					"month_of" 				=> $value->month_of,
					"from_date" 				=> $value->from_date,
					"to_date" 				=> $value->to_date,
					"invoiced" 				=> $value->invoiced,
					"status"				=> $value->sync
				);
			}
		}
		//Response Data		
		$this->response($data, 200);	
	}
	//Installment
	function installment_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");	
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Installment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
	    	foreach ($filter["filters"] as $value) {
	    		$obj->where($value["field"], $value["value"]);
			}
		}
		//Get Result
		$obj->order_by('id','asc');
		//Results
		if($page && $limit){
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
		}else{
			$obj->get_iterated();
			$data["count"] = $obj->result_count();
		}
		if($obj->result_count()>0){			
			foreach ($obj as $value) {
				$meter = $value->meter->get();
				//Results				
				$data["results"][] = array(
					"meter_number" 			=> $meter->number,
					"start_month" 			=> $value->start_month,
					"percentage" 			=> $value->percentage,
					"amount" 				=> $value->amount,
					"period" 				=> $value->period,
					"payment_number" 		=> $value->payment_number
				);
			}
		}
		//Response Data		
		$this->response($data, 200);	
	}
	//Installment Schedule
	function insitem_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");	
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Installment_schedule(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
	    	foreach ($filter["filters"] as $value) {
	    		$obj->where($value["field"], $value["value"]);
			}
		}
		//Get Result
		$obj->order_by('id','asc');
		//Results
		if($page && $limit){
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
		}else{
			$obj->get_iterated();
			$data["count"] = $obj->result_count();
		}
		if($obj->result_count() > 0){			
			foreach ($obj as $value) {
				$install = new Installment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$install->where("id", $value->installment_id)->order_by("id", "desc")->limit(1)->get();
				$meter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$meter->where("id", $install->meter_id)->order_by("id", "desc")->limit(1)->get();
				//Results				
				$data["results"][] = array(
					"meter_number" 			=> $meter->number,
					"date" 					=> $value->date,
					"amount" 				=> $value->amount,
					"invoiced" 				=> $value->invoiced
				);
			}
		}
		//Response Data		
		$this->response($data, 200);	
	}
}
/* End of file meters.php */
/* Location: ./application/controllers/api/meters.php */