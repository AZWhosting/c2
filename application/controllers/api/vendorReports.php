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

	function expense_summary_get() {
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
		$segments = 0;
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
				$segments +=1;
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

				$txn->where_in("type", array("Credit_Purchase", "Cash_Purchase"));
				$txn->where_in("status", array(0,2));
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted",0);
				$txn->where("is_recurring",0);
				$txn->get_iterated();

				foreach ($txn as $t) {
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
			$type->where('parent_id', 2)->get();

			$obj->where_related("contact", 'contact_type_id', $type);
			$obj->where('is_recurring', 0);
			$obj->where("deleted", 0);
			$obj->where_in("type", array("Credit_Purchase", "Cash_Purchase"));

			// $obj->include_related("contact_type", "name");

			//Results
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
			
			if($obj->result_count()>0){
				foreach ($obj as $value) {
					$customer = $value->contact->get();
					$fullname = $customer->surname.' '.$customer->name;
					if(isset($customers["$fullname"])) {
						$customers["$fullname"]['amount']+= floatval($value->amount)/ floatval($value->rate);
					} else {
						$customers[$fullname]['amount']= floatval($value->amount)/ floatval($value->rate);
					}
					$total += floatval($value->amount)/ floatval($value->rate);
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
		$data['segments'] = $segments;
		$data['count'] = count($customers);
		$this->response($data, 200);
	}

	function transaction_vendor_get() {
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
		$totalCashPurchase = 0;
		$totalCashPayment = 0;

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

				$txn->where_in("type", array("Credit_Purchase", "Cash_Purchase", "Cash_Payment", "Vendor_Deposit"));
				$txn->where_in("status", array(0,2));
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted",0);
				$txn->where("is_recurring",0);
				$txn->get_iterated();

				foreach ($txn as $t) {
					$amt = floatval($t->amount)/ floatval($t->rate);

					if(isset($customers["$seg->name"])) {
						$customers["$seg->name"]['amount']+= $amt;
						$customers["$seg->name"]['transactions'][] = array(
							'id'  		=> $t->id,
							'type'  	=> $t->type,
							'date' 		=> $t->issued_date,
							'number' 	=> $t->number,
							'memo' 		=> $t->memo2,
							'amount' 	=> $amt
						);
					} else {
						$customers["$seg->name"]['amount']= $amt;
						$customers["$seg->name"]['transactions'][] = array(
							'id'  		=> $t->id,
							'type'  	=> $t->type,
							'date' 		=> $t->issued_date,
							'number' 	=> $t->number,
							'memo' 		=> $t->memo2,
							'amount' 	=> $amt
						);
					}
					if($value->type == "Cash_Purchase") {						
						$totalCashPurchase += floatval($value->amount)/floatval($value->rate);
					}
					if($value->type == "Cash_Payment") {						
						$totalCashPayment += floatval($value->amount)/floatval($value->rate);
					}
					$total += $amt;
				}
			}
		} else {


			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->where('parent_id', 2)->get();

			$obj->where_related("contact", 'contact_type_id', $type);
			$obj->where_in("type", array("Credit_Purchase", "Cash_Purchase", "Cash_Payment", "Vendor_Deposit"));
			$obj->where('is_recurring', 0);
			$obj->where('deleted', 0);
			if(isset($filters['filters'])) {
				foreach($filters['filters'] as $f) {
					$obj->where($f['field'], $f['value']);
				}
			}

			// $obj->include_related("contact_type", "name");

			//Results
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
			
			if($obj->result_count()>0){
				foreach ($obj as $value) {
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
					if($value->type == "Cash_Purchase") {						
						$totalCashPurchase += floatval($value->amount)/floatval($value->rate);
					}
					if($value->type == "Cash_Payment") {						
						$totalCashPayment += floatval($value->amount)/floatval($value->rate);
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

		$data['total'] = $total;
		$data['totalCashPurchase'] = $totalCashPurchase;
		$data['totalCashPayment'] = $totalCashPayment;
		$data['count'] = count($customers);
		//Response Data
		$this->response($data, 200);	
	}

	function expense_detail_get() {
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
			if(isset($filters['filters'])) {
				foreach($filters['filters'] as $f) {
					$segmentItem->where($f['field'], $f['value']);
				}
			}
			$segmentItem->get();

			foreach ($segmentItem as $seg) {
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

				$txn->where_in("type", array("Credit_Purchase", "Cash_Purchase", "Journal", "Direct_Expense", "Reimbursement", "Advance_Settlement"));
				$txn->where_in("status", array(0,2));
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted",0);
				$txn->where("is_recurring",0);
				$txn->get_iterated();

				foreach ($txn as $t) {
					$amt = floatval($t->amount)/ floatval($t->rate);
				
					if(isset($customers["$seg->name"])) {
						$customers["$seg->name"]['amount']+= $amt;
						$customers["$seg->name"]['transactions'][] = array(
							'id'  		=> $t->id,
							'type'  	=> $t->type,
							'date' 		=> $t->issued_date,
							'number' 	=> $t->number,
							'memo' 		=> $t->memo2,
							'amount' 	=> $amt
						);
					} else {
						$customers["$seg->name"]['amount']= $amt;
						$customers["$seg->name"]['transactions'][] = array(
							'id'  		=> $t->id,
							'type'  	=> $t->type,
							'date' 		=> $t->issued_date,
							'number' 	=> $t->number,
							'memo' 		=> $t->memo2,
							'amount' 	=> $amt
						);
					}
					$total += $amt;
				}
			}
		} else {

			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->where('parent_id', 2)->get();

			$obj->where_related("contact", 'contact_type_id', $type);
			$obj->where_in("type", array("Credit_Purchase", "Cash_Purchase", "Journal", "Direct_Expense", "Reimbursement", "Advance_Settlement"));
			$obj->where('is_recurring', 0);
			$obj->where("deleted", 0);

			// $obj->include_related("contact_type", "name");

			//Results
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
			
			if($obj->result_count()>0){
				foreach ($obj as $value) {
					$customer = $value->contact->get();
					$fullname = $customer->surname.' '.$customer->name;
					
					if(isset($customers["$fullname"])) {
						$customers["$fullname"]['amount'] += floatval($value->amount);
						$customers["$fullname"]['transactions'][] = array(
							'id'  		=> $value->id,
							'type'  	=> $value->type,
							'date' 		=> $value->issued_date,
							'number' 	=> $value->number,
							'memo' 		=> $value->memo2,
							'amount' 	=> floatval($value->amount)/floatval($value->rate)
						);
					} else {
						$customers["$fullname"]['amount'] = floatval($value->amount);
						$customers["$fullname"]['transactions'][] = array(
							'id'  		=> $value->id,
							'type'  	=> $value->type,
							'date' 		=> $value->issued_date,
							'number' 	=> $value->number,
							'memo' 		=> $value->memo2,
							'amount' 	=> floatval($value->amount)/floatval($value->rate),
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
				'items' 	=> $value['transactions']

			);
		}
		$data['total'] = $total;
		$data['count'] = count($customers);
		//Response Data
		$this->response($data, 200);
	}

	function bill_list_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;
		$customers = array();
		$totalCreditSale = 0;
		$totalBalance    = 0;
		
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

				$txn->where_in("type", array("Purchase", "Expense"));
				$txn->where_in("status", array(0,2));
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted",0);
				$txn->where("is_recurring",0);
				$txn->get_iterated();

				foreach ($txn as $t) {
					$amt = floatval($t->amount)/ floatval($t->rate);
					
					if(isset($customers["$seg->name"])) {
						$customers["$seg->name"]['amount']+= $amt;
						$customers["$seg->name"]['transactions'][] = array(
							'type'  	=> $t->type,
							'date' 		=> $t->issued_date,
							'number' 	=> $t->number,
							'due_date'=> $t->due_date,
							'memo' 		=> $t->memo2,
							'status' 	=> $t->status,
							'segments'=> array("id" => $seg->id, "code" => $seg->code),
							'amount' 	=> floatval($t->amount)/floatval($t->rate)
						);
					} else {
						$customers["$seg->name"]['amount']= $amt;
						$customers["$seg->name"]['transactions'][] = array(
							'type'  	=> $t->type,
							'date' 		=> $t->issued_date,
							'number' 	=> $t->number,
							'due_date'=> $t->due_date,
							'memo' 		=> $t->memo2,
							'status' 	=> $t->status,
							'segments'=> array("id" => $seg->id, "code" => $seg->code),
							'amount' 	=> floatval($t->amount)/floatval($t->rate)
						);
					}

					$totalBalance += $amt;
					if($value->status == 0) {
						$totalCreditSale += $amt;
					}
				}
			}
		} else {
			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->where('parent_id', 1)->get();

			$obj->where_related("contact", 'contact_type_id', $type);
			$obj->where('is_recurring', 0);
			$obj->where("type", "Invoice");

			// $obj->include_related("contact_type", "name");

			//Results
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
			if($obj->result_count()>0){
				foreach ($obj as $value) {
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
						$customers["$fullname"]['amount'] += floatval($value->amount);
						$customers["$fullname"]['transactions'][] = array(
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
						$customers["$fullname"]['amount'] = floatval($value->amount);
						$customers["$fullname"]['transactions'][] = array(
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
		$data['count'] = count($customers);
		//Response Data
		$this->response($data, 200);
	}

	function summary_balance_get() {
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
		$openPurchase =0;

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
		$type->where('parent_id', 2)->get();

		$supplier = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$supplier->where('deleted <>', 1);
		$supplier->where('is_pattern <>', 1);
		$supplierCount = $supplier->where_in('contact_type_id', $type)->count();


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

				$txn->where("type", "Credit_Purchase");
				$txn->where("status <>", 1);
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted",0);
				$txn->where("is_recurring",0);
				$txn->get_iterated();

				foreach ($txn as $t) {
					$openPurchase += 1;
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

			$obj->where_related("contact", 'contact_type_id', $type);
			$obj->where("status <>", 1);
			$obj->where("type", "Credit_Purchase");
			$obj->where('is_recurring', 0);
			$obj->where('deleted', 0);

			// $obj->include_related("contact_type", "name");

			//Results
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
		
			if($obj->result_count()>0){
				foreach ($obj as $value) {
					$openPurchase += 1;
					$customer = $value->contact->get();
					$fullname = $customer->surname.' '.$customer->name;
					if(isset($customers["$fullname"])) {						
						$customers["$fullname"]['amount']+= floatval($value->amount);
					} else {
						$customers[$fullname]['amount']= (floatval($value->amount)/ floatval($value->rate));
					}
					
					$total += floatval($value->amount)/ floatval($value->rate);

				}
			}
		}

		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'customer' => $key,
				'amount'	=> $value['amount']

			);
		}

		//Response Data
		$data['total'] = $total;
		$data['supplierCount'] = $supplierCount;
		$data['openPurchase'] = $openPurchase;
		$data['count'] = count($customers);
		$this->response($data, 200);
	}

	function detail_balance_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;
		$customers = array();
		$invoiceOpen = 0;
		$total = 0;
		$openPurchase = 0;

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
		$type->where('parent_id', 2)->get();

		$supplier = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$supplier->where('deleted <>', 1);
		$supplier->where('is_pattern <>', 1);
		$supplierCount = $supplier->where_in('contact_type_id', $type)->count();

		if($this->get("filter")['logic'] == "segment") {
			$segmentItem = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			
			$segmentItem->get();

			foreach ($segmentItem as $seg) {
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

				$txn->where("type", "Credit_Purchase");
				$txn->where("status <>", 1);
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
					$openPurchase += 1;
					$amt = floatval($t->amount)/ floatval($t->rate);
				
					if(isset($customers["$seg->name"])) {
						$customers["$seg->name"]['transactions'][] = array(
							'id'  		=> $t->id,
							'type'  	=> $t->type,
							'date' 		=> $t->issued_date,
							'number' 	=> $t->number,
							'memo' 		=> $t->memo2,						
							'amount' 	=> $amt
						);
					} else {
						$customers["$seg->name"]['transactions'][] = array(
							'id'  		=> $t->id,
							'type'  	=> $t->type,
							'date' 		=> $t->issued_date,
							'number' 	=> $t->number,
							'memo' 		=> $t->memo2,						
							'amount' 	=> $amt
						);
					}
					if($t->status != 1) {
						$invoiceOpen += 1;
					}
					
					$total += $amt;
				}
			}
		} else {
			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->where('parent_id', 2)->get();

			$obj->where_related("contact", 'contact_type_id', $type);
			$obj->where("status <>", 1);
			$obj->where("type", "Credit_Purchase");
			$obj->where('is_recurring', 0);
			if(isset($filters['filters'])) {
					foreach($filters['filters'] as $f) {
						$obj->where($f['field'], $f['value']);
					}
				}
			// $obj->include_related("contact_type", "name");

			//Results
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
			
			
			if($obj->result_count()>0){
				foreach ($obj as $value) {
					$openPurchase += 1;
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
					
					if($value->status != 1) {
						$invoiceOpen += 1;
					}
					$total += floatval($value->amount)/ floatval($value->rate);

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
		$data['supplierCount'] = $supplierCount;
		$data['openBill'] = $invoiceOpen;
		$data['count'] = count($customers);
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
		$items = array();
		$total = 0;
		$totalAvg = 0;
		$totalQty = 0;
		$totalCost= 0;
		$total_avg = 0;
		$gpm = 0;

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
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted",0);
				$txn->where("is_recurring",0);
				$txn->get_iterated();
				if($txn->exists()) {
					foreach ($txn as $t) {
						$itemLine = $t->item_line->get();
						foreach($itemLine as $line) {
							$item = $line->item->get();
							if(isset($items["$item->name"])) {
								$items["$item->name"]['qty'] += intval($line->quantity);
								$items["$item->name"]['amount'] += floatval($line->amount);
								$items["$item->name"]['price'] += floatval($line->price);
								$items["$item->name"]['cost'] += floatval($line->cost);
								$items["$item->name"]['gross_profit'] += (floatval($line->price)-floatval($line->cost)) * floatval($line->quantity);
							} else {
								$items["$item->name"]['qty'] = intval($line->quantity);
								$items["$item->name"]['amount'] = floatval($line->amount);
								$items["$item->name"]['price'] = floatval($line->price);
								$items["$item->name"]['cost'] = floatval($line->cost);
								$items["$item->name"]['rate'] = floatval($value->rate);
								$items["$item->name"]['gross_profit'] = (floatval($line->price)-floatval($line->cost)) * floatval($line->quantity);
							}
							$total += floatval($line->amount)/floatval($value->rate);
						}
					}
				}
				foreach($items as $key => $value) {
					$avg = ($value['amount']/$value['rate']) / $value['qty'];
					$data['results'][] = array(
						'group' => $key,
						'amount' => $value['amount'],
						'qty' => $value['qty'],
						'avg_price' => round($avg, 2),
						'cost' => ($value['cost']/$value['rate']) / $value['qty'],
						'gross_profit_margin' => (($value['amount'] - $value['cost']) / $value['amount'])
					);
					$totalAvg += $value['amount']/$value['rate'];
					$totalCost+= $value['cost']/$value['rate'];
					$totalQty += $value['qty'];
				}
			}
		} else {
			// $type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
			// $type->where('parent_id', 1)->get();

			// $obj->where_related("contact", 'contact_type_id', $type);
			$obj->where_in("type", array("Credit_Purchase", "Cash_Purchase"));
			$obj->where('is_recurring', 0);
			$obj->where("deleted", 0);

			// $obj->include_related("contact_type", "name");

			//Results
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
			
			if($obj->result_count()>0){
				foreach ($obj as $value) {
					$itemLine = $value->item_line->get();
					foreach($itemLine as $line) {
						$item = $line->item->get();
						if(isset($items["$item->name"])) {
							$items["$item->name"]['qty'] += intval($line->quantity);
							$items["$item->name"]['amount'] += floatval($line->amount);
							$items["$item->name"]['price'] += floatval($line->price);
							$items["$item->name"]['cost'] += floatval($line->cost);
							$items["$item->name"]['gross_profit'] += (floatval($line->price)-floatval($line->cost)) * floatval($line->quantity);
						} else {
							$items["$item->name"]['qty'] = intval($line->quantity);
							$items["$item->name"]['amount'] = floatval($line->amount);
							$items["$item->name"]['price'] = floatval($line->price);
							$items["$item->name"]['cost'] = floatval($line->cost);
							$items["$item->name"]['rate'] = floatval($value->rate);
							$items["$item->name"]['gross_profit'] = (floatval($line->price)-floatval($line->cost)) * floatval($line->quantity);
						}
						$total += floatval($line->amount)/floatval($value->rate);
					}
				}
			}
			foreach($items as $key => $value) {
				$avg = ($value['amount']/$value['rate']) / $value['qty'];
				$data['results'][] = array(
					'group' => $key,
					'amount' => $value['amount'],
					'qty' => $value['qty'],
					'avg_price' => round($avg, 2),
					'cost' => ($value['cost']/$value['rate']) / $value['qty'],
					'gross_profit_margin' => (($value['amount'] - $value['cost']) / $value['amount'])
				);
				$totalAvg += $value['amount']/$value['rate'];
				$totalCost+= $value['cost']/$value['rate'];
				$totalQty += $value['qty'];
			}
		}
		$data['total_sale'] = $total;
		$data['total_avg'] = $totalQty > 0? ($totalAvg/$totalQty) : 0;
		$data['gpm'] = $totalAvg > 0? ($totalAvg - $totalCost) / $totalAvg : 0;
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
		$products = array();
		$total = 0;
		$totalQuantity = 0;
		$totaProdcuts = 0;
		

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
				$totaProdcuts += 1;
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

				$txn->where_in("type", array("Credit_Purchase", "Cash_Purchase"));
				$txn->where_in("status", array(0,2));
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted",0);
				$txn->where("is_recurring",0);
				$txn->get_iterated();
				if($txn->exists()) {
					foreach ($txn as $t) {
						$itemLine = $t->item_line->include_related('item', array('name'))->get();
						foreach($items as $item) {
							$temp = array(
								'id' 	=> $t->id,
								'type' => $t->type,
								'date' => $t->issued_date,
								'memo' => $t->memo2,
								'number' 	=> $t->number,
								'qty'  => $item->quantity,
								'price'=> $item->price,
								'amount'=> floatval($item->amount)/floatval($t->rate)
							);
							if(isset($products["$item->item_name"])) {
								$products["$item->item_name"][] = $temp;
							} else {
								$products["$item->item_name"][] = $temp;
							}
						}
					}
				}
				$total += floatval($value->amount)/ floatval($value->rate);
			}
			foreach ($products as $key => $value) {
				$data["results"][] = array(
					'group' 	=> $key,
					// 'amount'	=> $value['amount'],
					'items' 	=> $value

				);
			}
		} else {
			
			$obj->where("deleted",0);
			$obj->where('is_recurring', 0);
			$obj->where_in("type", array("Credit_Purchase", "Cash_Purchase"));
			if(isset($filters['filters'])) {
				foreach($filters['filters'] as $f) {
					$obj->where($f['field'], $f['value']);
				}
			}
			//Results
			$obj->get_paged_iterated($page, $limit);
			if($obj->result_count()>0){
				foreach ($obj as $value) {
					$items = $value->item_line->include_related('item', array('name'))->get();
					foreach($items as $item) {
						$temp = array(
							'id' 	=> $value->id,
							'type' => $value->type,
							'date' => $value->issued_date,
							'memo' => $value->memo2,
							'number' 	=> $value->number,
							'qty'  => $item->quantity,
							'price'=> $item->price,
							'amount'=> floatval($item->amount)/floatval($value->rate)
						);
						if(isset($products["$item->item_name"])) {
							$products["$item->item_name"][] = $temp;
						} else {
							$products["$item->item_name"][] = $temp;
						}
					}
				$total += floatval($value->amount)/ floatval($value->rate);
				$totaProdcuts += $item->quantity;				}
			}
			foreach ($products as $key => $value) {
				$data["results"][] = array(
					'group' 	=> $key,
					// 'amount'	=> $value['amount'],
					'items' 	=> $value

				);
			}
		}
		$data['total'] = $total;
		$data['totalQuantity'] = $totalQuantity;
		$data['count'] = count($products);
		$data['totaProdcuts'] = $totaProdcuts;
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

				$txn->where("type", "Vendor_Deposit");
				$txn->where_in("status", array(0,2));
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted",0);
				$txn->where("is_recurring",0);
				$txn->get_iterated();
				if($txn->exists()) {
					foreach ($txn as $t) {
						if(isset($customers["$segment->name"])) {
							$customers["$segment->name"]['amount'] += floatval($t->amount);
							$customers["$segment->name"]['transactions'][] = array(
								'id'  		=> $t->id,
								'type'  	=> $t->type,
								'date' 		=> $t->issued_date,
								'number' 	=> $t->number,
								'memo' 		=> $t->memo2,
								'amount' 	=> floatval($t->amount)/floatval($t->rate)
							);
						} else {
							$customers["$segment->name"]['amount'] = floatval($value->amount);
							$customers["$segment->name"]['transactions'][] = array(
								'id'  		=> $t->id,
								'type'  	=> $t->type,
								'date' 		=> $t->issued_date,
								'number' 	=> $t->number,
								'memo' 		=> $t->memo2,
								'amount' 	=> floatval($t->amount)/floatval($t->rate)
							);
						}
						$total += floatval($t->amount)/ floatval($t->rate);
					}
				}	
			}
		} else {

			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->where('parent_id', 2)->get();

			$obj->where_related("contact", 'contact_type_id', $type);
			$obj->where("type", "Vendor_Deposit");
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
					$customer = $value->contact->get();
					$fullname = $customer->surname.' '.$customer->name;

					if(isset($customers["$fullname"])) {
						$customers["$fullname"]['amount'] += floatval($value->amount);
						$customers["$fullname"]['transactions'][] = array(
							'id'  		=> $value->id,
							'type'  	=> $value->type,
							'date' 		=> $value->issued_date,
							'number' 	=> $value->number,
							'memo' 		=> $value->memo2,
							'amount' 	=> floatval($value->amount)/floatval($value->rate)
						);
					} else {
						$customers["$fullname"]['amount'] = floatval($value->amount);
						$customers["$fullname"]['transactions'][] = array(
							'id'  		=> $value->id,
							'type'  	=> $value->type,
							'date' 		=> $value->issued_date,
							'number' 	=> $value->number,
							'memo' 		=> $value->memo2,
							'amount' 	=> floatval($value->amount)/floatval($value->rate)
						);
					}
				$total += floatval($value->amount)/ floatval($value->rate);
				}
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

	function aging_summary_get() {
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
		$outstanding = 0;
		$totalDay = 0;
		$aging = 0;
		$totalPurchase = 0;
		$supplierCount = 0;

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
		$type->where('parent_id', 2)->get();

		$supplier = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$supplier->where('deleted <>', 1);
		$supplier->where('is_pattern <>', 1);
		$supplierCount = $supplier->where_in('contact_type_id', $type)->count();

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

				$txn->where("type", "Credit_Purchase");
				$txn->where_in("status", array(0,2));
				// $txn->where('job_id <> ' 0);
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted", 0);
				$txn->where("is_recurring",0);
				$txn->get_iterated();
				if($txn->exists()) {
					foreach ($txn as $t) {
						$totalPurchase +=1;
						$today = new DateTime();
						$dueDate = new DateTime($t->due_date);
						$diff = $today->diff($dueDate)->format("%a");

						if(isset($customers["$segment->name"])) {
							$customers["$segment->name"]['amount']	+= floatval($t->amount) / floatval($t->rate);
							if($dueDate<$today){
								if(intval($diff)>90){
									$customers["$segment->name"]['>90']+= floatval($t->amount) / floatval($t->rate);
								}else if(intval($diff)>60){
									$customers["$segment->name"]['90'] += floatval($t->amount) / floatval($t->rate);
								}else if(intval($diff)>30){
									$customers["$segment->name"]['60'] += floatval($t->amount) / floatval($t->rate);
								}else{
									$customers["$segment->name"]['30'] += floatval($t->amount) / floatval($t->rate);
								}
							}else{
								// $customers["$fullname"]['<30'] += floatval($value->amount) / floatval($value->rate);
							}
						} else {
							$customers["$segment->name"]['amount']	= floatval($t->amount) / floatval($t->rate);
							if($dueDate<$today){
								if(intval($diff)>90){
									$customers["$segment->name"]['>90']= floatval($t->amount) / floatval($t->rate);
								}else if(intval($diff)>60){
									$customers["$segment->name"]['90'] = floatval($t->amount) / floatval($t->rate);
								}else if(intval($diff)>30){
									$customers["$segment->name"]['60'] = floatval($t->amount) / floatval($t->rate);
								}else{
									$customers["$segment->name"]['30'] = floatval($t->amount) / floatval($t->rate);
								}
							}else{
								$customers["$segment->name"]['<30'] = floatval($t->amount) / floatval($t->rate);
							}
					//Results
						}
						$total += floatval($t->amount)/ floatval($t->rate);
					}
				}	
			}
		} else {

			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->where('parent_id', 2)->get();

			$obj->where_related("contact", 'contact_type_id', $type);
			$obj->where("type", "Credit_Purchase");
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
					$totalPurchase +=1;
					$customer = $value->contact->get();
					$fullname = $customer->surname.' '.$customer->name;

					$today = new DateTime();
					$dueDate = new DateTime($value->due_date);
					$diff = $today->diff($dueDate)->format("%a");

					if(isset($customers["$fullname"])) {
						$customers["$fullname"]['amount']	+= floatval($value->amount) / floatval($value->rate);
						if($dueDate<$today){
							$outstanding = $today->diff($dueDate)->format("%a");
							if(intval($diff)>90){
								$customers["$fullname"]['>90']+= floatval($value->amount) / floatval($value->rate);
							}else if(intval($diff)>60){
								$customers["$fullname"]['90'] += floatval($value->amount) / floatval($value->rate);
							}else if(intval($diff)>30){
								$customers["$fullname"]['60'] += floatval($value->amount) / floatval($value->rate);
							}
							// }else{
							// 	$customers["$fullname"]['30'] += floatval($value->amount) / floatval($value->rate);
							// }
						}else{
							$outstanding =0;
							// $customers["$fullname"]['<30'] += floatval($value->amount) / floatval($value->rate);
						}
					} else {
						$customers["$fullname"]['amount']	= floatval($value->amount) / floatval($value->rate);
						if($dueDate<$today){
							$outstanding = $today->diff($dueDate)->format("%a");
							if(intval($diff)>90){
								$customers["$fullname"]['>90']= floatval($value->amount) / floatval($value->rate);
							}else if(intval($diff)>60){
								$customers["$fullname"]['90'] = floatval($value->amount) / floatval($value->rate);
							}else if(intval($diff)>30){
								$customers["$fullname"]['60'] = floatval($value->amount) / floatval($value->rate);
							}else{
								$customers["$fullname"]['30'] = floatval($value->amount) / floatval($value->rate);
							}
						}else{
							$customers["$fullname"]['<30'] = floatval($value->amount) / floatval($value->rate);
							$outstanding =0;
						}
				//Results
					}
				
					$totalDay += $outstanding;
					$total += floatval($value->amount)/ floatval($value->rate);
					$aging = $totalDay/ $totalPurchase;
				}
			}
		}
		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'group' 		=> $key,
				'amount'		=> $value['amount'],
				'underThirty' 	=> isset($value['<30']) ? $value['<30'] : 0,
				'thirty'		=> isset($value['30']) ? $value['30'] : 0,
				'sixty' 		=> isset($value['60']) ? $value['60'] : 0,
				'ninety' 		=> isset($value['90']) ? $value['90'] : 0,
				'overNinety' 	=> isset($value['<90']) ? $value['<30'] : 0,
			);
		}
		$data['total'] = $total;
		$data['supplierCount'] = $supplierCount;
		$data['aging'] = $aging;
		$data['count'] = count($customers);
		//Response Data
		$this->response($data, 200);
	}

	function aging_detail_get() {
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
		$outstandingDay = 0;
		$totalDay = 0;
		$aging = 0;
		$totalPayable = 0;
		$supplierCount = 0;
		$totalPurchase = 0;

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
		$type->where('parent_id', 2)->get();

		$supplier = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$supplier->where('deleted <>', 1);
		$supplier->where('is_pattern <>', 1);
		$supplierCount = $supplier->where_in('contact_type_id', $type)->count();

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

				$txn->where("type", "Credit_Purchase");
				$txn->where_in("status", array(0,2));
				// $txn->where('job_id <> ' 0);
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted", 0);
				$txn->where("is_recurring",0);
				$txn->get_iterated();
				if($txn->exists()) {
					foreach ($txn as $t) {
						$totalPurchase +=1;
						$today = new DateTime();
						$dueDate = new DateTime($t->due_date);
						$diff = $today->diff($dueDate)->format("%a");

						if(isset($customers["$seg->name"])) {
							$customers["$seg->name"]['amount']	+= floatval($t->amount) / floatval($t->rate);
							$outstanding = 0; // days
							if($dueDate<$today){
								$outstandingDay = $today->diff($dueDate)->format("%a");
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
								$outstanding = '>30';
								$outstandingDay = 0;
							}
							$customers["$seg->name"]['transactions'][] = array(
								'id' => $t->id,
								'type' => $t->type,
								'date' => $t->issued_date,
								'number' => $t->number,
								'memo' => $t->memo2,
								'outstanding' => $diff,
								'amount' => floatval($t->amount) / floatval($t->rate)
							);
						} else {
							$customers["$seg->name"]['amount']	= floatval($t->amount) / floatval($t->rate);
							$outstanding = 0; // days
							if($dueDate<$today){
								$outstandingDay = $today->diff($dueDate)->format("%a");
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
								$outstandingDay = 0;
								$outstanding = '>30';
							}
							$customers["$seg->name"]['transactions'][] = array(
								'id' => $t->id,
								'type' => $t->type,
								'date' => $t->issued_date,
								'number' => $t->number,
								'memo' => $t->memo2,
								'outstanding' => $diff,
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
			$type->where('parent_id', 2)->get();

			$obj->where_related("contact", 'contact_type_id', $type);
			$obj->where("type", "Credit_Purchase");
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
					$totalPurchase +=1;
					$customer = $value->contact->get();
					$fullname = $customer->surname.' '.$customer->name;
					$items = $value->item_line->include_related('item', array('name'))->get();

					$today = new DateTime();
					$dueDate = new DateTime($value->due_date);
					$diff = $today->diff($dueDate)->format("%a");

					if(isset($customers["$fullname"])) {
						$customers["$fullname"]['amount']	+= floatval($value->amount) / floatval($value->rate);
						$outstanding = 0; // days
						if($dueDate<$today){
							$outstandingDay = $today->diff($dueDate)->format("%a");
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
							$outstandingDay = 0;
							$outstanding = '>30';
						}
						$customers["$fullname"]['transactions'][] = array(
							'id' => $value->id,
							'type' => $value->type,
							'date' => $value->issued_date,
							'number' => $value->number,
							'memo' => $value->memo2,
							'outstanding' => $diff,
							'amount' => floatval($value->amount) / floatval($value->rate)
						);
					} else {
						$customers["$fullname"]['amount']	= floatval($value->amount) / floatval($value->rate);
						$outstanding = 0; // days
						if($dueDate<$today){
							$outstandingDay = $today->diff($dueDate)->format("%a");
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
							$outstandingDay = 0;
							$outstanding = '>30';
						}
						$customers["$fullname"]['transactions'][] = array(
							'id' => $value->id,
							'type' => $value->type,
							'date' => $value->issued_date,
							'number' => $value->number,
							'memo' => $value->memo2,
							'outstanding' => $diff,
							'amount' => floatval($value->amount) / floatval($value->rate)
						);
				//Results
					}

					$totalDay += $outstandingDay;
					$total += floatval($value->amount)/ floatval($value->rate);
					$aging = $totalDay/ $totalPurchase;
				}
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
		$data['supplierCount'] = $supplierCount;
		$data['aging'] = $aging;
		$data['count'] = count($customers);
		//Response Data
		$this->response($data, 200);
	}

	function bill2pay_get() {
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
		$outstandingDay = 0;
		$totalDay = 0;
		$aging = 0;
		$totalPayable = 0;
		$supplierCount = 0;
		$totalPurchase = 0;

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
		$type->where('parent_id', 2)->get();

		$supplier = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$supplier->where('deleted <>', 1);
		$supplier->where('is_pattern <>', 1);
		$supplierCount = $supplier->where_in('contact_type_id', $type)->count();

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

				$txn->where("type", "Credit_Purchase");
				$txn->where_in("status", array(0,2));
				// $txn->where('job_id <> ' 0);
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted", 0);
				$txn->where("is_recurring",0);
				$txn->get_iterated();
				if($txn->exists()) {
					foreach ($txn as $t) {
						$totalPurchase +=1;
						$today = new DateTime();
						$dueDate = new DateTime($value->due_date);
						$diff = $today->diff($dueDate)->format("%a");
						$outstanding = 0;
						if($dueDate<$today){
							$outstandingDay = $today->diff($dueDate)->format("%a");
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
							$outstanding = '>30';
							$outstandingDay = 0;
						}

						if(isset($customers["$outstanding"])) {
							$customers["$outstanding"]['amount']	+= floatval($value->amount) / floatval($value->rate);
							 // days

							$customers["$outstanding"]['transactions'][] = array(
								'id' => $value->id,
								'type' => $value->type,
								'date' => $value->issued_date,
								'number' => $value->number,
								'memo' => $value->memo2,
								'amount' => floatval($value->amount) / floatval($value->rate)
							);
						} else {
							$customers["$outstanding"]['amount']	= floatval($value->amount) / floatval($value->rate);
							$customers["$outstanding"]['transactions'][] = array(
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
		} else {

			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->where('parent_id', 2)->get();

			$obj->where_related("contact", 'contact_type_id', $type);
			$obj->where("type", "Credit_Purchase");
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
					$totalPurchase +=1;
					$customer = $value->contact->get();
					$fullname = $customer->surname.' '.$customer->name;
					$items = $value->item_line->include_related('item', array('name'))->get();

					$today = new DateTime();
					$dueDate = new DateTime($value->due_date);
					$diff = $today->diff($dueDate)->format("%a");
					$outstanding = 0;
					if($dueDate<$today){
						$outstandingDay = $today->diff($dueDate)->format("%a");
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
						$outstandingDay = 0;
						$outstanding = '>30';
					}

					if(isset($customers["$outstanding"])) {
						$customers["$outstanding"]['amount']	+= floatval($value->amount) / floatval($value->rate);
						 // days

						$customers["$outstanding"]['transactions'][] = array(
							'id' => $value->id,
							'type' => $value->type,
							'date' => $value->issued_date,
							'number' => $value->number,
							'memo' => $value->memo2,
							'amount' => floatval($value->amount) / floatval($value->rate)
						);
					} else {
						$customers["$outstanding"]['amount']	= floatval($value->amount) / floatval($value->rate);
						$customers["$outstanding"]['transactions'][] = array(
							'id' => $value->id,
							'type' => $value->type,
							'date' => $value->issued_date,
							'number' => $value->number,
							'memo' => $value->memo2,
							'amount' => floatval($value->amount) / floatval($value->rate)
						);
				//Results
					}

					$totalDay += $outstandingDay;
					$total += floatval($value->amount)/ floatval($value->rate);
					$aging = $totalDay/ $totalPurchase;
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
		$data['supplierCount'] = $supplierCount;
		$data['aging'] = $aging;
		$data['count'] = count($customers);
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
			$type->where('parent_id', 2)->get();

			$obj->where_related("contact", 'contact_type_id', $type);
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

	function purchase_order_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;
		$products = array();
		$total = 0;
		$order = 0;
		$customers = array();

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
			if(isset($filters['filters'])) {
				foreach($filters['filters'] as $f) {
					$segmentItem->where($f['field'], $f['value']);
				}
			}
			$segmentItem->get();

			foreach ($segmentItem as $seg) {
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

				$txn->where("type", "Purchase_Order");
				$txn->where_in("status", array(0,2));
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted", 0);
				$txn->where("is_recurring",0);
				$txn->get_iterated();
				if($txn->exists()) {
					foreach ($txn as $t) {
						$items = $t->item_line->include_related('item', array('name', 'cost'))->get();
						$customer=$t->contact->get();
						foreach($items as $item) {
							$data['results'][] = array(
								'customer' => $customer->name,
								'PO'	   => isset($t->number)?$t->number:"",
								'item' => $item->item_name,
								'memo' => $t->memo,
								'cost' => $item->item_cost,
								'qty'  => $item->quantity,
								'price'=> $item->price,
								'amount'=> floatval($item->amount)/floatval($t->rate)
							);
							if(isset($products["$item->item_name"])) {
								
							} else {
								$products["$item->item_name"] = array();
							}
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
		} else {

			$obj->where('is_recurring', 0);
			$obj->where('status <>', 1);
			$obj->where("type", "Purchase_Order");
			$obj->where("deleted", 0);

			if(isset($filters['filters'])) {
				foreach($filters['filters'] as $f) {
					$obj->where($f['field'], $f['value']);
				}
			}

			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
			
			if($obj->result_count()>0){
				foreach ($obj as $value) {
					$items = $value->item_line->include_related('item', array('name', 'cost'))->get();
					$customer=$value->contact->get();
					foreach($items as $item) {
						$data['results'][] = array(
							'customer' => $customer->name,
							'PO'	   => $value->number,
							'item' => $item->item_name,
							'memo' => $value->memo,
							'cost' => $item->item_cost,
							'qty'  => $item->quantity,
							'price'=> $item->price,
							'amount'=> floatval($item->amount)/floatval($value->rate)
						);
						if(isset($products["$item->item_name"])) {
							
						} else {
							$products["$item->item_name"] = array();
						}
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
		$segments = 0;
		$supplierCount = 0;
		$order = 0;
		$totalBalance = 0;
		$openBalance = 0;
		$overDate = 0;

		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$type->where('parent_id', 2)->get();

		$supplier = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$supplierCount = $supplier->where_in('contact_type_id', $type)->count();
		// checked if the logic is customer or segment


		// Segment
		if($filters['logic'] == "segment") {
			$segmentItem = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$segmentItem->get();

			foreach ($segmentItem as $seg) {
				$segments +=1;
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

				$txn->where_in("type", array("Credit_Purchase", "Cash_Purchase"));
				$txn->where_in("status", array(0,2));
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted",0);
				$txn->where("is_recurring",0);
				$txn->get_iterated();

				foreach ($txn as $t) {
					$itemLine = $t->item_line->get();
					$amt = floatval($t->amount)/ floatval($t->rate);

					if(isset($customers["$seg->name"])) {
						$customers["$seg->name"]['amount']+= $amt;
					} else {
						$customers["$seg->name"]['amount']= $amt;
					}
					$a += 1;
				}
			}
		} else {
			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->where('parent_id', 2)->get();

			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where_related("contact", 'contact_type_id', $type);
			$obj->where('is_recurring', 0);
			$obj->where_in("type", array("Credit_Purchase", "Cash_Purchase", "Purchase_Order"));

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
					if(isset($customers["$fullname"])) {
						$customers["$fullname"]['amount']+= floatval($value->amount)/ floatval($value->rate);
					} else {
						$customers[$fullname]['amount']= floatval($value->amount)/ floatval($value->rate);
					}
					$itemLine = $value->item_line->get();
					foreach($itemLine as $line) {
						$item = $line->item->get();
						if(isset($items["$item->name"])) {
							$items["$item->name"]['qty'] += intval($line->quantity);
							$items["$item->name"]['amount'] += floatval($line->amount);
							$items["$item->name"]['price'] += floatval($line->price);
							$items["$item->name"]['cost'] += floatval($line->cost);
							$items["$item->name"]['gross_profit'] += (floatval($line->price)-floatval($line->cost)) * floatval($line->quantity);
						} else {
							$items["$item->name"]['qty'] = intval($line->quantity);
							$items["$item->name"]['amount'] = floatval($line->amount);
							$items["$item->name"]['price'] = floatval($line->price);
							$items["$item->name"]['cost'] = floatval($line->cost);
							$items["$item->name"]['rate'] = floatval($value->rate);
							$items["$item->name"]['gross_profit'] = (floatval($line->price)-floatval($line->cost)) * floatval($line->quantity);

						}						
					}					
					if($value->type == "Purchase_Order") {
						if($value->status !=1 ) {
							$order += 1;
						}						
					}
					if($value->type == "Credit_Purchase"||$value->type == "Cash_Purchase") {							
						$total += floatval($value->amount)/ floatval($value->rate);											
					}
					if($value->type == "Credit_Purchase") {	
						if($value->status !=1 ) {						
						$totalBalance += floatval($value->amount)/ floatval($value->rate);
						}											
					}
					if($value->type == "Credit_Purchase") {
						if($value->status ==2) {
							$openBalance += 1;
						}						
					}
					if($value->type == "Credit_Purchase") {
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
		$data['totalBalance'] = $totalBalance;
		$data['openBalance'] = $openBalance;
		$data['supplierCount'] = $supplierCount;
		$data['segments'] = $segments;
		$data['order'] = $order;
		$data['count'] = count($customers);
		$data['items'] = count($items);
		$this->response($data, 200);
	}
}//End Of Class
