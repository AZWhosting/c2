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
			$this->_database = $conn->inst_database;
			date_default_timezone_set("$conn->time_zone");
		}
		// $this->_database = 'db_banhji';
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
		$obj->order_by('created_at', 'desc');
		$obj->order_by('id', 'desc');
		$obj->where('deleted', 0);
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		

		if($obj->result_count()>0){			
			foreach ($obj as $value) {
				//Results
				$meter  = $value->meter->get();
				//$license = $value->branch->get();
				// 			$data["meta"] = array(
				// 						'meter_id' => $meter->id,
				// 						'meter_number' => $meter_number,
				// 						'meter_multiplier' => $meter_multiplier
				// 					);	
				$data["results"][] = array(
					"id" 			=> $value->id,
					"meter_id" 		=> $value->meter_id,
					"branch_id" 	=> $meter->branch_id,
					"location_id" 	=> $meter->location_id,
					"previous"		=> $value->previous,
					"meter_id"		=> $meter->id,
					"current"		=> $value->current,
					"month_of"		=> $value->month_of,
					"from_date" 	=> $value->from_date,
					"to_date" 		=> $value->to_date,
					"date"			=> $value->from_date." - ".$value->to_date,
					"meter_number" 		=> $meter->number,
					"invoiced"   	=> $value->invoiced == 0 ? FALSE:TRUE,
					"usage" 		=> $value->usage,
					"status"		=> "new",
					"_meta" 		=> array()
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
			$meter->where('number', $value->meter_number)->get();
			if($value->condition == "new") {
				$obj->meter_id 				= isset($meter->id)					?$meter->id: "";
				$obj->previous 				= isset($value->previous)			?$value->previous: "";
				$obj->current 				= isset($value->current)			?$value->current: "";
				$obj->from_date 			= isset($value->previous_reading_date) ? date('Y-m-d', strtotime($value->previous_reading_date)) : "";
				$obj->month_of 				= isset($value->month_of)			? date('Y-m-d', strtotime($value->month_of)): date('Y-m-d');
				$obj->to_date 				= isset($value->to_date)			? date('Y-m-d', strtotime($value->to_date)):date('Y-m-d');
				
				$obj->usage    = intval($value->current) - intval($value->previous);
			} elseif($value->condition == "update") {
				$obj->where('meter_id', $value->meter_id);
				$obj->where('from_date', $value->from_date);
				$obj->where('to_date', $value->to_date);
				$obj->get();
				// update with new value
				$obj->previous = $value->prev;
				$obj->current  = $value->current;
				$obj->usage    = intval($value->current) - intval($value->prev);
			}
			
			
			if($obj->save()){								
				//Respsone
				$data["results"][] = array(
					"id"			=> $obj->id,
					"meter_id" 		=> $obj->meter_id,
					"meter_number" 	=> $meter->number,
					"prev"			=> $obj->previous,
					"current"		=> $obj->current,
					"usage"	 		=> $obj->current - $obj->previous,
					"from_date"		=> $obj->from_date,
					"month_of"		=> $obj->month_of,
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

			if($obj->invoiced == 0) {
				// $obj->previous 				= isset($value->previous)			?$value->previous: "";
				$obj->current 				= isset($value->current)			?$value->current: "";
				$obj->from_date 			= isset($value->from_date)			?$value->from_date: "";
				$obj->to_date 				= isset($value->to_date)			?$value->to_date: "";
				$obj->meter_number 			= isset($value->meter_number)		?$value->meter_number: "";
				$obj->usage 				= $obj->current - $obj->previous;
				if($obj->save()){
					$data["results"][] = array(
						"meter_id" 		=> $obj->meter_id,
						"meter_number" 	=> $obj->meter_number,
						"month_of"		=> $obj->month_of,
						"prev"			=> $obj->previous,
						"current"		=> $obj->current,
						"usage" 		=> $obj->usage,
						"from_date"		=> $obj->from_date,
						"to_date"		=> $obj->to_date,
						"_meta" 		=> array()
					);						
				}
			} else {
				$obj->invoiced = 0;
				$obj->save();

				$line = $obj->Winvoice_line->select('transaction_id')->get();

				$transaction = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

				$winvioceLine = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

				$transaction->where('id', $line->transaction_id)->get();
				$transaction->deleted = 1;
				$transaction->save();

				$winvoiceLine->where('transaction_id', $line->transaction_id)->get();
				$winvoiceLine->deleted = 1;
				$winvoiceLine->save();

				// if($invoiceStatus == 0) {
				$newObj = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$newObj->meter_id 				= $value->meter_id;
				$newObj->month_of 				= isset($value->month_of)			? date('Y-m-d', strtotime($value->month_of)): date('Y-m-d');
				$newObj->previous 				= isset($value->previous)			? $value->previous: "";
				$newObj->current 				= isset($value->current)			? $value->current: "";
				$newObj->from_date 				= isset($value->previous_reading_date) ? date('Y-m-d', strtotime($value->previous_reading_date)) : "";
				$newObj->to_date 				= isset($value->month_of)			? date('Y-m-d', strtotime($value->month_of)):date('Y-m-d');
				$newObj->invoiced 				= 0;
				$newObj->usage = $newObj->current - $newObj->previous;
				if($newObj->save()){		
					$data["results"][] = array(
						"id"			=> $newObj->id,
						"meter_id" 		=> $newObj->meter_id,
						"month_of"		=> $newObj->month_of,
						"meter_number" 	=> $newObj->meter_number,
						"prev"			=> $newObj->previous,
						"current"		=> $newObj->current,
						"usage" 		=> $newObj->usage,
						"from_date"		=> $newObj->from_date,
						"to_date"		=> $newObj->to_date
					);						
				}
				// }
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
		    		// $obj->{$value["operator"]}($value["field"], $value["value"]);
	    		}else{
	    			$obj->where($value["field"], $value["value"]);
	    		}
			}									 			
		}			

		//Get Result
		$obj->where('activated', 1);
		// $obj->where_related_record('invoiced', 0);
		$obj->get_paged_iterated($page, $limit);
		// $data["count"] = $obj->paged->total_rows;		

		if($obj->result_count()>0){			
			foreach ($obj as $value) {
				//Results
				$date     = null;
				$location = $value->location->get();
				$contact = $value->contact->get_raw();
				$record = $value->record;//->limit(1)->order_by('id', 'desc')->get();
				if(!empty($filters) && isset($filters)){			
			    	foreach ($filters as $f) {
			    		if(!empty($f["operator"]) && isset($f["operator"])){
				    		// $record->{$f["operator"]}($f["field"], $f["value"]);
				    		if($f['field'] === 'month_of <'){
				    			$date = date('Y-m-d', strtotime($f['value']));
				    			$record->where('month_of <', $f["value"]);
				    			$record->where("invoiced <>", 1);

				    		} else {
				    			$record->where($f["field"], $f["value"]);
				    		}
				    		// $record->where($f["field"], $f["value"]);
			    		}
					}									 			
				}
				$record->limit(1)->order_by('id', 'desc')->get();	
				$data["meta"] = array(
					'location_id' => $location->id,
					'location_name' => $location->name,
					'location_abbr' => $location->abbr
				);
				if($record->exists()) {
					$data["results"][] = array(
						"meter_id" 		=> $value->id,
						"meter_number" 	=> $value->number,
						"previous"		=> floatval($record->current),
						"current"		=> 0,
						"_contact" 		=> $contact->result(),
						"prev_date"		=> $record->exists() ? $record->to_date : $date, 
						"to_date"		=> $date,
						"status" 		=> "new"
					);
				}
			}
		}
		$data["count"] = count($data['results']);
		//Response Data		
		$this->response($data, 200);		
	}
}
/* End of file meters.php */
/* Location: ./application/controllers/api/meters.php */