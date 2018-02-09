<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Transaction_forms extends REST_Controller {
	public $_database;
	public $server_host;
	public $server_user;
	public $server_pwd;
	public $int;
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
		$this->int = $this->input->get_request_header('Institute');
	}
	
	//GET 
	function index_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Transaction_form(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
		
		$obj->order_by("id");
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		

		if($obj->result_count()>0){	
		 		
			foreach ($obj as $value) {
				//Results
				if(intval($value->institute_id) > 0){
					if($this->int == intval($value->institute_id)){
						$data["results"][] = array(
							"id" 			=> $value->id,
							"type" 			=> $value->type,
							"title" 	 	=> $value->title,
							"moduls" 	 	=> $value->moduls,
							"note" 	 		=> $value->note,
							"image_url" 	=> $value->image_url,
							"institute_id" 	=> intval($value->institute_id)
						);
					}
				}else{
					$data["results"][] = array(
						"id" 			=> $value->id,
						"type" 			=> $value->type,
						"title" 	 	=> $value->title,
						"moduls" 	 	=> $value->moduls,
						"note" 	 		=> $value->note,
						"image_url" 	=> $value->image_url,
						"institute_id" 	=> intval($value->institute_id),
					);
				}
			}
		}

		//Response Data		
		$this->response($data, 200);		
	}
	
	//POST
	function index_post() {
		$models = json_decode($this->post('models'));

		foreach ($models as $value) {
			$obj = new Transaction_form(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
			isset($value->type)? 			$obj->type 					= $value->type : "";
			isset($value->title)? 			$obj->title 				= $value->title : "";
			isset($value->moduls)? 			$obj->moduls 				= $value->moduls : "";
			isset($value->note)? 			$obj->note 					= $value->note : "";
			isset($value->image_url)? 		$obj->image_url 		= $value->image_url : "";
						
			if($obj->save()){
				$data["results"][] = array(
					"id" 			=> $obj->id,					
					"type" 			=> $obj->type,
					"title" 	 	=> $obj->title,
					"moduls" 	 	=> $obj->moduls,
					"note" 	 		=> $obj->note,
					"image_url" 	=> $obj->image_url
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
			$obj = new Transaction_form(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			
			isset($value->type)? 			$obj->type 					= $value->type : "";
			isset($value->title)? 			$obj->title 				= $value->title : "";
			isset($value->moduls)? 			$obj->moduls 				= $value->moduls : "";
			isset($value->note)? 			$obj->note 					= $value->note : "";
			isset($value->image_url)? 		$obj->image_url 		= $value->image_url : "";		

			if($obj->save()){				
				$data["results"][] = array(
					"id" 			=> $obj->id,					
					"type" 			=> $obj->type,
					"title" 	 	=> $obj->title,
					"moduls" 	 	=> $obj->moduls,
					"note" 	 		=> $obj->note,
					"image_url" 	=> $obj->image_url
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
			$obj = new Transaction_form(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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