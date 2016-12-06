<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Winvoices extends REST_Controller {
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
		}
		$this->_database = "db_banhji";
	}

	// based on meter
	// with contact detail
	// and items based on meter record &
	// plan
	// installment
	function make_get() {
		$getData = $this->get('filter');
		$filters = $getData['filters'];
		$table = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$data = array();

		if(isset($filters)) {
			foreach($filters as $filter) {
				if(isset($filter['operator'])) {
					$table->{$filter['operator']}($filter['field'], $filter['value']);
				} else {
					$table->where($filter['field'], $filter['value']);
				}
			}
		}
		$table->where('invoiced <>', 1);
		$table->get();

		$tmp = array();

		foreach($table as $row) {
			$meter = $row->meter->get();
			$contact = $meter->contact->get();

			$plan  = $meter->plan->get();

			if(isset($tmp["$meter->number"])){
				$tmp["$meter->number"]['items'][] = array(
												'usage' => array(
													'id'   => $row->id,
													'from' => $row->from_date,
													'to'   => $row->to_date,
													'prev'=>$row->previous,
													'current'=>$row->current,
													'usage' => $row->usage,
													'unit' => 'm3',
													'amount'=> 0
												));
			} else {
				$tmp["$meter->number"]['type'] = 'water_invoice';
				$tmp["$meter->number"]['contact'] = array(
													'id' => $contact->id,
													'name' => $contact->name
												);
				$tmp["$meter->number"]['meter'] = array(
													'id' => $meter->id,
													'number' => $meter->number,
													'multiplier' => $meter->multiplier
												);
				$tmp["$meter->number"]['items'][] = array(
												'usage' => array(
													'id'   => $row->id,
													'from' => $row->from_date,
													'to'   => $row->to_date,
													'prev'=>$row->previous,
													'current'=>$row->current,
													'usage' => $row->usage,
													'unit' => 'm3',
													'amount'=> 0
												));
				// plan items
				$items = $plan->plan_item->get();
				foreach($items as $item) {
					$tmp["$meter->number"]['items'][] = array(
												"$item->type" => array(
													'id'   => $item->id,
													'from' => $item->from,
													'to'   => $item->to,
													'prev' =>0,
													'current'=>0,
													'usage' => 0,
													'unit'  => $item->unit,
													'amount'=> $item->amount
												));
				}

				// installment
				$installment = $meter->installment->get();
				$tmp["$meter->number"]['items'][] = array(
											"installment" => array(
												'id'   => $installment->id,
												'from' => 0,
												'to'   => 0,
												'prev' =>0,
												'current'=>0,
												'usage' => 0,
												'unit'  => 'money',
												'amount'=> $installment->amount
											));
			}
		}

		foreach($tmp as $t) {
			$data[] = array(
				'type' => $t['type'],
				'contact' => $t['contact'],
				'meter'=> $t['meter'],
				'items'=> $t['items']
			);
		}

		$this->response(array('results' => $data, 'count' => count($data)), 200);
	}

	//GET
	function index_get() {
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
		$obj->where("deleted <>", 1);

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;

		if($obj->exists()){
			foreach ($obj as $value) {

				//Sum amount paid
				$amount_paid = 0;
				if($value->type=="Invoice" || $value->type=="Credit_Purchase" || $value->type=="Cash_Receipt" || $value->type=="Cash_Payment"){
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
					$paid->where("is_recurring",0);
					$paid->where("deleted",0);
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
			if(isset($value->is_recurring)){
				if($value->is_recurring==0){
					$number = $this->_generate_number($value->type, $value->issued_date);
				}
			}else{
				$number = $this->_generate_number($value->type, $value->issued_date);
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
			isset($value->number) 					? $obj->number 						= $value->number : $obj->number = $number;
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
	   			// Cash Receipt/Payment Update Invoice status
	   			$amount_paid = 0;
				if($obj->type=="Cash_Receipt" || $obj->type=="Cash_Payment"){
					//Sum amount paid
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$paid->select_sum("amount");
					$paid->select_sum("discount");
					$paid->where("reference_id", $obj->reference_id);
					$paid->where_in("type", array("Cash_Receipt", "Cash_Payment"));
					$paid->where("is_recurring",0);
					$paid->where("deleted",0);
					$paid->get();
					$amount_paid = floatval($paid->amount) + floatval($paid->discount);

					//Update invoice status
					$inv = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$inv->get_by_id($obj->reference_id);

					$amount = floatval($inv->amount) - floatval($inv->deposit);

					if($amount_paid >= $amount){
						$inv->status = 1;
					}else{
						$inv->status = 2;
					}

					$inv->save();
				}

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
				   	"is_recurring" 				=> $obj->is_recurring,
				   	"is_journal" 				=> $obj->is_journal,
				   	"print_count" 				=> $obj->print_count,
				   	"printed_by" 				=> $obj->printed_by,
				   	"deleted" 					=> $obj->deleted,

				   	"contact" 					=> $obj->contact->get_raw()->result(),
				   	"amount_paid"				=> $amount_paid
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
				//Update invoice
				$amount_paid = 0;
				if($value->type=="Cash_Receipt" || $value->type=="Cash_Payment"){
					//Sum amount paid
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$paid->select_sum("amount");
					$paid->select_sum("discount");
					$paid->where("reference_id", $obj->reference_id);
					$paid->where_in("type", array("Cash_Receipt", "Cash_Payment"));
					$paid->where("is_recurring",0);
					$paid->where("deleted",0);
					$paid->get();
					$amount_paid = floatval($paid->amount) + floatval($paid->discount);

					//Update invoice status
					$inv = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$inv->get_by_id($obj->reference_id);

					if($amount_paid >= floatval($inv->amount)){
						$inv->status = 1;
					}else{
						$inv->status = 2;
					}

					$inv->save();
				}

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
				   	"is_recurring" 				=> $obj->is_recurring,
				   	"is_journal" 				=> $obj->is_journal,
				   	"print_count" 				=> $obj->print_count,
				   	"printed_by" 				=> $obj->printed_by,
				   	"deleted" 					=> $obj->deleted,

				   	"contact" 					=> $obj->contact->get_raw()->result(),
				   	"amount_paid"				=> $amount_paid
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
			$obj->where("id", $value->id)->get();

			//Update invoice status
			if($value->type=="Cash_Receipt" || $value->type=="Cash_Payment"){
				//Sum amount paid
				$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$paid->select_sum("amount");
				$paid->select_sum("discount");
				$paid->where("reference_id", $obj->reference_id);
				$paid->where("is_recurring",0);
				$paid->where("deleted",0);
				$paid->get();
				$amount_paid = floatval($paid->amount) + floatval($paid->discount);

				//Update invoice status
				$inv = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$inv->get_by_id($obj->reference_id);

				if($amount_paid>0){
					$inv->status = 2;
				}else{
					$inv->status = 0;
				}

				$inv->save();
			}

			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
		}

		//Response data
		$this->response($data, 200);
	}


/* End of file winvoices.php */
/* Location: ./application/controllers/api/categories.php */
