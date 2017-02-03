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
		$cashPayment =0;
		$cashExpense =0;
		$cashPurchase =0;
		$totalCashSale =0;
		$totalCashReceipt =0;

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

				$txn->where_in("type", array("Cash_Sale)", "Cash_Receipt", "Cash_Payment", "Cash_Expense", "Cash_Purchase"));
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
			$obj->where_in("type", array("Cash_Sale)", "Cash_Receipt", "Cash_Payment", "Cash_Expense", "Cash_Purchase"));
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
						if($value->type == "Cash_Sale"){
							$totalCashSale += floatval($value->amount)/floatval($value->rate);
						}
						if($value->type == "Cash_Receipt"){
							$totalCashReceipt += floatval($value->amount)/floatval($value->rate);
						}
						if($value->type == "Cash_Payment"){
							$cashPayment +=floatval($value->amount)/floatval($value->rate);
						}
						if($value->type == "Cash_Expense"){
							$cashExpense += floatval($value->amount)/floatval($value->rate);
						}
						if($value->type == "Cash_Purchase"){
							$cashPurchase += floatval($value->amount)/floatval($value->rate);
						}
					}
				}
		}
		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'group' 	=> $key,
				'items'		=> $value['transactions'],
			);
		}

		$data['total'] = $totalCashSale + $totalCashReceipt - $cashPayment - $cashExpense - $cashPurchase;
		$data['totalSale'] = $totalCashSale + $totalCashReceipt ;
		$data['totalPurchase'] = $cashPayment + $cashExpense + $cashPurchase;
		$data['totalCashSale'] = $totalCashSale;
		$data['totalCashReceipt'] = $totalCashReceipt;
		$data['cashPayment'] = $cashPayment;
		$data['cashExpense'] = $cashExpense;
		$data['cashPurchase'] = $cashPurchase;

		//Response Data
		$this->response($data, 200);	
	}

	function cash_collection_get() {
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

			foreach ($segmentItem as $seg) {
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

				$txn->where_in("type", array("Cash_Payment", "Cash_Purchase", "Cash_Receipt"));
				$txn->where_in("status", array(0,2));
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted",0);
				$txn->where("is_recurring",0);
			
				$txn->get_iterated();

				foreach ($txn as $t) {
					$accounts = $t->accounts->include_related('account', array('name'))->get();
					$customer=$value->contact->get();
					$lines = array();
					foreach($accounts as $account) {
						$lines[] = array(
							'customer'  => $customer->name,
							'number'	=> $t->number,
							'account'   => $account->account_name,
							'date' 		=> $t->date,
							'type' 		=> $t->type,
							'amount'	=> floatval($t->amount)/floatval($t->rate)
						);
					}
				}
			}
		} else {
			// $obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');



			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->where('parent_id', 1)->get();
			$types = array();
			foreach($type as $t) {
				$types[] = $t->id;
			}

			$obj->where_in_related("contact", 'contact_type_id', $types);
			$obj->where('is_recurring', 0);
			$obj->where_in("type", array("Cash_Payment", "Cash_Purchase", "Cash_Receipt"));

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
					// $accounts = $value->account_line->include_related('account', 'name')->get();
					$line = $value->journal_line->include_related('account', array('number', 'name'))->get();
					$customer= $value->contact->get();
					// foreach($accounts as $account) {
						$data['results'][] = array(
							'id' 		=> $value->id,
							'contact'  	=> $customer->name,
							'number'	=> $value->number,
							'account'   => $line->account_number."-".$line->account_name,//$account->account_line_name,
							'date' 		=> $value->issued_date,
							'type' 		=> $value->type,
							'amount'	=> floatval($value->amount)/floatval($value->rate)
						);
					// }					
				}
			}
		}

		//Response Data
		$this->response($data, 200);
	}

	function cash_payment_get() {
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

			foreach ($segmentItem as $seg) {
				$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

				$obj->where("type","Cash_Payment");
				$txn->where_in("status", array(0,2));
				$txn->like("segments", $seg->id, "both");
				$txn->where("deleted",0);
				$txn->where("is_recurring",0);
			
				$txn->get_iterated();

				foreach ($txn as $t) {
					$accounts = $t->accounts->include_related('account', array('name'))->get();
					$customer=$value->contact->get();
					$lines = array();
					foreach($accounts as $account) {
						$lines[] = array(
							'customer'  => $customer->name,
							'number'	=> $t->number,
							'account'   => $account->account_name,
							'date' 		=> $t->date,
							'type' 		=> $t->type,
							'amount'	=> floatval($t->amount)/floatval($t->rate)
						);
					}
				}
			}
		} else {
			// $obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');



			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->where('parent_id', 2)->get();
			$types = array();
			foreach($type as $t) {
				$types[] = $t->id;
			}

			$obj->where_in_related("contact", 'contact_type_id', $types);
			$obj->where('is_recurring', 0);
			$obj->where("type","Cash_Payment");

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
					// $accounts = $value->account_line->include_related('account', 'name')->get();
					$line = $value->journal_line->include_related('account', array('number', 'name'))->get();
					$customer= $value->contact->get();
					// foreach($accounts as $account) {
						$data['results'][] = array(
							'id' 		=> $value->id,
							'contact'  	=> $customer->name,
							'number'	=> $value->number,
							'account'   => $line->account_number."-".$line->account_name,//$account->account_line_name,
							'date' 		=> $value->issued_date,
							'type' 		=> $value->type,
							'amount'	=> floatval($value->amount)/floatval($value->rate)
						);
					// }					
				}
			}
		}

		//Response Data
		$this->response($data, 200);
	}

}//End Of Class
