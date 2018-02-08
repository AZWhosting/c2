<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Item_assemblies extends REST_Controller {
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

		$obj = new Item_assembly(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
		if(!empty($filter['filters']) && isset($filter['filters'])){
	    	foreach ($filter['filters'] as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
					$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->include_related("item", array("item_type_id","abbr","number","name","cost","price","locale","purchase_description","sale_description","income_account_id","expense_account_id","inventory_account_id","nature"));
		$obj->include_related("measurement", array("name"));

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
				//Cost
				$purchaseList = array("Cash_Purchase","Credit_Purchase", "Sale_Return","Cash_Refund");
				$saleList = array("Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale","Purchase_Return","Payment_Refund");
				$inventoryList = array("Item_Adjustment","Internal_Usage");
				
				$unitOnHand = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$purchases = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$additionalCosts = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$costOfSales = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$inventoryCosts = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$zeroQty = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				
				//Filter
    			$unitOnHand->where("item_id", $value->item_id);
    			$purchases->where("item_id", $value->item_id);
    			$additionalCosts->where("item_id", $value->item_id);
    			$costOfSales->where("item_id", $value->item_id);
    			$inventoryCosts->where("item_id", $value->item_id);
    			$zeroQty->where("item_id", $value->item_id);

				$unitOnHand->select_sum("quantity * conversion_ratio * movement", "total");
				$unitOnHand->where_related("transaction", "is_recurring <>", 1);
				$unitOnHand->where_related("transaction", "deleted <>", 1);
				$unitOnHand->where("movement <>", 0);
				$unitOnHand->where("deleted <>", 1);
				$unitOnHand->get();
				
				$purchases->select_sum("(quantity * conversion_ratio * cost) + item_lines.additional_cost + inventory_adjust_value", "total");
				$purchases->where_in_related("transaction", "type", $purchaseList);
				$purchases->where_related("transaction", "is_recurring <>", 1);
				$purchases->where_related("transaction", "deleted <>", 1);
				$purchases->where("deleted <>", 1);
				$purchases->get();

				$costOfSales->select_sum("(quantity * conversion_ratio * cost) + inventory_adjust_value", "total");
				$costOfSales->where_in_related("transaction", "type", $saleList);
				$costOfSales->where_related("transaction", "is_recurring <>", 1);
				$costOfSales->where_related("transaction", "deleted <>", 1);
				$costOfSales->where("deleted <>", 1);
				$costOfSales->get();

				$inventoryCosts->select_sum("(quantity * conversion_ratio * movement * cost) + inventory_adjust_value", "total");
				$inventoryCosts->where_in_related("transaction", "type", $inventoryList);
				$inventoryCosts->where_related("transaction", "is_recurring <>", 1);
				$inventoryCosts->where_related("transaction", "deleted <>", 1);
				$inventoryCosts->where("movement <>", 0);
				$inventoryCosts->where("deleted <>", 1);
				$inventoryCosts->get();

				//Inventory Total Cost
				$inventoryTotalCost = floatval($purchases->total) - floatval($costOfSales->total) + floatval($inventoryCosts->total);

				$cost = 0;
				if(floatval($unitOnHand->total)==0){
					$zeroQty->where_in_related("transaction", "type", $saleList);
					$zeroQty->where_related("transaction", "is_recurring <>", 1);
					$zeroQty->where_related("transaction", "deleted <>", 1);
					$zeroQty->where("deleted <>", 1);
					$zeroQty->order_by_related("transaction", "issued_date", "DESC");
					$zeroQty->limit(1);
					$zeroQty->get();

					if($zeroQty->exists()){
						$cost = floatval($zeroQty->cost) / floatval($zeroQty->rate);
					}
				}else{
					$cost = $inventoryTotalCost / floatval($unitOnHand->total);
				}

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
					"purchase_description"	=> $value->item_purchase_description,
					"sale_description"		=> $value->item_sale_description,
					"income_account_id"		=> $value->item_income_account_id, 
					"expense_account_id" 	=> $value->item_expense_account_id, 
					"inventory_account_id" 	=> $value->item_inventory_account_id
				);
				
				//Measurement
				$measurement = array(
					"id" 				=> $value->measurement_id,
					"name"				=> $value->measurement_name ? $value->measurement_name : "",
					"measurement_id" 	=> $value->measurement_id,
					"measurement"		=> $value->measurement_name ? $value->measurement_name : ""
				);

				//Conversion ratio
				$conversion_ratio = 1;
				$itemPrices = new Item_price(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$itemPrices->where("item_id", $value->item_id);
				$itemPrices->where("measurement_id", $value->measurement_id);
				$itemPrices->limit(1);
				$itemPrices->get();
				if($itemPrices->exists()){
					$conversion_ratio = $itemPrices->conversion_ratio;
				}

				//Results				
				$data["results"][] = array(
					"id" 				=> $value->id,					
					"assembly_id" 		=> $value->assembly_id,
					"item_id" 			=> $value->item_id,
					"cost" 				=> $cost,
					"quantity" 			=> $value->quantity,
					"measurement_id"	=> $value->measurement_id,
					"conversion_ratio"	=> $conversion_ratio,

					"item" 				=> $item,
					"measurement" 		=> $measurement
				);
			}
		}

		//Response Data		
		$this->response($data, 200);		
	}
	
	//POST
	function index_post() {
		$models = json_decode($this->post('models'));

		foreach ($models as $value) {
			$obj = new Item_assembly(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
			
			isset($value->assembly_id) 		? $obj->assembly_id 	= $value->assembly_id : "";
			isset($value->item_id) 			? $obj->item_id 		= $value->item_id : "";
			isset($value->quantity) 		? $obj->quantity 		= $value->quantity : "";
			isset($value->measurement_id) 	? $obj->measurement_id 	= $value->measurement_id : "";
			
			//Measurement
			if(isset($value->measurement)){
				$obj->measurement_id = $value->measurement->id;
			}

			if($obj->save()){
				$data["results"][] = array(
					"id" 				=> $obj->id,					
					"assembly_id" 		=> $obj->assembly_id,
					"item_id" 			=> $obj->item_id,
					"quantity" 			=> $obj->quantity,
					"measurement_id"	=> $obj->measurement_id
				);
			}
		}
		$data["count"] = count($data["results"]);
		
		$this->response($data, 201);						
	}

	//PUT
	function index_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;

		foreach ($models as $value) {			
			$obj = new Item_assembly(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			isset($value->assembly_id) 		? $obj->assembly_id 	= $value->assembly_id : "";
			isset($value->item_id) 			? $obj->item_id 		= $value->item_id : "";
			isset($value->quantity) 		? $obj->quantity 		= $value->quantity : "";
			isset($value->measurement_id) 	? $obj->measurement_id 	= $value->measurement_id : "";

			if($obj->save()){				
				$data["results"][] = array(
					"id" 				=> $obj->id,					
					"assembly_id" 		=> $obj->assembly_id,
					"item_id" 			=> $obj->item_id,
					"quantity" 			=> $obj->quantity,
					"measurement_id"	=> $obj->measurement_id
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
			$obj = new Item_assembly(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
/* End of file categories.php */
/* Location: ./application/controllers/api/categories.php */