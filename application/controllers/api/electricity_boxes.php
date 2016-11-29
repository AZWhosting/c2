<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Electricity_boxes extends REST_Controller {	
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
		$filters = $this->get("filter")["filters"];		
		$page 	 = $this->get("page");		
		$limit 	 = $this->get("limit");								
		$sort 	 = $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Electricity_box(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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

		if(!empty($limit) && !empty($page)){
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;							
		}	

		if($obj->result_count()>0){			
			foreach ($obj as $value) {								
				$data["results"][] = array(
					"id"			=> $value->id,
					"location_id"	=> $value->location_id,
					"number"		=> $value->number
				);
			}						 			
		}		
		$this->response($data, 200);		
	}
	
	//POST
	function electricity_box_post() {
		$post = array(
			"box_no" 				=> $this->post("box_no"),
			"electricity_pole_id"	=> $this->post("electricity_pole_id"),
			"transformer_id" 		=> $this->post("transformer_id"),
			"status" 				=> $this->post("status"),
			"latitute" 				=> $this->post("latitute"),
			"longtitute" 			=> $this->post("longtitute"),
			"description" 			=> $this->post("description"),
			"company_id" 			=> $this->post("company_id")						
		);

		$id = $this->electricity_box->insert($post);
		$data["results"] = $this->electricity_box->get($id);

		$this->response($data, 201);				
	}
	
	//PUT
	function electricity_box_put() {
		$put = array(
			"box_no" 				=> $this->put("box_no"),
			"electricity_pole_id"	=> $this->put("electricity_pole_id"),
			"transformer_id" 		=> $this->put("transformer_id"),
			"status" 				=> $this->put("status"),
			"latitute" 				=> $this->put("latitute"),
			"longtitute" 			=> $this->put("longtitute"),
			"description" 			=> $this->put("description"),
			"company_id" 			=> $this->put("company_id")						
		);
		$data["status"] = $this->electricity_box->update($this->put('id'), $put);		
		$data["results"] = $this->electricity_box->get($this->put('id'));
		
		$this->response($data, 200);
	}
	
	//DELETE
	function electricity_box_delete() {		
		$data["results"] = $this->electricity_box->get($this->delete("id"));		
		$data["status"] = $this->electricity_box->delete($this->delete("id"));

		$this->response($data, 200);
	}
	

	//Sort
	private function _get_sorts($sorts) {
    	$sortList = array();
		foreach ($sorter as $row) {
			$sortList += array($row["field"] => $row["dir"]);
		}

		return $sortList;
    }

    //Filter
    private function _get_filters($filters) {
    	$filterList = array();
    	foreach ($filters as $value) {											
			$filterList += array($value["field"] => $value["value"]);						
		}

		return $filterList;
    }

}