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
			$this->_database = $conn->inst_database;
			
		}
	}
	
	//BY DAWINE #############################################################################
	//CUSTOMER TRANSACTION LIST
	function customer_transaction_list_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		//Sort
		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				if(isset($value["operator"])){
					$obj->{$value["operator"]}($value["field"], $value["dir"]);
				}else{
					$obj->order_by($value["field"], $value["dir"]);
				}
			}
		}
		
		//Filter
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter["filters"] as $value) {
	    		if(isset($value["operator"])){
	    			$obj->{$value["operator"]}($value['field'], $value['value']);
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("contact", array("abbr", "number", "name"));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");

		//Results
		if($page && $limit){
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
		}else{
			$obj->get_iterated();
			$data["count"] = $obj->result_count();
		}
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {								
				$amount = (floatval($value->amount) - floatval($value->deposit)) / floatval($value->rate);
				
				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["line"][] = array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"number" 			=> $value->number,
						"issued_date" 		=> $value->issued_date,
						"rate" 				=> $value->rate,
						"amount" 			=> $amount
					);
				}else{
					$objList[$value->contact_id]["id"] 		= $value->contact_id;
					$objList[$value->contact_id]["name"] 	= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["line"][]	= array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"number" 			=> $value->number,
						"issued_date" 		=> $value->issued_date,
						"rate" 				=> $value->rate,
						"amount" 			=> $amount
					);
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
		}

		//Response Data
		$this->response($data, 200);
	}

	//DEPOSIT DETAIL BY CUSTOMER
	function deposit_detail_by_customer_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("contact", array("abbr", "number", "name"));
		$obj->where("type", "Customer_Deposit");
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {								
				$amount = floatval($value->amount) / floatval($value->rate);

				$reference = [];
				if($value->reference_id>0){
					$ref = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$ref->where("is_recurring <>", 1);
					$ref->where("deleted <>", 1);
					$ref->where("id", $value->reference_id);
					$reference = $ref->get_raw()->result();
				}
				
				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["line"][] = array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"number" 			=> $value->number,
						"issued_date" 		=> $value->issued_date,
						"rate" 				=> $value->rate,
						"amount" 			=> $amount,
						"reference" 		=> $reference
					);
				}else{
					//Balance Forward
					$bf = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);					
					$bf->where("issued_date <", $value->issued_date);
					$bf->where("contact_id", $value->contact_id);
					$bf->where("type", "Customer_Deposit");
					$bf->where("is_recurring <>", 1);
					$bf->where("deleted <>", 1);
					$bf->get_iterated();

					$balance_forward = 0;
					if($bf->exists()){
						foreach ($bf as $val) {
							$balance_forward += floatval($val->amount) / floatval($val->rate);
						}
					}

					$objList[$value->contact_id]["id"] 				= $value->contact_id;
					$objList[$value->contact_id]["name"] 			= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["balance_forward"] = $balance_forward;
					$objList[$value->contact_id]["line"][]			= array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"number" 			=> $value->number,
						"issued_date" 		=> $value->issued_date,
						"rate" 				=> $value->rate,
						"amount" 			=> $amount,
						"reference" 		=> $reference
					);
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	//SALE BY PRODUCT
	function sale_summary_by_product_get() {
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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("item", array("abbr", "number", "name", "measurement_id"));
		$obj->include_related("measurement", array("name"));
		$obj->where_related("item", "item_type_id", array(1,4));
		$obj->include_related("transaction", array("rate"));		
		$obj->where_in_related("transaction", "type", array("Commercial_Invoice","Vat_Invoice","Invoice", "Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->order_by_related("transaction", "issued_date", "asc");
		$obj->where("deleted <>", 1);
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {								
				$quantity = floatval($value->quantity) * floatval($value->conversion_ratio);
				$amount = floatval($value->amount) / floatval($value->transaction_rate);
								
				if(isset($objList[$value->item_id])){
					$objList[$value->item_id]["quantity"] 		+= $quantity;
					$objList[$value->item_id]["amount"] 		+= $amount;
					$objList[$value->item_id]["cost"] 			+= $value->cost;
					$objList[$value->item_id]["price"] 			+= $value->price;
					$objList[$value->item_id]["txn_count"]++;
				}else{
					$objList[$value->item_id]["id"] 			= $value->item_id;
					$objList[$value->item_id]["name"] 			= $value->item_abbr.$value->item_number." ".$value->item_name;
					$objList[$value->item_id]["quantity"] 		= $quantity;
					$objList[$value->item_id]["measurement"]	= $value->measurement_name;
					$objList[$value->item_id]["amount"] 		= $amount;
					$objList[$value->item_id]["cost"] 			= $value->cost;
					$objList[$value->item_id]["price"] 			= $value->price;
					$objList[$value->item_id]["avg_cost"] 		= 0;
					$objList[$value->item_id]["avg_price"] 		= 0;
					$objList[$value->item_id]["gpm"] 			= 0;
					$objList[$value->item_id]["txn_count"]		= 1;
				}
			}
			
			foreach ($objList as $value) {
				$avgPrice = 0;
				$avgCost = 0;
				$gp = 0;
				$gpm = 0;

				if($value["quantity"]>0){
					$avgPrice = $value["amount"] / $value["quantity"];
					$avgCost = $value["cost"] / $value["quantity"];

					$gp = ($value["quantity"] * $value["price"]) - ($value["quantity"] * $value["cost"]);
					
					$price = ($value["quantity"] * $value["price"]);
					if($price>0){
						$gpm = $gp / $price;
					}else{
						$gpm = $gp;
					}
				}

				$value["avg_price"] = $avgPrice;
				$value["avg_cost"] = $avgCost;
				$value["gpm"] = $gpm;

				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}
	function sale_detail_by_product_get() {
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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("item", array("abbr", "number", "name", "measurement_id"));
		$obj->where_related("item", "item_type_id", array(1,4));
		$obj->include_related("measurement", array("name"));
		$obj->include_related("transaction", array("type","number","issued_date","amount","deposit","rate"));
		$obj->where_in_related("transaction", "type", array("Commercial_Invoice","Vat_Invoice","Invoice", "Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->include_related('transaction/contact', array("abbr", "number", "name"));
		$obj->order_by_related("transaction", "issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				$amount = floatval($value->amount) / floatval($value->transaction_rate);
								
				if(isset($objList[$value->item_id])){
					$objList[$value->item_id]["line"][]		= array(
						"id" 			=> $value->transaction_id,
						"type" 			=> $value->transaction_type,
						"customer"		=> $value->transaction_contact_name,
						"number" 		=> $value->transaction_number,
						"issued_date" 	=> $value->transaction_issued_date,
						"quantity" 		=> $value->quantity,
						"measurement"	=> $value->measurement_name,
						"price" 		=> $value->price,
						"amount" 		=> $amount
					);
				}else{
					$objList[$value->item_id]["id"] 		= $value->item_id;
					$objList[$value->item_id]["name"] 		= $value->item_abbr.$value->item_number." ".$value->item_name;
					$objList[$value->item_id]["line"][]		= array(
						"id" 			=> $value->transaction_id,
						"type" 			=> $value->transaction_type,
						"customer"		=> $value->transaction_contact_name,
						"number" 		=> $value->transaction_number,
						"issued_date" 	=> $value->transaction_issued_date,
						"quantity" 		=> $value->quantity,
						"measurement"	=> $value->measurement_name,
						"price" 		=> $value->price,
						"amount" 		=> $amount
					);
				}
			}
			
			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	//SALE BY BRANCH
	function sale_summary_by_brand_get() {
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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("item", array("abbr", "number", "name", "measurement_id"));
		$obj->include_related("measurement", array("name"));
		$obj->where_related("item", "item_type_id", array(1,4));
		$obj->include_related("transaction", array("rate"));		
		$obj->where_in_related("transaction", "type", array("Commercial_Invoice","Vat_Invoice","Invoice", "Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
		$obj->include_related("item/brand", "name");
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->order_by_related("transaction", "issued_date", "asc");
		$obj->where("deleted <>", 1);
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {								
				$quantity = floatval($value->quantity) * floatval($value->conversion_ratio);
				$amount = floatval($value->amount) / floatval($value->transaction_rate);
								
				if(isset($objList[$value->item_brand_id])){
					$objList[$value->item_brand_id]["quantity"] 		+= $quantity;
					$objList[$value->item_brand_id]["amount"] 			+= $amount;
					$objList[$value->item_brand_id]["cost"] 			+= $value->cost;
					$objList[$value->item_brand_id]["price"] 			+= $value->price;
					$objList[$value->item_brand_id]["txn_count"]++;
				}else{
					$objList[$value->item_brand_id]["id"] 				= $value->item_brand_id;
					$objList[$value->item_brand_id]["name"] 			= $value->item_brand_name;
					$objList[$value->item_brand_id]["quantity"] 		= $quantity;
					$objList[$value->item_brand_id]["measurement"]		= $value->measurement_name;
					$objList[$value->item_brand_id]["amount"] 			= $amount;
					$objList[$value->item_brand_id]["cost"] 			= $value->cost;
					$objList[$value->item_brand_id]["price"] 			= $value->price;
					$objList[$value->item_brand_id]["avg_cost"] 		= 0;
					$objList[$value->item_brand_id]["avg_price"] 		= 0;
					$objList[$value->item_brand_id]["gpm"] 				= 0;
					$objList[$value->item_brand_id]["txn_count"]		= 1;
				}
			}
			
			foreach ($objList as $value) {
				$avgPrice = 0;
				$avgCost = 0;
				$gp = 0;
				$gpm = 0;

				if($value["quantity"]>0){
					$avgPrice = $value["amount"] / $value["quantity"];
					$avgCost = $value["cost"] / $value["quantity"];

					$gp = ($value["quantity"] * $value["price"]) - ($value["quantity"] * $value["cost"]);
					
					$price = ($value["quantity"] * $value["price"]);
					if($price>0){
						$gpm = $gp / $price;
					}else{
						$gpm = $gp;
					}
				}

				$value["avg_price"] = $avgPrice;
				$value["avg_cost"] = $avgCost;
				$value["gpm"] = $gpm;

				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}
	function sale_detail_by_brand_get() {
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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("item", array("abbr", "number", "name", "measurement_id"));
		$obj->where_related("item", "item_type_id", array(1,4));
		$obj->include_related("measurement", array("name"));
		$obj->include_related("transaction", array("type","number","issued_date","amount","deposit","rate"));
		$obj->where_in_related("transaction", "type", array("Commercial_Invoice","Vat_Invoice","Invoice", "Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
		$obj->include_related("item/brand", "name");
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->include_related('transaction/contact', array("abbr", "number", "name"));
		$obj->order_by_related("transaction", "issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				$amount = floatval($value->amount) / floatval($value->transaction_rate);
								
				if(isset($objList[$value->item_brand_id])){
					$objList[$value->item_brand_id]["line"][]		= array(
						"id" 			=> $value->transaction_id,
						"type" 			=> $value->transaction_type,
						"customer"		=> $value->transaction_contact_name,
						"number" 		=> $value->transaction_number,
						"issued_date" 	=> $value->transaction_issued_date,
						"quantity" 		=> $value->quantity,
						"measurement"	=> $value->measurement_name,
						"price" 		=> $value->price,
						"amount" 		=> $amount
					);
				}else{
					$objList[$value->item_brand_id]["id"] 			= $value->item_brand_id;
					$objList[$value->item_brand_id]["name"] 		= $value->item_brand_name;
					$objList[$value->item_brand_id]["line"][]		= array(
						"id" 			=> $value->transaction_id,
						"type" 			=> $value->transaction_type,
						"customer"		=> $value->transaction_contact_name,
						"number" 		=> $value->transaction_number,
						"issued_date" 	=> $value->transaction_issued_date,
						"quantity" 		=> $value->quantity,
						"measurement"	=> $value->measurement_name,
						"price" 		=> $value->price,
						"amount" 		=> $amount
					);
				}
			}
			
			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	//SALE BY CUSTOMER
	function sale_summary_by_customer_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("contact", array("abbr", "number", "name"));
		$obj->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice", "Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {								
				$amount = (floatval($value->amount) - floatval($value->deposit)) / floatval($value->rate);
				$invoice = 0;
				$cashSale = 0;
				if($value->type=="Commercial_Invoice" || $value->type=="Vat_Invoice" || $value->type=="Invoice"){
					$invoice++;
				}else{
					$cashSale++;
				}

				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["invoice_count"] 	+= $invoice;
					$objList[$value->contact_id]["cash_sale_count"] += $cashSale;
					$objList[$value->contact_id]["amount"] 			+= $amount;
				}else{
					$objList[$value->contact_id]["id"] 				= $value->contact_id;
					$objList[$value->contact_id]["name"] 			= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["invoice_count"]	= $invoice;
					$objList[$value->contact_id]["cash_sale_count"]	= $cashSale;
					$objList[$value->contact_id]["amount"]			= $amount;
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}
	function sale_detail_by_customer_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("contact", array("abbr", "number", "name"));
		$obj->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice", "Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {								
				$amount = (floatval($value->amount) - floatval($value->deposit)) / floatval($value->rate);
				
				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["line"][] = array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"number" 			=> $value->number,
						"issued_date" 		=> $value->issued_date,
						"rate" 				=> $value->rate,
						"memo"				=> $value->memo,
						"amount" 			=> $amount
					);
				}else{
					$objList[$value->contact_id]["id"] 		= $value->contact_id;
					$objList[$value->contact_id]["name"] 	= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["line"][]	= array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"number" 			=> $value->number,
						"issued_date" 		=> $value->issued_date,
						"rate" 				=> $value->rate,
						"memo"				=> $value->memo,
						"amount" 			=> $amount
					);
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	//SALE BY EMPLOYEE
	function sale_summary_by_employee_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("contact", array("abbr", "number", "name"));		
		$obj->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice", "Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->where("employee_id <>", 0);
		$obj->order_by("issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {		
				if($value->employee_id>0){
					$employee = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$employee->where("id", $value->employee_id);
					$employee->get();
										
					$amount = (floatval($value->amount) - floatval($value->deposit)) / floatval($value->rate);
					$invoice = 0;
					$cashSale = 0;
					if($value->type=="Commercial_Invoice" || $value->type=="Vat_Invoice" || $value->type=="Invoice"){
						$invoice = 1;
					}else{
						$cashSale = 1;
					}

					if(isset($objList[$employee->employee_id])){
						$objList[$value->employee_id]["invoice_count"] 		+= $invoice;
						$objList[$value->employee_id]["cash_sale_count"]	+= $cashSale;
						$objList[$value->employee_id]["amount"] 			+= $amount;
					}else{
						$objList[$value->employee_id]["id"] 				= $value->employee_id;
						$objList[$value->employee_id]["name"] 				= $employee->abbr.$employee->number." ".$employee->name;
						$objList[$value->employee_id]["invoice_count"]		= $invoice;
						$objList[$value->employee_id]["cash_sale_count"]	= $cashSale;
						$objList[$value->employee_id]["amount"]				= $amount;
					}
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}
	function sale_detail_by_employee_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("contact", array("abbr", "number", "name"));		
		$obj->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice", "Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->where("employee_id <>", 0);
		$obj->order_by("issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {	
				if($value->employee_id>0){
					$employee = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$employee->where("id", $value->employee_id);
					$employee->get();							
					$amount = (floatval($value->amount) - floatval($value->deposit)) / floatval($value->rate);
					
					if(isset($objList[$employee->employee_id])){
						$objList[$value->employee_id]["line"][] = array(
							"id" 				=> $value->id,
							"type" 				=> $value->type,
							"customer"			=> $value->contact_name,
							"number" 			=> $value->number,
							"issued_date" 		=> $value->issued_date,
							"rate" 				=> $value->rate,
							"amount" 			=> $amount
						);
					}else{
						$objList[$value->employee_id]["id"] 		= $value->employee_id;
						$objList[$value->employee_id]["name"] 		= $employee->abbr.$employee->number." ".$employee->name;
						$objList[$value->employee_id]["line"][]		= array(
							"id" 				=> $value->id,
							"type" 				=> $value->type,
							"customer"			=> $value->contact_name,
							"number" 			=> $value->number,
							"issued_date" 		=> $value->issued_date,
							"rate" 				=> $value->rate,
							"amount" 			=> $amount
						);
					}
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}
	
	//SALDE PRODUCT BY DEMPLOYEE
	function salesProduct_detail_by_employee_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$total = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("contact", array("abbr", "number", "name"));		
		$obj->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice", "Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->where("employee_id <>", 0);
		$obj->include_related("item_line/item", "name");
		$obj->include_related("item_line", array("quantity", "price", "amount", "rate"));
		$obj->order_by("issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {	
				if($value->employee_id>0){
					$employee = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$employee->where("id", $value->employee_id);
					$employee->get();							
					
					$amount = floatval($value->item_line_amount);

					if(isset($objList[$employee->employee_id])){
						$objList[$value->employee_id]["line"][] = array(
							"id" 				=> $value->id,
							"type" 				=> $value->type,
							"customer"			=> $value->contact_name,
							"number" 			=> $value->number,
							"product"			=> $value->item_line_item_name,
							"issued_date" 		=> $value->issued_date,
							"rate" 				=> $value->rate,
							"price"				=> floatval($value->item_line_price),
							"quantity"			=> $value->item_line_quantity,
							"amount" 			=> $amount
						);
					}else{
						$objList[$value->employee_id]["id"] 		= $value->employee_id;
						$objList[$value->employee_id]["name"] 		= $employee->abbr.$employee->number." ".$employee->name;
						$objList[$value->employee_id]["line"][]		= array(
							"id" 				=> $value->id,
							"type" 				=> $value->type,
							"customer"			=> $value->contact_name,
							"number" 			=> $value->number,
							"product"			=> $value->item_line_item_name,
							"issued_date" 		=> $value->issued_date,
							"rate" 				=> $value->rate,
							"price"				=> floatval($value->item_line_price),
							"quantity"			=> $value->item_line_quantity,
							"amount" 			=> $amount
						);
					}
				}
				$total += $amount;
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data['total'] = $total;
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	//Cash SALE BY CUSTOMER
	function cashSale_summary_by_customer_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("contact", array("abbr", "number", "name"));
		$obj->where_in("type", array("Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {								
				$amount = (floatval($value->amount) - floatval($value->deposit)) / floatval($value->rate);
				$invoice = 0;
				$cashSale = 0;
				if($value->type=="Commercial_Invoice" || $value->type=="Vat_Invoice" || $value->type=="Invoice"){
					$invoice++;
				}else{
					$cashSale++;
				}

				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["cash_sale_count"] += $cashSale;
					$objList[$value->contact_id]["amount"] 			+= $amount;
				}else{
					$objList[$value->contact_id]["id"] 				= $value->contact_id;
					$objList[$value->contact_id]["name"] 			= $value->contact_abbr.$value->contact_number." ".$value->contact_name;

					$objList[$value->contact_id]["cash_sale_count"]	= $cashSale;
					$objList[$value->contact_id]["amount"]			= $amount;
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}
	function cashSale_detail_by_customer_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("contact", array("abbr", "number", "name"));
		$obj->where_in("type", array("Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {								
				$amount = (floatval($value->amount) - floatval($value->deposit)) / floatval($value->rate);
				
				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["line"][] = array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"number" 			=> $value->number,
						"issued_date" 		=> $value->issued_date,
						"rate" 				=> $value->rate,
						"memo" 				=> $value->memo,
						"amount" 			=> $amount
					);
				}else{
					$objList[$value->contact_id]["id"] 		= $value->contact_id;
					$objList[$value->contact_id]["name"] 	= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["line"][]	= array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"number" 			=> $value->number,
						"issued_date" 		=> $value->issued_date,
						"rate" 				=> $value->rate,
						"memo" 				=> $value->memo,
						"amount" 			=> $amount
					);
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	//Cash SALE BY PRODUCT
	function cashSale_summary_by_product_get() {
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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("item", array("abbr", "number", "name", "measurement_id"));
		$obj->where_related("item", "item_type_id", array(1,4));
		$obj->include_related("transaction", array("rate"));		
		$obj->where_in_related("transaction", "type", array("Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->order_by_related("transaction", "issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {								
				$quantity = floatval($value->quantity) * floatval($value->conversion_ratio);
				$amount = floatval($value->amount) / floatval($value->transaction_rate);
								
				if(isset($objList[$value->item_id])){
					$objList[$value->item_id]["quantity"] 		+= $quantity;
					$objList[$value->item_id]["amount"] 		+= $amount;
					$objList[$value->item_id]["cost"] 			+= $value->cost;
					$objList[$value->item_id]["price"] 			+= $value->price;
					$objList[$value->item_id]["txn_count"]++;
				}else{
					$measurement = new Measurement(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$measurement->get_by_id($value->measurement_id);

					$objList[$value->item_id]["id"] 			= $value->item_id;
					$objList[$value->item_id]["name"] 			= $value->item_abbr.$value->item_number." ".$value->item_name;
					$objList[$value->item_id]["quantity"] 		= $quantity;
					$objList[$value->item_id]["measurement"]	= $measurement->name;
					$objList[$value->item_id]["amount"] 		= $amount;
					$objList[$value->item_id]["cost"] 			= $value->cost;
					$objList[$value->item_id]["price"] 			= $value->price;
					$objList[$value->item_id]["avg_cost"] 		= 0;
					$objList[$value->item_id]["avg_price"] 		= 0;
					$objList[$value->item_id]["gpm"] 			= 0;
					$objList[$value->item_id]["txn_count"]		= 1;
				}
			}
			
			foreach ($objList as $value) {
				$avgPrice = 0;
				$avgCost = 0;
				$gp = 0;
				$gpm = 0;

				if($value["quantity"]>0){
					$avgPrice = $value["amount"] / $value["quantity"];
					$avgCost = $value["cost"] / $value["quantity"];

					$gp = ($value["quantity"] * $value["price"]) - ($value["quantity"] * $value["cost"]);
					
					$price = ($value["quantity"] * $value["price"]);
					if($price>0){
						$gpm = $gp / $price;
					}else{
						$gpm = $gp;
					}
				}

				$value["avg_price"] = $avgPrice;
				$value["avg_cost"] = $avgCost;
				$value["gpm"] = $gpm;

				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}
	function cashSale_detail_by_product_get() {
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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("item", array("abbr", "number", "name", "measurement_id"));
		$obj->where_related("item", "item_type_id", array(1,4));
		$obj->include_related("measurement", array("name"));
		$obj->include_related("transaction", array("type","number","issued_date","amount","deposit","rate"));
		$obj->where_in_related("transaction", "type", array("Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->include_related('transaction/contact', array("abbr", "number", "name"));
		$obj->order_by_related("transaction", "issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				$amount = floatval($value->amount) / floatval($value->transaction_rate);
								
				if(isset($objList[$value->item_id])){
					$objList[$value->item_id]["line"][]		= array(
						"id" 			=> $value->transaction_id,
						"type" 			=> $value->transaction_type,
						"customer"		=> $value->transaction_contact_name,
						"number" 		=> $value->transaction_number,
						"issued_date" 	=> $value->transaction_issued_date,
						"quantity" 		=> $value->quantity,
						"measurement"	=> $value->measurement_name,
						"price" 		=> $value->price,
						"amount" 		=> $amount
					);
				}else{
					$objList[$value->item_id]["id"] 		= $value->item_id;
					$objList[$value->item_id]["name"] 		= $value->item_abbr.$value->item_number." ".$value->item_name;
					$objList[$value->item_id]["line"][]		= array(
						"id" 			=> $value->transaction_id,
						"type" 			=> $value->transaction_type,
						"customer"		=> $value->transaction_contact_name,
						"number" 		=> $value->transaction_number,
						"issued_date" 	=> $value->transaction_issued_date,
						"quantity" 		=> $value->quantity,
						"measurement"	=> $value->measurement_name,
						"price" 		=> $value->price,
						"amount" 		=> $amount
					);
				}
			}
			
			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	//BALANCE
	function balance_summary_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("contact", array("abbr", "number", "name"));
		$obj->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice"));
		$obj->where_in("status", array(0,2));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			$today = new DateTime();
			foreach ($obj as $value) {
				$amount = (floatval($value->amount) - floatval($value->deposit)) / floatval($value->rate);
				
				if($value->status=="2"){
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$paid->select_sum("amount");
					$paid->select_sum("discount");
					$paid->where("reference_id", $value->id);
					$paid->where_in("type", array("Cash_Receipt", "Offset_Invoice"));
					$paid->where("is_recurring <>",1);
					$paid->where("deleted <>",1);
					$paid->get();
					$amount -= floatval($paid->amount) + floatval($paid->discount);
				}

				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["txn_count"]++;
					$objList[$value->contact_id]["amount"] += $amount;
				}else{
					$objList[$value->contact_id]["id"] 			= $value->contact_id;
					$objList[$value->contact_id]["name"] 		= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["txn_count"] 	= 1;
					$objList[$value->contact_id]["amount"] 		= $amount;
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}
	function balance_detail_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("contact", array("abbr", "number", "name"));
		$obj->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice"));
		$obj->where_in("status", array(0,2));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				$amount = (floatval($value->amount) - floatval($value->deposit)) / floatval($value->rate);

				if($value->status=="2"){
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$paid->select_sum("amount");
					$paid->select_sum("discount");
					$paid->where("reference_id", $value->id);
					$paid->where_in("type", array("Cash_Receipt", "Offset_Invoice"));
					$paid->where("is_recurring <>",1);
					$paid->where("deleted <>",1);
					$paid->get();
					$amount -= floatval($paid->amount) + floatval($paid->discount);
				}

				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["line"][] = array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"number" 			=> $value->number,
						"issued_date" 		=> $value->issued_date,
						"rate" 				=> $value->rate,
						"amount" 			=> $amount
					);
				}else{
					$objList[$value->contact_id]["id"] 				= $value->contact_id;
					$objList[$value->contact_id]["name"] 			= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["line"][] 			= array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"number" 			=> $value->number,
						"issued_date" 		=> $value->issued_date,
						"rate" 				=> $value->rate,
						"amount" 			=> $amount
					);			
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	//AGING
	function aging_summary_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("contact", array("abbr", "number", "name"));
		$obj->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice"));
		$obj->where_in("status", array(0,2));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			$today = new DateTime();
			foreach ($obj as $value) {
				$amount = (floatval($value->amount) - floatval($value->deposit)) / floatval($value->rate);
				
				if($value->status=="2"){
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$paid->select_sum("amount");
					$paid->select_sum("discount");
					$paid->where("reference_id", $value->id);
					$paid->where_in("type", array("Cash_Receipt", "Offset_Invoice"));
					$paid->where("is_recurring <>",1);
					$paid->where("deleted <>",1);
					$paid->get();
					$amount -= floatval($paid->amount) + floatval($paid->discount);
				}

				$current = 0;
				$in30 = 0;
				$in60 = 0;
				$in90 = 0;
				$over90 = 0;

				$dueDate = new DateTime($value->due_date);
				$days = $dueDate->diff($today)->format("%a");
				if($dueDate < $today){
					if(intval($days)>90){
						$over90 = $amount;
					}else if(intval($days)>60){
						$in90 = $amount;
					}else if(intval($days)>30){
						$in60 = $amount;
					}else{
						$in30 = $amount;
					}
				}else{
					$current = $amount;
				}

				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["current"] += $current;
					$objList[$value->contact_id]["in30"] 	+= $in30;
					$objList[$value->contact_id]["in60"] 	+= $in60;
					$objList[$value->contact_id]["in90"] 	+= $in90;
					$objList[$value->contact_id]["over90"] 	+= $over90;
					$objList[$value->contact_id]["total"] 	+= $amount;
				}else{
					$objList[$value->contact_id]["id"] 		= $value->contact_id;
					$objList[$value->contact_id]["name"] 	= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["current"] = $current;
					$objList[$value->contact_id]["in30"] 	= $in30;
					$objList[$value->contact_id]["in60"] 	= $in60;
					$objList[$value->contact_id]["in90"] 	= $in90;
					$objList[$value->contact_id]["over90"] 	= $over90;
					$objList[$value->contact_id]["total"] 	= $amount;
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}
	function aging_detail_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("contact", array("abbr", "number", "name"));
		$obj->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice"));
		$obj->where_in("status", array(0,2));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				$amount = (floatval($value->amount) - floatval($value->deposit)) / floatval($value->rate);
				
				if($value->status=="2"){
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$paid->select_sum("amount");
					$paid->select_sum("discount");
					$paid->where("reference_id", $value->id);
					$paid->where_in("type", array("Cash_Receipt", "Offset_Invoice"));
					$paid->where("is_recurring <>",1);
					$paid->where("deleted <>",1);
					$paid->get();
					$amount -= floatval($paid->amount) + floatval($paid->discount);
				}

				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["line"][] = array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"number" 			=> $value->number,
						"issued_date" 		=> $value->issued_date,
						"due_date" 			=> $value->due_date,
						"memo" 				=> $value->memo,
						"status"			=> $value->status,
						"rate" 				=> $value->rate,
						"amount" 			=> $amount
					);
				}else{
					$objList[$value->contact_id]["id"] 				= $value->contact_id;
					$objList[$value->contact_id]["name"] 			= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["line"][] 			= array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"number" 			=> $value->number,
						"issued_date" 		=> $value->issued_date,
						"due_date" 			=> $value->due_date,
						"memo" 				=> $value->memo,
						"status"			=> $value->status,
						"rate" 				=> $value->rate,
						"amount" 			=> $amount
					);			
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	//COLLECTION
	function collect_invoice_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("contact", array("abbr", "number", "name"));
		$obj->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice"));
		$obj->where_in("status", array(0,2));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				$amount = (floatval($value->amount) - floatval($value->deposit)) / floatval($value->rate);

				if($value->status=="2"){
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$paid->select_sum("amount");
					$paid->select_sum("discount");
					$paid->where("reference_id", $value->id);
					$paid->where_in("type", array("Cash_Receipt", "Offset_Invoice"));
					$paid->where("is_recurring <>",1);
					$paid->where("deleted <>",1);
					$paid->get();
					$amount -= floatval($paid->amount) + floatval($paid->discount);
				}

				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["line"][] = array(
						"id" 					=> $value->id,
						"type" 					=> $value->type,
						"number" 				=> $value->number,
						"issued_date" 			=> $value->issued_date,
						"due_date" 				=> $value->due_date,
						"amount" 				=> $amount,
						"status"				=> $value->status
					);
				}else{
					$objList[$value->contact_id]["id"] 		= $value->contact_id;
					$objList[$value->contact_id]["name"] 	= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["line"][] 	= array(
						"id" 					=> $value->id,
						"type" 					=> $value->type,
						"number" 				=> $value->number,
						"issued_date" 			=> $value->issued_date,
						"due_date" 				=> $value->due_date,
						"amount" 				=> $amount,
						"status"				=> $value->status
					);			
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}
	function collection_report_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("contact", array("abbr", "number", "name"));
		$obj->where("type", "Cash_Receipt");
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				//Reference
				$ref = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$ref->select("type, number, issued_date, amount, deposit, rate");
				$ref->get_by_id($value->reference_id);				
				$refAmount = (floatval($ref->amount) - floatval($ref->deposit)) / floatval($ref->rate);

				$amount = (floatval($value->amount) - floatval($value->deposit)) / floatval($value->rate);

				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["line"][] = array(
						"id" 					=> $value->id,
						"type" 					=> $value->type,
						"number" 				=> $value->number,
						"issued_date" 			=> $value->issued_date,
						"amount" 				=> $amount,
						"reference_id" 			=> $value->reference_id,
						"reference_type" 		=> $ref->type,
						"reference_number" 		=> $ref->number,
						"reference_issued_date" => $ref->issued_date,
						"reference_amount" 		=> $refAmount
					);
				}else{
					$objList[$value->contact_id]["id"] 		= $value->contact_id;
					$objList[$value->contact_id]["name"] 	= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["line"][] 	= array(
						"id" 					=> $value->id,
						"type" 					=> $value->type,
						"number" 				=> $value->number,
						"issued_date" 			=> $value->issued_date,
						"amount" 				=> $amount,
						"reference_id" 			=> $value->reference_id,
						"reference_type" 		=> $ref->type,
						"reference_number" 		=> $ref->number,
						"reference_issued_date" => $ref->issued_date,
						"reference_amount" 		=> $refAmount
					);			
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	//TRANSACTION LIST
	function transaction_list_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("contact", array("abbr","number","name"));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				$amount = floatval($value->amount) / floatval($value->rate);
				$deposit = floatval($value->deposit) / floatval($value->rate);
				
				//Reference
				$ref = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$ref->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice", "Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"));
				$ref->where("reference_id", $value->id);
				$ref->where("is_recurring <>", 1);
				$ref->where("deleted <>", 1);					
				$reference = $ref->get_raw()->result();
								
				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["line"][]	= array(
						"id" 			=> $value->id,
						"type" 			=> $value->type,
						"number" 		=> $value->number,
						"issued_date" 	=> $value->issued_date,
						"status" 		=> $value->status,
						"amount" 		=> $amount,
						"reference" 	=> $reference
					);
				}else{
					$objList[$value->contact_id]["id"] 		= $value->contact_id;
					$objList[$value->contact_id]["name"] 	= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["line"][]	= array(
						"id" 			=> $value->id,
						"type" 			=> $value->type,
						"number" 		=> $value->number,
						"issued_date" 	=> $value->issued_date,
						"status" 		=> $value->status,
						"amount" 		=> $amount,
						"reference" 	=> $reference
					);
				}
			}
			
			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	//INVOICE LIST
	function invoice_list_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("contact", array("abbr","number","name"));
		$obj->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice"));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				$amount = floatval($value->amount) / floatval($value->rate);
				$deposit = floatval($value->deposit) / floatval($value->rate);
				
				$reference = [];
				if($value->reference_id>0){
					$ref = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$ref->where("is_recurring <>", 1);
					$ref->where("deleted <>", 1);
					$ref->where("id", $value->reference_id);
					$reference = $ref->get_raw()->result();
				}
								
				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["line"][]	= array(
						"id" 			=> $value->id,
						"type" 			=> $value->type,
						"number" 		=> $value->number,
						"issued_date" 	=> $value->issued_date,
						"due_date" 		=> $value->due_date,
						"status" 		=> $value->status,
						"amount" 		=> $amount,
						"reference" 	=> $reference
					);
				}else{
					$objList[$value->contact_id]["id"] 		= $value->contact_id;
					$objList[$value->contact_id]["name"] 	= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["line"][]	= array(
						"id" 			=> $value->id,
						"type" 			=> $value->type,
						"number" 		=> $value->number,
						"issued_date" 	=> $value->issued_date,
						"due_date" 		=> $value->due_date,
						"status" 		=> $value->status,
						"amount" 		=> $amount,
						"reference" 	=> $reference
					);
				}
			}
			
			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

		//Draft List
	function draft_list_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("contact", array("abbr", "number", "name"));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->where("status", 4);
		$obj->where("progress", "draft");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {								
				$amount = (floatval($value->amount) - floatval($value->deposit)) / floatval($value->rate);
				
				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["line"][] = array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"status" 			=> $value->status,
						"number" 			=> $value->number,
						"issued_date" 		=> $value->issued_date,
						"rate" 				=> $value->rate,
						"amount" 			=> $amount
					);
				}else{
					$objList[$value->contact_id]["id"] 		= $value->contact_id;
					$objList[$value->contact_id]["name"] 	= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["line"][]	= array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"number" 			=> $value->number,
						"status" 			=> $value->status,
						"issued_date" 		=> $value->issued_date,
						"rate" 				=> $value->rate,
						"amount" 			=> $amount
					);
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	//Customer list
	function customer_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;

		$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
					if($value["field"]=="is_pattern"){
	    				$is_pattern = $value["value"];
	    			}else{
	    				$obj->where($value["field"], $value["value"]);
	    			}
				}
			}
		}
		
		$obj->where("is_pattern", $is_pattern);
		$obj->where("deleted <>", 1);
		$obj->where_in("contact_type_id", array(4, 5, 11,12,13));
		$obj->include_related("contact_type", "name");		

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		
		
		if($obj->result_count()>0){
			foreach ($obj as $value) {
		 		$data["results"][] = array(
		 			"id" 						=> $value->id,		 			
					"branch_id" 				=> $value->branch_id,
					"country_id" 				=> $value->country_id,
					"ebranch_id" 				=> $value->ebranch_id,
					"elocation_id" 				=> $value->elocation_id,
					"wbranch_id" 				=> $value->wbranch_id,
					"wlocation_id" 				=> $value->wlocation_id,					
					"user_id"					=> $value->user_id, 	
					"contact_type_id" 			=> $value->contact_type_id,
					"eorder" 					=> $value->eorder,
					"worder" 					=> $value->worder, 						
					"abbr" 						=> $value->abbr,
					"number" 					=> $value->number,
					"eabbr" 					=> $value->eabbr,
					"enumber" 					=> $value->enumber,
					"wabbr" 					=> $value->wabbr,
					"wnumber" 					=> $value->wnumber,		
					"name" 						=> $value->name,			
					"gender"					=> $value->gender,			
					"dob" 						=> $value->dob,				
					"pob" 						=> $value->pob,
					"latitute" 					=> $value->latitute,
					"longtitute" 				=> $value->longtitute,
					"credit_limit" 				=> $value->credit_limit,
					"locale" 					=> $value->locale,					
					"id_number" 				=> $value->id_number,
					"phone" 					=> $value->phone,
					"email" 					=> $value->email,
					"website" 					=> $value->website,					
					"job" 						=> $value->job,
					"vat_no" 					=> $value->vat_no,
					"family_member"				=> $value->family_member,
					"city" 						=> $value->city,
					"post_code" 				=> $value->post_code,
					"address" 					=> $value->address,
					"bill_to" 					=> $value->bill_to,
					"ship_to" 					=> $value->ship_to,
					"memo" 						=> $value->memo,
					"image_url" 				=> $value->image_url,				
					"company" 					=> $value->company,
					"company_en" 				=> $value->company_en,
					"bank_name" 				=> $value->bank_name,
					"bank_address" 				=> $value->bank_address,
					"bank_account_name" 		=> $value->bank_account_name,
					"bank_account_number" 		=> $value->bank_account_number,
					"name_on_cheque" 			=> $value->name_on_cheque,
					"business_type_id" 			=> $value->business_type_id,					
					"payment_term_id" 			=> $value->payment_term_id,
					"payment_method_id" 		=> $value->payment_method_id,
					"deposit_account_id"		=> $value->deposit_account_id,
					"trade_discount_id" 		=> $value->trade_discount_id,
					"settlement_discount_id"	=> $value->settlement_discount_id,
					"salary_account_id"			=> $value->salary_account_id,
					"account_id" 				=> $value->account_id,					
					"ra_id" 					=> $value->ra_id,
					"tax_item_id" 				=> $value->tax_item_id,					
					"phase_id" 					=> $value->phase_id,
					"voltage_id" 				=> $value->voltage_id,
					"ampere_id" 				=> $value->ampere_id,
					"registered_date" 			=> $value->registered_date,
					"use_electricity" 			=> $value->use_electricity,
					"use_water" 				=> $value->use_water,
					"is_local" 					=> $value->is_local,
					"is_pattern" 				=> intval($value->is_pattern),
					"status" 					=> $value->status,
					"is_system"					=> $value->is_system,
								
					"contact_type"				=> $value->contact_type_name
		 		);
			}
		}

		//Response Data		
		$this->response($data, 200);			
	}

	//TRANSACTION BY JOB ENGAGEMENT
	function transaction_by_job_engagement_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		//Sort
		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				if(isset($value["operator"])){
					$obj->{$value["operator"]}($value["field"], $value["dir"]);
				}else{
					$obj->order_by($value["field"], $value["dir"]);
				}
			}
		}
		
		//Filter
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter["filters"] as $value) {
	    		if(isset($value["operator"])){
	    			$obj->{$value["operator"]}($value['field'], $value['value']);
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->include_related("contact", array("abbr", "number", "name"));
		$obj->include_related("job", array("name"));
		$obj->where("job_id >", 0);
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {								
				$amount = (floatval($value->amount) - floatval($value->deposit)) / floatval($value->rate);
				
				if(isset($objList[$value->job_id])){
					$objList[$value->job_id]["line"][] = array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"number" 			=> $value->number,
						"name" 				=> $value->contact_abbr.$value->contact_number." ".$value->contact_name,
						"issued_date" 		=> $value->issued_date,
						"status" 			=> $value->status,
						"rate" 				=> $value->rate,
						"amount" 			=> $amount
					);
				}else{
					$objList[$value->job_id]["id"] 		= $value->job_id;
					$objList[$value->job_id]["job"] 	= $value->job_name;
					$objList[$value->job_id]["line"][]	= array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"number" 			=> $value->number,
						"name" 				=> $value->contact_abbr.$value->contact_number." ".$value->contact_name,
						"issued_date" 		=> $value->issued_date,
						"status" 			=> $value->status,
						"rate" 				=> $value->rate,
						"amount" 			=> $amount
					);
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}

			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	function statement_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$totalAmount = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    		if(isset($value['operator'])){
	    			$obj->{$value['operator']}($value['field'], $value['value']);	    		
	    		} else {
	    			$obj->where($value['field'], $value['value']);
	    		}
			}
		}

		//Results
		$obj->where_in("type", array("Cash_Sale", "Invoice", "Cash_Receipt", "Sale_Return", "Deposit"));
		$obj->include_related("job", array("name"));
		$obj->include_related("contact", array("abbr", "number", "name", "phone", "address"));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			
			foreach ($obj as $value) {

				if($value->type == "Cash_Receipt" || $value->type == "Sale_Return" || $value->type == "Deposit"){
					$amount = (floatval($value->amount)/floatval($value->rate))*-1;
				}else{
					$amount = floatval($value->amount)/floatval($value->rate);
				}
				if($value->type == "Cash_Sale"){
					$totalAmount += 0;
				}else{
					$totalAmount += $amount;
				}

				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["line"][] = array(
						"id"		=> $value->id,
						"date"		=> $value->issued_date,
						"type"		=> $value->type,
						"status"	=> $value->status,
						"job"		=> $value->job_name,
						"number"	=> $value->number,
						"amount"	=> $amount,

					);
				}else{

					$balance_forward = 0;

					$bf = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$obj->where_in("type", array("Cash_Sale", "Invoice", "Cash_Receipt", "Sale_Return", "Deposit"));		
					$bf->where("issued_date <", $value->issued_date);
					$bf->where("is_recurring <>", 1);		
					$bf->where("deleted <>", 1);
					$bf->get_iterated();

					foreach ($bf as $val) {
						if($val->type == "Cash_Sale" || $val->type == "Invoice"){
							$balance_forward += floatval($val->amount)/floatval($val->rate);
						}else{
							$balance_forward = 0;
						}
					}


					$objList[$value->contact_id]["id"] 				= $value->id;
					$objList[$value->contact_id]["name"] 	= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["phone"] 			= $value->contact_phone;
					$objList[$value->contact_id]["address"] 		= $value->contact_address;
					$objList[$value->contact_id]["balance_forward"] = $balance_forward;
					$objList[$value->contact_id]["line"][] 	= array(
						"id"		=> $value->id,
						"date"		=> $value->issued_date,
						"type"		=> $value->type,
						"status"	=> $value->status,
						"job"		=> $value->job_name,
						"number"	=> $value->number,
						"amount"	=> $amount,

					);
				}
			}
			
			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		$data["totalAmount"] = $totalAmount;

		//Response Data
		$this->response($data, 200);
	}



	//BY HEANG #############################################################################
	function detail_customer_get() {
		$filters 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;
		$customers = array();
		$total = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Filter
		if(!empty($filters) && isset($filters)){
	    	foreach ($filters["filters"] as $value) {
	    		if(!empty($value["operator"]) && isset($value["operator"])){
		    		if($value["operator"]=="where_in"){
		    			$obj->where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_in"){
		    			$obj->or_where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="where_not_in"){
		    			$obj->where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_not_in"){
		    			$obj->or_where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="like"){
		    			$obj->like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_like"){
		    			$obj->or_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="not_like"){
		    			$obj->not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_not_like"){
		    			$obj->or_not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="startswith"){
		    			$obj->like($value["field"], $value["value"], "after");
		    		}else if($value["operator"]=="endswith"){
		    			$obj->like($value["field"], $value["value"], "before");
		    		}else if($value["operator"]=="contains"){
		    			$obj->like($value["field"], $value["value"], "both");
		    		}else if($value["operator"]=="or_where"){
		    			$obj->or_where($value["field"], $value["value"]);		    		
		    		}else{
		    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
		    		}
	    		}else{
	    			$obj->where($value["field"], $value["value"]);
	    		}
			}
		}

		// Segment
		if($filters['logic'] == "segment") {
			$segmentItem = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		
			$segmentItem->get();

			foreach ($segmentItem as $seg) {
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

				$txn->where_in("type", array("Invoice", "Cash_Sale", "Sale_Return", "Commercial_Invoice", "Vat_Invoice", "Commercial_Cash_Sale", "Vat_Cash_Sale", "Sale_Return"));
				$txn->where_in("status", array(0,2));
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted",0);
				$txn->where("is_recurring",0);
				if(isset($filters['filters'])) {
					foreach($filters['filters'] as $f) {
						$txn->where($f['field'], $f['value']);
					}
				}
				$txn->get_iterated();

				foreach ($txn as $t) {
					$ref = $t->referece->get();
					$amt = floatval($t->amount)/ floatval($t->rate);
					$items = $t->item_line->include_related('item', array('name'))->get();
					$lines = array();
					foreach($items as $item) {
						$amount = $t->type =="Sale_Return"?floatval($item->amount)/floatval($t->rate)*-1:floatval($item->amount)/floatval($t->rate);
						$quantity = $t->type =="Sale_Return"?$item->quantity*-1:$item->quantity;
						$lines[] = array(
							'name' 			=> $item->item_name,
							'quantity' 		=> $item->quantity,
							'price' 		=> floatval($item->price)/floatval($t->rate),
							'amount'		=> floatval($item->amount)/floatval($t->rate)
						);
					}
					if(isset($customers["$seg->name"])) {
						$customers["$seg->name"]['amount']+= $amt;
						$customers["$seg->name"]['transactions'][] = array(
							'id'  		=> $t->id,
							'type'  	=> $t->type,
							'date' 		=> $t->issued_date,
							'number' 	=> $t->number,
							'memo' 		=> $t->memo2,
							'amount' 	=> $amt,
							'lines' 	=> $lines
						);
					} else {
						$customers["$seg->name"]['amount']= $amt;
						$customers["$seg->name"]['transactions'][] = array(
							'id'  		=> $t->id,
							'type'  	=> $t->type,
							'date' 		=> $t->issued_date,
							'number' 	=> $t->number,
							'memo' 		=> $t->memo2,
							'amount' 	=> $amt,
							'lines' 	=> $lines
						);
					}
					$total += $amt;
				}
			}
		} else {
			// $obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->select('id')->where('parent_id', 1)->get();
			$types = array();
			foreach($type as $t) {
				$types[] = $t->id;
			}

			$obj->where_in_related("contact", 'contact_type_id', $types);
			$obj->where_in("type", array("Invoice", "Cash_Sale", "Commercial_Invoice", "Vat_Invoice", "Commercial_Cash_Sale", "Vat_Cash_Sale", "Cash_Sale", "Sale_Return"));
			$obj->where('is_recurring', 0);
			$obj->where("deleted",0);

			// $obj->include_related("contact_type", "name");

			//Results
			if(isset($filters['filters'])) {
				foreach($filters['filters'] as $f) {
					$obj->where($f['field'], $f['value']);
				}
			}
			// $obj->get_paged_iterated($page, $limit);
			// $data["count"] = $obj->paged->total_rows;
			$obj->get_iterated();
			$data["count"] = $obj->result_count();
			
			if($obj->result_count()>0){
				foreach ($obj as $value) {
					$ref = $value->transaction->get();
					$customer = $value->contact->get();
					$fullname = $customer->surname.' '.$customer->name;
					$items = $value->item_line->include_related('item', array('name'))->get();
					$lines = array();
					$temp = 0;
					$cAmount = 0;
					foreach ($ref as $r) {
						$a = abs($r->amount);					
						$temp += floatval($a);
					}
					foreach($items as $item) {
						$amount = $value->type =="Sale_Return"?floatval($item->amount)/floatval($value->rate)*-1:floatval($item->amount)/floatval($value->rate);
						$quantity = $value->type =="Sale_Return"?$item->quantity*-1:$item->quantity;
						$cAmount += $amount;
						$lines[] = array(
							'name' 			=> $item->item_name,
							'quantity' 		=> $quantity,
							'price' 		=> floatval($item->price)/floatval($value->rate),
							'amount'		=> $amount
						);
					}
					if(isset($customers["$fullname"])) {
						$customers["$fullname"]['amount'] += $cAmount;
						$customers["$fullname"]['transactions'][] = array(
							'id'  		=> $value->id,
							'type'  	=> $value->type,
							'date' 		=> $value->issued_date,
							'number' 	=> $value->number,
							'memo' 		=> $value->memo2,
							'amount' 	=> floatval($value->amount)/floatval($value->rate),
							'lines' 	=> $lines
						);
					} else {
						$customers["$fullname"]['amount'] = $cAmount;
						$customers["$fullname"]['transactions'][] = array(
							'id'  		=> $value->id,
							'type'  	=> $value->type,
							'date' 		=> $value->issued_date,
							'number' 	=> $value->number,
							'memo' 		=> $value->memo2,
							'amount' 	=> floatval($value->amount)/floatval($value->rate),
							'lines' 	=> $lines
						);
				//Results
					}
					
				}
			}
		}
		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'group' 	=> $key,
				'amount'	=> $value['amount'],
				'items' 	=> $value['transactions']

			);
			$total += floatval($value['amount']);
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
		$customers  = array();
		$total = 0;
		$totalCashSale = 0;
		$totalCashReceipt = 0;
		$customerBalance = 0;
		$totalSale = 0;
		$saleReturn =0;
		$totalQuote	= 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Filter
		if(!empty($filters) && isset($filters)){
	    	foreach ($filters as $value) {
	    		if(!empty($value["operator"]) && isset($value["operator"])){
		    		if($value["operator"]=="where_in"){
		    			$obj->where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_in"){
		    			$obj->or_where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="where_not_in"){
		    			$obj->where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_not_in"){
		    			$obj->or_where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="like"){
		    			$obj->like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_like"){
		    			$obj->or_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="not_like"){
		    			$obj->not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_not_like"){
		    			$obj->or_not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="startswith"){
		    			$obj->like($value["field"], $value["value"], "after");
		    		}else if($value["operator"]=="endswith"){
		    			$obj->like($value["field"], $value["value"], "before");
		    		}else if($value["operator"]=="contains"){
		    			$obj->like($value["field"], $value["value"], "both");
		    		}else if($value["operator"]=="or_where"){
		    			$obj->or_where($value["field"], $value["value"]);		    		
		    		}else{
		    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
		    		}
	    		}else{
	    			$obj->where($value["field"], $value["value"]);
	    		}
			}
		}

		if($this->get("filter")['logic'] == "segment") {
			$segmentItem = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$segmentItem->get();

			foreach ($segmentItem as $seg) {
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

				$txn->where_in("type", array("Invoice", "Cash_Sale", "Customer_Deposit", "Cash_Receipt", "Sale_Return", "Quote", "Sale_Order", "Commercial_Invoice", "Vat_Invoice", "Commercial_Cash_Sale", "Vat_Cash_Sale"));
				$txn->where_in("status", array(0,2));
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted",0);
				$txn->where("is_recurring",0);
				

				foreach ($txn as $t) {
					$amt = floatval($t->amount)/ floatval($t->rate);					
					foreach($items as $item) {
						$customers = array();
					}
					if(isset($customers["$seg->name"])) {
						$customers["$seg->name"]['transactions'][] = array(
							'id'  		=> $t->id,
							'type'  	=> $t->type,
							'date' 		=> $t->issued_date,
							'number' 	=> $t->number,
							'memo' 		=> $t->memo2,
							'amount' 	=> floatval($t->amount)/floatval($t->rate)
						);
					} else {				
						$customers["$seg->name"]['transactions'][] = array(
							'id'  		=> $t->id,
							'type'  	=> $t->type,
							'date' 		=> $t->issued_date,
							'number' 	=> $t->number,
							'memo' 		=> $t->memo2,
							'amount' 	=> floatval($t->amount)/floatval($t->rate)
						);
					}
					$total += $amt;
				}
			}
		} else {

			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->select('id')->where('parent_id', 1)->get();
			$types = array();
			foreach($type as $t) {
				$types[] = $t->id;
			}

			$obj->where_in_related("contact", 'contact_type_id', $type);
			$obj->where_in("type", array("Invoice", "Cash_Sale", "Customer_Deposit", "Cash_Receipt", "Sale_Return", "Quote", "Sale_Order", "Commercial_Invoice", "Vat_Invoice", "Commercial_Cash_Sale", "Vat_Cash_Sale"));
			$obj->where('is_recurring', 0);
			$obj->where("deleted",0);

			// $obj->include_related("contact_type", "name");

			//Results
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
			
			
				if($obj->result_count()>0){
					foreach ($obj as $value) {
						$customer = $value->contact->get();
						$fullname = $customer->surname.' '.$customer->name;
						$lines = array();

						if(isset($customers["$fullname"])) {
							$customers["$fullname"]['transactions'][] = array(
								'id'  		=> $value->id,
								'type'  	=> $value->type,
								'date' 		=> $value->issued_date,
								'number' 	=> $value->number,
								'memo' 		=> $value->memo2,
								'amount' 	=> floatval($value->amount)/floatval($value->rate)
							);
						} else {
							$customers["$fullname"]['transactions'][] = array(
								'id'  		=> $value->id,
								'type'  	=> $value->type,
								'date' 		=> $value->issued_date,
								'number' 	=> $value->number,
								'memo' 		=> $value->memo2,
								'amount' 	=> floatval($value->amount)/floatval($value->rate)
							);
						}
						if($value->type == "Cash_Sale" || $value->type == "Commercial_Cash_Sale" || $value->type == "Vat_Cash_Sale"){
							$totalCashSale += floatval($value->amount)/floatval($value->rate);
						}
						if($value->type == "Cash_Receipt"){
							$totalCashReceipt += floatval($value->amount)/floatval($value->rate);
						}
						if($value->type == "Invoice" || $value->type == "Commercial_Invoice" || $value->type == "Vat_Invoice" || $value->type == "Cash_Sale" || $value->type == "Commercial_Cash_Sale" || $value->type == "Vat_Cash_Sale" ){
							$totalSale += floatval($value->amount)/floatval($value->rate);
						}
						if($value->type == "Sale_Return"){
							$saleReturn += floatval($value->amount)/floatval($value->rate);
						}
						if($value->type == "Invoice" || $value->type == "Commercial_Invoice" || $value->type == "Vat_Invoice"){
							if($value->status !=1) {
								if($value->delete !=1){
								$customerBalance += floatval($value->amount)/floatval($value->rate);
								}
							};
						}
						if($value->type == "Quote"){
							$totalQuote += floatval($value->amount)/floatval($value->rate);
						}
						$total += floatval($value->amount)/floatval($value->rate);
					}
				}
		}
		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'group' 	=> $key,
				'items'		=> $value['transactions'],
			);
		}

		$data['total'] = $totalSale + $totalCashSale + $totalCashReceipt + $totalQuote - $saleReturn;
		$data['totalCashSale'] = $totalCashSale;
		$data['totalCashReceipt'] = $totalCashReceipt;
		$data['customerBalance'] = $customerBalance;
		$data['count'] = count($customers);
		//Response Data
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

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Filter
		if(!empty($filters) && isset($filters)){
	    	foreach ($filters as $value) {
	    		if(!empty($value["operator"]) && isset($value["operator"])){
		    		if($value["operator"]=="where_in"){
		    			$obj->where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_in"){
		    			$obj->or_where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="where_not_in"){
		    			$obj->where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_not_in"){
		    			$obj->or_where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="like"){
		    			$obj->like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_like"){
		    			$obj->or_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="not_like"){
		    			$obj->not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_not_like"){
		    			$obj->or_not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="startswith"){
		    			$obj->like($value["field"], $value["value"], "after");
		    		}else if($value["operator"]=="endswith"){
		    			$obj->like($value["field"], $value["value"], "before");
		    		}else if($value["operator"]=="contains"){
		    			$obj->like($value["field"], $value["value"], "both");
		    		}else if($value["operator"]=="or_where"){
		    			$obj->or_where($value["field"], $value["value"]);		    		
		    		}else{
		    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
		    		}
	    		}else{
	    			$obj->where($value["field"], $value["value"]);
	    		}
			}
		}

		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->select('id')->where('parent_id', 1)->get();
			$types = array();
			foreach($type as $t) {
				$types[] = $t->id;
			}
		$obj->where_in_related("contact", 'contact_type_id', $types);
		$obj->where_in("type", array("Invoice", "Cash_Sale", "Sale_Return", "Commercial_Invoice", "Vat_Invoice", "Commercial_Cash_Sale", "Vat_Cash_Sale"));
		$obj->where('is_recurring', 0);
		$obj->where("deleted",0);

		// $obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		$items = array();
		$total = 0;
		$totalAvg = 0;
		$totalQty = 0;
		$totalCost= 0;
		$totalCOS =0;
		$totalQ = 0;
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$itemLine = $value->item_line->get();
				foreach($itemLine as $line) {
					$amount = $value->type =="Sale_Return"?floatval($line->amount)/floatval($line->rate)*-1:floatval($line->amount)/floatval($line->rate);
					$item = $line->item->where_in('item_type_id', array(1, 4))->get();

					if(isset($items["$item->name"])) {
						$items["$item->name"]['qty'] += intval($line->quantity);
						$items["$item->name"]['amount'] += $amount;
						$items["$item->name"]['gross_profit'] += (floatval($line->price)-floatval($line->cost)) * floatval($line->quantity);
					} else {
						$items["$item->name"]['qty'] = intval($line->quantity);
						$items["$item->name"]['amount'] = $amount;
						$items["$item->name"]['price'] = floatval($item->price);
						$items["$item->name"]['cost'] = floatval($item->cost);
						$items["$item->name"]['rate'] = floatval($value->rate);
						$items["$item->name"]['gross_profit'] = (floatval($line->price)-floatval($line->cost)) * floatval($line->quantity);
					}
					$total += $amount;
					$totalCOS += intval($line->quantity) * floatval($item->cost);
					$totalQ += $line->quantity;
				}
			}
		}
		foreach($items as $key => $value) {
			$data['results'][] = array(
				'group' => $key,
				'amount' => $value['amount'],
				'qty' => $value['qty'],
				'avg_price' => $value['price'],
				'cost' => $value['cost'],
				'gross_profit_margin' => $value['price'] > 0? (($value['price'] - $value['cost']) / $value['price']) : 0
			);
		}
		$data['total_sale'] = $total;
		$data['total_avg'] = $totalQ > 0? $total / $totalQ : 0;
		$data['totalQ'] = $totalQ;
		$data['gpm'] = $total > 0? ($total - $totalCOS) / $total : 0;
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

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Filter
		if(!empty($filters) && isset($filters)){
	    	foreach ($filters as $value) {
	    		if(!empty($value["operator"]) && isset($value["operator"])){
		    		if($value["operator"]=="where_in"){
		    			$obj->where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_in"){
		    			$obj->or_where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="where_not_in"){
		    			$obj->where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_not_in"){
		    			$obj->or_where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="like"){
		    			$obj->like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_like"){
		    			$obj->or_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="not_like"){
		    			$obj->not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_not_like"){
		    			$obj->or_not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="startswith"){
		    			$obj->like($value["field"], $value["value"], "after");
		    		}else if($value["operator"]=="endswith"){
		    			$obj->like($value["field"], $value["value"], "before");
		    		}else if($value["operator"]=="contains"){
		    			$obj->like($value["field"], $value["value"], "both");
		    		}else if($value["operator"]=="or_where"){
		    			$obj->or_where($value["field"], $value["value"]);		    		
		    		}else{
		    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
		    		}
	    		}else{
	    			$obj->where($value["field"], $value["value"]);
	    		}
			}
		}

		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->select('id')->where('parent_id', 1)->get();
			$types = array();
			foreach($type as $t) {
				$types[] = $t->id;
			}

		$obj->where_in_related("contact", 'contact_type_id', $types);
		$obj->where('is_recurring', 0);
		$obj->where_in("type", array("Invoice", "Cash_Sale", "Sale_Return", "Commercial_Invoice", "Vat_Invoice", "Commercial_Cash_Sale", "Vat_Cash_Sale"));
		$obj->where("deleted",0);
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		$products = array();
		$total = 0;
		$totalQty = 0;
		$productSale = 0;
		$totalReturn = 0;
		$productReturn =0;
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$itemLine = $value->item_line->get();
			
				foreach($itemLine as $line) {
					$amount = $value->type =="Sale_Return"?floatval($line->amount)/floatval($value->rate)*-1:floatval($line->amount)/floatval($value->rate);
					$quantity = $value->type =="Sale_Return"?$line->quantity*-1:$line->quantity;
					$item = $line->item->where_in('item_type_id', array(1, 4))->get();
					$temp = array(
						'id'   => $value->id,
						'type' => $value->type,
						'date' => $value->issued_date,
						'memo' => $value->memo2,
						'number' 	=> $value->number,
						'qty'  => $quantity,
						'price'=> floatval($line->price)/floatval($value->rate),
						'amount'=> $amount
					);
					if(isset($products["$item->name"])) {
						$products["$item->name"][] = $temp;
					} else {
						$products["$item->name"][] = $temp;
					}
					
					if($value->type == "Sale_Return"){
						$totalReturn += floatval($line->amount)/floatval($value->rate);
						$productReturn += $line->quantity;
					}else{
						$total += floatval($line->amount)/floatval($value->rate);
						$productSale += $line->quantity;
						$totalQty == count($products);
					}
					
				}
			}
		}
		foreach ($products as $key => $value) {
			$data["results"][] = array(
				'group' 	=> $key,
				// 'amount'	=> $value['amount'],
				'items' 	=> $value

			);
		}
		$data['total'] = $total-$totalReturn;
		$data['totalQty'] = $totalQty;
		$data['productSale'] = $productSale-$productReturn;
		$data['count'] = count($products);
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

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Filter
		if(!empty($filters) && isset($filters)){
	    	foreach ($filters as $value) {
	    		if(!empty($value["operator"]) && isset($value["operator"])){
		    		if($value["operator"]=="where_in"){
		    			$obj->where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_in"){
		    			$obj->or_where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="where_not_in"){
		    			$obj->where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_not_in"){
		    			$obj->or_where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="like"){
		    			$obj->like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_like"){
		    			$obj->or_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="not_like"){
		    			$obj->not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_not_like"){
		    			$obj->or_not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="startswith"){
		    			$obj->like($value["field"], $value["value"], "after");
		    		}else if($value["operator"]=="endswith"){
		    			$obj->like($value["field"], $value["value"], "before");
		    		}else if($value["operator"]=="contains"){
		    			$obj->like($value["field"], $value["value"], "both");
		    		}else if($value["operator"]=="or_where"){
		    			$obj->or_where($value["field"], $value["value"]);		    		
		    		}else{
		    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
		    		}
	    		}else{
	    			$obj->where($value["field"], $value["value"]);
	    		}
			}
		}


		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$type->select('id')->where('parent_id', 1)->get();
			$types = array();
			foreach($type as $t) {
				$types[] = $t->id;
			}

		$obj->where_in_related("contact", 'contact_type_id', $type);
		$obj->where_in("type", array("Invoice", "Cash_Sale", "Deposit", "Commercial_Invoice", "Vat_Invoice", "Commercial_Cash_Sale", "Vat_Cash_Sale"));
		$obj->where('job_id <>', 0);
		$obj->where('is_recurring', 0);
		$obj->where("deleted",0);

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
				$jobName = $job->name;
				$segment = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$segment->where_in('id', explode(',',$value->segments))->get();
				$segments = array();
				if($segment->exists()) {
					foreach($segment as $seg) {
						$segments[] = array(
							'id' => $seg->id, 'code' => $seg->code
						);
					}
				}
					$data['results'][] = array(
						'id' 		=> $value->id,
						'job' 		=> $jobName,
						'name'		=> $fullname,
						'type'  	=> $value->type,
						'date' 		=> $value->issued_date,
						'number' 	=> $value->number,
						'memo' 		=> $value->memo2,
						'amount' 	=> floatval($value->amount)/floatval($value->rate)
					);

			$total += floatval($value->amount)/ floatval($value->rate);
			}
		}

		$data['total'] = $total;
		$data['count'] = count($total);
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
		$customers = array();
		$total = 0;
		$totalDay = 0;
		$aging = 0;
		$totalInvoice = 0;
		$countCustomer = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Filter
		if(!empty($filters) && isset($filters)){
	    	foreach ($filters as $value) {
	    		if(!empty($value["operator"]) && isset($value["operator"])){
		    		if($value["operator"]=="where_in"){
		    			$obj->where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_in"){
		    			$obj->or_where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="where_not_in"){
		    			$obj->where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_not_in"){
		    			$obj->or_where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="like"){
		    			$obj->like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_like"){
		    			$obj->or_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="not_like"){
		    			$obj->not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_not_like"){
		    			$obj->or_not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="startswith"){
		    			$obj->like($value["field"], $value["value"], "after");
		    		}else if($value["operator"]=="endswith"){
		    			$obj->like($value["field"], $value["value"], "before");
		    		}else if($value["operator"]=="contains"){
		    			$obj->like($value["field"], $value["value"], "both");
		    		}else if($value["operator"]=="or_where"){
		    			$obj->or_where($value["field"], $value["value"]);		    		
		    		}else{
		    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
		    		}
	    		}else{
	    			$obj->where($value["field"], $value["value"]);
	    		}
			}
		}

		if($this->get("filter")['logic'] == "segment") {
			$segmentItem = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		
			$segmentItem->get();

			foreach ($segmentItem as $seg) {
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

				$txn->where_in("type", array("Invoice", "Commercial_Invoice", "Vat_Invoice"));
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted",0);
				$txn->where("is_recurring",0);
			
				$txn->get_iterated();

				foreach ($txn as $t) {
					$ref = $t->referece->get();
					$amt = floatval($t->amount)/ floatval($t->rate);
					$items = $t->item_line->include_related('item', array('name'))->get();

					$today = new DateTime();
					$dueDate = new DateTime($t->due_date);
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
						$outstanding = 'Current';
					}

					if(isset($customers["$outstanding"])) {
						$customers["$outstanding"]['amount']	+= floatval($t->amount) / floatval($t->rate);
						 // days

						$customers["$outstanding"]['transactions'][] = array(
							'id' => $t->id,
							'type' => $t->type,
							'date' => $t->issued_date,
							'number' => $t->number,
							'memo' => $t->memo2,
							'amount' => floatval($t->amount) / floatval($t->rate)
						);
					} else {
						$customers["$outstanding"]['amount']	= floatval($t->amount) / floatval($t->rate);
						$customers["$outstanding"]['transactions'][] = array(
							'id' => $t->id,
							'type' => $t->type,
							'date' => $t->issued_date,
							'number' => $t->number,
							'memo' => $t->memo2,
							'amount' => floatval($t->amount) / floatval($t->rate)
						);
				//Results
					}
					$total += $amt;
				}
			}
		} else {

			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->select('id')->where('parent_id', 1)->get();
			$types = array();
			foreach($type as $t) {
				$types[] = $t->id;
			}

			$obj->where_in_related("contact", 'contact_type_id', $type);
			$obj->where_in("type", array("Invoice", "Commercial_Invoice", "Vat_Invoice"));
			$obj->where('is_recurring', 0);
			$obj->where("deleted",0);

			// $obj->include_related("contact_type", "name");

			//Results
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
			
			if($obj->result_count()>0){
				foreach ($obj as $value) {
					$ref = $value->transaction->get();
					$customer = $value->contact->get();
					$fullname = $customer->surname.' '.$customer->name;
					$items = $value->item_line->include_related('item', array('name'))->get();
					$totalInvoice +=1;
					$temp = 0;
					foreach ($ref as $r) {
						$a = abs($r->amount);					
						$temp += floatval($a);
					}
					$today = new DateTime();
					$dueDate = new DateTime($value->due_date);
					$diff = $today->diff($dueDate)->format("%a");
					$outstanding = 0;
					$dayOutsatanding = 0;
					if($dueDate<$today){
						$dayOutsatanding = $today->diff($dueDate)->format("%a");
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
						$outstanding = 'Current';
						$dayOutsatanding = 0;
					}

					if(isset($customers["$outstanding"])) {
						$customers["$outstanding"]['amount']	+= floatval($value->amount) / floatval($value->rate)- $temp;
						 // days
							$outstanding = 0; // days
							if($dueDate<$today){
								$outstanding = $today->diff($dueDate)->format("%a");
							}else{
								$outstanding = 0;
							}

						$customers["$outstanding"]['transactions'][] = array(
							'id' => $value->id,
							'name' => $fullname,
							'type' => $value->type,
							'date' => $value->issued_date,
							'number' => $value->number,
							'memo' => $value->memo2,
							"status" => $value->status,
							'dueDate' => $value->due_date,
							'amount' => floatval($value->amount) / floatval($value->rate)- $temp
						);
					} else {
						$customers["$outstanding"]['amount']	= floatval($value->amount) / floatval($value->rate)- $temp;
						$customers["$outstanding"]['transactions'][] = array(
							'id' => $value->id,
							'name' => $fullname,
							'type' => $value->type,
							'date' => $value->issued_date,
							'number' => $value->number,
							'memo' => $value->memo2,
							"status" => $value->status,
							'dueDate' => $value->due_date,
							'amount' => floatval($value->amount) / floatval($value->rate)- $temp
						);
					}
					if(isset($name)) {
						$countCustomer =1;
					}else{
						$countCustomer = 0;
					}
					$totalDay += $dayOutsatanding;
					$total += floatval($value->amount)/ floatval($value->rate)- $temp;
					$aging = $totalDay/ $totalInvoice;

				}
			}
		}	
		foreach ($customers as $key => $value) {	
			$data["results"][] = array(
				'group' 	=> $key,
				'items' => $value['transactions']
			);
		}
		$data['total'] = $total;
		$data['totalDay'] = $totalDay;
		$data['aging'] = $aging;
		$data['totalInvoice'] = $totalInvoice;
		$data['count'] += $countCustomer;
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
		$customers = array();
		$total = 0;
		$totalInvoice = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Filter
		if(!empty($filters) && isset($filters)){
	    	foreach ($filters as $value) {
	    		if(!empty($value["operator"]) && isset($value["operator"])){
		    		if($value["operator"]=="where_in"){
		    			$obj->where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_in"){
		    			$obj->or_where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="where_not_in"){
		    			$obj->where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_not_in"){
		    			$obj->or_where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="like"){
		    			$obj->like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_like"){
		    			$obj->or_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="not_like"){
		    			$obj->not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_not_like"){
		    			$obj->or_not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="startswith"){
		    			$obj->like($value["field"], $value["value"], "after");
		    		}else if($value["operator"]=="endswith"){
		    			$obj->like($value["field"], $value["value"], "before");
		    		}else if($value["operator"]=="contains"){
		    			$obj->like($value["field"], $value["value"], "both");
		    		}else if($value["operator"]=="or_where"){
		    			$obj->or_where($value["field"], $value["value"]);		    		
		    		}else{
		    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
		    		}
	    		}else{
	    			$obj->where($value["field"], $value["value"]);
	    		}
			}
		}

		if($this->get("filter")['logic'] == "segment") {
			$segmentItem = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		
			$segmentItem->get();

			foreach ($segmentItem as $seg) {
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

				$txn->where_in("type", array("Invoice", "Commercial_Invoice", "Vat_Invoice"));
				$txn->where_in("status", array(1,2));
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted",0);
				$txn->where("is_recurring",0);
			
				$txn->get_iterated();

				foreach ($txn as $t) {
					$amt = floatval($t->amount)/ floatval($t->rate);
					$customers = array();
					$paymentMethod = $t->payment_method->get();
					$cr = $t->referece->get();
					if(isset($customers["$paymentMethod->name"])) {
						$customers["$paymentMethod->name"]['amount']	+= floatval($t->amount) / floatval($value->rate);
						 // days

						$customers["$paymentMethod->name"]['transactions'][] = array(
							'id' => $t->id,
							'type' => $t->type,
							'date' => $t->issued_date,
							'number' => $t->number,
							'memo' => $t->memo2,
							'amount' => floatval($t->amount) / floatval($t->rate)
						);
					} else {
						$customers["$paymentMethod->name"]['amount']	= floatval($t->amount) / floatval($value->rate);
						
						$tmp = array();
						foreach ($cr as $recipt){
							if($recipt->type=="Cash_Receipt"){
								if($recipt->id == $t->id){
								$tmp[] = array(
									'date' => $recipt->issued_date,
									'number' => $recipt->number,
									'amount' => floatval($recipt->amount) / floatval($recipt->rate)
									);
								}
							}
						}
						$customers["$paymentMethod->name"]['transactions'][] = array(
							'id' => $t->id,
							'type' => $t->type,
							'date' => $t->issued_date,
							'number' => $t->number,
							'memo' => $t->memo2,
							'amount' => floatval($t->amount) / floatval($t->rate),
							'cashReceipt' => $tmp
						);
				//Results
					}
					$total += $amt;
				}
			}
		} else {

			// $obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);



			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->select('id')->where('parent_id', 1)->get();
			$types = array();
			foreach($type as $t) {
				$types[] = $t->id;
			}

			$obj->where_in_related("contact", 'contact_type_id', $type);
			$obj->where_in("type", array("Invoice", "Commercial_Invoice", "Vat_Invoice"));
			$obj->where('is_recurring', 0);
			$obj->where("deleted",0);


			// $obj->include_related("contact_type", "name");

			//Results
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
			
			if($obj->result_count()>0){
				foreach ($obj as $value) {
					$totalInvoice += 1;
					$paymentMethod = $value->payment_method->get();
					$cr = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$cr->where('reference_id', $value->id);
					$cr->where('type', 'Cash_Receipt');
					$cr->get();
					if(isset($customers["$paymentMethod->name"])) {
						$customers["$paymentMethod->name"]['amount']	+= floatval($value->amount) / floatval($value->rate);
						 // days

						$customers["$paymentMethod->name"]['transactions'][] = array(
							'id' => $value->id,
							'type' => $value->type,
							'date' => $value->issued_date,
							'number' => $value->number,
							'memo' => $value->memo2,
							'amount' => floatval($value->amount) / floatval($value->rate)
						);
					} else {
						$customers["$paymentMethod->name"]['amount']	= floatval($value->amount) / floatval($value->rate);
						$tmp = array();
						foreach ($cr as $recipt){ 
							$tmp[] = array(
								'date' => $recipt->issued_date,
								'number' => $recipt->number,
								'type' => $recipt->type,
								'amount' => floatval($recipt->amount) / floatval($recipt->rate)
								);
						}

						$customers["$paymentMethod->name"]['transactions'][] = array(
							'id' => $value->id,
							'type' => $value->type,
							'date' => $value->issued_date,
							'number' => $value->number,
							'memo' => $value->memo2,
							'amount' => floatval($value->amount) / floatval($value->rate),
						);
				//Results
					}
					$total += floatval($value->amount)/ floatval($value->rate);
				}
			}
		}	
		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'group' 	=> $key,
				'amount'	=> $value['amount'],
				'items' 	=> $value['transactions'],
				'cr' 		=> $tmp
			);
		}
		$data['total'] = $total;
		$data['totalInvoice'] = $totalInvoice;
		$data['count'] = count($customers);
		//Response Data
		$this->response($data, 200);
	}

	function statement1_get() {
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
		$obj->where_in("type", array("Invoice", "Cash_Sale", "Sale_Return", "Cash_Receipt", "Commercial_Invoice", "Vat_Invoice", "Commercial_Cash_Sale", "Vat_Cash_Sale"));
		$obj->where('is_recurring', 0);

		// $obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		$customers = array();
		$total = 0;
		$underThirty = 0;
		$thirty = 0;
		$sixty = 0;
		$ninety = 0;
		$overNinety = 0;
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$customer = $value->contact->get();
				$fullname = $customer->surname.' '.$customer->name;
				$items = $value->item_line->include_related('item', array('name'))->get();

				$today = new DateTime();
				$dueDate = new DateTime($value->due_date);
				$diff = $today->diff($dueDate)->format("%a");
				$dr = 0;
				$cr = 0;
				if($value->type == "Invoice" || $value->type == "Cash_Sale") {
					$dr = floatval($value->amount) / floatval($value->rate);
				} else {
					$cr = floatval($value->amount) / floatval($value->rate);
				}
				if(isset($customers["$fullname"])) {
					$customers["$fullname"]['amount']	+= floatval($value->amount) / floatval($value->rate);
					
					$customers["$fullname"]['transactions'][] = array(
						'type' => $value->type,
						'date' => $value->issued_date,
						'number' => $value->number,
						'due_date' => $value->due_date,
						'dr' => $dr,
						'cr' => $cr,
						'memo' => $value->memo2
					);
				} else {
					$customers["$fullname"]['amount']	= floatval($value->amount) / floatval($value->rate);
			
					$customers["$fullname"]['transactions'][] = array(
						'type' => $value->type,
						'date' => $value->issued_date,
						'number' => $value->number,
						'due_date' => $value->due_date,
						'dr' => $dr,
						'cr' => $cr,
						'memo' => $value->memo2
					);
			//Results
				}
				if($dueDate<$today){
					if(intval($diff)>90){
						$overNinety+= floatval($value->amount) / floatval($value->rate);
					}else if(intval($diff)>60){
						$ninety += floatval($value->amount) / floatval($value->rate);
					}else if(intval($diff)>30){
						$sixty += floatval($value->amount) / floatval($value->rate);
					}else{
						$thirty += floatval($value->amount) / floatval($value->rate);
					}
				}else{
					$underThirty += floatval($value->amount) / floatval($value->rate);
				}
				$total += floatval($value->amount)/ floatval($value->rate);
			}
		}
		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'group' 	=> $key,
				'amount'	=> $value['amount'],
				'items' => $value['transactions']
			);
		}
		$data['total'] = $total;
		$data['count'] = count($customers);
		$data['underThirty'] = $underThirty;
		$data['thirty'] = $thirty;
		$data['sixty'] = $sixty;
		$data['ninety'] = $ninety;
		$data['overNinety'] = $overNinety;
		//Response Data
		$this->response($data, 200);
	}

	function sale_order_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Filter
		if(!empty($filters) && isset($filters)){
	    	foreach ($filters as $value) {
	    		if(!empty($value["operator"]) && isset($value["operator"])){
		    		if($value["operator"]=="where_in"){
		    			$obj->where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_in"){
		    			$obj->or_where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="where_not_in"){
		    			$obj->where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_not_in"){
		    			$obj->or_where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="like"){
		    			$obj->like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_like"){
		    			$obj->or_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="not_like"){
		    			$obj->not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_not_like"){
		    			$obj->or_not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="startswith"){
		    			$obj->like($value["field"], $value["value"], "after");
		    		}else if($value["operator"]=="endswith"){
		    			$obj->like($value["field"], $value["value"], "before");
		    		}else if($value["operator"]=="contains"){
		    			$obj->like($value["field"], $value["value"], "both");
		    		}else if($value["operator"]=="or_where"){
		    			$obj->or_where($value["field"], $value["value"]);		    		
		    		}else{
		    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
		    		}
	    		}else{
	    			$obj->where($value["field"], $value["value"]);
	    		}
			}
		}

		if($filters['logic'] == "segment") {
			$segmentItem = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		
			$segmentItem->get();

			foreach ($segmentItem as $seg) {
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

				$txn->where("type", "Sale_Order");
				$txn->where_in("status", array(0,2));
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted",0);
				$txn->where("is_recurring",0);
			
				$txn->get_iterated();

				foreach ($txn as $t) {
					$amt = floatval($t->amount)/ floatval($t->rate);
					$items = $t->item_line->include_related('item', array('name'))->get();
					$customer=$value->contact->get();
					$lines = array();
					foreach($items as $item) {
						$lines[] = array(
							'customer' => $customer->name,
							'SO'	   => $t->number,
							'item' => $item->item_name,
							'memo' => $t->memo,
							'date' => $t->date,
							'qty'  => $item->quantity,
							'price'=> $item->price,
							'amount'=> floatval($item->amount)/floatval($t->rate)
						);
					}
					$total += $amt;
				}
			}
		} else {
			// $obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');



			// $type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
			// $type->where('parent_id', 1)->get();

			// $obj->where_related("contact", 'contact_type_id', $type);
			$obj->where('is_recurring', 0);
			$obj->where("type", "Sale_Order");
			$obj->where_in("status", array(0,2));

			//Results
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
			$products = array();
			$total = 0;
			$order = 0;
			$totalQty = 0;
			$customers = array();
			if($obj->result_count()>0){
				foreach ($obj as $value) {
					$items = $value->item_line->include_related('item', array('name'))->get();
					$customer=$value->contact->get();
					foreach($items as $item) {
						$data['results'][] = array(
							'id' => $value->id,
							'type' => $value->type,
							'customer' => $customer->name,
							'SO'	   => $value->number,
							'item' => $item->item_name,
							'memo' => $value->memo,
							'date' => $value->issued_date,
							'qty'  => $item->quantity,
							'price'=> floatval($item->price),
							'amount'=> floatval($item->amount)/floatval($value->rate)
						);
						if(isset($products["$item->item_name"])) {
							
						} else {
							$products["$item->item_name"] = array();
						}
						$totalQty += $item->quantity;
					}
					if(isset($customers["$customer->id"])) {
						
					} else {
						$customers["$customer->id"] = array();
					}
					$order++;
					$total += floatval($value->amount)/ floatval($value->rate);
					
				}
			}
		}

		$data['total'] = $total;
		$data['totalQty'] = $totalQty;
		$data['customer'] = count($customers);
		$data['order'] = $order;
		$data['count'] = count($products);
		//Response Data
		$this->response($data, 200);
	}

	function over_view_get() {
		$filters 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;			
		$customers = array();
		$total =0;
		$totalSale =0;
		$deposit =0;
		$order =0;
		$saleOrder =0;
		$customerCount =0;
		$customerBalance =0;
		$openInvoice =0;
		$balanceCustomer =0;
		$overDate =0;
		$items = 0;

		// checked if the logic is customer or segment
		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$type->select('id')->where('parent_id', 1)->get();
			$types = array();
			foreach($type as $t) {
				$types[] = $t->id;
			}

		$customer = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$customer->where('deleted <>', 1);
		$customer->where('is_pattern <>', 1);
		$customerCount = $customer->where_in('contact_type_id', $type)->count();
		// Segment
		if($filters['logic'] == "segment") {
			$segmentItem = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$segmentItem->get();

			foreach ($segmentItem as $seg) {
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

				$txn->where_in("type", array("Invoice", "Commercial_Invoice", "Vat_Invoice"));
				$txn->where_in("status", array(0,2));
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted",0);
				$txn->where("is_recurring",0);
				$txn->get_iterated();

				foreach ($txn as $t) {
					$ref = $t->referece->get();
					$amt = floatval($t->amount)/ floatval($t->rate);

					if(isset($customers["$seg->name"])) {
						$customers["$seg->name"]['amount']+= $amt;
					} else {
						$customers["$seg->name"]['amount']= $amt;
					}
					$total += $amt;
				}
			}
		} else {
			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->where('parent_id', 1)->get();

			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where_related("contact", 'contact_type_id', $type);
			$obj->where('is_recurring', 0);
			$obj->where_in("type", array("Invoice", "Cash_Sale", "Commercial_Invoice", "Vat_Invoice", "Commercial_Cash_Sale", "Vat_Cash_Sale"));
			$obj->where_in("status", array(0,2));
			// $obj->include_related("contact_type", "name");

			//Results
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
			
			if($obj->result_count()>0){	
				foreach ($obj as $value) {
					$today = new DateTime();
					$dueDate = new DateTime($value->due_date);
					$customer = $value->contact->get();
					$fullname = $customer->surname.' '.$customer->name;
					$temp = 0;

					if(isset($customers["$fullname"])) {
						$customers["$fullname"]['amount']+= (floatval($value->amount)/ floatval($value->rate));
					} else {
						$customers["$fullname"]['amount'] = (floatval($value->amount)/ floatval($value->rate));
					}
					$totalSale += floatval($value->amount)/ floatval($value->rate);
					// if($ref->type == "Deposit" ) {
					// 	$deposit +=  floatval($value->amount)/ floatval($value->rate);
					// }
					$total = $totalSale;
					if($value->type == "Cash_Sale") {
						if($value->status != 1) {
							$order += 1;
						}else{
							$saleOrder += 1;
						}						
					}
					if($value->type == "Invoice") {
						if($value->status != 1) {
							$customerBalance += floatval($value->amount)/ floatval($value->rate);
						}						
					}
					if($value->type == "Invoice") {
						if($value->status ==2) {
							$openInvoice += 1;
						}						
					}
					if($value->type == "Invoice") {
						if($dueDate<$today) {
							$overDate += 1;
						}						
					}

				}
			}
		}

				

		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'customer' => $key,
				'amount'	=> $value['amount']
			);
		}

		// Response Data
		$data['total'] = $total;
		$data['overDate'] = $overDate;
		$data['order'] = $order;
		$data['balanceCustomer'] = count($customers);
		$data['openInvoice'] = $openInvoice;
		$data['customerBalance'] = $customerBalance;
		$data['saleOrder'] = $saleOrder;
		$data['customerCount'] = $customerCount;
		$this->response($data, 200);
	}

}//End Of Class
