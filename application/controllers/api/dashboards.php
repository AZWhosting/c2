<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Dashboards extends REST_Controller {	
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
	
	//GET CUSTOMER SUMMARY
	function customer_summary_get() {		
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
    			}	    		
			}									 			
		}
		
		//Sale			
		$sale->where_in("type", array("Invoice", "Cash_Sale"));
		$sale->where("is_recurring", $is_recurring);		
		$sale->where("deleted", $deleted);		
		$sale->get_iterated();

		// //Group sale
		$saleAmount = 0;
		$saleCustomer = [];
		$saleCustomerCount = 0;
		if($sale->exists()) {
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
		} else {
			$saleAmount = 0;
			$saleCustomerCount = 0;
		}

		//Order					
		$order->where("type", "Sale_Order");
		$order->where("is_recurring", $is_recurring);		
		$order->where("deleted", $deleted);
		$order->get_iterated();

		$orderCount = 0;		
		$orderAmount = 0;
		$orderOpen = 0;
		if($order->exists()) {
			foreach($order as $value) {
				$orderCount++;

				if($value->status==0){
					$orderOpen++;
				}

				$orderAmount += floatval($value->amount) / floatval($value->rate);
			}
		} else {
			$orderAmount = 0;
			$orderOpen = 0;
			$orderCount = 0;
		}
		$orderAvg = $orderAmount / $orderCount;

		//AR			
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
		$today = new DateTime();
		if($ar->exists()) {
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
					$arAmount += (floatval($value->amount) - floatval($value->amount_paid)) / floatval($value->rate);
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
		} else {
			$arAmount = 0;
			$arCustomerCount = 0;
			$arOverDue = 0;
		}

		// //Product			
		// $product->where_in("type", array("Invoice", "Cash_Sale"));
		// $product->where("is_recurring", $is_recurring);		
		// $product->where("deleted", $deleted);		
		// $product->get_iterated();

		//Results
		$data["results"][] = array(
			'id' 				=> 0
			// 'sale' 				=> floatval($saleAmount),						
			// 'sale_customer' 	=> $saleCustomerCount,
			// 'sale_product' 		=> 0,
			// 'sale_order' 		=> 0,
			// 'order' 			=> $orderCount,
			// 'order_avg' 		=> floatval($orderAvg),
			// 'order_open'		=> $orderOpen,			
			// 'ar' 				=> floatval($arAmount),
			// 'ar_open' 			=> $arOpen,
			// 'ar_customer' 		=> $arCustomerCount,
			// 'ar_overdue' 		=> $arOverDue
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

			if(isset($transactionList[$month])){
				if($value->type==="Invoice" || $value->type==="Cash_Sale"){
					$transactionList[$month]["sale"] += floatval($value->amount) / floatval($value->rate);
				}else{
					$transactionList[$month]["order"] += 1;
				}
			} else {
				if($value->type==="Invoice" || $value->type==="Cash_Sale"){
					$transactionList[$month] = array("sale"=>floatval($value->amount) / floatval($value->rate), "order"=>0);
				}else{
					$transactionList[$month] = array("sale"=>0, "order"=>1);
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
					if($contact->company!==""){
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
					if($contact->company!==""){
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
						'name' 			=> $item->sku ." ". $item->name
					);

					$counter++;

					break;
				}
			}
		}		

		//Response Data		
		$this->response($data, 200);	
	}

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
			$temp = (floatval($value->dr) - floatval($value->cr));			
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

		//Group by contact_id
		foreach($obj as $value) {
			$employee = $value->contact->get();			
			if(isset($customer[$value->contact_id])){
				$customer[$value->contact_id]['amount'] += floatval($value->amount) / floatval($value->rate);
			} else {
				$customer[$value->contact_id]['amount'] = floatval($value->amount) / floatval($value->rate);
				$customer[$value->contact_id]['name']   = $employee->name;
			}
			$open++;					
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
		//Response Data		
		$this->response($data, 200);
	}
	
}
/* End of file dashboards.php */
/* Location: ./application/controllers/api/dashboards.php */