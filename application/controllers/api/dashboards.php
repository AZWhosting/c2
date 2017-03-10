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

	//GET HOME
	function home_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$today = date("Y-m-d");
				
		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);				
		$obj->where_in("type", array("Credit_Purchase","Purchase_Return","Commercial_Invoice","Vat_Invoice","Invoice","Sale_Return"));
		$obj->where_in("status", array(0,2));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->get_iterated();
		
		$arAmount = 0;
		$arOpen = 0;
		$customer = [];
		$arOverDue = 0;

		$apAmount = 0;
		$apOpen = 0;
		$vendor = [];
		$apOverDue = 0;

		foreach($obj as $value) {
			$paidAmount = 0;
			if($value->status==2){
				$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$paid->where_in("type", array("Cash_Payment","Cash_Receipt"));
				$paid->where("reference_id", $value->id);
				$paid->where("is_recurring <>", 1);
				$paid->where("deleted <>", 1);
				$paid->get_iterated();
				
				foreach ($paid as $p) {
					$paidAmount += (floatval($p->amount) + floatval($p->discount)) / floatval($p->rate);
				}
			}

			$amount = (floatval($value->amount) - floatval($value->deposit)) / floatval($value->rate);
			$amount -= $paidAmount;
			
			if($value->type=="Purchase_Return"){
				$apAmount -= $amount;
			}else if($value->type=="Sale_Return"){
				$arAmount -= $amount;
			}else if($value->type=="Credit_Purchase"){
				$apOpen++;
				$apAmount += $amount;

				//Overdue AP
				if($value->due_date<$today){
					$apOverDue++;
				}

				//Group vendor
				if(isset($vendor[$value->contact_id])){
					$vendor[$value->contact_id] = 0;
				} else {
					$vendor[$value->contact_id] = 0;
				}
			}else{
				$arOpen++;
				$arAmount += $amount;

				//Overdue AR
				if($value->due_date<$today){
					$arOverDue++;
				}

				//Group customer
				if(isset($customer[$value->contact_id])){
					$customer[$value->contact_id] = 0;
				} else {
					$customer[$value->contact_id] = 0;
				}
			}
		}

		//Results
		$data["results"][] = array(
			'id' 				=> 0,
			'ar' 				=> $arAmount,
			'ar_open' 			=> $arOpen,
			'ar_customer' 		=> count($customer),
			'ar_overdue' 		=> $arOverDue,
			'ap' 				=> $apAmount,
			'ap_open' 			=> $apOpen,
			'ap_vendor' 		=> count($vendor),
			'ap_overdue' 		=> $apOverDue
		);		

		//Response Data		
		$this->response($data, 200);
	}
	//GET HOME GRAPH
	function graph_cash_in_out_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->include_related("transaction", array("rate","issued_date"));
		$obj->where_in_related("account", "account_type_id", array(10,11));
		$obj->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$obj->where_related("transaction", "issued_date <", $this->endFiscalDate);
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by_related("transaction", "issued_date", "asc");												
		$obj->get_iterated();

		$txnList = [];
		foreach ($obj as $value) {
			$month = date('M', strtotime($value->transaction_issued_date));
			$dr = floatval($value->dr) / floatval($value->transaction_rate);
			$cr = floatval($value->cr) / floatval($value->transaction_rate);

			if(isset($txnList[$month])){
				if($value->dr>0){
					$txnList[$month]["cash_in"] += $dr;
				}else{
					$txnList[$month]["cash_out"] += $cr;
				}
			} else {
				if($value->dr>0){
					$txnList[$month] = array("cash_in"=>$dr, "cash_out"=>0);
				}else{
					$txnList[$month] = array("cash_in"=>0, "cash_out"=>$cr);
				}			
			}			
		}		
		
		foreach ($txnList as $key => $value) {
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
	function customer_dashboard_get() {		
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
		$obj->get_iterated();

		$today = date("Y-m-d");

		$sale = 0;
		$saleCustomer = [];
		$saleOrdered = 0;

		$so = 0;
		$soAmount = 0;
		$soAvg = 0;
		$soOpen = 0;

		if($obj->exists()){
			foreach ($obj as $value) {
				$amount = floatval($value->amount) / floatval($value->rate);

				if($value->type=="Sale_Return" || $value->type=="Cash_Refund"){
					$sale -= $amount;
				}else if($value->type=="Sale_Order"){
					$so++;
					$soAmount += $amount;

					//Open SO
					if($value->status==0){
						$soOpen++; 
					}
					//Used SO in sale
					if($value->status==1){
						$saleOrdered++; 
					}
				}else{
					$sale += $amount;

					//Group Sale Customer
					if(isset($saleCustomer[$value->contact_id])){
						$saleCustomer[$value->contact_id] = 0;
					} else {
						$saleCustomer[$value->contact_id] = 0;
					}
				}
			}

			//SO avg
			if($so>0){
				$soAvg = $soAmount / $so;
			}
		}

		//AR
		$receivable = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$receivable->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice","Sale_Return"));		
		$receivable->where_in("status", array(0,2));
		$receivable->where("is_recurring <>", 1);
		$receivable->where("deleted <>", 1);
		$receivable->get_iterated();

		$ar = 0;
		$arOpen = 0;
		$arCustomer = [];
		$arOverDue = 0;

		if($receivable->exists()){
			foreach ($receivable as $value) {
				$amount = floatval($value->amount) / floatval($value->rate);

				if($value->type=="Sale_Return"){
					$ar -= $amount;
				}else{
					$paidAmount = 0;
					if($value->status==2){
						$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$paid->where("type", "Cash_Receipt");
						$paid->where("reference_id", $value->id);
						$paid->where("is_recurring <>", 1);
						$paid->where("deleted <>", 1);
						$paid->get_iterated();
						
						foreach ($paid as $p) {
							$paidAmount += (floatval($p->amount) + floatval($p->discount)) / floatval($p->rate);
						}
					}

					$ar += $amount - $paidAmount;
					$arOpen++;

					//Overdue AR
					if($value->due_date<$today){
						$arOverDue++;
					}

					//Group AR Customer
					if(isset($arCustomer[$value->contact_id])){
						$arCustomer[$value->contact_id] = 0;
					} else {
						$arCustomer[$value->contact_id] = 0;
					}
				}
			}
		}
		
		//Sale Product
		$product = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$product->where_in_related("transaction", "type", array("Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
		$product->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$product->where_related("transaction", "issued_date <", $this->endFiscalDate);
		$product->where_related("transaction", "is_recurring <>", 1);
		$product->where_related("transaction", "deleted <>", 1);
		$product->where("item_id >", 0);
		$product->where_related("item", "item_type_id", 1);
		$product->get_iterated();

		$itemList = [];

		if($product->exists()){
			foreach ($product as $value) {
				//Group product
				if(isset($itemList[$value->item_id])){
					$itemList[$value->item_id] = 0;
				} else {
					$itemList[$value->item_id] = 0;
				}
			}
		}

		//Results
		$data["results"][] = array(
			'id' 				=> 0,
			'sale' 				=> $sale,
			'sale_customer' 	=> count($saleCustomer),
			'sale_product' 		=> count($itemList),
			'sale_ordered' 		=> $saleOrdered,
			'so' 				=> $so,
			'so_avg' 			=> $soAvg,
			'so_open'			=> $soOpen,
			'ar' 				=> $ar,
			'ar_open' 			=> $arOpen,
			'ar_customer' 		=> count($arCustomer),
			'ar_overdue' 		=> $arOverDue
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

		$obj->include_related("contact", array("name"));
		$obj->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale","Sale_Return","Cash_Refund"));			
		$obj->where("issued_date >=", $this->startFiscalDate);
		$obj->where("issued_date <", $this->endFiscalDate);
		$obj->where("is_recurring <>", 1);
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
			$top = [];
			$contactList = [];

			//Group by contact_id
			foreach($obj as $value) {
				$amount = floatval($value->amount) / floatval($value->rate);

				if(isset($contactList[$value->contact_id])){
					if($value->type=="Sale_Return" || $value->type=="Cash_Refund"){
						$contactList[$value->contact_id]['amount'] -= $amount;
					}else{
						$contactList[$value->contact_id]['amount'] += $amount;
					}					
				} else {
					if($value->type=="Sale_Return" || $value->type=="Cash_Refund"){
						$contactList[$value->contact_id]['name'] = $value->contact_name;
						$contactList[$value->contact_id]['amount'] = $amount*-1;
					}else{
						$contactList[$value->contact_id]['name'] = $value->contact_name;
						$contactList[$value->contact_id]['amount'] = $amount;
					}
				}
			}

			//Sort amount DESC
			foreach($contactList as $value) {
				$top[] = array('amount' => (float)$value['amount']);
			}
			rsort($top);

			//Add Results
			$counter = 0;
			foreach ($top as $value) {
				foreach($contactList as $row) {
					if($row['amount'] === $value['amount'] && $counter < 5) {
						$data["results"][] = array(
							'id' 			=> 0,
							'name' 			=> $row['name'],
							'amount' 		=> $value['amount']
						);

						$counter++;

						break;
					}
				}
			}
		}

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

		$obj->include_related("contact", array("name"));
		$obj->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice","Sale_Return"));
		$obj->where_in("status", array(0,2));
		$obj->where("is_recurring <>", 1);
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
			$top = [];
			$contactList = [];

			//Group by contact_id
			foreach($obj as $value) {
				$paidAmount = 0;
				if($value->status==2){
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$paid->where("type", "Cash_Receipt");
					$paid->where("reference_id", $value->id);
					$paid->where("is_recurring <>", 1);
					$paid->where("deleted <>", 1);
					$paid->get_iterated();
					
					foreach ($paid as $p) {
						$paidAmount += (floatval($p->amount) + floatval($p->discount)) / floatval($p->rate);
					}
				}

				$amount = floatval($value->amount) / floatval($value->rate);
				$amount -= $paidAmount;

				if(isset($contactList[$value->contact_id])){
					if($value->type=="Sale_Return"){
						$contactList[$value->contact_id]['amount'] -= $amount;
					}else{
						$contactList[$value->contact_id]['amount'] += $amount;
					}					
				} else {
					if($value->type=="Sale_Return"){
						$contactList[$value->contact_id]['name'] = $value->contact_name;
						$contactList[$value->contact_id]['amount'] = $amount*-1;
					}else{
						$contactList[$value->contact_id]['name'] = $value->contact_name;
						$contactList[$value->contact_id]['amount'] = $amount;
					}
				}
			}

			//Sort amount
			foreach($contactList as $value) {
				$top[] = array('amount' => (float)$value['amount']);
			}
			rsort($top);

			//Add Results
			$counter = 0;
			foreach ($top as $value) {
				foreach($contactList as $row) {
					if($row['amount'] === $value['amount'] && $counter < 5) {
						$data["results"][] = array(
							'id' 			=> 0,
							'name' 			=> $row['name'],
							'amount' 		=> $value['amount']
						);

						$counter++;

						break;
					}
				}
			}
		}

		//Response Data		
		$this->response($data, 200);
	}


	//SUPPLIER
	//GET SUPPLIER DASHBOARD
	function supplier_dashboard_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
				
		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->where_in("type", array("Purchase_Order","Cash_Purchase","Credit_Purchase","Purchase_Return","Payment_Refund"));		
		$obj->where("issued_date >=", $this->startFiscalDate);
		$obj->where("issued_date <", $this->endFiscalDate);
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->get_iterated();

		$today = date("Y-m-d");

		$purchase = 0;
		$purchaseSupplier = [];
		$purchaseOrdered = 0;

		$po = 0;
		$poAmount = 0;
		$poAvg = 0;
		$poOpen = 0;

		if($obj->exists()){
			foreach ($obj as $value) {
				$amount = floatval($value->amount) / floatval($value->rate);

				if($value->type=="Purchase_Return" || $value->type=="Payment_Refund"){
					$purchase -= $amount;
				}else if($value->type=="Purchase_Order"){
					$po++;
					$poAmount += $amount;

					//Open PO
					if($value->status==0){
						$poOpen++; 
					}
					//Used PO in purchase
					if($value->status==1){
						$purchaseOrdered++; 
					}
				}else{
					$purchase += $amount;

					//Group Purchase Supplier
					if(isset($purchaseSupplier[$value->contact_id])){
						$purchaseSupplier[$value->contact_id] = 0;
					} else {
						$purchaseSupplier[$value->contact_id] = 0;
					}
				}
			}

			//PO avg
			if($po>0){
				$poAvg = $poAmount / $po;
			}
		}

		//AP
		$payable = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$payable->where_in("type", array("Credit_Purchase","Purchase_Return"));		
		$payable->where_in("status", array(0,2));
		$payable->where("is_recurring <>", 1);
		$payable->where("deleted <>", 1);
		$payable->get_iterated();

		$ap = 0;
		$apOpen = 0;
		$apSupplier = [];
		$apOverDue = 0;

		if($payable->exists()){
			foreach ($payable as $value) {
				$amount = floatval($value->amount) / floatval($value->rate);

				if($value->type=="Purchase_Return"){
					$ap -= $amount;
				}else{
					$paidAmount = 0;
					if($value->status==2){
						$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$paid->where("type", "Cash_Payment");
						$paid->where("reference_id", $value->id);
						$paid->where("is_recurring <>", 1);
						$paid->where("deleted <>", 1);
						$paid->get_iterated();
						
						foreach ($paid as $p) {
							$paidAmount += (floatval($p->amount) + floatval($p->discount)) / floatval($p->rate);
						}
					}

					$ap += $amount - $paidAmount;
					$apOpen++;

					//Overdue AP
					if($value->due_date<$today){
						$apOverDue++;
					}

					//Group AP Supplier
					if(isset($apSupplier[$value->contact_id])){
						$apSupplier[$value->contact_id] = 0;
					} else {
						$apSupplier[$value->contact_id] = 0;
					}
				}
			}
		}
		
		//Purchase Product
		$product = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$product->where_in_related("transaction", "type", array("Cash_Purchase","Credit_Purchase"));
		$product->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$product->where_related("transaction", "issued_date <", $this->endFiscalDate);
		$product->where_related("transaction", "is_recurring <>", 1);
		$product->where_related("transaction", "deleted <>", 1);
		$product->where("item_id >", 0);
		$product->where_related("item", "item_type_id", 1);
		$product->get_iterated();

		$itemList = [];

		if($product->exists()){
			foreach ($product as $value) {
				//Group product
				if(isset($itemList[$value->item_id])){
					$itemList[$value->item_id] = 0;
				} else {
					$itemList[$value->item_id] = 0;
				}
			}
		}

		//Results
		$data["results"][] = array(
			'id' 				=> 0,
			'purchase' 			=> $purchase,						
			'purchase_supplier' => count($purchaseSupplier),
			'purchase_product' 	=> count($itemList),
			'purchase_ordered' 	=> $purchaseOrdered,
			'po' 				=> $po,
			'po_avg' 			=> $poAvg,
			'po_open'			=> $poOpen,			
			'ap' 				=> $ap,
			'ap_open' 			=> $apOpen,
			'ap_supplier' 		=> count($apSupplier),
			'ap_overdue' 		=> $apOverDue
		);

		$data["count"] = count($data["results"]);		

		//Response Data		
		$this->response($data, 200);	
	}
	//GET MONTHLY PURCHASE
	function monthly_purchase_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->where_in("type", array("Purchase_Order","Cash_Purchase","Credit_Purchase","Purchase_Return","Payment_Refund"));
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
				if($value->type==="Purchase_Order"){
					$txnList[$month]["order"] += $amount;
				}else if($value->type==="Purchase_Return" || $value->type==="Payment_Refund"){
					$txnList[$month]["purchase"] -= $amount;
				}else{
					$txnList[$month]["purchase"] += $amount;
				}
			} else {
				if($value->type==="Purchase_Order"){
					$txnList[$month] = array("purchase"=>0, "order"=>$amount);
				}else if($value->type==="Purchase_Return" || $value->type==="Payment_Refund"){
					$txnList[$month] = array("purchase"=>$amount*-1, "order"=>0);
				}else{
					$txnList[$month] = array("purchase"=>$amount, "order"=>0);
				}
			}		
		}		
		
		foreach ($txnList as $key => $value) {
			$data["results"][] = array(					
			   	"purchase" 	=> floatval($value['purchase']),
			   	"order" 	=> floatval($value['order']),				   	
			   	"month"		=> $key				   	
			);
		}					

		//Response Data		
		$this->response($data, 200);	
	}
	//GET TOP SUPPLIER 
	function top_supplier_get() {		
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

		$obj->include_related("contact", array("name"));
		$obj->where_in("type", array("Cash_Purchase", "Credit_Purchase", "Purchase_Return", "Payment_Refund"));
		$obj->where("issued_date >=", $this->startFiscalDate);
		$obj->where("issued_date <", $this->endFiscalDate);
		$obj->where("is_recurring <>", 1);
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
			$top = [];
			$contactList = [];

			//Group by contact_id
			foreach($obj as $value) {
				$amount = floatval($value->amount) / floatval($value->rate);

				if(isset($contactList[$value->contact_id])){
					if($value->type=="Purchase_Return" || $value->type=="Payment_Refund"){
						$contactList[$value->contact_id]['amount'] -= $amount;
					}else{
						$contactList[$value->contact_id]['amount'] += $amount;
					}					
				} else {
					if($value->type=="Purchase_Return" || $value->type=="Payment_Refund"){
						$contactList[$value->contact_id]['name'] = $value->contact_name;
						$contactList[$value->contact_id]['amount'] = $amount*-1;
					}else{
						$contactList[$value->contact_id]['name'] = $value->contact_name;
						$contactList[$value->contact_id]['amount'] = $amount;
					}
				}
			}

			//Sort amount DESC
			foreach($contactList as $value) {
				$top[] = array('amount' => (float)$value['amount']);
			}
			rsort($top);

			//Add Results
			$counter = 0;
			foreach ($top as $value) {
				foreach($contactList as $row) {
					if($row['amount'] === $value['amount'] && $counter < 5) {
						$data["results"][] = array(
							'id' 			=> 0,
							'name' 			=> $row['name'],
							'amount' 		=> $value['amount']
						);

						$counter++;

						break;
					}
				}
			}
		}			

		//Response Data		
		$this->response($data, 200);	
	}
	//GET TOP A/P
	function top_ap_get() {		
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

		$obj->include_related("contact", array("name"));
		$obj->where_in("type", array("Credit_Purchase","Purchase_Return"));
		$obj->where_in("status", array(0,2));
		$obj->where("is_recurring <>", 1);
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
			$top = [];
			$contactList = [];

			//Group by contact_id
			foreach($obj as $value) {
				$paidAmount = 0;
				if($value->status==2){
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$paid->where("type", "Cash_Payment");
					$paid->where("reference_id", $value->id);
					$paid->where("is_recurring <>", 1);
					$paid->where("deleted <>", 1);
					$paid->get_iterated();
					
					foreach ($paid as $p) {
						$paidAmount += (floatval($p->amount) + floatval($p->discount)) / floatval($p->rate);
					}
				}

				$amount = floatval($value->amount) / floatval($value->rate);
				$amount -= $paidAmount;

				if(isset($contactList[$value->contact_id])){
					if($value->type=="Purchase_Return"){
						$contactList[$value->contact_id]['amount'] -= $amount;
					}else{
						$contactList[$value->contact_id]['amount'] += $amount;
					}					
				} else {
					if($value->type=="Purchase_Return"){
						$contactList[$value->contact_id]['name'] = $value->contact_name;
						$contactList[$value->contact_id]['amount'] = $amount*-1;
					}else{
						$contactList[$value->contact_id]['name'] = $value->contact_name;
						$contactList[$value->contact_id]['amount'] = $amount;
					}
				}
			}

			//Sort amount
			foreach($contactList as $value) {
				$top[] = array('amount' => (float)$value['amount']);
			}
			rsort($top);

			//Add Results
			$counter = 0;
			foreach ($top as $value) {
				foreach($contactList as $row) {
					if($row['amount'] === $value['amount'] && $counter < 5) {
						$data["results"][] = array(
							'id' 			=> 0,
							'name' 			=> $row['name'],
							'amount' 		=> $value['amount']
						);

						$counter++;

						break;
					}
				}
			}
		}

		//Response Data		
		$this->response($data, 200);	
	}


	//INVENTORY
	//GET INVENTORY DASHBOARD
	function inventory_dashboard_get() {		
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