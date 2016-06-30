<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Electricity_units extends REST_Controller {
	public $entity;
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		$institute = new Institute();
		$institute->where('name', $this->input->get_request_header('Entity'))->get();
		if($institute->exists()) {
			$conn = $institute->connection->get();
			// $this->entity = $conn->server_name;
			// $this->user = $conn->user;
			// $this->pwd = $conn->password;	
			$this->entity = $conn->inst_database;
		}
	}
	
	//GET 
	function index_get() {
		$filters = $this->get("filter")["filters"];		
		$limit 	 = $this->get("pageSize");
		$offset  = $this->get('skip');
		$sort 	 = $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Electricity_unit(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		//Sort
		if(!empty($sort) && isset($sort)){					
			$obj->order_by($this->_get_sorts($sort));
		}

		//Limit
		if(!empty($limit) && isset($limit)){					
			$obj->limit($limit, $offset);
		}

		//Filter
		if(!empty($filters) && isset($filters)){
			$obj->get_where($this->_get_filters($filters));
			
			foreach ($obj as $value) {								
				$data["results"][] = array(
					"id"			=> $value->id,
					"company_id" 	=> $value->company_id,
					"type"			=> $value->type,
					"name"			=> $value->name
				);
			}

			//Clear all items from the Active Record cache
			$obj->flush_cache();
			$data["count"] = $obj->get_where($this->_get_filters($filters))->result_count();			 			
		}		
		$this->response($data, 200);		
	}
	
	//POST
	function electricity_unit_post() {
		$post = array(
			"type" 			=> $this->post("type"),
			"name" 			=> $this->post("name"),
			"company_id"	=> $this->post("company_id")					
		);		
		$id = $this->electricity_unit->insert($post);
		$data["results"] = $this->electricity_unit->get($id);

		$this->response($data, 201);				
	}
	
	//PUT
	function electricity_unit_put() {
		$put = array(
			"type" 			=> $this->put("type"),
			"name" 			=> $this->put("name"),
			"company_id"	=> $this->put("company_id")					
		);
		$data["status"] = $this->electricity_unit->update($this->put('id'), $put);		
		$data["results"] = $this->electricity_unit->get($this->put('id'));
		
		$this->response($data, 200);
	}
	
	//DELETE
	function electricity_unit_delete() {		
		$data["results"] = $this->electricity_unit->get($this->delete("id"));		
		$data["status"] = $this->electricity_unit->delete($this->delete("id"));

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