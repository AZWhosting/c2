<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class Loyalty extends REST_Controller {	
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
	//Card
	function card_get(){
		$data["results"] = [];
		$data["count"] = 0;
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$obj = new Card(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		//Filter
		if(!empty($filter['filters']) && isset($filter['filters'])){
	    	foreach ($filter['filters'] as $value) {
	    		if(isset($value['operator'])) {
					if($value['operator']=="startswith"){
	    				$obj->like($value['field'], $value['value'], 'after');
	    			}else if($value['operator']=="contains"){
	    				$obj->like($value['field'], $value['value'], 'both');
	    			}else if($value['operator']=="by_user_id"){
	    				$employeeUsers = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	    				$employeeUsers->where("user_id", $value['value']);
	    				$employeeUsers->get();

	    				if($employeeUsers->exists()){
	    					$obj->where_related_contact_assignee($value['field'], $employeeUsers->id);
	    				}
	    			}else{
						$obj->{$value['operator']}($value['field'], $value['value']);
	    			}
				} else {
					if($value["field"]=="is_pattern"){
	    				$is_pattern = $value["value"];
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
				$statusdetail = "";
				$contact = "";
				if($value->status == 1){
					$statusdetail = "Activated";
					if($value->contact_id > 0){
						$con = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$con->where("id", $value->contact_id)->limit(1)->get();
						$contact = $con->name;
					}
				}else{
					$statusdetail = "Not Activated";
				}
				$data["results"][] = array(
					"id" 				=> $value->id,
					"name" 				=> $value->name,
					"number"			=> $value->number,
					"serial"			=> $value->serial,
					"status" 			=> $statusdetail,
					"contact_id" 		=> $value->contact_id,
					"contact_name" 		=> $contact,
					"registered_date"	=> $value->registered_date,
				);
			}
		}
		//Response Data
		$this->response($data, 200);
	}
	function card_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Spa_card(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->name) 		? $obj->name 			= $value->name : "";
			isset($value->number) 		? $obj->number 			= $value->number : "";
			isset($value->serial) 		? $obj->serial 			= $value->serial : "";
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id,
			   		"name" 			=> $obj->name,
					"number"		=> $obj->card,
					"serial"		=> $obj->serial,
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);	
	}
	function card_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Spa_card(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			isset($value->name) 		? $obj->name 			= $value->name : "";
			isset($value->number) 		? $obj->number 			= $value->number : "";
			isset($value->serial) 		? $obj->serial 			= $value->serial : "";
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id,
			   		"name" 			=> $obj->name,
					"number"		=> $obj->card,
					"serial"		=> $obj->serial,
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 200);
	}
	function card_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Spa_card(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
		}
	}
	function activate_card_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$contact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$contact->name = isset($value->name) ? $value->name : "";
			$contact->country_id = 36;
			$contact->memo = isset($value->nationality) ? $value->nationality : "";
			$contact->contact_type_id = 4;
			$contact->abbr = "CP";
			$contact->gender = isset($value->gender) ? $value->gender : "M";
			$contact->dob = isset($value->dob) ? $value->dob : "";
			$contact->locale = isset($value->locale) ? $value->locale : "km-KH";
			$contact->dob = isset($value->dob) ? $value->dob : "";
			$contact->phone = isset($value->phone) ? $value->phone : "";
			$contact->payment_term_id = 4;
			$contact->payment_method_id = 1;
			$contact->deposit_account_id = 55;
			$contact->trade_discount_id = 72;
			$contact->settlement_discount_id = 99;
			$contact->account_id = 10;
			$contact->ra_id = 71;
			$contact->or_account_id = 110;
			$contact->tax_item_id = 10;
			$contact->registered_date = isset($value->registered_date) ? $value->registered_date : "";
			$contact->status = 1;
			$contact->type = 1;
			if($contact->save()){
				$card = new Spa_card(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$card->where("id", $value->card_id)->limit(1)->get();
				$card->contact_id = $contact->id;
				$card->status = 1;
				$card->registered_date = isset($value->registered_date) ? $value->registered_date : "";
				$card->activated_by = isset($value->activated_by) ? $value->activated_by : "";
		   		if($card->save()){
				   	$data["results"][] = array(
				   		"id" 				=> $contact->id,
				   	);
			    }
			}			
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);	
	}
	function card_loyalty_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Spa_card_loyalty(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->card_id) 			? $obj->card_id 			= $value->card_id : 0;
			isset($value->loyalty_id) 		? $obj->loyalty_id 		= $value->loyalty_id : 0;
			$obj->status = 1;
	   		if($obj->save()){
	   			$loyalty = new Spa_loyalty(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$loyalty->where("id", $obj->loyalty_id)->limit(1)->get();
	   			//Add Reward
	   			if($loyalty->base == 2){
	   				$reward = new Spa_card_reward(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   				$reward->loyalty_id = $obj->loyalty_id;
	   				$reward->card_id = $obj->id;
	   				$reward->amount = 0;
	   				$reward->type = 2;
	   				$reward->save();
	   			}
			   	$data["results"][] = array(
			   		"id" 					=> $obj->id,
			   		"card_id" 				=> $obj->card_id,
					"loyalty_id"			=> $obj->loyalty_id,
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function card_loyalty_get(){
		$data["results"] = [];
		$data["count"] = 0;
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$obj = new Spa_card_loyalty(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		//Filter
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter["filters"] as $value) {
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
				$loyalty = new Spa_loyalty(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$loyalty->where("status", 1);
				$loyalty->where("id", $value->loyalty_id)->limit(1)->get();
				$base = "Promotion";
				if($loyalty->base != 1){
					$base = "Point";
				}
				$status = "Active";
				if($loyalty->status == 0){
					$status = "Inactive";
				}
				$rewardtype = "%";
				$rewardamount = floatval($loyalty->reward_amount);
				if($loyalty->reward_type != 1){
					$rewardtype = "$";
				}
				$reward_amount = 0;
				$reward = new Spa_card_reward(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$reward->where("loyalty_id", $loyalty->id)->limit(1)->get();
				if($reward->exists()){
					$reward_amount = $reward->amount;
				}
				$dcompare = date('Y-m-d');
				if($dcompare > $loyalty->expire){
					$status = "Expire";
				}
				$data["results"][] = array(
			   		"id" 			=> $loyalty->id,
			   		"name" 			=> $loyalty->name,
					"base"			=> $base,
					"base_type" 	=> $loyalty->base_type,
					"reward_amount"	=> intval($loyalty->reward_amount),
					"reward_type" 	=> intval($loyalty->reward_type),
					"reward"	 	=> $reward_amount.$rewardtype,
					"expire" 		=> $loyalty->expire,
					"status" 		=> $status,
					"amount_per_point" => floatval($loyalty->amount_per_point),
					"amount_type" 	=> intval($loyalty->amount_type),
					"point_per_reward" 	=> floatval($loyalty->point_per_reward),
			   	);
			}
		}
		//Response Data
		$this->response($data, 200);
	}
}
/* End of file choulr.php */
/* Location: ./application/controllers/api/meters.php */