<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Waterdash extends REST_Controller {	
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

	function board_get() {
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");
		$contact = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$icontact = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$acontact = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$vcontact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$trx = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$trxSale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$usages = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$disconnect = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$connect = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}
		//Filter		
		if(!empty($filters) && isset($filters)){
	    	foreach ($filters as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$contact->where('status', 1);
		$contact->where('activated', 1);
		$totalCust = $contact->count();

		$icontact->where('status', 0);
		$icontact->where('activated', 1);
		$totalICust = $icontact->count();

		$connect->where('status', 1);
		$connect->where('activated', 0);
		$totalConnect = $connect->count();

		$acontact->where('status', 1);
		$acontact->where('activated', 1);
		$totalACust = $acontact->count();

		$vcontact->where('use_water', '1');
		// $vcontact->where('activated', 1);
		$totalVCust = $vcontact->count();

		$disconnect->where("type", "Utility_Invoice");
		$disconnect->where_in("status", 0);
		$disconnect->where("is_recurring <>", 1);
		$disconnect->where("deleted <>", 1);
		$totalDisconnect = $disconnect->count();

		$voidedCust = $totalCust - ($totalICust - $totalACust);
		$trx->select('amount, contact_id as contact');
		$trx->where('type', 'Utility_Invoice');
		$trx->where('status <>', 1);
		$trx->where('deleted <>', 1);
		$trx->get_iterated();



		$invoices = 0;
		$customer = array();
		$overDue = 0;
		$today = date('Y-m-d');
		$amount = 0;
		foreach($trx as $invoice) {
			if($invoice->due_date < $today) {
				$overDue +=1;
			}
			if(isset($customer[$invoice->contact])) {
				$customer[$invoice->contact]['count'] +=1;
			} else {
				$customer[$invoice->contact]['count'] = 1;
			}
			$invoices += 1;
  			$amount += $invoice->amount;
			if($invoice->status == 2){
				$qu = $invoice->transaction->select('amount')->where('type', 'Cash_Receipt')->get();
				foreach($qu as $q){
					$amount -= $q->amount;
				};
			}
		}

		$trxSale->select('amount, contact_id as contact');
		$trxSale->where('type', 'Utility_Invoice');
		$trxSale->get_iterated();
		$sale = 0;
		foreach($trxSale as $invoice) {
			$sale += $invoice->amount;
		}

		$usages->include_related('winvoice_line', 'quantity');
		$usages->where_related_winvoice_line('type', 'usage');
		$usages->get_iterated();
		$usage =0;
		foreach($usages as $u) {
			$usage += $u->winvoice_line_quantity;
		}
		

		$data[] = array(
			'totalCustomer' => $totalCust,
			'inActiveCustomer' => $totalICust,
			'activeCustomer' => $totalACust,
			'invoiceCust' => count($customer),
			'void' => $totalVCust,
			'totalInvoice' => $invoices,
			'overDue' => $overDue,
			'total' => $amount,
			'totalSale' => $sale,
			'totalUsage' => $usage,
			'totalDisconnect' =>$totalDisconnect,
			'totalConnect' =>$totalConnect,
		);

		$this->response(array('results' => $data, 'count' => 1), 200);
	}

	// Customer
	function customer_get() {
		$meter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		// $contact->where('deleted', 0);
		$totalMeter = $meter->count();
		$totalICust = 0;
		$totalConnect = 0;
		$totalACust = 0;
		$totalVCust = 0;
		$totalDisconnect = 0;
		$inActive = 0;
		$meter->get_iterated();
		foreach($meter as $con){
			//Inactive Cstomer
			if($con->status == 0){
			 	if($con->activated == 1){
					$totalICust += 1;
				}
			}elseif($con->status == 1){
				if($con->activated == 1){
					$totalACust += 1;
				}elseif($con->activated == 0){
					$totalConnect += 1;
				}
			}elseif($con->status == 2){
				$inActive += 1;
			}
		}

		$totalVCust = $totalMeter - ($totalICust + $totalACust);

		// $disconnect = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		// $disconnect->where("type", "Utility_Invoice");
		// $disconnect->where_in("status", 0);
		// $disconnect->where("is_recurring <>", 1);
		// $disconnect->where("deleted <>", 1);
		// $totalDisconnect = $disconnect->count();
		// $tc = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		// $tc->where('deleted', 0);
		// $totalCustomer = $tc->count();
		//Disconnect
		// $dis = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		// $dis->where("type", "Utility_Invoice");
		// $dis->where("status", 0);
		// $dis->where("deleted", 0)->get_iterated();
		// $disCount = 0;
		// foreach($dis as $d){
		// 	$br = new Branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		// 	$br->where("id", $d->branch_id)->limit(1)->get();
		// 	$dayDis = intval($br->day_disconnect);
		// 	$dueDate = new DateTime($d->due_date);
		// 	$ddate = $dueDate->getTimestamp();
		// 	$fineDate = new DateTime(date('Y-m-d'));
		// 	$fdate = $fineDate->getTimestamp();
		// 	if($fdate > $ddate){
		// 		$fineDate = $fineDate->diff($dueDate)->days;
		// 		$fineDateAmount = $dayDis;
		// 		if($fineDate >= $fineDateAmount){
		// 			$disCount += 1;
		// 		}
		// 	}
		// }

		$data[] = array(
			// 'totalCustomer' => $totalCustomer,
			'totalMeter' => $totalMeter,
			'iMeter' => $totalICust,
			'aMeter' => $totalACust,
			'void' => $inActive,
			'totalConnect' =>$totalConnect,
			'totalDisconnect' =>$totalDisconnect,
		);

		$this->response(array('results' => $data, 'count' => 1), 200);
	}

	//Txn
	function txn_get() {
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");
		$disCount = 0;
		$overDue = 0;
		$totalINV = 0;
		$totalAmount = 0;
		$totalSale = 0;
		$usage =0;
		$customer = array();
		$invoices = 0;
		$customer = array();
		$overDue = 0;
		$today = date('Y-m-d');
		$amount = 0;
		$kk = 0;
		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}
		//Filter		
		if(!empty($filters) && isset($filters)){
	    	foreach ($filters as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$trx = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$trx->select('amount, contact_id as contact');
		$trx->where('type', 'Utility_Invoice');
		$trx->where('status <>', 1);
		$trx->where('deleted <>', 1);
		$trx->get_iterated();
		foreach ($trx as $key) {
			if(isset($customer[$key->contact])) {
				$customer[$key->contact]['count'] +=1;
			} else {
				$customer[$key->contact]['count'] = 1;
			}

		}

		$invoices = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$invoices->where("type", "Utility_Invoice");
		$invoices->where_in("status", [0,2]);
		$invoices->where("deleted <>", 1);
		$totalINV = $invoices->count();	

		$overDueInvs = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$overDueInvs->where("type", "Utility_Invoice");
		$overDueInvs->where_in("status", [0,2]);
		$overDueInvs->where("deleted <>", 1);
		$overDueInvs->get_iterated();
		
		foreach ($overDueInvs as $value) {
			$kk = $value->amount / $value->rate;
			if($value->due_date < $today) {
				$overDue +=1;
			}
			$totalAmount +=  $kk ;
		}

		// $dis = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		// $dis->where("type", "Utility_Invoice");
		// $dis->where_in("status", [0,2]);
		// $dis->where("deleted <>", 1);
		// $dis->get_iterated();
		// foreach ($dis as $value) {
		// 	if($value->status == 0){
		// 		//Discounted
		// 		$br = $value->location->include_related("branch", array("id", "day_disconnect"))->get();
		// 		$dayDis = intval($br->branch_day_disconnect);
		// 		$dueDate = new DateTime($value->due_date);
		// 		$ddate = $dueDate->getTimestamp();
		// 		$fineDate = new DateTime(date('Y-m-d'));
		// 		$fdate = $fineDate->getTimestamp();
		// 		if($fdate > $ddate){
		// 			$fDay = $fineDate->diff($dueDate)->days;
		// 			if($fDay >= $dayDis){
		// 				$disCount += 1;
		// 			}
		// 		}
		// 	}
		// }

		$amount = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$amount->where("type", "Utility_Invoice");
		$amount->where("deleted <>", 1);
		$amount->get_iterated();
		
		foreach ($amount as $amount) {
			$amount = $amount->amount / $amount->rate;
			$totalSale +=  $amount ;
		}
		$data[] = array(
			'totalOverDue' 	=> $overDue,
			'totalInvoice' => $totalINV,
			'totalAmount' => floatval($totalAmount),
			'totalCustomer' => count($customer),
			'totalSale' => floatval($totalSale),
			'totalUsage' => $usage
		);

		$this->response(array('results' => $data, 'count' => 1), 200);
	}
	function license_get() {
		$filter 	= $this->get("filter");		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->order_by('id', 'asc');
		

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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}
		$obj->get_iterated();
		foreach($obj as $value) {
			$location = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$location->where('branch_id', $value->id);
			$location->where('main_bloc', 0);
			$location->where('main_pole', 0);
			$location->get_iterated();
			$branchCount = $location->result_count();
			$activeCount = 0;
			$inActiveCount = 0;
			$sale = 0;
			$usage = 0;
			$deposit = 0;
			$balance = 0;
			foreach($location as $loc) {
				$meter = $loc->meter->where('activated', 1)->get_iterated();
				foreach($meter as $c) {
					if($c->status == 1) {
						$activeCount += 1;
					} else {
						$inActiveCount += 1;
					}
				}
				$trx = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$trx->select_sum('amount');
				$trx->where('type', 'Utility_Invoice');
				$trx->where('status <>', 1);
				$trx->where('location_id', $loc->id)->get_iterated();
				
				$balance += $trx->amount;

				$trxSale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$trxSale->select_sum('amount');
				$trxSale->where('type', 'Utility_Invoice');
				$sale += $trxSale->amount/$trxSale->amount;

				$tmpBal = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$tmpBal->select('id, amount, deposit, rate');
				$tmpBal->where('type', 'Utility_Invoice');
				$tmpBal->where('status', 2);
				$tmpBal->where('location_id', $loc->id)->get_iterated();
				
				foreach($tmpBal as $b) {
					$amount = (floatval($b->amount) - floatval($b->deposit)) / floatval($b->rate);
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$paid->select_sum("amount");
					$paid->select_sum("discount");
					$paid->where("reference_id", $b->id);
					$paid->where_in("type", array("Cash_Receipt", "Offset_Invoice"));
					$paid->where("is_recurring <>",1);
					$paid->where("deleted <>",1);
					$paid->get_iterated();
					$balance += $amount - (floatval($paid->amount) + floatval($paid->discount));
				}
				$dep = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$dep->select_sum('amount');
				$dep->where('type', 'Utility_Deposit');
				$dep->where('location_id', $loc->id)->get_iterated();
				$deposit +=$dep->amount;

				$usages = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$usages->select('id');
				$usages->include_related('winvoice_line', 'quantity');
				$usages->where_related_winvoice_line('type', 'usage');
				$usages->where('location_id', $loc->id)->get_iterated();
				foreach($usages as $u) {
					$usage += $u->winvoice_line_quantity;
				}							
			}
			$data['results'][] = array(
				'id' => $value->id,
				'name'=>$value->name,
				'blocCount' => $branchCount,
				'activeCustomer' => $activeCount,
				'inActiveCustomer' => $inActiveCount,
				'deposit' => $deposit,
				'usage' => $usage,
				'sale' => floatval($sale),
				'balance' => $balance
			);
		}
		$this->response($data, 200);
	}

	function kpi_get() {
		$filter     = $this->get("filter");		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;


		$obj = new Branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->order_by('id', 'asc');
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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		$obj->get_iterated();
		foreach($obj as $value) {
			$location = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$location->where('branch_id', $value->id);
			$location->where('main_bloc', 0);
			$location->where('main_pole', 0);
			$location->get_iterated();
			$nActiveMeter = 0;
			$totalAllowCustomer = 0;
			$totalActiveCustomer = 0;
			$totalAmount = 0;
			$avgIncome = 0;
			$totalUsage = 0;
			$nContact = 0;
			$avg = 0;
			$activeCount =0;
			$inActiveCount = 0;
			foreach($location as $loc) {
				$meter = $loc->meter->where('activated', 1)->get_iterated();
				foreach($meter as $c) {
					if($c->status == 1) {
						$activeCount += 1;
					} else {
						$inActiveCount += 1;
					}
				}

				$contact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$contact->where('use_water', '1');
				$nContact 		= $contact->count();

				$totalActiveCustomer = $value->max_customer == 0 ? 0: $activeCount / $value->max_customer;

				$totalAllowCustomer = $value->max_customer == 0 ? 0: ($nContact / intval($value->max_customer));

		
				$trxSale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$trxSale->where('type', 'Utility_Invoice');
				$trxSale->where('location_id', $loc->id)->get_iterated();
				$totalAmount += $trxSale->amount / $trxSale->rate;

				$avgIncome = $activeCount == 0 ? 0 : ($totalAmount  / $activeCount);

				// $avgUsage = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				// $trxSale->where('location_id', $loc->id)->get_iterated();
				// $avgUsage->get_iterated();
				// $avg = 0;
				// foreach($avgUsage as $avgUsg) {
				// 	$totalUsage += $avgUsg->usage;
				// }
				// $avg = $activeCount == 0 ? 0:$totalUsage / $activeCount;
			}
			$data['results'][] = array(
				'id' => $value->id,
				'name'=>$value->name,
				'totalCustomer' => $activeCount,
				'totalAllowCustomer' => $totalAllowCustomer,
				'totalActiveCustomer' => $totalActiveCustomer,
				'avgIncome' => $avgIncome,
				'totalUsage' => $totalUsage,
				'avgUsage' => $avg,
				'totalAmount' => floatval($totalAmount),
			);
		}
		$this->response($data, 200);
	}

	function graph_get() {
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data = array();
		// $data["count"] = 0;

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
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->where('type', 'Utility_Invoice');
		$obj->where('deleted', 0);
		$obj->where("month_of >=", date("Y")."-01-01");
		$obj->where("month_of <=", date("Y")."-12-31");						
		$obj->order_by("month_of");	
		$obj->get_iterated();
		$temp = array();

		if($obj->exists()){
			foreach ($obj as $value) {
				$invoiceMonth = date('F', strtotime($value->month_of));
				if(isset($temp["$invoiceMonth"])) {
					$temp["$invoiceMonth"]['amount'] += floatval($value->amount);
				} else {
					$temp["$invoiceMonth"]['amount'] = floatval($value->amount);
				}
			}
			
			foreach($temp as $key => $value) {
				$data["results"][] = array(					
				   	"amount" 		=> floatval($value['amount']),				   	
				   	"month"			=> $key				   	
				);
			}

		}else{
			$data["results"][] = array(					
			   	"amount" 		=> 0,			   	
			   	"month"			=> ""				   	
			);
		}

		$this->response($data, 200);
	}

	function graph_water_get() {
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data = array();
		// $data["count"] = 0;

		$obj = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Filter		
		if(!empty($filters) && isset($filters)){
	    	foreach ($filters as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->where("month_of >=", date("Y")."-01-01");
		$obj->where("month_of <=", date("Y")."-12-31");						
		$obj->order_by("month_of");	
		$obj->where("invoiced", 1);
		$obj->get_iterated();
		$temp = array();

		if($obj->exists()){
			foreach ($obj as $value) {
				$invoiceMonth = date('F', strtotime($value->month_of));
				if(isset($temp["$invoiceMonth"])) {
					$temp["$invoiceMonth"]['usage'] += floatval($value->usage);
				} else {
					$temp["$invoiceMonth"]['usage'] = floatval($value->usage);
				}
			}
			
			foreach($temp as $key => $value) {
				$data["results"][] = array(					
				   	"amount" 		=> $value['usage'],				   	
				   	"month"			=> $key				   	
				);
			}

		}else{
			$data["results"][] = array(					
			   	"amount" 		=> 0,			   	
			   	"month"			=> ""				   	
			);
		}

		$this->response($data, 200);
	}

	function usage_get() {
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data = array();
		// $data["count"] = 0;

		// $obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$reading = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);


		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Filter		
		if(!empty($filters) && isset($filters)){
	    	foreach ($filters as $value) {
	    		if(isset($value['operator'])) {
					$reading->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$reading->where($value["field"], $value["value"]);
				}
			}
		}

		// $reading->where('type', 'Water_Invoice');
		// $reading->where("issued_date >=", date("Y")."-01-01");
		// $reading->where("issued_date <=", date("Y")."-12-31");						
		// $reading->order_by("issued_date");	
		// $reading->get();

		$reading->where("month_of >=", date("Y")."-01-01");
		$reading->where("month_of <=", date("Y")."-12-31");
		$reading->order_by("month_of");								
		$reading->get();

		if($reading->exists()){
			foreach ($reading as $value) {
				// $amount = 0;
				$readingMonth = date('F', strtotime($value->month_of));

				// $amount += floatval($value->amount);

				$data["results"][] = array(					
				   	"usage" 		=> floatval($value->usage),				   	
				   	"month"			=> $readingMonth				   	
				);
			}
		}

		$this->response($data, 200);
	}
	
}
/* End of file waterdash.php */
/* Location: ./application/controllers/api/dashboards.php */