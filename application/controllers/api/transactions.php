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

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->where_in( 'type', array("Purchase_Order", "Sale_Order"));
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
						$in->where_in_related("transaction", "type", array("Cash_Purchase", "Credit_Purchase", "Adjustment"));
						$in->where_related("transaction", "is_recurring", 0);
						$in->where_related("transaction", "deleted", 0);
						$in->where('item_id', $item->item_id);
						$in->where('movement', 1);
						$in->get();

						$out = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$out->select_sum('quantity');
						$out->where_in_related("transaction", "type", array("Invoice", "Cash_Sale", "Adjustment"));
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
						$temp["$inventory->id"]['cost'] = $inventory->cost;
						$temp["$inventory->id"]['price'] = $inventory->price;
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

		$line = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$line->where_in("type", array("Cash_Purchase", "Credit_Purchase", "Purchase_Return", "invoice", "Sale_Return", "Adjustment") );
		$line->where('is_recurring <>', 1);
		$line->where('deleted <>', 1);
		
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$line->order_by($value["field"], $value["dir"]);
			}
		}
		//Filter
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters["filters"] as $value) {
	    		if(!empty($value["operator"]) && isset($value["operator"])){
		    		if($value["operator"]=="where_in"){
		    			$line->where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_in"){
		    			$line->or_where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="where_not_in"){
		    			$line->where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_not_in"){
		    			$line->or_where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="like"){
		    			$line->like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_like"){
		    			$line->or_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="not_like"){
		    			$line->not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_not_like"){
		    			$line->or_not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="startswith"){
		    			$line->like($value["field"], $value["value"], "after");
		    		}else if($value["operator"]=="endswith"){
		    			$line->like($value["field"], $value["value"], "before");
		    		}else if($value["operator"]=="contains"){
		    			$line->like($value["field"], $value["value"], "both");
		    		}else if($value["operator"]=="or_where"){
		    			$line->or_where($value["field"], $value["value"]);		    		
		    		}else{
		    			$line->where($value["field"].' '.$value["operator"], $value["value"]);
		    		}
	    		}else{
	    			$line->where($value["field"], $value["value"]);
	    		}
			}									 			
		}

		// $obj->include_related("contact_type", "name");

		//Results
		$line->get_paged_iterated($page, $limit);
		
		$data["count"] = $line->paged->total_rows;
		
		if($line->result_count()>0){
			foreach ($line as $value) {				
					$itemLine = $value->item_line->get();
					$inventory = $itemLine->item->get();
					if(isset($temp["$itemLine->item_id"])) {
						$temp["$itemLine->item_id"]['transactions'][] = array(
							'id' => $value->id,
							'date' => $value->issued_date,
							'type' 	=> $value->type,
							'ref'	=> $value->number,
							'qty'	=> $itemLine->quantity * $itemLine->movement,
							'cost'  => $itemLine->cost,
							'price' => $itemLine->price

						);
					} else {
						$in = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$in->select_sum('quantity');
						$in->where_in_related("transaction", "type", array("Cash_Purchase", "Credit_Purchase", "Adjustment"));
						$in->where_related("transaction", "is_recurring", 0);
						$in->where_related("transaction", "deleted", 0);
						$in->where('item_id', $itemLine->item_id);
						$in->where('movement', 1);
						$in->get();

						$out = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$out->select_sum('quantity');
						$out->where_in_related("transaction", "type", array("Invoice", "Cash_Sale", "Adjustment"));
						$out->where_related("transaction", "is_recurring", 0);
						$out->where_related("transaction", "deleted", 0);
						$out->where('item_id', $itemLine->item_id);
						$out->where('movement', -1);
						$out->get();
						
						$temp["$itemLine->item_id"]['name'] = $inventory->name;
						$temp["$itemLine->item_id"]['avg_cost'] = $inventory->cost;
						$temp["$itemLine->item_id"]['price'] = $inventory->price;
						$temp["$itemLine->item_id"]['onHand'] = $in->quantity - $out->quantity;
						$temp["$itemLine->item_id"]['currency_code'] = $inventory->locale;
						$temp["$itemLine->item_id"]['transactions'][] = array(
							'id' => $value->id,
							'date' => $value->issued_date,
							'type' 	=> $value->type,
							'ref'	=> $value->number,
							'qty'	=> $itemLine->quantity,
							'cost'  => $itemLine->cost,
							'price' => $itemLine->price
						);
						
					}
				}
		}
		foreach ($temp as $key => $value) {
			$data["results"][] = array(
				'id' 		=> $key,
				'item' 		=> $value['name'],			
				'avg_cost'	=> $value['avg_cost'],
				'price'		=> $value['price'],
				'onHand'	=> $value['onHand'],
				'currency'	=> $value['currency_code'],
				'transactions' => $value['transactions']
			);
			$onHand +=  $value['onHand'];
			$total += $onHand * floatval($value['avg_cost']);
		}

		// Response Data
		$data['total'] = $total;
		$data['item'] = $itemSale;
		$data['count'] = count($temp);
		$data['totalOnhand'] = $onHand;
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

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->where('deleted', 0);
		$obj->where('is_recurring', 0);
		// $obj->where('is_pattern', 0);
		$obj->where_in('type', array('Cash_Sale', 'Invoice'));

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
							'price'  => $line->price,
							'amount'  => $line->amount,
							'cost'  => $inventory->cost,
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
		$data['number'] = $number;
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
		$turnover = 0;
		$onHand = 0;
		$total =0;
		$cogs =0;
		$itemOnHand = 0;
		$temp = array();
		$data['onHand'] =0 ;
		$data['turnover'] =0;

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
					$in->where_in_related("transaction", "type", array("Cash_Purchase", "Credit_Purchase", "Adjustment"));
					$in->where_related("transaction", "is_recurring", 0);
					$in->where_related("transaction", "deleted", 0);
					$in->where('item_id', $value->id);
					$in->where('movement', 1);
					$in->get();

					$out = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$out->select_sum('quantity');
					$out->where_in_related("transaction", "type", array("Invoice", "Cash_Sale", "Adjustment"));
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
			$turnover = $cogs>0 ? ($value['onHand']/ $cogs)*365 : 0;
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
		$obj->where_in_related('item_line/transaction', 'type', array("Invoice", "Cash_Sale", "Sale_Return", "Credit_Purchase", "Cash_Purchase", "Purchase_Return", "Adjustment" ));

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
					}elseif ($value->transaction_type=='Adjustment'){
						$temp["$value->id"]['adjustment']	+= $value->item_line_quantity*$value->item_line_movement;
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
					$in->where_in_related("transaction", "type", array("Cash_Purchase", "Credit_Purchase", "Adjustment"));
					$in->where_related("transaction", "is_recurring", 0);
					$in->where_related("transaction", "deleted", 0);
					$in->where('item_id', $value->id);
					$in->where('movement', 1);
					$in->get();

					$out = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$out->select_sum('quantity');
					$out->where_in_related("transaction", "type", array("Invoice", "Cash_Sale", "Adjustment"));
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
					$temp["$value->id"]['adjustment'] = 0; 
					if($value->transaction_type=='Credit_Purchase' || $value->transaction_type=='Cash_Purchase' || $value->transaction_type=='Purchase_Return'){
						if($value->transaction_type=='Purchase_Return'){
							$temp["$value->id"]['purchase']	= $value->item_line_quantity*-1;
						}else{
							$temp["$value->id"]['purchase']	= $value->item_line_quantity;
						}						
					}elseif ($value->transaction_type=='Adjustment'){
						$temp["$value->id"]['adjustment'] = $value->item_line_quantity*$value->item_line_movement;
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
				'adjustment' => $value['adjustment'],
				'balance'	=> $value['onHand']+$value['adjustment']
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
			$data["results"]= $value;
		}
		$data['gpm'] = $gpm;
		$data['count'] = count($temp);
		$this->response($data, 200);
	}

}//End Of Class
