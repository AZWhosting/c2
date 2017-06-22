<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Vendorreports extends REST_Controller {
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
	//EXPENSE AND PURCHASE BY SUPPLIER
	function expense_summary_by_supplier_get() {
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
		$obj->where_in("type", array("Credit_Purchase","Cash_Purchase", "Purchase_Return"));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {								
				$amount = $value->type =="Purchase_Return"?floatval($value->amount)/floatval($value->rate)*-1:floatval($value->amount)/floatval($value->rate);
				$crPurchase = 0;
				$cashPurchase = 0;
				if($value->type=="Credit_Purchase"){
					$crPurchase++;
				}else if ($value->type=="Cash_Purchase"){
					$cashPurchase++;
				}

				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["credit_purchase"] += $crPurchase;
					$objList[$value->contact_id]["cash_purchase"] 	+= $cashPurchase;
					$objList[$value->contact_id]["amount"] 			+= $amount;
				}else{
					$objList[$value->contact_id]["id"] 				= $value->contact_id;
					$objList[$value->contact_id]["name"] 			= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["credit_purchase"]	= $crPurchase;
					$objList[$value->contact_id]["cash_purchase"]	= $cashPurchase;
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
	function expense_detail_by_supplier_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$total  = 0;

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
		$obj->where_in("type", array("Credit_Purchase","Cash_Purchase", "Purchase_Return"));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {								
				$amount = $value->type =="Purchase_Return"?floatval($value->amount)/floatval($value->rate)*-1:floatval($value->amount)/floatval($value->rate);
				
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
				$total += $amount;
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
			$data['total'] = $total;
		}

		//Response Data
		$this->response($data, 200);
	}

	//SUPPLIER TRANSACTION LIST
	function transaction_vendor_get() {
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
		$obj->where_in("type", array("Purchase_Order", "GRN", "Cash_Purchase", "Credit_Purchase", "Purchase_Return", "Vendor_Deposit","Debit_Note", "Cash_Payment"));
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
				
				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["line"][] = array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"number" 			=> $value->number,
						"issued_date" 		=> $value->issued_date,
						"rate" 				=> $value->rate,
						"amount" 			=> $value->amount,
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
						"amount" 			=> $value->amount,
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

	//DEPOSIT DETAIL BY SUPPLIER
	function deposit_detail_by_supplier_get() {
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
		$obj->where("type", "Vendor_Deposit");
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

	//OPEN PURCHASE ORDER LIST
	function purchase_order_list_get() {
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
		$obj->where("type", "Purchase_Order");
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				$amount = floatval($value->amount) / floatval($value->rate);
				
				//Reference
				$ref = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$ref->where_in("type", array("Credit_Purchase","Cash_Purchase"));
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

	//PURCHASE AND EXPENSE BY PRODUCT
	function purchase_summary_by_product_get() {
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
		$obj->where_in_related("transaction", "type", array("Credit_Purchase","Cash_Purchase"));
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
				$value["avg_price"] = $value["amount"] / $value["quantity"];
				$value["avg_cost"] = $value["cost"] / $value["quantity"];

				$gp = ($value["quantity"] * $value["price"]) - ($value["quantity"] * $value["cost"]);
				$db = $value["quantity"] * $value["price"];
				$value["gpm"] = $db >0?$gp / $db: 0;

				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}
	function purchase_detail_by_product_get() {
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
		$obj->where_in_related("transaction", "type", array("Credit_Purchase","Cash_Purchase"));
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->include_related('transaction/contact', array("abbr", "number", "name"));
		$obj->order_by_related("transaction", "issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				$amount = floatval($value->amount) / floatval($value->transaction_rate);
				$total = (floatval($value->transaction_amount) - floatval($value->transaction_deposit)) / floatval($value->transaction_rate);
								
				if(isset($objList[$value->item_id])){
					$objList[$value->item_id]["line"][]		= array(
						"id" 			=> $value->transaction_id,
						"supplier"		=> $value->transaction_contact_name,
						"type" 			=> $value->transaction_type,
						"number" 		=> $value->transaction_number,
						"issued_date" 	=> $value->transaction_issued_date,
						"quantity" 		=> $value->quantity,
						"measurement"	=> $value->measurement_name,
						"price" 		=> $value->price,
						"amount" 		=> $amount,
						"total" 		=> $total
					);
				}else{
					$objList[$value->item_id]["id"] 		= $value->item_id;
					$objList[$value->item_id]["name"] 		= $value->item_abbr.$value->item_number." ".$value->item_name;
					$objList[$value->item_id]["line"][]		= array(
						"id" 			=> $value->transaction_id,
						"supplier"		=>$value->transaction_contact_name,
						"type" 			=> $value->transaction_type,
						"number" 		=> $value->transaction_number,
						"issued_date" 	=> $value->transaction_issued_date,
						"quantity" 		=> $value->quantity,
						"measurement"	=> $value->measurement_name,
						"price" 		=> $value->price,
						"amount" 		=> $amount,
						"total" 		=> $total
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

	//SUPPLIER BALANCE
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
		$obj->where("type", "Credit_Purchase");
		$obj->where_in("status", array(0,2));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			$today = new DateTime();
			foreach ($obj as $value) {
				$amount = floatval($value->amount)/ floatval($value->rate);
				
				if($value->status=="2"){
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$paid->select_sum("amount");
					$paid->select_sum("discount");
					$paid->where("reference_id", $value->id);
					$paid->where_in("type", array("Cash_Payment", "Offset_Bill"));
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
		$obj->where("type", "Credit_Purchase");
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
					$paid->where_in("type", array("Cash_Payment", "Offset_Bill"));
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

	//PAYABLES AGING SUPPLIER
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
		$obj->where("type", "Credit_Purchase");
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
					$paid->where_in("type", array("Cash_Payment", "Offset_Bill"));
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
		$obj->where("type", "Credit_Purchase");
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
					$paid->where_in("type", array("Cash_Payment", "Offset_Bill"));
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

	//COLLECT BILL
	function bill_topay_get() {
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
		$obj->where("type", "Credit_Purchase");
		$obj->where_in("status", array(0,2));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->get_iterated();
		
		if($obj->exists()){
			foreach ($obj as $value) {
				$amount = (floatval($value->amount) - floatval($value->deposit)) / floatval($value->rate);

				if($value->status=="2"){
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$paid->select_sum("amount");
					$paid->select_sum("discount");
					$paid->where("reference_id", $value->id);
					$paid->where_in("type", array("Cash_Payment", "Offset_Bill"));
					$paid->where("is_recurring <>",1);
					$paid->where("deleted <>",1);
					$paid->get();
					$amount -= floatval($paid->amount) + floatval($paid->discount);
				}
				
				$data["results"][] = array(
					"id" 				=> $value->id,
					"name" 				=> $value->contact_abbr.$value->contact_number." ".$value->contact_name,
					"type" 				=> $value->type,
					"number" 			=> $value->number,
					"issued_date" 		=> $value->issued_date,
					"due_date" 			=> $value->due_date,
					"status"			=> $value->status,
					"rate" 				=> $value->rate,
					"amount" 			=> $amount
				);
			}

			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}
	function bill_list_get() {
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
		$obj->where("type", "Credit_Purchase");
		$obj->where_in("status", array(1,2));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				//Payments
				$payments = [];				
				$pmt = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);				
				$pmt->where("reference_id", $value->id);
				$pmt->where_in("type", array("Cash_Payment", "Offset_Bill"));
				$pmt->where("is_recurring <>",1);
				$pmt->where("deleted <>",1);
				$pmt->get_iterated();
				if($pmt->exists()){
					foreach ($pmt as $val) {
						$payments[] = array(
							"id" 				=> $val->id,
							"type" 				=> $val->type,
							"number" 			=> $val->number,
							"issued_date" 		=> $val->issued_date,
							"rate" 				=> $val->rate,
							"amount" 			=> floatval($val->amount) + floatval($val->discount)
						);
					}
				}
								
				$amount = (floatval($value->amount) - floatval($value->deposit)) / floatval($value->rate);

				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["line"][] = array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"number" 			=> $value->number,
						"issued_date" 		=> $value->issued_date,
						"rate" 				=> $value->rate,
						"amount" 			=> $amount,
						"payments" 			=> $payments
					);
				}else{
					$objList[$value->contact_id]["id"] 		= $value->contact_id;
					$objList[$value->contact_id]["name"] 	= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["line"][] 	= array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"number" 			=> $value->number,
						"issued_date" 		=> $value->issued_date,
						"rate" 				=> $value->rate,
						"amount" 			=> $amount,
						"payments" 			=> $payments
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


	// item or service classified as list

	function sale_job_get() {
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
		$saleNumber = 0;

		if($filters['logic'] == "segment") {
			$segmentItem = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			if(isset($filters['filters'])) {
				foreach($filters['filters'] as $f) {
					$segmentItem->where($f['field'], $f['value']);
				}
			}
			$segmentItem->get();

			foreach ($segmentItem as $seg) {
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

				$txn->where_in("type", array("Expense", "Purchase"));
				$txn->where_in("status", array(0,2));
				$txn->where('job_id <> ', 0);
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted", 0);
				$txn->where("is_recurring",0);
				$txn->get_iterated();
				if($txn->exists()) {
					foreach ($txn as $t) {
						$job = $t->job->get();

						if(isset($customers["$job->name"])) {
							$customers["$job->name"]['amount'] += floatval($t->amount);
							$customers["$job->name"]['transactions'][] = array(
								'type'  	=> $t->type,
								'date' 		=> $t->issued_date,
								'number' 	=> $t->number,
								'memo' 		=> $t->memo2,
								'segments'=> array('id'=>$segment->id, 'code' => $segment->code),
								'amount' 	=> floatval($t->amount)/floatval($t->rate)
							);
						} else {
							$customers["$job->name"]['amount'] += floatval($t->amount);
							$customers["$job->name"]['transactions'][] = array(
								'type'  	=> $t->type,
								'date' 		=> $t->issued_date,
								'number' 	=> $t->number,
								'memo' 		=> $t->memo2,
								'segments'=> array('id'=>$segment->id, 'code' => $segment->code),
								'amount' 	=> floatval($t->amount)/floatval($t->rate)
							);
						}
						$total += floatval($t->amount)/ floatval($t->rate);
						$saleNumber++;
					}
				}	
			}
		} else {
			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->where('parent_id', 1)->get();

			$obj->where_related("contact", 'contact_type_id', $type);
			$obj->where_in("type", array("Expense", "Purchase"));
			$obj->where('job_id <>', 0);
			$obj->where('is_recurring', 0);

			if(isset($filters['filters'])) {
				foreach($filters['filters'] as $f) {
					$obj->where($f['field'], $f['value']);
				}
			}

			//Results
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
			
			if($obj->result_count()>0){
				foreach ($obj as $value) {
					$customer = $value->contact->get();
					$fullname = $customer->surname.' '.$customer->name;
					$job = $value->job->get();
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
					}
					$total += floatval($value->amount)/ floatval($value->rate);
					$saleNumber++;
				}
			}
		}
		if(count($customers) > 0) {
			foreach ($customers as $key => $value) {
				$data["results"][] = array(
					'group' 	=> $key,
					'amount'	=> $value['amount'],
					'items' 	=> $value['transactions']

				);
			}
		} else {
			$data["results"][] = array();
		}
		
		$data['total'] = $total;
		$data['count'] = count($customers);
		$data['saleNumber'] = $saleNumber;
		//Response Data
		$this->response($data, 200);
	}

	function billPaid_get() {
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
		$numberPayment = 0;

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
			if(isset($filters['filters'])) {
				foreach($filters['filters'] as $f) {
					$segmentItem->where($f['field'], $f['value']);
				}
			}
			$segmentItem->get();

			foreach ($segmentItem as $seg) {
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

				$txn->where_in("type", array("Credit_Purchase", "Cash_Purchase"));
				$txn->where_in("status", array(0,2));
				// $txn->where('job_id <> ' 0);
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted", 0);
				$txn->where("is_recurring",0);
				$txn->get_iterated();
				if($txn->exists()) {
					foreach ($txn as $t) {
						$numberPayment += 1;
						$paymentMethod = $t->payment_method->get();

						if(isset($customers["$paymentMethod->name"])) {
							$customers["$paymentMethod->name"]['amount']	+= floatval($t->amount) / floatval($t->rate);
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
							$customers["$paymentMethod->name"]['amount']	= floatval($t->amount) / floatval($t->rate);
							$customers["$paymentMethod->name"]['transactions'][] = array(
								'id' => $t->id,
								'type' => $t->type,
								'date' => $t->issued_date,
								'number' => $t->number,
								'memo' => $t->memo2,
								'amount' => floatval($t->amount) / floatval($t->rate)
							);
					//Results
						}
						$total += floatval($t->amount)/ floatval($t->rate);
					}
				}	
			}
		} else {

			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->select('id')->where('parent_id', 2)->get();
			$types = array();
			foreach($type as $t) {
				$types[] = $t->id;
			}

			$obj->where_in_related("contact", 'contact_type_id', $type);
			$obj->where_in("type", array("Credit_Purchase", "Cash_Purchase"));
			$obj->where_in('status', array(1, 2));
			$obj->where('is_recurring', 0);
			$obj->where("deleted", 0);

			if(isset($filters['filters'])) {
				foreach($filters['filters'] as $f) {
					$obj->where($f['field'], $f['value']);
				}
			}

			//Results
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
			
			if($obj->result_count()>0){
				foreach ($obj as $value) {
					$numberPayment += 1;
					$paymentMethod = $value->payment_method->get();

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
						$customers["$paymentMethod->name"]['transactions'][] = array(
							'id' => $value->id,
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
		}
		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'group' 	=> $key,
				'amount'	=> $value['amount'],
				'items' => $value['transactions']
			);
		}
		$data['total'] = $total;
		$data['numberPayment'] = $numberPayment;
		$data['count'] = count($customers);
		//Response Data
		$this->response($data, 200);
	}

	function purchase_job_get() {
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
		$type->select('id')->where('parent_id', 2)->get();
			$types = array();
			foreach($type as $t) {
				$types[] = $t->id;
			}

		$obj->where_in_related("contact", 'contact_type_id', $type);
		$obj->where_in("type", array("Cash_Purchase", "Credit_Purchase", "Deposit"));
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
				$amount = $value->type =="Purchase_Return"?floatval($value->amount)/floatval($value->rate)*-1:floatval($value->amount)/floatval($value->rate);
				$job = $value->job->get();
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

				if(isset($customers["$fullname"])) {
					$customers["$fullname"]['amount'] += floatval($value->amount);
					$customers["$fullname"]['transactions'][] = array(
						'id'  		=> $value->id,
						'job'		=> $job->name,
						'type'  	=> $value->type,
						'date' 		=> $value->issued_date,
						'number' 	=> $value->number,
						'memo' 		=> $value->memo2,
						'segments'=> $segments,
						'amount' 	=> $amount
					);
				} else {
					$customers["$fullname"]['amount'] = floatval($value->amount);
					$customers["$fullname"]['transactions'][] = array(
						'id'  		=> $value->id,
						'job'		=> $job->name,
						'type'  	=> $value->type,
						'date' 		=> $value->issued_date,
						'number' 	=> $value->number,
						'memo' 		=> $value->memo2,
						'segments'	=> $segments,
						'amount' 	=> $amount
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

	function supplier_get() {		
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
		$obj->where_in("contact_type_id", array(6,7));
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

	

}//End Of Class
