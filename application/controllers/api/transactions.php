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
				if($value->type=="Commercial_Invoice" || $value->type=="Vat_Invoice" || $value->type=="Invoice" || $value->type=="Credit_Purchase" || $value->type=="Water_Invoice" || $value->type=="Water_Invoice" || $value->type=="Electricity_Invoice"){
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
				   	"is_recurring" 				=> floatval($value->is_recurring),
				   	"is_journal" 				=> $value->is_journal,
				   	"print_count" 				=> $value->print_count,
				   	"printed_by" 				=> $value->printed_by,
				   	"deleted" 					=> $value->deleted,

				   	"amount_paid"				=> $amount_paid
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
			isset($value->payment_term_id) 			? $obj->payment_term_id 			= $value->payment_term_id : "";
			isset($value->payment_method_id) 		? $obj->payment_method_id 			= $value->payment_method_id : "";
			isset($value->transaction_template_id) 	? $obj->transaction_template_id 	= $value->transaction_template_id : "";
			isset($value->reference_id) 			? $obj->reference_id 				= $value->reference_id : "";
			isset($value->recurring_id) 			? $obj->recurring_id 				= $value->recurring_id : "";
			isset($value->return_id) 				? $obj->return_id 					= $value->return_id : "";
			isset($value->job_id) 					? $obj->job_id 						= $value->job_id : "";
			isset($value->account_id) 				? $obj->account_id 					= $value->account_id : "";
			isset($value->item_id) 					? $obj->item_id 					= $value->item_id : "";
			isset($value->tax_item_id) 				? $obj->tax_item_id 				= $value->tax_item_id : "";
			isset($value->user_id) 					? $obj->user_id 					= $value->user_id : "";
			isset($value->employee_id) 				? $obj->employee_id 				= $value->employee_id : "";
			$obj->number = $number;
		   	isset($value->reference_no) 			? $obj->reference_no 				= $value->reference_no : "";
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
		   	isset($value->is_recurring) 			? $obj->is_recurring 				= $value->is_recurring : "";
		   	isset($value->is_journal) 				? $obj->is_journal 					= $value->is_journal : "";
		   	isset($value->print_count) 				? $obj->print_count 				= $value->print_count : "";
		   	isset($value->printed_by) 				? $obj->printed_by 					= $value->printed_by : "";
		   	isset($value->deleted) 					? $obj->deleted 					= $value->deleted : "";
		   	
	   		if($obj->save()){
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
					"user_id" 					=> $obj->user_id,
					"employee_id" 				=> $obj->employee_id,
					"number" 					=> $obj->number,
				   	"reference_no" 				=> $obj->reference_no,
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
				   	"segments" 					=> explode(",", $obj->segments),
				   	"bill_to" 					=> $obj->bill_to,
				   	"ship_to" 					=> $obj->ship_to,
				   	"memo" 						=> $obj->memo,
				   	"memo2" 					=> $obj->memo2,
				   	"recurring_name" 			=> $obj->recurring_name,
				   	"start_date"				=> $obj->start_date,
					"frequency"					=> $obj->frequency,
					"month_option"				=> $obj->month_option,
					"interval" 					=> $obj->interval,
					"day" 						=> $obj->day,
					"week" 						=> $obj->week,
					"month" 					=> $obj->month,
				   	"status" 					=> $obj->status,
				   	"is_recurring" 				=> floatval($obj->is_recurring),
				   	"is_journal" 				=> $obj->is_journal,
				   	"print_count" 				=> $obj->print_count,
				   	"printed_by" 				=> $obj->printed_by,
				   	"deleted" 					=> $obj->deleted,

				   	"amount_paid"				=> 0
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
			isset($value->item_id) 					? $obj->item_id 					= $value->item_id : "";
			isset($value->tax_item_id) 				? $obj->tax_item_id 				= $value->tax_item_id : "";
			isset($value->user_id) 					? $obj->user_id 					= $value->user_id : "";
			isset($value->employee_id) 				? $obj->employee_id 				= $value->employee_id : "";
			isset($value->number) 					? $obj->number 						= $value->number : "";
		   	isset($value->reference_no) 			? $obj->reference_no 				= $value->reference_no : "";
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
		   	isset($value->is_recurring) 			? $obj->is_recurring 				= $value->is_recurring : "";
		   	isset($value->is_journal) 				? $obj->is_journal 					= $value->is_journal : "";
		   	isset($value->print_count) 				? $obj->print_count 				= $value->print_count : "";
		   	isset($value->printed_by) 				? $obj->printed_by 					= $value->printed_by : "";
		   	isset($value->deleted) 					? $obj->deleted 					= $value->deleted : "";

			if($obj->save()){
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
					"account_id" 				=> $obj->account_id,
					"item_id" 					=> $obj->item_id,
					"tax_item_id" 				=> $obj->tax_item_id,
					"user_id" 					=> $obj->user_id,
					"employee_id" 				=> $obj->employee_id,
					"number" 					=> $obj->number,
				   	"reference_no" 				=> $obj->reference_no,
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
				   	"segments" 					=> explode(",", $obj->segments),
				   	"bill_to" 					=> $obj->bill_to,
				   	"ship_to" 					=> $obj->ship_to,
				   	"memo" 						=> $obj->memo,
				   	"memo2" 					=> $obj->memo2,
				   	"recurring_name" 			=> $obj->recurring_name,
				   	"start_date"				=> $obj->start_date,
					"frequency"					=> $obj->frequency,
					"month_option"				=> $obj->month_option,
					"interval" 					=> $obj->interval,
					"day" 						=> $obj->day,
					"week" 						=> $obj->week,
					"month" 					=> $obj->month,
				   	"status" 					=> $obj->status,
				   	"is_recurring" 				=> floatval($obj->is_recurring),
				   	"is_journal" 				=> $obj->is_journal,
				   	"print_count" 				=> $obj->print_count,
				   	"printed_by" 				=> $obj->printed_by,
				   	"deleted" 					=> $obj->deleted,
				   	
				   	"amount_paid"				=> 0
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


	//GET AMOUNT SUM
	function amount_sum_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		//Filter
		if(!empty($filters) && isset($filters)){
	    	foreach ($filters as $value) {
	    		if(!empty($value["operator"]) && isset($value["operator"])){
		    		if($value["operator"]=="where_in"){
		    			$obj->where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_in"){
		    			$obj->or_where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="where_not_in"){
		    			$obj->where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_not_in"){
		    			$obj->or_where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="like"){
		    			$obj->like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_like"){
		    			$obj->or_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="not_like"){
		    			$obj->not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_not_like"){
		    			$obj->or_not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="startswith"){
		    			$obj->like($value["field"], $value["value"], "after");
		    		}else if($value["operator"]=="endswith"){
		    			$obj->like($value["field"], $value["value"], "before");
		    		}else if($value["operator"]=="contains"){
		    			$obj->like($value["field"], $value["value"], "both");
		    		}else if($value["operator"]=="or_where"){
		    			$obj->or_where($value["field"], $value["value"]);
		    		}else{
		    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
		    		}
	    		}else{
	    			if($value["field"]=="is_recurring"){
	    				$is_recurring = $value["value"];
	    			}else if($value["field"]=="deleted"){
	    				$deleted = $value["value"];
	    			}else{
	    				$obj->where($value["field"], $value["value"]);
	    			}
	    		}
			}
		}

		$obj->select_sum("amount");
		$obj->where("is_recurring", $is_recurring);
		$obj->where("deleted", $deleted);
		$obj->get();

		$data["results"][] = array(
			"amount" => floatval($obj->amount)
		);

		//Response Data
		$this->response($data, 200);
	}

	//GET STATEMENT
	function statement_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$startDate = "";
		$typeList = array("Commercial_Invoice", "Vat_Invoice", "Invoice", "Commercial_Cash_Sale", "Vat_Cash_Sale", "Cash_Sale", "Deposit", "Cash_Receipt", "Sale_Return");

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
	    		$obj->where($value["field"], $value["value"]);

	    		if($value["field"]=="issued_date >=" || $value["field"]=="issued_date"){
	    			$startDate = $value["value"];
	    		}
			}
		}

		$obj->where_in("type", $typeList);
		$obj->where("is_recurring", 0);
		$obj->where("deleted", 0);
		$obj->order_by("issued_date", "asc");
		$obj->order_by("number", "asc");
		$obj->get_iterated();

		//Balance Forward
		$balance = 0;
		if($startDate!==""){
			$bf = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$bf->where("issued_date <", $startDate);
			$bf->where_in("type", $typeList);
			$bf->where("is_recurring", 0);
			$bf->where("deleted", 0);
			$bf->get_iterated();

			foreach ($bf as $value) {
				$balance += floatval($value->amount) - floatval($value->deposit);
			}

		    $bfDate = strtotime($startDate);
		    $bfDate = strtotime("-1 day", $bfDate);

			$data["results"][] = array(
				"id" 				=> 0,
				"issued_date"		=> date('Y-m-d', $bfDate),
				"type" 				=> "Balance Forward",
				"job" 				=> "",
			   	"reference_no" 		=> "",
			   	"amount" 			=> $balance,
			   	"balance" 			=> $balance,
			   	"rate" 				=> $bf->rate,
			   	"locale" 			=> $bf->locale
			);
		}

		if($obj->exists()){
			foreach ($obj as $value) {
				$amount = floatval($value->amount) - floatval($value->deposit);
				$balance += $amount;

				$data["results"][] = array(
					"id" 				=> 0,
					"issued_date"		=> $value->issued_date,
					"type" 				=> $value->type,
					"job" 				=> $value->job->get()->name,
				   	"reference_no" 		=> $value->number,
				   	"amount" 			=> $amount,
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
							"unit_value" 	=> floatval($p->unit_value),
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


	// //POST PAYMENT
	// function payment_post() {
	// 	$models = json_decode($this->post('models'));
	// 	$data["results"] = array();
	// 	$data["count"] = 0;

	// 	foreach ($models as $value) {
	// 		$obj = new Payment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

	// 		$obj->company_id 		= isset($value->company_id)?$value->company_id:0;
	// 		$obj->contact_id 		= isset($value->contact_id)?$value->contact_id:0;
	// 		$obj->cashier_id		= isset($value->cashier_id)?$value->cashier_id:0;
	// 		$obj->meter_id 			= isset($value->meter_id)?$value->meter_id:0;
	// 	   	$obj->reference_id 		= isset($value->reference_id)?$value->reference_id:0;
	// 	   	$obj->payment_method_id	= isset($value->payment_method_id)?$value->payment_method_id:0;
	// 	   	$obj->account_id		= isset($value->account_id)?$value->account_id:0;
	// 	   	$obj->check_no			= isset($value->check_no)?$value->check_no:"";
	// 	   	$obj->type 				= isset($value->type)?$value->type:"";
	// 	   	$obj->amount 			= isset($value->amount)?$value->amount:0;
	// 	   	$obj->fine 				= isset($value->fine)?$value->fine:0;
	// 	   	$obj->discount 			= isset($value->discount)?$value->discount:0;
	// 	   	$obj->payment_date 		= isset($value->payment_date)?$value->payment_date:"";
	// 	   	$obj->locale 			= isset($value->locale)?$value->locale:"";
	// 	   	$obj->rate 				= isset($value->rate)?$value->rate:0;
	// 	   	$obj->deleted			= isset($value->deleted)?$value->deleted:0;

	//    		if($obj->save()){
	//    			$inv = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	//    			$inv->get_by_id($obj->reference_id);

	//    			$inv->status 		= $value->status;
	//    			$inv->amount_paid 	+= $value->amount;
	//    			$inv->save();

	// 		   	$data["results"][] = array(
	// 		   		"id" 				=> $obj->id,
	// 		   		"company_id"		=> $obj->company_id,
	// 				"contact_id" 		=> $obj->contact_id,
	// 				"cashier_id" 		=> $obj->cashier_id,
	// 				"meter_id" 			=> $obj->meter_id,
	// 				"reference_id" 		=> $obj->reference_id,
	// 			   	"payment_method_id"	=> $obj->payment_method_id,
	// 			   	"account_id"		=> $obj->account_id,
	// 			   	"check_no"			=> $obj->check_no,
	// 			   	"type" 				=> $obj->type,
	// 			   	"amount" 			=> floatval($obj->amount),
	// 			   	"fine" 				=> floatval($obj->fine),
	// 			   	"discount" 			=> floatval($obj->discount),
	// 			   	"payment_date" 		=> $obj->payment_date,
	// 			   	"locale" 			=> $obj->locale,
	// 			   	"rate"				=> floatval($obj->rate),
	// 			   	"deleted" 			=> $obj->deleted,
	// 		   	);
	// 	    }
	// 	}

	// 	$data["count"] = count($data["results"]);
	// 	$this->response($data, 201);
	// }

	// //PRINT
	// function print_get() {
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 0;

	// 	$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

	// 	//Sort
	// 	if(!empty($sort) && isset($sort)){
	// 		foreach ($sort as $value) {
	// 			$obj->order_by($value["field"], $value["dir"]);
	// 		}
	// 	}

	// 	//Filter
	// 	foreach ($filters as $value) {
 //    		if($value["field"]=="id"){
 //    			$obj->where($value["field"], $value["value"]);
 //    		}

 //    		if($value["field"]=="month_of"){
 //    			$obj->where($value["field"], $value["value"]);
 //    		}

 //    		if($value["field"]=="location_id"){
 //    			$obj->where_related("location", "id", $value["value"]);
 //    		}
	// 	}

	// 	$obj->include_related('contact', array('id', 'number', 'surname', 'name', 'address'));
	// 	$obj->include_related('company', array('name', 'mobile', 'phone', 'address', 'term_of_condition', 'image_url'));
	// 	$obj->include_related('location', 'name');
	// 	//$obj->include_related('invoice_line/meter_record', array('from_date', 'to_date'), FALSE);
	// 	// $obj->include_related('invoice_line/meter_record/meter/electricity_box', 'number');

	// 	if(!empty($limit) && !empty($page)){
	// 		$obj->get_paged_iterated($page, $limit);
	// 		$data["count"] = $obj->paged->total_rows;
	// 	}

	// 	if($obj->exists()) {
	// 		foreach ($obj as $value) {
	// 			//Invoice Line
	// 			$value->invoice_line->get();
	// 			$invoiceLineList = [];

	// 			foreach ($value->invoice_line as $line) {
	// 				$meters = array();
	// 				if(intval($line->meter_record_id)>0){
	// 		    		$mr = $line->meter_record;
	// 		    		$mr->include_related('meter', array('number', 'multiplier', 'max_number', 'electricity_box_id'), FALSE);
	// 		    		$mr->get();

	// 					$bno = "";
	// 					if($mr->electricity_box_id){
	// 		    			$eb = new Electricity_box(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 		    			$eb->get_by_id($mr->electricity_box_id);
	// 		    			$bno = $eb->number;
	// 		    		}

	// 		    		$meters = array(
	// 		    			"previous"	=> intval($mr->previous),
	// 		    			"current" 	=> intval($mr->current),
	// 		    			"from_date" => $mr->from_date,
	// 		    			"to_date" 	=> $mr->to_date,

	// 		    			"number"	=> $mr->number,
	// 		    			"multiplier"=> $mr->multiplier,
	// 		    			"max_number"=> $mr->max_number,
	// 		    			"electricity_box_number" => $bno
	// 		    		);
	// 	    		}

	// 				$invoiceLineList[] = array(
	//    					"id" 				=> $line->id,
	//    					"invoice_id"		=> $line->invoice_id,
	// 		   			"item_id"			=> $line->item_id,
	// 		   			"meter_record_id" 	=> $line->meter_record_id,
	// 		   			"description" 		=> $line->description,
	// 		   			"unit"				=> $line->unit,
	// 		   			"price" 			=> floatval($line->price),
	// 		   			"amount" 			=> floatval($line->amount),
	// 		   			"rate"				=> floatval($line->rate),
	// 		   			"locale" 			=> $line->locale,
	// 		   			"has_vat" 			=> $line->has_vat,

	// 		   			"meters" 			=> $meters
	//    				);
	// 			}

	// 			//Company
	// 			$companies = array(
	// 				"name" => $value->company_name,
	// 				"mobile" => $value->company_mobile,
	// 				"phone" => $value->company_phone,
	// 				"address" => $value->company_address,
	// 				"term_of_condition" => $value->company_term_of_condition,
	// 				"image_url" => $value->company_image_url
	// 			);

	// 			//Customer
	// 			$customers = array(
	// 				"number" 	=> $value->contact_number,
	// 				"fullname" 	=> $value->contact_surname.' '.$value->contact_name,
	// 				"address" 	=> $value->contact_address
	// 			);

	// 			//Balance forward
	// 			$bf = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 			$bf->select_sum('amount');
	// 			$bf->where_related('contact', 'id', $value->contact_id);
	// 			$bf->where('status', 0);
	// 			$bf->where('type', 'eInvoice');
	// 			$bf->where_in('type', array('Invoice', 'eInvoice'));
	// 			$bf->where('month_of <', $value->month_of);
	// 			$bf->get();

	// 			$total = floatval($value->amount) + floatval($bf->amount);

	// 			//Results
	// 			$data["results"][] = array(
	// 				"id" 				=> $value->id,
	// 		   		"type" 				=> $value->type,
	// 			   	"number" 			=> $value->number,
	// 			   	"amount" 			=> floatval($value->amount),
	// 			   	"vat" 				=> $value->vat,
	// 			   	"rate" 				=> floatval($value->rate),
	// 			   	"locale" 			=> $value->locale,
	// 			   	"month_of" 			=> $value->month_of,
	// 			   	"issued_date"		=> $value->issued_date,
	// 			   	"payment_date" 		=> $value->payment_date,
	// 			   	"due_date" 			=> $value->due_date,
	// 			   	"check_no" 			=> $value->check_no,
	// 			   	"memo" 				=> $value->memo,
	// 			   	"memo2" 			=> $value->memo2,
	// 			   	"status" 			=> $value->status,

	// 			   	"total"				=> $total,
	// 			   	"companies" 		=> $companies,
	// 			   	"customers" 		=> $customers,
	// 			   	"location_name" 	=> $value->location_name,
	// 			   	"balance_forward" 	=> floatval($bf->amount),
	// 			   	"invoiceLineList" 	=> $invoiceLineList
	// 			);
	// 		}
	// 	}

	// 	//Response Data
	// 	$this->response($data, 200);
	// }

	// //INVOICE TRANSACTION
	// function transaction_get() {
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 0;

	// 	$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

	// 	//Sort
	// 	if(!empty($sort) && isset($sort)){
	// 		$obj->order_by($this->_get_sorts($sort));
	// 	}

	// 	//Limit
	// 	if(!empty($limit) && isset($limit)){
	// 		$obj->limit($limit, $offset);
	// 	}

	// 	//Filter
	// 	if(!empty($filters) && isset($filters)){
	// 		if($filters[0]["field"]=="id"){
	// 			$obj->where($filters[0]["field"], $filters[0]["value"]);
	// 		}else{
	// 			$obj->where($filters[0]["field"], $filters[0]["value"]);
	// 			$obj->where_related("invoice_line/meter_record/meter", $filters[1]["field"], $filters[1]["value"]);
	// 		}

	// 		$obj->include_related('contact', array('number', 'surname', 'name'));


	// 		$obj->get_iterated();
	// 		if($obj->exists()) {
	// 			foreach ($obj as $value) {
	// 				//Results
	// 				$data["results"][] = array(

	// 				);
	// 			}
	// 		}

	// 		$data["total"] = count($data["results"]);
	// 	}

	// 	//Response Data
	// 	$this->response($data, 200);
	// }

	// //OUTSTANDING
	// function outstanding_get(){
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 6;

	// 	//Locale
	// 	$locale = "km-KH";
	// 	if(!empty($filters) && isset($filters)){
	// 		$customer = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 		$customer->where("id", $filters[0]["value"]);
	// 		$customer->get();
	// 		$locale = $customer->currency->get()->locale;
	// 	}else{
	// 		$company = new Company(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 		$company->get();
	// 		foreach ($company as $value) {
	// 			$locale = $value->currency->get()->locale;
	// 			break;
	// 		}
	// 	}
	// 	$data["results"][] = array("locale"=>$locale);

	// 	//Estimate
	// 	$est = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	if(!empty($filters) && isset($filters)){
	// 		$est->where($filters[0]["field"], $filters[0]["value"]);
	// 	}
	// 	$est->where("type", "Estimate");
	// 	$est->where("status", 0);
	// 	$data["results"][] = array("totalEstimate"=>$est->count());

	// 	//SO
	// 	$so = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	if(!empty($filters) && isset($filters)){
	// 		$so->where($filters[0]["field"], $filters[0]["value"]);
	// 	}
	// 	$so->where("type", "SO");
	// 	$so->where("status", 0);
	// 	$data["results"][] = array("totalSO"=>$so->count());

	// 	//Invoice
	// 	$inv = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	if(!empty($filters) && isset($filters)){
	// 		$inv->where($filters[0]["field"], $filters[0]["value"]);
	// 	}
	// 	$inv->where_in("type", array("Invoice", "eInvoice", "Notice"));
	// 	$inv->where_in("status", array(0,2));
	// 	$inv->get();
	// 	$data["results"][] = array("totalOpenInvoice"=>$inv->result_count());

	// 	$overDue = 0;
	// 	$bal = 0;
	// 	foreach ($inv as $value) {
	// 		$bal += floatval($value->amount);
	// 		$today = new DateTime();
	// 		$dueDate = new DateTime($value->due_date);
	// 		if($dueDate<$today){
	// 			$overDue++;
	// 		}
	// 	}
	// 	$data["results"][] = array("totalOverDue"=>$overDue);
	// 	$data["results"][] = array("balance"=>$bal);

	// 	$this->response($data, 200);
	// }

	// //GET MONTHLY SALE
	// function monthly_sale_get() {
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 0;

	// 	$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

	// 	//Filter
	// 	if(!empty($filters) && isset($filters)){
	//     	foreach ($filters as $value) {
	//     		$obj->where($value["field"], $value["value"]);
	// 		}
	// 	}

	// 	$obj->where_in("type", ["Invoice","Receipt"]);
	// 	$obj->where("issued_date >=", date("Y")."-01-01");
	// 	$obj->where("issued_date <=", date("Y")."-12-31");
	// 	$obj->order_by("issued_date");
	// 	$obj->get();

	// 	if($obj->result_count()>0){
	// 		foreach ($obj as $value) {
	// 			$data["results"][] = array(
	// 			   	"amount" 		=> floatval($value->amount),
	// 			   	"month"			=> date('F', strtotime($value->issued_date))
	// 			);
	// 		}
	// 	}

	// 	//Response Data
	// 	$this->response($data, 200);
	// }

	// //GET MONTHLY EXPENSE
	// function monthly_expense_get() {
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 0;

	// 	$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

	// 	//Filter
	// 	if(!empty($filters) && isset($filters)){
	//     	foreach ($filters as $value) {
	//     		$obj->where($value["field"], $value["value"]);
	// 		}
	// 	}

	// 	$obj->where_in("type", array("Purchase","Expense"));
	// 	$obj->where("issued_date >=", date("Y")."-01-01");
	// 	$obj->where("issued_date <=", date("Y")."-12-31");
	// 	$obj->order_by("issued_date");
	// 	$obj->get();

	// 	if($obj->result_count()>0){
	// 		foreach ($obj as $value) {
	// 			$data["results"][] = array(
	// 			   	"amount" 		=> floatval($value->amount),
	// 			   	"month"			=> date('F', strtotime($value->issued_date))
	// 			);
	// 		}
	// 	}

	// 	//Response Data
	// 	$this->response($data, 200);
	// }

	// //GET HOME DASHBOARD
	// function home_dashboard_get() {
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 1;

	// 	$sale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$inv = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$bill = new Bill(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$cus = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$order = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

	// 	//Sort
	// 	if(!empty($sort) && isset($sort)){
	// 		foreach ($sort as $value) {
	// 			$sale->order_by($value["field"], $value["dir"]);
	// 		}
	// 	}

	// 	//Filter
	// 	if(!empty($filters) && isset($filters)){
	//     	foreach ($filters as $value) {
	//     		$sale->where($value["field"]." ".$value["operatoin"], $value["value"]);
	//     		$inv->where($value["field"]." ".$value["operatoin"], $value["value"]);
	//     		$bill->where("expected_date"." ".$value["operatoin"], $value["value"]);
	//     		$order->where($value["field"]." ".$value["operatoin"], $value["value"]);

	//     		if($value["operatoin"]=="<="){
	//     			$cus->where("registered_date"." ".$value["operatoin"], $value["value"]);
	//     		}
	// 		}
	// 	}

	// 	//Results
	// 	$sale->select_sum("amount");
	// 	$sale->where_in("type", array("Invoice", "Receipt", "eInvoice", "wInvoice"));
	// 	$sale->get();

	// 	$inv->where_in("type", array("Invoice", "eInvoice", "wInvoice"));
	// 	$inv->where_in("status", array(0,2));

	// 	$bill->where("type", "bill");
	// 	$bill->where_in("status", array(0,2));

	// 	$cus->where_related("contact_type", "parent_id", 1);

	// 	$order->where("type", "SO");
	// 	$order->where("status", 0);

	// 	$data["results"][] = array(
	// 		"id" 				=> 1,
	// 		"totalSale" 		=> floatval($sale->amount),
	// 		"totalOpenInvoice" 	=> $inv->count(),
	// 		"totalUnbill" 		=> $bill->count(),
	// 		"totalCustomer" 	=> $cus->count(),
	// 		"totalOrder" 		=> $order->count()
	// 	);

	// 	//Response Data
	// 	$this->response($data, 200);
	// }



	//ELECTRICITY
	//GET ELECTRICTY MONTHLY
	// function emonthly_get() {
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 0;

	// 	$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$obj->where_in("type", array("invoice", "receipt", "eInvoice"));
	// 	$obj->where("issued_date >=", date("Y")."-01-01");
	// 	$obj->where("issued_date <=", date("Y")."-12-31");
	// 	$obj->where_in("type", array('invoice','eInvoice','wInvoice'));
	// 	$obj->order_by("issued_date");
	// 	$obj->get();

	// 	if($obj->result_count()>0){
	// 		foreach ($obj as $value) {
	// 			$data["results"][] = array(
	// 			   	"amount" 		=> floatval($value->amount),
	// 			   	"issued_date"	=> date('F', strtotime($value->issued_date))
	// 			);
	// 		}
	// 	}

	// 	//Response Data
	// 	$this->response($data, 200);
	// }

	// //GET ELECTRICYT DASHBOARD
	// function edashboard_get() {
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 50;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 0;

	// 	// 0 Balance
	// 	$balance = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$balance->select_sum("amount");
	// 	$balance->where_in("type", array("eInvoice",));
	// 	$balance->get();
	// 	$data["results"][] = floatval($balance->amount);

	// 	// 1 Deposit
	// 	$deposit = new Payment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$deposit->select_sum("amount");
	// 	$deposit->where("type", "deposit");
	// 	$deposit->where_related("meter", "utility_id", 1);
	// 	$deposit->get();
	// 	$data["results"][] = floatval($deposit->amount);

	// 	// 2 Active Customer
	// 	$activeCustomer = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$activeCustomer->where("status", 1);
	// 	$activeCustomer->where("deleted", 0);
	// 	$activeCustomer->where_in("contact_type_id", array(3,4,5,6,7));
	// 	$activeCustomer->where_related("meter", "utility_id", 1);
	// 	$data["results"][] = intval($activeCustomer->count());

	// 	// 3 Inactive Customer
	// 	$inactiveCustomer = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$inactiveCustomer->where("status", 0);
	// 	$inactiveCustomer->where("deleted", 0);
	// 	$inactiveCustomer->where_in("contact_type_id", array(3,4,5,6,7));
	// 	$inactiveCustomer->where_related("meter", "utility_id", 1);
	// 	$data["results"][] = intval($inactiveCustomer->count());

	// 	// 4 Void Customer
	// 	$voidCustomer = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$voidCustomer->where("status", 2);
	// 	$voidCustomer->where("deleted", 0);
	// 	$voidCustomer->where_in("contact_type_id", array(3,4,5,6,7));
	// 	$voidCustomer->where_related("meter", "utility_id", 1);
	// 	$data["results"][] = intval($voidCustomer->count());

	// 	// 5 Total Customer
	// 	$totalCustomer = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$totalCustomer->where("deleted", 0);
	// 	$totalCustomer->where_in("contact_type_id", array(3,4,5,6,7));
	// 	$totalCustomer->where_related("meter", "utility_id", 1);
	// 	$data["results"][] = intval($totalCustomer->count());

	// 	// 6 Unpaid
	// 	$unpaid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$unpaid->where("type", "eInvoice");
	// 	$unpaid->where("status", 0);
	// 	$unpaid->group_by("contact_id");
	// 	$unpaid->get();
	// 	$data["results"][] = intval($unpaid->result_count());

	// 	// 7 Disconnect
	// 	$dc = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$dc->where("type", "eInvoice");
	// 	$dc->where("status", 0);
	// 	$dc->where("due_date <", date("Y-m-d"));
	// 	$dc->group_by("contact_id");
	// 	$dc->get();
	// 	$data["results"][] = intval($dc->result_count());

	// 	//Response Data
	// 	$this->response($data, 200);
	// }

	// //GET ELECTRICYT SALE BY LOCATION
	// function esale_by_location_get() {
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 50;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 1;

	// 	$sale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$usage = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$unpaid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$deposit = new Payment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

	// 	//Filter
	// 	if(!empty($filters) && isset($filters)){
	//     	foreach ($filters as $value) {
	//     		$sale->where($value["field"], $value["value"]);
	//     		$unpaid->where($value["field"], $value["value"]);
	//     		$deposit->where("payment_date", $value["value"]);
	// 		}
	// 	}

	// 	//Location
	// 	$location = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$location->where("utility_id", 1);
	// 	$location->get();

	// 	foreach ($location as $value){
	// 		//Active Customer
	// 		$activeCustomer = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 		$activeCustomer->where("status", 1);
	// 		$activeCustomer->where("deleted", 0);
	// 		$activeCustomer->where_related("meter", "location_id", $value->id);

	// 		//Inactive Customer
	// 		$inactiveCustomer = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 		$inactiveCustomer->where("status", 0);
	// 		$inactiveCustomer->where("deleted", 0);
	// 		$inactiveCustomer->where_related("meter", "location_id", $value->id);

	// 		//Deposit
	// 		$deposit->select_sum('amount');
	// 		$deposit->where("type", "deposit");
	// 		$deposit->where_related("meter", "location_id", $value->id);
	// 		$deposit->where("deleted", 0);
	// 		$deposit->get();

	// 		//Usage
	// 		$usage->select_sum('usage', 'totalUsage');
	// 		$usage->where_related("meter", "location_id", $value->id);
	// 		$usage->get();

	// 		//Sale
	// 		$sale->select_sum('amount');
	// 		$sale->where("type", "eInvoice");
	// 		$sale->where("location_id", $value->id);
	// 		$sale->where("deleted", 0);
	// 		$sale->get();

	// 		//Unpaid
	// 		$unpaid->select_sum('amount');
	// 		$unpaid->where("type", "eInvoice");
	// 		$unpaid->where("location_id", $value->id);
	// 		$unpaid->where("status", 0);
	// 		$unpaid->where("deleted", 0);
	// 		$unpaid->get();

	// 		$data["results"][] = array(
	// 			"location_name"		=> $value->name,
	// 			"active_customer" 	=> intval($activeCustomer->count()),
	// 			"inactive_customer" => intval($inactiveCustomer->count()),
	// 			"deposit" 			=> floatval($deposit->amount),
	// 			"usage" 			=> intval($usage->totalUsage),
	// 			"sale"				=> floatval($sale->amount),
	// 			"unpaid"			=> floatval($unpaid->amount)
	// 		);
	// 	}

	// 	//Response Data
	// 	$this->response($data, 200);
	// }


	// //WATER
	// //POST UINVOICE
	// function uInvoice_post() {
	// 	$models = json_decode($this->post('models'));
	// 	$data["results"] = array();
	// 	$data["count"] = 0;

	// 	$number = "";
	// 	foreach ($models as $value) {
	// 		if($number==""){
	// 			$number = $this->_generate_number($value->type);
	// 		}else{
	// 			$last_no = $number;
	// 			$header = substr($last_no, 0, -5);
	// 			$no = intval(substr($last_no, strlen($last_no) - 5));
	// 			$no++;
	// 			$number = $header . str_pad($no, 5, "0", STR_PAD_LEFT);
	// 		}

	// 		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 		$obj->company_id 		= $value->company_id;
	// 		$obj->location_id 		= $value->location_id;
	// 		$obj->contact_id 		= $value->contact_id;
	// 		$obj->payment_term_id	= $value->payment_term_id;
	// 		$obj->payment_method_id = $value->payment_method_id;
	// 		$obj->reference_id 		= $value->reference_id;
	// 		$obj->account_id 		= $value->account_id;
	// 		$obj->vat_id 			= $value->vat_id;
	// 		$obj->biller_id 		= $value->biller_id;
	// 	   	$obj->number 			= $number;
	// 	   	$obj->type 				= $value->type;
	// 	   	$obj->amount 			= $value->amount;
	// 	   	$obj->vat 				= $value->vat;
	// 	   	$obj->rate 				= $value->rate;
	// 	   	$obj->locale 			= $value->locale;
	// 	   	$obj->month_of 			= $value->month_of;
	// 	   	$obj->issued_date 		= $value->issued_date;
	// 	   	$obj->payment_date 		= $value->payment_date;
	// 	   	$obj->due_date 			= $value->due_date;
	// 	   	$obj->check_no 			= $value->check_no;
	// 	   	$obj->memo 				= $value->memo;
	// 	   	$obj->memo2 			= $value->memo2;
	// 	   	$obj->status 			= $value->status;

	//    		if($obj->save()){
	//    			$invoice_lines = [];
	// 	   		foreach ($value->invoice_lines as $row) {
	// 	   			$line = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	   			$line->invoice_id 		= $obj->id;
	// 	   			$line->item_id 			= $row->item_id;
	// 	   			$line->meter_record_id 	= $row->meter_record_id;
	// 	   			$line->description 		= $row->description;
	// 	   			$line->unit 			= $row->unit;
	// 	   			$line->price 			= $row->price;
	// 	   			$line->amount 			= $row->amount;
	// 	   			$line->rate 			= $row->rate;
	// 	   			$line->locale 			= $row->locale;
	// 	   			$line->has_vat 			= $row->has_vat;
	// 	   			$line->type 			= isset($row->type)?$row->type:"";

	// 	   			if($line->save()){
	// 	   				$invoice_lines[] = array(
	// 	   					"id" 				=> $line->id,
	// 	   					"invoice_id"		=> $line->invoice_id,
	// 			   			"item_id"			=> $line->item_id,
	// 			   			"measurement_id" 	=> isset($line->measurement_id)?$line->measurement_id:0,
	// 			   			"meter_record_id" 	=> $line->meter_record_id,
	// 			   			"description" 		=> $line->description,
	// 			   			"unit"				=> $line->unit,
	// 			   			"price" 			=> floatval($line->price),
	// 			   			"amount" 			=> floatval($line->amount),
	// 			   			"rate"				=> floatval($line->rate),
	// 			   			"locale" 			=> $line->locale,
	// 			   			"has_vat" 			=> $line->has_vat=="true"?true:false,
	// 			   			"type" 				=> $line->type
	// 	   				);
	// 	   			}
	// 	   		}

	// 		   	$data["results"][] = array(
	// 		   		"id" 				=> $obj->id,
	// 				"company_id" 		=> $obj->company_id,
	// 				"location_id" 		=> $obj->location_id,
	// 				"contact_id" 		=> $obj->contact_id,
	// 				"payment_term_id" 	=> $obj->payment_term_id,
	// 				"payment_method_id" => $obj->payment_method_id,
	// 				"reference_id" 		=> $obj->reference_id,
	// 				"account_id" 		=> $obj->account_id,
	// 				"vat_id"			=> $obj->vat_id,
	// 				"biller_id" 		=> $obj->biller_id,
	// 			   	"number" 			=> $obj->number,
	// 			   	"type" 				=> $obj->type,
	// 			   	"amount" 			=> floatval($obj->amount),
	// 			   	"vat" 				=> floatval($obj->vat),
	// 			   	"rate" 				=> floatval($obj->rate),
	// 			   	"locale" 			=> $obj->locale,
	// 			   	"month_of"			=> $obj->month_of,
	// 			   	"issued_date"		=> $obj->issued_date,
	// 			   	"payment_date" 		=> $obj->payment_date,
	// 			   	"due_date" 			=> $obj->due_date,
	// 			   	"check_no" 			=> $obj->check_no,
	// 			   	"memo" 				=> $obj->memo,
	// 			   	"memo2" 			=> $obj->memo2,
	// 			   	"status" 			=> $obj->status,

	// 			   	"invoice_lines" 	=> $invoice_lines
	// 		   	);
	// 	    }
	// 	}

	// 	$data["count"] = count($data["results"]);
	// 	$this->response($data, 201);
	// }

	// //GET WATER INVOICE PRINT
	// function wInvoice_print_get() {
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 0;

	// 	$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

	// 	//Sort
	// 	if(!empty($sort) && isset($sort)){
	// 		foreach ($sort as $value) {
	// 			$obj->order_by($value["field"], $value["dir"]);
	// 		}
	// 	}

	// 	//Filter
	// 	if(!empty($filters) && isset($filters)){
	//     	foreach ($filters as $value) {
	//     		if(!empty($value["operator"]) && isset($value["operator"])){
	// 	    		if($value["operator"]=="where_in"){
	// 	    			$obj->where_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_where_in"){
	// 	    			$obj->or_where_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="where_not_in"){
	// 	    			$obj->where_not_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_where_not_in"){
	// 	    			$obj->or_where_not_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="like"){
	// 	    			$obj->like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_like"){
	// 	    			$obj->or_like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="not_like"){
	// 	    			$obj->not_like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_not_like"){
	// 	    			$obj->or_not_like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="startswith"){
	// 	    			$obj->like($value["field"], $value["value"], "after");
	// 	    		}else if($value["operator"]=="endswith"){
	// 	    			$obj->like($value["field"], $value["value"], "before");
	// 	    		}else if($value["operator"]=="contains"){
	// 	    			$obj->like($value["field"], $value["value"], "both");
	// 	    		}else if($value["operator"]=="or_where"){
	// 	    			$obj->or_where($value["field"], $value["value"]);
	// 	    		}else{
	// 	    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
	// 	    		}
	//     		}else{
	//     			$obj->where($value["field"], $value["value"]);
	//     		}
	// 		}
	// 	}

	// 	//Order
	// 	$obj->order_by_related("contact", "worder", "asc");

	// 	//Results
	// 	$obj->get();

	// 	if($obj->exists()){
	// 		foreach ($obj as $value) {
	// 			//Balance forward
	// 			$bf = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 			$bf->select_sum('amount');
	// 			$bf->where('contact_id', $value->contact_id);
	// 			$bf->where('status', 0);
	// 			$bf->where_in('type', array('Invoice','wInvoice'));
	// 			$bf->where('month_of <', $value->month_of);
	// 			$bf->get();

	// 			$total = floatval($value->amount) + floatval($bf->amount);

	// 			//Invoice lines
	// 			$lines = $value->item_line->get();
	// 			$invoiceLines = [];
	// 			foreach ($lines as $l) {
	// 				$record = [];
	// 				$meter = [];
	// 				if($l->type=="tariff"){
	// 					$record = $l->meter_record->get_raw()->result();
	// 				   	$meter = $l->meter_record->get()->meter->get_raw()->result();
	// 				}

	// 				$invoiceLines[] = array(
	// 					"id" 				=> $l->id,
	// 			   		"invoice_id"		=> $l->invoice_id,
	// 					"item_id" 			=> $l->item_id,
	// 					"meter_record_id" 	=> $l->meter_record_id,
	// 				   	"description" 		=> $l->description,
	// 				   	"unit" 				=> intval($l->unit),
	// 				   	"price"				=> floatval($l->price),
	// 				   	"amount" 			=> floatval($l->amount),
	// 				   	"rate"				=> floatval($l->rate),
	// 				   	"locale" 			=> $l->locale,
	// 				   	"has_vat" 			=> $l->has_vat,
	// 				   	"type" 				=> $l->type,

	// 				   	"record" 			=> $record,
	// 				   	"meter" 			=> $meter
	// 				);
	// 			}

	// 			$data["results"][] = array(
	// 				"id" 				=> $value->id,
	// 				"company_id" 		=> $value->company_id,
	// 				"location_id" 		=> $value->location_id,
	// 				"contact_id" 		=> $value->contact_id,
	// 				"payment_term_id" 	=> $value->payment_term_id,
	// 				"payment_method_id" => $value->payment_method_id,
	// 				"reference_id" 		=> $value->reference_id,
	// 				"account_id" 		=> $value->account_id,
	// 				"vat_id"			=> $value->vat_id,
	// 				"biller_id" 		=> $value->biller_id,
	// 			   	"number" 			=> $value->number,
	// 			   	"type" 				=> $value->type,
	// 			   	"amount" 			=> floatval($value->amount),
	// 			   	"vat" 				=> floatval($value->vat),
	// 			   	"rate" 				=> floatval($value->rate),
	// 			   	"locale" 			=> $value->locale,
	// 			   	"month_of"			=> $value->month_of,
	// 			   	"issued_date"		=> $value->issued_date,
	// 			   	"payment_date" 		=> $value->payment_date,
	// 			   	"due_date" 			=> $value->due_date,
	// 			   	"check_no" 			=> $value->check_no,
	// 			   	"memo" 				=> $value->memo,
	// 			   	"memo2" 			=> $value->memo2,
	// 			   	"status" 			=> $value->status,
	// 			   	"print_count" 		=> $value->print_count,
	// 			   	"printed_by" 		=> $value->printed_by,

	// 			   	"total" 			=> $total,
	// 			   	"balance_forward" 	=> floatval($bf->amount),

	// 			   	"company" 			=> $value->company->get_raw()->result(),
	// 			   	"location" 			=> $value->location->get_raw()->result(),
	// 			   	"contact" 			=> $value->contact->get_raw()->result(),
	// 			   	"invoiceLines" 		=> $invoiceLines
	// 			);
	// 		}
	// 	}

	// 	$data["count"] = count($data["results"]);

	// 	//Response Data
	// 	$this->response($data, 200);
	// }

	// //PUT WATER INVOICE PRINT
	// function wInvoice_print_put() {
	// 	$models = json_decode($this->put('models'));
	// 	$data["results"] = array();
	// 	$data["count"] = 0;

	// 	foreach ($models as $value) {
	// 		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 		$obj->get_by_id($value->id);

	// 	   	$obj->print_count 		= isset($value->print_count) ? $value->print_count : 0;
	// 	   	$obj->printed_by 		= isset($value->printed_by) ? $value->printed_by : 0;

	// 		if($obj->save()){
	// 			//Results
	// 			$data["results"][] = array(
	// 				"id" 				=> $obj->id,
	// 			   	"print_count" 		=> $obj->print_count,
	// 			   	"printed_by" 		=> $obj->printed_by
	// 			);
	// 		}
	// 	}
	// 	$data["count"] = count($data["results"]);

	// 	$this->response($data, 200);
	// }

	// //GET WATER PRINT
	// function wprint_get() {
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 0;

	// 	$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

	// 	//Sort
	// 	if(!empty($sort) && isset($sort)){
	// 		foreach ($sort as $value) {
	// 			$obj->order_by($value["field"], $value["dir"]);
	// 		}
	// 	}

	// 	//Filter
	// 	if(!empty($filters) && isset($filters)){
	//     	foreach ($filters as $value) {
	//     		if(!empty($value["operator"]) && isset($value["operator"])){
	// 	    		if($value["operator"]=="where_in"){
	// 	    			$obj->where_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_where_in"){
	// 	    			$obj->or_where_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="where_not_in"){
	// 	    			$obj->where_not_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_where_not_in"){
	// 	    			$obj->or_where_not_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="like"){
	// 	    			$obj->like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_like"){
	// 	    			$obj->or_like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="not_like"){
	// 	    			$obj->not_like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_not_like"){
	// 	    			$obj->or_not_like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="startswith"){
	// 	    			$obj->like($value["field"], $value["value"], "after");
	// 	    		}else if($value["operator"]=="endswith"){
	// 	    			$obj->like($value["field"], $value["value"], "before");
	// 	    		}else if($value["operator"]=="contains"){
	// 	    			$obj->like($value["field"], $value["value"], "both");
	// 	    		}else if($value["operator"]=="or_where"){
	// 	    			$obj->or_where($value["field"], $value["value"]);
	// 	    		}else{
	// 	    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
	// 	    		}
	//     		}else{
	//     			$obj->where($value["field"], $value["value"]);
	//     		}
	// 		}
	// 	}

	// 	//Only water invoice
	// 	$obj->where("type", "wInvoice");
	// 	$obj->order_by_related("contact", "worder", "asc");

	// 	//Results
	// 	$obj->get_paged_iterated($page, $limit);
	// 	$data["count"] = $obj->paged->total_rows;

	// 	if($obj->result_count()>0){
	// 		foreach ($obj as $value) {
	// 			$data["results"][] = array(
	// 				"id" 				=> $value->id,
	// 			   	"number" 			=> $value->number,
	// 			   	"amount" 			=> floatval($value->amount),
	// 			   	"amount_paid"		=> floatval($value->amount_paid),
	// 			   	"status" 			=> $value->status,
	// 			   	"print_count" 		=> $value->print_count,

	// 			   	"contact" 			=> $value->contact->get_raw()->result()
	// 			);
	// 		}
	// 	}

	// 	//Response Data
	// 	$this->response($data, 200);
	// }

	// //GET WATER PRINT SNAPSHOT
	// function wprint_snapshot_get() {
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 0;

	// 	$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

	// 	//Sort
	// 	if(!empty($sort) && isset($sort)){
	// 		foreach ($sort as $value) {
	// 			$obj->order_by($value["field"], $value["dir"]);
	// 		}
	// 	}

	// 	//Filter
	// 	if(!empty($filters) && isset($filters)){
	//     	foreach ($filters as $value) {
	//     		if(!empty($value["operator"]) && isset($value["operator"])){
	// 	    		if($value["operator"]=="where_in"){
	// 	    			$obj->where_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_where_in"){
	// 	    			$obj->or_where_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="where_not_in"){
	// 	    			$obj->where_not_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_where_not_in"){
	// 	    			$obj->or_where_not_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="like"){
	// 	    			$obj->like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_like"){
	// 	    			$obj->or_like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="not_like"){
	// 	    			$obj->not_like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_not_like"){
	// 	    			$obj->or_not_like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="startswith"){
	// 	    			$obj->like($value["field"], $value["value"], "after");
	// 	    		}else if($value["operator"]=="endswith"){
	// 	    			$obj->like($value["field"], $value["value"], "before");
	// 	    		}else if($value["operator"]=="contains"){
	// 	    			$obj->like($value["field"], $value["value"], "both");
	// 	    		}else if($value["operator"]=="or_where"){
	// 	    			$obj->or_where($value["field"], $value["value"]);
	// 	    		}else{
	// 	    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
	// 	    		}
	//     		}else{
	//     			$obj->where($value["field"], $value["value"]);
	//     		}
	// 		}
	// 	}

	// 	//Only water invoice
	// 	$obj->where("type", "wInvoice");

	// 	//Results
	// 	$obj->get();

	// 	$totalInvoice = 0;
	// 	$totalUnprint = 0;
	// 	$totalUsage = 0;
	// 	$totalAmount = 0;
	// 	$ids = [];
	// 	if($obj->result_count()>0){
	// 		foreach ($obj as $value) {
	// 			array_push($ids, $value->id);
	// 			$totalInvoice++;
	// 			if($value->print_count==0){
	// 				$totalUnprint++;
	// 			}
	// 			$totalAmount += $value->amount;
	// 		}

	// 		$line = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 		$line->select_sum("unit");
	// 		$line->where_in("invoice_id", $ids);
	// 		$line->where("type", "tariff");
	// 		$line->get();
	// 	}

	// 	$data["results"][] = array(
	// 		"id" 			=> 0,
	// 		"totalInvoice" 	=> $totalInvoice,
	// 		"totalUnprint" 	=> $totalUnprint,
	// 		"totalUsage" 	=> intval($line->unit),
	// 		"totalAmount" 	=> $totalAmount
	// 	);
	// 	$data["count"] = count($data["results"]);

	// 	//Response Data
	// 	$this->response($data, 200);
	// }

	// //GET WATER DASHBOARD
	// function wdashboard_get() {
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 50;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 0;

	// 	// 0 Balance
	// 	$balance = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$balance->select_sum("amount");
	// 	$balance->where("type", "wInvoice");
	// 	$balance->get();
	// 	$data["results"][] = floatval($balance->amount);

	// 	// 1 Deposit
	// 	$deposit = new Payment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$deposit->select_sum("amount");
	// 	$deposit->where("type", "wdeposit");
	// 	$deposit->get();
	// 	$data["results"][] = floatval($deposit->amount);

	// 	// 2 Active Customer
	// 	$activeCustomer = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$activeCustomer->where("status", 1);
	// 	$activeCustomer->where("deleted", 0);
	// 	$activeCustomer->where("use_water", 1);
	// 	$data["results"][] = intval($activeCustomer->count());

	// 	// 3 Inactive Customer
	// 	$inactiveCustomer = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$inactiveCustomer->where("status", 0);
	// 	$inactiveCustomer->where("deleted", 0);
	// 	$inactiveCustomer->where("use_water", 1);
	// 	$data["results"][] = intval($inactiveCustomer->count());

	// 	// 4 Disconnect Customer
	// 	$voidCustomer = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$voidCustomer->where("status", 2);
	// 	$voidCustomer->where("deleted", 0);
	// 	$voidCustomer->where("use_water", 1);
	// 	$data["results"][] = intval($voidCustomer->count());

	// 	// 5 Total Customer
	// 	$totalCustomer = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$totalCustomer->where("deleted", 0);
	// 	$totalCustomer->where("use_water", 1);
	// 	$data["results"][] = intval($totalCustomer->count());

	// 	// 6 Unpaid
	// 	$unpaid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$unpaid->where("type", "wInvoice");
	// 	$unpaid->where_in("status", array(0,2));
	// 	$unpaid->group_by("contact_id");
	// 	$unpaid->get();
	// 	$data["results"][] = intval($unpaid->result_count());

	// 	// 7 No meter
	// 	$contact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$sub_contact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$contact->where("use_water", 1);
	// 	$sub_contact->select("id")->where_related_meter("utility_id", 2);
	// 	$contact->where_not_in_subquery('id', $sub_contact);
	// 	$contact->get();

	// 	$data["results"][] = intval($contact->result_count());

	// 	//Response Data
	// 	$this->response($data, 200);
	// }

	// //GET WATER MONTHLY
	// function wmonthly_get() {
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 0;

	// 	$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$reading = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

	// 	//Filter
	// 	if(!empty($filters) && isset($filters)){
	//     	foreach ($filters as $value) {
	//     		$obj->where($value["field"], $value["value"]);
	//     		$reading->where_related("meter", $value["field"], $value["value"]);
	// 		}
	// 	}

	// 	$obj->where("type", "wInvoice");
	// 	$obj->where("issued_date >=", date("Y")."-01-01");
	// 	$obj->where("issued_date <=", date("Y")."-12-31");
	// 	$obj->order_by("issued_date");
	// 	$obj->get();

	// 	$reading->where("month_of >=", date("Y")."-01-01");
	// 	$reading->where("month_of <=", date("Y")."-12-31");
	// 	$reading->order_by("month_of");
	// 	$reading->get();

	// 	if($obj->result_count() > $reading->result_count()){
	// 		foreach ($obj as $value) {
	// 			$usage = 0;
	// 			$invoiceMonth = date('F', strtotime($value->issued_date));

	// 			foreach ($reading as $v) {
	// 				$readingMonth = date('F', strtotime($v->month_of));

	// 				if($readingMonth===$invoiceMonth){
	// 					$usage += floatval($v->usage);
	// 				}
	// 			}

	// 			$data["results"][] = array(
	// 			   	"amount" 		=> floatval($value->amount),
	// 			   	"usage" 		=> $usage,
	// 			   	"month"			=> $invoiceMonth
	// 			);
	// 		}
	// 	}else{
	// 		foreach ($reading as $value) {
	// 			$amount = 0;
	// 			$readingMonth = date('F', strtotime($value->month_of));

	// 			foreach ($obj as $v) {
	// 				$invoiceMonth = date('F', strtotime($v->issued_date));

	// 				if($readingMonth===$invoiceMonth){
	// 					$amount += floatval($v->amount);
	// 				}
	// 			}

	// 			$data["results"][] = array(
	// 			   	"amount" 		=> $amount,
	// 			   	"usage" 		=> floatval($value->usage),
	// 			   	"month"			=> $readingMonth
	// 			);
	// 		}
	// 	}

	// 	//Response Data
	// 	$this->response($data, 200);
	// }

	// //GET WATER SALE BY BRANCH
	// function wsale_by_branch_get() {
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 50;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 1;

	// 	//Branch
	// 	$branch = new Company(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$branch->where("utility_id", 2);
	// 	$branch->get();

	// 	foreach ($branch as $value){
	// 		$location = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 		$sale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 		$usage = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 		$unpaid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 		$deposit = new Payment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

	// 		$activeCustomer = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 		$inactiveCustomer = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

	// 		//Filter
	// 		if(!empty($filters) && isset($filters)){
	// 	    	foreach ($filters as $val) {
	// 	    		if($val["field"]=="start_date"){
	// 	    			$sale->where("issued_date >=", $val["value"]);
	// 		    		$usage->where("month_of >=", $val["value"]);
	// 	    		}

	// 	    		if($val["field"]=="end_date"){
	// 	    			$sale->where("issued_date <=", $val["value"]);
	// 		    		$usage->where("month_of <=", $val["value"]);

	// 		    		$location->where("created_at <=", $val["value"]);
	// 		    		$activeCustomer->where("registered_date <=", $val["value"]);
	// 		    		$inactiveCustomer->where("registered_date <=", $val["value"]);
	// 		    		$deposit->where("payment_date <=", $val["value"]);
	// 		    		$unpaid->where("issued_date <=", $val["value"]);
	// 	    		}
	// 			}
	// 		}

	// 		//Count location
	// 		$location->where("company_id", $value->id);

	// 		//Active Customer
	// 		$activeCustomer->where("status", 1);
	// 		$activeCustomer->where("deleted", 0);
	// 		$activeCustomer->where_related("meter", "company_id", $value->id);

	// 		//Inactive Customer
	// 		$inactiveCustomer->where("status", 0);
	// 		$inactiveCustomer->where("deleted", 0);
	// 		$inactiveCustomer->where_related("meter", "company_id", $value->id);

	// 		//Deposit
	// 		$deposit->select_sum('amount');
	// 		$deposit->where("type", "deposit");
	// 		$deposit->where("company_id", $value->id);
	// 		$deposit->where("deleted", 0);
	// 		$deposit->get();

	// 		//Usage
	// 		$usage->select_sum('usage', 'totalUsage');
	// 		$usage->where_related("meter", "company_id", $value->id);
	// 		$usage->get();

	// 		//Sale
	// 		$sale->select_sum('amount');
	// 		$sale->where("type", "wInvoice");
	// 		$sale->where("company_id", $value->id);
	// 		$sale->where("deleted", 0);
	// 		$sale->get();

	// 		//Unpaid
	// 		$unpaid->select_sum('amount');
	// 		$unpaid->where("type", "wInvoice");
	// 		$unpaid->where("company_id", $value->id);
	// 		$unpaid->where("status", 0);
	// 		$unpaid->where("deleted", 0);
	// 		$unpaid->get();

	// 		$data["results"][] = array(
	// 			"name" 				=> $value->name,
	// 			"location"			=> intval($location->count()),
	// 			"active_customer" 	=> intval($activeCustomer->count()),
	// 			"inactive_customer" => intval($inactiveCustomer->count()),
	// 			"deposit" 			=> floatval($deposit->amount),
	// 			"usage" 			=> intval($usage->totalUsage),
	// 			"sale"				=> floatval($sale->amount),
	// 			"unpaid"			=> floatval($unpaid->amount)
	// 		);
	// 	}

	// 	//Response Data
	// 	$this->response($data, 200);
	// }

	// //GET WATER SALE BY LOCATION
	// function wsale_by_location_get() {
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 50;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 1;

	// 	//Location
	// 	$location = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$location->where("utility_id", 2);
	// 	$location->order_by("company_id");
	// 	$location->get();

	// 	foreach ($location as $value){
	// 		$sale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 		$usage = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 		$unpaid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 		$deposit = new Payment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

	// 		$activeCustomer = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 		$inactiveCustomer = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

	// 		//Filter
	// 		if(!empty($filters) && isset($filters)){
	// 	    	foreach ($filters as $val) {
	// 	    		if($val["field"]=="start_date"){
	// 	    			$sale->where("issued_date >=", $val["value"]);
	// 		    		$usage->where("month_of >=", $val["value"]);
	// 	    		}

	// 	    		if($val["field"]=="end_date"){
	// 	    			$sale->where("issued_date <=", $val["value"]);
	// 		    		$usage->where("month_of <=", $val["value"]);

	// 		    		$activeCustomer->where("registered_date <=", $val["value"]);
	// 		    		$inactiveCustomer->where("registered_date <=", $val["value"]);
	// 		    		$deposit->where("payment_date <=", $val["value"]);
	// 		    		$unpaid->where("issued_date <=", $val["value"]);
	// 	    		}
	// 			}
	// 		}

	// 		//Active Customer
	// 		$activeCustomer->where("status", 1);
	// 		$activeCustomer->where("deleted", 0);
	// 		$activeCustomer->where_related("meter", "location_id", $value->id);

	// 		//Inactive Customer
	// 		$inactiveCustomer->where("status", 0);
	// 		$inactiveCustomer->where("deleted", 0);
	// 		$inactiveCustomer->where_related("meter", "location_id", $value->id);

	// 		//Deposit
	// 		$deposit->select_sum('amount');
	// 		$deposit->where("type", "wdeposit");
	// 		$deposit->where_related("meter", "location_id", $value->id);
	// 		$deposit->where("deleted", 0);
	// 		$deposit->get();

	// 		//Usage
	// 		$usage->select_sum('usage', 'totalUsage');
	// 		$usage->where_related("meter", "location_id", $value->id);
	// 		$usage->get();

	// 		//Sale
	// 		$sale->select_sum('amount');
	// 		$sale->where("type", "wInvoice");
	// 		$sale->where("location_id", $value->id);
	// 		$sale->where("deleted", 0);
	// 		$sale->get();

	// 		//Unpaid
	// 		$unpaid->select_sum('amount');
	// 		$unpaid->where("type", "wInvoice");
	// 		$unpaid->where("location_id", $value->id);
	// 		$unpaid->where("status", 0);
	// 		$unpaid->where("deleted", 0);
	// 		$unpaid->get();

	// 		$data["results"][] = array(
	// 			"branch_name"		=> $value->company->get()->name,
	// 			"location_name"		=> $value->name,
	// 			"active_customer" 	=> intval($activeCustomer->count()),
	// 			"inactive_customer" => intval($inactiveCustomer->count()),
	// 			"deposit" 			=> floatval($deposit->amount),
	// 			"usage" 			=> intval($usage->totalUsage),
	// 			"sale"				=> floatval($sale->amount),
	// 			"unpaid"			=> floatval($unpaid->amount)
	// 		);
	// 	}

	// 	//Response Data
	// 	$this->response($data, 200);
	// }

	// //GET WATER OUTSTANDING
	// function woutstanding_get(){
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 4;

	// 	$inv = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$deposit = new Payment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

	// 	//Filter
	// 	if(!empty($filters) && isset($filters)){
	//     	foreach ($filters as $value) {
	// 	    	$inv->where($value["field"], $value["value"]);
	// 	    	$deposit->where($value["field"], $value["value"]);
	// 		}
	// 	}

	// 	//Deposit
	// 	$deposit->select_sum('amount');
	// 	$deposit->where("type", "wdeposit");
	// 	$deposit->get();
	// 	$data["results"][] = array("deposit"=>floatval($deposit->amount));

	// 	//Out standing invoice and wInvoice
	// 	$inv->where_in("type", array("invoice", "wInvoice"));
	// 	$inv->where_in("status", array(0,2));
	// 	$inv->get();
	// 	$data["results"][] = array("outInvoice"=>intval($inv->result_count()));

	// 	$overDue = 0;
	// 	$overBal = 0;
	// 	foreach ($inv as $value) {
	// 		$overBal += (floatval($value->amount)-floatval($value->amount_paid));
	// 		$today = new DateTime();
	// 		$dueDate = new DateTime($value->due_date);
	// 		if($dueDate<$today){
	// 			$overDue++;
	// 		}
	// 	}
	// 	$data["results"][] = array("overInvoice"=>$overDue);
	// 	$data["results"][] = array("balance"=>$overBal);

	// 	$this->response($data, 200);
	// }

	// //GET WATER TRANSACTION
	// function wtransaction_get(){
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 0;

	// 	$inv = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$pay = new Payment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

	// 	//Sort
	// 	if(!empty($sort) && isset($sort)){
	// 		foreach ($sort as $value) {
	// 			$inv->order_by("issued_date", $value["dir"]);
	// 			$pay->order_by("payment_date", $value["dir"]);
	// 		}
	// 	}

	// 	//Filter
	// 	if(!empty($filters) && isset($filters)){
	//     	foreach ($filters as $value) {
	//     		if(!empty($value["operator"]) && isset($value["operator"])){
	// 	    		if($value["operator"]=="where_in"){
	// 	    			$inv->where_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="payment"){
	// 	    			$pay->where($value["field"], $value["value"]);
	// 	    		}else{
	// 	    			$inv->where($value["field"], $value["value"]);
	// 	    		}
	//     		}else{
	// 	    		if($value["field"]=="start_date"){
	// 	    			$inv->where("issued_date >=", $value["value"]);
	// 		    		$pay->where("payment_date >=", $value["value"]);
	// 		    	}else if($value["field"]=="end_date"){
	// 		    		$inv->where("issued_date <=", $value["value"]);
	// 		    		$pay->where("payment_date <=", $value["value"]);
	// 	    		}else{
	// 	    			$inv->where($value["field"], $value["value"]);
	// 		    		$pay->where($value["field"], $value["value"]);
	// 	    		}
	// 	    	}
	// 		}
	// 	}

	// 	$pay->where_in("type", array("invoice", "deposit", "edeposit", "wdeposit"));

	// 	//Results
	// 	$inv->get_paged_iterated($page, $limit);
	// 	$pay->get();

	// 	if($inv->result_count()>0){
	// 		foreach ($inv as $value) {
	// 			$data["results"][] = array(
	// 				"id" 			=> $value->id,
	// 		   		"type"			=> $value->type,
	// 				"number" 		=> $value->number,
	// 				"amount" 		=> floatval($value->amount),
	// 			   	"issued_date" 	=> $value->issued_date,
	// 			   	"due_date" 		=> $value->due_date,
	// 			   	"status" 		=> $value->status,
	// 			   	"rate"			=> floatval($value->rate),
	// 			   	"locale" 		=> $value->locale
	// 			);
	// 		}
	// 	}

	// 	if($pay->result_count()>0){
	// 		foreach ($pay as $value) {
	// 			$data["results"][] = array(
	// 				"id" 			=> $value->id,
	// 		   		"type"			=> $value->type=="invoice"?"Payment":"Deposit",
	// 				"number" 		=> "",
	// 				"amount" 		=> floatval($value->amount),
	// 			   	"issued_date" 	=> $value->payment_date,
	// 			   	"due_date" 		=> $value->payment_date,
	// 			   	"status" 		=> 0,
	// 			   	"rate"			=> floatval($value->rate),
	// 			   	"locale" 		=> $value->locale
	// 			);
	// 		}
	// 	}

	// 	$data["count"] = count($data["results"]);

	// 	$this->response($data, 200);
	// }

	// //GET WATER KPI
	// function wkpi_get() {
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = [];
	// 	$data["count"] = 0;

	// 	$contact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$activeContact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$branch = new Company(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$income = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$avgIncome = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$usage = new Transaction(null, $this->entity);
	// 	$avgUsage = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$deposit = new Payment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

	// 	//Filter
	// 	if(!empty($filters) && isset($filters)){
	//     	foreach ($filters as $value) {
	//     		$contact->where("wbranch_id", $value["value"]);
	//     		$activeContact->where("wbranch_id", $value["value"]);
	//     		$branch->where("id", $value["value"]);
	//     		$income->where($value["field"], $value["value"]);
	//     		$avgIncome->where($value["field"], $value["value"]);
	//     		$usage->where_related("invoice", $value["field"], $value["value"]);
	//     		$avgUsage->where_related("meter", $value["field"], $value["value"]);
	//     		$deposit->where($value["field"], $value["value"]);
	// 		}
	// 	}

	// 	$contact->where_in("status", array(0,1));
	// 	$branch->get();

	// 	$totalCustomer = $contact->count();
	// 	$totalAllowCustomer = $totalCustomer / intval($branch->max_customer);
	// 	$totalActiveCustomer = $activeContact->count() / $totalCustomer;

	// 	$income->select_sum("amount");
	// 	$income->where("type", "wInvoice");
	// 	$income->get();

	// 	$avgIncome->select_avg("amount");
	// 	$avgIncome->where("type", "wInvoice");
	// 	$avgIncome->get();

	// 	$usage->select_sum("unit");
	// 	$usage->where("type", "tariff");
	// 	$usage->get();

	// 	$avgUsage->select_avg("usage", "reading");
	// 	$avgUsage->get();

	// 	$deposit->select_sum("amount");
	// 	$deposit->where("type", "wdeposit");
	// 	$deposit->get();

	// 	$data["results"][] = array(
	// 		"id" 						=> 0,
	// 		"totalCustomer" 			=> $totalCustomer,
	// 		"totalAllowCustomer" 		=> $totalAllowCustomer,
	// 		"totalActiveCustomer" 		=> $totalActiveCustomer,
	// 		"totalIncome" 				=> floatval($income->amount),
	// 		"avgIncome" 				=> floatval($avgIncome->amount),
	// 		"totalUsage" 				=> intval($usage->unit),
	// 		"avgUsage" 					=> floatval($avgUsage->reading),
	// 		"totalDeposit" 				=> floatval($deposit->amount)
	// 	);


	// 	//Response Data
	// 	$this->response($data, 200);
	// }

	// //GET WATER DISCONNECT LIST
	// function wdisconnect_get() {
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 0;

	// 	$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$today = new DateTime();
	// 	$days = 0;

	// 	//Sort
	// 	if(!empty($sort) && isset($sort)){
	// 		foreach ($sort as $value) {
	// 			if($value["field"]=="days"){
	// 				$obj->order_by("due_date", $value["dir"]);
	// 			}else if($value["field"]=="location_name"){
	// 				$obj->order_by("location_id", $value["dir"]);
	// 			}else if($value["field"]=="contact_number" || $value["field"]=="fullname"){
	// 				$obj->order_by("contact_id", $value["dir"]);
	// 			}else{
	// 				$obj->order_by($value["field"], $value["dir"]);
	// 			}
	// 		}
	// 	}

	// 	//Filter
	// 	if(!empty($filters) && isset($filters)){
	//     	foreach ($filters as $value) {
	//     		if(!empty($value["operator"]) && isset($value["operator"])){
	// 	    		if($value["operator"]=="where_in"){
	// 	    			$obj->where_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_where_in"){
	// 	    			$obj->or_where_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="where_not_in"){
	// 	    			$obj->where_not_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_where_not_in"){
	// 	    			$obj->or_where_not_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="like"){
	// 	    			$obj->like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_like"){
	// 	    			$obj->or_like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="not_like"){
	// 	    			$obj->not_like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_not_like"){
	// 	    			$obj->or_not_like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="startswith"){
	// 	    			$obj->like($value["field"], $value["value"], "after");
	// 	    		}else if($value["operator"]=="endswith"){
	// 	    			$obj->like($value["field"], $value["value"], "before");
	// 	    		}else if($value["operator"]=="contains"){
	// 	    			$obj->like($value["field"], $value["value"], "both");
	// 	    		}else if($value["operator"]=="or_where"){
	// 	    			$obj->or_where($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="days"){
	// 	    			$days = $value["value"];
	// 	    		}else{
	// 	    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
	// 	    		}
	//     		}else{
	//     			$obj->where($value["field"], $value["value"]);
	//     		}
	// 		}
	// 	}

	// 	$obj->where_in("status", array(0,2));

	// 	//Join other tables
	// 	$obj->include_related("location", "name");
	// 	$obj->include_related("company", "name");
	// 	$obj->include_related("contact", array("contact_type_id", "wnumber", "surname", "name", "company"));

	// 	//Results
	// 	$obj->get_paged_iterated($page, $limit);
	// 	$data["count"] = $obj->paged->total_rows;

	// 	if($obj->exists()){
	// 		foreach ($obj as $value) {
	// 			$fullname = $value->contact_surname.' '.$value->contact_name;
	// 			if($value->contact_contact_type_id=="6" || $value->contact_contact_type_id=="7" || $value->contact_contact_type_id=="8"){
	// 				$fullname = $value->contact_company;
	// 			}

	// 			$dueDate = new DateTime($value->due_date);
	// 			$diff = $today->diff($dueDate)->format("%a");

	// 			if($dueDate<$today && $diff<=$days){
	// 				$data["results"][] = array(
	// 					"id" 				=> $value->id,
	// 					"number" 			=> $value->number,
	// 					"amount" 			=> floatval($value->amount),
	// 					"due_date" 			=> $value->due_date,
	// 					"days"				=> $diff,
	// 					"contact_number" 	=> $value->contact_wnumber,
	// 					"fullname" 			=> $fullname,
	// 					"location_name"		=> $value->location_name,
	// 					"branch_name" 		=> $value->company_name
	// 				);
	// 			}
	// 		}
	// 	}

	// 	//Response Data
	// 	$this->response($data, 200);
	// }

	// //GET WATER AGING SUMMARY
	// function waging_summary_get() {
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 0;

	// 	$contact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

	// 	//Filter
	// 	$search_date = new DateTime();
	// 	if(!empty($filters) && isset($filters)){
	//     	foreach ($filters as $value){
	//     		if($value["field"]==="search_date"){
	//     			$search_date = date("Y-m-d", strtotime($value["value"]));
	//     		}else{
	//     			$contact->where($value["field"], $value["value"]);
	//     		}
	// 		}
	// 	}

	// 	$contact->where("use_water", 1);

	// 	//Results
	// 	$contact->get_paged_iterated($page, $limit);
	// 	$data["count"] = $contact->paged->total_rows;

	// 	if($contact->exists()){
	// 		foreach ($contact as $value) {
	// 			//Fullname
	// 			$fullname = $value->surname.' '.$value->name;
	// 			if($value->contact_type_id=="5" || $value->contact_type_id=="6" || $value->contact_type_id=="7"){
	// 				$fullname = $value->company;
	// 			}

	// 			//Invoice
	// 			$invoice = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 			$invoice->where("contact_id", $value->id);
	// 			$invoice->where("type", "wInvoice");
	// 			$invoice->where_in("status", array(0,2));
	// 			$invoice->where("issued_date <=", $search_date);
	// 			$invoice->get();

	// 			$amount = 0;
	// 			$current = 0;
	// 			$oneMonth = 0;
	// 			$twoMonth = 0;
	// 			$threeMonth = 0;
	// 			$overMonth = 0;

	// 			if($invoice->exists()){
	// 				foreach ($invoice as $valInv) {
	// 					$today = new DateTime();
	// 					$dueDate = new DateTime($valInv->due_date);
	// 					$diff = $today->diff($dueDate)->format("%a");

	// 					$amount += floatval($valInv->amount);

	// 					if($dueDate<$today){
	// 						if(intval($diff)>90){
	// 							$overMonth += floatval($valInv->amount);
	// 						}else if(intval($diff)>60){
	// 							$threeMonth += floatval($valInv->amount);
	// 						}else if(intval($diff)>30){
	// 							$twoMonth += floatval($valInv->amount);
	// 						}else{
	// 							$oneMonth += floatval($valInv->amount);
	// 						}
	// 					}else{
	// 						$current += floatval($valInv->amount);
	// 					}

	// 				}

	// 				$data["results"][] = array(
	// 					"id" 			=> $value->id,
	// 					"fullIdName"	=> $value->wnumber. " " .$fullname,
	// 					"current" 		=> $current,
	// 					"oneMonth" 		=> $oneMonth,
	// 					"twoMonth" 		=> $twoMonth,
	// 					"threeMonth" 	=> $threeMonth,
	// 					"overMonth" 	=> $overMonth,
	// 					"amount" 		=> $amount
	// 				);
	// 			}
	// 		}
	// 	}

	// 	//Response Data
	// 	$this->response($data, 200);
	// }

	// //GET WATER AGING DETAIL
	// function waging_detail_get() {
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 0;

	// 	$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

	// 	//Sort
	// 	if(!empty($sort) && isset($sort)){
	// 		foreach ($sort as $value) {
	// 			$obj->order_by($value["field"], $value["dir"]);
	// 		}
	// 	}

	// 	//Filter
	// 	if(!empty($filters) && isset($filters)){
	//     	foreach ($filters as $value) {
	//     		if(!empty($value["operator"]) && isset($value["operator"])){
	// 	    		if($value["operator"]=="where_in"){
	// 	    			$obj->where_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_where_in"){
	// 	    			$obj->or_where_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="where_not_in"){
	// 	    			$obj->where_not_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_where_not_in"){
	// 	    			$obj->or_where_not_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="like"){
	// 	    			$obj->like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_like"){
	// 	    			$obj->or_like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="not_like"){
	// 	    			$obj->not_like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_not_like"){
	// 	    			$obj->or_not_like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="startswith"){
	// 	    			$obj->like($value["field"], $value["value"], "after");
	// 	    		}else if($value["operator"]=="endswith"){
	// 	    			$obj->like($value["field"], $value["value"], "before");
	// 	    		}else if($value["operator"]=="contains"){
	// 	    			$obj->like($value["field"], $value["value"], "both");
	// 	    		}else if($value["operator"]=="or_where"){
	// 	    			$obj->or_where($value["field"], $value["value"]);
	// 	    		}else{
	// 	    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
	// 	    		}
	//     		}else{
	//     			$obj->where($value["field"], $value["value"]);
	//     		}
	// 		}
	// 	}

	// 	//Results
	// 	$obj->get_paged_iterated($page, $limit);
	// 	$data["count"] = $obj->paged->total_rows;

	// 	if($obj->exists()){
	// 		foreach ($obj as $value) {
	// 			//Fullname
	// 			$contact = $value->contact->get();
	// 			$fullname = $contact->surname.' '.$contact->name;
	// 			if($contact->contact_type_id=="5" || $contact->contact_type_id=="6" || $contact->contact_type_id=="7"){
	// 				$fullname = $contact->company;
	// 			}

	// 			//Age
	// 			$ageGroup = "0-បច្ចុប្បន្ន";
	// 			$today = new DateTime();
	// 			$dueDate = new DateTime($value->due_date);
	// 			$diff = $today->diff($dueDate)->format("%a");

	// 			if($dueDate<$today){
	// 				if(intval($diff)>90){
	// 					$ageGroup = "91->∞";
	// 				}else if(intval($diff)>60){
	// 					$ageGroup = "61-90";
	// 				}else if(intval($diff)>30){
	// 					$ageGroup = "31-60";
	// 				}else{
	// 					$ageGroup = "1-30";
	// 				}
	// 			}

	// 			$data["results"][] = array(
	// 				"id" 			=> $value->id,
	// 				"number" 		=> $value->number,
	// 				"amount"		=> floatval($value->amount),
	// 				"issued_date" 	=> $value->issued_date,
	// 				"due_date" 		=> $value->due_date,

	// 				"fullIdName"	=> $contact->wnumber ." ". $fullname,
	// 				"age"			=> $diff,
	// 				"អាយុកាល" 		=> $ageGroup
	// 			);
	// 		}
	// 	}

	// 	//Response Data
	// 	$this->response($data, 200);
	// }

	// //GET WATER SALE SUMMARY
	// function wsale_summary_get() {
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 0;

	// 	//Location
	// 	$location = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 	$location->where("utility_id", 2);
	// 	$location->order_by("company_id");
	// 	$location->get();

	// 	foreach ($location as $loc){
	// 		$sale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 		$usage = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

	// 		//Filter
	// 		if(!empty($filters) && isset($filters)){
	// 	    	foreach ($filters as $value) {
	// 	    		if(!empty($value["operator"]) && isset($value["operator"])){
	// 		    		if($value["operator"]=="between"){
	// 		    			$sale->where_between($value["field"], $value["value1"], $value["value2"]);
	// 		    			$usage->where_between_related("invoice", $value["field"], $value["value1"], $value["value2"]);
	// 		    		}else{
	// 		    			$sale->where($value["field"].' '.$value["operator"], $value["value"]);
	// 		    			$usage->where($value["field"].' '.$value["operator"], $value["value"]);
	// 		    		}
	// 	    		}else{
	// 	    			$sale->where($value["field"], $value["value"]);
	// 	    			$usage->where($value["field"], $value["value"]);
	// 	    		}
	// 			}
	// 		}

	// 		//Sale
	// 		$sale->select_sum('amount');
	// 		$sale->where("type", "wInvoice");
	// 		$sale->where("location_id", $loc->id);
	// 		$sale->where("deleted", 0);
	// 		$sale->get();

	// 		//Usage
	// 		$usage->select_sum('unit');
	// 		$usage->where_related("invoice", "type", "wInvoice");
	// 		$usage->where_related("invoice", "location_id", $loc->id);
	// 		$usage->where_related("invoice", "deleted", 0);
	// 		$usage->get();

	// 		$data["results"][] = array(
	// 			"branch_name"		=> $loc->company->get()->name,
	// 			"location_name"		=> $loc->name,
	// 			"usage"				=> intval($usage->unit1),
	// 			"amount"			=> floatval($sale->amount)
	// 		);
	// 	}

	// 	$data["count"] = count($data["results"]);

	// 	//Response Data
	// 	$this->response($data, 200);
	// }

	// //GET WATER SALE DETAIL
	// function wsale_detail_get() {
	// 	$filters 	= $this->get("filter")["filters"];
	// 	$page 		= $this->get('page') !== false ? $this->get('page') : 1;
	// 	$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
	// 	$sort 	 	= $this->get("sort");
	// 	$data["results"] = array();
	// 	$data["count"] = 0;

	// 	$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

	// 	//Sort
	// 	if(!empty($sort) && isset($sort)){
	// 		foreach ($sort as $value) {
	// 			if($value["field"]=="contact_type_name"){
	// 				$obj->order_by_related("contact", "contact_type_id", $value["dir"]);
	// 			}else if($value["field"]=="location_name"){
	// 				$obj->order_by("location_id", $value["dir"]);
	// 			}else if($value["field"]=="contact_number" || $value["field"]=="fullname"){
	// 				$obj->order_by("contact_id", $value["dir"]);
	// 			}else{
	// 				$obj->order_by($value["field"], $value["dir"]);
	// 			}
	// 		}
	// 	}

	// 	//Filter
	// 	if(!empty($filters) && isset($filters)){
	//     	foreach ($filters as $value) {
	//     		if(!empty($value["operator"]) && isset($value["operator"])){
	// 	    		if($value["operator"]=="where_in"){
	// 	    			$obj->where_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_where_in"){
	// 	    			$obj->or_where_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="where_not_in"){
	// 	    			$obj->where_not_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_where_not_in"){
	// 	    			$obj->or_where_not_in($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="like"){
	// 	    			$obj->like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_like"){
	// 	    			$obj->or_like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="not_like"){
	// 	    			$obj->not_like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="or_not_like"){
	// 	    			$obj->or_not_like($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="startswith"){
	// 	    			$obj->like($value["field"], $value["value"], "after");
	// 	    		}else if($value["operator"]=="endswith"){
	// 	    			$obj->like($value["field"], $value["value"], "before");
	// 	    		}else if($value["operator"]=="contains"){
	// 	    			$obj->like($value["field"], $value["value"], "both");
	// 	    		}else if($value["operator"]=="or_where"){
	// 	    			$obj->or_where($value["field"], $value["value"]);
	// 	    		}else if($value["operator"]=="between"){
	// 	    			$obj->where_between($value["field"], $value["value1"], $value["value2"]);
	// 	    		}else{
	// 	    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
	// 	    		}
	//     		}else{
	//     			$obj->where($value["field"], $value["value"]);
	//     		}
	// 		}
	// 	}

	// 	//Join other tables
	// 	$obj->include_related("location", "name");
	// 	$obj->include_related("contact/contact_type", "name");
	// 	$obj->include_related("contact", array("contact_type_id", "wnumber", "surname", "name", "company"));

	// 	//Results
	// 	$obj->get_paged_iterated($page, $limit);
	// 	$data["count"] = $obj->paged->total_rows;

	// 	if($obj->result_count()>0){
	// 		foreach ($obj as $value) {
	// 			$fullname = $value->contact_surname.' '.$value->contact_name;
	// 			if($value->contact_contact_type_id=="6" || $value->contact_contact_type_id=="7" || $value->contact_contact_type_id=="8"){
	// 				$fullname = $value->contact_company;
	// 			}

	// 			$usage = 0;
	// 			$lines = $value->item_line->get();
	// 			foreach ($lines as $l) {
	// 				if($l->type=="tariff"){
	// 					$usage += intval($l->unit);
	// 				}
	// 			}

	// 			$data["results"][] = array(
	// 				"id" 					=> $value->id,
	// 				"contact_number" 		=> $value->contact_wnumber,
	// 				"fullname" 				=> $fullname,
	// 				"contact_type_name" 	=> $value->contact_contact_type_name,
	// 				"location_name" 		=> $value->location_name,
	// 				"usage" 				=> $usage,
	// 				"amount" 				=> floatval($value->amount)
	// 			);
	// 		}
	// 	}

	// 	//Response Data
	// 	$this->response($data, 200);
	// }
}
/* End of file transactions.php */
/* Location: ./application/controllers/api/transaction.php */
