<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Itemreports extends REST_Controller {
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
			$this->_database = $conn->inst_database;
			
		}
	}

	function position_summary_get() {
		$filters 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;
		$temp = array();
		$total =0;

		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$type->where('parent_id', 1)->get();

		$obj = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->where("item_type_id", 1);
		$obj->where('is_pattern', 0);

		// $obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$po = 0;
				$so = 0;
				$line = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$line->where('item_id', $value->id);
				$line->where_related('transaction', 'status <>', 1);
				$line->where_in_related('transaction', 'type', array("Purchase_Order", "Sale_Order"));
				$line->include_related('transaction', 'type');
				$line->get();
				foreach($line as $trx) {
					if(isset($temp["$trx->item_id"])) {
						if($line->transaction_type == "Purchase_Order") {
							$temp["$trx->item_id"]['po'] += $trx->quantity;
						} else {
							$temp["$trx->item_id"]['so'] += $trx->quantity;
						}
					} else {
						if($line->transaction_type == "Purchase_Order") {
							$temp["$trx->item_id"]['po'] = $trx->quantity;
						} else {
							$temp["$trx->item_id"]['so'] = $trx->quantity;
						}
						$temp["$trx->item_id"]['name'] = $value->name;
						$temp["$trx->item_id"]['cost'] = $value->cost;
						$temp["$trx->item_id"]['price'] = $value->price;
						$temp["$trx->item_id"]['onHand'] = $value->on_hand;
						$temp["$trx->item_id"]['currency_code'] = $value->locale;
					}
				}
			}
		}			

		foreach ($temp as $key => $value) {
			$data["results"][] = array(
				'id' 	=> $key,
				'item' 	=> $value['name'],
				'cost'	=> $value['cost'],
				'price'	=> $value['price'],
				'onHand'	=> $value['onHand'],
				'currency'	=> $value['currency_code'],
				'so'	=> $value['so'],
				'po'	=> $value['po']
			);
		}

		// Response Data
		$data['total'] = $total;
		$data['count'] = count($temp);
		$this->response($data, 200);
	}

	function postion_detail_get() {
		$filters 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;
		$itemSale = 0;
		$service = 0;
		$onHand = 0;
		$total =0;

		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$type->where('parent_id', 1)->get();

		$obj = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->where("item_type_id", 1);
		$obj->where('is_pattern', 0);

		// $obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$line = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$line->where('is_recurring', 0);
				$line->where('status <>', 1);
				$line->where_in('type', array("Purchase_Order", "Sale_Order"));
				$line->get();
				foreach($line as $trx) {
					$item = $trx->item_line->get();
					foreach($item as $i) {
						$inventory = $i->item->get();
						$data["results"][] = array(
							'item' 	=> $inventory->name,
							'id' 	=> $trx->id,
							'ref'	=> $trx->reference_id,
							'type' 	=> $trx->type,
							'qty' 	=> $i->quantity,
							'cost' 	=> $i->cost,
							'on_hand' => $inventory->on_hand,
							'avg_cost' 	=> $inventory->cost,
							'date'	=> $trx->issued_date
						);
						$onHand += $inventory->on_hand;
						if($inventory->item_type == 1) {
							$itemSale++;
						} else {
							$service++;
						}
					}						
				}
			}
		}

		// Response Data
		$data['total'] = $total;
		$data['item'] = $itemSale;
		$data['service'] = $service;
		$data['onHand'] = $onHand;
		$this->response($data, 200);
	}

	function item_sale_get() {}

	function item_turnover_get() {}

	function movement_summary() {}

	function movement_detail() {}

}//End Of Class
