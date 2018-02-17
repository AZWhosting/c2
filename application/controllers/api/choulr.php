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
		$filter 	= $this->get("filter");
		$obj = new Choulr_property(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
		$obj->get_iterated();
		$data["count"] = $obj->result_count();
		if($obj->exists()){
			foreach ($obj as $value) {
				$type = new Choulr_property_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$type->where("id", $value->type)->limit(1)->get();
				$data["results"][] = array(
					"id" 			=> $value->id,
					"type_id"		=> $value->type_id,
					"number" 		=> $value->number,
					"name" 			=> $value->name,
					"abbr" 			=> $value->abbr,
					"code" 			=> $value->code,
					"currency" 		=> $value->currency,
					"status" 		=> $value->status,
					"latitute" 		=> $value->latitute,
					"longtitute" 	=> $value->longtitute,
					"address" 		=> $value->address,
					"country_id" 	=> $value->country_id,
					"province_id" 	=> $value->province_id,
					"district_id" 	=> $value->district_id,
					"total_area" 	=> $value->total_area,
					"area_of_service" => $value->area_of_service,
					"building_type" => $value->building_type,
					"mobile" 		=> $value->mobile,
					"telephone" 	=> $value->telephone,
					"email" 		=> $value->email,
					"area_for_rent" => $value->area_for_rent,
					"common_area" 	=> $value->common_area,
					"near_by" 		=> $value->near_by,
					"terms_condition" => $value->terms_condition,
					"img1" 			=> $value->img1,
					"img2" 			=> $value->img2,
					"img3" 			=> $value->img3
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

			isset($value->type_id) 		? $obj->type_id 		= $value->type_id : 0;
			isset($value->number)		? $obj->number 		= $value->number : "";
			isset($value->name)			? $obj->name 		= $value->name : "";
			isset($value->abbr)			? $obj->abbr  		= $value->abbr : "";
			isset($value->code)			? $obj->code 		= $value->code : "";
			isset($value->currency)		? $obj->currency 	= $value->currency : "";
			isset($value->status)		? $obj->status 		= $value->status : "";
			isset($value->latitute)		? $obj->latitute 	= $value->latitute : "";
			isset($value->longtitute)	? $obj->longtitute 	= $value->longtitute : "";
			isset($value->address)		? $obj->address 	= $value->address : "";
			isset($value->country_id)	? $obj->country_id 	= $value->country_id : "";
			isset($value->province_id)	? $obj->province_id = $value->province_id : "";
			isset($value->district_id)	? $obj->district_id = $value->district_id : "";
			isset($value->total_area)	? $obj->total_area 	= $value->total_area : "";
			isset($value->area_of_service)			? $obj->area_of_service 		= $value->area_of_service : "";
			isset($value->building_type)? $obj->building_type = $value->building_type : "";
			isset($value->mobile)		? $obj->mobile 		= $value->mobile : "";
			isset($value->telephone)	? $obj->telephone 	= $value->telephone : "";
			isset($value->email)		? $obj->email 		= $value->email : "";
			isset($value->area_for_rent)? $obj->area_for_rent = $value->area_for_rent : "";
			isset($value->common_area)	? $obj->common_area = $value->common_area : "";
			isset($value->near_by)		? $obj->near_by 	= $value->near_by : "";
			isset($value->terms_condition)		? $obj->terms_condition 	= $value->terms_condition : "";
			isset($value->img1)			? $obj->img1 		= $value->img1 : "";
			isset($value->img2)			? $obj->img2 		= $value->img2 : "";
			isset($value->img3)			? $obj->img3 		= $value->img3 : "";

	   		if($obj->save()){
			   	$data["results"][] = array(
					"id" 			=> $obj->id,
					"type_id"			=> $obj->type_id,
					"number" 		=> $obj->number,
					"name" 			=> $obj->name,
					"abbr" 			=> $obj->abbr,
					"code" 			=> $obj->code,
					"currency" 		=> $obj->currency,
					"status" 		=> $obj->status,
					"latitute" 		=> $obj->latitute,
					"longtitute" 	=> $obj->longtitute,
					"address" 		=> $obj->address,
					"country_id" 	=> $obj->country_id,
					"province_id" 	=> $obj->province_id,
					"district_id" 	=> $obj->district_id,
					"total_area" 	=> $obj->total_area,
					"area_of_service" => $obj->area_of_service,
					"building_type" => $obj->building_type,
					"mobile" 		=> $obj->mobile,
					"telephone" 	=> $obj->telephone,
					"email" 		=> $obj->email,
					"area_for_rent" => $obj->area_for_rent,
					"common_area" 	=> $obj->common_area,
					"near_by" 		=> $obj->near_by,
					"terms_condition" => $obj->terms_condition,
					"img1" 			=> $obj->img1,
					"img2" 			=> $obj->img2,
					"img3" 			=> $obj->img3
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

			isset($value->type_id) 		? $obj->type_id 		= $value->type_id : 0;
			isset($value->number)		? $obj->number 		= $value->number : "";
			isset($value->name)			? $obj->name 		= $value->name : "";
			isset($value->abbr)			? $obj->abbr  		= $value->abbr : "";
			isset($value->code)			? $obj->code 		= $value->code : "";
			isset($value->currency)		? $obj->currency 	= $value->currency : "";
			isset($value->status)		? $obj->status 		= $value->status : "";
			isset($value->latitute)		? $obj->latitute 	= $value->latitute : "";
			isset($value->longtitute)	? $obj->longtitute 	= $value->longtitute : "";
			isset($value->address)		? $obj->address 	= $value->address : "";
			isset($value->country_id)	? $obj->country_id 	= $value->country_id : "";
			isset($value->province_id)	? $obj->province_id = $value->province_id : "";
			isset($value->district_id)	? $obj->district_id = $value->district_id : "";
			isset($value->total_area)	? $obj->total_area 	= $value->total_area : "";
			isset($value->area_of_service)			? $obj->area_of_service 		= $value->area_of_service : "";
			isset($value->building_type)? $obj->building_type = $value->building_type : "";
			isset($value->mobile)		? $obj->mobile 		= $value->mobile : "";
			isset($value->telephone)	? $obj->telephone 	= $value->telephone : "";
			isset($value->email)		? $obj->email 		= $value->email : "";
			isset($value->area_for_rent)? $obj->area_for_rent = $value->area_for_rent : "";
			isset($value->common_area)	? $obj->common_area = $value->common_area : "";
			isset($value->near_by)		? $obj->near_by 	= $value->near_by : "";
			isset($value->terms_condition)		? $obj->terms_condition 	= $value->terms_condition : "";
			isset($value->img1)			? $obj->img1 		= $value->img1 : "";
			isset($value->img2)			? $obj->img2 		= $value->img2 : "";
			isset($value->img3)			? $obj->img3 		= $value->img3 : "";

	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id,
					"type_id"			=> $obj->type_id,
					"number" 		=> $obj->number,
					"name" 			=> $obj->name,
					"abbr" 			=> $obj->abbr,
					"code" 			=> $obj->code,
					"currency" 		=> $obj->currency,
					"status" 		=> $obj->status,
					"latitute" 		=> $obj->latitute,
					"longtitute" 	=> $obj->longtitute,
					"address" 		=> $obj->address,
					"country_id" 	=> $obj->country_id,
					"province_id" 	=> $obj->province_id,
					"district_id" 	=> $obj->district_id,
					"total_area" 	=> $obj->total_area,
					"area_of_service" => $obj->area_of_service,
					"building_type" => $obj->building_type,
					"mobile" 		=> $obj->mobile,
					"telephone" 	=> $obj->telephone,
					"email" 		=> $obj->email,
					"area_for_rent" => $obj->area_for_rent,
					"common_area" 	=> $obj->common_area,
					"near_by" 		=> $obj->near_by,
					"terms_condition" => $obj->terms_condition,
					"img1" 			=> $obj->img1,
					"img2" 			=> $obj->img2,
					"img3" 			=> $obj->img3
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 200);
	}
	//Location
	function area_get(){
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
					"sub_location"		=> $value->sub_location,
					"property_name" 	=> $property->name,
			   		"name" 				=> $value->name,
			   		"abbr" 				=> $value->abbr
				);
			}
		}
		//Response Data
		$this->response($data, 200);
	}
	function area_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Choulr_location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->property_id) 		? $obj->property_id 	= $value->property_id : 0;
			isset($value->main_location) 	? $obj->main_location 	= $value->main_location : 0;
			isset($value->sub_location) 	? $obj->sub_location 	= $value->sub_location : 0;
			isset($value->name) 			? $obj->name 			= $value->name : "";
			isset($value->abbr) 			? $obj->abbr 			= $value->abbr : "";
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id,
			   		"property_id" 	=> $obj->property_id,
			   		"main_location" => $obj->main_location,
			   		"sub_location" 	=> $obj->sub_location,
			   		"name" 			=> $obj->name,
			   		"abbr" 			=> $obj->abbr
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);	
	}
	function area_put() {
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
	function tariff_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$table = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$data = array();

		//Sort
		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				if(isset($value['operator'])){
					$table->{$value['operator']}($value["field"], $value["dir"]);
				}else{
					$table->order_by($value["field"], $value["dir"]);
				}
			}
		}

		//Filter
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter["filters"] as $value) {
	    		if(isset($value["operator"])) {
					$table->{$value["operator"]}($value["field"], $value["value"]);
				} else {
	    			$table->where($value["field"], $value["value"]);
				}
			}
		}

		$table->where('is_deleted', 0);
		// $table->order_by('usage','asc');
		//Results
		if($page && $limit){
			$table->get_paged_iterated($page, $limit);
			$data["count"] = $table->paged->total_rows;
		}else{
			$table->get_iterated();
			$data["count"] = $table->result_count();
		}
		if($table->exists()) {
			$data = array();
			foreach($table as $row) {
				$account = $row->account->get();
				$currency= $row->currency->get();
				$data[] = array(
					'id' => $row->id,
					"currency"				=> $row->currency_id,
					"_currency"				=> array(
												"id" => $currency->id,
												"code" => $currency->code,
												"locale" => $currency->locale
					),
					'name' => $row->name,
					'is_flat' => $row->is_flat,
					'type' => $row->type,
					'usage' 	=> intval($row->usage),
					'tariff_id' => $row->tariff_id,
					'unit' 	=> $row->unit,
					"account" => $account->exists() ? array('id' => $account->id, 'name' => $account->name) : array('id'=>null, 'name'=> null),
					'amount'=> floatval($row->amount)
				);
			}
			$this->response(array('results'=> $data, 'count' => count($data)), 200);
		} else {
			$this->response(array('results'=> array(), 'count' => 0), 400);
		}
	}
	function tariff_post() {
		$requestedData = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach($requestedData as $row) {
			$table = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$table->is_flat 	= isset($row->is_flat) ? $row->is_flat : 0;
			$table->currency_id = isset($row->currency) ? $row->currency : 1;
			$table->type 		= isset($row->type) ? $row->type : null;
			$table->unit 		= isset($row->unit)	?$row->unit:null;
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
	function tariff_put() {
		$requestedData = json_decode($this->put('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach($requestedData as $row) {
			$table = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$table->get_by_id($row->id);
			$table->is_flat 	= isset($row->is_flat) ? $row->is_flat : 0;
			$table->currency_id = isset($row->currency) ? $row->currency : 1;
			$table->type 		= isset($row->type) ? $row->type : null;
			$table->unit 		= isset($row->unit)	?$row->unit:null;
			$table->amount 		= isset($row->amount) ? $row->amount : 0;
			$table->usage 		= isset($row->usage)?$row->usage:0;
			$table->name 		= isset($row->name)?$row->name:null;
			$table->account_id 	= isset($row->account->id)?$row->account->id:0;
			$table->is_active 	= isset($row->is_active) ? $row->is_active : 1;
			$table->is_deleted 	= 0;
			$table->tariff_id 	= isset($row->tariff_id)?$row->tariff_id:0;
			if($table->save()) {
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
		$this->response($data, 200);
	}
	function tariff_item_post() {
		$requestedData = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach($requestedData as $row) {
			$table = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$table->is_flat 	= isset($row->is_flat) ? $row->is_flat : 0;
			$table->currency_id = isset($row->currency) ? $row->currency : 1;
			$table->type 		= isset($row->type) ? $row->type : null;
			$table->unit 		= isset($row->unit)	?$row->unit:null;
			$table->amount 		= isset($row->amount) ? $row->amount : 0;
			$table->usage 		= isset($row->usage)?$row->usage:0;
			$table->name 		= isset($row->name)?$row->name:null;
			$table->account_id 	= isset($row->account->id)?$row->account->id : 0;
			$table->is_active 	= isset($row->is_active) ? $row->is_active : 1;
			$table->tariff_id 	= isset($row->tariff_id) ? $row->tariff_id : 0;
			if($table->save()) {
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
	function tariff_main_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$table = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$data = array();

		//Sort
		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				if(isset($value['operator'])){
					$table->{$value['operator']}($value["field"], $value["dir"]);
				}else{
					$table->order_by($value["field"], $value["dir"]);
				}
			}
		}

		//Filter
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter["filters"] as $value) {
	    		if(isset($value["operator"])) {
					$table->{$value["operator"]}($value["field"], $value["value"]);
				} else {
	    			$table->where($value["field"], $value["value"]);
				}
			}
		}

		$table->where('tariff_id', 0);
		$table->where('type', 'tariff');
		// $table->order_by('usage','asc');
		//Results
		if($page && $limit){
			$table->get_paged_iterated($page, $limit);
			$data["count"] = $table->paged->total_rows;
		}else{
			$table->get_iterated();
			$data["count"] = $table->result_count();
		}
		if($table->exists()) {
			$data = array();
			foreach($table as $row) {
				$account = $row->account->get();
				$currency= $row->currency->get();
				$data[] = array(
					'id' => $row->id,
					"currency"				=> $row->currency_id,
					"_currency"				=> array(
												"id" => $currency->id,
												"code" => $currency->code,
												"locale" => $currency->locale
					),
					'name' => $row->name,
					'is_flat' => $row->is_flat,
					'type' => $row->type,
					'usage' 	=> intval($row->usage),
					'tariff_id' => $row->tariff_id,
					'unit' 	=> $row->unit,
					"account" => $account->exists() ? array('id' => $account->id, 'name' => $account->name) : array('id'=>null, 'name'=> null),
					'amount'=> floatval($row->amount)
				);
			}
			$this->response(array('results'=> $data, 'count' => count($data)), 200);
		} else {
			$this->response(array('results'=> array(), 'count' => 0), 400);
		}
	}
	//Choulrmeter
	//GET
	function choulrmeter_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;

		$obj = new Choulr_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
				$data["results"][] = array(
					"id" 			=> $value->id,
					"multiplier" 			=> $value->multiplier,
			   		"number" 				=> $value->number,
					"number_digit" 			=> $value->number_digit,
					"tariff_id" 			=> intval($value->tariff_id),
					"starting_number" 		=> $value->starting_number,
					"status" 				=> $value->status,
					"register_date" 		=> $value->register_date,
					"order" 				=> $value->order,
					"latitute" 				=> $value->latitute,
					"longtitute" 			=> $value->longtitute,
					"contract_id" 			=> $value->contract_id,
					"type" 					=> $value->type,
				);	
			}
		}

		//Response Data
		$this->response($data, 200);
	}
	//POST
	function choulrmeter_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {
			
			$obj = new Choulr_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			isset($value->multiplier) 				? $obj->multiplier 					= $value->multiplier : "";
			isset($value->number) 					? $obj->number 						= $value->number : "";
			isset($value->number_digit) 			? $obj->number_digit 				= $value->number_digit : "";
			isset($value->tariff_id) 				? $obj->tariff_id 					= $value->tariff_id : "";
			isset($value->starting_number) 			? $obj->starting_number 		= $value->starting_number : "";
			isset($value->status) 					? $obj->status 						= $value->status : "";
			isset($value->register_date) 			? $obj->register_date 				= $value->register_date : "";
			isset($value->order) 					? $obj->order 						= $value->order : "";
			isset($value->latitute) 				? $obj->latitute 					= $value->latitute : "";
			isset($value->longtitute) 				? $obj->longtitute 					= $value->longtitute : "";
			isset($value->contract_id) 				? $obj->contract_id 				= $value->contract_id : "";
			isset($value->type) 					? $obj->type 						= $value->type : "";
	   		if($obj->save()){
	   			$record = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$record->meter_id = $obj->id;
	   			$record->previous = 0;
	   			$record->invoiced =1;
	   			$record->current = $obj->starting_number;
	   			$record->from_date = $obj->register_date;
	   			$record->to_date = $obj->register_date;
	   			$record->month_of = $obj->register_date;
	   			$record->new_round = 0;
	   			$record->save();
			   	$data["results"][] = array(
			   		"id" 					=> $obj->id,
			   		"multiplier" 			=> $obj->multiplier,
			   		"number" 				=> $value->number,
					"number_digit" 			=> $value->number_digit,
					"tariff_id" 			=> intval($value->tariff_id),
					"starting_number" 		=> $value->starting_number,
					"status" 				=> $value->status,
					"register_date" 		=> $value->register_date,
					"order" 				=> $value->order,
					"latitute" 				=> $value->latitute,
					"longtitute" 			=> $value->longtitute,
					"type" 					=> $value->type,
			   	);
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	//PUT
	function choulrmeter_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {
			$obj = new Choulr_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			isset($value->multiplier) 				? $obj->multiplier 					= $value->multiplier : "";
			isset($value->number) 					? $obj->number 						= $value->number : "";
			isset($value->number_digit) 			? $obj->number_digit 				= $value->number_digit : "";
			isset($value->tariff_id) 				? $obj->tariff_id 					= $value->tariff_id : "";
			isset($value->starting_number) 			? $obj->starting_number 		= $value->starting_number : "";
			isset($value->status) 					? $obj->status 						= $value->status : "";
			isset($value->register_date) 			? $obj->register_date 				= $value->register_date : "";
			isset($value->order) 					? $obj->order 						= $value->order : "";
			isset($value->latitute) 				? $obj->latitute 					= $value->latitute : "";
			isset($value->longtitute) 				? $obj->longtitute 					= $value->longtitute : "";
			isset($value->contract_id) 				? $obj->contract_id 				= $value->contract_id : "";
			isset($value->type) 					? $obj->type 						= $value->type : "";
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 					=> $obj->id,
			   		"multiplier" 			=> $obj->multiplier,
			   		"number" 				=> $value->number,
					"number_digit" 			=> $value->number_digit,
					"tariff_id" 			=> intval($value->tariff_id),
					"starting_number" 		=> $value->starting_number,
					"status" 				=> $value->status,
					"register_date" 		=> $value->register_date,
					"order" 				=> $value->order,
					"latitute" 				=> $value->latitute,
					"longtitute" 			=> $value->longtitute,
					"contract_id" 			=> $value->contract_id,
					"type" 					=> $value->type,
				);
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 201);
	}
	//DELETE
	function choulrmeter_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Choulr_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
		}

		//Response data
		$this->response($data, 200);
	}
	//Contact 
	//GET 
	function contact_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_pattern = 0;
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
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter['filters'] as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
					if($value["field"]=="is_pattern"){
	    				$is_pattern = $value["value"];
	    			}else{
	    				$obj->where($value["field"], $value["value"]);
	    			}
				}
			}
		}
		$obj->where("is_pattern <>", 1);
		$obj->where("deleted <>", 1);
		$obj->where("is_system <>", 1);
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
		 			"id" 						=> $value->id,
					"branch_id" 				=> $value->branch_id,
					"country_id" 				=> $value->country_id,
					"ebranch_id" 				=> $value->ebranch_id,
					"elocation_id" 				=> $value->elocation_id,
					"wbranch_id" 				=> $value->wbranch_id,
					"wlocation_id" 				=> $value->wlocation_id,
					"user_id"					=> $value->user_id,
					"contact_type_id" 			=> $value->contact_type_id,
					"eorder" 					=> $value->eorder,
					"worder" 					=> $value->worder,
					"abbr" 						=> $value->abbr,
					"number" 					=> $value->number,
					"eabbr" 					=> $value->eabbr,
					"enumber" 					=> $value->enumber,
					"wabbr" 					=> $value->wabbr,
					"wnumber" 					=> $value->wnumber,
					"name" 						=> $value->name,
					"gender"					=> $value->gender,
					"dob" 						=> $value->dob,
					"pob" 						=> $value->pob,
					"latitute" 					=> $value->latitute,
					"longtitute" 				=> $value->longtitute,
					"credit_limit" 				=> $value->credit_limit,
					"locale" 					=> $value->locale,
					"id_number" 				=> $value->id_number,
					"phone" 					=> $value->phone,
					"email" 					=> $value->email,
					"website" 					=> $value->website,
					"job" 						=> $value->job,
					"vat_no" 					=> $value->vat_no,
					"family_member"				=> $value->family_member,
					"city" 						=> $value->city,
					"post_code" 				=> $value->post_code,
					"address" 					=> $value->address,
					"bill_to" 					=> $value->bill_to,
					"ship_to" 					=> $value->ship_to,
					"memo" 						=> $value->memo,
					"image_url" 				=> $value->image_url,
					"company" 					=> $value->company,
					"company_en" 				=> $value->company_en,
					"bank_name" 				=> $value->bank_name,
					"bank_address" 				=> $value->bank_address,
					"bank_account_name" 		=> $value->bank_account_name,
					"bank_account_number" 		=> $value->bank_account_number,
					"name_on_cheque" 			=> $value->name_on_cheque,
					"business_type_id" 			=> $value->business_type_id,
					"payment_term_id" 			=> $value->payment_term_id,
					"payment_method_id" 		=> $value->payment_method_id,
					"deposit_account_id"		=> $value->deposit_account_id,
					"trade_discount_id" 		=> $value->trade_discount_id,
					"settlement_discount_id"	=> $value->settlement_discount_id,
					"salary_account_id"			=> $value->salary_account_id,
					"account_id" 				=> $value->account_id,
					"ra_id" 					=> $value->ra_id,
					"tax_item_id" 				=> $value->tax_item_id,
					"phase_id" 					=> $value->phase_id,
					"voltage_id" 				=> $value->voltage_id,
					"ampere_id" 				=> $value->ampere_id,
					"registered_date" 			=> $value->registered_date,
					"use_electricity" 			=> $value->use_electricity,
					"use_water" 				=> $value->use_water,
					"is_local" 					=> $value->is_local,
					"is_pattern" 				=> intval($value->is_pattern),
					"status" 					=> $value->status,
					"is_system"					=> $value->is_system,
					"contact_type"				=> $value->contact_type_name
		 		);
			}
		}

		//Response Data		
		$this->response($data, 200);
	}
	//POST
	function contact_post() {
		$models = json_decode($this->post('models'));
		//Generate order number
		$lastContact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$lastContact->order_by('id', 'desc')->limit(1)->get();
		$last_id = intval($lastContact->id);

		foreach ($models as $value) {
			$last_id++;
			//Generate Number
			if(isset($value->number)){
				$number = $value->number;

				if($number==""){
					$number = $this->_generate_number($value->contact_type_id);
				}
			}else{
				$number = $this->_generate_number($value->contact_type_id);
			}
			
			if(isset($value->is_pattern)){
				if($value->is_pattern==1){
					$number = "";
				}
			}

			$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->branch_id) 				? $obj->branch_id 				= $value->branch_id : "";
			isset($value->country_id) 				? $obj->country_id 				= $value->country_id : "";
			isset($value->ebranch_id) 				? $obj->ebranch_id 				= $value->ebranch_id : "";
			isset($value->elocation_id) 			? $obj->elocation_id 			= $value->elocation_id : "";
			isset($value->wbranch_id) 				? $obj->wbranch_id 				= $value->wbranch_id : "";
			isset($value->wlocation_id) 			? $obj->wlocation_id			= $value->wlocation_id : "";
			isset($value->user_id)					? $obj->user_id 				= $value->user_id : "";
			isset($value->contact_type_id)			? $obj->contact_type_id 		= $value->contact_type_id : "";
			isset($value->eorder)					? $obj->eorder					= $last_id : "";
			isset($value->worder)					? $obj->worder					= $last_id : "";
			isset($value->abbr)						? $obj->abbr					= $value->abbr : "";
			$obj->number = $number;
			isset($value->eabbr)					? $obj->eabbr					= $value->eabbr : "";
			isset($value->enumber)					? $obj->enumber					= $value->enumber : "";
			isset($value->wabbr)					? $obj->wabbr					= $value->wabbr : "";
			isset($value->wnumber)					? $obj->wnumber					= $value->wnumber : "";
			isset($value->name)						? $obj->name					= $value->name : "";
			isset($value->gender)					? $obj->gender					= $value->gender : "";
			isset($value->dob)						? $obj->dob						= date("Y-m-d", strtotime($value->dob)) : "";
			isset($value->pob)						? $obj->pob						= $value->pob : "";
			isset($value->latitute)					? $obj->latitute 				= $value->latitute : "";
			isset($value->longtitute)				? $obj->longtitute 				= $value->longtitute : "";
			isset($value->credit_limit)				? $obj->credit_limit			= $value->credit_limit : "";
			isset($value->locale)					? $obj->locale					= $value->locale : "";
			isset($value->id_number)				? $obj->id_number				= $value->id_number : "";
			isset($value->phone)					? $obj->phone 					= $value->phone : "";
			isset($value->email)					? $obj->email 					= $value->email : "";
			isset($value->website)					? $obj->website					= $value->website : "";
			isset($value->job)						? $obj->job						= $value->job : "";
			isset($value->vat_no)					? $obj->vat_no					= $value->vat_no : "";
			isset($value->family_member)			? $obj->family_member			= $value->family_member : "";
			isset($value->city)						? $obj->city 					= $value->city : "";
			isset($value->post_code)				? $obj->post_code 				= $value->post_code : "";
			isset($value->address)					? $obj->address 				= $value->address : "";
			isset($value->bill_to)					? $obj->bill_to 				= $value->bill_to : "";
			isset($value->ship_to)					? $obj->ship_to 				= $value->ship_to : "";
			isset($value->memo)						? $obj->memo					= $value->memo : "";
			isset($value->image_url)				? $obj->image_url				= $value->image_url : "";
			isset($value->company)					? $obj->company					= $value->company : "";
			isset($value->company_en)				? $obj->company_en				= $value->company_en : "";
			isset($value->bank_name)				? $obj->bank_name				= $value->bank_name : "";
			isset($value->bank_address)				? $obj->bank_address			= $value->bank_address : "";
			isset($value->bank_account_name)		? $obj->bank_account_name		= $value->bank_account_name : "";
			isset($value->bank_account_number)		? $obj->bank_account_number		= $value->bank_account_number : "";
			isset($value->name_on_cheque)			? $obj->name_on_cheque			= $value->name_on_cheque : "";
			isset($value->business_type_id)			? $obj->business_type_id		= $value->business_type_id : "";
			isset($value->payment_term_id)			? $obj->payment_term_id			= $value->payment_term_id : "";
			isset($value->payment_method_id)		? $obj->payment_method_id		= $value->payment_method_id : "";
			isset($value->deposit_account_id)		? $obj->deposit_account_id		= $value->deposit_account_id : "";
			isset($value->trade_discount_id)		? $obj->trade_discount_id		= $value->trade_discount_id : "";
			isset($value->settlement_discount_id)	? $obj->settlement_discount_id	= $value->settlement_discount_id : "";
			isset($value->salary_account_id)		? $obj->salary_account_id		= $value->salary_account_id : "";
			isset($value->account_id)				? $obj->account_id				= $value->account_id : "";
			isset($value->ra_id)					? $obj->ra_id					= $value->ra_id : "";
			isset($value->tax_item_id)				? $obj->tax_item_id				= $value->tax_item_id : $obj->tax_item_id = 0;
			isset($value->phase_id)					? $obj->phase_id				= $value->phase_id : "";
			isset($value->voltage_id)				? $obj->voltage_id				= $value->voltage_id : "";
			isset($value->ampere_id)				? $obj->ampere_id				= $value->ampere_id : "";
			isset($value->registered_date)			? $obj->registered_date 		= date("Y-m-d", strtotime($value->registered_date)) : "";		
			isset($value->use_electricity)			? $obj->use_electricity			= $value->use_electricity : "";
			isset($value->use_water)				? $obj->use_water				= $value->use_water : "";
			isset($value->is_local)					? $obj->is_local				= $value->is_local : "";
			isset($value->is_pattern)				? $obj->is_pattern				= $value->is_pattern : "";
			isset($value->status)					? $obj->status					= $value->status : "";
			isset($value->deleted)					? $obj->deleted					= $value->deleted : "";
			isset($value->is_system)				? $obj->is_system				= $value->is_system : "";

			if($obj->save()){
				//Respsone
				$data["results"][] = array(
					"id" 						=> $obj->id,
					"branch_id" 				=> $obj->branch_id,
					"country_id" 				=> $obj->country_id,
					"ebranch_id" 				=> $obj->ebranch_id,
					"elocation_id" 				=> $obj->elocation_id,
					"wbranch_id" 				=> $obj->wbranch_id,
					"wlocation_id" 				=> $obj->wlocation_id,
					"user_id"					=> $obj->user_id,
					"contact_type_id" 			=> $obj->contact_type_id,
					"eorder" 					=> $obj->eorder,
					"worder" 					=> $obj->worder,
					"abbr" 						=> $obj->abbr,
					"number" 					=> $obj->number,
					"eabbr" 					=> $obj->eabbr,
					"enumber" 					=> $obj->enumber,
					"wabbr" 					=> $obj->wabbr,
					"wnumber" 					=> $obj->wnumber,
					"name" 						=> $obj->name,
					"gender"					=> $obj->gender,
					"dob" 						=> $obj->dob,
					"pob" 						=> $obj->pob,
					"latitute" 					=> $obj->latitute,
					"longtitute" 				=> $obj->longtitute,
					"credit_limit" 				=> $obj->credit_limit,
					"locale" 					=> $obj->locale,
					"id_number" 				=> $obj->id_number,
					"phone" 					=> $obj->phone,
					"email" 					=> $obj->email,
					"website" 					=> $obj->website,
					"job" 						=> $obj->job,
					"vat_no" 					=> $obj->vat_no,
					"family_member"				=> $obj->family_member,
					"city" 						=> $obj->city,
					"post_code" 				=> $obj->post_code,
					"address" 					=> $obj->address,
					"bill_to" 					=> $obj->bill_to,
					"ship_to" 					=> $obj->ship_to,
					"memo" 						=> $obj->memo,
					"image_url" 				=> $obj->image_url,
					"company" 					=> $obj->company,
					"company_en" 				=> $obj->company_en,
					"bank_name" 				=> $obj->bank_name,
					"bank_address" 				=> $obj->bank_address,
					"bank_account_name" 		=> $obj->bank_account_name,
					"bank_account_number" 		=> $obj->bank_account_number,
					"name_on_cheque" 			=> $obj->name_on_cheque,
					"business_type_id" 			=> $obj->business_type_id,
					"payment_term_id" 			=> $obj->payment_term_id,
					"payment_method_id" 		=> $obj->payment_method_id,
					"deposit_account_id"		=> $obj->deposit_account_id,
					"trade_discount_id" 		=> $obj->trade_discount_id,
					"settlement_discount_id"	=> $obj->settlement_discount_id,
					"salary_account_id"			=> $obj->salary_account_id,
					"account_id" 				=> $obj->account_id,
					"account_id" 				=> $obj->account_id,
					"ra_id" 					=> $obj->ra_id,
					"tax_item_id" 				=> $obj->tax_item_id,
					"phase_id" 					=> $obj->phase_id,
					"voltage_id" 				=> $obj->voltage_id,
					"ampere_id" 				=> $obj->ampere_id,
					"registered_date" 			=> $obj->registered_date,
					"use_electricity" 			=> $obj->use_electricity,
					"use_water" 				=> $obj->use_water,
					"is_local" 					=> $obj->is_local,
					"is_pattern" 				=> intval($obj->is_pattern),
					"status" 					=> $obj->status,
					"is_system"					=> $obj->is_system,

					"contact_type"				=> ""
				);
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 201);
	}
	//PUT
	function contact_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;

		foreach ($models as $value) {
			$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			isset($value->branch_id) 				? $obj->branch_id 				= $value->branch_id : "";
			isset($value->country_id) 				? $obj->country_id 				= $value->country_id : "";
			isset($value->ebranch_id) 				? $obj->ebranch_id 				= $value->ebranch_id : "";
			isset($value->elocation_id) 			? $obj->elocation_id 			= $value->elocation_id : "";
			isset($value->wbranch_id) 				? $obj->wbranch_id 				= $value->wbranch_id : "";
			isset($value->wlocation_id) 			? $obj->wlocation_id			= $value->wlocation_id : "";
			isset($value->user_id)					? $obj->user_id 				= $value->user_id : "";
			isset($value->contact_type_id)			? $obj->contact_type_id 		= $value->contact_type_id : "";
			isset($value->eorder)					? $obj->eorder					= $value->eorder : "";
			isset($value->worder)					? $obj->worder					= $value->worder : "";
			isset($value->abbr)						? $obj->abbr					= $value->abbr : "";
			isset($value->number)					? $obj->number					= $value->number : "";
			isset($value->eabbr)					? $obj->eabbr					= $value->eabbr : "";
			isset($value->enumber)					? $obj->enumber					= $value->enumber : "";
			isset($value->wabbr)					? $obj->wabbr					= $value->wabbr : "";
			isset($value->wnumber)					? $obj->wnumber					= $value->wnumber : "";
			isset($value->name)						? $obj->name					= $value->name : "";
			isset($value->gender)					? $obj->gender					= $value->gender : "";
			isset($value->dob)						? $obj->dob						= date("Y-m-d", strtotime($value->dob)) : "";
			isset($value->pob)						? $obj->pob						= $value->pob : "";
			isset($value->latitute)					? $obj->latitute 				= $value->latitute : "";
			isset($value->longtitute)				? $obj->longtitute 				= $value->longtitute : "";
			isset($value->credit_limit)				? $obj->credit_limit			= $value->credit_limit : "";
			isset($value->locale)					? $obj->locale					= $value->locale : "";
			isset($value->id_number)				? $obj->id_number				= $value->id_number : "";
			isset($value->phone)					? $obj->phone 					= $value->phone : "";
			isset($value->email)					? $obj->email 					= $value->email : "";
			isset($value->website)					? $obj->website					= $value->website : "";
			isset($value->job)						? $obj->job						= $value->job : "";
			isset($value->vat_no)					? $obj->vat_no					= $value->vat_no : "";
			isset($value->family_member)			? $obj->family_member			= $value->family_member : "";
			isset($value->city)						? $obj->city 					= $value->city : "";
			isset($value->post_code)				? $obj->post_code 				= $value->post_code : "";
			isset($value->address)					? $obj->address 				= $value->address : "";
			isset($value->bill_to)					? $obj->bill_to 				= $value->bill_to : "";
			isset($value->ship_to)					? $obj->ship_to 				= $value->ship_to : "";
			isset($value->memo)						? $obj->memo					= $value->memo : "";
			isset($value->image_url)				? $obj->image_url				= $value->image_url : "";
			isset($value->company)					? $obj->company					= $value->company : "";
			isset($value->company_en)				? $obj->company_en				= $value->company_en : "";
			isset($value->bank_name)				? $obj->bank_name				= $value->bank_name : "";
			isset($value->bank_address)				? $obj->bank_address			= $value->bank_address : "";
			isset($value->bank_account_name)		? $obj->bank_account_name		= $value->bank_account_name : "";
			isset($value->bank_account_number)		? $obj->bank_account_number		= $value->bank_account_number : "";
			isset($value->name_on_cheque)			? $obj->name_on_cheque			= $value->name_on_cheque : "";
			isset($value->business_type_id)			? $obj->business_type_id		= $value->business_type_id : "";
			isset($value->payment_term_id)			? $obj->payment_term_id			= $value->payment_term_id : "";
			isset($value->payment_method_id)		? $obj->payment_method_id		= $value->payment_method_id : "";
			isset($value->deposit_account_id)		? $obj->deposit_account_id		= $value->deposit_account_id : "";
			isset($value->trade_discount_id)		? $obj->trade_discount_id		= $value->trade_discount_id : "";
			isset($value->settlement_discount_id)	? $obj->settlement_discount_id	= $value->settlement_discount_id : "";
			isset($value->salary_account_id)		? $obj->salary_account_id		= $value->salary_account_id : "";
			isset($value->account_id)				? $obj->account_id				= $value->account_id : "";
			isset($value->ra_id)					? $obj->ra_id					= $value->ra_id : "";
			isset($value->tax_item_id)				? $obj->tax_item_id				= $value->tax_item_id : $obj->tax_item_id = 0;
			isset($value->phase_id)					? $obj->phase_id				= $value->phase_id : "";
			isset($value->voltage_id)				? $obj->voltage_id				= $value->voltage_id : "";
			isset($value->ampere_id)				? $obj->ampere_id				= $value->ampere_id : "";
			isset($value->registered_date)			? $obj->registered_date 		= date("Y-m-d", strtotime($value->registered_date)) : "";		
			isset($value->use_electricity)			? $obj->use_electricity			= $value->use_electricity : "";
			isset($value->use_water)				? $obj->use_water				= $value->use_water : "";
			isset($value->is_local)					? $obj->is_local				= $value->is_local : "";
			isset($value->is_pattern)				? $obj->is_pattern				= $value->is_pattern : "";
			isset($value->status)					? $obj->status					= $value->status : "";
			isset($value->deleted)					? $obj->deleted					= $value->deleted : "";
			isset($value->is_system)				? $obj->is_system				= $value->is_system : "";

			if($obj->save()){
				//Results
				$data["results"][] = array(
					"id" 						=> $obj->id,
					"branch_id" 				=> $obj->branch_id,
					"country_id" 				=> $obj->country_id,
					"ebranch_id" 				=> $obj->ebranch_id,
					"elocation_id" 				=> $obj->elocation_id,
					"wbranch_id" 				=> $obj->wbranch_id,
					"wlocation_id" 				=> $obj->wlocation_id,
					"user_id"					=> $obj->user_id, 	
					"contact_type_id" 			=> $obj->contact_type_id,
					"eorder" 					=> $obj->eorder,
					"worder" 					=> $obj->worder,
					"abbr" 						=> $obj->abbr,
					"number" 					=> $obj->number,
					"eabbr" 					=> $obj->eabbr,
					"enumber" 					=> $obj->enumber,
					"wabbr" 					=> $obj->wabbr,
					"wnumber" 					=> $obj->wnumber,
					"name" 						=> $obj->name,
					"gender"					=> $obj->gender,
					"dob" 						=> $obj->dob,
					"pob" 						=> $obj->pob,
					"latitute" 					=> $obj->latitute,
					"longtitute" 				=> $obj->longtitute,
					"credit_limit" 				=> $obj->credit_limit,
					"locale" 					=> $obj->locale,
					"id_number" 				=> $obj->id_number,
					"phone" 					=> $obj->phone,
					"email" 					=> $obj->email,
					"website" 					=> $obj->website,
					"job" 						=> $obj->job,
					"vat_no" 					=> $obj->vat_no,
					"family_member"				=> $obj->family_member,
					"city" 						=> $obj->city,
					"post_code" 				=> $obj->post_code,
					"address" 					=> $obj->address,
					"bill_to" 					=> $obj->bill_to,
					"ship_to" 					=> $obj->ship_to,
					"memo" 						=> $obj->memo,
					"image_url" 				=> $obj->image_url,
					"company" 					=> $obj->company,
					"company_en" 				=> $obj->company_en,
					"bank_name" 				=> $obj->bank_name,
					"bank_address" 				=> $obj->bank_address,
					"bank_account_name" 		=> $obj->bank_account_name,
					"bank_account_number" 		=> $obj->bank_account_number,
					"name_on_cheque" 			=> $obj->name_on_cheque,
					"business_type_id" 			=> $obj->business_type_id,
					"payment_term_id" 			=> $obj->payment_term_id,
					"payment_method_id" 		=> $obj->payment_method_id,
					"deposit_account_id"		=> $obj->deposit_account_id,
					"trade_discount_id" 		=> $obj->trade_discount_id,
					"settlement_discount_id"	=> $obj->settlement_discount_id,
					"salary_account_id"			=> $obj->salary_account_id,
					"account_id" 				=> $obj->account_id,
					"ra_id" 					=> $obj->ra_id,
					"tax_item_id" 				=> $obj->tax_item_id,
					"phase_id" 					=> $obj->phase_id,
					"voltage_id" 				=> $obj->voltage_id,
					"ampere_id" 				=> $obj->ampere_id,
					"registered_date" 			=> $obj->registered_date,
					"use_electricity" 			=> $obj->use_electricity,
					"use_water" 				=> $obj->use_water,
					"is_local" 					=> $obj->is_local,
					"is_pattern" 				=> intval($obj->is_pattern),
					"status" 					=> $obj->status,
					"is_system"					=> $obj->is_system,

					"contact_type"				=> ""
				);
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}
	//DELETE
	function contact_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
		}

		//Response data
		$this->response($data, 200);
	}
	//Lease Unit
	function lease_unit_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Choulr_lease_unit(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    		if(isset($value["operator"])) {
					$obj->{$value["operator"]}($value["field"], $value["value"]);
				} else {
					if($value["field"]=="is_recurring"){
	    				$is_recurring = $value["value"];
	    			}else{
	    				$obj->where($value["field"], $value["value"]);
	    			}
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
				$amenity = new Choulr_lease_unit_amenity(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$amenity->where("lease_unit_id", $value->id)->get();
				$amenitem = [];
				if($amenity->exists()){
					foreach ($amenity as $amen) {
						$amenitem[] = array(
							"amenity_id" => $amen->amenity_id
						);
					}
				}
				$space = new Choulr_lease_unit_space(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$space->where("lease_unit_id",$value->id)->get();
				$spaceitem = [];
				if($space->exists()){
					foreach ($space as $sp){
						$spaceitem[] = array(
							"space_id" => $sp->space_id 
						);
					}
				}

				$data["results"][] = array(
					"id" 			=> $value->id,
					"property_id"	=> $value->property_id,
					"name"			=> $value->name,
					"code"			=> $value->code,
					"abbr"			=> $value->abbr,
					"status"		=> $value->status,
					"register_date"	=> $value->register_date,
					"area_id"		=> $value->area_id,
					"zone_id"		=> $value->zone_id,
					"sub_zone_id"	=> $value->sub_zone_id,
					"category_id"	=> $value->category_id,
					"total_area"	=> $value->total_area,
					"water_meter_id"=> $value->water_meter_id,
					"electricity_meter_id"	=> $value->electricity_meter_id,
					"img1"			=> $value->img1,
					"img2"			=> $value->img2,
					"img3"			=> $value->img3,
					"img4"			=> $value->img4,
					"img5"			=> $value->img5,
					"img6"			=> $value->img6,
					"amenity_id" 	=> $amenitem,
					"space_id"		=> $spaceitem,
					"visitor_number" => $value->visitor_number
				);
			}
		}
		//Response Data
		$this->response($data, 200);
	}
	function lease_unit_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
		
			$obj = new Choulr_lease_unit(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->property_id) 			? $obj->property_id 		= $value->property_id : "";
			isset($value->name) 				? $obj->name 				= $value->name : "";
			isset($value->code) 				? $obj->code 				= $value->code : "";
			isset($value->abbr) 				? $obj->abbr 				= $value->abbr : "";
			isset($value->status) 				? $obj->status 				= $value->status : "";
			isset($value->register_date) 		? $obj->register_date 		= $value->register_date : "";
			isset($value->area_id) 				? $obj->area_id 			= $value->area_id : "";
			isset($value->zone_id) 				? $obj->zone_id 			= $value->zone_id : "";
			isset($value->sub_zone_id) 			? $obj->sub_zone_id 		= $value->sub_zone_id : "";
			isset($value->category_id) 			? $obj->category_id 		= $value->category_id : "";
			isset($value->total_area) 			? $obj->total_area 			= $value->total_area : "";
			isset($value->water_meter_id) 		? $obj->water_meter_id 		= $value->water_meter_id : "";
			isset($value->electricity_meter_id) ? $obj->electricity_meter_id = $value->electricity_meter_id : "";
			isset($value->img1) 				? $obj->img1 				= $value->img1 : "";
			isset($value->img2) 				? $obj->img2 				= $value->img2 : "";
			isset($value->img3) 				? $obj->img3 				= $value->img3 : "";
			isset($value->img4) 				? $obj->img4 				= $value->img4 : "";
			isset($value->img5) 				? $obj->img5 				= $value->img5 : "";
			isset($value->img6) 				? $obj->img6 				= $value->img6 : "";
			isset($value->visitor_number) 		? $obj->visitor_number 				= $value->visitor_number : "";
		   	
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 						=> $obj->id,
			   		"property_id"				=> $obj->property_id,
					"name"						=> $obj->name,
					"code"						=> $obj->code,
					"abbr"						=> $obj->abbr,
					"status"					=> $obj->status,
					"register_date"				=> $obj->register_date,
					"area_id"					=> $obj->area_id,
					"zone_id"					=> $obj->zone_id,
					"sub_zone_id"				=> $obj->sub_zone_id,
					"category_id"				=> $obj->category_id,
					"total_area"				=> $obj->total_area,
					"water_meter_id"			=> $obj->water_meter_id,
					"electricity_meter_id"		=> $obj->electricity_meter_id,
					"img1"						=> $obj->img1,
					"img2"						=> $obj->img2,
					"img3"						=> $obj->img3,
					"img4"						=> $obj->img4,
					"img5"						=> $obj->img5,
					"img6"						=> $obj->img6,
					"visitor_number" 			=> $obj->visitor_number,
			   	);
			   	if($value->amenity_line){
			   		foreach($value->amenity_line as $amen){
						$amenity = new Choulr_lease_unit_amenity(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$amenity->lease_unit_id = $obj->id;
						$amenity->amenity_id = $amen;
						$amenity->save();

					}
				}
				if($value->space_line){
			   		foreach($value->space_line as $sp){
						$space = new Choulr_lease_unit_space(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$space->lease_unit_id = $obj->id;
						$space->space_id = $sp;
						$space->save();
					}
				
			   	} 
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function lease_unit_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Choulr_lease_unit(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			
			isset($value->property_id) 			? $obj->property_id 		= $value->property_id : "";
			isset($value->name) 				? $obj->name 				= $value->name : "";
			isset($value->code) 				? $obj->code 				= $value->code : "";
			isset($value->abbr) 				? $obj->abbr 				= $value->abbr : "";
			isset($value->status) 				? $obj->status 				= $value->status : "";
			isset($value->register_date) 		? $obj->register_date 		= $value->register_date : "";
			isset($value->area_id) 				? $obj->area_id 			= $value->area_id : "";
			isset($value->zone_id) 				? $obj->zone_id 			= $value->zone_id : "";
			isset($value->sub_zone_id) 			? $obj->sub_zone_id 		= $value->sub_zone_id : "";
			isset($value->category_id) 			? $obj->category_id 		= $value->category_id : "";
			isset($value->total_area) 			? $obj->total_area 			= $value->total_area : "";
			isset($value->water_meter_id) 		? $obj->water_meter_id 		= $value->water_meter_id : "";
			isset($value->electricity_meter_id) ? $obj->electricity_meter_id 	= $value->electricity_meter_id : "";
			isset($value->img1) 				? $obj->img1 				= $value->img1 : "";
			isset($value->img2) 				? $obj->img2 				= $value->img2 : "";
			isset($value->img3) 				? $obj->img3 				= $value->img3 : "";
			isset($value->img4) 				? $obj->img4 				= $value->img4 : "";
			isset($value->img5) 				? $obj->img5 				= $value->img5 : "";
			isset($value->img6) 				? $obj->img6 				= $value->img6 : "";
		   	isset($value->visitor_number) 		? $obj->visitor_number 				= $value->visitor_number : "";
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 						=> $obj->id,
			   		"property_id"				=> $obj->property_id,
					"name"						=> $obj->name,
					"code"						=> $obj->code,
					"abbr"						=> $obj->abbr,
					"status"					=> $obj->status,
					"register_date"				=> $obj->register_date,
					"area_id"					=> $obj->area_id,
					"zone_id"					=> $obj->zone_id,
					"sub_zone_id"				=> $obj->sub_zone_id,
					"category_id"				=> $obj->category_id,
					"total_area"				=> $obj->total_area,
					"water_meter_id"			=> $obj->water_meter_id,
					"electricity_meter_id"		=> $obj->electricity_meter_id,
					"img1"						=> $obj->img1,
					"img2"						=> $obj->img2,
					"img3"						=> $obj->img3,
					"img4"						=> $obj->img4,
					"img5"						=> $obj->img5,
					"img6"						=> $obj->img6,
					"visitor_number" 			=> $obj->visitor_number,
			   	);
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	//Lease Unit ceter 
	function lease_unit_ceter_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Choulr_lease_unit(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    		if(isset($value["operator"])) {
					$obj->{$value["operator"]}($value["field"], $value["value"]);
				} else {
					if($value["field"]=="is_recurring"){
	    				$is_recurring = $value["value"];
	    			}else{
	    				$obj->where($value["field"], $value["value"]);
	    			}
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
				$amenity = new Choulr_lease_unit_amenity(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$amenity->where("lease_unit_ceter_id", $value->id)->get();
				$amenitem = [];
				if($amenity->exists()){
					foreach ($amenity as $amen) {
						$amenitem[] = array(
							"amenity_id" => $amen->amenity_id
						);
					}
				}
				$space = new Choulr_lease_unit_space(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$space->where("lease_unit_ceter_id",$value->id)->get();
				$spaceitem = [];
				if($space->exists()){
					foreach ($space as $sp){
						$spaceitem[] = array(
							"space_id" => $sp->space_id 
						);
					}
				}
				
				$data["results"][] = array(
					"id" 			=> $value->id,
					"name" 			=> $value->name,
					"status"		=> $value->status,
					"register_date" => $value->register_date,
					"balance"		=> $value->balance,
					"visitor_number" => $value->visitor_number,
					"total_area"	=> $value->total_area,	
				);
			}
		}
		//Response Data
		$this->response($data, 200);
	}
	function lease_unit_ceter_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
		
			$obj = new Choulr_lease_ceter_unit(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->name) 			? $obj->name 		= $value->name : "";
			isset($value->status) 			? $obj->status 		= $value->status : "";
			isset($value->register_date) 	? $obj->register_date 	= $value->register_date : "";
			isset($value->balance) 			? $obj->balance 	= $value->balance : "";
			isset($value->visitor_number) 	? $obj->visitor_number 	= $value->visitor_number : "";
			isset($value->total_area) 		? $obj->total_area 	= $value->total_area : "";
			
		   	
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $value->id,
					"name" 			=> $value->name,
					"status"		=> $value->status,
					"register_date" => $value->register_date,
					"balance"		=> $value->balance,
					"visitor_number" => $value->visitor_number,
					"total_area"	=> $value->total_area,
			   	);
				if($value->amenity_line){
				   		foreach($value->amenity_line as $amen){
							$amenity = new Choulr_lease_unit_amenity(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$amenity->lease_unit_id = $obj->id;
							$amenity->amenity_id = $amen;
							$amenity->save();

						}
					}
				if($value->space_line){
				   		foreach($value->space_line as $se){
							$space = new Choulr_lease_unit_space(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$space->lease_unit_id = $obj->id;
							$space->space_id = $se;
							$space->save();
						}
					
				} 
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function lease_unit_ceter_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Choulr_lease_ceter_unit(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			
			isset($value->name) 			? $obj->name 		= $value->name : "";
			isset($value->status) 			? $obj->status 		= $value->status : "";
			isset($value->register_date) 	? $obj->register_date 	= $value->register_date : "";
			isset($value->balance) 			? $obj->balance 	= $value->balance : "";
			isset($value->visitor_number) 	? $obj->visitor_number 	= $value->visitor_number : "";
			isset($value->total_area) 		? $obj->total_area 	= $value->total_area : "";
		   	
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $value->id,
					"name" 			=> $value->name,
					"status"		=> $value->status,
					"register_date" => $value->register_date,
					"balance"		=> $value->balance,
					"visitor_number" => $value->visitor_number,
					"total_area"	=> $value->total_area,
			   	);
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	//Category
	function category_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_pattern = 0;
		$obj = new Choulr_category(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
		 		$data["results"][] = array(
		 			"id" 		=> $value->id,
		 			"name" 		=> $value->name,
		 			"is_system" => $value->is_system
		 		);
		 	}
		}
		//Response Data		
		$this->response($data, 200);
	}
	function category_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Choulr_category(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->name) 		? $obj->name 	= $value->name : "";
			$obj->is_system = 0;
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id,
			   		"name" 			=> $obj->name
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function category_put(){
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Choulr_category(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			isset($value->name) 		? $obj->name 	= $value->name : "";
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id,
			   		"name" 			=> $obj->name
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 200);
	}
	function category_delete() {
		$models = json_decode($this->delete('models'));
		foreach ($models as $key => $value) {
			$obj = new Choulr_category(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
		}

		//Response data
		$this->response($data, 200);
	}
	//Amenity
	function amenity_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_pattern = 0;
		$obj = new Choulr_amenity(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
		 		$data["results"][] = array(
		 			"id" 		=> $value->id,
		 			"name" 		=> $value->name,
		 			"is_system" => $value->is_system
		 		);
		 	}
		}
		//Response Data		
		$this->response($data, 200);
	}
	function amenity_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Choulr_amenity(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->name) 		? $obj->name 	= $value->name : "";
			$obj->is_system = 0;
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id,
			   		"name" 			=> $obj->name
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function amenity_put(){
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Choulr_amenity(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			isset($value->name) 		? $obj->name 	= $value->name : "";
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id,
			   		"name" 			=> $obj->name
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 200);
	}
	function amenity_delete() {
		$models = json_decode($this->delete('models'));
		foreach ($models as $key => $value) {
			$obj = new Choulr_amenity(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
		}

		//Response data
		$this->response($data, 200);
	}

	//Space
	function space_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_pattern = 0;
		$obj = new Choulr_space(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
		 		$data["results"][] = array(
		 			"id" 		=> $value->id,
		 			"name" 		=> $value->name,
		 			"is_system" => $value->is_system
		 		);
		 	}
		}
		//Response Data		
		$this->response($data, 200);
	}
	function space_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Choulr_space(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->name) 		? $obj->name 	= $value->name : "";
			$obj->is_system = 0;
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id,
			   		"name" 			=> $obj->name
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function space_put(){
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Choulr_space(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			isset($value->name) 		? $obj->name 	= $value->name : "";
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id,
			   		"name" 			=> $obj->name
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 200);
	}
	function space_delete() {
		$models = json_decode($this->delete('models'));
		foreach ($models as $key => $value) {
			$obj = new Choulr_space(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
		}

		//Response data
		$this->response($data, 200);
	}
	//ChoulrContract
	//GET
	function contract_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;

		$obj = new Choulr_contract(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    		if(isset($value["operator"])) {
					$obj->{$value["operator"]}($value["field"], $value["value"]);
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
				//Rent
				$ccr = new Choulr_contracts_rent(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$ccr->where("contract_id", $value->id)->get();
				$rent_ar = [];
				foreach($ccr as $cr){
					$rent = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$rent->where("id", $cr->rent_id)->get();
					if($rent->exists()){
						$currency= $rent->currency->get();
						$rent_ar[] = array(
							"id" 		=> $rent->id,
							"name" 		=> $rent->name,
							"amount" 	=> floatval($rent->amount),
							"price" 	=> floatval($rent->amount),
							"_currency"		=> array(
								"id" 		=> $currency->id,
								"code" 		=> $currency->code,
								"locale" 	=> $currency->locale
							),
						);
					}
				}
				//Item
				$itm = new Choulr_contracts_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$itm->where("contract_id", $value->id)->get();
				$item_ar = [];
				if($itm->exists()){
					foreach($itm as $ci){
						$item_ar[] = array(
							"id" 				=> $ci->id,
							"contract_id" 		=> $ci->contract_id,
							"item_id" 			=> $ci->item_id,
							"quantity" 			=> intval($ci->quantity),
							"price" 			=> floatval($ci->price),
							"description" 		=> $ci->description,
						);
					}
				}
				$data["results"][] = array(
					"id" 					=> $value->id,
			   		"name"					=> $value->name,
					"customer_id"			=> $value->customer_id,
					"property_id"			=> $value->property_id,
					"lease_unit_id"			=> $value->lease_unit_id,
					"issued_date" 			=> $value->registered_date,
					"start_date" 			=> $value->start_date,
					"end_date" 				=> $value->end_date,
					"fine_id" 				=> $value->fine_id,
					"deposit_id" 			=> $value->deposit_id,
					"deposit_transaction_id" => $value->deposit_transaction_id,
					"rent_ar"				=> $rent_ar,
					"item_ar" 				=> $item_ar,
					"water_meter_id"		=> $value->water_meter_id,
					"electrictiy_meter_id"	=> $value->electrictiy_meter_id,
					"memo"					=> $value->memo
				);	
			}
		}

		//Response Data
		$this->response($data, 200);
	}
	//POST
	function contract_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {
			//Deposit
			$depositid = 0;
			if(isset($value->deposit_id)){
				//Plan Item
				$dep = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$dep->where("id", $value->deposit_id)->limit(1)->get();
				//Rate
				$cr = new Currency_rate(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$cr->where("currency_id", $dep->currency_id)->limit(1)->order_by("id", "desc")->get();
				//TXN
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$txn->amount = $dep->amount;
				$txn->contact_id = $value->customer_id;
				$txn->transaction_template_id = 7;
				$txn->account_id = $dep->account_id;
				$number = $this->_generate_number('Customer_Deposit', $value->issued_date);
				$txn->number = $number;
				$txn->type = 'Customer_Deposit';
				$txn->rate = $cr->rate;
				$txn->locale = $cr->locale;
				$txn->issued_date = $value->issued_date;
				$txn->start_date = $value->issued_date;
				$txn->interval = 1;
				$txn->day = 1;
				$txn->status = 0;
				$txn->frequency = 'Daily';
				$txn->month_option = 'Day';
				$txn->is_journal = 1;
				if($txn->save()){
					$depositid = $txn->id;
					//DR
					$j1 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$j1->transaction_id = $txn->id;
					$j1->account_id = 1;
					$j1->contact_id = $txn->contact_id;
					$j1->description = "Choulr Deposit";
					$j1->dr = $txn->amount;
					$j1->rate = $cr->rate;
					$j1->locale = $cr->locale;
					$j1->save();
					//CR
					$j2 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$j2->transaction_id = $txn->id;
					$j2->account_id = $dep->account_id;
					$j2->contact_id = $txn->contact_id;
					$j2->description = "Choulr Deposit";
					$j2->cr = $txn->amount;
					$j2->rate = $cr->rate;
					$j2->locale = $cr->locale;
					$j2->save();
					$data["results"][] = array(
				   		"id" 				=> $txn->id,
				   		"amount" 			=> floatval($txn->amount)
				   	);
				}
			}
			$obj = new Choulr_contract(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->name) 				? $obj->name 					= $value->name : "";
			isset($value->customer_id) 			? $obj->customer_id 			= $value->customer_id : "";
			isset($value->property_id) 			? $obj->property_id 			= $value->property_id : "";
			isset($value->lease_unit_id) 		? $obj->lease_unit_id 			= $value->lease_unit_id : 0;
			isset($value->deposit_id) 			? $obj->deposit_id 				= $value->deposit_id : 0;
			$obj->deposit_transaction_id = $depositid;
			isset($value->water_meter_id) 		? $obj->water_meter_id 			= $value->water_meter_id : 0;
			isset($value->electrictiy_meter_id) ? $obj->electrictiy_meter_id 	= $value->electrictiy_meter_id : 0;
			isset($value->memo) 				? $obj->memo 					= $value->memo : "";
			isset($value->end_date) 			? $obj->end_date 				= $value->end_date : "";
			isset($value->issued_date) 			? $obj->registered_date 			= $value->issued_date : "";
			isset($value->fine_id) 				? $obj->fine_id 				= $value->fine_id : "";
			isset($value->start_date) 			? $obj->start_date 				= $value->start_date : "";

			if($obj->save()){
				//Rent
				foreach($value->rent_items as $ri){
					$ccr = new Choulr_contracts_rent(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$ccr->contract_id = $obj->id;
					$ccr->rent_id = $ri->id;
					$ccr->save();
				}
			   	//Item
			   	foreach($value->service_items as $si){
					$cci = new Choulr_contracts_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$cci->contract_id = $obj->id;
					$cci->item_id = $si->item->id;
					$cci->quantity = $si->item->quantity;
					$cci->price = $si->item->price;
					$cci->description = $si->item->description;
					$cci->save();
				}
				//Meter
				if($obj->water_meter_id > 0){
					$wm = new Choulr_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$wm->where("id", $obj->water_meter_id)->get();
					$wm->contract_id = $obj->id;
					$wm->save();
				}
				if($obj->electrictiy_meter_id > 0){
					$em = new Choulr_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$em->where("id", $obj->electrictiy_meter_id)->get();
					$em->contract_id = $obj->id;
					$em->save();
				}
				//Lease Unit
				if($obj->lease_unit_id > 0){
					$lu = new Choulr_lease_unit(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$lu->where("id", $obj->lease_unit_id)->get();
					$lu->contract_id = $obj->id;
					$lu->save();
				}
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	//PUT
	function contract_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {
			$obj = new Choulr_contract(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			//Deposit
			$depositid = $value->deposit_transaction_id;
			if($obj->deposit_id != $value->deposit_id){
				//Old
				$otxn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$otxn->where("id", $value->deposit_transaction_id)->get();
				$otxn->deleted = 0;
				$otxn->save();
				$jn = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$jn->where("transaction_id", $value->deposit_transaction_id);
				$jn->update("deleted",1);
				//Plan Item
				$dep = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$dep->where("id", $value->deposit_id)->limit(1)->get();
				//Rate
				$cr = new Currency_rate(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$cr->where("currency_id", $dep->currency_id)->limit(1)->order_by("id", "desc")->get();
				//TXN
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$txn->amount = $dep->amount;
				$txn->contact_id = $value->customer_id;
				$txn->transaction_template_id = 7;
				$txn->account_id = $dep->account_id;
				$number = $this->_generate_number('Customer_Deposit', $value->issued_date);
				$txn->number = $number;
				$txn->type = 'Customer_Deposit';
				$txn->rate = $cr->rate;
				$txn->locale = $cr->locale;
				$txn->issued_date = $value->issued_date;
				$txn->start_date = $value->issued_date;
				$txn->interval = 1;
				$txn->day = 1;
				$txn->status = 0;
				$txn->frequency = 'Daily';
				$txn->month_option = 'Day';
				$txn->is_journal = 1;
				if($txn->save()){
					$depositid = $txn->id;
					//DR
					$j1 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$j1->transaction_id = $txn->id;
					$j1->account_id = 1;
					$j1->contact_id = $txn->contact_id;
					$j1->description = "Choulr Deposit";
					$j1->dr = $txn->amount;
					$j1->rate = $cr->rate;
					$j1->locale = $cr->locale;
					$j1->save();
					//CR
					$j2 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$j2->transaction_id = $txn->id;
					$j2->account_id = $dep->account_id;
					$j2->contact_id = $txn->contact_id;
					$j2->description = "Choulr Deposit";
					$j2->cr = $txn->amount;
					$j2->rate = $cr->rate;
					$j2->locale = $cr->locale;
					$j2->save();
					$data["results"][] = array(
				   		"id" 				=> $txn->id,
				   		"amount" 			=> floatval($txn->amount)
				   	);
				}
			}
			//
			isset($value->name) 				? $obj->name 					= $value->name : "";
			isset($value->customer_id) 			? $obj->customer_id 			= $value->customer_id : "";
			isset($value->property_id) 			? $obj->property_id 			= $value->property_id : "";
			isset($value->lease_unit_id) 		? $obj->lease_unit_id 			= $value->lease_unit_id : "";
			isset($value->deposit_id) 			? $obj->deposit_id 				= $value->deposit_id : 0;
			$obj->deposit_transaction_id = $depositid;
			isset($value->water_meter_id) 		? $obj->water_meter_id 			= $value->water_meter_id : "";
			isset($value->electrictiy_meter_id) ? $obj->electrictiy_meter_id 	= $value->electrictiy_meter_id : "";
			isset($value->memo) 				? $obj->memo 					= $value->memo : "";
			isset($value->end_date) 			? $obj->end_date 				= $value->end_date : "";
			isset($value->issued_date) 			? $obj->registered_date 			= $value->issued_date : "";
			isset($value->fine_id) 				? $obj->fine_id 				= $value->fine_id : "";
			isset($value->start_date) 			? $obj->start_date 				= $value->start_date : "";

	   		if($obj->save()){
	   			//Rent
   				$or = new Choulr_contracts_rent(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$or->where("contract_id", $obj->id)->get();
	   			if($or->exists()){
	   				$or->delete_all();
	   			}
				foreach($value->rent_items as $ri){
					$ccr = new Choulr_contracts_rent(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$ccr->contract_id = $obj->id;
					$ccr->rent_id = $ri->id;
					$ccr->save();
				}
			   	//Item
			   	$os = new Choulr_contracts_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$os->where("contract_id", $obj->id)->get();
	   			if($os->exists()){
	   				$os->delete_all();
	   			}
			   	foreach($value->service_items as $si){
					$cci = new Choulr_contracts_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$cci->contract_id = $obj->id;
					$cci->item_id = $si->item->id;
					$cci->quantity = $si->quantity;
					$cci->price = $si->price;
					$cci->description = $si->description;
					$cci->save();
				}
				//Meter
				$owm = new Choulr_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$owm->where("contract_id", $obj->id);
				$owm->update("contract_id", 0);
				if($obj->water_meter_id > 0){
					$wm = new Choulr_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$wm->where("id", $obj->water_meter_id)->get();
					$wm->contract_id = $obj->id;
					$wm->save();
				}
				if($obj->electrictiy_meter_id > 0){
					$em = new Choulr_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$em->where("id", $obj->electrictiy_meter_id)->get();
					$em->contract_id = $obj->id;
					$em->save();
				}
				//Lease Unit
				$olu = new Choulr_lease_unit(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$olu->where("contract_id", $obj->id);
				$olu->update("contract_id", 0);
				if($obj->lease_unit_id > 0){
					$lu = new Choulr_lease_unit(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$lu->where("id", $obj->lease_unit_id)->get();
					$lu->contract_id = $obj->id;
					$lu->save();
				}
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 201);
	}
	//DELETE
	function contract_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Choulr_contract(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
		}

		//Response data
		$this->response($data, 200);
	}

	//Invoice
	//GET
	function rawinvoice_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;

		$obj = new Choulr_contract(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    		if(isset($value["operator"])) {
					$obj->{$value["operator"]}($value["field"], $value["value"]);
				} else {
					if($value["field"] == "property_id"){
	    				$obj->where($value["field"], $value["value"]);
	    			}
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
			$water_meter_record = [];
			$ele_meter_record = [];
			$wutotal = 0;
			$eutotal = 0;
			foreach ($obj as $value) {
				//Lease Unit
				$lu = new Choulr_lease_unit(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$lu->where("id", $value->lease_unit_id)->limit(1)->get();
				$leaseunit = [];
				$leaseunit = array(
					"id" 			=> $lu->id,
					"name" 			=> $lu->name,
					"property_id" 	=> $lu->property_id,
					"location_id" 	=> $lu->area_id,
					"pole_id" 		=> $lu->zone_id,
					"box_id" 		=> $lu->sub_zone_id,
				);
				//Customer
				$con = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$con->where("id", $value->customer_id)->get();
				//Locale
				$locale = $con->locale;
				//Rate
				$ratedb = new Currency_rate(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$ratedb->where("locale", $locale)->order_by("date", "desc")->limit(1)->get();
				$rate = floatval($ratedb->rate);
				//Water Record 
				$meter = new Choulr_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$meter->where("id", $value->water_meter_id)->limit(1)->get();
				$r = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$r->where("meter_id", $value->water_meter_id);
				if(!empty($filter) && isset($filter)){
			    	foreach ($filter["filters"] as $v) {
						if($v["field"] != "property_id"){
		    				$r->where($v["field"], $v["value"]);
		    			}
					}
				}
				$r->where("invoiced", 0)->limit(1)->get();
				if($r->exists()){
					$water_meter_record = array(
						"id" 				=> $r->id,
						"previous" 			=> intval($r->previous),
						"current" 			=> intval($r->current),
						"to_date" 			=> $r->to_date,
						"meter_number" 		=> $meter->number,
					);
					$wutotal = intval($r->usage);
				}
				//Tariff Water
				$planitem = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$planitem->where("tariff_id", $meter->tariff_id)->order_by("usage", "asc")->get_iterated();
				$wprice = 0;
				$wtariffprice = 0;
				$water = [];
				if($planitem->exists()){
					foreach($planitem as $pi){
						if( $wutotal >= intval($pi->usage) ){
							$water = [];
							$cnr1 = new Currency_rate(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$cnr1->where("currency_id", $pi->currency_id)->order_by("date", "desc")->limit(1)->get();
							$wp = $wutotal * floatval($pi->amount);
							$wprice = $wp / floatval($rate);
							$water = array(
								"id" => $pi->id,
								"rate" => floatval($cnr1->rate),
								"locale" => $cnr1->locale,
								"price" => floatval($pi->amount),
								"amount" => $wp,
							);
						}
					}
				}
				//Electric Record 
				$meter1 = new Choulr_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$meter1->where("id", $value->electrictiy_meter_id)->limit(1)->get();
				$r = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$r->where("meter_id", $value->electrictiy_meter_id);
				if(!empty($filter) && isset($filter)){
			    	foreach ($filter["filters"] as $v) {
						if($v["field"] != "property_id"){
		    				$r->where($v["field"], $v["value"]);
		    			}
					}
				}
				$r->where("invoiced", 0)->limit(1)->get();
				if($r->exists()){
					$ele_meter_record = array(
						"id" 				=> $r->id,
						"previous" 			=> intval($r->previous),
						"current" 			=> intval($r->current),
						"to_date" 			=> $r->to_date,
						"meter_number" 		=> $meter1->number,
					);
					$eutotal = intval($r->usage);
				}
				//Tariff Electric
				$planitem1 = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$planitem1->where("tariff_id", $meter1->tariff_id)->order_by("usage", "asc")->get_iterated();
				$eprice = 0;
				$etariffprice = 0;
				$electric = [];
				if($planitem1->exists()){
					foreach($planitem1 as $pi1){
						if( $eutotal >= intval($pi1->usage) ){
							$electric = [];
							$cnr = new Currency_rate(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$cnr->where("currency_id", $pi1->currency_id)->order_by("date", "desc")->limit(1)->get();
							$ep = $eutotal * floatval($pi1->amount);
							$eprice = $ep / floatval($rate);
							$electric = array(
								"id" => $pi1->id,
								"rate" => floatval($cnr->rate),
								"locale" => $cnr->locale,
								"price" => floatval($pi1->amount),
								"amount" => $ep,
							);
						}
					}
				}
				//Rent Price
				$p = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$p->where("id", $value->rent_price_id)->limit(1)->get();
				$c = new Currency_rate(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$c->where("currency_id", $p->currency_id)->order_by("date", "desc")->limit(1)->get();
				$rent = [];
				$rent = array(
					"id" 		=> $p->id,
					"rate" 		=> floatval($c->rate),
					"locale" 	=> $c->locale,
					"amount" 	=> floatval($p->amount),
					"name" 		=> $p->name,
				);
				$rentprice = floatval($p->amount) / floatval($rate);
				//Total
				$total = floatval($p->amount) + $wprice + $eprice;
				//Result Respone
				$data["results"][] = array(
					"id" 					=> $value->id,
					"water_meter_record" 	=> $water_meter_record,
					"wusage_total" 			=> intval($wutotal),
					"wprice" 				=> $wprice,
					"water_ar" 				=> $water,
					"ele_meter_record" 		=> $ele_meter_record,
					"eusage_total" 			=> intval($eutotal),
					"eprice" 				=> $eprice,
					"ele_ar" 				=> $electric,
					"contract" 				=> $value->name,
					"customer" 				=> $con->name,
					"contact_id"			=> $con->id,
					"locale" 			 	=> $locale,
					"rate" 					=> $rate,
					"rent_price" 			=> $rentprice,
					"rent_locale" 			=> $c->locale,
					"rent_ar" 				=> $rent,
					"lease_unit" 			=> $leaseunit,
					"total" 				=> $total,
				);	
			}
		}

		//Response Data
		$this->response($data, 200);
	}
	//POST
	function makeinvoice_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = array();
		$data["count"] = 0;
		$number = "";
		foreach ($models as $value) {
			$number = $this->_generate_number($value->type, $value->issued_date);
			//Contact
			$con = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$con->where("id", $value->contact_id)->limit(1)->get();
			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			// $obj->company_id 		= $value->company_id;
			$obj->location_id 		= isset($value->location_id) ? $value->location_id : "";
			$obj->contact_id 		= isset($value->contact_id) ? $value->contact_id : "";
			$obj->payment_method_id = isset($value->payment_method_id) ? $value->payment_method_id : "";
			$obj->reference_id 		= isset($value->reference_id) ? $value->reference_id:0;
			$obj->account_id 		= $con->account_id;
			$obj->vat_id 			= $con->vat;
			$obj->biller_id 		= isset($value->biller_id) ? $value->biller_id : "";
		   	$obj->number 			= isset($number) ? $number : "";
		   	$obj->type 				= isset($value->type) ? $value->type : "";
		   	$obj->amount 			= isset($value->amount) ? $value->amount : "";
		   	$obj->vat 				= isset($value->vat) ? $value->vat : "";
		   	$obj->rate 				= isset($value->rate) ? $value->rate : "";
		   	$obj->locale 			= isset($value->locale) ? $value->locale : "";
		   	$obj->month_of 			= isset($value->month_of) ? $value->month_of : "";
		   	$obj->issued_date 		= isset($value->issued_date) ? $value->issued_date : "";
		   	$obj->bill_date 		= isset($value->bill_date) ? $value->bill_date : "";
		   	$obj->due_date 			= date('Y-m-d', strtotime($value->due_date));
		   	$obj->is_journal 		= 1;
		   	$obj->check_no 			= isset($value->check_no) ? $value->check_no : "";
		   	$obj->contract_id 		= isset($value->contract_id) ? $value->contract_id: "";
		   	$obj->status 			= isset($value->status) ? $value->status: 1;
		   	$obj->sub_total 		= isset($value->amount) ? $value->amount : "";
		   	$obj->pole_id 			= isset($value->pole_id) ? $value->pole_id : 0;
		   	$obj->box_id 			= isset($value->box_id) ? $value->box_id : 0;
		   	$obj->payment_term_id 	= 5;
		   	$obj->user_id 			= isset($value->biller_id) ? $value->biller_id : 0;
	   		if($obj->save()){
	   			$journal = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$journal->transaction_id 	= $obj->id;
	   			$journal->account_id 		= $obj->account_id;
	   			$journal->contact_id 		= $obj->contact_id;
	   			$journal->dr  		 		= $obj->amount;
	   			$journal->description 		= "Choulr Invoice";
	   			$journal->cr 		 		= 0.00;
	   			$journal->rate 		 		= $obj->rate;
	   			$journal->locale 	 		= $obj->locale;
	   			$journal->save();
	   			$journal2 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$journal2->transaction_id 	= $obj->id;
	   			$journal2->account_id 		= $con->ra_id;
	   			$journal2->contact_id 		= $obj->contact_id;
	   			$journal2->dr 		  		= 0.00;
	   			$journal2->cr 		  		= $obj->amount;
	   			$journal2->description 		= "Choulr Invoice";
	   			$journal2->rate 	  		= $obj->rate;
	   			$journal2->locale 	  		= $obj->locale;
	   			$journal2->save();
	   			$invoice_lines = [];
		   		foreach ($value->invoice_lines as $row) {
		   			//Line
		   			$line = new Choulr_item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   			$line->transaction_id 	= $obj->id;
		   			$line->item_id 			= isset($row->item_id) ? $row->item_id : "";
		   			$line->name 			= isset($row->name) ? $row->name : "Choulr Invoice";
		   			$line->price 			= isset($row->price) ? $row->price : "";
		   			$line->amount 			= isset($row->amount) ? $row->amount : "";
		   			$line->rate 			= isset($row->rate) ? $row->rate : "";
		   			$line->locale 			= isset($row->locale) ? $row->locale : "";
		   			$line->usage 			= isset($row->usage) ? $row->usage : "";
		   			$line->type 			= isset($row->type) ? $row->type : "";
		   			if($line->save()){
		   				$invoice_lines[] = array(
		   					"id" 				=> $line->id,
		   					"transaction_id"	=> $line->transaction_id,
				   			"item_id"			=> $line->item_id,
				   			"name" 				=> $line->name,
				   			"price" 			=> floatval($line->price),
				   			"amount" 			=> floatval($line->amount),
				   			"rate"				=> floatval($line->rate),
				   			"locale" 			=> $line->locale,
				   			"usage" 			=> intval($line->usage),
				   			"type" 				=> $line->type
		   				);
		   			}
		   			//Update Record
		   			if($row->type == 'electricity_meter' || $row->type == 'water_meter') {
		   				$record = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   				$record->where('id', $row->item_id)->get();
		   				$record->invoiced = 1;
		   				$record->save();
		   			}
		   		}
			   	$data["results"][] = array(
			   		"id" 				=> $obj->id,
					"location_id" 		=> $obj->location_id,
					"contact_id" 		=> $obj->contact_id,
					"account_id" 		=> $obj->account_id,
					"vat_id"			=> $obj->vat_id,
					"biller_id" 		=> $obj->biller_id,
				   	"number" 			=> $obj->number,
				   	"type" 				=> $obj->type,
				   	"amount" 			=> floatval($obj->amount),
				   	"vat" 				=> floatval($obj->vat),
				   	"rate" 				=> floatval($obj->rate),
				   	"locale" 			=> $obj->locale,
				   	"month_of"			=> $obj->month_of,
				   	"issued_date"		=> $obj->issued_date,
				   	"bill_date" 		=> $obj->bill_date,
				   	"due_date" 			=> $obj->due_date,
				   	"check_no" 			=> $obj->check_no,
				   	"status" 			=> $obj->status,
				   	"invoice_lines" 	=> $invoice_lines
			   	);
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($models, 201);
	}
	//PUT
	function invoice_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {
			$obj = new Choulr_contract(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			//Lease Unit
			$lu = new Choulr_lease_unit(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$lu->where("id", $obj->lease_unit_id)->limit(1)->get();
			$lu->contract_id = 0;
			$lu->save();
			//water meter
			$wm = new Choulr_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$wm->where("id", $obj->water_meter_id)->limit(1)->get();
			$wm->contract_id = 0;
			$wm->save();
			//Ele meter
			$em = new Choulr_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$em->where("id", $obj->electrictiy_meter_id)->limit(1)->get();
			$em->contract_id = 0;
			$em->save();
			if($value->deleted != 1){
				isset($value->name) 				? $obj->name 					= $value->name : "";
				isset($value->customer_id) 			? $obj->customer_id 			= $value->customer_id : "";
				isset($value->lease_unit_id) 		? $obj->lease_unit_id 			= $value->lease_unit_id : "";
				isset($value->rent_price_id) 		? $obj->rent_price_id 			= $value->rent_price_id : "";
				isset($value->water_meter_id) 		? $obj->water_meter_id 			= $value->water_meter_id : "";
				isset($value->electrictiy_meter_id) ? $obj->electrictiy_meter_id 	= $value->electrictiy_meter_id : "";
				isset($value->memo) 				? $obj->memo 					= $value->memo : "";
			}else{
				$obj->deleted = 1;
			}
	   		if($obj->save()){
	   			if($value->deleted != 1){
		   			//Lease Unit
					$lu = new Choulr_lease_unit(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$lu->where("id", $value->lease_unit_id)->limit(1)->get();
					$lu->contract_id = $obj->id;
					$lu->save();
					//water meter
					$wm = new Choulr_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$wm->where("id", $value->water_meter_id)->limit(1)->get();
					$wm->contract_id = $obj->id;
					$wm->save();
					//Ele meter
					$em = new Choulr_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$em->where("id", $value->electrictiy_meter_id)->limit(1)->get();
					$em->contract_id = $obj->id;
					$em->save();
				}
			   	$data["results"][] = array(
			   		"id" 					=> $obj->id,
			   		"name"					=> $value->name,
					"customer"				=> $value->customer,
					"meter"					=> $value->meter,
					"leaseunit"				=> $value->leaseunit,
					"rent_price"			=> $value->rent_price,
					"memo"					=> $value->memo,
				);
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 201);
	}
	//DELETE
	function invoice_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Choulr_contract(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
		}

		//Response data
		$this->response($data, 200);
	}

	//Record
	function record_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_pattern = 0;
		$obj = new Choulr_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
				$r = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$r->where("meter_id", $value->id)->limit(1)->order_by("id", "desc")->get();
		 		$data["results"][] = array(
		 			"id" 				=> $value->id,
		 			"meter_number" 		=> $value->number,
		 			"from_date" 		=> $r->from_date,
		 			"to_date" 			=> $r->to_date,
		 			"previous" 			=> $r->previous,
		 			"current" 			=> $r->current,
		 			"month_of" 			=> $r->month_of,
		 		);
		 	}
		}
		//Response Data		
		$this->response($data, 200);
	}
	function record_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Choulr_space(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->name) 		? $obj->name 	= $value->name : "";
			$obj->is_system = 0;
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id,
			   		"name" 			=> $obj->name
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function record_put(){
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Choulr_space(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			isset($value->name) 		? $obj->name 	= $value->name : "";
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id,
			   		"name" 			=> $obj->name
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 200);
	}
	function record_delete() {
		$models = json_decode($this->delete('models'));
		foreach ($models as $key => $value) {
			$obj = new Choulr_space(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
		}

		//Response data
		$this->response($data, 200);
	}

	//Blank
	function blank_get() {
	}
	//Readding
	function readings_post() {
		$models = json_decode($this->post('models'));

		foreach ($models as $value) {
			$obj = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$meter = new Choulr_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$meter->where('number', $value->meter_number)->get();
			if($meter->exists()){
				$current = intval($value->current);
				$obj->meter_id 		= isset($meter->id)			? $meter->id : "";
				$obj->previous 		= isset($value->previous)	? $value->previous : "";
				$obj->current 		= isset($current)			? $current : "";
				$oldcurrent = 0;
				if($value->round == 1){
					$digit = $meter->number_digit;
					$oldcurrent =  pow(10, $digit);
					$oldcurrent = $oldcurrent - intval($value->previous);
					$obj->usage    = intval($oldcurrent) + intval($value->current);
					$meter->round += 1;
					$meter->save();
					$obj->new_round = 1;
				}else{
					$obj->usage    = intval($current) - intval($value->previous);
					$obj->new_round = 0;
				}
				//Old Meter Record
				$oldmr = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$oldmr->where("meter_id", $meter->id)->limit(1)->order_by("id", "desc")->get();
				if($oldmr->exists()){
					$obj->from_date = $oldmr->to_date;
				}else{
					$obj->from_date = isset($value->from_date) 	? date('Y-m-d', strtotime($value->from_date)) : date('Y-m-d');
				}
				//
				$obj->month_of 	= isset($value->month_of)	? date('Y-m-d', strtotime($value->month_of)): date('Y-m-d');
				$obj->to_date 	= isset($value->to_date)	? date('Y-m-d', strtotime($value->to_date)):date('Y-m-d');
				$obj->invoiced 		= isset($value->invoiced)	? $value->invoiced : 0;
				$obj->created_at = date('Y-m-d H:i:s');
				if($obj->save()){								
					//Respsone
					$data["results"][] = array(
						"id"			=> $obj->id,
						"meter_id" 		=> $obj->meter_id,
						"meter_number" 	=> $meter->number,
						"prev"			=> $obj->previous,
						"current"		=> $obj->current,
						"from_date"		=> $obj->from_date,
						"month_of"		=> $obj->month_of,
						"invoiced" 		=> $obj->invoiced,
						"to_date"		=> $obj->to_date,
						"usage" 		=> $obj->usage
					);				
				}
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