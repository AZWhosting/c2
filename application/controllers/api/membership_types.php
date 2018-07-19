<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Membership_types extends REST_Controller {
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

		$obj = new Membership_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
					$obj->{$value['operator']}($value['field'], $value['value']);
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

		if($obj->exists()){
			foreach ($obj as $value) {				
				//Results				
				$data["results"][] = array(
					"id" 			=> $value->id,
					"name" 	 		=> $value->name,
					"description" 	=> $value->description,
					"membership_id"	=> intval($value->membership_id),
					"is_system"		=> $value->is_system
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
			$obj = new Membership_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
			
			isset($value->name) 		? $obj->name 			= $value->name : "";
			isset($value->description) 	? $obj->description 	= $value->description : "";
			isset($value->membership_id)? $obj->membership_id 	= $value->membership_id : "";
			isset($value->is_system) 	? $obj->is_system 		= $value->is_system : "";
						
			if($obj->save()){
				//Add default pattern membership
				$memberships = new Membership(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$memberships->membership_type_id 	= $obj->id;
				$memberships->status 				= 1;
				$memberships->is_pattern 			= 1;
				$memberships->save();

				$mtypes = new Membership_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$mtypes->get_by_id($obj->id);
				$mtypes->membership_id = $memberships->id;
				$mtypes->save();

				//Add recurring
				$recurrings = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$recurrings->transaction_template_id = 3;
                $recurrings->payment_term_id     = 0;
                $recurrings->payment_method_id   = 0;
                $recurrings->reference_id     	 = $memberships->id;
                $recurrings->type                = "Invoice";//Required
                $recurrings->sub_type            = "memberships";
                $recurrings->number              = "";
                $recurrings->rate                = 1;//Required
                $recurrings->status              = 0;
                $recurrings->recurring_name      = "Subscription Recurring";
                // $recurrings->start_date          = new Date();
                $recurrings->frequency           = "Day";
                $recurrings->month_option        = "Day";
                $recurrings->interval            = 1;
                $recurrings->day                 = 1;
                $recurrings->week                = 0;
                $recurrings->month               = 0;
                $recurrings->is_recurring        = 1;
                $recurrings->save();

				$data["results"][] = array(
					"id" 			=> $obj->id,
					"name" 	 		=> $obj->name,					
					"description" 	=> $obj->description,
					"membership_id"	=> $memberships->id,
					"is_system"		=> $obj->is_system
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
			$obj = new Membership_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			
			isset($value->name) 		? $obj->name 			= $value->name : "";
			isset($value->description) 	? $obj->description 	= $value->description : "";
			isset($value->membership_id)? $obj->membership_id 	= $value->membership_id : "";
			isset($value->is_system) 	? $obj->is_system 		= $value->is_system : "";

			if($obj->save()){				
				$data["results"][] = array(
					"id" 			=> $obj->id,
					"name" 	 		=> $obj->name,
					"description" 	=> $obj->description,
					"membership_id"	=> $obj->membership_id,
					"is_system"		=> $obj->is_system
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
			$obj = new Membership_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$lock = new Membership(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$lock->where("is_pattern <>", 1);
			$lock->where("membership_type_id", $value->id);
			$lock->limit(1);
			$lock->get();

			if($lock->exists()){
				$data["results"][] = array(
					"data"   => $value,
					"status" => "This data is using, can not delete."
				);
			}else{
				//Delete membership pattern
				$memberships = new Membership(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$memberships->where("id", $value->membership_id)->get();

				//Delete recurring
				$recurrings = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$recurrings->where("reference_id", $value->membership_id);
				$recurrings->where("is_recurring", 1);
				$recurrings->get();
				$recurrings->deleted = 1;

				$data["results"][] = array(
					"data"   		=> $value,
					"status" 		=> $obj->delete(),
					"memberships" 	=> $memberships->delete(),
					"recurrings" 	=> $recurrings->save()
				);
			}
		}

		//Response data
		$this->response($data, 200);
	}  
	
}
/* End of file categories.php */
/* Location: ./application/controllers/api/categories.php */