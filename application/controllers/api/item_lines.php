<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Item_lines extends REST_Controller {
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

	//GET
	function index_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		
		$obj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		//Sort
		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
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

		//Results
		if($page && $limit){
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
		}else{
			$obj->get_iterated();
			$data["count"] = $obj->result_count();
		}

		if($obj->exists()){
			foreach ($obj as $value) {
				$itemPrice = [];
				// if($value->item_id>0){
				// 	$pl = new Item_price(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				// 	$pl->where("item_id", $value->item_id);
				// 	$pl->get();
				// 	foreach ($pl as $p) {
				// 		$itemPrice[] = array(
				// 			"id" 			=> $p->id,
				// 			"item_id" 		=> $p->item_id,
				// 			"assembly_id"	=> $p->assembly_id,
				// 			"measurement_id"=> $p->measurement_id,
				// 			"quantity"		=> floatval($p->quantity),
				// 			"unit_value" 	=> floatval($p->unit_value),
				// 			"price" 		=> floatval($p->price),
				// 			"amount" 		=> floatval($p->amount),
				// 			"locale" 		=> $p->locale,

				// 			"measurement" 	=> $p->measurement->get()->name
				// 		);
				// 	}
				// }

				$data["results"][] = array(
					"id" 				=> $value->id,
			   		"transaction_id"	=> $value->transaction_id,
			   		"measurement_id" 	=> $value->measurement_id,
					"tax_item_id" 		=> $value->tax_item_id,
					"item_id" 			=> $value->item_id,
					"assembly_id" 		=> $value->assembly_id,
				   	"description" 		=> $value->description,
				   	"on_hand" 			=> floatval($value->on_hand),
					"on_po" 			=> floatval($value->on_po),
					"on_so" 			=> floatval($value->on_so),
					"quantity" 			=> floatval($value->quantity),
				   	"quantity_adjusted" => floatval($value->quantity_adjusted),
				   	"unit_value" 		=> floatval($value->unit_value),
				   	"cost"				=> floatval($value->cost),
				   	"price"				=> floatval($value->price),
				   	"price_avg" 		=> floatval($value->price_avg),
				   	"amount" 			=> floatval($value->amount),
				   	"discount" 			=> floatval($value->discount),
				   	"fine" 				=> floatval($value->fine),
				   	"additional_cost" 	=> floatval($value->additional_cost),
				   	"additional_applied"=> $value->additional_applied,
				   	"rate"				=> floatval($value->rate),
				   	"locale" 			=> $value->locale,
				   	"movement" 			=> $value->movement,
				   	"required_date"		=> $value->required_date,

				   	"item_prices" 		=> $itemPrice
				);
			}
		}
		$this->response($data, 200);
	}

	//POST
	function index_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {
			$obj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			//Record Item Movement
			if($value->item_id>0){
				$item = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$item->where("item_type_id", 1);
				$item->where("is_assembly <>", 1);
				$item->where("is_catalog <>", 1);
				$item->get_by_id($value->item_id);

				if($item->exists()){
					$transaction = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$transaction->where("is_recurring <>", 1);
					$transaction->where("deleted <>", 1);
					$transaction->get_by_id($value->transaction_id);
					
					if($transaction->exists()){
						//Sum On Hand
						$itemMovement = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);						
						$itemMovement->where_in_related("transaction", "type", array("Cash_Purchase", "Credit_Purchase", "Commercial_Invoice", "Vat_Invoice", "Invoice", "Commercial_Cash_Sale", "Vat_Cash_Sale", "Cash_Sale", "Adjustment"));
						$itemMovement->where("item_id", $value->item_id);
						$itemMovement->where_related("transaction", "issued_date <=", $transaction->issued_date);
						$itemMovement->where_related("transaction", "is_recurring <>", 1);
						$itemMovement->where_related("transaction", "deleted <>", 1);
						$itemMovement->get_iterated();

						$onHand = 0;
						foreach ($itemMovement as $val) {
							$onHand += ($val->quantity * $val->unit_value * $val->movement);
						}

						$currentQuantity = floatval($value->quantity) * floatval($value->unit_value);
						$totalQty = $onHand + $currentQuantity;

						if($totalQty==0){
							$totalQty = 1;
						}

						if($transaction->type=="Commercial_Invoice" || $transaction->type=="Vat_Invoice" || $transaction->type=="Invoice" || $transaction->type=="Commercial_Cash_Sale" || $transaction->type=="Vat_Cash_Sale" || $transaction->type=="Cash_Sale"){
							//Avg Price
							$lastPrice = $onHand * floatval($item->price);
							$currentPrice = $currentQuantity * (floatval($value->price) / floatval($transaction->rate));

							$item->price = ($lastPrice + $currentPrice) / $totalQty;
							$obj->cost = $currentQuantity * floatval($item->cost) * floatval($transaction->rate);
							$obj->price_avg = ($lastPrice + $currentPrice) / $totalQty;
						}

						if($transaction->type=="Cash_Purchase" || $transaction->type=="Credit_Purchase" || $transaction->type=="Item_Adjustment"){
							//Avg Cost
							$lastCost = $onHand * floatval($item->cost);
							$currentCost = ($currentQuantity*floatval($value->cost) + floatval($value->additional_cost)) / floatval($transaction->rate);

							if($onHand>0){
								$item->cost = ($lastCost + $currentCost) / $totalQty;
							}else{
								$item->cost = $currentCost / $currentQuantity;
							}
						}

						if($transaction->type=="Item_Adjustment" && $item->cost==0){
							//Avg Cost
							$item->cost = floatval($value->cost);
						}

						if($item->save()){
							$poso = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$poso->where_in_related("transaction", "type", array("Purchase_Order, Sale_Order"));
							$poso->where_related("transaction", "issued_date <=", $transaction->issued_date);
							$poso->where_related("transaction", "status", 0);
							$poso->where_related("transaction", "is_recurring <>", 1);
							$poso->where_related("transaction", "deleted <>", 1);
							$poso->get_iterated();

							$onPO = 0; $onSO = 0;
							foreach ($poso as $val) {
								if($val->type=="Purchase_Order"){
									$onPO += ($val->quantity * $val->unit_value);
								}else{
									$onSO += ($val->quantity * $val->unit_value);
								}
							}
							$obj->on_po = $onPO;
							$obj->on_so = $onSO;
						}
					}					
				}
			}

			isset($value->transaction_id) 	? $obj->transaction_id 		= $value->transaction_id : "";
			isset($value->item_id)			? $obj->item_id				= $value->item_id : "";
			isset($value->assembly_id)		? $obj->assembly_id 		= $value->assembly_id : "";
			isset($value->measurement_id)	? $obj->measurement_id		= $value->measurement_id : "";
			isset($value->tax_item_id)		? $obj->tax_item_id			= $value->tax_item_id : "";
		   	isset($value->description)		? $obj->description 		= $value->description : "";
		   	isset($value->on_hand)			? $obj->on_hand 			= $value->on_hand : "";
		   	// isset($value->on_po)			? $obj->on_po 				= $value->on_po : "";
		   	// isset($value->on_so)			? $obj->on_so 				= $value->on_so : "";
		   	isset($value->quantity)			? $obj->quantity 			= $value->quantity : "";
		   	isset($value->quantity_adjusted)? $obj->quantity_adjusted 	= $value->quantity_adjusted : "";
		   	isset($value->unit_value)		? $obj->unit_value 			= $value->unit_value : $obj->unit_value = 1;
		   	isset($value->cost)				? $obj->cost 				= $value->cost : "";
		   	isset($value->price)			? $obj->price 				= $value->price : "";
		   	//isset($value->price_avg)		? $obj->price_avg 			= $value->price_avg : "";
		   	isset($value->amount)			? $obj->amount 				= $value->amount : "";
		   	isset($value->discount)			? $obj->discount 			= $value->discount : "";
		   	isset($value->fine)				? $obj->fine 				= $value->fine : "";
		   	isset($value->rate)				? $obj->rate 				= $value->rate : "";
		   	isset($value->locale)			? $obj->locale 				= $value->locale : "";
		   	isset($value->additional_cost)	? $obj->additional_cost  	= $value->additional_cost : "";
		   	isset($value->movement)			? $obj->movement 			= $value->movement : "";
		   	isset($value->required_date)	? $obj->required_date 		= $value->required_date : "";

		   	if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 				=> $obj->id,
			   		"transaction_id"	=> $obj->transaction_id,
			   		"measurement_id" 	=> $obj->measurement_id,
			   		"tax_item_id" 		=> $obj->tax_item_id,
					"item_id" 			=> $obj->item_id,
					"assembly_id" 		=> $obj->assembly_id,
				   	"description" 		=> $obj->description,
				   	"on_hand" 			=> floatval($obj->on_hand),
					"on_po" 			=> floatval($obj->on_po),
					"on_so" 			=> floatval($obj->on_so),
					"quantity" 			=> floatval($obj->quantity),
				   	"quantity_adjusted" => floatval($obj->quantity_adjusted),
				   	"unit_value" 		=> floatval($obj->unit_value),
				   	"cost"				=> floatval($obj->cost),
				   	"price"				=> floatval($obj->price),
				   	"price_avg" 		=> floatval($obj->price_avg),
				   	"amount" 			=> floatval($obj->amount),
				   	"discount" 			=> floatval($obj->discount),
				   	"fine" 				=> floatval($obj->fine),
				   	"additional_cost" 	=> floatval($obj->additional_cost),
				   	"additional_applied"=> $obj->additional_applied,
				   	"rate"				=> floatval($obj->rate),
				   	"locale" 			=> $obj->locale,
				   	"movement" 			=> $obj->movement,
				   	"required_date"		=> $obj->required_date
			   	);
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}

	//PUT
	function index_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {
			$obj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			//Updat record item: old - new
			// if(isset($value->item_id)){
			// 	if($value->item_id>0){
			// 		$item = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			// 		$item->get_by_id($value->item_id);

			// 		if($item->item_type_id=="1"){
			// 			$transaction = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			// 			$transaction->get_by_id($value->transaction_id);

			// 			if($transaction->type=='Invoice' || $transaction->type=='Cash_Sale' || $transaction->type=='Cash_Purchase' || $transaction->type=='Credit_Purchase'){
			// 			    $item->on_hand += floatval($obj->quantity) - floatval($value->quantity);
			// 			}else if($transaction->type=='Adjustment'){
			// 			    $item->on_hand += floatval($obj->quantity) - (floatval($value->quantity) * floatval($value->movement));
			// 			}

			// 			$item->save();
			// 		}
			// 	}
			// }

			isset($value->transaction_id) 	? $obj->transaction_id 		= $value->transaction_id : "";
			isset($value->item_id)			? $obj->item_id				= $value->item_id : "";
			isset($value->assembly_id)		? $obj->assembly_id 		= $value->assembly_id : "";
			isset($value->measurement_id)	? $obj->measurement_id		= $value->measurement_id : "";
			isset($value->tax_item_id)		? $obj->tax_item_id			= $value->tax_item_id : "";
		   	isset($value->description)		? $obj->description 		= $value->description : "";
		   	// isset($value->on_hand)		? $obj->on_hand 			= $value->on_hand : "";
		   	isset($value->on_po)			? $obj->on_po 				= $value->on_po : "";
		   	isset($value->on_so)			? $obj->on_so 				= $value->on_so : "";
		   	isset($value->quantity)			? $obj->quantity 			= $value->quantity : "";
		   	isset($value->quantity_adjusted)? $obj->quantity_adjusted 	= $value->quantity_adjusted : "";
		   	isset($value->unit_value)		? $obj->unit_value 			= $value->unit_value : "";
		   	isset($value->cost)				? $obj->cost 				= $value->cost : "";
		   	isset($value->price)			? $obj->price 				= $value->price : "";
		   	isset($value->price_avg)		? $obj->price_avg 			= $value->price_avg : "";
		   	isset($value->amount)			? $obj->amount 				= $value->amount : "";
		   	isset($value->discount)			? $obj->discount 			= $value->discount : "";
		   	isset($value->fine)				? $obj->fine 				= $value->fine : "";
		   	isset($value->rate)				? $obj->rate 				= $value->rate : "";
		   	isset($value->locale)			? $obj->locale 				= $value->locale : "";
		   	isset($value->additional_cost)	? $obj->additional_cost  	= $value->additional_cost : "";
		   	isset($value->movement)			? $obj->movement 			= $value->movement : "";
		   	isset($value->required_date)	? $obj->required_date 		= $value->required_date : "";

			if($obj->save()){
				//Results
				$data["results"][] = array(
					"id" 				=> $obj->id,
			   		"transaction_id"	=> $obj->transaction_id,
			   		"measurement_id" 	=> $obj->measurement_id,
			   		"tax_item_id" 		=> $obj->tax_item_id,
					"item_id" 			=> $obj->item_id,
					"assembly_id" 		=> $obj->assembly_id,
				   	"description" 		=> $obj->description,
				   	"on_hand" 			=> floatval($obj->on_hand),
					"on_po" 			=> floatval($obj->on_po),
					"on_so" 			=> floatval($obj->on_so),
					"quantity" 			=> floatval($obj->quantity),
				   	"quantity_adjusted" => floatval($obj->quantity_adjusted),
				   	"unit_value" 		=> floatval($obj->unit_value),
				   	"cost"				=> floatval($obj->cost),
				   	"price"				=> floatval($obj->price),
				   	"price_avg" 		=> floatval($obj->price_avg),
				   	"amount" 			=> floatval($obj->amount),
				   	"discount" 			=> floatval($obj->discount),
				   	"fine" 				=> floatval($obj->fine),
				   	"additional_cost" 	=> floatval($obj->additional_cost),
				   	"additional_applied"=> $obj->additional_applied,
				   	"rate"				=> floatval($obj->rate),
				   	"locale" 			=> $obj->locale,
				   	"movement" 			=> $obj->movement,
				   	"required_date"		=> $obj->required_date
				);
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}

	//DELETE
	function index_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();

			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
		}

		//Response data
		$this->response($data, 200);
	}

}
/* End of file item_lines.php */
/* Location: ./application/controllers/api/item_lines.php */
