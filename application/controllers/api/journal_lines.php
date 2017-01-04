<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Journal_lines extends REST_Controller {	
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
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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

		$obj->where("deleted <>", 1);		
		
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		
		
		if($obj->result_count()>0){			
			foreach ($obj as $value) {
				$account = $value->account->get();
				$data["results"][] = array(
					"id" 				=> $value->id,
			   		"transaction_id"	=> $value->transaction_id,			   		
					"account_id" 		=> $value->account_id,
					"contact_id" 		=> $value->contact_id,								   	
				   	"description" 		=> $value->description,
				   	"reference_no" 		=> $value->reference_no,
				   	"segments" 			=> explode(",",$value->segments),
				   	"dr" 				=> floatval($value->dr),			   				   	
				   	"cr" 				=> floatval($value->cr),
				   	"rate"				=> floatval($value->rate),
				   	"locale" 			=> $value->locale,
				   	"deleted"			=> $value->deleted,

				   	"account" 			=> $value->account->get_raw()->result(),
				   	"contact" 			=> $value->contact->get_raw()->result()
				);
			}						 			
		}		
		$this->response($data, 200);		
	}
	
	//POST
	function index_post() {
		$models = json_decode($this->post('models'));				
		$data["results"] = array();
		$data["count"] = 0;
		
		foreach ($models as $value) {
			$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

			isset($value->transaction_id) 	? $obj->transaction_id 		= $value->transaction_id : "";			
			isset($value->account_id)		? $obj->account_id			= $value->account_id : "";
			isset($value->contact_id)		? $obj->contact_id			= $value->contact_id : "";			
		   	isset($value->description)		? $obj->description 		= $value->description : "";
		   	isset($value->reference_no)		? $obj->reference_no 		= $value->reference_no : "";
		   	isset($value->segments) 		? $obj->segments 			= implode(",",$value->segments) : "";
		   	isset($value->dr)				? $obj->dr 					= $value->dr : "";
		   	isset($value->cr)				? $obj->cr 					= $value->cr : "";
		   	isset($value->rate)				? $obj->rate 				= $value->rate : "";
		   	isset($value->locale)			? $obj->locale 				= $value->locale : "";
		   	isset($value->deleted)			? $obj->deleted  			= $value->deleted : "";		   

		   	if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 				=> $obj->id,
			   		"transaction_id"	=> $obj->transaction_id,			   		
					"account_id" 		=> $obj->account_id,
					"contact_id" 		=> $obj->contact_id,								   	
				   	"description" 		=> $obj->description,
				   	"reference_no" 		=> $obj->reference_no,
				   	"segments" 			=> explode(",",$obj->segments),
				   	"dr" 				=> floatval($obj->dr),			   				   	
				   	"cr" 				=> floatval($obj->cr),
				   	"rate"				=> floatval($obj->rate),
				   	"locale" 			=> $obj->locale,
				   	"deleted"			=> $obj->deleted			   	
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
			$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			isset($value->transaction_id) 	? $obj->transaction_id 		= $value->transaction_id : "";			
			isset($value->account_id)		? $obj->account_id			= $value->account_id : "";
			isset($value->contact_id)		? $obj->contact_id			= $value->contact_id : "";			
		   	isset($value->description)		? $obj->description 		= $value->description : "";
		   	isset($value->reference_no)		? $obj->reference_no 		= $value->reference_no : "";
		   	isset($value->segments) 		? $obj->segments 			= implode(",",$value->segments) : "";
		   	isset($value->dr)				? $obj->dr 					= $value->dr : "";
		   	isset($value->cr)				? $obj->cr 					= $value->cr : "";
		   	isset($value->rate)				? $obj->rate 				= $value->rate : "";
		   	isset($value->locale)			? $obj->locale 				= $value->locale : "";
		   	isset($value->deleted)			? $obj->deleted  			= $value->deleted : "";
		   
			if($obj->save()){				
				//Results
				$data["results"][] = array(
					"id" 				=> $obj->id,
			   		"transaction_id"	=> $obj->transaction_id,			   		
					"account_id" 		=> $obj->account_id,
					"contact_id" 		=> $obj->contact_id,								   	
				   	"description" 		=> $obj->description,
				   	"reference_no" 		=> $obj->reference_no,
				   	"segments" 			=> explode(",",$obj->segments),
				   	"dr" 				=> floatval($obj->dr),			   				   	
				   	"cr" 				=> floatval($obj->cr),
				   	"rate"				=> floatval($obj->rate),
				   	"locale" 			=> $obj->locale,
				   	"deleted"			=> $obj->deleted
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
			$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
/* End of file journal_lines.php */
/* Location: ./application/controllers/api/journal_lines.php */