<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class UtibillReports extends REST_Controller {
	public $_database;
	public $server_host;
	public $server_user;
	public $server_pwd;
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
			date_default_timezone_set("$conn->time_zone");
		}
		// $this->_database = "db_banhji";

	}

	//****************HEANG******************
	//Summmary DashBoard
	function utillBill_summary_get() {
		ini_set('memory_limit', '2048M');
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		

		$obj = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    			if($value['field'] == "branch_id"){
	    				$obj->where($value['field'], $value['value']);
	    			}
	    		}
			}
		}

		//Results
		$obj->where("main_bloc", 0);
		$obj->where("main_pole", 0);
		$obj->order_by("id", "asc");
		$obj->get_iterated();
		$data["count"] = $obj->result_count();
		if($obj->exists()){
			foreach ($obj as $value) {
				$activeCount = 0;
				$inactiveCount = 0;
				$totalDeposit = 0;
				$totalSale = 0;
				$totalBalance = 0;
				$totalUsage = 0;
				$total = 0;
				$blockname = $value->name;
				//Number Of Custoemr active and inactive
				$con = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$con->where("location_id", $value->id)->get_iterated();
				foreach ($con as $key) {
					if ($key->status ==1){
						$activeCount += 1;
					}else{
						$inactiveCount += 1;
					}
				}
				//Total Sale and Balance
				$sale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$sale->where("is_recurring <>", 1);
				$sale->where("deleted <>", 1);
				$sale->where("location_id", $value->id)->get_iterated();

				foreach ($sale as $txn) {
					if ($txn->type=="Utility_Deposit"){
						$totalDeposit += $txn->amount;
					}else if ($txn->type=="Utility_Invoice"){
						if($txn->status == 1){
							$totalSale += $txn->amount / $txn->rate;
						}else{
							$totalBalance += $txn->amount / $txn->rate;
						}

					}else{
						$total += $txn->amount / $txn->rate;
					}
				}

				$meter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$meter->include_related('record', 'usage');
				$meter->where("location_id", $value->id)->get_iterated();
				foreach ($meter as $usage) {
					$totalUsage += $usage->record_usage;
				}


				$data["results"][] = array(
		 			"id" 				=> $value->id,
		 			"bloc_name" 		=> $blockname,
		 			"activeCount"		=> $activeCount,
		 			"inactiveCount"		=> $inactiveCount,
		 			"totalSale"			=> floatval($totalSale),
		 			"totalDeposit"		=> floatval($totalDeposit),
		 			"totalBalance"		=> floatval($totalBalance),
		 			"totalUsage"		=> $totalUsage
			 	);
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	//KPI Summmary
	function kpi_summary_get() {
		$filter     = $this->get("filter");		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;


		$obj = new Branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->order_by('id', 'asc');
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

		$obj->get_iterated();
		foreach($obj as $value) {
			$location = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$location->where('branch_id', $value->id);
			$location->where('main_bloc', 0);
			$location->where('main_pole', 0);
			$location->get_iterated();
			$nActiveMeter = 0;
			$totalAllowCustomer = 0;
			$totalActiveCustomer = 0;
			$totalAmount = 0;
			$avgIncome = 0;
			$totalUsage = 0;
			$nContact = 0;
			$avg = 0;
			$activeCount =0;
			$inActiveCount = 0;
			foreach($location as $loc) {
				$meter = $loc->meter->where('activated', 1)->get_iterated();
				foreach($meter as $c) {
					if($c->status == 1) {
						$activeCount += 1;
					} else {
						$inActiveCount += 1;
					}
				}

				$contact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$contact->where('use_water', '1');
				$nContact 		= $contact->count();

				$totalActiveCustomer = $value->max_customer == 0 ? 0: $activeCount / $value->max_customer;

				$totalAllowCustomer = $value->max_customer == 0 ? 0: ($nContact / intval($value->max_customer));

		
				$trxSale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$trxSale->where('type', 'Utility_Invoice');
				$trxSale->where('location_id', $loc->id)->get_iterated();
				foreach ($trxSale as $key) {
					$totalAmount += $key->amount / $key->rate;
				}
				

				$avgIncome = $activeCount == 0 ? 0 : ($totalAmount  / $activeCount);

				$meter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$meter->include_related('record', 'usage');
				$meter->where("location_id", $value->id)->get_iterated();
				foreach ($meter as $usage) {
					$totalUsage += $usage->record_usage;
				}

				//AVG usage per connection
				$AVGUsage = $totalUsage / $activeCount;

			}
			$data['results'][] = array(
				'id' => $value->id,
				'name'=>$value->name,
				'totalCustomer' => $activeCount,
				'totalAllowCustomer' => $totalAllowCustomer,
				'totalActiveCustomer' => $totalActiveCustomer,
				'avgIncome' => $avgIncome,
				'totalUsage' => $totalUsage,
				'avgUsage' => $AVGUsage,
				'totalAmount' => $totalAmount,
			);
		}
		$this->response($data, 200);
	}

	//Water Sale
	function sale_summary_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 10000;	
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$totalUsage = 0;

		$obj = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
		$obj->include_related("transaction/contact", array("abbr", "number", "name", "id"));
		$obj->where_related("transaction", "type", "Utility_Invoice");
		$obj->include_related("transaction/location", "name");
		$obj->include_related('meter_record', "usage");
		$obj->where("type", "tariff");
		$obj->where_related("transaction","deleted <>", 1);
		$obj->where_related("transaction","is_recurring <>", 1);
		// $obj->where_related("transaction/is_recurring <>", 1);
		// $obj->where_related("transaction/deleted <>", 1);
		$obj->get_iterated();

		if($obj->exists()){
			$objList = [];
			$usage = 0;
			$amount = 0;
			$price = 0;
			$totalCount = 0;
			foreach ($obj as $value) {	
				$usage = $value->meter_record_usage;
				$price = $value->amount;
				if ($usage < 1){
					$amount = 1 * $price; 
				}else{
					$amount = $usage*$price;
				}
					
				$totalUsage += $usage;
				$totalCount += 1;				
				
				if(isset($objList[$value->transaction_contact_id])){
					$objList[$value->transaction_contact_id]["invoice"] 		+= 1;
					$objList[$value->transaction_contact_id]["amount"] 			+= $amount;
					$objList[$value->transaction_contact_id]["usage"]			+= $usage;
				}else{
					$objList[$value->transaction_contact_id]["id"] 				= $value->transaction_contact_id;
					$objList[$value->transaction_contact_id]["name"] 			= $value->transaction_contact_abbr.$value->transaction_contact_number." ".$value->transaction_contact_name;
					$objList[$value->transaction_contact_id]["invoice"]			= 1;
					$objList[$value->transaction_contact_id]["location"]		= $value->transaction_location_name;
					$objList[$value->transaction_contact_id]["amount"]			= $amount;
					$objList[$value->transaction_contact_id]["usage"]			= $usage;
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data['totalUsage'] = $totalUsage;
			$data['totalCount'] = $totalCount;
			// $data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}
	function sale_detail_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$total = 0;
		$totalUser = 0;
		$totalUsage = 0;

		$obj = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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

		$obj->include_related("transaction/contact", array("abbr", "number", "name", "id"));
		$obj->where_related("transaction", "type", "Utility_Invoice");
		$obj->include_related("transaction/location", "name");
		$obj->include_related("transaction", array("type", "month_of", "issued_date", "number"));
		$obj->include_related('meter_record', "usage");
		$obj->where("type", "tariff");
		$obj->where_related("transaction","deleted <>", 1);
		$obj->where_related("transaction","is_recurring <>", 1);
		// $obj->where_related("transaction/is_recurring <>", 1);
		// $obj->where_related("transaction/deleted <>", 1);
		$obj->get_iterated();

		if($obj->exists()){
			$objList = [];
			$usage = 0;
			$amount = 0;
			$price = 0;
			foreach ($obj as $value) {								
				$usage = $value->meter_record_usage;
				$price = $value->amount;
				if ($usage < 1){
					$amount = 1 * $price; 
				}else{
					$amount = $usage*$price;
				}
				
				if(isset($objList[$value->transaction_contact_id])){
					$objList[$value->transaction_contact_id]["line"][] = array(
						"id" 				=> $value->id,
						"type" 				=> $value->transaction_type,
						"month" 			=> $value->transaction_month_of,
						"date" 				=> $value->transaction_issued_date,
						"location" 			=> $value->transaction_location_name,
						"number" 			=> $value->transaction_number,
						"usage" 			=> $usage,
						"amount"			=> $amount
					);
				}else{
					$objList[$value->transaction_contact_id]["id"] 		= $value->transaction_contact_id;
					$objList[$value->transaction_contact_id]["name"] 	= $value->transaction_contact_abbr.$value->transaction_contact_number." ".$value->transaction_contact_name;
					$objList[$value->transaction_contact_id]["line"][]	= array(
						"id" 				=> $value->id,
						"type" 				=> $value->transaction_type,
						"month" 			=> $value->transaction_month_of,
						"date" 				=> $value->transaction_issued_date,
						"location" 			=> $value->transaction_location_name,
						"number" 			=> $value->transaction_number,
						"usage" 			=> $usage,
						"amount"			=> $amount
					);
				}
				$total +=  $amount;
				$totalUser += 1;
				$totalUsage += $usage;
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data['total'] = $total;
			$data['totalUser'] = $totalUser;
			$data['totalUsage'] = $totalUsage;
			// $data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}
	function sale_total_get() {
		// ini_set('memory_limit', '2048M');
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    			if($value['field'] == "branch_id"){
	    				$obj->where($value['field'], $value['value']);
	    			}
	    		}
			}
		}

		//Results
		$obj->where("main_bloc", 0);
		$obj->where("main_pole", 0);
		$obj->order_by("id", "asc");
		$obj->get_iterated();
		$data["count"] = $obj->result_count();
		if($obj->exists()){
			foreach ($obj as $value) {
				$blockname = $value->name;
				//Number Of Custoemr
				$con = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$con->where("location_id", $value->id)->get_iterated();
				$customertotal = $con->result_count();
				//void
				$conv = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$conv->where("location_id", $value->id);
				$conv->where("status", 2)->get_iterated();
				$customerv = $conv->result_count();
				//Temp Data
				$tmp = new Tmp_total_sale(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$lastmonth = 0;
				$mo = "";
				//Filter		
				if(!empty($filter) && isset($filter)){
					$ii = 1;
			    	foreach ($filter["filters"] as $v) {
			    		if(isset($v['operator'])){
			    			$tmp->{$v['operator']}($v['field'], $v['value']);
			    		} else {
			    			if($v['field'] != "branch_id"){
			    				$tmp->where($v['field'], $v['value']);
			    				if($ii == 1){
			    					$mo = $v['value'];
			    				}
			    				$ii++;
			    			}
			    		}
					}
				}
				$tmp->where("location_id", $value->id)->limit(1)->get();
				//old ballance
				$d = new DateTime($mo);
				$d->modify('-1 month');
			    $d->modify('first day of this month');
			    $ob = new Tmp_total_sale(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			    $date = $d->format('Y-m-d');
			    $ob->where("month_of", "$date");
			    $ob->where("location_id", $value->id)->limit(1)->get();
			    if($ob->exists()){
			    	$lastmonth = floatval($ob->ending_ballance);
			    }
				//Result
				$subtotal = $tmp->amount + $tmp->maintenance + $tmp->installment + $tmp->exemption + $lastmonth;
				$total = $subtotal - $tmp->amount_recieved;
				$data["results"][] = array(
		 			"id" 				=> $value->id,
		 			"bloc_name" 		=> $blockname,
		 			"total_customer" 	=> intval($customertotal),
		 			"void_customer" 	=> intval($customerv),
		 			"total_usage" 		=> intval($tmp->usage),
		 			"amount_invoice" 	=> floatval($tmp->amount),
		 			"amount_maintenance" => floatval($tmp->maintenance),
		 			"amount_int" 		=> floatval($tmp->installment),
		 			"amount_other_service" => floatval($tmp->other_charge),
		 			"amount_exemption" 	=> floatval($tmp->exemption),
		 			"amount_fine" 		=> 0,
		 			"balance_last_month" => $lastmonth,
		 			"subtotal_amount" 	=> floatval($subtotal),
		 			"amount_receive" 	=> floatval($tmp->amount_recieved),
		 			"discount" 			=> floatval($tmp->discount),
		 			"ending_balance" 	=> floatval($tmp->ending_ballance),
		 			"total" 			=> floatval($total)
		 		);
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	//Fine Collect
	function fine_collect_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$total = 0;

		$obj = new Journal_Line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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

		$obj->include_related("transaction", array("issued_date", "number"));
		$obj->include_related("contact", array("abbr", "number", "name"));
		$obj->include_related('transaction/location', "name");
		$obj->where("account_id", "110");
		$obj->where("deleted <>", 1);
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {								
				$amount = floatval($value->cr)/ floatval($value->rate);
				
				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["line"][] = array(
						"id" 				=> $value->id,
						"type" 				=> $value->description,
						"date" 				=> $value->transaction_issued_date,
						"location" 			=> $value->transaction_location_name,
						"number" 			=> $value->transaction_number,
						"amount"			=> $amount
					);
				}else{
					$objList[$value->contact_id]["id"] 		= $value->contact_id;
					$objList[$value->contact_id]["name"] 	= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["line"][]	= array(
						"id" 				=> $value->id,
						"type" 				=> $value->description,
						"date" 				=> $value->transaction_issued_date,
						"location" 			=> $value->transaction_location_name,
						"number" 			=> $value->transaction_number,
						"amount"			=> $amount
					);
				}
				$total +=  $amount;
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

	//Discount Report
	function discount_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$total = 0;

		$obj = new Journal_Line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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

		$obj->include_related("transaction", array("issued_date", "number"));
		$obj->include_related("contact", array("abbr", "number", "name"));
		$obj->include_related('transaction/location', "name");
		$obj->where("description", "Utility Discount");
		$obj->where("account_id", "7");
		$obj->where("deleted <>", 1);
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {								
				$amount = floatval($value->dr)/ floatval($value->rate);
				
				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["line"][] = array(
						"id" 				=> $value->id,
						"type" 				=> $value->description,
						"date" 				=> $value->transaction_issued_date,
						"location" 			=> $value->transaction_location_name,
						"number" 			=> $value->transaction_number,
						"amount"			=> $amount
					);
				}else{
					$objList[$value->contact_id]["id"] 		= $value->contact_id;
					$objList[$value->contact_id]["name"] 	= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["line"][]	= array(
						"id" 				=> $value->id,
						"type" 				=> $value->description,
						"date" 				=> $value->transaction_issued_date,
						"location" 			=> $value->transaction_location_name,
						"number" 			=> $value->transaction_number,
						"amount"			=> $amount
					);
				}
				$total +=  $amount;
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
		$obj->include_related("location", "name");
		$obj->where("type", "Utility_Invoice");
		$obj->where_in("status", array(0,2));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				$amount = floatval($value->amount) / floatval($value->rate);

				if($value->status=="2"){
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);					
					$paid->where("reference_id", $value->id);
					$paid->where_in("type", array("Cash_Receipt", "Offset_Invoice"));
					$paid->where("is_recurring <>",1);
					$paid->where("deleted <>",1);
					$paid->select_sum("amount");
					$paid->select_sum("discount");
					$paid->get();
					$amount -= floatval($paid->amount) + floatval($paid->discount);
				}

				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["id"] 				= $value->id;
					$objList[$value->contact_id]["amount"] 			+= $amount;
					$objList[$value->contact_id]["number"] 			+= 1;
				}else{
					$objList[$value->contact_id]["id"] 				= $value->contact_id;
					$objList[$value->contact_id]["name"] 			= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["type"]			= $value->type;
					$objList[$value->contact_id]["issued_date"]		= $value->issued_date;
					$objList[$value->contact_id]["due_date"]		= $value->due_date;
					$objList[$value->contact_id]["location"]		= $value->location;
					$objList[$value->contact_id]["status"]			= $value->status;
					$objList[$value->contact_id]["number"] 			= 1;
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
		$obj->include_related("location", "name");
		$obj->where("type", "Utility_Invoice");
		$obj->where_in("status", array(0,2));
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				$amount = floatval($value->amount) / floatval($value->rate);

				if($value->status=="2"){
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					
					$paid->where("reference_id", $value->id);
					$paid->where_in("type", array("Cash_Receipt", "Offset_Invoice"));
					$paid->where("is_recurring <>",1);
					$paid->where("deleted <>",1);
					$paid->select_sum("amount");
					$paid->select_sum("discount");
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
						"location" 			=> $value->location_name,
						"amount" 			=> $amount
					);
				}else{
					$objList[$value->contact_id]["id"] 		= $value->contact_id;
					$objList[$value->contact_id]["name"] 	= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["line"][]	= array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"number" 			=> $value->number,
						"due_date" 			=> $value->due_date,
						"issued_date" 		=> $value->issued_date,
						"location" 			=> $value->location_name,
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


	//Account Receiveble Water
	function Reciveble_invoice_get() {
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
		$obj->include_related("contact", array("abbr", "number", "name", "phone"));
		$obj->include_related("location", array("name"));
		$obj->include_related("meter", array("number", "status"));
		$obj->where("type", "Utility_Invoice");
		$obj->where_in("status", array(0,2));
		$obj->where("amount >", 0);
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->get_iterated();
		
		if($obj->exists()){
			foreach ($obj as $value) {
				$amount = floatval($value->amount) / floatval($value->rate);
				$ref = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$ref->where("id", $value->box_id);
				$ref->get();

				$pole = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$pole->where("id", $value->pole_id);
				$pole->get();

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
				$pole = isset($pole->name)?$pole->name:"";
				$box = isset($ref->name)?$ref->name:"";
				$data["results"][] = array(
					"id" 				=> $value->id,
					"name" 				=> $value->contact_abbr.$value->contact_number." ".$value->contact_name,
					"phone" 			=> $value->contact_phone,
					"type" 				=> $value->type,
					"number" 			=> $value->number,
					"issued_date" 		=> $value->issued_date,
					"due_date" 			=> $value->due_date,
					"location" 			=> $value->location_name,
					"status"			=> $value->status,
					"statusMeter"		=> $value->meter_status,
					"box"				=> $box,	
					"pole"				=> $pole,	
					"rate" 				=> $value->rate,
					"meter"				=> $value->meter_number,
					"amount" 			=> $amount
				);
			}

			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	//balance List	
	function totalBalance_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$table = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$data = array();
		//Sort
		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				if(isset($value['operator'])){
					$table->{$value['operator']}($value["field"], $value["dir"]);
				}else{
					$table->order_by($value["field"], $value["dir"]);
				}
			}
		}
		//Filter
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter["filters"] as $value) {
	    		if(isset($value["operator"])) {
					$table->{$value["operator"]}($value["field"], $value["value"]);
				} else {
	    			$table->where($value["field"], $value["value"]);
				}
			}
		}
		// $table->where('status <>', 1);
		$table->where('deleted', 0);
		$table->where('journal_type <>', 'journal' );
		$table->where('type','Utility_Invoice');
		// $table->limit(2); //For testing speed purpose ai Chouen ery :(

		//Results
		if($page && $limit){
			$table->get_paged_iterated($page, $limit);
			$data["count"] = $table->paged->total_rows;
		}else{
			$table->get_iterated();
			$data["count"] = $table->result_count();
		}
		if($table->exists()){
			foreach($table as $row) {
				$meter = [];
				$mtnumber = "";
				$mtorder = "";
				$invoiceCount = 1;
				$mtid = "";
				$locale = $row->locale;
				$location = $row->location->get_raw();
				$invoiceLine = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$invoiceLine->where('transaction_id', $row->id);
				$invoiceLine->get();
				if($invoiceLine->exists()) {
					foreach($invoiceLine as $line) {
						if($line->type == "usage"){
							$meter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$meter->where("id", $line->item_id)->limit(1)->get();
							if($meter->exists()) {
								$plan = $meter->plan->get();
								$l = $plan->currency->get();
								$locale = $l->locale;
								$boxname = "";
								$polename = "";
								if($meter->box_id != 0){
									$box = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
									$box->where("id", $meter->box_id)->limit(1)->get();
									$boxname = $box->name;
								}
								if($meter->pole_id != 0){
									$pol = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
									$pol->where("id", $meter->pole_id)->limit(1)->get();
									$polename = $pol->name;
								}
								$meter = array(
									'meter_number'   => $meter->number,
									'meter_order'   => $meter->worder,
									'meter_multiplier'   => $meter->multiplier,
									'meter_id'   => $meter->id,
									'location' => $location->result(),
									'box' => $boxname,
									'pole' => $polename,
									'plan_locale' => $locale,
									'branch_id' => $meter->branch_id
								);
							}
						}
					}
				}

				// $items  = $row->winvoice_line->get();
				$items = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$items->where("transaction_id", $row->id);
				$items->get();

				$lines  = [];
				
				$usage = 0;
				$remain = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$remain->where("meter_id", $row->meter_id);
				$remain->where("type", "Utility_Invoice");
				$remain->where("month_of <", $row->month_of);
				$remain->where("id <>", $row->id);
				$remain->where("deleted", 0);
				$remain->where("status <>", 1)->get_iterated();
				$amountOwed = 0;
				$fineAmount = 0;
				foreach($remain as $rem) {
					$fine = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$fine->where("transaction_id", $rem->id);
					$fine->where("type", "fine")->order_by("id", "desc")->limit(1)->get();
					if($fine->exists()){
						$dueDate = new DateTime($rem->due_date);
						$ddate = $dueDate->getTimestamp();
						$fineDate = new DateTime(date('Y-m-d'));
						$fdate = $fineDate->getTimestamp();
						if($fdate > $ddate){
							$fineDate = $fineDate->diff($dueDate)->days;
							$fineDateAmount = intval($fine->quantity);
							if($fineDate >= $fineDateAmount){
								$fineAmount = floatval($fine->amount);
							}
						}
					}
					$amountOwed += $rem->amount + $fineAmount;
					if($rem->status == 2) {
						$qu = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$qu->where("type", "Cash_Receipt");
						$qu->where("reference_id", $rem->id)->get();
						foreach($qu as $q){
							$amountOwed -= floatval($q->amount);
						};
					}
				}

				foreach($items as $item) {
					if($item->type == 'usage') {
						$record = $item->meter_record->include_related("meter", array("number"))->limit(1)->get();

						$usage = $record->usage;
						$lines[] = array(
							'number' => $record->meter_number,
							'previous' => floatval($record->previous),
							'current'  => floatval($record->current),
							'consumption' => floatval($record->usage),
							'rate' => floatval($item->rate),
							'amount' => floatval($item->amount),
							'type' => $item->type,
							'from_date' => $record->from_date,
							'to_date' => $record->to_date
						);
					}else if($item->type == 'exemption') {
						$unit = $item->item->limit(1)->get();
						$usage = $record->usage;
						$lines[] = array(
							'number' => $item->description,
							'previous' => floatval($record->previous),
							'current'  => floatval($record->current),
							'consumption' => floatval($record->usage),
							'rate' => floatval($item->rate),
							'amount' => floatval($item->amount),
							'type' => $item->type,
							'unit' => $unit->unit
						);
					}else if($item->type == 'installment') {
						if($item->amount != 0){
							$unit = $item->item->limit(1)->get();
							$usage = $record->usage;
							$lines[] = array(
								'number' => "រំលោះ",
								'previous' => floatval($record->previous),
								'current'  => floatval($record->current),
								'consumption' => floatval($record->usage),
								'rate' => floatval($item->rate),
								'amount' => floatval($item->amount),
								'type' => $item->type,
								'unit' => $unit->unit
							);
						}
					}else if($item->type == 'meter' || $item->type == 'reactive') {
						$meterdate = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$meterdate->where("id", $item->meter_record_id)->order_by("id", "desc")->limit(1)->get();
						$lines[] = array(
							'number' => $item->description,
							'previous' => floatval($meterdate->previous),
							'current'  => floatval($meterdate->current),
							'consumption' => floatval($meterdate->usage),
							'rate' => floatval($item->rate),
							'amount' => floatval($item->amount),
							'type' => $item->type,
							'from_date' => $meterdate->from_date,
							'to_date' => $meterdate->to_date
						);
					}else if($item->type == 'total_usage') {
						$lines[] = array(
							'number' => $item->description,
							'price' => floatval($item->price),
							'current'  => floatval($item->quantity),
							'consumption' => intval($item->amount),
							'rate' => floatval($item->meter_record_id),
							'amount' => intval($item->amount),
							'type' => $item->type,
							'unit' => 1
						);
					}else{
						$lines[] = array(
							'number' => $item->description,
							'previous' => floatval($item->previous),
							'current'  => floatval($item->current),
							'consumption' => floatval($item->quantity),
							'rate' => 0,
							'amount' => floatval($item->amount),
							'type' => $item->type
						);
					}
				}
				$monthGraph = "";
				if(empty($meter)){
					$meter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$meter->where("id", $row->meter_id)->limit(1)->get();
					if($meter->exists()) {
						$plan = $meter->plan->get();
						$l = $plan->currency->get();
						$locale = $l->locale;
						$boxname = "";
						if($meter->box_id != 0){
							$box = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$box->where("id", $meter->box_id)->limit(1)->get();
							$boxname = $box->name;
						}
						$meter = array(
							'meter_number'   => $meter->number,
							'meter_order'   => $meter->worder,
							'meter_multipier'   => $meter->multiplier,
							'meter_id'   => $meter->id,
							'location' => $location->result(),
							'box' => $boxname,
							'plan_locale' => $locale
						);
					}
				}
				$contact = $row->contact->get();
				$address = "";
				if(isset($contact->address) && $contact->address != NULL){
					$address = $contact->address;
				}else{
					$address = "";
				}
				$data["results"][] = array(
					'id' => $row->id,
					'type' => $row->type,
					'number' => $row->number,
					'month_of' => date('m', strtotime($row->month_of)),
					'status'=> $row->status,
					'amount'  => floatval($row->amount),
					'locale' => $locale,
					'invoiceCount' => $invoiceCount,
					'consumption' => $usage,
					'formcolor' => '',
					// 'minusMonth' => $minusM,
					'contact' => array(
						'id' => $row->contact_id,
						'name' => $contact->name,
						'phone' => isset($contact->phone) ? $contact->phone : '',
						'abbr' => $contact->abbr,
						'number' => $contact->number,
						'address'=> $address
					),
					'amount_remain' => floatval($amountOwed),
					'meter'=> $meter,
					'invoice_lines'=> $lines
				);

			}
		}
		//Response Data
		$this->response($data, 200);
	}

	//Deposit
	function deposit_get() {
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
		$obj->include_related("location", "name");
		$obj->where("type", "Utility_Deposit");
		$obj->where("is_recurring <>", 1);
		$obj->where("status <>", 1);
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
						"location" 			=> $value->location_name,
						"amount" 			=> $amount,
						"reference" 		=> $reference
					);
				}else{
					//Balance Forward
					$bf = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);					
					$bf->where("issued_date <", $value->issued_date);
					$bf->where("contact_id", $value->contact_id);
					$bf->where("type", "Water_Deposit");
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
						"location" 			=> $value->location_name,
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
	
	//Customer Aging
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
		$obj->include_related("location", "name");
		$obj->where("type", "Utility_Invoice");
		$obj->where_in("status", array(0,2));
		$obj->where("amount >", 0);
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
					$paid->where("month_of", $value->id);
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
		$obj->include_related("location", "name");
		$obj->where("type", "Utility_Invoice");
		$obj->where_in("status", array(0,2));
		$obj->where("is_recurring <>", 1);
		$obj->where("amount >", 0);
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
					$paid->where("month_of", $value->id);
					$paid->where_in("type", array("Cash_Receipt", "Offset_Invoice"));
					$paid->where("is_recurring <>",1);
					$paid->where("deleted <>",1);
					$paid->get();
					$amount -= floatval($paid->amount) + floatval($paid->discount);
				}

				$wi = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$wi->where('type', 'usage');
				$wi->where('transaction_id', $value->id)->limit(1)->get();

				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["line"][] = array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"number" 			=> $value->number,
						"issued_date" 		=> $value->issued_date,
						"due_date" 			=> $value->due_date,
						"memo" 				=> $value->memo,
						"status"			=> $value->status,
						"location" 			=> $value->location_name,
						"rate" 				=> $value->rate,
						"amount" 			=> $amount,
						"usage"				=> floatval($wi->quantity),
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
						"location" 			=> $value->location_name,
						"rate" 				=> $value->rate,
						"amount" 			=> $amount,
						"usage"				=> floatval($wi->quantity),
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

	//Cash Receipt Detail 
	function cash_receipt_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$cashReceipt = 0;
		$total = 0;
		$totalReceipt = 0;

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
		$obj->include_related("location", "name");
		$obj->where("type", "Cash_Receipt");
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
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
				//Reference
				$ref = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$ref->select("type, number, issued_date, amount, deposit, rate");
				$ref->where("type", "Utility_Invoice");
				$ref->where("id", $value->reference_id)->get();						
				$refAmount =  floatval($ref->amount) - floatval($ref->deposit) ;
				$cashReceipt +=1;
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
						"location" 				=> $value->location_name,
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
						"location" 				=> $value->location_name,
						"reference_type" 		=> $ref->type,
						"reference_number" 		=> $ref->number,
						"reference_issued_date" => $ref->issued_date,
						"reference_amount" 		=> $refAmount
					);			
				}
				$total += $refAmount;
				$totalReceipt += $amount;
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data['total'] = $total;
			$data['totalReceipt'] = $totalReceipt;
			$data['cashReceipt'] = $cashReceipt;
			// $data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	//Cash Receipt Source 
	function cash_receipt_source_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$total = 0;
		$totalCustomer = 0;

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
		$obj->include_related("payment_method", "name");
		$obj->include_related("location", "name");
		$obj->where("type", "Cash_Receipt");
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				//Reference
				$ref = $value->reference->select("type, number, issued_date, amount, deposit, rate")->get();				
				$refAmount = (floatval($ref->amount) - floatval($ref->deposit));

				$amount = (floatval($value->amount) - floatval($value->deposit));

				if(isset($objList[$value->payment_method_name])){
					$objList[$value->payment_method_name]["line"][] = array(
						"id" 					=> $value->id,
						"name" 					=> $value->contact_abbr.$value->contact_number." ".$value->contact_name,
						"number" 				=> $value->number,
						"date" 					=> $value->issued_date,
						"location" 				=> $value->location_name,
						"rate" 					=> $value->rate,
						"amount" 				=> $amount
					);
				}else{
					$objList[$value->payment_method_name]["id"] 		= $value->payment_method_name;
					$objList[$value->payment_method_name]["payment"] 	= $value->payment_method_name;
					$objList[$value->payment_method_name]["line"][] 	= array(
						"id" 					=> $value->id,
						"type" 					=> $value->type,
						"name" 					=> $value->contact_abbr.$value->contact_number." ".$value->contact_name,
						"number" 				=> $value->number,
						"date" 					=> $value->issued_date,
						"location" 				=> $value->location_name,
						"rate" 					=> $value->rate,
						"amount" 				=> $amount
					);
				}
				$total += $amount;
				$totalCustomer +=1;
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data['total'] = $total;
			$data['totalCustomer'] = $totalCustomer;
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	//Cash Receipt Source 
	function cash_receipt_user_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$total = 0;
		$totalUser = 0;

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
		$obj->include_related("location", "name");
		$obj->where("type", "Cash_Receipt");
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				//Reference
				$ref = $value->reference->select("type, number, issued_date, amount, deposit, rate")->get();				
				$refAmount = floatval($ref->amount) - floatval($ref->deposit);

				$amount = (floatval($value->amount) - floatval($value->deposit)) / floatval($value->rate);
				$user = new User();
				$user->where("id", $value->user_id)->get();

				if(isset($objList[$value->user_id])){
					$objList[$value->user_id]["line"][] = array(
						"id" 					=> $value->id,
						"name" 					=> $value->contact_abbr.$value->contact_number." ".$value->contact_name,
						"number" 				=> $value->number,
						"date" 					=> $value->issued_date,
						"location" 				=> $value->location_name,
						"rate" 					=> $value->rate,
						"amount" 				=> $amount,
					);
				}else{
					$objList[$value->user_id]["id"] 		= $value->user_id;
					$objList[$value->user_id]["payment"] 	= $user->last_name." ".$user->first_name;
					$objList[$value->user_id]["line"][] 	= array(
						"id" 					=> $value->id,
						"type" 					=> $value->type,
						"name" 					=> $value->contact_abbr.$value->contact_number." ".$value->contact_name,
						"number" 				=> $value->number,
						"date" 					=> $value->issued_date,
						"location" 				=> $value->location_name,
						"rate" 					=> $value->rate,
						"amount" 				=> $amount,
					);
				}
				$total += $amount;
				$totalUser += 1;
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data['total'] = $total;
			$data['totalUser'] = $totalUser;
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	//Cash Receipt Daily
	function daily_cash_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 10000;	
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
		$obj->include_related("location", "name");
		$obj->where("type", "Cash_Receipt");
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		// $obj->get_iterated();
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
				$amount = floatval($value->amount) / floatval($value->rate);
				if(isset($objList[$value->location_id])){
					$objList[$value->location_id]["customer"] 		+= 1;
					$objList[$value->location_id]["amount"] 		+= $amount;
				}else{
					$objList[$value->location_id]["id"] 			= $value->location_id;
					$objList[$value->location_id]["name"] 			= $value->location_name;
					$objList[$value->location_id]["customer"]		= 1;
					$objList[$value->location_id]["amount"]			= $amount;
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			// $data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	//Cash Receipt Daily employee
	function daily_cash_employee_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 10000;	
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
		$obj->include_related("location", "name");
		$obj->where("type", "Cash_Receipt");
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		// $obj->get_iterated();
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
				$user = new User();
				$user->where("id", $value->user_id)->get();				
				$amount = floatval($value->amount) / floatval($value->rate);
				
				if(isset($objList[$value->user_id])){
					$objList[$value->user_id]["customer"] 		+= 1;
					$objList[$value->user_id]["amount"] 		+= $amount;
				}else{
					$objList[$value->user_id]["id"] 			= $value->user_id;
					$objList[$value->user_id]["name"] 			= $user->last_name." ".$user->first_name;
					$objList[$value->user_id]["customer"]		= 1;
					$objList[$value->user_id]["amount"]			= $amount;
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			// $data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	//For cashier only
	function daily_cash_employee_cashier_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 10000;	
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
		$obj->include_related("location", "name");
		$obj->where("type", "Cash_Receipt");
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		// $obj->get_iterated();
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
				$user = new User();
				$user->where("id", $value->user_id)->get();				
				$amount = floatval($value->amount) / floatval($value->rate);
				if(isset($objList[$value->user_id])){
					if(isset($objList[$value->location_id])){
						$objList[$value->location_id]["name"] 			= "";
						$objList[$value->location_id]["location"] 		=  $value->location_name;
						$objList[$value->location_id]["customer"] 		+= 1;
						$objList[$value->location_id]["amount"] 		+= $amount;
					}else{
						$objList[$value->location_id]["name"] 			= "";
						$objList[$value->location_id]["location"] 		= $value->location_name;
						$objList[$value->location_id]["customer"]		= 1;
						$objList[$value->location_id]["amount"]			= $amount;
					}
					
				}else{
					$objList[$value->user_id]["id"] 					= $value->user_id;
					$objList[$value->user_id]["name"] 					= $user->last_name." ".$user->first_name;
					$objList[$value->user_id]["location"] 				= "";
					$objList[$value->user_id]["customer"] 				= 0;
					$objList[$value->user_id]["amount"] 				= 0;
					if(isset($objList[$value->location_id])){
						$objList[$value->location_id]["name"] 			= "";
						$objList[$value->location_id]["location"] 		=  $value->location_name;
						$objList[$value->location_id]["customer"] 		+= 1;
						$objList[$value->location_id]["amount"] 		+= $amount;
					}else{
						$objList[$value->location_id]["name"] 			= "";
						$objList[$value->location_id]["location"] 		= $value->location_name;
						$objList[$value->location_id]["customer"]		= 1;
						$objList[$value->location_id]["amount"]			= $amount;
					}
				}
				$total += $amount;
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data['total'] = $total;
		}

		//Response Data
		$this->response($data, 200);
	}

	//Connnection Service Revenue
	function connect_service_revenue_get() {
		$filter     = $this->get("filter");
        $page       = $this->get('page') !== false ? $this->get('page') : 1;        
        $limit      = $this->get('limit') !== false ? $this->get('limit') : 10000;  
        $sort       = $this->get("sort");
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
		$obj->include_related("location", "name");
		$obj->include_related('location/branch', "name");
		// $obj->include_related("meter", "created_at");
		$obj->where("type", "invoice");
		$obj->where("meter_id <>", 0);
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		// $obj->get_iterated();
		//page size

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
				$amount = floatval($value->amount)/ floatval($value->rate);
				
				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["line"][] = array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"date" 				=> $value->issued_date,
						"location" 			=> $value->location_name,
						"number" 			=> $value->number,
						"branch" 			=> $value->location_branch_name,
						"amount"			=> $amount
					);
				}else{
					$objList[$value->contact_id]["id"] 		= $value->contact_id;
					$objList[$value->contact_id]["name"] 	= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["line"][]	= array(
						"id" 				=> $value->id,
						"type" 				=> $value->type,
						"date" 				=> $value->issued_date,
						"location" 			=> $value->location_name,
						"number" 			=> $value->number,
						"branch" 			=> $value->location_branch_name,
						"amount"			=> $amount
					);
				}
				$total +=  $amount;
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data['total'] = $total;
			// $data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	//Customer List
	function customer_list_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 10000;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
	

		$obj = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
		$obj->include_related('meter/contact', array("abbr", "number", "address", "phone", "name", "status", "id"));
		$obj->include_related('meter/property', array("abbr", "name"));
		$obj->include_related('meter/location', "name");
		$obj->include_related('meter/branch', "name" );
		$obj->include_related('meter', array("number", "status", "location_id", "pole_id", "box_id"));
		$obj->get_paged_iterated($page, $limit);
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {								
				
				if(isset($objList[$value->meter_contact_id])){
					$objList[$value->meter_contact_id]["line"][] = array(
						"id"		=> $value->id,
						"number"	=> $value->meter_contact_number,
						"meter"		=> $value->meter_number,
						"location"  => $value->meter_location_name,
						"branch"	=> $value->meter_branch_name,
						"status"	=> $value->meter_status,
						"previous"	=> $value->previous,						
						"current"	=> $value->current,
						"month_of" 	=> $value->month_of,
						"property"	=> $value->meter_property_name,
					);
				}else{
					$objList[$value->meter_contact_id]["id"] 		= $value->meter_contact_id;					
					$objList[$value->meter_contact_id]["number"] 	= $value->meter_contact_abbr.$value->meter_contact_number;
					$objList[$value->meter_contact_id]["name"] 		= $value->meter_contact_name;
					$objList[$value->meter_contact_id]["line"][]	= array(
						"id"		=> $value->id,
						"number"	=> $value->meter_contact_number,
						"meter"		=> $value->meter_number,
						"location"  => $value->meter_location_name,
						"branch"	=> $value->meter_branch_name,
						"status"	=> $value->meter_status,
						"previous"	=> $value->previous,
						"current"	=> $value->current,
						"month_of" 	=> $value->month_of,
						"property"	=> $value->meter_property_name,
					);
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = $obj->paged->total_rows;
			$data["currentPage"] = $obj->paged->current_page;
		}

		//Response Data
		$this->response($data, 200);
	}

	//Disconnection List
	function disconnection_list_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
		$total = 0;
	

		$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
		$obj->include_related('contact', array("abbr", "number", "address", "phone", "name", "status"));
		$obj->include_related('transaction', "amount");
		$obj->include_related('location', "name");
		$obj->where("status", 0);
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {								
				
				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["line"][] = array(
						"id"			=> $value->id,
						"meter"			=> $value->number,
						"location"		=> $value->location_name,
						"amount"		=> floatval($value->transaction_amount),

					);
				}else{
					$objList[$value->contact_id]["id"] 			= $value->contact_id;					
					$objList[$value->contact_id]["name"] 		= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["line"][]		= array(
						"id"		=> $value->id,
						"meter"		=> $value->number,
						"location"		=> $value->location_name,
						"amount"	=> floatval($value->transaction_amount),
					);
				}
				$total += floatval($value->transaction_amount);
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
			$data["total"] = $total;
		}

		//Response Data
		$this->response($data, 200);
	}

	//to be connection List
	function to_be_connection_list_get() {
		$filters 	= $this->get("filter");		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$is_pattern = 0;

		$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){				
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Filter		
		if(!empty($filters) && isset($filters['filters'])){
	    	foreach ($filters['filters'] as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}
		$obj->include_related("contact", array("abbr", "number", "name", "email", "address", "phone", "id"));
		$obj->include_related("location", "name");
		$obj->include_related("branch", "name");
		$obj->where('status', 1);
		$obj->where("activated", 0);
		$obj->get_paged_iterated($page, $limit);
		if($obj->exists()) {
			$data = array();
			foreach($obj as $value) {
				//$utility = $row->contact->include_related('utility', array('abbr', 'code'))->get();
				$data[] = array(
					"id" 		=> $value->id,
					"name"		=> $value->contact_abbr.$value->contact_number." ".$value->contact_name,
					"license" 	=> $value->branch_name,
					"number" 	=> $value->contact_abbr ."-". $value->contact_number,
					"phone"     => $value->contact_phone,
					"address"	=> $value->contact_address,
					"dataUsed" 	=> $value->date_used,
					"meter_number" => $value->number
				);
			}
			$this->response(array('results' => $data, 'count' => $obj->paged->total_rows), 200);
		} else {
			$this->response(array('results'=> array()));
		}
	}

	//connection list
	function connection_list_get() {
		$filters 	= $this->get("filter");		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$is_pattern = 0;

		$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){				
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Filter		
		if(!empty($filters) && isset($filters['filters'])){
	    	foreach ($filters['filters'] as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}
		$obj->include_related("contact", array("abbr", "number", "name", "email", "address", "phone", "id"));
		$obj->include_related("location", "name");
		$obj->include_related("branch", "name");
		$obj->where('status', 1);
		$obj->where("activated", 1);
		$obj->get_paged_iterated($page, $limit);
		if($obj->exists()) {
			$data = array();
			foreach($obj as $value) {
				//$utility = $row->contact->include_related('utility', array('abbr', 'code'))->get();
				$data[] = array(
					"id" 			=> $value->id,
					"name"			=> $value->contact_abbr.$value->contact_number." ".$value->contact_name,
					"location" 		=> $value->location_name,
					"number" 		=> $value->contact_abbr ."-". $value->contact_number,
					"phone"     	=> $value->contact_phone,
					"address"		=> $value->contact_address,
					"dataUsed" 		=> $value->updated_at,
					"meter_number" 	=> $value->number
				);
			}
			$this->response(array('results' => $data, 'count' => $obj->paged->total_rows), 200);
		} else {
			$this->response(array('results'=> array()));
		}
	}

	//inactive List
	function inactive_list_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;
	

		$obj = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
		$obj->include_related('meter/contact', array("abbr", "number", "address", "phone", "name", "status", "id"));
		$obj->include_related('meter/property', array("abbr", "name"));
		$obj->include_related('meter/location', "name");
		$obj->include_related('meter/branch', "name" );
		$obj->include_related('meter', array("number", "status", "location_id", "pole_id", "box_id"));
		$obj->where_related("meter", "status", 2);
		$obj->get_paged_iterated($page, $limit);
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {								
				
				if(isset($objList[$value->meter_contact_id])){
					$objList[$value->meter_contact_id]["line"][] = array(
						"id"		=> $value->id,
						"number"	=> $value->meter_contact_number,
						"meter"		=> $value->meter_number,
						"location"  => $value->meter_location_name,
						"branch"	=> $value->meter_branch_name,
						"status"	=> $value->meter_status,
						"previous"	=> $value->previous,						
						"current"	=> $value->current,
						"month_of" 	=> $value->month_of,
						"property"	=> $value->meter_property_name,
					);
				}else{
					$objList[$value->meter_contact_id]["id"] 		= $value->meter_contact_id;					
					$objList[$value->meter_contact_id]["number"] 	= $value->meter_contact_abbr.$value->meter_contact_number;
					$objList[$value->meter_contact_id]["name"] 		= $value->meter_contact_name;
					$objList[$value->meter_contact_id]["line"][]	= array(
						"id"		=> $value->id,
						"number"	=> $value->meter_contact_number,
						"meter"		=> $value->meter_number,
						"location"  => $value->meter_location_name,
						"branch"	=> $value->meter_branch_name,
						"status"	=> $value->meter_status,
						"previous"	=> $value->previous,
						"current"	=> $value->current,
						"month_of" 	=> $value->month_of,
						"property"	=> $value->meter_property_name,
					);
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = $obj->paged->total_rows;
			$data["currentPage"] = $obj->paged->current_page;
		}

		//Response Data
		$this->response($data, 200);
	}

	//To be Disconnection List
	function to_be_disconnection_list_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
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
		$obj->include_related("contact", array("abbr", "number", "name", "phone"));
		$obj->include_related("location", "name");
		$obj->include_related("meter", "number");
		$obj->include_related("meter/branch", "name");
		$obj->include_related("meter/location", "name");
		$obj->where("type", "Utility_Invoice");
		$obj->where_in("status", array(0,2));
		$obj->where("deleted <>", 1);
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			$contactCount = 1;
			foreach ($obj as $value) {
				$ref = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$ref->where("id", $value->box_id);
				$ref->get();


				$amount = floatval($value->amount) / floatval($value->rate);

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

				if(isset($objList[$value->location_id])){

					if(isset($objList[$value->contact_id])){
						$objList[$value->contact_id]["line"][] = array(
						"id" 				=> $value->id,
						"phone"				=> $value->contact_phone,
						"meter_number"		=> $value->meter_number,
						"due_date"			=> $value->due_date,
						"box"				=> $ref->name,	
						"contactCount"		=> $contactCount,
						"amount" 			=> $amount
						);
					}else{
						$objList[$value->contact_id]["id"] 	= $value->contact_id;
						$objList[$value->contact_id]["name"] 	= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
						$objList[$value->contact_id]["location_name"] 	= "";
						$objList[$value->contact_id]["line"][]	= array(
						"id" 				=> $value->id,
						"phone"				=> $value->contact_phone,
						"meter_number"		=> $value->meter_number,
						"due_date"			=> $value->due_date,
						"box"				=> $ref->name,
						"contactCount"		=> $contactCount,
						"amount" 			=> $amount
						);
					}
					
				}else{
					$objList[$value->location_id]["id"] 	= $value->location_id;
					$objList[$value->location_id]["location_name"] 	= $value->location_name;
					$objList[$value->location_id]["line"] 	= [];
					if(isset($objList[$value->contact_id])){
						$objList[$value->contact_id]["line"][] = array(
						"id" 				=> $value->id,
						"phone"				=> $value->contact_phone,
						"meter_number"		=> $value->meter_number,
						"due_date"			=> $value->due_date,
						"box"				=> $ref->name,	
						"contactCount"		=> $contactCount,
						"amount" 			=> $amount
						);
					}else{
						$objList[$value->contact_id]["id"] 	= $value->contact_id;
						$objList[$value->contact_id]["name"] 	= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
						$objList[$value->contact_id]["location_name"] 	= "";
						$objList[$value->contact_id]["line"][]	= array(
						"id" 				=> $value->id,
						"phone"				=> $value->contact_phone,
						"meter_number"		=> $value->meter_number,
						"due_date"			=> $value->due_date,
						"box"				=> $ref->name,
						"contactCount"		=> $contactCount,
						"amount" 			=> $amount
						);
					}
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

	//New Customer List
	function newProperty_list_get() {
		$filters 	= $this->get("filter");		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$is_pattern = 0;
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){				
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Filter		
		if(!empty($filters) && isset($filters['filters'])){
	    	foreach ($filters['filters'] as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}
		$obj->include_related("property", array("id", "abbr", "name", "address"));
		$obj->get_paged_iterated($page, $limit);
		if($obj->exists()) {
			$data = array();
			$objList = [];
			foreach($obj as $value) {
				//$utility = $row->contact->include_related('utility', array('abbr', 'code'))->get();

		
					if(isset($objList[$value->contact_id])){
						$objList[$value->contact_id]["invoice"] 		+= 1;
					}else{
						$objList[$value->contact_id]["invoice"]			= 1;
						$objList[$value->contact_id]["id"] 				= $value->property_id;
						$objList[$value->contact_id]["name"] 			= $value->property_name;
						$objList[$value->contact_id]["abbr"]			= $value->property_abbr;
						$objList[$value->contact_id]["address"]			= $value->property_address;
				}
			}
			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}
		$this->response($data, 200);
	}

	//Customer  No Connecting List
	function noConnection_list_get() {
		$filters 	= $this->get("filter");		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$is_pattern = 0;
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){				
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Filter		
		if(!empty($filters) && isset($filters['filters'])){
	    	foreach ($filters['filters'] as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}
		$obj->include_related("meter", "id");
		$obj->include_related("location", "name");
		$obj->include_related("branch", "name");
		$obj->where("use_water", 1);
		$obj->get_paged_iterated($page, $limit);
		if($obj->exists()) {
			$data["count"] = count($data["results"]);			
		} else {		
			$data = array();
			foreach($obj as $value) {
				//$utility = $row->contact->include_related('utility', array('abbr', 'code'))->get();
				$data[] = array(
					"id" 		=> $value->id,
					"name"		=> $value->contact_abbr.$value->contact_number." ".$value->contact_name,
					"branch" 	=> $value->branch_name,
					"address"	=> $value->contact_address,
					"phone"		=> $value->contact_phone,
					"email" 	=> $value->contact_email,
					"location" 	=> $value->location_name,
				);
			}
			$this->response(array('results' => $data, 'count' => $obj->paged->total_rows), 200);
		}
	}

	//usage
	function miniusage_get() {
		$filters 	= $this->get("filter");		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$is_pattern = 0;
		$data["results"] = [];
		$data["count"] = 0;
		$total = 0;

		$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){				
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Filter		
		if(!empty($filters) && isset($filters['filters'])){
	    	foreach ($filters['filters'] as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}
		$obj->include_related("contact", array("abbr", "number", "address", "phone", "name"));
		$obj->include_related('branch', array('name'));
		$obj->include_related('record', array('from_date', 'to_date', 'usage'));
		$obj->include_related('location', array('name'));
		$obj->get_paged_iterated($page, $limit);
		if($obj->exists()) {
			$data = array();
			foreach($obj as $row) {
				$usage = $row->record_usage;
				$data[] = array(
					"id" => $row->id,
					"meter_number" => $row->contact_name." ".$row->number,
					"from_date"=>$row->record_from_date,
					"to_date" =>$row->record_to_date,
					"license" => $row->branch_name,
					"address"=> $row->location_name,
					"usage" => $row->record_usage,
				);
				$total += $usage;
				
			}
			$this->response(array('results' => $data, 'count' => $obj->paged->total_rows, 'amount' => $total), 200);
		} else {
			$this->response($data, 200);;
		}
		$data["count"] = $obj->paged->total_rows;
		$data["currentPage"] = $obj->paged->current_page;
	}

	//maintenance
	function maintenance_get() {
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
		$obj->include_related('location', "name");
		$obj->include_related("winvoice_line", array("quantity", "type", "amount", "description"));
		$obj->where_related("winvoice_line", "type", "maintenance");
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		$obj->get_iterated();
		
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {												
				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["line"][] = array(
						"id" 				=> $value->id,
						"type" 				=> $value->winvoice_line_description,
						"date" 				=> $value->issued_date,
						"location" 			=> $value->location_name,
						"number" 			=> $value->number,
						"amount"			=> floatval($value->winvoice_line_amount),
					);
				}else{
					$objList[$value->contact_id]["id"] 		= $value->contact_id;
					$objList[$value->contact_id]["name"] 	= $value->contact_abbr.$value->contact_number." ".$value->contact_name;
					$objList[$value->contact_id]["line"][]	= array(
						"id" 				=> $value->id,
						"type" 				=> $value->winvoice_line_description,
						"date" 				=> $value->issued_date,
						"location" 			=> $value->location_name,
						"number" 			=> $value->number,
						"amount"			=> floatval($value->winvoice_line_amount),
					);
				}
				$total +=  floatval($value->winvoice_line_amount);
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

	//Calculate Power
	function sale_power_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		
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
		$obj->where_related("transaction", "type", "Utility_Invoice");
		$obj->where_related("transaction", "deleted <>", 1);
		$obj->where_related("transaction/contact", "contact_type_id", array(11, 13, 14, 15, 16));
		$obj->include_related("transaction/contact", "contact_type_id");
		$obj->where_in("type", array("usage", "tariff", "total_usage"));
		$obj->get_iterated();
		$licenseMVCount = 0;
		$licenseMVUsage = 0;
		$licenseMVPrice = 0;
		$MVtoMVCount = 0;
		$MVtoMVUsage = 0;
		$MVtoMVPrice = 0;
		$MVtoLVCount = 0;
		$MVtoLVUsage = 0;
		$MVtoLVPrice = 0;
		$company2000downCount = 0;
		$company2000downUsage = 0;
		$companyUsagedownCount = 0;
		$companyUsagedownUsage = 0;
		$company2000UpCount = 0;
		$company2000UpUsage = 0;
		$companyUsageUpCount = 0;
		$companyUsageUpUsage = 0;
		$companyPrice = 0;
		$total10Down = 0;
		$totalUsage10Down = 0;
		$total50Up = 0;
		$totalUsage50Up = 0;
		$total10Up = 0;
		$totalUsage10Up = 0;
		$total10DownUsage = 0;
		$totalUsage10DownUsage = 0;
		$total50UpUsage = 0;
		$totalUsage50UpUsage = 0;
		$total10UpUsage = 0;
		$totalUsage10UpUsage = 0;
		$totalUsage = 0;
		$totalCustomer = 0;
		$price = 0;
		$totalUsage1 = 0;
		$cost50Up = 0;
		$totalCustomer1 = 0;
		$totalUsageSubsidy = 0;
		$homeTotal10down = 0;
		$homeCount10down = 0;
		$homeTotal50down = 0;
		$homeCount50down = 0;
			foreach ($obj as $value) {
				if($value->transaction_contact_contact_type_id == 13){
					if($value->type == "usage"){
						$licenseMVCount += 1;
						$licenseMVUsage += $value->quantity;
					}else{
						$licenseMVPrice = $value->amount;
					}
				}else if ($value->transaction_contact_contact_type_id == 14){
					if($value->type == "usage"){
						$MVtoMVCount += 1;
						$MVtoMVUsage += $value->quantity;
					}else{
						$MVtoMVPrice = $value->amount;
					}
				}else if ($value->transaction_contact_contact_type_id == 15){
					if($value->type == "usage"){
						$MVtoLVCount += 1;
						$MVtoLVUsage += $value->quantity;
					}else{
						$MVtoLVPrice = $value->amount;
					}
				}else if ($value->transaction_contact_contact_type_id == 16){
					if($value->type == "usage"){
						if($value->quantity < 2001){
							$company2000downCount += 1;
							$company2000downUsage += $value->quantity;
						}else{
							$company2000UpCount += 1;
							$company2000UpUsage += $value->quantity;
						}
					}else if($value->type == "total_usage"){
						if($value->amount < 2001){
							$companyUsagedownCount += 1;
							$companyUsagedownUsage += $value->amount;
						}else{
							$companyUsageUpCount += 1;
							$companyUsageUpUsage += $value->amount;
						}
					}else{
						$companyPrice = $value->amount;
					}
				}else{
					if($value->type == "usage"){
						if($value->quantity < 11){
							$total10Down += 1;
							$totalUsage10Down += $value->quantity;
						}else if($value->quantity > 50){
							$total50Up += 1;
							$totalUsage50Up += $value->quantity;
						}else{
							$total10Up += 1;
							$totalUsage10Up += $value->quantity;
						}
						$totalCustomer += 1;
						$totalUsage += $value->quantity;
					}else if($value->type == "total_usage"){
						if($value->amount < 11){
							$total10DownUsage += 1;
							$totalUsage10DownUsage += $value->amount;
						}else if($value->amount > 50){
							$total50UpUsage += 1;
							$totalUsage50UpUsage += $value->amount;
						}else{
							$total10UpUsage += 1;
							$totalUsage10UpUsage += $value->amount;
						}
						$totalCustomer1 += 1;
						$totalUsage1 += $value->amount;
					}else{
						$price = $value->amount;
					}
				}

				if ($value->type == "usage"){
					if($value->quantity < 11){
						$homeCount10down += 1;
						$homeTotal10down += $value->quantity;
					}else if ( $value->quantity < 51){
						$homeCount50down += 1;
						$homeTotal50down += $value->quantity;
					}
				}

			$totalUsageSubsidy = $totalUsage1 + $totalUsage + $companyUsagedownUsage + $company2000downUsage;
				
				
			}
			$cost = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$cost->where("type", "tariff");
			$cost->get_iterated();

			foreach ($cost as $key) {
				if($key->name == "ប្រើប្រាស់អស់1-10"){
					$cost10down = $key->amount;
				}else if($key->name == "ប្រើប្រាស់អស់11-50"){
					$cost50down = $key->amount;
				}else if($key->name == "ប្រើប្រាស់អស់51-......"){
					$cost50Up = $key->amount;
				}else if($key->name == "100A"){
					$costCompanyLV = $key->amount;
				}else if($key->name == "800A"){
					$costCompanyMV = $key->amount;
				}else if($key->name == "150A"){
					$costLicense = $key->amount;
				}
			}
			$tariffSale = 0;
			$totalSubsidy = 0;
			$totalSubsidy10down = 0;
			$totalSubsidy10up = 0;
			$costGov = new Cost_base(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$costGov->get_iterated();
			foreach ($costGov as $cost) {
				$costGoverment = $cost->cost;
			}

			$tariffSale = $costGoverment - $cost50Up;
			$totalSubsidy = $tariffSale * $totalUsageSubsidy;
			$totalSubsidy10down = ($cost50Up - $cost10down) * $homeTotal10down;
			$totalSubsidy10up   = ($cost50Up - $cost50down) * ($homeTotal50down - $homeTotal10down);

			$data["results"][] = array(
					
					"licenseMVCount" 			=> floatval($licenseMVCount) ,
					"licenseMVUsage" 			=> floatval($licenseMVUsage),
					"licenseMVPrice" 			=> floatval($licenseMVPrice),
					"MVtoMVCount" 				=> floatval($MVtoMVCount) ,
					"MVtoMVUsage" 				=> floatval($MVtoMVUsage),
					"MVtoMVPrice" 				=> floatval($MVtoMVPrice),
					"MVtoLVCount" 				=> floatval($MVtoLVCount) ,
					"MVtoLVUsage" 				=> floatval($MVtoLVUsage),
					"MVtoLVPrice" 				=> floatval($MVtoLVPrice),
					"company2000downCount" 		=> floatval($company2000downCount) + floatval($companyUsagedownCount) ,
					"company2000downUsage" 		=>  floatval($company2000downUsage) + floatval($companyUsagedownUsage) ,
					"company2000UpCount" 		=> floatval($company2000UpCount) + floatval($companyUsageUpCount),
					"company2000UpUsage" 		=> floatval($company2000UpUsage) + floatval($companyUsageUpUsage),
					"companyPrice" 				=> floatval($companyPrice),
					"usage" 					=> floatval($totalUsage) + floatval($totalUsage1),
					"price" 					=> floatval($price),
					"totalCustomer" 			=> floatval($totalCustomer) + floatval($totalCustomer1),
					"total10Down" 				=> floatval($total10Down) + floatval($total10DownUsage),
					"totalUsage10Down" 			=> floatval($totalUsage10Down) + floatval($totalUsage10DownUsage),
					"total10Up" 				=> floatval($total10Up) + floatval($total10UpUsage),
					"totalUsage10Up" 			=> floatval($totalUsage10Up) + floatval($totalUsage10UpUsage),
					"total50Up" 				=> floatval($total50Up) + floatval($total50UpUsage),
					"totalUsage50Up" 			=> floatval($totalUsage50Up) + floatval($totalUsage50UpUsage),
					"totalUsageSubsidy" 		=> floatval($totalUsageSubsidy),
					"cost10down"				=> floatval($cost10down),
					"cost50down"				=> floatval($cost50down),
					"cost50Up"					=> floatval($cost50Up),
					"costCompanyLV"				=> floatval($costCompanyLV),
					"costCompanyMV"				=> floatval($costCompanyMV),
					"costLicense"				=> floatval($costLicense),
					"costGoverment"				=> floatval($costGoverment),
					"tariffSale"				=> floatval($tariffSale),
					"totalSubsidy"				=> floatval($totalSubsidy),
					"totalSubsidy10down"		=> floatval($totalSubsidy10down),
					"totalSubsidy10up"			=> $totalSubsidy10up ,
					"homeCount10down"			=> $homeCount10down ,
					"homeTotal10down"		    => $homeTotal10down,
					"homeCount50down"			=> $homeCount50down ,
					"homeTotal50down"			=> $homeTotal50down ,
				);	
			
			$data["count"] = count($data["results"]);

		//Response Data
		$this->response($data, 200);
	}

	function purchase_power_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 10000;	
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$totalUsage = 0;

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
		$obj->include_related("transaction/contact", array("abbr", "number", "name"));
		$obj->where_related("transaction", "type", "Cash_Purchase");
		$obj->where_related("transaction", "sub_type", "Power_Purchase");
		$obj->get_iterated();

		if($obj->exists()){
			$objList = [];
			$quantity = 0;
			foreach ($obj as $value) {	
				$quantity = $value->quantity;		
				
				if(isset($objList[$value->contact_id])){
					$objList[$value->contact_id]["invoice"] 		+= 1;
					$objList[$value->contact_id]["quantity"] 		+= $quantity;
					$objList[$value->contact_id]["cost"]			=  floatval($value->cost);
				}else{
					$objList[$value->contact_id]["id"] 				= $value->transaction_contact_id;
					$objList[$value->contact_id]["name"] 			= $value->transaction_contact_abbr.$value->transaction_contact_number." ".$value->transaction_contact_name;
					$objList[$value->contact_id]["invoice"]			= 1;
					$objList[$value->contact_id]["quantity"] 		= $quantity;
					$objList[$value->contact_id]["cost"]			= floatval($value->cost);
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			// $data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	

	//Total Sale
	function total_sale_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 10000;	
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
		$obj->include_related("transaction/location", array("name", "id"));
		$obj->include_related("transaction/meter", "status");
		$obj->include_related("transaction", "discount");
		$obj->where_in("type", array("tariff", "maintenance", "exemption"));
		$obj->include_related('meter_record', "usage");
		$obj->where_related("transaction","deleted <>", 1);
		$obj->get_iterated();

		if($obj->exists()){
			$objList = [];
			$totalUsage = 0;
			$amountTotal = 0;
			$totalMa = 0;
			$ex = 0;
			$price = 0;
			foreach ($obj as $value) {	
				$ma = 0;
				
				$amount = 0;
				$usage = 0;
				$usage = $value->meter_record_usage;
				
				$customerActive = 0;
				$customerInactive = 0;
				$customerVoice = 0;
				$customer = 0;
				if($value->transaction_meter_status == 1){
					$customerActive = 1;
				}else if ($value->transaction_meter_status == 0){
					$customerInactive = 1;
				}else if ($value->transaction_meter_status == 2){

					$customerVoice = 1;
				}else{
					$customer = 1;
				}
				if($value->type == "tariff"){
					$price = $value->amount;
					if ($usage < 1){
						$amount = 1 * $price; 
					}else{
						$amount = $usage * $price;
					}
					if(isset($objList[$value->transaction_location_id])){
						$objList[$value->transaction_location_id]["totalUsage"] 	+= $usage;
						$objList[$value->transaction_location_id]["amount"] 		+= $amount;
						$objList[$value->transaction_location_id]["maintenance"]    += 0;
						$objList[$value->transaction_location_id]["exemption"]	   += 0 ;
						$objList[$value->transaction_location_id]["customerActive"] += $customerActive + $customerVoice +       $customerInactive;
						$objList[$value->transaction_location_id]["customerVoice"]  += $customerVoice;
						$objList[$value->transaction_location_id]["customerInactive"] += $customerInactive;
						$objList[$value->transaction_location_id]["customer"] += $customer;
					}else{
						$objList[$value->transaction_location_id]["id"] 			= $value->transaction_location_id;
						$objList[$value->transaction_location_id]["name"] 			= $value->transaction_location_name;
						$objList[$value->transaction_location_id]["totalUsage"]		= $usage;
						$objList[$value->transaction_location_id]["amount"]			= $amount;
						$objList[$value->transaction_location_id]["maintenance"]    = 0;
						$objList[$value->transaction_location_id]["exemption"]	    = 0 ;
						$objList[$value->transaction_location_id]["customerActive"] = $customerActive + $customerVoice + $customerInactive;
						$objList[$value->transaction_location_id]["customerInactive"] = $customerInactive;
						$objList[$value->transaction_location_id]["customerVoice"]  = $customerVoice;
						$objList[$value->transaction_location_id]["customer"] = $customer;
						$price = 0;
					}
				}else if($value->type == "maintenance") {
					$ma = $value->amount;
					if(isset($objList[$value->transaction_location_id])){
						$objList[$value->transaction_location_id]["totalUsage"]		+= 0;
						$objList[$value->transaction_location_id]["amount"]			+= 0;
						$objList[$value->transaction_location_id]["customerActive"] += 0;
						$objList[$value->transaction_location_id]["customerInactive"] += 0;
						$objList[$value->transaction_location_id]["customerVoice"]  += 0;
						$objList[$value->transaction_location_id]["customer"] += 0;
						$objList[$value->transaction_location_id]["exemption"]	+= 0 ;
						$objList[$value->transaction_location_id]["maintenance"]	+= $ma;
					}else{
						$objList[$value->transaction_location_id]["totalUsage"]		+= 0;
						$objList[$value->transaction_location_id]["amount"]			+= 0;
						$objList[$value->transaction_location_id]["customerActive"] += 0;
						$objList[$value->transaction_location_id]["customerInactive"] += 0;
						$objList[$value->transaction_location_id]["customerVoice"]  += 0;
						$objList[$value->transaction_location_id]["customer"] += 0;
						$objList[$value->transaction_location_id]["exemption"]	+= 0 ;
						$objList[$value->transaction_location_id]["maintenance"]	= $ma;
					}
				}else if($value->type == "exemption") {
					$planit = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$planit->where("id", $value->item_id)->limit(1)->get();
					if($planit->unit == 'usage'){
						$ex = $value->amount * $price;
					}
					

					if(isset($objList[$value->transaction_location_id])){
						$objList[$value->transaction_location_id]["totalUsage"]		+= 0;
						$objList[$value->transaction_location_id]["amount"]			+= 0;
						$objList[$value->transaction_location_id]["customerActive"] += 0;
						$objList[$value->transaction_location_id]["customerInactive"] += 0;
						$objList[$value->transaction_location_id]["customerVoice"]  += 0;
						$objList[$value->transaction_location_id]["customer"] += 0;
						$objList[$value->transaction_location_id]["maintenance"]	+= 0;
						$objList[$value->transaction_location_id]["exemption"]	+= $ex;
					}else{
						$objList[$value->transaction_location_id]["totalUsage"]		+= 0;
						$objList[$value->transaction_location_id]["amount"]			+= 0;
						$objList[$value->transaction_location_id]["customerActive"] += 0;
						$objList[$value->transaction_location_id]["customerInactive"] += 0;
						$objList[$value->transaction_location_id]["customerVoice"]  += 0;
						$objList[$value->transaction_location_id]["customer"] += 0;
						$objList[$value->transaction_location_id]["maintenance"]	= 0;
						$objList[$value->transaction_location_id]["exemption"]	= $ex ;
					}
				}		
				$objList[$value->transaction_location_id]["old_ballance"] = 0;
				$objList[$value->transaction_location_id]["old_cash_receipt"] = 0;
				$objList[$value->transaction_location_id]["cash_receipt"] = 0;
				$objList[$value->transaction_location_id]["old_amount"] = 0;
				$objList[$value->transaction_location_id]["old_maintenance"] = 0;
				$objList[$value->transaction_location_id]["old_exemption"] = 0;
			
				

				
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			$data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	function balance_total_sale_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 10000;	
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
		$obj->where("type", "Utility_Invoice");
		$obj->include_related("location", array("name", "id"));
		// $obj->where_in("status",array(0, 2));
		$obj->where("deleted <>", 1);
		$obj->get_iterated();

		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {					
				$amount = floatval($value->amount) / floatval($value->rate);
				if(isset($objList[$value->location_id])){
					$objList[$value->location_id]["amount"] 		+= $amount;
				}else{
					$objList[$value->location_id]["id"] 			= $value->location_id;
					$objList[$value->location_id]["name"] 			= $value->location_name;
					$objList[$value->location_id]["amount"]			= $amount;
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			// $data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}
	function cash_receipt_totalsale_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 10000;	
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
		$obj->include_related("location", "name");
		$obj->where("type", "Cash_Receipt");
		$obj->where("is_recurring <>", 1);
		$obj->where("deleted <>", 1);
		$obj->order_by("issued_date", "asc");
		$obj->get_iterated();

		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {					
				$amount = floatval($value->amount) / floatval($value->rate);
				if(isset($objList[$value->location_id])){
					$objList[$value->location_id]["amount"] 		+= $amount;
				}else{
					$objList[$value->location_id]["id"] 			= $value->location_id;
					$objList[$value->location_id]["name"] 			= $value->location_name;
					$objList[$value->location_id]["amount"]			= $amount;
				}
			}

			foreach ($objList as $value) {
				$data["results"][] = $value;
			}
			// $data["count"] = count($data["results"]);
		}

		//Response Data
		$this->response($data, 200);
	}

	//Graph>>>>>>>>>>>>>>>>>>>>>>>>>>>>.
	//Graph Money
	function money_collection_get() {
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data = array();
		// $data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->where('type', 'Cash_Receipt');
		$obj->where('deleted', 0);
		$obj->where("month_of >=", date("Y")."-01-01");
		$obj->where("month_of <=", date("Y")."-12-31");						
		$obj->order_by("month_of");	
		$obj->get_iterated();
		$temp = array();

		if($obj->exists()){
			foreach ($obj as $value) {
				$invoiceMonth = date('F', strtotime($value->month_of));
				if(isset($temp["$invoiceMonth"])) {
					$temp["$invoiceMonth"]['amount'] += floatval($value->amount);
				} else {
					$temp["$invoiceMonth"]['amount'] = floatval($value->amount);
				}
			}
			
			foreach($temp as $key => $value) {
				$data["results"][] = array(					
				   	"amount" 		=> floatval($value['amount']),				   	
				   	"month"			=> $key				   	
				);
			}

		}else{
			$data["results"][] = array(					
			   	"amount" 		=> 0,			   	
			   	"month"			=> ""				   	
			);
		}

		$this->response($data, 200);
	}

	//Graph Sale
	function sale_get() {
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data = array();
		// $data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->where('type', 'Utility_Invoice');
		$obj->where('deleted', 0);
		$obj->where("month_of >=", date("Y")."-01-01");
		$obj->where("month_of <=", date("Y")."-12-31");						
		$obj->order_by("month_of");	
		$obj->get_iterated();
		$temp = array();

		if($obj->exists()){
			foreach ($obj as $value) {
				$invoiceMonth = date('F', strtotime($value->month_of));
				if(isset($temp["$invoiceMonth"])) {
					$temp["$invoiceMonth"]['amount'] += floatval($value->amount);
				} else {
					$temp["$invoiceMonth"]['amount'] = floatval($value->amount);
				}
			}
			
			foreach($temp as $key => $value) {
				$data["results"][] = array(					
				   	"amount" 		=> floatval($value['amount']),				   	
				   	"month"			=> $key				   	
				);
			}

		}else{
			$data["results"][] = array(					
			   	"amount" 		=> 0,			   	
			   	"month"			=> ""				   	
			);
		}

		$this->response($data, 200);
	}

	//Graph Balance
	function balance_get() {
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data = array();
		// $data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->where('type', 'Utility_Invoice');
		$obj->where('deleted <>', 1);
		$obj->where('status <>', 1 );
		$obj->where("month_of >=", date("Y")."-01-01");
		$obj->where("month_of <=", date("Y")."-12-31");						
		$obj->order_by("month_of");	
		$obj->get_iterated();
		$temp = array();

		if($obj->exists()){
			foreach ($obj as $value) {
				$invoiceMonth = date('F', strtotime($value->month_of));
				if ($value->status==2){
					if(isset($temp["$invoiceMonth"])) {
						$temp["$invoiceMonth"]['amount'] -= floatval($value->amount);
					} else {
						$temp["$invoiceMonth"]['amount'] = floatval($value->amount);
					}
				}else{
					if(isset($temp["$invoiceMonth"])) {
					$temp["$invoiceMonth"]['amount'] += floatval($value->amount);
					} else {
						$temp["$invoiceMonth"]['amount'] = floatval($value->amount);
					}
				}
				
			}
			
			foreach($temp as $key => $value) {
				$data["results"][] = array(					
				   	"amount" 		=> floatval($value['amount']),				   	
				   	"month"			=> $key				   	
				);
			}

		}else{
			$data["results"][] = array(					
			   	"amount" 		=> 0,			   	
			   	"month"			=> ""				   	
			);
		}

		$this->response($data, 200);
	}

	//Graph Customer
	function customer_get() {
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data = array();
		$today = new DateTime();
		// $data["count"] = 0;

		$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->where('status', 1);
		$obj->where('activated', 1);
		$obj->where("date_used >=", date("Y")."-01-01");
		$obj->where("date_used <=", date("Y")."-12-31");						
		$obj->order_by("date_used");	
		$obj->get_iterated();
		$temp = array();

		if($obj->exists()){
			foreach ($obj as $value) {
				$invoiceMonth = date('F', strtotime($value->date_used));
					if(isset($temp["$invoiceMonth"])) {
						$temp["$invoiceMonth"]['contact'] +=1;
					} else {
						$temp["$invoiceMonth"]['contact'] = 1;
					}
				
			}
			
			foreach($temp as $key => $value) {
				$data["results"][] = array(					
				   	"amount" 		=> $value['contact'],				   	
				   	"month"			=> $key				   	
				);
			}

		}else{
			$data["results"][] = array(					
			   	"amount" 		=> 0,			   	
			   	"month"			=> ""				   	
			);
		}

		$this->response($data, 200);
	}
}
/* End of file winvoices.php */
/* Location: ./application/controllers/api/categories.php */
