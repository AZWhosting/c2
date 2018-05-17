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

	//GET DASHBOARD
	function dashboard_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$today = date("Y-m-d");
		$asOftoday = date("Y-m-d", strtotime($today . "+1 days"));

		//Receivables
		$receivables = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$receivables->select_sum("(amount - deposit) / rate", "total");
		$receivables->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice"));
		$receivables->where("status", 0);
		$receivables->where("is_recurring <>", 1);
		$receivables->where("deleted <>", 1);
		$receivables->get();

		$receivablePartiallys = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$receivablePartiallys->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice"));
		$receivablePartiallys->where("status", 2);
		$receivablePartiallys->where("is_recurring <>", 1);
		$receivablePartiallys->where("deleted <>", 1);
		$receivablePartiallys->get();
		$ids = [];
		$totalReceivablePartially = 0;
		foreach ($receivablePartiallys as $value) {
			$totalReceivablePartially += floatval($value->amount) - floatval($value->deposit);
			array_push($ids, $value->id);
		}
		$receivableCashReceipt = 0;
		if(count($ids)>0){
			$receivableCashReceipts = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
			$receivableCashReceipts->select_sum("amount / rate", "total");
			$receivableCashReceipts->where("type", "Cash_Receipt");
			$receivableCashReceipts->where_in("reference_id", $ids);
			$receivableCashReceipts->where("is_recurring <>", 1);
			$receivableCashReceipts->where("deleted <>", 1);
			$receivableCashReceipts->get();

			$receivableCashReceipt = floatval($receivableCashReceipts->total);
		}

		$receivableOffsets = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$receivableOffsets->select_sum("amount / rate", "total");
		$receivableOffsets->where_in("type", array("Cash_Refund","Sale_Return"));
		$receivableOffsets->where("is_recurring <>", 1);
		$receivableOffsets->where("deleted <>", 1);
		$receivableOffsets->get();

		$receivable = (floatval($receivables->total) + $totalReceivablePartially) - (floatval($receivableOffsets->total) + $receivableCashReceipt);


		$purchaseList = array("Cash_Purchase","Credit_Purchase", "Sale_Return","Cash_Refund");
		$saleList = array("Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale","Purchase_Return","Payment_Refund");
		$inventoryList = array("Item_Adjustment","Internal_Usage");

		//INVENTORY VALUE
		$unitOnHand = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);							
		$unitOnHand->select_sum("quantity * conversion_ratio * movement", "total");
		$unitOnHand->where_related("transaction", "issued_date <", $asOftoday);
		$unitOnHand->where_related("transaction", "is_recurring <>", 1);
		$unitOnHand->where_related("transaction", "deleted <>", 1);
		$unitOnHand->where_related("item", "item_type_id", 1);
		$unitOnHand->where("movement <>", 0);
		$unitOnHand->where("deleted <>", 1);
		$unitOnHand->get();

		$purchases = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$purchases->select_sum("(item_lines.quantity * conversion_ratio * item_lines.cost) + item_lines.additional_cost + inventory_adjust_value", "total");
		$purchases->where_in_related("transaction", "type", $purchaseList);
		$purchases->where_related("transaction", "issued_date <", $asOftoday);
		$purchases->where_related("transaction", "is_recurring <>", 1);
		$purchases->where_related("transaction", "deleted <>", 1);
		$purchases->where_related("item", "item_type_id", 1);
		$purchases->where("deleted <>", 1);
		$purchases->get();

		$costOfSales = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$costOfSales->select_sum("(item_lines.quantity * conversion_ratio * item_lines.cost) + inventory_adjust_value", "total");
		$costOfSales->where_in_related("transaction", "type", $saleList);
		$costOfSales->where_related("transaction", "issued_date <", $asOftoday);
		$costOfSales->where_related("transaction", "is_recurring <>", 1);
		$costOfSales->where_related("transaction", "deleted <>", 1);
		$costOfSales->where_related("item", "item_type_id", 1);
		$costOfSales->where("deleted <>", 1);
		$costOfSales->get();

		$inventoryCosts = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$inventoryCosts->select_sum("(item_lines.quantity * conversion_ratio * movement * item_lines.cost) + inventory_adjust_value", "total");
		$inventoryCosts->where_in_related("transaction", "type", $inventoryList);
		$inventoryCosts->where_related("transaction", "issued_date <", $asOftoday);
		$inventoryCosts->where_related("transaction", "is_recurring <>", 1);
		$inventoryCosts->where_related("transaction", "deleted <>", 1);
		$inventoryCosts->where_related("item", "item_type_id", 1);
		$inventoryCosts->where("movement <>", 0);
		$inventoryCosts->where("deleted <>", 1);
		$inventoryCosts->get();

		//Inventory Total Cost
		$totalInventory = floatval($purchases->total) - floatval($costOfSales->total) + floatval($inventoryCosts->total);
		//END INVENTORY

		//cash position
		$cash = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);	
		$cash->include_related("transaction", array("rate"));
		$cash->where_related("account","account_type_id", 10);
		$cash->include_related("account/account_type", array("nature"));
		$cash->where_related("transaction", "is_recurring <>", 1);		
		$cash->where_related("transaction", "deleted <>", 1);
		$cash->where("deleted <>", 1);
		$cash->get_iterated();

		$cash_position = 0;	
		if($cash->exists()){
			foreach ($cash as $value) {
				$amount = 0;
				if($value->account_account_type_nature=="Dr"){
					$amount = (floatval($value->dr) - floatval($value->cr)) / floatval($value->transaction_rate);				
				}else{
					$amount = (floatval($value->cr) - floatval($value->dr)) / floatval($value->transaction_rate);					
				}
				
				$cash_position += $amount;
			}
		}

		//Top 5 AR
		$topAR = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$topAR->select_sum("amount / rate", "total");
		$topAR->include_related("contact", array("name"), FALSE);
		$topAR->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice","Sale_Return"));
		$topAR->where_in("status", array(0,2));
		$topAR->where("is_recurring <>", 1);
		$topAR->where("deleted <>", 1);
		$topAR->order_by("total", "desc");
		$topAR->group_by("contact_id");
		$topAR->limit(5);
		$top_ar = $topAR->get_raw()->result();

		//Top 5 Products
		$topProducts = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$topProducts->select_sum("quantity * conversion_ratio", "total");
		$topProducts->include_related("item", array("name"), FALSE);
		$topProducts->where_in_related("transaction", "type", array("Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));	
		$topProducts->where_related("transaction", "is_recurring <>", 1);
		$topProducts->where_related("transaction", "deleted <>", 1);
		$topProducts->where_related("item", "item_type_id", 1);
		$topProducts->where("item_id >", 0);
		$topProducts->where("deleted <>", 1);
		$topProducts->order_by("total", "desc");
		$topProducts->group_by("item_id");
		$topProducts->limit(5);
		$top_product = $topProducts->get_raw()->result();

		//Results
		$data["results"][] = array(
			'id' 				=> 0,
			'receivable' 		=> $receivable,
			'inventory_value' 	=> $totalInventory,
			'cash_position'		=> $cash_position,

			'top_ar' 			=> $top_ar,
			'top_product'  		=> $top_product
		);

		$data["count"] = count($data["results"]);

		//Response Data		
		$this->response($data, 200);	
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