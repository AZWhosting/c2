<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Employees extends REST_Controller {
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

	public function index_get() {
		$requested_data = $this->get('filter');
		$filters = $requested_data['filters'];
		$limit = $this->get('limit') !== false ? $this->get('limit') : 100;
		$page = $this->get('page') !== false ? $this->get('page') : 1;
		$data = array();

		$types = new Contact_type(null, null, null, null, $this->_database);
		$types->where('parent_id', 3)->get();
		$ctype = array();
		foreach($types as $type) {
			$ctype[] = $type->id;
		}
		$employees = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$employees->where_in('contact_type_id', $ctype);
		$employees->where('deleted', 0);


		$this->benchmark->mark('benchmark_start');
		
		if(isset($filters)) {
			foreach($filters as $f) {
				if(isset($f['operator'])) {
					if($f['operator'] === 'or') {
						$employees->or_like($f['field'], $f['value'], 'before');
					} elseif($f['operator'] === 'and') {
						$employees->where($f['field'], $f['value']);
					} elseif($f['operator'] === 'like'){
						$employees->like($f['field'], $f['value'], 'before');
					}
				} else {
					$employees->where($f['field'], $f['value']);
				}	
			}
		}
		$employees->get_paged($page, $limit);
		if($employees->exists()) {
			foreach($employees as $row) {
				$role = $row->contact_type->get();
				$data[] = array(
					'id' => $row->id,
					'name' => $row->name,
					'gender' => $row->gender,
					'dob' => $row->dob,
					'phone' => $row->phone,
					'email' => $row->email,
					'user_id' => $row->user_id,
					'address' => $row->address,
					'status' => $row->status,
					'role'    => $role->exists() ? array('id'=> $role->id, 'name'=>$role->name, 'abbr' => $role->abbr) : array()
				);
			}
			$this->benchmark->mark('benchmark_end');
			$this->response(
				array(
					'results'=>$data, 
					'msg' => 'result found',
					'count'=>$employees->paged->total_rows, 
					'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')
					),
				200
			);
		} else {
			$this->response(
				array(
					'error'=>'no result.', 
					'msg' => 'no result found', 
					'generatedIn'=> $this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')
				),
				200
			);
		}
	}

	public function index_post() {
		$requested_data = json_decode($this->post('models'));
		$data = array();
		$this->benchmark->mark('benchmark_start');
		foreach($requested_data as $res) {
			$employees = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$employees->name 		= $res->name;
			$employees->gender 		= $res->gender;
			$employees->contact_type_id = $res->role->id;
			$employees->status = $res->status;

			if($employees->save()) {
				$data[] = array(
					'id' => $employees->id,
					'name' => $employees->name,
					'status' => $employees->status,
					'role' => $res->role
				);
			}
		}
		
		$this->benchmark->mark('benchmark_end');
		if(count($data) > 0) {
			$this->response(array('results'=>$data, 'msg' => 'result found', 'count'=>count($data), 'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')), 201);
		} else {
			$this->response(array('results'=>array(), 'msg' => 'no result found', 'count'=>0, 'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')), 200);
		}
	}

	public function index_put() {
		$requested_data = json_decode($this->put('models'));
		$data = array();
		$this->benchmark->mark('benchmark_start');
		foreach($requested_data as $res) {
			$employees = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$employees->where('id', $res->id)->get();
			$employees->name 		= $res->name;
			$employees->gender 		= $res->gender;
			$employees->contact_type_id = $res->role->id;
			$employees->status = $res->status;

			if($employees->save()) {
				$data[] = array(
					'id' => $employees->id,
					'name' => $employees->name,
					'status' => $employees->status,
					'role' => $res->role
				);
			}
		}
		
		$this->benchmark->mark('benchmark_end');
		if(count($data) > 0) {
			$this->response(array('results'=>$data, 'msg' => 'result found', 'count'=>count($data), 'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')), 200);
		} else {
			$this->response(array('results'=>array(), 'msg' => 'no result found', 'count'=>0, 'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')), 200);
		}
	}

	public function index_delete() {
		$requested_data = json_decode($this->delete('models'));
		$data = array();
		$this->benchmark->mark('benchmark_start');
		$count = 0;
		foreach($requested_data as $res) {
			$employees = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$employees->where('id', $res->id)->get();
			$employees->deleted = 1;

			if($employees->save()) {
				$count++;
			}
		}
		
		$this->benchmark->mark('benchmark_end');
		if(count($data) > 0) {
			$this->response(array('results'=>array(), 'msg' => $count .' affected.', 'count'=>$count, 'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')), 201);
		} else {
			$this->response(array('results'=>array(), 'msg' => 'no result found', 'count'=>0, 'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')), 200);
		}
	}
	public function roles_get() {
		$requested_data = $this->get('filter');
		$filters = $requested_data['filters'];
		$limit = $this->get('limit') !== false ? $this->get('limit') : 100;
		$page = $this->get('page') !== false ? $this->get('page') : 1;
		$data = array();

		$types = new Contact_type(null, null, null, null, $this->_database);
		$types->where('parent_id', 3)->get();

		if($types->exists()) {
			foreach($types as $row) {
				$data[] = array(
					'id' => $row->id,
					'name' => $row->name
				);
			}
			$this->benchmark->mark('benchmark_end');
			$this->response(
				array(
					'results'=>$data, 
					'msg' => 'result found',
					'count'=> count($types), 
					'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')
					),
				200
			);
		} else {
			$this->response(
				array(
					'error'=>'no result.', 
					'msg' => 'no result found', 
					'generatedIn'=> $this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')
				),
				200
			);
		}
	}
}