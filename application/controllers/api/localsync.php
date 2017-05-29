<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Localsynce extends REST_Controller {	
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
	function txn_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->company_id) 				? $obj->company_id 					= $value->company_id : "";
			isset($value->number) 					? $obj->number 						= $value->number : "";
			isset($value->location_id) 				? $obj->location_id 				= $value->location_id : 0;
			isset($value->contact_id) 				? $obj->contact_id 					= $value->contact_id : "";
			isset($value->payment_term_id) 			? $obj->payment_term_id 			= $value->payment_term_id : 5;
		   	isset($value->type) 					? $obj->type 						= $value->type : "Utility_Invoice";
		   	isset($value->journal_type) 			? $obj->journal_type 				= $value->journal_type : "journal";
		   	isset($value->sub_total) 				? $obj->sub_total 					= $value->sub_total : $value->amount;
		   	isset($value->amount) 					? $obj->amount 						= $value->amount : "";
		   	isset($value->rate) 					? $obj->rate 						= $value->rate : 1;
		   	isset($value->month_of) 				? $obj->month_of 					= $value->month_of : "";
		   	isset($value->issued_date) 				? $obj->issued_date 				= $value->issued_date : "";
		   	isset($value->bill_date) 				? $obj->bill_date 					= $value->bill_date : "";
		   	isset($value->due_date) 				? $obj->due_date 					= $value->due_date : "";
		   	isset($value->is_journal) 				? $obj->is_journal 					= $value->is_journal : 1;
		   	isset($value->print_count) 				? $obj->print_count 				= $value->print_count : 1;
		   	isset($value->deleted) 					? $obj->deleted 					= $value->deleted : "";
		   	isset($value->meter_id) 				? $obj->meter_id 					= $value->meter_id : 0;
		   	
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 						=> $obj->id,
					"location_id" 				=> $obj->location_id,
					"contact_id" 				=> $obj->contact_id,
					"payment_term_id" 			=> $obj->payment_term_id,
					"number" 					=> $obj->number,
				   	"type" 						=> $obj->type,
				   	"journal_type" 				=> $obj->journal_type,
				   	"sub_total"					=> floatval($obj->sub_total),
				   	"rate" 						=> floatval($obj->rate),
				   	"month_of"					=> $obj->month_of,
				   	"issued_date"				=> $obj->issued_date,
				   	"bill_date"					=> $obj->bill_date,
				   	"due_date" 					=> $obj->due_date,
				   	"status" 					=> $obj->status,
				   	"is_journal" 				=> $obj->is_journal,
				   	"print_count" 				=> $obj->print_count,
				   	"deleted" 					=> $obj->deleted,
				   	"meter_id"					=> $obj->meter_id
			   	);
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);						
	}
}
/* End of file meters.php */
/* Location: ./application/controllers/api/meters.php */