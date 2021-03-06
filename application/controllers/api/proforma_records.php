<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Proforma_records extends REST_Controller {	
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
	}	

	
	//GET 
	function index_get() {		
		$filter 	= $this->get("filter");		
		$page 		= $this->get('page');		
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Proforma_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);	

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
				$data["results"][] = array(
					"id" 				=> $value->id,
					"contact_id" 		=> $value->contact_id,
					"employee_id" 		=> $value->employee_id,
			   		"transaction_id"	=> $value->transaction_id,
			   		"number" 			=> $value->number,
			   		"batch_number" 		=> $value->batch_number,
				   	"type" 				=> $value->type,
				   	"amount" 			=> floatval($value->amount),
				   	"rate"				=> floatval($value->rate),
				   	"movement" 			=> intval($value->movement),
				   	"locale" 			=> $value->locale,
				   	"issued_date" 		=> $value->issued_date,
				   	"status"			=> $value->status,
				   	"deleted"			=> $value->deleted
				);
			}						 			
		}		
		$this->response($data, 200);		
	}
	
	//POST
	function index_post() {
		$models = json_decode($this->post('models'));				
		$data["results"] = array();
		$data["count"] = 0;
		
		foreach ($models as $value) {
			$obj = new Proforma_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

			isset($value->transaction_id) 	? $obj->transaction_id 		= $value->transaction_id : "";
			isset($value->payment_method_id)? $obj->payment_method_id 	= $value->payment_method_id : "";
			isset($value->tax_item_id) 		? $obj->tax_item_id 		= $value->tax_item_id : "";			
			isset($value->wht_account_id) 	? $obj->wht_account_id 		= $value->wht_account_id : "";
			isset($value->account_id)		? $obj->account_id			= $value->account_id : "";
			isset($value->contact_id)		? $obj->contact_id			= $value->contact_id : "";			
		   	isset($value->description)		? $obj->description 		= $value->description : "";
		   	isset($value->reference_no)		? $obj->reference_no 		= $value->reference_no : "";
		   	isset($value->segments) 		? $obj->segments 			= implode(",",$value->segments) : "";
		   	isset($value->amount)			? $obj->amount 				= $value->amount : "";		   	
		   	isset($value->tax)				? $obj->tax 				= $value->tax : "";
		   	isset($value->rate)				? $obj->rate 				= $value->rate : "";
		   	isset($value->locale)			? $obj->locale 				= $value->locale : "";
		   	isset($value->reference_date)	? $obj->reference_date 		= $value->reference_date : "";
		   	isset($value->movement)			? $obj->movement 			= $value->movement : "";
		   	isset($value->deleted) 			? $obj->deleted 			= $value->deleted : "";

		   	//Account
			if(isset($value->account)){
				$obj->account_id = $value->account->id;
			}

		   	if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 				=> $obj->id,
					"contact_id" 		=> $obj->contact_id,
					"employee_id" 		=> $obj->employee_id,
			   		"transaction_id"	=> $obj->transaction_id,
			   		"number" 			=> $obj->number,
			   		"batch_number" 		=> $obj->batch_number,
				   	"type" 				=> $obj->type,
				   	"amount" 			=> floatval($obj->amount),
				   	"rate"				=> floatval($obj->rate),
				   	"movement" 			=> intval($obj->movement),
				   	"locale" 			=> $obj->locale,
				   	"issued_date" 		=> $obj->issued_date,
				   	"status"			=> $obj->status,
				   	"deleted"			=> $obj->deleted
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
			$obj = new Proforma_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			isset($value->transaction_id) 	? $obj->transaction_id 		= $value->transaction_id : "";
			isset($value->payment_method_id)? $obj->payment_method_id 	= $value->payment_method_id : "";
			isset($value->tax_item_id) 		? $obj->tax_item_id 		= $value->tax_item_id : "";
			isset($value->wht_account_id) 	? $obj->wht_account_id 		= $value->wht_account_id : "";			
			isset($value->account_id)		? $obj->account_id			= $value->account_id : "";
			isset($value->contact_id)		? $obj->contact_id			= $value->contact_id : "";			
		   	isset($value->description)		? $obj->description 		= $value->description : "";
		   	isset($value->reference_no)		? $obj->reference_no 		= $value->reference_no : "";
		   	isset($value->segments) 		? $obj->segments 			= implode(",",$value->segments) : "";
		   	isset($value->amount)			? $obj->amount 				= $value->amount : "";
		   	isset($value->tax)				? $obj->tax 				= $value->tax : "";		   	
		   	isset($value->rate)				? $obj->rate 				= $value->rate : "";		   	
		   	isset($value->locale)			? $obj->locale 				= $value->locale : "";
		   	isset($value->reference_date)	? $obj->reference_date 		= $value->reference_date : "";
		   	isset($value->movement)			? $obj->movement 			= $value->movement : "";
		    isset($value->deleted) 			? $obj->deleted 			= $value->deleted : "";

		    //Account
			if(isset($value->account)){
				$obj->account_id = $value->account->id;
			}

			if($obj->save()){				
				//Results
				$data["results"][] = array(
					"id" 				=> $obj->id,
					"contact_id" 		=> $obj->contact_id,
					"employee_id" 		=> $obj->employee_id,
			   		"transaction_id"	=> $obj->transaction_id,
			   		"number" 			=> $obj->number,
			   		"batch_number" 		=> $obj->batch_number,
				   	"type" 				=> $obj->type,
				   	"amount" 			=> floatval($obj->amount),
				   	"rate"				=> floatval($obj->rate),
				   	"movement" 			=> intval($obj->movement),
				   	"locale" 			=> $obj->locale,
				   	"issued_date" 		=> $obj->issued_date,
				   	"status"			=> $obj->status,
				   	"deleted"			=> $obj->deleted
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
			$obj = new Proforma_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			$obj->deleted = 1;

			$data["results"][] = array(
				"data"   	=> $value,
				"deleted" 	=> $obj->save()
			);							
		}

		//Response data
		$this->response($data, 200);
	}
		
}
/* End of file account_lines.php */
/* Location: ./application/controllers/api/account_lines.php */