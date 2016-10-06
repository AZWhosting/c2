<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Accounting_reports extends REST_Controller {	
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
	

	//GET HOME SUMMARY
	function home_summary_get() {		
		$filters 	= $this->get("filte r")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;
		$today = date("Y-m-d");


		//INCOME (from begining to as of)
		$income = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$income->where_in_related("account/account_type", "id", array(35,39));
		$income->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$income->where_related("transaction", "issued_date <=", $today);
		$income->where_related("transaction", "is_recurring", 0);
		$income->where_related("transaction", "deleted", 0);
		$income->where("deleted", 0);		
		$income->get_iterated();
		
		//Sum dr and cr					
		$incomeDr = 0;
		$incomeCr = 0;
		foreach ($income as $value) {			
			if($value->dr>0){
				$incomeDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$incomeCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalIncome = $incomeCr - $incomeDr;
		//END INCOME


		//EXPENSE (from begining to as of)
		$expense = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$expense->where_in_related("account/account_type", "id", array(36,37,38,40,41,42));
		$expense->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$expense->where_related("transaction", "issued_date <=", $today);
		$expense->where_related("transaction", "is_recurring", 0);
		$expense->where_related("transaction", "deleted", 0);
		$expense->where("deleted", 0);		
		$expense->get_iterated();
		
		//Sum dr and cr					
		$expenseDr = 0;
		$expenseCr = 0;
		foreach ($expense as $value) {			
			if($value->dr>0){
				$expenseDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$expenseCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalExpense = $expenseDr - $expenseCr;
		//END EXPENSE

		//ASSET (as of)
		$asset = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$asset->where_in_related("account/account_type", "id", array(10,11,12,13,14,15,16,17,18,19,20,21,22));
		$asset->where_related("transaction", "issued_date <=", $today);
		$asset->where_related("transaction", "is_recurring", 0);
		$asset->where_related("transaction", "deleted", 0);
		$asset->where("deleted", 0);		
		$asset->get_iterated();
		
		//Sum dr and cr					
		$assetDr = 0;
		$assetCr = 0;
		foreach ($asset as $value) {			
			if($value->dr>0){
				$assetDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$assetCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalAsset = $assetDr - $assetCr;
		//END ASSET

		//LIABILITY (as of)
		$liability = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$liability->where_in_related("account/account_type", "id", array(23,24,25,26,27,28,29,30,31,32));
		$liability->where_related("transaction", "issued_date <=", $today);
		$liability->where_related("transaction", "is_recurring", 0);
		$liability->where_related("transaction", "deleted", 0);
		$liability->where("deleted", 0);		
		$liability->get_iterated();
		
		//Sum dr and cr					
		$liabilityDr = 0;
		$liabilityCr = 0;
		foreach ($liability as $value) {			
			if($value->dr>0){
				$liabilityDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$liabilityCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalLiability = $liabilityCr - $liabilityDr;
		//END LIABILITY

		$data["results"][] = array(
			"id" 			=> 0,
			"income" 		=> $totalIncome,
			"expense" 		=> $totalExpense,				
		   	"net_income" 	=> $totalIncome - $totalExpense,
		   	"asset" 		=> $totalAsset,
		   	"liability" 	=> $totalLiability,
		   	"equity" 		=> $totalAsset - $totalLiability
		);
						
		$data["count"] = count($data["results"]);

		//Response Data		
		$this->response($data, 200);	
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
		
		$obj->where("is_journal", 1);
		$obj->where("is_recurring", 0);		
		$obj->where("deleted", 0);
		$obj->order_by("issued_date", "desc");		
		
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;							

		if($obj->exists()){
			foreach ($obj as $value) {				
				$lines = $value->journal_line->where("deleted",0)->order_by("dr", "desc")->get();
				$line = [];
				foreach ($lines as $l) {
					// $segmentLists = new SegmentList(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					// $segmentLists->where_in("id", explode(",",$l->segments));
					
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
						"segmentList" 	=> []//$segmentLists->get_raw()->result()
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
		$filters 	= $this->get("filte r")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;		
		
		$balanceSheet = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$prevPL = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$currPL = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
		$retainEarning = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				
		//Filter		
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {
	    		if(!empty($value["operator"]) && isset($value["operator"])){
		    		if($value["operator"]=="where_related"){
		    			$balanceSheet->where_related($value["model"], $value["field"], $value["value"]);
		    			$currPL->where_related($value["model"], $value["field"], $value["value"]);		    			
		    			$retainEarning->where_related($value["model"], $value["field"], $value["value"]);		    				    				    		
		    		}	    				    			
	    		}
			}									 			
		}
		
		//BALANCE SHEET (from begining to as of)
		$balanceSheet->include_related("account", array("number","name"));
		$balanceSheet->include_related("account/account_type", array("name","nature"));		
		$balanceSheet->where_related("account", "account_type_id >=", 10);
		$balanceSheet->where_related("account", "account_type_id <=", 33);
		$balanceSheet->where_related("transaction", "is_recurring", $is_recurring);
		$balanceSheet->where_related("transaction", "deleted", $deleted);
		$balanceSheet->where("deleted", $deleted);		
		$balanceSheet->get_iterated();
		
		//Sum dr and cr					
		$accountList = [];
		foreach ($balanceSheet as $value) {
			$dr = 0;
			$cr = 0;
			if($value->dr>0){
				$dr = floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$cr = floatval($value->cr) / floatval($value->rate);
			}

			//Group
			if(isset($accountList[$value->account_id])){					
				$accountList[$value->account_id]["dr"] 		+= $dr;
				$accountList[$value->account_id]["cr"] 		+= $cr;
			} else {
				$accountList[$value->account_id]["number"] 	= $value->account_number;
				$accountList[$value->account_id]["name"] 	= $value->account_name;
				$accountList[$value->account_id]["type"] 	= $value->account_account_type_name;
				$accountList[$value->account_id]["nature"] 	= $value->account_account_type_nature;
				$accountList[$value->account_id]["dr"] 		= $dr;
				$accountList[$value->account_id]["cr"] 		= $cr;
			}			
		}
		
		//Calculate by account nature
		foreach ($accountList as $key => $value) {
			if($value["nature"]=="Dr"){
				$dr = $value["dr"] - $value["cr"];
				$cr = 0;
			}else{
				$dr = 0;
				$cr = $value["cr"] - $value["dr"];					
			}

			$data["results"][] = array(
				"id" 			=> $key,
				"number" 		=> $value["number"],
				"name" 			=> $value["name"],				
			   	"type" 			=> $value["type"],
			   	"dr" 			=> $dr,
			   	"cr" 			=> $cr
			);
		}
		//END BALANCE SHEET


		//CURRENT PROFIT AND LOSS (from fiscal date to as of)
		$currPL->include_related("account", array("number","name"));
		$currPL->include_related("account/account_type", array("name","nature"));		
		$currPL->where_related("account", "account_type_id >=", 35);
		$currPL->where_related("account", "account_type_id <=", 43);
		$currPL->where_related("transaction", "issued_date >", $this->startFiscalDate);
		$currPL->where_related("transaction", "is_recurring", $is_recurring);
		$currPL->where_related("transaction", "deleted", $deleted);		
		$currPL->where("deleted", $deleted);
		$currPL->get_iterated();

		//Sum dr and cr					
		$accountList = [];		
		foreach ($currPL as $value) {
			$dr = 0;
			$cr = 0;
			if($value->dr>0){
				$dr = floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$cr = floatval($value->cr) / floatval($value->rate);
			}			

			//Group
			if(isset($accountList[$value->account_id])){					
				$accountList[$value->account_id]["dr"] 		+= $dr;
				$accountList[$value->account_id]["cr"] 		+= $cr;
			} else {
				$accountList[$value->account_id]["number"] 	= $value->account_number;
				$accountList[$value->account_id]["name"] 	= $value->account_name;
				$accountList[$value->account_id]["type"] 	= $value->account_account_type_name;
				$accountList[$value->account_id]["nature"] 	= $value->account_account_type_nature;
				$accountList[$value->account_id]["dr"] 		= $dr;
				$accountList[$value->account_id]["cr"] 		= $cr;
			}			
		}		
		
		//Calculate by account nature
		foreach ($accountList as $key => $value) {
			if($value["nature"]=="Dr"){
				$dr = $value["dr"] - $value["cr"];
				$cr = 0;
			}else{
				$dr = 0;
				$cr = $value["cr"] - $value["dr"];					
			}

			$data["results"][] = array(
				"id" 			=> $key,
				"number" 		=> $value["number"],
				"name" 			=> $value["name"],				
			   	"type" 			=> $value["type"],
			   	"dr" 			=> $dr,
			   	"cr" 			=> $cr
			);
		}
		//END CURRENT PROFIT AND LOSS


		//RETAINED EARNING = Profit Loss + Retained Earning
		//PREVIOUSE PROFIT AND LOSS (from begining to fiscal date) Cr - Dr				
		$prevPL->where_related("account", "account_type_id >=", 35);
		$prevPL->where_related("account", "account_type_id <=", 43);
		$prevPL->where_related("transaction", "issued_date <", $this->startFiscalDate);
		$prevPL->where_related("transaction", "is_recurring", $is_recurring);
		$prevPL->where_related("transaction", "deleted", $deleted);		
		$prevPL->where("deleted", $deleted);
		$prevPL->get_iterated();

		//Sum dr and cr
		$sumDr = 0;
		$sumCr = 0;		
		foreach ($prevPL as $value) {			
			if($value->dr>0){
				$sumDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$sumCr += floatval($value->cr) / floatval($value->rate);
			}		
		}
		$prevPLAmount = $sumCr - $sumDr;
		//END PREVIOUSE PROFIT AND LOSS
		

		//RETAINED EARNING (from begining to as of)
		$retainEarning->where("account_id", 70);		
		$retainEarning->where_related("transaction", "is_recurring", $is_recurring);
		$retainEarning->where_related("transaction", "deleted", $deleted);		
		$retainEarning->where("deleted", $deleted);
		$retainEarning->get_iterated();
		
		//Sum dr and cr
		$retainEarningId = 0;
		$retainEarningNumber = "";
		$retainEarningName = "";
		$retainEarningType = "";
		$sumDr = 0;
		$sumCr = 0;

		//Get Retain Earning Account
		$retainEarningAccount = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$retainEarningAccount->include_related("account_type", array("name","nature"));
		$retainEarningAccount->get_by_id(70);

		$retainEarningId = 70;
		$retainEarningNumber = $retainEarningAccount->number;
		$retainEarningName = $retainEarningAccount->name;
		$retainEarningType = $retainEarningAccount->account_type_name;

		foreach ($retainEarning as $value) {
			if($value->dr>0){
				$sumDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$sumCr += floatval($value->cr) / floatval($value->rate);
			}		
		}
		$retainEarningAmount = $sumCr - $sumDr;
		//END RETAINED EARNING
		

		//Total Retain Earning
		$totalRetainEarning = $prevPLAmount + $retainEarningAmount;
		
		$data["results"][] = array(
			"id" 			=> $retainEarningId,
			"number" 		=> $retainEarningNumber,
			"name" 			=> $retainEarningName,				
		   	"type" 			=> $retainEarningType,
		   	"dr" 			=> 0,
		   	"cr" 			=> $totalRetainEarning
		);
		
				
		$data["count"] = count($data["results"]);

		//Response Data		
		$this->response($data, 200);	
	}	
	
	
}
/* End of file accounting_reports.php */
/* Location: ./application/controllers/api/accounting_reports.php */