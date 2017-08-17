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
	    		if(isset($value["operator"])) {
	    			if($value["operator"]=="item") {
	    				
					}else{
						$obj->{$value["operator"]}($value["field"], $value["value"]);
					}
				} else {
					$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->include_related("item", array("item_type_id","abbr","number","name","cost","price","locale","income_account_id","expense_account_id","inventory_account_id"));
		$obj->include_related("measurement", array("name"));
		$obj->include_related("tax_item", array("tax_type_id","account_id","name","rate"));
		$obj->where("deleted <>", 1);

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
				//Item
				$item = array(
					"id" 					=> $value->item_id,
					"item_type_id" 			=> $value->item_item_type_id,
					"abbr"					=> $value->item_abbr, 
					"number" 				=> $value->item_number, 
					"name" 					=> $value->item_name,
					"cost"					=> $value->item_cost,
					"price"					=> $value->item_price,
					"locale"				=> $value->item_locale,
					"income_account_id"		=> $value->item_income_account_id, 
					"expense_account_id" 	=> $value->item_expense_account_id, 
					"inventory_account_id" 	=> $value->item_inventory_account_id
				);

				//Measurement
				$measurement = array(
					"measurement_id" 	=> $value->measurement_id,
					"measurement"		=> $value->measurement_name ? $value->measurement_name : ""
				);

				//Tax Item
				$tax_item = array(
					"id" 			=> $value->tax_item_id,
					"tax_type_id" 	=> $value->tax_item_tax_type_id ? $value->tax_item_tax_type_id : "",
					"account_id" 	=> $value->tax_item_account_id ? $value->tax_item_account_id : "",
					"name" 			=> $value->tax_item_name ? $value->tax_item_name : "",
					"rate" 			=> $value->tax_item_rate ? $value->tax_item_rate : ""
				);

				//WHT Account
				$wht_account = [];
				if($value->wht_account_id>0){
					$whtAccounts = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$whtAccounts->select("number, name");
					$whtAccounts->get_by_id($value->wht_account_id);

					$wht_account = array(
						"id" 		=> $value->wht_account_id,
						"number" 	=> $whtAccounts->number,
						"name" 		=> $whtAccounts->name
					);
				}
				
				$data["results"][] = array(
					"id" 				=> $value->id,
			   		"transaction_id"	=> $value->transaction_id,
			   		"measurement_id" 	=> $value->measurement_id,
					"tax_item_id" 		=> $value->tax_item_id,
					"wht_account_id"	=> $value->wht_account_id,
					"item_id" 			=> $value->item_id,
					"assembly_id" 		=> $value->assembly_id,
				   	"description" 		=> $value->description,
				   	"on_hand" 			=> floatval($value->on_hand),
					"on_po" 			=> floatval($value->on_po),
					"on_so" 			=> floatval($value->on_so),
					"gross_weight" 		=> floatval($value->gross_weight),
					"truck_weight" 		=> floatval($value->truck_weight),
					"bag_weight" 		=> floatval($value->bag_weight),
					"yield" 			=> floatval($value->yield),
					"quantity" 			=> floatval($value->quantity),
				   	"quantity_adjusted" => floatval($value->quantity_adjusted),
				   	"conversion_ratio" 	=> floatval($value->conversion_ratio),
				   	"cost"				=> floatval($value->cost),
				   	"price"				=> floatval($value->price),
				   	"price_avg" 		=> floatval($value->price_avg),
				   	"amount" 			=> floatval($value->amount),
				   	"markup" 			=> floatval($value->markup),
				   	"discount" 			=> floatval($value->discount),
				   	"fine" 				=> floatval($value->fine),
				   	"tax" 				=> floatval($value->tax),
				   	"additional_cost" 	=> floatval($value->additional_cost),
				   	"additional_applied"=> $value->additional_applied==1?true : false,
				   	"rate"				=> floatval($value->rate),
				   	"locale" 			=> $value->locale,
				   	"movement" 			=> $value->movement,
				   	"required_date"		=> $value->required_date,
				   	"deleted"			=> $value->deleted,
				   	
				   	"item" 				=> $item,
				   	"measurement" 		=> $measurement,
				   	"tax_item" 			=> $tax_item,
				   	"wht_account" 		=> $wht_account
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
		$typeList = array("Cash_Purchase","Credit_Purchase","Internal_Usage","Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale","Sale_Return","Payment_Refund","Purchase_Return","Cash_Refund","Item_Adjustment");

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
						if($value->movement!==0 && in_array($transaction->type, $typeList)){
							//Sum quantity
							$currentQuantity = floatval($value->quantity) * floatval($value->conversion_ratio) * floatval($value->movement);
							$totalQty = $item->quantity + $currentQuantity;

							//Negative on hand
							if(floatval($item->quantity)<0){
								$journalLines = [];								
								if($totalQty==0){
									$item->amount = 0;
									$amount = (floatval($item->quantity) * floatval($item->cost)) + (($currentQuantity * floatval($value->cost)) / floatval($value->rate));

									//COGS on Dr
									$journalLines[] = array(
										"transaction_id"=> $value->transaction_id,
										"account_id" 	=> $item->expense_account_id,
										"contact_id" 	=> $transaction->contact_id,
										"description" 	=> $value->description,
										"reference_no" 	=> "",
										"segments" 	 	=> [],
										"dr" 	 		=> $amount * floatval($value->rate),
										"cr" 			=> 0,
										"rate"			=> $value->rate,
										"locale"		=> $item->locale
									);

									//Inventory on Cr
									$journalLines[] = array(
										"transaction_id"=> $value->transaction_id,
										"account_id" 	=> $item->inventory_account_id,
										"contact_id" 	=> $transaction->contact_id,
										"description" 	=> $value->description,
										"reference_no" 	=> "",
										"segments" 	 	=> [],
										"dr" 	 		=> 0,
										"cr" 			=> $amount * floatval($value->rate),
										"rate"			=> $value->rate,
										"locale"		=> $item->locale
									);
								}else if($totalQty<0){
									$currentAmount = ($currentQuantity * floatval($item->cost)) / floatval($value->rate);
									
									$totalAmount = $item->amount + $currentAmount;
									$item->amount = $totalAmount;
								}else{
									$additionalCost = 0;
									if(isset($value->additional_cost)){
										$additionalCost = floatval($value->additional_cost);
									}
									$currentAmount = ($currentQuantity * floatval($value->cost) + $additionalCost) / floatval($value->rate);

									//New Average Cost										
									$avgCost = (floatval($value->cost) + ($additionalCost / $currentQuantity)) / floatval($value->rate);
									$item->cost = $avgCost;

									$totalAmount = $avgCost * $totalQty;
									$item->amount = $totalAmount;
								}

								//Add journal
								for ($i=0; $i < count($journalLines); $i++) { 
									$journals = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

									$journals->transaction_id	= $journalLines[$i]["transaction_id"];
									$journals->account_id 		= $journalLines[$i]["account_id"];
									$journals->contact_id 		= $journalLines[$i]["contact_id"];
									$journals->description 		= $journalLines[$i]["description"];
									// $journals->reference_no 	= $journalLines[$i]["reference_no"];
									// $journals->segments 	 	= $journalLines[$i]["segments"];
									$journals->dr 	 			= $journalLines[$i]["dr"];
									$journals->cr 				= $journalLines[$i]["cr"];
									$journals->rate				= $journalLines[$i]["rate"];
									$journals->locale			= $journalLines[$i]["locale"];

									$journals->save();
								}
							}else{//Positive on hand
								//Sum Amount
								//Additional Cost
								$additionalCost = 0;
								if(isset($value->additional_cost)){
									$additionalCost = floatval($value->additional_cost);
								}
								$currentAmount = ($currentQuantity * floatval($value->cost) + $additionalCost) / floatval($value->rate);

								//New Average Cost = $totalAmount / $totalQuantity
								$totalAmount = $item->amount + $currentAmount;
								$item->cost = $totalAmount / $totalQty;
								$item->amount = $totalAmount;
							}

							$item->quantity = $totalQty;
							$value->cost_avg = $item->cost;

							//Update Item
							if($item->save()){
								$poso = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
								$poso->where_in_related("transaction", "type", array("Purchase_Order, Sale_Order"));
								$poso->where_related("transaction", "issued_date <=", $transaction->issued_date);
								$poso->where_related("transaction", "status", 0);
								$poso->where_related("transaction", "is_recurring <>", 1);
								$poso->where_related("transaction", "deleted <>", 1);
								$poso->where("deleted <>", 1);
								$poso->get_iterated();

								$onPO = 0; $onSO = 0;
								foreach ($poso as $val) {
									if($val->type=="Purchase_Order"){
										$onPO += ($val->quantity * $val->conversion_ratio);
									}else{
										$onSO += ($val->quantity * $val->conversion_ratio);
									}
								}
								$obj->on_po = $onPO;
								$obj->on_so = $onSO;
							}
						}						
					}					
				}
			}

			isset($value->transaction_id) 		? $obj->transaction_id 		= $value->transaction_id : "";
			isset($value->item_id)				? $obj->item_id				= $value->item_id : "";
			isset($value->assembly_id)			? $obj->assembly_id 		= $value->assembly_id : "";
			isset($value->measurement_id)		? $obj->measurement_id		= $value->measurement_id : "";
			isset($value->tax_item_id)			? $obj->tax_item_id			= $value->tax_item_id : "";
		   	isset($value->wht_account_id)		? $obj->wht_account_id		= $value->wht_account_id : "";
		   	isset($value->description)			? $obj->description 		= $value->description : "";
		   	isset($value->on_hand)				? $obj->on_hand 			= $value->on_hand : "";
		   	// isset($value->on_po)				? $obj->on_po 				= $value->on_po : "";
		   	// isset($value->on_so)				? $obj->on_so 				= $value->on_so : "";
		   	isset($value->gross_weight)			? $obj->gross_weight 		= $value->gross_weight : "";
		   	isset($value->truck_weight)			? $obj->truck_weight 		= $value->truck_weight : "";
		   	isset($value->bag_weight)			? $obj->bag_weight 			= $value->bag_weight : "";
		   	isset($value->yield)				? $obj->yield 				= $value->yield : "";
		   	isset($value->quantity)				? $obj->quantity 			= $value->quantity : "";
		   	isset($value->quantity_adjusted) 	? $obj->quantity_adjusted 	= $value->quantity_adjusted : "";
		   	// isset($value->conversion_ratio)		? $obj->conversion_ratio 	= $value->conversion_ratio : $obj->conversion_ratio = 1;
		   	isset($value->cost)					? $obj->cost 				= $value->cost : "";
		   	isset($value->price)				? $obj->price 				= $value->price : "";
		   	//isset($value->price_avg)			? $obj->price_avg 			= $value->price_avg : "";		   	
		   	isset($value->amount)				? $obj->amount 				= $value->amount : "";
		   	isset($value->markup)				? $obj->markup 				= $value->markup : "";
		   	isset($value->discount)				? $obj->discount 			= $value->discount : "";
		   	isset($value->fine)					? $obj->fine 				= $value->fine : "";
		   	isset($value->tax)					? $obj->tax 				= $value->tax : "";
		   	isset($value->rate)					? $obj->rate 				= $value->rate : "";
		   	isset($value->locale)				? $obj->locale 				= $value->locale : "";
		   	isset($value->additional_cost)		? $obj->additional_cost  	= $value->additional_cost : "";
		   	isset($value->additional_applied)	? $obj->additional_applied  = $value->additional_applied : "";
		   	isset($value->movement)				? $obj->movement 			= $value->movement : "";
		   	isset($value->required_date)		? $obj->required_date 		= $value->required_date : "";
		   	isset($value->deleted) 				? $obj->deleted 			= $value->deleted : "";

		   	//Conversion ratio
			$conversion_ratio = 1;
			if(isset($value->conversion_ratio)){
				if($value->conversion_ratio>0){
					$conversion_ratio = $value->conversion_ratio;
				}
			}
			$obj->conversion_ratio = $conversion_ratio;

		   	if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 				=> $obj->id,
			   		"transaction_id"	=> $obj->transaction_id,
			   		"measurement_id" 	=> $obj->measurement_id,
			   		"tax_item_id" 		=> $obj->tax_item_id,
					"wht_account_id"	=> $obj->wht_account_id,
					"item_id" 			=> $obj->item_id,
					"assembly_id" 		=> $obj->assembly_id,
				   	"description" 		=> $obj->description,
				   	"on_hand" 			=> floatval($obj->on_hand),
					"on_po" 			=> floatval($obj->on_po),
					"on_so" 			=> floatval($obj->on_so),
					"gross_weight" 		=> floatval($obj->gross_weight),
					"truck_weight" 		=> floatval($obj->truck_weight),
					"bag_weight" 		=> floatval($obj->bag_weight),
					"yield" 			=> floatval($obj->yield),
					"quantity" 			=> floatval($obj->quantity),
				   	"quantity_adjusted" => floatval($obj->quantity_adjusted),
				   	"conversion_ratio" 	=> floatval($obj->conversion_ratio),
				   	"cost"				=> floatval($obj->cost),
				   	"price"				=> floatval($obj->price),
				   	"price_avg" 		=> floatval($obj->price_avg),				   	
				   	"amount" 			=> floatval($obj->amount),
				   	"markup" 			=> floatval($obj->markup),
				   	"discount" 			=> floatval($obj->discount),
				   	"fine" 				=> floatval($obj->fine),
				   	"tax" 				=> floatval($obj->tax),
				   	"additional_cost" 	=> floatval($obj->additional_cost),
				   	"additional_applied"=> $obj->additional_applied==1 ? true : false,
				   	"rate"				=> floatval($obj->rate),
				   	"locale" 			=> $obj->locale,
				   	"movement" 			=> $obj->movement,
				   	"required_date"		=> $obj->required_date,
				   	"deleted"			=> $obj->deleted
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

			isset($value->transaction_id) 	? $obj->transaction_id 		= $value->transaction_id : "";
			isset($value->item_id)			? $obj->item_id				= $value->item_id : "";
			isset($value->assembly_id)		? $obj->assembly_id 		= $value->assembly_id : "";
			isset($value->measurement_id)	? $obj->measurement_id		= $value->measurement_id : "";
			isset($value->tax_item_id)		? $obj->tax_item_id			= $value->tax_item_id : "";
			isset($value->wht_account_id)	? $obj->wht_account_id		= $value->wht_account_id : "";
		   	isset($value->description)		? $obj->description 		= $value->description : "";
		   	// isset($value->on_hand)		? $obj->on_hand 			= $value->on_hand : "";
		   	isset($value->on_po)			? $obj->on_po 				= $value->on_po : "";
		   	isset($value->on_so)			? $obj->on_so 				= $value->on_so : "";
		   	isset($value->gross_weight)		? $obj->gross_weight 		= $value->gross_weight : "";
		   	isset($value->truck_weight)		? $obj->truck_weight 		= $value->truck_weight : "";
		   	isset($value->bag_weight)		? $obj->bag_weight 			= $value->bag_weight : "";
		   	isset($value->yield)			? $obj->yield 				= $value->yield : "";
		   	isset($value->quantity)			? $obj->quantity 			= $value->quantity : "";
		   	isset($value->quantity_adjusted)? $obj->quantity_adjusted 	= $value->quantity_adjusted : "";
		   	// isset($value->conversion_ratio)		? $obj->conversion_ratio 			= $value->conversion_ratio : "";
		   	isset($value->cost)				? $obj->cost 				= $value->cost : "";
		   	isset($value->price)			? $obj->price 				= $value->price : "";
		   	isset($value->price_avg)		? $obj->price_avg 			= $value->price_avg : "";
		   	isset($value->amount)			? $obj->amount 				= $value->amount : "";
		   	isset($value->markup)			? $obj->markup 				= $value->markup : "";
		   	isset($value->discount)			? $obj->discount 			= $value->discount : "";
		   	isset($value->fine)				? $obj->fine 				= $value->fine : "";
		   	isset($value->tax)				? $obj->tax 				= $value->tax : "";
		   	isset($value->rate)				? $obj->rate 				= $value->rate : "";
		   	isset($value->locale)			? $obj->locale 				= $value->locale : "";
		   	isset($value->additional_cost)	? $obj->additional_cost  	= $value->additional_cost : "";
		   	isset($value->movement)			? $obj->movement 			= $value->movement : "";
		   	isset($value->required_date)	? $obj->required_date 		= $value->required_date : "";
		   	isset($value->deleted) 			? $obj->deleted 			= $value->deleted : "";

		   	//Conversion ratio
			$conversion_ratio = 1;
			if(isset($value->conversion_ratio)){
				if($value->conversion_ratio>0){
					$conversion_ratio = $value->conversion_ratio;
				}
			}
			$obj->conversion_ratio = $conversion_ratio;

			if($obj->save()){
				//Results
				$data["results"][] = array(
					"id" 				=> $obj->id,
			   		"transaction_id"	=> $obj->transaction_id,
			   		"measurement_id" 	=> $obj->measurement_id,
			   		"tax_item_id" 		=> $obj->tax_item_id,
					"wht_account_id"	=> $obj->wht_account_id,
					"item_id" 			=> $obj->item_id,
					"assembly_id" 		=> $obj->assembly_id,
				   	"description" 		=> $obj->description,
				   	"on_hand" 			=> floatval($obj->on_hand),
					"on_po" 			=> floatval($obj->on_po),
					"on_so" 			=> floatval($obj->on_so),
					"gross_weight" 		=> floatval($obj->gross_weight),
					"truck_weight" 		=> floatval($obj->truck_weight),
					"bag_weight" 		=> floatval($obj->bag_weight),
					"yield" 			=> floatval($obj->yield),
					"quantity" 			=> floatval($obj->quantity),
				   	"quantity_adjusted" => floatval($obj->quantity_adjusted),
				   	"conversion_ratio" 	=> floatval($obj->conversion_ratio),
				   	"cost"				=> floatval($obj->cost),
				   	"price"				=> floatval($obj->price),
				   	"price_avg" 		=> floatval($obj->price_avg),
				   	"amount" 			=> floatval($obj->amount),
				   	"markup" 			=> floatval($obj->markup),
				   	"discount" 			=> floatval($obj->discount),
				   	"fine" 				=> floatval($obj->fine),
				   	"tax" 				=> floatval($obj->tax),
				   	"additional_cost" 	=> floatval($obj->additional_cost),
				   	"additional_applied"=> $obj->additional_applied,
				   	"rate"				=> floatval($obj->rate),
				   	"locale" 			=> $obj->locale,
				   	"movement" 			=> $obj->movement,
				   	"required_date"		=> $obj->required_date,
				   	"deleted"			=> $obj->deleted
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
			$obj->get_by_id($value->id);
			$obj->deleted = 1;

			$data["results"][] = array(
				"data"   	=> $value,
				"deleted" 	=> $obj->save()
			);
		}

		//Response data
		$this->response($data, 200);
	}
}
/* End of file item_lines.php */
/* Location: ./application/controllers/api/item_lines.php */
