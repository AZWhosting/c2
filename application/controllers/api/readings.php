<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Readings extends REST_Controller {	
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
			// $this->_database = $conn->inst_database;
		}
		$this->_database = 'db_banhji';
	}
	
	//GET 
	function index_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}
		
		//Filter		
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {
	    		if(!empty($value["operator"]) && isset($value["operator"])){
		    		$obj->{$value["operator"]}($value["field"], $value["value"]);
	    		}else{
	    			$obj->where($value["field"], $value["value"]);
	    		}
			}									 			
		}			

		//Get Result
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		

		if($obj->result_count()>0){			
			foreach ($obj as $value) {
				//Results
				$meter  = $value->meter->get();

				// 			$data["meta"] = array(
				// 						'meter_id' => $meter->id,
				// 						'meter_number' => $meter_number,
				// 						'meter_multiplier' => $meter_multiplier
				// 					);	
				$data["results"][] = array(
					"id" 			=> $value->id,
					"previous"		=> $value->previous,
					"current"		=> $value->current,
					"date"			=> $value->from_date." - ".$value->to_date,
					"number" 		=> $value->number,
					"reading" 		=> $value->usage
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
			$obj = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$meter = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$meter->where('number', $value->number)->get();
			//if($value->status == "n") {
				$obj->meter_id 				= isset($meter->id)					?$meter->id: "";
				$obj->previous 				= isset($value->previous)			?$value->previous: "";
				$obj->current 				= isset($value->current)			?$value->current: "";
				$obj->from_date 			= isset($value->from_date)			?$value->from_date: "";
				$obj->to_date 				= isset($value->to_date)			?$value->to_date: "";
				
				$obj->usage    = intval($value->current) - intval($value->previous);
			// } elseif($value->status == "u") {
			// 	$obj->where('meter_id', $value->meter_id);
			// 	$obj->where('from_date', $value->from_date);
			// 	$obj->where('to_date', $value->to_date);
			// 	$obj->get();
			// 	// update with new value
			// 	$obj->previous = $value->prev;
			// 	$obj->current  = $value->current;
			// 	$obj->usage    = intval($value->current) - intval($value->prev);
			// }
			
			
			if($obj->save()){								
				//Respsone
				$data["results"][] = array(
					"meter_id" 		=> $obj->meter_id,
					"number" 		=> intval($value->number),
					"prev"			=> $obj->previous,
					"current"		=> $obj->current,
					"from_date"		=> $obj->from_date,
					"to_date"		=> $obj->to_date
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
			$obj = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			$obj->where('id', $value->id);
			$obj->get();
			// $obj->meter_id = $value->meter_id;
			// $obj->previous = $value->prev;
			// $obj->current  = $value->current;
			// $obj->usage    = intval($value->current) - intval($value->prev);
			// $obj->from_date= $value->from_date;
			// $obj->to_date  = $value->to_date;
			$obj->meter_id 				= isset($value->meter_id)			?$value->meter_id: "";
			$obj->previous 				= isset($value->previous)			?$value->previous: "";
			$obj->current 				= isset($value->current)			?$value->current: "";
			$obj->from_date 			= isset($value->from_date)			?$value->from_date: "";
			$obj->to_date 				= isset($value->to_date)			?$value->to_date: "";

			if($obj->save()){
				//Results
				$data["results"][] = array(
					"meter_id" 		=> $obj->meter_id,
					"number" 		=> intval($value->number),
					"prev"			=> $obj->previous,
					"current"		=> $obj->current,
					"from_date"		=> $obj->from_date,
					"to_date"		=> $obj->to_date
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
			$obj = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"deleted" => TRUE
			);
							
		}

		//Response data
		$this->response($data, 200);
	}

	function books_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}
		
		//Filter		
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {
	    		if(!empty($value["operator"]) && isset($value["operator"])){
		    		$obj->{$value["operator"]}($value["field"], $value["value"]);
	    		}else{
	    			$obj->where($value["field"], $value["value"]);
	    		}
			}									 			
		}			

		//Get Result
		$obj->where('activated', 1);
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		

		if($obj->result_count()>0){			
			foreach ($obj as $value) {
				//Results
				$location = $value->location->get();
				$contact  = $value->contact->get();
				$record = $value->record->limit(1)->order_by('id', 'desc')->get();
				$data["meta"] = array(
										'location_id' => $location->id,
										'location_name' => $location->name,
										'location_abbr' => $location->abbr
									);				
				$data["results"][] = array(
					"meter_id" 		=> $value->id,
					"number" 		=> intval($value->number),
					"previous"		=> $record->current,
					"current"		=> 0,
					"from_date"		=> "2016-" . date('m') . "-01",
					"to_date"		=> "2016-" . date('m') . "-" . date('t'),
					"status" 		=> "n"
				);
			}
		}

		//Response Data		
		$this->response($data, 200);		
	}
}
/* End of file meters.php */
/* Location: ./application/controllers/api/meters.php */