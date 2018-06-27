<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Transactions extends REST_Controller {
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

	//TO FILTER UNWANTED DATA, PLEASE USE THESE CODE BELLOW:
	// $obj->where("is_recurring <>", 1);
	// $obj->where("deleted <>", 1);

	function run_get() {
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->where_related("contact", "locale", "km-KH");
		$obj->where("locale", "en-US");
		$obj->get_iterated();
		// $data["results"] = $obj->get_raw()->result();

		$ids = [];
		foreach ($obj as $value) {
			array_push($ids, $value->id);

			$txns = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$txns->get_by_id($value->id);

			$txns->locale = "km-KH";
			$txns->rate = 4000;
			$txns->save();
		}
		
		$data["count"] = count($data["results"]);
		$data["ids"] = $ids;

		$this->response($data, 200);
	}

	function test_get() {
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->where('id', 679)->get();

		$delTxn = $obj->transaction->get();
		$data["results"] = $obj->delete($delTxn->all);

		// $data["results"] = $obj->transaction->get_raw()->result();

		// $txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		// $txn->where_in('id', array(664,665))->get();

		// $data["results"] = $obj->save($txn->all);
				
		
		$this->response($data, 200);
	}

	//GET
	function index_get() {
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
					if($value['operator']=="startswith"){
	    				$obj->like($value['field'], $value['value'], 'after');
	    			}else if($value['operator']=="contains"){
	    				$obj->like($value['field'], $value['value'], 'both');
	    			}else{
						$obj->{$value['operator']}($value['field'], $value['value']);
	    			}
				} else {
					if($value["field"]=="is_recurring"){
	    				$is_recurring = $value["value"];
	    			}else{
	    				$obj->where($value["field"], $value["value"]);
	    			}
				}
			}
		}

		$obj->include_related("contact", array("abbr","number","name","payment_term_id","payment_method_id","credit_limit","locale","bill_to","ship_to","deposit_account_id","trade_discount_id","settlement_discount_id","account_id","ra_id"));
		$obj->include_related("job", array("name"));
		$obj->where("is_recurring", $is_recurring);
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
				//Sum amount paid
				$amount_paid = 0;
				if($value->type=="Commercial_Invoice" || $value->type=="Vat_Invoice" || $value->type=="Invoice" || $value->type=="Credit_Purchase" || $value->type=="Utility_Invoice"){
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$paid->select_sum("amount");
					$paid->select_sum("discount");
					$paid->where_in("type", array("Cash_Receipt", "Offset_Invoice", "Cash_Payment", "Offset_Bill"));					
					$paid->where("reference_id", $value->id);
					$paid->where("is_recurring <>",1);
					$paid->where("deleted <>",1);
					$paid->get();
					$amount_paid = floatval($paid->amount) + floatval($paid->discount);
				}else if($value->type=="Cash_Advance"){
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$paid->select_sum("amount");
					$paid->select_sum("received");
					$paid->where("type", "Advance_Settlement");
					$paid->where("reference_id", $value->id);
					$paid->where("is_recurring <>",1);
					$paid->where("deleted <>",1);
					$paid->get();
					$amount_paid = floatval($paid->amount) + floatval($paid->received);
				}

				//Single Reference
				$reference = [];
				if($value->reference_id>0){
					$references = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$references->include_related("job", array("name"));
					$references->select("account_id, number, type, amount, deposit, rate, issued_date");
					$references->get_by_id($value->reference_id);

					$ref_amount_paid = 0;
					if($references->type=="Commercial_Invoice" || $references->type=="Vat_Invoice" || $references->type=="Invoice" || $references->type=="Credit_Purchase" || $references->type=="Utility_Invoice"){
						$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$paid->select_sum("amount");
						$paid->select_sum("discount");
						$paid->where_in("type", array("Cash_Receipt", "Offset_Invoice", "Cash_Payment", "Offset_Bill"));					
						$paid->where("reference_id", $value->reference_id);
						$paid->where("is_recurring <>",1);
						$paid->where("deleted <>",1);
						$paid->get();
						$ref_amount_paid = floatval($paid->amount) + floatval($paid->discount);
					}else if($references->type=="Cash_Advance"){
						$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$paid->select_sum("amount");
						$paid->select_sum("received");
						$paid->where("type", "Advance_Settlement");
						$paid->where("reference_id", $value->reference_id);
						$paid->where("is_recurring <>",1);
						$paid->where("deleted <>",1);
						$paid->get();
						$ref_amount_paid = floatval($paid->amount) + floatval($paid->received);
					}

					$reference[] = array(
						"id" 			=> $value->reference_id,
						"number" 		=> $references->number,
						"type" 			=> $references->type,
						"amount" 		=> $references->amount,
						"deposit" 		=> $references->deposit,
						"rate" 			=> $references->rate,
						"issued_date" 	=> $references->issued_date,
						"account_id" 	=> $references->account_id,
						"amount_paid" 	=> $ref_amount_paid,
						"job" 			=> $references->job_name
					);
				}

				//Offset Invoice
				$offsetInvoice = [];
				$offsetInvoices = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$offsetInvoices->select("id, number, type, amount, deposit, rate, issued_date");
				$offsetInvoices->where("return_id", $value->id);
				$offsetInvoices->get();

				if($offsetInvoices->exists()){
					foreach ($offsetInvoices as $val) {
						$referenceOffsets = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$referenceOffsets->select("number, type, amount, deposit, rate, issued_date");
						$referenceOffsets->where("id", $val->reference_id);
						$referenceOffset = $referenceOffsets->get_raw()->result();

						$offsetInvoice[] = array(
							"id" 			=> $val->id,
							"reference_id" 	=> $val->reference_id,
							"number" 		=> $val->number,
							"type" 			=> $val->type,
							"amount" 		=> $val->amount,
							"deposit" 		=> $val->deposit,
							"rate" 			=> $val->rate,
							"issued_date" 	=> $val->issued_date,
							"references" 	=> $referenceOffset
						);
					}
				}

				//Meter By Choeun
				$meter = "";
				$meterNum = "";
				if($value->meter_id != 0){
					$meter = $value->meter->get();
					$meterNum = $meter->get()->number;
				}

				//Contact
				$contact = array(
					"id" 						=> $value->contact_id,
					"abbr"						=> $value->contact_abbr ? $value->contact_abbr : "",
					"number"					=> $value->contact_number ? $value->contact_number : "",
					"name"						=> $value->contact_name ? $value->contact_name : "",
					"payment_term_id"			=> $value->contact_payment_term_id ? $value->contact_payment_term_id : 0,
					"payment_method_id"			=> $value->contact_payment_method_id ? $value->contact_payment_method_id : 0,
					"credit_limit"				=> $value->contact_credit_limit ? $value->contact_credit_limit : 0,
					"locale"					=> $value->contact_locale ? $value->contact_locale : "",
					"bill_to"					=> $value->contact_bill_to ? $value->contact_bill_to : "",
					"ship_to"					=> $value->contact_ship_to ? $value->contact_ship_to : "",
					"deposit_account_id"		=> $value->contact_deposit_account_id ? $value->contact_deposit_account_id : 0,
					"trade_discount_id"			=> $value->contact_trade_discount_id ? $value->contact_trade_discount_id : 0,
					"settlement_discount_id"	=> $value->contact_settlement_discount_id ? $value->contact_settlement_discount_id : 0,
					"account_id"				=> $value->contact_account_id ? $value->contact_account_id : 0,
					"ra_id"						=> $value->contact_ra_id ? $value->contact_ra_id : 0
				);

				//Employee
				$employee = [];
				if($value->employee_id>0){
					$employies = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$employies->select("abbr, number, name, salary_account_id");
					$employies->get_by_id($value->employee_id);

					$employee = array(
						"id" 				=> $value->employee_id,
						"abbr" 				=> $employies->abbr,
						"number" 			=> $employies->number,
						"name" 				=> $employies->name,
						"salary_account_id"	=> $employies->salary_account_id
					);
				}

				//Driver
				$driver = [];
				if($value->driver_id>0){
					$drivers = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$drivers->select("abbr, number, name");
					$drivers->get_by_id($value->driver_id);

					$driver = array(
						"id" 				=> $value->driver_id,
						"abbr" 				=> $drivers->abbr,
						"number" 			=> $drivers->number,
						"name" 				=> $drivers->name
					);
				}

				$data["results"][] = array(
					"id" 						=> $value->id,
					"company_id" 				=> $value->company_id,
					"location_id" 				=> $value->location_id,
					"contact_id" 				=> intval($value->contact_id),
					"payment_term_id" 			=> $value->payment_term_id,
					"payment_method_id" 		=> intval($value->payment_method_id),
					"transaction_template_id" 	=> $value->transaction_template_id,
					"reference_id" 				=> intval($value->reference_id),
					"recurring_id" 				=> $value->recurring_id,
					"return_id" 				=> $value->return_id,
					"job_id" 					=> $value->job_id,
					"account_id" 				=> intval($value->account_id),
					"discount_account_id" 		=> intval($value->discount_account_id),
					"item_id" 					=> $value->item_id,
					"tax_item_id" 				=> $value->tax_item_id,
					"wht_account_id"			=> $value->wht_account_id,
					"user_id" 					=> $value->user_id,
					"employee_id" 				=> $value->employee_id,
				   	"number" 					=> $value->number,
				   	"type" 						=> $value->type,
				   	"sub_type" 					=> $value->sub_type,
				   	"nature_type" 				=> $value->nature_type,
				   	"journal_type" 				=> $value->journal_type,
				   	"sub_total"					=> floatval($value->sub_total),
				   	"discount" 					=> floatval($value->discount),
				   	"tax" 						=> floatval($value->tax),
				   	"amount" 					=> floatval($value->amount),
				   	"fine" 						=> floatval($value->fine),
				   	"deposit"					=> floatval($value->deposit),
				   	"remaining" 				=> floatval($value->remaining),
				   	"received" 					=> floatval($value->received),
				   	"change" 					=> floatval($value->change),
				   	"credit_allowed"			=> floatval($value->credit_allowed),
				   	"additional_cost" 			=> floatval($value->additional_cost),
				   	"additional_apply" 			=> $value->additional_apply,
				   	"rate" 						=> floatval($value->rate),
				   	"movement" 					=> floatval($value->movement),
				   	"locale" 					=> $value->locale,
				   	"month_of"					=> $value->month_of,
				   	"issued_date"				=> $value->issued_date,
				   	"bill_date"					=> $value->bill_date,
				   	"payment_date" 				=> $value->payment_date,
				   	"due_date" 					=> $value->due_date,
				   	"deposit_date" 				=> $value->deposit_date,
				   	"check_no" 					=> $value->check_no,
				   	"reference_no" 				=> $value->reference_no,
				   	"segments" 					=> $value->segments!="" ? array_map('intval', explode(",", $value->segments)) : [],
				   	"segmentitems" 				=> $value->segmentitem->include_related("segment", array("name"))->get_raw()->result(),
				   	"driver_name" 				=> $value->driver_name,
				   	"bill_to" 					=> $value->bill_to,
				   	"ship_to" 					=> $value->ship_to,
				   	"memo" 						=> $value->memo,
				   	"memo2" 					=> $value->memo2,
				   	"note" 						=> $value->note,
				   	"recurring_name" 			=> $value->recurring_name,
				   	"start_date"				=> $value->start_date,
				   	"frequency"					=> $value->frequency,
					"month_option"				=> $value->month_option,
					"interval" 					=> $value->interval,
					"day" 						=> $value->day,
					"week" 						=> $value->week,
					"month" 					=> $value->month,
				   	"reuse" 					=> intval($value->reuse),
				   	"status" 					=> intval($value->status),
				   	"progress" 					=> $value->progress,
				   	"is_recurring" 				=> intval($value->is_recurring),
				   	"is_journal" 				=> $value->is_journal,
				   	"print_count" 				=> $value->print_count,
				   	"printed_by" 				=> $value->printed_by,
				   	"deleted" 					=> $value->deleted,
				   	"meter"						=> $meterNum,
				   	"meter_id"					=> $value->meter_id,
				   	"amount_paid"				=> $amount_paid,

				   	"truck_number"				=> $value->truck_number,
				   	"driver_id"					=> $value->driver_id,
				   	"time_batched"				=> $value->time_batched,
				   	"time_of_discharge"			=> $value->time_of_discharge,
				   	"time_of_completion"		=> $value->time_of_completion,
				   	"cubic_meter"				=> $value->cubic_meter,
				   	"total_batch"				=> $value->total_batch,

				   	"contact" 					=> $contact,
				   	"employee" 					=> $employee,
				   	"job" 						=> $value->job_name,
				   	"driver" 					=> $driver,
				   	"reference" 				=> $reference,
				   	"references" 				=> $value->transaction->get_raw()->result(),
				   	"offset_invoice" 			=> $offsetInvoice
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
			isset($value->discount_account_id) 		? $obj->discount_account_id 		= $value->discount_account_id : "";
			isset($value->item_id) 					? $obj->item_id 					= $value->item_id : "";
			isset($value->tax_item_id) 				? $obj->tax_item_id 				= $value->tax_item_id : "";
			isset($value->wht_account_id) 			? $obj->wht_account_id 				= $value->wht_account_id : "";
			isset($value->user_id) 					? $obj->user_id 					= $value->user_id : "";
			isset($value->employee_id) 				? $obj->employee_id 				= $value->employee_id : "";
			$obj->number = $number;
		   	isset($value->type) 					? $obj->type 						= $value->type : "";
		   	isset($value->sub_type) 				? $obj->sub_type 					= $value->sub_type : "";
		   	isset($value->nature_type) 				? $obj->nature_type 				= $value->nature_type : "";
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
		   	isset($value->movement) 				? $obj->movement 					= $value->movement : "";
		   	isset($value->locale) 					? $obj->locale 						= $value->locale : "";
		   	isset($value->month_of) 				? $obj->month_of 					= $value->month_of : "";
		   	isset($value->issued_date) 				? $obj->issued_date 				= $value->issued_date : "";
		   	isset($value->bill_date) 				? $obj->bill_date 					= $value->bill_date : "";
		   	isset($value->payment_date) 			? $obj->payment_date 				= $value->payment_date : "";
		   	isset($value->due_date) 				? $obj->due_date 					= $value->due_date : "";
		   	isset($value->deposit_date) 			? $obj->deposit_date 				= $value->deposit_date : "";
		   	isset($value->check_no) 				? $obj->check_no 					= $value->check_no : "";
		   	isset($value->reference_no) 			? $obj->reference_no 				= $value->reference_no : "";
		   	// isset($value->references) 				? $obj->references 					= implode(",", $value->references) : "";
		   	isset($value->segments) 				? $obj->segments 					= implode(",", $value->segments) : "";
		   	isset($value->driver_name) 				? $obj->driver_name 				= $value->driver_name : "";
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
		   	isset($value->reuse) 					? $obj->reuse 						= $value->reuse : "";
		   	isset($value->status) 					? $obj->status 						= $value->status : "";
		   	isset($value->progress) 				? $obj->progress 					= $value->progress : "";
		   	isset($value->is_recurring) 			? $obj->is_recurring 				= $value->is_recurring : "";
		   	isset($value->is_journal) 				? $obj->is_journal 					= $value->is_journal : "";
		   	isset($value->print_count) 				? $obj->print_count 				= $value->print_count : "";
		   	isset($value->printed_by) 				? $obj->printed_by 					= $value->printed_by : "";
		   	isset($value->deleted) 					? $obj->deleted 					= $value->deleted : "";
		   	isset($value->meter_id) 				? $obj->meter_id 					= $value->meter_id : "";

		   	isset($value->truck_number) 			? $obj->truck_number 				= $value->truck_number : "";		   	
		   	isset($value->time_batched) 			? $obj->time_batched 				= $value->time_batched : "";
		   	isset($value->time_of_discharge) 		? $obj->time_of_discharge 			= $value->time_of_discharge : "";
		   	isset($value->time_of_completion) 		? $obj->time_of_completion 			= $value->time_of_completion : "";
		   	isset($value->cubic_meter) 				? $obj->cubic_meter 				= $value->cubic_meter : "";
		   	isset($value->total_batch) 				? $obj->total_batch 				= $value->total_batch : "";
		   	
		   	$related = [];

		   	//References
   			if(isset($value->references)){
	   			$ids = [];
	   			foreach ($value->references as $val) {
		   			array_push($ids, $val->id);
	   			}
	   			//Update references status
	   			if(count($ids)>0){
		   			$referenceUpdate = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   				$referenceUpdate->where_in("id", $ids);
	   				$referenceUpdate->update("status", 1);

	   				$referenceTxn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   				$referenceTxn->where_in("id", $ids);
	   				$referenceTxn->get();

	   				array_push($related, $referenceTxn->all);
   				}
			}
		   	
		   	//Segments
			if(isset($value->segments)){
				if(count($value->segments)>0){
					$segmentTxn = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$segmentTxn->where_in("id", $value->segments)->get();
					array_push($related, $segmentTxn->all);
				}
			}			

			$contact = [];
			if(isset($value->contact)){
				$contact = $value->contact;
			}

			//Driver
			if(isset($value->driver)){
				$obj->driver_id = $value->driver->id;
			}else{
				isset($value->driver_id) ? $obj->driver_id 	= $value->driver_id : "";
			}

	   		if($obj->save($related)){
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
					"account_id" 				=> intval($obj->account_id),
					"discount_account_id" 		=> intval($obj->discount_account_id),
					"item_id" 					=> $obj->item_id,
					"tax_item_id" 				=> $obj->tax_item_id,
					"wht_account_id"			=> $obj->wht_account_id,
					"user_id" 					=> $obj->user_id,
					"employee_id" 				=> $obj->employee_id,
					"number" 					=> $obj->number,
				   	"type" 						=> $obj->type,
				   	"sub_type" 					=> $obj->sub_type,
				   	"nature_type" 				=> $obj->nature_type,
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
				   	"movement" 					=> $obj->movement,
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
				   	"driver_name" 				=> $obj->driver_name,
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
					"reuse" 					=> intval($obj->reuse),
				   	"status" 					=> intval($obj->status),
				   	"progress" 					=> $obj->progress,
				   	"is_recurring" 				=> floatval($obj->is_recurring),
				   	"is_journal" 				=> $obj->is_journal,
				   	"print_count" 				=> $obj->print_count,
				   	"printed_by" 				=> $obj->printed_by,
				   	"deleted" 					=> $obj->deleted,
				   	"meter_id"					=> $obj->meter_id,
				   	"amount_paid"				=> 0,

				   	"truck_number"				=> $obj->truck_number,
				   	"driver_id"					=> $obj->driver_id,
				   	"time_batched"				=> $obj->time_batched,
				   	"time_of_discharge"			=> $obj->time_of_discharge,
				   	"time_of_completion"		=> $obj->time_of_completion,
				   	"cubic_meter"				=> $obj->cubic_meter,
				   	"total_batch"				=> $obj->total_batch,

				   	"contact" 					=> $contact,
				   	"driver" 					=> []
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
			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);			

			isset($value->company_id) 				? $obj->company_id 					= $value->company_id : "";
			isset($value->location_id) 				? $obj->location_id 				= $value->location_id : "";
			isset($value->contact_id) 				? $obj->contact_id 					= $value->contact_id : "";
			isset($value->payment_term_id) 			? $obj->payment_term_id 			= $value->payment_term_id : "";
			isset($value->payment_method_id) 		? $obj->payment_method_id 			= $value->payment_method_id : "";
			isset($value->transaction_template_id) 	? $obj->transaction_template_id 	= $value->transaction_template_id : "";
			isset($value->reference_id) 			? $obj->reference_id 				= $value->reference_id : "";
			isset($value->recurring_id) 			? $obj->recurring_id 				= $value->recurring_id : "";
			isset($value->return_id) 				? $obj->return_id 					= $value->return_id : "";
			isset($value->job_id) 					? $obj->job_id 						= $value->job_id : "";
			isset($value->account_id) 				? $obj->account_id 					= $value->account_id : "";
			isset($value->discount_account_id) 		? $obj->discount_account_id 		= $value->discount_account_id : "";
			isset($value->item_id) 					? $obj->item_id 					= $value->item_id : "";
			isset($value->tax_item_id) 				? $obj->tax_item_id 				= $value->tax_item_id : "";
			isset($value->wht_account_id) 			? $obj->wht_account_id 				= $value->wht_account_id : "";
			isset($value->user_id) 					? $obj->user_id 					= $value->user_id : "";
			isset($value->employee_id) 				? $obj->employee_id 				= $value->employee_id : "";
			isset($value->number) 					? $obj->number 						= $value->number : "";
		   	isset($value->type) 					? $obj->type 						= $value->type : "";
		   	isset($value->sub_type) 				? $obj->sub_type 					= $value->sub_type : "";
		   	isset($value->nature_type) 				? $obj->nature_type 				= $value->nature_type : "";
		   	isset($value->journal_type) 			? $obj->journal_type 				= $value->journal_type : "";
		   	isset($value->sub_total) 				? $obj->sub_total 					= $value->sub_total : "";
		   	isset($value->nature_total) 			? $obj->nature_total 				= $value->nature_total : "";
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
		   	isset($value->movement) 				? $obj->movement 					= $value->movement : "";
		   	isset($value->locale) 					? $obj->locale 						= $value->locale : "";
		   	isset($value->month_of) 				? $obj->month_of 					= $value->month_of : "";
		   	isset($value->issued_date) 				? $obj->issued_date 				= $value->issued_date : "";
		   	isset($value->bill_date) 				? $obj->bill_date 					= $value->bill_date : "";
		   	isset($value->payment_date) 			? $obj->payment_date 				= $value->payment_date : "";
		   	isset($value->due_date) 				? $obj->due_date 					= $value->due_date : "";
		   	isset($value->deposit_date) 			? $obj->deposit_date 				= $value->deposit_date : "";
		   	isset($value->check_no) 				? $obj->check_no 					= $value->check_no : "";
		   	isset($value->reference_no) 			? $obj->reference_no 				= $value->reference_no : "";
		   	// isset($value->references) 				? $obj->references 					= implode(",", $value->references) : "";
		   	isset($value->segments) 				? $obj->segments 					= implode(",", $value->segments) : "";
		   	isset($value->driver_name) 				? $obj->driver_name 				= $value->driver_name : "";
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
		   	isset($value->reuse) 					? $obj->reuse 						= $value->reuse : "";
		   	isset($value->status) 					? $obj->status 						= $value->status : "";
		   	isset($value->progress) 				? $obj->progress 					= $value->progress : "";
		   	isset($value->is_recurring) 			? $obj->is_recurring 				= $value->is_recurring : "";
		   	isset($value->is_journal) 				? $obj->is_journal 					= $value->is_journal : "";
		   	isset($value->print_count) 				? $obj->print_count 				= $value->print_count : "";
		   	isset($value->printed_by) 				? $obj->printed_by 					= $value->printed_by : "";
		   	isset($value->deleted) 					? $obj->deleted 					= $value->deleted : "";
		   	isset($value->meter_id) 				? $obj->meter_id 					= $value->meter_id : "";

		   	isset($value->truck_number) 			? $obj->truck_number 				= $value->truck_number : "";
		   	isset($value->driver_id) 				? $obj->driver_id 					= $value->driver_id : "";
		   	isset($value->time_batched) 			? $obj->time_batched 				= $value->time_batched : "";
		   	isset($value->time_of_discharge) 		? $obj->time_of_discharge 			= $value->time_of_discharge : "";
		   	isset($value->time_of_completion) 		? $obj->time_of_completion 			= $value->time_of_completion : "";
		   	isset($value->cubic_meter) 				? $obj->cubic_meter 				= $value->cubic_meter : "";
		   	isset($value->total_batch) 				? $obj->total_batch 				= $value->total_batch : "";

		   	$contact = [];
			if(isset($value->contact)){
				$contact = $value->contact;
			}

		   	$related = [];

		   	//References
			if(isset($value->references)){
				$ids = [];
				foreach ($value->references as $val) {
					array_push($ids, $val->id);
				}

				if(count($ids)>0){
					//Remove previouse segments
			   		$referenceDel = $obj->transaction->get();
			   		$refDelIds = [];
			   		foreach ($referenceDel as $refDel) {
			   			array_push($refDelIds, $refDel->id);
			   		}			   		
			   		$obj->delete($referenceDel->all);
			   		//Reverse reference status
			   		$refDowndate = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   				$refDowndate->where_in("id", $refDelIds);
	   				$refDowndate->update("status", 0);

			   		//Update references status
		   			if(count($ids)>0){
			   			$referenceUpdate = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   				$referenceUpdate->where_in("id", $ids);
		   				$referenceUpdate->update("status", 1);

		   				$referenceTxn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   				$referenceTxn->where_in("id", $ids);
		   				$referenceTxn->get();

		   				array_push($related, $referenceTxn->all);
	   				}
			   	}
			}

			//Segments
			if(isset($value->segments)){
				if(count($value->segments)>0){
					//Remove previouse segments
			   		$segmentDel = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			   		$segmentDel->transaction->get();
			   		$obj->delete($segmentDel->all);

			   		//Add new segments
			   		$segmentTxn = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			   		$segmentTxn->where_in("id", $value->segments)->get();

			   		array_push($related, $segmentTxn->all);
			   	}
			}

			if($obj->save($related)){
				//Results
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
					"account_id" 				=> intval($obj->account_id),
					"discount_account_id" 		=> intval($obj->discount_account_id),
					"item_id" 					=> $obj->item_id,
					"tax_item_id" 				=> $obj->tax_item_id,
					"wht_account_id"			=> $obj->wht_account_id,
					"user_id" 					=> $obj->user_id,
					"employee_id" 				=> $obj->employee_id,
					"number" 					=> $obj->number,
				   	"type" 						=> $obj->type,
				   	"sub_type" 					=> $obj->sub_type,
				   	"nature_type" 				=> $obj->nature_type,
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
				   	"movement" 					=> $obj->movement,
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
				   	"driver_name" 				=> $obj->driver_name,
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
					"reuse" 					=> intval($obj->reuse),
				   	"status" 					=> intval($obj->status),
				   	"progress" 					=> $obj->progress,
				   	"is_recurring" 				=> floatval($obj->is_recurring),
				   	"is_journal" 				=> $obj->is_journal,
				   	"print_count" 				=> $obj->print_count,
				   	"printed_by" 				=> $obj->printed_by,
				   	"deleted" 					=> $obj->deleted,
				   	"meter_id"					=> $obj->meter_id,
				   	"amount_paid"				=> 0,

				   	"truck_number"				=> $obj->truck_number,
				   	"driver_id"					=> $obj->driver_id,
				   	"time_batched"				=> $obj->time_batched,
				   	"time_of_discharge"			=> $obj->time_of_discharge,
				   	"time_of_completion"		=> $obj->time_of_completion,
				   	"cubic_meter"				=> $obj->cubic_meter,
				   	"total_batch"				=> $obj->total_batch,

				   	"contact" 					=> $contact,
				   	"driver" 					=> []
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
			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
		}

		//Response data
		$this->response($data, 200);
	}

	//GET NUMBER
	function number_get() {
		$filter 	= $this->get("filter");
		$data["results"] = [];
		$data["count"] = 0;

		$connection = 'use ' . $this->_database;
		$this->db->query($connection);

		//Filter
		if(!empty($filter["filters"]) && isset($filter["filters"])){
	    	foreach ($filter["filters"] as $value) {
	    		$this->db->where($value["field"], $value["value"]); 
			}
		}

		$this->db->select("(SELECT SUBSTRING(number, -5)) AS number", FALSE);
		$this->db->order_by("number", "desc");
		$this->db->limit(1); 
		$query = $this->db->get('transactions');

		$data["results"] = $query->result();
				
		
		$this->response($data, 200);
	}

	//GET BATCH NUMBER
	function batch_number_get() {
		$filter 	= $this->get("filter");
		$data["results"] = [];
		$data["count"] = 0;

		$connection = 'use ' . $this->_database;
		$this->db->query($connection);

		//Filter
		if(!empty($filter["filters"]) && isset($filter["filters"])){
	    	foreach ($filter["filters"] as $value) {
	    		$this->db->where($value["field"], $value["value"]); 
			}
		}

		$this->db->select("(SELECT SUBSTRING(batch_number, -5)) AS batch_number", FALSE);
		$this->db->order_by("batch_number", "desc");
		$this->db->limit(1); 
		$query = $this->db->get('transactions');

		$data["results"] = $query->result();
				
		
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

		$prefix = new Prefix();
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

	//POST WITH LINE
	function with_line_post() {
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
		   	
	   		if($obj->save()){
	   			$data["results"][] = $obj->where("id", $obj->id)->get_raw()->result()[0];

	   			//Lines
			   	if(isset($value->lines)){
			   		foreach ($value->lines as $val) {
			   			$lines = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			   			$lines->transaction_id 	= $obj->id;
						isset($val->item_id)			? $lines->item_id			= $val->item_id : "";
						isset($val->assembly_id)		? $lines->assembly_id 		= $val->assembly_id : "";
						isset($val->measurement_id)		? $lines->measurement_id	= $val->measurement_id : "";
						isset($val->tax_item_id)		? $lines->tax_item_id		= $val->tax_item_id : "";
					   	isset($val->wht_account_id)		? $lines->wht_account_id	= $val->wht_account_id : "";
					   	isset($val->description)		? $lines->description 		= $val->description : "";
					   	isset($val->on_hand)			? $lines->on_hand 			= $val->on_hand : "";
					   	// isset($val->on_po)			? $lines->on_po 			= $val->on_po : "";
					   	// isset($val->on_so)			? $lines->on_so 			= $val->on_so : "";
					   	isset($val->gross_weight)		? $lines->gross_weight 		= $val->gross_weight : "";
					   	isset($val->truck_weight)		? $lines->truck_weight 		= $val->truck_weight : "";
					   	isset($val->bag_weight)			? $lines->bag_weight 		= $val->bag_weight : "";
					   	isset($val->yield)				? $lines->yield 			= $val->yield : "";
					   	isset($val->quantity)			? $lines->quantity 			= $val->quantity : "";
					   	isset($val->quantity_adjusted) 	? $lines->quantity_adjusted = $val->quantity_adjusted : "";
					   	// isset($val->conversion_ratio)? $lines->conversion_ratio 	= $val->conversion_ratio : $lines->conversion_ratio = 1;
					   	isset($val->cost)				? $lines->cost 				= $val->cost : "";
					   	isset($val->price)				? $lines->price 			= $val->price : "";
					   	//isset($val->price_avg)		? $lines->price_avg 		= $val->price_avg : "";		   	
					   	isset($val->amount)				? $lines->amount 			= $val->amount : "";
					   	isset($val->markup)				? $lines->markup 			= $val->markup : "";
					   	isset($val->discount)			? $lines->discount 			= $val->discount : "";
					   	isset($val->fine)				? $lines->fine 				= $val->fine : "";
					   	isset($val->tax)				? $lines->tax 				= $val->tax : "";
					   	isset($val->rate)				? $lines->rate 				= $val->rate : "";
					   	isset($val->locale)				? $lines->locale 			= $val->locale : "";
					   	isset($val->additional_cost)	? $lines->additional_cost  	= $val->additional_cost : "";
					   	isset($val->additional_applied)	? $lines->additional_applied= $val->additional_applied : "";
					   	isset($val->movement)			? $lines->movement 			= $val->movement : "";
					   	isset($val->required_date)		? $lines->required_date 	= $val->required_date : "";
					   	isset($val->deleted) 			? $lines->deleted 			= $val->deleted : "";

					   	if($lines->save()){
					   		$data["lines"][] = $lines->where("id", $lines->id)->get_raw()->result()[0];
					   	}
			   		}
			   	}
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}

	//GET BALANCE
	function balance_get() {
		$filter 	= $this->get("filter");
		$data["results"] = [];
		$data["count"] = 1;
		$contact_id = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$objIds = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		//Filter
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter["filters"] as $value) {
	    		if(isset($value["operator"])) {
					$obj->{$value["operator"]}($value["field"], $value["value"]);
					$objIds->{$value["operator"]}($value["field"], $value["value"]);
				} else {
					if($value["field"]=="contact_id") {
						$contact_id = $value["value"];
					}
	    			$obj->where($value["field"], $value["value"]);
	    			$objIds->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->select_sum("amount - deposit", "total");
		// $obj->like("type", "Invoice", "before");
		$obj->where_in("status", array(0,2));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->get();

		//Payment
		$objIds->select("id");
		// $objIds->like("type", "Invoice", "before");
		$objIds->where_in("status", array(0,2));
		$objIds->where("is_recurring <>", 1);
		$objIds->where("deleted <>", 1);
		$objIds->get();

		$ids = [];
		foreach ($objIds as $value) {
			array_push($ids, $value->id);
		}
		$receipt = 0;
		if(count($ids)>0){
			$receipts = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$receipts->select_sum("amount", "total");
			$receipts->where_in("reference_id", $ids);
			$receipts->where_in("type", array("Cash_Receipt","Offset_Invoice","Cash_Payment","Offset_Bill","Cash_Refund","Payment_Refund"));
			$receipts->where("is_recurring <>", 1);
			$receipts->where("deleted <>", 1);
			$receipts->get();

			$receipt = floatval($receipts->total);
		}

		//Deposit
		$deposit = 0;
		if($contact_id>0){
			$deposits = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$deposits->select_sum("amount", "total");
			$deposits->where("contact_id", $contact_id);
			$deposits->where_in("type", array("Customer_Deposit","Vendor_Deposit"));
			$deposits->where("is_recurring <>", 1);
			$deposits->where("deleted <>", 1);
			$deposits->get();

			$deposit = floatval($deposits->total);
		}

		$data["results"][] = array(
			"amount" 	=> floatval($obj->total) - $receipt,
			"balance" 	=> floatval($obj->total) - $receipt,
			"deposit" 	=> $deposit
		);

		//Response Data
		$this->response($data, 200);
	}

	//GET AMOUNT SUM
	function amount_sum_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

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

		$obj->select_sum("amount", "total");
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->get();

		$data["results"][] = array(
			"amount" => floatval($obj->total)
		);

		//Response Data
		$this->response($data, 200);
	}

	//GET TRANSACTION BY MEMBERSHIP
	function by_membership_get() {
		$filter 	= $this->get("filter");
		$data["results"] = [];
		$data["count"] = 1;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$memberships = new Membership(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		//Filter
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter["filters"] as $value) {
	    		if(isset($value["operator"])) {
	    			if($value["operator"]=="memberships") {
						$memberships->where($value["field"], $value["value"]);
					} else {
		    			$obj->{$value["operator"]}($value["field"], $value["value"]);
					}					
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}
		
		$memberships->where("status", 1);
		$memberships->where("deleted <>", 1);
		$memberships->get_iterated();		

		$ids = [];
		if($memberships->exists()){
			foreach ($memberships as $value) {
				array_push($ids, $value->id);
			}

			$obj->include_related("contact", array("abbr","number","name","payment_term_id","payment_method_id","credit_limit","locale","bill_to","ship_to","deposit_account_id","trade_discount_id","settlement_discount_id","account_id","ra_id"));
			$obj->where_in("reference_id", $ids);
			$obj->where("is_recurring", 1);
			$obj->where("deleted <>", 1);
			$obj->get_iterated();

			if($obj->exists()){
				foreach ($obj as $value) {
					//Contact
					$contacts = array(
						"id" 						=> $value->contact_id,
						"abbr"						=> $value->contact_abbr ? $value->contact_abbr : "",
						"number"					=> $value->contact_number ? $value->contact_number : "",
						"name"						=> $value->contact_name ? $value->contact_name : "",
						"payment_term_id"			=> $value->contact_payment_term_id ? $value->contact_payment_term_id : 0,
						"payment_method_id"			=> $value->contact_payment_method_id ? $value->contact_payment_method_id : 0,
						"credit_limit"				=> $value->contact_credit_limit ? $value->contact_credit_limit : 0,
						"locale"					=> $value->contact_locale ? $value->contact_locale : "",
						"bill_to"					=> $value->contact_bill_to ? $value->contact_bill_to : "",
						"ship_to"					=> $value->contact_ship_to ? $value->contact_ship_to : "",
						"deposit_account_id"		=> $value->contact_deposit_account_id ? $value->contact_deposit_account_id : 0,
						"trade_discount_id"			=> $value->contact_trade_discount_id ? $value->contact_trade_discount_id : 0,
						"settlement_discount_id"	=> $value->contact_settlement_discount_id ? $value->contact_settlement_discount_id : 0,
						"account_id"				=> $value->contact_account_id ? $value->contact_account_id : 0,
						"ra_id"						=> $value->contact_ra_id ? $value->contact_ra_id : 0
					);

					//Lines
					$lines = [];
					$line = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$line->include_related("item", array("item_type_id","abbr","number","name","cost","price","locale","income_account_id","expense_account_id","inventory_account_id","nature"));
					$line->include_related("tax_item", array("tax_type_id","account_id","name","rate"));
					$line->where("transaction_id", $value->id);
					$line->where("deleted <>", 1);
					$line->get_iterated();

					foreach ($line as $l) {
						//Item
						$item = array(
							"id" 					=> $l->item_id,
							"item_type_id" 			=> $l->item_item_type_id,
							"abbr"					=> $l->item_abbr, 
							"number" 				=> $l->item_number, 
							"name" 					=> $l->item_name,
							"cost"					=> $l->item_cost,
							"price"					=> $l->item_price,
							"locale"				=> $l->item_locale,
							"income_account_id"		=> $l->item_income_account_id, 
							"expense_account_id" 	=> $l->item_expense_account_id, 
							"inventory_account_id" 	=> $l->item_inventory_account_id
						);

						//Tax Item
						$tax_item = array(
							"id" 			=> $l->tax_item_id,
							"tax_type_id" 	=> $l->tax_item_tax_type_id ? $l->tax_item_tax_type_id : "",
							"account_id" 	=> $l->tax_item_account_id ? $l->tax_item_account_id : "",
							"name" 			=> $l->tax_item_name ? $l->tax_item_name : "",
							"rate" 			=> $l->tax_item_rate ? $l->tax_item_rate : ""
						);

						$lines[] = array(
							"id" 				=> $l->id,
					   		"transaction_id"	=> $l->transaction_id,
					   		"reference_id"		=> $l->reference_id,
					   		"measurement_id" 	=> $l->measurement_id,
							"tax_item_id" 		=> $l->tax_item_id,
							"wht_account_id"	=> $l->wht_account_id,
							"item_id" 			=> $l->item_id,
							"assembly_id" 		=> $l->assembly_id,
						   	"description" 		=> $value->description,
						   	"on_hand" 			=> floatval($l->on_hand),
							"quantity" 			=> floatval($l->quantity),
						   	"conversion_ratio" 	=> floatval($l->conversion_ratio),
						   	"cost"				=> floatval($l->cost),
						   	"price"				=> floatval($l->price),
						   	"amount" 			=> floatval($l->amount),
						   	"discount" 			=> floatval($l->discount),
						   	"fine" 				=> floatval($l->fine),
						   	"tax" 				=> floatval($l->tax),
						   	"additional_cost" 	=> floatval($l->additional_cost),
						   	"additional_applied"=> $l->additional_applied==1?true : false,
						   	"inventory_quantity"=> floatval($l->inventory_quantity),
						   	"inventory_value" 	=> floatval($l->inventory_value),
						   	"rate"				=> floatval($l->rate),
						   	"locale" 			=> $l->locale,
						   	"movement" 			=> $l->movement,
						   	"required_date"		=> $l->required_date,
						   	"reference_no" 		=> $l->reference_no,
						   	"deleted"			=> $l->deleted,				   	
						   	
						   	"item" 				=> $item,
						   	"tax_item" 			=> $tax_item,
						   	"contact" 			=> $contacts
						);
					}

					$data["results"][] = array(
						"id" 						=> $value->id,
						"company_id" 				=> $value->company_id,
						"location_id" 				=> $value->location_id,
						"contact_id" 				=> intval($value->contact_id),
						"payment_term_id" 			=> $value->payment_term_id,
						"payment_method_id" 		=> intval($value->payment_method_id),
						"transaction_template_id" 	=> $value->transaction_template_id,
						"reference_id" 				=> intval($value->reference_id),
						"recurring_id" 				=> $value->recurring_id,
						"return_id" 				=> $value->return_id,
						"job_id" 					=> $value->job_id,
						"account_id" 				=> intval($value->account_id),
						"discount_account_id" 		=> intval($value->discount_account_id),
						"item_id" 					=> $value->item_id,
						"tax_item_id" 				=> $value->tax_item_id,
						"wht_account_id"			=> $value->wht_account_id,
						"user_id" 					=> $value->user_id,
						"employee_id" 				=> $value->employee_id,
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
					   	"received" 					=> floatval($value->received),
					   	"change" 					=> floatval($value->change),
					   	"credit_allowed"			=> floatval($value->credit_allowed),
					   	"additional_cost" 			=> floatval($value->additional_cost),
					   	"additional_apply" 			=> $value->additional_apply,
					   	"rate" 						=> floatval($value->rate),
					   	"locale" 					=> $value->locale,
					   	"month_of"					=> $value->month_of,
					   	"issued_date"				=> $value->issued_date,
					   	"bill_date"					=> $value->bill_date,
					   	"payment_date" 				=> $value->payment_date,
					   	"due_date" 					=> $value->due_date,
					   	"deposit_date" 				=> $value->deposit_date,
					   	"check_no" 					=> $value->check_no,
					   	"reference_no" 				=> $value->reference_no,
					   	"driver_name" 				=> $value->driver_name,
					   	"bill_to" 					=> $value->bill_to,
					   	"ship_to" 					=> $value->ship_to,
					   	"memo" 						=> $value->memo,
					   	"memo2" 					=> $value->memo2,
					   	"note" 						=> $value->note,
					   	"recurring_name" 			=> $value->recurring_name,
					   	"start_date"				=> $value->start_date,
					   	"frequency"					=> $value->frequency,
						"month_option"				=> $value->month_option,
						"interval" 					=> $value->interval,
						"day" 						=> $value->day,
						"week" 						=> $value->week,
						"month" 					=> $value->month,
					   	"reuse" 					=> intval($value->reuse),
					   	"status" 					=> intval($value->status),
					   	"progress" 					=> $value->progress,
					   	"is_recurring" 				=> intval($value->is_recurring),
					   	"is_journal" 				=> $value->is_journal,
					   	"print_count" 				=> $value->print_count,
					   	"printed_by" 				=> $value->printed_by,
					   	"deleted" 					=> $value->deleted,

					   	"is_check" 					=> true,
					   	"contacts" 					=> $contacts,
					   	"lines" 					=> $lines
					);
				}
			}
		}		

		//Response Data
		$this->response($data, 200);
	}

	//GET STATEMENT
	function statement_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		
		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$bf = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$bfReceipts = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    			if($value["field"]=="type"){
						$bf->{$value['operator']}($value['field'], $value['value']);
						$bfReceipts->{$value['operator']}($value['field'], $value['value']);
					}

					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
					if($value["field"]=="contact_id"){
						$bf->where($value["field"], $value["value"]);
						$bfReceipts->where($value["field"], $value["value"]);
					}
					$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		$obj->order_by("number", "asc");
		$obj->get_iterated();

		if($obj->exists()){
			$balance = 0;
			foreach ($obj as $key => $value) {
				//Balance Brought Forward
				if($key==0){					
					$bf->select("locale");
					$bf->select_sum("(amount - deposit) / rate", "total");
					$bf->where("issued_date <", $value->issued_date);
					$bf->where("is_recurring <>", 1);
					$bf->where("deleted <>", 1);
					$bf->get();

					if($bf->exists()){
						//BF Receipts
						$bfReceipts->select("id");
						$bfReceipts->where("issued_date <", $value->issued_date);
						$bfReceipts->where("is_recurring <>", 1);
						$bfReceipts->where("deleted <>", 1);
						$bfReceipts->get();

						$ids = [];
						foreach ($bfReceipts as $value) {
							array_push($ids, $value->id);
						}
						$receipt = 0;
						if(count($ids)>0){
							$receipts = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$receipts->select_sum("amount", "total");
							$receipts->where_in("reference_id", $ids);
							$receipts->where("type", "Cash_Receipt");
							$receipts->where("is_recurring <>", 1);
							$receipts->where("deleted <>", 1);
							$receipts->get();

							$receipt = floatval($receipts->total);
						}
						$data["xxx"] = $receipt;
						$balance += floatval($bf->total) - $receipt;
						$bfDate = date('Y-m-d', strtotime('-1 day', strtotime($value->issued_date)));

						$data["results"][] = array(
							"id" 				=> 0,
							"issued_date"		=> $bfDate,
							"due_date"			=> "",
							"type" 				=> "Balance Forward",
							"job" 				=> "",
						   	"reference_no" 		=> "",
						   	"number" 			=> "",
						   	"status" 			=> "",
						   	"amount" 			=> $balance,
						   	"total"				=> 0,
						   	"balance" 			=> $balance,
						   	"rate" 				=> 1,
						   	"locale" 			=> $bf->locale
						);
					}
				}

				//Single Reference
				$reference = [];
				if($value->reference_id>0){
					$references = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$references->select("number");
					$references->get_by_id($value->reference_id);
					array_push($reference, array("number"=>$references->number));
				}else{
					$reference = $value->transaction->get_raw()->result();
				}

				$amount = (floatval($value->amount) - floatval($value->deposit));
				$balance += $amount;

				$data["results"][] = array(
					"id" 				=> $value->id,
					"issued_date"		=> $value->issued_date,
					"due_date"			=> $value->due_date,
					"type" 				=> $value->type,
					"job" 				=> "",
				   	"reference_no" 		=> $reference,
				   	"number" 			=> $value->number,
				   	"status" 			=> intval($value->status),
				   	"amount" 			=> $amount,
				   	"total"				=> floatval($value->amount),
				   	"balance" 			=> $balance,
				   	"rate" 				=> $value->rate,
				   	"locale" 			=> $value->locale
				);
			}
		}

		//Response Data
		$this->response($data, 200);
	}

	//GET STATEMENT AGING
	function statement_aging_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		//Filter
		if(!empty($filters) && isset($filters)){
	    	foreach ($filters as $value) {
	    		$obj->where($value["field"], $value["value"]);

	    		if($value["field"]=="issued_date >=" || $value["field"]=="issued_date"){
	    			$startDate = $value["value"];
	    		}
			}
		}

		$obj->where_in("type", ["Commercial_Invoice", "Vat_Invoice", "Invoice"]);
		$obj->where_in("status", array(0,2));
		$obj->where("is_recurring", 0);
		$obj->where("deleted", 0);
		$obj->get_iterated();

		$amount = 0;
		$current = 0;
		$oneMonth = 0;
		$twoMonth = 0;
		$threeMonth = 0;
		$overMonth = 0;
		$locale = "";
		if($obj->exists()){
			foreach ($obj as $value) {
				$today = new DateTime();
				$dueDate = new DateTime($value->due_date);
				$days = $dueDate->diff($today)->format("%a");

				$amount += floatval($value->amount);
				$locale = $value->locale;

				if($dueDate < $today){
					if(intval($days)>90){
						$overMonth += floatval($value->amount);
					}else if(intval($days)>60){
						$threeMonth += floatval($value->amount);
					}else if(intval($days)>30){
						$twoMonth += floatval($value->amount);
					}else{
						$oneMonth += floatval($value->amount);
					}
				}else{
					$current += floatval($value->amount);
				}

			}
		}

		$data["results"][] = array(
			"id" 			=> 0,
			"current" 		=> $current,
			"oneMonth" 		=> $oneMonth,
			"twoMonth" 		=> $twoMonth,
			"threeMonth" 	=> $threeMonth,
			"overMonth" 	=> $overMonth,
			"amount" 		=> $amount,
			"locale" 		=> $locale
		);

		//Response Data
		$this->response($data, 200);
	}

	//BY CHOEUN
	//TXN PRINT GET --> Choeun
	function txn_print_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_recurring = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		//Sort
		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Filter
		if(!empty($filters) && isset($filters)){
	    	foreach ($filters as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
					if($value["field"]=="is_recurring"){
	    				$is_recurring = $value["value"];
	    			}else{
	    				$obj->where($value["field"], $value["value"]);
	    			}
				}
			}
		}

		$obj->where("is_recurring", $is_recurring);
		$obj->where("deleted <>", 0);

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;

		if($obj->exists()){
			foreach ($obj as $value) {

				//Sum amount paid
				$amount_paid = 0;
				if($value->type=="Commercial_Invoice" || $value->type=="Vat_Invoice" || $value->type=="Invoice" || $value->type=="Credit_Purchase" || $value->type=="Cash_Receipt" || $value->type=="Cash_Payment"){
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$paid->select_sum("amount");
					$paid->select_sum("discount");
					$paid->where_in("type", array("Cash_Receipt", "Cash_Payment"));
					if($value->type=="Cash_Receipt" || $value->type=="Cash_Payment"){
						$paid->where("reference_id", $value->reference_id);
						$paid->where_not_in("id", array($value->id));
					}else{
						$paid->where("reference_id", $value->id);
					}
					$paid->where("is_recurring <>", 1);
					$paid->where("deleted <>", 1);
					$paid->get();
					$amount_paid = floatval($paid->amount) + floatval($paid->discount);
				}

				$data["results"][] = array(
					"id" 						=> $value->id,
					"company_id" 				=> $value->company_id,
					"location_id" 				=> $value->location_id,
					"contact_id" 				=> $value->contact_id,
					"payment_term_id" 			=> $value->payment_term_id,
					"payment_method_id" 		=> $value->payment_method_id,
					"transaction_template_id" 	=> $value->transaction_template_id,
					"reference_id" 				=> $value->reference_id,
					"recurring_id" 				=> $value->recurring_id,
					"return_id" 				=> $value->return_id,
					"job_id" 					=> $value->job_id,
					"account_id" 				=> $value->account_id,
					"item_id" 					=> $value->item_id,
					"tax_item_id" 				=> $value->tax_item_id,
					"user_id" 					=> $value->user_id,
					"employee_id" 				=> $value->employee_id,
				   	"number" 					=> $value->number,
				   	"reference_no" 				=> $value->reference_no,
				   	"type" 						=> $value->type,
				   	"journal_type" 				=> $value->journal_type,
				   	"sub_total"					=> floatval($value->sub_total),
				   	"discount" 					=> floatval($value->discount),
				   	"tax" 						=> floatval($value->tax),
				   	"amount" 					=> floatval($value->amount),
				   	"fine" 						=> floatval($value->fine),
				   	"deposit"					=> floatval($value->deposit),
				   	"remaining" 				=> floatval($value->remaining),
				   	"credit_allowed"			=> floatval($value->credit_allowed),
				   	"additional_cost" 			=> floatval($value->additional_cost),
				   	"additional_apply" 			=> $value->additional_apply,
				   	"rate" 						=> floatval($value->rate),
				   	"locale" 					=> $value->locale,
				   	"month_of"					=> $value->month_of,
				   	"issued_date"				=> $value->issued_date,
				   	"bill_date"					=> $value->bill_date,
				   	"payment_date" 				=> $value->payment_date,
				   	"due_date" 					=> $value->due_date,
				   	"deposit_date" 				=> $value->deposit_date,
				   	"check_no" 					=> $value->check_no,
				   	"segments" 					=> explode(",", $value->segments),
				   	"bill_to" 					=> $value->bill_to,
				   	"ship_to" 					=> $value->ship_to,
				   	"memo" 						=> $value->memo,
				   	"memo2" 					=> $value->memo2,
				   	"recurring_name" 			=> $value->recurring_name,
				   	"start_date"				=> $value->start_date,
				   	"frequency"					=> $value->frequency,
					"month_option"				=> $value->month_option,
					"interval" 					=> $value->interval,
					"day" 						=> $value->day,
					"week" 						=> $value->week,
					"month" 					=> $value->month,
				   	"status" 					=> $value->status,
				   	"is_recurring" 				=> $value->is_recurring,
				   	"is_journal" 				=> $value->is_journal,
				   	"print_count" 				=> $value->print_count,
				   	"printed_by" 				=> $value->printed_by,
				   	"deleted" 					=> $value->deleted,

				   	"contact" 					=> $value->contact->get_raw()->result(),
				   	"reference" 				=> $value->reference->get_raw()->result(),
				   	"amount_paid"				=> $amount_paid,
				   	"payment_term" 				=> $value->payment_term->get_raw()->result(),
				   	"payment_method" 			=> $value->payment_method->get_raw()->result()

				);
			}
		}

		//Response Data
		$this->response($data, 200);
	}

	//ITMES LINE PRINT GET --> Choeun
	function line_print_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		//Sort
		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Filter
		if(!empty($filters) && isset($filters)){
	    	foreach ($filters as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;

		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$itemPrice = [];
				if($value->item_id>0){
					$pl = new Item_price(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$pl->where("item_id", $value->item_id);
					$pl->get();
					foreach ($pl as $p) {
						$itemPrice[] = array(
							"id" 			=> $p->id,
							"item_id" 		=> $p->item_id,
							"assembly_id"	=> $p->assembly_id,
							"measurement_id"=> $p->measurement_id,
							"quantity"		=> floatval($p->quantity),
							"conversion_ratio" 	=> floatval($p->conversion_ratio),
							"price" 		=> floatval($p->price),
							"amount" 		=> floatval($p->amount),
							"locale" 		=> $p->locale,

							"measurement" 	=> $p->measurement->get()->name
						);
					}
				}

				$data["results"][] = array(
					"id" 				=> $value->id,
			   		"transaction_id"	=> $value->transaction_id,
			   		"measurement_id" 	=> $value->measurement_id,
					"tax_item_id" 		=> $value->tax_item_id,
					"item_id" 			=> $value->item_id,
				   	"description" 		=> $value->description,
				   	"on_hand" 			=> floatval($value->on_hand),
					"on_po" 			=> floatval($value->on_po),
					"on_so" 			=> floatval($value->on_so),
					"quantity" 			=> floatval($value->quantity),
				   	"quantity_adjusted" => floatval($value->quantity_adjusted),
				   	"cost"				=> floatval($value->cost),
				   	"price"				=> floatval($value->price),
				   	"price_avg" 		=> floatval($value->price_avg),
				   	"amount" 			=> floatval($value->amount),
				   	"discount" 			=> floatval($value->discount),
				   	"fine" 				=> floatval($value->fine),
				   	"additional_cost" 	=> floatval($value->additional_cost),
				   	"additional_applied"=> $value->additional_applied,
				   	"rate"				=> floatval($value->rate),
				   	"locale" 			=> $value->locale,
				   	"movement" 			=> $value->movement,
				   	"required_date"		=> $value->required_date,

				   	"item_prices" 		=> $itemPrice,
				   	"item" 		=> $value->item->get_raw()->result(),
				   	"journal" 			=> $value->journal->get_raw()->result()
				);
			}
		}
		$this->response($data, 200);
	}

	//Purchase Power
	//GET
	function power_get() {
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
					if($value['operator']=="startswith"){
	    				$obj->like($value['field'], $value['value'], 'after');
	    			}else if($value['operator']=="contains"){
	    				$obj->like($value['field'], $value['value'], 'both');
	    			}else{
						$obj->{$value['operator']}($value['field'], $value['value']);
	    			}
				} else {
					if($value["field"]=="is_recurring"){
	    				$is_recurring = $value["value"];
	    			}else{
	    				$obj->where($value["field"], $value["value"]);
	    			}
				}
			}
		}

		$obj->include_related("contact", array("abbr","number","name","payment_term_id","payment_method_id","credit_limit","locale","bill_to","ship_to","deposit_account_id","trade_discount_id","settlement_discount_id","account_id","ra_id"));
		$obj->include_related("job", array("name"));
		$obj->where("is_recurring", $is_recurring);
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
				//Sum amount paid
				$amount_paid = 0;
				if($value->type=="Commercial_Invoice" || $value->type=="Vat_Invoice" || $value->type=="Invoice" || $value->type=="Credit_Purchase" || $value->type=="Utility_Invoice"){
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$paid->select_sum("amount");
					$paid->select_sum("discount");
					$paid->where_in("type", array("Cash_Receipt", "Offset_Invoice", "Cash_Payment", "Offset_Bill"));					
					$paid->where("reference_id", $value->id);
					$paid->where("is_recurring <>",1);
					$paid->where("deleted <>",1);
					$paid->get();
					$amount_paid = floatval($paid->amount) + floatval($paid->discount);
				}else if($value->type=="Cash_Advance"){
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$paid->select_sum("amount");
					$paid->select_sum("received");
					$paid->where("type", "Advance_Settlement");
					$paid->where("reference_id", $value->id);
					$paid->where("is_recurring <>",1);
					$paid->where("deleted <>",1);
					$paid->get();
					$amount_paid = floatval($paid->amount) + floatval($paid->received);
				}

				//Single Reference
				$reference = [];
				if($value->reference_id>0){
					$references = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$references->include_related("job", array("name"));
					$references->select("account_id, number, type, amount, deposit, rate, issued_date");
					$references->get_by_id($value->reference_id);

					$ref_amount_paid = 0;
					if($references->type=="Commercial_Invoice" || $references->type=="Vat_Invoice" || $references->type=="Invoice" || $references->type=="Credit_Purchase" || $references->type=="Utility_Invoice"){
						$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$paid->select_sum("amount");
						$paid->select_sum("discount");
						$paid->where_in("type", array("Cash_Receipt", "Offset_Invoice", "Cash_Payment", "Offset_Bill"));					
						$paid->where("reference_id", $value->reference_id);
						$paid->where("is_recurring <>",1);
						$paid->where("deleted <>",1);
						$paid->get();
						$ref_amount_paid = floatval($paid->amount) + floatval($paid->discount);
					}else if($references->type=="Cash_Advance"){
						$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$paid->select_sum("amount");
						$paid->select_sum("received");
						$paid->where("type", "Advance_Settlement");
						$paid->where("reference_id", $value->reference_id);
						$paid->where("is_recurring <>",1);
						$paid->where("deleted <>",1);
						$paid->get();
						$ref_amount_paid = floatval($paid->amount) + floatval($paid->received);
					}

					$reference[] = array(
						"id" 			=> $value->reference_id,
						"number" 		=> $references->number,
						"type" 			=> $references->type,
						"amount" 		=> $references->amount,
						"deposit" 		=> $references->deposit,
						"rate" 			=> $references->rate,
						"issued_date" 	=> $references->issued_date,
						"account_id" 	=> $references->account_id,
						"amount_paid" 	=> $ref_amount_paid,
						"job" 			=> $references->job_name,
					);
				}

				//Meter By Choeun
				$meter = "";
				$meterNum = "";
				if($value->meter_id != 0){
					$meter = $value->meter->get();
					$meterNum = $meter->get()->number;
				}

				//Contact
				$contact = array(
					"id" 						=> $value->contact_id,
					"abbr"						=> $value->contact_abbr ? $value->contact_abbr : "",
					"number"					=> $value->contact_number ? $value->contact_number : "",
					"name"						=> $value->contact_name ? $value->contact_name : "",
					"payment_term_id"			=> $value->contact_payment_term_id ? $value->contact_payment_term_id : 0,
					"payment_method_id"			=> $value->contact_payment_method_id ? $value->contact_payment_method_id : 0,
					"credit_limit"				=> $value->contact_credit_limit ? $value->contact_credit_limit : 0,
					"locale"					=> $value->contact_locale ? $value->contact_locale : "",
					"bill_to"					=> $value->contact_bill_to ? $value->contact_bill_to : "",
					"ship_to"					=> $value->contact_ship_to ? $value->contact_ship_to : "",
					"deposit_account_id"		=> $value->contact_deposit_account_id ? $value->contact_deposit_account_id : 0,
					"trade_discount_id"			=> $value->contact_trade_discount_id ? $value->contact_trade_discount_id : 0,
					"settlement_discount_id"	=> $value->contact_settlement_discount_id ? $value->contact_settlement_discount_id : 0,
					"account_id"				=> $value->contact_account_id ? $value->contact_account_id : 0,
					"ra_id"						=> $value->contact_ra_id ? $value->contact_ra_id : 0
				);

				//Employee
				$employee = [];
				if($value->employee_id>0){
					$employies = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$employies->select("abbr, number, name, salary_account_id");
					$employies->get_by_id($value->employee_id);

					$employee = array(
						"id" 				=> $value->employee_id,
						"abbr" 				=> $employies->abbr,
						"number" 			=> $employies->number,
						"name" 				=> $employies->name,
						"salary_account_id"	=> $employies->salary_account_id
					);
				}

				//Driver
				$driver = [];
				if($value->driver_id>0){
					$drivers = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$drivers->select("abbr, number, name");
					$drivers->get_by_id($value->driver_id);

					$driver = array(
						"id" 				=> $value->driver_id,
						"abbr" 				=> $drivers->abbr,
						"number" 			=> $drivers->number,
						"name" 				=> $drivers->name
					);
				}
				$memo = "Purchase Power";
				$data["results"][] = array(
					"id" 						=> $value->id,
					"company_id" 				=> $value->company_id,
					"location_id" 				=> $value->location_id,
					"contact_id" 				=> intval($value->contact_id),
					"payment_term_id" 			=> $value->payment_term_id,
					"payment_method_id" 		=> intval($value->payment_method_id),
					"transaction_template_id" 	=> $value->transaction_template_id,
					"reference_id" 				=> intval($value->reference_id),
					"recurring_id" 				=> $value->recurring_id,
					"return_id" 				=> $value->return_id,
					"job_id" 					=> $value->job_id,
					"account_id" 				=> intval($value->account_id),
					"discount_account_id" 		=> intval($value->discount_account_id),
					"item_id" 					=> $value->item_id,
					"tax_item_id" 				=> $value->tax_item_id,
					"wht_account_id"			=> $value->wht_account_id,
					"user_id" 					=> $value->user_id,
					"employee_id" 				=> $value->employee_id,
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
				   	"received" 					=> floatval($value->received),
				   	"change" 					=> floatval($value->change),
				   	"credit_allowed"			=> floatval($value->credit_allowed),
				   	"additional_cost" 			=> floatval($value->additional_cost),
				   	"additional_apply" 			=> $value->additional_apply,
				   	"rate" 						=> floatval($value->rate),
				   	"locale" 					=> $value->locale,
				   	"month_of"					=> $value->month_of,
				   	"issued_date"				=> $value->issued_date,
				   	"bill_date"					=> $value->bill_date,
				   	"payment_date" 				=> $value->payment_date,
				   	"due_date" 					=> $value->due_date,
				   	"deposit_date" 				=> $value->deposit_date,
				   	"check_no" 					=> $value->check_no,
				   	"reference_no" 				=> $value->reference_no,
				   	"segments" 					=> $value->segments!="" ? array_map('intval', explode(",", $value->segments)) : [],
				   	"segmentitems" 				=> $value->segmentitem->include_related("segment", array("name"))->get_raw()->result(),
				   	"driver_name" 				=> $value->driver_name,
				   	"bill_to" 					=> $value->bill_to,
				   	"ship_to" 					=> $value->ship_to,
				   	"memo" 						=> $memo,
				   	"memo2" 					=> $value->memo2,
				   	"note" 						=> $value->note,
				   	"recurring_name" 			=> $value->recurring_name,
				   	"start_date"				=> $value->start_date,
				   	"frequency"					=> $value->frequency,
					"month_option"				=> $value->month_option,
					"interval" 					=> $value->interval,
					"day" 						=> $value->day,
					"week" 						=> $value->week,
					"month" 					=> $value->month,
				   	"reuse" 					=> intval($value->reuse),
				   	"status" 					=> intval($value->status),
				   	"progress" 					=> $value->progress,
				   	"is_recurring" 				=> intval($value->is_recurring),
				   	"is_journal" 				=> $value->is_journal,
				   	"print_count" 				=> $value->print_count,
				   	"printed_by" 				=> $value->printed_by,
				   	"deleted" 					=> $value->deleted,
				   	"meter"						=> $meterNum,
				   	"meter_id"					=> $value->meter_id,
				   	"amount_paid"				=> $amount_paid,

				   	"truck_number"				=> $value->truck_number,
				   	"driver_id"					=> $value->driver_id,
				   	"time_batched"				=> $value->time_batched,
				   	"time_of_discharge"			=> $value->time_of_discharge,
				   	"time_of_completion"		=> $value->time_of_completion,
				   	"cubic_meter"				=> $value->cubic_meter,
				   	"total_batch"				=> $value->total_batch,

				   	"contact" 					=> $contact,
				   	"employee" 					=> $employee,
				   	"job" 						=> $value->job_name,
				   	"driver" 					=> $driver,
				   	"reference" 				=> $reference,
				   	"references" 				=> $value->transaction->get_raw()->result()
				);
			}
		}

		//Response Data
		$this->response($data, 200);
	}

	//POST
	function power_post() {
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
			isset($value->discount_account_id) 		? $obj->discount_account_id 		= $value->discount_account_id : "";
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
		   	// isset($value->references) 				? $obj->references 					= implode(",", $value->references) : "";
		   	isset($value->segments) 				? $obj->segments 					= implode(",", $value->segments) : "";
		   	isset($value->driver_name) 				? $obj->driver_name 				= $value->driver_name : "";
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
		   	isset($value->reuse) 					? $obj->reuse 						= $value->reuse : "";
		   	isset($value->status) 					? $obj->status 						= $value->status : "";
		   	isset($value->progress) 				? $obj->progress 					= $value->progress : "";
		   	isset($value->is_recurring) 			? $obj->is_recurring 				= $value->is_recurring : "";
		   	isset($value->is_journal) 				? $obj->is_journal 					= $value->is_journal : "";
		   	isset($value->print_count) 				? $obj->print_count 				= $value->print_count : "";
		   	isset($value->printed_by) 				? $obj->printed_by 					= $value->printed_by : "";
		   	isset($value->deleted) 					? $obj->deleted 					= $value->deleted : "";
		   	isset($value->meter_id) 				? $obj->meter_id 					= $value->meter_id : "";

		   	isset($value->truck_number) 			? $obj->truck_number 				= $value->truck_number : "";		   	
		   	isset($value->time_batched) 			? $obj->time_batched 				= $value->time_batched : "";
		   	isset($value->time_of_discharge) 		? $obj->time_of_discharge 			= $value->time_of_discharge : "";
		   	isset($value->time_of_completion) 		? $obj->time_of_completion 			= $value->time_of_completion : "";
		   	isset($value->cubic_meter) 				? $obj->cubic_meter 				= $value->cubic_meter : "";
		   	isset($value->total_batch) 				? $obj->total_batch 				= $value->total_batch : "";
		   	
		   	$related = [];

		   	//References
   			if(isset($value->references)){
	   			$ids = [];
	   			foreach ($value->references as $val) {
		   			array_push($ids, $val->id);
	   			}
	   			//Update references status
	   			if(count($ids)>0){
		   			$referenceUpdate = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   				$referenceUpdate->where_in("id", $ids);
	   				$referenceUpdate->update("status", 1);

	   				$referenceTxn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   				$referenceTxn->where_in("id", $ids);
	   				$referenceTxn->get();

	   				array_push($related, $referenceTxn->all);
   				}
			}
		   	
		   	//Segments
			if(isset($value->segments)){
				if(count($value->segments)>0){
					$segmentTxn = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$segmentTxn->where_in("id", $value->segments)->get();
					array_push($related, $segmentTxn->all);
				}
			}			

			$contact = [];
			if(isset($value->contact)){
				$contact = $value->contact;
			}

			//Driver
			if(isset($value->driver)){
				$obj->driver_id = $value->driver->id;
			}else{
				isset($value->driver_id) ? $obj->driver_id 	= $value->driver_id : "";
			}
			$memo = "Purchase Power";
	   		if($obj->save($related)){
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
					"account_id" 				=> intval($obj->account_id),
					"discount_account_id" 		=> intval($obj->discount_account_id),
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
				   	"driver_name" 				=> $obj->driver_name,
				   	"bill_to" 					=> $obj->bill_to,
				   	"ship_to" 					=> $obj->ship_to,
				   	"memo" 						=> $memo,
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
					"reuse" 					=> intval($obj->reuse),
				   	"status" 					=> intval($obj->status),
				   	"progress" 					=> $obj->progress,
				   	"is_recurring" 				=> floatval($obj->is_recurring),
				   	"is_journal" 				=> $obj->is_journal,
				   	"print_count" 				=> $obj->print_count,
				   	"printed_by" 				=> $obj->printed_by,
				   	"deleted" 					=> $obj->deleted,
				   	"meter_id"					=> $obj->meter_id,
				   	"amount_paid"				=> 0,

				   	"truck_number"				=> $obj->truck_number,
				   	"driver_id"					=> $obj->driver_id,
				   	"time_batched"				=> $obj->time_batched,
				   	"time_of_discharge"			=> $obj->time_of_discharge,
				   	"time_of_completion"		=> $obj->time_of_completion,
				   	"cubic_meter"				=> $obj->cubic_meter,
				   	"total_batch"				=> $obj->total_batch,

				   	"contact" 					=> $contact,
				   	"driver" 					=> []
			   	);
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}

	//PUT
	function power_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {
			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);			

			isset($value->company_id) 				? $obj->company_id 					= $value->company_id : "";
			isset($value->location_id) 				? $obj->location_id 				= $value->location_id : "";
			isset($value->contact_id) 				? $obj->contact_id 					= $value->contact_id : "";
			isset($value->payment_term_id) 			? $obj->payment_term_id 			= $value->payment_term_id : "";
			isset($value->payment_method_id) 		? $obj->payment_method_id 			= $value->payment_method_id : "";
			isset($value->transaction_template_id) 	? $obj->transaction_template_id 	= $value->transaction_template_id : "";
			isset($value->reference_id) 			? $obj->reference_id 				= $value->reference_id : "";
			isset($value->recurring_id) 			? $obj->recurring_id 				= $value->recurring_id : "";
			isset($value->return_id) 				? $obj->return_id 					= $value->return_id : "";
			isset($value->job_id) 					? $obj->job_id 						= $value->job_id : "";
			isset($value->account_id) 				? $obj->account_id 					= $value->account_id : "";
			isset($value->discount_account_id) 		? $obj->discount_account_id 		= $value->discount_account_id : "";
			isset($value->item_id) 					? $obj->item_id 					= $value->item_id : "";
			isset($value->tax_item_id) 				? $obj->tax_item_id 				= $value->tax_item_id : "";
			isset($value->wht_account_id) 			? $obj->wht_account_id 				= $value->wht_account_id : "";
			isset($value->user_id) 					? $obj->user_id 					= $value->user_id : "";
			isset($value->employee_id) 				? $obj->employee_id 				= $value->employee_id : "";
			isset($value->number) 					? $obj->number 						= $value->number : "";
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
		   	// isset($value->references) 				? $obj->references 					= implode(",", $value->references) : "";
		   	isset($value->segments) 				? $obj->segments 					= implode(",", $value->segments) : "";
		   	isset($value->driver_name) 				? $obj->driver_name 				= $value->driver_name : "";
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
		   	isset($value->reuse) 					? $obj->reuse 						= $value->reuse : "";
		   	isset($value->status) 					? $obj->status 						= $value->status : "";
		   	isset($value->progress) 				? $obj->progress 					= $value->progress : "";
		   	isset($value->is_recurring) 			? $obj->is_recurring 				= $value->is_recurring : "";
		   	isset($value->is_journal) 				? $obj->is_journal 					= $value->is_journal : "";
		   	isset($value->print_count) 				? $obj->print_count 				= $value->print_count : "";
		   	isset($value->printed_by) 				? $obj->printed_by 					= $value->printed_by : "";
		   	isset($value->deleted) 					? $obj->deleted 					= $value->deleted : "";
		   	isset($value->meter_id) 				? $obj->meter_id 					= $value->meter_id : "";

		   	isset($value->truck_number) 			? $obj->truck_number 				= $value->truck_number : "";
		   	isset($value->driver_id) 				? $obj->driver_id 					= $value->driver_id : "";
		   	isset($value->time_batched) 			? $obj->time_batched 				= $value->time_batched : "";
		   	isset($value->time_of_discharge) 		? $obj->time_of_discharge 			= $value->time_of_discharge : "";
		   	isset($value->time_of_completion) 		? $obj->time_of_completion 			= $value->time_of_completion : "";
		   	isset($value->cubic_meter) 				? $obj->cubic_meter 				= $value->cubic_meter : "";
		   	isset($value->total_batch) 				? $obj->total_batch 				= $value->total_batch : "";

		   	$contact = [];
			if(isset($value->contact)){
				$contact = $value->contact;
			}

		   	$related = [];

		   	//References
			if(isset($value->references)){
				$ids = [];
				foreach ($value->references as $val) {
					array_push($ids, $val->id);
				}

				if(count($ids)>0){
					//Remove previouse segments
			   		$referenceDel = $obj->transaction->get();
			   		$refDelIds = [];
			   		foreach ($referenceDel as $refDel) {
			   			array_push($refDelIds, $refDel->id);
			   		}			   		
			   		$obj->delete($referenceDel->all);
			   		//Reverse reference status
			   		$refDowndate = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   				$refDowndate->where_in("id", $refDelIds);
	   				$refDowndate->update("status", 0);

			   		//Update references status
		   			if(count($ids)>0){
			   			$referenceUpdate = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   				$referenceUpdate->where_in("id", $ids);
		   				$referenceUpdate->update("status", 1);

		   				$referenceTxn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   				$referenceTxn->where_in("id", $ids);
		   				$referenceTxn->get();

		   				array_push($related, $referenceTxn->all);
	   				}
			   	}
			}

			//Segments
			if(isset($value->segments)){
				if(count($value->segments)>0){
					//Remove previouse segments
			   		$segmentDel = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			   		$segmentDel->transaction->get();
			   		$obj->delete($segmentDel->all);

			   		//Add new segments
			   		$segmentTxn = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			   		$segmentTxn->where_in("id", $value->segments)->get();

			   		array_push($related, $segmentTxn->all);
			   	}
			}
			$memo = "Purchase Power";
			if($obj->save($related)){
				//Results
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
					"account_id" 				=> intval($obj->account_id),
					"discount_account_id" 		=> intval($obj->discount_account_id),
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
				   	"driver_name" 				=> $obj->driver_name,
				   	"bill_to" 					=> $obj->bill_to,
				   	"ship_to" 					=> $obj->ship_to,
				   	"memo" 						=> $memo,
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
					"reuse" 					=> intval($obj->reuse),
				   	"status" 					=> intval($obj->status),
				   	"progress" 					=> $obj->progress,
				   	"is_recurring" 				=> floatval($obj->is_recurring),
				   	"is_journal" 				=> $obj->is_journal,
				   	"print_count" 				=> $obj->print_count,
				   	"printed_by" 				=> $obj->printed_by,
				   	"deleted" 					=> $obj->deleted,
				   	"meter_id"					=> $obj->meter_id,
				   	"amount_paid"				=> 0,

				   	"truck_number"				=> $obj->truck_number,
				   	"driver_id"					=> $obj->driver_id,
				   	"time_batched"				=> $obj->time_batched,
				   	"time_of_discharge"			=> $obj->time_of_discharge,
				   	"time_of_completion"		=> $obj->time_of_completion,
				   	"cubic_meter"				=> $obj->cubic_meter,
				   	"total_batch"				=> $obj->total_batch,

				   	"contact" 					=> $contact,
				   	"driver" 					=> []
				);
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}

	//DELETE
	function power_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
		}

		//Response data
		$this->response($data, 200);
	}


	//purchase electricity
	//GET
	function electricity_get() {
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
					if($value['operator']=="startswith"){
	    				$obj->like($value['field'], $value['value'], 'after');
	    			}else if($value['operator']=="contains"){
	    				$obj->like($value['field'], $value['value'], 'both');
	    			}else{
						$obj->{$value['operator']}($value['field'], $value['value']);
	    			}
				} else {
					if($value["field"]=="is_recurring"){
	    				$is_recurring = $value["value"];
	    			}else{
	    				$obj->where($value["field"], $value["value"]);
	    			}
				}
			}
		}

		$obj->include_related("contact", array("abbr","number","name","payment_term_id","payment_method_id","credit_limit","locale","bill_to","ship_to","deposit_account_id","trade_discount_id","settlement_discount_id","account_id","ra_id"));
		$obj->include_related("job", array("name"));
		$obj->where("is_recurring", $is_recurring);
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
				//Sum amount paid
				$amount_paid = 0;
				if($value->type=="Commercial_Invoice" || $value->type=="Vat_Invoice" || $value->type=="Invoice" || $value->type=="Credit_Purchase" || $value->type=="Utility_Invoice"){
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$paid->select_sum("amount");
					$paid->select_sum("discount");
					$paid->where_in("type", array("Cash_Receipt", "Offset_Invoice", "Cash_Payment", "Offset_Bill"));					
					$paid->where("reference_id", $value->id);
					$paid->where("is_recurring <>",1);
					$paid->where("deleted <>",1);
					$paid->get();
					$amount_paid = floatval($paid->amount) + floatval($paid->discount);
				}else if($value->type=="Cash_Advance"){
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$paid->select_sum("amount");
					$paid->select_sum("received");
					$paid->where("type", "Advance_Settlement");
					$paid->where("reference_id", $value->id);
					$paid->where("is_recurring <>",1);
					$paid->where("deleted <>",1);
					$paid->get();
					$amount_paid = floatval($paid->amount) + floatval($paid->received);
				}

				//Single Reference
				$reference = [];
				if($value->reference_id>0){
					$references = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$references->include_related("job", array("name"));
					$references->select("account_id, number, type, amount, deposit, rate, issued_date");
					$references->get_by_id($value->reference_id);

					$ref_amount_paid = 0;
					if($references->type=="Commercial_Invoice" || $references->type=="Vat_Invoice" || $references->type=="Invoice" || $references->type=="Credit_Purchase" || $references->type=="Utility_Invoice"){
						$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$paid->select_sum("amount");
						$paid->select_sum("discount");
						$paid->where_in("type", array("Cash_Receipt", "Offset_Invoice", "Cash_Payment", "Offset_Bill"));					
						$paid->where("reference_id", $value->reference_id);
						$paid->where("is_recurring <>",1);
						$paid->where("deleted <>",1);
						$paid->get();
						$ref_amount_paid = floatval($paid->amount) + floatval($paid->discount);
					}else if($references->type=="Cash_Advance"){
						$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$paid->select_sum("amount");
						$paid->select_sum("received");
						$paid->where("type", "Advance_Settlement");
						$paid->where("reference_id", $value->reference_id);
						$paid->where("is_recurring <>",1);
						$paid->where("deleted <>",1);
						$paid->get();
						$ref_amount_paid = floatval($paid->amount) + floatval($paid->received);
					}

					$reference[] = array(
						"id" 			=> $value->reference_id,
						"number" 		=> $references->number,
						"type" 			=> $references->type,
						"amount" 		=> $references->amount,
						"deposit" 		=> $references->deposit,
						"rate" 			=> $references->rate,
						"issued_date" 	=> $references->issued_date,
						"account_id" 	=> $references->account_id,
						"amount_paid" 	=> $ref_amount_paid,
						"job" 			=> $references->job_name,
					);
				}

				//Meter By Choeun
				$meter = "";
				$meterNum = "";
				if($value->meter_id != 0){
					$meter = $value->meter->get();
					$meterNum = $meter->get()->number;
				}

				//Contact
				$contact = array(
					"id" 						=> $value->contact_id,
					"abbr"						=> $value->contact_abbr ? $value->contact_abbr : "",
					"number"					=> $value->contact_number ? $value->contact_number : "",
					"name"						=> $value->contact_name ? $value->contact_name : "",
					"payment_term_id"			=> $value->contact_payment_term_id ? $value->contact_payment_term_id : 0,
					"payment_method_id"			=> $value->contact_payment_method_id ? $value->contact_payment_method_id : 0,
					"credit_limit"				=> $value->contact_credit_limit ? $value->contact_credit_limit : 0,
					"locale"					=> $value->contact_locale ? $value->contact_locale : "",
					"bill_to"					=> $value->contact_bill_to ? $value->contact_bill_to : "",
					"ship_to"					=> $value->contact_ship_to ? $value->contact_ship_to : "",
					"deposit_account_id"		=> $value->contact_deposit_account_id ? $value->contact_deposit_account_id : 0,
					"trade_discount_id"			=> $value->contact_trade_discount_id ? $value->contact_trade_discount_id : 0,
					"settlement_discount_id"	=> $value->contact_settlement_discount_id ? $value->contact_settlement_discount_id : 0,
					"account_id"				=> $value->contact_account_id ? $value->contact_account_id : 0,
					"ra_id"						=> $value->contact_ra_id ? $value->contact_ra_id : 0
				);

				//Employee
				$employee = [];
				if($value->employee_id>0){
					$employies = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$employies->select("abbr, number, name, salary_account_id");
					$employies->get_by_id($value->employee_id);

					$employee = array(
						"id" 				=> $value->employee_id,
						"abbr" 				=> $employies->abbr,
						"number" 			=> $employies->number,
						"name" 				=> $employies->name,
						"salary_account_id"	=> $employies->salary_account_id
					);
				}

				//Driver
				$driver = [];
				if($value->driver_id>0){
					$drivers = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$drivers->select("abbr, number, name");
					$drivers->get_by_id($value->driver_id);

					$driver = array(
						"id" 				=> $value->driver_id,
						"abbr" 				=> $drivers->abbr,
						"number" 			=> $drivers->number,
						"name" 				=> $drivers->name
					);
				}
				$memo = "Purchase Power";
				$data["results"][] = array(
					"id" 						=> $value->id,
					"company_id" 				=> $value->company_id,
					"location_id" 				=> $value->location_id,
					"contact_id" 				=> intval($value->contact_id),
					"payment_term_id" 			=> $value->payment_term_id,
					"payment_method_id" 		=> intval($value->payment_method_id),
					"transaction_template_id" 	=> $value->transaction_template_id,
					"reference_id" 				=> intval($value->reference_id),
					"recurring_id" 				=> $value->recurring_id,
					"return_id" 				=> $value->return_id,
					"job_id" 					=> $value->job_id,
					"account_id" 				=> intval($value->account_id),
					"discount_account_id" 		=> intval($value->discount_account_id),
					"item_id" 					=> $value->item_id,
					"tax_item_id" 				=> $value->tax_item_id,
					"wht_account_id"			=> $value->wht_account_id,
					"user_id" 					=> $value->user_id,
					"employee_id" 				=> $value->employee_id,
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
				   	"received" 					=> floatval($value->received),
				   	"change" 					=> floatval($value->change),
				   	"credit_allowed"			=> floatval($value->credit_allowed),
				   	"additional_cost" 			=> floatval($value->additional_cost),
				   	"additional_apply" 			=> $value->additional_apply,
				   	"rate" 						=> floatval($value->rate),
				   	"locale" 					=> $value->locale,
				   	"month_of"					=> $value->month_of,
				   	"issued_date"				=> $value->issued_date,
				   	"bill_date"					=> $value->bill_date,
				   	"payment_date" 				=> $value->payment_date,
				   	"due_date" 					=> $value->due_date,
				   	"deposit_date" 				=> $value->deposit_date,
				   	"check_no" 					=> $value->check_no,
				   	"reference_no" 				=> $value->reference_no,
				   	"segments" 					=> $value->segments!="" ? array_map('intval', explode(",", $value->segments)) : [],
				   	"segmentitems" 				=> $value->segmentitem->include_related("segment", array("name"))->get_raw()->result(),
				   	"driver_name" 				=> $value->driver_name,
				   	"bill_to" 					=> $value->bill_to,
				   	"ship_to" 					=> $value->ship_to,
				   	"memo" 						=> $memo,
				   	"memo2" 					=> $value->memo2,
				   	"note" 						=> $value->note,
				   	"recurring_name" 			=> $value->recurring_name,
				   	"start_date"				=> $value->start_date,
				   	"frequency"					=> $value->frequency,
					"month_option"				=> $value->month_option,
					"interval" 					=> $value->interval,
					"day" 						=> $value->day,
					"week" 						=> $value->week,
					"month" 					=> $value->month,
				   	"reuse" 					=> intval($value->reuse),
				   	"status" 					=> intval($value->status),
				   	"progress" 					=> $value->progress,
				   	"is_recurring" 				=> intval($value->is_recurring),
				   	"is_journal" 				=> $value->is_journal,
				   	"print_count" 				=> $value->print_count,
				   	"printed_by" 				=> $value->printed_by,
				   	"deleted" 					=> $value->deleted,
				   	"meter"						=> $meterNum,
				   	"meter_id"					=> $value->meter_id,
				   	"amount_paid"				=> $amount_paid,

				   	"truck_number"				=> $value->truck_number,
				   	"driver_id"					=> $value->driver_id,
				   	"time_batched"				=> $value->time_batched,
				   	"time_of_discharge"			=> $value->time_of_discharge,
				   	"time_of_completion"		=> $value->time_of_completion,
				   	"cubic_meter"				=> $value->cubic_meter,
				   	"total_batch"				=> $value->total_batch,

				   	"contact" 					=> $contact,
				   	"employee" 					=> $employee,
				   	"job" 						=> $value->job_name,
				   	"driver" 					=> $driver,
				   	"reference" 				=> $reference,
				   	"references" 				=> $value->transaction->get_raw()->result()
				);
			}
		}

		//Response Data
		$this->response($data, 200);
	}

	//POST
	function electricity_post() {
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
			isset($value->discount_account_id) 		? $obj->discount_account_id 		= $value->discount_account_id : "";
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
		   	// isset($value->references) 				? $obj->references 					= implode(",", $value->references) : "";
		   	isset($value->segments) 				? $obj->segments 					= implode(",", $value->segments) : "";
		   	isset($value->driver_name) 				? $obj->driver_name 				= $value->driver_name : "";
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
		   	isset($value->reuse) 					? $obj->reuse 						= $value->reuse : "";
		   	isset($value->status) 					? $obj->status 						= $value->status : "";
		   	isset($value->progress) 				? $obj->progress 					= $value->progress : "";
		   	isset($value->is_recurring) 			? $obj->is_recurring 				= $value->is_recurring : "";
		   	isset($value->is_journal) 				? $obj->is_journal 					= $value->is_journal : "";
		   	isset($value->print_count) 				? $obj->print_count 				= $value->print_count : "";
		   	isset($value->printed_by) 				? $obj->printed_by 					= $value->printed_by : "";
		   	isset($value->deleted) 					? $obj->deleted 					= $value->deleted : "";
		   	isset($value->meter_id) 				? $obj->meter_id 					= $value->meter_id : "";

		   	isset($value->truck_number) 			? $obj->truck_number 				= $value->truck_number : "";		   	
		   	isset($value->time_batched) 			? $obj->time_batched 				= $value->time_batched : "";
		   	isset($value->time_of_discharge) 		? $obj->time_of_discharge 			= $value->time_of_discharge : "";
		   	isset($value->time_of_completion) 		? $obj->time_of_completion 			= $value->time_of_completion : "";
		   	isset($value->cubic_meter) 				? $obj->cubic_meter 				= $value->cubic_meter : "";
		   	isset($value->total_batch) 				? $obj->total_batch 				= $value->total_batch : "";
		   	
		   	$related = [];

		   	//References
   			if(isset($value->references)){
	   			$ids = [];
	   			foreach ($value->references as $val) {
		   			array_push($ids, $val->id);
	   			}
	   			//Update references status
	   			if(count($ids)>0){
		   			$referenceUpdate = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   				$referenceUpdate->where_in("id", $ids);
	   				$referenceUpdate->update("status", 1);

	   				$referenceTxn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   				$referenceTxn->where_in("id", $ids);
	   				$referenceTxn->get();

	   				array_push($related, $referenceTxn->all);
   				}
			}
		   	
		   	//Segments
			if(isset($value->segments)){
				if(count($value->segments)>0){
					$segmentTxn = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$segmentTxn->where_in("id", $value->segments)->get();
					array_push($related, $segmentTxn->all);
				}
			}			

			$contact = [];
			if(isset($value->contact)){
				$contact = $value->contact;
			}

			//Driver
			if(isset($value->driver)){
				$obj->driver_id = $value->driver->id;
			}else{
				isset($value->driver_id) ? $obj->driver_id 	= $value->driver_id : "";
			}
			$memo = "Purchase Power";
	   		if($obj->save($related)){
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
					"account_id" 				=> intval($obj->account_id),
					"discount_account_id" 		=> intval($obj->discount_account_id),
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
				   	"driver_name" 				=> $obj->driver_name,
				   	"bill_to" 					=> $obj->bill_to,
				   	"ship_to" 					=> $obj->ship_to,
				   	"memo" 						=> $memo,
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
					"reuse" 					=> intval($obj->reuse),
				   	"status" 					=> intval($obj->status),
				   	"progress" 					=> $obj->progress,
				   	"is_recurring" 				=> floatval($obj->is_recurring),
				   	"is_journal" 				=> $obj->is_journal,
				   	"print_count" 				=> $obj->print_count,
				   	"printed_by" 				=> $obj->printed_by,
				   	"deleted" 					=> $obj->deleted,
				   	"meter_id"					=> $obj->meter_id,
				   	"amount_paid"				=> 0,

				   	"truck_number"				=> $obj->truck_number,
				   	"driver_id"					=> $obj->driver_id,
				   	"time_batched"				=> $obj->time_batched,
				   	"time_of_discharge"			=> $obj->time_of_discharge,
				   	"time_of_completion"		=> $obj->time_of_completion,
				   	"cubic_meter"				=> $obj->cubic_meter,
				   	"total_batch"				=> $obj->total_batch,

				   	"contact" 					=> $contact,
				   	"driver" 					=> []
			   	);
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}

	//PUT
	function electricity_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {
			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);			

			isset($value->company_id) 				? $obj->company_id 					= $value->company_id : "";
			isset($value->location_id) 				? $obj->location_id 				= $value->location_id : "";
			isset($value->contact_id) 				? $obj->contact_id 					= $value->contact_id : "";
			isset($value->payment_term_id) 			? $obj->payment_term_id 			= $value->payment_term_id : "";
			isset($value->payment_method_id) 		? $obj->payment_method_id 			= $value->payment_method_id : "";
			isset($value->transaction_template_id) 	? $obj->transaction_template_id 	= $value->transaction_template_id : "";
			isset($value->reference_id) 			? $obj->reference_id 				= $value->reference_id : "";
			isset($value->recurring_id) 			? $obj->recurring_id 				= $value->recurring_id : "";
			isset($value->return_id) 				? $obj->return_id 					= $value->return_id : "";
			isset($value->job_id) 					? $obj->job_id 						= $value->job_id : "";
			isset($value->account_id) 				? $obj->account_id 					= $value->account_id : "";
			isset($value->discount_account_id) 		? $obj->discount_account_id 		= $value->discount_account_id : "";
			isset($value->item_id) 					? $obj->item_id 					= $value->item_id : "";
			isset($value->tax_item_id) 				? $obj->tax_item_id 				= $value->tax_item_id : "";
			isset($value->wht_account_id) 			? $obj->wht_account_id 				= $value->wht_account_id : "";
			isset($value->user_id) 					? $obj->user_id 					= $value->user_id : "";
			isset($value->employee_id) 				? $obj->employee_id 				= $value->employee_id : "";
			isset($value->number) 					? $obj->number 						= $value->number : "";
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
		   	// isset($value->references) 				? $obj->references 					= implode(",", $value->references) : "";
		   	isset($value->segments) 				? $obj->segments 					= implode(",", $value->segments) : "";
		   	isset($value->driver_name) 				? $obj->driver_name 				= $value->driver_name : "";
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
		   	isset($value->reuse) 					? $obj->reuse 						= $value->reuse : "";
		   	isset($value->status) 					? $obj->status 						= $value->status : "";
		   	isset($value->progress) 				? $obj->progress 					= $value->progress : "";
		   	isset($value->is_recurring) 			? $obj->is_recurring 				= $value->is_recurring : "";
		   	isset($value->is_journal) 				? $obj->is_journal 					= $value->is_journal : "";
		   	isset($value->print_count) 				? $obj->print_count 				= $value->print_count : "";
		   	isset($value->printed_by) 				? $obj->printed_by 					= $value->printed_by : "";
		   	isset($value->deleted) 					? $obj->deleted 					= $value->deleted : "";
		   	isset($value->meter_id) 				? $obj->meter_id 					= $value->meter_id : "";

		   	isset($value->truck_number) 			? $obj->truck_number 				= $value->truck_number : "";
		   	isset($value->driver_id) 				? $obj->driver_id 					= $value->driver_id : "";
		   	isset($value->time_batched) 			? $obj->time_batched 				= $value->time_batched : "";
		   	isset($value->time_of_discharge) 		? $obj->time_of_discharge 			= $value->time_of_discharge : "";
		   	isset($value->time_of_completion) 		? $obj->time_of_completion 			= $value->time_of_completion : "";
		   	isset($value->cubic_meter) 				? $obj->cubic_meter 				= $value->cubic_meter : "";
		   	isset($value->total_batch) 				? $obj->total_batch 				= $value->total_batch : "";

		   	$contact = [];
			if(isset($value->contact)){
				$contact = $value->contact;
			}

		   	$related = [];

		   	//References
			if(isset($value->references)){
				$ids = [];
				foreach ($value->references as $val) {
					array_push($ids, $val->id);
				}

				if(count($ids)>0){
					//Remove previouse segments
			   		$referenceDel = $obj->transaction->get();
			   		$refDelIds = [];
			   		foreach ($referenceDel as $refDel) {
			   			array_push($refDelIds, $refDel->id);
			   		}			   		
			   		$obj->delete($referenceDel->all);
			   		//Reverse reference status
			   		$refDowndate = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   				$refDowndate->where_in("id", $refDelIds);
	   				$refDowndate->update("status", 0);

			   		//Update references status
		   			if(count($ids)>0){
			   			$referenceUpdate = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   				$referenceUpdate->where_in("id", $ids);
		   				$referenceUpdate->update("status", 1);

		   				$referenceTxn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   				$referenceTxn->where_in("id", $ids);
		   				$referenceTxn->get();

		   				array_push($related, $referenceTxn->all);
	   				}
			   	}
			}

			//Segments
			if(isset($value->segments)){
				if(count($value->segments)>0){
					//Remove previouse segments
			   		$segmentDel = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			   		$segmentDel->transaction->get();
			   		$obj->delete($segmentDel->all);

			   		//Add new segments
			   		$segmentTxn = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			   		$segmentTxn->where_in("id", $value->segments)->get();

			   		array_push($related, $segmentTxn->all);
			   	}
			}
			$memo = "Purchase Power";
			if($obj->save($related)){
				//Results
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
					"account_id" 				=> intval($obj->account_id),
					"discount_account_id" 		=> intval($obj->discount_account_id),
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
				   	"driver_name" 				=> $obj->driver_name,
				   	"bill_to" 					=> $obj->bill_to,
				   	"ship_to" 					=> $obj->ship_to,
				   	"memo" 						=> $memo,
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
					"reuse" 					=> intval($obj->reuse),
				   	"status" 					=> intval($obj->status),
				   	"progress" 					=> $obj->progress,
				   	"is_recurring" 				=> floatval($obj->is_recurring),
				   	"is_journal" 				=> $obj->is_journal,
				   	"print_count" 				=> $obj->print_count,
				   	"printed_by" 				=> $obj->printed_by,
				   	"deleted" 					=> $obj->deleted,
				   	"meter_id"					=> $obj->meter_id,
				   	"amount_paid"				=> 0,

				   	"truck_number"				=> $obj->truck_number,
				   	"driver_id"					=> $obj->driver_id,
				   	"time_batched"				=> $obj->time_batched,
				   	"time_of_discharge"			=> $obj->time_of_discharge,
				   	"time_of_completion"		=> $obj->time_of_completion,
				   	"cubic_meter"				=> $obj->cubic_meter,
				   	"total_batch"				=> $obj->total_batch,

				   	"contact" 					=> $contact,
				   	"driver" 					=> []
				);
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}

	//DELETE
	function electricity_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
/* End of file transactions.php */
/* Location: ./application/controllers/api/transaction.php */
