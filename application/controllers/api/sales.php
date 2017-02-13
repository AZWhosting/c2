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

	function summary_customer_get() {
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
		$countInv =0;
		$countCash = 0;
		$deposit =0;
		$invoiceCount = 0;
		$cashCount = 0;
		// $data['invoiceCount'] =0 ;
		// $data['cashCount'] =0 ;

		// checked if the logic is customer or segment
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

				$txn->where_in("type", array("Invoice", "Commercial_Invoice", "Vat_Invoice"));
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
			$type->select('id')->where('parent_id', 1)->get();
			foreach($type as $t) {
				$types[] = $t->id;
			}

			// $obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where_in_related("contact", 'contact_type_id', $type);
			$obj->where_in("type", array("Invoice", "Cash_Sale", "Commercial_Invoice", "Vat_Invoice", "Commercial_Cash_Sale", "Vat_Cash_Sale", "Cash_Sale", "Sale_Return"));
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
					$items = $value->item_line->include_related('item', array('name'))->get();
					$temp = 0;
					foreach($items as $item) {
						$amount = $value->type =="Sale_Return"?floatval($item->amount)/floatval($value->rate)*-1:floatval($item->amount)/floatval($value->rate);

						if(isset($customers["$fullname"])) {
							$countInv+=1;
							$customers["$fullname"]['amount']+= $amount ;

							if($value->type=="Invoice" || $value->type=="Commercial_Invoice" || $value->type=="Vat_Invoice" ){
								$customers["$fullname"]['invoiceCount'] += 1;
							}else{
								$customers["$fullname"]['cashCount'] += 1;
							}						
						} else {
							$countInv+=1;
							$customers["$fullname"]['amount']= $amount ;

								$customers["$fullname"]['invoiceCount'] = 0;
								$customers["$fullname"]['cashCount'] = 0;
							if($value->type=="Invoice" || $value->type=="Commercial_Invoice" || $value->type=="Vat_Invoice" ){
								$customers["$fullname"]['invoiceCount'] = 1;
							}else{
								$customers["$fullname"]['cashCount'] = 1;
							}
						}
					}
					
					// if($ref->type == "Deposit" ) {
					// 	$deposit +=  floatval($value->amount)/ floatval($value->rate);
					// }
				}
			}
		}				

		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'customer'  => $key,
				'amount'	=> $value['amount'],
				'invoice'	=> $value['invoiceCount'],
				'cash'		=> $value['cashCount']
			);
			$total += $value['amount'];
		}

		// Response Data
		$data['total'] = $total;
		$data['count'] = count($customers);
		$this->response($data, 200);
	}

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

	function invoice_list_get() {
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

		if($this->get("filter")['logic'] == "segment") {
			$segmentItem = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$segmentItem->get();
		
			$segmentItem->get();

			foreach ($segmentItem as $seg) {
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

				$txn->where_in("type", array("Invoice", "Commercial_Invoice", "Vat_Invoice"));
				$txn->where_in("status", array(0,2));
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted",0);
				$txn->where("is_recurring",0);
				$txn->order_by("issued_date", "desc");
	
				$txn->get_iterated();
				$customers = array();
				$totalCreditSale = 0;
				$totalBalance    = 0;
				foreach ($txn as $t) {
					$segment = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$segment->where_in('id', explode(',',$t->segments))->get();
					$lines = array();
					$segments = array();
					if($segment->exists()) {
						foreach($segment as $seg) {
							$segments[] = array(
								'id' => $seg->id, 'code' => $seg->code
							);
						}
					}

					if(isset($customers["$seg->name"])) {
						$customers["$seg->name"]['amount'] += floatval($t->amount);
						$customers["$seg->name"]['transactions'][] = array(
							'id'  	=> $t->id,
							'type'  	=> $t->type,
							'date' 		=> $t->issued_date,
							'number' 	=> $t->number,
							'due_date'=> $t->due_date,
							'memo' 		=> $t->memo2,
							'status' 	=> $t->status,
							'segments'=> $segments,
							'amount' 	=> floatval($t->amount)/floatval($t->rate)
						);
					} else {
						$customers["$seg->name"]['amount'] = floatval($t->amount);
						$customers["$seg->name"]['transactions'][] = array(
							'id'  	=> $t->id,
							'type'  	=> $t->type,
							'date' 		=> $t->issued_date,
							'number' 	=> $t->number,
							'due_date'=> $t->due_date,
							'memo' 		=> $t->memo2,
							'status'  => $t->status,
							'segments'=> $segments,
							'amount' 	=> floatval($t->amount)/floatval($t->rate)
						);
					}

					$totalBalance += floatval($t->amount)/floatval($t->rate);
					if($t->status == 0) {
						$totalCreditSale += floatval($t->amount)/floatval($t->rate);
					}
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
			$obj->where('is_recurring', 0);
			$obj->where_in("type", array("Invoice", "Commercial_Invoice", "Vat_Invoice"));
			$obj->where("deleted",0);

			// $obj->include_related("contact_type", "name");

			//Results
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
			$customers = array();
			$totalCreditSale = 0;
			$totalBalance    = 0;
			$totalInvoice    = 0;
			if($obj->result_count()>0){
				foreach ($obj as $value) {
					$totalInvoice += 1;
					$customer = $value->contact->get();
					$fullname = $customer->surname.' '.$customer->name;

					$segment = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$segment->where_in('id', explode(',',$value->segments))->get();
					$lines = array();
					$segments = array();
					if($segment->exists()) {
						foreach($segment as $seg) {
							$segments[] = array(
								'id' => $seg->id, 'code' => $seg->code
							);
						}
					}

					if(isset($customers["$fullname"])) {
						$customers["$fullname"]['amount'] += floatval($value->amount)/floatval($value->rate);
						$customers["$fullname"]['transactions'][] = array(
							'id'  	=> $value->id,
							'type'  	=> $value->type,
							'date' 		=> $value->issued_date,
							'number' 	=> $value->number,
							'due_date'=> $value->due_date,
							'memo' 		=> $value->memo2,
							'status' 	=> $value->status,
							'segments'=> $segments,
							'amount' 	=> floatval($value->amount)/floatval($value->rate)
						);
					} else {
						$customers["$fullname"]['amount'] = floatval($value->amount)/floatval($value->rate);
						$customers["$fullname"]['transactions'][] = array(
							'id'  	=> $value->id,
							'type'  	=> $value->type,
							'date' 		=> $value->issued_date,
							'number' 	=> $value->number,
							'due_date'=> $value->due_date,
							'memo' 		=> $value->memo2,
							'status'  => $value->status,
							'segments'=> $segments,
							'amount' 	=> floatval($value->amount)/floatval($value->rate)
						);
					}

					$totalBalance += floatval($value->amount)/floatval($value->rate);
					if($value->status == 0) {
						$totalCreditSale += floatval($value->amount)/floatval($value->rate);
					}

				}
			}
		}	
		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'group' => $key,
				'amount'	 => $value['amount'],
				'items'	=> $value['transactions']
			);
		}
		$data['totalCreditSale'] = $totalCreditSale;
		$data['totalBalance'] = $totalBalance;
		$data['totalInvoice'] = $totalInvoice;
		$data['count'] = count($customers);
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
					$paid->where_in("type", array("Cash_Receipt", "Sale_Return", "Offset_Invoice"));
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
					$paid->where_in("type", array("Cash_Receipt", "Sale_Return", "Offset_Invoice"));
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
					$paid->where_in("type", array("Cash_Receipt", "Sale_Return", "Offset_Invoice"));
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
					$paid->where_in("type", array("Cash_Receipt", "Sale_Return", "Offset_Invoice"));
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

	//COLLECT INVOICE
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
			foreach ($obj as $value) {
				$amount = (floatval($value->amount) - floatval($value->deposit)) / floatval($value->rate);

				if($value->status=="2"){
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$paid->select_sum("amount");
					$paid->select_sum("discount");
					$paid->where("reference_id", $value->id);
					$paid->where_in("type", array("Cash_Receipt", "Sale_Return", "Offset_Invoice"));
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

	//COLLECT REPORT
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
		$obj->where_in("type", array("Commercial_Invoice","Vat_Invoice","Invoice"));
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
				$pmt->where_in("type", array("Cash_Receipt", "Sale_Return", "Offset_Invoice"));
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

	function deposit_detail_get() {
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
		$paid  = 0;
		$startDate = "";
		$invoiceOpen = 0;

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

		$customer = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$customer->where('deleted <>', 1);
		$customer->where('is_pattern <>', 1);
		$customerCount = $customer->where_in('contact_type_id', $type)->count();

		if($this->get("filter")['logic'] == "segment") {
			$segmentItem = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		
			$segmentItem->get();

			foreach ($segmentItem as $seg) {
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

				$txn->where("type", "Customer_Deposit");
				$txn->where_in("status", array(0,2));
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted",0);
				$txn->where("is_recurring",0);
				$txn->get_iterated();

				foreach ($txn as $t) {
					$ref = $t->referece->get();
					$amt = floatval($t->amount)/ floatval($t->rate);
					$items = $t->item_line->include_related('item', array('name'))->get();
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
			// $obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->where('parent_id', 1)->get();

			$obj->where_related("contact", 'contact_type_id', $type);
			$obj->where("status <>", 1);
			$obj->where("type", "Customer_Deposit");
			$obj->where("deleted",0);
			$obj->where('is_recurring', 0);

			// $obj->include_related("contact_type", "name");

			//Results
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
			
			if($obj->result_count()>0){
				foreach ($obj as $value) {
					$ref = $value->transaction->get();
					$customer = $value->contact->get();
					$fullname = $customer->surname.' '.$customer->name;
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
					$total += (floatval($value->amount)/ floatval($value->rate)); 

				}
			}
		}	

		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'group' => $key,
				'items' => $value['transactions']
			);
		}

		//Response Data
		$data['total'] = $total;
		$data['count'] = count($customers);
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

	function statement_get() {
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
		$obj->where_in("contact_type_id", array(4,5));
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
