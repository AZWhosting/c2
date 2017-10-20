<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Utibills extends REST_Controller {	
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
	//Search
	function search_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
		$obj->where("type", "Utility_Invoice");
		$obj->where("status <>", 1);
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
				//Calulate Fine
				$fineAmount = 0;
				if($value->status == 0){
					//Chhayhout Find module
					if($this->_database == 'db_1501212262'){
						$fine = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$fine->where("transaction_id", $value->id);
						$fine->where("type", "fine")->order_by("id", "desc")->limit(1)->get();
						if($fine->exists()){
							$dueDate = new DateTime($value->due_date);
							$ddate = $dueDate->getTimestamp();
							$fineDate = new DateTime(date('Y-m-d'));
							$fdate = $fineDate->getTimestamp();
							if($fdate > $ddate){
								$fDay = $fineDate->diff($dueDate)->days;
								$fineDay = $fDay * 500;
								$fineAmount = floatval($fineDay);
								if($fDay >= 10){
									$fineAmount += 10000;
								}
							}
						}
					//Borey Kamakor
					}elseif($this->_database == 'db_1508214577'){
						$fine = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$fine->where("transaction_id", $value->id);
						$fine->where("type", "fine")->order_by("id", "desc")->limit(1)->get();
						if($fine->exists()){
							$dueDate = new DateTime($value->due_date);
							$ddate = $dueDate->getTimestamp();
							$fineDate = new DateTime(date('Y-m-d'));
							$fdate = $fineDate->getTimestamp();
							if($fdate > $ddate){
								$fDay = $fineDate->diff($dueDate)->days;
								$fDay;
								$fineAmount = (floatval($value->amount) * intval($fDay)) / 100 ;
							}
						}
					//Normal fine
					}else{
						$fine = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$fine->where("transaction_id", $value->id);
						$fine->where("type", "fine")->order_by("id", "desc")->limit(1)->get();
						if($fine->exists()){
							$dueDate = new DateTime($value->due_date);
							$ddate = $dueDate->getTimestamp();
							$fineDate = new DateTime(date('Y-m-d'));
							$fdate = $fineDate->getTimestamp();
							if($fdate > $ddate){
								$fineDate = $fineDate->diff($dueDate)->days;
								$fineDateAmount = intval($fine->quantity);
								if($fineDate >= $fineDateAmount){
									$fineAmount = floatval($fine->amount);
								}
							}
						}
					}
				}
				//Sum amount paid
				$amount_paid = 0;
				//Check Pastsoldpaid
				if($value->status == 2){
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$paid->select_sum("amount");
					$paid->select_sum("discount");
					$paid->where_in("type", "Cash_Receipt");					
					$paid->where("reference_id", $value->id);
					$paid->where("deleted <>",1);
					$paid->get();
					$amount_paid = floatval($paid->amount) + floatval($paid->discount);
				}
				$meter = "";
				$meterNum = "";
				if($value->meter_id != 0){
					$meter = $value->meter->get();
					$meterNum = $meter->get()->number;
				}
				isset($value->payment_term_id) ? $value->payment_term_id = $value->payment_term_id : 5;
				$contact = $value->contact->get();
				$data["results"][] = array(
					"id" 						=> $value->id,
					"company_id" 				=> $value->company_id,
					"location_id" 				=> $value->location_id,
					"pole_id" 					=> $value->pole_id,
					"box_id" 					=> $value->box_id,
					"contact_id" 				=> intval($value->contact_id),
					"contact_name" 				=> $contact->name,
					"payment_term_id" 			=> $value->payment_term_id,
					"transaction_template_id" 	=> $value->transaction_template_id,
					"reference_id" 				=> intval($value->reference_id),
					"account_id" 				=> intval($value->account_id),
					"item_id" 					=> $value->item_id,
					"tax_item_id" 				=> $value->tax_item_id,
					"wht_account_id"			=> $value->wht_account_id,
					"user_id" 					=> $value->user_id,
				   	"number" 					=> $value->number,
				   	"type" 						=> $value->type,
				   	"journal_type" 				=> $value->journal_type,
				   	"sub_total"					=> floatval($value->sub_total),
				   	"discount" 					=> floatval($value->discount),
				   	"tax" 						=> floatval($value->tax),
				   	"amount" 					=> floatval($value->amount),
				   	"fine" 						=> floatval($value->fine),
				   	"deposit"					=> floatval($value->deposit),
				   	"remaining" 				=> floatval($value->remaining),
				   	"rate" 						=> floatval($value->rate),
				   	"locale" 					=> $value->locale,
				   	"month_of"					=> $value->month_of,
				   	"issued_date"				=> $value->issued_date,
				   	"bill_date"					=> $value->bill_date,
				   	"payment_date" 				=> $value->payment_date,
				   	"due_date" 					=> $value->due_date,
				   	"reference_no" 				=> $value->reference_no,
				   	"references" 				=> $value->references!="" ? array_map('intval', explode(",", $value->references)) : [],
				   	"memo" 						=> $value->memo,
				   	"memo2" 					=> $value->memo2,
				   	"status" 					=> intval($value->status),
				   	"is_journal" 				=> $value->is_journal,
				   	"print_count" 				=> $value->print_count,
				   	"amount_fine" 				=> $fineAmount,
				   	"meter"						=> $meterNum,
				   	"meter_id"					=> $value->meter_id,
				   	"amount_paid"				=> $amount_paid
				);
				//Check Relate Invoice
				$relateinv = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$relateinv->where("type", "Utility_Invoice");
				$relateinv->where("meter_id", $value->meter_id);
				$relateinv->where("id <>", $value->id);
				$relateinv->where("status <>", 1);
				$relateinv->where("deleted <>", 1);
				$relateinv->get_iterated();
				if($relateinv->exists()){
					foreach ($relateinv as $relate) {
						//Calulate Fine
						//Chhayhout Find module
						if($this->_database == 'db_1501212262'){
							$fine = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$fine->where("transaction_id", $value->id);
							$fine->where("type", "fine")->order_by("id", "desc")->limit(1)->get();
							if($fine->exists()){
								$dueDate = new DateTime($value->due_date);
								$ddate = $dueDate->getTimestamp();
								$fineDate = new DateTime(date('Y-m-d'));
								$fdate = $fineDate->getTimestamp();
								if($fdate > $ddate){
									$fDay = $fineDate->diff($dueDate)->days;
									$fineDay = $fDay * 500;
									$fineAmount = floatval($fineDay);
									if($fDay >= 10){
										$fineAmount += 10000;
									}
								}
							}
						//Normal fine
						}else{
							$fine = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$fine->where("transaction_id", $value->id);
							$fine->where("type", "fine")->order_by("id", "desc")->limit(1)->get();
							if($fine->exists()){
								$dueDate = new DateTime($value->due_date);
								$ddate = $dueDate->getTimestamp();
								$fineDate = new DateTime(date('Y-m-d'));
								$fdate = $fineDate->getTimestamp();
								if($fdate > $ddate){
									$fineDate = $fineDate->diff($dueDate)->days;
									$fineDateAmount = intval($fine->quantity);
									if($fineDate >= $fineDateAmount){
										$fineAmount = floatval($fine->amount);
									}
								}
							}
						}
						//Sum amount paid
						$amount_paid = 0;
						//Check Pastsoldpaid
						if($relate->status == 2){
							$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$paid->select_sum("amount");
							$paid->select_sum("discount");
							$paid->where_in("type", "Cash_Receipt");					
							$paid->where("reference_id", $relate->id);
							$paid->where("deleted <>",1);
							$paid->get();
							$amount_paid = floatval($paid->amount) + floatval($paid->discount);
						}
						$meter = "";
						$meterNum = "";
						if($relate->meter_id != 0){
							$meter = $relate->meter->get();
							$meterNum = $meter->get()->number;
						}
						isset($relate->payment_term_id) ? $relate->payment_term_id = $relate->payment_term_id : 5;
						$contact = $relate->contact->get();
						$data["results"][] = array(
							"id" 						=> $relate->id,
							"company_id" 				=> $relate->company_id,
							"location_id" 				=> $relate->location_id,
							"pole_id" 					=> $relate->pole_id,
							"box_id" 					=> $relate->box_id,
							"contact_id" 				=> intval($relate->contact_id),
							"contact_name" 				=> $contact->name,
							"payment_term_id" 			=> $relate->payment_term_id,
							"transaction_template_id" 	=> $relate->transaction_template_id,
							"reference_id" 				=> intval($relate->reference_id),
							"account_id" 				=> intval($relate->account_id),
							"item_id" 					=> $relate->item_id,
							"tax_item_id" 				=> $relate->tax_item_id,
							"wht_account_id"			=> $relate->wht_account_id,
							"user_id" 					=> $relate->user_id,
						   	"number" 					=> $relate->number,
						   	"type" 						=> $relate->type,
						   	"journal_type" 				=> $relate->journal_type,
						   	"sub_total"					=> floatval($relate->sub_total),
						   	"discount" 					=> floatval($relate->discount),
						   	"tax" 						=> floatval($relate->tax),
						   	"amount" 					=> floatval($relate->amount),
						   	"fine" 						=> floatval($relate->fine),
						   	"deposit"					=> floatval($relate->deposit),
						   	"remaining" 				=> floatval($relate->remaining),
						   	"rate" 						=> floatval($relate->rate),
						   	"locale" 					=> $relate->locale,
						   	"month_of"					=> $relate->month_of,
						   	"issued_date"				=> $relate->issued_date,
						   	"bill_date"					=> $relate->bill_date,
						   	"payment_date" 				=> $relate->payment_date,
						   	"due_date" 					=> $relate->due_date,
						   	"reference_no" 				=> $relate->reference_no,
						   	"references" 				=> $relate->references!="" ? array_map('intval', explode(",", $relate->references)) : [],
						   	"memo" 						=> $relate->memo,
						   	"memo2" 					=> $relate->memo2,
						   	"status" 					=> intval($relate->status),
						   	"is_journal" 				=> $relate->is_journal,
						   	"print_count" 				=> $relate->print_count,
						   	"meter"						=> $meterNum,
						   	"amount_fine" 				=> $fineAmount,
						   	"meter_id"					=> $relate->meter_id,
						   	"amount_paid"				=> $amount_paid
						);
					}
				}
			}
		}
		//Response Data
		$this->response($data, 200);
	}
	//Search
	function meters_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_pattern = 0;

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
	    		if(isset($value["operator"])) {
					$obj->{$value["operator"]}($value["field"], $value["value"]);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}
		//Get Result
		$obj->order_by('worder','asc');
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
				$data["results"][] = array(
					"id" 				=> $value->id,
					"number" 			=> $value->number,
					"meter_number" 		=> $value->number,
					"group" 			=> $value->group,
					"type" 				=> $value->type,
					"activated" 		=> $value->activated,
					"status" 			=> $value->status,
					"reaktive" 			=> 0,
				);
				if($value->reactive_id != 0){
					$remeter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$remeter->where("id", $value->reactive_id)->limit(1)->get();
					if($remeter->exists()){
						$data["results"][] = array(
							"id" 				=> $remeter->id,
							"number" 			=> $remeter->number,
							"meter_number" 		=> $remeter->number,
							"group" 			=> $remeter->group,
							"type" 				=> $remeter->type,
							"activated" 		=> $remeter->activated,
							"status" 			=> $remeter->status,
							"reaktive" 			=> 1,
						);
					}
				}
			}
		}
		//Response Data
		$this->response($data, 200);
	}
	//Post Cash Receipt
	function cashreceipt_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		$number = "";
		foreach ($models as $value) {
			//Generate Number
			if(isset($value->number)){
				$number = $value->number;
				if($number==""){
					$number = $this->_generate_number($value->type, $value->issued_date);
				}
			}else{
				$number = $this->_generate_number($value->type, $value->issued_date);
			}
			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->company_id) 				? $obj->company_id 					= $value->company_id : "";
			isset($value->location_id) 				? $obj->location_id 				= $value->location_id : 0;
			isset($value->pole_id) 					? $obj->pole_id 					= $value->pole_id : 0;
			isset($value->box_id) 					? $obj->box_id 						= $value->box_id : 0;
			isset($value->contact_id) 				? $obj->contact_id 					= $value->contact_id : "";
			isset($value->payment_term_id) 			? $obj->payment_term_id 			= $value->payment_term_id : 5;
			isset($value->payment_method_id) 		? $obj->payment_method_id 			= $value->payment_method_id : "";
			isset($value->transaction_template_id) 	? $obj->transaction_template_id 	= $value->transaction_template_id : "";
			isset($value->reference_id) 			? $obj->reference_id 				= $value->reference_id : "";
			isset($value->recurring_id) 			? $obj->recurring_id 				= $value->recurring_id : "";
			isset($value->return_id) 				? $obj->return_id 					= $value->return_id : "";
			isset($value->job_id) 					? $obj->job_id 						= $value->job_id : "";
			isset($value->account_id) 				? $obj->account_id 					= $value->account_id : "";
			isset($value->item_id) 					? $obj->item_id 					= $value->item_id : "";
			isset($value->tax_item_id) 				? $obj->tax_item_id 				= $value->tax_item_id : "";
			isset($value->wht_account_id) 			? $obj->wht_account_id 				= $value->wht_account_id : "";
			isset($value->user_id) 					? $obj->user_id 					= $value->user_id : "";
			isset($value->employee_id) 				? $obj->employee_id 				= $value->employee_id : "";
			$obj->number = $number;
		   	isset($value->type) 					? $obj->type 						= $value->type : "Cash_Receipt";
		   	isset($value->journal_type) 			? $obj->journal_type 				= $value->journal_type : "";
		   	isset($value->sub_total) ? $obj->sub_total 	= floatval($value->amount) - floatval($value->amount_fine) : 0;
		   	isset($value->discount) 				? $obj->discount 					= floatval($value->discount) : 0;
		   	isset($value->tax) 						? $obj->tax 						= $value->tax : "";
		   	isset($value->amount) 					? $obj->amount 						= floatval($value->amount) : 0;
		   	isset($value->fine) 					? $obj->fine 						= $value->fine : "";
		   	isset($value->deposit) 					? $obj->deposit 					= $value->deposit : "";
		   	isset($value->remaining) 				? $obj->remaining 					= $value->remaining : "";
		   	isset($value->received) 				? $obj->received 					= $value->received : "";
		   	isset($value->change) 					? $obj->change 						= $value->change : "";
		   	isset($value->credit_allowed) 			? $obj->credit_allowed 				= $value->credit_allowed : "";
		   	isset($value->additional_cost) 			? $obj->additional_cost 			= $value->additional_cost : "";
		   	isset($value->additional_apply) 		? $obj->additional_apply 			= $value->additional_apply : "";
		   	isset($value->rate) 					? $obj->rate 						= $value->rate : "";
		   	isset($value->locale) 					? $obj->locale 						= $value->locale : "";
		   	isset($value->month_of) 				? $obj->month_of 					= $value->month_of : "";
		   	isset($value->issued_date) 				? $obj->issued_date 				= $value->issued_date : "";
		   	isset($value->bill_date) 				? $obj->bill_date 					= $value->bill_date : "";
		   	isset($value->payment_date) 			? $obj->payment_date 				= $value->payment_date : "";
		   	isset($value->due_date) 				? $obj->due_date 					= $value->due_date : "";
		   	isset($value->deposit_date) 			? $obj->deposit_date 				= $value->deposit_date : "";
		   	isset($value->reference_no) 			? $obj->reference_no 				= $value->reference_no : "";
		   	isset($value->bill_to) 					? $obj->bill_to 					= $value->bill_to : "";
		   	isset($value->ship_to) 					? $obj->ship_to 					= $value->ship_to : "";
		   	isset($value->memo) 					? $obj->memo 						= $value->memo : "";
		   	isset($value->memo2) 					? $obj->memo2 						= $value->memo2 : "";
		   	isset($value->status) 					? $obj->status 						= $value->status : 0;
		   	isset($value->is_recurring) 			? $obj->is_recurring 				= $value->is_recurring : "";
		   	isset($value->is_journal) 				? $obj->is_journal 					= $value->is_journal : "";
		   	isset($value->meter_id) 				? $obj->meter_id 					= $value->meter_id : 0;
		   	isset($value->amount_fine) 				? $obj->fine 						= $value->amount_fine : 0;
		   	$obj->sync = 1;
	   		if($obj->save()){
	   			//Journal DR
	   			$journal = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$journal->transaction_id = $obj->id;
	   			$journal->account_id = $obj->account_id;
	   			$journal->contact_id = $obj->contact_id;
	   			$journal->dr  		 = $obj->amount;
	   			$journal->description = "Utility Invoice";
	   			$journal->cr 		 = 0.00;
	   			$journal->rate 		 = $obj->rate;
	   			$journal->locale 	 = $obj->locale;
	   			$journal->save();
	   			if($obj->discount > 0){
	   				$journalD = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   			$journalD->transaction_id = $obj->id;
		   			$journalD->account_id 	= $obj->account_id;
		   			$journalD->contact_id 	= $obj->contact_id;
		   			$journalD->dr  		 	= $obj->discount;
		   			$journalD->description 	= "Utility Discount";
		   			$journalD->cr 		 	= 0.00;
		   			$journalD->rate 	 	= $obj->rate;
		   			$journalD->locale 	 	= $obj->locale;
		   			$journalD->save();
	   			}
	   			//Journal CR
	   			$journal2 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$journal2->transaction_id = $obj->id;
	   			$journal2->account_id = 10;
	   			$journal2->contact_id = $obj->contact_id;
	   			$journal2->dr 		  = 0.00;
	   			$journal2->cr 		  = ($obj->amount + $obj->discount) - $value->amount_fine;
	   			$journal2->description = "Utility Invoice";
	   			$journal2->rate 	  = $obj->rate;
	   			$journal2->locale 	  = $obj->locale;
	   			$journal2->save();
	   			//Fine
	   			if($value->amount_fine > 0){
	   				$journalF = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   			$journalF->transaction_id = $obj->id;
		   			$journalF->account_id 	= 110;
		   			$journalF->contact_id 	= $obj->contact_id;
		   			$journalF->dr  		 	= 0.00;
		   			$journalF->description 	= "Utility Fine";
		   			$journalF->cr 		 	= $value->amount_fine;
		   			$journalF->rate 	 	= $obj->rate;
		   			$journalF->locale 	 	= $obj->locale;
		   			$journalF->save();
	   			}
	   			$oldtran = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$oldtran->where("id", $value->reference_id)->limit(1)->get();
	   			$famount = 0;
	   			$samount = 0;
	   			if($value->amount_fine > 0){
	   				$famount = $oldtran->amount + $value->amount_fine;
	   				$oldtran->fine = $value->amount_fine;
	   				$oldtran->amount = $oldtran->amount + $value->amount_fine;
	   			}else{
	   				$famount = $oldtran->amount;
	   			}
	   			$oldreciept = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$oldreciept->where("type", "Cash_Receipt");
	   			$oldreciept->where("reference_id", $oldtran->id);
	   			$oldreciept->get();
	   			if($oldreciept->exists()){
	   				foreach ($oldreciept as $oreciept) {
	   					$samount += $oreciept->amount;
	   				}
	   			}
	   			if($famount == $samount){
	   				$oldtran->status = 1;
	   			}else{
	   				$oldtran->status = 2;
	   			}
	   			$oldtran->save();
	   			//Session Recieve
	   			if($value->session_id){
	   				$srecieve = new Cashier_session_receive(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   				$srecieve->cashier_session_id = $value->session_id;
	   				$srecieve->transaction_id = $value->reference_id;
	   				$srecieve->contact_id = $value->contact_id;
	   				$srecieve->amount = $value->amount;
	   				$srecieve->time = $value->issued_date;
	   				$srecieve->save();	
	   			}
			   	$data["results"][] = array(
			   		"id" => $obj->id
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);			
	}
	//Search
	function currency_get(){
		$data["results"] = [];
		$data["count"] = 0;
		$sort 	 	= $this->get("sort");
		$obj = new Currency(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->where("status", 1);
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
		//Results
		$obj->get_iterated();
		if($obj->exists()){
			foreach ($obj as $value) {
				$rate = new Currency_rate(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$rate->where("currency_id", $value->id);
				$rate->order_by("date", "desc")->limit(1)->get_iterated();
				foreach ($rate as $rates) {
					$data["results"][] = array(
						"id" 		=> $rates->id,
						"code" 		=> $value->code,
						"locale" 	=> $rates->locale,
						"rate" 		=> $rates->rate,
						"date" 		=> $rates->date
					);
				}
				
			}
		}
		//Response Data
		$this->response($data, 200);
	}
	//Contact 
	function pcontact_get(){
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
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter['filters'] as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}
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
		 			"id" 				=> $value->id,
		 			"name" 				=> $value->name,	
		 			"abbr"				=> $value->abbr,
		 			"code"				=> $value->number,
					"address" 			=> $value->address
		 		);
			}
		}
		//Response Data		
		$this->response($data, 200);
	}
	function contacts_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
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
		if(!empty($filter['filters']) && isset($filter['filters'])){
	    	foreach ($filter['filters'] as $value) {
	    		if(isset($value['operator'])) {
					if($value['operator']=="startswith"){
	    				$obj->like($value['field'], $value['value'], 'after');
	    			}else if($value['operator']=="contains"){
	    				$obj->like($value['field'], $value['value'], 'both');
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

		$obj->where("is_pattern", $is_pattern);
		$obj->where("deleted <>", 1);
		$obj->include_related("contact_type", "name");

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
					"code" 						=> $value->number,
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
					"contact_type"				=> $value->contact_type_name,
					"sync"						=> $value->sync
		 		);
			}
		}

		//Response Data		
		$this->response($data, 200);
	}
	function contacts_post() {
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
			$obj->sync	= 1;
			if($obj->save()){
				$property = new Property(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$property->contact_id = $obj->id;
				$property->name = $obj->name;
				$property->code = $obj->number;
				$property->abbr = $obj->abbr;
				$property->address = $obj->address;
				$property->save();
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
	function contacts_put() {
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
			$obj->sync	= 2;
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
	//Order Meter
	function meter_order_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		$number = "";
		foreach ($models as $value) {
			$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("number", $value->meter_number)->order_by("id", "desc")->limit(1);
			isset($value->order) 	? $obj->worder 		= $value->order : 0;
	   		if($obj->save()){
	   			$data["results"][] = array(
			   		"id" => $obj->id
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
	function receiptauto_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		$number = "";
		foreach ($models as $value) {
			if($value->receive > 0){
				$meter =new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$meter->where('number', $value->meter_number)->order_by("id", "desc")->limit(1)->get();
				if($meter->exists()){
					$tran = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$tran->where("meter_id", $meter->id)->order_by("id", "desc")->limit(1)->get();
					if($tran->exists()){
						$IsD = date('Y-m-d');
						// Generate Number
						$number = $this->_generate_number("Cash_Receipt", $IsD);
						$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						isset($tran->company_id) 		? $obj->company_id 		= $tran->company_id : "";
						isset($tran->location_id) 		? $obj->location_id 	= $tran->location_id : 0;
						isset($tran->pole_id) 			? $obj->pole_id 		= $tran->pole_id : 0;
						isset($tran->box_id) 			? $obj->box_id 			= $tran->box_id : 0;
						isset($tran->contact_id) 		? $obj->contact_id 		= $tran->contact_id : "";
						isset($tran->payment_term_id) 	? $obj->payment_term_id 	= $tran->payment_term_id : 5;
						$obj->reference_id = $tran->id;
						isset($tran->user_id) 	? $obj->user_id 	= $tran->user_id : "";
						$obj->number = $number;
					   	$obj->type = "Cash_Receipt";
					   	$obj->sub_total = floatval($value->receive);
					   	$obj->amount = floatval($value->receive);
					   	isset($tran->rate) 			? $obj->rate 					= $tran->rate : 1;
					   	isset($tran->locale) 		? $obj->locale 					= $tran->locale : "";
					   	isset($tran->month_of) 		? $obj->month_of 				= $tran->month_of : "";
					   	$obj->issued_date = $IsD;
					   	isset($tran->bill_date) 	? $obj->bill_date 				= $tran->bill_date : "";
					   	isset($tran->payment_date) 	? $obj->payment_date 			= $tran->payment_date : "";
					   	isset($tran->due_date) 		? $obj->due_date 				= $tran->due_date : "";
					   	isset($tran->deposit_date) 	? $obj->deposit_date 			= $tran->deposit_date : "";
					   	$obj->reference_no 			= $tran->number;
					   	$obj->status 				= 1;
					   	$obj->is_journal 			= 1;
					   	$obj->account_id = 10;
					   	isset($tran->meter_id) 		? $obj->meter_id 		= $tran->meter_id : 0;
				   		if($obj->save()){
				   			//Journal DR
				   			$journal = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				   			$journal->transaction_id = $obj->id;
				   			$journal->account_id = $obj->account_id;
				   			$journal->contact_id = $obj->contact_id;
				   			$journal->dr  		 = $obj->amount;
				   			$journal->description = "Utility Invoice";
				   			$journal->cr 		 = 0.00;
				   			$journal->rate 		 = $obj->rate;
				   			$journal->locale 	 = $obj->locale;
				   			$journal->save();
				   			//Journal CR
				   			$journal2 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				   			$journal2->transaction_id = $obj->id;
				   			$journal2->account_id = 10;
				   			$journal2->contact_id = $obj->contact_id;
				   			$journal2->dr 		  = 0.00;
				   			$journal2->cr 		  = $obj->amount;
				   			$journal2->description = "Utility Invoice";
				   			$journal2->rate 	  = $obj->rate;
				   			$journal2->locale 	  = $obj->locale;
				   			$journal2->save();
				   			if(floatval($tran->amount) == floatval($value->receive)){
				   				$tran->status = 1; 
				   			}else{
				   				$tran->status = 2;
				   			}
				   			$tran->save();
					    }
					}else{
						$data["results"][] = array(
					   		"meter_number" => $value->meter_number
					   	);
					}
				}else{
					$data["results"][] = array(
				   		"meter_number" => $value->meter_number
				   	);
				}
			}
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function groupmeter_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("property_id", $value->property_id)->get();
			foreach($obj as $row){
				$row->group 		= $value->property_id;
				if($row->save()){
					$data["results"][] = array(
						"id" 			=> $row->id
					);				
				}
			}
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	} 
	function index_get(){
	}
	//Contact
	function ocontacts_get(){
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
	function oproperty_get(){
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
	function ometer_get(){
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
	function orecord_get(){
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
	function oinstallment_get(){
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
	function oinsitem_get(){
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
	//Clear Offline
	function offlineclear_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = array();
		$data["count"] = 1;
		foreach ($models as $value) {
			if($value->method == "clear"){
				//contact
				$con = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$con->update("sync", 0);
				//transaction
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$txn->update("sync", 0);
				//property
				$pro = new Property(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$pro->update("sync", 0);
				//meter
				$meter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$meter->update("sync", 0);
				//meter record
				$record = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$record->update("sync", 0);
				//Installment
				$ins = new Installment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$ins->update("sync", 0);
				//Installment Scedule
				$inti = new Installment_schedule(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$inti->update("sync", 0);
				//Results				
				$data["results"][] = array(
					"msg" 			=> "done"
				);
				$this->response($data, 200);
			}
		}
	}
	//Post TXN from offline
	function uploadoff_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			if($value->type == "txn"){
				$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				//protect dublicate
				$oldtxn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$oldtxn->where("number", $value->number)->limit(1)->get();
				if($oldtxn->exists()){
					$obj->get_by_id($oldtxn->id);
				}
				$obj->location_id 		= isset($value->location_id) ? $value->location_id : "";
				$obj->pole_id 			= isset($value->pole_id) ? $value->pole_id : "";
				$obj->box_id 			= isset($value->box_id) ? $value->box_id : "";
				$obj->contact_id 		= isset($value->contact_id) ? $value->contact_id : "";
				$obj->payment_term_id	= 5;
				$obj->payment_method_id = 0;
				$obj->account_id 		= 10;
			   	$obj->number 			= isset($value->number) ? $value->number : "";
			   	$obj->type 				= "Utility_Invoice";
			   	$obj->amount 			= isset($value->amount) ? $value->amount : "";
			   	$obj->rate 				= isset($value->rate) ? $value->rate : 1;
			   	$obj->locale 			= isset($value->locale) ? $value->locale : "";
			   	$obj->month_of 			= isset($value->month_of) ? $value->month_of : "";
			   	$obj->issued_date 		= isset($value->issue_date) ? $value->issue_date : "";
			   	$obj->bill_date 		= isset($value->bill_date) ? $value->bill_date : "";
			   	$obj->due_date 			= isset($value->due_date) ? $value->due_date : "";
			   	$obj->is_journal 		= 1;
			   	$obj->memo 				= isset($value->memo) ? $value->memo: "";
			   	$obj->meter_id 			= isset($value->meter_id) ? $value->meter_id: 0;
			   	$obj->status 			= 0;
			   	$obj->user_id 			= isset($value->read_by) ? $value->read_by: 0;
			   	$obj->sub_total 		= isset($value->amount) ? $value->amount : "";
		   		if($obj->save()){
		   			//protect dublicate
		   			$oldjn = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   			$oldjn->where("transaction_id", $obj->id)->get();
		   			if($oldjn->exists()){
		   				$oldjn->delete_all();
		   			}
		   			$journal = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   			$journal->transaction_id = $obj->id;
		   			$journal->account_id = 10;
		   			$journal->contact_id = $value->contact_id;
		   			$journal->dr  		 = $obj->amount;
		   			$journal->description = "Utility Invoice";
		   			$journal->cr 		 = 0.00;
		   			$journal->rate 		 = $obj->rate;
		   			$journal->locale 	 = $obj->locale;
		   			$journal->save();
		   			$journal2 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   			$journal2->transaction_id = $obj->id;
		   			$journal2->account_id = 71;
		   			$journal2->contact_id = $value->contact_id;
		   			$journal2->dr 		  = 0.00;
		   			$journal2->cr 		  = $obj->amount;
		   			$journal2->description = "Utility Invoice";
		   			$journal2->rate 	  = $obj->rate;
		   			$journal2->locale 	  = $obj->locale;
		   			$journal2->save();
					$data["results"][] = array(
				   		"id" 	=> $obj->id
				   	);
			    }
			    //Save Records
			    $record = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			    $record->meter_id = $value->meter_id;
			    $record->read_by = $value->read_by;
			    $record->input_by = $value->input_by;
			    $record->previous = $value->previous;
			    $record->current = $value->current;
			    $record->usage = $value->usage;
			    $record->month_of = $value->record_month_of;
			    $record->from_date = $value->from_date;
			    $record->to_date = $value->to_date;
			    $record->new_round = $value->new_round;
			    $record->memo = $value->record_momo;
			    $record->invoiced = 1;
			    if($value->record_momo = "void"){
			    	$updatemeter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			    	$updatemeter->where("id", $value->meter_id);
			    	if($updatemeter->exists()){
			    		$updatemeter->status = 2;
			    		$updatemeter->save();
			    	}
			    }
			    $record->save();
			}else{
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$txn->where("number", $value->number)->order_by("id", "desc")->limit(1)->get();
				//protect dublicate
	   			$oldwline = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$oldwline->where("transaction_id", $obj->id)->get();
	   			if($oldwline->exists()){
	   				$oldwline->delete_all();
	   			}
				$line = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$line->transaction_id 	= $txn->id;
	   			if($value->type = "usage"){
	   				$line->item_id 			= $value->meter_id;
	   			}else{
	   				$line->item_id 			= isset($value->item_id) ? $value->item_id:"";
	   			}
	   			//get meter record for field meter_record_id
	   			$meterrecord = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$meterrecord->where("meter_id", $value->meter_id)->order_by("id", "desc")->limit(1)->get();
	   			$line->meter_record_id 	= $meterrecord->id;

	   			$line->description 		= isset($value->description) ? $value->description : "Utility Invoice";
	   			$line->quantity 		= isset($value->quantity) ? $value->quantity: 0;
	   			$line->price 			= isset($value->price) ? $value->price : "";
	   			$line->amount 			= isset($value->w_amount) ? $value->w_amount : "";
	   			$line->rate 			= isset($value->rate) ? $value->rate : "";
	   			$line->locale 			= isset($value->locale) ? $value->locale : "";
	   			$line->type 			= isset($value->type) ? $value->type:"";
	   			
	   			if($value->type == 'installment') {
					$updateInstallSchedule = new Installment_schedule(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$updateInstallSchedule->where('invoiced', 0 );
					$updateInstallSchedule->where('id', $value->item_id)->limit(1);
					$updateInstallSchedule->invoiced = 1;
					$updateInstallSchedule->save();
	   			}
	   			$line->save();
			}
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	//Post Record from offline
	function recordoff_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$meter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$meter->where("number", $value->meter_number)->order_by("id", "desc")->limit(1)->get();
			$obj->meter_id 		= $meter->id;
			$obj->previous 		= intval($value->previous);
			$obj->current 		= intval($value->current);
			$obj->new_round 	= isset($value->round) ? $value->round : "";
			$obj->usage 		= intval($value->usage);
			$obj->month_of 		= $value->month_of;
			$obj->from_date 	= $value->from_date;
			$obj->to_date 		= $value->to_date;
			$obj->invoiced 		= 1;
			$obj->sync 			= 1;
			if($value->void_meter != 1){
				$meter->status = 2;
				$meter->save();
			}
			if($obj->save()){
				//Respsone
				$data["results"][] = array(
					"id" 			=> $obj->id
				);				
			}
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function offlinework_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
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
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}
		$obj->where("activated", 1);
		$obj->order_by("worder", "asc");
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
				$location = $value->location->get();
				//Pole
				$polename = "";
				if($value->pole_id != 0){
					$pole = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$pole->where("id", $value->pole_id)->limit(1)->get();
					$polename = $pole->name;
				}
				//Box
				$boxname = "";
				if($value->box_id != 0){
					$box = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$box->where("id", $value->box_id)->limit(1)->get();
					$boxname = $box->name;
				}
				//Balance
				$remain = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$remain->where("meter_id", $value->id);
				$remain->where("type", "Utility_Invoice");
				$remain->where("deleted", 0);
				$remain->where("status <>", 1)->get_iterated();
				$amountOwed = 0;
				foreach($remain as $rem) {
					$amountOwed += $rem->amount;
					if($rem->status == 2) {
						$qu = $rem->transaction->select('amount')->where('type', 'Cash_Receipt')->get();
						foreach($qu as $q){
							$amountOwed -= $q->amount;
						};
					}
				}
				//Intstallment
				$installamount = 0;
				$inst = new Installment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$inst->where("meter_id", $value->id)->limit(1)->get();
				if($inst->exists()){
					foreach($inst as $install){
						$institem = new Installment_schedule(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$institem->where("installment_id", $install->id);
						$institem->where("invoiced", 0)->limit(1)->get();
						if($institem->exists()){
							$installamount = floatval($institem->amount);
						}
					}
				}

				$recorda = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$recorda->where("meter_id", $value->id)->order_by("id", "desc")->limit(1)->get();
				$data["results"][] = array(
					"branch_id" 		=> $value->branch_id,
					"meter_id" 			=> $value->id,
					"meter_number" 		=> $value->number,
					"multiplier" 		=> $value->multiplier,
					"previous" 			=> intval($recorda->current),
					"current" 			=> 0,
					"from_date" 		=> $recorda->to_date,
					"contact_id" 		=> $contact->id,
					"contact_name" 		=> $contact->name,
					"contact_code" 		=> $contact->abbr."-".$contact->number,
					"location_id" 		=> $value->location_id,
					"location_name" 	=> $location->name,
					"pole_id" 			=> $value->pole_id,
					"pole_name" 		=> $polename,
					"box_id" 			=> $value->box_id,
					"box_name" 			=> $boxname,
					"balance" 			=> $amountOwed,
					"plan_id" 			=> $value->plan_id,
					"number_digit" 		=> $value->number_digit,
					"installment" 		=> $installamount
				);
			}
		}

		//Response Data
		$this->response($data, 200);
	}
	//Tablet
	function tablet_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Offline(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		$obj->where("type", "tablet");
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
					"code" 						=> $value->code,
					"name" 						=> $value->name,
					"abbr" 						=> $value->abbr,
					"type" 						=> $value->type
				);
			}
		}

		//Response Data
		$this->response($data, 200);
	}
	function tablet_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {
			
			$obj = new Offline(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			isset($value->code) 				? $obj->code 					= $value->code : "";
			isset($value->name) 				? $obj->name 					= $value->name : "";
			isset($value->abbr) 				? $obj->abbr 					= $value->abbr : "";
			$obj->type = "tablet";
		   	
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 						=> $obj->id,
			   		"code" 						=> $obj->code,
					"name" 						=> $obj->name,
					"abbr" 						=> $obj->abbr,
					"type" 						=> $obj->type
			   	);
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function tablet_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {
			$obj = new Offline(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			isset($value->code) 				? $obj->code 					= $value->code : "";
			isset($value->name) 				? $obj->name 					= $value->name : "";
			isset($value->abbr) 				? $obj->abbr 					= $value->abbr : "";
			$obj->type = "tablet";
			
			if($obj->save()){
				//Results
				$data["results"][] = array(
					"id" 						=> $obj->id,
					"code" 						=> $obj->code,
					"name" 						=> $obj->name,
					"abbr" 						=> $obj->abbr,
					"type" 						=> $obj->type
				);
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}
	//Reader
	function reader_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Offline(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		$obj->where("type", "reader");
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
					"code" 						=> $value->code,
					"name" 						=> $value->name,
					"abbr" 						=> $value->abbr,
					"type" 						=> $value->type
				);
			}
		}

		//Response Data
		$this->response($data, 200);
	}
	function reader_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {
			
			$obj = new Offline(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			isset($value->code) 				? $obj->code 					= $value->code : "";
			isset($value->name) 				? $obj->name 					= $value->name : "";
			isset($value->abbr) 				? $obj->abbr 					= $value->abbr : "";
			$obj->type = "reader";
		   	
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 						=> $obj->id,
			   		"code" 						=> $obj->code,
					"name" 						=> $obj->name,
					"abbr" 						=> $obj->abbr,
					"type" 						=> $obj->type
			   	);
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function reader_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {
			$obj = new Offline(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			isset($value->code) 				? $obj->code 					= $value->code : "";
			isset($value->name) 				? $obj->name 					= $value->name : "";
			isset($value->abbr) 				? $obj->abbr 					= $value->abbr : "";
			$obj->type = "reader";
			
			if($obj->save()){
				//Results
				$data["results"][] = array(
					"id" 						=> $obj->id,
					"code" 						=> $obj->code,
					"name" 						=> $obj->name,
					"abbr" 						=> $obj->abbr,
					"type" 						=> $obj->type
				);
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}
	//Cashier
	function session_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");	
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Cashier_session(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->where("status", 0)->order_by("id", "desc")->get();
		if($obj->exists()){			
			foreach ($obj as $value) {
				$actualarr = [];
				$actuals = new Cashier_session_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$actuals->where("cashier_session_id", $value->id)->get();
				if($actuals->exists()){
					foreach($actuals as $actual){
						$actualarr[] = array(
							"id" 		=> $actual->id,
							"amount" 	=> floatval($actual->amount),
							"currency" 	=> $actual->currency,
						);
					}
				}
				//Results				
				$data["results"][] = array(
					"id" 				=> $value->id,
					"cashier_id" 		=> $value->cashier_id,
					"start_date" 		=> $value->start_date,
					"amount_recieved" 	=> $amountrecievearr,
					"actual_item" 		=> $actualarr
				);
			}
		}
		//Response Data		
		$this->response($data, 200);
	}
	function cashier_actual_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");	
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Cashier_session_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
	//Batch Inv
	//POST
	function batch_inv_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		
		$number = "";
		foreach ($models as $value) {
			//Generate Number
			if(isset($value->number)){
				$number = $value->number;

				if($number==""){
					$number = $this->_generate_number($value->type, $value->issued_date);
				}
			}else{
				$number = $this->_generate_number($value->type, $value->issued_date);
			}
			
			if(isset($value->is_recurring)){
				if($value->is_recurring==1){
					$number = "";
				}
			}

			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->company_id) 				? $obj->company_id 					= $value->company_id : "";
			isset($value->location_id) 				? $obj->location_id 				= $value->location_id : "";
			isset($value->contact_id) 				? $obj->contact_id 					= $value->contact_id : "";
			isset($value->payment_term_id) 			? $obj->payment_term_id 			= $value->payment_term_id : 5;
			isset($value->payment_method_id) 		? $obj->payment_method_id 			= $value->payment_method_id : "";
			isset($value->transaction_template_id) 	? $obj->transaction_template_id 	= $value->transaction_template_id : "";
			isset($value->reference_id) 			? $obj->reference_id 				= $value->reference_id : "";
			isset($value->recurring_id) 			? $obj->recurring_id 				= $value->recurring_id : "";
			isset($value->return_id) 				? $obj->return_id 					= $value->return_id : "";
			isset($value->job_id) 					? $obj->job_id 						= $value->job_id : "";
			isset($value->account_id) 				? $obj->account_id 					= $value->account_id : "";
			isset($value->item_id) 					? $obj->item_id 					= $value->item_id : "";
			isset($value->tax_item_id) 				? $obj->tax_item_id 				= $value->tax_item_id : "";
			isset($value->wht_account_id) 			? $obj->wht_account_id 				= $value->wht_account_id : "";
			isset($value->user_id) 					? $obj->user_id 					= $value->user_id : "";
			isset($value->employee_id) 				? $obj->employee_id 				= $value->employee_id : "";
			$obj->number = $number;
		   	isset($value->type) 					? $obj->type 						= $value->type : "";
		   	isset($value->journal_type) 			? $obj->journal_type 				= $value->journal_type : "";
		   	isset($value->sub_total) 				? $obj->sub_total 					= $value->sub_total : "";
		   	isset($value->discount) 				? $obj->discount 					= $value->discount : "";
		   	isset($value->tax) 						? $obj->tax 						= $value->tax : "";
		   	isset($value->amount) 					? $obj->amount 						= $value->amount : "";
		   	isset($value->fine) 					? $obj->fine 						= $value->fine : "";
		   	isset($value->deposit) 					? $obj->deposit 					= $value->deposit : "";
		   	isset($value->remaining) 				? $obj->remaining 					= $value->remaining : "";
		   	isset($value->received) 				? $obj->received 					= $value->received : "";
		   	isset($value->change) 					? $obj->change 						= $value->change : "";
		   	isset($value->credit_allowed) 			? $obj->credit_allowed 				= $value->credit_allowed : "";
		   	isset($value->additional_cost) 			? $obj->additional_cost 			= $value->additional_cost : "";
		   	isset($value->additional_apply) 		? $obj->additional_apply 			= $value->additional_apply : "";
		   	isset($value->rate) 					? $obj->rate 						= $value->rate : "";
		   	isset($value->locale) 					? $obj->locale 						= $value->locale : "";
		   	isset($value->month_of) 				? $obj->month_of 					= $value->month_of : "";
		   	isset($value->issued_date) 				? $obj->issued_date 				= $value->issued_date : "";
		   	isset($value->bill_date) 				? $obj->bill_date 					= $value->bill_date : "";
		   	isset($value->payment_date) 			? $obj->payment_date 				= $value->payment_date : "";
		   	isset($value->due_date) 				? $obj->due_date 					= $value->due_date : "";
		   	isset($value->deposit_date) 			? $obj->deposit_date 				= $value->deposit_date : "";
		   	isset($value->check_no) 				? $obj->check_no 					= $value->check_no : "";
		   	isset($value->reference_no) 			? $obj->reference_no 				= $value->reference_no : "";
		   	isset($value->references) 				? $obj->references 					= implode(",", $value->references) : "";
		   	isset($value->segments) 				? $obj->segments 					= implode(",", $value->segments) : "";
		   	isset($value->bill_to) 					? $obj->bill_to 					= $value->bill_to : "";
		   	isset($value->ship_to) 					? $obj->ship_to 					= $value->ship_to : "";
		   	isset($value->memo) 					? $obj->memo 						= $value->memo : "";
		   	isset($value->memo2) 					? $obj->memo2 						= $value->memo2 : "";
		   	isset($value->note) 					? $obj->note 						= $value->note : "";
		   	isset($value->recurring_name) 			? $obj->recurring_name 				= $value->recurring_name : "";
		   	isset($value->start_date) 				? $obj->start_date 					= $value->start_date : "";
		   	isset($value->frequency) 				? $obj->frequency 					= $value->frequency : "";
		   	isset($value->month_option) 			? $obj->month_option 				= $value->month_option : "";
		   	isset($value->interval) 				? $obj->interval 					= $value->interval : "";
		   	isset($value->day) 						? $obj->day 						= $value->day : "";
		   	isset($value->week) 					? $obj->week 						= $value->week : "";
		   	isset($value->month) 					? $obj->month 						= $value->month : "";
		   	isset($value->status) 					? $obj->status 						= $value->status : "";
		   	isset($value->progress) 				? $obj->progress 					= $value->progress : "";
		   	isset($value->is_recurring) 			? $obj->is_recurring 				= $value->is_recurring : "";
		   	isset($value->is_journal) 				? $obj->is_journal 					= $value->is_journal : "";
		   	isset($value->print_count) 				? $obj->print_count 				= $value->print_count : "";
		   	isset($value->printed_by) 				? $obj->printed_by 					= $value->printed_by : "";
		   	isset($value->deleted) 					? $obj->deleted 					= $value->deleted : "";
		   	isset($value->meter_id) 				? $obj->meter_id 					= $value->meter_id : "";
		   	
		   	$relatedsegmentitem = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			if(isset($value->segments)){
				if(count($value->segments)>0){
					$relatedsegmentitem->where_in("id", $value->segments)->get();
				}
			}

			$contact = [];
			if(isset($value->contact)){
				$contact = $value->contact;
			}

	   		if($obj->save($relatedsegmentitem->all)){
			   	$data["results"][] = array(
			   		"id" 						=> $obj->id,
					"company_id" 				=> $obj->company_id,
					"location_id" 				=> $obj->location_id,
					"contact_id" 				=> $obj->contact_id,
					"payment_term_id" 			=> $obj->payment_term_id,
					"payment_method_id" 		=> $obj->payment_method_id,
					"transaction_template_id" 	=> $obj->transaction_template_id,
					"reference_id" 				=> $obj->reference_id,
					"recuring_id" 				=> $obj->recuring_id,
					"return_id" 				=> $obj->return_id,
					"job_id" 					=> $obj->job_id,
					"account_id" 				=> $obj->account_id,
					"item_id" 					=> $obj->item_id,
					"tax_item_id" 				=> $obj->tax_item_id,
					"wht_account_id"			=> $obj->wht_account_id,
					"user_id" 					=> $obj->user_id,
					"employee_id" 				=> $obj->employee_id,
					"number" 					=> $obj->number,
				   	"type" 						=> $obj->type,
				   	"journal_type" 				=> $obj->journal_type,
				   	"sub_total"					=> floatval($obj->sub_total),
				   	"discount" 					=> floatval($obj->discount),
				   	"tax" 						=> floatval($obj->tax),
				   	"amount" 					=> floatval($obj->amount),
				   	"fine" 						=> floatval($obj->fine),
				   	"deposit"					=> floatval($obj->deposit),
				   	"remaining" 				=> floatval($obj->remaining),
				   	"received" 					=> floatval($obj->received),
				   	"change" 					=> floatval($obj->change),
				   	"credit_allowed"			=> floatval($obj->credit_allowed),
				   	"additional_cost" 			=> floatval($obj->additional_cost),
				   	"additional_apply" 			=> $obj->additional_apply,
				   	"rate" 						=> floatval($obj->rate),
				   	"locale" 					=> $obj->locale,
				   	"month_of"					=> $obj->month_of,
				   	"issued_date"				=> $obj->issued_date,
				   	"bill_date"					=> $obj->bill_date,
				   	"payment_date" 				=> $obj->payment_date,
				   	"due_date" 					=> $obj->due_date,
				   	"deposit_date" 				=> $obj->deposit_date,
				   	"check_no" 					=> $obj->check_no,
				   	"reference_no" 				=> $obj->reference_no,
				   	"references" 				=> $obj->references!="" ? array_map('intval', explode(",", $obj->references)) : [],
				   	"segments" 					=> $obj->segments!="" ? array_map('intval', explode(",", $obj->segments)) : [],
				   	"bill_to" 					=> $obj->bill_to,
				   	"ship_to" 					=> $obj->ship_to,
				   	"memo" 						=> $obj->memo,
				   	"memo2" 					=> $obj->memo2,
				   	"note" 						=> $obj->note,
				   	"recurring_name" 			=> $obj->recurring_name,
				   	"start_date"				=> $obj->start_date,
					"frequency"					=> $obj->frequency,
					"month_option"				=> $obj->month_option,
					"interval" 					=> $obj->interval,
					"day" 						=> $obj->day,
					"week" 						=> $obj->week,
					"month" 					=> $obj->month,
				   	"status" 					=> intval($obj->status),
				   	"progress" 					=> $obj->progress,
				   	"is_recurring" 				=> floatval($obj->is_recurring),
				   	"is_journal" 				=> $obj->is_journal,
				   	"print_count" 				=> $obj->print_count,
				   	"printed_by" 				=> $obj->printed_by,
				   	"deleted" 					=> $obj->deleted,
				   	"meter_id"					=> $obj->meter_id,
				   	"amount_paid"				=> 0,
				   	"contact" 					=> $contact
			   	);
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
}
/* End of file meters.php */
/* Location: ./application/controllers/api/utibills.php */