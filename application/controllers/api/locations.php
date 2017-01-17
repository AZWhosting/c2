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
		$filters 	= $this->get("filter");		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Filter		
		if(!empty($filters) && isset($filters["filters"])){
	    	foreach ($filters["filters"] as $value) {
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
		
		if($obj->result_count()>0){
			foreach ($obj as $value) {	
				$license = $value->branch->get();			
		 		$data["results"][] = array(	
		 			"id"     		=> $value->id,		   	
				   	"name" 			=> $value->name,
				   	"abbr" 			=> $value->abbr,
				   	"branch" 		=> array('id' => $license->id, 'name' => $license->name)			
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
			isset($value->utility_id) 			? $obj->utility_id 			= $value->utility_id : "";
			isset($value->name) 				? $obj->name 				= $value->name : "";
			isset($value->abbr) 				? $obj->abbr 				= $value->abbr : "";
			isset($value->branch) 				? $obj->branch_id 			= $value->branch->id : "";
			if($obj->save()){
				//Respsone
				$license = $obj->branch->get();
				$data["results"][] = array(					
					"id" 			=> $obj->id,
					"utility_id" 	=> $obj->utility_id,
					"name" 			=> $obj->name,
					"abbr" 			=> $obj->abbr,
					"branch" 		=> array('id' => $license->id, 'name' => $license->name)	
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
			$obj = new Location(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
		
			$obj->name 			= $value->name;
			$obj->abbr 			= $value->abbr;
			$obj->branch_id 	= $value->branch->id;
			if($obj->save()){				
				//Results
				$license = $obj->branch->get();
				$data["results"][] = array(
					"id" 			=> $obj->id,
					"name" 			=> $obj->name,
					"abbr" 			=> $obj->abbr,
					"branch" 		=> array('id' => $license->id, 'name' => $license->name)
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