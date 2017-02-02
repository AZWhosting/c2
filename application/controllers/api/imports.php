<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Imports extends REST_Controller {

	public $_database;
	public $server_host;
	public $server_user;
	public $server_pwd;
	public $locale;
	public $currency;
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

			$currency = new Currency(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$currency->where('code', $value->currency)->get();

			$country = new Country(null, $this->server_host, $this->server_user, $this->server_pwd, "banhji");
			$country->where('name', $value->country)->get();

			$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->branch_id) 				? $obj->branch_id 				= $value->branch_id : "";
			isset($value->country) 					? $obj->country_id 				= $country->id : "";
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
			isset($value->is_local)					? $obj->is_local				= $value->is_local : "";
			isset($value->is_pattern)				? $obj->is_pattern				= $value->is_pattern : "";
			isset($value->status)					? $obj->status					= $value->status : 1;
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

			$income = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$income->where('number', $value->income_account)->get();

			$expense = new Account(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$expense->where('number', $value->cogs_account)->get();

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


			isset($value->company_id) 				? $obj->company_id 				= $value->company_id : 0;
			isset($value->contact_id) 				? $obj->contact_id 				= $value->contact_id : 0;
			$obj->currency_id 						= $this->currency;
			isset($value->type) 					? $obj->item_type_id			= $type->id : 1;
			isset($value->category) 				? $obj->category_id 			= $cat->id : 1;
			isset($value->group) 					? $obj->item_group_id 			= $group->id : 0;
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
		   	$obj->locale 							= $this->locale;
		   	isset($value->on_hand) 					? $obj->on_hand 				= $value->on_hand : "";
		   	isset($value->on_po) 					? $obj->on_po 					= $value->on_po : "";
		   	isset($value->on_so) 					? $obj->on_so 					= $value->on_so : "";
		   	isset($value->order_point) 				? $obj->order_point 			= $value->order_point : "";
		   	isset($value->income_account) 			? $obj->income_account_id 		= $income->id : "";
		   	isset($value->cogs_account) 			? $obj->expense_account_id 		= $expense->id : "";
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
	// function create_get() {
	// 	$this->load->dbutil();
	// 	$dbs = $this->dbutil->list_databases();
	//
	// 	$companyList = array("banhji","banhji_mac", "db_banhji", "information_schema","innodb","mysql","performance_schema","tmp");
	// 	$data = array();
	// 	foreach ($dbs as $db)
	// 	{
	// 		if (!in_array("$db", $companyList)) {
	// 		    $data[] = $db;
	// 		    $connection = 'use ' . $db;
	//
	// 		 //    $dataInserted = array(
	// 			//    'account_type_id' => 34,
	// 			//    'sub_of_id' => 70,
	// 			//    'number' => '32900',
	// 			//    'locale' => 'km-KH',
	// 			//    'name' => 'Opening Balance Equity',
	// 			//    'status' => 1,
	// 			//    'is_system' => 1
	// 			// );
	// 			$dataInserted = array(
	// 				array(
	// 					"is_pattern" => 0,
	// 					"number" => "00001",
	// 					"abbr" => "LAN",
	// 					"name" => "Freehold Land"
	// 				),
	// 				array(
	// 					"is_pattern" => 0,
	// 					"number" => "00001",
	// 					"abbr" => "CRE",
	// 					"name" => "Computer & Related Equipment"
	// 				),
	// 				array(
	// 					"is_pattern" => 0,
	// 					"number" => "00001",
	// 					"abbr" => "BUS",
	// 					"name" => "Building & Structure"
	// 				),
	// 				array(
	// 					"is_pattern" => 0,
	// 					"number" => "00001",
	// 					"abbr" => "AUC",
	// 					"name" => "Asset Under Construction"
	// 				),
	// 				array(
	// 					"is_pattern" => 0,
	// 					"number" => "00001",
	// 					"abbr" => "ESM",
	// 					"name" => "Electrical System & Machine"
	// 				),
	// 				array(
	// 					"is_pattern" => 0,
	// 					"number" => "00001",
	// 					"abbr" => "AUV",
	// 					"name" => "Automobiles & Vehicles"
	// 				),
	// 				array(
	// 					"is_pattern" => 0,
	// 					"number" => "00001",
	// 					"abbr" => "FFF",
	// 					"name" => "Furniture, Fixtures & Fitting"
	// 				),
	// 				array(
	// 					"is_pattern" => 0,
	// 					"number" => "00001",
	// 					"abbr" => "HEM",
	// 					"name" => "Heavy Machineries"
	// 				),
	// 				array(
	// 					"is_pattern" => 0,
	// 					"number" => "00001",
	// 					"abbr" => "INA",
	// 					"name" => "Intangible Asset"
	// 				)
 // 				);
	//
	// 			$this->db->query($connection);
	// 			// $this->db->insert('items', array(
	// 			// 	"is_pattern" => 1,
	// 			//
	// 			// 	"abbr" => "CRE",
	// 			// 	"purchase_description" => "Computer & Related Equipment",
	// 			// 	"sale_description" => "Computer & Related Equipment",
	// 			// 	"fixed_assets_account_id" => 32,
	// 			// 	"accumulated_account_id" => 43,
	// 			// 	"depreciation_account_id" => 106,
	// 			// 	"is_system" => 1
	// 			// ));
	// 			// $this->dbforge->add_column("account_types", array('code'=> array('type'=> 'SMALLINT')));
	// 			// $myData = array(
	// 			// 	array('order' => 13, 'id' => 10),
	// 			// 	array('order' => 12, 'id' => 11),
	// 			// 	array('order' => 11, 'id' => 12),
	// 			// 	array('order' => 10, 'id' => 13),
	// 			// 	array('order' => 9, 'id' => 14),
	// 			// 	array('order' => 8, 'id' => 15),
	// 			// 	array('order' => 1, 'id' => 16),
	// 			// 	array('order' => 2, 'id' => 17),
	// 			// 	array('order' => 3, 'id' => 18),
	// 			// 	array('order' => 4, 'id' => 19),
	// 			// 	array('order' => 5, 'id' => 20),
	// 			// 	array('order' => 6, 'id' => 21),
	// 			// 	array('order' => 7, 'id' => 22),
	// 			// 	array('order' => 22, 'id' => 23),
	// 			// 	array('order' => 21, 'id' => 24),
	// 			// 	array('order' => 20, 'id' => 25),
	// 			// 	array('order' => 19, 'id' => 26),
	// 			// 	array('order' => 18, 'id' => 27),
	// 			// 	array('order' => 14, 'id' => 28),
	// 			// 	array('order' => 15, 'id' => 29),
	// 			// 	array('order' => 16, 'id' => 30),
	// 			// 	array('order' => 17, 'id' => 31)
	// 			// );
	// 			$this->db->update_batch('items', $dataInserted, 'name');
	// 			// $this->db->insert('accounts', $dataInserted);
	//
	// 		}
	//
	// 	}
	//
	// 	// $this->response(array('results'=>$data), 200);
	//
	// }

}
