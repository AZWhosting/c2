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
			isset($value->location) 			? $obj->location_id 		= $value->location : "";
			isset($value->license) 				? $obj->license_id 			= $value->license : "";
			isset($value->national_id_number) 	? $obj->id_card 			= $value->national_id_number : "";
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
					"contact" 				=> $obj->contact_id,
					"location" 				=> $obj->location_id,
					"license" 				=> $obj->license_id,					
					"id_card" 				=> $obj->national_id_number,
					"family_member" 		=> $obj->family_member,
					"occupation" 			=> $obj->occupation
			   	);
		    }	
		}
		
		$data["count"] = count($data["results"]);
		$this->response($data, 201);		
	}	
}//End Of Class