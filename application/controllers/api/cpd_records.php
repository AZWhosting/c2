<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Cpd_records extends REST_Controller {
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

		$obj = new Cpd_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
				//Membership
				$membership = $value->membership;
				$membership->include_related("membership_type", "name");
				$membership->get();
				$memberships = array(
					"id" 					=> $value->membership_id,
					"contact_id" 	 		=> $membership->contact_id,
					"membership_type_id" 	=> $membership->membership_type_id,
					"membership_date"		=> $membership->membership_date,
					"status"				=> $membership->status,
					"expiry_date"			=> $membership->expiry_date,
					"membership_type" 		=> $membership->membership_type_name
				);

				//Results				
				$data["results"][] = array(
					"id" 				=> $value->id,
					"contact_id" 	 	=> $value->contact_id,
					"membership_id" 	=> $value->membership_id,
					"subject" 			=> $value->subject,
					"credit" 			=> floatval($value->credit),
					"period"			=> $value->period,
					"record_date"		=> $value->record_date,

					"contacts" 			=> $value->contact->get_raw()->result()[0],
					"memberships" 		=> $memberships
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
			$obj = new Cpd_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
			
			isset($value->contact_id) 		? $obj->contact_id 		= $value->contact_id : "";
			isset($value->membership_id) 	? $obj->membership_id 	= $value->membership_id : "";
			isset($value->subject) 			? $obj->subject 		= $value->subject : "";
			isset($value->credit) 			? $obj->credit 			= $value->credit : "";
			isset($value->period) 			? $obj->period 			= $value->period : "";
			isset($value->record_date) 		? $obj->record_date 	= $value->record_date : "";
			
			
			//Contact			
			if(isset($value->contacts)){
				$obj->contact_id = $value->contacts->id;
			}

			//Membership			
			if(isset($value->memberships)){
				$obj->membership_id = $value->memberships->id;
			}

			if($obj->save()){
				$data["results"][] = array(
					"id" 				=> $obj->id,
					"contact_id" 	 	=> $obj->contact_id,
					"membership_id" 	=> $obj->membership_id,
					"subject" 			=> $obj->subject,
					"credit" 			=> $obj->credit,
					"period"			=> $obj->period,
					"record_date"		=> $obj->record_date
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
			$obj = new Cpd_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			
			isset($value->contact_id) 		? $obj->contact_id 		= $value->contact_id : "";
			isset($value->membership_id) 	? $obj->membership_id 	= $value->membership_id : "";
			isset($value->subject) 			? $obj->subject 		= $value->subject : "";
			isset($value->credit) 			? $obj->credit 			= $value->credit : "";
			isset($value->period) 			? $obj->period 			= $value->period : "";
			isset($value->record_date) 		? $obj->record_date 	= $value->record_date : "";

			//Contact			
			if(isset($value->contacts)){
				$obj->contact_id = $value->contacts->id;
			}

			if($obj->save()){				
				$data["results"][] = array(
					"id" 				=> $obj->id,
					"contact_id" 	 	=> $obj->contact_id,
					"membership_id" 	=> $obj->membership_id,
					"subject" 			=> $obj->subject,
					"credit" 			=> $obj->credit,
					"period"			=> $obj->period,
					"record_date"		=> $obj->record_date
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
			$obj = new Cpd_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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