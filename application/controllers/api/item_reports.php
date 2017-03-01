<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Item_reports extends REST_Controller {
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

	//POSITION SUMMARY BY DAWINE
	function position_summary_get() {
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
	    	foreach ($filter['filters'] as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->include_related("item", array("abbr", "number", "name"));
		$obj->include_related("transaction", array("type","rate"));
		$obj->where_in_related("transaction", "type", array("Purchase_Order", "Sale_Order", "Cash_Purchase", "Credit_Purchase", "Purchase_Return", "Payment_Refund", "Commercial_Invoice", "Vat_Invoice", "Invoice", "Commercial_Cash_Sale", "Vat_Cash_Sale", "Cash_Sale", "Sale_Return", "Cash_Refund", "Item_Adjustment", "Internal_Usage"));
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where_related("item", "item_type_id", 1);
		$obj->order_by_related("item", "number", "asc");

		//Results
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				$qoh = 0;
				$po = 0;
				$so	= 0;
				$purchaseQty = 0;
				$purchaseAmount = 0;
				$saleQty = 0;				
				$saleAmount = 0;

				$quantity = floatval($value->quantity) * floatval($value->unit_value) * intval($value->movement);
				
				if($value->transaction_type==="Purchase_Order"){
					$po = $quantity;
				}else if($value->transaction_type==="Sale_Order"){
					$so = $quantity;
				}else{
					$qoh = $quantity;

					if(intval($value->movement)>0){
						$purchaseQty = $quantity;
						$purchaseAmount = ($quantity * floatval($value->cost)) / floatval($value->transaction_rate);
					}else{
						$saleQty = abs($quantity);
						$saleAmount = ($saleQty * floatval($value->price)) / floatval($value->transaction_rate);
					}
				}

				if(isset($objList[$value->item_id])){
					$objList[$value->item_id]["qoh"] 			+= $qoh;
					$objList[$value->item_id]["po"] 			+= $po;
					$objList[$value->item_id]["so"] 			+= $so;
					$objList[$value->item_id]["purchaseQty"] 	+= $purchaseQty;
					$objList[$value->item_id]["purchaseAmount"] += $purchaseAmount;
					$objList[$value->item_id]["saleQty"] 		+= $saleQty;
					$objList[$value->item_id]["saleAmount"] 	+= $saleAmount;
				}else{
					$objList[$value->item_id]["id"] 			= $value->item_id;
					$objList[$value->item_id]["name"] 			= $value->item_abbr . $value->item_number ." ". $value->item_name;					
					$objList[$value->item_id]["qoh"] 			= $qoh;
					$objList[$value->item_id]["po"] 			= $po;
					$objList[$value->item_id]["so"] 			= $so;
					$objList[$value->item_id]["purchaseQty"] 	= $purchaseQty;
					$objList[$value->item_id]["purchaseAmount"] = $purchaseAmount;
					$objList[$value->item_id]["saleQty"] 		= $saleQty;
					$objList[$value->item_id]["saleAmount"] 	= $saleAmount;
				}
			}

			foreach ($objList as $value) {
				$avgPrice = 0;
				$avgCost = 0;

				if($value["purchaseQty"]>0){
					$avgCost = $value["purchaseAmount"] / $value["purchaseQty"];
				}

				if($value["saleQty"]>0){
					$avgPrice = $value["saleAmount"] / $value["saleQty"];
				}
				
				$value["cost"] = $avgCost;
				$value["price"] = $avgPrice;
				$value["amount"] = $value["qoh"] * $avgCost;

				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}
		
		$this->response($data, 200);
	}

	//POSITION DETAIL BY DAWINE
	function position_detail_get() {
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
	    	foreach ($filter['filters'] as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->include_related("item", array("abbr", "number", "name"));
		$obj->include_related("transaction", array("number", "type", "issued_date", "rate"));
		$obj->where_in_related("transaction", "type", array("Purchase_Order", "Sale_Order", "Cash_Purchase", "Credit_Purchase", "Purchase_Return", "Payment_Refund", "Commercial_Invoice", "Vat_Invoice", "Invoice", "Commercial_Cash_Sale", "Vat_Cash_Sale", "Cash_Sale", "Sale_Return", "Cash_Refund", "Item_Adjustment", "Internal_Usage"));
		$obj->where_related("transaction", "is_recurring <>", 1);
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where_related("item", "item_type_id", 1);		
		$obj->order_by_related("transaction", "issued_date", "asc");

		//Results
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {	
				if(isset($objList[$value->item_id])){
					$objList[$value->item_id]["line"][] = array(
						"id" 				=> $value->transaction_id,
						"type" 				=> $value->transaction_type,
						"number" 			=> $value->transaction_number,
						"issued_date" 		=> $value->transaction_issued_date,
						"quantity" 			=> $value->quantity*$value->unit_value*$value->movement,
						"cost" 				=> $value->cost*$value->rate,
						"price" 			=> $value->price*$value->rate,
						"amount" 			=> $value->quantity*$value->unit_value*$value->movement*$value->cost*$value->rate
					);
				}else{
					//Balance Forward
					$bf = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
					$bf->where_in_related("transaction", "type", array("Cash_Purchase", "Credit_Purchase", "Purchase_Return", "Commercial_Invoice", "Vat_Invoice", "Invoice", "Commercial_Cash_Sale", "Vat_Cash_Sale", "Cash_Sale", "Sale_Return", "Item_Adjustment", "Internal_Usage"));
					$bf->where_related("transaction", "issued_date <", $value->transaction_issued_date);
					$bf->where_related("transaction", "is_recurring <>", 1);
					$bf->where_related("transaction", "deleted <>", 1);
					$bf->where("item_id", $value->item_id);
					$bf->get_iterated();
					
					$balance_forward = 0; $sumOnHand = 0; $sumAmount = 0; $sumQtyPurchase = 0; $sumAmountPurchase = 0;
					foreach ($bf as $val) {
						$qty = $val->quantity * $val->unit_value * $val->movement;
						$amt = $val->quantity * $val->unit_value * $val->cost * $val->rate;

						$sumOnHand += $qty;

						if($val->transaction_type=="Cash_Purchase" || $val->transaction_type=="Credit_Purchase"){
							$sumQtyPurchase += $qty;
							$sumAmountPurchase += $amt;
						}
					}

					if($sumQtyPurchase==0){
						$avgCost = 0;
					}else{
						$avgCost = $sumAmountPurchase / $sumQtyPurchase;
					}

					$balance_forward = $avgCost * $sumOnHand;
					//End Balance Forward

					$objList[$value->item_id]["id"] 				= $value->item_id;
					$objList[$value->item_id]["number"] 			= $value->item_abbr . $value->item_number;
					$objList[$value->item_id]["name"] 				= $value->item_name;
					$objList[$value->item_id]["on_hand"] 			= $sumOnHand;
					$objList[$value->item_id]["balance_forward"] 	= $balance_forward;
					$objList[$value->item_id]["line"][] 			= array(
						"id" 				=> $value->transaction_id,
						"type" 				=> $value->transaction_type,
						"number" 			=> $value->transaction_number,
						"issued_date" 		=> $value->transaction_issued_date,
						"quantity" 			=> $value->quantity*$value->unit_value*$value->movement,
						"cost" 				=> $value->cost*$value->rate,
						"price" 			=> $value->price*$value->rate,
						"amount" 			=> $value->quantity*$value->unit_value*$value->movement*$value->cost*$value->rate
					);			
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}
		
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
		$temp = array();
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
		$number  =0 ;
		$today = date("Y-m-d");

		//SALE (Begin FiscalDate To As Of)
		$sale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$sale->where_in("type", array("Invoice","Cash_Sale","Sale_Return"));
		$sale->where("issued_date >=", $this->startFiscalDate);
		$sale->where("issued_date <=", $today);
		$sale->where("is_recurring", 0);
		$sale->where("deleted", 0);
		$sale->get_iterated();
		
		//Sum Sale					
		$totalSale = 0;
		foreach ($sale as $value) {
			if($value->type=="Invoice" || $value->type=="Cash_Sale"){
				$totalSale += floatval($value->amount) / floatval($value->rate);
			}else{
				// -Sale Return
				$totalSale -= floatval($value->amount) / floatval($value->rate);
			}
		}
		//END SALE

		//COGS (Begin FiscalDate To As Of)
		$cogs = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$cogs->where_related("account/account_type", "id", 36);
		$cogs->where_related("transaction", "issued_date >=", $this->startFiscalDate);
		$cogs->where_related("transaction", "issued_date <=", $today);
		$cogs->where_related("transaction", "is_recurring", 0);
		$cogs->where_related("transaction", "deleted", 0);
		$cogs->where("deleted", 0);		
		$cogs->get_iterated();
		
		//Sum Dr and Cr					
		$cogsDr = 0;
		$cogsCr = 0;
		foreach ($cogs as $value) {			
			if($value->dr>0){
				$cogsDr += floatval($value->dr) / floatval($value->rate);
			}
			if($value->cr>0){
				$cogsCr += floatval($value->cr) / floatval($value->rate);
			}	
		}
		
		$totalCOGS = $cogsDr - $cogsCr;
		//END COGS

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->where('deleted <>', 1);
		$obj->where('is_recurring <>', 1);
		// $obj->where('is_pattern', 0);
		$obj->where_in('type', array('Cash_Sale', 'Invoice'));

		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Filter		
		if(!empty($filters) && isset($filters)){
	    	foreach ($filters['filters'] as $f) {
	    		if(isset($f['operator'])) {
					$obj->{$f['operator']}($f['field'], $f['value']);
				} else {
	    			$obj->where($f["field"], $f["value"]);
				}
			}
		}

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$itemLine = $value->item_line->include_related('item', array('id', 'name', 'on_hand'))->get();
				
				foreach ($itemLine as $line) {
					$inventory = $line->item->get();
					$gpm = 0;
					$gpm = (floatval($line->amount) - (($inventory->cost) * ($line->quantity) ))/($line->amount);
					if(isset($temp["$itemLine->item_id"])){

					}else{
						$temp["$itemLine->item_id"]['name'] = $inventory->name;
						$temp["$itemLine->item_id"]['gpm'] = $gpm;
						$temp["$itemLine->item_id"]['transactions'][] = array(
							'id' => $value->id,
							'date' => $value->issued_date,
							'type' 	=> $value->type,
							'number'	=> $value->number,
							'qty'	=> $line->quantity,
							'price'  => floatval($line->price),
							'amount'  => floatval($line->amount),
							'cost'  => floatval($inventory->cost),
						);
					}
					$onHand += floatval($line->item_on_hand);
					$itemSale += floatval($line->amount)/ floatval($line->rate);
					$costSale += floatval($line->cost)/ floatval($line->rate);
					
				}
				
			}
		}

		foreach($temp as $key => $value) {
			$data['results'][] = array(
				'item' => $value['name'],
				'gpm' => $value['gpm'],
				'transactions' => $value['transactions']
			);
			$totalGPM += $value['gpm'];
		}
		$number = count($temp);
		
		// Response Data
		$data['gpm'] = $totalGPM / $number;
		$data['product'] = count($temp);
		$data['number'] = $number;
		$data['sale'] = $itemSale;
		$data ['grossProfitMargin']	= ($totalSale - $totalCOGS) / $totalSale;
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
		$turnover = 0;
		$onHand = 0;
		$total =0;
		$cogs =0;
		$itemOnHand = 0;
		$temp = array();
		$data['onHand'] =0 ;
		$data['turnover'] =0;
		$today = date("Y-m-d");

		$date1 = new DateTime($this->startFiscalDate);
		$date2 = new DateTime($today);
		$days = $date2->diff($date1)->format("%a")-1;

		$obj = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->include_related('item_line/transaction', 'type');
		$obj->include_related('item_line', 'quantity');
		$obj->where_in_related('item_line/transaction', 'type', array("Invoice", "Cash_Sale", "Sale_Return"));

		// if(!empty($sort) && isset($sort)){					
		// 	foreach ($sort as $value) {
		// 		$obj->order_by($value["field"], $value["dir"]);
		// 	}
		// }
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
	    			$obj->where_related('item_line/transaction', $value["field"], $value["value"]);
	    		}
			}									 			
		}
		$obj->where('item_type_id', 1);
		$obj->where('deleted', 0);

		$obj->get_iterated();
		if($obj->exists()) {
			foreach($obj as $value) {
				if(isset($temp["$value->id"])) {
					if($value->transaction_type=='Sale_Return'){
						$temp["$value->id"]['quantity']	+= $value->item_line_quantity*-1;
					}else{
						$temp["$value->id"]['quantity']	+= $value->item_line_quantity;
					}					
				} else {
					$in = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$in->select_sum('quantity');						
					$in->where_in_related("transaction", "type", array("Cash_Purchase", "Credit_Purchase", "Item_Adjustment"));
					$in->where_related("transaction", "is_recurring", 0);
					$in->where_related("transaction", "deleted", 0);
					$in->where('item_id', $value->id);
					$in->where('movement', 1);
					$in->get();

					$out = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$out->select_sum('quantity');
					$out->where_in_related("transaction", "type", array("Invoice", "Cash_Sale", "Item_Adjustment"));
					$out->where_related("transaction", "is_recurring", 0);
					$out->where_related("transaction", "deleted", 0);
					$out->where('item_id', $value->id);
					$out->where('movement', -1);
					$out->get();
					$onHand = $in->quantity - $out->quantity;

					$temp["$value->id"]['name']		= $value->name;
					$temp["$value->id"]['cost']		= $value->cost;
					$temp["$value->id"]['onHand']	= $onHand;
					if($value->transaction_type=='Sale_Return'){
						$temp["$value->id"]['quantity']	= $value->item_line_quantity*-1;
					}else{
						$temp["$value->id"]['quantity']	= $value->item_line_quantity;
					}
				}
			}	
		}
		foreach ($temp as $key => $value) {
			$cogs = $value['cost']* $value['quantity'];
			$turnover = $cogs>0 ? ($value['onHand']/ $cogs)*$days : 0;
			$data['results'][]= array(
				'name' => $value['name'],
				'cogs' => $value['cost'],
				'onHand' => $value['onHand'],
				'turnover'=> $turnover
			);
			$data['onHand'] += $value['onHand'];
			$data['turnover'] += $turnover;
		}
		$data['count'] = count($data['results']);
		$this->response($data, 200);
	}

	function movement_summary_get() {			
		$filters 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$turnover = 0;
		$onHand = 0;
		$total =0;
		$cogs =0;
		$itemOnHand = 0;
		$temp = array();
		$data['onHand'] =0 ;
		$data['turnover'] =0;
		$data['sale'] = 0;

		$obj = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->include_related('item_line/transaction', 'type');
		$obj->include_related('item_line', 'quantity, movement');
		$obj->where_in_related('item_line/transaction', 'type', array("Invoice", "Cash_Sale", "Sale_Return", "Credit_Purchase", "Cash_Purchase", "Purchase_Return", "Item_Adjustment" ));

		// if(!empty($sort) && isset($sort)){					
		// 	foreach ($sort as $value) {
		// 		$obj->order_by($value["field"], $value["dir"]);
		// 	}
		// }
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
	    			$obj->where_related('item_line/transaction', $value["field"], $value["value"]);
	    		}
			}									 			
		}
		$obj->where('item_type_id', 1);
		$obj->where('deleted', 0);

		$obj->get_iterated();
		if($obj->exists()) {
			foreach($obj as $value) {
				

				if(isset($temp["$value->id"])) {
					if($value->transaction_type=='Credit_Purchase' || $value->transaction_type=='Cash_Purchase' || $value->transaction_type=='Purchase_Return'){
						if($value->transaction_type=='Purchase_Return'){
							$temp["$value->id"]['purchase']	+= $value->item_line_quantity*-1;
						}else{
							$temp["$value->id"]['purchase']	+= $value->item_line_quantity;
						}						
					}elseif ($value->transaction_type=='Item_Adjustment'){
						$temp["$value->id"]['Item_Adjustment']	+= $value->item_line_quantity*$value->item_line_movement;
					}else{
						if($value->transaction_type=='Sale_Return'){
							$temp["$value->id"]['sale']	+= $value->item_line_quantity*-1;
						}else{
							$temp["$value->id"]['sale']	+= $value->item_line_quantity;
						}						
					}					
				} else {
					$in = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$in->select_sum('quantity');						
					$in->where_in_related("transaction", "type", array("Cash_Purchase", "Credit_Purchase", "Item_Adjustment"));
					$in->where_related("transaction", "is_recurring", 0);
					$in->where_related("transaction", "deleted", 0);
					$in->where('item_id', $value->id);
					$in->where('movement', 1);
					$in->get();

					$out = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$out->select_sum('quantity');
					$out->where_in_related("transaction", "type", array("Invoice", "Cash_Sale", "Item_Adjustment"));
					$out->where_related("transaction", "is_recurring", 0);
					$out->where_related("transaction", "deleted", 0);
					$out->where('item_id', $value->id);
					$out->where('movement', -1);
					$out->get();
					$onHand = $in->quantity - $out->quantity;

					$temp["$value->id"]['name']		= $value->name;
					$temp["$value->id"]['cost']		= $value->cost;
					$temp["$value->id"]['onHand']	= $onHand;
					$temp["$value->id"]['purchase'] = 0; 
					$temp["$value->id"]['Item_Adjustment'] = 0; 
					if($value->transaction_type=='Credit_Purchase' || $value->transaction_type=='Cash_Purchase' || $value->transaction_type=='Purchase_Return'){
						if($value->transaction_type=='Purchase_Return'){
							$temp["$value->id"]['purchase']	= $value->item_line_quantity*-1;
						}else{
							$temp["$value->id"]['purchase']	= $value->item_line_quantity;
						}						
					}elseif ($value->transaction_type=='Item_Adjustment'){
						$temp["$value->id"]['Item_Adjustment'] = $value->item_line_quantity*$value->item_line_movement;
					}else{
						if($value->transaction_type=='Sale_Return'){
							$temp["$value->id"]['sale']	= $value->item_line_quantity*-1;
						}else{
							$temp["$value->id"]['sale']	= $value->item_line_quantity;
						}						
					}
				}
			}	
		}
		foreach ($temp as $key => $value) {
			$data['results'][]= array(
				'name' 		=> $value['name'],
				'purchase' => $value['purchase'],
				'sale' 		=> $value['sale'],
				'onHand' 	=> $value['onHand'],
				'adjustment' => $value['Item_Adjustment'],
				'balance'	=> $value['onHand']+$value['Item_Adjustment']
			);
			$data['onHand'] += $value['onHand'];
			$data['turnover'] += $turnover;
			$data['sale'] += $value['sale'];
		}
		$data['count'] = count($data['results']);
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
		$Item_Adjustment = 0;
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
						$Item_Adjustment += floatval($ad->quanity) * $ad->movement;
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
						$Item_Adjustment = 0;
						$adj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$adj->where_related('transaction', 'id', $line->transaction_id);
						$adj->get();
						if($adj->exists()) {
							foreach($adj as $ad) {
								$Item_Adjustment += floatval($ad->quanity) * $ad->movement;
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
								"adjustment"=> $Item_Adjustment
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
								"adjustment"=> $Item_Adjustment
							);
						}
					}
				}
				
					
			}
		}
		foreach ($temp as $key => $value) {
			$data["results"]= $value;
		}
		$data['gpm'] = $gpm;
		$data['count'] = count($temp);
		$this->response($data, 200);
	}

	
}//End Of Class
