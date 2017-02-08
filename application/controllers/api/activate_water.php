<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Activate_water extends REST_Controller {
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

		$obj = new contact_utility(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		// if(!empty($sort) && isset($sort)){					
		// 	foreach ($sort as $value) {
		// 		$obj->order_by($value["field"], $value["dir"]);
		// 	}
		// }

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
		$obj->order_by('code', 'desc');
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		
		
		if($obj->result_count()>0){
			foreach ($obj as $value) {				
		 		$data["results"][] = array(
		 			"id" 				=> $value->id,	
		 			"abbr"				=> $value->abbr,
		 			"code"				=> floatval($value->code),
		 			"contact_id" 		=> $value->contact_id,
					"branch_id" 		=> $value->branch_id,
					"location_id" 		=> $value->location_id,					
					"id_card" 			=> $value->id_card,
					"family_member" 	=> $value->family_member,
					"occupation" 		=> $value->occupation
		 		);
			}
		}

		//Response Data		
		$this->response($data, 200);			
	}
	//POST
	function index_post() {
		$models = json_decode($this->post('models'));				
		$data["results"] = array();
		$data["count"] = 0;				
		
		foreach ($models as $value) {
			$obj = new contact_utility(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->contact_id) 			? $obj->contact_id 			= $value->contact_id : "";
			isset($value->type) 				? $obj->type				= $value->type : "";
			isset($value->code) 				? $obj->code 				= $value->code : "";	
			isset($value->abbr) 				? $obj->abbr 				= $value->abbr : "";				
			isset($value->branch_id) 			? $obj->branch_id 		= $value->branch_id : "";
			isset($value->location_id) 			? $obj->location_id 			= $value->location_id : "";
			isset($value->id_card) 				? $obj->id_card 			= $value->id_card : "";
			isset($value->family_member) 		? $obj->family_member 		= $value->family_member : "";
			isset($value->occupation) 			? $obj->occupation 			= $value->occupation : "";

	   		if($obj->save()){
	   			$contact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$contact->where('id', $obj->contact_id)->get();
	   			$contact->use_water = 1;
	   			$contact->save();
			   	$data["results"][] = array(
			   		"id" 					=> $obj->id,		 			
					"type" 					=> $obj->type,
					"code" 					=> $obj->code,
					"abbr"					=> $obj->abbr,						
					"contact" 				=> $obj->contact_id,
					"branch_id" 			=> $obj->branch_id,
					"location_id" 			=> $obj->location_id,					
					"id_card" 				=> $obj->id_card,
					"family_member" 		=> $obj->family_member,
					"occupation" 			=> $obj->occupation
			   	);
		    }	
		}
		
		$data["count"] = count($data["results"]);
		$this->response($data, 201);		
	}	
}//End Of Class