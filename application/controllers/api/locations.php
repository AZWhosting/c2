<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Locations extends REST_Controller {	
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

		$obj = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
					if($value['operator']=="eq"){
	    				$obj->where($value["field"], $value["value"]);
	    			}else if($value['operator']=="by_user_id"){
	    				$employeeUsers = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	    				$employeeUsers->where("user_id", $value['value']);
	    				$employeeUsers->get();

	    				if($employeeUsers->exists()){
	    					$obj->where_related_contact("id", $employeeUsers->id);
	    				}
	    			}else{
						$obj->{$value['operator']}($value['field'], $value['value']);
	    			}
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
		
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$branch = [];
				if($value->branch_id>0){	
					$license = $value->branch->get();
					$branch = array('id' => $license->id, 'name' => $license->name);
				}
				
				$location_type = [];
				if($value->location_type_id>0){
					$locationTypes = new Location_type();
					$locationTypes->where("id", $value->location_type_id);
					$location_type = $locationTypes->get_raw()->result()[0];
				}

		 		$data["results"][] = array(	
		 			"id"     			=> $value->id,
		 			"warehouse_id"  	=> $value->warehouse_id,
		 			"location_type_id"	=> $value->location_type_id,
				   	"number" 			=> $value->number,
				   	"name" 				=> $value->name,
				   	"abbr" 				=> $value->abbr,
				   	"type" 				=> $value->type,
				   	"main_bloc" 		=> intval($value->main_bloc),
				   	"main_pole" 		=> intval($value->main_pole),
				   	"branch" 			=> $branch,
				   	"location_type" 	=> $location_type			
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
			$obj = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			
			if(isset($value->location_type)){
				$obj->location_type_id = $value->location_type->id;
			}
			
			isset($value->warehouse_id) 	? $obj->warehouse_id 		= $value->warehouse_id: "";
			// isset($value->location_type_id) ? $obj->location_type_id 	= $value->location_type_id: "";
			isset($value->type) 			? $obj->type 				= $value->type : "";
			isset($value->number) 			? $obj->number 				= $value->number : "";
			isset($value->name) 			? $obj->name 				= $value->name : "";
			isset($value->abbr) 			? $obj->abbr 				= $value->abbr : "";
			isset($value->main_bloc) 		? $obj->main_bloc 			= intval($value->main_bloc) : 0;
			isset($value->main_pole) 		? $obj->main_pole 			= intval($value->main_pole) : 0;
			isset($value->branch) 			? $obj->branch_id 			= $value->branch->id : "";
			$obj->sync = 1;
			if($obj->save()){
				//Respsone
				$license = $obj->branch->get();
				$data["results"][] = array(					
					"id" 				=> $obj->id,
					"warehouse_id"  	=> $obj->warehouse_id,
		 			"location_type_id"	=> $obj->location_type_id,
					"type" 				=> $obj->type,
					"number" 			=> $obj->number,
					"name" 				=> $obj->name,
					"abbr" 				=> $obj->abbr,
					"main_bloc" 		=> $obj->main_bloc,
					"main_pole" 		=> $obj->main_pole,
					"branch" 			=> array('id' => $license->id, 'name' => $license->name)	
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
			$obj = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			if(isset($value->location_type)){
				$obj->location_type_id = $value->location_type->id;
			}
			
			isset($value->warehouse_id) 		? $obj->warehouse_id 		= $value->warehouse_id: "";
			// isset($value->location_type_id) 	? $obj->location_type_id 	= $value->location_type_id: "";
			isset($value->number) 				? $obj->number 				= $value->number : "";
			isset($value->name)? 				$obj->name 				= $value->name: "";			
			isset($value->abbr)?				$obj->abbr 				= $value->abbr: "";
			isset($value->branch->id)? 			$obj->branch_id 		= $value->branch->id: "";
			isset($value->type)? 				$obj->type 				= $value->type: "";
			isset($value->main_bloc)? 			$obj->main_bloc 		= intval($value->main_bloc): 0;
			isset($value->main_pole)? 			$obj->main_pole 		= intval($value->main_pole): 0;
			$obj->sync = 1;
			if($obj->save()){				
				//Results
				$license = $obj->branch->get();
				$data["results"][] = array(
					"id" 				=> $obj->id,
					"warehouse_id"  	=> $obj->warehouse_id,
		 			"location_type_id"	=> $obj->location_type_id,
		 			"number" 			=> $obj->number,
					"name" 				=> $obj->name,
					"abbr" 				=> $obj->abbr,
					"main_bloc" 		=> $obj->main_bloc,
					"main_pole" 		=> $obj->main_pole,
					"type" 				=> $obj->type,
					"branch" 			=> array('id' => $license->id, 'name' => $license->name)
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
			$obj = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
/* End of file locations.php */
/* Location: ./application/controllers/api/locations.php */