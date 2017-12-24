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
	    			$obj->{$value["operator"]}($value["field"], $value["value"]);
				} else {
					$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->include_related("contact", array("abbr","number","name","payment_term_id","payment_method_id","credit_limit","locale","bill_to","ship_to","deposit_account_id","trade_discount_id","settlement_discount_id","account_id","ra_id"));
		$obj->include_related("item", array("item_type_id","abbr","number","name","cost","price","locale","income_account_id","expense_account_id","inventory_account_id"));
		$obj->include_related("measurement", array("name"));
		$obj->include_related("bin_location", array("number"));
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

				//Contact
				$contact = array(
					"id" 						=> $value->contact_id,
					"abbr"						=> $value->contact_abbr ? $value->contact_abbr : "",
					"number"					=> $value->contact_number ? $value->contact_number : "",
					"name"						=> $value->contact_name ? $value->contact_name : "",
					"payment_term_id"			=> $value->contact_payment_term_id ? $value->contact_payment_term_id : 0,
					"payment_method_id"			=> $value->contact_payment_method_id ? $value->contact_payment_method_id : 0,
					"credit_limit"				=> $value->contact_credit_limit ? $value->contact_credit_limit : 0,
					"locale"					=> $value->contact_locale ? $value->contact_locale : "",
					"bill_to"					=> $value->contact_bill_to ? $value->contact_bill_to : "",
					"ship_to"					=> $value->contact_ship_to ? $value->contact_ship_to : "",
					"deposit_account_id"		=> $value->contact_deposit_account_id ? $value->contact_deposit_account_id : 0,
					"trade_discount_id"			=> $value->contact_trade_discount_id ? $value->contact_trade_discount_id : 0,
					"settlement_discount_id"	=> $value->contact_settlement_discount_id ? $value->contact_settlement_discount_id : 0,
					"account_id"				=> $value->contact_account_id ? $value->contact_account_id : 0,
					"ra_id"						=> $value->contact_ra_id ? $value->contact_ra_id : 0
				);

				//Bin Location
				$bin_locations = array(
					"id" 		=> $value->bin_location_id,
					"number"	=> $value->bin_location_number ? $value->bin_location_number : ""
				);

				//Item Serial
				$itemSerials = new Item_serial(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$itemSerials->where("item_line_id", $value->id);
				
				$data["results"][] = array(
					"id" 				=> $value->id,
			   		"transaction_id"	=> $value->transaction_id,
			   		"reference_id"		=> $value->reference_id,
			   		"measurement_id" 	=> $value->measurement_id,
			   		"bin_location_id" 	=> $value->bin_location_id,
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
				   	"inventory_quantity"=> floatval($value->inventory_quantity),
				   	"inventory_value" 	=> floatval($value->inventory_value),
				   	"rate"				=> floatval($value->rate),
				   	"locale" 			=> $value->locale,
				   	"movement" 			=> $value->movement,
				   	"required_date"		=> $value->required_date,
				   	"deleted"			=> $value->deleted,
				   	
				   	"item" 				=> $item,
				   	"measurement" 		=> $measurement,
				   	"tax_item" 			=> $tax_item,
				   	"wht_account" 		=> $wht_account,
				   	"item_prices"		=> $measurement,
				   	"contact" 			=> $contact,
				   	"item_serials"		=> $itemSerials->get_raw()->result(),
				   	"bin_locations"		=> $bin_locations
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
						if($value->movement==0){}else{
							//Find Item Quantity and Amount
							$itemLines = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);							
							$itemLines->select_sum('quantity * conversion_ratio * movement', "totalQuantity");
							$itemLines->select_sum('(quantity * conversion_ratio * movement * cost) + inventory_adjust_value', "totalAmount");
							$itemLines->where_related("transaction", "is_recurring <>", 1);
							$itemLines->where_related("transaction", "deleted <>", 1);
							$itemLines->where('item_id', $value->item_id);
							$itemLines->where('movement <>', 0);
							$itemLines->where("deleted <>", 1);
							$itemLines->get();
							
							//Quantity
							$currentQuantity = floatval($value->quantity) * floatval($value->conversion_ratio) * floatval($value->movement);
							$totalQty = floatval($itemLines->totalQuantity) + $currentQuantity;

							//Amount
							$additionalCost = 0;
							if(isset($value->additional_cost)){
								$additionalCost = floatval($value->additional_cost);
							}
							$currentAmount = ($currentQuantity * floatval($value->cost) + $additionalCost) / floatval($value->rate);
							$totalAmount = floatval($itemLines->totalAmount) + $currentAmount;

							//Item Cost = $totalAmount / $totalQuantity;
							$itemCost = 0;
							if($totalQty==0){}else{
								$itemCost = $totalAmount / $totalQty;
							}

							//Negative on hand
							if(floatval($itemLines->totalQuantity)<0){
								$journalLines = [];
								$adjAmount = 0;
								$avgCost = abs(floatval($itemLines->totalAmount) / floatval($itemLines->totalQuantity));

								if($totalQty<0){
									// adjAmount = newQty * (avgCost - newCost);
									$adjAmount = abs($currentQuantity) * ($avgCost - floatval($value->cost));
								}else{//totalQty >= 0
									// adjAmount = oldQty * (avgCost - newCost);
									$adjAmount = abs(floatval($itemLines->totalQuantity)) * ($avgCost - floatval($value->cost));
								}

								$obj->inventory_adjust_value = $adjAmount;
								
								//Make Journals
								if($avgCost < floatval($value->cost)){
									//COGS on Dr
									$journalLines[] = array(
										"account_id" 	=> $item->expense_account_id,
										"dr" 			=> abs($adjAmount),
										"cr" 			=> 0
									);

									//Inventory on Cr
									$journalLines[] = array(
										"account_id" 	=> $item->inventory_account_id,
										"dr" 			=> 0,
										"cr" 			=> abs($adjAmount)
									);
								}

								if($avgCost > floatval($value->cost)){
									//Inventory on Dr
									$journalLines[] = array(
										"account_id" 	=> $item->inventory_account_id,
										"dr" 			=> abs($adjAmount),
										"cr" 			=> 0
									);

									//COGS on Cr
									$journalLines[] = array(
										"account_id" 	=> $item->expense_account_id,
										"dr" 			=> 0,
										"cr" 			=> abs($adjAmount)
									);
								}

								//Add journals
								for ($i=0; $i < count($journalLines); $i++) { 
									$journals = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);									

									$journals->transaction_id	= $value->transaction_id;
									$journals->account_id 		= $journalLines[$i]["account_id"];
									$journals->contact_id 		= $transaction->contact_id;
									$journals->description 		= $value->description;
									$journals->dr 	 			= $journalLines[$i]["dr"];
									$journals->cr 				= $journalLines[$i]["cr"];
									$journals->rate				= $value->rate;
									$journals->locale			= $item->locale;

									$journals->save();
								}
							}
						}
					}					
				}
			}

			isset($value->transaction_id) 		? $obj->transaction_id 		= $value->transaction_id : "";
			isset($value->reference_id) 		? $obj->reference_id 		= $value->reference_id : "";
			isset($value->item_id)				? $obj->item_id				= $value->item_id : "";
			isset($value->bin_location_id)		? $obj->bin_location_id		= $value->bin_location_id : "";
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
		   		if(count($value->item_serials)>0){
		   			foreach ($value->item_serials as $serial) {
			   			$itemSerials = new Item_serial(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			   			$itemSerials->item_line_id 	= $obj->id;
			   			$itemSerials->number 		= $serial->number;
			   			$itemSerials->save();
		   			}
		   		}

			   	$data["results"][] = array(
			   		"id" 				=> $obj->id,
			   		"transaction_id"	=> $obj->transaction_id,
			   		"reference_id"		=> $obj->reference_id,
			   		"measurement_id" 	=> $obj->measurement_id,
			   		"bin_location_id" 	=> $obj->bin_location_id,
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
				   	"inventory_quantity"=> floatval($obj->inventory_quantity),
				   	"inventory_value" 	=> floatval($obj->inventory_value),
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
			isset($value->reference_id) 	? $obj->reference_id 		= $value->reference_id : "";
			isset($value->bin_location_id)	? $obj->bin_location_id		= $value->bin_location_id : "";
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
		   	isset($value->inventory_quantity)	? $obj->inventory_quantity  	= $value->inventory_quantity : "";
		   	isset($value->inventory_value)		? $obj->inventory_value  		= $value->inventory_value : "";
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

			//Update item costing
			if($value->movement==1){
				if($value->quantity<>$obj->quantity || $value->cost<>$obj->cost){				
					$transactions = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$transactions->where("is_recurring <>", 1);
					$transactions->where("deleted <>", 0);
					$transactions->get_by_id($value->transaction_id);

					if($transactions->exists()){
						$itemLines = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$itemLines->where_related("transaction", "issued_date >", $transactions->issued_date);
						$itemLines->where_related("transaction", "is_recurring <>", 1);
						$itemLines->where_related("transaction", "deleted <>", 0);
						$itemLines->where("item_id", $obj->item_id);
						$itemLines->where("movement", -1);
						$itemLines->where("deleted <>", 1);
						$itemLines->get_iterated();

						foreach ($itemLines as $line) {
							$lineTxns = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$lineTxns->get_by_id($line->transaction_id);

							$itemWAC = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$itemWAC->select_sum('quantity * conversion_ratio * movement', "totalQuantity");
							$itemWAC->select_sum('(quantity * conversion_ratio * movement * cost) + inventory_adjust_value', "totalAmount");
							$itemWAC->where_related("transaction", "issued_date <", $lineTxns->issued_date);
							$itemWAC->where_related("transaction", "is_recurring <>", 1);
							$itemWAC->where_related("transaction", "deleted <>", 1);
							$itemWAC->where("item_id", $line->item_id);
							$itemWAC->where('movement <>', 0);
							$itemWAC->where("deleted <>", 1);
							$itemWAC->get();
							
							$additionalCosts = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$additionalCosts->select_sum("additional_cost");
							$additionalCosts->where_related("transaction", "is_recurring <>", 1);
							$additionalCosts->where_related("transaction", "deleted <>", 1);
							$additionalCosts->where_related("item", "item_type_id", 1);
							$additionalCosts->where('movement <>', 0);
							$additionalCosts->where("deleted <>", 1);
							$additionalCosts->get();

							$cost = 0;
							if(floatval($itemWAC->totalQuantity)==0){}else{
								$cost = (floatval($itemWAC->totalAmount) + floatval($additionalCosts->additional_cost)) / floatval($itemWAC->totalQuantity);
							}

							$lines = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$lines->get_by_id($line->id);

							$lines->cost = $cost;
							$lines->save();
						}
					}
				}
			}

			if($obj->save()){
				//Item Serial
				$prevItemSerials = new Item_serial(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$prevItemSerials->where("item_line_id", $obj->id);
				$prevItemSerials->get();
				$prevItemSerials->delete_all();

				if(count($value->item_serials)>0){
		   			foreach ($value->item_serials as $serial) {
			   			$itemSerials = new Item_serial(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			   			$itemSerials->item_line_id 	= $obj->id;
			   			$itemSerials->number 		= $serial->number;
			   			$itemSerials->save();
		   			}
		   		}

				//Results
				$data["results"][] = array(
					"id" 				=> $obj->id,
			   		"transaction_id"	=> $obj->transaction_id,
			   		"reference_id"		=> $obj->reference_id,
			   		"measurement_id" 	=> $obj->measurement_id,
			   		"bin_location_id" 	=> $obj->bin_location_id,
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
				   	"inventory_quantity"=> floatval($obj->inventory_quantity),
				   	"inventory_value" 	=> floatval($obj->inventory_value),
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

	function onhand_get(){
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Item_line(null, 'banhji-db-instance.cwxbgxgq7thx.ap-southeast-1.rds.amazonaws.com', 'mightyadmin', 'banhji2016', 'db_banhji');
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where('item_id', 2217);
		$obj->select_sum('quantity * conversion_ratio * movement', "totalQuantity");
		$obj->select_sum('(quantity * conversion_ratio * movement * cost) + inventory_adjust_value', "totalAmount");
		$obj->get();
		
		$data["results"] = array(
			"qty" => floatval($obj->totalQuantity),
			"amt" => floatval($obj->totalAmount)
		);

		$this->response($data, 200);
	}
}
/* End of file item_lines.php */
/* Location: ./application/controllers/api/item_lines.php */
