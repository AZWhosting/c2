<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Rice_mill_modules extends REST_Controller {	
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
	
	//GET RECEIPT NOTE REPORT
	function receipt_note_report_get() {
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
	    	foreach ($filter['filters'] as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->include_related("transaction/contact", array("abbr", "number", "name"));
		$obj->include_related("item", array("abbr", "number", "name"));
		$obj->include_related("measurement", array("name"));
		$obj->include_related("transaction", array("number", "type", "issued_date", "rate"));
		$obj->where_related("transaction", "type", "Receipt_Note");
		$obj->where_related("transaction", "status <>", 4);
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where("deleted <>", 1);		
		$obj->order_by_related("transaction", "issued_date", "desc");

		//Results
		$obj->get_iterated();
		
		if($obj->exists()){
			foreach ($obj as $value) {
				$data["results"][] = array(
					"id" 				=> $value->transaction_id,
					"type" 				=> $value->transaction_type,
					"number" 			=> $value->transaction_number,
					"issued_date" 		=> $value->transaction_issued_date,
					"rate" 				=> $value->transaction_rate,
					"gross_weight" 		=> floatval($value->gross_weight),
					"truck_weight" 		=> floatval($value->truck_weight),
					"bag_weight" 		=> floatval($value->bag_weight),
					"yield" 			=> floatval($value->yield),
					"quantity" 			=> floatval($value->quantity),
				   	"conversion_ratio" 	=> floatval($value->conversion_ratio),

				   	"name" 				=> $value->transaction_contact_name,
				   	"item" 				=> $value->item_name,
				   	"measurement" 		=> $value->measurement_name
				);
			}
		}
		$data["count"] = count($data["results"]);
		
		$this->response($data, 200);
	}

	//GET RICE MILL PRODUCTION REPORT
	function rice_mill_production_report_get() {
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
	    	foreach ($filter['filters'] as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->include_related("transaction/contact", array("abbr", "number", "name"));
		$obj->include_related("item", array("abbr", "number", "name"));
		$obj->include_related("measurement", array("name"));
		$obj->include_related("transaction", array("number", "type", "issued_date", "rate"));
		$obj->where_related("transaction", "type", "Rice_Mill_Production");
		$obj->where_related("transaction", "status <>", 4);
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where("deleted <>", 1);		
		$obj->order_by_related("transaction", "issued_date", "desc");

		//Results
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				if(isset($objList[$value->transaction_id])){
					$objList[$value->transaction_id]["line"][] 		= array(
						"quantity" 			=> floatval($value->quantity),
					   	"conversion_ratio" 	=> floatval($value->conversion_ratio),
					   	"cost" 				=> floatval($value->cost),
					   	"amount" 			=> floatval($value->amount) / floatval($value->transaction_rate),
					   	"item" 				=> $value->item_name,
					   	"measurement" 		=> $value->measurement_name,
					   	"movement" 			=> $value->movement
					);
				}else{
					$objList[$value->transaction_id]["id"] 			= $value->transaction_id;
					$objList[$value->transaction_id]["type"] 		= $value->transaction_type;
					$objList[$value->transaction_id]["number"] 		= $value->transaction_number;
					$objList[$value->transaction_id]["issued_date"] = $value->transaction_issued_date;
					$objList[$value->transaction_id]["rate"] 		= $value->transaction_rate;
					$objList[$value->transaction_id]["name"] 		= $value->transaction_contact_name;					
					$objList[$value->transaction_id]["line"][] 		= array(
						"quantity" 			=> floatval($value->quantity),
					   	"conversion_ratio" 	=> floatval($value->conversion_ratio),
					   	"cost" 				=> floatval($value->cost),
					   	"amount" 			=> floatval($value->amount) / floatval($value->transaction_rate),
					   	"item" 				=> $value->item_name,
					   	"measurement" 		=> $value->measurement_name,
					   	"movement" 			=> $value->movement,
					);
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
		}
		$data["count"] = count($data["results"]);
		
		$this->response($data, 200);
	}
}
/* End of file inventory_modules.php */
/* Location: ./application/controllers/api/inventory_modules.php */