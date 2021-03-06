<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Imports extends REST_Controller {

	public $_database;
	public $server_host;
	public $server_user;
	public $server_pwd;
	public $locale;
	public $currency;
	public $countryId;
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
			$this->locale = $institute->locale;
			$this->currency = $institute->monetary_id;
			$this->countryId = $institute->country_id;
			date_default_timezone_set("$conn->time_zone");
		}
	}

	function contact_post() {
		$models = json_decode($this->post('models'));

		$lastContact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$lastContact->order_by('id', 'desc')->limit(1)->get();
		$last_id = intval($lastContact->id);

		foreach ($models as $value) {
			$last_id++;
			$deposit = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$deposit->where('number', isset($value->deposit_account) ? $value->deposit_account:0)->get();

			$discount = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$discount->where('number', isset($value->trade_discount) ? $value->trade_discount:0)->get();

			$settlement = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$settlement->where('number', isset($value->settlement_discount) ? $value->settlement_discount:0)->get();

			$account = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$account->where('number', isset($value->account) ? $value->account:0)->get();
			
			$revenue = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$revenue->where('number', isset($value->revenue_account) ? $value->revenue_account:0)->get();

			$tax = new Tax_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$tax->where('name', isset($value->tax) ? $value->tax:0)->get();

			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->where('name', $value->contact_type)->where('parent_id <>', "")->get();

			$currency = new Currency(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$currency->where('code', $value->currency)->get();

			// test
			$country = null;
			if(isset($value->country)) {
				$connection = 'use banhji';
				$this->db->query($connection);
				$this->db->select('id')->from('countries')->where('name', $value->country);
				$sql = $this->db->get();
				foreach($sql->result() as $row) {
					$country = $row->id;
				}
			} else {
				$country = $this->countryId;
			}
				

			$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->branch_id) 				? $obj->branch_id 				= $value->branch_id : "";
			$obj->country_id = isset($value->country)?  $country : $this->countryId;
			isset($value->ebranch_id) 				? $obj->ebranch_id 				= $value->ebranch_id : "";
			isset($value->elocation_id) 			? $obj->elocation_id 			= $value->elocation_id : "";
			isset($value->wbranch_id) 				? $obj->wbranch_id 				= $value->wbranch_id : "";
			isset($value->wlocation_id) 			? $obj->wlocation_id			= $value->wlocation_id : "";
			isset($value->user_id)					? $obj->user_id 				= $value->user_id : "";
			isset($value->contact_type)				? $obj->contact_type_id 		= $type->id : "";
			isset($value->eorder)					? $obj->eorder					= $last_id : "";
			isset($value->worder)					? $obj->worder					= $last_id : "";
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
			isset($value->currency)					? $obj->locale					= $currency->locale : "";
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
			isset($value->deposit_account)			? $obj->deposit_account_id		= $deposit->id : "";
			isset($value->trade_discount)			? $obj->trade_discount_id		= $discount->id : "";
			isset($value->settlement_discount)		? $obj->settlement_discount_id	= $settlement->id : "";
			isset($value->salary_account_id)		? $obj->salary_account_id		= $value->salary_account_id : "";
			isset($value->account)					? $obj->account_id				= $account->id : "";
			isset($value->revenue_account)			? $obj->ra_id					= $revenue->id : "";
			isset($value->tax)						? $obj->tax_item_id				= $tax->id : "";
			isset($value->phase_id)					? $obj->phase_id				= $value->phase_id : "";
			isset($value->voltage_id)				? $obj->voltage_id				= $value->voltage_id : "";
			isset($value->ampere_id)				? $obj->ampere_id				= $value->ampere_id : "";
			isset($value->registered_date)			? $obj->registered_date 		= date("Y-m-d", strtotime($value->registered_date)) : "";
			isset($value->use_electricity)			? $obj->use_electricity			= $value->use_electricity : "";
			isset($value->use_water)				? $obj->use_water				= $value->use_water : "";
			isset($value->is_local)					? $obj->is_local				= $value->is_local : $this->locale;
			isset($value->is_pattern)				? $obj->is_pattern				= $value->is_pattern : "";
			$obj->status					= 1;
			isset($value->deleted)					? $obj->deleted					= $value->deleted : "";
			isset($value->is_system)				? $obj->is_system				= $value->is_system : "";

			if($obj->save()){
				$fullname = $obj->surname.' '.$obj->name;
				if($obj->contact_type_id=="6" || $obj->contact_type_id=="7" || $obj->contact_type_id=="8"){
					$fullname = $obj->company;
				}

				//Respsone
				$data["results"][] = array(
					"id" 						=> $obj->id,
					"branch_id" 				=> $obj->branch_id,
					"country_id" 				=> $country,
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

					"fullname" 					=> $fullname,
					"contact_type"				=> $obj->contact_type->get_raw()->result()
				);
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 201);
	}

	function wcontact_post() {
		$models = json_decode($this->post('models'));

		$lastContact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$lastContact->order_by('id', 'desc')->limit(1)->get();
		$last_id = intval($lastContact->id);

		foreach ($models as $value) {
			$last_id++;
			$deposit = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$deposit->select('id')->where('number', isset($value->deposit_account) ? $value->deposit_account:0)->get();

			$discount = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$discount->select('id')->where('number', isset($value->trade_discount) ? $value->trade_discount:0)->get();

			$settlement = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$settlement->select('id')->where('number', isset($value->settlement_discount) ? $value->settlement_discount:0)->get();

			$account = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$account->select('id')->where('number', isset($value->account) ? $value->account:0)->get();
			
			$revenue = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$revenue->select('id')->where('number', isset($value->revenue_account) ? $value->revenue_account:0)->get();

			$tax = new Tax_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$tax->select('id')->where('name', isset($value->tax) ? $value->tax:0)->get();

			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->select('id')->where('name', $value->contact_type)->where('parent_id <>', "")->get();

			$currency = new Currency(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$value->currency = isset($value->currency) ? $value->currency : "km-KH";
			$currency->where('code', $value->currency)->get();

			$license = new Branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$license->select('id, abbr')->where('number', isset($value->license) ? $value->license:0)->get();

			// test
			$country = null;
			if(isset($value->country)) {
				$connection = 'use banhji';
				$this->db->query($connection);
				$this->db->select('id')->from('countries')->where('name', $value->country);
				$sql = $this->db->get();
				foreach($sql->result() as $row) {
					$country = $row->id;
				}
			} else {
				$country = $this->countryId;
			}
				

			$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->branch_id) 				? $obj->branch_id 				= $value->branch_id : "";
			$obj->country_id = isset($value->country)?  $country : $this->countryId;
			isset($value->ebranch_id) 				? $obj->ebranch_id 				= $value->ebranch_id : "";
			isset($value->elocation_id) 			? $obj->elocation_id 			= $value->elocation_id : "";
			isset($value->wbranch_id) 				? $obj->wbranch_id 				= $value->wbranch_id : "";
			isset($value->wlocation_id) 			? $obj->wlocation_id			= $value->wlocation_id : "";
			isset($value->user_id)					? $obj->user_id 				= $value->user_id : "";
			isset($value->contact_type)				? $obj->contact_type_id 		= $type->id : "";
			isset($value->eorder)					? $obj->eorder					= $last_id : "";
			isset($value->worder)					? $obj->worder					= $last_id : "";
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
			// $obj->locale							= isset($value->currency) ? $currency->locale : $this->locale;
			isset($value->locale)					? $obj->locale					= $value->locale : "km-KH";
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
			isset($value->deposit_account)			? $obj->deposit_account_id		= $deposit->id : "";
			isset($value->trade_discount)			? $obj->trade_discount_id		= $discount->id : "";
			isset($value->settlement_discount)		? $obj->settlement_discount_id	= $settlement->id : "";
			isset($value->salary_account_id)		? $obj->salary_account_id		= $value->salary_account_id : "";
			isset($value->account)					? $obj->account_id				= $account->id : "";
			isset($value->revenue_account)			? $obj->ra_id					= $revenue->id : "";
			isset($value->tax)						? $obj->tax_item_id				= $tax->id : "";
			isset($value->phase_id)					? $obj->phase_id				= $value->phase_id : "";
			isset($value->voltage_id)				? $obj->voltage_id				= $value->voltage_id : "";
			isset($value->ampere_id)				? $obj->ampere_id				= $value->ampere_id : "";
			isset($value->registered_date)			? $obj->registered_date 		= date("Y-m-d", strtotime($value->registered_date)) : "";
			isset($value->use_electricity)			? $obj->use_electricity			= $value->use_electricity : "";
			// isset($value->use_water)				? $obj->use_water				= $value->use_water : "";
			$obj->use_water = 1;
			isset($value->is_local)					? $obj->is_local				= $value->is_local : $this->locale;
			isset($value->is_pattern)				? $obj->is_pattern				= $value->is_pattern : "";
			$obj->status					= 1;
			isset($value->deleted)					? $obj->deleted					= $value->deleted : "";
			isset($value->is_system)				? $obj->is_system				= $value->is_system : "";

			if($obj->save()){
				$fullname = $obj->surname.' '.$obj->name;
				if($obj->contact_type_id=="6" || $obj->contact_type_id=="7" || $obj->contact_type_id=="8"){
					$fullname = $obj->company;
				}

				// $utility = new Contact_utility(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				// $utility->contact_id = $obj->id;
				// $utility->type = 'w';
				// $utility->branch_id = $license->id;
				// isset($value->id_card) 	? $utility->id_card = $value->id_card : "";
				// isset($value->family_member) ? $utility->family_member = $value->family_member : "";
				// isset($value->occupation) ? $utility->occupation = $value->occupation : "";
				// isset($value->code) ? $utility->code = $value->code : "";
				// $utility->abbr = $license->abbr;
				// $utility->save();

				//Respsone
				$data["results"][] = array(
					"id" 						=> $obj->id,
					"branch_id" 				=> $obj->branch_id,
					"country_id" 				=> $country,
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
					"use_water" 				=> 1,
					"is_local" 					=> $obj->is_local,
					"is_pattern" 				=> intval($obj->is_pattern),
					"status" 					=> $obj->status,
					"is_system"					=> $obj->is_system,
					"fullname" 					=> $fullname,
					"contact_type"				=> $obj->contact_type->get_raw()->result()
				);
			}
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}

	function meter_post() {
		$models = json_decode($this->post('models'));
		$data = array();
		$order = 1;
		foreach($models as $row) {
			$property = new Property(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$property->where('name', $row->property)->limit(1)->get();
			$customer = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$plan = new Plan(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$location = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$meter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			$customer->select('id, deposit_account_id, account_id, name')->where('id', $property->contact_id)->get();
			$location->select('id, branch_id')->where('name', $row->bloc)->limit(1)->get();
			$plan->select('id, code')->where('code', $row->plan_code)->get();
			if(isset($row->sub_bloc)){
				$sublocation = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$sublocation->select('id, branch_id')->where('name', $row->sub_bloc)->limit(1)->get();
				$meter->pole_id = isset($sublocation->id) ? $sublocation->id : 0;
			}
			if(isset($row->box)){
				$box = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$box->select('id, branch_id')->where('name', $row->box)->limit(1)->get();
				$meter->box_id = isset($box->id) ? $box->id: 0;
			}
			if(isset($row->ampere)){
				$ampere = new Electricity_unit(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$ampere->select('id')->where('name', $row->ampere)->limit(1)->get();
				$meter->ampere_id = isset($ampere->id) ? $ampere->id: 0;
			}
			if(isset($row->phase)){
				$phase = new Electricity_unit(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$phase->select('id')->where('name', $row->phase)->limit(1)->get();
				$meter->phase_id = isset($phase->id) ? $phase->id: 0;
			}
			if(isset($row->voltage)){
				$voltage = new Electricity_unit(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$voltage->select('id')->where('name', $row->voltage)->limit(1)->get();
				$meter->voltage_id = isset($voltage->id) ? $voltage->id: 0;
			}
			$startup = intval($row->start_up);
			$meter->number = isset($row->number) ? $row->number : 0;
			$meter->multiplier = isset($row->multiplier) ? $row->multiplier : 1;
			$meter->worder = isset($row->order) ? $row->order : $order;
			$meter->startup_reader = isset($startup) ? $startup : 0;
			$meter->number_digit = $row->digit_number;
			$meter->activated = 1;
			
			if($row->status == "inactive"){
				$meter->status = 0;
			}elseif($row->status == "void"){
				$meter->status = 2;
			}else{
				$meter->status = 1;
			}
			
			$meter->property_id = $property->id;
			$meter->contact_id = $property->contact_id;
			$meter->branch_id = $location->branch_id;
			$meter->location_id = $location->id;
			
			$meter->type = isset($row->type) ? $row->type: "e";
			$meter->plan_id = $plan->id;
			$meter->date_used = date('Y-m-d', strtotime($row->date_used));

			if($meter->save()) {
				$reading = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$reading->previous = $meter->startup_reader;
				$reading->current = $meter->startup_reader;
				$reading->meter_id = $meter->id;
				$reading->usage = 0;
				$reading->month_of = $meter->date_used;
				$reading->from_date = $meter->date_used;
				$reading->to_date = $meter->date_used;
				$reading->invoiced= 1;
				$reading->save();
				
				$planItems = $plan->plan_item->get();
				$depositAcct = 0;
				foreach($planItems as $item) {
					if($item->type == "deposit") {
						$depositAcct = $item->account_id;
						break;
					}
				}
				// transaction
				if(isset($row->deposit)) {
					$transaction = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$transaction->type = "Utility_Deposit";
					$transaction->contact_id = $customer->id;
					$transaction->journal_type = "journal";
					$transaction->is_journal = 1;
					$transaction->rate = 1.000000000000000;
					$transaction->locale = $this->locale;
					$transaction->number = "JV".$this->_generate_number($transaction->type, $meter->date_used);
					$transaction->deposit_date = date('Y-m-d', strtotime($row->date_used));
					$transaction->status = 1;
					$transaction->meter_id = $meter->id;
					$transaction->amount = isset($row->deposit) ? $row->deposit : 0;
					if($transaction->save()) {
						$deposit1 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$deposit1->transaction_id = $transaction->id;
						$deposit1->account_id = $depositAcct;
						$deposit1->description= "Utility Opening Deposit";
						$deposit1->contact_id = $transaction->contact_id;
						$deposit1->dr = isset($row->deposit) ? $row->deposit : 0;
						$deposit1->cr = 0.00;
						$deposit1->save();

						$deposit2 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$deposit2->transaction_id = $transaction->id;
						$deposit2->account_id = 70;
						$deposit2->description= "Utility Opening Deposit";
						$deposit2->contact_id = $transaction->contact_id;
						$deposit2->dr = 0.00;
						$deposit2->cr = isset($row->deposit) ? $row->deposit : 0;
						$deposit2->save();
					}
				}

				if(isset($row->balance) && $row->balance > 0) {
					$ar = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$ar->type = "Utility_Invoice";
					$ar->contact_id = $customer->id;
					$ar->journal_type = "journal";
					$ar->is_journal = 1;
					$ar->meter_id = $meter->id;
					$ar->rate = 1.000000000000000;
					$ar->locale = $this->locale;
					$ar->due_date = date('Y-m-d');
					$ar->month_of = date('Y-m-d', strtotime($row->date_used));
					$ar->location_id = $location->id;
					$ar->number = "JV".$this->_generate_number($ar->type, $meter->date_used);
					$ar->issued_date = date('Y-m-d', strtotime($row->date_used));
					$ar->amount = $row->balance;
					$ar->sub_total = $row->balance;
					$ar->status = 0;
					if($ar->save()) {
						$ar1 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$ar1->transaction_id = $ar->id;
						$ar1->account_id = $customer->account_id;
						$ar1->description= "Utility Opening Balance";
						$ar1->contact_id = $ar->contact_id;
						$ar1->dr = isset($row->balance) ? $row->balance : 0;
						$ar1->cr = 0.00;
						$ar1->save();

						$ar2 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$ar2->transaction_id = $ar->id;
						$ar2->account_id = 70;
						$ar2->description= "Utility Opening Balance";
						$ar2->contact_id = $ar->contact_id;
						$ar2->dr = 0.00;
						$ar2->cr = isset($row->balance) ? $row->balance : 0;
						$ar2->save();
					}
				}
 				
				$data[] = array(
					'id' => $meter->id,
					'number' => $meter->number,
					'order' => $meter->worder,
					'customer' => $customer->id,
					'bloc' => $location->id,
					'plan_code' => $plan->id,
					'digit_number' => $meter->number_digit
				);
			}
		}
		$this->response(array('results' => $data, 'count' => count($data)), 201);
	}

	function property_post() {
		$models = json_decode($this->post('models'));
		$data = array();

		foreach($models as $row) {
			$contact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			// problem with same name for two different people
			$contact->where('name', $row->contact)->order_by("id", "desc")->get();
			$property = new Property(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$property->contact_id = $contact->id;
			$property->name = $row->name;
			$property->abbr = $row->abbr;
			$property->code = $row->code;

			// $property->trans_begin();
			// $property->save();
			if($property->save()) {
				// $property->trans_commit();
				$data[] = array(
					'id' => $property->id,
					'name' => $property->name,
					'code' => $property->code
				);
			}
		}

		$this->response(array('results' => $data, 'count' => count($data)), 201);

	}

	function item_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = array();
		$data["count"] = 0;

		foreach ($models as $value) {
			$obj = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			$fixed = 0;
			$accumulated = 0;
			$depreciation = 0;

			$income = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			if(isset($value->income_account)) {
				$income->where('number', $value->income_account)->get();
			}			

			$expense = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			if(isset($value->cogs_account)) {
				$expense->where('number', $value->cogs_account)->get();
			}			

			$inventory = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$inventory->where('number', $value->inventory_account)->get();

			$type = new Item_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->where('name', $value->type)->get();

			$cat = new Category(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$cat->where('name', $value->category)->get();

			$uom = new Measurement(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$uom->where('name', $value->measurement)->get();

			$group = new Item_group(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$group->where('name', $value->group)->get();

			$currency = new Currency(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			if(isset($value->currency)) {
				$currency->where('code', strtolower($value->currency))->get();
			}			


			isset($value->company_id) 				? $obj->company_id 				= $value->company_id : 0;
			isset($value->contact_id) 				? $obj->contact_id 				= $value->contact_id : 0;
			$obj->currency_id 						= $this->currency;
			isset($value->type) 					? $obj->item_type_id			= $type->id : 1;
			isset($value->category) 				? $obj->category_id 			= $cat->id : 1;
			$obj->item_group_id = isset($value->group) 	? $group->id : 0;
			isset($value->item_sub_group_id) 		? $obj->item_sub_group_id 		= $value->item_sub_group_id : 0;
			isset($value->brand_id) 				? $obj->brand_id 				= $value->brand_id : "";
			isset($value->measurement) 				? $obj->measurement_id 			= $uom->id : 1;
			isset($value->main_id) 					? $obj->main_id 				= $value->main_id : "";
			isset($value->abbr) 					? $obj->abbr 					= $value->abbr : "";
			isset($value->number) 					? $obj->number 					= $value->number : "";
			isset($value->international_code) 		? $obj->international_code 		= $value->international_code : "";
			isset($value->imei) 					? $obj->imei 					= $value->imei : "";
			isset($value->serial_number) 			? $obj->serial_number 			= $value->serial_number : "";
			isset($value->supplier_code) 			? $obj->supplier_code 			= $value->supplier_code : "";
			isset($value->color_code) 				? $obj->color_code 				= $value->color_code : "";
		   	isset($value->name) 					? $obj->name 					= $value->name :  "";
		   	isset($value->purchase_description) 	? $obj->purchase_description 	= $value->purchase_description : "";
		   	isset($value->sale_description) 		? $obj->sale_description 		= $value->sale_description : "";
		   	isset($value->catalogs) 				? $obj->catalogs 				= implode(",",$value->catalogs) : "";
		   	isset($value->cost) 					? $obj->cost 					= $value->cost : "";
		   	isset($value->price) 					? $obj->price 					= $value->price : "";
		   	isset($value->amount) 					? $obj->amount 					= $value->amount : "";
		   	isset($value->rate) 					? $obj->rate 					= $value->rate : "";
		   	$obj->locale 							= isset($value->currency) ? 	$currency->locale : $this->locale;
		   	isset($value->on_hand) 					? $obj->on_hand 				= $value->on_hand : "";
		   	isset($value->on_po) 					? $obj->on_po 					= $value->on_po : "";
		   	isset($value->on_so) 					? $obj->on_so 					= $value->on_so : "";
		   	isset($value->order_point) 				? $obj->order_point 			= $value->order_point : "";
		   	$obj->income_account_id 		 		= isset($value->income_account) ? $income->id : 0;
		   	$obj->expense_account_id 		  		= isset($value->cogs_account) ? $expense->id : 0;
		   	isset($value->inventory_account) 		? $obj->inventory_account_id 	= $inventory->id : "";
		   	isset($value->preferred_vendor_id) 		? $obj->preferred_vendor_id 	= $value->preferred_vendor_id : "";
		   	$obj->image_url							= isset($value->image_url) 				? $value->image_url : "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/no_image.jpg";
		   	isset($value->favorite) 				? $obj->favorite 				= $value->favorite : "";
		   	isset($value->is_catalog) 				? $obj->is_catalog 				= $value->is_catalog : "";
		   	isset($value->is_assembly) 				? $obj->is_assembly 			= $value->is_assembly : "";
		   	isset($value->is_pattern) 				? $obj->is_pattern 				= $value->is_pattern : "";
		   	$obj->status 							= isset($value->status) ? $value->status : 1;
		   	isset($value->deleted) 					? $obj->deleted 				= $value->deleted : "";

	   		if($obj->save()){
	   			$item_price = new Item_price(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$item_price->item_id = $obj->id;
	   			$item_price->measurement_id =$obj->measurement_id;
	   			$item_price->unit_value =1;
	   			$item_price->price =floatval($obj->price);
	   			$item_price->locale = $obj->locale;
	   			$item_price->quantity =1;
	   			$item_price->save();
			   	$data["results"][] = array(
			   		"id" 						=> $obj->id,
					"company_id" 				=> $obj->company_id,
					"contact_id" 				=> $obj->contact_id,
					"currency_id" 				=> $obj->currency_id,
					"item_type_id"				=> $obj->item_type_id,
					"category_id" 				=> $obj->category_id,
					"item_group_id"				=> $obj->item_group_id,
					"item_sub_group_id"			=> $obj->item_sub_group_id,
					"brand_id" 					=> $obj->brand_id,
					"measurement_id" 			=> $obj->measurement_id,
					"main_id" 					=> $obj->main_id,
					"abbr" 						=> $obj->abbr,
					"number" 					=> $obj->number,
					"international_code" 		=> $obj->international_code,
					"imei" 						=> $obj->imei,
					"serial_number" 			=> $obj->serial_number,
					"supplier_code"				=> $obj->supplier_code,
					"color_code" 				=> $obj->color_code,
				   	"name" 						=> $obj->name,
				   	"purchase_description" 		=> $obj->purchase_description,
				   	"sale_description" 			=> $obj->sale_description,
				   	"catalogs" 					=> explode(",",$obj->catalogs),
				   	"cost" 						=> floatval($obj->cost),
				   	"price" 					=> floatval($obj->price),
				   	"amount" 					=> floatval($obj->amount),
				   	"rate" 						=> floatval($obj->rate),
				   	"locale" 					=> $obj->locale,
				   	"on_hand" 					=> floatval($obj->on_hand),
				   	"on_po" 					=> floatval($obj->on_po),
				   	"on_so" 					=> floatval($obj->on_so),
				   	"order_point" 				=> intval($obj->order_point),
				   	"account_id" 				=> $obj->account_id,
				   	"income_account_id" 		=> $obj->income_account_id,
				   	"cogs_account_id"			=> $obj->cogs_account_id,
				   	"inventory_account_id"		=> $obj->inventory_account_id,
				   	"fixed_assets_account_id" 	=> $obj->fixed_assets_account_id,
				   	"accumulated_account_id" 	=> $obj->accumulated_account_id,
				   	"depreciation_account_id" 	=> $obj->depreciation_account_id,
				   	"deposit_account_id" 		=> $obj->deposit_account_id,
				   	"preferred_vendor_id" 		=> $obj->preferred_vendor_id,
				   	"image_url" 				=> $obj->image_url,
				   	"favorite" 					=> $obj->favorite=="true"?true:false,
				   	"is_catalog" 				=> $obj->is_catalog,
				   	"is_assembly" 				=> $obj->is_assembly,
				   	"is_pattern" 				=> intval($obj->is_pattern),
				   	"status" 					=> $obj->status,
				   	"deleted" 					=> $obj->deleted,
				   	"is_system" 				=> $obj->is_system
			   	);
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}

	function journal_post() {
		$models = json_decode($this->post('models'));
		$journals = array();
		$err = array();

		foreach($models as $journal) {
			$cr = 0;
			$dr = 0;
			$amount = 0;
			isset($journal->dr) ? $dr = floatval($journal->dr) : $dr = 0;
			isset($journal->cr) ? $cr = floatval($journal->cr) : $cr = 0;
			$amount += $dr;
			if(isset($journals["$journal->trans_no"])){
				$journals["$journal->trans_no"]["amount"] += $amount;
				$journals["$journal->trans_no"]["items"][] = array(
					'account_number' => $journal->account_number,
					'memo' => $journal->memo,
					'dr' => $dr,
					'cr' => $cr
				);
			} else {
				$journals["$journal->trans_no"]["amount"] = $amount;
				$journals["$journal->trans_no"]["number"] = $journal->number;
				$journals["$journal->trans_no"]["date"] = $journal->date;
				$journals["$journal->trans_no"]["items"][] = array(
					'account_number' => $journal->account_number,
					'memo' => $journal->memo,
					'dr' => $dr,
					'cr' => $cr
				);
			}
		}

		foreach($journals as $journal) {
			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->number = isset($journal['number']) ? $journal['number'] : "";
			$obj->type = "Journal";
			$obj->memo = isset($journal['items'][0]['memo']) ? $journal['items'][0]['memo'] : "";
			$obj->journal_type = "Journal";
			$obj->issued_date = date("Y-m-d", strtotime($journal['date']));
			$obj->amount = $journal['amount'];
			$obj->rate = 1.00;
			$obj->is_journal = 1;
			$obj->locale = $this->locale;

			if($obj->save()) {
				foreach($journal['items'] as $item) {
					$account = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$account->select('id')->where('number', $item['account_number'])->get();

					$journalItem = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$journalItem->transaction_id = $obj->id;
					$journalItem->account_id = $account->id;
					$journalItem->description = $item['memo'];
					$journalItem->dr = $item['dr'];
					$journalItem->cr = $item['cr'];
					$journalItem->rate = 1.00;
					$journalItem->locale = $this->locale;
					$journalItem->save();
				}
			}
		}


		$this->response(array('results'=> array(), 'msg' => "Operation is good."), 201);
	}
	//Location
	function location_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = array();
		$data["count"] = 0;

		foreach ($models as $value) {
			$obj = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$branch = new Branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$branch->select('id, type')->where('name', $value->license)->get();
			isset($value->location) 			? $obj->name 				= $value->location : "";
			isset($value->abbr) 				? $obj->abbr 				= $value->abbr : "";
			isset($branch->id) 					? $obj->branch_id			= $branch->id : 0;
			isset($branch->type) 				? $obj->type 				= $branch->type : "w";
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 				=> $obj->id,
			   		"branch_id" 		=> $obj->branch_id,
					"name" 				=> $obj->name,
					"abbr" 				=> $obj->abbr
			   	);
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function sublocation_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = array();
		$data["count"] = 0;

		foreach ($models as $value) {
			$obj = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$mlocation = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$mlocation->select('id, branch_id, type')->where('name', $value->location)->get();
			isset($value->sub_location) 			? $obj->name 				= $value->sub_location : "";
			isset($value->abbr) 					? $obj->abbr 				= $value->abbr : "";
			isset($mlocation->id) 					? $obj->main_bloc			= $mlocation->id : 0;
			isset($mlocation->type) 				? $obj->type 				= $mlocation->type : "w";
			isset($mlocation->branch_id) 			? $obj->branch_id 			= $mlocation->branch_id : 0;
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 				=> $obj->id,
			   		"branch_id" 		=> $obj->branch_id,
			   		"main_bloc" 		=> $obj->main_bloc,
					"name" 				=> $obj->name,
					"abbr" 				=> $obj->abbr
			   	);
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function box_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = array();
		$data["count"] = 0;

		foreach ($models as $value) {
			$obj = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$mlocation = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$mlocation->select('id, branch_id, type, main_bloc')->where('name', $value->sub_location)->get();
			isset($value->box) 						? $obj->name 				= $value->box : "";
			isset($value->abbr) 					? $obj->abbr 				= $value->abbr : "";
			isset($mlocation->id) 					? $obj->main_pole			= $mlocation->id : 0;
			isset($mlocation->main_bloc) 			? $obj->main_bloc			= $mlocation->main_bloc : 0;
			isset($mlocation->type) 				? $obj->type 				= $mlocation->type : "w";
			isset($mlocation->branch_id) 			? $obj->branch_id 			= $mlocation->branch_id : 0;
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 				=> $obj->id,
			   		"branch_id" 		=> $obj->branch_id,
			   		"main_bloc" 		=> $obj->main_bloc,
			   		"main_pole" 		=> $obj->main_pole,
					"name" 				=> $obj->name,
					"abbr" 				=> $obj->abbr
			   	);
		    }
		}

		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}

	
	function coa_post() {
		$models = json_decode($this->post('models'));
		$journals = array();
		$err = array();
		$data = array();

		foreach($models as $value) {
			$coa = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type = new Account_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->where('name', $value->type)->get();

			$coa->number = $value->code;
			$coa->name   = $value->name;
			$coa->account_type_id = $type->id;
			if($coa->save()) {
				$data[] = array(
					'id' => $coa->id,
					'name' => $coa->name,
					'account_type_id' => $coa->account_type_id,
					'_type' => array('id' => $type->id,'name' => $type->name, 'number' => $type->number, 'nature' => $type->nature)
				);
			}
		}

		$this->response(array('results'=> $data, 'msg' => "Operation is good."), 201);
	}
	private function dbsize_get() {
		$CI=&get_instance();
    	$CI->load->database();
		$this->load->dbutil();
		$dbs = $this->dbutil->list_databases();

		$companyList = array("banhji","banhji_mac", "db_banhji", "information_schema","innodb","mysql","performance_schema","tmp");
		$data = array();
		foreach ($dbs as $db)
		{
			if (!in_array("$db", $companyList)) {
				// $data[] = $db;
		    $dbName = $CI->db->database;

		    $dbName = $this->db->escape($db);

		    $sql = "SELECT table_schema AS db_name, sum( data_length + index_length ) / 1024 / 1024 AS db_size_mb FROM information_schema.tables WHERE table_schema = $dbName GROUP BY table_schema ;";

		    $query = $CI->db->query($sql);

		    if ($query->num_rows() == 1) {

		       $row = $query->row();
		       $size = $row->db_size_mb;
		       $data[] = array("db" => $db, "size" => $size);

		    }
			}
		}
		$this->response(array('results'=> $data, 'count'=>count($data), 'msg' => "Operation is good."), 200);
	}

	public function _generate_number($type, $date){
		$YY = date("y");
		$MM = date("m");
		$startDate = date("Y")."-01-01";
		$endDate = date("Y")."-12-31";

		if(isset($date)){
			$YY = date('y', strtotime($date));
			$MM = date('m', strtotime($date));
			$startDate = $YY."-01-01";
			$endDate = $YY."-12-31";
		}

		$prefix = new Prefix(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$prefix->where('type', $type);
		$prefix->limit(1);
		$prefix->get();

		$headerWithDate = $prefix->abbr . $YY . $MM;

		$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$txn->where('type', $type);
		$txn->where("issued_date >=", $startDate);
		$txn->where("issued_date <=", $endDate);
		$txn->where('is_recurring <>', 1);
		$txn->order_by('id', 'desc');
		$txn->limit(1);
		$txn->get();

		$number = "";
		if($txn->exists()){
			$no = 0;
			if(strlen($txn->number)>10){
				$no = intval(substr($txn->number, strlen($txn->number) - 5));
			}
			$no++;

			$number = $headerWithDate . str_pad($no, 5, "0", STR_PAD_LEFT);
		}else{
			//Check existing txn
			$existTxn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$existTxn->where('type', $type);
			$existTxn->where('is_recurring <>', 1);
			$existTxn->limit(1);
			$existTxn->get();

			if($existTxn->exists()){
				$number = $headerWithDate . str_pad(1, 5, "0", STR_PAD_LEFT);
			}else{
				$number = $headerWithDate . str_pad($prefix->startup_number, 5, "0", STR_PAD_LEFT);
			}
		}

		return $number;
	}
}