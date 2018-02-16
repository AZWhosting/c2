<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Vendor_modules extends REST_Controller {	
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
	
	//GET SUPPLIER DASHBOARD
	function dashboard_get() {		
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

		//Top supplier
		$topSuppliers = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$topSuppliers->select_sum("amount / rate", "total");
		$topSuppliers->include_related("contact", array("name"), FALSE);
		$topSuppliers->where_in("type", array("Cash_Purchase", "Credit_Purchase", "Purchase_Return", "Payment_Refund"));
		$topSuppliers->where("issued_date >=", $this->startFiscalDate);
		$topSuppliers->where("issued_date <", $this->endFiscalDate);
		$topSuppliers->where("is_recurring <>", 1);
		$topSuppliers->where("deleted <>", 1);
		$topSuppliers->order_by("total", "desc");
		$topSuppliers->group_by("contact_id");
		$topSuppliers->limit(5);
		$top_supplier = $topSuppliers->get_raw()->result();

		//Top AP
		$topAP = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$topAP->select_sum("amount / rate", "total");
		$topAP->include_related("contact", array("name"), FALSE);
		$topAP->where_in("type", array("Credit_Purchase","Purchase_Return"));
		$topAP->where_in("status", array(0,2));
		$topAP->where("is_recurring <>", 1);
		$topAP->where("deleted <>", 1);
		$topAP->order_by("total", "desc");
		$topAP->group_by("contact_id");
		$topAP->limit(5);
		$top_ap = $topAP->get_raw()->result();

		//Top cash payment
		$topCashPayments = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		$topCashPayments->select_sum("amount / rate", "total");
		$topCashPayments->include_related("contact", array("name"), FALSE);
		$topCashPayments->where("type", "Cash_Payment");
		$topCashPayments->where("is_recurring <>", 1);
		$topCashPayments->where("deleted <>", 1);
		$topCashPayments->order_by("total", "desc");
		$topCashPayments->group_by("contact_id");
		$topCashPayments->limit(5);
		$top_cash_payment = $topCashPayments->get_raw()->result();

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
			'ap_overdue' 		=> $apOverDue,
			'payable_payment_day' => 0,

			'top_supplier' 		=> $top_supplier,
			'top_ap' 			=> $top_ap,
			'top_cash_payment'  => $top_cash_payment
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

		$obj->select_sum("amount", "total");
		$obj->include_related("contact", array("name"), FALSE);
		$obj->where_in("type", array("Cash_Purchase", "Credit_Purchase", "Purchase_Return", "Payment_Refund"));
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
}
/* End of file vendor_modules.php */
/* Location: ./application/controllers/api/vendor_modules.php */