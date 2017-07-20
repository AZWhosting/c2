<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Choulr extends REST_Controller {	
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
	//Property Type
	function property_type_get(){
		$data["results"] = [];
		$data["count"] = 0;
		$obj = new Choulr_property_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->get_iterated();
		if($obj->exists()){
			foreach ($obj as $value) {
				$data["results"][] = array(
					"id" 				=> $value->id,
					"name" 				=> $value->name
				);
			}
		}
		//Response Data
		$this->response($data, 200);
	}
	//Property 
	function property_get(){
		$data["results"] = [];
		$data["count"] = 0;
		$obj = new Choulr_property(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->get_iterated();
		if($obj->exists()){
			foreach ($obj as $value) {
				$type = new Choulr_property_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$type->where("id", $value->type)->limit(1)->get();
				$data["results"][] = array(
					"id" 		=> $value->id,
					"type"		=> $value->type,
					"type_name" => $type->name,
			   		"name" 		=> $value->name,
			   		"abbr" 		=> $value->abbr,
			   		"status" 	=> $value->status
				);
			}
		}
		//Response Data
		$this->response($data, 200);
	}
	function property_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Choulr_property(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->type) 	? $obj->type 		= $value->type : 0;
			isset($value->name) 	? $obj->name 		= $value->name : "";
			isset($value->abbr) 	? $obj->abbr 		= $value->abbr : "";
			isset($value->status) 	? $obj->status 		= $value->status : 0;
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" => $obj->id,
			   		"type" => $obj->type,
			   		"name" => $obj->name,
			   		"abbr" => $obj->abbr,
			   		"status" => $obj->status
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);	
	}
	function property_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Choulr_property(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			isset($value->type) 	? $obj->type 		= $value->type : 0;
			isset($value->name) 	? $obj->name 		= $value->name : "";
			isset($value->abbr) 	? $obj->abbr 		= $value->abbr : "";
			isset($value->status) 	? $obj->status 		= $value->status : 0;
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" => $obj->id,
			   		"type" => $obj->type,
			   		"name" => $obj->name,
			   		"abbr" => $obj->abbr,
			   		"status" => $obj->status
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 200);
	}
	//Location
	function location_get(){
		$data["results"] = [];
		$data["count"] = 0;
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$obj = new Choulr_location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		//Filter
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter["filters"] as $value) {
	    		if(isset($value["operator"])) {
					$obj->{$value["operator"]}($value["field"], $value["value"]);
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
				$property = new Choulr_property(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$property->where("id", $value->property_id)->limit(1)->get();
				$data["results"][] = array(
					"id" 				=> $value->id,
					"property_id"		=> $value->property_id,
					"main_location"		=> $value->main_location,
					"property_name" 	=> $property->name,
			   		"name" 				=> $value->name,
			   		"abbr" 				=> $value->abbr
				);
			}
		}
		//Response Data
		$this->response($data, 200);
	}
	function location_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Choulr_location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->property_id) 		? $obj->property_id 	= $value->property_id : 0;
			isset($value->main_location) 	? $obj->main_location 	= $value->main_location : 0;
			isset($value->name) 			? $obj->name 			= $value->name : "";
			isset($value->abbr) 			? $obj->abbr 			= $value->abbr : "";
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id,
			   		"property_id" 	=> $obj->property_id,
			   		"main_location" => $obj->main_location,
			   		"name" 			=> $obj->name,
			   		"abbr" 			=> $obj->abbr
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);	
	}
	function location_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Choulr_location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			isset($value->property_id) 		? $obj->property_id 	= $value->property_id : 0;
			isset($value->main_location) 	? $obj->main_location 	= $value->main_location : 0;
			isset($value->name) 			? $obj->name 			= $value->name : "";
			isset($value->abbr) 			? $obj->abbr 			= $value->abbr : "";
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 				=> $obj->id,
			   		"property_id" 		=> $obj->property_id,
			   		"main_location" 	=> $obj->main_location,
			   		"name" 				=> $obj->name,
			   		"abbr" 				=> $obj->abbr
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 200);
	}
	//Tariff
	function tariff_post() {
		$requestedData = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach($requestedData as $row) {
			$table = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$table->is_flat 	= isset($row->is_flat) ? $row->is_flat : 0;
			$table->currency_id = isset($row->currency) ? $row->currency : 1;
			$table->type 		= isset($row->type) ? $row->type : null;
			$table->unit 		= isset($row->unit)?$row->unit:null;
			$table->amount 		= isset($row->amount) ? $row->amount : 0;
			$table->usage 		= isset($row->usage)?$row->usage:0;
			$table->name 		= isset($row->name)?$row->name:null;
			$table->account_id 	= isset($row->account->id)?$row->account->id:0;
			$table->is_active 	= isset($row->is_active) ? $row->is_active : 1;
			$table->is_deleted 	= 0;
			$table->tariff_id 	= 0;
			if($table->save()) {
				//Water
				$itemW = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$itemW->is_flat = 0;
				$itemW->currency_id = $table->currency_id;
				$itemW->type = $table->type;
				$itemW->unit = "w";
				$itemW->amount = 0;
				$itemW->usage = 0;
				$itemW->account_id = $table->account_id;
				$itemW->tariff_id = $table->id;
				$itemW->name = "តម្លៃទូទៅសម្រាប់ទឹក";
				$itemW->save();
				//Electric
				$itemE = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$itemE->is_flat = 0;
				$itemE->currency_id = $table->currency_id;
				$itemE->type = $table->type;
				$itemE->unit = "e";
				$itemE->amount = 0;
				$itemE->usage = 0;
				$itemE->account_id = $table->account_id;
				$itemE->tariff_id = $table->id;
				$itemE->name = "តម្លៃទូទៅសម្រាប់ភ្លើង";
				$itemE->save();
				$data["results"][] = array(
					"id"  	  		=> $table->id,
					"is_flat" 		=> $table->is_flat,
					"currency_id"	=> $table->currency_id,
					"tariff_id" 	=> $table->tariff_id,
					"type" 	  		=> $table->type,
					"unit" 	  		=> $table->unit,
					"amount"  		=> $table->amount,
					"account" 		=> $row->account,
					"usage"   		=> $table->usage
				);
			}
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	//Generate invoice number
	public function _generate_number($type, $date){
		$YY = date("y");
		$MM = date("m");
		$startDate = date("Y")."-01-01";
		$endDate = date("Y")."-12-31";

		if(isset($date)){
			$YY = date('y', strtotime($date));
			$MM = date('m', strtotime($date));
			$startDate = $YY."-01-01";
			$endDate = $YY."-12-31";
		}

		$prefix = new Prefix(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$prefix->where('type', $type);
		$prefix->limit(1);
		$prefix->get();

		$headerWithDate = $prefix->abbr . $YY . $MM;

		$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$txn->where('type', $type);
		$txn->where("issued_date >=", $startDate);
		$txn->where("issued_date <=", $endDate);
		$txn->where('is_recurring <>', 1);
		$txn->order_by('id', 'desc');
		$txn->limit(1);
		$txn->get();

		$number = "";
		if($txn->exists()){
			$no = 0;
			if(strlen($txn->number)>10){
				$no = intval(substr($txn->number, strlen($txn->number) - 5));
			}
			$no++;

			$number = $headerWithDate . str_pad($no, 5, "0", STR_PAD_LEFT);
		}else{
			//Check existing txn
			$existTxn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$existTxn->where('type', $type);
			$existTxn->where('is_recurring <>', 1);
			$existTxn->limit(1);
			$existTxn->get();

			if($existTxn->exists()){
				$number = $headerWithDate . str_pad(1, 5, "0", STR_PAD_LEFT);
			}else{
				$number = $headerWithDate . str_pad($prefix->startup_number, 5, "0", STR_PAD_LEFT);
			}
		}

		return $number;
	}
	
	function index_get(){
	}
	
}
/* End of file meters.php */
/* Location: ./application/controllers/api/meters.php */