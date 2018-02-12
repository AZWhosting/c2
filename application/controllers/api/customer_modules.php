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

		//cash position
		$cash = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);	
		$cash->include_related("transaction", array("rate"));
		$cash->where_related("account","account_type_id", 10);
		$cash->include_related("account/account_type", array("nature"));
		$cash->where_related("transaction", "is_recurring <>", 1);		
		$cash->where_related("transaction", "deleted <>", 1);
		$cash->where("deleted <>", 1);
		$cash->get_iterated();

		$totalCashPosition = 0;	
		if($cash->exists()){
			foreach ($cash as $value) {
				$amount = 0;
				if($value->account_account_type_nature=="Dr"){
					$amount = (floatval($value->dr) - floatval($value->cr)) / floatval($value->transaction_rate);				
				}else{
					$amount = (floatval($value->cr) - floatval($value->dr)) / floatval($value->transaction_rate);					
				}
				
				$totalCashPosition += $amount;
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
			'ar_overdue' 		=> $arOverDue,
			'collection_day' 	=> 0,
			'totalCashPosition' => $totalCashPosition,
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