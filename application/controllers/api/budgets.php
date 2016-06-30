<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Budgets extends REST_Controller {
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
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Budget(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
		    		}else if($value["operator"]=="where_related"){
		    			$obj->where_related($value["model"], $value["field"], $value["value"]);
		    		}
	    		}else{
	    			$obj->where($value["field"], $value["value"]);
	    		}
			}									 			
		}
		
		$obj->include_related("budget_type", "name");		

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
					"budget_type_id" 		=> $value->company_id,
					"code" 					=> $value->code,
					"description" 			=> $value->description,
					"amount" 				=> $value->amount,
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

			$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->company_id) 			? $obj->company_id 			= $value->company_id : "";
			isset($value->ebranch_id) 			? $obj->ebranch_id 			= $value->ebranch_id : "";
			isset($value->elocation_id) 		? $obj->elocation_id 		= $value->elocation_id : "";
			isset($value->wbranch_id) 			? $obj->wbranch_id 			= $value->wbranch_id : "";
			isset($value->wlocation_id) 		? $obj->wlocation_id		= $value->wlocation_id : "";		
			isset($value->currency_id) 			? $obj->currency_id			= $value->currency_id : "";
			isset($value->user_id)				? $obj->user_id 			= $value->user_id : "";
			isset($value->contact_type_id)		? $obj->contact_type_id 	= $value->contact_type_id : "";					
			isset($value->eorder)				? $obj->eorder				= $last_id : "";
			isset($value->worder)				? $obj->worder				= $last_id : "";
			isset($value->number)				? $obj->number				= $value->number : "";
			isset($value->enumber)				? $obj->enumber				= $value->enumber : "";
			isset($value->wnumber)				? $obj->wnumber				= $value->wnumber : "";
			isset($value->surname)				? $obj->surname				= $value->surname : "";
			isset($value->name)					? $obj->name				= $value->name : "";
			isset($value->gender)				? $obj->gender				= $value->gender : "";
			isset($value->dob)					? $obj->dob					= date("Y-m-d", strtotime($value->dob)) : "";
			isset($value->pob)					? $obj->pob					= $value->pob : "";				
			isset($value->family_member)		? $obj->family_member		= $value->family_member : "";
			isset($value->id_number)			? $obj->id_number			= $value->id_number : "";
			isset($value->phone)				? $obj->phone 				= $value->phone : "";
			isset($value->email)				? $obj->email 				= $value->email : "";				
			isset($value->job)					? $obj->job					= $value->job : "";
			isset($value->company)				? $obj->company				= $value->company : "";
			isset($value->company_en)			? $obj->company_en			= $value->company_en : "";			
			isset($value->business_type_id)		? $obj->business_type_id	= $value->business_type_id : "";
			isset($value->vat_no)				? $obj->vat_no				= $value->vat_no : "";				
			isset($value->image_url)			? $obj->image_url			= $value->image_url : "";
			isset($value->memo)					? $obj->memo				= $value->memo : "";
			isset($value->address)				? $obj->address 			= $value->address : "";
			isset($value->bill_to)				? $obj->bill_to 			= $value->bill_to : "";
			isset($value->ship_to)				? $obj->ship_to 			= $value->ship_to : "";
			isset($value->latitute)				? $obj->latitute 			= $value->latitute : "";
			isset($value->longtitute)			? $obj->longtitute 			= $value->longtitute : "";															
			isset($value->payment_term_id)		? $obj->payment_term_id		= $value->payment_term_id : "";
			isset($value->payment_method_id)	? $obj->payment_method_id	= $value->payment_method_id : "";
			isset($value->credit_limit)			? $obj->credit_limit		= $value->credit_limit : "";					
			isset($value->registered_date)		? $obj->registered_date 	= date("Y-m-d", strtotime($value->registered_date)) : "";
			isset($value->contact_account_id)	? $obj->contact_account_id	= $value->contact_account_id : "";
			isset($value->ra_id)				? $obj->ra_id				= $value->ra_id : "";
			isset($value->tax_item_id)			? $obj->tax_item_id			= $value->tax_item_id : "";
			isset($value->deposit_account_id)	? $obj->deposit_account_id	= $value->deposit_account_id : "";
			isset($value->discount_account_id)	? $obj->discount_account_id	= $value->discount_account_id : "";
			isset($value->phase_id)				? $obj->phase_id			= $value->phase_id : "";
			isset($value->voltage_id)			? $obj->voltage_id			= $value->voltage_id : "";
			isset($value->ampere_id)			? $obj->ampere_id			= $value->ampere_id : "";		
			isset($value->use_electricity)		? $obj->use_electricity		= $value->use_electricity : "";
			isset($value->use_water)			? $obj->use_water			= $value->use_water : "";
			isset($value->status)				? $obj->status				= $value->status : "";
			isset($value->deleted)				? $obj->deleted				= $value->deleted : "";							

			if($obj->save()){
				$fullname = $obj->surname.' '.$obj->name;
				if($obj->contact_type_id=="6" || $obj->contact_type_id=="7" || $obj->contact_type_id=="8"){
					$fullname = $obj->company;
				}

				//Respsone
				$data["results"][] = array(
					"id" 					=> $obj->id,		 			
					"company_id" 			=> $obj->company_id,
					"ebranch_id" 			=> $obj->ebranch_id,
					"elocation_id" 			=> $obj->elocation_id,
					"wbranch_id" 			=> $obj->wbranch_id,
					"wlocation_id" 			=> $obj->wlocation_id,						
					"currency_id" 			=> $obj->currency_id,
					"user_id"				=> $obj->user_id, 	
					"contact_type_id" 		=> $obj->contact_type_id,
					"eorder" 				=> $obj->eorder,
					"worder" 				=> $obj->worder, 						
					"number" 				=> $obj->number,
					"enumber" 				=> $obj->enumber,
					"wnumber" 				=> $obj->wnumber,			
					"surname" 				=> $obj->surname,			
					"name" 					=> $obj->name,			
					"gender"				=> $obj->gender,			
					"dob" 					=> $obj->dob,				
					"pob" 					=> $obj->pob,						
					"family_member"			=> $obj->family_member,
					"id_number" 			=> $obj->id_number,
					"phone" 				=> $obj->phone,
					"email" 				=> $obj->email,					
					"job" 					=> $obj->job,				
					"company" 				=> $obj->company,
					"company_en" 			=> $obj->company_en,
					"business_type_id" 		=> $obj->business_type_id,								
					"vat_no" 				=> $obj->vat_no,						
					"image_url" 			=> $obj->image_url,		
					"memo" 					=> $obj->memo,
					"address" 				=> $obj->address,
					"bill_to" 				=> $obj->bill_to,
					"ship_to" 				=> $obj->ship_to,
					"latitute" 				=> $obj->latitute,
					"longtitute" 			=> $obj->longtitute,
					"payment_term_id" 		=> $obj->payment_term_id,
					"payment_method_id" 	=> $obj->payment_method_id,																		
					"credit_limit" 			=> $obj->credit_limit,								
					"registered_date" 		=> $obj->registered_date,
					"contact_account_id" 	=> $obj->contact_account_id,
					"ra_id" 				=> $obj->ra_id,
					"tax_item_id" 			=> $obj->tax_item_id,
					"deposit_account_id"	=> $obj->deposit_account_id,
					"discount_account_id" 	=> $obj->discount_account_id,
					"phase_id" 				=> $obj->phase_id,
					"voltage_id" 			=> $obj->voltage_id,
					"ampere_id" 			=> $obj->ampere_id,
					"use_electricity" 		=> $obj->use_electricity=="true"?true:false,
					"use_water" 			=> $obj->use_water=="true"?true:false,
					"status" 				=> $obj->status,

					"fullname" 				=> $fullname,					
					"contact_type"			=> $obj->contact_type->get_raw()->result(),					
					"currency"				=> $obj->currency->get_raw()->result()
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

			isset($value->company_id) 			? $obj->company_id 			= $value->company_id : "";
			isset($value->ebranch_id) 			? $obj->ebranch_id 			= $value->ebranch_id : "";
			isset($value->elocation_id) 		? $obj->elocation_id 		= $value->elocation_id : "";
			isset($value->wbranch_id) 			? $obj->wbranch_id 			= $value->wbranch_id : "";
			isset($value->wlocation_id) 		? $obj->wlocation_id		= $value->wlocation_id : "";		
			isset($value->currency_id) 			? $obj->currency_id			= $value->currency_id : "";
			isset($value->user_id)				? $obj->user_id 			= $value->user_id : "";
			isset($value->contact_type_id)		? $obj->contact_type_id 	= $value->contact_type_id : "";					
			isset($value->eorder)				? $obj->eorder				= $value->eorder : "";
			isset($value->worder)				? $obj->worder				= $value->worder : "";
			isset($value->number)				? $obj->number				= $value->number : "";
			isset($value->enumber)				? $obj->enumber				= $value->enumber : "";
			isset($value->wnumber)				? $obj->wnumber				= $value->wnumber : "";
			isset($value->surname)				? $obj->surname				= $value->surname : "";
			isset($value->name)					? $obj->name				= $value->name : "";
			isset($value->gender)				? $obj->gender				= $value->gender : "";
			isset($value->dob)					? $obj->dob					= date("Y-m-d", strtotime($value->dob)) : "";
			isset($value->pob)					? $obj->pob					= $value->pob : "";				
			isset($value->family_member)		? $obj->family_member		= $value->family_member : "";
			isset($value->id_number)			? $obj->id_number			= $value->id_number : "";
			isset($value->phone)				? $obj->phone 				= $value->phone : "";
			isset($value->email)				? $obj->email 				= $value->email : "";				
			isset($value->job)					? $obj->job					= $value->job : "";
			isset($value->company)				? $obj->company				= $value->company : "";
			isset($value->company_en)			? $obj->company_en			= $value->company_en : "";			
			isset($value->business_type_id)		? $obj->business_type_id	= $value->business_type_id : "";
			isset($value->vat_no)				? $obj->vat_no				= $value->vat_no : "";				
			isset($value->image_url)			? $obj->image_url			= $value->image_url : "";
			isset($value->memo)					? $obj->memo				= $value->memo : "";
			isset($value->address)				? $obj->address 			= $value->address : "";
			isset($value->bill_to)				? $obj->bill_to 			= $value->bill_to : "";
			isset($value->ship_to)				? $obj->ship_to 			= $value->ship_to : "";
			isset($value->latitute)				? $obj->latitute 			= $value->latitute : "";
			isset($value->longtitute)			? $obj->longtitute 			= $value->longtitute : "";															
			isset($value->payment_term_id)		? $obj->payment_term_id		= $value->payment_term_id : "";
			isset($value->payment_method_id)	? $obj->payment_method_id	= $value->payment_method_id : "";
			isset($value->credit_limit)			? $obj->credit_limit		= $value->credit_limit : "";					
			isset($value->registered_date)		? $obj->registered_date 	= date("Y-m-d", strtotime($value->registered_date)) : "";
			isset($value->contact_account_id)	? $obj->contact_account_id	= $value->contact_account_id : "";
			isset($value->ra_id)				? $obj->ra_id				= $value->ra_id : "";
			isset($value->tax_item_id)			? $obj->tax_item_id			= $value->tax_item_id : "";
			isset($value->deposit_account_id)	? $obj->deposit_account_id	= $value->deposit_account_id : "";
			isset($value->discount_account_id)	? $obj->discount_account_id	= $value->discount_account_id : "";
			isset($value->phase_id)				? $obj->phase_id			= $value->phase_id : "";
			isset($value->voltage_id)			? $obj->voltage_id			= $value->voltage_id : "";
			isset($value->ampere_id)			? $obj->ampere_id			= $value->ampere_id : "";		
			isset($value->use_electricity)		? $obj->use_electricity		= $value->use_electricity : "";
			isset($value->use_water)			? $obj->use_water			= $value->use_water : "";
			isset($value->status)				? $obj->status				= $value->status : "";
			isset($value->deleted)				? $obj->deleted				= $value->deleted : "";

			if($obj->save()){
				$fullname = $obj->surname.' '.$obj->name;
				if($obj->contact_type_id=="6" || $obj->contact_type_id=="7" || $obj->contact_type_id=="8"){
					$fullname = $obj->company;
				}
								
				//Results
				$data["results"][] = array(
					"id" 					=> $obj->id,		 			
					"company_id" 			=> $obj->company_id,
					"ebranch_id" 			=> $obj->ebranch_id,
					"elocation_id" 			=> $obj->elocation_id,
					"wbranch_id" 			=> $obj->wbranch_id,
					"wlocation_id" 			=> $obj->wlocation_id,						
					"currency_id" 			=> $obj->currency_id,
					"user_id"				=> $obj->user_id, 	
					"contact_type_id" 		=> $obj->contact_type_id,
					"eorder" 				=> $obj->eorder,
					"worder" 				=> $obj->worder, 						
					"number" 				=> $obj->number,
					"enumber" 				=> $obj->enumber,
					"wnumber" 				=> $obj->wnumber,			
					"surname" 				=> $obj->surname,			
					"name" 					=> $obj->name,			
					"gender"				=> $obj->gender,			
					"dob" 					=> $obj->dob,				
					"pob" 					=> $obj->pob,						
					"family_member"			=> $obj->family_member,
					"id_number" 			=> $obj->id_number,
					"phone" 				=> $obj->phone,
					"email" 				=> $obj->email,					
					"job" 					=> $obj->job,				
					"company" 				=> $obj->company,
					"company_en" 			=> $obj->company_en,
					"business_type_id" 		=> $obj->business_type_id,								
					"vat_no" 				=> $obj->vat_no,						
					"image_url" 			=> $obj->image_url,		
					"memo" 					=> $obj->memo,
					"address" 				=> $obj->address,
					"bill_to" 				=> $obj->bill_to,
					"ship_to" 				=> $obj->ship_to,
					"latitute" 				=> $obj->latitute,
					"longtitute" 			=> $obj->longtitute,
					"payment_term_id" 		=> $obj->payment_term_id,
					"payment_method_id" 	=> $obj->payment_method_id,																		
					"credit_limit" 			=> $obj->credit_limit,								
					"registered_date" 		=> $obj->registered_date,
					"contact_account_id" 	=> $obj->contact_account_id,
					"ra_id" 				=> $obj->ra_id,
					"tax_item_id" 			=> $obj->tax_item_id,
					"deposit_account_id"	=> $obj->deposit_account_id,
					"discount_account_id" 	=> $obj->discount_account_id,
					"phase_id" 				=> $obj->phase_id,
					"voltage_id" 			=> $obj->voltage_id,
					"ampere_id" 			=> $obj->ampere_id,
					"use_electricity" 		=> $obj->use_electricity=="true"?true:false,
					"use_water" 			=> $obj->use_water=="true"?true:false,
					"status" 				=> $obj->status,

					"fullname" 				=> $fullname,					
					"contact_type"			=> $obj->contact_type->get_raw()->result(),					
					"currency"				=> $obj->currency->get_raw()->result()
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
}
