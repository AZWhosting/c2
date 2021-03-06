
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
		$limit 		= $this->get('limit');
		$data = [];
		$tx = array();
		$properties = array();
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
		$puttran = array();
		//Transaction
		$transaction = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$transaction->where("sync", 1);
		$transaction->where("deleted", 0);
		$transaction->order_by("id", "asc");
		//Results
		// if($page && $limit){
		// 	$transaction->get_paged_iterated($page, $limit);
		// 	$results["count"] = $transaction->result_count();
		// }else{
		$transaction->get_iterated();
		$results["count"] = $transaction->result_count();
		// }
		if($transaction->exists()){
			foreach($transaction as $txn) {
				$results["results"][] = array(
					"id" 						=> $txn->id,
					"location_id" 				=> $txn->location_id,
					"contact_id" 				=> $txn->contact_id,
					"pole_id" 					=> $txn->pole_id,
					"box_id" 					=> $txn->box_id,
					"payment_term_id" 			=> $txn->payment_term_id,
					"payment_method_id" 		=> $txn->payment_method_id,
					"reference_id" 				=> $txn->reference_id,
					"account_id" 				=> $txn->account_id,
					"tax_item_id" 				=> $txn->tax_item_id,
					"user_id" 					=> $txn->user_id,
				   	"number" 					=> $txn->number,
				   	"type" 						=> $txn->type,
				   	"journal_type" 				=> $txn->journal_type,
				   	"sub_total"					=> $txn->sub_total,
				   	"discount" 					=> $txn->discount,
				   	"tax" 						=> $txn->tax,
				   	"amount" 					=> $txn->amount,
				   	"fine" 						=> $txn->fine,
				   	"remaining" 				=> $txn->remaining,
				   	"received" 					=> $txn->received,
				   	"rate" 						=> $txn->rate,
				   	"locale" 					=> $txn->locale,
				   	"month_of"					=> $txn->month_of,
				   	"issued_date"				=> $txn->issued_date,
				   	"bill_date"					=> $txn->bill_date,
				   	"payment_date" 				=> $txn->payment_date,
				   	"due_date" 					=> $txn->due_date,
				   	"reference_no" 				=> $txn->reference_no,
				   	"references" 				=> $txn->references,
				   	"memo" 						=> $txn->memo,
				   	"status" 					=> $txn->status,
				   	"meter_id"					=> $txn->meter_id
				);
			}
		}
		//Respone
		$this->response($results, 200);
	}
	
}
/* End of file meters.php */
/* Location: ./application/controllers/api/meters.php */