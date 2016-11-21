<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Dashboards extends REST_Controller {	
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

	//GET HOME
	function home_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;
		$today = date("Y-m-d");
				
		$ar = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$ap = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				
		//A/R			
		$ar->where("type", "Invoice");
		$ar->where_in("status", array(0,2));
		$ar->where("is_recurring", 0);		
		$ar->where("deleted", 0);		
		$ar->get_iterated();
		
		$arAmount = 0;
		$arOpen = 0;
		$customer = [];
		$customerCount = 0;
		$arOverDue = 0;		
		foreach($ar as $value) {
			//Sum amount
			if($value->status==2){
				$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$paid->where("type", "Cash_Receipt");
				$paid->where("reference_id", $value->id);
				$paid->where("is_recurring", 0);		
				$paid->where("deleted", 0);
				$paid->get_iterated();

				$paidAmount = 0;
				foreach ($paid as $p) {
					$paidAmount += ($p->amount + $p->discount);
				}
				
				$arAmount += ($value->amount - $paidAmount) / $value->rate;								
			}else{
				$arAmount += floatval($value->amount) / floatval($value->rate);
			}

			$arAmount -= floatval($value->deposit);

			//Open
			if($value->status==0){
				$arOpen++;
			}

			//Overdue
			if($value->due_date<$today){
				$arOverDue++;
			}

			//Group customer
			if(isset($customer[$value->contact_id])){
				$customer[$value->contact_id] = 0;
			} else {
				$customer[$value->contact_id] = 0;

				$customerCount++;
			}										
		}

		//A/P			
		$ap->where("type", "Credit_Purchase");
		$ap->where_in("status", array(0,2));	
		$ap->where("is_recurring", 0);		
		$ap->where("deleted", 0);		
		$ap->get_iterated();
		
		$apAmount = 0;
		$apOpen = 0;
		$vendor = [];
		$vendorCount = 0;
		$apOverDue = 0;		
		foreach($ap as $value) {
			//Sum amount
			if($value->status==2){
				$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$paid->where("type", "Cash_Payment");
				$paid->where("reference_id", $value->id);
				$paid->where("is_recurring", 0);		
				$paid->where("deleted", 0);
				$paid->get();

				$paidAmount = 0;
				foreach ($paid as $p) {
					$paidAmount += ($p->amount + $p->discount);
				}
				
				$apAmount += ($value->amount - $paidAmount) / $value->rate;
			}else{
				$apAmount += floatval($value->amount) / floatval($value->rate);
			}

			$apAmount -= floatval($value->deposit);

			//Open
			if($value->status==0){
				$apOpen++;
			}

			//Overdue
			if($value->due_date<$today){
				$apOverDue++;
			}

			//Group vendor
			if(isset($vendor[$value->contact_id])){
				$vendor[$value->contact_id] = 0;
			} else {
				$vendor[$value->contact_id] = 0;

				$vendorCount++;
			}										
		}

		//Results
		$data["results"][] = array(
			'id' 				=> 0,				
			'ar' 				=> $arAmount,
			'ar_open' 			=> $arOpen,
			'ar_customer' 		=> $customerCount,
			'ar_overdue' 		=> $arOverDue,
			'ap' 				=> $apAmount,
			'ap_open' 			=> $apOpen,
			'ap_vendor' 		=> $vendorCount,
			'ap_overdue' 		=> $apOverDue
		);		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET HOME GRAPH
	function home_graph_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;

		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		
		$obj->include_related("transaction", "issued_date");
		$obj->where_in_related("account/account_type", "id", array(10,11));
		$obj->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$obj->where_related("transaction", "issued_date <", $this->endFiscalDate);
		$obj->order_by("issued_date");		
		$obj->where("is_recurring", $is_recurring);		
		$obj->where("deleted", $deleted);										
		$obj->get_iterated();

		$transactionList = [];
		foreach ($obj as $value) {
			$month = date('M', strtotime($value->transaction_issued_date));
			$dr = floatval($value->dr) / floatval($value->rate);
			$cr = floatval($value->cr) / floatval($value->rate);

			if(isset($transactionList[$month])){
				if($value->dr>0){
					$transactionList[$month]["cash_in"] += $dr;
				}else{
					$transactionList[$month]["cash_out"] += $cr;
				}
			} else {
				if($value->dr>0){
					$transactionList[$month] = array("cash_in"=>$dr, "cash_out"=>0);
				}else{
					$transactionList[$month] = array("cash_in"=>0, "cash_out"=>$cr);
				}			
			}			
		}		
		
		foreach ($transactionList as $key => $value) {
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



	//CUSTOMER
	//GET CUSTOMER DASHBOARD SUMMARY
	function customer_dashboard_summary_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;
				
		//Sale
		$sale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$sale->where_in("type", array("Invoice", "Cash_Sale", "Sale_Return"));
		$sale->where("issued_date >=", $this->startFiscalDate);
		$sale->where("issued_date <", $this->endFiscalDate);
		$sale->where("is_recurring", 0);		
		$sale->where("deleted", 0);		
		$sale->get_iterated();

		//Sale Count Customer
		$saleAmount = 0;
		$saleCustomer = [];
		$saleCustomerCount = 0;
		foreach($sale as $value) {
			//Total sale
			if($value->type=="Invoice" || $value->type=="Cash_Sale"){
				$saleAmount += floatval($value->amount) / floatval($value->rate);
			}else{
				//Sale Return
				$saleAmount -= floatval($value->amount) / floatval($value->rate);
			}

			//Group customer
			if(isset($saleCustomer[$value->contact_id])){
				$saleCustomer[$value->contact_id] = 0;
			} else {
				$saleCustomer[$value->contact_id] = 0;

				$saleCustomerCount++;
			}							
		}

		//Sale Count Product
		$saleProduct = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$saleProduct->where_in_related("transaction", "type", array("Invoice","Cash_Sale"));
		$saleProduct->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$saleProduct->where_related("transaction", "issued_date <", $this->endFiscalDate);	
		$saleProduct->where_related("item", "item_type_id", 1);
		$saleProduct->where("item_id >", 0);		
		$saleProduct->get();
		$saleProductList = [];
		$saleProductCount = 0;
		foreach ($saleProduct as $value) {
			if(isset($saleProductList[$value->item_id])){
				
			}else{
				$saleProductCount++;
				$saleProductList[$value->item_id][] = 1;
			}
		}

		//Sale Count Order
		$saleOrder = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$saleOrder->where_in("type", array("Invoice", "Cash_Sale"));
		$saleOrder->where("status", 1);		
		$saleOrder->where("type", "Sale_Order");		

		//Order
		$order = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);					
		$order->where("type", "Sale_Order");
		$order->where("issued_date >=", $this->startFiscalDate);
		$order->where("issued_date <", $this->endFiscalDate);
		$order->where("is_recurring", 0);		
		$order->where("deleted", 0);		
		$order->get_iterated();

		$orderCount = 0;		
		$orderAmount = 0;
		$orderOpen = 0;
		$orderAvg = 0;
		foreach($order as $value) {
			$orderCount++;

			if($value->status==0){
				$orderOpen++;
			}

			$orderAmount += floatval($value->amount) / floatval($value->rate);
		}

		if($orderCount>0){
			$orderAvg = $orderAmount / $orderCount;
		}

		// AR
		$ar = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$ar->where("type", "Invoice");
		$ar->where_in("status", array(0,2));
		$ar->where("is_recurring", 0);		
		$ar->where("deleted", 0);		
		$ar->get_iterated();

		$arAmount = 0;
		$arCustomer = [];
		$arCustomerCount = 0;
		$arCount = 0;
		$arOpen = 0;
		$arOverDue = 0;
		$today = date("Y-m-d");
		foreach($ar as $value) {
			$arCount++;

			//Open
			if($value->status==0){
				$arOpen++;
			}

			//Overdue
			if($value->due_date<$today){
				$arOverDue++;
			}

			//Sum amount
			if($value->status==2){
				$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$paid->where("type", "Cash_Receipt");
				$paid->where("reference_id", $value->id);
				$paid->where("is_recurring", 0);		
				$paid->where("deleted", 0);
				$paid->get();
				
				$paidAmount = 0;
				foreach ($paid as $p) {
					$paidAmount += ($p->amount + $p->discount);
				}
				
				$arAmount += ($value->amount - $paidAmount) / $value->rate;
			}else{
				$arAmount += floatval($value->amount) / floatval($value->rate);
			}

			$arAmount -= floatval($value->deposit);

			//Group customer
			if(isset($arCustomer[$value->contact_id])){
				$arCustomer[$value->contact_id] = 0;
			} else {
				$arCustomer[$value->contact_id] = 0;

				$arCustomerCount++;
			}			
		}

		//Credit Sale
		$creditSale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$creditSale->where_in("type", "Invoice");
		$creditSale->where("issued_date >=", $this->startFiscalDate);
		$creditSale->where("issued_date <", $this->endFiscalDate);
		$creditSale->where("is_recurring", 0);		
		$creditSale->where("deleted", 0);		
		$creditSale->get_iterated();
		
		$creditSaleAmount = 0;		
		foreach($creditSale as $value) {			
			$creditSaleAmount += floatval($value->amount) / floatval($value->rate);									
		}		
		
	    $startDate = new DateTime($this->startFiscalDate);
		$endDate = new DateTime();
		$totalDay = $endDate->diff($startDate)->format("%a");
		
		$collectionDay = 0;
		if($creditSaleAmount>0){
			$collectionDay = ($arAmount / $creditSaleAmount) * $totalDay;
		}
		//Results
		$data["results"][] = array(
			'id' 				=> 0,
			'sale' 				=> $saleAmount,						
			'sale_customer' 	=> $saleCustomerCount,
			'sale_product' 		=> $saleProductCount,
			'sale_order' 		=> $saleOrder->count(),
			'order' 			=> $order->result_count(),
			'order_avg' 		=> $orderAvg,
			'order_open'		=> $orderOpen,			
			'ar' 				=> $arAmount,
			'ar_open' 			=> $arOpen,
			'ar_customer' 		=> $arCustomerCount,
			'ar_overdue' 		=> $arOverDue,
			'collection_day' 	=> $collectionDay
		);

		$data["count"] = count($data["results"]);		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET OUTSTANDING
	function outstanding_get(){
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$deposit = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		//Filter		
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {	    		
    			if($value["field"]=="is_recurring"){
    				$is_recurring = $value["value"];
    			}else if($value["field"]=="deleted"){
    				$deleted = $value["value"];
    			}else{
    				$obj->where($value["field"], $value["value"]);
    				$deposit->where($value["field"], $value["value"]);
    			}
    		}	    										 			
		}

		$obj->where("type", "Invoice");
		$obj->where_in("status", array(0,2));
		$obj->where("is_recurring", $is_recurring);		
		$obj->where("deleted", $deleted);		
		$obj->get_iterated();

		$balance = 0;		
		$open = 0;
		$overdue = 0;
		$today = new DateTime();
		foreach ($obj as $value) {
			$dueDate = new DateTime($value->due_date);
			
			if($dueDate < $today){
				$overdue++;
			}

			if($value->status==0){
				$open++;
			}

			if($value->status==2){
				$balance += floatval($value->amount) - floatval($value->amount_paid);
			}else{
				$balance += floatval($value->amount);
			}			
		}

		//Deposit
		$deposit->select_sum("amount");		
		$deposit->where("type", "Deposit");		
		$deposit->where("is_recurring", $is_recurring);		
		$deposit->where("deleted", $deleted);		
		$deposit->get();		

		//Results
		$data["results"][] = array(
			'id' 		=> 0,
			'balance' 	=> floatval($balance),						
			'deposit' 	=> floatval($deposit->amount),
			'open' 		=> intval($open),
			'overdue'	=> intval($overdue)
		);

		$this->response($data, 200);		
	}

	//GET MONTHLY SALE
	function monthly_sale_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		
		//Filter		
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {	    				
	    		if($value["field"]=="is_recurring"){
    				$is_recurring = $value["value"];
    			}else if($value["field"]=="deleted"){
    				$deleted = $value["value"];
    			}else{
    				$obj->where($value["field"], $value["value"]);    				
    			}    			    		  			    		
			}									 			
		}
		
		$obj->where_in("type", array("Invoice","Cash_Sale","Sale_Order"));
		$obj->where("issued_date >=", $this->startFiscalDate);
		$obj->where("issued_date <", $this->endFiscalDate);
		$obj->where("is_recurring", $is_recurring);		
		$obj->where("deleted", $deleted);						
		$obj->order_by("issued_date");								
		$obj->get_iterated();

		$transactionList = [];
		foreach ($obj as $value) {
			$month = date('M', strtotime($value->issued_date));
			$amount = floatval($value->amount) / floatval($value->rate);

			if(isset($transactionList[$month])){
				if($value->type==="Invoice" || $value->type==="Cash_Sale"){
					$transactionList[$month]["sale"] += $amount;
				}else{
					$transactionList[$month]["order"] += $amount;
				}
			} else {
				if($value->type==="Invoice" || $value->type==="Cash_Sale"){
					$transactionList[$month] = array("sale"=>$amount, "order"=>0);
				}else{
					$transactionList[$month] = array("sale"=>0, "order"=>$amount);
				}			
			}			
		}		
		
		foreach ($transactionList as $key => $value) {
			$data["results"][] = array(					
			   	"sale" 		=> floatval($value['sale']),
			   	"order" 	=> floatval($value['order']),				   	
			   	"month"		=> $key				   	
			);
		}					

		//Response Data		
		$this->response($data, 200);	
	}
	
	//GET TOP CUSTOMER 
	function top_customer_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
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
				
		$obj->where_in("type", array("Invoice", "Cash_Sale"));
		$obj->where("is_recurring", $is_recurring);		
		$obj->where("deleted", $deleted);		
		$obj->get_iterated();

		$top = [];		
		$customer = [];

		//Group by contact_id
		foreach($obj as $value) {			
			if(isset($customer[$value->contact_id])){
				$customer[$value->contact_id]['amount'] += floatval($value->amount) / floatval($value->rate);
			} else {
				$customer[$value->contact_id]['amount'] = floatval($value->amount) / floatval($value->rate);
			}					
		}		

		//Sort amount
		foreach($customer as $value) {			
			$top[] = array('amount' => (float)$value['amount']);
		}
		rsort($top);	

		//Add Results
		$counter = 0;
		foreach ($top as $value) {
			foreach($customer as $key => $v) {				
				if($v['amount'] === $value['amount'] && $counter < 5) {
					$contact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$contact->get_by_id($key);
					
					$data["results"][] = array(
						'id' 			=> 0,						
						'amount' 		=> $value['amount'],
						'name' 			=> $contact->name
					);

					$counter++;

					break;
				}
			}
		}			

		//Response Data		
		$this->response($data, 200);	
	}

	//GET TOP A/R 
	function top_ar_get() {		
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

		$obj->where("type", "Invoice");
		$obj->where_in("status", array(0,2));
		$obj->where("is_recurring", $is_recurring);		
		$obj->where("deleted", $deleted);		
		$obj->get_iterated();

		$top = [];		
		$customer = [];

		//Group by contact_id
		foreach($obj as $value) {
			$amt = floatval($value->amount) - (floatval($value->amount_paid) + floatval($value->deposit));
						
			if(isset($customer[$value->contact_id])){
				$customer[$value->contact_id]['amount'] += $amt / floatval($value->rate);
			} else {
				$customer[$value->contact_id]['amount'] = $amt / floatval($value->rate);
			}					
		}		

		//Sort amount
		foreach($customer as $value) {			
			$top[] = array('amount' => (float)$value['amount']);
		}
		rsort($top);	

		//Add Results
		$counter = 0;
		foreach ($top as $value) {
			foreach($customer as $key => $v) {				
				if($v['amount'] === $value['amount'] && $counter < 5) {
					$contact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$contact->get_by_id($key);					

					$data["results"][] = array(
						'id' 			=> 0,						
						'amount' 		=> $value['amount'],
						'name' 			=> $contact->name
					);

					$counter++;

					break;
				}
			}
		}		

		//Response Data		
		$this->response($data, 200);	
	}





	//SUPPLIER
	//GET SUPPLIER DASHBOARD SUMMARY
	function supplier_dashboard_summary_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;
						
		//Purchase
		$purchase = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$purchase->where_in("type", array("Cash_Purchase","Credit_Purchase", "Purchase_Return"));
		$purchase->where("issued_date >=", $this->startFiscalDate);
		$purchase->where("issued_date <", $this->endFiscalDate);
		$purchase->where("is_recurring", 0);		
		$purchase->where("deleted", 0);		
		$purchase->get_iterated();

		//Puchase Count Customer
		$purchaseAmount = 0;
		$purchaseSupplier = [];
		$purchaseSupplierCount = 0;
		foreach($purchase as $value) {			
			//Total Purchase
			if($value->type=="Cash_Purchase" || $value->type=="Credit_Purchase"){
				$purchaseAmount += floatval($value->amount) / floatval($value->rate);
			}else{
				//Purhcase Return
				$purchaseAmount -= floatval($value->amount) / floatval($value->rate);
			}

			

			//Group customer
			if(isset($purchaseSupplier[$value->contact_id])){
				$purchaseSupplier[$value->contact_id] = 0;
			} else {
				$purchaseSupplier[$value->contact_id] = 0;

				$purchaseSupplierCount++;
			}						
		}

		//Purchase Count Product
		$purchaseProduct = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$purchaseProduct->where_in_related("transaction", "type", array("Cash_Purchase","Credit_Purchase"));
		$purchaseProduct->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$purchaseProduct->where_related("transaction", "issued_date <", $this->endFiscalDate);
		$purchaseProduct->where_related("item", "item_type_id", 1);		
		$purchaseProduct->where("item_id >", 0);
		$purchaseProduct->get_iterated();
		$purchaseProductList = [];
		$purchaseProductCount = 0;
		foreach ($purchaseProduct as $value) {			
			if(isset($purchaseProductList[$value->item_id])){
				
			}else{
				$purchaseProductCount++;
				$purchaseProductList[$value->item_id] = 1;
			}
		}

		//Purchase Count Order
		$purchaseOrder = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$purchaseOrder->where_in("type", array("Cash_Purchase","Credit_Purchase"));
		$purchaseOrder->where("status", 1);		
		$purchaseOrder->where("type", "Purchase_Order");		

		//Order
		$order = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);					
		$order->where("type", "Purchase_Order");
		$order->where("issued_date >=", $this->startFiscalDate);
		$order->where("issued_date <", $this->endFiscalDate);
		$order->where("is_recurring", 0);		
		$order->where("deleted", 0);		
		$order->get_iterated();

		$orderCount = 0;		
		$orderAmount = 0;
		$orderOpen = 0;
		$orderAvg = 0;
		foreach($order as $value) {
			$orderCount++;

			if($value->status==0){
				$orderOpen++;
			}

			$orderAmount += floatval($value->amount) / floatval($value->rate);
		}

		if($orderCount>0){
			$orderAvg = $orderAmount / $orderCount;
		}

		//AP
		$ap = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$ap->where("type", "Credit_Purchase");
		$ap->where_in("status", array(0,2));
		$ap->where("is_recurring", 0);		
		$ap->where("deleted", 0);		
		$ap->get_iterated();

		$apAmount = 0;
		$apCustomer = [];
		$apCustomerCount = 0;
		$apCount = 0;
		$apOpen = 0;
		$apOverDue = 0;
		$today = date("Y-m-d");
		foreach($ap as $value) {
			$apCount++;

			//Open
			if($value->status==0){
				$apOpen++;
			}

			//Overdue
			if($value->due_date<$today){
				$apOverDue++;
			}

			//Sum amount
			if($value->status==2){
				$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$paid->where("type", "Cash_Payment");
				$paid->where("reference_id", $value->id);
				$paid->where("is_recurring", 0);		
				$paid->where("deleted", 0);
				$paid->get();

				$paidAmount = 0;
				foreach ($paid as $p) {
					$paidAmount += ($p->amount + $p->discount);
				}
				
				$apAmount += ($value->amount - $paidAmount) / $value->rate;
			}else{
				$apAmount += floatval($value->amount) / floatval($value->rate);
			}

			$apAmount -= floatval($value->deposit);

			//Group customer
			if(isset($arCustomer[$value->contact_id])){
				$apCustomer[$value->contact_id] = 0;
			} else {
				$apCustomer[$value->contact_id] = 0;

				$apCustomerCount++;
			}			
		}

		//Credit Purchase
		$creditPurchase = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$creditPurchase->where("type", "Credit_Purchase");
		$creditPurchase->where("issued_date >=", $this->startFiscalDate);
		$creditPurchase->where("issued_date <", $this->endFiscalDate);
		$creditPurchase->where("is_recurring", 0);		
		$creditPurchase->where("deleted", 0);		
		$creditPurchase->get_iterated();
		
		$creditPurchaseAmount = 0;		
		foreach($creditPurchase as $value) {			
			$creditPurchaseAmount += floatval($value->amount) / floatval($value->rate);									
		}		
		
	    $startDate = new DateTime($this->startFiscalDate);
		$endDate = new DateTime();
		$totalDay = $endDate->diff($startDate)->format("%a");		
		$collectionDay = 0;
		if($creditPurchaseAmount>0){
			$collectionDay = ($apAmount / $creditPurchaseAmount) * $totalDay;
		}
		//Results
		$data["results"][] = array(
			'id' 				=> 0,
			'purchase' 			=> $purchaseAmount,						
			'purchase_supplier' => $purchaseSupplierCount,
			'purchase_product' 	=> $purchaseProductCount,
			'purchase_order' 	=> $purchaseOrder->count(),
			'order' 			=> $order->result_count(),
			'order_avg' 		=> $orderAvg,
			'order_open'		=> $orderOpen,			
			'ap' 				=> $apAmount,
			'ap_open' 			=> $apOpen,
			'ap_supplier' 		=> $apCustomerCount,
			'ap_overdue' 		=> $apOverDue,
			'collection_day' 	=> $collectionDay
		);

		$data["count"] = count($data["results"]);		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET MONTHLY PURCHASE
	function monthly_purchase_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		
		//Filter		
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {	    				
	    		if($value["field"]=="is_recurring"){
    				$is_recurring = $value["value"];
    			}else if($value["field"]=="deleted"){
    				$deleted = $value["value"];
    			}else{
    				$obj->where($value["field"], $value["value"]);    				
    			}    			    		  			    		
			}									 			
		}
		
		$obj->where_in("type", array("Cash_Purchase","Credit_Purchase","Purchase_Order"));
		$obj->where("issued_date >=", $this->startFiscalDate);
		$obj->where("issued_date <", $this->endFiscalDate);
		$obj->where("is_recurring", $is_recurring);		
		$obj->where("deleted", $deleted);						
		$obj->order_by("issued_date");								
		$obj->get_iterated();

		$transactionList = [];
		foreach ($obj as $value) {
			$month = date('M', strtotime($value->issued_date));
			$amount = floatval($value->amount) / floatval($value->rate);

			if(isset($transactionList[$month])){
				if($value->type==="Cash_Purchase" || $value->type==="Credit_Purchase"){
					$transactionList[$month]["sale"] += $amount;
				}else{
					$transactionList[$month]["order"] += $amount;
				}
			} else {
				if($value->type==="Cash_Purchase" || $value->type==="Credit_Purchase"){
					$transactionList[$month] = array("sale"=>$amount, "order"=>0);
				}else{
					$transactionList[$month] = array("sale"=>0, "order"=>$amount);
				}			
			}			
		}		
		
		foreach ($transactionList as $key => $value) {
			$data["results"][] = array(					
			   	"sale" 		=> floatval($value['sale']),
			   	"order" 	=> floatval($value['order']),				   	
			   	"month"		=> $key				   	
			);
		}					

		//Response Data		
		$this->response($data, 200);	
	}	
	
	//GET TOP SUPPLIER 
	function top_supplier_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
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
				
		$obj->where_in("type", array("Cash_Purchase", "Credit_Purchase"));
		$obj->where("is_recurring", $is_recurring);		
		$obj->where("deleted", $deleted);		
		$obj->get_iterated();

		$top = [];		
		$customer = [];

		//Group by contact_id
		foreach($obj as $value) {			
			if(isset($customer[$value->contact_id])){
				$customer[$value->contact_id]['amount'] += floatval($value->amount) / floatval($value->rate);
			} else {
				$customer[$value->contact_id]['amount'] = floatval($value->amount) / floatval($value->rate);
			}					
		}		

		//Sort amount
		foreach($customer as $value) {			
			$top[] = array('amount' => (float)$value['amount']);
		}
		rsort($top);	

		//Add Results
		$counter = 0;
		foreach ($top as $value) {
			foreach($customer as $key => $v) {				
				if($v['amount'] === $value['amount'] && $counter < 5) {
					$contact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$contact->get_by_id($key);

					$data["results"][] = array(
						'id' 			=> 0,						
						'amount' 		=> $value['amount'],
						'name' 			=> $contact->name
					);

					$counter++;

					break;
				}
			}
		}			

		//Response Data		
		$this->response($data, 200);	
	}

	//GET TOP A/P
	function top_ap_get() {		
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

		$obj->where("type", "Credit_Purchase");
		$obj->where_in("status", array(0,2));
		$obj->where("is_recurring", $is_recurring);		
		$obj->where("deleted", $deleted);		
		$obj->get_iterated();

		$top = [];		
		$customer = [];

		//Group by contact_id
		foreach($obj as $value) {
			$amt = floatval($value->amount) - (floatval($value->amount_paid) + floatval($value->deposit));

			if(isset($customer[$value->contact_id])){
				$customer[$value->contact_id]['amount'] += $amt / floatval($value->rate);
			} else {
				$customer[$value->contact_id]['amount'] = $amt / floatval($value->rate);
			}					
		}		

		//Sort amount
		foreach($customer as $value) {			
			$top[] = array('amount' => (float)$value['amount']);
		}
		rsort($top);	

		//Add Results
		$counter = 0;
		foreach ($top as $value) {
			foreach($customer as $key => $v) {				
				if($v['amount'] === $value['amount'] && $counter < 5) {
					$contact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$contact->get_by_id($key);

					$data["results"][] = array(
						'id' 			=> 0,						
						'amount' 		=> $value['amount'],
						'name' 			=> $contact->name
					);

					$counter++;

					break;
				}
			}
		}		

		//Response Data		
		$this->response($data, 200);	
	}	




	//ITEM
	//Inventory Dashboard Summary
	function inventory_dashboard_summary_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;
		$onHand = 0;
		$today = date("Y-m-d");
		
		//Purchase
		$purchase = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$purchase->where_in("type", array("Cash_Purchase","Credit_Purchase"));
		$purchase->where("issued_date >=", $this->startFiscalDate);
		$purchase->where("issued_date <", $this->endFiscalDate);
		$purchase->where("is_recurring", 0);		
		$purchase->where("deleted", 0);		
		$purchase->get_iterated();

		//Puchase Count Customer
		$purchaseAmount = 0;
		$purchaseSupplier = [];
		$purchaseSupplierCount = 0;
		foreach($purchase as $value) {
			//Total sale
			$item = $value->item_line->count();
			$purchaseAmount += floatval($value->amount) / floatval($value->rate);

			//Group customer
			if(isset($purchaseSupplier[$value->contact_id])){
				$purchaseSupplier[$value->contact_id] = 0;
			} else {
				$purchaseSupplier[$value->contact_id] = 0;

				$purchaseSupplierCount++;
			}						
		}

		//Purchase Count Product
		$purchaseProduct = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$purchaseProduct->where_in_related("transaction", "type", array("Cash_Purchase","Credit_Purchase"));
		$purchaseProduct->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$purchaseProduct->where_related("transaction", "issued_date <", $this->endFiscalDate);
		$purchaseProduct->where_related("item", "item_type_id", 1);		
		$purchaseProduct->where("item_id >", 0);
		$purchaseProduct->get_iterated();
		$purchaseProductList = [];
		$purchaseProductCount = 0;
		foreach ($purchaseProduct as $value) {			
			if(isset($purchaseProductList[$value->item_id])){
				
			}else{
				$purchaseProductCount++;
				$purchaseProductList[$value->item_id] = 1;
			}
		}

		//Purchase Count Order
		$purchaseOrder = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$purchaseOrder->where_in("type", array("Cash_Purchase","Credit_Purchase"));
		$purchaseOrder->where("status", 1);		
		$purchaseOrder->where("type", "Purchase_Order");	

		//Open RECEIVALBLE
		$ar = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$ar->where("type", "Invoice");
		$ar->where_in("status", array(0,2));
		$ar->where("is_recurring", 0);		
		$ar->where("deleted", 0);		
		$ar->get_iterated();

		$arAmount = 0;
		$arCustomer = [];
		$arCustomerCount = 0;
		$arCount = 0;
		$arOpen = 0;
		$arOverDue = 0;
		$today = date("Y-m-d");
		foreach($ar as $value) {
			$arCount++;

			//Open
			if($value->status==0){
				$arOpen++;
			}

			//Overdue
			if($value->due_date<$today){
				$arOverDue++;
			}

			//Sum amount
			if($value->status==2){
				$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$paid->select_sum("amount");
				$paid->where("reference_id", $value->id);
				$paid->get();
				$arAmount += (floatval($value->amount) - floatval($paid->amount)) / floatval($value->rate);
			}else{
				$arAmount += floatval($value->amount) / floatval($value->rate);
			}

			$arAmount -= floatval($value->deposit);

			//Group customer
			if(isset($arCustomer[$value->contact_id])){
				$arCustomer[$value->contact_id] = 0;
			} else {
				$arCustomer[$value->contact_id] = 0;

				$arCustomerCount++;
			}			
		}
		 //Inventory Turn Over
		$inventory = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$inventory->where_related("account/account_type", "id", 13);
		$inventory->where_related("transaction", "issued_date <=", $today);
		$inventory->where_related("transaction", "is_recurring", 0);
		$inventory->where_related("transaction", "deleted", 0);
		$inventory->where("deleted", 0);		
		$inventory->get_iterated();
		
		//Sum Dr and Cr					
		$inventoryDr = 0;
		$inventoryCr = 0;
		foreach ($inventory as $value) {			
			if($value->dr>0){
				$inventoryDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$inventoryCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalInventory = $inventoryDr - $inventoryCr;
		//END INVENTORY

		$cogs = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$cogs->where_related("account/account_type", "id", 36);
		$cogs->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$cogs->where_related("transaction", "issued_date <=", $today);
		$cogs->where_related("transaction", "is_recurring", 0);
		$cogs->where_related("transaction", "deleted", 0);
		$cogs->where("deleted", 0);		
		$cogs->get_iterated();
		
		//Sum Dr and Cr					
		$cogsDr = 0;
		$cogsCr = 0;
		foreach ($cogs as $value) {			
			if($value->dr>0){
				$cogsDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$cogsCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalCOGS = $cogsDr - $cogsCr;
		//END COGS

		//SALE (Begin FiscalDate To As Of)
		$sale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$sale->where_in("type", array("Invoice","Cash_Sale","Sale_Return"));
		$sale->where("issued_date >=", $this->startFiscalDate);
		$sale->where("issued_date <=", $today);
		$sale->where("is_recurring", 0);
		$sale->where("deleted", 0);
		$sale->get_iterated();
		
		//Sum Sale					
		$totalSale = 0;
		foreach ($sale as $value) {
			if($value->type=="Invoice" || $value->type=="Cash_Sale"){
				$totalSale += floatval($value->amount) / floatval($value->rate);
			}else{
				// -Sale Return
				$totalSale -= floatval($value->amount) / floatval($value->rate);
			}
		}
		//END SALE

		//COGS (Begin FiscalDate To As Of)
		$cogs = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$cogs->where_related("account/account_type", "id", 36);
		$cogs->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$cogs->where_related("transaction", "issued_date <=", $today);
		$cogs->where_related("transaction", "is_recurring", 0);
		$cogs->where_related("transaction", "deleted", 0);
		$cogs->where("deleted", 0);		
		$cogs->get_iterated();
		
		//Sum Dr and Cr					
		$cogsDr = 0;
		$cogsCr = 0;
		foreach ($cogs as $value) {			
			if($value->dr>0){
				$cogsDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$cogsCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalCOGS = $cogsDr - $cogsCr;
		//END COGS


		//Days
		$date1 = new DateTime($this->startFiscalDate);
		$date2 = new DateTime($today);
		$days = $date2->diff($date1)->format("%a")-1;

		$inventoryTurnOver = $totalCOGS > 0?($totalInventory / $totalCOGS) * $days : 0;		
		
		//Results
		$data["results"][] = array(
			'id' 						=> 0,
			'onHand' 					=> $onHand,						
			'purchaseSupplierCount' 	=> $purchaseSupplierCount,
			'purchaseProductCount'		=> $purchaseProductCount,
			'purchase_order' 			=> $purchaseOrder->count(),	
			'open'						=> $arOpen,	
			"inventoryTurnOver" 		=> $inventoryTurnOver,
		   	"turnover" 					=>count($inventory),
		   	"grossProfitMargin"			=> ($totalSale - $totalCOGS) / $totalSale,
		   	"product" 					=>count($cogs),
		);

		$data["count"] = count($data["results"]);		

		//Response Data		
		$this->response($data, 200);	
	}
	//GET TOP PURCHASE PRODUCT
	function top_purchase_product_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;

		$obj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
		
		$obj->include_related("item", array("number", "name"), FALSE);		
		
		$obj->where_in_related("transaction", "type", array("Cash_Purchase", "Credit_Purchase"));		
		$obj->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$obj->where_related("transaction", "issued_date <", $this->endFiscalDate);				
		$obj->where_related("transaction", "is_recurring", 0);		
		$obj->where_related("transaction", "deleted", 0);
		$obj->where_related("item", "item_type_id", 1);
		$obj->where("item_id >", 1);								
		$obj->get_iterated();

		//Group by item_id
		$product = [];
		foreach($obj as $value) {			
			if(isset($product[$value->item_id])){
				$product[$value->item_id]['quantity'] += floatval($value->quantity);
			} else {
				$product[$value->item_id]['quantity'] = floatval($value->quantity);
				$product[$value->item_id]['name'] = $value->name;
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
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;

		$obj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		
		$obj->include_related("item", array("number", "name"), FALSE);		
		
		$obj->where_in_related("transaction", "type", array("Invoice", "Cash_Sale"));
		$obj->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$obj->where_related("transaction", "issued_date <", $this->endFiscalDate);		
		$obj->where_related("transaction", "is_recurring", 0);		
		$obj->where_related("transaction", "deleted", 0);
		$obj->where_related("item", "item_type_id", 1);
		$obj->where("item_id >", 1);						
		$obj->get();		

		//Group by item_id
		$product = [];
		foreach($obj as $value) {			
			if(isset($product[$value->item_id])){
				$product[$value->item_id]['quantity'] += floatval($value->quantity);
			} else {
				$product[$value->item_id]['quantity'] = floatval($value->quantity);
				$product[$value->item_id]['name'] = $value->name;
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

	//Get Top Purchase Product
	function top_purchase_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;

		$obj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		
		$obj->include_related("item", array("number", "name"), FALSE);		
		
		$obj->where_in_related("transaction", "type", array("Cash_Purchase", "Credit_Purchase"));
		$obj->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$obj->where_related("transaction", "issued_date <", $this->endFiscalDate);		
		$obj->where_related("transaction", "is_recurring", 0);		
		$obj->where_related("transaction", "deleted", 0);
		$obj->where_related("item", "item_type_id", 1);
		$obj->where("item_id >", 1);						
		$obj->get();		

		//Group by item_id
		$product = [];
		foreach($obj as $value) {			
			if(isset($product[$value->item_id])){
				$product[$value->item_id]['quantity'] += floatval($value->quantity);
			} else {
				$product[$value->item_id]['quantity'] = floatval($value->quantity);
				$product[$value->item_id]['name'] = $value->name;
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

	//Inventory Report Deasbord
	function inventory_report_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;
		$onHand = 0;
		$today = date("Y-m-d");
		
		 //Inventory Turn Over
		$inventory = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$inventory->where_related("account/account_type", "id", 13);
		$inventory->where_related("transaction", "issued_date <=", $today);
		$inventory->where_related("transaction", "is_recurring", 0);
		$inventory->where_related("transaction", "deleted", 0);
		$inventory->where("deleted", 0);		
		$inventory->get_iterated();
		
		//Sum Dr and Cr					
		$inventoryDr = 0;
		$inventoryCr = 0;
		foreach ($inventory as $value) {			
			if($value->dr>0){
				$inventoryDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$inventoryCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalInventory = $inventoryDr - $inventoryCr;
		//END INVENTORY

		//SALE (Begin FiscalDate To As Of)
		$sale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$sale->where_in("type", array("Invoice","Cash_Sale","Sale_Return"));
		$sale->where("issued_date >=", $this->startFiscalDate);
		$sale->where("issued_date <=", $today);
		$sale->where("is_recurring", 0);
		$sale->where("deleted", 0);
		$sale->get_iterated();
		
		//Sum Sale					
		$totalSale = 0;
		foreach ($sale as $value) {
			if($value->type=="Invoice" || $value->type=="Cash_Sale"){
				$totalSale += floatval($value->amount) / floatval($value->rate);
			}else{
				// -Sale Return
				$totalSale -= floatval($value->amount) / floatval($value->rate);
			}
		}
		//END SALE

		//COGS (Begin FiscalDate To As Of)
		$cogs = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$cogs->where_related("account/account_type", "id", 36);
		$cogs->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$cogs->where_related("transaction", "issued_date <=", $today);
		$cogs->where_related("transaction", "is_recurring", 0);
		$cogs->where_related("transaction", "deleted", 0);
		$cogs->where("deleted", 0);		
		$cogs->get_iterated();
		
		//Sum Dr and Cr					
		$cogsDr = 0;
		$cogsCr = 0;
		foreach ($cogs as $value) {			
			if($value->dr>0){
				$cogsDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$cogsCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalCOGS = $cogsDr - $cogsCr;
		//END COGS


		//Days
		$date1 = new DateTime($this->startFiscalDate);
		$date2 = new DateTime($today);
		$days = $date2->diff($date1)->format("%a")-1;

		$inventoryTurnOver = ($totalInventory / $totalCOGS) * $days;		
		
		//Results
		$data["results"][] = array(
			'id' 						=> 0,
			"inventoryTurnOver" 		=> $inventoryTurnOver,
		   	"grossProfitMargin"			=> ($totalSale - $totalCOGS) / $totalSale,
		   	"inventoryBalance"   		=> $totalInventory,
		);

		$data["count"] = count($data["results"]);		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET MONTHLY PURCHASE AND SALE
	function item_monthly_purchase_sale_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		
		//Filter		
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {	    				
	    		if($value["field"]=="is_recurring"){
    				$is_recurring = $value["value"];
    			}else if($value["field"]=="deleted"){
    				$deleted = $value["value"];
    			}else{
    				$obj->where($value["field"], $value["value"]);    				
    			}    			    		  			    		
			}									 			
		}
		
		$obj->where_in("type", array("Cash_Purchase","Credit_Purchase","Invoice","Cash_Sale"));
		$obj->where("issued_date >=", $this->startFiscalDate);
		$obj->where("issued_date <", $this->endFiscalDate);
		$obj->where("is_recurring", 0);		
		$obj->where("deleted", 0);						
		$obj->order_by("issued_date");								
		$obj->get_iterated();
		
		$transactionList = [];
		foreach ($obj as $value) {
			$month = date('M', strtotime($value->issued_date));
			$amount = floatval($value->amount) / floatval($value->rate);

			if(isset($transactionList[$month])){
				if($value->type==="Cash_Purchase" || $value->type==="Credit_Purchase"){
					$transactionList[$month]["purchase"] += $amount;
				}else{
					$transactionList[$month]["sale"] += $amount;
				}
			} else {
				if($value->type==="Cash_Purchase" || $value->type==="Credit_Purchase"){
					$transactionList[$month] = array("month"=>$month, "purchase"=>$amount, "sale"=>0);
				}else{
					$transactionList[$month] = array("month"=>$month, "purchase"=>0, "sale"=>$amount);
				}			
			}			
		}		
		
		foreach ($transactionList as $value) {
			$data["results"][] = $value;
		}

		$data["count"] = count($data["results"]);					

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
/* End of file dashboards.php */
/* Location: ./application/controllers/api/dashboards.php */