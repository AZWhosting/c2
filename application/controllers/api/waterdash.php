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
		$data["results"] = array();
		$data["count"] = 0;

		$contact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$icontact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$acontact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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

		$contact->where('use_water', 1);
		$totalCust = $contact->count();

		$icontact->where('use_water', 1);
		$icontact->where('status', 0);
		$totalICust = $icontact->count();

		$acontact->where('use_water', 1);
		$acontact->where('status', 1)
		$totalACust = $acontact->count();

		$voidedCust = $totalCust - ($totalICust - $totalACust);

		$trx->where('type', 'Water_Invoice');
		$trx->where('status <>', 1);
		$trx->get();

		$invoice = 0;
		$customer = array();
		$overDue = 0;
		$today = date('Y-m-d');
		foreach($trx as $invoice) {
			if($invoce->due_date < $today) {
				$overDue +=1;
			}
			if(!isset($customer["$invoice->contact_id"])) {
				$customer["$invoice->contact_id"];
			}
			$invoice +=1;
		}

		$data[] = array(
			'totalCustomer' => $totalCust,
			'inActiveCustomer' => $totalICUst,
			'activeCustomer' => $totalACust,
			'invoiceCust' => count($customer),
			'totalInvoice' => $invoice,
			'overDue' => $overDue
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
		$obj->where('type', 'w');
		// $obj->include_related('location', 'id');
		$obj->include_related_count('location');
		// $obj->include_related_count('location/contact');
		$obj->get();
		if($obj->exists()) {
			foreach($obj as $value) {
				$location = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
				// $location->include_related('transaction', 'amount');
				$location->include_related('contact', array('id', 'status', 'deposit_account_id'));
				$location->where('branch_id', $value->id);

				$location->get();
				$activeCount = 0;
				$inActiveCount = 0;
				$sale = 0;
				$usage = 0;
				$deposit = 0;
				foreach($location as $loc) {
					$trx = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
					$trx->select_sum('amount');
					$trx->where('location_id', $loc->id)->get();
					// $trx->where('due_date <');
					$trx->where('status <>', 1);
					$sale += $trx->amount;

					$usages = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
					$usages->select('id');
					$usages->include_related('winvoice_line', 'quantity');
					$usages->where_related_winvoice_line('type', 'usage');
					$usages->where('location_id', $loc->id)->get();
					foreach($usages as $u) {
						$usage += $u->winvoice_line_quantity;
					}
					
					if($loc->contact_status == 1) {
						$activeCount += 1;
					} else {
						$inActiveCount +=1; 
					}
					$line = new journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$line->where('contact_id', $loc->contact_id);
					$line->where('account_id', $loc->contact_deposit_account_id);
					$line->get();

					foreach($line as $l) {
						if($l->dr != 0.00) {
							$deposit += $l->dr;
						} else {
							$deposit -= $l->cr;
						}
					}				
				}
					

				// $contact = new Customer(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
				$data['results'][] = array(
					'id' => $value->id,
					'name'=>$value->name,
					'blocCount' => $value->location_count,
					'activeCustomer' => $activeCount,
					'inActiveCustomer' => $inActiveCount,
					'deposit' => $deposit,
					'usage' => $usage,
					'sale' => $sale
				);
			}
			$this->response($data, 200);
		} else {
			$this->response($data, 400);
		}
	}
	
}
/* End of file waterdash.php */
/* Location: ./application/controllers/api/dashboards.php */