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

		//INVENTORY VALUE
		$inventory = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$inventory->include_related("transaction", array("rate"));
		$inventory->where_related("account", "account_type_id", 13);
		$inventory->where_related("transaction", "issued_date <", $asOftoday);
		$inventory->where_related("transaction", "status <>", 4);
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

	//GET CENTER
	function center_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 1;

		$obj = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		//Filter		
		if(!empty($filter["filters"]) && isset($filter["filters"])){
	    	foreach ($filter["filters"] as $value) {
	    		if(isset($value["operator"])) {
	    			$obj->{$value["operator"]}($value["field"], $value["value"]);
				} else {
					$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->select("id, number, name, locale");
		$obj->include_related("item_type", "name");
		$obj->include_related("measurement", "name");
		$obj->get();

		//Quantity, Avg. Cost, and Amount
		$itemLines = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$itemLines->where_related("transaction", "is_recurring <>", 1);
		$itemLines->where_related("transaction", "deleted <>", 1);
		$itemLines->where('item_id', $obj->id);
		$itemLines->select_sum('quantity * conversion_ratio * movement', "totalQuantity");
		$itemLines->select_sum('quantity * conversion_ratio * movement * cost', "totalAmount");
		$itemLines->get();

		$cost = 0;
		if(floatval($itemLines->totalQuantity)==0){}else{
			$cost = floatval($itemLines->totalAmount) / floatval($itemLines->totalQuantity);
		}

		//Price
		$itemPrice = new Item_price(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$itemPrice->where("item_id", $obj->id);
		$itemPrice->where("conversion_ratio", 1);
		$itemPrice->limit(1);
		$itemPrice->get();

		//Currency Code
		$currency = new Currency();
		$currency->where("locale", $obj->locale);
		$currency->get();

		//Txn
		$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$txn->where_related("item_line", "item_id", $obj->id);
		$txn->where("is_recurring <>", 1);
		$txn->where("deleted <>", 1);
		$txnCount = $txn->count();

		//On PO
		$po = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
		$po->select_sum("quantity * conversion_ratio", "totalQuantity");
		$po->where("item_id", $obj->id);
		$po->where_related("transaction", "type", "Purchase_Order");
		$po->where_related("transaction", "is_recurring <>", 1);
		$po->where_related("transaction", "deleted <>", 1);
		$po->get();

		//On SO
		$so = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$so->select_sum("quantity * conversion_ratio", "totalQuantity");
		$so->where("item_id", $obj->id);
		$so->where_related("transaction", "type", "Sale_Order");
		$so->where_related("transaction", "is_recurring <>", 1);
		$so->where_related("transaction", "deleted <>", 1);		
		$so->get();

		//Results
		$data["results"][] = array(
			"id" 			=> $obj->id,
			"number" 		=> $obj->number,
			"name" 			=> $obj->name,
			"item_type"		=> $obj->item_type_name,
			"measurement" 	=> $obj->measurement_name,
			"currency_code" => $currency->code,
			"locale" 		=> $obj->locale,
			"quantity" 		=> floatval($itemLines->totalQuantity),
			"cost" 			=> $cost,
			"price" 		=> floatval($itemPrice->price),
			"amount" 		=> floatval($itemLines->totalAmount),
			"txn" 			=> $txnCount,
			"po" 			=> floatval($po->totalQuantity),
			"so" 			=> floatval($so->totalQuantity)
		);

		//Response Data		
		$this->response($data, 200);	
	}

	//POSITION SUMMARY BY DAWINE
	function position_summary_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		
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
		if(!empty($filter["filters"]) && isset($filter["filters"])){
	    	foreach ($filter['filters'] as $value) {
	    		if(isset($value['operator'])) {
	    			if($value['operator']=="as_of"){

	    			}else{
						$obj->{$value['operator']}($value['field'], $value['value']);
	    			}
				} else {
					$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->select("id, abbr, number, name");
		$obj->include_related("category", "name");
		$obj->include_related("measurement", "name");
		$obj->where("item_type_id", 1);
		$obj->where("nature <>", "main_variant");
		$obj->where("is_pattern <>", 1);
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
				//Find Item Quantity and Amount
				$itemLines = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$itemLines->select_sum('quantity * conversion_ratio * movement', "totalQuantity");
				$itemLines->select_sum('quantity * conversion_ratio * movement * cost', "totalAmount");
				$itemLines->where_related("transaction", "is_recurring <>", 1);
				$itemLines->where_related("transaction", "deleted <>", 1);
				$itemLines->where('item_id', $value->id);
				$itemLines->where('movement <>', 0);
				$itemLines->get();

				$cost = 0;
				if(floatval($itemLines->totalQuantity)==0){}else{
					$cost = floatval($itemLines->totalAmount) / floatval($itemLines->totalQuantity);
				}

				//On PO
				// $po = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
				// $po->select_sum("quantity * conversion_ratio", "totalQuantity");
				// $po->where("item_id", $value->id);
				// $po->where_related("transaction", "type", "Purchase_Order");
				// $po->where_related("transaction", "is_recurring <>", 1);
				// $po->where_related("transaction", "deleted <>", 1);
				// $po->get();

				// //On SO
				// $so = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				// $so->select_sum("quantity * conversion_ratio", "totalQuantity");
				// $so->where("item_id", $value->id);
				// $so->where_related("transaction", "type", "Sale_Order");
				// $so->where_related("transaction", "is_recurring <>", 1);
				// $so->where_related("transaction", "deleted <>", 1);		
				// $so->get();

				$data["results"][] = array(
					"id" 			=> $value->id,
					"name" 			=> $value->abbr . $value->number ." ". $value->name,
					"measurement"	=> $value->measurement_name,
					"quantity" 		=> floatval($itemLines->totalQuantity),
					"on_po" 		=> 0,//floatval($po->totalQuantity),
					"on_so" 		=> 0,//floatval($so->totalQuantity),
					"cost" 			=> $cost,
					"amount" 		=> floatval($itemLines->totalAmount)
				);
			}
		}
		
		$this->response($data, 200);
	}

	//POSITION DETAIL BY DAWINE
	function position_detail_get() {
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

		$obj->include_related("item", array("abbr", "number", "name","measurement_id"));
		$obj->include_related("measurement", array("name"));
		$obj->include_related("transaction", array("number", "type", "issued_date", "rate"));
		$obj->where_related("transaction", "status <>", 4);
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where_related("item", "item_type_id", 1);
		$obj->where("movement <>", 0);
		$obj->where("deleted <>", 1);		
		$obj->order_by_related("transaction", "issued_date", "asc");

		//Results
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				$cost = floatval($value->cost) / floatval($value->transaction_rate);
				$price = floatval($value->price) / $value->transaction_rate;
				$quantity = floatval($value->quantity) * floatval($value->conversion_ratio) * intval($value->movement);
				$amount = $quantity * $cost;				

				if(isset($objList[$value->item_id])){
					$objList[$value->item_id]["line"][] = array(
						"id" 				=> $value->transaction_id,
						"type" 				=> $value->transaction_type,
						"number" 			=> $value->transaction_number,
						"issued_date" 		=> $value->transaction_issued_date,
						"quantity" 			=> floatval($value->quantity),
						"cost" 				=> floatval($value->cost) / floatval($value->transaction_rate),
						"cost_avg" 			=> floatval($value->cost_avg) / floatval($value->transaction_rate),
						"price" 			=> floatval($value->price) / floatval($value->transaction_rate),
						"on_hand" 			=> floatval($value->inventory_quantity),
						"amount"			=> floatval($value->inventory_value) / floatval($value->transaction_rate),
						"movement" 			=> $value->movement
					);
				}else{
					//Balance Forward
					$bf = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
					$bf->include_related("transaction", array("rate"));
					$bf->where_related("transaction", "issued_date <", $value->transaction_issued_date);
					$bf->where_related("transaction", "status <>", 4);
					$bf->where_related("transaction", "is_recurring <>", 1);
					$bf->where_related("transaction", "deleted <>", 1);
					$bf->where("item_id", $value->item_id);
					$bf->where("movement <>", 0);
					$bf->where("deleted <>", 1);
					$bf->limit(1);
					$bf->order_by_related("transaction", "issued_date", "desc");
					$bf->get();

					$balance_forward = 0; $quantity_forward = 0;
					if($bf->exists()){
						$quantity_forward = floatval($bf->inventory_quantity);
						$balance_forward = floatval($bf->inventory_value) / floatval($bf->transaction_rate);
					}
					//End Balance Forward

					$objList[$value->item_id]["id"] 				= $value->item_id;
					$objList[$value->item_id]["name"] 				= $value->item_abbr . $value->item_number ." ".$value->item_name;
					$objList[$value->item_id]["measurement"] 		= $value->measurement_name;
					$objList[$value->item_id]["quantity_forward"] 	= $quantity_forward;
					$objList[$value->item_id]["balance_forward"] 	= $balance_forward;
					$objList[$value->item_id]["line"][] 			= array(
						"id" 				=> $value->transaction_id,
						"type" 				=> $value->transaction_type,
						"number" 			=> $value->transaction_number,
						"issued_date" 		=> $value->transaction_issued_date,
						"quantity" 			=> floatval($value->quantity),
						"cost" 				=> floatval($value->cost) / floatval($value->transaction_rate),
						"cost_avg" 			=> floatval($value->cost_avg) / floatval($value->transaction_rate),
						"price" 			=> floatval($value->price) / floatval($value->transaction_rate),
						"on_hand" 			=> floatval($value->inventory_quantity),
						"amount"			=> floatval($value->inventory_value) / floatval($value->transaction_rate),
						"movement" 			=> $value->movement
					);			
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}
		
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
		$obj->where("deleted <>", 1);
		$obj->get_iterated();

		//Group by item_id
		$product = [];
		foreach($obj as $value) {
			$quantity = floatval($value->quantity) * floatval($value->conversion_ratio);

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
		$obj->where("deleted <>", 1);
		$obj->get_iterated();

		//Group by item_id
		$product = [];
		foreach($obj as $value) {			
			$quantity = floatval($value->quantity) * floatval($value->conversion_ratio);

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