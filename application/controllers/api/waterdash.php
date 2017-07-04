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
		// $data["results"] = array();
		// $data["count"] = 0;

		$contact = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$icontact = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$acontact = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$vcontact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$trx = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);



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

		$acontact->where('status', 1);
		$acontact->where('activated', 1);
		$totalACust = $acontact->count();

		$vcontact->where('use_water', '1');
		// $vcontact->where('activated', 1);
		$totalVCust = $vcontact->count();

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

			// if($invoice->status == 2){
			// 	$qu = $invoice->transaction->select('amount')->where('type', 'Cash_Receipt')->get();
			// 	$a = 0;
			// 	foreach($qu as $q){
			// 		$a += $q->amount;
			// 	};
			// 	$fnamount = $invoice->amount - $a;
			// }else{
			// 	$fnamount = $invoice->amount;
			// }
			// $amount += $fnamount;
		}

		$data[] = array(
			'totalCustomer' => $totalCust,
			'inActiveCustomer' => $totalICust,
			'activeCustomer' => $totalACust,
			'invoiceCust' => count($customer),
			'void' => $totalVCust,
			'totalInvoice' => $invoices,
			'overDue' => $overDue,
			'total' => $amount
		);

		$this->response(array('results' => $data, 'count' => 1), 200);
	}

	function license_get() {
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
		//$obj->where('type', 'w');
		$obj->order_by('id', 'asc');
		// $obj->include_related('location', 'id');
		$obj->include_related_count('location');
		// $obj->include_related_count('location/contact');
		$obj->get_iterated();
		if($obj->exists()) {
			foreach($obj as $value) {
				$location = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				// // $location->include_related('transaction', 'amount');
				// // $location->include_related('utility', array('id', 'status', 'deposit_account_id'));
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
					$meter = $loc->meter->where('activated', 1)->get();
					// $contact = $loc->contact->select('deposit_account_id')->get();
					$trx = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$trx->select_sum('amount');
					$trx->where('type', 'Utility_Invoice');
					$trx->where('location_id', $loc->id)->get();
					// $trx->where('due_date <');
					$trx->where('status <>', 1);
					$balance += $trx->amount;

					$trxSale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$trxSale->select_sum('amount');
					$trxSale->where('type', 'Utility_Invoice');
					$trxSale->where('location_id', $loc->id)->get();
					// $trx->where('due_date <');
					// $trxSale->where('status <>', 1);
					$sale += $trxSale->amount;

					$tmpBal = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$tmpBal->select('id, amount, deposit, rate');
					$tmpBal->where('type', 'Utility_Invoice');
					$tmpBal->where('status', 2);
					$tmpBal->where('location_id', $loc->id)->get();
					
					foreach($tmpBal as $b) {
						$amount = (floatval($b->amount) - floatval($b->deposit)) / floatval($b->rate);
						$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$paid->select_sum("amount");
						$paid->select_sum("discount");
						$paid->where("reference_id", $b->id);
						$paid->where_in("type", array("Cash_Receipt", "Offset_Invoice"));
						$paid->where("is_recurring <>",1);
						$paid->where("deleted <>",1);
						$paid->get();
						$balance += $amount - (floatval($paid->amount) + floatval($paid->discount));
					}


					$dep = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$dep->select_sum('amount');
					$dep->where('type', 'Utility_Deposit');
					$dep->where('location_id', $loc->id)->get();
					$deposit +=$dep->amount;

					$usages = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$usages->select('id');
					$usages->include_related('winvoice_line', 'quantity');
					$usages->where_related_winvoice_line('type', 'usage');
					$usages->where('location_id', $loc->id)->get();
					foreach($usages as $u) {
						$usage += $u->winvoice_line_quantity;
					}
					
					foreach($meter as $c) {
						if($c->status == 1) {
							$activeCount += 1;
						} else {
							$inActiveCount +=1;
						}
					}									
				}
					
				// $contact = new Customer(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
				$data['results'][] = array(
					'id' => $value->id,
					'name'=>$value->name,
					'blocCount' => $branchCount,
					'activeCustomer' => $activeCount,
					'inActiveCustomer' => $inActiveCount,
					'deposit' => $deposit,
					'usage' => $usage,
					'sale' => $sale,
					'balance' => $balance
				);
			}
			$this->response($data, 200);
		} else {
			$this->response($data, 400);
		}
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
		$obj->where("issued_date >=", date("Y")."-01-01");
		$obj->where("issued_date <=", date("Y")."-12-31");						
		$obj->order_by("issued_date");	
		$obj->get_iterated();
		$temp = array();

		if($obj->exists()){
			foreach ($obj as $value) {
				$invoiceMonth = date('F', strtotime($value->issued_date));
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