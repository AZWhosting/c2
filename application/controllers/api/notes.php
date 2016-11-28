<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Notes extends REST_Controller {
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

		$obj = new Note(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

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

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		
		
		if($obj->exists()){
			foreach ($obj as $value) {
				$creator = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$creator->where("user_id", $value->created_by);
				$creator->get();

		 		$data["results"][] = array(
		 			"id" 			=> $value->id,
					"contact_id" 	=> $value->contact_id,					
					"note"			=> $value->note,
					"noted_date"	=> $value->noted_date,
					"created_by" 	=> $value->created_by,

					"creator" 		=> $creator->name
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
			$obj = new Note(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->contact_id 	= $value->contact_id;
			$obj->note 			= $value->note;
			$obj->noted_date	= $value->noted_date;			
		   	$obj->created_by 	= $value->created_by;					   	
		   				
			if($obj->save()){
				$creator = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$creator->where("user_id", $obj->created_by);
				$creator->get();

				//Respsone
				$data["results"][] = array(					
					"id" 			=> $obj->id,
					"contact_id" 	=> $obj->contact_id,					
					"note"			=> $obj->note,
					"noted_date"	=> $obj->noted_date,
					"created_by" 	=> $obj->created_by,

					"creator" 		=> $creator->name
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
			$obj = new Note(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			$obj->contact_id 	= $value->contact_id;
			$obj->note 			= $value->note;
			$obj->noted_date	= $value->noted_date;			
		   	$obj->created_by 	= $value->created_by;

			if($obj->save()){
				$creator = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$creator->where("user_id", $obj->created_by);
				$creator->get();
								
				//Results
				$data["results"][] = array(
					"id" 			=> $obj->id,
					"contact_id" 	=> $obj->contact_id,					
					"note"			=> $obj->note,
					"noted_date"	=> $obj->noted_date,
					"created_by" 	=> $obj->created_by,

					"creator" 		=> $creator->name
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
			$obj = new Note(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
/* End of file contact_persons.php */
/* Location: ./application/controllers/api/contact_persons.php */