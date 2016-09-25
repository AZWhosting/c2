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
		$onHand = 0;
		$total =0;
		$totalService =0;
		$totalProduct = 0;
		$totalOnhand =0;

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

				$item = new Item_Type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				
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
					$onHand += $in->quantity - $out->quantity;
					if($item->id == 4) {						
						$totalService += 1;
					}
					if($item->id == 1) {						
						$totalService += 1;
					}
					
				}
			}
		}			

		foreach ($temp as $key => $value) {
			$data["results"][] = array(
				'id' 		=> $key,
				'item' 		=> $value['name'],
				'cost'		=> $value['cost'],
				'price'		=> $value['price'],
				'onHand'	=> $value['onHand'],
				'currency'	=> $value['currency_code'],
				'so'		=> isset($value['so'])? $value['so'] : 0,
				'po'		=> $value['po']
			);
			$totalOnhand += $onHand;
		}
		

		// Response Data
		$data['totalService'] = $totalService;
		$data['totalProduct'] = $totalProduct;
		$data['totalOnhand'] = $totalOnhand;
		$data['count'] = count($temp);
		$this->response($data, 200);
	}

	function position_detail_get() {
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
		$totalOnhand = 0;
		$total =0;
		$temp = array();

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
					
					$itemLine = $trx->item_line->get();
					$inventory = $itemLine->item->get();
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
					
					if($inventory->item_type_id == 1) {
						$itemSale++;
					} if($inventory->item_type_id == 4) {
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
			$totalOnhand += $onHand;
			$total += floatval($value['onHand']) * floatval($value['avg_cost']);
		}

		// Response Data
		$data['total'] = $total;
		$data['item'] = $itemSale;
		$data['service'] = $service;
		$data['totalOnhand'] = $totalOnhand;
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
		// $is_pattern = 0;
		$deleted = 0;
		$itemSale = 0;
		$service = 0;
		$onHand = 0;
		$total = 0;
		$jj = 0;
		$totalGPM = 0;
		$costSale =0;
		$totalQuantity  =0 ;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->where('deleted', 0);
		$obj->where('is_recurring', 0);
		// $obj->where('is_pattern', 0);
		$obj->where_in('type', array('Cash_Sale', 'Invoice'));

		// if(isset($filters)) {
		// 	foreach($filters as $filter) {
		// 		$obj->where($filter['field'], $filter['value']);
		// 	}
		// }

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$itemLine = $value->item_line->include_related('item', array('id', 'name', 'on_hand'))->get();
				
				
				foreach ($itemLine as $line) {
					$gpm = 0;
					$gpm = (floatval($itemLine->amount) - (($itemLine->cost) * ($itemLine->quantity) ))/($itemLine->amount);
					$data['results'][] = array(
					'id' => $line->id,
					'type' => $value->type,
					'items' => array(
						'id' => $line->item_id,
						'name' => $line->item_name,
					),
					'qty' => $line->quantity,
					'price' => $line->price,
					'amount' => $line->amount,
					'cost' => $line->cost,
					'gpm' => $gpm
					);
					$totalQuantity += floatval($line->quantity);
					$onHand += floatval($line->item_on_hand);
					$itemSale += floatval($line->amount)/ floatval($line->rate);
					$costSale += floatval($line->cost)/ floatval($line->rate);
					$totalGPM = ($itemSale-$costSale*$totalQuantity)/$itemSale;
				}
				
				
			}
		}

		// Response Data
		$data['gpm'] = $totalGPM;
		$data['sale'] = $itemSale;
		$data['onHand'] = $onHand;
		$this->response($data, 200);
	}

	function item_turnover_get() {
		$filters 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		// $is_pattern = 0;
		$deleted = 0;
		$gpm = 0;
		$turnover = 0;
		$onHand = 0;
		$total =0;
		$adjustment = 0;
		$jj = 0;
		$temp = array();

		$obj = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->where('item_type_id', 1);
		$obj->where('deleted', 0);

		$obj->get_iterated();
		if($obj->exists()) {
			foreach($obj as $value) {
				// get journal line with item inventory account
				$journalLines = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$journalLines->where('account_id', $value->cogs_account_id);
				$journalLines->where_related('transaction', 'deleted', 0);
				$journalLines->where_related('transaction', 'is_recurring', 0);
				// $journalLines->where_related('transaction', 'is_pattern', 0);
				$journalLines->where_in_related('transaction', 'type', array('Invoice', 'Cash_Sale'));
				$journalLines->include_related('transaction', array('id','issued_date', 'type'));
				$journalLines->get();

				if($obj->exists()) {
					foreach($obj as $ad) {
						$adjustment += floatval($ad->quanity) * $ad->movement;
					}
				}

				$itemLines = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$itemLines->where('item_id', $value->id);
				$itemLines->where_related('transaction', 'deleted', 0);
				$itemLines->where_related('transaction', 'is_recurring', 0);
				// $itemLines->where_related('transaction', 'is_pattern', 0);
				$itemLines->where_in_related('transaction', 'type', array('Invoice', 'Cash_Sale'));
				$itemLines->get();

				if($itemLines->exists()) {
					foreach($itemLines as $item) {
						$gpm += (floatval($item->amount) - (floatval($item->quantity) * $value->cost)) / floatval($item->amount);
					}
				}

				if($journalLines->exists()) {
					foreach($journalLines as $line) {
						if(isset($temp["$value->id"])) {
							$temp["$value->id"]['dr'] += $line->dr;
							$temp["$value->id"]['cr'] += $line->cr;
						} else {
							$itemIn = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$itemIn->select_sum("quantity");
							$itemIn->where_in_related("transaction", "type", array("Cash_Purchase", "Credit_Purchase", "Adjustment"));
							$itemIn->where("item_id", $value->id);
							$itemIn->where("movement", 1);
							$itemIn->get();
							
							$itemOut = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$itemOut->select_sum("quantity");
							$itemOut->where_in_related("transaction", "type", array("Invoice", "Cash_Sale", "Adjustment"));
							$itemOut->where("item_id", $value->id);
							$itemOut->where("movement", -1);
							$itemOut->get();

							$on_hand = floatval($itemIn->quantity) - floatval($itemOut->quantity);
							$temp["$value->id"]['name'] = $value->name;
							$temp["$value->id"]['dr'] = $line->dr;
							$temp["$value->id"]['cr'] = $line->cr;
							$temp["$value->id"]['onhand'] = $on_hand;
						}
					}
				}
				
					
			}
		}
		foreach ($temp as $key => $value) {
			$cogs = floatval($value['dr']) - floatval($value['cr']);
			$jj += floatval($value['onhand']);
			$turnover += $jj > 0? ($cogs/$jj) : 0;
			$onHand += $value['onhand'];
			$data["results"][] = array(
				'id' 	=> $key,
				'cogs' 	=> $cogs,
				'onHand'=> $value['onhand'],
				'turnover'=> $value['onhand']>0? ($cogs/floatval($value['onhand'])) : 0
			);
		}
		$data['onhand'] = $onHand;
		$data['turnover'] = $turnover;
		$data['count'] = count($temp);
		$this->response($data, 200);
	}

	function movement_summary_get() {
		$filters 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		// $is_pattern = 0;
		$deleted = 0;
		$totalSale = 0;
		$service = 0;
		$onHand = 0;
		$total =0;
		$temp = array();

		$obj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->where_related('transaction', 'deleted', 0);
		$obj->where_related('transaction', 'is_recurring', 0);
		// $obj->where_related('transaction', 'is_pattern', 0);
		$obj->where_in_related('transaction', 'type', array('Cash_Sale', 'Invoice', 'Cash_Purchase', 'Credit_Purchase'));

		$obj->get_iterated();
		if($obj->exists()) {
			foreach($obj as $value) {
				$adjustment = 0;
				$adj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$adj->where('item_id', $value->item_id);
				$adj->where_related('transaction', 'deleted', 0);
				$adj->where_related('transaction', 'is_recurring', 0);
				// $adj->where_related('transaction', 'is_pattern', 0);
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
					$temp["$value->item_id"]['item']		= array("id" => $item->id, "name" => $item->name);
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

	function movement_detail_get() {
		$filters 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		// $is_pattern = 0;
		$deleted = 0;
		$gpm = 0;
		$service = 0;
		$adjustment = 0;
		$onHand = 0;
		$total =0;
		$temp = array();

		$obj = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->where('item_type_id', 1);
		$obj->where('deleted', 0);

		$obj->get_iterated();
		if($obj->exists()) {
			foreach($obj as $value) {
				// get journal line with item inventory account
				$journalLines = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$journalLines->where('account_id', $value->inventory_account_id);
				$journalLines->where_related('transaction', 'deleted', 0);
				$journalLines->where_related('transaction', 'is_recurring', 0);
				// $journalLines->where_related('transaction', 'is_pattern', 0);
				$journalLines->where_in_related('transaction', 'type', array('Cash_Purchase', 'Credit_Purcahse', 'Invoice', 'Cash_Sale'));
				$journalLines->include_related('transaction', array('id','issued_date', 'type'));
				$journalLines->get();

				if($obj->exists()) {
					foreach($obj as $ad) {
						$adjustment += floatval($ad->quanity) * $ad->movement;
					}
				}

				$itemLines = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$itemLines->where('item_id', $value->id);
				$itemLines->where_related('transaction', 'deleted', 0);
				$itemLines->where_related('transaction', 'is_recurring', 0);
				// $itemLines->where_related('transaction', 'is_pattern', 0);
				$itemLines->where_in_related('transaction', 'type', array('Invoice', 'Cash_Sale'));
				$itemLines->get();

				if($itemLines->exists()) {
					foreach($itemLines as $item) {
						$gpm += (floatval($item->amount) - (floatval($item->quantity) * $value->cost)) / floatval($item->amount);
					}
				}

				if($journalLines->exists()) {
					foreach($journalLines as $line) {
						$adjustment = 0;
						$adj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$adj->where_related('transaction', 'id', $line->transaction_id);
						$adj->get();
						if($adj->exists()) {
							foreach($adj as $ad) {
								$adjustment += floatval($ad->quanity) * $ad->movement;
							}
						}
						if(isset($temp["$value->id"])) {
							$temp["$value->id"][] 	= array(
								"id"   => $line->transaction_id,
								"date" => $line->transaction_issued_date,
								"type" => $line->transaction_type,
								"name" => array(
									"id" => $value->id,
									"name" => $value->name
								),
								"opening" => 0,
								"dr" => $line->dr,
								"cr" => $line->cr,
								"adjustment"=> $adjustment
							);
						} else {
							$temp["$value->id"][] 	= array(
								"id"   => $line->transaction_id,
								"date" => $line->transaction_issued_date,
								"type" => $line->transaction_type,
								"name" => array(
									"id" => $value->id,
									"name" => $value->name
								),
								"opening" => 0,
								"dr" => $line->dr,
								"cr" => $line->cr,
								"adjustment"=> $adjustment
							);
						}
					}
				}
				
					
			}
		}
		foreach ($temp as $key => $value) {
			$data["results"][] = $value;
		}
		$data['gpm'] = $gpm;
		$data['count'] = count($temp);
		$this->response($data, 200);
	}

}//End Of Class
