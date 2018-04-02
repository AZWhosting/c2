<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Memberships extends REST_Controller {
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

		$obj = new Membership(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
				//Results				
				$data["results"][] = array(
					"id" 							=> $value->id,
					"contact_id" 	 				=> $value->contact_id,
					"membership_type_id" 			=> $value->membership_type_id,
					"registration_date"				=> $value->registration_date,
					"membership_date"				=> $value->membership_date,
					"change_membership_date"		=> $value->change_membership_date,
					"membership_status"				=> $value->membership_status,
					"expiry_date"					=> $value->expiry_date,
					"membership_application_status"	=> $value->membership_application_status,
					"graduateion_date"				=> $value->graduateion_date,
					"fellow_date"					=> $value->fellow_date,
					"first_cdp_year"				=> $value->first_cdp_year,
					"cpd_record_date"				=> $value->cpd_record_date,
					"cpd_required_credit"			=> $value->cpd_required_credit
				);
			}
		}

		//Response Data		
		$this->response($data, 200);		
	}
	
	//POST
	function index_post() {
		$models = json_decode($this->post('models'));

		foreach ($models as $value) {
			$obj = new Membership(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
			
			isset($value->contact_id) 					? $obj->contact_id 						= $value->contact_id : "";
			isset($value->membership_type_id) 			? $obj->membership_type_id 				= $value->membership_type_id : "";
			isset($value->registration_date) 			? $obj->registration_date 				= $value->registration_date : "";
			isset($value->membership_date) 				? $obj->membership_date 				= $value->membership_date : "";
			isset($value->change_membership_date) 		? $obj->change_membership_date 			= $value->change_membership_date : "";
			isset($value->membership_status) 			? $obj->membership_status 				= $value->membership_status : "";
			isset($value->expiry_date) 					? $obj->expiry_date 					= $value->expiry_date : "";
			isset($value->membership_application_status)? $obj->membership_application_status 	= $value->membership_application_status : "";
			isset($value->graduateion_date) 			? $obj->graduateion_date 				= $value->graduateion_date : "";
			isset($value->fellow_date) 					? $obj->fellow_date 					= $value->fellow_date : "";
			isset($value->first_cdp_year) 				? $obj->first_cdp_year 					= $value->first_cdp_year : "";
			isset($value->cpd_record_date) 				? $obj->cpd_record_date 				= $value->cpd_record_date : "";
			isset($value->cpd_required_credit) 			? $obj->cpd_required_credit 			= $value->cpd_required_credit : "";
						
			if($obj->save()){
				$data["results"][] = array(
					"id" 							=> $obj->id,
					"contact_id" 	 				=> $obj->contact_id,
					"membership_type_id" 			=> $obj->membership_type_id,
					"registration_date"				=> $obj->registration_date,
					"membership_date"				=> $obj->membership_date,
					"change_membership_date"		=> $obj->change_membership_date,
					"membership_status"				=> $obj->membership_status,
					"expiry_date"					=> $obj->expiry_date,
					"membership_application_status"	=> $obj->membership_application_status,
					"graduateion_date"				=> $obj->graduateion_date,
					"fellow_date"					=> $obj->fellow_date,
					"first_cdp_year"				=> $obj->first_cdp_year,
					"cpd_record_date"				=> $obj->cpd_record_date,
					"cpd_required_credit"			=> $obj->cpd_required_credit
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
			$obj = new Membership(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			
			isset($value->contact_id) 					? $obj->contact_id 						= $value->contact_id : "";
			isset($value->membership_type_id) 			? $obj->membership_type_id 				= $value->membership_type_id : "";
			isset($value->registration_date) 			? $obj->registration_date 				= $value->registration_date : "";
			isset($value->membership_date) 				? $obj->membership_date 				= $value->membership_date : "";
			isset($value->change_membership_date) 		? $obj->change_membership_date 			= $value->change_membership_date : "";
			isset($value->membership_status) 			? $obj->membership_status 				= $value->membership_status : "";
			isset($value->expiry_date) 					? $obj->expiry_date 					= $value->expiry_date : "";
			isset($value->membership_application_status)? $obj->membership_application_status 	= $value->membership_application_status : "";
			isset($value->graduateion_date) 			? $obj->graduateion_date 				= $value->graduateion_date : "";
			isset($value->fellow_date) 					? $obj->fellow_date 					= $value->fellow_date : "";
			isset($value->first_cdp_year) 				? $obj->first_cdp_year 					= $value->first_cdp_year : "";
			isset($value->cpd_record_date) 				? $obj->cpd_record_date 				= $value->cpd_record_date : "";
			isset($value->cpd_required_credit) 			? $obj->cpd_required_credit 			= $value->cpd_required_credit : "";

			if($obj->save()){				
				$data["results"][] = array(
					"id" 							=> $obj->id,
					"contact_id" 	 				=> $obj->contact_id,
					"membership_type_id" 			=> $obj->membership_type_id,
					"registration_date"				=> $obj->registration_date,
					"membership_date"				=> $obj->membership_date,
					"change_membership_date"		=> $obj->change_membership_date,
					"membership_status"				=> $obj->membership_status,
					"expiry_date"					=> $obj->expiry_date,
					"membership_application_status"	=> $obj->membership_application_status,
					"graduateion_date"				=> $obj->graduateion_date,
					"fellow_date"					=> $obj->fellow_date,
					"first_cdp_year"				=> $obj->first_cdp_year,
					"cpd_record_date"				=> $obj->cpd_record_date,
					"cpd_required_credit"			=> $obj->cpd_required_credit
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
			$obj = new Membership(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
/* End of file categories.php */
/* Location: ./application/controllers/api/categories.php */