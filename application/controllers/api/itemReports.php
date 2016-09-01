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

				$in = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$in->select_sum('quantity');
				$in->where('item_id', $value->id);
				$in->where('movement', 1);
				$in->get();

				$out = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$out->select_sum('quantity');
				$out->where('item_id', $value->id);
				$out->where('movement', -1);
				$out->get();
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
						$temp["$trx->item_id"]['onHand'] = $in->quantity - $out->quantity;
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
				$line->where_related('item_line', 'item_id', $value->id);
				$line->where_in('type', array("Purchase_Order", "Sale_Order"));
				$line->get();

				foreach($line as $trx) {
					$inventory = $trx->item->get();
					$itemLine = $trx->item_line->get();
					if(isset($temp["$value->id"])) {
						$temp["$value->id"]['transactions'][] = array(
							'id' => $trx->id,
							'date' => $trx->issued_date,
							'type' 	=> $trx->type,
							'ref'	=> $trx->reference_id,
							'qty'	=> $itemLine->quantity * $itemLine->movement,
							'cost'  => $itemLine->cost,
							'price' => $itemLine->price

						);
					} else {
						$in = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$in->select_sum('quantity');
						$in->where('item_id', $value->id);
						$in->where('movement', 1);
						$in->get();

						$out = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$out->select_sum('quantity');
						$out->where('item_id', $value->id);
						$out->where('movement', -1);
						$out->get();
						
						$temp["$value->id"]['name'] = $value->name;
						$temp["$value->id"]['avg_cost'] = $value->cost;
						$temp["$value->id"]['price'] = $value->price;
						$temp["$value->id"]['onHand'] = $in->quantity - $out->quantity;
						$temp["$value->id"]['currency_code'] = $value->locale;
						$temp["$value->id"]['transactions'][] = array(
							'id' => $trx->id,
							'date' => $trx->issued_date,
							'type' 	=> $trx->type,
							'ref'	=> $trx->reference_id,
							'qty'	=> $itemLine->quantity * $itemLine->movement,
							'cost'  => $itemLine->cost,
							'price' => $itemLine->price
						);
						$onHand += $in->quantity - $out->quantity;
					}
					
					if($inventory->item_type == 1) {
						$itemSale++;
					} else {
						$service++;
					}
				}
			}
		}
		foreach ($temp as $key => $value) {
			$data["results"][] = array(
				'id' 	=> $key,
				'item' 	=> $value['name'],
				'avg_cost'	=> $value['avg_cost'],
				'price'	=> $value['price'],
				'onHand'	=> $value['onHand'],
				'currency'	=> $value['currency_code'],
				'transactions' => $value['transactions']
			);
			$total += floatval($value['onHand']) * floatval($value['avg_cost']);
		}

		// Response Data
		$data['total'] = $total;
		$data['item'] = $itemSale;
		$data['service'] = $service;
		$data['onHand'] = $onHand;
		$this->response($data, 200);
	}

	function item_sale_get() {
		// for item (sale- avg_cost) /avg_cost -- gross profit
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

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->where('deleted', 0);
		$obj->where('is_recurring', 0);
		$obj->where('is_pattern', 0);
		$obj->where_in('type', array('Cash_Sale', 'Invoice'));

		if(isset($filters)) {
			foreach($filters as $filter) {
				$obj->where($filter['field'], $filter['value']);
			}
		}

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$itemLine = $value->item_line->include_related('item', array('id', 'name', 'on_hand'))->get();
				$gpm = (floatval($itemLine->amount) - ($itemLine->quanity * floatval($itemLine->cost))) / ($itemLine->quanity * floatval($itemLine->cost));
				$data['result'][] = array(
					'id' => $value->id,
					'type' => $value->type,
					'item' => array(
						'id' => $itemLine->item_id,
						'name' => $itemLine->item_name,
					),
					'qty' => $itemLine->quanity * ,
					'price' => $itemLine->price,
					'amount' => $itemLine->amount,
					'cost' => $itemLine->cost,
					'gpm' => $gpm
				)
				$total += $gpm;
				$onHand += floatval($itemLine->item_on_hand);
			}
		}

		// Response Data
		$data['total'] = $total;
		$data['sale'] = $itemSale;
		$data['onHand'] = $onHand;
		$this->response($data, 200);
	}

	function item_turnover_get() {}

	function movement_summary_get() {
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
		$temp = array();

		$obj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->where_related('transaction', 'deleted', 0);
		$obj->where_related('transaction', 'is_recurring', 0);
		$obj->where_related('transaction', 'is_pattern', 0);
		$obj->where_in_related('transaction', 'type', array('Cash_Sale', 'Invoice', 'Cash_Purchase', 'Credit_Purchase'));

		$obj->get_iterated();
		if($obj->exists()) {
			foreach($obj as $value) {
				$adjustment = 0;
				$adj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$adj->where('item_id', $value->item_id);
				$adj->where_related('transaction', 'deleted', 0);
				$adj->where_related('transaction', 'is_recurring', 0);
				$adj->where_related('transaction', 'is_pattern', 0);
				$adj->where_related('transaction', 'type', 'Adjustment');
				$adj->get();

				if($adj->exists()) {
					foreach($adj as $ad) {
						$adjustment += floatval($ad->quanity) * $ad->movement;
					}
				}
				
				if(isset($temp["$value->item_id"])) {
					$temp["$value->item_id"]['purchase'] 	+= $value->movement == 1 ? $value->quantity : 0;
					$temp["$value->item_id"]['sale'] 	 	+= $value->movement == -1 ? $value->quantity : 0;
				} else {
					$item = $value->item->get();
					$temp["$value->item_id"]['item']		= array("id" = $item->id, "name" => $item->name);
					$temp["$value->item_id"]['purchase'] 	= $value->movement == 1 ? $value->quantity : 0;
					$temp["$value->item_id"]['sale'] 	 	= $value->movement == -1 ? $value->quantity : 0;
					$temp["$value->item_id"]['adjustment'] 	= $adjustment;
				}
			}
		}
		foreach ($temp as $key => $value) {
			$data["results"][] = array(
				'id' 	=> $key,
				'item' 	=> $value['item'],
				'sale'	=> $value['sale'],
				'purchase'	=> $value['purchase'],
				'adjustment'	=> $value['adjustment']
			);
		}
		$data['total'] = $total;
		$data['count'] = count($temp);
		$this->response($data, 200);
	}

	function movement_detail_get() {}

}//End Of Class