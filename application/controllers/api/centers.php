<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Centers extends REST_Controller {	
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

	
	//GET ACCOUNTING SUMMARY
	
	function accounting_summary_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;

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
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}
		
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);		
		$obj->where("deleted <>", 1);			
		
		//Results
		$obj->get_iterated();
		$data["count"] = $obj->result_count();

		if($obj->exists()){
			//Sum dr and cr
			$sumDr = 0;
			$sumCr = 0;
			$account_id = 0;
			$locale = "";			
			foreach ($obj as $value) {
				$account_id = $value->account_id;
				$locale = $value->locale;
				
				if($value->dr<>0 || $value->cr<>0){
					$sumDr += floatval($value->dr) / floatval($value->rate);
					$sumCr += floatval($value->cr) / floatval($value->rate);					
				}
			}
			
			$account = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$account->include_related("account_type", "*");
			$account->get_by_id($account_id);

			$balance = 0;
			if($account->account_type_nature=="Dr"){
				$balance = $sumDr - $sumCr;				
			}else{				
				$balance = $sumCr - $sumDr;					
			}

			$data["results"][] = array(
				"id" 			=> 0,
				"balance" 		=> $balance,
				"locale" 		=> $locale		   	
			);			
		}		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET ACCOUNTING
	function accounting_txn_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;

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
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->include_related("transaction", array("number","type","issued_date"));
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by_related("transaction", "issued_date", "desc");		
		
		//Results
		$obj->get_iterated();
		$data["count"] = $obj->result_count();		
		
		if($obj->result_count()>0){			
			foreach ($obj as $value) {
				$data["results"][] = array(
					"id" 				=> $value->id,
			   		"transaction_id"	=> $value->transaction_id,			   		
					"account_id" 		=> $value->account_id,
					"contact_id" 		=> $value->contact_id,								   	
				   	"description" 		=> $value->description,
				   	"reference_no" 		=> $value->reference_no,
				   	"segments" 			=> explode(",",$value->segments),
				   	"dr" 				=> floatval($value->dr),			   				   	
				   	"cr" 				=> floatval($value->cr),
				   	"rate"				=> floatval($value->rate),
				   	"locale" 			=> $value->locale,

				   	"number" 			=> $value->transaction_number,
				   	"type" 				=> $value->transaction_type,
				   	"issued_date" 		=> $value->transaction_issued_date
				);
			}						 			
		}		
		$this->response($data, 200);		
	}	
		
}
/* End of file centers.php */
/* Location: ./application/controllers/api/centers.php */