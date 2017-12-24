<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Bin_locations extends REST_Controller {	
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
		
		$obj = new Bin_location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		
		//Sort
		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				if(isset($value['operator'])){
					$obj->{$value['operator']}($value['field'], $value['value']);
				}else{
					$obj->order_by($value["field"], $value["dir"]);
				}
			}
		}
		
		//Filter
		if(!empty($filter['filters']) && isset($filter['filters'])){
	    	foreach ($filter['filters'] as $value) {
	    		if(isset($value['operator'])) {
	    			if($value['operator']=="eq"){
	    				$obj->where($value["field"], $value["value"]);
	    			}else{
						$obj->{$value['operator']}($value['field'], $value['value']);
					}
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
		 		$data["results"][] = array(	
		 			"id"     			=> $value->id,
		 			"warehouse_id"  	=> $value->warehouse_id,
		 			"location_id"  		=> $value->location_id,
		 			"zone_id"  			=> $value->zone_id,
		 			"section_id"  		=> $value->section_id,
		 			"rack_id"  			=> $value->rack_id,
		 			"level_id"  		=> $value->level_id,
		 			"position_id"  		=> $value->position_id,
				   	"number" 			=> $value->number,
				   	"name" 				=> $value->number,
				   	"capacity" 			=> $value->capacity,
				   	"measurement_id" 	=> $value->measurement_id
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
			$obj = new Bin_location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			isset($value->warehouse_id) ? $obj->warehouse_id 	= $value->warehouse_id : "";
			isset($value->location_id) 	? $obj->location_id 	= $value->location_id : "";
			isset($value->zone_id) 		? $obj->zone_id 		= $value->zone_id : "";
			isset($value->section_id) 	? $obj->section_id 		= $value->section_id : "";
			isset($value->rack_id) 		? $obj->rack_id 		= $value->rack_id : "";
			isset($value->level_id) 	? $obj->level_id 		= $value->level_id : "";
			isset($value->position_id) 	? $obj->position_id 	= $value->position_id : "";
			isset($value->number) 		? $obj->number 			= $value->number : "";

			if($obj->save()){
				//Respsone
				$data["results"][] = array(					
					"id" 				=> $obj->id,
					"warehouse_id"  	=> $obj->warehouse_id,
		 			"location_id"  		=> $obj->location_id,
		 			"zone_id"  			=> $obj->zone_id,
		 			"section_id"  		=> $obj->section_id,
		 			"rack_id"  			=> $obj->rack_id,
		 			"level_id"  		=> $obj->level_id,
		 			"position_id"  		=> $obj->position_id,
				   	"number" 			=> $obj->number,
				   	"name" 				=> $obj->number,
				   	"capacity" 			=> $obj->capacity,
				   	"measurement_id" 	=> $obj->measurement_id
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
			$obj = new Bin_location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			
			isset($value->warehouse_id) ? $obj->warehouse_id 	= $value->warehouse_id : "";
			isset($value->location_id) 	? $obj->location_id 	= $value->location_id : "";
			isset($value->zone_id) 		? $obj->zone_id 		= $value->zone_id : "";
			isset($value->section_id) 	? $obj->section_id 		= $value->section_id : "";
			isset($value->rack_id) 		? $obj->rack_id 		= $value->rack_id : "";
			isset($value->level_id) 	? $obj->level_id 		= $value->level_id : "";
			isset($value->position_id) 	? $obj->position_id 	= $value->position_id : "";
			isset($value->number) 		? $obj->number 			= $value->number : "";
			
			if($obj->save()){				
				//Results
				$data["results"][] = array(
					"id" 				=> $obj->id,
					"warehouse_id"  	=> $obj->warehouse_id,
		 			"location_id"  		=> $obj->location_id,
		 			"zone_id"  			=> $obj->zone_id,
		 			"section_id"  		=> $obj->section_id,
		 			"rack_id"  			=> $obj->rack_id,
		 			"level_id"  		=> $obj->level_id,
		 			"position_id"  		=> $obj->position_id,
				   	"number" 			=> $obj->number,
				   	"name" 				=> $obj->number,
				   	"capacity" 			=> $obj->capacity,
				   	"measurement_id" 	=> $obj->measurement_id
				);						
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 201);
	}
	
	//DELETE
	function index_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Bin_location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
/* End of file Bin_location.php */
/* Bin_location: ./application/controllers/api/Bin_location.php */