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
						$customers["$fullname"]['amount']+= floatval($value->amount);
					} else {
						$customers[$fullname]['amount']= floatval($value->amount);
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
				'group' => $key,
				'amount'	 => $value['amount'],
				'items'	=> $value['transactions']
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
				$account  = $value->account->get();

				$segment = new Segmentlist(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
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
			$obj->where_in("type", "Invoice");

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
						$customers["$fullname"]['amount']+= floatval($value->amount);
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

		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
		$type->where('parent_id', 1)->get();

		$obj->where_related("contact", 'contact_type_id', $type);
		$obj->where_in("type", array("Invoice"));

		// $obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		$customers = array();
		$total = 0;
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$items = $value->item_line->include_related('item', array('name'))->get();
				$lines = array();
				foreach($items as $item) {
					$data['results'][] = array(
						'name' 			=> $item->item_name,
						'quantity' 	=> $item->quantity,
						'price' 		=> floatval($item->price)/floatval($value->rate),
						'amount'		=> floatval($item->amount)/floatval($value->rate)
					);
				}
				$total += floatval($value->amount)/floatval($value->rate);
			}
		}
		$data['total'] = $total;
		$data['count'] = count($customers);
		//Response Data
		$this->response($data, 200);
	}

	function detail_list_get() {
		$this->response(array('results' => "sales by item or service--detail"), 200);
	}

}//End Of Class
