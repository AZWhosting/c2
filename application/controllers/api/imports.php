<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Imports extends REST_Controller {

	public $_database;
	public $server_host;
	public $server_user;
	public $server_pwd;
	public $locale;
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
			$deposit->where('number', $value->deposit_account)->get();

			$discount = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$discount->where('number', $value->trade_discount)->get();

			$settlement = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$settlement->where('number', $value->settlement_discount)->get();

			$account = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$account->where('number', $value->account)->get();

			$revenue = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$revenue->where('number', $value->revenue_account)->get();

			$tax = new Tax_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$tax->where('name', $value->tax)->get();

			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$type->where('name', $value->contact_type)->where('parent_id <>', "")->get();

			$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->branch_id) 				? $obj->branch_id 				= $value->branch_id : "";
			isset($value->country_id) 				? $obj->country_id 				= $value->country_id : "";
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
			isset($value->is_local)					? $obj->is_local				= $value->is_local : "";
			isset($value->is_pattern)				? $obj->is_pattern				= $value->is_pattern : "";
			isset($value->status)					? $obj->status					= $value->status : "";			
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

					"fullname" 					=> $fullname,					
					"contact_type"				=> $obj->contact_type->get_raw()->result()
				);				
			}		
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 201);
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

			$account = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$account->where('number', $value->account)->get();

			$income = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$income->where('number', $value->income_account)->get();

			$cogs = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$cogs->where('number', $value->cogs_account)->get();

			$inventory = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$inventory->where('number', $value->inventory_account)->get();

			if(isset($value->fixed_assets_account)) {
				$fixed = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$fixed->where('number', $value->fixed_assets_account)->get();
			}				

			if(isset($value->accumulated_account)) {
				$accumulated = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$accumulated->where('number', $value->accumulated_account)->get();
			}

			if(isset($value->depreciation_account)) {
				$depreciation = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$depreciation->where('number', $value->depreciation_account)->get();
			}

			isset($value->company_id) 				? $obj->company_id 				= $value->company_id : "";
			isset($value->contact_id) 				? $obj->contact_id 				= $value->contact_id : "";			
			isset($value->currency_id) 				? $obj->currency_id 			= $value->currency_id : "";
			isset($value->item_type_id) 			? $obj->item_type_id			= $value->item_type_id : 1;			
			isset($value->category_id) 				? $obj->category_id 			= $value->category_id : 1;
			isset($value->item_group_id) 			? $obj->item_group_id 			= $value->item_group_id : "";
			isset($value->item_sub_group_id) 		? $obj->item_sub_group_id 		= $value->item_sub_group_id : "";
			isset($value->brand_id) 				? $obj->brand_id 				= $value->brand_id : "";
			isset($value->measurement_id) 			? $obj->measurement_id 			= $value->measurement_id : "";		
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
		   	isset($value->locale) 					? $obj->locale 					= $value->locale : $this->locale;
		   	isset($value->on_hand) 					? $obj->on_hand 				= $value->on_hand : "";
		   	isset($value->on_po) 					? $obj->on_po 					= $value->on_po : "";
		   	isset($value->on_so) 					? $obj->on_so 					= $value->on_so : "";
		   	isset($value->order_point) 				? $obj->order_point 			= $value->order_point : "";
		   	isset($value->account) 					? $obj->account_id 				= $account->id : "";
		   	isset($value->income_account) 			? $obj->income_account_id 		= $income->id : "";
		   	isset($value->cogs_account) 			? $obj->cogs_account_id 		= $cogs->id : "";
		   	isset($value->inventory_account) 		? $obj->inventory_account_id 	= $inventory->id : "";
		   	isset($value->fixed_assets_account) 	? $obj->fixed_assets_account_id = $fixed->id : $fixed;
		   	isset($value->accumulated_account) 		? $obj->accumulated_account_id 	= $accumulated->id : $accumulated;
		   	isset($value->depreciation_account) 	? $obj->depreciation_account_id = $depreciation->id : $depreciation;
		   	isset($value->deposit_account_id) 		? $obj->deposit_account_id 		= $value->deposit_account_id : "";
		   	isset($value->preferred_vendor_id) 		? $obj->preferred_vendor_id 	= $value->preferred_vendor_id : "";
		   	isset($value->image_url) 				? $obj->image_url				= $value->image_url : "";
		   	isset($value->favorite) 				? $obj->favorite 				= $value->favorite : "";
		   	isset($value->is_catalog) 				? $obj->is_catalog 				= $value->is_catalog : "";
		   	isset($value->is_assembly) 				? $obj->is_assembly 			= $value->is_assembly : "";
		   	isset($value->is_pattern) 				? $obj->is_pattern 				= $value->is_pattern : "";
		   	isset($value->status) 					? $obj->status 					= $value->status : "";	   	
		   	isset($value->deleted) 					? $obj->deleted 				= $value->deleted : "";

	   		if($obj->save()){
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
				   	"locale" 					=> floatval($obj->locale),
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
			$obj->number = $journal['number'];
			$obj->type = "Journal";
			$obj->journal_type = "Journal";
			$obj->issued_date = date("Y-m-d", strtotime($journal['date']));
			$obj->amount = $journal['amount'];
			$obj->rate = 1.00;
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
	
}