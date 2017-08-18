
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Localsync extends REST_Controller {	
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
	//Transaction
	function txn_post() {
		$models = json_decode($this->post('models'));
		$institute = new Institute();
		$institute->where('id', $models[0]->institute_id)->get();
		if($institute->exists()) {
			$conn = $institute->connection->get();
			$this->server_host = $conn->server_name;
			$this->server_user = $conn->username;
			$this->server_pwd = $conn->password;	
			$this->_database = $conn->inst_database;
			date_default_timezone_set("$conn->time_zone");
		}
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->location_id 		= isset($value->location_id) ? $value->location_id : "";
			$obj->pole_id 			= isset($value->pole_id) ? $value->pole_id : "";
			$obj->box_id 			= isset($value->box_id) ? $value->box_id : "";
			$obj->contact_id 		= isset($value->contact_id) ? $value->contact_id : "";
			$obj->payment_term_id	= isset($value->payment_term_id) ? $value->payment_term_id : 5;
			$obj->payment_method_id = isset($value->payment_method_id) ? $value->payment_method_id : 5;
			$obj->reference_id 		= isset($value->reference_id) ? $value->reference_id:0;
			$obj->account_id 		= isset($value->account_id) ? $value->account_id : "";
			$obj->vat_id 			= isset($value->vat) ? $value->vat: 0;
			$obj->biller_id 		= isset($value->biller_id) ? $value->biller_id : "";
		   	$obj->number 			= isset($value->number) ? $value->number : "";
		   	$obj->type 				= "Utility_Invoice";
		   	$obj->amount 			= isset($value->amount) ? $value->amount : "";
		   	$obj->vat 				= isset($value->vat) ? $value->vat : "";
		   	$obj->rate 				= isset($value->rate) ? $value->rate : 1;
		   	$obj->locale 			= isset($value->locale) ? $value->locale : "";
		   	$obj->month_of 			= isset($value->month_of) ? $value->month_of : "";
		   	$obj->issued_date 		= isset($value->issued_date) ? $value->issued_date : "";
		   	$obj->bill_date 		= isset($value->bill_date) ? $value->bill_date : "";
		   	$obj->due_date 			= date('Y-m-d', strtotime($value->due_date));
		   	$obj->is_journal 		= 1;
		   	$obj->check_no 			= isset($value->check_no) ? $value->check_no : "";
		   	$obj->memo 				= isset($value->memo) ? $value->memo: "";
		   	$obj->memo2 			= isset($value->memo2) ? $value->memo2: "";
		   	$obj->meter_id 			= isset($value->meter_id) ? $value->meter_id: "";
		   	$obj->status 			= isset($value->status) ? $value->status: 0;
		   	$obj->user_id 			= isset($value->user_id) ? $value->user_id: 0;
		   	$obj->sub_total 		= isset($value->amount) ? $value->amount : "";
	   		if($obj->save()){
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
	   			$invoice_lines = [];
		   		foreach ($value->wline as $row) {
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
		   			if($row->type == 'installment') {
		   				//Update Installment Schedule Invoice = 1
						$updateInstallSchedule = new Installment_schedule(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$updateInstallSchedule->where('id', $row->item_id);
						$updateInstallSchedule->update('invoiced', 1);
		   			}
		   			//to do: add to accouting line
		   			$updateInstallSchedule = isset($updateInstallSchedule) ? $updateInstallSchedule : "";
		   			$line->save();
		   		}
				$data["results"][] = array(
			   		"id" 	=> $obj->id
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);			
	}
	//Record
	function record_post() {
		$models = json_decode($this->post('models'));
		$institute = new Institute();
		$institute->where('id', $models[0]->institute_id)->get();
		if($institute->exists()) {
			$conn = $institute->connection->get();
			$this->server_host = $conn->server_name;
			$this->server_user = $conn->username;
			$this->server_pwd = $conn->password;	
			$this->_database = $conn->inst_database;
			date_default_timezone_set("$conn->time_zone");
		}
		$data["results"] = array();
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->meter_id 		= $value->meter_id;
			$obj->read_by 		= isset($value->read_by)?$value->read_by:"";
			$obj->input_by 		= isset($value->input_by)?$value->input_by:"";
			$obj->previous 		= intval($value->previous);
			$obj->current 		= intval($value->current);
			$obj->new_round 	= isset($value->new_round)?$value->new_round:"";
			$obj->usage 		= intval($value->usage);
			$obj->month_of 		= $value->month_of;
			$obj->from_date 	= $value->from_date;
			$obj->to_date 		= $value->to_date;
			$obj->invoiced 		= 1;
			$obj->memo 			= isset($value->memo)?$value->memo:"";
			$obj->deleted 		= isset($value->deleted)?$value->deleted:"";
			$obj->deleted_by 	= isset($value->deleted_by)?$value->deleted_by:"";
			if($obj->save()){
				//Respsone
				$data["results"][] = array(
					"id" 			=> $obj->id,
					"meter_id" 		=> $obj->meter_id, 		
					"read_by" 		=> $obj->read_by, 		
					"input_by" 		=> $obj->input_by,
					"previous" 		=> $obj->previous, 	
					"current" 		=> $obj->current,
					"new_round" 	=> $obj->new_round,
					"usage"			=> $obj->usage,			
					"month_of" 		=> $obj->month_of, 						
					"from_date" 	=> $obj->from_date,			
					"to_date" 		=> $obj->to_date,
					"memo"			=> $obj->memo,		
					"invoiced" 		=> 1,	
					"deleted" 		=> $obj->deleted,											
					"deleted_by"	=> $obj->deleted_by	
				);				
			}			
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);					
	}
	//Return Back
	function offupdatetxn_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= 10;
		$data["results"] = [];
		$data["count"] = 0;
		//Filter
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter["filters"] as $value) {
				if($value["field"]=="institute"){
    				$institute = new Institute();
					$institute->where('id', $value["value"])->get();
					if($institute->exists()) {
						$conn = $institute->connection->get();
						$this->server_host = $conn->server_name;
						$this->server_user = $conn->username;
						$this->server_pwd = $conn->password;	
						$this->_database = $conn->inst_database;
						date_default_timezone_set("$conn->time_zone");
					}
    			}
			}
		}
		//Transaction
		$txna = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$txna->where("sync", 1)->order_by("id", "asc");
		//Results
		if($page && $limit){
			$txna->get_paged_iterated($page, $limit);
			$data["count"] = $txna->result_count();
		}else{
			$txna->get_iterated();
			$data["count"] = $txna->result_count();
		}
		if($txna->exists()){
			// foreach($transaction as $txn) {
			// 	$data["results"][] = array(
			// 		"id" 						=> isset($txn->id) ? $txn->id : "",
			// 		"location_id" 				=> isset($txn->location_id) ? $txn->location_id : "",
			// 		"contact_id" 				=> isset($txn->contact_id) ? $txn->contact_id : "",
			// 		"pole_id" 					=> isset($txn->pole_id) ? $txn->pole_id : "",
			// 		"box_id" 					=> isset($txn->box_id) ? $txn->box_id : "",
			// 		"payment_term_id" 			=> isset($txn->payment_term_id) ? $txn->payment_term_id : "",
			// 		"payment_method_id" 		=> isset($txn->payment_method_id) ? $txn->payment_method_id : "",
			// 		"reference_id" 				=> isset($txn->reference_id) ? $txn->reference_id : "",
			// 		"account_id" 				=> isset($txn->account_id) ? $txn->account_id : "",
			// 		"tax_item_id" 				=> isset($txn->tax_item_id) ? $txn->tax_item_id : "",
			// 		"user_id" 					=> isset($txn->user_id) ? $txn->user_id : "",
			// 	   	"number" 					=> isset($txn->number) ? $txn->number : "",
			// 	   	"type" 						=> isset($txn->type) ? $txn->type : "",
			// 	   	"journal_type" 				=> isset($txn->journal_type) ? $txn->journal_type : "",
			// 	   	"sub_total"					=> isset($txn->sub_total)? $txn->sub_total : "",
			// 	   	"discount" 					=> isset($txn->discount) ? $txn->discount : "",
			// 	   	"tax" 						=> isset($txn->tax) ? $txn->tax : "",
			// 	   	"amount" 					=> isset($txn->amount) ? $txn->amount : "",
			// 	   	"fine" 						=> isset($txn->fine) ? $txn->fine : "",
			// 	   	"remaining" 				=> isset($txn->remaining) ? $txn->remaining : "",
			// 	   	"received" 					=> isset($txn->received) ? $txn->received : "",
			// 	   	"rate" 						=> isset($txn->rate) ? $txn->rate : "",
			// 	   	"locale" 					=> isset($txn->locale) ? $txn->locale : "",
			// 	   	"month_of"					=> $txn->month_of,
			// 	   	"issued_date"				=> $txn->issued_date,
			// 	   	"bill_date"					=> isset($txn->bill_date) ? $txn->bill_date : "",
			// 	   	"payment_date" 				=> isset($txn->payment_date) ? $txn->payment_date : "",
			// 	   	"due_date" 					=> isset($txn->due_date) ? $txn->due_date : "",
			// 	   	"reference_no" 				=> isset($txn->reference_no) ? $txn->reference_no : "",
			// 	   	"references" 				=> isset($txn->references) ? $txn->references : "",
			// 	   	"memo" 						=> isset($txn->memo) ? $txn->memo : "",
			// 	   	"status" 					=> isset($txn->status) ? $txn->status : "",
			// 	   	"print_count" 				=> isset($txn->print_count) ? $txn->print_count : "",
			// 	   	"deleted" 					=> isset($txn->deleted) ? $txn->deleted : "",
			// 	   	"meter_id"					=> isset($txn->meter_id) ? $txn->meter_id : ""
			// 	);
			// }
		}
		$data["all"] = $txna->paged->total_rows;
		$this->response($data, 200);
	}
	function offupdate2_get(){
		$filter 	= $this->get("filter");
		$data = [];
		$results = [];
		//Filter
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter["filters"] as $value) {
				if($value["field"]=="institute"){
    				$institute = new Institute();
					$institute->where('id', $value["value"])->get();
					if($institute->exists()) {
						$conn = $institute->connection->get();
						$this->server_host = $conn->server_name;
						$this->server_user = $conn->username;
						$this->server_pwd = $conn->password;	
						$this->_database = $conn->inst_database;
						date_default_timezone_set("$conn->time_zone");
					}
    			}
			}
		}
		//Plan
		$plan = new Plan(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$plan->where("sync", 1)->order_by("id", "asc")->get_iterated();
		if($plan->exists()){
			foreach($plan as $pl) {
				$data["plan"][] = array(
					"id" 		=> $pl->id,
					"currency_id" 	=> $pl->currency_id,
		 			"name" 		=> $pl->name,	
		 			"code"		=> $pl->code,
				);
			}
		}
		//Plan Item
		$planitem = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$planitem->where("sync", 1)->order_by("id", "asc")->get_iterated();
		if($planitem->exists()){
			foreach($planitem as $pli) {
				$data["plan_item"][] = array(
					"id" 			=> $pli->id,
					"tariff_id" 	=> $pli->tariff_id,
					"currency_id" 	=> $pli->currency_id,
		 			"name" 			=> $pli->name,	
		 			"is_flat" 		=> $pli->is_flat,	
		 			"type"			=> $pli->type,
		 			"unit"			=> $pli->unit,
		 			"amount"		=> $pli->amount,
		 			"usage"			=> $pli->usage,
		 			"account_id"	=> $pli->account_id,
		 			"is_active"		=> $pli->is_active,
				);
			}
		}
		//Plan Item Plan
		$planitemplan = new Plan_items_plan(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$planitemplan->order_by("id", "asc")->get_iterated();
		if($planitemplan->exists()){
			foreach($planitemplan as $pla) {
				$data["plan_item_plan"][] = array(
					"id" 		=> $pla->id,
					"plan_id" 	=> $pla->plan_id,
		 			"plan_item_id" 		=> $pla->plan_item_id,
				);
			}
		}
		//Respone
		$results['count'] = count($data);
		$results['results'] = $data;
		
		$this->response($results, 200);
	}
	function offupdate3_get(){
		$filter 	= $this->get("filter");
		$data = [];
		$results = [];
		//Filter
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter["filters"] as $value) {
				if($value["field"]=="institute"){
    				$institute = new Institute();
					$institute->where('id', $value["value"])->get();
					if($institute->exists()) {
						$conn = $institute->connection->get();
						$this->server_host = $conn->server_name;
						$this->server_user = $conn->username;
						$this->server_pwd = $conn->password;	
						$this->_database = $conn->inst_database;
						date_default_timezone_set("$conn->time_zone");
					}
    			}
			}
		}
		//contact
		$contact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$contact->where("sync", 1)->order_by("id", "asc")->get_iterated();
		if($contact->exists()){
			foreach($contact as $con) {
				$data["contact"][] = array(
					"id" 						=> $con->id,
					"branch_id" 				=> $con->branch_id,
					"country_id" 				=> $con->country_id,
					"ebranch_id" 				=> $con->ebranch_id,
					"elocation_id" 				=> $con->elocation_id,
					"wbranch_id" 				=> $con->wbranch_id,
					"wlocation_id" 				=> $con->wlocation_id,
					"user_id"					=> $con->user_id,
					"contact_type_id" 			=> $con->contact_type_id,
					"eorder" 					=> $con->eorder,
					"worder" 					=> $con->worder,
					"abbr" 						=> $con->abbr,
					"number" 					=> $con->number,
					"eabbr" 					=> $con->eabbr,
					"enumber" 					=> $con->enumber,
					"wabbr" 					=> $con->wabbr,
					"wnumber" 					=> $con->wnumber,
					"name" 						=> $con->name,
					"gender"					=> $con->gender,
					"dob" 						=> $con->dob,
					"pob" 						=> $con->pob,
					"latitute" 					=> $con->latitute,
					"longtitute" 				=> $con->longtitute,
					"credit_limit" 				=> $con->credit_limit,
					"locale" 					=> $con->locale,
					"id_number" 				=> $con->id_number,
					"phone" 					=> $con->phone,
					"email" 					=> $con->email,
					"website" 					=> $con->website,
					"job" 						=> $con->job,
					"vat_no" 					=> $con->vat_no,
					"family_member"				=> $con->family_member,
					"city" 						=> $con->city,
					"post_code" 				=> $con->post_code,
					"address" 					=> $con->address,
					"bill_to" 					=> $con->bill_to,
					"ship_to" 					=> $con->ship_to,
					"memo" 						=> $con->memo,
					"image_url" 				=> $con->image_url,
					"company" 					=> $con->company,
					"company_en" 				=> $con->company_en,
					"bank_name" 				=> $con->bank_name,
					"bank_address" 				=> $con->bank_address,
					"bank_account_name" 		=> $con->bank_account_name,
					"bank_account_number" 		=> $con->bank_account_number,
					"name_on_cheque" 			=> $con->name_on_cheque,
					"business_type_id" 			=> $con->business_type_id,
					"payment_term_id" 			=> $con->payment_term_id,
					"payment_method_id" 		=> $con->payment_method_id,
					"deposit_account_id"		=> $con->deposit_account_id,
					"trade_discount_id" 		=> $con->trade_discount_id,
					"settlement_discount_id"	=> $con->settlement_discount_id,
					"salary_account_id"			=> $con->salary_account_id,
					"account_id" 				=> $con->account_id,
					"ra_id" 					=> $con->ra_id,
					"tax_item_id" 				=> $con->tax_item_id,
					"phase_id" 					=> $con->phase_id,
					"voltage_id" 				=> $con->voltage_id,
					"ampere_id" 				=> $con->ampere_id,
					"registered_date" 			=> $con->registered_date,
					"use_electricity" 			=> $con->use_electricity,
					"use_water" 				=> $con->use_water,
					"is_local" 					=> $con->is_local,
					"is_pattern" 				=> intval($con->is_pattern),
					"status" 					=> $con->status,
					"is_system"					=> $con->is_system,
					"contact_type"				=> $con->contact_type_name
				);
			}
		}
		//Respone
		$results['count'] = count($data);
		$results['results'] = $data;
		
		$this->response($results, 200);
	}
	function offupdate4_get(){
		$filter 	= $this->get("filter");
		$data = [];
		$results = [];
		//Filter
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter["filters"] as $value) {
				if($value["field"]=="institute"){
    				$institute = new Institute();
					$institute->where('id', $value["value"])->get();
					if($institute->exists()) {
						$conn = $institute->connection->get();
						$this->server_host = $conn->server_name;
						$this->server_user = $conn->username;
						$this->server_pwd = $conn->password;	
						$this->_database = $conn->inst_database;
						date_default_timezone_set("$conn->time_zone");
					}
    			}
			}
		}
		//meter
		$meter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$meter->where("sync", 1)->order_by("id", "asc")->get_iterated();
		if($meter->exists()){
			foreach($meter as $met) {
				$data["meter"][] = array(
					"id" 					=> $met->id,
					"currency_id"			=> $met->currency_id,
					"meter_number" 			=> $met->number,
					"property_id" 			=> $met->property_id,
					"contact_id" 			=> $met->contact_id,
					"type"					=> $met->type,
					"attachment_id"			=> $met->attachment_id,
					"worder" 				=> $met->worder,
					"status" 				=> $met->status,
					"number_digit"			=> $met->number_digit,
					"plan_id"				=> $met->plan_id,
					"map" 					=> $met->latitute,
					"starting_no" 			=> $met->startup_reading,
					"location_id" 			=> intval($met->location_id),
					"pole_id" 				=> intval($met->pole_id),
					"box_id" 				=> intval($met->box_id),
					"ampere_id" 			=> intval($met->ampere_id),
					"phase_id" 				=> intval($met->phase_id),
					"voltage_id" 			=> intval($met->voltage_id),
					"brand_id" 				=> intval($met->brand_id),
					"branch_id" 			=> intval($met->branch_id),
					"activated" 			=> $met->activated,
					"latitute" 				=> $met->latitute,
					"longtitute" 			=> $met->longtitute,
					"multiplier" 			=> $met->multiplier,
					"date_used" 			=> $met->date_used,
					"reactive_id" 			=> intval($met->reactive_id),
					"reactive_status" 		=> $met->reactive_status
				);
			}
		}
		//Respone
		$results['count'] = count($data);
		$results['results'] = $data;
		
		$this->response($results, 200);
	}
}
/* End of file meters.php */
/* Location: ./application/controllers/api/meters.php */