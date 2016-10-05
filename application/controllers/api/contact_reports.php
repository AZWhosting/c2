<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Contact_reports extends REST_Controller {	
	public $_database;
	public $server_host;
	public $server_user;
	public $server_pwd;
	public $startFiscalDate;
	public $endFiscalDate;
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
			
			//Fiscal Date
			$today = date("Y-m-d");
			$fdate = date("Y") ."-". $institute->fiscal_date;
			if($today > $fdate){
				$this->startFiscalDate 	= date("Y") ."-". $institute->fiscal_date;
				$this->endFiscalDate 	= date("Y",strtotime("+1 year")) ."-". $institute->fiscal_date;
			}else{
				$this->startFiscalDate 	= date("Y",strtotime("-1 year")) ."-". $institute->fiscal_date;
				$this->endFiscalDate 	= date("Y") ."-". $institute->fiscal_date;
			}
		}
	}

	
	//GET BALANCE
	function balance_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;

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
		    			$obj->where($value["field"], $value["value"]);
		    		}
	    		}else{	    			
	    			if($value["field"]=="is_pattern"){
	    				$is_pattern = $value["value"];
	    			}else if($value["field"]=="deleted"){
	    				$deleted = $value["value"];
	    			}else{
	    				$obj->where($value["field"], $value["value"]);
	    			}	    				    			
	    		}
			}									 			
		}

		$obj->include_related("contact", array("number","surname","name","company"));
		$obj->include_related("contact/contact_type", "name");		
		$obj->where("is_recurring", $is_recurring);		
		$obj->where("deleted", $deleted);		
		
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;							

		if($obj->exists()){
			foreach ($obj as $value) {
				$fullname = $value->contact_surname ." ". $value->contact_name;
				if($value->contact_company){
					$fullname = $value->contact_company;
				}
				
				$paid = 0;
				if($inv->status==2){
					$receipt = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);					
					$receipt->select_sum("amount");
					$receipt->where("type", "Cash_Receipt");
					$receipt->where("reference_id", $inv->id);
					$get();

					$paid = floatval($receipt->amount);
				}
				$amount = floatval($inv->amount) - $paid;
				$balance += $amount / floatval($inv->rate);								

				$data["results"][] = array(
					"id" 				=> $value->id,
					"number" 			=> $value->number,
					"fullname" 			=> $fullname,
					"status" 			=> $value->status,			
				   	"contact_type" 		=> $value->contact_type_name,
				   	"balance" 			=> $balance
				);
			}
		}		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET BALANCE TOTAL
	function balance_total_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;
		$transaction_date = null;

		$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}
		
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
		    		}else if($value["operator"]=="transaction_date"){
		    			$transaction_date = $value["value"];
		    		}else{
		    			$obj->where($value["field"], $value["value"]);
		    		}
	    		}else{	    			
	    			if($value["field"]=="is_pattern"){
	    				$is_pattern = $value["value"];
	    			}else if($value["field"]=="deleted"){
	    				$deleted = $value["value"];
	    			}else{
	    				$obj->where($value["field"], $value["value"]);
	    			}	    				    			
	    		}
			}									 			
		}

		$obj->include_related("contact_type", "name");
		$obj->where_related("contact_type", "parent_id", 1);
		$obj->where("is_pattern", $is_pattern);		
		$obj->where("deleted", $deleted);		
		
		//Results
		$obj->get_iterated();
		$data["count"] = $obj->result_count();							

		$ids = [];
		foreach ($obj as $value) {
			array_push($ids, $value->id);			
		}

		//Invoice
		$invoice = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);	
		$invoice->where("type", "Invoice");
		$invoice->where_in("status", array(0,2));
		$invoice->where_in("contact_id", $ids);
		if($transaction_date!==null){
			$invoice->where("issued_date <=", $transaction_date);
		}				
		$invoice->get_iterated();

		$balance = 0;
		foreach($invoice as $inv) {
			$paid = 0;
			if($inv->status==2){
				$receipt = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);					
				$receipt->select_sum("amount");
				$receipt->where("type", "Cash_Receipt");
				$receipt->where("reference_id", $inv->id);
				$get();

				$paid = floatval($receipt->amount);
			}
			$amount = floatval($inv->amount) - $paid;
			$balance += $amount / floatval($inv->rate);											
		}

		$data["results"][] = array(
			"id" 		=> 0,			
		   	"total" 	=> $balance
		);			

		//Response Data		
		$this->response($data, 200);	
	}

	
}
/* End of file customer_reports.php */
/* Location: ./application/controllers/api/customer_reports.php */