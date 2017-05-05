<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

/* for creating and editing company and their database */

class Invoices extends REST_Controller {
	
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

	public function index_get($id = NULL, $resource = NULL) {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->select('id, type, number, amount, due_date, status');

		if(isset($id)) {
			$obj->where('id', $id);
			// if(isset($resource)) {
			// 	$obj->include_related("$resource", NULL, TRUE, TRUE);
			// }
			$obj->limit(1);
		} else {
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
		}
		//Results
		$obj->where('type like ', "%Invoice");
		if($page && $limit){
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
		}else{
			$obj->get_iterated();
			$data["count"] = $obj->result_count();
		}

		if($obj->exists()){
			if(isset($resource)) {
				foreach($obj as $row) {
					$rs = null;
					switch ($resource) {
						case "contact":
							$q = $row->{$resource}->select('id, name, abbr, number, email, phone, city, post_code')->get();
							if($q->exists()) {
								$rs = array(
									'url' => base_url() . "api/contact/index/" . "$q->id",
									'name'=> "$q->name",
									'number' => "$q->abbr"."-"."$q->number",
									'email' => "$q->email",
									'phone' => "$q->phone",
									'city' => "$q->city",
									'postCode' => "$q->post_code"
								);
							} else {
								$rs = array();
							}
								
							break;
						case "sale_order":
							$q = $row->reference->select('id, amount, type, number')->where('type','Sale_Order')->get();
							if($q->exists()) {
								$rs = array(
									'url' => base_url() . "api/transaction/index/" . $q->id,
									"number"=> $q->number,
									'type' => $q->type,
									'amount' => $q->amount
								);
							} else {
								$rs = array();
							}
							break;
						case "deposit":
							$q = $row->reference->select('id, amount, type, number')->where('type','Customer_Deposit')->get();
							if($q->exists()) {
								$rs = array(
									'url' => base_url() . "api/transaction/index/" . $q->id,
									"number"=> $q->number,
									'type' => $q->type,
									'amount' => $q->amount
								);
							} else {
								$rs = array();
							}
							break;
					}
					
					// $row->{$resource}->get_raw();
					$data['results'][] = array(
						'id' => $row->id,
						'number' => $row->number,
						'type' => $row->type,
						'amount' => $row->amount,
						'dueDate'=> $row->due_date,
						'status' => $row->status,
						"$resource" => $rs
					);
				}
			} else {
				foreach($obj as $row) {
					$data['results'][] = array(
						'id' => $row->id,
						'number' => $row->number,
						'type' => $row->type,
						'amount' => $row->amount,
						'dueDate'=> $row->due_date,
						'status' => $row->status
					);
				}
			}
			
		}

		$this->response($data, 200);
	}

	// public function index_post() {
	// 	//
	// }

	// public function index_put($id = NULL) {
	// 	//
	// }
	
	// public function index_delete($id = NULL) {
	// 	//
	// }
}
