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
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
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
					$fine = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$fine->where("transaction_id", $value->id);
					$fine->where("type", "fine")->order_by("id", "desc")->limit(1)->get();
					if($fine->exists()){
						$dueDate = new DateTime($value->due_date);
						$fineDate = new DateTime(date('Y-m-d'));
						$fineDate = $fineDate->diff($dueDate)->days;
						$fineDateAmount = intval($fine->usage);
						if($fineDate >= $fineDateAmount){
							$fineAmount = floatval($fine->amount);
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
						$fineAmount = 0;
						if($relate->status == 0){
							$fine = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$fine->where("transaction_id", $relate->id);
							$fine->where("type", "fine")->order_by("id", "desc")->limit(1)->get();
							if($fine->exists()){
								$dueDate = new DateTime($relate->due_date);
								$fineDate = new DateTime(date('Y-m-d'));
								$fineDate = $fineDate->diff($dueDate)->days;
								$fineDateAmount = intval($fine->usage);
								if($fineDate >= $fineDateAmount){
									$fineAmount = floatval($fine->amount);
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
	   			if(($oldtran->amount + $value->amount_fine) - ($obj->amount + $obj->discount) == 0){
	   				$oldtran->status = 1;
	   			}else{
	   				$oldtran->status = 2;
	   			}
	   			$oldtran->fine = $value->amount_fine;
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
	function contact_get(){
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