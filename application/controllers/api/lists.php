<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Lists extends REST_Controller {
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
			// $this->_database = $conn->inst_database;
			$this->_database = 'db_banhji';
		}
	}

	function customers_get() {
			$filters 	= $this->get("filter")["filters"];
			$page 		= $this->get('page') !== false ? $this->get('page') : 1;
			$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
			$sort 	 	= $this->get("sort");
			$data["results"] = array();
			$data["count"] = 0;
			$is_pattern = 0;
			$deleted = 0;

			$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');

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
			    		}else if($value["operator"]=="search"){
			    			$obj->like("number", $value["value"], "after");
			    			$obj->or_like("enumber", $value["value"], "after");
			    			$obj->or_like("wnumber", $value["value"], "after");
					    	$obj->or_like("surname", $value["value"], "after");
					    	$obj->or_like("name", $value["value"], "after");
					    	$obj->or_like("company", $value["value"], "after");
			    		}else{
			    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
			    		}
		    		}else{
		    			if($value["field"]=="is_pattern"){
		    				$is_pattern = $value["value"];
		    			}else if($value["field"]=="deleted"){
		    				$deleted = $value["value"];
		    			}else{
		    				$obj->where($value["field"], $value["value"]);
		    			}
		    		}
				}
			}

			// get contact type for customer
			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
			$type->where('parent_id', 1)->get();
			foreach($type as $t) {
				$ids[] = $t->id;
			}
			$obj->where("is_pattern", $is_pattern);
			$obj->where("deleted", $deleted);
			$obj->where_in("contact_type_id", $ids);
			$obj->include_related("contact_type", "name");

			//Results
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;

			if($obj->result_count()>0){
				foreach ($obj as $value) {
					$fullname = $value->surname.' '.$value->name;
					if($value->company){
						$fullname = $value->company;
					}

			 		$data["results"][] = array(
			 			"id" 						=> $value->id,
						"company_id" 				=> $value->company_id,
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
						"enumber" 					=> $value->enumber,
						"wnumber" 					=> $value->wnumber,
						"surname" 					=> $value->surname,
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

						"fullname" 					=> $fullname,
						"contact_type"				=> $value->contact_type_name
			 		);
				}
			}

			//Response Data
			$this->response($data, 200);
	}

	function suppliers_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;

		$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');

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
						}else if($value["operator"]=="search"){
							$obj->like("number", $value["value"], "after");
							$obj->or_like("enumber", $value["value"], "after");
							$obj->or_like("wnumber", $value["value"], "after");
							$obj->or_like("surname", $value["value"], "after");
							$obj->or_like("name", $value["value"], "after");
							$obj->or_like("company", $value["value"], "after");
						}else{
							$obj->where($value["field"].' '.$value["operator"], $value["value"]);
						}
					}else{
						if($value["field"]=="is_pattern"){
							$is_pattern = $value["value"];
						}else if($value["field"]=="deleted"){
							$deleted = $value["value"];
						}else{
							$obj->where($value["field"], $value["value"]);
						}
					}
			}
		}

		// get contact type for customer
		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
		$type->where('parent_id', 2)->get();
		foreach($type as $t) {
			$ids[] = $t->id;
		}
		$obj->where("is_pattern", $is_pattern);
		$obj->where("deleted", $deleted);
		$obj->where_in("contact_type_id", $ids);
		$obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;

		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$fullname = $value->surname.' '.$value->name;
				if($value->company){
					$fullname = $value->company;
				}

				$data["results"][] = array(
					"id" 						=> $value->id,
					"company_id" 				=> $value->company_id,
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
					"enumber" 					=> $value->enumber,
					"wnumber" 					=> $value->wnumber,
					"surname" 					=> $value->surname,
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

					"fullname" 					=> $fullname,
					"contact_type"				=> $value->contact_type_name
				);
			}
		}

		//Response Data
		$this->response($data, 200);
	}

	function employees_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;

		$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');

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
						}else if($value["operator"]=="search"){
							$obj->like("number", $value["value"], "after");
							$obj->or_like("enumber", $value["value"], "after");
							$obj->or_like("wnumber", $value["value"], "after");
							$obj->or_like("surname", $value["value"], "after");
							$obj->or_like("name", $value["value"], "after");
							$obj->or_like("company", $value["value"], "after");
						}else{
							$obj->where($value["field"].' '.$value["operator"], $value["value"]);
						}
					}else{
						if($value["field"]=="is_pattern"){
							$is_pattern = $value["value"];
						}else if($value["field"]=="deleted"){
							$deleted = $value["value"];
						}else{
							$obj->where($value["field"], $value["value"]);
						}
					}
			}
		}

		// get contact type for customer
		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
		$type->where('parent_id', 3)->get();
		foreach($type as $t) {
			$ids[] = $t->id;
		}
		$obj->where("is_pattern", $is_pattern);
		$obj->where("deleted", $deleted);
		$obj->where_in("contact_type_id", $ids);
		$obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;

		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$fullname = $value->surname.' '.$value->name;
				if($value->company){
					$fullname = $value->company;
				}

				$data["results"][] = array(
					"id" 						=> $value->id,
					"company_id" 				=> $value->company_id,
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
					"enumber" 					=> $value->enumber,
					"wnumber" 					=> $value->wnumber,
					"surname" 					=> $value->surname,
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

					"fullname" 					=> $fullname,
					"contact_type"				=> $value->contact_type_name
				);
			}
		}

		//Response Data
		$this->response($data, 200);
	}


	function items_get() {}

	function services_get() {}

}//End Of Class
