<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Accounting_reports extends REST_Controller {	
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
			
			//Fiscal Date
			//Note: selecting date must greater than startFiscalDate AND smaller or equal to endFiscalDate
			$this->fiscalDate = $institute->fiscal_date;
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
	

	//GET FINANCIAL SNAPSHOT
	function financial_snapshot_get() {		
		$filters 	= $this->get("filte r")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;
		$today = date("Y-m-d");


		//INCOME (Begin FiscalDate To As Of)
		$income = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$income->where_in_related("account/account_type", "id", array(35,39));
		$income->where_related("transaction", "issued_date >", $this->startFiscalDate);
		$income->where_related("transaction", "issued_date <=", $today);
		$income->where_related("transaction", "is_recurring", 0);
		$income->where_related("transaction", "deleted", 0);
		$income->where("deleted", 0);		
		$income->get_iterated();
		
		//Sum Dr and Cr					
		$incomeDr = 0;
		$incomeCr = 0;
		foreach ($income as $value) {			
			if($value->dr>0){
				$incomeDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$incomeCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalIncome = $incomeCr - $incomeDr;
		//END INCOME


		//EXPENSE (Begin FiscalDate To As Of)
		$expense = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$expense->where_in_related("account/account_type", "id", array(36,37,38,40,41,42));
		$expense->where_related("transaction", "issued_date >", $this->startFiscalDate);
		$expense->where_related("transaction", "issued_date <=", $today);
		$expense->where_related("transaction", "is_recurring", 0);
		$expense->where_related("transaction", "deleted", 0);
		$expense->where("deleted", 0);		
		$expense->get_iterated();
		
		//Sum Dr and Cr					
		$expenseDr = 0;
		$expenseCr = 0;
		foreach ($expense as $value) {			
			if($value->dr>0){
				$expenseDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$expenseCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalExpense = $expenseDr - $expenseCr;
		//END EXPENSE

		//ASSET (As Of)
		$asset = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$asset->where_in_related("account/account_type", "id", array(10,11,12,13,14,15,16,17,18,19,20,21,22));
		$asset->where_related("transaction", "issued_date <=", $today);
		$asset->where_related("transaction", "is_recurring", 0);
		$asset->where_related("transaction", "deleted", 0);
		$asset->where("deleted", 0);		
		$asset->get_iterated();
		
		//Sum Dr and Cr					
		$assetDr = 0;
		$assetCr = 0;
		foreach ($asset as $value) {			
			if($value->dr>0){
				$assetDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$assetCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalAsset = $assetDr - $assetCr;
		//END ASSET

		//LIABILITY (As Of)
		$liability = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$liability->where_in_related("account/account_type", "id", array(23,24,25,26,27,28,29,30,31,32));
		$liability->where_related("transaction", "issued_date <=", $today);
		$liability->where_related("transaction", "is_recurring", 0);
		$liability->where_related("transaction", "deleted", 0);
		$liability->where("deleted", 0);		
		$liability->get_iterated();
		
		//Sum Dr and Cr					
		$liabilityDr = 0;
		$liabilityCr = 0;
		foreach ($liability as $value) {			
			if($value->dr>0){
				$liabilityDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$liabilityCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalLiability = $liabilityCr - $liabilityDr;
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
		$filters 	= $this->get("filte r")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;
		$today = date("Y-m-d");


		//INCOME (Begin FiscalDate To As Of)
		$income = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$income->where_in_related("account/account_type", "id", array(35,39));
		$income->where_related("transaction", "issued_date >", $this->startFiscalDate);
		$income->where_related("transaction", "issued_date <=", $today);
		$income->where_related("transaction", "is_recurring", 0);
		$income->where_related("transaction", "deleted", 0);
		$income->where("deleted", 0);		
		$income->get_iterated();
		
		//Sum dr and cr					
		$incomeDr = 0;
		$incomeCr = 0;
		foreach ($income as $value) {			
			if($value->dr>0){
				$incomeDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$incomeCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalIncome = $incomeCr - $incomeDr;
		//END INCOME


		//EXPENSE (Begin FiscalDate To As Of)
		$expense = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$expense->where_in_related("account/account_type", "id", array(36,37,38,40,41,42));
		$expense->where_related("transaction", "issued_date >", $this->startFiscalDate);
		$expense->where_related("transaction", "issued_date <=", $today);
		$expense->where_related("transaction", "is_recurring", 0);
		$expense->where_related("transaction", "deleted", 0);
		$expense->where("deleted", 0);		
		$expense->get_iterated();
		
		//Sum Dr and Cr					
		$expenseDr = 0;
		$expenseCr = 0;
		foreach ($expense as $value) {			
			if($value->dr>0){
				$expenseDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$expenseCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalExpense = $expenseDr - $expenseCr;
		//END EXPENSE


		//EXPENSE EBIT (Begin FiscalDate To As Of)
		$expenseEBIT = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$expenseEBIT->where_in_related("account/account_type", "id", array(36,37,38,40));
		$expenseEBIT->where_related("transaction", "issued_date >", $this->startFiscalDate);
		$expenseEBIT->where_related("transaction", "issued_date <=", $today);
		$expenseEBIT->where_related("transaction", "is_recurring", 0);
		$expenseEBIT->where_related("transaction", "deleted", 0);
		$expenseEBIT->where("deleted", 0);		
		$expenseEBIT->get_iterated();
		
		//Sum Dr and Cr					
		$expenseEBITDr = 0;
		$expenseEBITCr = 0;
		foreach ($expenseEBIT as $value) {			
			if($value->dr>0){
				$expenseEBITDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$expenseEBITCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalExpenseEBIT = $expenseEBITDr - $expenseEBITCr;
		//END EXPENSE EBIT


		//ASSET (As Of)
		$asset = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$asset->where_in_related("account/account_type", "id", array(10,11,12,13,14,15,16,17,18,19,20,21,22));
		$asset->where_related("transaction", "issued_date <=", $today);
		$asset->where_related("transaction", "is_recurring", 0);
		$asset->where_related("transaction", "deleted", 0);
		$asset->where("deleted", 0);		
		$asset->get_iterated();
		
		//Sum Dr and Cr					
		$assetDr = 0;
		$assetCr = 0;
		foreach ($asset as $value) {			
			if($value->dr>0){
				$assetDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$assetCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalAsset = $assetDr - $assetCr;
		//END ASSET


		//QUICK CURRENT ASSET (As Of)
		$quickCurrentAsset = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$quickCurrentAsset->where_in_related("account/account_type", "id", array(10,11,12,14,15));
		$quickCurrentAsset->where_related("transaction", "issued_date <=", $today);
		$quickCurrentAsset->where_related("transaction", "is_recurring", 0);
		$quickCurrentAsset->where_related("transaction", "deleted", 0);
		$quickCurrentAsset->where("deleted", 0);		
		$quickCurrentAsset->get_iterated();
		
		//Sum Dr and Cr					
		$quickCurrentAssetDr = 0;
		$quickCurrentAssetCr = 0;
		foreach ($quickCurrentAsset as $value) {			
			if($value->dr>0){
				$quickCurrentAssetDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$quickCurrentAssetCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalQuickCurrentAsset = $quickCurrentAssetDr - $quickCurrentAssetCr;
		//END QUICK CURRENT ASSET


		//CURRENT ASSET (As Of)
		$currentAsset = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$currentAsset->where_in_related("account/account_type", "id", array(10,11,12,13,14,15));
		$currentAsset->where_related("transaction", "issued_date <=", $today);
		$currentAsset->where_related("transaction", "is_recurring", 0);
		$currentAsset->where_related("transaction", "deleted", 0);
		$currentAsset->where("deleted", 0);		
		$currentAsset->get_iterated();
		
		//Sum Dr and Cr					
		$currentAssetDr = 0;
		$currentAssetCr = 0;
		foreach ($currentAsset as $value) {			
			if($value->dr>0){
				$currentAssetDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$currentAssetCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalCurrentAsset = $currentAssetDr - $currentAssetCr;
		//END CURRENT ASSET


		//CASH RATIO (As Of)
		$cashRatio = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$cashRatio->where_related("account/account_type", "id", 10);
		$cashRatio->where_related("transaction", "issued_date <=", $today);
		$cashRatio->where_related("transaction", "is_recurring", 0);
		$cashRatio->where_related("transaction", "deleted", 0);
		$cashRatio->where("deleted", 0);		
		$cashRatio->get_iterated();
		
		//Sum Dr and Cr					
		$cashRatioDr = 0;
		$cashRatioCr = 0;
		foreach ($cashRatio as $value) {			
			if($value->dr>0){
				$cashRatioDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$cashRatioCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalCashRatio = $cashRatioDr - $cashRatioCr;
		//END CASH RATIO


		//LIABILITY (As Of)
		$liability = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$liability->where_in_related("account/account_type", "id", array(23,24,25,26,27,28,29,30,31,32));
		$liability->where_related("transaction", "issued_date <=", $today);
		$liability->where_related("transaction", "is_recurring", 0);
		$liability->where_related("transaction", "deleted", 0);
		$liability->where("deleted", 0);		
		$liability->get_iterated();
		
		//Sum Dr and Cr					
		$liabilityDr = 0;
		$liabilityCr = 0;
		foreach ($liability as $value) {			
			if($value->dr>0){
				$liabilityDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$liabilityCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalLiability = $liabilityCr - $liabilityDr;
		//END LIABILITY


		//CURRENT LIABILITY (As Of)
		$currentLiability = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$currentLiability->where_in_related("account/account_type", "id", array(23,24,25,26,27));
		$currentLiability->where_related("transaction", "issued_date <=", $today);
		$currentLiability->where_related("transaction", "is_recurring", 0);
		$currentLiability->where_related("transaction", "deleted", 0);
		$currentLiability->where("deleted", 0);		
		$currentLiability->get_iterated();
		
		//Sum Dr and Cr					
		$currentLiabilityDr = 0;
		$currentLiabilityCr = 0;
		foreach ($currentLiability as $value) {			
			if($value->dr>0){
				$currentLiabilityDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$currentLiabilityCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalCurrentLiability = $currentLiabilityCr - $currentLiabilityDr;
		//END CURRENT LIABILITY		


		//COGS (Begin FiscalDate To As Of)
		$cogs = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$cogs->where_related("account/account_type", "id", 36);
		$cogs->where_related("transaction", "issued_date >", $this->startFiscalDate);
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


		//INVENTORY (As Of)
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


		//AR (As Of)
		$ar = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$ar->where_related("account/account_type", "id", 12);
		$ar->where_related("transaction", "issued_date <=", $today);
		$ar->where_related("transaction", "is_recurring", 0);
		$ar->where_related("transaction", "deleted", 0);
		$ar->where("deleted", 0);		
		$ar->get_iterated();
		
		//Sum Dr and Cr					
		$arDr = 0;
		$arCr = 0;
		foreach ($ar as $value) {			
			if($value->dr>0){
				$arDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$arCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalAR = $arDr - $arCr;
		//END AR


		//AP (As Of)
		$ap = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$ap->where_related("account/account_type", "id", 23);
		$ap->where_related("transaction", "issued_date <=", $today);
		$ap->where_related("transaction", "is_recurring", 0);
		$ap->where_related("transaction", "deleted", 0);
		$ap->where("deleted", 0);		
		$ap->get_iterated();
		
		//Sum Dr and Cr					
		$apDr = 0;
		$apCr = 0;
		foreach ($ap as $value) {			
			if($value->dr>0){
				$apDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$apCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalAP = $apCr - $apDr;
		//END AP


		//SALE (Begin FiscalDate To As Of)
		$sale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$sale->where_in("type", array("Invoice","Cash_Sale","Sale_Return"));
		$sale->where("issued_date >", $this->startFiscalDate);
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


		//CREDIT SALE (Begin FiscalDate To As Of)
		$creditSale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$creditSale->where("type", "Invoice");
		$creditSale->where("issued_date >", $this->startFiscalDate);
		$creditSale->where("issued_date <=", $today);
		$creditSale->where("is_recurring", 0);
		$creditSale->where("deleted", 0);
		$creditSale->get_iterated();
		
		//Sum Sale					
		$totalCreditSale = 0;
		foreach ($creditSale as $value) {
			$totalCreditSale += floatval($value->amount) / floatval($value->rate);
		}
		//END CREDIT SALE


		//CREDIT PURCHASE (Begin FiscalDate To As Of)
		$creditPurchase = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$creditPurchase->where("type", "Credit_Purchase");
		$creditPurchase->where("issued_date >", $this->startFiscalDate);
		$creditPurchase->where("issued_date <=", $today);
		$creditPurchase->where("is_recurring", 0);
		$creditPurchase->where("deleted", 0);
		$creditPurchase->get_iterated();
		
		//Sum Purchase					
		$totalCreditPurchase = 0;
		foreach ($creditPurchase as $value) {
			$totalCreditPurchase += floatval($value->amount) / floatval($value->rate);
		}
		//END CREDIT PURCHASE


		//TRANSACTION RECORDED (Begin FiscalDate To As Of)
		$txnRecorded = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$txnRecorded->where("is_journal", 1);
		$txnRecorded->where("issued_date >", $this->startFiscalDate);
		$txnRecorded->where("issued_date <=", $today);
		$txnRecorded->where("is_recurring", 0);
		$txnRecorded->where("deleted", 0);
		
		$totalTxnRecorded = $txnRecorded->count();
		//END TRANSACTION RECORDED


		$returnOnAsset = $totalSale / ($totalAsset - $totalCurrentLiability);
		$ebit = ($totalIncome - $totalExpenseEBIT) / $totalSale;

		//Days
		$date1 = new DateTime($this->startFiscalDate);
		$date2 = new DateTime($today);
		$days = $date2->diff($date1)->format("%a")-1;

		$arCollectionPeriod = ($totalAR / $totalCreditSale) * $days;
		$apPaymentPeriod = ($totalAP / $totalCreditPurchase) * $days;
		$inventoryTurnOver = ($totalInventory / $totalCOGS) * $days;
		
		$data["results"][] = array(
			"id" 					=> 0,
			"income" 				=> $totalIncome,
			"expense" 				=> $totalExpense,				
		   	"net_income" 			=> $totalIncome - $totalExpense,

		   	"asset" 				=> $totalAsset,
		   	"liability" 			=> $totalLiability,
		   	"equity" 				=> $totalAsset - $totalLiability,

			"quickRatio" 			=> $totalQuickCurrentAsset / $totalCurrentLiability,
			"currentRatio" 			=> $totalCurrentAsset / $totalCurrentLiability,				
		   	"cashRatio" 			=> $totalCashRatio / $totalCurrentLiability,

		   	"wcSale"				=> ($totalCurrentAsset - $totalCurrentLiability) / $totalSale,
		   	"grossProfitMargin"		=> ($totalSale - $totalCOGS) / $totalSale,
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
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;

		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
		
		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by_related("transaction", $value["field"], $value["dir"]);
			}
		}
		
		//Filter		
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {
	    		$obj->where_related("transaction", $value["field"], $value["value"]);
			}									 			
		}
		
		$obj->include_related("transaction", array("type", "number", "issued_date", "memo"));
		$obj->include_related("account", array("number","name"));
		$obj->include_related("contact", array("abbr","number","name"));
		$obj->where_related("transaction", "is_journal", 1);
		$obj->where_related("transaction", "is_recurring", 0);		
		$obj->where_related("transaction", "deleted", 0);
		$obj->where("deleted", 0);
		$obj->order_by("dr", "desc");
		
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				if(isset($objList[$value->transaction_id])){
					$objList[$value->transaction_id]["line"][] = array(
						"id" 			=> $value->id,
						"description" 	=> $value->description,
						"reference_no" 	=> $value->reference_no,
						"segments" 		=> $value->segments,
						"dr" 			=> floatval($value->dr),
						"cr" 			=> floatval($value->cr),
						"rate" 			=> floatval($value->rate),
						"locale" 		=> $value->locale,
						"account" 		=> $value->account_name,
						"contact" 		=> $value->contact_name
					);
				}else{
					$objList[$value->transaction_id]["id"] = $value->transaction_id;
					$objList[$value->transaction_id]["type"] = $value->transaction_type;
					$objList[$value->transaction_id]["number"] = $value->transaction_number;
					$objList[$value->transaction_id]["issued_date"] = $value->transaction_issued_date;
					$objList[$value->transaction_id]["memo"] = $value->transaction_memo;
					$objList[$value->transaction_id]["line"][] = array(
						"id" 			=> $value->id,
						"description" 	=> $value->description,
						"reference_no" 	=> $value->reference_no,
						"segments" 		=> $value->segments,
						"dr" 			=> floatval($value->dr),
						"cr" 			=> floatval($value->cr),
						"rate" 			=> floatval($value->rate),
						"locale" 		=> $value->locale,
						"account" 		=> $value->account_name,
						"contact" 		=> $value->contact_name
					);			
				}
			}

			foreach ($objList as $value) {				
				$data["results"][] = $value;
			}			
		}		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET JOURNAL SUMMARY
	function journal_summary_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;

		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
		
		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by_related("transaction", $value["field"], $value["dir"]);
				$txn->order_by($value["field"], $value["dir"]);
			}
		}
		
		//Filter		
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {
	    		$obj->where_related("transaction", $value["field"], $value["value"]);
	    		$txn->where($value["field"], $value["value"]);
			}									 			
		}
		
		$obj->where_related("transaction", "is_journal", 1);
		$obj->where_related("transaction", "is_recurring", 0);		
		$obj->where_related("transaction", "deleted", 0);
		$obj->where("deleted", 0);
		
		//Results
		$obj->get_iterated();

		//Txn
		$txn->where("is_journal", 1);
		$txn->where("is_recurring", 0);
		$txn->where("deleted", 0);
		

		$totalDr = 0;
		$totalCr = 0;
		foreach ($obj as $value) {
			$totalDr += floatval($value->dr) / floatval($value->rate);
			$totalCr += floatval($value->cr) / floatval($value->rate);
		}

		$data["results"][] = array(
			"id" 		=> 0,
			"dr" 		=> $totalDr,				
		   	"cr" 		=> $totalCr,
		   	"totalTxn" 	=> $txn->count()
		);			

		$data["count"] = count($data["results"]);		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET GENERAL LEDGER
	function general_ledger_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;

		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
		
		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by_related("transaction", $value["field"], $value["dir"]);
			}
		}
		
		//Filter		
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {
	    		$obj->where_related("transaction", $value["field"], $value["value"]);
			}									 			
		}
		
		$obj->include_related("transaction", array("type", "number", "issued_date", "memo"));
		$obj->include_related("account", array("number","name"));
		
		$obj->where_related("transaction", "is_journal", 1);
		$obj->where_related("transaction", "is_recurring", 0);		
		$obj->where_related("transaction", "deleted", 0);
		$obj->where("deleted", 0);
		$obj->order_by("dr", "desc");
		
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				if(isset($objList[$value->account_id])){
					$objList[$value->account_id]["line"][] = array(
						"id" 			=> $value->transaction_id,
						"type" 			=> $value->transaction_type,
						"number" 		=> $value->transaction_number,
						"issued_date" 	=> $value->transaction_issued_date,
						"memo" 			=> $value->transaction_memo,
						"dr" 			=> floatval($value->dr),
						"cr" 			=> floatval($value->cr),
						"rate" 			=> floatval($value->rate),
						"locale" 		=> $value->locale
					);
				}else{
					$objList[$value->account_id]["id"] = $value->account_id;
					$objList[$value->account_id]["type"] = $value->transaction_type;
					$objList[$value->account_id]["line"][] = array(
						"id" 			=> $value->transaction_id,
						"type" 			=> $value->transaction_type,
						"number" 		=> $value->transaction_number,
						"issued_date" 	=> $value->transaction_issued_date,
						"memo" 			=> $value->transaction_memo,
						"dr" 			=> floatval($value->dr),
						"cr" 			=> floatval($value->cr),
						"rate" 			=> floatval($value->rate),
						"locale" 		=> $value->locale
					);			
				}
			}

			foreach ($objList as $value) {				
				$data["results"][] = $value;
			}			
		}		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET TRIAL BALANCE
	function trial_balance_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;
		
		$asOf = date("Y-m-d");
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {
	    		$asOf = $value["value"];
			}									 			
		}				

		//Fiscal Date
		//Note: selecting date must greater than startFiscalDate AND smaller or equal to endFiscalDate		
		$asOfYear = date("Y",strtotime($asOf));
		$fdate = $asOfYear ."-". $this->fiscalDate;
		if($asOf > $fdate){
			$startDate 	= $asOfYear ."-". $this->fiscalDate;
			$endDate 	= intval($asOfYear)+1 ."-". $this->fiscalDate;
		}else{
			$startDate 	= intval($asOfYear)-1 ."-". $this->fiscalDate;
			$endDate 	= $asOfYear ."-". $this->fiscalDate;
		}

		
		//BALANCE SHEET (As Of)
		$balanceSheet = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$balanceSheet->include_related("account", array("number","name"));
		$balanceSheet->include_related("account/account_type", array("name","nature"));		
		$balanceSheet->where_related("account", "account_type_id >=", 10);
		$balanceSheet->where_related("account", "account_type_id <=", 33);
		$balanceSheet->where_related("transaction", "issued_date <=", $asOf);
		$balanceSheet->where_related("transaction", "is_recurring", $is_recurring);
		$balanceSheet->where_related("transaction", "deleted", $deleted);
		$balanceSheet->where("deleted", $deleted);		
		$balanceSheet->get_iterated();
		
		//Sum Dr and Cr					
		$accountList = [];
		foreach ($balanceSheet as $value) {
			$dr = 0;
			$cr = 0;
			if($value->dr>0){
				$dr = floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$cr = floatval($value->cr) / floatval($value->rate);
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
		$currPL->include_related("account", array("number","name"));
		$currPL->include_related("account/account_type", array("name","nature"));		
		$currPL->where_related("account", "account_type_id >=", 35);
		$currPL->where_related("account", "account_type_id <=", 43);
		$currPL->where_related("transaction", "issued_date >", $startDate);
		$currPL->where_related("transaction", "issued_date <=", $asOf);
		$currPL->where_related("transaction", "is_recurring", $is_recurring);
		$currPL->where_related("transaction", "deleted", $deleted);		
		$currPL->where("deleted", $deleted);
		$currPL->get_iterated();

		//Sum dr and cr					
		$accountList = [];		
		foreach ($currPL as $value) {
			$dr = 0;
			$cr = 0;
			if($value->dr>0){
				$dr = floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$cr = floatval($value->cr) / floatval($value->rate);
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
		$prevPL->where_related("account", "account_type_id >=", 35);
		$prevPL->where_related("account", "account_type_id <=", 43);
		$prevPL->where_related("transaction", "issued_date <=", $startDate);
		$prevPL->where_related("transaction", "is_recurring", $is_recurring);
		$prevPL->where_related("transaction", "deleted", $deleted);		
		$prevPL->where("deleted", $deleted);
		$prevPL->get_iterated();

		//Sum dr and cr
		$sumDr = 0;
		$sumCr = 0;		
		foreach ($prevPL as $value) {			
			if($value->dr>0){
				$sumDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$sumCr += floatval($value->cr) / floatval($value->rate);
			}		
		}
		$prevPLAmount = $sumCr - $sumDr;
		//END PREVIOUSE PROFIT AND LOSS
		

		//RETAINED EARNING (As Of)
		$retainEarning = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$retainEarning->where("account_id", 70);
		$retainEarning->where_related("transaction", "issued_date <=", $asOf);		
		$retainEarning->where_related("transaction", "is_recurring", $is_recurring);
		$retainEarning->where_related("transaction", "deleted", $deleted);		
		$retainEarning->where("deleted", $deleted);
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
			if($value->dr>0){
				$sumDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$sumCr += floatval($value->cr) / floatval($value->rate);
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

	//GET BALANCE SHEET
	function balance_sheet_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$deleted = 0;
		
		$asOf = date("Y-m-d");
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {
	    		$asOf = $value["value"];
			}									 			
		}				

		//Fiscal Date
		//Note: selecting date must greater than startFiscalDate AND smaller or equal to endFiscalDate		
		$asOfYear = date("Y",strtotime($asOf));
		$fdate = $asOfYear ."-". $this->fiscalDate;
		if($asOf > $fdate){
			$startDate 	= $asOfYear ."-". $this->fiscalDate;
			$endDate 	= intval($asOfYear)+1 ."-". $this->fiscalDate;
		}else{
			$startDate 	= intval($asOfYear)-1 ."-". $this->fiscalDate;
			$endDate 	= $asOfYear ."-". $this->fiscalDate;
		}
		
		//ASSET (As Of)
		$asset = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$asset->include_related("account", array("number","name"));
		$asset->include_related("account/account_type", array("name","nature"));
		$asset->where_in_related("account/account_type", "id", array(10,11,12,13,14,15,16,17,18,19,20,21,22));
		$asset->where_related("transaction", "issued_date <=", $today);
		$asset->where_related("transaction", "is_recurring", 0);
		$asset->where_related("transaction", "deleted", 0);
		$asset->where("deleted", 0);		
		$asset->get_iterated();
		
		//Sum Dr and Cr					
		$assetList = [];
		foreach ($asset as $value) {
			$amount = 0;
			if($value->account_account_type_nature=="Dr"){
				$amount = (floatval($value->dr) / floatval($value->rate)) - (floatval($value->cr) / floatval($value->rate));
			}else{
				$amount = (floatval($value->cr) / floatval($value->rate)) - (floatval($value->dr) / floatval($value->rate));					
			}

			if(isset($assetList[$value->account_id])){
				$assetList[$value->account_id]["amount"] 	+= $amount;
			}else{
				$assetList[$value->account_id]["id"] 		= $value->account_id;
				$assetList[$value->account_id]["number"] 	= $value->account_number;
				$assetList[$value->account_id]["name"] 		= $value->account_name;
				$assetList[$value->account_id]["amount"] 	= $amount;						
			}
		}
		
		$totalAsset = $assetDr - $assetCr;
		//END ASSET
		
				
		$data["count"] = count($data["results"]);

		//Response Data		
		$this->response($data, 200);	
	}	
	
	
}
/* End of file accounting_reports.php */
/* Location: ./application/controllers/api/accounting_reports.php */