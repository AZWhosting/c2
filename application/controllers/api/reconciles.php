<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Reconciles extends REST_Controller {	
	public $_database;
	public $server_host;
	public $server_user;
	public $server_pwd;
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		$this->_database = 'db_banhji';
		// $institute = new Institute();
		// $institute->where('id', $this->input->get_request_header('Institute'))->get();
		// if($institute->exists()) {
		// 	$conn = $institute->connection->get();
		// 	$this->server_host = $conn->server_name;
		// 	$this->server_user = $conn->username;
		// 	$this->server_pwd = $conn->password;	
		//  $this->_database = $conn->inst_database;
		// }
	}

	//GET
	function index_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Reconcile(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
		// $obj->select('id, cashier, rate, json_array(memo)');
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

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		
		
		if($obj->result_count()>0){
			foreach ($obj as $value) {				
		 		$data["results"][] = array(
		 			"id" 						=> $value->id,		   			   						   
				   	"cashier" 					=> $value->cashier,				   	
				   	// "rate" 						=> $value->rate,
				   	"currencies"				=> $value->currencies,
				   	"created_at"				=> $value->created_at
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
			$obj = new Reconcile(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			// $obj->transfer_account_id 		= $value->transfer_account_id;			
			$obj->cashier 						= $value->cashier;
			$obj->currencies 					= json_encode($value->currencies);
			$obj->created_at 					= $value->created_at;			

			if($obj->save()){
				//Respsone				
				$data["results"][] = array(					
					"id" 						=> $obj->id,		   			   						   
				   	"cashier" 					=> $obj->cashier,				   	
				   	// "rate" 						=> $obj->rate,
				   	"currencies"				=> $obj->currencies,
				   	"created_at"				=> $obj->created_at
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
			$obj = new Reconcile(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			
			$obj->cashier 						= $value->cashier;
			$obj->currencies 					= json_encode($value->currencies);	

			if($obj->save()){				
				//Results
				$data["results"][] = array(
					"id" 						=> $obj->id,		   			   						   
				   	"cashier" 					=> $obj->cashier,				   	
				   	// "rate" 						=> $obj->rate,
				   	"currencies"				=> $obj->currencies,
				   	"created_at"				=> $obj->created_at
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
			$obj = new Reconcile(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);							
		}

		//Response data
		$this->response($data, 200);
	}


	//GET ITEM
	function item_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Reconcile_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		
		
		if($obj->result_count()>0){
			foreach ($obj as $value) {				
		 		$data["results"][] = array(
		 			"id" 				=> $value->id,
					"reconcile_id" 		=> $value->reconcile_id,
					"denomination" 		=> $value->denomination,			   			   						   
				   	"code" 				=> $obj->code,
				   	"note"				=> $value->note,		   	
				   	"unit" 				=> $value->unit,
				   	"created_at"		=> $value->created_at
		 		);
			}
		}

		//Response Data		
		$this->response($data, 200);			
	}
	
	//POST ITEM
	function item_post() {
		$models = json_decode($this->post('models'));

		foreach ($models as $value) {
			$obj = new Reconcile_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->reconcile_id 			= $value->reconcile_id;
			$obj->denomination 			= $value->denomination;			
			$obj->code 					= $value->code;
			$obj->note 					= $value->note;
			$obj->unit 					= $value->unit;
			$obj->created_at 			= $value->created_at;					

			if($obj->save()){
				//Respsone				
				$data["results"][] = array(					
					"id" 				=> $obj->id,
					"reconcile_id" 		=> $obj->reconcile_id,
					"denomination" 		=> $obj->denomination,			   			   						   
				   	"code" 				=> $obj->code,
				   	"note"				=> $obj->note,		   	
				   	"unit" 				=> $obj->unit,
				   	"created_at"		=> $obj->created_at
				);				
			}		
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 201);
	}
	
	//PUT ITEM
	function item_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;

		foreach ($models as $value) {
			$t = time();		
			$old = new Reconcile_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$old->get_by_id($value->id);
			$old->status = 0;
			$old->updated_at = $t;
			$old->save();

			$obj = new Reconcile_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->reconcile_id 			= $value->reconcile_id;
			$obj->denomination 			= $value->denomination;			
			$obj->code 					= $value->code;
			$obj->note 					= $value->note;
			$obj->unit 					= $value->unit;
			$obj->created_at 			= $t;

			if($obj->save()){				
				//Results
				$data["results"][] = array(
					"id" 				=> $obj->id,
					"reconcile_id" 		=> $obj->reconcile_id,
					"denomination" 		=> $obj->denomination,			   			   						   
				   	"code" 				=> $obj->code,
				   	"note"				=> $obj->note,		   	
				   	"unit" 				=> $obj->unit,
				   	"created_at"		=> $obj->created_at
				);						
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}
	
	//DELETE ITEM
	function item_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Reconcile_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);							
		}

		//Response data
		$this->response($data, 200);
	}

	function receipt_get() {
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Reconcilereceipt(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
		// $obj->select('id, cashier, rate, json_array(memo)');
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

		$obj->get_paged_iterated($page, $limit);

		if($obj->exists()) {
			foreach($obj as $value) {
				$data["results"][] = array(
					'id' => $value->id,
					'code' => $value->code,
					'amount' => $value->amount,
					'status' => $value->status,
					'_date'  => $value->created_at
				);
			}
			$this->response($data, 200);
		} else {
			$this->response($data, 404);
		}
	}

	function receipt_post() {
		$models = json_decode($this->post('models'));

		$data = array();

		foreach($models as $value) {
			$obj = new Reconcilereceipt(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->code = $value->code;
			$obj->amount = $value->amount;
			$obj->created_at = $value->_date;

			if($obj->save()) {
				$data[] = array(
					'id' => $obj->id,
					'code' => $obj->code,
					'amount' => $obj->amount,
					'status' => $obj->status,
					'_date'  => $obj->created_at
				);
			}
		}

		$this->response(array('results' => $data, 'count' => count($data)), 201);
	}

	function receipt_put() {
		$models = json_decode($this->put('models'));

		$data = array();

		foreach($models as $value) {
			$obj = new Reconcilereceipt(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where('id', $value->id)->get();
			$obj->status = 1;
			// $obj->code = $value->code;
			// $obj->amount = $value->amount;
			// $obj->created_at = $value->_date;

			if($obj->save()) {
				$data[] = array(
					'id' => $obj->id,
					'code' => $obj->code,
					'amount' => $obj->amount,
					'status' => $obj->status,
					'_date'  => $obj->created_at
				);
			}
		}

		$this->response(array('results' => $data, 'count' => count($data)), 201);
	}
}
/* End of file reconciles.php */
/* Location: ./application/controllers/api/reconciles.php */