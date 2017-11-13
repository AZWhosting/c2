<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Contact_assignees extends REST_Controller {
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
			$this->server_host = $conn->server_assignee_id;
			$this->server_user = $conn->userassignee_id;
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

		$obj = new Contact_assignee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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

		$obj->include_related("contact", array("abbr","number", "name"));

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
				//Contact
				$contact = array(
					"id" 		=> $value->contact_id,
					"abbr"		=> $value->contact_abbr ? $value->contact_abbr : "",
					"number"	=> $value->contact_number ? $value->contact_number : "",
					"name"		=> $value->contact_name ? $value->contact_name : ""
				);

				//Results
				$data["results"][] = array(
					"id" 			=> $value->id,
					"assignee_id" 	=> $value->assignee_id,
					"contact_id" 	=> $value->contact_id,
					"contact"  		=> $contact
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
			$obj = new Contact_assignee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
			
			isset($value->assignee_id) 	? $obj->assignee_id = $value->assignee_id : "";
			isset($value->contact_id) 	? $obj->contact_id  = $value->contact_id : "";
						
			if($obj->save($relatedItem->all)){
				$data["results"][] = array(
					"id" 			=> $obj->id,
					"assignee_id" 	=> $obj->assignee_id,
					"contact_id" 	=> $obj->contact_id
				);
			}
		}
		$data["count"] = count($data["results"]);
		
		$this->response($data, 201);						
	}

	//PUT
	function index_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {			
			$obj = new Contact_assignee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			isset($value->assignee_id) 	? $obj->assignee_id = $value->assignee_id : "";
			isset($value->contact_id) 	? $obj->contact_id  = $value->contact_id : "";

			if($obj->save($relatedItem->all)){
				$data["results"][] = array(
					"id" 			=> $obj->id,
					"assignee_id" 	=> $obj->assignee_id,
					"contact_id" 	=> $obj->contact_id
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
			$obj = new Contact_assignee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);							
		}

		//Response data
		$this->response($data, 200);
	}

	//GET SUMMARY
	function summary_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Contact_assignee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		//Sort
		// if(!empty($sort) && isset($sort)){
		// 	foreach ($sort as $value) {
		// 		if(isset($value['operator'])){
		// 			$obj->{$value['operator']}($value["field"], $value["dir"]);
		// 		}else{
		// 			$obj->order_by($value["field"], $value["dir"]);
		// 		}
		// 	}
		// }

		// //Filter
		// if(!empty($filter['filters']) && isset($filter['filters'])){
	 //    	foreach ($filter['filters'] as $value) {
	 //    		if(isset($value['operator'])) {
		// 			$obj->{$value['operator']}($value['field'], $value['value']);
		// 		} else {
		// 			$obj->where($value["field"], $value["value"]);
		// 		}
		// 	}
		// }

		// //Results
		// if($page && $limit){
		// 	$obj->get_paged_iterated($page, $limit);
		// 	$data["count"] = $obj->paged->total_rows;
		// }else{
		// 	$obj->get_iterated();
		// 	$data["count"] = $obj->result_count();
		// }
		
		$obj->distinct('assignee_id');
		$data["results"] = $obj->get_raw()->result();

		// if($obj->exists()){
		// 	foreach ($obj as $value) {
		// 		$assignees = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		// 		$assignees->select("abbr,number,name");
		// 		$assignees->get_by_id($value->assignee_id);
				
		// 		//Results
		// 		$data["results"][] = array(
		// 			"id" 			=> $value->id,
		// 			"assignee_id" 	=> $value->assignee_id,
		// 			"contact_id" 	=> $value->contact_id,
		// 			"assignee"  	=> $assignee,
		// 			""
		// 		);
		// 	}
		// }

		//Response Data		
		$this->response($data, 200);		
	}
}

/* End of file contact_assignees.php */
/* Location: ./application/controllers/api/contact_assignees.php */