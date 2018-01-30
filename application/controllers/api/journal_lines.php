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
		$filter 	= $this->get("filter");		
		$page 		= $this->get('page');		
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);	

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
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter['filters'] as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
					$obj->where($value["field"], $value["value"]);
				}
			}
		}

		$obj->include_related("contact", array("abbr","number","name"));
		$obj->include_related("account", array("number","name"));
		$obj->include_related("job", array("number","name"));
		$obj->where("deleted <>", 1);
		
		//Results
		if($page && $limit){
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
		}else{
			$obj->get_iterated();
			$data["count"] = $obj->result_count();
		}							

		if($obj->exists()){
			foreach ($obj as $value) {
				//Account
				$account = array(
					"id" 		=> $value->account_id,
					"number" 	=> $value->account_number ? $value->account_number : "", 
					"name" 		=> $value->account_name ? $value->account_name : ""
				);

				//Contact
				$contact = array(
					"id" 		=> $value->contact_id,
					"abbr"		=> $value->contact_abbr ? $value->contact_abbr : "", 
					"number" 	=> $value->contact_number ? $value->contact_number : "", 
					"name" 		=> $value->contact_name ? $value->contact_name : ""
				);

				//Job
				$job = array(
					"id" 		=> $value->job_id,
					"number" 	=> $value->job_number ? $value->job_number : "", 
					"name" 		=> $value->job_name ? $value->job_name : ""
				);

				$segments = [];
				$segs = $value->segmentitem->include_related("segment", array("name"))->get_raw()->result();
				foreach ($segs as $val) {
					$segments[] = array(
						"id" 			=> $val->id,
						"segment_id" 	=> $val->segment_id,
						"code" 			=> $val->code,
						"name" 			=> $val->name,
						"segment" 		=> array("id"=>$val->segment_id, "name"=>$val->segment_name)
					);
				}

				$data["results"][] = array(
					"id" 				=> $value->id,
			   		"transaction_id"	=> $value->transaction_id,			   		
					"account_id" 		=> $value->account_id,
					"contact_id" 		=> $value->contact_id,
					"job_id" 			=> $value->job_id,								   	
				   	"description" 		=> $value->description,
				   	"reference_no" 		=> $value->reference_no,
				   	// "segments" 			=> explode(",",intval($value->segments)),
				   	"dr" 				=> floatval($value->dr),			   				   	
				   	"cr" 				=> floatval($value->cr),
				   	"rate"				=> floatval($value->rate),
				   	"locale" 			=> $value->locale,
				   	"deleted"			=> $value->deleted,

				   	"account" 			=> $account,
				   	"contact" 			=> $contact,
				   	"job" 				=> $job,
				   	"segments" 			=> $segments,

				   	"donor"				=> ""
				);
			}						 			
		}		
		$this->response($data, 200);		
	}
	
	//POST
	function index_post() {
		$models = json_decode($this->post('models'));				
		$data["results"] = [];
		$data["count"] = 0;
		
		foreach ($models as $value) {
			$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			isset($value->transaction_id) 	? $obj->transaction_id 		= $value->transaction_id : "";			
			isset($value->account_id)		? $obj->account_id			= $value->account_id : "";
			isset($value->contact_id)		? $obj->contact_id			= $value->contact_id : "";
			isset($value->job_id)			? $obj->job_id				= $value->job_id : "";
		   	isset($value->description)		? $obj->description 		= $value->description : "";
		   	isset($value->reference_no)		? $obj->reference_no 		= $value->reference_no : "";
		   	// isset($value->segments) 		? $obj->segments 			= implode(",",$value->segments) : "";
		   	isset($value->dr)				? $obj->dr 					= $value->dr : "";
		   	isset($value->cr)				? $obj->cr 					= $value->cr : "";
		   	isset($value->rate)				? $obj->rate 				= $value->rate : "";
		   	isset($value->locale)			? $obj->locale 				= $value->locale : "";
		   	isset($value->deleted)			? $obj->deleted  			= $value->deleted : "";		   

		   	//Account
			if(isset($value->account)){
				$obj->account_id = $value->account->id;
			}

			//Contact
			if(isset($value->contact)){
				$obj->contact_id = $value->contact->id;
			}

			//Job
			if(isset($value->job)){
				$obj->job_id = $value->job->id;
			}

			$related = [];

			//Segments
			if(isset($value->segments)){
				$ids = [];
				foreach ($value->segments as $val) {
					array_push($ids, $val->id);
				}

				if(count($ids)>0){
					$segmentitems = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$segmentitems->where_in("id", $ids)->get();
					array_push($related, $segmentitems->all);
				}
			}

		   	if($obj->save($related)){
			   	$data["results"][] = array(
			   		"id" 				=> $obj->id,
			   		"transaction_id"	=> $obj->transaction_id,
					"account_id" 		=> $obj->account_id,
					"contact_id" 		=> $obj->contact_id,
					"job_id" 			=> $obj->job_id,
				   	"description" 		=> $obj->description,
				   	"reference_no" 		=> $obj->reference_no,
				   	// "segments" 			=> explode(",",$obj->segments),
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
		$data["results"] = [];
		$data["count"] = 0;

		foreach ($models as $value) {			
			$obj = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			//Remove previouse segments
			$segment = explode(",",$obj->segments);
			if(count($segment)>0){
		   		$prevSegments = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   		$prevSegments->where_in("id", $segment)->get();
		   		$obj->delete($prevSegments->all);
		   	}

			isset($value->transaction_id) 	? $obj->transaction_id 		= $value->transaction_id : "";			
			isset($value->account_id)		? $obj->account_id			= $value->account_id : "";
			isset($value->contact_id)		? $obj->contact_id			= $value->contact_id : "";
			isset($value->job_id)			? $obj->job_id				= $value->job_id : "";
		   	isset($value->description)		? $obj->description 		= $value->description : "";
		   	isset($value->reference_no)		? $obj->reference_no 		= $value->reference_no : "";
		   	// isset($value->segments) 		? $obj->segments 			= implode(",",$value->segments) : "";
		   	isset($value->dr)				? $obj->dr 					= $value->dr : "";
		   	isset($value->cr)				? $obj->cr 					= $value->cr : "";
		   	isset($value->rate)				? $obj->rate 				= $value->rate : "";
		   	isset($value->locale)			? $obj->locale 				= $value->locale : "";
		   	isset($value->deleted)			? $obj->deleted  			= $value->deleted : "";

		   	if(isset($value->account)){
				$obj->account_id = $value->account->id;
			}

			if(isset($value->contact)){
				$obj->contact_id = $value->contact->id;
			}

			if(isset($value->job)){
				$obj->job_id = $value->job->id;
			}

			$related = [];

			//Segments
			if(isset($value->segments)){
				$segmentitemDel = $obj->segmentitem->get();
				$obj->delete($segmentitemDel->all);

				$ids = [];
				foreach ($value->segments as $val) {
					array_push($ids, $val->id);
				}
				if(count($ids)>0){
					$segmentitems = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$segmentitems->where_in("id", $ids)->get();
					array_push($related, $segmentitems->all);
				}
			}

			if($obj->save($related)){
				//Results
				$data["results"][] = array(
					"id" 				=> $obj->id,
			   		"transaction_id"	=> $obj->transaction_id,
					"account_id" 		=> $obj->account_id,
					"contact_id" 		=> $obj->contact_id,
					"job_id" 			=> $obj->job_id,
				   	"description" 		=> $obj->description,
				   	"reference_no" 		=> $obj->reference_no,
				   	// "segments" 			=> explode(",",$obj->segments),
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