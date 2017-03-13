<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Cash_modules extends REST_Controller {	
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
			date_default_timezone_set("$conn->time_zone");

			//Fiscal Date
			$this->fiscalDate = date("m-d", $institute->fiscal_date/1000);
			$currentFiscalDate = date("Y") ."-". $this->fiscalDate;
			$today = date("Y-m-d");
			if($today > $currentFiscalDate){
				$this->startFiscalDate 	= date("Y") ."-". $this->fiscalDate;
				$this->endFiscalDate 	= date("Y",strtotime("+1 year")) ."-". $this->fiscalDate;
			}else{
				$this->startFiscalDate 	= date("Y",strtotime("-1 year")) ."-". $this->fiscalDate;
				$this->endFiscalDate 	= date("Y") ."-". $this->fiscalDate;
			}

			//Add 1 day
			$this->startFiscalDate = date("Y-m-d", strtotime($this->startFiscalDate . "+1 days"));
			$this->endFiscalDate = date("Y-m-d", strtotime($this->endFiscalDate . "+1 days"));
		}
	}

	//@HOME PAGE GRAPH
	//GET CASH IN CASH OUT 
	function cash_in_out_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->include_related("transaction", array("rate","issued_date"));
		$obj->where_in_related("account", "account_type_id", array(10,11));
		$obj->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$obj->where_related("transaction", "issued_date <", $this->endFiscalDate);
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by_related("transaction", "issued_date", "asc");												
		$obj->get_iterated();

		$txnList = [];
		foreach ($obj as $value) {
			$month = date('M', strtotime($value->transaction_issued_date));
			$dr = floatval($value->dr) / floatval($value->transaction_rate);
			$cr = floatval($value->cr) / floatval($value->transaction_rate);

			if(isset($txnList[$month])){
				if($value->dr>0){
					$txnList[$month]["cash_in"] += $dr;
				}else{
					$txnList[$month]["cash_out"] += $cr;
				}
			} else {
				if($value->dr>0){
					$txnList[$month] = array("cash_in"=>$dr, "cash_out"=>0);
				}else{
					$txnList[$month] = array("cash_in"=>0, "cash_out"=>$cr);
				}			
			}			
		}		
		
		foreach ($txnList as $key => $value) {
			$data["results"][] = array(					
			   	"cash_in" 		=> $value['cash_in'],
			   	"cash_out" 		=> $value['cash_out'],				   	
			   	"month"			=> $key,
			   	"dr" 			=> $dr				   	
			);
		}					

		//Response Data		
		$this->response($data, 200);	
	}
	
	//CASH
	function top_cash_get() {
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;
		$ids = array();
		$balance = 0;

		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		$cash = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$cash->select('id');
		$cash->where('id', 1);
		$cash->or_where('sub_of_id', 1);
		$cash->get();

		foreach($cash as $c) {
			$ids[] = $c->id;
		}
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

		$obj->where_in("account_id", $ids);		
		$obj->get_iterated();

		$top = [];		
		$customer = [];

		//Group by contact_id
		foreach($obj as $value) {
			$account = $value->account->get();
			$temp = ((floatval($value->dr) - floatval($value->cr)) / $value->rate);			
			if(isset($customer[$value->account_id])){
				$customer[$value->account_id]['amount'] += $temp;
			} else {
				$customer[$value->account_id]['amount'] = $temp;
				$customer[$value->account_id]['number'] = $account->number;
				$customer[$value->account_id]['name'] 	= $account->name;
			}

			$balance += $temp;					
		}		

		//Sort amount
		foreach($customer as $key => $value) {
			$top["$key"] = $value['amount'];
		}
		array_multisort($top, SORT_DESC, $customer);

		$myLimit = 0;
		if(count($customer) > 5) {
			$myLimit = 5;
		} else {
			$myLimit = count($customer);
		}
		for($i = 0; $i<$myLimit; $i++) {
			$data['results'][] = $customer[$i];
		}

		$data['balance'] = $balance;
		$data['cashACNumber'] = count($ids);
		//Response Data		
		$this->response($data, 200);
	}
	function top_expense_get() {
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;
		$ids = array();

		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		$cash = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$cash->select('id');
		$cash->where('account_type_id', 37);
		$cash->get();

		foreach($cash as $c) {
			$ids[] = $c->id;
		}

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

		$obj->where_in("account_id", $ids);		
		$obj->get_iterated();

		$top = [];		
		$customer = [];

		//Group by contact_id
		foreach($obj as $value) {
			$account = $value->account->get();			
			if(isset($customer[$value->account_id])){
				$customer[$value->account_id]['amount'] += (floatval($value->dr) - floatval($value->cr));
			} else {
				$customer[$value->account_id]['amount'] = (floatval($value->dr) - floatval($value->cr));
				$customer[$value->account_id]['number'] = $account->number;
				$customer[$value->account_id]['name'] 	= $account->name;
			}					
		}		

		//Sort amount
		foreach($customer as $key => $value) {
			$top["$key"] = $value['amount'];
		}
		array_multisort($top, SORT_DESC, $customer);

		$myLimit = 0;
		if(count($customer) > 5) {
			$myLimit = 5;
		} else {
			$myLimit = count($customer);
		}
		for($i = 0; $i<$myLimit; $i++) {
			$data['results'][] = $customer[$i];
		}

		$data['count'] = $myLimit;
		//Response Data		
		$this->response($data, 200);
	}	
	// cash advance
	function top_advance_get() {
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;
		$ids = array();

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

		$obj->where("type", "Cash_Advance");
		$obj->where("status", 0);		
		$obj->get_iterated();

		$top = [];		
		$customer = [];
		$open = 0;
		$over_due = 0;
		$total_advance = 0;

		//Group by contact_id
		foreach($obj as $value) {
			$employee = $value->contact->get();

			$today = date("Y-m-d");
			$expire = $value->due_date; //from db

			$today_time = new DateTime($today);
			$expire_time = new DateTime($expire);			
			if(isset($customer[$value->contact_id])){
				$customer[$value->contact_id]['amount'] += floatval($value->amount) / floatval($value->rate);
			} else {
				$customer[$value->contact_id]['amount'] = floatval($value->amount) / floatval($value->rate);
				$customer[$value->contact_id]['name']   = $employee->name;
			}
			if($today_time > $expire_time) {
				$over_due++;
			}
			$open++;
			$total_advance += floatval($value->amount) / floatval($value->rate);			
		}		

		//Sort amount
		foreach($customer as $key => $value) {
			$top["$key"] = $value['amount'];
		}
		array_multisort($top, SORT_DESC, $customer);
		
		$myLimit = 0;
		if(count($customer) > 5) {
			$myLimit = 5;
		} else {
			$myLimit = count($customer);
		}

		for($i = 0; $i<$myLimit; $i++) {
			$data['results'][] = $customer[$i];
		}
		$data['open'] = $open;
		$data['overDue'] = $over_due;
		$data['total_advance'] = $total_advance;
		//Response Data		
		$this->response($data, 200);
	}
	
}
/* End of file cash_modules.php */
/* Location: ./application/controllers/api/cash_modules.php */