<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Contact_reports extends REST_Controller {	
	public $_database;
	public $server_host;
	public $server_user;
	public $server_pwd;
	public $fiscalDate;
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
			$this->fiscalDate = new DateTime(date("Y",strtotime("-1 year")) ."-". $institute->fiscal_date);
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
		$ar->where("is_recurring", $is_recurring);		
		$ar->where("deleted", $deleted);		
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
				$paid->select_sum("amount");
				$paid->where("reference_id", $value->id);
				$paid->get();
				$arAmount += (floatval($value->amount) - floatval($paid->amount)) / floatval($value->rate);
			}else{
				$arAmount += floatval($value->amount) / floatval($value->rate);
			}

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
		$ap->where("is_recurring", $is_recurring);		
		$ap->where("deleted", $deleted);		
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
				$paid->select_sum("amount");
				$paid->where("reference_id", $value->id);
				$paid->get();
				$apAmount += (floatval($value->amount) - floatval($paid->amount)) / floatval($value->rate);
			}else{
				$apAmount += floatval($value->amount) / floatval($value->rate);
			}

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
		$obj->where("is_recurring", $is_recurring);		
		$obj->where("deleted", $deleted);										
		$obj->get_iterated();

		$transactionList = [];
		foreach ($obj as $value) {
			$month = date('F', strtotime($value->transaction_issued_date));
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

	//GET CUSTOMER SUMMARY
	function summary_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;
		
		$sale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$order = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$ar = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$product = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
		$creditSale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		// //Sort
		// if(!empty($sort) && isset($sort)){					
		// 	foreach ($sort as $value) {
		// 		$sale->order_by($value["field"], $value["dir"]);
		// 	}
		// }
		
		//Filter		
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {	    			    			
    			if($value["field"]=="is_recurring"){
    				$is_recurring = $value["value"];
    			}else if($value["field"]=="deleted"){
    				$deleted = $value["value"];
    			}else{
    				$sale->where($value["field"], $value["value"]);
    				$order->where($value["field"], $value["value"]);
    				$ar->where($value["field"], $value["value"]);
    				$product->where_related("transaction", $value["field"], $value["value"]);
    				$creditSale->where($value["field"], $value["value"]);
    			}	    		
			}									 			
		}
		
		//Sale			
		$sale->where_in("type", array("Invoice", "Cash_Sale"));
		$sale->where("is_recurring", $is_recurring);		
		$sale->where("deleted", $deleted);		
		$sale->get_iterated();

		//Sale Count Customer
		$saleAmount = 0;
		$saleCustomer = [];
		$saleCustomerCount = 0;
		foreach($sale as $value) {
			//Total sale
			$saleAmount += floatval($value->amount) / floatval($value->rate);

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
		$saleProduct->is_related_to($sale);		
		$saleProduct->where("item_id >", 0);

		//Sale Count Order
		$saleOrder = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$saleOrder->is_related_to($sale);
		$saleOrder->where("status", 1);		
		$saleOrder->where("type", "Sale_Order");		

		//Order					
		$order->where("type", "Sale_Order");
		$order->where("is_recurring", $is_recurring);		
		$order->where("deleted", $deleted);		
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
		$ar->where("type", "Invoice");
		$ar->where_in("status", array(0,2));
		$ar->where("is_recurring", $is_recurring);		
		$ar->where("deleted", $deleted);		
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

			//Group customer
			if(isset($arCustomer[$value->contact_id])){
				$arCustomer[$value->contact_id] = 0;
			} else {
				$arCustomer[$value->contact_id] = 0;

				$arCustomerCount++;
			}			
		}

		//Credit Sale			
		$creditSale->where_in("type", "Invoice");
		$creditSale->where("is_recurring", $is_recurring);		
		$creditSale->where("deleted", $deleted);		
		$creditSale->get_iterated();
		
		$creditSaleAmount = 0;		
		foreach($creditSale as $value) {			
			$creditSaleAmount += floatval($value->amount) / floatval($value->rate);									
		}		
		
	    $startDate = $this->fiscalDate;
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
			'sale_product' 		=> $saleProduct->count(),
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

	//GET MONTHLY
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
		$obj->where("issued_date >=", date("Y")."-01-01");
		$obj->where("issued_date <=", date("Y")."-12-31");
		$obj->where("is_recurring", $is_recurring);		
		$obj->where("deleted", $deleted);						
		$obj->order_by("issued_date");								
		$obj->get_iterated();

		$transactionList = [];
		foreach ($obj as $value) {
			$month = date('F', strtotime($value->issued_date));
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

					$fullname = $contact->surname ." ". $contact->name;
					if($contact->company){
						$fullname = $contact->company;
					}

					$data["results"][] = array(
						'id' 			=> 0,						
						'amount' 		=> $value['amount'],
						'name' 			=> $fullname
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
			if(isset($customer[$value->contact_id])){
				$customer[$value->contact_id]['amount'] += (floatval($value->amount) - floatval($value->amount_paid)) / floatval($value->rate);
			} else {
				$customer[$value->contact_id]['amount'] = (floatval($value->amount) - floatval($value->amount_paid)) / floatval($value->rate);
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

					$fullname = $contact->surname ." ". $contact->name;
					if($contact->company){
						$fullname = $contact->company;
					}

					$data["results"][] = array(
						'id' 			=> 0,						
						'amount' 		=> $value['amount'],
						'name' 			=> $fullname
					);

					$counter++;

					break;
				}
			}
		}		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET TOP PRODUCT
	function top_product_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;

		$obj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
		    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
		    		}
	    		}else{	    			
	    			// if($value["field"]=="is_recurring"){
	    			// 	$is_recurring = $value["value"];
	    			// }else if($value["field"]=="deleted"){
	    			// 	$deleted = $value["value"];
	    			// }else{
	    				$obj->where($value["field"], $value["value"]);
	    			// }	    				    			
	    		}
			}									 			
		}

		$obj->include_related("item", array("sku", "name"), FALSE);		
		
		$obj->where_in_related("transaction", "type", array("Invoice", "Cash_Sale"));		
		$obj->where_related("transaction", "is_recurring", $is_recurring);		
		$obj->where_related("transaction", "deleted", $deleted);
		$obj->where_related("item", "item_type_id", 1);						
		$obj->get();		

		$top = [];		
		$product = [];

		//Group by item_id
		foreach($obj as $value) {			
			if(isset($product[$value->item_id])){
				$product[$value->item_id]['quantity'] += floatval($value->quantity);
			} else {
				$product[$value->item_id]['quantity'] = floatval($value->quantity);
			}					
		}		

		//Sort quantity
		foreach($product as $value) {			
			$top[] = array('quantity' => (float)$value['quantity']);
		}
		rsort($top);	

		//Add Results
		$counter = 0;
		foreach ($top as $value) {
			foreach($product as $key => $v) {				
				if($v['quantity'] === $value['quantity'] && $counter < 5) {
					$item = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$item->get_by_id($key);
					
					$data["results"][] = array(
						'id' 			=> 0,						
						'quantity' 		=> $value['quantity'],
						'name' 			=> $item->name
					);

					$counter++;

					break;
				}
			}
		}		

		//Response Data		
		$this->response($data, 200);	
	}
	
	//GET BALANCE
	function balance_get() {		
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
		    			$obj->where($value["field"], $value["value"]);
		    		}
	    		}else{	    			
	    			if($value["field"]=="is_pattern"){
	    				$is_pattern = $value["value"];
	    			}else if($value["field"]=="deleted"){
	    				$deleted = $value["value"];
	    			}else{
	    				$obj->where($value["field"], $value["value"]);
	    			}	    				    			
	    		}
			}									 			
		}

		$obj->include_related("contact", array("number","surname","name","company"));
		$obj->include_related("contact/contact_type", "name");		
		$obj->where("is_recurring", $is_recurring);		
		$obj->where("deleted", $deleted);		
		
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;							

		if($obj->exists()){
			foreach ($obj as $value) {
				$fullname = $value->contact_surname ." ". $value->contact_name;
				if($value->contact_company){
					$fullname = $value->contact_company;
				}
				
				$paid = 0;
				if($inv->status==2){
					$receipt = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);					
					$receipt->select_sum("amount");
					$receipt->where("type", "Cash_Receipt");
					$receipt->where("reference_id", $inv->id);
					$get();

					$paid = floatval($receipt->amount);
				}
				$amount = floatval($inv->amount) - $paid;
				$balance += $amount / floatval($inv->rate);								

				$data["results"][] = array(
					"id" 				=> $value->id,
					"number" 			=> $value->number,
					"fullname" 			=> $fullname,
					"status" 			=> $value->status,			
				   	"contact_type" 		=> $value->contact_type_name,
				   	"balance" 			=> $balance
				);
			}
		}		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET BALANCE TOTAL
	function balance_total_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;
		$transaction_date = null;

		$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
		    		}else if($value["operator"]=="transaction_date"){
		    			$transaction_date = $value["value"];
		    		}else{
		    			$obj->where($value["field"], $value["value"]);
		    		}
	    		}else{	    			
	    			if($value["field"]=="is_pattern"){
	    				$is_pattern = $value["value"];
	    			}else if($value["field"]=="deleted"){
	    				$deleted = $value["value"];
	    			}else{
	    				$obj->where($value["field"], $value["value"]);
	    			}	    				    			
	    		}
			}									 			
		}

		$obj->include_related("contact_type", "name");
		$obj->where_related("contact_type", "parent_id", 1);
		$obj->where("is_pattern", $is_pattern);		
		$obj->where("deleted", $deleted);		
		
		//Results
		$obj->get_iterated();
		$data["count"] = $obj->result_count();							

		$ids = [];
		foreach ($obj as $value) {
			array_push($ids, $value->id);			
		}

		//Invoice
		$invoice = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);	
		$invoice->where("type", "Invoice");
		$invoice->where_in("status", array(0,2));
		$invoice->where_in("contact_id", $ids);
		if($transaction_date!==null){
			$invoice->where("issued_date <=", $transaction_date);
		}				
		$invoice->get_iterated();

		$balance = 0;
		foreach($invoice as $inv) {
			$paid = 0;
			if($inv->status==2){
				$receipt = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);					
				$receipt->select_sum("amount");
				$receipt->where("type", "Cash_Receipt");
				$receipt->where("reference_id", $inv->id);
				$get();

				$paid = floatval($receipt->amount);
			}
			$amount = floatval($inv->amount) - $paid;
			$balance += $amount / floatval($inv->rate);											
		}

		$data["results"][] = array(
			"id" 		=> 0,			
		   	"total" 	=> $balance
		);			

		//Response Data		
		$this->response($data, 200);	
	}	
	
	
}
/* End of file customer_reports.php */
/* Location: ./application/controllers/api/customer_reports.php */