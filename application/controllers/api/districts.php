<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Districts extends REST_Controller {
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

		$obj = new District();		

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
				$data["results"][] = array(	
					"id" 			=> $value->id,			
					"province_id" 	=> $value->province_id,
					"name_local" 	=> $value->name_local
				);
			}
		}

		//Response Data		
		$this->response($data, 200);		
	}
	// function index_post() {
	// 	$models = json_decode($this->post('models'));

	// 	foreach ($models as $value) {
	// 		$obj = new District(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	// 		isset($value->province_id) 	? $obj->province_id = $value->province_id : "";
	// 		isset($value->name_local) 	? $obj->name_local = $value->name_local : "";

	// 		if($obj->save()){
	// 			//Respsone
	// 			$data["results"][] = array(
	// 				"province_id" 				=> $obj->province_id,
	// 				"name_local" 				=> $obj->name_local
	// 			);
	// 		}
	// 	}
	// 	$data["count"] = count($data["results"]);

	// 	$this->response($data, 201);
	// }
	
}
/* End of file categories.php */
/* Location: ./application/controllers/api/categories.php */