<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Contacts extends REST_Controller {
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
		$is_pattern = 0;

		$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
					if($value['operator']=="startswith"){
	    				$obj->like($value['field'], $value['value'], 'after');
	    			}else if($value['operator']=="contains"){
	    				$obj->like($value['field'], $value['value'], 'both');
	    			}else{
						$obj->{$value['operator']}($value['field'], $value['value']);
	    			}
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
		$obj->include_related("contact_type", "name");

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

	//POST
	function index_post() {
		$models = json_decode($this->post('models'));

		//Generate order number
		$lastContact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$lastContact->order_by('id', 'desc')->limit(1)->get();
		$last_id = intval($lastContact->id);

		foreach ($models as $value) {
			$last_id++;

			//Generate Number
			if(isset($value->number)){
				$number = $value->number;

				if($number==""){
					$number = $this->_generate_number($value->contact_type_id);
				}
			}else{
				$number = $this->_generate_number($value->contact_type_id);
			}
			
			if(isset($value->is_pattern)){
				if($value->is_pattern==1){
					$number = "";
				}
			}

			$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->branch_id) 				? $obj->branch_id 				= $value->branch_id : "";
			isset($value->country_id) 				? $obj->country_id 				= $value->country_id : "";
			isset($value->ebranch_id) 				? $obj->ebranch_id 				= $value->ebranch_id : "";
			isset($value->elocation_id) 			? $obj->elocation_id 			= $value->elocation_id : "";
			isset($value->wbranch_id) 				? $obj->wbranch_id 				= $value->wbranch_id : "";
			isset($value->wlocation_id) 			? $obj->wlocation_id			= $value->wlocation_id : "";
			isset($value->user_id)					? $obj->user_id 				= $value->user_id : "";
			isset($value->contact_type_id)			? $obj->contact_type_id 		= $value->contact_type_id : "";
			isset($value->eorder)					? $obj->eorder					= $last_id : "";
			isset($value->worder)					? $obj->worder					= $last_id : "";
			isset($value->abbr)						? $obj->abbr					= $value->abbr : "";
			$obj->number = $number;
			isset($value->eabbr)					? $obj->eabbr					= $value->eabbr : "";
			isset($value->enumber)					? $obj->enumber					= $value->enumber : "";
			isset($value->wabbr)					? $obj->wabbr					= $value->wabbr : "";
			isset($value->wnumber)					? $obj->wnumber					= $value->wnumber : "";
			isset($value->name)						? $obj->name					= $value->name : "";
			isset($value->gender)					? $obj->gender					= $value->gender : "";
			isset($value->dob)						? $obj->dob						= date("Y-m-d", strtotime($value->dob)) : "";
			isset($value->pob)						? $obj->pob						= $value->pob : "";
			isset($value->latitute)					? $obj->latitute 				= $value->latitute : "";
			isset($value->longtitute)				? $obj->longtitute 				= $value->longtitute : "";
			isset($value->credit_limit)				? $obj->credit_limit			= $value->credit_limit : "";
			isset($value->locale)					? $obj->locale					= $value->locale : "";
			isset($value->id_number)				? $obj->id_number				= $value->id_number : "";
			isset($value->phone)					? $obj->phone 					= $value->phone : "";
			isset($value->email)					? $obj->email 					= $value->email : "";
			isset($value->website)					? $obj->website					= $value->website : "";
			isset($value->job)						? $obj->job						= $value->job : "";
			isset($value->vat_no)					? $obj->vat_no					= $value->vat_no : "";
			isset($value->family_member)			? $obj->family_member			= $value->family_member : "";
			isset($value->city)						? $obj->city 					= $value->city : "";
			isset($value->post_code)				? $obj->post_code 				= $value->post_code : "";
			isset($value->address)					? $obj->address 				= $value->address : "";
			isset($value->bill_to)					? $obj->bill_to 				= $value->bill_to : "";
			isset($value->ship_to)					? $obj->ship_to 				= $value->ship_to : "";
			isset($value->memo)						? $obj->memo					= $value->memo : "";
			isset($value->image_url)				? $obj->image_url				= $value->image_url : "";
			isset($value->company)					? $obj->company					= $value->company : "";
			isset($value->company_en)				? $obj->company_en				= $value->company_en : "";
			isset($value->bank_name)				? $obj->bank_name				= $value->bank_name : "";
			isset($value->bank_address)				? $obj->bank_address			= $value->bank_address : "";
			isset($value->bank_account_name)		? $obj->bank_account_name		= $value->bank_account_name : "";
			isset($value->bank_account_number)		? $obj->bank_account_number		= $value->bank_account_number : "";
			isset($value->name_on_cheque)			? $obj->name_on_cheque			= $value->name_on_cheque : "";
			isset($value->business_type_id)			? $obj->business_type_id		= $value->business_type_id : "";
			isset($value->payment_term_id)			? $obj->payment_term_id			= $value->payment_term_id : "";
			isset($value->payment_method_id)		? $obj->payment_method_id		= $value->payment_method_id : "";
			isset($value->deposit_account_id)		? $obj->deposit_account_id		= $value->deposit_account_id : "";
			isset($value->trade_discount_id)		? $obj->trade_discount_id		= $value->trade_discount_id : "";
			isset($value->settlement_discount_id)	? $obj->settlement_discount_id	= $value->settlement_discount_id : "";
			isset($value->salary_account_id)		? $obj->salary_account_id		= $value->salary_account_id : "";
			isset($value->account_id)				? $obj->account_id				= $value->account_id : "";
			isset($value->ra_id)					? $obj->ra_id					= $value->ra_id : "";
			isset($value->tax_item_id)				? $obj->tax_item_id				= $value->tax_item_id : $obj->tax_item_id = 0;
			isset($value->phase_id)					? $obj->phase_id				= $value->phase_id : "";
			isset($value->voltage_id)				? $obj->voltage_id				= $value->voltage_id : "";
			isset($value->ampere_id)				? $obj->ampere_id				= $value->ampere_id : "";
			isset($value->registered_date)			? $obj->registered_date 		= date("Y-m-d", strtotime($value->registered_date)) : "";		
			isset($value->use_electricity)			? $obj->use_electricity			= $value->use_electricity : "";
			isset($value->use_water)				? $obj->use_water				= $value->use_water : "";
			isset($value->is_local)					? $obj->is_local				= $value->is_local : "";
			isset($value->is_pattern)				? $obj->is_pattern				= $value->is_pattern : "";
			isset($value->status)					? $obj->status					= $value->status : "";
			isset($value->deleted)					? $obj->deleted					= $value->deleted : "";
			isset($value->is_system)				? $obj->is_system				= $value->is_system : "";

			if($obj->save()){
				//Respsone
				$data["results"][] = array(
					"id" 						=> $obj->id,
					"branch_id" 				=> $obj->branch_id,
					"country_id" 				=> $obj->country_id,
					"ebranch_id" 				=> $obj->ebranch_id,
					"elocation_id" 				=> $obj->elocation_id,
					"wbranch_id" 				=> $obj->wbranch_id,
					"wlocation_id" 				=> $obj->wlocation_id,
					"user_id"					=> $obj->user_id,
					"contact_type_id" 			=> $obj->contact_type_id,
					"eorder" 					=> $obj->eorder,
					"worder" 					=> $obj->worder,
					"abbr" 						=> $obj->abbr,
					"number" 					=> $obj->number,
					"eabbr" 					=> $obj->eabbr,
					"enumber" 					=> $obj->enumber,
					"wabbr" 					=> $obj->wabbr,
					"wnumber" 					=> $obj->wnumber,
					"name" 						=> $obj->name,
					"gender"					=> $obj->gender,
					"dob" 						=> $obj->dob,
					"pob" 						=> $obj->pob,
					"latitute" 					=> $obj->latitute,
					"longtitute" 				=> $obj->longtitute,
					"credit_limit" 				=> $obj->credit_limit,
					"locale" 					=> $obj->locale,
					"id_number" 				=> $obj->id_number,
					"phone" 					=> $obj->phone,
					"email" 					=> $obj->email,
					"website" 					=> $obj->website,
					"job" 						=> $obj->job,
					"vat_no" 					=> $obj->vat_no,
					"family_member"				=> $obj->family_member,
					"city" 						=> $obj->city,
					"post_code" 				=> $obj->post_code,
					"address" 					=> $obj->address,
					"bill_to" 					=> $obj->bill_to,
					"ship_to" 					=> $obj->ship_to,
					"memo" 						=> $obj->memo,
					"image_url" 				=> $obj->image_url,
					"company" 					=> $obj->company,
					"company_en" 				=> $obj->company_en,
					"bank_name" 				=> $obj->bank_name,
					"bank_address" 				=> $obj->bank_address,
					"bank_account_name" 		=> $obj->bank_account_name,
					"bank_account_number" 		=> $obj->bank_account_number,
					"name_on_cheque" 			=> $obj->name_on_cheque,
					"business_type_id" 			=> $obj->business_type_id,
					"payment_term_id" 			=> $obj->payment_term_id,
					"payment_method_id" 		=> $obj->payment_method_id,
					"deposit_account_id"		=> $obj->deposit_account_id,
					"trade_discount_id" 		=> $obj->trade_discount_id,
					"settlement_discount_id"	=> $obj->settlement_discount_id,
					"salary_account_id"			=> $obj->salary_account_id,
					"account_id" 				=> $obj->account_id,
					"account_id" 				=> $obj->account_id,
					"ra_id" 					=> $obj->ra_id,
					"tax_item_id" 				=> $obj->tax_item_id,
					"phase_id" 					=> $obj->phase_id,
					"voltage_id" 				=> $obj->voltage_id,
					"ampere_id" 				=> $obj->ampere_id,
					"registered_date" 			=> $obj->registered_date,
					"use_electricity" 			=> $obj->use_electricity,
					"use_water" 				=> $obj->use_water,
					"is_local" 					=> $obj->is_local,
					"is_pattern" 				=> intval($obj->is_pattern),
					"status" 					=> $obj->status,
					"is_system"					=> $obj->is_system,

					"contact_type"				=> ""
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
			$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			isset($value->branch_id) 				? $obj->branch_id 				= $value->branch_id : "";
			isset($value->country_id) 				? $obj->country_id 				= $value->country_id : "";
			isset($value->ebranch_id) 				? $obj->ebranch_id 				= $value->ebranch_id : "";
			isset($value->elocation_id) 			? $obj->elocation_id 			= $value->elocation_id : "";
			isset($value->wbranch_id) 				? $obj->wbranch_id 				= $value->wbranch_id : "";
			isset($value->wlocation_id) 			? $obj->wlocation_id			= $value->wlocation_id : "";
			isset($value->user_id)					? $obj->user_id 				= $value->user_id : "";
			isset($value->contact_type_id)			? $obj->contact_type_id 		= $value->contact_type_id : "";
			isset($value->eorder)					? $obj->eorder					= $value->eorder : "";
			isset($value->worder)					? $obj->worder					= $value->worder : "";
			isset($value->abbr)						? $obj->abbr					= $value->abbr : "";
			isset($value->number)					? $obj->number					= $value->number : "";
			isset($value->eabbr)					? $obj->eabbr					= $value->eabbr : "";
			isset($value->enumber)					? $obj->enumber					= $value->enumber : "";
			isset($value->wabbr)					? $obj->wabbr					= $value->wabbr : "";
			isset($value->wnumber)					? $obj->wnumber					= $value->wnumber : "";
			isset($value->name)						? $obj->name					= $value->name : "";
			isset($value->gender)					? $obj->gender					= $value->gender : "";
			isset($value->dob)						? $obj->dob						= date("Y-m-d", strtotime($value->dob)) : "";
			isset($value->pob)						? $obj->pob						= $value->pob : "";
			isset($value->latitute)					? $obj->latitute 				= $value->latitute : "";
			isset($value->longtitute)				? $obj->longtitute 				= $value->longtitute : "";
			isset($value->credit_limit)				? $obj->credit_limit			= $value->credit_limit : "";
			isset($value->locale)					? $obj->locale					= $value->locale : "";
			isset($value->id_number)				? $obj->id_number				= $value->id_number : "";
			isset($value->phone)					? $obj->phone 					= $value->phone : "";
			isset($value->email)					? $obj->email 					= $value->email : "";
			isset($value->website)					? $obj->website					= $value->website : "";
			isset($value->job)						? $obj->job						= $value->job : "";
			isset($value->vat_no)					? $obj->vat_no					= $value->vat_no : "";
			isset($value->family_member)			? $obj->family_member			= $value->family_member : "";
			isset($value->city)						? $obj->city 					= $value->city : "";
			isset($value->post_code)				? $obj->post_code 				= $value->post_code : "";
			isset($value->address)					? $obj->address 				= $value->address : "";
			isset($value->bill_to)					? $obj->bill_to 				= $value->bill_to : "";
			isset($value->ship_to)					? $obj->ship_to 				= $value->ship_to : "";
			isset($value->memo)						? $obj->memo					= $value->memo : "";
			isset($value->image_url)				? $obj->image_url				= $value->image_url : "";
			isset($value->company)					? $obj->company					= $value->company : "";
			isset($value->company_en)				? $obj->company_en				= $value->company_en : "";
			isset($value->bank_name)				? $obj->bank_name				= $value->bank_name : "";
			isset($value->bank_address)				? $obj->bank_address			= $value->bank_address : "";
			isset($value->bank_account_name)		? $obj->bank_account_name		= $value->bank_account_name : "";
			isset($value->bank_account_number)		? $obj->bank_account_number		= $value->bank_account_number : "";
			isset($value->name_on_cheque)			? $obj->name_on_cheque			= $value->name_on_cheque : "";
			isset($value->business_type_id)			? $obj->business_type_id		= $value->business_type_id : "";
			isset($value->payment_term_id)			? $obj->payment_term_id			= $value->payment_term_id : "";
			isset($value->payment_method_id)		? $obj->payment_method_id		= $value->payment_method_id : "";
			isset($value->deposit_account_id)		? $obj->deposit_account_id		= $value->deposit_account_id : "";
			isset($value->trade_discount_id)		? $obj->trade_discount_id		= $value->trade_discount_id : "";
			isset($value->settlement_discount_id)	? $obj->settlement_discount_id	= $value->settlement_discount_id : "";
			isset($value->salary_account_id)		? $obj->salary_account_id		= $value->salary_account_id : "";
			isset($value->account_id)				? $obj->account_id				= $value->account_id : "";
			isset($value->ra_id)					? $obj->ra_id					= $value->ra_id : "";
			isset($value->tax_item_id)				? $obj->tax_item_id				= $value->tax_item_id : $obj->tax_item_id = 0;
			isset($value->phase_id)					? $obj->phase_id				= $value->phase_id : "";
			isset($value->voltage_id)				? $obj->voltage_id				= $value->voltage_id : "";
			isset($value->ampere_id)				? $obj->ampere_id				= $value->ampere_id : "";
			isset($value->registered_date)			? $obj->registered_date 		= date("Y-m-d", strtotime($value->registered_date)) : "";		
			isset($value->use_electricity)			? $obj->use_electricity			= $value->use_electricity : "";
			isset($value->use_water)				? $obj->use_water				= $value->use_water : "";
			isset($value->is_local)					? $obj->is_local				= $value->is_local : "";
			isset($value->is_pattern)				? $obj->is_pattern				= $value->is_pattern : "";
			isset($value->status)					? $obj->status					= $value->status : "";
			isset($value->deleted)					? $obj->deleted					= $value->deleted : "";
			isset($value->is_system)				? $obj->is_system				= $value->is_system : "";

			if($obj->save()){
				//Results
				$data["results"][] = array(
					"id" 						=> $obj->id,
					"branch_id" 				=> $obj->branch_id,
					"country_id" 				=> $obj->country_id,
					"ebranch_id" 				=> $obj->ebranch_id,
					"elocation_id" 				=> $obj->elocation_id,
					"wbranch_id" 				=> $obj->wbranch_id,
					"wlocation_id" 				=> $obj->wlocation_id,
					"user_id"					=> $obj->user_id, 	
					"contact_type_id" 			=> $obj->contact_type_id,
					"eorder" 					=> $obj->eorder,
					"worder" 					=> $obj->worder,
					"abbr" 						=> $obj->abbr,
					"number" 					=> $obj->number,
					"eabbr" 					=> $obj->eabbr,
					"enumber" 					=> $obj->enumber,
					"wabbr" 					=> $obj->wabbr,
					"wnumber" 					=> $obj->wnumber,
					"name" 						=> $obj->name,
					"gender"					=> $obj->gender,
					"dob" 						=> $obj->dob,
					"pob" 						=> $obj->pob,
					"latitute" 					=> $obj->latitute,
					"longtitute" 				=> $obj->longtitute,
					"credit_limit" 				=> $obj->credit_limit,
					"locale" 					=> $obj->locale,
					"id_number" 				=> $obj->id_number,
					"phone" 					=> $obj->phone,
					"email" 					=> $obj->email,
					"website" 					=> $obj->website,
					"job" 						=> $obj->job,
					"vat_no" 					=> $obj->vat_no,
					"family_member"				=> $obj->family_member,
					"city" 						=> $obj->city,
					"post_code" 				=> $obj->post_code,
					"address" 					=> $obj->address,
					"bill_to" 					=> $obj->bill_to,
					"ship_to" 					=> $obj->ship_to,
					"memo" 						=> $obj->memo,
					"image_url" 				=> $obj->image_url,
					"company" 					=> $obj->company,
					"company_en" 				=> $obj->company_en,
					"bank_name" 				=> $obj->bank_name,
					"bank_address" 				=> $obj->bank_address,
					"bank_account_name" 		=> $obj->bank_account_name,
					"bank_account_number" 		=> $obj->bank_account_number,
					"name_on_cheque" 			=> $obj->name_on_cheque,
					"business_type_id" 			=> $obj->business_type_id,
					"payment_term_id" 			=> $obj->payment_term_id,
					"payment_method_id" 		=> $obj->payment_method_id,
					"deposit_account_id"		=> $obj->deposit_account_id,
					"trade_discount_id" 		=> $obj->trade_discount_id,
					"settlement_discount_id"	=> $obj->settlement_discount_id,
					"salary_account_id"			=> $obj->salary_account_id,
					"account_id" 				=> $obj->account_id,
					"ra_id" 					=> $obj->ra_id,
					"tax_item_id" 				=> $obj->tax_item_id,
					"phase_id" 					=> $obj->phase_id,
					"voltage_id" 				=> $obj->voltage_id,
					"ampere_id" 				=> $obj->ampere_id,
					"registered_date" 			=> $obj->registered_date,
					"use_electricity" 			=> $obj->use_electricity,
					"use_water" 				=> $obj->use_water,
					"is_local" 					=> $obj->is_local,
					"is_pattern" 				=> intval($obj->is_pattern),
					"status" 					=> $obj->status,
					"is_system"					=> $obj->is_system,

					"contact_type"				=> ""
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
			$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
		}

		//Response data
		$this->response($data, 200);
	}

	//GET LESS
	function less_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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

		$obj->where("is_pattern <>", 1);
		$obj->where("deleted <>", 1);

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
		 		$data["results"][] = array(
		 			"id" 						=> $value->id,
					"contact_type_id" 			=> $value->contact_type_id,
					// "abbr" 						=> $value->abbr,
					"number" 					=> $value->number,
					"name" 						=> $value->name,
					"locale" 					=> $value->locale,
					"payment_term_id" 			=> $value->payment_term_id,
					"payment_method_id" 		=> $value->payment_method_id,
					"deposit_account_id"		=> $value->deposit_account_id,
					"trade_discount_id" 		=> $value->trade_discount_id,
					"settlement_discount_id"	=> $value->settlement_discount_id,
					"account_id" 				=> $value->account_id,
					"ra_id" 					=> $value->ra_id,
					"tax_item_id" 				=> $value->tax_item_id
		 		);
			}
		}

		//Response Data		
		$this->response($data, 200);
	}

	//Generate number
	public function _generate_number($type_id){
		$types = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$types->where("contact_type_id", $type_id);
		$types->where("is_pattern <>", 1);
		$types->order_by("number", "desc");
		$types->limit(1);
		$types->get();

		$number = "00001";
		if($types->exists()){
			$no = preg_replace('/[^0-9,.]+/i', '', $types->number);
			$no++;

			$number = str_pad($no, 5, "0", STR_PAD_LEFT);
		}

		return $number;
	}


	//GET TYPE
	function type_get() {
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		
		
		if($obj->result_count()>0){
			foreach ($obj as $value) {				
		 		$data["results"][] = array(
		 			"id" 			=> $value->id,		 			
					"parent_id" 	=> $value->parent_id,
					"contact_id" 	=> $value->contact_id,						
					"abbr" 			=> $value->abbr,
					"name" 			=> $value->name,
					"description" 	=> $value->description,
					"is_company" 	=> intval($value->is_company),
					"is_system" 	=> intval($value->is_system)						
		 		);
			}
		}

		//Response Data		
		$this->response($data, 200);
	}
	
	//POST TYPE
	function type_post() {
		$models = json_decode($this->post('models'));

		foreach ($models as $value) {
			$obj = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			
			isset($value->parent_id) 	? $obj->parent_id 		= $value->parent_id : "";
			isset($value->contact_id) 	? $obj->contact_id 		= $value->contact_id : "";
			isset($value->abbr) 		? $obj->abbr 			= $value->abbr : "";
			isset($value->name) 		? $obj->name 			= $value->name : "";
			isset($value->description) 	? $obj->description 	= $value->description : "";
			isset($value->is_company) 	? $obj->is_company 		= $value->is_company : "";
			isset($value->is_system) 	? $obj->is_system 		= $value->is_system : "";			
			
			if($obj->save()){
				//Respsone
				$data["results"][] = array(					
					"id" 			=> $obj->id,		 			
					"parent_id" 	=> $obj->parent_id,
					"contact_id" 	=> $obj->contact_id,
					"abbr" 			=> $obj->abbr,
					"name" 			=> $obj->name,
					"description" 	=> $obj->description,
					"is_company" 	=> $obj->is_company,
					"is_system" 	=> $obj->is_system	
				);				
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 201);
	}
	
	//PUT TYPE
	function type_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;

		foreach ($models as $value) {			
			$obj = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			
			isset($value->parent_id) 	? $obj->parent_id 		= $value->parent_id : "";
			isset($value->contact_id) 	? $obj->contact_id 		= $value->contact_id : "";
			isset($value->abbr) 		? $obj->abbr 			= $value->abbr : "";
			isset($value->name) 		? $obj->name 			= $value->name : "";
			isset($value->description) 	? $obj->description 	= $value->description : "";
			isset($value->is_company) 	? $obj->is_company 		= $value->is_company : "";
			isset($value->is_system) 	? $obj->is_system 		= $value->is_system : "";

			if($obj->save()){				
				//Results
				$data["results"][] = array(
					"id"			=> $obj->id,
					"parent_id" 	=> $obj->parent_id,
					"contact_id" 	=> $obj->contact_id,
					"abbr" 			=> $obj->abbr,						
					"name" 			=> $obj->name,
					"description" 	=> $obj->description,
					"is_company" 	=> $obj->is_company,
					"is_system" 	=> $obj->is_system
				);						
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}
	
	//DELETE TYPE
	function type_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
		}

		//Response data
		$this->response($data, 200);
	}

	//WATER
	//GET WATER ORDER
	function worder_get() {		
		$filters 	= $this->get();		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Filter
		if(!empty($filters["location_id"])){
	    	$obj->where("wlocation_id", $filters["location_id"]);										 			
		}

		//Only customer
		$obj->include_related("contact_type", "name");
		$obj->where_related("contact_type", "parent_id", 1);
		$obj->order_by("worder", "asc");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		
		
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$fullname = $value->surname.' '.$value->name;
				if($value->contact_type_id=="6" || $value->contact_type_id=="7" || $value->contact_type_id=="8"){
					$fullname = $value->company;
				}			

		 		$data["results"][] = array(
		 			"id" 					=> $value->id,					
					"worder" 				=> intval($value->worder),					
					"wnumber" 				=> $value->wnumber,
					"fullname" 				=> $fullname					
		 		);
			}
		}

		//Response Data		
		$this->response($data, 200);			
	}
	//GET WATER CUSTOMER LIST
	function wlist_get() {		
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
				if($value["field"]=="fullname"){
					$obj->order_by("id", $value["dir"]);					
				}else if($value["field"]=="contact_type_name"){
					$obj->order_by("contact_type_id", $value["dir"]);
				}else if($value["field"]=="wlocation_name"){
					$obj->order_by("wlocation_id", $value["dir"]);
				}else if($value["field"]=="wbranch_name"){
					$obj->order_by("wbranch_id", $value["dir"]);				
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
				
		 		$data["results"][] = array(
		 			"id" 					=> $value->id,		 			
		 			"wnumber" 				=> $value->wnumber,
					"fullname" 				=> $fullname,									
					"contact_type_name"		=> $value->contact_type_name,										
					"wlocation_name" 		=> $value->wlocation->get()->name,
					"wbranch_name" 			=> $value->wbranch->get()->name,												
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

				$balance = $value->invoice;
				$balance->select_sum("amount");
				$balance->where("type", "wInvoice");
				$balance->where("status", 0);
				$balance->get();
								
		 		$data["results"][] = array(
		 			"id" 					=> $value->id,		 			
		 			"wnumber" 				=> $value->wnumber,
					"fullname" 				=> $fullname,									
					"contact_type_name"		=> $value->contact_type_name,					
					"wbranch_name" 			=> $value->wbranch->get()->name,					
					"wlocation_name" 		=> $value->wlocation->get()->name,
					"balance" 				=> floatval($balance->amount)												
		 		);
			}
		}

		//Response Data		
		$this->response($data, 200);
	}

	//GET WATER CUSTOMER DEPOSIT
	function wdeposit_get() {		
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

				$deposit = $value->payment;
				$deposit->select_sum("amount");
				$deposit->where("type", "wdeposit");
				$deposit->get();
								
		 		$data["results"][] = array(
		 			"id" 					=> $value->id,		 			
		 			"wnumber" 				=> $value->wnumber,
					"fullname" 				=> $fullname,									
					"contact_type_name"		=> $value->contact_type_name,					
					"wbranch_name" 			=> $value->wbranch->get()->name,					
					"wlocation_name" 		=> $value->wlocation->get()->name,
					"deposit" 				=> floatval($deposit->amount)												
		 		);
			}
		}

		//Response Data		
		$this->response($data, 200);
	}

	//GET CUSTOMER NO METER
	function no_meter_get() {
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$sub_obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Only customer
		$obj->where("use_water", 1);
		$obj->include_related("contact_type", "name");
		$obj->where_related("contact_type", "parent_id", 1);		

		//Subquery
		$sub_obj->select("id")->where_related("meter", "utility_id", 2);
		$obj->where_not_in_subquery('id', $sub_obj);	

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		
		
		if($obj->exists()){
			foreach ($obj as $value) {
				$fullname = $value->surname.' '.$value->name;
				if($value->contact_type_id=="6" || $value->contact_type_id=="7" || $value->contact_type_id=="8"){
					$fullname = $value->company;
				}				

				//Electricity Deposit
				$edeposit = new Payment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$edeposit->where("contact_id", $value->id);
				$edeposit->select_sum("amount");
				$edeposit->where("type", "edeposit");
				$edeposit->get();

				//Water Deposit
				$wdeposit = new Payment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$wdeposit->where("contact_id", $value->id);
				$wdeposit->select_sum("amount");
				$wdeposit->where("type", "wdeposit");
				$wdeposit->get();

		 		$data["results"][] = array(		 						
					"id" 					=> $value->id,
		 			"number" 				=> $value->number,
		 			"enumber" 				=> $value->enumber,
		 			"wnumber" 				=> $value->wnumber,
					"fullname" 				=> $fullname,					
					"contact_type_name"		=> $value->contact_type_name,					
					"ebranch_name" 			=> $value->ebranch->get()->name,
					"wbranch_name" 			=> $value->wbranch->get()->name,
					"elocation_name" 		=> $value->elocation->get()->name,
					"wlocation_name" 		=> $value->wlocation->get()->name,								
					"edeposit" 				=> floatval($edeposit->amount),
					"wdeposit" 				=> floatval($wdeposit->amount)				
		 		);
			}
		}

		//Response Data		
		$this->response($data, 200);
	}

	//GET BRANCH NEW CUSTOMER
	function branch_new_get() {		
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

		//Only customer
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
				
				//Electricity Deposit
				$edeposit = new Payment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$edeposit->where("contact_id", $value->id);
				$edeposit->select_sum("amount");
				$edeposit->where("type", "edeposit");
				$edeposit->get();

				//Water Deposit
				$wdeposit = new Payment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$wdeposit->where("contact_id", $value->id);
				$wdeposit->select_sum("amount");
				$wdeposit->where("type", "wdeposit");
				$wdeposit->get();

		 		$data["results"][] = array(
		 			"id" 					=> $value->id,
		 			"number" 				=> $value->number,
		 			"enumber" 				=> $value->enumber,
		 			"wnumber" 				=> $value->wnumber,
					"fullname" 				=> $fullname,
					"registered_date" 		=> $value->registered_date,					
					"contact_type_name"		=> $value->contact_type_name,					
					"ebranch_name" 			=> $value->ebranch->get()->name,
					"wbranch_name" 			=> $value->wbranch->get()->name,
					"elocation_name" 		=> $value->elocation->get()->name,
					"wlocation_name" 		=> $value->wlocation->get()->name,					
					"edeposit" 				=> floatval($edeposit->amount),
					"wdeposit" 				=> floatval($wdeposit->amount),
					"meters"				=> $value->meter->get_raw()->result()										
		 		);
			}
		}

		//Response Data		
		$this->response($data, 200);
	}
}

/* End of file contacts.php */
/* Location: ./application/controllers/api/contacts.php */