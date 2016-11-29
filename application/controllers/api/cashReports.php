<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Cashreports extends REST_Controller {
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
			
		//Fiscal Date
			$today = date("Y-m-d");
			$fdate = date("Y") ."-". $institute->fiscal_date;
			if($today > $fdate){
				$this->startFiscalDate 	= date("Y") ."-". $institute->fiscal_date;
				$this->endFiscalDate 	= date("Y",strtotime("+1 year")) ."-". $institute->fiscal_date;
			}else{
				$this->startFiscalDate 	= date("Y",strtotime("-1 year")) ."-". $institute->fiscal_date;
				$this->endFiscalDate 	= date("Y") ."-". $institute->fiscal_date;
			}
		}
	}

	function cash_position_get() {
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
		$totalQOH = 0;
		$totalPO =0;
		$totalSO =0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->where_in( 'type', array("Cash_Sale", "Cash_Receipt"));
		$obj->where('is_recurring <>', 1);
		$obj->where('deleted <>', 1);
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

		// $obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		// $obj->where("item_type_id", 1);
		// $obj->where('is_pattern', 0);

		// $obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$po = 0;
				$so = 0;
				$items = $value->item_line->get();
				foreach ($items as $item) {
					$inventory = $item->item->get();
					

					if(isset($temp["$inventory->id"])) {
						if($value->type == "Purchase_Order") {
							isset($temp["$inventory->id"]['po']) ? $temp["$inventory->id"]['po'] += $item->quantity : $temp["$inventory->id"]['po'] = $item->quantity;
						} else {
							isset($temp["$inventory->id"]['so']) ? $temp["$inventory->id"]['so'] += $item->quantity : $temp["$inventory->id"]['so'] = $item->quantity;
						}
					} else {
						$in = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$in->select_sum('quantity');						
						$in->where_in_related("transaction", "type", array("Cash_Purchase", "Credit_Purchase", "Item_Adjustment"));
						$in->where_related("transaction", "is_recurring", 0);
						$in->where_related("transaction", "deleted", 0);
						$in->where('item_id', $item->item_id);
						$in->where('movement', 1);
						$in->get();

						$out = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$out->select_sum('quantity');
						$out->where_in_related("transaction", "type", array("Invoice", "Cash_Sale", "Item_Adjustment"));
						$out->where_related("transaction", "is_recurring", 0);
						$out->where_related("transaction", "deleted", 0);
						$out->where('item_id', $item->item_id);
						$out->where('movement', -1);
						$out->get();

						

						if($value->type == "Purchase_Order") {
							$temp["$inventory->id"]['po'] = $item->quantity;
						} else {
							$temp["$inventory->id"]['so'] = $item->quantity;
						}
						$temp["$inventory->id"]['name'] = $inventory->name;
						$temp["$inventory->id"]['cost'] = floatval($inventory->cost);
						$temp["$inventory->id"]['price'] = floatval($inventory->price);
						$temp["$inventory->id"]['onHand'] = $in->quantity - $out->quantity;
						$temp["$inventory->id"]['currency_code'] = $inventory->locale;

						$onHand +=  $in->quantity - $out->quantity;
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
				'po'		=> isset($value['po'])? $value['po'] : 0,
			);

		}
		

		// Response Data
		$data['onHand'] = $onHand;
		$data['count'] = count($temp);
		$this->response($data, 200); 
	}
	
}//End Of Class
