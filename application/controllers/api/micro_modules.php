<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Micro_modules extends REST_Controller {
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
	
	//SALES
	//SALES REPORTS SNAPSHOT
	function sales_reports_snapshot_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$today = date("Y-m-d");

		//Sales
		$sales = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$sales->select_sum("amount / rate", "total");
		$sales->where_in("type", array("Cash_Receipt","Cash_Refund","Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
		$sales->where("is_recurring <>", 1);
		$sales->where("deleted <>", 1);
		$sales->get();

		//Customer count
		$customerCounts = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$customerCounts->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));		
		$customerCounts->where("is_recurring <>", 1);
		$customerCounts->where("deleted <>", 1);
		$customerCounts->group_by("contact_id");
		$customerCount = $customerCounts->count();

		//Sale product count
		$productCounts = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$productCounts->where_in_related("transaction", "type", array("Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
		$productCounts->where_related("transaction", "is_recurring <>", 1);
		$productCounts->where_related("transaction", "deleted <>", 1);
		$productCounts->where("item_id >", 0);
		$productCounts->where_related("item", "item_type_id", 1);
		$productCounts->group_by("item_id");
		$productCount = $productCounts->count();

		//Receiveables
		$receivables = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$receivables->select_sum("amount / rate", "total");
		$receivables->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice"));		
		$receivables->where_in("status", array(0,2));
		$receivables->where("is_recurring <>", 1);
		$receivables->where("deleted <>", 1);
		$receivables->get();

		//Receiveable count
		$receivableCounts = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$receivableCounts->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice"));
		$receivableCounts->where_in("status", array(0,2));
		$receivableCounts->where("is_recurring <>", 1);
		$receivableCounts->where("deleted <>", 1);
		$receivableCount = $receivableCounts->count();
		
		//Receiveable overdue count
		$receivableOverdueCounts = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$receivableOverdueCounts->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice"));
		$receivableOverdueCounts->where("due_date <", $today);
		$receivableOverdueCounts->where_in("status", array(0,2));
		$receivableOverdueCounts->where("is_recurring <>", 1);
		$receivableOverdueCounts->where("deleted <>", 1);
		$receivableOverdueCount = $receivableOverdueCounts->count();

		//Draft count
		$draftCounts = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$draftCounts->where_in("type", array("Sale_Order","Customer_Deposit","Cash_Receipt","Cash_Refund","Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
		$draftCounts->where("status", 4);
		$draftCounts->where("progress", "Draft");
		$draftCounts->where("is_recurring <>", 1);
		$draftCounts->where("deleted <>", 1);
		$draftCount = $draftCounts->count();
				
		$data["results"][] = array(
			"id" 				=> 0,
			"sale" 				=> floatval($sales->total),
			"customer_count"	=> $customerCount,
			"product_count" 	=> $productCount,

			"receivable" 		=> floatval($receivables->total),
			"receivable_count"	=> $receivableCount,
			"receivable_overdue_count" 	=> $receivableOverdueCount,

			"draft_count" 		=> $draftCount,
		);

		//Response Data
		$this->response($data, 200);
	}

	//CUSTOMER TRANSACTION LIST
	function customer_transaction_list_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$noType = true;
		$typeList = [];

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		//Sort
		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				if(isset($value["operator"])){
					$obj->{$value["operator"]}($value["field"], $value["dir"]);
				}else{
					$obj->order_by($value["field"], $value["dir"]);
				}
			}
		}
		
		//Filter
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter["filters"] as $value) {
	    		if(isset($value["field"])){
		    		if($value["field"]=="type"){
		    			$noType = false;
		    		}
		    	}

		    	if(isset($value["filters"])){
		    		foreach ($value["filters"] as $val) {
		    			array_push($typeList, $val['value']);
		    		}
		    	}

	    		if(isset($value["operator"])){
	    			if($value["operator"]=="eq"){
		    			array_push($typeList, $value['value']);
		    		} else {
		    			$obj->{$value["operator"]}($value['field'], $value['value']);
		    		}
	    		} else {
	    			if(isset($value["field"])){
		    			$obj->where($value['field'], $value['value']);
		    		}
	    		}
			}
		}

		if($noType){
			$obj->where_in("type",array("Sale_Order","Customer_Deposit","Cash_Receipt","Cash_Refund","Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
		}

		if(count($typeList)>0){
			$obj->where_in("type", $typeList);
		}

		//Results
		$obj->include_related("contact", array("abbr", "number", "name"));		
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "desc");

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
				$amount = (floatval($value->amount) - floatval($value->deposit)) / floatval($value->rate);
				
				$data["results"][] = array(
					"id" 			=> $value->id,
					"name" 			=> $value->contact_abbr.$value->contact_number." ".$value->contact_name,
					"type" 			=> $value->type,
					"number" 		=> $value->number,
					"issued_date" 	=> $value->issued_date,
					"due_date" 		=> $value->due_date,
					"rate" 			=> $value->rate,
					"amount" 		=> $amount,
					"status" 		=> $value->status,
					"progress" 		=> $value->progress
				);
			}
		}

		//Response Data
		$this->response($data, 200);
	}

	//PURCHASE
	//PURCHASES REPORTS SNAPSHOT
	function purchases_reports_snapshot_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$today = date("Y-m-d");

		//Purchases
		$purchases = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$purchases->select_sum("amount / rate", "total");
		$purchases->where_in("type", array("Cash_Purchase","Credit_Purchase"));
		$purchases->where("is_recurring <>", 1);
		$purchases->where("deleted <>", 1);
		$purchases->get();

		//Vendor count
		$vendorCounts = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$vendorCounts->where_in("type", array("Cash_Purchase","Credit_Purchase"));
		$vendorCounts->where("is_recurring <>", 1);
		$vendorCounts->where("deleted <>", 1);
		$vendorCounts->group_by("contact_id");
		$vendorCount = $vendorCounts->count();

		//Purchase product count
		$productCounts = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$productCounts->where_in_related("transaction", "type", array("Cash_Purchase","Credit_Purchase"));
		$productCounts->where_related("transaction", "is_recurring <>", 1);
		$productCounts->where_related("transaction", "deleted <>", 1);
		$productCounts->where("item_id >", 0);
		$productCounts->where_related("item", "item_type_id", 1);
		$productCounts->group_by("item_id");
		$productCount = $productCounts->count();

		//Payable
		$payables = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$payables->select_sum("amount / rate", "total");
		$payables->where_in("type", array("Cash_Purchase","Credit_Purchase"));		
		$payables->where_in("status", array(0,2));
		$payables->where("is_recurring <>", 1);
		$payables->where("deleted <>", 1);
		$payables->get();

		//Receiveable count
		$payableCounts = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$payableCounts->where("type", "Credit_Purchase");
		$payableCounts->where_in("status", array(0,2));
		$payableCounts->where("is_recurring <>", 1);
		$payableCounts->where("deleted <>", 1);
		$payableCount = $payableCounts->count();
		
		//Receiveable overdue count
		$payableOverdueCounts = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$payableOverdueCounts->where("type", "Credit_Purchase");
		$payableOverdueCounts->where("due_date <", $today);
		$payableOverdueCounts->where_in("status", array(0,2));
		$payableOverdueCounts->where("is_recurring <>", 1);
		$payableOverdueCounts->where("deleted <>", 1);
		$payableOverdueCount = $payableOverdueCounts->count();

		//Draft count
		$draftCounts = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$draftCounts->where_in("type", array("Purchase_Order","Vendor_Deposit","Cash_Payment","Payment_Refund","Cash_Purchase","Credit_Purchase"));
		$draftCounts->where("status", 4);
		$draftCounts->where("progress", "Draft");
		$draftCounts->where("is_recurring <>", 1);
		$draftCounts->where("deleted <>", 1);
		$draftCount = $draftCounts->count();
				
		$data["results"][] = array(
			"id" 				=> 0,
			"purchase" 			=> floatval($purchases->total),
			"vendor_count"		=> $vendorCount,
			"product_count" 	=> $productCount,

			"payable" 			=> floatval($payables->total),
			"payable_count"		=> $payableCount,
			"payable_overdue_count" => $payableOverdueCount,

			"draft_count" 		=> $draftCount,
		);

		//Response Data
		$this->response($data, 200);
	}

	//VENDOR TRANSACTION LIST
	function vendor_transaction_list_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$noType = true;
		$typeList = [];

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		//Sort
		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				if(isset($value["operator"])){
					$obj->{$value["operator"]}($value["field"], $value["dir"]);
				}else{
					$obj->order_by($value["field"], $value["dir"]);
				}
			}
		}
		
		//Filter
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter["filters"] as $value) {
	    		if(isset($value["field"])){
		    		if($value["field"]=="type"){
		    			$noType = false;
		    		}
		    	}

		    	if(isset($value["filters"])){
		    		foreach ($value["filters"] as $val) {
		    			array_push($typeList, $val['value']);
		    		}
		    	}

	    		if(isset($value["operator"])){
	    			if($value["operator"]=="eq"){
		    			array_push($typeList, $value['value']);
		    		} else {
		    			$obj->{$value["operator"]}($value['field'], $value['value']);
		    		}
	    		} else {
	    			if(isset($value["field"])){
		    			$obj->where($value['field'], $value['value']);
		    		}
	    		}
			}
		}

		if($noType){
			$obj->where_in("type",array("Purchase_Order","Vendor_Deposit","Cash_Payment","Payment_Refund","Cash_Purchase","Credit_Purchase"));
		}

		if(count($typeList)>0){
			$obj->where_in("type", $typeList);
		}

		//Results
		$obj->include_related("contact", array("abbr", "number", "name"));		
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "desc");

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
				$amount = (floatval($value->amount) - floatval($value->deposit)) / floatval($value->rate);
				
				$data["results"][] = array(
					"id" 			=> $value->id,
					"name" 			=> $value->contact_abbr.$value->contact_number." ".$value->contact_name,
					"type" 			=> $value->type,
					"number" 		=> $value->number,
					"issued_date" 	=> $value->issued_date,
					"due_date" 		=> $value->due_date,
					"rate" 			=> $value->rate,
					"amount" 		=> $amount,
					"status" 		=> $value->status,
					"progress" 		=> $value->progress
				);
			}
		}

		//Response Data
		$this->response($data, 200);
	}

	

}//End Of Class