<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Accounting_reports extends REST_Controller {	
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
	
	//GET JOURNAL
	function journal_get() {		
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
		
		$obj->where("is_recurring", $is_recurring);
		$obj->where("is_journal", 1);
		$obj->where("deleted", $deleted);		
		
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;							

		if($obj->exists()){
			foreach ($obj as $value) {				
				$lines = $value->journal_line->where("deleted",0)->order_by("dr", "desc")->get();
				$line = [];
				foreach ($lines as $l) {
					$segmentLists = new SegmentList(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$segmentLists->where_in("id", explode(",",$l->segments));
					
					$line[] = array(
						"description" 	=> $l->description,
						"reference_no" 	=> $l->reference_no,
						"segments" 		=> $l->segments,
						"dr" 			=> floatval($l->dr),
						"cr" 			=> floatval($l->cr),
						"rate" 			=> floatval($l->rate),
						"locale" 		=> $l->locale,

						"account" 		=> $l->account->get_raw()->result(),
						"contact" 		=> $l->contact->get_raw()->result(),
						"segmentList" 	=> $segmentLists->get_raw()->result()
					); 
				}

				$data["results"][] = array(
					"id" 			=> $value->id,
					"number" 		=> $value->number,				
				   	"type" 			=> $value->type,
				   	"amount" 		=> floatval($value->amount),
				   	"rate" 			=> floatval($value->rate),
				   	"locale" 		=> $value->locale,				   	
				   	"issued_date"	=> $value->issued_date,
				   	"memo" 			=> $value->memo,

				   	"line" 			=> $line
				);
			}
		}		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET TRIAL BALANCE
	function trial_balance_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;

		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
		    		}else if($value["operator"]=="where_related"){
		    			$obj->where_related($value["model"], $value["field"], $value["value"]);		    				    		
		    		}else{
		    			$obj->where($value["field"], $value["value"]);
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
				
		$obj->where("deleted", $deleted);			
		
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;

		if($obj->exists()){
			//Sum dr and cr
			$sumDr = 0;
			$sumCr = 0;			
			$accountList = [];
			foreach ($obj as $value) {
				if($value->dr>0 || $value->cr>0){
					$sumDr += floatval($value->dr) / floatval($value->rate);
					$sumCr += floatval($value->cr) / floatval($value->rate);

					//Group customer
					if(isset($accountList[$value->account_id])){
						$accountList[$value->account_id]["dr"] += $sumDr;
						$accountList[$value->account_id]["cr"] += $sumCr;
					} else {
						$accountList[$value->account_id]["dr"] = $sumDr;
						$accountList[$value->account_id]["cr"] = $sumCr;
					}
				}
			}

			//Calculate by account nature
			foreach ($accountList as $key => $value) {
				$account = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$account->include_related("account_type", "*");
				$account->get_by_id($key);

				if($account->account_type_nature=="Dr"){
					$dr = $value["dr"] - $value["cr"];
					$cr = 0;
				}else{
					$dr = 0;
					$cr = $value["cr"] - $value["dr"];					
				}

				$data["results"][] = array(
					"id" 			=> $key,
					"number" 		=> $account->code,
					"name" 			=> $account->name,				
				   	"type" 			=> $account->account_type_name,
				   	"dr" 			=> $dr,
				   	"cr" 			=> $cr
				);
			}
		}		

		//Response Data		
		$this->response($data, 200);	
	}	
	
	
}
/* End of file accounting_reports.php */
/* Location: ./application/controllers/api/accounting_reports.php */