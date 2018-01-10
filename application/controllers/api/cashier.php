<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Cashier extends REST_Controller {	
	public $_database;
	public $server_host;
	public $server_user;
	public $server_pwd;
	public $inst;
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
		$this->inst = $this->input->get_request_header('Institute');
	}
	//Seesion
	function index_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_pattern = 0;
		$obj = new Cashier_session(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
		$obj->order_by("id", "desc");
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
				$employee = "";
				$em = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$em->where("user_id", $value->cashier_id)->limit(1)->get();
				if($em->exists()){
					$employee = $em->name;
				}else{
					$us = new User(null, $this->server_host, $this->server_user, $this->server_pwd, 'banhji');
					$us->where("id", $value->cashier_id)->limit(1)->get();
					if($us->exists()){
						$employee = $us->first_name." ".$us->last_name;
					}
				}
		 		$data["results"][] = array(
		 			"id" 			=> $value->id,
		 			"employee" 		=> $employee,
		 			"start_date" 	=> $value->start_date,
		 			"end_date" 		=> $value->end_date,
		 			"status" 		=> $value->status
		 		);
		 	}
		}
		//Response Data		
		$this->response($data, 200);
	}
	function index_post(){
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
	function index_put(){
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
	function index_delete() {
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
	//Start Ballance
	function start_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$obj = new Cashier_session(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
		$obj->where("status", 0)->order_by("id", "desc")->limit(1)->get();
		//Results
		$data["count"] = $obj->result_count();
		if($obj->exists()){
			foreach ($obj as $value) {
				//Start 
				$startss = new Cashier_session_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$startss->where("cashier_session_id", $value->id)->get_iterated();
				$startitem = [];
				if($startss->exists()){
					foreach($startss as $start){
						$startrate = new Currency(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$startrate->where("code", $start->currency)->get();
						$startitem[] = array(
							"id" 		=> $start->id,
							"amount" 	=> floatval($start->amount),
							"locale" 	=> $startrate->locale,
							"currency" 	=> $start->currency,
						);
					}
				}
				//Amount Recieve
				$receivess = new Cashier_session_receive(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$receivess->where("cashier_session_id", $value->id)->get_iterated();
				$receiveitem = [];
				$receivegroup = [];
				$currency = array();
				$code = "";
				if($receivess->exists()){
					foreach($receivess as $receive){
						$sr = new Currency(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$sr->where("locale", $receive->locale)->limit(1)->get();
						$receiveitem[] = array(
							"id" 		=> $receive->id,
							"amount" 	=> floatval($receive->amount),
							"transaction_id" => $receive->transaction_id,
							"rate" 		=> floatval($receive->rate),
							"code" 		=> $sr->code,
							"locale" 	=> $receive->locale
						);
						if (in_array($receive->locale, $currency)) {
							$i = 0;
							foreach($receivegroup as $rg){
								if($rg["locale"] == $receive->locale){
									$receivegroup[$i]["amount"] += floatval($receive->amount);
								}
							}
						}else{
							array_push($currency, $receive->locale);
							$receivegroup[] = array(
								"id" 		=> $receive->id,
								"amount" 	=> floatval($receive->amount),
								"transaction_id" => $receive->transaction_id,
								"rate" 		=> floatval($receive->rate),
								"code" 		=> $sr->code,
								"locale" 	=> $receive->locale
							);
						}
					}
				}
				//Note get and change
				$notess = new  Cashier_currency(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$notess->where("cashier_session_id", $value->id)->get_iterated();
				$noteitemget = [];
				$noteitemchange = [];
				if($notess->exists()){
					foreach($notess as $note){
						if($note->amount > 0){
							if($note->type == 0){
								$noteitemget[] = array(
									"id" 		=> $note->id,
									"amount" 	=> floatval($note->amount),
									"rate" 		=> floatval($note->rate),
									"currency" 	=> $note->currency,
								);
							}else{
								$noteitemchange[] = array(
									"id" 		=> $note->id,
									"amount" 	=> floatval($note->amount),
									"rate" 		=> floatval($note->rate),
									"currency" 	=> $note->currency,
								);
							}
						}
					}
				}
				$drate = new Currency_rate(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$drate->where("is_system", 1)->get();
				$signrate = new Currency(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$signrate->where("locale", $drate->locale)->get();
				$ratearr = [];
				foreach($drate as $rate){
					$ratearr = array(
						"id" 		=> $rate->id,
						"rate" 		=> floatval($rate->rate),
						"locale" 	=> $rate->locale,
						"currency" 	=> $signrate->code,
					);
				}
		 		$data["results"][] = array(
		 			"id" 				=> $value->id,
		 			"cashier_id" 		=> $value->cashier_id,
		 			"start_amount" 		=> $startitem,
		 			"receive_amount" 	=> $receiveitem,
		 			"note_receive" 		=> $noteitemget,
		 			"note_change" 		=> $noteitemchange,
		 			"receive_group" 	=> $receivegroup,
		 			"rate" 				=> $ratearr,
		 		);
		 	}
		}
		//Response Data		
		$this->response($data, 200);
	}
	//Actual
	function blank_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_pattern = 0;
		// $obj = new Choulr_space(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		// //Sort
		// if(!empty($sort) && isset($sort)){
		// 	foreach ($sort as $value) {
		// 		if(isset($value['operator'])){
		// 			$obj->{$value['operator']}($value["field"], $value["dir"]);
		// 		}else{
		// 			$obj->order_by($value["field"], $value["dir"]);
		// 		}
		// 	}
		// }
		// //Filter
		// if(!empty($filter) && isset($filter)){
	 //    	foreach ($filter["filters"] as $value) {
	 //    		if(isset($value["operator"])) {
		// 			$obj->{$value["operator"]}($value["field"], $value["value"]);
		// 		} else {
	 //    			$obj->where($value["field"], $value["value"]);
		// 		}
		// 	}
		// }
		// //Results
		// if($page && $limit){
		// 	$obj->get_paged_iterated($page, $limit);
		// 	$data["count"] = $obj->paged->total_rows;
		// }else{
		// 	$obj->get_iterated();
		// 	$data["count"] = $obj->result_count();
		// }
		// if($obj->exists()){
		// 	foreach ($obj as $value) {
		//  		$data["results"][] = array(
		//  			"id" 		=> $value->id,
		//  			"name" 		=> $value->name,
		//  			"is_system" => $value->is_system
		//  		);
		//  	}
		// }
		// //Response Data		
		// $this->response($data, 200);
	}
	//Note
	function note_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_pattern = 0;
		$obj = new Cashier_note_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
		 			"id" 					=> $value->id,
		 			"cashier_session_id" 	=> $value->cashier_session_id,
		 			"cashier_id" 			=> $value->cashier_id,
		 			"currency" 				=> $value->currency,
		 			"note" 					=> $value->note,
		 			"unit" 					=> $value->unit,
		 			"total" 				=> intval($value->note) * intval($value->unit)
		 		);
		 	}
		}
		//Response Data		
		$this->response($data, 200);
	}
	function note_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			if($value->unit > 0){
				$obj = new Cashier_note_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				isset($value->cashier_id) 			? $obj->cashier_id = $value->cashier_id : "";
				isset($value->cashier_session_id) 	? $obj->cashier_session_id = $value->cashier_session_id : "";
				isset($value->currency) 			? $obj->currency = $value->currency : "km-KH";
				isset($value->note) 				? $obj->note 	= $value->note : 1;
				isset($value->unit) 				? $obj->unit 	= $value->unit : "";
		   		if($obj->save()){
				   	$data["results"][] = array(
				   		"id" 			=> $obj->id,
				   	);
			    }
			}
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
}
/* End of file meters.php */
/* Location: ./application/controllers/api/utibills.php */