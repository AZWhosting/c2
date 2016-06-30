<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Businesstypes extends REST_Controller {
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
		
		$banks = new Business_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

		if(isset($filters)) {
			foreach($filters as $f) {
				if($f['operator'] === 'or') {
					$banks->or_where($f['field'], $f['value']);
				} elseif($f['operator'] === 'and') {
					$banks->where($f['field'], $f['value']);
				} elseif($f['operator'] === 'or_like'){
					$banks->or_like($f['field'], $f['value'], 'before');
				} elseif($f['operator'] === 'like'){
					$banks->like($f['field'], $f['value']);
				}else {
					$banks->where($f['field'], $f['value']);
				}
				
			}
			$this->benchmark->mark('benchmark_start');
			$banks->get_paged($page, $limit);
			foreach($banks as $row) {
				$data[] = array(
					'id' => $row->id,
					'type' => $row->type,
					'country'=> $row->country,
					'created_at' => $row->created_at,
					'updated_at' => $row->updated
				);
			}
			if(count($data) > 0) {
				$this->benchmark->mark('benchmark_end');
				$this->response(array('results'=>$data, 'msg' => 'result found', 'count'=>$banks->paged->total_rows, 'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')), 200);
			} else {
				$this->response(array('error'=>'no criteria.', 'msg' => 'no result found'), 200);
			}
		} else {
			$this->benchmark->mark('benchmark_start');
			$banks->get_paged($page, $limit);
			foreach($banks as $row) {
				$data[] = array(
					'id' => $row->id,
					'type' => $row->type,
					'country'=> $row->country,
					'created_at' => $row->created_at,
					'updated_at' => $row->updated
				);
			}
			if(count($data) > 0) {
				$this->benchmark->mark('benchmark_end');
				$this->response(array('results'=>$data, 'msg' => 'result found', 'count'=>$banks->paged->total_rows, 'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')), 200);
			} else {
				$this->response(array('error'=>'no result.', 'msg' => 'no result found'), 200);
			}
		}
	}	

	public function index_post() {
		$requested_data = json_decode($this->post('models'));
		$data = array();
		$this->benchmark->mark('benchmark_start');
		foreach($requested_data as $res) {
			$bank = new Bank(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$bank->name = $res->name;
			$bank->swift_code = $res->swift_code;
			if($bank->save()) {
				$data[] = array(
					'id' => $bank->id,
					'name' => $bank->name,
					'swift_code'=> $bank->swift_code,
					'created_at' => $bank->created_at,
					'updated_at' => $bank->updated
				);
			}
		}
		$this->benchmark->mark('benchmark_end');
		if(count($data) > 0) {
			$this->response(array('results'=>$data, 'msg' => 'result found', 'count'=>count($data), 'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')), 201);
		} else {
			$this->response(array('error'=>'no result.', 'msg' => 'no result found', 'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')), 200);
		}
	}

	public function index_put() {
		$requested_data = json_decode($this->put('models'));
		$data = array();
		$this->benchmark->mark('benchmark_start');
		foreach($requested_data as $res) {
			$bank = new Bank(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$bank->where('id', $res->id)->get();
			$bank->name = $res->name;
			$bank->swift_code= $res->swift_code;

			if($bank->save()) {
				$data[] = array(
					'id' => $bank->id,
					'name' => $bank->name,
					'swift_code'=> $bank->swift_code,
					'created_at' => $bank->created_at,
					'updated_at' => $bank->updated
				);
			}
		}
		$this->benchmark->mark('benchmark_end');
		if(count($data) > 0) {
			$this->response(array('results'=>$data, 'msg' => 'result found', 'count'=>count($data), 'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')), 201);
		} else {
			$this->response(array('error'=>'no result.', 'msg' => 'no result found', 'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')), 200);
		}
	}

	public function index_delete() {
		$requested_data = json_decode($this->delete('models'));
		$data = array();
		$this->benchmark->mark('benchmark_start');
		foreach($requested_data as $res) {
			$bank = new Bank(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$bank->where('id', $res->id)->get();
			$bank->deleted = 'true';

			if($bank->save()) {
				$data[] = array(
					'id' => $bank->id,
					'name' => $bank->name,
					'swift_code'=> $bank->swift_code,
					'created_at' => $bank->created_at,
					'updated_at' => $bank->updated
				);
			}
		}
		$this->benchmark->mark('benchmark_end');
		if(count($data) > 0) {
			$this->response(array('results'=>$data, 'msg' => count($data).' record(s) deleted.', 'count'=>count($data), 'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')), 201);
		} else {
			$this->response(array('error'=>'no result.', 'msg' => 'no result found', 'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')), 200);
		}
	} 

}//End Of Class