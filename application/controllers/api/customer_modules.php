<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Customer_modules extends REST_Controller {	
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

		//SALE
		$sales = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$sales->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));		
		$sales->select_sum("amount / rate", "total");
		$sales->where("issued_date >=", $this->startFiscalDate);
		$sales->where("issued_date <", $this->endFiscalDate);
		$sales->where("is_recurring <>", 1);
		$sales->where("deleted <>", 1);
		$sales->get();

		$saleReturns = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$saleReturns->where_in("type", array("Sale_Return","Cash_Refund"));		
		$saleReturns->select_sum("amount / rate", "total");
		$saleReturns->where("issued_date >=", $this->startFiscalDate);
		$saleReturns->where("issued_date <", $this->endFiscalDate);
		$saleReturns->where("is_recurring <>", 1);
		$saleReturns->where("deleted <>", 1);
		$saleReturns->get();

		$customerCounts = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$customerCounts->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));		
		$customerCounts->where("issued_date >=", $this->startFiscalDate);
		$customerCounts->where("issued_date <", $this->endFiscalDate);
		$customerCounts->where("is_recurring <>", 1);
		$customerCounts->where("deleted <>", 1);
		$customerCounts->group_by("contact_id");

		$saleCounts = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$saleCounts->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));		
		$saleCounts->where("issued_date >=", $this->startFiscalDate);
		$saleCounts->where("issued_date <", $this->endFiscalDate);
		$saleCounts->where("is_recurring <>", 1);
		$saleCounts->where("deleted <>", 1);

		$sale = floatval($sales->total) - floatval($saleReturns->total);
		$saleCustomer = $customerCounts->count();
		$saleOrdered = $saleCounts->count();//Count All Sales

		//SALE ORDER
		$saleOrders = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$saleOrders->where("type", "Sale_Order");
		$saleOrders->where("issued_date >=", $this->startFiscalDate);
		$saleOrders->where("issued_date <", $this->endFiscalDate);
		$saleOrders->where("is_recurring <>", 1);
		$saleOrders->where("deleted <>", 1);

		$saleOrderAmounts = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$saleOrderAmounts->select_sum("amount / rate", "total");
		$saleOrderAmounts->where("type", "Sale_Order");
		$saleOrderAmounts->where("issued_date >=", $this->startFiscalDate);
		$saleOrderAmounts->where("issued_date <", $this->endFiscalDate);
		$saleOrderAmounts->where("is_recurring <>", 1);
		$saleOrderAmounts->where("deleted <>", 1);
		$saleOrderAmounts->get();

		$saleOrderOpens = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$saleOrderOpens->where("type", "Sale_Order");
		$saleOrderOpens->where("status", 0);
		$saleOrderOpens->where("issued_date >=", $this->startFiscalDate);
		$saleOrderOpens->where("issued_date <", $this->endFiscalDate);
		$saleOrderOpens->where("is_recurring <>", 1);
		$saleOrderOpens->where("deleted <>", 1);

		$so = $saleOrders->count();
		$soAmount = floatval($saleOrderAmounts->total);
		if($so>0){
			$soAvg = $soAmount / $so;
		}else{
			$soAvg = $soAmount;
		}
		$soOpen = $saleOrderOpens->count();

		//AR
		$receivable = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$receivable->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice"));		
		$receivable->select_sum("amount / rate", "total");
		$receivable->where_in("status", array(0,2));
		$receivable->where("is_recurring <>", 1);
		$receivable->where("deleted <>", 1);
		$receivable->get();

		$receivableReturns = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$receivableReturns->where("type", "Sale_Return");		
		$receivableReturns->select_sum("amount / rate", "total");
		$receivableReturns->where("is_recurring <>", 1);
		$receivableReturns->where("deleted <>", 1);
		$receivableReturns->get();

		$receivableCounts = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$receivableCounts->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice"));
		$receivableCounts->where_in("status", array(0,2));
		$receivableCounts->where("is_recurring <>", 1);
		$receivableCounts->where("deleted <>", 1);

		$receivableCustomerCounts = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$receivableCustomerCounts->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice"));
		$receivableCustomerCounts->where_in("status", array(0,2));
		$receivableCustomerCounts->where("is_recurring <>", 1);
		$receivableCustomerCounts->where("deleted <>", 1);
		$receivableCustomerCounts->group_by("contact_id");

		$receivableOverdueCounts = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$receivableOverdueCounts->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice"));
		$receivableOverdueCounts->where("due_date <", $today);
		$receivableOverdueCounts->where_in("status", array(0,2));
		$receivableOverdueCounts->where("is_recurring <>", 1);
		$receivableOverdueCounts->where("deleted <>", 1);

		$ar = floatval($receivable->total) - floatval($receivableReturns->total);
		$arOpen = $receivableCounts->count();
		$arCustomer = $receivableCustomerCounts->count();
		$arOverDue = $receivableOverdueCounts->count();

		//cash position
		$cash = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);	
		$cash->select_sum("(dr - cr) / transactions.rate", "total");
		$cash->where_related("account","account_type_id", 10);
		$cash->include_related("account/account_type", array("nature"));
		$cash->where_related("transaction", "is_recurring <>", 1);		
		$cash->where_related("transaction", "deleted <>", 1);
		$cash->where("deleted <>", 1);
		$cash->get();

		$totalCashPosition = floatval($cash->total);
		
		//Sale Product
		$product = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$product->where_in_related("transaction", "type", array("Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
		$product->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$product->where_related("transaction", "issued_date <", $this->endFiscalDate);
		$product->where_related("transaction", "is_recurring <>", 1);
		$product->where_related("transaction", "deleted <>", 1);
		$product->where("item_id >", 0);
		$product->where_related("item", "item_type_id", 1);
		$product->group_by("item_id");
		$sale_product = $product->count();


		//TOP 5
		$topCustomers = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$topCustomers->select_sum("amount / rate", "total");
		$topCustomers->include_related("contact", array("name"), FALSE);
		$topCustomers->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale","Sale_Return","Cash_Refund"));			
		$topCustomers->where("issued_date >=", $this->startFiscalDate);
		$topCustomers->where("issued_date <", $this->endFiscalDate);
		$topCustomers->where("is_recurring <>", 1);
		$topCustomers->where("deleted <>", 1);
		$topCustomers->order_by("total", "desc");
		$topCustomers->group_by("contact_id");
		$topCustomers->limit(5);
		$top_customer = $topCustomers->get_raw()->result();

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

		$topCashReceipts = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$topCashReceipts->select_sum("amount / rate", "total");
		$topCashReceipts->include_related("contact", array("name"), FALSE);
		$topCashReceipts->where("type", "Cash_Receipt");
		$topCashReceipts->where("is_recurring <>", 1);
		$topCashReceipts->where("deleted <>", 1);
		$topCashReceipts->order_by("total", "desc");
		$topCashReceipts->group_by("contact_id");
		$topCashReceipts->limit(5);
		$top_cash_receipt = $topCashReceipts->get_raw()->result();

		//Results
		$data["results"][] = array(
			'id' 				=> 0,

			'sale' 				=> $sale,
			'sale_customer' 	=> $saleCustomer,
			'sale_product' 		=> $sale_product,
			'sale_ordered' 		=> $saleOrdered,

			'so' 				=> $so,
			'so_avg' 			=> $soAvg,
			'so_open'			=> $soOpen,

			'ar' 				=> $ar,
			'ar_open' 			=> $arOpen,
			'ar_customer' 		=> $arCustomer,
			'ar_overdue' 		=> $arOverDue,

			'collection_day' 	=> 0,
			'totalCashPosition' => $totalCashPosition,

			'top_customer' 		=> $top_customer,
			'top_ar' 			=> $top_ar,
			'top_cash_receipt'  => $top_cash_receipt
		);

		$data["count"] = count($data["results"]);

		//Response Data		
		$this->response($data, 200);	
	}
	//GET MONTHLY SALE
	function monthly_sale_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->where_in("type", array("Sale_Order","Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale","Sale_Return","Cash_Refund"));
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
				if($value->type==="Sale_Order"){
					$txnList[$month]["order"] += $amount;
				}else if($value->type==="Sale_Return" || $value->type==="Cash_Refund"){
					$txnList[$month]["sale"] -= $amount;
				}else{
					$txnList[$month]["sale"] += $amount;
				}
			} else {
				if($value->type==="Sale_Order"){
					$txnList[$month] = array("sale"=>0, "order"=>$amount);
				}else if($value->type==="Sale_Return" || $value->type==="Cash_Refund"){
					$txnList[$month] = array("sale"=>$amount*-1, "order"=>0);
				}else{
					$txnList[$month] = array("sale"=>$amount, "order"=>0);
				}
			}
		}
		
		foreach ($txnList as $key => $value) {
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
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		
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

		$obj->select_sum("amount", "total");
		$obj->include_related("contact", array("name"), FALSE);
		$obj->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale","Sale_Return","Cash_Refund"));			
		$obj->where("issued_date >=", $this->startFiscalDate);
		$obj->where("issued_date <", $this->endFiscalDate);
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("total", "desc");
		$obj->group_by("contact_id");
		$obj->limit(5);
		$data["results"] = $obj->get_raw()->result();

		//Response Data
		$this->response($data, 200);
	}
	//GET TOP A/R 
	function top_ar_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		
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

		$obj->select_sum("amount", "total");
		$obj->include_related("contact", array("name"), FALSE);
		$obj->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice","Sale_Return"));
		$obj->where_in("status", array(0,2));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("total", "desc");
		$obj->group_by("contact_id");
		$obj->limit(5);
		$data["results"] = $obj->get_raw()->result();

		// //Results
		// if($page && $limit){
		// 	$obj->get_paged_iterated($page, $limit);
		// 	$data["count"] = $obj->paged->total_rows;
		// }else{
		// 	$obj->get_iterated();
		// 	$data["count"] = $obj->result_count();
		// }

		// if($obj->exists()){
		// 	$top = [];
		// 	$contactList = [];

		// 	//Group by contact_id
		// 	foreach($obj as $value) {
		// 		$paidAmount = 0;
		// 		if($value->status==2){
		// 			$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		// 			$paid->where("type", "Cash_Receipt");
		// 			$paid->where("reference_id", $value->id);
		// 			$paid->where("is_recurring <>", 1);
		// 			$paid->where("deleted <>", 1);
		// 			$paid->get_iterated();
					
		// 			foreach ($paid as $p) {
		// 				$paidAmount += (floatval($p->amount) + floatval($p->discount)) / floatval($p->rate);
		// 			}
		// 		}

		// 		$amount = floatval($value->amount) / floatval($value->rate);
		// 		$amount -= $paidAmount;

		// 		if(isset($contactList[$value->contact_id])){
		// 			if($value->type=="Sale_Return"){
		// 				$contactList[$value->contact_id]['amount'] -= $amount;
		// 			}else{
		// 				$contactList[$value->contact_id]['amount'] += $amount;
		// 			}					
		// 		} else {
		// 			if($value->type=="Sale_Return"){
		// 				$contactList[$value->contact_id]['name'] = $value->contact_name;
		// 				$contactList[$value->contact_id]['amount'] = $amount*-1;
		// 			}else{
		// 				$contactList[$value->contact_id]['name'] = $value->contact_name;
		// 				$contactList[$value->contact_id]['amount'] = $amount;
		// 			}
		// 		}
		// 	}

		// 	//Sort amount
		// 	foreach($contactList as $value) {
		// 		$top[] = array('amount' => (float)$value['amount']);
		// 	}
		// 	rsort($top);

		// 	//Add Results
		// 	$counter = 0;
		// 	foreach ($top as $value) {
		// 		foreach($contactList as $row) {
		// 			if($row['amount'] === $value['amount'] && $counter < 5) {
		// 				$data["results"][] = array(
		// 					'id' 			=> 0,
		// 					'name' 			=> $row['name'],
		// 					'amount' 		=> $value['amount']
		// 				);

		// 				$counter++;

		// 				break;
		// 			}
		// 		}
		// 	}
		// }

		//Response Data		
		$this->response($data, 200);
	}
}
/* End of file customer_modules.php */
/* Location: ./application/controllers/api/customer_modules.php */