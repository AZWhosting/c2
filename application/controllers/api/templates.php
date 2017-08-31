
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Templates extends REST_Controller {	
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
	public function transactions_get() {
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

		$obj->include_related("contact", array("abbr","number","name","payment_term_id","payment_method_id","credit_limit","locale","bill_to","ship_to","deposit_account_id","trade_discount_id","settlement_discount_id","account_id","ra_id"));
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
				   	"references" 				=> $value->references!="" ? array_map('intval', explode(",", $value->references)) : [],
				   	"segments" 					=> $value->segments!="" ? array_map('intval', explode(",", $value->segments)) : [],
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

				   	"contact" 					=> $contact,
				   	"employee" 					=> $employee
				);
			}
		}

		//Response Data
		$this->response($data, 200);
	}
	//GET 
	public function transaction_templates_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;

		$obj = new Transaction_template(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}
		
		//Filter
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter['filters'] as $value) {
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
		
		$obj->order_by("type","desc");
		
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
					"id" 					=> $value->id,
					"transaction_form_id" 	=> $value->transaction_form_id,					
					"user_id" 				=> $value->user_id,
					"type" 					=> $value->type,
					"name" 	 				=> $value->name,
					"color" 				=> $value->color,
					"title" 				=> $value->title,
					"note" 					=> $value->note,
					"moduls" 				=> $value->moduls,
					"status" 				=> $value->status,
					"created_at" 			=> $value->created_at,
					"updated_at" 			=> $value->updated_at	
				);
			}
		}

		//Response Data		
		$this->response($data, 200);		
	}
	//GET
	public function item_lines_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		
		$obj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    			if($value["operator"]=="item") {
	    				
					}else{
						$obj->{$value["operator"]}($value["field"], $value["value"]);
					}
				} else {
					$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->include_related("item", array("item_type_id","abbr","number","name","cost","price","locale","income_account_id","expense_account_id","inventory_account_id"));
		$obj->include_related("measurement", array("name"));
		$obj->include_related("tax_item", array("tax_type_id","account_id","name","rate"));
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
				$txn = $value->transactions->get();
				//Item
				$item = array(
					"id" 					=> $value->item_id,
					"item_type_id" 			=> $value->item_item_type_id,
					"abbr"					=> $value->item_abbr, 
					"number" 				=> $value->item_number, 
					"name" 					=> $value->item_name,
					"cost"					=> $value->item_cost,
					"price"					=> $value->item_price,
					"locale"				=> $value->item_locale,
					"income_account_id"		=> $value->item_income_account_id, 
					"expense_account_id" 	=> $value->item_expense_account_id, 
					"inventory_account_id" 	=> $value->item_inventory_account_id
				);

				//Measurement
				$measurement = array(
					"measurement_id" 	=> $value->measurement_id,
					"measurement"		=> $value->measurement_name ? $value->measurement_name : ""
				);

				//Tax Item
				$tax_item = array(
					"id" 			=> $value->tax_item_id,
					"tax_type_id" 	=> $value->tax_item_tax_type_id ? $value->tax_item_tax_type_id : "",
					"account_id" 	=> $value->tax_item_account_id ? $value->tax_item_account_id : "",
					"name" 			=> $value->tax_item_name ? $value->tax_item_name : "",
					"rate" 			=> $value->tax_item_rate ? $value->tax_item_rate : ""
				);

				//WHT Account
				$wht_account = [];
				if($value->wht_account_id>0){
					$whtAccounts = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$whtAccounts->select("number, name");
					$whtAccounts->get_by_id($value->wht_account_id);

					$wht_account = array(
						"id" 		=> $value->wht_account_id,
						"number" 	=> $whtAccounts->number,
						"name" 		=> $whtAccounts->name
					);
				}
				
				$data["results"][] = array(
					"id" 				=> $value->id,
			   		"transaction_id"	=> $value->transaction_id,
			   		"measurement_id" 	=> $value->measurement_id,
					"tax_item_id" 		=> $value->tax_item_id,
					"wht_account_id"	=> $value->wht_account_id,
					"item_id" 			=> $value->item_id,
					"assembly_id" 		=> $value->assembly_id,
				   	"description" 		=> $value->description,
				   	"on_hand" 			=> floatval($value->on_hand),
					"on_po" 			=> floatval($value->on_po),
					"on_so" 			=> floatval($value->on_so),
					"gross_weight" 		=> floatval($value->gross_weight),
					"truck_weight" 		=> floatval($value->truck_weight),
					"bag_weight" 		=> floatval($value->bag_weight),
					"yield" 			=> floatval($value->yield),
					"quantity" 			=> floatval($value->quantity),
				   	"quantity_adjusted" => floatval($value->quantity_adjusted),
				   	"conversion_ratio" 	=> floatval($value->conversion_ratio),
				   	"cost"				=> floatval($value->cost),
				   	"price"				=> floatval($value->price),
				   	"price_avg" 		=> floatval($value->price_avg),
				   	"amount" 			=> floatval($value->amount),
				   	"markup" 			=> floatval($value->markup),
				   	"discount" 			=> floatval($value->discount),
				   	"fine" 				=> floatval($value->fine),
				   	"tax" 				=> floatval($value->tax),
				   	"additional_cost" 	=> floatval($value->additional_cost),
				   	"additional_applied"=> $value->additional_applied==1?true : false,
				   	"rate"				=> floatval($value->rate),
				   	"locale" 			=> $txn->locale,
				   	"movement" 			=> $value->movement,
				   	"required_date"		=> $value->required_date,
				   	"deleted"			=> $value->deleted,
				   	
				   	"item" 				=> $item,
				   	"measurement" 		=> $measurement,
				   	"tax_item" 			=> $tax_item,
				   	"wht_account" 		=> $wht_account,
				   	"item_prices"		=> $measurement
				);
			}
		}

		$this->response($data, 200);
	}
	//GET 
	public function account_lines_get() {		
		$filter 	= $this->get("filter");		
		$page 		= $this->get('page');		
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Account_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);	

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

		$obj->include_related("account", array("number","name"));
		$obj->include_related("contact", array("abbr","number","name"));
		$obj->include_related("tax_item", array("tax_type_id","account_id","name","rate"));
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
				//Account
				$account = array(
					"id" 		=> $value->account_id,
					"number" 	=> $value->account_number ? $value->account_number : "", 
					"name" 		=> $value->account_name ? $value->account_name : ""
				);

				//Contact
				$contact = array(
					"id" 		=> $value->contact_id,
					"abbr"		=> $value->contact_abbr ? $value->contact_abbr : "", 
					"number" 	=> $value->contact_number ? $value->contact_number : "", 
					"name" 		=> $value->contact_name ? $value->contact_name : ""
				);

				//Tax Item
				$tax_item = array(
					"id" 			=> $value->tax_item_id,
					"tax_type_id" 	=> $value->tax_item_tax_type_id ? $value->tax_item_tax_type_id : "",
					"account_id" 	=> $value->tax_item_account_id ? $value->tax_item_account_id : "",
					"name" 			=> $value->tax_item_name ? $value->tax_item_name : "",
					"rate" 			=> $value->tax_item_rate ? $value->tax_item_rate : ""
				);

				//WHT Account
				$wht_account = [];
				if($value->wht_account_id>0){
					$whtAccounts = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$whtAccounts->select("number, name");
					$whtAccounts->get_by_id($value->wht_account_id);

					$wht_account = array(
						"id" 		=> $value->wht_account_id,						 
						"number" 	=> $whtAccounts->number,
						"name" 		=> $whtAccounts->name
					);
				}

				$data["results"][] = array(
					"id" 				=> $value->id,
			   		"transaction_id"	=> $value->transaction_id,
			   		"payment_method_id"	=> $value->payment_method_id,
			   		"tax_item_id"		=> $value->tax_item_id,
			   		"wht_account_id"	=> $value->wht_account_id,
					"account_id" 		=> intval($value->account_id),
					"contact_id" 		=> $value->contact_id,
				   	"description" 		=> $value->description,
				   	"reference_no" 		=> $value->reference_no,
				   	"segments" 			=> explode(",",$value->segments),
				   	"amount" 			=> floatval($value->amount),
				   	"tax"				=> floatval($value->tax),
				   	"rate"				=> floatval($value->rate),
				   	"locale" 			=> $value->locale,
				   	"reference_date" 	=> $value->reference_date,
				   	"movement" 			=> intval($value->movement),
				   	"deleted"			=> $value->deleted,

				   	"account" 			=> $account,
				   	"contact" 			=> $contact,
				   	"tax_item" 			=> $tax_item,
				   	"wht_account" 		=> $wht_account
				);
			}						 			
		}		
		$this->response($data, 200);		
	}
	//GET 
	public function contacts_get() {
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
	//GET 
	public function journal_lines_get() {		
		$filter 	= $this->get("filter");		
		$page 		= $this->get('page');		
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);	

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

		$obj->include_related("contact", array("abbr","number","name"));
		$obj->include_related("account", array("number","name"));
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
				//Account
				$account = array(
					"id" 		=> $value->account_id,
					"number" 	=> $value->account_number ? $value->account_number : "", 
					"name" 		=> $value->account_name ? $value->account_name : ""
				);

				//Contact
				$contact = array(
					"id" 		=> $value->contact_id,
					"abbr"		=> $value->contact_abbr ? $value->contact_abbr : "", 
					"number" 	=> $value->contact_number ? $value->contact_number : "", 
					"name" 		=> $value->contact_name ? $value->contact_name : ""
				);

				$data["results"][] = array(
					"id" 				=> $value->id,
			   		"transaction_id"	=> $value->transaction_id,			   		
					"account_id" 		=> $value->account_id,
					"contact_id" 		=> $value->contact_id,								   	
				   	"description" 		=> $value->description,
				   	"reference_no" 		=> $value->reference_no,
				   	"segments" 			=> explode(",",intval($value->segments)),
				   	"dr" 				=> floatval($value->dr),			   				   	
				   	"cr" 				=> floatval($value->cr),
				   	"rate"				=> floatval($value->rate),
				   	"locale" 			=> $value->locale,
				   	"deleted"			=> $value->deleted,

				   	"account" 			=> $account,
				   	"contact" 			=> $contact,

				   	"donor"				=> ""
				);
			}						 			
		}		
		$this->response($data, 200);		
	}
	//GET ITEM
	public function segment_items_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
				//Results				
				$data["results"][] = array(
					"id" 			=> $value->id,
					"segment_id" 	=> $value->segment_id,					
					"code" 			=> $value->code,					
					"name" 	 		=> $value->name,
					"is_system" 	=> $value->is_system,

					"segment" 		=> $value->segment->get_raw()->result()
				);
			}
		}

		//Response Data		
		$this->response($data, 200);		
	}
}
/* End of file meters.php */
/* Location: ./application/controllers/api/meters.php */