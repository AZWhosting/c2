<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Wreports extends REST_Controller {
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
		// $this->_database = "db_banhji";
	}

	// based on meter
	// with contact detail
	// and items based on meter record &
	// plan
	// installment
	//GET 
	function customer_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;

		$obj = new Customer(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
		$obj->where('use_water', 1);
		$obj->include_related("contact_type", "name");		

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;	
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$meter = $value->meter->include_related("branch", array("id", "name", "address"))->get();
		 		$data["results"][] = array(
		 			"id" 						=> $value->id,	
		 			"branch"					=> array("id" => $meter->branch_id, "name" => $meter->branch_name, "address" => $meter->branch_address, "location_id" => $meter->location_id),	 		
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
	function make_get() {
		$getData = $this->get('filter');
		$filters = $getData['filters'];
		$table = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$data = array();

		if(isset($filters)) {
			foreach($filters as $filter) {
				if(isset($filter['operator'])) {
					$table->{$filter['operator']}($filter['field'], $filter['value']);
				} else {
					$table->where($filter['field'], $filter['value']);
				}
			}
		}
		$table->where('invoiced <>', 1);
		$table->get();

		$tmp = array();

		foreach($table as $row) {
			$meter = $row->meter->get();
			$contact = $meter->contact->get();

			$plan  = $meter->plan->get();

			if(isset($tmp["$meter->number"])){
				$tmp["$meter->number"]['items'][] = array(
					'							type' => 'usage',
												'line' => array(
													'id'   => $row->id,
													'name' => 'usage',
													'from' => $row->from_date,
													'to'   => $row->to_date,
													'prev'=>$row->previous,
													'current'=>$row->current,
													'usage' => $row->usage,
													'unit' => 'm3',
													'amount'=> 0
												));
			} else {
				$tmp["$meter->number"]['type'] = 'water_invoice';
				$tmp["$meter->number"]['contact'] = array(
													'id' => $contact->id,
													'account_id' => $contact->account_id,
													'ra_id' => $contact->ra_id,
													'name' => $contact->name
												);
				$tmp["$meter->number"]['meter'] = array(
													'id' => $meter->id,
													'number' => $meter->number,
													'multiplier' => $meter->multiplier
												);
				$tmp["$meter->number"]['items'][] = array(
												'type' => 'usage',
												'line' => array(													
													'id'   => $row->id,
													'name' => 'Usage',
													'from' => $row->from_date,
													'to'   => $row->to_date,
													'prev'=>$row->previous,
													'current'=>$row->current,
													'usage' => $row->usage,
													'unit' => 'm3',
													'amount'=> 0
												));
				// plan items
				$items = $plan->plan_item->get();
				foreach($items as $item) {
					$types = array('tariff', 'exemption', 'maintenance');
					if(in_array($item->type, $types)) {
						$tmp["$meter->number"]['items'][] = array(
							"type" => "$item->type",
							"line" => array(
								'id'   => $item->id,
								'from' => $item->from,
								'to'   => $item->to,
								'name' => $item->name,
								'prev' =>0,
								'current'=>0,
								'usage' => 0,
								'is_flat' => $item->is_flat == 0 ? FALSE:TRUE,
								'unit'  => $item->unit,
								'amount'=> $item->amount
							)
						);
					}						
				}

				// installment
				$installment = $meter->installment->get();
				$tmp["$meter->number"]['items'][] = array(
											"type" => 'installment',
											"line" => array(
												'id'   => $installment->id,
												'name' => 'Installment',
												'from' => 0,
												'to'   => 0,
												'prev' =>0,
												'current'=>0,
												'usage' => 0,
												'unit'  => 'money',
												'amount'=> $installment->amount
											));
			}
		}

		foreach($tmp as $t) {
			$data[] = array(
				'type' => $t['type'],
				'invoiced'=> FALSE,
				'contact' => $t['contact'],
				'meter'=> $t['meter'],
				'items'=> $t['items']
			);
		}

		$this->response(array('results' => $data, 'count' => count($data)), 200);
	}
	//Get customer list
	//@param: number, fullname, type, location, license
	function list_get() {
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
		$obj->include_related('contact', array('name','phone','email','locale'));
		$obj->include_related('contact/utility', array('abbr', 'code'));
		$obj->include_related('branch', array('name'));
		$obj->include_related('location', array('name'));
		$obj->get_paged_iterated($page, $limit);
		if($obj->exists()) {
			$data = array();
			foreach($obj as $row) {
				//$utility = $row->contact->include_related('utility', array('abbr', 'code'))->get();
				$data[] = array(
					"id" => $row->id,
					"number" => array('abbr'=> $row->contact_utility_abbr, 'code' => $row->contact_utility_code),
					"fullname"=>$row->contact_name,
					"type" =>$row->contact_type,
					"license" => $row->branch_name,
					"address"=> $row->location_name,
					"phone" => $row->contact_phone,
					"email" => $row->contact_email,
					"locale" => $row->contact_locale
				);
			}
			$this->response(array('results' => $data, 'count' => $obj->paged->total_rows), 200);
		} else {
			$this->reponse(array('results'=> array(), 'msg'=> 'no meter found'), 404);
		}
	}

	//Get customer list
	//@param: register_date, code, fullname, type, bloc, license, deposit (get from journal_line based on contact), meter
	function newlist_get() {
		$filters 	= $this->get("filter");		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$is_pattern = 0;

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
		$obj->where("use_water", 1);
		// $obj->where_related('meter', 'id <', 1);
		$obj->include_related('contact_utility', array('abbr', 'code', 'branch_id', 'location_id'));
		$obj->include_related('contact_type', array('name'));
		$obj->include_related('contact_utility/branch', array('name'));
		$obj->include_related('contact_utility/location', array('name'));
		$obj->get_iterated();
		if($obj->exists()) {
			$data = array();
			foreach($obj as $row) {
				$meter = $row->meter->get();
				if(!$meter->exists()) {
					$data[] = array(
						"id" => $row->id,
						"register_date" => $row->registered_date,
						"number" => array('abbr'=> $row->contact_utility_abbr, 'code' => $row->contact_utility_code),
						"locale" => $row->locale,
						"name"=>$row->name,
						"type" =>$row->contact_type_name,
						"license" => $row->contact_utility_branch_name,
						"bloc"=> $row->contact_utility_location_name
					);
				}
			}
			$this->response(array('results' => $data, 'count' => count($data)), 200);
		} else {
			$this->response(array('results'=> array(), 'msg'=> 'no meter found'), 404);
		}
	}
	function disconnectlist_get() {
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
		$obj->include_related('contact', array('name','phone','email','locale'));
		$obj->include_related('contact/utility', array('abbr', 'code'));
		$obj->include_related('branch', array('name'));
		$obj->include_related('location', array('name'));
		$obj->where("status", 0);
		$obj->get_paged_iterated($page, $limit);
		if($obj->exists()) {
			$data = array();
			foreach($obj as $row) {
				//$utility = $row->contact->include_related('utility', array('abbr', 'code'))->get();
				$data[] = array(
					"id" => $row->id,
					"meter_number" => $row->number,
					"number" => array('abbr'=> $row->contact_utility_abbr, 'code' => $row->contact_utility_code),
					"fullname"=>$row->contact_name,
					"type" =>$row->contact_type,
					"license" => $row->branch_name,
					"address"=> $row->location_name,
					"phone" => $row->contact_phone,
					"email" => $row->contact_email,
					"locale" => $row->contact_locale
				);
			}
			$this->response(array('results' => $data, 'count' => $obj->paged->total_rows), 200);
		} else {
			$this->reponse(array('results'=> array(), 'msg'=> 'no meter found'), 404);
		}
	}
	function miniusage_get() {
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
		$obj->include_related('contact', array('locale'));
		$obj->include_related('contact/utility', array('abbr', 'code'));
		$obj->include_related('branch', array('name'));
		$obj->include_related('record', array('from_date', 'to_date', 'usage'));
		$obj->include_related('location', array('name'));
		$obj->get_paged_iterated($page, $limit);
		if($obj->exists()) {
			$data = array();
			foreach($obj as $row) {
				//$utility = $row->contact->include_related('utility', array('abbr', 'code'))->get();
				$data[] = array(
					"id" => $row->id,
					"meter_number" => $row->number,
					"from_date"=>$row->record_from_date,
					"to_date" =>$row->record_to_date,
					"license" => $row->branch_name,
					"address"=> $row->location_name,
					"usage" => $row->record_usage,
					"locale" => $row->contact_locale
				);
			}
			$this->response(array('results' => $data, 'count' => $obj->paged->total_rows), 200);
		} else {
			$this->reponse(array('results'=> array(), 'msg'=> 'no meter found'), 404);
		}
	}
	//Get Water Sale Summary
	//@param: License, location, m3, amount
	function salesummary_get() {
		$filters 	= $this->get("filter");		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$is_pattern = 0;
		$temp = array();

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
		$obj->include_related('contact', array('locale'));
		$obj->include_related('contact/utility', array('abbr', 'code'));
		$obj->include_related('branch', array('name'));
		$obj->include_related('record', array('from_date', 'to_date', 'usage'));
		$obj->include_related('record/winvoice_line', 'amount');
		$obj->include_related('location', array('name'));
		$obj->get_paged_iterated($page, $limit);
		if($obj->exists()) {
			$data = array();
			foreach($obj as $row) {
				//$utility = $row->contact->include_related('utility', array('abbr', 'code'))->get();
				// $transaction = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				// $transaction->where('id', $row->record_transaction_id)->get();
				if(isset($temp["$row->location_name"])) {
					$temp["$row->location_name"]['Usage'] += isset($row->record_usage) ? $row->record_usage:0;
					$temp["$row->location_name"]['Amount'] += $row->record_winvoice_line_amount;
				} else {
					$temp["$row->location_name"]['License'] = $row->branch_name;
					$temp["$row->location_name"]['Usage'] = isset($row->record_usage) ? $row->record_usage:0;
					$temp["$row->location_name"]['Amount'] = $row->record_winvoice_line_amount;
					// array(
					// "id" => $row->id,
					// "meter_number" => $row->number,
					// "from_date"=>$row->record_from_date,
					// "to_date" =>$row->record_to_date,
					// "License" => $row->branch_name,
					// "Location"=> $row->location_name,
					// "Usage" => isset($row->record_usage) ? $row->record_usage:0,
					// "locale" => $row->contact_locale,
					// "Amount" => $row->record_winvoice_line_amount
				// );
				}
				
			}
			foreach($temp as $key => $value) {
				$data[] = array(
					'License' => $value['License'],
					'Location'=> $key,
					'Usage'   => $value['Usage'],
					'Amount'  => $value['Amount']
				);
			}
			$this->response(array('results' => $data, 'count' => $obj->paged->total_rows), 200);
		} else {
			$this->reponse(array('results'=> array(), 'msg'=> 'no meter found'), 404);
		}
	}

	function kpi_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 1;

		$contact = new contact_utility(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$location = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$meter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$activeContact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$branch = new Branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$income = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$avgIncome = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$usage = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$avgUsage = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		// $deposit = new Payment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
		
		//Filter		
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {	    		    			
	    		$contact->where("branch_id", $value["value"]);
	    		$location->where("branch_id", $value["value"]);
	    		$meter->where("branch_id", $value["value"]);
	    		// $activeContact->where("branch_id", $value["value"]);
	    		// $branch->where("id", $value["value"]);
	    		// $income->where($value["field"], $value["value"]);
	    		// $avgIncome->where($value["field"], $value["value"]);
	    		// $usage->where_related("transaction", $value["field"], $value["value"]);
	    		// $avgUsage->where_related("meter", $value["field"], $value["value"]);
	    		// $deposit->where($value["field"], $value["value"]);    		
			}									 			
		}		
		$contact->select('id');
		$contact->include_related('branch', array('max_customer'));
		$contact->where('type', 'w');
		$contact->where_related_contact('status', 1);
		$contact->get();

		$location->include_related('transaction/winvoice_line', array('quantity'));
		$location->where_related('transaction/winvoice_line', 'type', 'tariff');
		$location->get();
		$locs = array();
		$usage = 0;
		foreach($location as $loc) {
			$usage += $loc_transaction_winvoice_line_quanity;
			$locs[] $loc->id;
		}

		$totalCustomer = $contact->result_count();
		$totalAllowCustomer = $totalCustomer / intval($branch->max_customer);
		$totalActiveCustomer = $activeContact->count() / $totalCustomer;

		$income->select_sum("amount");
		$income->where_in('location_id', $locs);
		$income->where("type", "Water_Invoice");
		$income->get();
		
		$avgIncome->select_avg("amount");
		$avgIncome->where_in('location_id', $locs);
		$avgIncome->where("type", "Water_Invoice");
		$avgIncome->get();

		// $usage = $meter;
		// $usage->include_related('winvoice_line', array('quantity'));
		// $usage->where_related_winvoice_line('type', 'tariff');
		// $usage->get();

		$avgUsage = $meter;
		$avgUsage->include_related('meter_record', array('usage'));
		// $avgUsage->where_related_winvoice_line('type', 'tariff');
		$avgUsage->get();

		// $usage->select_sum("quantity");
		// $usage->where("type", "tariff");
		// $usage->get();

		// $avgUsage->select_avg("usage", "reading");
		// $avgUsage->get();

		// $deposit->select_sum("amount");
		// $deposit->where("type", "wdeposit");
		// $deposit->get();
				
		$data["results"][] = array(
			"id" 						=> 0,
			"totalCustomer" 			=> $totalCustomer,
			"totalAllowCustomer" 		=> $totalAllowCustomer,
			"totalActiveCustomer" 		=> $totalActiveCustomer,
			"totalIncome" 				=> floatval($income->amount),
			"avgIncome" 				=> floatval($avgIncome->amount),
			"totalUsage" 				=> intval($usage),
			"avgUsage" 					=> floatval($avgUsage->reading)			
			// "totalDeposit" 				=> floatval($deposit->amount)							
		);
			

		//Response Data		
		$this->response($data, 200);	
	}

	//GET WATER AGING SUMMARY
	function aging_summary_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$contact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				
		//Filter
		$search_date = new DateTime();
		$search_date = date('Y-m-d');	
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value){
	    		if($value["field"]==="search_date"){	    		
	    			$search_date = date("Y-m-d", strtotime($value["value"]));
	    		}else{
	    			$contact->where($value["field"], $value["value"]);
	    		}	    			    		
			}									 			
		}

		$contact->where("use_water", 1);
						
		//Results
		$contact->get_paged_iterated($page, $limit);
		$data["count"] = $contact->paged->total_rows;

		if($contact->exists()){
			foreach ($contact as $value) {
				//Fullname				
				$fullname = $value->surname.' '.$value->name;
				if($value->contact_type_id=="5" || $value->contact_type_id=="6" || $value->contact_type_id=="7"){
					$fullname = $value->company;
				}

				//Invoice
				$invoice = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$invoice->where("contact_id", $value->id);
				$invoice->where("type", "Water_Invoice");
				$invoice->where_in("status", array(0,2));
				$invoice->where("issued_date <=", $search_date);
				$invoice->get();				

				$amount = 0;
				$current = 0;
				$oneMonth = 0;
				$twoMonth = 0;
				$threeMonth = 0;
				$overMonth = 0;

				if($invoice->exists()){
					foreach ($invoice as $valInv) {
						$today = new DateTime();
						$dueDate = new DateTime($value->due_date);
						$diff = $today->diff($dueDate)->format("%a");

						$amount += floatval($valInv->amount);

						if($dueDate<$today){
							if(intval($diff)>90){
								$overMonth += floatval($valInv->amount);
							}else if(intval($diff)>60){
								$threeMonth += floatval($valInv->amount);
							}else if(intval($diff)>30){
								$twoMonth += floatval($valInv->amount);
							}else{
								$oneMonth += floatval($valInv->amount);
							}
						}else{
							$current += floatval($valInv->amount);
						}

					}

					$data["results"][] = array(
						"id" 			=> $value->id,
						"fullIdName"	=> $value->namue,
						"current" 		=> $current,
						"oneMonth" 		=> $oneMonth,
						"twoMonth" 		=> $twoMonth,
						"threeMonth" 	=> $threeMonth,
						"overMonth" 	=> $overMonth,
						"amount" 		=> $amount
					);

				}				
			}
		}		

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
		$obj->where("type", "Water_Invoice");
		$obj->where_in("status", array(0,2));
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		
		if($obj->exists()){
			foreach ($obj as $value) {
				//Fullname		
				$contact = $value->contact->get();
				$fullname = $contact->surname.' '.$contact->name;
				if($contact->contact_type_id=="5" || $contact->contact_type_id=="6" || $contact->contact_type_id=="7"){
					$fullname = $contact->company;
				}

				//Age
				$ageGroup = "0-បច្ចុប្បន្ន";								
				$today = new DateTime();
				$dueDate = new DateTime($value->due_date);
				$diff = $today->diff($dueDate)->format("%a");

				if($dueDate<$today){
					if(intval($diff)>90){						
						$ageGroup = "91->∞";						
					}else if(intval($diff)>60){
						$ageGroup = "61-90";
					}else if(intval($diff)>30){
						$ageGroup = "31-60";
					}else{
						$ageGroup = "1-30";
					}					
				}

				$data["results"][] = array(
					"id" 			=> $value->id,
					"number" 		=> $value->number,
					"amount"		=> floatval($value->amount),
					"issued_date" 	=> $value->issued_date,
					"due_date" 		=> $value->due_date,

					"fullIdName"	=> $contact->wnumber ." ". $fullname,
					"age"			=> $diff,
					"អាយុកាល" 		=> $ageGroup	
				);
			}			
		}		

		//Response Data		
		$this->response($data, 200);	
	}

	// Todo:

	//GET WATER SALE SUMMARY
	function wsale_summary_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		//Location
		$location = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$location->where("type", "w");
		// $location->order_by("company_id");
		$location->get();							

		foreach ($location as $loc){		
			$sale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$usage = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
			
			//Filter		
			if(!empty($filters) && isset($filters)){
		    	foreach ($filters as $value) {
		    		if(!empty($value["operator"]) && isset($value["operator"])){
			    		if($value["operator"]=="between"){
			    			$sale->where_between($value["field"], $value["value1"], $value["value2"]);
			    			$usage->where_between_related("invoice", $value["field"], $value["value1"], $value["value2"]);
			    		}else{
			    			$sale->where($value["field"].' '.$value["operator"], $value["value"]);
			    			$usage->where($value["field"].' '.$value["operator"], $value["value"]);
			    		}		    			
		    		}else{	    			
		    			$sale->where($value["field"], $value["value"]);
		    			$usage->where($value["field"], $value["value"]);	    				    			
		    		}		    		
				}												 			
			}			

			//Sale
			$sale->select_sum('amount');		
			$sale->where("type", "Water_Invoice");
			$sale->where("location_id", $loc->id);
			$sale->where("deleted", 0);		
			$sale->get();

			//Usage
			$usage->select_sum('unit');		
			$usage->where_related("transaction", "type", "Water_Invoice");
			$usage->where_related("transaction", "location_id", $loc->id);
			$usage->where_related("transaction", "deleted", 0);		
			$usage->get();

			$data["results"][] = array(
				"branch_name"		=> $loc->branch->get()->name,
				"location_name"		=> $loc->name,				
				"usage"				=> intval($usage->unit),
				"amount"			=> floatval($sale->amount)			
			);
		}

		$data["count"] = count($data["results"]);		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET WATER SALE DETAIL 
	function wsale_detail_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");
		$data       = array();		
		// $data["results"] = array();
		// $data["count"] = 0;

		$temp = array();

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				if($value["field"]=="contact_type_name"){
					$obj->order_by_related("contact", "contact_type_id", $value["dir"]);				
				}else if($value["field"]=="location_name"){
					$obj->order_by("location_id", $value["dir"]);
				}else if($value["field"]=="contact_number" || $value["field"]=="fullname"){
					$obj->order_by("contact_id", $value["dir"]);
				}else{
					$obj->order_by($value["field"], $value["dir"]);
				}
			}
		}
		
		//Filter		
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {
	    		if(!empty($value["operator"]) && isset($value["operator"])){
		    		$obj->{$value["operator"]}($value["field"], $value["value"]);
	    		}else{	    			
	    			$obj->where($value["field"], $value["value"]);	    				    			
	    		}
			}									 			
		}

		//Join other tables
		$obj->include_related("location", "name");
		$obj->include_related("winvoice_line", array("quantity", "amount"));
		$obj->include_related("contact/contact_type", "name");
		$obj->include_related("contact/meter", "number");
		$obj->include_related("contact/contact_utility", array("abbr", "code"));
		$obj->include_related("contact", array("contact_type_id", "name"));
		$obj->where_related("winvoice_line", 'type', 'usage');
		$obj->where_related("contact/meter", "activated", 1);
		
		//Results
		$obj->where('type', 'Water_Invoice');
		$obj->get_paged_iterated($page, $limit);						

		if($obj->result_count()>0){
			foreach ($obj as $value) {				
				if(isset($temp["$value->contact_meter_number"])){
					$temp["$value->contact_meter_number"]["usage"] +=$value->winvoice_line_quantity;
					$temp["$value->contact_meter_number"]["amount"] += floatval($value->winvoice_line_amount);
				} else {
					$temp["$value->contact_meter_number"]["fullname"] = $value->contact_name;
					$temp["$value->contact_meter_number"]["contact_type_name"] = $value->contact_contact_type_name;
					$temp["$value->contact_meter_number"]["location_name"] = $value->location_name;
					$temp["$value->contact_meter_number"]["usage"] = $value->winvoice_line_quantity;
					$temp["$value->contact_meter_number"]["amount"] = floatval($value->winvoice_line_amount);
				}

				
			}
			foreach($temp as $key => $value) {
				$data[] = array(
					'contact_number' => $key,
					'location_name'  => $value['location_name'],
					'fullname' 		 => $value['fullname'],
					'contact_type_name'=>$value['contact_type_name'],
					'usage' 		 => $value['usage'],
					'amount' 		 => $value['amount']
				);
			}
		}		

		//Response Data		
		$this->response(array('results' => $data, 'count' => count($data)), 200);	
	}

	//GET Cash Receipt DETAIL
	function cr_summary_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;
		
		//Location
		$location = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$location->where("type", 'w');
		$location->order_by("company_id");
		$location->get();							

		foreach ($location as $loc){		
			$sale = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
			$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);	

			//Filter		
			if(!empty($filters) && isset($filters)){
		    	foreach ($filters as $value) {
		    		$sale->where("issued_date ".$value["operation"], $value["value"]);
		    		$paid->where("payment_date ".$value["operation"], $value["value"]);
				}												 			
			}			

			//Sale
			$sale->select_sum('amount');		
			$sale->where("type", "Water_Invoice");
			$sale->where("location_id", $loc->id);
			$sale->where("deleted", 0);		
			$sale->get();

			//Paid
			$paid->select_sum('amount');		
			$paid->where("reference_id >", 0);
			$paid->where_related('contact/contact_utility', 'type', 'w');
			$paid->where_related("contact/contact_utility", "location_id", $loc->id);					
			$paid->get();

			$data["results"][] = array(
				"branch_name"		=> $loc->branch->get()->name,
				"location_name"		=> $loc->name,				
				"sale"				=> floatval($sale->amount),
				"paid"				=> floatval($paid->amount)			
			);
		}		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET Cash Receipt DETAIL
	function cr_detail_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

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
				$employee = $value->employee->get();
				// $employee->get_by_id($value->cashier);

				// $invoice = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				// $invoice->get_by_id($value->reference_id);

				$data["results"][] = array(
					"id" 				=> $value->id,
					"payment_date" 		=> $value->payment_date,					
				   	"employee" 			=> $employee->name,
				   	"contact" 			=> $value->contact->select('name')->get_raw()->result(),
				   	// "invoice" 			=> $invoice->number,
				   	"amount" 			=> floatval($value->amount)				   
				);
			}
		}		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET WATER Cash Receipt BY SOURCE SUMMARY
	function wsource_summary_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		//Location
		$location = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$location->where("type", 'w');
		// $location->order_by("company_id");
		$location->order_by("id");		
		$location->get();							

		foreach ($location as $loc){		
			$payment = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
			
			//Filter		
			if(!empty($filters) && isset($filters)){
		    	foreach ($filters as $value) {
		    		if(!empty($value["operator"]) && isset($value["operator"])){
			    		if($value["operator"]=="between"){
			    			$payment->where_between($value["field"], $value["value1"], $value["value2"]);			    			
			    		}else{
			    			$payment->where($value["field"].' '.$value["operator"], $value["value"]);			    			
			    		}		    			
		    		}else{	    			
		    			$payment->where($value["field"], $value["value"]);		    							    			
		    		}		    		
				}												 			
			}			

			//Sale			
			$payment->where("type", "Water_Invoice");
			$payment->where_related("contact", "location_id", $loc->id);
			$payment->where("deleted", 0);		
			$payment->get();

			
			$cash = 0;
			$check = 0;
			$bank = 0;
			$direct = 0;
			$internet = 0;
			foreach ($payment as $p) {
				if($p->payment_method_id==2){
					$check += floatval($p->amount);
				}else if($p->payment_method_id==3){
					$bank += floatval($p->amount);
				}else if($p->payment_method_id==4){
					$direct += floatval($p->amount);
				}else if($p->payment_method_id==5){
					$internet += floatval($p->amount);
				}else{
					$cash += floatval($p->amount);
				}				
			}			

			$data["results"][] = array(
				"branch_name"		=> $loc->branch->get()->name,
				"location_name"		=> $loc->name,				
				"cash"				=> $cash,
				"check"				=> $check,
				"bank"				=> $bank,
				"direct"			=> $direct,
				"internet"			=> $internet			
			);			
		}

		$data["count"] = count($data["results"]);		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET WATER Cash Receipt BY SOURCE DETAIL 
	function wsource_detail_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {								
				if($value["field"]=="contact_type_name"){
					$obj->order_by_related("contact", "contact_type_id", $value["dir"]);				
				}else{
					$obj->order_by($value["field"], $value["dir"]);
				}
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
		    		}else if($value["operator"]=="where_related"){
		    			$obj->where_related($value["model"] ,$value["field"], $value["value"]);
		    		}else if($value["operator"]=="between"){
		    			$obj->where_between($value["field"], $value["value1"], $value["value2"]);
		    		}else{
		    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
		    		}
	    		}else{	    			
	    			$obj->where($value["field"], $value["value"]);	    				    			
	    		}
			}									 			
		}

		//Join other tables		
		$obj->include_related("payment_method", "name");
		$obj->include_related("contact/contact_type", "name");
		$obj->include_related("contact/contact_utility", array("abbr", "code"));
		
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;							

		if($obj->exists()){
			foreach ($obj as $value) {
				$fullname = $value->contact_surname.' '.$value->contact_name;
				if($value->contact_contact_type_id=="6" || $value->contact_contact_type_id=="7" || $value->contact_contact_type_id=="8"){
					$fullname = $value->contact_company;
				}
				$cashier = $value->employee->get();
				$contact = $value->contact->get();
				// $cashier = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				// $cashier->get_by_user_id($value->cashier_id);				

				$data["results"][] = array(
					"id" 					=> $value->id,
					"cashier_id" 			=> $value->cashier_id,
					"contact_id" 			=> $value->contact_id,
					"payment_method_id" 	=> $value->payment_method_id,
					"contact_number" 		=> $value->contact_abbr . "-" . $value->contact_code,
					"fullname" 				=> $contact->name,
					"contact_type_name" 	=> $value->contact_contact_type_name,
					"cashier_name" 			=> $cashier->name,					
					"payment_method_name" 	=> $value->payment_method_name,
					"amount" 				=> floatval($value->amount)							
				);
			}
		}		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET WATER CUSTOMER BALANCE
	function wbalance_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

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

		//Only water customer
		$obj->where("use_water", 1);
		$obj->include_related("contact_type", "name");
		$obj->where_related("contact_type", "parent_id", 1);				

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;

		if($obj->exists()){
			foreach ($obj as $value) {
				$fullname = $value->surname.' '.$value->name;
				if($value->contact_type_id=="6" || $value->contact_type_id=="7" || $value->contact_type_id=="8"){
					$fullname = $value->company;
				}

				$balance = $value->transaction;
				$balance->select_sum("amount");
				$balance->where("type", "Water_Invoice");
				$balance->where("status", 0);
				$balance->get();
								
		 		$data["results"][] = array(
		 			"id" 					=> $value->id,		 			
		 			"wnumber" 				=> $value->wnumber,
					"fullname" 				=> $fullname,									
					"contact_type_name"		=> $value->contact_type_name,					
					"branch_name" 			=> $value->branch->get()->name,					
					"location_name" 		=> $value->location->get()->name,
					"balance" 				=> floatval($balance->amount)												
		 		);
			}
		}

		//Response Data		
		$this->response($data, 200);			
	}

	//Get Payment Detail
	//@param: Number, customer, type, location, usage, amount
	function accountReceivable_get() {
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

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
	    		if(!empty($value["operator"]) && isset($value["operator"])){
	    			$obj->{$value["operator"]}($value["field"], $value["value"]);
	    		}else{
	    			$obj->where($value["field"], $value["value"]);
	    		}
			}									 			
		}

		$obj->include_related('contact_utility', array("abbr", "code"));
		$obj->include_related('contact_type', "name");
		$obj->include_related('location', "name");
		$obj->include_related('transaction', "amount");
		$obj->include_related('transaction/winvoice_line', "unit");
		$obj->where_related('transaction/winvoice_line', "type", "usage");
		$obj->where_related_transction('type', "Water_Invoice");
		$obj->where_related_transction('status <>', 1);
		$obj->get_paged_iterated($page, $limit);

		if($obj->exists()) {
			foreach($obj as $value) {
				$data['results'][] = array(
					'number' 	=> $value->contact_utility_abbr ."-".$value->contact_utility_code,
					'customer' 	=> $value->name,
					'type' 		=> $value->contact_type_name,
					'location'  => $value->location_name,
					'usage' 	=> $value->transaction_winvoice_line_usage,
					'amount' 	=> $value->transaction_amount
				);
			}
			$data["count"] = $obj->paged->total_rows;
			$this->response($data, 200);
		} else {
			$this->response($data, 400);
		}
	}

	
	//Get Payment Detail
	//@param: Number, customer, type, location, usage, amount
	function deposit_get() {
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

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
	    		if(!empty($value["operator"]) && isset($value["operator"])){
	    			$obj->{$value["operator"]}($value["field"], $value["value"]);
	    		}else{
	    			$obj->where($value["field"], $value["value"]);
	    		}
			}									 			
		}

		$obj->include_related('contact', array('id','name', 'deposit_account_id'));
		$obj->include_related('contact/contact_utility', array("abbr", "code"));
		$obj->include_related('contact/contact_type', "name");
		$obj->include_related('location', "name");
		$obj->include_related('location/branch', "name");
		// $obj->where_related_transction('type', "Water_Invoice");
		$obj->where('status', 1);
		$obj->get_paged_iterated($page, $limit);
		if($obj->exists()) {
			foreach($obj as $value) {
				$line = new journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$line->where('contact_id', $value->contact_id);
				$line->where('account_id', $value->deposit_account_id);
				$line->get();
				$deposit = 0;
				foreach($line as $l) {
					if($l->dr != 0.00) {
						$deposit += $l->dr;
					} else {
						$deposit -= $l->cr;
					}
				}
				$data["results"][]  = array(
					'id' => $value->id,
					'location_name' => $value->location_name,
					'contact_type_name' => $value->contact_contact_type_name,
					'fullname' => $value->contact_name,
					'branch_name' => $value->location_branch_name,
					'meter_number' => $value->number,
					'customer_number' => $value->contact_contact_utility_abbr."-".$value->contact_contact_utility_code,
					'deposit' => $deposit
				);
			}
			$this->response($data, 200);
		} else {
			$this->response($data, 400);
		}
	}


	//Get Payment Detail
	//@param: Number, customer, type, location, usage, amount
	function connectionRevenue_get() {
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

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
	    		if(!empty($value["operator"]) && isset($value["operator"])){
	    			$obj->{$value["operator"]}($value["field"], $value["value"]);
	    		}else{
	    			$obj->where($value["field"], $value["value"]);
	    		}
			}									 			
		}

		$obj->include_related('contact', array('id','name', 'ra_id'));
		$obj->include_related('contact/contact_utility', array("abbr", "code"));
		$obj->include_related('contact/contact_type', "name");
		$obj->include_related('location', "name");
		$obj->include_related('location/branch', "name");
		// $obj->where_related_transction('type', "Water_Invoice");
		$obj->where('status', 1);
		$obj->get_paged_iterated($page, $limit);
		if($obj->exists()) {
			foreach($obj as $value) {
				$line = new journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$line->where('contact_id', $value->contact_id);
				$line->where('account_id', $value->ra_id);
				$line->get();
				$deposit = 0;
				foreach($line as $l) {
					if($l->dr != 0.00) {
						$deposit -= $l->dr;
					} else {
						$deposit += $l->cr;
					}
				}
				$data["results"][]  = array(
					'id' => $value->id,
					'location_name' => $value->location_name,
					'contact_type_name' => $value->contact_contact_type_name,
					'fullname' => $value->contact_name,
					'branch_name' => $value->location_branch_name,
					'meter_number' => $value->number,
					'customer_number' => $value->contact_contact_utility_abbr."-".$value->contact_contact_utility_code,
					'revenue' => $deposit
				);
			}
			$this->response($data, 200);
		} else {
			$this->response($data, 400);
		}
	}

	function test_get() {
		$data = array();
		$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');

		$obj->include_related('contact', array('id', 'name'));
		$obj->include_related('location', array('id', 'name'));
		$obj->where('activated', 1);
		$obj->get();

		if($obj->exists()) {
			foreach($obj as $meter) {
				$data['results'][] = array(
					'id' => $meter->id,
					'contact' => $meter->contact_id,
					'location'=> array('id'=>$meter->location_id, 'name'=>$meter->location_name)
				);
			}
			$this->response($data, 200);
		} else {
			$this->response($data, 400);
		}
	}


	function _getAmount($carry, $item) {
		if($item['dr'] !=0) {
			$curry += $item['dr'];
		} else {
			$curry -= $item['cr'];
		}
		return $curry;
	}
}
/* End of file winvoices.php */
/* Location: ./application/controllers/api/categories.php */
