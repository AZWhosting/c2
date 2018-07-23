<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Utibills extends REST_Controller {	
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
		$idcheck = [];
		if($obj->exists()){
			foreach ($obj as $value) {
				if (!in_array($value->id, $idcheck)) {
					array_push($idcheck, $value->id);
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
							// $fine = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							// $fine->where("transaction_id", $value->id);
							// $fine->where("type", "fine")->order_by("id", "desc")->limit(1)->get();
							// if($fine->exists()){
							// 	$dueDate = new DateTime($value->due_date);
							// 	$ddate = $dueDate->getTimestamp();
							// 	$fineDate = new DateTime(date('Y-m-d'));
							// 	$fdate = $fineDate->getTimestamp();
							// 	if($fdate > $ddate){
							// 		$fDay = $fineDate->diff($dueDate)->days;
							// 		$fDay;
							// 		$fineAmount = (floatval($value->amount) * intval($fDay)) / 100 ;
							// 	}
							// }
							$fineAmount = 0;
						//Normal fine
						}else{
							$fine = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$fine->where("transaction_id", $value->id);
							$fine->where("type", "fine")->order_by("id", "desc")->limit(1)->get();
							if($fine->exists()){
								$dueDate = new DateTime($value->due_date);
								$ddate = $dueDate->getTimestamp()."AA";
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
						$meter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database); //$value->meter->get();
						$meter->where("id", $value->meter_id)->limit(1);
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
							array_push($idcheck, $relate->id);
							//Calulate Fine
							//Chhayhout Find module
							$fineAmount = 0;
							if($relate->status == 0){
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
										$dueDate = new DateTime($relate->due_date);
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
								$meter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);//$relate->meter->get();
								$meter->where("id", $relate->meter_id)->limit(1);
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
	   			$month_of = "";
				$m = isset($obj->issued_date) ? $obj->issued_date : "";
				$d = new DateTime($m);
			    $d->modify('first day of this month');
			    $month_of = $d->format('Y-m-d');
	   			//Temp total
	   			$totalsale = new Tmp_total_sale(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$totalsale->where("location_id", $obj->location_id);
	   			$totalsale->where("month_of", $month_of)->limit(1)->get();
	   			if($totalsale->exists()){
	   				$totalsale->amount_recieved += floatval($obj->amount);
	   				if(floatval($totalsale->ending_ballance) >= floatval($obj->amount)){
	   					$totalsale->ending_ballance -= floatval($obj->amount);
	   				}else{
	   					$totalsale->ending_ballance = 0;
	   				}
	   			}else{
	   				$totalsale->location_id = $obj->location_id;
	   				$totalsale->month_of = $month_of;
	   				$totalsale->amount_recieved += floatval($obj->amount);
	   				$totalsale->ending_ballance -= floatval($obj->amount);
	   			}
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
	   				//Total Sale
					$totalsale->discount += floatval($obj->discount);
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
	   			if($value->discount > 0) {
	   				$samount += floatval($value->discount);
	   			}
	   			if($famount == $samount){
	   				$oldtran->status = 1;
	   			}else{
	   				$oldtran->status = 2;
	   				$asb = $samount - $famount;
	   				//Total Sale
					$totalsale->ending_ballance += floatval($asb);
	   			}
	   			$totalsale->save();
	   			$oldtran->save();
	   			//Session Recieve
	   			if($value->session_id){
	   				$srecieve = new Cashier_session_receive(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   				$srecieve->cashier_session_id = $value->session_id;
	   				$srecieve->transaction_id = $value->reference_id;
	   				$srecieve->contact_id = $value->contact_id;
	   				$srecieve->amount = $value->amount;
	   				$srecieve->locale = $value->locale;
	   				$srecieve->rate = $value->rate;
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
		$obj = new Currency_rate(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		$obj->order_by("is_system", "desc");
		$obj->order_by("date", "desc");
		//Results
		$obj->get_iterated();
		$checkexist = array();
		if($obj->exists()){
			$i = 0;
			foreach ($obj as $value) {
				$ccode = new Currency(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$ccode->where('locale', $value->locale)->limit(1)->get();
				$data["results"][] = array(
					"id" 		=> $value->id,
					"code" 		=> $ccode->code,
					"country" 	=> $value->locale,
					"currency_id" => $value->id,
					"locale" 	=> $value->locale,
					"rate" 		=> floatval($value->rate),
					"date" 		=> $value->date
				);
				// print_r($checkexist);
				if(in_array($value->locale, $checkexist)){
					unset($data["results"][$i]);
				}else{
					array_push($checkexist, $value->locale);
				}
				$i++;
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
			$id = intval($value->meter_id);
			$order = intval($value->order);
			$obj->where("id", $id)->limit(1)->get();
			if($obj->exists()){
				$obj->worder 		= $order;
		   		if($obj->save()){
		   			$data["results"][] = array(
				   		"id" => $obj->id
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
	function receiptautometer_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		$number = "";
		foreach ($models as $value) {
			$val = floatval($value->receive);
			if($val > 0){
				$IsD = $value->issued_date;
				$meter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$meter->where('number', $value->meter_number)->order_by("id", "desc")->limit(1)->get();
				if($meter->exists()){
					$tran = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$tran->where("meter_id", $meter->id)->order_by("id", "desc");
					$tran->where("status", 0)->limit(1)->get();
					
					if($tran->exists()){
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
					   	$obj->sub_total = floatval($val);
					   	$obj->amount = floatval($val);
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
				   			if(floatval($tran->amount) == floatval($val)){
				   				$tran->status = 1; 
				   			}else{
				   				$tran->status = 2;
				   			}
				   			$tran->save();
				   			$data["results"][] = array(
								"id" 			=> $tran->id
							);
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
	function receiptauto_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		$number = "";
		foreach ($models as $value) {
			$val = floatval($value->receive);
			if($val > 0){
				$IsD = date("Y-m-d");
				$meter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$meter->where('number', $value->meter_number)->order_by("id", "desc")->limit(1)->get();
				if($meter->exists()){
					$tran = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$tran->where("meter_id", $meter->id)->order_by("id", "desc");
					$tran->where("status", 0)->limit(1)->get();
					if($tran->exists()){
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
					   	$obj->sub_total = floatval($val);
					   	$obj->amount = floatval($val);
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
				   			if(floatval($tran->amount) == floatval($val)){
				   				$tran->status = 1; 
				   			}else{
				   				$tran->status = 2;
				   			}
				   			$tran->save();
				   			$data["results"][] = array(
								"id" 			=> $tran->id
							);
					    }
					}
				}
			}
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function cashauto_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		$number = "";
		$i = 0;
		foreach ($models as $value) {
			$i++;
			$val = floatval($value->received);
			if($val > 0){
				$tran = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$tran->where("number", $value->number);
				$tran->where("status <>", 1)->limit(1)->get();
				if($tran->exists()){
					if($val <= floatval($tran->amount)){
						$IsD = $value->issued_date;
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
					   	$obj->sub_total = floatval($val);
					   	$obj->amount = floatval($val);
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
				   			if(floatval($tran->amount) == floatval($val)){
				   				$tran->status = 1; 
				   			}else{
				   				$tran->status = 2;
				   			}
				   			$tran->save();
					    }
					}else{
						$data["results"][] = array(
							"number" 			=> $value->number,
							"amount" 			=> $val,
							"line" 				=> $i,
							"status" 			=> "amount over invoice",
						);
					}
				}else{
					$data["results"][] = array(
						"number" 			=> $value->number,
						"amount" 			=> $val,
						"line" 				=> $i,
						"status" 			=> "none",
					);
				}
			}

		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function receiptautocus_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		$number = "";
		foreach ($models as $value) {
			if($value->receive > 0){
				$IsD = $value->issued_date;
				$contact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$contact->where('number', $value->contact_number)->order_by("id", "desc")->limit(1)->get();
				if($contact->exists()){
					$tran = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$tran->where("contact_id", $contact->id)->order_by("id", "desc")->limit(1)->get();
					if($tran->exists()){
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
					   		"contact_number" => $value->contact_number
					   	);
					}
				}else{
					$data["results"][] = array(
				   		"contact_number" => $value->contact_number
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
			   	$obj->issued_date 		= isset($value->issued_date) ? $value->issued_date : "";
			   	$obj->bill_date 		= isset($value->bill_date) ? $value->bill_date : "";
			   	$obj->due_date 			= isset($value->due_date) ? $value->due_date : "";
			   	$obj->is_journal 		= 1;
			   	$obj->memo 				= isset($value->memo) ? $value->memo: "";
			   	$obj->meter_id 			= isset($value->meter_id) ? $value->meter_id: 0;
			   	$obj->status 			= 0;
			   	$obj->user_id 			= isset($value->read_by) ? $value->read_by: 0;
			   	$obj->sub_total 		= isset($value->amount) ? $value->amount : "";
			   	$data["results"][] = array(
			   		"id" 	=> $obj->id
			   	);
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
		   			//
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
			    }
			    // Save Records
			    $record = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			    $record->where('meter_id', intval($value->meter_id));
			    $record->where('previous', intval($value->previous));
			    $record->where('current', intval($value->current));
			    $record->limit(1)->get();
			    if($record->exists()){
			    	$record->get_by_id($record->id);
			    }
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
			    $record->memo = $value->memo;
			    $record->invoiced = 1;
			    if($value->memo == 1){
			    	$updatemeter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			    	$updatemeter->where("id", intval($value->meter_id));
			    	if($updatemeter->exists()){
			    		$updatemeter->status = 2;
			    		$updatemeter->save();
			    	}
			    }elseif($value->memo == 2){
			    	$updatemeter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			    	$updatemeter->where("id", intval($value->meter_id));
			    	if($updatemeter->exists()){
			    		$updatemeter->status = 0;
			    		$updatemeter->save();
			    	}
			    }
			    $record->save();
			}else{
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$txn->where("number", $value->number)->order_by("id", "desc")->limit(1)->get();
				//protect dublicate
				if($txn->exists()){
		   			// $oldwline = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   			// $oldwline->where("transaction_id", $txn->id)->get_iterated();
		   			// if($oldwline->exists()){
		   			// 	$oldwline->delete_all();
		   			// }
					$line = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$line->where("transaction_id", $txn->id);
					$line->where("type", $value->type)->limit(1);
					$line->get();
				   	
				   	if($line->exists()){
				   		$line->get_by_id($line->id);
				   	}
		   			if($value->type == "usage"){
		   				$line->item_id 			= $value->meter_id;
		   			}else{
		   				$line->item_id 			= isset($value->item_id) ? $value->item_id:"";
		   			}
		   			$line->transaction_id 	= $txn->id;
		   			//get meter record for field meter_record_id
		   			$meterrecord = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   			$meterrecord->where("meter_id", intval($value->meter_id))->order_by("id", "desc")->limit(1)->get();
		   			$line->meter_record_id 	= $meterrecord->id;

		   			$line->description 		= isset($value->description) ? $value->description : "Utility Invoice";
		   			$line->quantity 		= isset($value->quantity) ? $value->quantity: 0;
		   			$line->price 			= isset($value->price) ? $value->price : "";
		   			$line->amount 			= isset($value->w_amount) ? $value->w_amount : "";
		   			$line->rate 			= isset($value->rate) ? $value->rate : "";
		   			$line->locale 			= isset($value->locale) ? $value->locale : "";
		   			$line->type 			= isset($value->type) ? $value->type:"";
			   		// }
		   			
		   			if($value->type == 'installment') {
		   				$ints = new Installment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   				$ints->where("meter_id", $value->meter_id)->limit(1)->get();
						$updateInstallSchedule = new Installment_schedule(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$updateInstallSchedule->where('invoiced', 0 );
						$updateInstallSchedule->where('installment_id', $ints->id)->limit(1)->get();
						$updateInstallSchedule->invoiced = 1;
						$updateInstallSchedule->save();
		   			}
		   			$line->save();
				}
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
		$obj->where_in("status", array(1, 3));
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
				$fineAmount = 0;
				foreach($remain as $rem) {
					$fine = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$fine->where("transaction_id", $rem->id);
					$fine->where("type", "fine")->order_by("id", "desc")->limit(1)->get();
					if($fine->exists()){
						$dueDate = new DateTime($rem->due_date);
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
					$remf = floatval($rem->amount) + $fineAmount;
					$amountOwed += $remf;
					if($rem->status == 2) {
						$qu = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$qu->where("type", "Cash_Receipt");
						$qu->where("reference_id", $rem->id)->get();
						foreach($qu as $q){
							$amountOwed -= floatval($q->amount);
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
	//Offline meter Temp
	function offline_temp_meter_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Offline_temp_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
					"branch_id" 		=> intval($value->branch_id),
					"meter_id" 			=> intval($value->meter_id),
					"meter_number" 		=> $value->meter_number,
					"multiplier" 		=> $value->multiplier,
					"previous" 			=> intval($value->previous),
					"from_date" 		=> $value->from_date,
					"contact_id" 		=> intval($value->contact_id),
					"contact_name" 		=> $value->contact_name,
					"contact_code" 		=> $value->contact_code,
					"location_id" 		=> intval($value->location_id),
					"location_name" 	=> $value->location_name,
					"pole_id" 			=> intval($value->pole_id),
					"pole_name" 		=> $value->pole_name,
					"box_id" 			=> intval($value->box_id),
					"box_name" 			=> $value->box_name,
					"balance" 			=> floatval($value->balance),
					"plan_id" 			=> intval($value->plan_id),
					"number_digit" 		=> intval($value->number_digit),
					"installment" 		=> floatval($value->installment),
					"month_of" 			=> $value->month_of,
					"to_date" 			=> $value->to_date,
					"issue_date" 		=> $value->issue_date,
					"bill_date" 		=> $value->bill_date,
					"due_date" 			=> $value->due_date,
					"reader_id" 		=> intval($value->reader_id),
					"tablet_id" 		=> intval($value->tablet_id),
					"tablet_abbr" 		=> $value->tablet_abbr,
					"institute_id" 		=> intval($value->institute_id)
				);
			}
		}

		//Response Data
		$this->response($data, 200);
	}
	function offline_temp_meter_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		$lobj = new Offline_temp_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$lobj->truncate();
		foreach ($models as $value) {
			$obj = new Offline_temp_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			//Push to temp DB
			$obj->branch_id 		= $value->branch_id;
			$obj->meter_id 			= $value->meter_id;
			$obj->meter_number 		= $value->meter_number;
			$obj->multiplier 		= $value->multiplier;
			$obj->previous 			= intval($value->previous);
			$obj->from_date 		= $value->from_date;
			$obj->contact_id 		= $value->contact_id;
			$obj->contact_name 		= $value->contact_name;
			$obj->contact_code 		= $value->contact_code;
			$obj->location_id 		= $value->location_id;
			$obj->location_name 	= $value->location_name;
			$obj->pole_id 			= $value->pole_id;
			$obj->pole_name 		= $value->pole_name;
			$obj->box_id 			= $value->box_id;
			$obj->box_name 			= $value->box_name;
			$obj->balance 			= $value->balance;
			$obj->plan_id 			= $value->plan_id;
			$obj->number_digit 		= $value->number_digit;
			$obj->installment 		= $value->installment;
			$obj->month_of 			= $value->month_of;
			$obj->to_date 			= $value->to_date;
			$obj->issue_date 		= $value->issue_date;
			$obj->bill_date 		= $value->bill_date;
			$obj->due_date 			= $value->due_date;
			$obj->reader_id 		= $value->reader_id;
			$obj->tablet_id 		= $value->tablet_id;
			$obj->tablet_abbr 		= $value->tablet_abbr;
			$obj->institute_id 		= $value->institute_id;

			$obj->save();
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id
			   	);
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function offline_setting_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$plan = new Plan(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$plan->order_by("id", "asc")->get();
		$planar = [];
		foreach($plan as $p){
			$planar[][] = array(
				"id" 			=> $p->id,
				"currency_id"  	=> intval($p->currency_id),
				"name" 			=> $p->name,
				"code" 			=> $p->code,
				"type" 			=> $p->type
			);
		}
		$planitem = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$planitem->order_by("id", "asc")->get();
		$planitemar = [];
		foreach($planitem as $pi){
			$planitemar[][] = array(
				"id" 			=> $pi->id,
				"tariff_id" 	=> intval($pi->tariff_id),
				"currency_id" 	=> intval($pi->currency_id),
				"name" 			=> $pi->name,
				"is_flat" 		=> intval($pi->is_flat),
				"type" 			=> $pi->type,
				"unit" 			=> $pi->unit,
				"amount" 		=> floatval($pi->amount),
				"usage" 		=> intval($pi->usage),
				"account_id" 	=> intval($pi->account_id),
				"is_active" 	=> intval($pi->is_active),
				"assembly_id" 	=> intval($pi->assembly_id),
			);
		}
		$pip = new Plan_items_plan(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$pip->order_by("id", "asc")->get();
		$pipar = [];
		foreach($pip as $ip){
			$pipar[][] = array(
				"id" 			=> $ip->id,
				"plan_id" 		=> intval($ip->plan_id),
				"plan_item_id" 	=> intval($ip->plan_item_id)
			);
		}
		$crate = new Currency_rate(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$crate->order_by("id", "asc")->get();
		$cratear = [];
		foreach($crate as $r){
			$cratear[][] = array(
				"id" 			=> $r->id,
				"currency_id" 	=> intval($r->currency_id),
				"user_id" 		=> intval($r->user_id),
				"rate" 			=> floatval($r->rate),
				"locale" 		=> $r->locale,
				"source" 		=> $r->source,
				"method" 		=> $r->method,
				"date" 			=> $r->date,
				"is_system" 	=> intval($r->is_system)
			);
		}
		$branch = new Branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$branch->order_by("id", "asc")->get();
		$branchar = [];
		foreach($branch as $b){
			$branchar[][] = array(
				"id" 			=> $b->id,
				"type" 			=> $b->type,
				"number" 		=> $b->number,
				"name" 			=> $b->name,
				"abbr" 			=> $b->abbr,
				"currency_id" 	=> intval($b->currency_id),
				"description" 	=> $b->description,
				"address" 		=> $b->address,
				"province" 		=> $b->province,
				"district" 		=> $b->district,
				"email" 		=> $b->email,
				"mobile" 		=> $b->mobile,
				"telephone" 	=> $b->telephone,
				"term_of_condition" => $b->term_of_condition,
			);
		}
		$data["results"][] = array(
			"plan" 				=> $planar,
			"plan_item" 		=> $planitemar,
			"plan_items_plan" 	=> $pipar, 	
			"currency_rate" 	=> $cratear,
			"branch" 			=> $branchar
		);

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
	//Device
	function device_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Offline(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		$obj->where("type", "device");
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
					"type" 						=> $value->type,
					"device_id" 				=> $value->device_id,
					"status" 					=> $value->status,
				);
			}
		}

		//Response Data
		$this->response($data, 200);
	}
	function device_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {
			$mdevice = new Device();
			isset($this->inst) 			? $mdevice->institute_id		= $this->inst : "";
			isset($value->name) 		? $mdevice->name 				= $value->name : "";
			isset($value->status) 		? $mdevice->status 				= $value->status->id : 1;
			isset($value->device_id) 	? $mdevice->device_id 			= $value->device_id : "";
			if($mdevice->save()){
				$obj = new Offline(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				isset($value->code) 				? $obj->code 					= $value->code : "";
				isset($value->name) 				? $obj->name 					= $value->name : "";
				isset($value->abbr) 				? $obj->abbr 					= $value->abbr : "";
				isset($value->status) 				? $obj->status 					= $value->status->id : 1;
				$obj->main_id = $mdevice->id;
				$obj->type = "device";
		   		if($obj->save()){
				   	$data["results"][] = array(
				   		"id" 						=> $obj->id,
				   		"code" 						=> $obj->code,
						"name" 						=> $obj->name,
						"abbr" 						=> $obj->abbr,
						"type" 						=> $obj->type,
						"main_id" 					=> $mdevice->id,
				   	);
			    }
			}
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function device_put() {
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
	//Head Meter
	//GET
	function head_meter_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Head_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
					if($value['operator']=="startswith"){
	    				$obj->like($value['field'], $value['value'], 'after');
	    			}else if($value['operator']=="contains"){
	    				$obj->like($value['field'], $value['value'], 'both');
	    			}else{
						$obj->{$value['operator']}($value['field'], $value['value']);
	    			}
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
				$url = "";
				if($value->attachment_id > 0){
					$att = new Attachment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$att->where("id", $value->attachment_id)->limit(1)->get();
					if($att->exists()){
						$url = $att->url;
					}
				}
				$data["results"][] = array(
					"id" 						=> $value->id,
					"branch_id" 				=> $value->branch_id,
					"order" 					=> $value->order,
					"location_id" 				=> $value->location_id,
					"pole_id"					=> $value->pole_id,
					"box_id"					=> $value->box_id,
					"starting_no" 				=> $value->starting_no,
					"attachment_id" 			=> $value->attachment_id,
					"image_url"  				=> $url,
					"type" 						=> $value->type,
					"number" 					=> $value->number,
					"multiplier" 				=> $value->multiplier,
					"latitute" 					=> $value->latitute,
					"longtitute" 				=> $value->longtitute,
					"status" 					=> $value->status,
					"number_digit" 				=> $value->number_digit,
					"date_used"  				=> $value->date_used,
					"round" 					=> $value->round
				);
			}
		}

		//Response Data
		$this->response($data, 200);
	}
	//POST
	function head_meter_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		
		$number = "";
		foreach ($models as $value) {

			$obj = new Head_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->branch_id) 					? $obj->branch_id 					= $value->branch_id : "";
			isset($value->order) 						? $obj->order 						= $value->order : 0;
			isset($value->location_id) 					? $obj->location_id 				= $value->location_id : "";
			isset($value->pole_id) 						? $obj->pole_id 					= $value->pole_id : "";
			isset($value->box_id) 						? $obj->box_id 						= $value->box_id : "";
			isset($value->starting_no) 					? $obj->starting_no 				= $value->starting_no : 0;
			isset($value->attachment_id) 				? $obj->attachment_id 				= $value->attachment_id : "";
			isset($value->type) 						? $obj->type 						= $value->type : "w";
			isset($value->number) 						? $obj->number 						= $value->number : "";
			isset($value->multiplier) 					? $obj->multiplier 					= $value->multiplier : 1;
			isset($value->latitute) 					? $obj->latitute 					= $value->latitute : "";
			isset($value->longtitute) 					? $obj->longtitute 					= $value->longtitute : "";
			isset($value->status) 						? $obj->status 						= $value->status : 1;
			isset($value->number_digit) 				? $obj->number_digit 				= $value->number_digit : 4;
			isset($value->date_used) 					? $obj->date_used 					= $value->date_used : "";
			isset($value->round) 						? $obj->round 						= $value->round : 0;

	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 						=> $obj->id,
			   	);
			   	$record = new Head_meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			   	$record->head_meter_id = $obj->id;
			   	$record->current = $obj->starting_no;
			   	$record->previous = $obj->starting_no;
			   	$record->from_date = $obj->date_used;
			   	$record->to_date = $obj->date_used;
			   	$record->month_of = $obj->date_used;
			   	$record->usage = 0;
			   	$record->round = 0;
			   	$record->read_by = $value->read_by;
			   	$record->input_by = $value->input_by;
			   	$record->save();
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	//PUT
	function head_meter_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {
			$obj = new Head_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			isset($value->branch_id) 					? $obj->branch_id 					= $value->branch_id : "";
			isset($value->order) 						? $obj->order 						= $value->order : 0;
			isset($value->location_id) 					? $obj->location_id 				= $value->location_id : "";
			isset($value->pole_id) 						? $obj->pole_id 					= $value->pole_id : "";
			isset($value->box_id) 						? $obj->box_id 						= $value->box_id : "";
			isset($value->starting_no) 					? $obj->starting_no 				= $value->starting_no : 0;
			isset($value->attachment_id) 				? $obj->attachment_id 				= $value->attachment_id : "";
			isset($value->type) 						? $obj->type 						= $value->type : "w";
			isset($value->number) 						? $obj->number 						= $value->number : "";
			isset($value->multiplier) 					? $obj->multiplier 					= $value->multiplier : 1;
			isset($value->latitute) 					? $obj->latitute 					= $value->latitute : "";
			isset($value->longtitute) 					? $obj->longtitute 					= $value->longtitute : "";
			isset($value->status) 						? $obj->status 						= $value->status : 1;
			isset($value->number_digit) 				? $obj->number_digit 				= $value->number_digit : 4;
			isset($value->date_used) 					? $obj->date_used 					= $value->date_used : "";
			isset($value->round) 						? $obj->round 						= $value->round : 0;

			if($obj->save()){
				//Results
				$data["results"][] = array(
					"id" 						=> $obj->id,
				);
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}

	//Head Meter Reading
	function head_meter_reading_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Head_meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
		$obj->order_by("id", "desc");
		//Filter
		if(!empty($filter["filters"]) && isset($filter["filters"])){
	    	foreach ($filter["filters"] as $value) {
	    		if(isset($value['operator'])) {
					if($value['operator']=="startswith"){
	    				$obj->like($value['field'], $value['value'], 'after');
	    			}else if($value['operator']=="contains"){
	    				$obj->like($value['field'], $value['value'], 'both');
	    			}else{
						$obj->{$value['operator']}($value['field'], $value['value']);
	    			}
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
				$meter = new Head_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$meter->where("id", $value->head_meter_id)->limit(1)->get();
				$data["results"][] = array(
					"id" 					=> $value->id,
					"head_meter_id" 		=> $value->head_meter_id,
					"head_meter_number" 	=> $meter->number,
					"read_by" 				=> $value->read_by,
					"input_by" 				=> $value->input_by,
					"previous"				=> $value->previous,
					"current"				=> $value->current,
					"usage" 				=> $value->usage,
					"month_of" 				=> $value->month_of,
					"from_date"  			=> $value->from_date,
					"to_date" 				=> $value->to_date,
					"round" 				=> $value->round,
				);
			}
		}

		//Response Data
		$this->response($data, 200);
	}
	function head_meter_reading_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		
		$number = "";
		foreach ($models as $value) {

			$obj = new Head_meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->head_meter_id) 		? $obj->head_meter_id 		= $value->head_meter_id : "";
			isset($value->current) 				? $obj->current 			= $value->current : "";
			isset($value->previous) 			? $obj->previous 			= $value->previous : "";
			isset($value->month_of) 			? $obj->month_of 			= $value->month_of : "";
			isset($value->to_date) 		 		? $obj->to_date 			= $value->to_date : "";
			isset($value->input_by) 		 	? $obj->input_by 			= $value->input_by : "";
			isset($value->read_by) 		 		? $obj->read_by 			= $value->read_by : "";
			$current = intval($value->current);
			if($value->round == 1){
				$meter = new Head_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$meter->where('id', $value->head_meter_id)->get();
				$digit = $meter->number_digit;
				$oldcurrent =  pow(10, $digit);
				$oldcurrent = $oldcurrent - intval($value->previous);
				$obj->usage    = intval($oldcurrent) + intval($value->current);
				$meter->round += 1;
				$meter->save();
				$obj->round = 1;
			}else{
				$obj->usage    = intval($current) - intval($value->previous);
				$obj->round = 0;
			}
			$oldreading = new Head_meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$oldreading->where("head_meter_id", $value->head_meter_id)->order_by("id", "desc")->limit(1)->get();
			if($oldreading->exists()){
				$obj->from_date = $oldreading->to_date;
			}else{
				$obj->from_date = $value->to_date;
			}
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 						=> $obj->id,
			   	);
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function head_meter_reading_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = [];
		$data["count"] = 0;
		
		$number = "";
		foreach ($models as $value) {

			$obj = new Head_meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			isset($value->head_meter_id) 		? $obj->head_meter_id 		= $value->head_meter_id : "";
			isset($value->current) 				? $obj->current 			= $value->current : "";
			isset($value->previous) 			? $obj->previous 			= $value->previous : "";
			isset($value->month_of) 			? $obj->month_of 			= $value->month_of : "";
			isset($value->to_date) 		 		? $obj->to_date 			= $value->to_date : "";
			isset($value->input_by) 		 	? $obj->input_by 			= $value->input_by : "";
			isset($value->read_by) 		 		? $obj->read_by 			= $value->read_by : "";
			$current = intval($value->current);
			if($value->round == 1){
				$meter = new Head_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$meter->where('id', $value->head_meter_id)->get();
				$digit = $meter->number_digit;
				$oldcurrent =  pow(10, $digit);
				$oldcurrent = $oldcurrent - intval($value->previous);
				$obj->usage    = intval($oldcurrent) + intval($value->current);
				$meter->round += 1;
				$meter->save();
				$obj->round = 1;
			}else{
				$obj->usage    = intval($current) - intval($value->previous);
				$obj->round = 0;
			}
			$oldreading = new Head_meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$oldreading->where("head_meter_id", $value->head_meter_id)->order_by("id", "desc")->limit(1)->get();
			if($oldreading->exists()){
				$obj->from_date = $oldreading->to_date;
			}else{
				$obj->from_date = $value->to_date;
			}
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 						=> $obj->id,
			   	);
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	//GET
	function head_meter_book_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Head_meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
					if($value['operator']=="startswith"){
	    				$obj->like($value['field'], $value['value'], 'after');
	    			}else if($value['operator']=="contains"){
	    				$obj->like($value['field'], $value['value'], 'both');
	    			}else{
						$obj->{$value['operator']}($value['field'], $value['value']);
	    			}
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
				$record = new Head_meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$record->where("head_meter_id", $value->id)->order_by("id", "desc")->limit(1)->get();
				if($record->exists()){
					$data["results"][] = array(
						"meter_id" 		=> $value->id,
						"meter_number" 	=> $value->number,
						"previous"		=> floatval($record->current),
						"current"		=> 0,
						"from_date"		=> $record->from_date, 
						"to_date"		=> $record->to_date,
						"month_of" 		=> $record->month_of,
						"status" 		=> "new"
					);
				}
				
			}
		}

		//Response Data
		$this->response($data, 200);
	}
	//Get meter long and lat
	function meter_ll_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
					"longtitute" 				=> $value->longtitute,
					"latitute" 					=> $value->latitute
				);
			}
		}

		//Response Data
		$this->response($data, 200);
	}
	//Meter Order
	function meter_order_xls_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {

			$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("number", $value->meter_number)->order_by("id", "desc")->limit(1)->get();
			if($obj->exists()){
				$obj->worder = $value->order;
				$obj->save();
				$data["results"][] = array(
			   		"id" 						=> $obj->id,
			   	);
			}
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}

	//Meter
	//GET 
	function meter_get() {		
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
				$currency= $value->currency->get();
				$contacts = $value->contact->get();
				$property = $value->property->get();
				$att = new Attachment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$att->where("id", $value->attachment_id)->limit(1);
				$image_url = $att->get();
				$reactive = $value->reactive->get_raw();
				$itemline = [];
				$itemassline = [];
				$txntype = "";
				$txnid = "";
				$txnnumber = "";
				$txnamount = "";
				$txntax = "";
				$txnsub_total = "";
				$txndiscount = "";
				if($value->activated == 0){
					//Get Item Line
					$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$txn->where("meter_id", $value->id);
					$txn->where("deleted", 0);
					$txn->where_in("type", array('Invoice', 'Commercial_Invoice'))->limit(1)->get();
					if($txn->exists()){
						$txntype = $txn->type;
						$txnid = intval($txn->id);
						$txnnumber = $txn->number;
						$txnamount = floatval($txn->amount);
						$txntax = floatval($txn->tax);
						$txnsub_total = floatval($txn->sub_total);
						$txndiscount = floatval($txn->discount);

						$itm = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$itm->where("transaction_id", $txn->id)->get();
						if($itm->exists()){
							foreach($itm as $items){
								if($items->assembly_id == 0){
									$itemline[] =  array(
										"transaction_id"     => $txn->id,
						                "tax_item_id"        => $items->tax_item_id,
						                "item_id"            => $items->item_id,
						                "assembly_id"        => $items->assembly_id,
						                "measurement_id"     => $items->measurement_id,
						                "description"        => $items->description,
						                "quantity"           => floatval($items->quantity),
						                "conversion_ratio"   => floatval($items->conversion_ratio),
						                "cost"               => floatval($items->cost),
						                "price"              => floatval($items->price),
						                "amount"             => floatval($items->amount),
						                "discount"           => floatval($items->discount),
						                "tax"                => floatval($items->tax),
						                "rate"               => floatval($items->rate),
						                "locale"             => $items->locale,
						                "movement"           => floatval($items->movement),
						                "measurement" 		 => array(
						                	"measurement_id" => intval($items->measurement_id)
						                ),
						                "tax_item" 			 => array(
						                	"id" 		=> intval($items->tax_item_id)
						                ),
						                "item" 				 => array(
						                	"id" 		=> $items->item_id,
						                	"name" 		=> $items->description,
						                	"locale" 	=> $items->locale
						                )
									);
								}else{
									$itemassline[] =  array(
										"transaction_id"     => $txn->id,
						                "tax_item_id"        => $items->tax_item_id,
						                "item_id"            => $items->item_id,
						                "assembly_id"        => $items->assembly_id,
						                "measurement_id"     => $items->measurement_id,
						                "description"        => $items->description,
						                "quantity"           => $items->quantity,
						                "conversion_ratio"   => $items->conversion_ratio,
						                "cost"               => $items->cost,
						                "price"              => $items->price,
						                "amount"             => $items->amount,
						                "discount"           => $items->discount,
						                "tax"                => $items->tax,
						                "rate"               => $items->rate,
						                "locale"             => $items->locale,
						                "movement"           => $items->movement,
						                "measurement" 		 => array(
						                	"measurement_id" => $items->tax_item_id
						                ),
						                "tax_item" 			 => array(
						                	"id" 		=> $items->tax_item_id
						                ),
						                "item" 				 => array(
						                	"id" 		=> $items->id,
						                	"name" 		=> $items->description,
						                	"locale" 	=> $items->locale
						                )
									);
								}
							}
						}
					}
				}
				//Get Deposit
				$depname = "";
				$depamount = "";
				$pip = new Plan_items_plan(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$pip->where("plan_id", $value->plan_id)->get();
				if($pip->exists()){
					foreach($pip as $ip){
						$pli = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$pli->where("id", $ip->plan_item_id)->limit(1)->get();
						if($pli->exists()){
							if($pli->type == "deposit"){
								$depname = $pli->name;
								$depamount = $pli->amount;
							}
						}
					}
				}
				//Results				
				$data["results"][] = array(
					"id" 					=> intval($value->id),
					"currency_id"			=> intval($value->currency_id),
					"_currency"				=> array(
						"id" => $currency->id,
						"code" => $currency->code,
						"locale" => $currency->locale
					),
					"meter_number" 			=> $value->number,
					"property_id" 			=> intval($value->property_id),
					"property_name"			=> $property->name,
					"contact_id" 			=> intval($value->contact_id),
					"type"					=> $value->type,
					"attachment_id"			=> intval($value->attachment_id),
					"image_url"				=> $image_url->url,
					"worder" 				=> intval($value->worder),
					"contact_name" 			=> $contacts->name,
					"status" 				=> $value->status,
					"contact" 				=> base_url(). "api/contacts/",
					"number_digit"			=> $value->number_digit,
					"plan_id"				=> intval($value->plan_id),
					"map" 					=> $value->latitute,
					"starting_no" 			=> $value->startup_reading,
					"location_id" 			=> intval($value->location_id),
					"pole_id" 				=> intval($value->pole_id),
					"box_id" 				=> intval($value->box_id),
					"ampere_id" 			=> intval($value->ampere_id),
					"phase_id" 				=> intval($value->phase_id),
					"voltage_id" 			=> intval($value->voltage_id),
					"brand_id" 				=> intval($value->brand_id),
					"branch_id" 			=> intval($value->branch_id),
					"activated" 			=> intval($value->activated),
					"latitute" 				=> $value->latitute,
					"longtitute" 			=> $value->longtitute,
					"multiplier" 			=> floatval($value->multiplier),
					"date_used" 			=> $value->date_used,
					"reactive_id" 			=> intval($value->reactive_id),
					"reactive_status" 		=> $value->reactive_status,
					"group" 				=> $value->group,
					"item" 					=> $itemline,
					"assembly_lines" 		=> $itemassline,
					"invoice_type" 			=> $txntype,
					"transaction_id" 		=> $txnid,
					"txn_number" 			=> $txnnumber,
					"txn_amount" 			=> floatval($txnamount),
					"txn_tax" 				=> floatval($txntax),
					"txn_sub_total" 		=> floatval($txnsub_total),
					"txn_discount" 			=> floatval($txndiscount),
					"locale" 				=> $contacts->locale,
					"deposit_name" 			=> $depname,
					"deposit_amount" 		=> floatval($depamount),
					"change_meter_id" 		=> intval($value->change_meter_id),
				);
			}
		}
		//Response Data		
		$this->response($data, 200);		
	}

	function meter_number_get() {		
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
		if($obj->result_count()>0){			
			foreach ($obj as $value) {
				$boxname = "";
				$polename = "";
				if($value->box_id != 0){
					$box = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$box->where("id", $value->box_id)->limit(1)->get();
					$boxname = $box->name;
				}
				if($value->pole_id != 0){
					$pol = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$pol->where("id", $value->pole_id)->limit(1)->get();
					$polename = $pol->name;
				}
				$location = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$location->where("id", $value->location_id)->limit(1)->get();
				//Results				
				$data["results"][] = array(
					"id" 					=> intval($value->id),
					"number" 				=> $value->number,
					"meter_number" 			=> $value->number,
					"location" 				=> $location->name,
					"pole" 					=> $polename,
					"box" 					=> $boxname,
				);
			}
		}
		//Response Data		
		$this->response($data, 200);		
	}

	//POST
	function meter_post() {
		$models = json_decode($this->post('models'));
		$data = array();
		foreach ($models as $value) {
			$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->ampere_id 			= isset($value->ampere_id)			? $value->ampere_id:0;
			$obj->phase_id 				= isset($value->phase_id)			? $value->phase_id:0;
			$obj->voltage_id 			= isset($value->voltage_id)			? $value->voltage_id:0;
			$obj->reactive_id 			= isset($value->reactive_id)		? $value->reactive_id:0;
			$obj->number 				= isset($value->meter_number) 		? $value->meter_number:0;			
			$obj->multiplier 			= isset($value->multiplier) 		? $value->multiplier: 1;
			$obj->max_number 			= isset($value->max_number) 		? $value->max_number:0;
			$obj->contact_id 			= isset($value->contact_id) 		? $value->contact_id:0;
			$obj->startup_reading 		= isset($value->starting_no) 		? $value->starting_no: 0;
			$obj->longtitute 			= isset($value->longtitute) 		? $value->longtitute: "";
			$obj->latitute 				= isset($value->latitute) 			? $value->latitute: "";
			$obj->status 				= isset($value->status)				? $value->status:1;
			$obj->branch_id 			= isset($value->branch_id)			? $value->branch_id:"";
			$obj->location_id 			= isset($value->location_id)		? $value->location_id:"";
			$obj->brand_id 				= isset($value->brand_id)			? $value->brand_id:"";
			$obj->date_used 			= isset($value->date_used)?date("Y-m-d", strtotime($value->date_used)):'0000-00-00';
			$obj->number_digit 			= isset($value->number_digit)		? $value->number_digit:4;
			$obj->plan_id 				= isset($value->plan_id)			? $value->plan_id:0;
			$obj->type 					= isset($value->type)				? $value->type:"w";
			$obj->attachment_id 		= isset($value->attachment_id)		? $value->attachment_id:0;
			$obj->pole_id 				= isset($value->pole_id)			? $value->pole_id:0;
			$obj->box_id 				= isset($value->box_id)				? $value->box_id:0;
			$obj->property_id 			= isset($value->property_id)		? $value->property_id:0;
			$obj->activated 			= isset($value->activated)			? $value->activated:0;
			$obj->reactive_status 		= isset($value->reactive_status)	? $value->reactive_status:0;
			$obj->group 				= isset($value->group)				? $value->group:0;
			$obj->worder 				= isset($value->worder)				? intval($value->worder):0;
			$obj->change_meter_id 		= isset($value->change_meter_id)	? intval($value->change_meter_id):0;
			$obj->round 				= 0;
			if($obj->save()){
				//Return ballance from old meter
				if($value->change_meter_id > 0){
					//convert balance to new meter
					$balancetxn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$balancetxn->where("meter_id", $value->change_meter_id);
					$idarray = array(0,2);
					$balancetxn->where_in("status", $idarray)->get();
					if($balancetxn->exists()){
						$balancetxn->update_all('meter_id', $obj->id);
					}
					//Void old meter
					$oldmet = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$oldmet->where("id", $value->change_meter_id)->limit(1)->get();
					if($oldmet->exists()){
						$oldmet->status = 0;
						$oldmet->save();
					}
					//Installment
					$ins = new Installment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$ins->where("meter_id", $value->change_meter_id)->limit(1)->get();
					if($ins->exists()){
						$ins->meter_id = $obj->id;
						$ins->save();
					}
				}
				//Add Transaction
				if($value->txn_amount > 0){
					$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					//Number of Invoice
					$txn_number = $this->_generate_number($value->invoice_type, $value->date_used);
					//Contact
					$contxn = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$contxn->where("id", $value->contact_id)->limit(1)->get();

					isset($value->location_id) 				? $txn->location_id 				= $value->location_id : "";
					isset($value->contact_id) 				? $txn->contact_id 					= $value->contact_id : "";
					isset($contxn->payment_term_id) 		? $txn->payment_term_id 			= $contxn->payment_term_id : 5;
					isset($contxn->payment_method_id) 		? $txn->payment_method_id 			= $contxn->payment_method_id : "";
					isset($value->txn_form) 				? $txn->transaction_template_id 	= $value->txn_form : "";
					isset($contxn->account_id) 				? $txn->account_id 					= $contxn->account_id : "";
					isset($contxn->trade_discount_id) 		? $txn->discount_account_id 		= $contxn->trade_discount_id : "";
					isset($contxn->item_id) 				? $txn->item_id 					= $contxn->item_id : "";
					isset($contxn->tax_item_id) 			? $txn->tax_item_id 				= $contxn->tax_item_id : "";
					isset($value->user_id) 					? $txn->user_id 					= $value->user_id : "";
					$txn->number = $txn_number;
				   	isset($value->invoice_type) 			? $txn->type 						= $value->invoice_type : "";
				   	isset($value->txn_sub_total) 			? $txn->sub_total 					= $value->txn_sub_total : "";
				   	isset($value->txn_discount) 			? $txn->discount 					= $value->txn_discount : "";
				   	isset($value->txn_tax) 					? $txn->tax 						= $value->txn_tax : "";
				   	isset($value->txn_amount) 				? $txn->amount 						= $value->txn_amount : "";
				   	isset($value->rate) 					? $txn->rate 						= $value->rate : "";
				   	isset($value->locale) 					? $txn->locale 						= $value->locale : "";
				   	isset($value->date_used) 				? $txn->issued_date 				= $value->date_used : "";
				   	$txn->status = 0;
				   	$txn->is_journal = 1;
				   	$txn->memo = "Activate_Meter";
				   	isset($obj->id) 						? $txn->meter_id 					= $obj->id : "";
				   	if($txn->save()){
				   		//DR
				   		$j1 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				   		$j1->transaction_id 	= $txn->id;		
						$j1->account_id			= $contxn->account_id;
						$j1->contact_id 		= $value->contact_id;
					   	$j1->description 		= "Utility Service";
					   	$j1->dr 				= $value->txn_amount;
					   	$j1->cr 				= 0;
					   	$j1->rate 				= $value->rate;
					   	$j1->locale 			= $value->locale;
					   	$j1->save();
					   	//Discount
					   	if($value->txn_discount > 0){
					   		$jd = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					   		$jd->transaction_id 	= $txn->id;		
							$jd->account_id			= $contxn->trade_discount_id;
							$jd->contact_id 		= $value->contact_id;
						   	$jd->description 		= "Utility Service";
						   	$jd->dr 				= $value->txn_discount;
						   	$jd->cr 				= 0;
						   	$jd->rate 				= $value->rate;
						   	$jd->locale 			= $value->locale;
						   	$jd->save();
					   	}
					   	//CR
				   		$j2 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				   		$j2->transaction_id 	= $txn->id;		
						$j2->account_id			= $contxn->ra_id;
						$j2->contact_id 		= $value->contact_id;
					   	$j2->description 		= "Utility Service";
					   	$j2->dr 				= 0;
					   	$j2->cr 				= $value->txn_sub_total;
					   	$j2->rate 				= $value->rate;
					   	$j2->locale 			= $value->locale;
					   	$j2->save();
					   	//TAX
					   	if($value->txn_tax > 0){
					   		$taxID = "";
					   		foreach ($value->item_lines as $iline) {
					   			if($iline->tax_item->account_id != ""){
					   				$taxID = $iline->tax_item->account_id;
					   			}
					   		}
					   		$jx = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					   		$jx->transaction_id 	= $txn->id;		
							$jx->account_id			= $taxID;
							$jx->contact_id 		= $value->contact_id;
						   	$jx->description 		= "Utility Service";
						   	$jx->dr 				= 0;
						   	$jx->cr 				= $value->txn_tax;
						   	$jx->rate 				= $value->rate;
						   	$jx->locale 			= $value->locale;
						   	$jx->save();
					   	}

					   	//Items Line
					   	foreach ($value->item_lines as $itemline) {
						   	$assItems = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						   	$assItems->transaction_id 		= $txn->id;
							isset($itemline->item_id)				? $assItems->item_id				= $itemline->item_id : "";
							isset($itemline->assembly_id)			? $assItems->assembly_id 			= $itemline->assembly_id : "";
							isset($itemline->measurement_id)		? $assItems->measurement_id			= $itemline->measurement_id : "";
							isset($itemline->tax_item_id)			? $assItems->tax_item_id			= $itemline->tax_item_id : "";
						   	isset($itemline->wht_account_id)		? $assItems->wht_account_id			= $itemline->wht_account_id : "";
						   	isset($itemline->description)			? $assItems->description 			= $itemline->description : "";
						   	isset($itemline->on_hand)				? $assItems->on_hand 				= $itemline->on_hand : "";
						   	isset($itemline->gross_weight)			? $assItems->gross_weight 			= $itemline->gross_weight : "";
						   	isset($itemline->truck_weight)			? $assItems->truck_weight 			= $itemline->truck_weight : "";
						   	isset($itemline->bag_weight)			? $assItems->bag_weight 			= $itemline->bag_weight : "";
						   	isset($itemline->yield)					? $assItems->yield 					= $itemline->yield : "";
						   	isset($itemline->quantity)				? $assItems->quantity 				= $itemline->quantity : "";
						   	isset($itemline->quantity_adjusted) 	? $assItems->quantity_adjusted 		= $itemline->quantity_adjusted : "";
						   	isset($itemline->cost)					? $assItems->cost 					= $itemline->cost : "";
						   	isset($itemline->price)					? $assItems->price 					= $itemline->price : "";		   	
						   	isset($itemline->amount)				? $assItems->amount 				= $itemline->amount : "";
						   	isset($itemline->markup)				? $assItems->markup 				= $itemline->markup : "";
						   	isset($itemline->discount)				? $assItems->discount 				= $itemline->discount : "";
						   	isset($itemline->fine)					? $assItems->fine 					= $itemline->fine : "";
						   	isset($itemline->tax)					? $assItems->tax 					= $itemline->tax : "";
						   	isset($itemline->rate)					? $assItems->rate 					= $itemline->rate : "";
						   	isset($itemline->locale)				? $assItems->locale 				= $itemline->locale : "";
						   	isset($itemline->additional_cost)		? $assItems->additional_cost  		= $itemline->additional_cost : "";
						   	isset($itemline->additional_applied)	? $assItems->additional_applied  	= $itemline->additional_applied : "";
						   	isset($itemline->movement)				? $assItems->movement 				= $itemline->movement : "";
						   	$assItems->save();
						}
						//Assembly Item
						if($value->item_assembly_lines){
							foreach ($value->item_assembly_lines as $assline) {
							   	$ass = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							   	$ass->transaction_id 		= $txn->id;
								isset($assline->item_id)				? $ass->item_id				= $assline->item_id : "";
								isset($assline->assembly_id)			? $ass->assembly_id 			= $assline->assembly_id : "";
								isset($assline->measurement_id)			? $ass->measurement_id			= $assline->measurement_id : "";
								isset($assline->tax_item_id)			? $ass->tax_item_id			= $assline->tax_item_id : "";
							   	isset($assline->wht_account_id)			? $ass->wht_account_id			= $assline->wht_account_id : "";
							   	isset($assline->description)			? $ass->description 			= $assline->description : "";
							   	isset($assline->on_hand)				? $ass->on_hand 				= $assline->on_hand : "";
							   	isset($assline->gross_weight)			? $ass->gross_weight 			= $assline->gross_weight : "";
							   	isset($assline->truck_weight)			? $ass->truck_weight 			= $assline->truck_weight : "";
							   	isset($assline->bag_weight)				? $ass->bag_weight 			= $assline->bag_weight : "";
							   	isset($assline->yield)					? $ass->yield 					= $assline->yield : "";
							   	isset($assline->quantity)				? $ass->quantity 				= $assline->quantity : "";
							   	isset($assline->quantity_adjusted) 		? $ass->quantity_adjusted 		= $assline->quantity_adjusted : "";
							   	isset($assline->cost)					? $ass->cost 					= $assline->cost : "";
							   	isset($assline->price)					? $ass->price 					= $assline->price : "";		   	
							   	isset($assline->amount)					? $ass->amount 				= $assline->amount : "";
							   	isset($assline->markup)					? $ass->markup 				= $assline->markup : "";
							   	isset($assline->discount)				? $ass->discount 				= $assline->discount : "";
							   	isset($assline->fine)					? $ass->fine 					= $assline->fine : "";
							   	isset($assline->tax)					? $ass->tax 					= $assline->tax : "";
							   	isset($assline->rate)					? $ass->rate 					= $assline->rate : "";
							   	isset($assline->locale)					? $ass->locale 				= $assline->locale : "";
							   	isset($assline->additional_cost)		? $ass->additional_cost  		= $assline->additional_cost : "";
							   	isset($assline->additional_applied)		? $ass->additional_applied  	= $assline->additional_applied : "";
							   	isset($assline->movement)				? $ass->movement 				= $assline->movement : "";
							   	$ass->save();
							}
						}
				   		$data[] = array(
							"id" 				=> $txn->id,
							"amount" 			=> floatval($txn->amount),
							"discount" 			=> floatval($txn->discount),
							"sub_total" 		=> floatval($txn->sub_total),
							"tax" 				=> floatval($txn->tax),
							"number" 			=> $txn->number,
							"issued_date" 		=> $txn->issued_date,
							"bill_date" 		=> $txn->bill_date,
							"locale" 			=> $txn->locale,
							"item_lines" 		=> $value->item_lines,
							"invoice_type" 		=> $txn->type,
							"contact" 			=> array(
				 				'id' 		=> $contxn->id, 
				 				'abbr' 		=> $contxn->abbr, 
				 				'number' 	=> $contxn->number, 
				 				'name'		=> $contxn->name, 
				 				'phone' 	=> $contxn->phone, 
				 				'locale'	=> $contxn->locale, 
				 				'address' 	=> $contxn->address,
				 			),
				 			"print_count" 		=> $txn->print_count
						);
				   	}
				}			
			}			
		}
		$count = count($data);
		if($count > 0) {
			$this->response(array("results" => $data), 201);
		} else {
			$this->response(array("results" => array()), 401);
		}			
	}

	//PUT
	function meter_put() {
		$models = json_decode($this->put('models'));
		$data = array();
		$data["count"] = 0;
		foreach ($models as $value) {			
			$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			$obj->ampere_id 			= isset($value->ampere_id)			? $value->ampere_id:0;
			$obj->phase_id 				= isset($value->phase_id)			? $value->phase_id:0;
			$obj->voltage_id 			= isset($value->voltage_id)			? $value->voltage_id:0;
			$obj->reactive_id 			= isset($value->reactive_id)		? $value->reactive_id:0;
			$obj->number 				= isset($value->meter_number) 		? $value->meter_number:0;			
			$obj->multiplier 			= isset($value->multiplier) 		? $value->multiplier: 1;
			$obj->max_number 			= isset($value->max_number) 		? $value->max_number:0;
			$obj->contact_id 			= isset($value->contact_id) 		? $value->contact_id:0;
			$obj->startup_reading 		= isset($value->starting_no) 		? $value->starting_no: 0;
			$obj->longtitute 			= isset($value->longtitute) 		? $value->longtitute: "";
			$obj->latitute 				= isset($value->latitute) 			? $value->latitute: "";
			$obj->status 				= isset($value->status)				? $value->status:1;
			$obj->branch_id 			= isset($value->branch_id)			? $value->branch_id:"";
			$obj->location_id 			= isset($value->location_id)		? $value->location_id:"";
			$obj->brand_id 				= isset($value->brand_id)			? $value->brand_id:"";
			$obj->date_used 			= isset($value->date_used)?date("Y-m-d", strtotime($value->date_used)):'0000-00-00';
			$obj->number_digit 			= isset($value->number_digit)		? $value->number_digit:4;
			$obj->plan_id 				= isset($value->plan_id)			? $value->plan_id:0;
			$obj->type 					= isset($value->type)				? $value->type:"w";
			$obj->attachment_id 		= isset($value->attachment_id)		? $value->attachment_id:0;
			$obj->pole_id 				= isset($value->pole_id)			? $value->pole_id:0;
			$obj->box_id 				= isset($value->box_id)				? $value->box_id:0;
			$obj->property_id 			= isset($value->property_id)		? $value->property_id:0;
			$obj->activated 			= isset($value->activated)			? $value->activated:0;
			$obj->reactive_status 		= isset($value->reactive_status)	? $value->reactive_status:0;
			$obj->group 				= isset($value->group)				? $value->group:0;
			$obj->worder 				= isset($value->worder)				? intval($value->worder):0;
			$obj->change_meter_id 		= isset($value->change_meter_id)	? intval($value->change_meter_id):0;
			$obj->round 				= 0;
			if($obj->save()){
				//Return ballance from old meter
				if($value->change_meter_id > 0){
					$balancetxn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$balancetxn->where("meter_id", $value->change_meter_id);
					$idarray = array(0,2);
					$balancetxn->where_in("status", $idarray)->get();
					if($balancetxn->exists()){
						$balancetxn->update_all('meter_id', $obj->id);
					}
					$oldmet = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$oldmet->where("id", $value->change_meter_id)->limit(1)->get();
					if($oldmet->exists()){
						$oldmet->status = 0;
						$oldmet->save();
					}
				}
				//Add Transaction
				//Contact
				$contxn = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$contxn->where("id", $value->contact_id)->limit(1)->get();
				if($value->change_line == 1){
					if($value->txn_amount > 0){
						//Delete Old Transaction
						$otxn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$otxn->where("id", $value->transaction_id)->get();
						if($otxn->exists()){
							$otxn->deleted = 1;
							$otxn->save();
						}
						$ojn = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$ojn->where("transaction_id", $value->transaction_id)->get();
						if($ojn->exists()){
							$ojn->update_all('deleted', 1);
						}
						$oit = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$oit->where("transaction_id", $value->transaction_id)->get();
						if($oit->exists()){
							$oit->update_all('deleted', 1);
						}
						//Add TXN
						$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						//Number of Invoice
						$txn_number = $this->_generate_number($value->invoice_type, $value->date_used);

						isset($value->location_id) 				? $txn->location_id 				= $value->location_id : "";
						isset($value->contact_id) 				? $txn->contact_id 					= $value->contact_id : "";
						isset($contxn->payment_term_id) 		? $txn->payment_term_id 			= $contxn->payment_term_id : 5;
						isset($contxn->payment_method_id) 		? $txn->payment_method_id 			= $contxn->payment_method_id : "";
						isset($value->txn_form) 				? $txn->transaction_template_id 	= $value->txn_form : "";
						isset($contxn->account_id) 				? $txn->account_id 					= $contxn->account_id : "";
						isset($contxn->trade_discount_id) 		? $txn->discount_account_id 		= $contxn->trade_discount_id : "";
						isset($contxn->item_id) 				? $txn->item_id 					= $contxn->item_id : "";
						isset($contxn->tax_item_id) 			? $txn->tax_item_id 				= $contxn->tax_item_id : "";
						isset($value->user_id) 					? $txn->user_id 					= $value->user_id : "";
						$txn->number = $txn_number;
					   	isset($value->invoice_type) 			? $txn->type 						= $value->invoice_type : "";
					   	isset($value->txn_sub_total) 			? $txn->sub_total 					= $value->txn_sub_total : "";
					   	isset($value->txn_discount) 			? $txn->discount 					= $value->txn_discount : "";
					   	isset($value->txn_tax) 					? $txn->tax 						= $value->txn_tax : "";
					   	isset($value->txn_amount) 				? $txn->amount 						= $value->txn_amount : "";
					   	isset($value->rate) 					? $txn->rate 						= $value->rate : "";
					   	isset($value->locale) 					? $txn->locale 						= $value->locale : "";
					   	isset($value->date_used) 				? $txn->issued_date 				= $value->date_used : "";
					   	$txn->status = 0;
					    $txn->is_journal = 1;
					   	isset($obj->id) 						? $txn->meter_id 					= $obj->id : "";
					   	if($txn->save()){
					   		//DR
					   		$j1 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					   		$j1->transaction_id 	= $txn->id;		
							$j1->account_id			= $contxn->account_id;
							$j1->contact_id 		= $value->contact_id;
						   	$j1->description 		= "Utility Service";
						   	$j1->dr 				= $value->txn_amount;
						   	$j1->cr 				= 0;
						   	$j1->rate 				= $value->rate;
						   	$j1->locale 			= $value->locale;
						   	$j1->save();
						   	//Discount
						   	if($value->txn_discount > 0){
						   		$jd = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						   		$jd->transaction_id 	= $txn->id;		
								$jd->account_id			= $contxn->trade_discount_id;
								$jd->contact_id 		= $value->contact_id;
							   	$jd->description 		= "Utility Service";
							   	$jd->dr 				= $value->txn_discount;
							   	$jd->cr 				= 0;
							   	$jd->rate 				= $value->rate;
							   	$jd->locale 			= $value->locale;
							   	$jd->save();
						   	}
						   	//CR
					   		$j2 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					   		$j2->transaction_id 	= $txn->id;		
							$j2->account_id			= $contxn->ra_id;
							$j2->contact_id 		= $value->contact_id;
						   	$j2->description 		= "Utility Service";
						   	$j2->dr 				= 0;
						   	$j2->cr 				= $value->txn_sub_total;
						   	$j2->rate 				= $value->rate;
						   	$j2->locale 			= $value->locale;
						   	$j2->save();
						   	//TAX
						   	if($value->txn_tax > 0){
						   		$taxID = "";
						   		foreach ($value->item_lines as $iline) {
						   			if($iline->tax_item->account_id != ""){
						   				$taxID = $iline->tax_item->account_id;
						   			}
						   		}
						   		$jx = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						   		$jx->transaction_id 	= $txn->id;		
								$jx->account_id			= $taxID;
								$jx->contact_id 		= $value->contact_id;
							   	$jx->description 		= "Utility Service";
							   	$jx->dr 				= 0;
							   	$jx->cr 				= $value->txn_tax;
							   	$jx->rate 				= $value->rate;
							   	$jx->locale 			= $value->locale;
							   	$jx->save();
						   	}

						   	//Items Line
						   	foreach ($value->item_lines as $itemline) {
							   	$assItems = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							   	$assItems->transaction_id 		= $txn->id;
								isset($itemline->item_id)				? $assItems->item_id				= $itemline->item_id : "";
								isset($itemline->assembly_id)			? $assItems->assembly_id 			= $itemline->assembly_id : "";
								isset($itemline->measurement_id)		? $assItems->measurement_id			= $itemline->measurement_id : "";
								isset($itemline->tax_item_id)			? $assItems->tax_item_id			= $itemline->tax_item_id : "";
							   	isset($itemline->wht_account_id)		? $assItems->wht_account_id			= $itemline->wht_account_id : "";
							   	isset($itemline->description)			? $assItems->description 			= $itemline->description : "";
							   	isset($itemline->on_hand)				? $assItems->on_hand 				= $itemline->on_hand : "";
							   	isset($itemline->gross_weight)			? $assItems->gross_weight 			= $itemline->gross_weight : "";
							   	isset($itemline->truck_weight)			? $assItems->truck_weight 			= $itemline->truck_weight : "";
							   	isset($itemline->bag_weight)			? $assItems->bag_weight 			= $itemline->bag_weight : "";
							   	isset($itemline->yield)					? $assItems->yield 					= $itemline->yield : "";
							   	isset($itemline->quantity)				? $assItems->quantity 				= $itemline->quantity : "";
							   	isset($itemline->quantity_adjusted) 	? $assItems->quantity_adjusted 		= $itemline->quantity_adjusted : "";
							   	isset($itemline->cost)					? $assItems->cost 					= $itemline->cost : "";
							   	isset($itemline->price)					? $assItems->price 					= $itemline->price : "";		   	
							   	isset($itemline->amount)				? $assItems->amount 				= $itemline->amount : "";
							   	isset($itemline->markup)				? $assItems->markup 				= $itemline->markup : "";
							   	isset($itemline->discount)				? $assItems->discount 				= $itemline->discount : "";
							   	isset($itemline->fine)					? $assItems->fine 					= $itemline->fine : "";
							   	isset($itemline->tax)					? $assItems->tax 					= $itemline->tax : "";
							   	isset($itemline->rate)					? $assItems->rate 					= $itemline->rate : "";
							   	isset($itemline->locale)				? $assItems->locale 				= $itemline->locale : "";
							   	isset($itemline->additional_cost)		? $assItems->additional_cost  		= $itemline->additional_cost : "";
							   	isset($itemline->additional_applied)	? $assItems->additional_applied  	= $itemline->additional_applied : "";
							   	isset($itemline->movement)				? $assItems->movement 				= $itemline->movement : "";
							   	$assItems->save();
							}
							//Assembly Item
							if($value->item_assembly_lines){
								foreach ($value->item_assembly_lines as $assline) {
								   	$ass = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
								   	$ass->transaction_id 		= $txn->id;
									isset($assline->item_id)				? $ass->item_id				= $assline->item_id : "";
									isset($assline->assembly_id)			? $ass->assembly_id 			= $assline->assembly_id : "";
									isset($assline->measurement_id)			? $ass->measurement_id			= $assline->measurement_id : "";
									isset($assline->tax_item_id)			? $ass->tax_item_id			= $assline->tax_item_id : "";
								   	isset($assline->wht_account_id)			? $ass->wht_account_id			= $assline->wht_account_id : "";
								   	isset($assline->description)			? $ass->description 			= $assline->description : "";
								   	isset($assline->on_hand)				? $ass->on_hand 				= $assline->on_hand : "";
								   	isset($assline->gross_weight)			? $ass->gross_weight 			= $assline->gross_weight : "";
								   	isset($assline->truck_weight)			? $ass->truck_weight 			= $assline->truck_weight : "";
								   	isset($assline->bag_weight)				? $ass->bag_weight 			= $assline->bag_weight : "";
								   	isset($assline->yield)					? $ass->yield 					= $assline->yield : "";
								   	isset($assline->quantity)				? $ass->quantity 				= $assline->quantity : "";
								   	isset($assline->quantity_adjusted) 		? $ass->quantity_adjusted 		= $assline->quantity_adjusted : "";
								   	isset($assline->cost)					? $ass->cost 					= $assline->cost : "";
								   	isset($assline->price)					? $ass->price 					= $assline->price : "";		   	
								   	isset($assline->amount)					? $ass->amount 				= $assline->amount : "";
								   	isset($assline->markup)					? $ass->markup 				= $assline->markup : "";
								   	isset($assline->discount)				? $ass->discount 				= $assline->discount : "";
								   	isset($assline->fine)					? $ass->fine 					= $assline->fine : "";
								   	isset($assline->tax)					? $ass->tax 					= $assline->tax : "";
								   	isset($assline->rate)					? $ass->rate 					= $assline->rate : "";
								   	isset($assline->locale)					? $ass->locale 				= $assline->locale : "";
								   	isset($assline->additional_cost)		? $ass->additional_cost  		= $assline->additional_cost : "";
								   	isset($assline->additional_applied)		? $ass->additional_applied  	= $assline->additional_applied : "";
								   	isset($assline->movement)				? $ass->movement 				= $assline->movement : "";
								   	$ass->save();
								}
							}
					   		
					   	}
					}
				}else{
					$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$txn->where("id", $value->transaction_id)->get();
				}	
				$data[] = array(
					"id" 				=> $txn->id,
					"amount" 			=> floatval($txn->amount),
					"discount" 			=> floatval($txn->discount),
					"sub_total" 		=> floatval($txn->sub_total),
					"tax" 				=> floatval($txn->tax),
					"number" 			=> $txn->number,
					"issued_date" 		=> $txn->issued_date,
					"locale" 			=> $txn->locale,
					"item_lines" 		=> $value->item_lines,
					"invoice_type" 		=> $txn->type,
					"contact" 			=> array(
		 				'id' 		=> $contxn->id, 
		 				'abbr' 		=> $contxn->abbr, 
		 				'number' 	=> $contxn->number, 
		 				'name'		=> $contxn->name, 
		 				'phone' 	=> $contxn->phone, 
		 				'locale'	=> $contxn->locale, 
		 				'address' 	=> $contxn->address,
		 			),
		 			"print_count" 		=> $txn->print_count
				);
			}	
		}
		$count = count($data);
		if($count > 0) {
			$this->response(array("results" =>$data), 201);
		} else {
			$this->response(array("results" => array()), 401);
		}
	}
	//DELETE
	function meter_delete() {
		$models = json_decode($this->delete('models'));
		foreach ($models as $key => $value) {
			$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);			
		}
		//Response data
		$this->response($data, 200);
	}

	//Activate Meter
	function delactivatmeter_post(){
		$models = json_decode($this->post('models'));
		$data = array();
		foreach ($models as $value) {
			$otxn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$otxn->where("id", $value->transaction_id)->get();
			if($otxn->exists()){
				$otxn->deleted = 1;
				$otxn->save();
			}
			$ojn = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$ojn->where("transaction_id", $value->transaction_id)->get();
			if($ojn->exists()){
				$ojn->update_all('deleted', 1);
			}
			$oit = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$oit->where("transaction_id", $value->transaction_id)->get();
			if($oit->exists()){
				$oit->update_all('deleted', 1);
			}
			$data[] = array(
				"id" => $value->transaction_id,
			);
		}
		$count = count($data);
		if($count > 0) {
			$this->response(array("results" => $data), 201);
		} else {
			$this->response(array("results" => array()), 401);
		}
	}
	function activate_deposit_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {
			$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$txn_number = $this->_generate_number($value->type, $value->issued_date);
			isset($value->account_id) 				? $txn->account_id 					= $value->account_id : "";
			isset($value->location_id) 				? $txn->location_id 				= $value->location_id : "";
			isset($value->contact_id) 				? $txn->contact_id 					= $value->contact_id : "";
			isset($value->payment_term_id) 			? $txn->payment_term_id 			= $value->payment_term_id : 5;
			isset($value->payment_method_id) 		? $txn->payment_method_id 			= $value->payment_method_id : 1;
			isset($value->transaction_template_id) 	? $txn->transaction_template_id 	= $value->transaction_template_id : "";
			isset($value->account_id) 				? $txn->account_id 					= $value->account_id : "";
			
			isset($value->user_id) 					? $txn->user_id 					= $value->user_id : "";
			$txn->number = $txn_number;
		   	isset($value->type) 					? $txn->type 						= $value->type : "";
		   	isset($value->amount) 					? $txn->sub_total 					= $value->amount : "";
		   	isset($value->amount) 					? $txn->amount 						= $value->amount : "";
		   	isset($value->rate) 					? $txn->rate 						= $value->rate : "";
		   	isset($value->locale) 					? $txn->locale 						= $value->locale : "";
		   	isset($value->issued_date) 				? $txn->issued_date 				= $value->issued_date : "";
		   	$txn->status = 0;
		   	isset($value->is_journal) 				? $txn->is_journal 					= $value->is_journal : 1;
		   	isset($value->meter_id) 				? $txn->meter_id 					= $value->meter_id : "";
	   		if($txn->save()){
	   			$obj = new Account_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				isset($txn->id) 				? $obj->transaction_id 		= $txn->id : "";
				isset($value->account_id)		? $obj->account_id			= $value->account_id : "";
				isset($value->contact_id)		? $obj->contact_id			= $value->contact_id : "";			
			   	isset($value->description)		? $obj->description 		= $value->description : "";
			   	isset($value->amount)			? $obj->amount 				= $value->amount : "";
			   	isset($value->rate)				? $obj->rate 				= $value->rate : "";
			   	isset($value->locale)			? $obj->locale 				= $value->locale : "";
			   	if($obj->save()){
				   	$data["results"][] = array(
				   		"id" 			=> $txn->id,
				   		"contact_name" 	=> $value->contact_name,
				   		"contact_address" => $value->contact_address,
				   		"purpose" 		=> $value->description,
				   		"issued_date" 	=> $txn->issued_date,
				   		"number" 		=> $txn->number,
				   		"amount" 		=> floatval($txn->amount),
				   		"locale" 		=> $value->locale,
				   		"payment_method" => $value->payment_method_name,
				   		"invoice_type" 	=> $txn->type,
				   	);
				}
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}

	//Spa
	//Tablet
	function room_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Spa_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
				$br = new Branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$br->where("id", $value->branch_id)->limit(1)->get();
				$data["results"][] = array(
					"id" 						=> $value->id,
					"number" 					=> $value->number,
					"name" 						=> $value->name,
					"branch_id" 				=> $value->branch_id,
					"branch_name" 				=> $br->name,
					"status" 					=> $value->status
				);
			}
		}

		//Response Data
		$this->response($data, 200);
	}
	function room_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {
			
			$obj = new Spa_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			isset($value->branch_id) 				? $obj->branch_id 					= $value->branch_id : "";
			isset($value->name) 				? $obj->name 					= $value->name : "";
			isset($value->number) 				? $obj->number 					= $value->number : "";
		   	isset($value->status) 				? $obj->status 					= $value->status : "";

	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 						=> $obj->id,
			   	);
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function room_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {
			$obj = new Spa_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			isset($value->branch_id) 				? $obj->branch_id 					= $value->branch_id : "";
			isset($value->name) 				? $obj->name 					= $value->name : "";
			isset($value->number) 				? $obj->number 					= $value->number : "";
		   	isset($value->status) 				? $obj->status 					= $value->status : "";
			
			if($obj->save()){
				//Results
				$data["results"][] = array(
					"id" 						=> $obj->id
				);
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}

	//Assembly
	function ass_items_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_pattern = 0;
		$no_nature = true;
		
		$obj = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    			}else if($value["field"]=="nature"){
	    				$no_nature = false;
	    			}else{
	    				$obj->where($value["field"], $value["value"]);
	    			}
				}
			}
		}

		if($no_nature){
			$obj->where("nature <>", "main_variant");
		}
		
		$obj->include_related("category", "name");
		$obj->include_related("measurement", array("name"));
		$obj->where("is_pattern", $is_pattern);
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

				//Measurement
				$measurement = [];
				if($value->measurement_id>0){
					$measurement = array(
						"measurement_id" 	=> $value->measurement_id,
						"measurement"		=> $value->measurement_name ? $value->measurement_name : ""
					);
				}

				//Variant
				$variant = [];
				if($value->nature=="variant"){
					$variant = $value->attribute_value->get_raw()->result();
				}

				$data["results"][] = array(
					"id" 						=> $value->id,
					"company_id" 				=> $value->company_id,
					"contact_id" 				=> $value->contact_id,
					"currency_id" 				=> $value->currency_id,
					"item_type_id"				=> $value->item_type_id,					
					"category_id" 				=> $value->category_id,
					"item_group_id"				=> $value->item_group_id,
					"item_sub_group_id"			=> $value->item_sub_group_id,
					"brand_id" 					=> $value->brand_id,					
					"measurement_id" 			=> $value->measurement_id,					
					"sub_of_id" 				=> $value->sub_of_id,
					"abbr" 						=> $value->abbr,
					"number" 					=> $value->number,
					"international_code" 		=> $value->international_code,
					"imei" 						=> $value->imei,
					"serial_number" 			=> $value->serial_number,
					"supplier_code"				=> $value->supplier_code,
					"color_code" 				=> $value->color_code,
				   	"name" 						=> $value->name,
				   	"purchase_description" 		=> $value->purchase_description,
				   	"sale_description" 			=> $value->sale_description,
				   	"measurements"				=> $value->measurements,
				   	"barcode"					=> $value->barcode,
				   	"catalogs" 					=> explode(",",$value->catalogs),
				   	"cost" 						=> floatval($value->cost),
				   	"price" 					=> floatval($value->price),
				   	"amount" 					=> floatval($value->amount),
				   	"rate" 						=> floatval($value->rate),
				   	"locale" 					=> $value->locale,
				   	"on_hand" 					=> 0,
				   	"on_po" 					=> floatval($value->on_po),
				   	"on_so" 					=> floatval($value->on_so),
				   	"order_point" 				=> intval($value->order_point),
				   	"income_account_id" 		=> $value->income_account_id,
				   	"expense_account_id"		=> $value->expense_account_id,
				   	"inventory_account_id"		=> $value->inventory_account_id,   				   	
				   	"preferred_vendor_id" 		=> $value->preferred_vendor_id,
				   	"image_url" 				=> $value->image_url!="" ? $value->image_url : $this->noImageUrl,
				   	"favorite" 					=> $value->favorite=="true"?true:false,
				   	"is_catalog" 				=> intval($value->is_catalog),
				   	"is_assembly" 				=> intval($value->is_assembly),
				   	"is_pattern" 				=> intval($value->is_pattern),
				   	"tags" 						=> explode(",",$value->tags),
				   	"nature" 					=> $value->nature,
				   	"status" 					=> $value->status,
				   	"deleted" 					=> $value->deleted,
				   	"is_system" 				=> $value->is_system,

				   	"category" 					=> $value->category_name,
				   	"measurement" 				=> $measurement,
				   	"variant" 					=> $variant
				);
			}
		}
		
		$data['pageSize'] = $limit;
		$data['skip'] = $limit * $page;	

		//Response Data		
		$this->response($data, 200);	
	}

	//POST
	function ass_items_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {
			$obj = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			isset($value->company_id) 				? $obj->company_id 				= $value->company_id : "";
			isset($value->contact_id) 				? $obj->contact_id 				= $value->contact_id : "";			
			isset($value->currency_id) 				? $obj->currency_id 			= $value->currency_id : "";
			isset($value->item_type_id) 			? $obj->item_type_id			= $value->item_type_id : "";			
			isset($value->category_id) 				? $obj->category_id 			= $value->category_id : "";
			isset($value->item_group_id) 			? $obj->item_group_id 			= $value->item_group_id : "";
			isset($value->item_sub_group_id) 		? $obj->item_sub_group_id 		= $value->item_sub_group_id : "";
			isset($value->brand_id) 				? $obj->brand_id 				= $value->brand_id : "";
			isset($value->measurement_id) 			? $obj->measurement_id 			= $value->measurement_id : "";		
			isset($value->sub_of_id) 				? $obj->sub_of_id 				= $value->sub_of_id : "";
			isset($value->abbr) 					? $obj->abbr 					= $value->abbr : "";
			isset($value->number) 					? $obj->number 					= $value->number : "";
			isset($value->international_code) 		? $obj->international_code 		= $value->international_code : "";
			isset($value->imei) 					? $obj->imei 					= $value->imei : "";
			isset($value->serial_number) 			? $obj->serial_number 			= $value->serial_number : "";
			isset($value->supplier_code) 			? $obj->supplier_code 			= $value->supplier_code : "";
			isset($value->color_code) 				? $obj->color_code 				= $value->color_code : "";
		   	isset($value->name) 					? $obj->name 					= $value->name :  "";
		   	isset($value->purchase_description) 	? $obj->purchase_description 	= $value->purchase_description : "";
		   	isset($value->sale_description) 		? $obj->sale_description 		= $value->sale_description : "";
		   	isset($value->measurements) 			? $obj->measurements 			= $value->measurements : "";
		   	isset($value->barcode) 					? $obj->barcode 				= $value->barcode : "";
		   	isset($value->catalogs) 				? $obj->catalogs 				= implode(",",$value->catalogs) : "";
		   	isset($value->cost) 					? $obj->cost 					= $value->cost : "";
		   	isset($value->price) 					? $obj->price 					= $value->price : "";
		   	isset($value->amount) 					? $obj->amount 					= $value->amount : "";
		   	isset($value->rate) 					? $obj->rate 					= $value->rate : "";
		   	isset($value->locale) 					? $obj->locale 					= $value->locale : "";
		   	isset($value->on_hand) 					? $obj->on_hand 				= $value->on_hand : "";
		   	isset($value->on_po) 					? $obj->on_po 					= $value->on_po : "";
		   	isset($value->on_so) 					? $obj->on_so 					= $value->on_so : "";
		   	isset($value->order_point) 				? $obj->order_point 			= $value->order_point : "";
		   	isset($value->income_account_id) 		? $obj->income_account_id 		= $value->income_account_id : "";
		   	isset($value->expense_account_id) 		? $obj->expense_account_id 		= $value->expense_account_id : "";
		   	isset($value->inventory_account_id) 	? $obj->inventory_account_id 	= $value->inventory_account_id : "";
		   	isset($value->preferred_vendor_id) 		? $obj->preferred_vendor_id 	= $value->preferred_vendor_id : "";
		   	isset($value->image_url) 				? $obj->image_url				= $value->image_url : "";
		   	isset($value->favorite) 				? $obj->favorite 				= $value->favorite : "";
		   	isset($value->is_catalog) 				? $obj->is_catalog 				= $value->is_catalog : "";
		   	isset($value->is_assembly) 				? $obj->is_assembly 			= $value->is_assembly : "";
		   	isset($value->is_pattern) 				? $obj->is_pattern 				= $value->is_pattern : "";
		   	isset($value->tags) 					? $obj->tags 					= implode(",",$value->tags) : "";
		   	isset($value->nature) 					? $obj->nature 					= $value->nature : "";
		   	isset($value->status) 					? $obj->status 					= $value->status : "";
		   	isset($value->deleted) 					? $obj->deleted 				= $value->deleted : "";

	   		if($obj->save()){
	   			$table = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				//$tmp = isset($row->is_flat) ? $row->is_flat:FALSE;
				$table->is_flat = 0;
				$table->currency_id = $value->currency_id;
				$table->type = "service";
				$table->unit = 0;
				$table->amount = $value->price;
				$table->usage = 0;
				$table->name = $obj->name;
				$table->account_id = $obj->income_account_id;
				$table->is_active = 1;
				$table->assembly_id = $obj->id;
				$table->save();
	   			//Item Price
	   			$itemPrice = new Item_price(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$itemPrice->item_id 			= $obj->id;
				$itemPrice->measurement_id 		= $obj->measurement_id;
				$itemPrice->quantity 			= 1;
				$itemPrice->conversion_ratio 	= 1;
				$itemPrice->price 				= $obj->price;
				$itemPrice->locale 				= $obj->locale;
				$itemPrice->save();

			   	$data["results"][] = array(
			   		"id" 						=> $obj->id,
					"company_id" 				=> $obj->company_id,
					"contact_id" 				=> $obj->contact_id,
					"currency_id" 				=> $obj->currency_id,
					"item_type_id"				=> $obj->item_type_id,					
					"category_id" 				=> $obj->category_id,
					"item_group_id"				=> $obj->item_group_id,
					"item_sub_group_id"			=> $obj->item_sub_group_id,
					"brand_id" 					=> $obj->brand_id,					
					"measurement_id" 			=> $obj->measurement_id,					
					"sub_of_id" 				=> $obj->sub_of_id,
					"abbr" 						=> $obj->abbr,
					"number" 					=> $obj->number,
					"international_code" 		=> $obj->international_code,
					"imei" 						=> $obj->imei,
					"serial_number" 			=> $obj->serial_number,
					"supplier_code"				=> $obj->supplier_code,
					"color_code" 				=> $obj->color_code,
				   	"name" 						=> $obj->name,
				   	"purchase_description" 		=> $obj->purchase_description,
				   	"sale_description" 			=> $obj->sale_description,
				   	"measurements"				=> $obj->measurements,
				   	"barcode"					=> $obj->barcode,
				   	"catalogs" 					=> explode(",",$obj->catalogs),
				   	"cost" 						=> floatval($obj->cost),
				   	"price" 					=> floatval($obj->price),
				   	"amount" 					=> floatval($obj->amount),
				   	"rate" 						=> floatval($obj->rate),
				   	"locale" 					=> $obj->locale,
				   	"on_hand" 					=> floatval($obj->on_hand),
				   	"on_po" 					=> floatval($obj->on_po),
				   	"on_so" 					=> floatval($obj->on_so),
				   	"order_point" 				=> intval($obj->order_point),
				   	"income_account_id" 		=> $obj->income_account_id,
				   	"expense_account_id"		=> $obj->expense_account_id,
				   	"inventory_account_id"		=> $obj->inventory_account_id,
				   	"preferred_vendor_id" 		=> $obj->preferred_vendor_id,
				   	"image_url" 				=> $obj->image_url!="" ? $obj->image_url : $this->noImageUrl,
				   	"favorite" 					=> $obj->favorite=="true"?true:false,
				   	"is_catalog" 				=> $obj->is_catalog,
				   	"is_assembly" 				=> $obj->is_assembly,
				   	"is_pattern" 				=> intval($obj->is_pattern),
				   	"tags" 						=> explode(",",$obj->tags),
				   	"nature" 					=> $obj->nature,
				   	"status" 					=> $obj->status,
				   	"deleted" 					=> $obj->deleted,
				   	"is_system" 				=> $obj->is_system
			   	);
		    }	
		}
		
		$data["count"] = count($data["results"]);
		$this->response($data, 201);		
	}
	
	//PUT
	function ass_items_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;

		foreach ($models as $value) {			
			$obj = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			isset($value->company_id) 				? $obj->company_id 				= $value->company_id : "";
			isset($value->contact_id) 				? $obj->contact_id 				= $value->contact_id : "";			
			isset($value->currency_id) 				? $obj->currency_id 			= $value->currency_id : "";
			isset($value->item_type_id) 			? $obj->item_type_id			= $value->item_type_id : "";			
			isset($value->category_id) 				? $obj->category_id 			= $value->category_id : "";
			isset($value->item_group_id) 			? $obj->item_group_id 			= $value->item_group_id : "";
			isset($value->item_sub_group_id) 		? $obj->item_sub_group_id 		= $value->item_sub_group_id : "";
			isset($value->brand_id) 				? $obj->brand_id 				= $value->brand_id : "";
			isset($value->measurement_id) 			? $obj->measurement_id 			= $value->measurement_id : "";		
			isset($value->sub_of_id) 				? $obj->sub_of_id 				= $value->sub_of_id : "";
			isset($value->abbr) 					? $obj->abbr 					= $value->abbr : "";
			isset($value->number) 					? $obj->number 					= $value->number : "";
			isset($value->international_code) 		? $obj->international_code 		= $value->international_code : "";
			isset($value->imei) 					? $obj->imei 					= $value->imei : "";
			isset($value->serial_number) 			? $obj->serial_number 			= $value->serial_number : "";
			isset($value->supplier_code) 			? $obj->supplier_code 			= $value->supplier_code : "";
			isset($value->color_code) 				? $obj->color_code 				= $value->color_code : "";
		   	isset($value->name) 					? $obj->name 					= $value->name :  "";
		   	isset($value->purchase_description) 	? $obj->purchase_description 	= $value->purchase_description : "";
		   	isset($value->sale_description) 		? $obj->sale_description 		= $value->sale_description : "";
		   	isset($value->measurements) 			? $obj->measurements 			= $value->measurements : "";
		   	isset($value->barcode) 					? $obj->barcode 				= $value->barcode : "";
		   	isset($value->catalogs) 				? $obj->catalogs 				= implode(",",$value->catalogs) : "";
		   	isset($value->cost) 					? $obj->cost 					= $value->cost : "";
		   	isset($value->price) 					? $obj->price 					= $value->price : "";
		   	isset($value->amount) 					? $obj->amount 					= $value->amount : "";
		   	isset($value->rate) 					? $obj->rate 					= $value->rate : "";
		   	isset($value->locale) 					? $obj->locale 					= $value->locale : "";
		   	isset($value->on_hand) 					? $obj->on_hand 				= $value->on_hand : "";
		   	isset($value->on_po) 					? $obj->on_po 					= $value->on_po : "";
		   	isset($value->on_so) 					? $obj->on_so 					= $value->on_so : "";
		   	isset($value->order_point) 				? $obj->order_point 			= $value->order_point : "";
		   	isset($value->income_account_id) 		? $obj->income_account_id 		= $value->income_account_id : "";
		   	isset($value->expense_account_id) 		? $obj->expense_account_id 		= $value->expense_account_id : "";
		   	isset($value->inventory_account_id) 	? $obj->inventory_account_id 	= $value->inventory_account_id : "";
		   	isset($value->preferred_vendor_id) 		? $obj->preferred_vendor_id 	= $value->preferred_vendor_id : "";
		   	isset($value->image_url) 				? $obj->image_url				= $value->image_url : "";
		   	isset($value->favorite) 				? $obj->favorite 				= $value->favorite : "";
		   	isset($value->is_catalog) 				? $obj->is_catalog 				= $value->is_catalog : "";
		   	isset($value->is_assembly) 				? $obj->is_assembly 			= $value->is_assembly : "";
		   	isset($value->is_pattern) 				? $obj->is_pattern 				= $value->is_pattern : "";
		   	isset($value->tags) 					? $obj->tags 					= implode(",",$value->tags) : "";
		   	isset($value->nature) 					? $obj->nature 					= $value->nature : "";
		   	isset($value->status) 					? $obj->status 					= $value->status : "";	   	
		   	isset($value->deleted) 					? $obj->deleted 				= $value->deleted : "";

			if($obj->save()){
				$table = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$table->where("assembly_id", $obj->id)->get();
				$table->is_flat = 0;
				$table->currency_id = $value->currency_id;
				$table->type = "service";
				$table->unit = 0;
				$table->amount = $value->price;
				$table->usage = 0;
				$table->name = $obj->name;
				$table->account_id = $obj->income_account_id;
				$table->is_active = 1;
				$table->assembly_id = $obj->id;
				$table->save();			
				//Results
				$data["results"][] = array(
					"id" 						=> $obj->id,
					"company_id" 				=> $obj->company_id,
					"contact_id" 				=> $obj->contact_id,
					"currency_id" 				=> $obj->currency_id,
					"item_type_id"				=> $obj->item_type_id,					
					"category_id" 				=> $obj->category_id,
					"item_group_id"				=> $obj->item_group_id,
					"item_sub_group_id"			=> $obj->item_sub_group_id,
					"brand_id" 					=> $obj->brand_id,					
					"measurement_id" 			=> $obj->measurement_id,					
					"sub_of_id" 				=> $obj->sub_of_id,
					"abbr" 						=> $obj->abbr,
					"number" 					=> $obj->number,
					"international_code" 		=> $obj->international_code,
					"imei" 						=> $obj->imei,
					"serial_number" 			=> $obj->serial_number,
					"supplier_code"				=> $obj->supplier_code,
					"color_code" 				=> $obj->color_code,
				   	"name" 						=> $obj->name,
				   	"purchase_description" 		=> $obj->purchase_description,
				   	"sale_description" 			=> $obj->sale_description,
				   	"measurements"				=> $obj->measurements,
				   	"barcode"					=> $obj->barcode,
				   	"catalogs" 					=> explode(",",$obj->catalogs),				   	
				   	"cost" 						=> floatval($obj->cost),
				   	"price" 					=> floatval($obj->price),
				   	"amount" 					=> floatval($obj->amount),
				   	"rate" 						=> floatval($obj->rate),
				   	"locale" 					=> $obj->locale,
				   	"on_hand" 					=> floatval($obj->on_hand),
				   	"on_po" 					=> floatval($obj->on_po),
				   	"on_so" 					=> floatval($obj->on_so),
				   	"order_point" 				=> intval($obj->order_point),
				   	"income_account_id" 		=> $obj->income_account_id,
				   	"expense_account_id"		=> $obj->expense_account_id,
				   	"inventory_account_id"		=> $obj->inventory_account_id,
				   	"preferred_vendor_id" 		=> $obj->preferred_vendor_id,
				   	"image_url" 				=> $obj->image_url!="" ? $obj->image_url : $this->noImageUrl,
				   	"favorite" 					=> $obj->favorite=="true"?true:false,
				   	"is_catalog" 				=> $obj->is_catalog,
				   	"is_assembly" 				=> $obj->is_assembly,
				   	"is_pattern" 				=> intval($obj->is_pattern),
				   	"tags" 						=> explode(",",$obj->tags),
				   	"nature" 					=> $obj->nature,				  
				   	"status" 					=> $obj->status,
				   	"deleted" 					=> $obj->deleted,
				   	"is_system" 				=> $obj->is_system
				);						
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}
	
	//DELETE
	function ass_items_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);							
		}

		//Response data
		$this->response($data, 200);
	}
	//Load Center Summary
	function center_summary_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
				$amount_paid = 0;
				$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$paid->select_sum("amount");
				$paid->select_sum("discount");
				$paid->where("type", "Cash_Receipt");					
				$paid->where("reference_id", $value->id);
				$paid->where("deleted <>",1);
				$paid->get();
				$amount_paid = floatval($paid->amount) + floatval($paid->discount);
				$data["results"][] = array(
					"id" 				=> $value->id,
					"amount" 			=> floatval($value->amount),
					"deposit" 			=> floatval($value->deposit),
					"amount_paid" 		=> floatval($amount_paid),
					"rate" 				=> floatval($value->rate),
					"type"				=> $value->type,
				);
			}
		}

		//Response Data
		$this->response($data, 200);
	}
	//Auto Add Balance
	function auto_add_ballance_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {
			$meter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$meter->where("number", $value->meter_number)->limit(1)->get();
			if($meter->exists()){
				$con = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$con->where("id", $meter->contact_id)->limit(1)->get();
				$ar = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$ar->type = "Utility_Invoice";
				$ar->contact_id = $meter->contact_id;
				$ar->journal_type = "journal";
				$ar->is_journal = 1;
				$ar->meter_id = $meter->id;
				$ar->rate = 1.000000000000000;
				$ar->locale = $con->locale;
				$ar->due_date = date('Y-m-d');
				$ar->month_of = date('Y-m-d');
				$ar->location_id = $meter->location_id;
				$ar->number = "JV".$this->_generate_number($ar->type, date('Y-m-d'));
				$ar->issued_date = date('Y-m-d');
				$ar->amount = $value->amount;
				$ar->sub_total = $value->amount;
				$ar->status = 0;
				if($ar->save()) {
					$ar1 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$ar1->transaction_id = $ar->id;
					$ar1->account_id = $con->account_id;
					$ar1->description= "Utility Opening Balance";
					$ar1->contact_id = $ar->contact_id;
					$ar1->dr = isset($value->amount) ? $value->amount : 0;
					$ar1->cr = 0.00;
					$ar1->save();

					$ar2 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$ar2->transaction_id = $ar->id;
					$ar2->account_id = 70;
					$ar2->description= "Utility Opening Balance";
					$ar2->contact_id = $ar->contact_id;
					$ar2->dr = 0.00;
					$ar2->cr = isset($value->amount) ? $value->amount : 0;
					$ar2->save();
					$data["results"][] = array(
				   		"id" 						=> $ar->id,
				   	);
				}
			}
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}

	//
	function center_transaction_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$table = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
		$table->where('deleted', 0);
		$table->where('type','Utility_Invoice');

		//Results
		if($page && $limit){
			$table->get_paged_iterated($page, $limit);
			$data["count"] = $table->paged->total_rows;
		}else{
			$table->get_iterated();
			$data["count"] = $table->result_count();
		}
		if($table->exists()){
			foreach($table as $row) {
				$meter = [];
				$mtnumber = "";
				$mtorder = "";
				$mtid = "";
				$locale = $row->locale;
				$location = $row->location->get_raw();
				$invoiceLine = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$invoiceLine->where('transaction_id', $row->id);
				$invoiceLine->get();
				if($invoiceLine->exists()) {
					foreach($invoiceLine as $line) {
						if($line->type == "usage"){
							$meter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$meter->where("id", $line->item_id)->limit(1)->get();
							if($meter->exists()) {
								$plan = $meter->plan->get();
								$l = $plan->currency->get();
								$locale = $l->locale;
								$boxname = "";
								$polename = "";
								if($meter->box_id != 0){
									$box = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
									$box->where("id", $meter->box_id)->limit(1)->get();
									$boxname = $box->name;
								}
								if($meter->pole_id != 0){
									$pol = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
									$pol->where("id", $meter->pole_id)->limit(1)->get();
									$polename = $pol->name;
								}
								$meter = array(
									'meter_number'   => $meter->number,
									'meter_order'   => $meter->worder,
									'meter_multiplier'   => $meter->multiplier,
									'meter_id'   => $meter->id,
									'location' => $location->result(),
									'box' => $boxname,
									'pole' => $polename,
									'plan_locale' => $locale,
									'branch_id' => $meter->branch_id
								);
							}
						}
					}
				}

				// $items  = $row->winvoice_line->get();
				$items = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$items->where("transaction_id", $row->id);
				$items->get();

				$lines  = [];
				
				$usage = 0;
				$remain = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$remain->where("meter_id", $row->meter_id);
				$remain->where("type", "Utility_Invoice");
				$remain->where("month_of <=", $row->month_of);
				$remain->where("id <>", $row->id);
				$remain->where("deleted", 0);
				$remain->where("status <>", 1)->get_iterated();
				$amountOwed = 0;
				$fineAmount = 0;
				foreach($remain as $rem) {
					$fine = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$fine->where("transaction_id", $rem->id);
					$fine->where("type", "fine")->order_by("id", "desc")->limit(1)->get();
					if($fine->exists()){
						$dueDate = new DateTime($rem->due_date);
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
					$amountOwed += $rem->amount + $fineAmount;
					if($rem->status == 2) {
						$qu = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$qu->where("type", "Cash_Receipt");
						$qu->where("reference_id", $rem->id)->get();
						foreach($qu as $q){
							$amountOwed -= floatval($q->amount);
						};
					}
				}

				foreach($items as $item) {
					if($item->type == 'usage') {
						$record = $item->meter_record->include_related("meter", array("number"))->limit(1)->get();

						$usage = $record->usage;
						$lines[] = array(
							'number' => $record->meter_number,
							'previous' => floatval($record->previous),
							'current'  => floatval($record->current),
							'consumption' => floatval($record->usage),
							'rate' => floatval($item->rate),
							'amount' => floatval($item->amount),
							'type' => $item->type,
							'from_date' => $record->from_date,
							'to_date' => $record->to_date
						);
					}else if($item->type == 'exemption') {
						$unit = $item->item->limit(1)->get();
						$usage = $record->usage;
						$lines[] = array(
							'number' => $item->description,
							'previous' => floatval($record->previous),
							'current'  => floatval($record->current),
							'consumption' => floatval($record->usage),
							'rate' => floatval($item->rate),
							'amount' => floatval($item->amount),
							'type' => $item->type,
							'unit' => $unit->unit
						);
					}else if($item->type == 'installment') {
						if($item->amount != 0){
							$unit = $item->item->limit(1)->get();
							$usage = $record->usage;
							$lines[] = array(
								'number' => "រំលោះ",
								'previous' => floatval($record->previous),
								'current'  => floatval($record->current),
								'consumption' => floatval($record->usage),
								'rate' => floatval($item->rate),
								'amount' => floatval($item->amount),
								'type' => $item->type,
								'unit' => $unit->unit
							);
						}
					}else if($item->type == 'meter' || $item->type == 'reactive') {
						$meterdate = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$meterdate->where("id", $item->meter_record_id)->order_by("id", "desc")->limit(1)->get();
						$lines[] = array(
							'number' => $item->description,
							'previous' => floatval($meterdate->previous),
							'current'  => floatval($meterdate->current),
							'consumption' => floatval($meterdate->usage),
							'rate' => floatval($item->rate),
							'amount' => floatval($item->amount),
							'type' => $item->type,
							'from_date' => $meterdate->from_date,
							'to_date' => $meterdate->to_date
						);
					}else if($item->type == 'total_usage') {
						$lines[] = array(
							'number' => $item->description,
							'price' => floatval($item->price),
							'current'  => floatval($item->quantity),
							'consumption' => intval($item->amount),
							'rate' => floatval($item->meter_record_id),
							'amount' => intval($item->amount),
							'type' => $item->type,
							'unit' => 1
						);
					}else{
						$lines[] = array(
							'number' => $item->description,
							'previous' => floatval($item->previous),
							'current'  => floatval($item->current),
							'consumption' => floatval($item->quantity),
							'rate' => 0,
							'amount' => floatval($item->amount),
							'type' => $item->type
						);
					}
				}
				$monthGraph = "";
				if(empty($meter)){
					$meter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$meter->where("id", $row->meter_id)->limit(1)->get();
					if($meter->exists()) {
						$plan = $meter->plan->get();
						$l = $plan->currency->get();
						$locale = $l->locale;
						$boxname = "";
						if($meter->box_id != 0){
							$box = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$box->where("id", $meter->box_id)->limit(1)->get();
							$boxname = $box->name;
						}
						$meter = array(
							'meter_number'   => $meter->number,
							'meter_order'   => $meter->worder,
							'meter_multipier'   => $meter->multiplier,
							'meter_id'   => $meter->id,
							'location' => $location->result(),
							'box' => $boxname,
							'plan_locale' => $locale
						);
					}
				}
				$contact = $row->contact->get();
				$address = "";
				if(isset($contact->address) && $contact->address != NULL){
					$address = $contact->address;
				}else{
					$address = "";
				}
				$data["results"][] = array(
					'id' => $row->id,
					'type' => $row->type,
					'number' => $row->number,
					'print_count' => intval($row->print_count),
					'month_of' => date('m', strtotime($row->month_of)),
					'status'=> $row->status,
					'issue_date' => $row->issued_date,
					'due_date' => $row->due_date,
					'bill_date' => $row->bill_date,
					'amount'  => floatval($row->amount),
					'locale' => $locale,
					'consumption' => $usage,
					'formcolor' => '',
					// 'minusMonth' => $minusM,
					'contact' => array(
						'id' => $row->contact_id,
						'name' => $contact->name,
						'phone' => isset($contact->phone) ? $contact->phone : '',
						'abbr' => $contact->abbr,
						'number' => $contact->number,
						'address'=> $address
					),
					'amount_remain' => floatval($amountOwed),
					'meter'=> $meter,
					'invoice_lines'=> $lines
				);

			}
		}
		//Response Data
		$this->response($data, 200);
	}
	//Pay Installemnt
	function payinstallment_post() {
		$models = json_decode($this->post('models'));
		$data = array();
		foreach ($models as $value) {
			$ins = new Installemnt(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$ins->where("meter_id", $value->meter_id)->limit(1)->get();
			if($ins->exists()){
				if($value->deposit > 0){
					$this->deposit($value->deposit, $value->contact_id, $value->user_id);
				}

			}
			$ins->paid_in_full = 1;
			$ins->save();
			$meter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$meter->where("id", $value->meter_id)->limit(1)->get();

			$issueddate = new Date();
			$number = $this->_generate_number('Utility_Invoice', $value->issued_date);
			$month_of = "";
			$m = isset($issueddate) ? $issueddate : "";
			$d = new DateTime($m);
		    $d->modify('first day of this month');
		    $month_of = $d->format('Y-m-d');

			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			// $obj->company_id 		= $value->company_id;
			$obj->location_id 		= isset($value->location_id) ? $meter->location_id : 0;
			$obj->contact_id 		= isset($value->contact_id) ? $value->contact_id : "";
			$obj->payment_term_id	= isset($value->contact->payment_term_id) ? $value->payment_term_id : 0;
			$obj->payment_method_id = isset($value->contact->payment_method_id) ? $value->payment_method_id : 0;
			$obj->reference_id 		= isset($value->reference_id) ? $value->reference_id:0;
			$obj->account_id 		= isset($value->contact->account_id) ? $value->contact->account_id : "";
			$obj->biller_id 		= isset($value->biller_id) ? $value->biller_id : "";
		   	$obj->number 			= isset($number) ? $number : "";
		   	$obj->type 				= isset($value->type) ? $value->type : "";
		   	$obj->amount 			= isset($value->amount) ? $value->amount : "";
		   	$obj->rate 				= isset($value->rate) ? $value->rate : "";
		   	$obj->locale 			= isset($value->locale) ? $value->locale : "";
		   	$obj->month_of 			= $month_of;
		   	$obj->issued_date 		= isset($value->issued_date) ? $value->issued_date : "";
		   	$obj->bill_date 		= isset($value->bill_date) ? $value->bill_date : "";
		   	$obj->due_date 			= date('Y-m-d', strtotime($value->due_date));
		   	$obj->is_journal 		= 1;
		   	$obj->meter_id 			= isset($value->meter_id) ? $value->meter_id: "";
		   	$obj->status 			= 0;
		   	$obj->sub_total 		= isset($value->amount) ? $value->amount : "";
		   	$obj->pole_id 			= isset($value->pole_id) ? $value->pole_id : 0;
		   	$obj->box_id 			= isset($value->box_id) ? $value->box_id : 0;
		   	$obj->user_id 			= isset($value->biller_id) ? $value->biller_id : 0;
		   	$obj->sync 				= 1;
	   		if($obj->save()){
	   			//Temp total
	   			$totalsale = new Tmp_total_sale(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$totalsale->where("location_id", $obj->location_id);
	   			$totalsale->where("month_of", $month_of)->limit(1)->get();
	   			if($totalsale->exists()){
	   				$totalsale->amount += floatval($obj->amount);
	   				$totalsale->ending_ballance += floatval($obj->amount);
	   			}else{
	   				$totalsale->location_id = $obj->location_id;
	   				$totalsale->month_of = $month_of;
	   				$totalsale->amount += floatval($obj->amount);
	   				$totalsale->ending_ballance += floatval($obj->amount);
	   			}

	   			//Jounal
	   			$journal = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$journal->transaction_id 	= $obj->id;
	   			$journal->account_id 		= $value->contact->account_id;
	   			$journal->contact_id 		= $value->contact->id;
	   			$journal->dr  		 		= $obj->amount;
	   			$journal->description 		= "Utility Invoice";
	   			$journal->cr 		 		= 0.00;
	   			$journal->rate 		 		= $obj->rate;
	   			$journal->locale 	 		= $obj->locale;
	   			$journal->save();
	   			$journal2 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$journal2->transaction_id 	= $obj->id;
	   			$journal2->account_id 		= $value->contact->ra_id;
	   			$journal2->contact_id 		= $value->contact->id;
	   			$journal2->dr 		  		= 0.00;
	   			$journal2->cr 		  		= $obj->amount;
	   			$journal2->description 		= "Utility Invoice";
	   			$journal2->rate 	  		= $obj->rate;
	   			$journal2->locale 	  		= $obj->locale;
	   			$journal2->save();
	   			$invoice_lines = [];
		   		foreach ($value->invoice_lines as $row) {
		   			//Update Record
		   			if(isset($row->type) && $row->type == 'usage') {
		   				$record = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   				$record->where('id', $row->meter_record_id)->get();
		   				$record->invoiced = 1;
		   				$record->save();
		   			}
		   			//Update Record of reactive
		   			if(isset($row->type) && $row->type == 'reactive'){
		   				$rerecord = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   				$rerecord->where('id', $row->item_id)->get();
		   				$rerecord->invoiced = 1;
		   				$rerecord->save();
		   			}
		   			//Update Record Type Meter
		   			if(isset($row->type) && $row->type == 'meter'){
		   				$mrecord = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   				$mrecord->where('id', $row->meter_record_id)->get();
		   				$mrecord->invoiced = 1;
		   				$mrecord->save();
		   			}
		   			$line = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   			$line->transaction_id 	= $obj->id;
		   			$line->meter_record_id 	= isset($row->meter_record_id) ? $row->meter_record_id : "";
		   			$line->description 		= isset($row->description) ? $row->description : "Utility Invoice";
		   			$line->quantity 		= isset($row->quantity) ? $row->quantity: 0;
		   			$line->price 			= isset($row->price) ? $row->price : "";
		   			$line->amount 			= isset($row->amount) ? $row->amount : "";
		   			$line->rate 			= isset($row->rate) ? $row->rate : "";
		   			$line->locale 			= isset($row->locale) ? $row->locale : "";
		   			$line->has_vat 			= isset($row->has_vat) ? $row->has_vat : "";
		   			$line->type 			= isset($row->type)?$row->type:"";
		   			$line->item_id 			= isset($row->item_id)?$row->item_id:"";
		   			//Total Sale
		   			if($row->type == 'maintenance') {
		   				$totalsale->maintenance += floatval($row->amount);
		   			}elseif($row->type == 'exemption'){
		   				$totalsale->exemption += floatval($row->amount);
		   			}elseif($row->type == 'usage'){
		   				$totalsale->usage += intval($row->quantity);
		   			}
		   			if($row->type == 'installment') {
		   				//Update Installment Schedule Invoice = 1
						$updateInstallSchedule = new Installment_schedule(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$updateInstallSchedule->where('id', $row->item_id)->limit(1)->get();
						$updateInstallSchedule->invoiced = 1;
						$updateInstallSchedule->sync = 2;
						$updateInstallSchedule->save();
						//Total Sale
						$totalsale->installment += floatval($updateInstallSchedule->amount);
		   			}
		   			//to do: add to accouting line
		   			$updateInstallSchedule = isset($updateInstallSchedule) ? $updateInstallSchedule : "";
		   			if($line->save()){
		   				$invoice_lines[] = array(
		   					"id" 				=> $line->id,
		   					"invoice_id"		=> $line->invoice_id,
				   			"item_id"			=> $line->item_id,
				   			"measurement_id" 	=> isset($line->measurement_id)?$line->measurement_id:0,
				   			"meter_record_id" 	=> $line->meter_record_id,
				   			"description" 		=> $line->description,
				   			"quantity"			=> $line->quantity,
				   			"price" 			=> floatval($line->price),
				   			"amount" 			=> floatval($line->amount),
				   			"rate"				=> floatval($line->rate),
				   			"locale" 			=> $line->locale,
				   			"has_vat" 			=> $line->has_vat=="true"?true:false,
				   			"type" 				=> $line->type,
				   			"installment" 		=> $updateInstallSchedule
		   				);
		   			}
		   		}
			   	$data["results"][] = array(
			   		"id" 				=> $obj->id,
			   	);
		    }		
		}
		$count = count($data);
		if($count > 0) {
			$this->response(array("results" => $data), 201);
		} else {
			$this->response(array("results" => array()), 401);
		}			
	}
	public function deposit($amount, $contact, $userid){
		$con = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$con->where("id", $contact)->limit(1)->get();
		if($con->exists()){
			$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$txn->contact_id = $contact;
			$txn->payment_term_id = 5;
			$txn->transaction_template_id = 7;
			$txn->account_id = 55;
			$txn->user_id = $userid;
			$issueddate = new Date();
			$txn->number = $this->_generate_number("Customer_Deposit", $issueddate);
			$txn->type = 'Customer_Deposit';
			$txn->status = 0;
			$txn->amount = $amount;
			$txn->rate = 1;
			$txn->locale = $con->locale;
			$txn->issued_date = $issueddate;
			$txn->start_date = $issueddate;
			$txn->frequency = 'Daily';
			$txn->month_option = 'Day';
			$txn->interval = 1;
			$txn->day = 1;
			$txn->is_journal = 1;
			if($txn->save()){
				$j1 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$j1->transaction_id = $txn->id;
				$j1->account_id = 7;
				$j1->contact_id = $txn->contact_id;
				$j1->dr = $txn->amount;
				$j1->cr = 0;
				$j1->description = 'UtiBill Deposit';
				$j1->rate = $txn->rate;
				$j1->locale = $txn->locale;
				$j1->save();

				$j2 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$j2->transaction_id = $txn->id;
				$j2->account_id = 55;
				$j1->contact_id = $txn->contact_id;
				$j2->cr = $txn->amount;
				$j2->dr = 0;
				$j2->description = 'UtiBill Deposit';
				$j2->rate = $txn->rate;
				$j2->locale = $txn->locale;
				$j2->save();
			}
		}
	}

	//
	function installment_report_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;

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
		if(!empty($filter["filters"]) && isset($filter["filters"])){
	    	foreach ($filter["filters"] as $value) {
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
		}else{
			$obj->get_iterated();
		}

		if($obj->exists()){
			foreach ($obj as $value) {
				$con = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$con->where("id", $value->contact_id)->limit(1)->get();
				$ins = new Installment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$ins->where("meter_id", $value->id)->limit(1)->get();
				if($ins->exists()){
					$ins_sch = new Installment_schedule(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$ins_sch->where("installment_id", $ins->id)->get();
					$monthpaid = 0;
					$apm = 0;
					$i = 1;
					foreach($ins_sch as $sch){
						if($sch->invoiced == 1){
							$monthpaid += 1;
						}
						if($i == 1){
							$apm = $sch->amount;
						}
						$i++;
					}
					$data["results"][] = array(
						"id" 				=> $value->id,
						"customer" 			=> $con->name,
						"meter_number" 		=> $value->number,
						"month_to_pay" 		=> intval($ins->period),
						"month_paid"		=> intval($monthpaid),
						"amount_paid_month"	=> floatval($apm),
						"amount_paid"		=> floatval($apm * $monthpaid),
						"amount"			=> floatval($ins->amount),
					);
					$data["count"] += 1;
				}
			}
		}

		//Response Data
		$this->response($data, 200);
	}

	//for customer
	function change_number_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {
			$con = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$con->where("id", $value->contact_id)->limit(1)->get();
			$con->number = isset($value->number) ? $value->number : "";
			$con->save();
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
}
/* End of file meters.php */
/* Location: ./application/controllers/api/utibills.php */