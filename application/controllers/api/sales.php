<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Sales extends REST_Controller {
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
			// $this->_database = $conn->inst_database;
			$this->_database = 'db_banhji';
		}
	}

	function summary_customer_get() {
		$filters 	= $this->get("filter")["filters"];
			$page 		= $this->get('page') !== false ? $this->get('page') : 1;
			$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
			$sort 	 	= $this->get("sort");
			$data["results"] = array();
			$data["count"] = 0;
			$is_pattern = 0;
			$deleted = 0;


			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');

			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
			$type->where('parent_id', 1)->get();

			$obj->where_related("contact", 'contact_type_id', $type);
			$obj->where_in("type", array("Invoice", "Cash_Sale"));

			// $obj->include_related("contact_type", "name");

			//Results
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
			$customers = array();
			$total =0;
			if($obj->result_count()>0){
				foreach ($obj as $value) {
					$customer = $value->contact->get();
					$fullname = $customer->surname.' '.$customer->name;
					if(isset($customers["$fullname"])) {
						$customers["$fullname"]['amount']+= floatval($value->amount)/ floatval($value->rate);
					} else {
						$customers[$fullname]['amount']= floatval($value->amount)/ floatval($value->rate);
					}
					$total += floatval($value->amount)/ floatval($value->rate);
				}
			}

			foreach ($customers as $key => $value) {
				$data["results"][] = array(
					'customer' => $key,
					'amount'	=> $value['amount']

				);
			}

			//Response Data
			$data['total'] = $total;
			$data['count'] = count($customers);
			$this->response($data, 200);
	}

	function detail_customer_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');



		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
		$type->where('parent_id', 1)->get();

		$obj->where_related("contact", 'contact_type_id', $type);
		$obj->where_in("type", array("Invoice", "Cash_Sale"));

		// $obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		$customers = array();
		$total = 0;
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$customer = $value->contact->get();
				$fullname = $customer->surname.' '.$customer->name;
				$items = $value->item_line->include_related('item', array('name'))->get();
				$lines = array();
				foreach($items as $item) {
					$lines[] = array(
						'name' 			=> $item->item_name,
						'quantity' 	=> $item->quantity,
						'price' 		=> floatval($item->price)/floatval($value->rate),
						'amount'		=> floatval($item->amount)/floatval($value->rate)
					);
				}
				if(isset($customers["$fullname"])) {
					$customers["$fullname"]['amount'] += floatval($value->amount);
					$customers["$fullname"]['transactions'][] = array(
						'type'  	=> $value->type,
						'date' 		=> $value->issued_date,
						'number' 	=> $value->number,
						'memo' 		=> $value->memo2,
						'amount' 	=> floatval($value->amount)/floatval($value->rate),
						'lines' 	=> $lines
					);
				} else {
					$customers["$fullname"]['amount'] = floatval($value->amount);
					$customers["$fullname"]['transactions'][] = array(
						'type'  	=> $value->type,
						'date' 		=> $value->issued_date,
						'number' 	=> $value->number,
						'memo' 		=> $value->memo2,
						'amount' 	=> floatval($value->amount)/floatval($value->rate),
						'lines' 	=> $lines
					);
			//Results
				}
			$total += floatval($value->amount)/ floatval($value->rate);
			}
		}
		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'group' 	=> $key,
				'amount'	=> $value['amount'],
				'items' 	=> $value['transactions']

			);
		}
		$data['total'] = $total;
		$data['count'] = count($customers);
		//Response Data
		$this->response($data, 200);
	}

	function transaction_customer_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');

		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
		$type->where('parent_id', 1)->get();

		$obj->where_related("contact", 'contact_type_id', $type);
		$obj->where_in("type", array("Invoice", "Cash_Sale", "Deposit", "Cash_Receipt"));

		// $obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		$customers = array();
		$total = 0;
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$customer = $value->contact->get();
				$fullname = $customer->surname.' '.$customer->name;
				$lines = array();

				if(isset($customers["$fullname"])) {
					$customers["$fullname"]['amount'] += floatval($value->amount)/floatval($value->rate);
					$customers["$fullname"]['transactions'][] = array(
						'type'  	=> $value->type,
						'date' 		=> $value->issued_date,
						'number' 	=> $value->number,
						'memo' 		=> $value->memo2,
						'amount' 	=> floatval($value->amount)/floatval($value->rate)
					);
				} else {
					$customers["$fullname"]['amount'] = floatval($value->amount)/floatval($value->rate);
					$customers["$fullname"]['transactions'][] = array(
						'type'  	=> $value->type,
						'date' 		=> $value->issued_date,
						'number' 	=> $value->number,
						'memo' 		=> $value->memo2,
						'amount' 	=> floatval($value->amount)/floatval($value->rate)
					);
				}
				$total += floatval($value->amount)/floatval($value->rate);
			}
		}
		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'group' 	=> $key,
				'amount'	=> $value['amount'],
				'items'		=> $value['transactions'],
			);
		}

		$data['total'] = $total;
		$data['count'] = count($customers);
		//Response Data
		$this->response($data, 200);	
	}

	function invoice_list_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');



		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
		$type->where('parent_id', 1)->get();

		$obj->where_related("contact", 'contact_type_id', $type);
		$obj->where('is_recurring', 0);
		$obj->where("type", "Invoice");

		// $obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		$customers = array();
		$totalCreditSale = 0;
		$totalBalance    = 0;
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$customer = $value->contact->get();
				$fullname = $customer->surname.' '.$customer->name;

				$segment = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
				$segment->where_in('id', explode(',',$value->segments))->get();
				$lines = array();
				$segments = array();
				if($segment->exists()) {
					foreach($segment as $seg) {
						$segments[] = array(
							'id' => $seg->id, 'code' => $seg->code
						);
					}
				}

				if(isset($customers["$fullname"])) {
					$customers["$fullname"]['amount'] += floatval($value->amount);
					$customers["$fullname"]['transactions'][] = array(
						'type'  	=> $value->type,
						'date' 		=> $value->issued_date,
						'number' 	=> $value->number,
						'due_date'=> $value->due_date,
						'memo' 		=> $value->memo2,
						'status' 	=> $value->status,
						'segments'=> $segments,
						'amount' 	=> floatval($value->amount)/floatval($value->rate)
					);
				} else {
					$customers["$fullname"]['amount'] = floatval($value->amount);
					$customers["$fullname"]['transactions'][] = array(
						'type'  	=> $value->type,
						'date' 		=> $value->issued_date,
						'number' 	=> $value->number,
						'due_date'=> $value->due_date,
						'memo' 		=> $value->memo2,
						'status'  => $value->status,
						'segments'=> $segments,
						'amount' 	=> floatval($value->amount)/floatval($value->rate)
					);
				}

				$totalBalance += floatval($value->amount)/floatval($value->rate);
				if($value->status == 0) {
					$totalCreditSale += floatval($value->amount)/floatval($value->rate);
				}

			}
		}

		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'group' => $key,
				'amount'	 => $value['amount'],
				'items'	=> $value['transactions']
			);
		}
		$data['totalCreditSale'] = $totalCreditSale;
		$data['totalBalance'] = $totalBalance;
		$data['count'] = count($customers);
		//Response Data
		$this->response($data, 200);
	}

	function summary_balance_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;


		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');

		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
		$type->where('parent_id', 1)->get();

		$obj->where_related("contact", 'contact_type_id', $type);
		$obj->where("status <>", 1);
		$obj->where_in("type", array("Invoice", "Cash_Receipt"));

		// $obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		$customers = array();
		$total = 0;
		$paid  = 0;
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$customer = $value->contact->get();
				$fullname = $customer->surname.' '.$customer->name;
				if(isset($customers["$fullname"])) {
					if($value->type == 'Invoice') {
						$customers["$fullname"]['amount']+= floatval($value->amount);
					} else {
						$customers["$fullname"]['amount']-= floatval($value->amount);
					}
				} else {
					if($value->type == 'Invoice') {
						$customers[$fullname]['amount']= floatval($value->amount)/ floatval($value->rate);
					} else {
						$customers[$fullname]['amount']= (floatval($value->amount)/ floatval($value->rate)) * -1;
					}
				}
				if($value->type == "Invoice") {
					$total += floatval($value->amount)/ floatval($value->rate);
				} else {
					$paid += floatval($value->amount)/ floatval($value->rate);
				}

			}
		}

		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'customer' => $key,
				'amount'	=> $value['amount']

			);
		}

		//Response Data
		$data['total'] = $total - $paid;
		$data['count'] = count($customers);
		$this->response($data, 200);
	}

	function detail_balance_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;


		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');

		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
		$type->where('parent_id', 1)->get();

		$obj->where_related("contact", 'contact_type_id', $type);
		$obj->where("status <>", 1);
		$obj->where_in("type", array("Invoice", "Cash_Receipt"));

		// $obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		$customers = array();
		$total = 0;
		$paid  = 0;
		$invoiceOpen = 0;
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$customer = $value->contact->get();
				$fullname = $customer->surname.' '.$customer->name;
				if(isset($customers["$fullname"])) {
					$customers["$fullname"]['transactions'][] = array(
						'type'  	=> $value->type,
						'date' 		=> $value->issued_date,
						'number' 	=> $value->number,
						'memo' 		=> $value->memo2,
						'amount' 	=> floatval($value->amount)/floatval($value->rate)
					);
				} else {
					$customers["$fullname"]['transactions'][] = array(
						'type'  	=> $value->type,
						'date' 		=> $value->issued_date,
						'number' 	=> $value->number,
						'memo' 		=> $value->memo2,
						'amount' 	=> floatval($value->amount)/floatval($value->rate)
					);
				}
				if($value->type == "Invoice") {
					if($value->status != 1) {
						$invoiceOpen += 1;
					}
					$total += floatval($value->amount)/ floatval($value->rate);
				} else {
					$paid += floatval($value->amount)/ floatval($value->rate);
				}

			}
		}

		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'customer' => $key,
				'transactions' => $value['transactions']
			);
		}

		//Response Data
		$data['total'] = $total - $paid;
		$data['openInvoice'] = $invoiceOpen;
		$data['count'] = count($customers);
		$this->response($data, 200);
	}



	// item or service classified as list
	function summary_list_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
		// $type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
		// $type->where('parent_id', 1)->get();

		// $obj->where_related("contact", 'contact_type_id', $type);
		$obj->where("type", "Invoice");
		$obj->where('is_recurring', 0);

		// $obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		$items = array();
		$total = 0;
		$totalAvg = 0;
		$totalQty = 0;
		$totalCost= 0;
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$itemLine = $value->item_line->get();
				foreach($itemLine as $line) {
					$item = $line->item->get();
					if(isset($items["$item->name"])) {
						$items["$item->name"]['qty'] += intval($line->quantity);
						$items["$item->name"]['amount'] += floatval($line->amount);
						$items["$item->name"]['price'] += floatval($line->price);
						$items["$item->name"]['cost'] += floatval($line->cost);
						$items["$item->name"]['gross_profit'] += (floatval($line->price)-floatval($line->cost)) * floatval($line->quantity);
					} else {
						$items["$item->name"]['qty'] = intval($line->quantity);
						$items["$item->name"]['amount'] = floatval($line->amount);
						$items["$item->name"]['price'] = floatval($line->price);
						$items["$item->name"]['cost'] = floatval($line->cost);
						$items["$item->name"]['rate'] = floatval($value->rate);
						$items["$item->name"]['gross_profit'] = (floatval($line->price)-floatval($line->cost)) * floatval($line->quantity);
					}
					$total += floatval($line->amount)/floatval($value->rate);
				}
			}
		}
		foreach($items as $key => $value) {
			$avg = ($value['amount']/$value['rate']) / $value['qty'];
			$data['results'][] = array(
				'group' => $key,
				'qty' => $value['qty'],
				'avg_price' => round($avg, 2),
				'cost' => ($value['cost']/$value['rate']) / $value['qty'],
				'gross_profit_margin' => (($value['amount'] - $value['cost']) / $value['amount'])
			);
			$totalAvg += $value['amount']/$value['rate'];
			$totalCost+= $value['cost']/$value['rate'];
			$totalQty += $value['qty'];
		}
		$data['total_sale'] = $total;
		$data['total_avg'] = round(($totalAvg/$totalQty), 2);
		$data['gpm'] = ($totalAvg - $totalCost) / $totalAvg;
		$data['count'] = count($items);
		//Response Data
		$this->response($data, 200);
	}

	function detail_list_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');



		// $type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
		// $type->where('parent_id', 1)->get();

		// $obj->where_related("contact", 'contact_type_id', $type);
		$obj->where('is_recurring', 0);
		$obj->where_in("type", array("Invoice", "Cash_Sale"));

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		$products = array();
		$total = 0;
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$items = $value->item_line->include_related('item', array('name'))->get();
				foreach($items as $item) {
					$temp = array(
						'type' => $value->type,
						'date' => $value->issued_date,
						'memo' => $value->memo2,
						'qty'  => $item->quantity,
						'price'=> $item->price,
						'amount'=> floatval($item->amount)/floatval($value->rate)
					);
					if(isset($products["$item->item_name"])) {
						$products["$item->item_name"][] = $temp;
					} else {
						$products["$item->item_name"][] = $temp;
					}
				}
			$total += floatval($value->amount)/ floatval($value->rate);
			}
		}
		foreach ($products as $key => $value) {
			$data["results"][] = array(
				'group' 	=> $key,
				// 'amount'	=> $value['amount'],
				'items' 	=> $value

			);
		}
		$data['total'] = $total;
		$data['count'] = count($products);
		//Response Data
		$this->response($data, 200);

	}

	function deposit_detail_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');



		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
		$type->where('parent_id', 1)->get();

		$obj->where_related("contact", 'contact_type_id', $type);
		$obj->where_in("type", array("Deposit", "Credit"));
		$obj->where('is_recurring', 0);

		// $obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		$customers = array();
		$total = 0;
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$customer = $value->contact->get();
				$fullname = $customer->surname.' '.$customer->name;
				$items = $value->item_line->include_related('item', array('name'))->get();

				if(isset($customers["$fullname"])) {
					$customers["$fullname"]['amount'] += floatval($value->amount);
					$customers["$fullname"]['transactions'][] = array(
						'type'  	=> $value->type,
						'date' 		=> $value->issued_date,
						'number' 	=> $value->number,
						'memo' 		=> $value->memo2,
						'amount' 	=> floatval($value->amount)/floatval($value->rate)
					);
				} else {
					$customers["$fullname"]['amount'] = floatval($value->amount);
					$customers["$fullname"]['transactions'][] = array(
						'type'  	=> $value->type,
						'date' 		=> $value->issued_date,
						'number' 	=> $value->number,
						'memo' 		=> $value->memo2,
						'amount' 	=> floatval($value->amount)/floatval($value->rate)
					);
			//Results
				}
			$total += floatval($value->amount)/ floatval($value->rate);
			}
		}
		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'group' 	=> $key,
				'amount'	=> $value['amount'],
				'items' 	=> $value['transactions']

			);
		}
		$data['total'] = $total;
		$data['count'] = count($customers);
		//Response Data
		$this->response($data, 200);
	}

	function sale_job_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');



		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
		$type->where('parent_id', 1)->get();

		$obj->where_related("contact", 'contact_type_id', $type);
		$obj->where_in("type", array("Invoice", "Cash_Sale", "Deposit"));
		$obj->where('job_id <>', 0);
		$obj->where('is_recurring', 0);

		// $obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		$customers = array();
		$total = 0;
		$saleNumber = 0;
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$customer = $value->contact->get();
				$fullname = $customer->surname.' '.$customer->name;
				$job = $value->job->get();
				$segment = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
				$segment->where_in('id', explode(',',$value->segments))->get();
				$segments = array();
				if($segment->exists()) {
					foreach($segment as $seg) {
						$segments[] = array(
							'id' => $seg->id, 'code' => $seg->code
						);
					}
				}

				if(isset($customers["$job->name"])) {
					$customers["$job->name"]['amount'] += floatval($value->amount);
					$customers["$job->name"]['transactions'][] = array(
						'type'  	=> $value->type,
						'date' 		=> $value->issued_date,
						'number' 	=> $value->number,
						'memo' 		=> $value->memo2,
						'segments'=> $segments,
						'amount' 	=> floatval($value->amount)/floatval($value->rate)
					);
				} else {
					$customers["$job->name"]['amount'] = floatval($value->amount);
					$customers["$job->name"]['transactions'][] = array(
						'type'  	=> $value->type,
						'date' 		=> $value->issued_date,
						'number' 	=> $value->number,
						'memo' 		=> $value->memo2,
						'segments'=> $segments,
						'amount' 	=> floatval($value->amount)/floatval($value->rate)
					);
			//Results
				}
			$total += floatval($value->amount)/ floatval($value->rate);
			$saleNumber++;
			}
		}
		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'group' 	=> $key,
				'amount'	=> $value['amount'],
				'items' 	=> $value['transactions']

			);
		}
		$data['total'] = $total;
		$data['count'] = count($customers);
		$data['saleNumber'] = $saleNumber;
		//Response Data
		$this->response($data, 200);
	}

	function aging_summary_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');



		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
		$type->where('parent_id', 1)->get();

		$obj->where_related("contact", 'contact_type_id', $type);
		$obj->where("type", "Invoice");
		$obj->where('is_recurring', 0);

		// $obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		$customers = array();
		$total = 0;
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$customer = $value->contact->get();
				$fullname = $customer->surname.' '.$customer->name;
				$items = $value->item_line->include_related('item', array('name'))->get();

				$today = new DateTime();
				$dueDate = new DateTime($value->due_date);
				$diff = $today->diff($dueDate)->format("%a");

				if(isset($customers["$fullname"])) {
					$customers["$fullname"]['amount']	+= floatval($value->amount) / floatval($value->rate);
					if($dueDate<$today){
						if(intval($diff)>90){
							$customers["$fullname"]['>90']+= floatval($value->amount) / floatval($value->rate);
						}else if(intval($diff)>60){
							$customers["$fullname"]['90'] += floatval($value->amount) / floatval($value->rate);
						}else if(intval($diff)>30){
							$customers["$fullname"]['60'] += floatval($value->amount) / floatval($value->rate);
						}else{
							$customers["$fullname"]['30'] += floatval($value->amount) / floatval($value->rate);
						}
					}else{
						$customers["$fullname"]['<30'] += floatval($value->amount) / floatval($value->rate);
					}
				} else {
					$customers["$fullname"]['amount']	= floatval($value->amount) / floatval($value->rate);
					if($dueDate<$today){
						if(intval($diff)>90){
							$customers["$fullname"]['>90']= floatval($value->amount) / floatval($value->rate);
						}else if(intval($diff)>60){
							$customers["$fullname"]['90'] = floatval($value->amount) / floatval($value->rate);
						}else if(intval($diff)>30){
							$customers["$fullname"]['60'] = floatval($value->amount) / floatval($value->rate);
						}else{
							$customers["$fullname"]['30'] = floatval($value->amount) / floatval($value->rate);
						}
					}else{
						$customers["$fullname"]['<30'] = floatval($value->amount) / floatval($value->rate);
					}
			//Results
				}
				$total += floatval($value->amount)/ floatval($value->rate);
			}
		}
		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'group' 	=> $key,
				'amount'	=> $value['amount'],
				'<30' 		=> isset($value['<30']) ? $value['<30'] : 0,
				'30'			=> isset($value['30']) ? $value['30'] : 0,
				'60' 			=> isset($value['60']) ? $value['60'] : 0,
				'90' 			=> isset($value['90']) ? $value['90'] : 0,
				'>90' 		=> isset($value['<90']) ? $value['<30'] : 0,
			);
		}
		$data['total'] = $total;
		$data['count'] = count($customers);
		//Response Data
		$this->response($data, 200);
	}

	function aging_detail_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');



		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
		$type->where('parent_id', 1)->get();

		$obj->where_related("contact", 'contact_type_id', $type);
		$obj->where("type", "Invoice");
		$obj->where('is_recurring', 0);

		// $obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		$customers = array();
		$total = 0;
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$customer = $value->contact->get();
				$fullname = $customer->surname.' '.$customer->name;
				$items = $value->item_line->include_related('item', array('name'))->get();

				$today = new DateTime();
				$dueDate = new DateTime($value->due_date);
				$diff = $today->diff($dueDate)->format("%a");

				if(isset($customers["$fullname"])) {
					$customers["$fullname"]['amount']	+= floatval($value->amount) / floatval($value->rate);
					$outstanding = 0; // days
					if($dueDate<$today){
						if(intval($diff)>90){
							$outstanding = '>90';
						}else if(intval($diff)>60){
							$outstanding = '90';
						}else if(intval($diff)>30){
							$outstanding = '60';
						}else{
							$outstanding = '30';
						}
					}else{
						$outstanding = '>30';
					}
					$customers["$fullname"]['transactions'][] = array(
						'type' => $value->type,
						'date' => $value->issued_date,
						'number' => $value->number,
						'memo' => $value->memo2,
						'outstanding' => $outstanding,
						'amount' => floatval($value->amount) / floatval($value->rate)
					);
				} else {
					$customers["$fullname"]['amount']	= floatval($value->amount) / floatval($value->rate);
					$outstanding = 0; // days
					if($dueDate<$today){
						if(intval($diff)>90){
							$outstanding = '>90';
						}else if(intval($diff)>60){
							$outstanding = '90';
						}else if(intval($diff)>30){
							$outstanding = '60';
						}else{
							$outstanding = '30';
						}
					}else{
						$outstanding = '>30';
					}
					$customers["$fullname"]['transactions'][] = array(
						'type' => $value->type,
						'date' => $value->issued_date,
						'number' => $value->number,
						'memo' => $value->memo2,
						'outstanding' => $outstanding,
						'amount' => floatval($value->amount) / floatval($value->rate)
					);
			//Results
				}
				$total += floatval($value->amount)/ floatval($value->rate);
			}
		}
		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'group' 	=> $key,
				'amount'	=> $value['amount'],
				'transactions' => $value['transactions']
			);
		}
		$data['total'] = $total;
		$data['count'] = count($customers);
		//Response Data
		$this->response($data, 200);
	}

	function invoice2collect_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');



		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
		$type->where('parent_id', 1)->get();

		$obj->where_related("contact", 'contact_type_id', $type);
		$obj->where("type", "Invoice");
		$obj->where('is_recurring', 0);

		// $obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		$customers = array();
		$total = 0;
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$customer = $value->contact->get();
				$fullname = $customer->surname.' '.$customer->name;
				$items = $value->item_line->include_related('item', array('name'))->get();

				$today = new DateTime();
				$dueDate = new DateTime($value->due_date);
				$diff = $today->diff($dueDate)->format("%a");
				$outstanding = 0;
				if($dueDate<$today){
					if(intval($diff)>90){
						$outstanding = '>90';
					}else if(intval($diff)>60){
						$outstanding = '90';
					}else if(intval($diff)>30){
						$outstanding = '60';
					}else{
						$outstanding = '30';
					}
				}else{
					$outstanding = '>30';
				}

				if(isset($customers["$outstanding"])) {
					$customers["$outstanding"]['amount']	+= floatval($value->amount) / floatval($value->rate);
					 // days

					$customers["$outstanding"]['transactions'][] = array(
						'type' => $value->type,
						'date' => $value->issued_date,
						'number' => $value->number,
						'memo' => $value->memo2,
						'amount' => floatval($value->amount) / floatval($value->rate)
					);
				} else {
					$customers["$outstanding"]['amount']	= floatval($value->amount) / floatval($value->rate);
					$customers["$outstanding"]['transactions'][] = array(
						'type' => $value->type,
						'date' => $value->issued_date,
						'number' => $value->number,
						'memo' => $value->memo2,
						'amount' => floatval($value->amount) / floatval($value->rate)
					);
			//Results
				}
				$total += floatval($value->amount)/ floatval($value->rate);
			}
		}
		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'group' 	=> $key,
				'amount'	=> $value['amount'],
				'transactions' => $value['transactions']
			);
		}
		$data['total'] = $total;
		$data['count'] = count($customers);
		//Response Data
		$this->response($data, 200);
	}

	function invoicecollected_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');



		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
		$type->where('parent_id', 1)->get();

		$obj->where_related("contact", 'contact_type_id', $type);
		$obj->where("type", "Invoice");
		$obj->where_in('status', array(1, 2));
		$obj->where('is_recurring', 0);

		// $obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		$customers = array();
		$total = 0;
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$paymentMethod = $value->payment_method->get();

				if(isset($customers["$paymentMethod->name"])) {
					$customers["$paymentMethod->name"]['amount']	+= floatval($value->amount) / floatval($value->rate);
					 // days

					$customers["$paymentMethod->name"]['transactions'][] = array(
						'type' => $value->type,
						'date' => $value->issued_date,
						'number' => $value->number,
						'memo' => $value->memo2,
						'amount' => floatval($value->amount) / floatval($value->rate)
					);
				} else {
					$customers["$paymentMethod->name"]['amount']	= floatval($value->amount) / floatval($value->rate);
					$customers["$paymentMethod->name"]['transactions'][] = array(
						'type' => $value->type,
						'date' => $value->issued_date,
						'number' => $value->number,
						'memo' => $value->memo2,
						'amount' => floatval($value->amount) / floatval($value->rate)
					);
			//Results
				}
				$total += floatval($value->amount)/ floatval($value->rate);
			}
		}
		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'group' 	=> $key,
				'amount'	=> $value['amount'],
				'transactions' => $value['transactions']
			);
		}
		$data['total'] = $total;
		$data['count'] = count($customers);
		//Response Data
		$this->response($data, 200);
	}
}//End Of Class
