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
		$obj->include_related('contact_utility', array('abbr', 'code'));
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

	//Get Water Sale Summary
	//@param: License, location, m3, amount
	function saleSummary_get() {}

	//Get Water Sale Detail
	//@param: Number, customer, type, location, usage, amount
	function saleDetail_get() {}

	//Get Payment Summary
	//@param: Number, customer, type, location, usage, amount
	function paymentSummary_get() {}

	//Get Payment Detail
	//@param: Number, customer, type, location, usage, amount
	function paymentDetail_get() {}

	//Get Payment Detail
	//@param: Number, customer, type, location, usage, amount
	function minimumWaterUsage_get() {}

	//Get Payment Detail
	//@param: Number, customer, type, location, usage, amount
	function disconnect_get() {}

	//Get Payment Detail
	//@param: Number, customer, type, location, usage, amount
	function accountReceivable_get() {}

	//Get Payment Detail
	//@param: Number, customer, type, location, usage, amount
	function deposit_get() {}

	//Get Payment Detail
	//@param: Number, customer, type, location, usage, amount
	function agingSummary_get() {}

	//Get Payment Detail
	//@param: Number, customer, type, location, usage, amount
	function agingDetail_get() {}

	//Get Payment Detail
	//@param: Number, customer, type, location, usage, amount
	function connectionRevenue_get() {}

	//Get Payment Detail
	//@param: Number, customer, type, location, usage, amount
	function otherRevenue_get() {}

	//Get Payment Detail
	//@param: Number, customer, type, location, usage, amount
	function cashReceiptSummary_get() {}

	//Get Payment Detail
	//@param: Number, customer, type, location, usage, amount
	function cashReceiptDetail_get() {}

	//Get Payment Detail
	//@param: Number, customer, type, location, usage, amount
	function cashReceiptSourceSummary_get() {}

	//Get Payment Detail
	//@param: Number, customer, type, location, usage, amount
	function cashReceiptSourceDetail_get() {}

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
