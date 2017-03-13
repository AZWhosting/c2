<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Inventory_modules extends REST_Controller {	
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

		//INVENTORY TURN OVER
		$inventory = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$inventory->include_related("transaction", array("rate"));
		$inventory->where_related("account", "account_type_id", 13);		
		$inventory->where_related("transaction", "issued_date <", $asOftoday);
		$inventory->where_related("transaction", "is_recurring <>", 1);
		$inventory->where_related("transaction", "deleted <>", 1);
		$inventory->where("deleted <>", 1);
		$inventory->get_iterated();
		
		//Sum Dr and Cr
		$inventoryDr = 0;
		$inventoryCr = 0;
		foreach ($inventory as $value) {
			if($value->dr>0){
				$inventoryDr += floatval($value->dr) / floatval($value->transaction_rate);
			}
			if($value->cr>0){
				$inventoryCr += floatval($value->cr) / floatval($value->transaction_rate);
			}	
		}
		
		$totalInventory = $inventoryDr - $inventoryCr;
		//END INVENTORY

		//SALE (Begin FiscalDate To As Of)
		$sale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$sale->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale","Sale_Return","Cash_Refund"));
		$sale->where("issued_date >=", $this->startFiscalDate);
		$sale->where("issued_date <", $asOftoday);
		$sale->where("is_recurring <>", 1);
		$sale->where("deleted <>", 1);
		$sale->get_iterated();
		
		//Sum Sale					
		$totalSale = 0;
		foreach ($sale as $value) {
			if($value->type=="Sale_Return" || $value->type=="Cash_Refund"){
				$totalSale -= floatval($value->amount) / floatval($value->rate);
			}else{
				$totalSale += floatval($value->amount) / floatval($value->rate);
			}
		}
		//END SALE

		//COGS (Begin FiscalDate To As Of)
		$cogs = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$cogs->include_related("transaction", array("rate"));
		$cogs->where_related("account", "account_type_id", 36);
		$cogs->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$cogs->where_related("transaction", "issued_date <", $asOftoday);
		$cogs->where_related("transaction", "is_recurring <>", 1);
		$cogs->where_related("transaction", "deleted <>", 1);
		$cogs->where("deleted <>", 1);		
		$cogs->get_iterated();
		
		//Sum Dr and Cr
		$cogsDr = 0;
		$cogsCr = 0;
		foreach ($cogs as $value) {			
			if($value->dr>0){
				$cogsDr += floatval($value->dr) / floatval($value->transaction_rate);
			}
			if($value->cr>0){
				$cogsCr += floatval($value->cr) / floatval($value->transaction_rate);
			}	
		}
		
		$totalCOGS = $cogsDr - $cogsCr;
		//END COGS

		//Days
		$date1 = new DateTime($this->startFiscalDate);
		$date2 = new DateTime();
		$days = $date2->diff($date1)->format("%a");

		$inventoryTurnOver = 0;
		if($totalCOGS>0){
			$inventoryTurnOver = ($totalInventory / $totalCOGS) * $days;
		}

		$gpm = 0;
		if($totalSale>0){
			$gpm =	($totalSale - $totalCOGS) / $totalSale;
		}

		//Results
		$data["results"][] = array(
			"id" 					=> 0,
			"inventory_value" 		=> $totalInventory,
			"inventory_turnover_day"=> $inventoryTurnOver,
		   	"gross_profit_margin"	=> $gpm
		);

		$data["count"] = count($data["results"]);		

		//Response Data		
		$this->response($data, 200);	
	}
	//GET MONTHLY ITEM PURCHASE AND SALE
	function monthly_item_purchase_sale_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->where_in("type", array("Cash_Purchase","Credit_Purchase","Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
		$obj->where("issued_date >=", $this->startFiscalDate);
		$obj->where("issued_date <", $this->endFiscalDate);
		$obj->where("is_recurring <>", 1);		
		$obj->where("deleted <>", 1);						
		$obj->order_by("issued_date", "asc");								
		$obj->get_iterated();
		
		$txnList = [];
		foreach ($obj as $value) {
			$month = date('M', strtotime($value->issued_date));
			$amount = floatval($value->amount) / floatval($value->rate);

			if(isset($txnList[$month])){
				if($value->type==="Cash_Purchase" || $value->type==="Credit_Purchase"){
					$txnList[$month]["purchase"] += $amount;
				}else{
					$txnList[$month]["sale"] += $amount;
				}
			} else {
				if($value->type==="Cash_Purchase" || $value->type==="Credit_Purchase"){
					$txnList[$month] = array("month"=>$month, "purchase"=>$amount, "sale"=>0);
				}else{
					$txnList[$month] = array("month"=>$month, "purchase"=>0, "sale"=>$amount);
				}			
			}			
		}		
		
		foreach ($txnList as $value) {
			$data["results"][] = $value;
		}

		$data["count"] = count($data["results"]);					

		//Response Data		
		$this->response($data, 200);	
	}
	//GET TOP PURCHASE PRODUCT
	function top_purchase_product_get() {		
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
	    	foreach ($filter["filters"] as $value) {
	    		if(isset($value["operator"])) {
					$obj->{$value["operator"]}($value["field"], $value["value"]);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}
		
		$obj->include_related("item", array("name"));
		$obj->where_in_related("transaction", "type", array("Cash_Purchase", "Credit_Purchase"));
		$obj->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$obj->where_related("transaction", "issued_date <", $this->endFiscalDate);
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where_related("item", "item_type_id", 1);
		$obj->where("item_id >", 0);
		$obj->get_iterated();

		//Group by item_id
		$product = [];
		foreach($obj as $value) {
			$quantity = floatval($value->quantity) * floatval($value->unit_value);

			if(isset($product[$value->item_id])){
				$product[$value->item_id]['quantity'] 	+= $quantity;
			} else {
				$product[$value->item_id]['quantity'] 	= $quantity;
				$product[$value->item_id]['name'] 		= $value->item_name;
			}
		}

		//Sort
		$top = [];
		foreach($product as $key => $value) {
			$top["$key"] = $value['quantity'];
		}
		array_multisort($top, SORT_DESC, $product);

		//Count Length
		$productLength = 5;
		if(count($product)<5){
			$productLength = count($product);
		}

		//Select Top 5
		for($i = 0; $i<$productLength; $i++) {
			$data['results'][] = $product[$i];
		}	

		$data["count"] = count($data["results"]);		

		//Response Data		
		$this->response($data, 200);	
	}
	//GET TOP SALE PRODUCT
	function top_sale_product_get() {		
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
	    	foreach ($filter["filters"] as $value) {
	    		if(isset($value["operator"])) {
					$obj->{$value["operator"]}($value["field"], $value["value"]);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->include_related("item", array("name"));		
		$obj->where_in_related("transaction", "type", array("Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
		$obj->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$obj->where_related("transaction", "issued_date <", $this->endFiscalDate);		
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where_related("item", "item_type_id", 1);
		$obj->where("item_id >", 0);
		$obj->get_iterated();

		//Group by item_id
		$product = [];
		foreach($obj as $value) {			
			$quantity = floatval($value->quantity) * floatval($value->unit_value);

			if(isset($product[$value->item_id])){
				$product[$value->item_id]['quantity'] 	+= $quantity;
			} else {
				$product[$value->item_id]['quantity'] 	= $quantity;
				$product[$value->item_id]['name'] 		= $value->item_name;
			}
		}		

		//Sort
		$top = [];
		foreach($product as $key => $value) {
			$top["$key"] = $value['quantity'];
		}
		array_multisort($top, SORT_DESC, $product);

		//Count Length
		$productLength = 5;
		if(count($product)<5){
			$productLength = count($product);
		}

		//Select Top 5
		for($i = 0; $i<$productLength; $i++) {
			$data['results'][] = $product[$i];
		}	

		$data["count"] = count($data["results"]);		

		//Response Data		
		$this->response($data, 200);	
	}
}
/* End of file inventory_modules.php */
/* Location: ./application/controllers/api/inventory_modules.php */