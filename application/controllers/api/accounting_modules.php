<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Accounting_modules extends REST_Controller {	
	public $_database;
	public $server_host;
	public $server_user;
	public $server_pwd;
	public $fiscalDate;
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
	
	//@HOME PAGE
	//GET AP AR
	function apar_get() {		
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

	//GET FINANCIAL SNAPSHOT
	function financial_snapshot_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$today = date("Y-m-d");
		$asOftoday = date("Y-m-d", strtotime($today . "+1 days"));
		
		//INCOME (Begin FiscalDate To As Of)
		$income = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$income->select_sum("(cr - dr) / transactions.rate", "total");
		$income->where_in_related("account", "account_type_id", array(35,39));
		$income->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$income->where_related("transaction", "issued_date <", $asOftoday);
		$income->where_related("transaction", "is_recurring <>", 1);
		$income->where_related("transaction", "deleted <>", 1);
		$income->where("deleted <>", 1);
		$income->get();
		
		$totalIncome = floatval($income->total);
		//END INCOME


		//EXPENSE (Begin FiscalDate To As Of)
		$expense = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$expense->select_sum("(dr - cr) / transactions.rate", "total");
		$expense->where_in_related("account", "account_type_id", array(36,37,38,40,41,42));
		$expense->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$expense->where_related("transaction", "issued_date <", $asOftoday);
		$expense->where_related("transaction", "is_recurring <>", 1);
		$expense->where_related("transaction", "deleted <>", 1);
		$expense->where("deleted <>", 1);
		$expense->get();
		
		$totalExpense = floatval($expense->total);
		//END EXPENSE

		//ASSET (As Of)
		$asset = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$asset->select_sum("(dr - cr) / transactions.rate", "total");
		$asset->where_in_related("account", "account_type_id", array(10,11,12,13,14,15,16,17,18,19,20,21,22));
		$asset->where_related("transaction", "issued_date <", $asOftoday);
		$asset->where_related("transaction", "is_recurring <>", 1);
		$asset->where_related("transaction", "deleted <>", 1);
		$asset->where("deleted <>", 1);
		$asset->get();
		
		$totalAsset = floatval($asset->total);
		//END ASSET

		//LIABILITY (As Of)
		$liability = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$liability->select_sum("(cr - dr) / transactions.rate", "total");
		$liability->where_in_related("account", "account_type_id", array(23,24,25,26,27,28,29,30,31,32));
		$liability->where_related("transaction", "issued_date <", $asOftoday);
		$liability->where_related("transaction", "is_recurring <>", 1);
		$liability->where_related("transaction", "deleted <>", 1);
		$liability->where("deleted <>", 1);
		$liability->get();
		
		$totalLiability = floatval($liability->total);
		//END LIABILITY

		$data["results"][] = array(
			"id" 			=> 0,
			"income" 		=> $totalIncome,
			"expense" 		=> $totalExpense,				
		   	"net_income" 	=> $totalIncome - $totalExpense,
		   	"asset" 		=> $totalAsset,
		   	"liability" 	=> $totalLiability,
		   	"equity" 		=> $totalAsset - $totalLiability
		);
						
		$data["count"] = count($data["results"]);

		//Response Data		
		$this->response($data, 200);	
	}

	//GET RATIO ANALYSIS
	function ratio_analysis_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$today = date("Y-m-d");
		$asOftoday = date("Y-m-d", strtotime($today . "+1 days"));

		//INCOME (Begin FiscalDate To As Of)
		$income = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$income->select_sum("(cr - dr) / transactions.rate", "total");
		$income->where_in_related("account", "account_type_id", array(35,39));
		$income->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$income->where_related("transaction", "issued_date <", $asOftoday);
		$income->where_related("transaction", "is_recurring <>", 1);
		$income->where_related("transaction", "deleted <>", 1);
		$income->where("deleted <>", 1);		
		$income->get();

		$totalIncome = floatval($income->total);
		//END INCOME

		
		//EXPENSE (Begin FiscalDate To As Of)
		$expense = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$expense->select_sum("(dr - cr) / transactions.rate", "total");
		$expense->where_in_related("account", "account_type_id", array(36,37,38,40,41,42));
		$expense->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$expense->where_related("transaction", "issued_date <", $asOftoday);
		$expense->where_related("transaction", "is_recurring <>", 1);
		$expense->where_related("transaction", "deleted <>", 1);
		$expense->where("deleted <>", 1);
		$expense->get();
		
		$totalExpense = floatval($expense->total);
		//END EXPENSE


		//EXPENSE EBIT (Begin FiscalDate To As Of)
		$expenseEBIT = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$expenseEBIT->select_sum("(dr - cr) / transactions.rate", "total");
		$expenseEBIT->where_in_related("account", "account_type_id", array(36,37,38,40));
		$expenseEBIT->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$expenseEBIT->where_related("transaction", "issued_date <", $asOftoday);
		$expenseEBIT->where_related("transaction", "is_recurring <>", 1);
		$expenseEBIT->where_related("transaction", "deleted <>", 1);
		$expenseEBIT->where("deleted <>", 1);
		$expenseEBIT->get();
		
		$totalExpenseEBIT = floatval($expenseEBIT->total);
		//END EXPENSE EBIT


		//ASSET (As Of)
		$asset = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$asset->select_sum("(dr - cr) / transactions.rate", "total");
		$asset->where_in_related("account", "account_type_id", array(10,11,12,13,14,15,16,17,18,19,20,21,22));
		$asset->where_related("transaction", "issued_date <", $asOftoday);
		$asset->where_related("transaction", "is_recurring <>", 1);
		$asset->where_related("transaction", "deleted <>", 1);
		$asset->where("deleted <>", 1);
		$asset->get();
		
		$totalAsset = floatval($asset->total);
		//END ASSET


		//QUICK CURRENT ASSET (As Of)
		$quickCurrentAsset = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$quickCurrentAsset->select_sum("(dr - cr) / transactions.rate", "total");
		$quickCurrentAsset->where_in_related("account", "account_type_id", array(10,11,12,14,15));
		$quickCurrentAsset->where_related("transaction", "issued_date <", $asOftoday);
		$quickCurrentAsset->where_related("transaction", "is_recurring <>", 1);
		$quickCurrentAsset->where_related("transaction", "deleted <>", 1);
		$quickCurrentAsset->where("deleted <>", 1);
		$quickCurrentAsset->get();
		
		$totalQuickCurrentAsset = floatval($quickCurrentAsset->total);
		//END QUICK CURRENT ASSET


		//CURRENT ASSET (As Of)
		$currentAsset = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$currentAsset->select_sum("(dr - cr) / transactions.rate", "total");
		$currentAsset->where_in_related("account", "account_type_id", array(10,11,12,13,14,15));
		$currentAsset->where_related("transaction", "issued_date <", $asOftoday);
		$currentAsset->where_related("transaction", "is_recurring <>", 1);
		$currentAsset->where_related("transaction", "deleted <>", 1);
		$currentAsset->where("deleted <>", 1);
		$currentAsset->get();
		
		$totalCurrentAsset = floatval($currentAsset->total);
		//END CURRENT ASSET


		//CASH RATIO (As Of)
		$cashRatio = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$cashRatio->select_sum("(dr - cr) / transactions.rate", "total");
		$cashRatio->where_related("account", "account_type_id", 10);
		$cashRatio->where_related("transaction", "issued_date <", $asOftoday);
		$cashRatio->where_related("transaction", "is_recurring <>", 1);
		$cashRatio->where_related("transaction", "deleted <>", 1);
		$cashRatio->where("deleted <>", 1);		
		$cashRatio->get();

		$totalCashRatio = floatval($cashRatio->total);
		//END CASH RATIO


		//LIABILITY (As Of)
		$liability = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$liability->select_sum("(cr - dr) / transactions.rate", "total");
		$liability->where_in_related("account", "account_type_id", array(23,24,25,26,27,28,29,30,31,32));
		$liability->where_related("transaction", "issued_date <", $asOftoday);
		$liability->where_related("transaction", "is_recurring <>", 1);
		$liability->where_related("transaction", "deleted <>", 1);
		$liability->where("deleted <>", 1);		
		$liability->get();
		
		$totalLiability = floatval($liability->total);
		//END LIABILITY


		//CURRENT LIABILITY (As Of)
		$currentLiability = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$currentLiability->select_sum("(cr - dr) / transactions.rate", "total");
		$currentLiability->where_in_related("account", "account_type_id", array(23,24,25,26,27));
		$currentLiability->where_related("transaction", "issued_date <", $asOftoday);
		$currentLiability->where_related("transaction", "is_recurring <>", 1);
		$currentLiability->where_related("transaction", "deleted <>", 1);
		$currentLiability->where("deleted <>", 1);
		$currentLiability->get();
		
		$totalCurrentLiability = floatval($currentLiability->total);
		//END CURRENT LIABILITY		


		//COGS (Begin FiscalDate To As Of)
		$cogs = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$cogs->select_sum("(dr - cr) / transactions.rate", "total");
		$cogs->where_related("account", "account_type_id", 36);
		$cogs->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$cogs->where_related("transaction", "issued_date <", $asOftoday);
		$cogs->where_related("transaction", "is_recurring <>", 1);
		$cogs->where_related("transaction", "deleted <>", 1);
		$cogs->where("deleted <>", 1);
		$cogs->get();
		
		$totalCOGS = floatval($cogs->total);
		//END COGS


		//INVENTORY (As Of)
		$inventory = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$inventory->select_sum("(dr - cr) / transactions.rate", "total");
		$inventory->where_related("account", "account_type_id", 13);
		$inventory->where_related("transaction", "issued_date <", $asOftoday);
		$inventory->where_related("transaction", "is_recurring <>", 1);
		$inventory->where_related("transaction", "deleted <>", 1);
		$inventory->where("deleted <>", 1);		
		$inventory->get();
		
		$totalInventory = floatval($inventory->total);
		//END INVENTORY


		//AR (As Of)
		$ar = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$ar->select_sum("(dr - cr) / transactions.rate", "total");
		$ar->where_related("account", "account_type_id", 12);
		$ar->where_related("transaction", "issued_date <", $asOftoday);
		$ar->where_related("transaction", "is_recurring <>", 1);
		$ar->where_related("transaction", "deleted <>", 1);
		$ar->where("deleted <>", 1);
		$ar->get();
		
		$totalAR = floatval($ar->total);
		//END AR


		//AP (As Of)
		$ap = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$ap->select_sum("(cr - dr) / transactions.rate", "total");
		$ap->where_related("account", "account_type_id", 23);
		$ap->where_related("transaction", "issued_date <", $asOftoday);
		$ap->where_related("transaction", "is_recurring <>", 1);
		$ap->where_related("transaction", "deleted <>", 1);
		$ap->where("deleted <>", 1);
		$ap->get();
		
		$totalAP = floatval($ap->total);
		//END AP


		//SALE (Begin FiscalDate To As Of)
		$sale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
		$sale->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
		$sale->select_sum("amount / rate", "total");
		$sale->where("issued_date >=", $this->startFiscalDate);
		$sale->where("issued_date <", $asOftoday);
		$sale->where("is_recurring <>", 1);
		$sale->where("deleted <>", 1);
		$sale->get();

		$saleReturns = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
		$saleReturns->where_in("type", array("Sale_Return","Cash_Refund"));
		$saleReturns->select_sum("amount / rate", "total");
		$saleReturns->where("issued_date >=", $this->startFiscalDate);
		$saleReturns->where("issued_date <", $asOftoday);
		$saleReturns->where("is_recurring <>", 1);
		$saleReturns->where("deleted <>", 1);
		$saleReturns->get();
		
		//Sum Sale					
		$totalSale = floatval($sale->total) - floatval($saleReturns->total);
		//END SALE


		//CREDIT SALE (Begin FiscalDate To As Of)
		$creditSale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$creditSale->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice"));
		$creditSale->select_sum("amount / rate", "total");
		$creditSale->where("issued_date >=", $this->startFiscalDate);
		$creditSale->where("issued_date <", $asOftoday);
		$creditSale->where("is_recurring <>", 1);
		$creditSale->where("deleted <>", 1);
		$creditSale->get();

		$creditSaleReturns = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$creditSaleReturns->where("type", "Sale_Return");
		$creditSaleReturns->select_sum("amount / rate", "total");
		$creditSaleReturns->where("issued_date >=", $this->startFiscalDate);
		$creditSaleReturns->where("issued_date <", $asOftoday);
		$creditSaleReturns->where("is_recurring <>", 1);
		$creditSaleReturns->where("deleted <>", 1);
		$creditSaleReturns->get();
		
		//Sum Sale					
		$totalCreditSale = floatval($creditSale->total) - floatval($creditSaleReturns->total);
		//END CREDIT SALE


		//CREDIT PURCHASE (Begin FiscalDate To As Of)
		$creditPurchase = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$creditPurchase->where("type", "Credit_Purchase");
		$creditPurchase->select_sum("amount / rate", "total");
		$creditPurchase->where("issued_date >=", $this->startFiscalDate);
		$creditPurchase->where("issued_date <", $asOftoday);
		$creditPurchase->where("is_recurring <>", 1);
		$creditPurchase->where("deleted <>", 1);
		$creditPurchase->get_iterated();

		$creditPurchaseReturns = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$creditPurchaseReturns->where("type", "Purchase_Return");
		$creditPurchaseReturns->select_sum("amount / rate", "total");
		$creditPurchaseReturns->where("issued_date >=", $this->startFiscalDate);
		$creditPurchaseReturns->where("issued_date <", $asOftoday);
		$creditPurchaseReturns->where("is_recurring <>", 1);
		$creditPurchaseReturns->where("deleted <>", 1);
		$creditPurchaseReturns->get();
		
		//Sum Purchase					
		$totalCreditPurchase = floatval($creditPurchase->total) - floatval($creditPurchaseReturns->total);
		//END CREDIT PURCHASE


		//TRANSACTION RECORDED (Begin FiscalDate To As Of)
		$txnRecorded = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$txnRecorded->where("is_journal", 1);
		$txnRecorded->where("issued_date >=", $this->startFiscalDate);
		$txnRecorded->where("issued_date <",$asOftoday);
		$txnRecorded->where("is_recurring <>", 1);
		$txnRecorded->where("deleted <>", 1);
		
		$totalTxnRecorded = $txnRecorded->count();
		//END TRANSACTION RECORDED

		$quickRatio = 0;
		$returnOnAsset = 0;
		$currentRatio = 0;
		$cashRatio = 0;
		if($totalCurrentLiability>0){
			$quickRatio = $totalQuickCurrentAsset / $totalCurrentLiability;
			$returnOnAsset = $totalSale / ($totalAsset - $totalCurrentLiability);
			$currentRatio = $totalCurrentAsset / $totalCurrentLiability;				
		   	$cashRatio = $totalCashRatio / $totalCurrentLiability;
		}		
		
		$wcSale = 0;
		$grossProfitMargin = 0;
		$ebit = 0;
		if($totalSale>0){			
			$wcSale = ($totalCurrentAsset - $totalCurrentLiability) / $totalSale;
			$grossProfitMargin = ($totalSale - $totalCOGS) / $totalSale;
			$ebit = ($totalIncome - $totalExpenseEBIT) / $totalSale;
		}

		//Days
		$date1 = new DateTime($this->startFiscalDate);
		$date2 = new DateTime($asOftoday);
		$days = $date2->diff($date1)->format("%a");

		$arCollectionPeriod = 0;
		if($totalCreditSale>0){
			$arCollectionPeriod = ($totalAR / $totalCreditSale) * $days;
		}

		$apPaymentPeriod = 0;
		if($totalCreditPurchase>0){
			$apPaymentPeriod = ($totalAP / $totalCreditPurchase) * $days;
		}

		$inventoryTurnOver = 0;
		if($totalCOGS>0){
			$inventoryTurnOver = ($totalInventory / $totalCOGS) * $days;
		}
		
		$data["results"][] = array(
			"id" 					=> 0,
			"income" 				=> $totalIncome,
			"expense" 				=> $totalExpense,				
		   	"net_income" 			=> $totalIncome - $totalExpense,

		   	"asset" 				=> $totalAsset,
		   	"liability" 			=> $totalLiability,
		   	"equity" 				=> $totalAsset - $totalLiability,

			"quickRatio" 			=> $quickRatio,
			"currentRatio" 			=> $currentRatio,				
		   	"cashRatio" 			=> $cashRatio,

		   	"wcSale"				=> $wcSale,
		   	"grossProfitMargin"		=> $grossProfitMargin,
		   	"profitMargin" 			=> $ebit,
		   	"returnOnAsset" 		=> $returnOnAsset,
		   	"roce" 					=> $ebit * $returnOnAsset,

		   	"arCollectionPeriod" 	=> $arCollectionPeriod,
		   	"apPaymentPeriod" 		=> $apPaymentPeriod,
		   	"inventoryTurnOver" 	=> $inventoryTurnOver,
		   	"ccc" 					=> ($arCollectionPeriod + $inventoryTurnOver) - $apPaymentPeriod,
		   
		   	"txnRecorded" 			=> $totalTxnRecorded,
		   	"days" 					=> $days
		);
						
		$data["count"] = count($data["results"]);

		//Response Data		
		$this->response($data, 200);	
	}

	//GET JOURNAL
	function journal_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
		
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
		
		$obj->include_related("transaction", array("type", "number", "issued_date", "memo","rate"));
		$obj->include_related("account", array("number","name"));
		$obj->include_related("contact", array("abbr","number","name"));
		$obj->where_related("transaction", "is_journal", 1);
		$obj->where_related("transaction", "is_recurring <>", 1);		
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("dr", "desc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			$totalDr = 0;
			$totalCr = 0;
			foreach ($obj as $value) {				
				$totalDr += floatval($value->dr) / floatval($value->transaction_rate);
				$totalCr += floatval($value->cr) / floatval($value->transaction_rate);

				if(isset($objList[$value->transaction_id])){
					$objList[$value->transaction_id]["line"][] = array(
						"id" 			=> $value->id,
						"account_id" 	=> $value->account_id,
						"description" 	=> $value->description,
						"reference_no" 	=> $value->reference_no,
						"segments" 		=> [],
						"dr" 			=> floatval($value->dr),
						"cr" 			=> floatval($value->cr),
						"locale" 		=> $value->locale,
						"account" 		=> $value->account_number . " - " . $value->account_name,
						"contact" 		=> isset($value->contact_name) ? $value->contact_name : ""
					);
				}else{
					$objList[$value->transaction_id]["id"] 			= $value->transaction_id;
					$objList[$value->transaction_id]["type"] 		= $value->transaction_type;
					$objList[$value->transaction_id]["number"] 		= $value->transaction_number;
					$objList[$value->transaction_id]["issued_date"] = $value->transaction_issued_date;
					$objList[$value->transaction_id]["memo"] 		= $value->transaction_memo;
					$objList[$value->transaction_id]["rate"] 		= $value->transaction_rate;
					$objList[$value->transaction_id]["line"][] 		= array(
						"id" 			=> $value->id,
						"account_id" 	=> $value->account_id,
						"description" 	=> $value->description,
						"reference_no" 	=> $value->reference_no,
						"segments" 		=> [],
						"dr" 			=> floatval($value->dr),
						"cr" 			=> floatval($value->cr),
						"locale" 		=> $value->locale,
						"account" 		=> $value->account_number . " - " .$value->account_name,
						"contact" 		=> isset($value->contact_name) ? $value->contact_name : ""
					);			
				}
			}			

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}

			$data["dr"] = $totalDr;
			$data["cr"] = $totalCr;
			$data["count"] = count($data["results"]);			
		}		

		//Response Data		
		$this->response($data, 200);	
	}
	function journal_by_segment_get() {		
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
	    	foreach ($filter['filters'] as $value) {
	    		if(isset($value['operator'])) {
	    			if($value['operator']=="segments") {
						$obj->where_in_related("journal_line/segmentitem", "id", $value['value']);
					}else{
						$obj->{$value['operator']}($value['field'], $value['value']);
					}
				} else {
					$obj->where($value["field"], $value["value"]);
				}
			}
		}

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
		
		$objList = [];
		$totalDr = 0;
		$totalCr = 0;

		if($obj->exists()){			
			foreach ($obj as $value) {
				$journalLines = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$journalLines->where("transaction_id", $value->id);
				$journalLines->include_related("account", array("number","name"));
				$journalLines->include_related("contact", array("abbr","number","name"));
				$journalLines->where("deleted <>", 1);
				$journalLines->order_by("dr", "desc");
				$journalLines->get_iterated();

				foreach ($journalLines as $val) {
					$totalDr += floatval($val->dr) / floatval($value->rate);
					$totalCr += floatval($val->cr) / floatval($value->rate);
				
					if(isset($objList[$value->id])){
						$objList[$value->id]["line"][] = array(
							"id" 			=> $val->id,
							"description" 	=> $val->description,
							"reference_no" 	=> $val->reference_no,
							"segments" 		=> $val->segmentitem->get_raw()->result(),
							"dr" 			=> floatval($val->dr),
							"cr" 			=> floatval($val->cr),
							"locale" 		=> $value->locale,
							"account" 		=> $val->account_number ." ". $val->account_name,
							"contact" 		=> $val->contact_name
						);
					}else{
						$objList[$value->id]["id"] = $value->id;
						$objList[$value->id]["type"] = $value->type;
						$objList[$value->id]["number"] = $value->number;
						$objList[$value->id]["issued_date"] = $value->issued_date;
						$objList[$value->id]["memo"] = $value->memo;
						$objList[$value->id]["rate"] = $value->rate;
						$objList[$value->id]["line"][] = array(
							"id" 			=> $val->id,
							"description" 	=> $val->description,
							"reference_no" 	=> $val->reference_no,
							"segments" 		=> $val->segmentitem->get_raw()->result(),
							"dr" 			=> floatval($val->dr),
							"cr" 			=> floatval($val->cr),
							"locale" 		=> $value->locale,
							"account" 		=> $val->account_number ." ". $val->account_name,
							"contact" 		=> $val->contact_name
						);
					}
				}
			}
		}

		foreach ($objList as $value) {
			$data["results"][] = $value;
		}

		$data["dr"] = $totalDr;
		$data["cr"] = $totalCr;

		//Response Data		
		$this->response($data, 200);	
	}

	//GET GENERAL LEDGER
	function general_ledger_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$sdate = "";

		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$plItems = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$balanceForwards = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		//Sort
		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				if(isset($value['operator'])){
					$obj->{$value['operator']}($value["field"], $value["dir"]);
					$plItems->{$value['operator']}($value["field"], $value["dir"]);
					$balanceForwards->{$value['operator']}($value["field"], $value["dir"]);
				}else{
					$obj->order_by($value["field"], $value["dir"]);
					$plItems->order_by($value["field"], $value["dir"]);
					$balanceForwards->order_by($value["field"], $value["dir"]);
				}
			}
		}
		
		//Filter		
		if(!empty($filter) && isset($filter)){			
	    	foreach ($filter["filters"] as $value) {
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);
	    			$plItems->{$value['operator']}($value['field'], $value['value']);

	    			//Get start date
	    			if($value['field']=="issued_date >=" || $value['field']=="issued_date"){
	    				$sdate = $value['value'];
	    			}
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    			$plItems->where($value['field'], $value['value']);
	    		}
			}
		}
		
		//Balance Sheet Items 10-34 balance as_of start date
		$obj->include_related("transaction", array("type", "number", "issued_date", "memo", "rate"));
		$obj->include_related("contact", array("abbr","number","name"));
		$obj->include_related("account", array("number","name"));
		$obj->include_related("account/account_type", array("name","nature"));
		// $obj->where_related("transaction", "is_journal", 1);
		$obj->where_in_related("account", "account_type_id", [10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34]);
		$obj->where_related("transaction", "is_recurring <>", 1);		
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where("deleted <>", 1);
		$obj->get_iterated();
		
		$objList = [];
		if($obj->exists()){
			foreach ($obj as $key => $value) {
				$amount = 0;
				$dr = floatval($value->dr) / floatval($value->transaction_rate);
				$cr = floatval($value->cr) / floatval($value->transaction_rate);

				if($value->account_account_type_nature=="Dr"){
					$amount = (floatval($value->dr) - floatval($value->cr)) / floatval($value->transaction_rate);				
				}else{
					$amount = (floatval($value->cr) - floatval($value->dr)) / floatval($value->transaction_rate);					
				}

				$description = $value->description;
				if($description==""){
					$description = $value->transaction_memo;
				}

				if(isset($objList[$value->account_id])){
					$objList[$value->account_id]["line"][] = array(
						"id" 				=> $value->transaction_id,
						"type" 				=> $value->transaction_type,
						"number" 			=> $value->transaction_number,
						"issued_date" 		=> $value->transaction_issued_date,
						"memo" 				=> $description,
						"dr" 				=> $dr,
						"cr" 				=> $cr,
						"amount" 			=> $amount,
						"contact" 			=> isset($value->contact_name) ? $value->contact_name : ""
					);
				}else{
					$objList[$value->account_id]["id"] 				= $value->account_id;
					$objList[$value->account_id]["name"] 			= $value->account_number ." - ". $value->account_name;
					$objList[$value->account_id]["balance_forward"] = 0;
					$objList[$value->account_id]["line"][] 			= array(
						"id" 				=> $value->transaction_id,
						"type" 				=> $value->transaction_type,
						"number" 			=> $value->transaction_number,
						"issued_date" 		=> $value->transaction_issued_date,
						"memo" 				=> $description,
						"dr" 				=> $dr,
						"cr" 				=> $cr,
						"amount" 			=> $amount,
						"contact" 			=> isset($value->contact_name) ? $value->contact_name : ""
					);			
				}
			}
		}
		//End Balance Sheet Items

		//Balance Forward for BS Items
		if($sdate <> ""){					
			$balanceForwards->select("account_id");
			$balanceForwards->include_related("account", array("number","name"));
			$balanceForwards->include_related("account/account_type", array("name","nature"));
			$balanceForwards->select_sum("(dr - cr) / transactions.rate", "total");
			$balanceForwards->where_related("transaction", "issued_date <", $sdate);
			$balanceForwards->where_in_related("account", "account_type_id", [10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34]);
			$balanceForwards->where_related("transaction", "is_recurring <>", 1);
			$balanceForwards->where_related("transaction", "deleted <>", 1);
			$balanceForwards->where("deleted <>", 1);
			$balanceForwards->group_by("account_id");
			$balanceForwards->get();

			foreach ($balanceForwards as $value) {
				if($value->account_account_type_nature=="Dr"){
					$bfAmount = floatval($value->total);
				}else{
					$bfAmount = floatval($value->total) * -1;
				}

				if(isset($objList[$value->account_id])){
					$objList[$value->account_id]["balance_forward"] = $bfAmount;
				}else{
					$objList[$value->account_id]["id"] 				= $value->account_id;
					$objList[$value->account_id]["name"] 			= $value->account_number ." - ". $value->account_name;
					$objList[$value->account_id]["balance_forward"] = $bfAmount;
					$objList[$value->account_id]["line"] 			= [];
				}
			}
		}

		//PL Items 35-43 balance start FD to start date
		$plItems->include_related("transaction", array("type", "number", "issued_date", "memo", "rate"));
		$plItems->include_related("contact", array("abbr","number","name"));
		$plItems->include_related("account", array("number","name"));
		$plItems->include_related("account/account_type", array("name","nature"));
		$plItems->where_in_related("account", "account_type_id", [35,36,37,38,39,40,41,42,43]);
		$plItems->where_related("transaction", "is_recurring <>", 1);		
		$plItems->where_related("transaction", "deleted <>", 1);
		$plItems->where("deleted <>", 1);
		$plItems->get_iterated();
		
		if($plItems->exists()){
			foreach ($plItems as $value) {
				$amount = 0;
				$dr = floatval($value->dr) / floatval($value->transaction_rate);
				$cr = floatval($value->cr) / floatval($value->transaction_rate);

				if($value->account_account_type_nature=="Dr"){
					$amount = (floatval($value->dr) - floatval($value->cr)) / floatval($value->transaction_rate);				
				}else{
					$amount = (floatval($value->cr) - floatval($value->dr)) / floatval($value->transaction_rate);					
				}

				$description = $value->description;
				if($description==""){
					$description = $value->transaction_memo;
				}

				if(isset($objList[$value->account_id])){
					$objList[$value->account_id]["line"][] = array(
						"id" 				=> $value->transaction_id,
						"type" 				=> $value->transaction_type,
						"number" 			=> $value->transaction_number,
						"issued_date" 		=> $value->transaction_issued_date,
						"memo" 				=> $description,
						"dr" 				=> $dr,
						"cr" 				=> $cr,
						"amount" 			=> $amount,
						"contact" 			=> isset($value->contact_name) ? $value->contact_name : ""
					);
				}else{
					//Balance Forward
					$balance_forward = 0;
					$bf = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
					$bf->select_sum("dr - cr", "total");
					$bf->where_related("transaction", "issued_date >", $this->startFiscalDate);
					$bf->where_related("transaction", "issued_date <", $value->transaction_issued_date);
					$bf->where("account_id", $value->account_id);
					$bf->where_related("transaction", "is_recurring <>", 1);
					$bf->where_related("transaction", "deleted <>", 1);
					$bf->where("deleted <>", 1);
					$bf->get();
					
					if($value->account_account_type_nature=="Dr"){
						$balance_forward = floatval($bf->total);
					}else{
						$balance_forward = floatval($bf->total) * -1;
					}

					$objList[$value->account_id]["id"] 				= $value->account_id;
					$objList[$value->account_id]["name"] 			= $value->account_number ." - ". $value->account_name;
					$objList[$value->account_id]["balance_forward"] = $balance_forward;
					$objList[$value->account_id]["line"][] 			= array(
						"id" 				=> $value->transaction_id,
						"type" 				=> $value->transaction_type,
						"number" 			=> $value->transaction_number,
						"issued_date" 		=> $value->transaction_issued_date,
						"memo" 				=> $description,
						"dr" 				=> $dr,
						"cr" 				=> $cr,
						"amount" 			=> $amount,
						"contact" 			=> isset($value->contact_name) ? $value->contact_name : ""
					);
				}
			}
		}
		//End PL Items

		foreach ($objList as $value) {
			$data["results"][] = $value;
		}

		$data["count"] = count($data["results"]);

		//Response Data		
		$this->response($data, 200);	
	}
	function general_ledger_new_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$asOf = date("Y-m-d");
		$fromDate = "";
		$plIdList = [35,36,37,38,39,40,41,42,43];

		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		
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
	    	foreach ($filter["filters"] as $value) {
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);

	    			//Get start date
	    			if($value['field']=="issued_date >=" || $value['field']=="issued_date"){
	    				$fromDate = $value['value'];
	    			}
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Fiscal Date
		$asOfYear = date("Y",strtotime($asOf));
		$fdate = $asOfYear ."-". $this->fiscalDate;
		if($asOf > $fdate){
			$startFD 	= $asOfYear ."-". $this->fiscalDate;
			$endFD 		= intval($asOfYear)+1 ."-". $this->fiscalDate;
		}else{
			$startFD 	= intval($asOfYear)-1 ."-". $this->fiscalDate;
			$endFD 		= $asOfYear ."-". $this->fiscalDate;
		}

		//Add 1 day
		$asOf = date("Y-m-d", strtotime($asOf . "+1 days"));
		$startFD = date("Y-m-d", strtotime($startFD . "+1 days"));
		
		$obj->include_related("transaction", array("type", "number", "issued_date", "memo", "rate"));
		$obj->include_related("contact", array("abbr","number","name"));
		$obj->include_related("account", array("number","name","account_type_id"));
		$obj->include_related("account/account_type", array("name","nature"));
		$obj->where_related("transaction", "is_journal", 1);
		// $obj->where_in_related("account", "account_type_id", [10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43]);
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->order_by("account_id", "asc");
		$obj->where("deleted <>", 1);
		$obj->get_iterated();

		// //Results
		// if($page && $limit){
		// 	$obj->get_paged_iterated($page, $limit);
		// 	$data["count"] = $obj->paged->total_rows;
		// }else{
		// 	$obj->get_iterated();
		// 	$data["count"] = $obj->result_count();
		// }
		
		$objList = [];
		if($obj->exists()){
			foreach ($obj as $value) {
				if($value->account_account_type_nature=="Dr"){
					$dr = floatval($value->dr) / floatval($value->transaction_rate);
					$cr = floatval($value->cr) / floatval($value->transaction_rate) * -1;
				}else{
					$dr = floatval($value->dr) / floatval($value->transaction_rate) * -1;
					$cr = floatval($value->cr) / floatval($value->transaction_rate);
				}

				$amount = $dr + $cr;

				$description = $value->description;
				if($description==""){
					$description = $value->transaction_memo;
				}

				if(isset($objList[$value->account_id])){
					$objList[$value->account_id]["line"][] = array(
						"id" 				=> $value->transaction_id,
						"type" 				=> $value->transaction_type,
						"number" 			=> $value->transaction_number,
						"issued_date" 		=> $value->transaction_issued_date,
						"memo" 				=> $description,
						"dr" 				=> $dr,
						"cr" 				=> $cr,
						"amount" 			=> $amount,
						"contact" 			=> isset($value->contact_name) ? $value->contact_name : ""
					);
				}else{
					$bfAmount = 0;
					if($fromDate <> ""){
						$balanceForwards = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$balanceForwards->select_sum("(dr - cr) / transactions.rate", "total");
						$balanceForwards->include_related("account/account_type", array("name","nature"));
						$balanceForwards->where("account_id", $value->account_id);

						if(array_key_exists($value->account_account_type_id,$plIdList)){
							//PL Items 35-43 BALANCE FORWARD (START FD) to (FROM DATE)
							$balanceForwards->where_related("transaction", "issued_date >=", $startFD);
							$balanceForwards->where_related("transaction", "issued_date <", $fromDate);
						}else{
							//Balance Sheet Items 10-34 BALANCE FORWARD (AS OF) to (FROM DATE)
							$balanceForwards->where_related("transaction", "issued_date <", $fromDate);
						}

						$balanceForwards->where_related("transaction", "is_recurring <>", 1);
						$balanceForwards->where_related("transaction", "deleted <>", 1);
						$balanceForwards->where("deleted <>", 1);
						$balanceForwards->get();
						
						$bfAmount = floatval($balanceForwards->total);
						if($value->account_account_type_nature=="Cr"){
							$bfAmount = floatval($balanceForwards->total) * -1;
						}
					}

					$objList[$value->account_id]["id"] 				= $value->account_id;
					$objList[$value->account_id]["name"] 			= $value->account_number ." - ". $value->account_name;
					$objList[$value->account_id]["nature"] 			= $value->account_account_type_nature;
					$objList[$value->account_id]["balance_forward"] = $bfAmount;
					$objList[$value->account_id]["line"][] 			= array(
						"id" 				=> $value->transaction_id,
						"type" 				=> $value->transaction_type,
						"number" 			=> $value->transaction_number,
						"issued_date" 		=> $value->transaction_issued_date,
						"memo" 				=> $description,
						"dr" 				=> $dr,
						"cr" 				=> $cr,
						"amount" 			=> $amount,
						"contact" 			=> isset($value->contact_name) ? $value->contact_name : ""
					);			
				}
			}
		}
		//End Balance Sheet Items

		foreach ($objList as $value) {
			$data["results"][] = $value;
		}

		$data["count"] = count($data["results"]);

		//Response Data		
		$this->response($data, 200);	
	}
	function general_ledger_by_segment_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		
		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		
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

		$obj->include_related("transaction", array("number","type","issued_date","memo","rate"));
		$obj->include_related("account", array("number","name"));
		$obj->include_related("account/account_type", array("nature"));
		$obj->include_related("transaction/contact", array("name"));
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where("deleted <>", 1);		
		$obj->get_iterated();
		
		$objList = [];
		$totalAmount = 0;
		$totalBalance = 0;

		if($obj->exists()){	
			foreach ($obj as $value) {
				$amount = 0;
				if($value->account_account_type_nature=="Dr"){
					$amount = (floatval($value->dr) - floatval($value->cr)) / floatval($value->transaction_rate);				
				}else{
					$amount = (floatval($value->cr) - floatval($value->dr)) / floatval($value->transaction_rate);					
				}

				$totalAmount += $amount;
				$totalBalance += $amount;

				if(isset($objList[$value->account_id])){
					$objList[$value->account_id]["line"][] = array(
						"id" 				=> $value->transaction_id,
						"type" 				=> $value->transaction_type,
						"number" 			=> $value->transaction_number,
						"issued_date" 		=> $value->transaction_issued_date,
						"memo" 				=> $value->transaction_memo,
						"name" 				=> $value->transaction_contact_name,
						"segments" 			=> $value->segmentitem->get_raw()->result(),
						"amount" 			=> $amount
					);
				}else{
					//Balance Forward
					$balance_forward = 0;
					$bf = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
					$bf->include_related("transaction", array("rate"));
					$bf->include_related("account/account_type", array("nature"));
					$bf->where_related("transaction", "issued_date <", $value->transaction_issued_date);
					$bf->where("account_id", $value->account_id);
					$bf->where_related("transaction", "is_recurring <>", 1);		
					$bf->where_related("transaction", "deleted <>", 1);
					$bf->where("deleted <>", 1);
					$bf->get_iterated();

					foreach ($bf as $row) {
						if($row->account_account_type_nature=="Dr"){
							$balance_forward += (floatval($row->dr) - floatval($row->cr)) / floatval($row->transaction_rate);				
						}else{
							$balance_forward += (floatval($row->cr) - floatval($row->dr)) / floatval($row->transaction_rate);					
						}
					}

					$totalBalance += $balance_forward;
					
					$objList[$value->account_id]["id"] 				= $value->account_id;
					$objList[$value->account_id]["name"] 			= $value->account_number ." ". $value->account_name;
					$objList[$value->account_id]["balance_forward"] = $balance_forward;
					$objList[$value->account_id]["line"][] = array(
						"id" 				=> $value->transaction_id,
						"type" 				=> $value->transaction_type,
						"number" 			=> $value->transaction_number,
						"issued_date" 		=> $value->transaction_issued_date,
						"memo" 				=> $value->transaction_memo,
						"name" 				=> $value->transaction_contact_name,
						"segments" 			=> $value->segmentitem->get_raw()->result(),
						"amount" 			=> $amount
					);
				}
			}
		}

		foreach ($objList as $value) {				
			$data["results"][] = $value;
		}
		
		$data["totalBalance"] = $totalBalance;
		$data["count"] = count($data["results"]);

		//Response Data		
		$this->response($data, 200);	
	}

	//GET TRIAL BALANCE
	function trial_balance_old_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		
		$asOf = date("Y-m-d");
		if(!empty($filter) && isset($filter)){			
	    	foreach ($filter["filters"] as $value) {
	    		$asOf = $value["value"];
			}									 			
		}				

		//Fiscal Date
		$asOfYear = date("Y",strtotime($asOf));
		$fdate = $asOfYear ."-". $this->fiscalDate;
		if($asOf > $fdate){
			$startDate 	= $asOfYear ."-". $this->fiscalDate;
			$endDate 	= intval($asOfYear)+1 ."-". $this->fiscalDate;
		}else{
			$startDate 	= intval($asOfYear)-1 ."-". $this->fiscalDate;
			$endDate 	= $asOfYear ."-". $this->fiscalDate;
		}

		//Add 1 day
		$asOf = date("Y-m-d", strtotime($asOf . "+1 days"));
		$startDate = date("Y-m-d", strtotime($startDate . "+1 days"));


		//BALANCE SHEET (As Of)
		$balanceSheet = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$balanceSheet->include_related("transaction", array("rate"));
		$balanceSheet->include_related("account", array("number","name"));
		$balanceSheet->include_related("account/account_type", array("name","nature"));		
		$balanceSheet->where_related("account", "account_type_id >=", 10);
		$balanceSheet->where_related("account", "account_type_id <=", 33);
		$balanceSheet->where_related("transaction", "issued_date <", $asOf);
		$balanceSheet->where_related("transaction", "is_recurring <>", 1);
		$balanceSheet->where_related("transaction", "deleted <>", 1);
		// $balanceSheet->where_related("transaction", "is_journal", 1);
		$balanceSheet->where("deleted <>", 1);
		$balanceSheet->get_iterated();
		
		//Sum Dr and Cr					
		$accountList = [];
		foreach ($balanceSheet as $value) {
			$dr = 0;
			$cr = 0;
			if($value->dr!==0){
				$dr = floatval($value->dr) / floatval($value->transaction_rate);
			}
			if($value->cr!==0){
				$cr = floatval($value->cr) / floatval($value->transaction_rate);
			}

			//Group
			if(isset($accountList[$value->account_id])){					
				$accountList[$value->account_id]["dr"] 		+= $dr;
				$accountList[$value->account_id]["cr"] 		+= $cr;
			} else {
				$accountList[$value->account_id]["number"] 	= $value->account_number;
				$accountList[$value->account_id]["name"] 	= $value->account_name;
				$accountList[$value->account_id]["type"] 	= $value->account_account_type_name;
				$accountList[$value->account_id]["nature"] 	= $value->account_account_type_nature;
				$accountList[$value->account_id]["dr"] 		= $dr;
				$accountList[$value->account_id]["cr"] 		= $cr;
			}			
		}
		
		//Calculate by account nature
		foreach ($accountList as $key => $value) {
			if($value["nature"]=="Dr"){
				$dr = $value["dr"] - $value["cr"];
				$cr = 0;
			}else{
				$dr = 0;
				$cr = $value["cr"] - $value["dr"];					
			}

			$data["results"][] = array(
				"id" 			=> $key,
				"number" 		=> $value["number"],
				"name" 			=> $value["name"],				
			   	"type" 			=> $value["type"],
			   	"dr" 			=> $dr,
			   	"cr" 			=> $cr
			);
		}
		//END BALANCE SHEET


		//CURRENT PROFIT AND LOSS (startFiscalDate to As Of)
		$currPL = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$currPL->include_related("transaction", array("rate"));
		$currPL->include_related("account", array("number","name"));
		$currPL->include_related("account/account_type", array("name","nature"));		
		$currPL->where_related("account", "account_type_id >=", 35);
		$currPL->where_related("account", "account_type_id <=", 43);
		$currPL->where_related("transaction", "issued_date >=", $startDate);
		$currPL->where_related("transaction", "issued_date <", $asOf);
		$currPL->where_related("transaction", "is_recurring <>", 1);
		$currPL->where_related("transaction", "deleted <>", 1);		
		$currPL->where("deleted <>", 1);
		$currPL->get_iterated();

		//Sum dr and cr					
		$accountList = [];		
		foreach ($currPL as $value) {
			$dr = 0;
			$cr = 0;
			if($value->dr!==0){
				$dr = floatval($value->dr) / floatval($value->transaction_rate);
			}
			if($value->cr!==0){
				$cr = floatval($value->cr) / floatval($value->transaction_rate);
			}			

			//Group
			if(isset($accountList[$value->account_id])){					
				$accountList[$value->account_id]["dr"] 		+= $dr;
				$accountList[$value->account_id]["cr"] 		+= $cr;
			} else {
				$accountList[$value->account_id]["number"] 	= $value->account_number;
				$accountList[$value->account_id]["name"] 	= $value->account_name;
				$accountList[$value->account_id]["type"] 	= $value->account_account_type_name;
				$accountList[$value->account_id]["nature"] 	= $value->account_account_type_nature;
				$accountList[$value->account_id]["dr"] 		= $dr;
				$accountList[$value->account_id]["cr"] 		= $cr;
			}			
		}		
		
		//Calculate by account nature
		foreach ($accountList as $key => $value) {
			if($value["nature"]=="Dr"){
				$dr = $value["dr"] - $value["cr"];
				$cr = 0;
			}else{
				$dr = 0;
				$cr = $value["cr"] - $value["dr"];					
			}

			$data["results"][] = array(
				"id" 			=> $key,
				"number" 		=> $value["number"],
				"name" 			=> $value["name"],				
			   	"type" 			=> $value["type"],
			   	"dr" 			=> $dr,
			   	"cr" 			=> $cr
			);
		}
		//END CURRENT PROFIT AND LOSS


		//RETAINED EARNING = Profit Loss + Retained Earning
		//PREVIOUSE PROFIT AND LOSS (From Begining to startFiscalDate) Cr - Dr
		$prevPL = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);				
		$prevPL->include_related("transaction", array("rate"));
		$prevPL->where_related("account", "account_type_id >=", 35);
		$prevPL->where_related("account", "account_type_id <=", 43);
		$prevPL->where_related("transaction", "issued_date <", $startDate);
		$prevPL->where_related("transaction", "is_recurring <>", 1);
		$prevPL->where_related("transaction", "deleted <>", 1);		
		$prevPL->where("deleted <>", 1);
		$prevPL->get_iterated();

		//Sum dr and cr
		$sumDr = 0;
		$sumCr = 0;		
		foreach ($prevPL as $value) {			
			if($value->dr!==0){
				$sumDr += floatval($value->dr) / floatval($value->transaction_rate);
			}
			if($value->cr!==0){
				$sumCr += floatval($value->cr) / floatval($value->transaction_rate);
			}		
		}
		$prevPLAmount = $sumCr - $sumDr;
		//END PREVIOUSE PROFIT AND LOSS
		

		//RETAINED EARNING (As Of)
		$retainEarning = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$retainEarning->include_related("transaction", array("rate"));
		$retainEarning->where("account_id", 70);
		$retainEarning->where_related("transaction", "issued_date <", $asOf);		
		$retainEarning->where_related("transaction", "is_recurring <>", 1);
		$retainEarning->where_related("transaction", "deleted <>", 1);		
		$retainEarning->where("deleted <>", 1);
		$retainEarning->get_iterated();
		
		//Sum dr and cr
		$retainEarningId = 0;
		$retainEarningNumber = "";
		$retainEarningName = "";
		$retainEarningType = "";
		$sumDr = 0;
		$sumCr = 0;

		//Get Retain Earning Account
		$retainEarningAccount = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$retainEarningAccount->include_related("account_type", array("name","nature"));
		$retainEarningAccount->get_by_id(70);

		$retainEarningId = 70;
		$retainEarningNumber = $retainEarningAccount->number;
		$retainEarningName = $retainEarningAccount->name;
		$retainEarningType = $retainEarningAccount->account_type_name;

		foreach ($retainEarning as $value) {
			if($value->dr!==0){
				$sumDr += floatval($value->dr) / floatval($value->transaction_rate);
			}
			if($value->cr!==0){
				$sumCr += floatval($value->cr) / floatval($value->transaction_rate);
			}		
		}
		$retainEarningAmount = $sumCr - $sumDr;
		//END RETAINED EARNING
		

		//Total Retain Earning
		$totalRetainEarning = $prevPLAmount + $retainEarningAmount;
		
		$data["results"][] = array(
			"id" 			=> $retainEarningId,
			"number" 		=> $retainEarningNumber,
			"name" 			=> $retainEarningName,				
		   	"type" 			=> $retainEarningType,
		   	"dr" 			=> 0,
		   	"cr" 			=> $totalRetainEarning
		);
		
				
		$data["count"] = count($data["results"]);

		//Response Data		
		$this->response($data, 200);	
	}
	//GET TRIAL BALANCE OPTIMIZED
	function trial_balance_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$asOf = date("Y-m-d");
		$objList = [];
		
		//Filter
		if(!empty($filter['filters']) && isset($filter['filters'])){
	    	foreach ($filter['filters'] as $value) {
				$asOf = $value["value"];
			}
		}			

		//Fiscal Date
		$asOfYear = date("Y",strtotime($asOf));
		$fdate = $asOfYear ."-". $this->fiscalDate;
		if($asOf > $fdate){
			$startDate 	= $asOfYear ."-". $this->fiscalDate;
			$endDate 	= intval($asOfYear)+1 ."-". $this->fiscalDate;
		}else{
			$startDate 	= intval($asOfYear)-1 ."-". $this->fiscalDate;
			$endDate 	= $asOfYear ."-". $this->fiscalDate;
		}

		//Add 1 day
		$asOf = date("Y-m-d", strtotime($asOf . "+1 days"));
		$startDate = date("Y-m-d", strtotime($startDate . "+1 days"));

		//BALANCE SHEET (As Of) Dr - Cr
		$balanceSheets = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$balanceSheets->select("account_id");
		$balanceSheets->select_sum("(dr - cr) / transactions.rate", "total");
		$balanceSheets->include_related("account", array("number","name"));
		$balanceSheets->include_related("account/account_type", array("name","nature"));		
		$balanceSheets->where_related("account", "account_type_id >=", 10);
		$balanceSheets->where_related("account", "account_type_id <=", 33);
		$balanceSheets->where_related("transaction", "issued_date <", $asOf);
		$balanceSheets->where_related("transaction", "is_recurring <>", 1);
		$balanceSheets->where_related("transaction", "deleted <>", 1);
		$balanceSheets->where_related("transaction", "is_journal", 1);
		$balanceSheets->where("deleted <>", 1);
		$balanceSheets->order_by_related("account", "number", "asc");
		$balanceSheets->group_by("account_id");
		$balanceSheets->get();

		foreach ($balanceSheets as $value) {
			$objList[] = array(
				"id" 			=> $value->account_id,
				"number" 		=> $value->account_number,
				"name" 			=> $value->account_name,				
			   	"type" 			=> $value->account_account_type_name,
			   	"nature" 		=> $value->account_account_type_nature,
			   	"amount" 		=> floatval($value->total)
			);
		}
		//END BALANCE SHEET


		//CURRENT PROFIT AND LOSS (startFiscalDate to As Of) Cr - Dr
		$currPL = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$currPL->select("account_id");
		$currPL->select_sum("(dr - cr) / transactions.rate", "total");
		$currPL->include_related("account", array("number","name"));
		$currPL->include_related("account/account_type", array("name","nature"));		
		$currPL->where_related("account", "account_type_id >=", 35);
		$currPL->where_related("account", "account_type_id <=", 43);
		$currPL->where_related("transaction", "issued_date >=", $startDate);
		$currPL->where_related("transaction", "issued_date <", $asOf);
		$currPL->where_related("transaction", "is_recurring <>", 1);
		$currPL->where_related("transaction", "deleted <>", 1);		
		$currPL->where("deleted <>", 1);
		$currPL->order_by_related("account", "number", "asc");
		$currPL->group_by("account_id");
		$currPL->get();

		foreach ($currPL as $value) {
			$objList[] = array(
				"id" 			=> $value->account_id,
				"number" 		=> $value->account_number,
				"name" 			=> $value->account_name,
			   	"type" 			=> $value->account_account_type_name,
			   	"nature" 		=> $value->account_account_type_nature,
			   	"amount" 		=> floatval($value->total)
			);
		}
		//END CURRENT PROFIT AND LOSS


		//RETAINED EARNING = Profit Loss + Retained Earning
		$retainEarningAmount = 0;
		//PREVIOUSE PROFIT AND LOSS (From Begining to startFiscalDate) Cr - Dr
		$prevPL = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);				
		$prevPL->select_sum("(dr - cr) / transactions.rate", "total");
		$prevPL->where_related("account", "account_type_id >=", 35);
		$prevPL->where_related("account", "account_type_id <=", 43);
		$prevPL->where_related("transaction", "issued_date <", $startDate);
		$prevPL->where_related("transaction", "is_recurring <>", 1);
		$prevPL->where_related("transaction", "deleted <>", 1);		
		$prevPL->where("deleted <>", 1);
		$prevPL->get();

		// $retainEarningAmount += floatval($prevPL->total);
		//END PREVIOUSE PROFIT AND LOSS


		//RETAINED EARNING (As Of) Cr - Dr
		$retainEarning = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$retainEarning->select_sum("(dr - cr) / transactions.rate", "total");
		$retainEarning->where("account_id", 70);
		$retainEarning->where_related("transaction", "issued_date <", $asOf);
		$retainEarning->where_related("transaction", "is_recurring <>", 1);
		$retainEarning->where_related("transaction", "deleted <>", 1);
		$retainEarning->where("deleted <>", 1);
		$retainEarning->get();
		
		// $retainEarningAmount += floatval($retainEarning->total);

		$retainEarningAmount = floatval($prevPL->total) + floatval($retainEarning->total);
		//END RETAINED EARNING

		//Equity
		$objList[] = array(
			"id" 			=> 70,
			"number" 		=> "32500",
			"name" 			=> "Retained Earnings",				
		   	"type" 			=> "Equity",
		   	"nature" 		=> "Cr",
		   	"amount" 		=> $retainEarningAmount
		);

		foreach ($objList as $value) {
			$dr = $value["amount"];
			$cr = 0;
			if($value["nature"]=="Cr"){
				$dr = 0;
				$cr = $value["amount"] * -1;
			}

			if($dr==0 && $cr==0){}else{
				$data["results"][] = array(
					"id" 		=> $value["id"],
					"number" 	=> $value["number"],
					"name" 		=> $value["name"],
				   	"type" 		=> $value["type"],
				   	"dr" 		=> $dr,
				   	"cr" 		=> $cr
				);
			}
		}	
				
		$data["count"] = count($data["results"]);

		$data["asOf"] = $asOf;
		$data["startDate"] = $startDate;

		//Response Data		
		$this->response($data, 200);	
	}

	//GET BALANCE SHEET (Statement of Financial Position)
	function balance_sheet_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		
		$asOf = date("Y-m-d");
		if(!empty($filter["filters"]) && isset($filter["filters"])){
	    	$asOf = $filter["filters"][0]["value"];
		}		

		//Fiscal Date
		$asOfYear = date("Y",strtotime($asOf));
		$fdate = $asOfYear ."-". $this->fiscalDate;
		if($asOf > $fdate){
			$startDate 	= $asOfYear ."-". $this->fiscalDate;
			$endDate 	= intval($asOfYear)+1 ."-". $this->fiscalDate;
		}else{
			$startDate 	= intval($asOfYear)-1 ."-". $this->fiscalDate;
			$endDate 	= $asOfYear ."-". $this->fiscalDate;
		}

		//Add 1 day
		$asOf = date("Y-m-d", strtotime($asOf . "+1 days"));
		$startDate = date("Y-m-d", strtotime($startDate . "+1 days"));
		
		//(As Of)
		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->select_sum("(dr - cr) / transactions.rate", "total");
		$obj->include_related("account", array("account_type_id","number","name"));
		$obj->include_related("account/account_type", array("sub_of_id","name","nature","order"));
		$obj->where_in_related("account", "account_type_id", array(10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33));		
		$obj->where_related("transaction", "issued_date <", $asOf);
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by_related("account/account_type", "order", "asc");
		$obj->order_by_related("account", "number", "asc");
		$obj->group_by("account_id");		
		$obj->get();

		//Group by account_type_id
		$typeList = [];
		$totalAsset = 0;
		$totalLiability = 0;
		$totalEquity = 0;
		$totalAmount = 0;
		foreach ($obj as $value) {
			$multiplier = 1;

			$amount = floatval($value->total);
			if($value->account_account_type_nature=="Cr"){
				$amount = floatval($value->total) * -1;
			}

			if(isset($typeList[$value->account_account_type_id])){
				switch ($typeList[$value->account_account_type_id]["parent"]) {
				    case 1:
				    	if($value->account_account_type_nature=="Cr"){
							$totalAsset -= $amount;
							$multiplier = -1;
						}else{
							$totalAsset += $amount;
						}
				        break;
				    case 2:
				        $totalLiability += $amount;
				        break;
				    default:
				        $totalEquity += $amount;
				}

				$typeList[$value->account_account_type_id]["line"][] = array(
					"id" 			=> $value->account_id,
					"number" 		=> $value->account_number,
					"name" 			=> $value->account_name,
					"amount" 		=> $amount,
					"multiplier" 	=> $multiplier
				);
			} else {
				$subOfs = new Account_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$subOfs->get_by_id($value->account_account_type_sub_of_id);

				switch ($subOfs->sub_of_id) {
				    case 1:
				        if($value->account_account_type_nature=="Cr"){
							$totalAsset -= $amount;
							$multiplier = -1;
						}else{
							$totalAsset += $amount;
						}
				        break;
				    case 2:
				        $totalLiability += $amount;
				        break;
				    default:
				        $totalEquity += $amount;
				}

				$typeList[$value->account_account_type_id]["id"] 			= $value->account_account_type_id;
				$typeList[$value->account_account_type_id]["sub_of_id"] 	= $value->account_account_type_sub_of_id;
				$typeList[$value->account_account_type_id]["sub_of_name"] 	= $subOfs->name;
				$typeList[$value->account_account_type_id]["parent"] 		= $subOfs->sub_of_id;
				$typeList[$value->account_account_type_id]["type"] 			= $value->account_account_type_name;				
				$typeList[$value->account_account_type_id]["line"][] 		= array(
					"id" 			=> $value->account_id,
					"number" 		=> $value->account_number,
					"name" 			=> $value->account_name,
					"amount" 		=> $amount,
					"multiplier" 	=> $multiplier
				);
			}			
		}
		
		//RETAINED EARNING = Previouse PL(Begining->Startdate) + Retained Earning(Begining->As Of)
		//PREVIOUSE PROFIT AND LOSS (From Begining to startFiscalDate) Cr - Dr
		$prevPL = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);				
		$prevPL->select_sum("(cr - dr) / transactions.rate", "total");
		$prevPL->where_related("account", "account_type_id >=", 35);
		$prevPL->where_related("account", "account_type_id <=", 43);
		$prevPL->where_related("transaction", "issued_date <", $startDate);
		$prevPL->where_related("transaction", "is_recurring <>", 1);
		$prevPL->where_related("transaction", "deleted <>", 1);		
		$prevPL->where("deleted <>", 1);
		$prevPL->get();

		$prevPLAmount = floatval($prevPL->total);
		//END PREVIOUSE PROFIT AND LOSS
		

		//RETAINED EARNING (As Of)
		$retainEarning = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$retainEarning->select_sum("(cr - dr) / transactions.rate", "total");
		$retainEarning->where("account_id", 70);
		$retainEarning->where_related("transaction", "issued_date <", $asOf);		
		$retainEarning->where_related("transaction", "is_recurring <>", 1);
		$retainEarning->where_related("transaction", "deleted <>", 1);		
		$retainEarning->where("deleted <>", 1);
		$retainEarning->get();
		
		$retainEarningAmount = floatval($retainEarning->total);
		//END RETAINED EARNING
		

		//Total Retain Earning
		$totalRetainEarning = $prevPLAmount + $retainEarningAmount;
		$totalEquity += $totalRetainEarning;

		$typeList[34]["id"] 			= 34;
		$typeList[34]["sub_of_id"] 		= 3;
		$typeList[34]["sub_of_name"] 	= "Equity";
		$typeList[34]["parent"] 		= 0;
		$typeList[34]["multiplier"] 	= 1;
		$typeList[34]["type"] 			= "Retained Earning";		
		$typeList[34]["line"][] 		= array(
			"id" 		=> 0,
			"number" 	=> "",
			"name" 		=> "Retained Earning",
			"amount" 	=> $totalRetainEarning,
			"multiplier"=> 1
		);

		//CURRENT PROFIT FOR THE YEAR (startFiscalDate -> As Of)
		$currPFY = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
		$currPFY->select_sum("(cr - dr) / transactions.rate", "total");		
		$currPFY->where_related("account", "account_type_id >=", 35);
		$currPFY->where_related("account", "account_type_id <=", 43);
		$currPFY->where_related("transaction", "issued_date >=", $startDate);
		$currPFY->where_related("transaction", "issued_date <", $asOf);
		$currPFY->where_related("transaction", "is_recurring <>", 1);
		$currPFY->where_related("transaction", "deleted <>", 1);		
		$currPFY->where("deleted <>", 1);
		$currPFY->get();

		$currentPFYAmount = floatval($currPFY->total);
		$totalEquity += floatval($currPFY->total);
		
		$typeList[34]["line"][] 		= array(
			"id" 		=> 0,
			"number" 	=> "",
			"name" 		=> "Profit For The Year",
			"amount" 	=> $currentPFYAmount,
			"multiplier"=> 1
		);
		//END CURRENT PROFIT AND LOSS		
		//End Retain Earning		
		
		//Group by sub_of_id
		$subOfList = [];
		foreach ($typeList as $value) {
			if(isset($subOfList[$value["sub_of_id"]])){
				$subOfList[$value["sub_of_id"]]["typeLine"][] 	= $value;
			} else {
				$subOfList[$value["sub_of_id"]]["id"] 			= $value["sub_of_id"];
				$subOfList[$value["sub_of_id"]]["name"] 		= $value["sub_of_name"];
				$subOfList[$value["sub_of_id"]]["parent"] 		= $value["parent"];
				$subOfList[$value["sub_of_id"]]["multiplier"] 	= 1;
				$subOfList[$value["sub_of_id"]]["typeLine"][] 	= $value;
			}
		}

		//Group by parent (Asset, Liability, and Equity)
		foreach ($subOfList as $value) {
			switch ($value["parent"]) {
			    case 1:
			        $data["results"][0]["asset"][] = $value;
			        break;
			    case 2:
			        $data["results"][0]["liability"][] = $value;
			        break;
			    default:
			        $data["results"][0]["equity"][] = $value;
			}
		}
		
		$data["results"][0]["totalAsset"] 	= $totalAsset;
		$data["results"][0]["totalLiability"] = $totalLiability;
		$data["results"][0]["totalEquity"] 	= $totalEquity;

		$data["count"] = count($data["results"]);

		//Response Data		
		$this->response($data, 200);	
	}
	function balance_sheet_asset_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		
		$asOf = date("Y-m-d");
		if(!empty($filter) && isset($filter)){
	    	$asOf = $filter["filters"][0]["value"];
	    	$obj->where_in_related("account", "account_type_id", $filter["filters"][1]["value"]);		 			
		}		

		//Fiscal Date
		$asOfYear = date("Y",strtotime($asOf));
		$fdate = $asOfYear ."-". $this->fiscalDate;
		if($asOf > $fdate){
			$startDate 	= $asOfYear ."-". $this->fiscalDate;
			$endDate 	= intval($asOfYear)+1 ."-". $this->fiscalDate;
		}else{
			$startDate 	= intval($asOfYear)-1 ."-". $this->fiscalDate;
			$endDate 	= $asOfYear ."-". $this->fiscalDate;
		}

		//Add 1 day
		$asOf = date("Y-m-d", strtotime($asOf . "+1 days"));
		$startDate = date("Y-m-d", strtotime($startDate . "+1 days"));
		
		//OBJ (As Of)
		$obj->include_related("transaction", array("rate"));
		$obj->include_related("account", array("account_type_id","number","name"));
		$obj->include_related("account/account_type", array("sub_of_id","name","nature"));		
		$obj->where_related("transaction", "issued_date <", $asOf);
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by_related("account/account_type", "order", "asc");
		$obj->order_by_related("account", "number", "asc");
		$obj->get_iterated();
		
		//Sum Dr and Cr					
		$objList = [];
		foreach ($obj as $value) {
			$amount = 0;
			if($value->account_account_type_nature=="Dr"){
				$amount = (floatval($value->dr) - floatval($value->cr)) / floatval($value->transaction_rate);				
			}else{
				$amount = (floatval($value->cr) - floatval($value->dr)) / floatval($value->transaction_rate);					
			}			

			//Group by account_id
			if(isset($objList[$value->account_id])){
				$objList[$value->account_id]["amount"] += $amount;
			} else {
				$objList[$value->account_id]["id"] 				= $value->account_id;
				$objList[$value->account_id]["account_type_id"] = $value->account_account_type_id;				
				$objList[$value->account_id]["sub_of_id"] 		= $value->account_account_type_sub_of_id;
				$objList[$value->account_id]["type"] 			= $value->account_account_type_name;
				$objList[$value->account_id]["nature"] 			= $value->account_account_type_nature;				
				$objList[$value->account_id]["number"] 			= $value->account_number;
				$objList[$value->account_id]["name"] 			= $value->account_name;
				$objList[$value->account_id]["amount"] 			= $amount;				
			}			
		}

		//Group by account type id
		$typeList = [];
		$totalAmount = 0;
		foreach ($objList as $value) {
			//Group by account_type_id
			if(isset($typeList[$value["account_type_id"]])){
				$typeList[$value["account_type_id"]]["line"][] = array(
					"id" 		=> $value["id"],
					"number" 	=> $value["number"],
					"name" 		=> $value["name"],
					"amount" 	=> $value["amount"] * $typeList[$value["account_type_id"]]["multiplier"]
				);

				$totalAmount += $value["amount"] * $typeList[$value["account_type_id"]]["multiplier"];
			} else {
				$subOf = new Account_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$subOf->get_by_id($value["sub_of_id"]);
				
				$multiplier = 1;
				if($subOf->nature!==$value["nature"]){
					$multiplier = -1;
				};

				$typeList[$value["account_type_id"]]["id"] 			= $value["account_type_id"];
				$typeList[$value["account_type_id"]]["sub_of_id"] 	= $value["sub_of_id"];
				$typeList[$value["account_type_id"]]["sub_of_name"] = $subOf->name;
				$typeList[$value["account_type_id"]]["multiplier"] 	= $multiplier;
				$typeList[$value["account_type_id"]]["type"] 		= $value["type"];				
				$typeList[$value["account_type_id"]]["line"][] 		= array(
					"id" 		=> $value["id"],
					"number" 	=> $value["number"],
					"name" 		=> $value["name"],
					"amount" 	=> $value["amount"] * $multiplier
				);
				
				$totalAmount += $value["amount"] * $multiplier;
			}			
		}		
		
		//Group by sub_of_id
		$parentList = [];
		foreach ($typeList as $value) {
			if(isset($parentList[$value["sub_of_id"]])){
				$parentList[$value["sub_of_id"]]["typeLine"][] 	= $value;
			} else {
				// $subOf = new Account_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				// $subOf->get_by_id($value["sub_of_id"]);				

				$parentList[$value["sub_of_id"]]["id"] 			= $value["sub_of_id"];
				$parentList[$value["sub_of_id"]]["name"] 		= $value["sub_of_name"];				
				$parentList[$value["sub_of_id"]]["typeLine"][] 	= $value;
			}
		}

		$data["totalAmount"] = $totalAmount;

		//Add to results
		foreach ($parentList as $value) {
			$data["results"][] = $value;
		}
		
		$data["count"] = count($data["results"]);

		//Response Data		
		$this->response($data, 200);	
	}
	function balance_sheet_liability_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		
		$asOf = date("Y-m-d");
		if(!empty($filter) && isset($filter)){
	    	$asOf = $filter["filters"][0]["value"];
	    	$obj->where_in_related("account", "account_type_id", $filter["filters"][1]["value"]);		 			
		}		

		//Fiscal Date
		$asOfYear = date("Y",strtotime($asOf));
		$fdate = $asOfYear ."-". $this->fiscalDate;
		if($asOf > $fdate){
			$startDate 	= $asOfYear ."-". $this->fiscalDate;
			$endDate 	= intval($asOfYear)+1 ."-". $this->fiscalDate;
		}else{
			$startDate 	= intval($asOfYear)-1 ."-". $this->fiscalDate;
			$endDate 	= $asOfYear ."-". $this->fiscalDate;
		}

		//Add 1 day
		$asOf = date("Y-m-d", strtotime($asOf . "+1 days"));
		$startDate = date("Y-m-d", strtotime($startDate . "+1 days"));
		
		//OBJ (As Of)
		$obj->include_related("transaction", array("rate"));
		$obj->include_related("account", array("account_type_id","number","name"));
		$obj->include_related("account/account_type", array("sub_of_id","name","nature"));		
		$obj->where_related("transaction", "issued_date <", $asOf);
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by_related("account/account_type", "order", "asc");
		$obj->order_by_related("account", "number", "asc");		
		$obj->get_iterated();
		
		//Sum Dr and Cr					
		$objList = [];
		foreach ($obj as $value) {
			$amount = 0;
			if($value->account_account_type_nature=="Dr"){
				$amount = (floatval($value->dr) - floatval($value->cr)) / floatval($value->transaction_rate);				
			}else{
				$amount = (floatval($value->cr) - floatval($value->dr)) / floatval($value->transaction_rate);					
			}			

			//Group by account_id
			if(isset($objList[$value->account_id])){
				$objList[$value->account_id]["amount"] += $amount;
			} else {
				$objList[$value->account_id]["id"] 				= $value->account_id;
				$objList[$value->account_id]["account_type_id"] = $value->account_account_type_id;				
				$objList[$value->account_id]["sub_of_id"] 		= $value->account_account_type_sub_of_id;
				$objList[$value->account_id]["type"] 			= $value->account_account_type_name;
				$objList[$value->account_id]["nature"] 			= $value->account_account_type_nature;				
				$objList[$value->account_id]["number"] 			= $value->account_number;
				$objList[$value->account_id]["name"] 			= $value->account_name;
				$objList[$value->account_id]["amount"] 			= $amount;				
			}			
		}

		//Group by account type id
		$typeList = [];
		$totalAmount = 0;
		foreach ($objList as $value) {
			//Group by account_type_id
			if(isset($typeList[$value["account_type_id"]])){
				$typeList[$value["account_type_id"]]["line"][] = array(
					"id" 		=> $value["id"],
					"number" 	=> $value["number"],
					"name" 		=> $value["name"],
					"amount" 	=> $value["amount"] * $typeList[$value["account_type_id"]]["multiplier"]
				);

				$totalAmount += $value["amount"] * $typeList[$value["account_type_id"]]["multiplier"];
			} else {
				$subOf = new Account_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$subOf->get_by_id($value["sub_of_id"]);
				
				$multiplier = 1;
				if($subOf->nature!==$value["nature"]){
					$multiplier = -1;
				};

				$typeList[$value["account_type_id"]]["id"] 			= $value["account_type_id"];
				$typeList[$value["account_type_id"]]["sub_of_id"] 	= $value["sub_of_id"];
				$typeList[$value["account_type_id"]]["sub_of_name"] = $subOf->name;
				$typeList[$value["account_type_id"]]["multiplier"] 	= $multiplier;
				$typeList[$value["account_type_id"]]["type"] 		= $value["type"];				
				$typeList[$value["account_type_id"]]["line"][] 		= array(
					"id" 		=> $value["id"],
					"number" 	=> $value["number"],
					"name" 		=> $value["name"],
					"amount" 	=> $value["amount"] * $multiplier
				);
				
				$totalAmount += $value["amount"] * $multiplier;
			}			
		}		
		
		//Group by sub_of_id
		$parentList = [];
		foreach ($typeList as $value) {
			if(isset($parentList[$value["sub_of_id"]])){
				$parentList[$value["sub_of_id"]]["typeLine"][] 	= $value;
			} else {
				// $subOf = new Account_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				// $subOf->get_by_id($value["sub_of_id"]);				

				$parentList[$value["sub_of_id"]]["id"] 			= $value["sub_of_id"];
				$parentList[$value["sub_of_id"]]["name"] 		= $value["sub_of_name"];				
				$parentList[$value["sub_of_id"]]["typeLine"][] 	= $value;
			}
		}

		$data["totalAmount"] = $totalAmount;

		//Add to results
		foreach ($parentList as $value) {
			$data["results"][] = $value;
		}
		
		$data["count"] = count($data["results"]);

		//Response Data		
		$this->response($data, 200);	
	}
	function balance_sheet_equity_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		
		$asOf = date("Y-m-d");
		if(!empty($filter) && isset($filter)){
	    	$asOf = $filter["filters"][0]["value"];
		}	

		//Fiscal Date
		$asOfYear = date("Y",strtotime($asOf));
		$fdate = $asOfYear ."-". $this->fiscalDate;
		if($asOf > $fdate){
			$startDate 	= $asOfYear ."-". $this->fiscalDate;
			$endDate 	= intval($asOfYear)+1 ."-". $this->fiscalDate;
		}else{
			$startDate 	= intval($asOfYear)-1 ."-". $this->fiscalDate;
			$endDate 	= $asOfYear ."-". $this->fiscalDate;
		}

		//Add 1 day
		$asOf = date("Y-m-d", strtotime($asOf . "+1 days"));
		$startDate = date("Y-m-d", strtotime($startDate . "+1 days"));
		
		//OBJ (As Of)
		$obj->include_related("transaction", array("rate"));
		$obj->include_related("account", array("account_type_id","number","name"));
		$obj->include_related("account/account_type", array("sub_of_id","name","nature"));
		$obj->where_in_related("account", "account_type_id", array(32,33));		
		$obj->where_related("transaction", "issued_date <", $asOf);
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by_related("account", "account_type_id", "desc");
		$obj->order_by_related("account", "number", "asc");		
		$obj->get_iterated();

		//Sum Dr and Cr					
		$objList = [];
		foreach ($obj as $value) {
			$amount = 0;
			if($value->account_account_type_nature=="Dr"){
				$amount = (floatval($value->dr) - floatval($value->cr)) / floatval($value->transaction_rate);				
			}else{
				$amount = (floatval($value->cr) - floatval($value->dr)) / floatval($value->transaction_rate);					
			}			

			//Group by account_id
			if(isset($objList[$value->account_id])){
				$objList[$value->account_id]["amount"] += $amount;
			} else {
				$objList[$value->account_id]["id"] 				= $value->account_id;
				$objList[$value->account_id]["account_type_id"] = $value->account_account_type_id;				
				$objList[$value->account_id]["sub_of_id"] 		= $value->account_account_type_sub_of_id;
				$objList[$value->account_id]["type"] 			= $value->account_account_type_name;
				$objList[$value->account_id]["nature"] 			= $value->account_account_type_nature;				
				$objList[$value->account_id]["number"] 			= $value->account_number;
				$objList[$value->account_id]["name"] 			= $value->account_name;
				$objList[$value->account_id]["amount"] 			= $amount;				
			}			
		}

		//Group by account type id
		$typeList = [];
		$totalAmount = 0;
		foreach ($objList as $value) {
			//Group by account_type_id
			if(isset($typeList[$value["account_type_id"]])){
				$typeList[$value["account_type_id"]]["line"][] = array(
					"id" 		=> $value["id"],
					"number" 	=> $value["number"],
					"name" 		=> $value["name"],
					"amount" 	=> $value["amount"] * $typeList[$value["account_type_id"]]["multiplier"]
				);

				$totalAmount += $value["amount"] * $typeList[$value["account_type_id"]]["multiplier"];
			} else {
				$subOf = new Account_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$subOf->get_by_id($value["sub_of_id"]);
				
				$multiplier = 1;
				if($subOf->nature!==$value["nature"]){
					$multiplier = -1;
				};

				$typeList[$value["account_type_id"]]["id"] 			= $value["account_type_id"];
				$typeList[$value["account_type_id"]]["sub_of_id"] 	= $value["sub_of_id"];
				$typeList[$value["account_type_id"]]["sub_of_name"] = $subOf->name;
				$typeList[$value["account_type_id"]]["multiplier"] 	= $multiplier;
				$typeList[$value["account_type_id"]]["type"] 		= $value["type"];				
				$typeList[$value["account_type_id"]]["line"][] 		= array(
					"id" 		=> $value["id"],
					"number" 	=> $value["number"],
					"name" 		=> $value["name"],
					"amount" 	=> $value["amount"] * $multiplier
				);
				
				$totalAmount += $value["amount"] * $multiplier;
			}			
		}

		//RETAINED EARNING = Profit Loss + Retained Earning
		//PREVIOUSE PROFIT AND LOSS (From Begining to startFiscalDate) Cr - Dr
		$prevPL = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);				
		$prevPL->include_related("transaction", array("rate"));
		$prevPL->where_related("account", "account_type_id >=", 35);
		$prevPL->where_related("account", "account_type_id <=", 43);
		$prevPL->where_related("transaction", "issued_date <", $startDate);
		$prevPL->where_related("transaction", "is_recurring <>", 1);
		$prevPL->where_related("transaction", "deleted <>", 1);		
		$prevPL->where("deleted <>", 1);
		$prevPL->get_iterated();

		//Sum dr and cr
		$sumDr = 0;
		$sumCr = 0;		
		foreach ($prevPL as $value) {			
			if($value->dr!==0){
				$sumDr += floatval($value->dr) / floatval($value->transaction_rate);
			}
			if($value->cr!==0){
				$sumCr += floatval($value->cr) / floatval($value->transaction_rate);
			}		
		}
		$prevPLAmount = $sumCr - $sumDr;
		//END PREVIOUSE PROFIT AND LOSS
		

		//RETAINED EARNING (As Of)
		$retainEarning = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$retainEarning->where("account_id", 70);
		$retainEarning->include_related("transaction", array("rate"));
		$retainEarning->where_related("transaction", "issued_date <", $asOf);		
		$retainEarning->where_related("transaction", "is_recurring <>", 1);
		$retainEarning->where_related("transaction", "deleted <>", 1);		
		$retainEarning->where("deleted <>", 1);
		$retainEarning->get_iterated();
		
		//Sum dr and cr
		$retainEarningId = 0;
		$retainEarningNumber = "";
		$retainEarningName = "";
		$retainEarningType = "";
		$sumDr = 0;
		$sumCr = 0;

		//Get Retain Earning Account
		$retainEarningAccount = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$retainEarningAccount->include_related("account_type", array("name","nature"));
		$retainEarningAccount->get_by_id(70);

		$retainEarningId = 70;
		$retainEarningNumber = $retainEarningAccount->number;
		$retainEarningName = $retainEarningAccount->name;
		$retainEarningType = $retainEarningAccount->account_type_name;

		foreach ($retainEarning as $value) {
			if($value->dr!==0){
				$sumDr += floatval($value->dr) / floatval($value->transaction_rate);
			}
			if($value->cr!==0){
				$sumCr += floatval($value->cr) / floatval($value->transaction_rate);
			}		
		}
		$retainEarningAmount = $sumCr - $sumDr;
		//END RETAINED EARNING
		

		//Total Retain Earning
		$totalRetainEarning = $prevPLAmount + $retainEarningAmount;
		$totalAmount += $totalRetainEarning;

		$typeList[34]["id"] 			= 34;
		$typeList[34]["sub_of_id"] 		= 3;
		$typeList[34]["sub_of_name"] 	= "Equity";
		$typeList[34]["multiplier"] 	= 1;
		$typeList[34]["type"] 			= "Retained Earning";		
		$typeList[34]["line"][] 		= array(
			"id" 		=> 0,
			"number" 	=> "",
			"name" 		=> "Retained Earning",
			"amount" 	=> $totalRetainEarning
		);

		//CURRENT PROFIT FOR THE YEAR (startFiscalDate -> As Of)
		$currPL = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
		$currPL->include_related("transaction", array("rate"));
		$currPL->include_related("account/account_type", array("name","nature"));		
		$currPL->where_related("account", "account_type_id >=", 35);
		$currPL->where_related("account", "account_type_id <=", 43);
		$currPL->where_related("transaction", "issued_date >=", $startDate);
		$currPL->where_related("transaction", "issued_date <", $asOf);
		$currPL->where_related("transaction", "is_recurring <>", 1);
		$currPL->where_related("transaction", "deleted <>", 1);		
		$currPL->where("deleted <>", 1);
		$currPL->get_iterated();

		//Sum dr and cr
		$sumDr = 0;
		$sumCr = 0;		
		foreach ($currPL as $value) {			
			if($value->dr!==0){
				$sumDr += floatval($value->dr) / floatval($value->transaction_rate);
			}
			if($value->cr!==0){
				$sumCr += floatval($value->cr) / floatval($value->transaction_rate);
			}		
		}
		$currentPLAmount = $sumCr - $sumDr;
		$totalAmount += $currentPLAmount;
		
		$typeList[34]["line"][] 		= array(
			"id" 		=> 0,
			"number" 	=> "",
			"name" 		=> "Profit For The Year",
			"amount" 	=> $currentPLAmount
		);
		//END CURRENT PROFIT AND LOSS		
		
		//Group by sub_of_id
		$parentList = [];
		foreach ($typeList as $value) {
			if(isset($parentList[$value["sub_of_id"]])){
				$parentList[$value["sub_of_id"]]["typeLine"][] 	= $value;
			} else {
				$parentList[$value["sub_of_id"]]["id"] 			= $value["sub_of_id"];
				$parentList[$value["sub_of_id"]]["name"] 		= $value["sub_of_name"];				
				$parentList[$value["sub_of_id"]]["typeLine"][] 	= $value;
			}
		}
		
		$data["totalAmount"] = $totalAmount;

		//Add to results
		foreach ($parentList as $value) {
			$data["results"][] = $value;
		}
		
		$data["count"] = count($data["results"]);

		//Response Data		
		$this->response($data, 200);	
	}

	//GET INCOME STATEMENT (Statement of Profit or Loss)
	function income_statement_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		
		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
				
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
		
		$obj->include_related("transaction", array("rate"));
		$obj->include_related("account", array("number","name","account_type_id"));
		$obj->include_related("account/account_type", array("name","nature"));
		$obj->where_in_related("account", "account_type_id", array(35,36,37,38,39,40,41,42));
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by_related("account", "number", "asc");
				
		//Results
		if($page && $limit){
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
		}else{
			$obj->get_iterated();
			$data["count"] = $obj->result_count();
		}		
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				$amount = 0;
				if($value->account_account_type_nature=="Dr"){
					$amount = (floatval($value->dr) - floatval($value->cr)) / floatval($value->transaction_rate);				
				}else{
					$amount = (floatval($value->cr) - floatval($value->dr)) / floatval($value->transaction_rate);					
				}

				if(isset($objList[$value->account_id])){
					$objList[$value->account_id]["amount"] += $amount;
				}else{
					$objList[$value->account_id]["id"] 		= $value->account_id;
					$objList[$value->account_id]["type_id"]	= $value->account_account_type_id;
					$objList[$value->account_id]["type"] 	= $value->account_account_type_name;
					$objList[$value->account_id]["number"] 	= $value->account_number;
					$objList[$value->account_id]["name"] 	= $value->account_name;
					$objList[$value->account_id]["amount"]	= $amount;
				}
			}

			//Group by account_type_id
			$typeList = [];
			foreach ($objList as $value) {
				$typeId = $value["type_id"];
				if(isset($typeList[$typeId])){
					$typeList[$typeId]["amount"] 	+= $value["amount"];
					$typeList[$typeId]["line"][] 	= $value;
				} else {
					$typeList[$typeId]["id"] 		= $value["type_id"];
					$typeList[$typeId]["type"] 		= $value["type"];
					$typeList[$typeId]["amount"] 	= $value["amount"];
					$typeList[$typeId]["line"][] 	= $value;
				}
			}

			//Revenue
			$totalRevenue = 0;
			foreach ($typeList as $value) {
				if($value["id"]=="35"){
					$totalRevenue += $value["amount"];

					$data["results"][] = $value;
				}
			}

			//COGS
			$totalCOGS = 0;
			foreach ($typeList as $value) {
				if($value["id"]=="36"){
					$totalCOGS += $value["amount"];

					$data["results"][] = $value;
				}
			}

			//Gross Profit
			$grossProfit = $totalRevenue - $totalCOGS;
			$data["results"][] = array("id"=>0, "name"=>"Gross Profit", "amount"=>$grossProfit);


			//Other Revenue
			$totalOtherRevenue = 0;
			foreach ($typeList as $value) {
				if($value["id"]=="39"){
					$totalOtherRevenue += $value["amount"];

					$data["results"][] = $value;
				}
			}

			//Operating Expense
			$totalOperatingExpense = 0;
			foreach ($typeList as $value) {
				if($value["id"]=="37"){
					$totalOperatingExpense += $value["amount"];

					$data["results"][] = $value;
				}
			}

			//EBITDA
			$EBITDA = ($grossProfit + $totalOtherRevenue) - $totalOperatingExpense;
			$data["results"][] = array("id"=>0, "name"=>"Operating Income(EBITDA)", "amount"=>$EBITDA);


			//Depreciation Expense
			$totalDepreciationExpense = 0;
			foreach ($typeList as $value) {
				if($value["id"]=="38"){
					$totalDepreciationExpense += $value["amount"];

					$data["results"][] = $value;
				}
			}

			//Other Expense
			$totalOtherExpense = 0;
			foreach ($typeList as $value) {
				if($value["id"]=="40"){
					$totalOtherExpense += $value["amount"];

					$data["results"][] = $value;
				}
			}

			//EBIT
			$EBIT = ($EBITDA - $totalDepreciationExpense) - $totalOtherExpense;
			$data["results"][] = array("id"=>0, "name"=>"Earning Before Interest And Tax(EBIT)", "amount"=>$EBIT);


			//Financing Cost
			$totalFinancingCost = 0;
			foreach ($typeList as $value) {
				if($value["id"]=="41"){
					$totalFinancingCost += $value["amount"];

					$data["results"][] = $value;
				}
			}

			//Profit Before Tax
			$ProfitBeforeTax = $EBIT - $totalFinancingCost;
			$data["results"][] = array("id"=>0, "name"=>"Profit Before Tax", "amount"=>$ProfitBeforeTax);


			//Tax Expense
			$totalTaxExpense = 0;
			foreach ($typeList as $value) {
				if($value["id"]=="42"){
					$totalTaxExpense += $value["amount"];

					$data["results"][] = $value;
				}
			}

			//Profit For The Year
			$ProfitForTheYear = $ProfitBeforeTax - $totalTaxExpense;
			$data["results"][] = array("id"=>0, "name"=>"Profit For The Year", "amount"=>$ProfitForTheYear);


			$data["count"] = count($data["results"]);			
		}		

		//Response Data		
		$this->response($data, 200);	
	}
	function income_statement_new_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		
		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
				
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
		if(!empty($filter['filters']) && isset($filter['filters'])){
	    	foreach ($filter['filters'] as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
					$obj->where($value["field"], $value["value"]);
				}
			}
		}
		
		$obj->select("account_id");
		$obj->select_sum("(dr - cr) / transactions.rate", "total");
		$obj->include_related("account", array("number","name","account_type_id"));
		$obj->include_related("account/account_type", array("name","nature"));
		$obj->where_in_related("account", "account_type_id", array(35,36,37,38,39,40,41,42));
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by_related("account", "number", "asc");
		$obj->group_by("account_id");
		$obj->get();
		
		if($obj->exists()){
			$objList = [];
			//Group by account_type_id
			foreach ($obj as $value) {
				$account_type_id = $value->account_account_type_id;
				
				$amount = floatval($value->total);
				if($value->account_account_type_nature=="Cr"){
					$amount = floatval($value->total) * -1;
				}

				if(isset($objList[$account_type_id])){
					$objList[$account_type_id]["amount"] += $amount;
					$objList[$account_type_id]["line"][] = array(
						"id" 		=> $value->account_id,
						"type_id"	=> $value->account_account_type_id,
						"type" 		=> $value->account_account_type_name,
						"number" 	=> $value->account_number,
						"name" 		=> $value->account_name,
						"amount"	=> $amount
					);
				}else{
					$objList[$account_type_id]["id"] 		= $value->account_account_type_id;
					$objList[$account_type_id]["type"] 		= $value->account_account_type_name;
					$objList[$account_type_id]["amount"] 	= $amount;
					$objList[$account_type_id]["line"][] 	= array(
						"id" 		=> $value->account_id,
						"type_id"	=> $value->account_account_type_id,
						"type" 		=> $value->account_account_type_name,
						"number" 	=> $value->account_number,
						"name" 		=> $value->account_name,
						"amount"	=> $amount
					);
				}
			}

			//Revenue
			$totalRevenue = 0;
			foreach ($objList as $value) {
				if($value["id"]=="35"){
					$totalRevenue += $value["amount"];

					$data["results"][] = $value;
				}
			}

			//COGS
			$totalCOGS = 0;
			foreach ($objList as $value) {
				if($value["id"]=="36"){
					$totalCOGS += $value["amount"];

					$data["results"][] = $value;
				}
			}

			//Gross Profit
			$grossProfit = $totalRevenue - $totalCOGS;
			$data["results"][] = array("id"=>0, "name"=>"Gross Profit", "amount"=>$grossProfit);


			//Other Revenue
			$totalOtherRevenue = 0;
			foreach ($objList as $value) {
				if($value["id"]=="39"){
					$totalOtherRevenue += $value["amount"];

					$data["results"][] = $value;
				}
			}

			//Operating Expense
			$totalOperatingExpense = 0;
			foreach ($objList as $value) {
				if($value["id"]=="37"){
					$totalOperatingExpense += $value["amount"];

					$data["results"][] = $value;
				}
			}

			//EBITDA
			$EBITDA = ($grossProfit + $totalOtherRevenue) - $totalOperatingExpense;
			$data["results"][] = array("id"=>0, "name"=>"Operating Income(EBITDA)", "amount"=>$EBITDA);


			//Depreciation Expense
			$totalDepreciationExpense = 0;
			foreach ($objList as $value) {
				if($value["id"]=="38"){
					$totalDepreciationExpense += $value["amount"];

					$data["results"][] = $value;
				}
			}

			//Other Expense
			$totalOtherExpense = 0;
			foreach ($objList as $value) {
				if($value["id"]=="40"){
					$totalOtherExpense += $value["amount"];

					$data["results"][] = $value;
				}
			}

			//EBIT
			$EBIT = ($EBITDA - $totalDepreciationExpense) - $totalOtherExpense;
			$data["results"][] = array("id"=>0, "name"=>"Earning Before Interest And Tax(EBIT)", "amount"=>$EBIT);


			//Financing Cost
			$totalFinancingCost = 0;
			foreach ($objList as $value) {
				if($value["id"]=="41"){
					$totalFinancingCost += $value["amount"];

					$data["results"][] = $value;
				}
			}

			//Profit Before Tax
			$ProfitBeforeTax = $EBIT - $totalFinancingCost;
			$data["results"][] = array("id"=>0, "name"=>"Profit Before Tax", "amount"=>$ProfitBeforeTax);


			//Tax Expense
			$totalTaxExpense = 0;
			foreach ($objList as $value) {
				if($value["id"]=="42"){
					$totalTaxExpense += $value["amount"];

					$data["results"][] = $value;
				}
			}

			//Profit For The Year
			$ProfitForTheYear = $ProfitBeforeTax - $totalTaxExpense;
			$data["results"][] = array("id"=>0, "name"=>"Profit For The Year", "amount"=>$ProfitForTheYear);

			$data["count"] = count($data["results"]);			
		}		

		//Response Data		
		$this->response($data, 200);	
	}
	function income_statement_by_nature_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		
		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
				
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
		
		$obj->include_related("transaction", array("rate"));
		$obj->include_related("account", array("number","name","account_type_id","sub_of_id"));
		$obj->include_related("account/account_type", array("name","nature"));
		$obj->where_in_related("account", "account_type_id", array(35,36,37,38,39,40,41,42));
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by_related("account", "account_type_id", "asc");
		$obj->order_by_related("account", "number", "asc");

		//Results
		if($page && $limit){
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
		}else{
			$obj->get_iterated();
			$data["count"] = $obj->result_count();
		}		
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				$amount = 0;
				if($value->account_account_type_nature=="Dr"){
					$amount = (floatval($value->dr) - floatval($value->cr)) / floatval($value->transaction_rate);				
				}else{
					$amount = (floatval($value->cr) - floatval($value->dr)) / floatval($value->transaction_rate);					
				}

				if(isset($objList[$value->account_id])){
					$objList[$value->account_id]["amount"] += $amount;
				}else{
					$objList[$value->account_id]["id"] 			= $value->account_id;
					$objList[$value->account_id]["type_id"]		= $value->account_account_type_id;
					$objList[$value->account_id]["sub_of_id"]	= $value->account_sub_of_id;
					$objList[$value->account_id]["type"] 		= $value->account_account_type_name;
					$objList[$value->account_id]["number"] 		= $value->account_number;
					$objList[$value->account_id]["name"] 		= $value->account_name;
					$objList[$value->account_id]["amount"]		= $amount;
				}
			}

			//Group by sub_of_id
			$subList = [];
			foreach ($objList as $value) {
				if(isset($subList[$value["sub_of_id"]])){
					$subList[$value["sub_of_id"]]["line"][] = $value;
				}else{
					$subNumber = "";
					$subName = ""; 
					if(intval($value["sub_of_id"])>0){
						$subs = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$subs->select("number, name");
						$subs->get_by_id(intval($value["sub_of_id"]));

						if($subs->exists()){
							$subNumber = $subs->number;
							$subName = $subs->name; 
						}
					}

					$subList[$value["sub_of_id"]]["type_id"] 	= $value["type_id"];
					$subList[$value["sub_of_id"]]["number"] 	= $subNumber;
					$subList[$value["sub_of_id"]]["name"] 		= $subName;
					$subList[$value["sub_of_id"]]["line"][] 	= $value;
				}
			}

			//Group by type
			$revenueList = [];
			$expenseList = [];
			foreach ($subList as $value) {
				//Revenues
				if(intval($value["type_id"])==35 || intval($value["type_id"])==39){
					$revenueList[] = $value;
				}else{//Expenses
					$expenseList[] = $value;
				}
			}

			$data["results"][0] = array(
				"revenue" => $revenueList,
				"expense" => $expenseList
			);
		}		

		//Response Data		
		$this->response($data, 200);	
	}
	function income_statement_by_segment_get() {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$segmentList = [];
		
		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				
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
					if($value['operator']=="segments") {
						$segmentList = $value['value'];
					}else{
						$obj->{$value['operator']}($value['field'], $value['value']);
					}
				} else {
					$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->include_related("transaction", array("rate"));
		$obj->include_related("account", array("number","name","account_type_id"));
		$obj->include_related("account/account_type", array("name","nature"));
		$obj->where_in_related("account", "account_type_id", array(35,36,37,38,39,40,41,42));
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where("deleted <>", 1);
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				$amount = 0;
				if($value->account_account_type_nature=="Dr"){
					$amount = (floatval($value->dr) - floatval($value->cr)) / floatval($value->transaction_rate);				
				}else{
					$amount = (floatval($value->cr) - floatval($value->dr)) / floatval($value->transaction_rate);					
				}

				$segItems = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$segItems->where_in("id", explode(",",intval($value->segments)));
				$segItems->get();

				$accountId = $value->account_id;

				if(isset($objList[$accountId])){
					$objList[$accountId]["amount"] += $amount;
					
					foreach ($segmentList as $key => $row) {
						$segAmount = 0;
						foreach ($segItems as $sg) {
							if($sg->segment_id==$row){
								$segAmount = $amount;

								break;
							}
						}
						
						$objList[$accountId]["segment_lines"][$key] += $segAmount;
					}
				}else{
					$objList[$accountId]["id"] 		= $accountId;
					$objList[$accountId]["type_id"]	= $value->account_account_type_id;
					$objList[$accountId]["type"] 	= $value->account_account_type_name;
					$objList[$accountId]["number"] 	= $value->account_number;
					$objList[$accountId]["name"] 	= $value->account_name;
					$objList[$accountId]["amount"]	= $amount;

					foreach ($segmentList as $key => $row) {
						$segAmount = 0;
						foreach ($segItems as $sg) {
							if($sg->segment_id==$row){
								$segAmount = $amount;

								break;
							}
						}
						
						$objList[$accountId]["segment_lines"][$key] = $segAmount;
					}
				}
			}

			//Group by account_type_id
			$typeList = [];
			$segList = [];
			foreach ($objList as $value) {
				$typeId = $value["type_id"];

				if(isset($typeList[$typeId])){
					$typeList[$typeId]["amount"] 	+= $value["amount"];
					$typeList[$typeId]["line"][] 	= $value;
				} else {
					$typeList[$typeId]["id"] 		= $typeId;
					$typeList[$typeId]["type"] 		= $value["type"];
					$typeList[$typeId]["amount"] 	= $value["amount"];
					$typeList[$typeId]["line"][] 	= $value;
				}

				//Segments
				foreach ($value["segment_lines"] as $key => $val) {					
					if(isset($segList[$key])){
						//Revenue
						if($value["type_id"]=="35"){
							$segList[$key]["revenue"] += $val;
						}

						//COGS
						if($value["type_id"]=="36"){
							$segList[$key]["cogs"] += $val;
						}

						//Operating Expense
						if($value["type_id"]=="37"){
							$segList[$key]["operating_expense"] += $val;
						}

						//Depreciation Expense
						if($value["type_id"]=="38"){
							$segList[$key]["depreciation_expense"] += $val;
						}

						//Other Revenue
						if($value["type_id"]=="39"){
							$segList[$key]["other_revenue"] += $val;
						}

						//Other Expense
						if($value["type_id"]=="40"){
							$segList[$key]["other_expense"] += $val;
						}

						//Financing Cost
						if($value["type_id"]=="41"){
							$segList[$key]["financing_cost"] += $val;
						}

						//Tax Expense
						if($value["type_id"]=="42"){
							$segList[$key]["tax_expense"] += $val;
						}
					} else {
						//Revenue
						if($value["type_id"]=="35"){
							$segList[$key]["revenue"] = $val;
							$segList[$key]["cogs"] = 0;
							$segList[$key]["operating_expense"] = 0;
							$segList[$key]["depreciation_expense"] = 0;
							$segList[$key]["other_revenue"] = 0;
							$segList[$key]["other_expense"] = 0;
							$segList[$key]["financing_cost"] = 0;
							$segList[$key]["tax_expense"] = 0;
						}

						//COGS
						if($value["type_id"]=="36"){
							$segList[$key]["revenue"] = 0;
							$segList[$key]["cogs"] = $val;
							$segList[$key]["operating_expense"] = 0;
							$segList[$key]["depreciation_expense"] = 0;
							$segList[$key]["other_revenue"] = 0;
							$segList[$key]["other_expense"] = 0;
							$segList[$key]["financing_cost"] = 0;
							$segList[$key]["tax_expense"] = 0;
						}

						//Operating Expense
						if($value["type_id"]=="37"){
							$segList[$key]["revenue"] = 0;
							$segList[$key]["cogs"] = 0;
							$segList[$key]["operating_expense"] = $val;
							$segList[$key]["depreciation_expense"] = 0;
							$segList[$key]["other_revenue"] = 0;
							$segList[$key]["other_expense"] = 0;
							$segList[$key]["tax_expense"] = 0;
						}

						//Depreciation Expense
						if($value["type_id"]=="38"){
							$segList[$key]["revenue"] = 0;
							$segList[$key]["cogs"] = 0;
							$segList[$key]["operating_expense"] = 0;
							$segList[$key]["depreciation_expense"] = $val;
							$segList[$key]["other_revenue"] = 0;
							$segList[$key]["other_expense"] = 0;
							$segList[$key]["financing_cost"] = 0;
							$segList[$key]["tax_expense"] = 0;
						}

						//Other Revenue
						if($value["type_id"]=="39"){
							$segList[$key]["revenue"] = 0;
							$segList[$key]["cogs"] = 0;
							$segList[$key]["operating_expense"] = 0;
							$segList[$key]["depreciation_expense"] = 0;
							$segList[$key]["other_revenue"] = $val;
							$segList[$key]["other_expense"] = 0;
							$segList[$key]["financing_cost"] = 0;
							$segList[$key]["tax_expense"] = 0;
						}

						//Other Expense
						if($value["type_id"]=="40"){
							$segList[$key]["revenue"] = 0;
							$segList[$key]["cogs"] = 0;
							$segList[$key]["operating_expense"] = 0;
							$segList[$key]["depreciation_expense"] = 0;
							$segList[$key]["other_revenue"] = 0;
							$segList[$key]["other_expense"] = $val;
							$segList[$key]["financing_cost"] = 0;
							$segList[$key]["tax_expense"] = 0;
						}

						//Financing Cost
						if($value["type_id"]=="41"){
							$segList[$key]["revenue"] = 0;
							$segList[$key]["cogs"] = 0;
							$segList[$key]["operating_expense"] = 0;
							$segList[$key]["depreciation_expense"] = 0;
							$segList[$key]["other_revenue"] = 0;
							$segList[$key]["other_expense"] = 0;
							$segList[$key]["financing_cost"] = $val;
							$segList[$key]["tax_expense"] = 0;
						}

						//Tax Expense
						if($value["type_id"]=="42"){
							$segList[$key]["revenue"] = 0;
							$segList[$key]["cogs"] = 0;
							$segList[$key]["operating_expense"] = 0;
							$segList[$key]["depreciation_expense"] = 0;
							$segList[$key]["other_revenue"] = 0;
							$segList[$key]["other_expense"] = 0;
							$segList[$key]["financing_cost"] = 0;
							$segList[$key]["tax_expense"] = $val;
						}
					}					
				}
			}

			//Revenue
			$totalRevenue = 0;
			foreach ($typeList as $value) {
				if($value["id"]=="35"){
					$totalRevenue += $value["amount"];
					
					$data["results"][] = $value;
				}
			}

			//COGS
			$totalCOGS = 0;
			foreach ($typeList as $value) {
				if($value["id"]=="36"){
					$totalCOGS += $value["amount"];

					$data["results"][] = $value;
				}
			}

			$gpBySeg = [];
			$ebitdaBySeg = [];
			$ebitBySeg = [];
			$profitBeforeTaxBySeg = [];
			$profitForTheYearBySeg = [];
			foreach ($segList as $key => $value) {
				$gpAmount = $value["revenue"] - $value["cogs"];
				$ebitdaAmount = ($gpAmount + $value["other_revenue"]) - $value["operating_expense"];
				$ebitAmount = $ebitdaAmount + ($value["depreciation_expense"] + $value["other_expense"]);
				$profitBeforeTaxAmount = $ebitAmount - $value["financing_cost"];
				$profitForTheYearAmount = $profitBeforeTaxAmount - $value["tax_expense"];

				$gpBySeg[] = $gpAmount;
				$ebitdaBySeg[] = $ebitdaAmount;
				$ebitBySeg[] = $ebitAmount;
				$profitBeforeTaxBySeg[] = $profitBeforeTaxAmount;
				$profitForTheYearBySeg[] = $profitForTheYearAmount;
			}

			//Gross Profit
			$grossProfit = $totalRevenue - $totalCOGS;
			$data["results"][] = array(
				"id"			=> 0, 
				"name"			=> "Gross Profit", 
				"amount"		=> $grossProfit,
				"segment_lines" => $gpBySeg
			);

			//Other Revenue
			$totalOtherRevenue = 0;
			foreach ($typeList as $value) {
				if($value["id"]=="39"){
					$totalOtherRevenue += $value["amount"];

					$data["results"][] = $value;
				}
			}

			//Operating Expense
			$totalOperatingExpense = 0;
			foreach ($typeList as $value) {
				if($value["id"]=="37"){
					$totalOperatingExpense += $value["amount"];

					$data["results"][] = $value;
				}
			}

			//EBITDA
			$EBITDA = ($grossProfit + $totalOtherRevenue) - $totalOperatingExpense;
			$data["results"][] = array(
				"id"			=> 0, 
				"name"			=> "Operating Income(EBITDA)", 
				"amount"		=> $EBITDA,
				"segment_lines" => $ebitdaBySeg
			);

			//Depreciation Expense
			$totalDepreciationExpense = 0;
			foreach ($typeList as $value) {
				if($value["id"]=="38"){
					$totalDepreciationExpense += $value["amount"];

					$data["results"][] = $value;
				}
			}

			//Other Expense
			$totalOtherExpense = 0;
			foreach ($typeList as $value) {
				if($value["id"]=="40"){
					$totalOtherExpense += $value["amount"];

					$data["results"][] = $value;
				}
			}

			//EBIT
			$EBIT = $EBITDA - ($totalDepreciationExpense + $totalOtherExpense);
			$data["results"][] = array(
				"id" 			=> 0, 
				"name" 			=> "Earning Before Interest And Tax(EBIT)", 
				"amount" 		=> $EBIT,
				"segment_lines" => $ebitBySeg
			);


			//Financing Cost
			$totalFinancingCost = 0;
			foreach ($typeList as $value) {
				if($value["id"]=="41"){
					$totalFinancingCost += $value["amount"];

					$data["results"][] = $value;
				}
			}

			//Profit Before Tax
			$ProfitBeforeTax = $EBIT - $totalFinancingCost;
			$data["results"][] = array(
				"id" 			=> 0, 
				"name" 			=> "Profit Before Tax", 
				"amount"		=> $ProfitBeforeTax,
				"segment_lines" => $profitBeforeTaxBySeg
			);


			//Tax Expense
			$totalTaxExpense = 0;
			foreach ($typeList as $value) {
				if($value["id"]=="42"){
					$totalTaxExpense += $value["amount"];

					$data["results"][] = $value;
				}
			}

			//Profit For The Year
			$ProfitForTheYear = $ProfitBeforeTax - $totalTaxExpense;
			$data["results"][] = array(
				"id" 			=> 0, 
				"name" 			=> "Profit For The Year", 
				"amount" 		=> $ProfitForTheYear,
				"segment_lines" => $profitForTheYearBySeg
			);


			$data["count"] = count($data["results"]);			
		}

		//Response Data		
		$this->response($data, 200);	
	}	
	
	//GET PROFIBILITY SUMMARY BY JOB
	function profitability_summary_by_job_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$objList = [];

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$accountLine = new Account_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
		
		//Sort
		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				if(isset($value['operator'])){
					$obj->{$value['operator']}($value["field"], $value["dir"]);
					$accountLine->{$value['operator']}($value["field"], $value["dir"]);
				}else{
					$obj->order_by($value["field"], $value["dir"]);
					$accountLine->order_by($value["field"], $value["dir"]);
				}
			}
		}
		
		//Filter
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter["filters"] as $value) {
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);
	    			$accountLine->{$value['operator']}($value['field'], $value['value']);
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    			$accountLine->where($value['field'], $value['value']);
	    		}
			}
		}
		
		//TRANSACTION
		$obj->include_related("job", array("name"));
		$obj->include_related("contact", array("abbr", "number", "name"));
		$obj->where_in("type", array("Cash_Purchase", "Credit_Purchase","Purchase_Return","Payment_Refund","Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale","Sale_Return","Cash_Refund", "purchase_expense", "Direct_Expense", "internal_usage", "journal_line", "advance_settlement"));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->get_iterated();
		
		if($obj->exists()){			
			foreach ($obj as $value) {
				$revenue = 0;
				$expense = 0;

				if($value->type=="Cash_Purchase" || $value->type=="Credit_Purchase" || $value->type=="Direct_Expense" || $value->type=="journal_line" || $value->type=="advance_settlement"){
					$expense += floatval($value->amount) / floatval($value->rate);
				}else if($value->type=="Purchase_Return" || $value->type=="Payment_Refund"){
					$expense -= floatval($value->amount) / floatval($value->rate);
				}else if($value->type=="Sale_Return" || $value->type=="Cash_Refund"){
					$revenue -= floatval($value->amount) / floatval($value->rate);
				}else{
					$revenue += floatval($value->amount) / floatval($value->rate);
				}

				if(isset($objList[$value->job_id])){
					$objList[$value->job_id]["revenue"] += $revenue;
					$objList[$value->job_id]["expense"] += $expense;
				}else{
					$objList[$value->job_id]["id"] 					= $value->id;
					$objList[$value->job_id]["customer_name"] 		= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->job_id]["job_id"] 				= $value->job_id;
					$objList[$value->job_id]["name"] 				= $value->job_name;
					$objList[$value->job_id]["type"] 				= $value->type;
					$objList[$value->job_id]["number"] 				= $value->number;
					$objList[$value->job_id]["issued_date"] 		= $value->issued_date;
					$objList[$value->job_id]["rate"] 				= $value->rate;
					$objList[$value->job_id]["revenue"] 			= $revenue;
					$objList[$value->job_id]["expense"] 			= $expense;
				}
			}		
		}

		//ACCOUNT LINE
		$accountLine->include_related("transaction/job", array("name"));
		$accountLine->include_related("account", array("account_type_id"));
		$accountLine->include_related("transaction", array("type", "number", "issued_date", "memo","amount", "rate","job_id"));
		$accountLine->where_in_related("account", "account_type_id", array(35,36,37,38,39,40,41,42));
		$accountLine->where_related("transaction", "is_recurring <>", 1);
		$accountLine->where_related("transaction", "deleted <>", 1);
		$accountLine->get_iterated();
		
		if($accountLine->exists()){
			foreach ($accountLine as $value) {
				$revenue = 0;
				$expense = 0;				
				if($value->account_account_type_id=="35"){
					$revenue = floatval($value->amount) / floatval($value->transaction_rate);				
				}else{
					$expense = floatval($value->amount) / floatval($value->transaction_rate);					
				}

				if(isset($objList[$value->job_id])){
					$objList[$value->job_id]["revenue"] += $revenue;
					$objList[$value->job_id]["expense"] += $expense;
				}else{
					$objList[$value->job_id]["id"] 			= $value->transaction_id;
					$objList[$value->job_id]["job_id"] 		= $value->job_id;
					$objList[$value->job_id]["name"] 		= $value->transaction_job_name;
					$objList[$value->job_id]["type"] 		= $value->transaction_type;
					$objList[$value->job_id]["number"] 		= $value->transaction_number;
					$objList[$value->job_id]["issued_date"] = $value->transaction_issued_date;
					$objList[$value->job_id]["rate"] 		= $value->transaction_rate;
					$objList[$value->job_id]["revenue"] 	= $revenue;
					$objList[$value->job_id]["expense"] 	= $expense;
				}
			}
		}

		if(count($objList)>0){
			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data		
		$this->response($data, 200);	
	}

	//GET PROFIBILITY DETAIL BY JOB
	function profitability_detail_by_job_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$objList = [];

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$accountLine = new Account_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
		
		//Sort
		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				if(isset($value['operator'])){
					$obj->{$value['operator']}($value["field"], $value["dir"]);
					$accountLine->{$value['operator']}($value["field"], $value["dir"]);
				}else{
					$obj->order_by($value["field"], $value["dir"]);
					$accountLine->order_by($value["field"], $value["dir"]);
				}
			}
		}
		
		//Filter
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter["filters"] as $value) {
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);
	    			$accountLine->{$value['operator']}($value['field'], $value['value']);
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    			$accountLine->where($value['field'], $value['value']);
	    		}
			}
		}
		
		//TRANSACTION
		$obj->include_related("job", array("name"));
		$obj->where_in("type", array("Cash_Purchase", "Credit_Purchase","Purchase_Return","Payment_Refund","Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale","Sale_Return","Cash_Refund", "purchase_expense", "direct_expense", "internal_usage", "journal_line", "advance_settlement"));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->get_iterated();
		
		if($obj->exists()){			
			foreach ($obj as $value) {
				$revenue = 0;
				$expense = 0;

				if($value->type=="Cash_Purchase" || $value->type=="Credit_Purchase" || $value->type=="Direct_Expense" || $value->type=="journal_line" || $value->type=="advance_settlement") {
					$expense += floatval($value->amount) / floatval($value->rate);
				}else if($value->type=="Purchase_Return" || $value->type=="Payment_Refund"){
					$expense -= floatval($value->amount) / floatval($value->rate);
				}else if($value->type=="Sale_Return" || $value->type=="Cash_Refund"){
					$revenue -= floatval($value->amount) / floatval($value->rate);
				}else{
					$revenue += floatval($value->amount) / floatval($value->rate);
				}

				if(isset($objList[$value->job_id])){
					$objList[$value->job_id]["line"][] = array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"number" 			=> $value->number,
						"issued_date" 		=> $value->issued_date,
						"description" 		=> $value->memo,
						"rate" 				=> $value->rate,
						"revenue" 			=> $revenue,
						"expense" 			=> $expense
					);
				}else{
					$objList[$value->job_id]["id"] 			= $value->job_id;
					$objList[$value->job_id]["name"] 		= $value->job_name;
					$objList[$value->job_id]["line"][] 		= array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"number" 			=> $value->number,
						"issued_date" 		=> $value->issued_date,
						"description" 		=> $value->memo,
						"rate" 				=> $value->rate,
						"revenue" 			=> $revenue,
						"expense" 			=> $expense
					);			
				}
			}		
		}

		//ACCOUNT LINE
		$accountLine->include_related("transaction/job", array("name"));
		$accountLine->include_related("account", array("account_type_id"));
		$accountLine->include_related("transaction", array("type", "number", "issued_date", "memo","amount", "rate","job_id"));
		$accountLine->where_in_related("account", "account_type_id", array(35,36,37,38,39,40,41,42));
		$accountLine->where_related("transaction", "is_recurring <>", 1);
		$accountLine->where_related("transaction", "deleted <>", 1);
		$accountLine->get_iterated();
		
		if($accountLine->exists()){
			foreach ($accountLine as $value) {
				$data["jobs"][] = $value->job_id;
				$revenue = 0;
				$expense = 0;				
				if($value->account_account_type_id=="35"){
					$revenue = floatval($value->amount) / floatval($value->transaction_rate);				
				}else{
					$expense = floatval($value->amount) / floatval($value->transaction_rate);					
				}

				if(isset($objList[$value->job_id])){
					$objList[$value->job_id]["line"][] = array(
						"id" 				=> $value->transaction_id,
						"type" 				=> $value->transaction_type,
						"number" 			=> $value->transaction_number,
						"issued_date" 		=> $value->transaction_issued_date,
						"description" 		=> $value->description,
						"rate" 				=> $value->transaction_rate,
						"revenue" 			=> $revenue,
						"expense" 			=> $expense
					);
				}else{
					$objList[$value->job_id]["id"] 			= $value->job_id;
					$objList[$value->job_id]["name"] 		= $value->transaction_job_name;
					$objList[$value->job_id]["line"][] 		= array(
						"id" 				=> $value->transaction_id,
						"type" 				=> $value->transaction_type,
						"number" 			=> $value->transaction_number,
						"issued_date" 		=> $value->transaction_issued_date,
						"description" 		=> $value->description,
						"rate" 				=> $value->transaction_rate,
						"revenue" 			=> $revenue,
						"expense" 			=> $expense
					);			
				}
			}
		}

		if(count($objList)>0){
			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data		
		$this->response($data, 200);	
	}	
}
/* End of file accounting_modules.php */
/* Location: ./application/controllers/api/accounting_modules.php */