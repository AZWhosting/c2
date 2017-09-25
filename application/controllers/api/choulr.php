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
			$table->tariff_id 	= 0;
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
					"electricity_meter_id"			=> $value->electricity_meter_id,
					"img1"			=> $value->img1,
					"img2"			=> $value->img2,
					"img3"			=> $value->img3,
					"img4"			=> $value->img4,
					"img5"			=> $value->img5,
					"img6"			=> $value->img6
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
			isset($value->electricity_meter_id) ? $obj->electricity_meter_id 	= $value->electricity_meter_id : "";
			isset($value->img1) 				? $obj->img1 				= $value->img1 : "";
			isset($value->img2) 				? $obj->img2 				= $value->img2 : "";
			isset($value->img3) 				? $obj->img3 				= $value->img3 : "";
			isset($value->img4) 				? $obj->img4 				= $value->img4 : "";
			isset($value->img5) 				? $obj->img5 				= $value->img5 : "";
			isset($value->img6) 				? $obj->img6 				= $value->img6 : "";
		   	
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
					"img6"						=> $obj->img6
			   	);
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
					"img6"						=> $obj->img6
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
/* End of file choulr.php */
/* Location: ./application/controllers/api/meters.php */