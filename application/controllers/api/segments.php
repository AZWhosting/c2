<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Segments extends REST_Controller {
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

	// get user information
	// @param: optional userId
	// return userdata
	function index_get() {
		$requested_data = $this->get("filter");
		$filters = $requested_data['filters'];
		$limit = $this->get('limit') ? $this->get('limit'): 50;
		$offset= $this->get('offset')? $this->get('offset'): null;

		$segments = new Segment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$segments->limit($limit, $offset);
		if(isset($filters)) {
			foreach($filters as $f) {
				$segments->where($f['field'], $f['value']);
			}	
		}
		$segments->get_iterated();
		foreach($segments as $seg) {
			$data[] = array(
						'id' 		=> intval($seg->id),
						'code_length' 	=> intval($seg->code_length),
						'name' 	=> $seg->name,
						'active'=> (bool) $seg->active,
						'created_at'=> $seg->created_at,
						'updated_at'=> $seg->updated_at
					);
		}

		$segments->flush_cache();
		if(isset($filters)) {
			foreach($filters as $f) {
				$segments->where($f['field'], $f['value']);
			}
		}
		$segments->get_iterated();
		if($segments->result_count() > 0) {
			$this->response(array('results'=>$data, 'count'=>$segments->result_count()), 200);
		} else {
			$this->response(array('results'=>$data, 'count'=>$segments->result_count()), 200);
		}
	}

	// update user information
	// @param: user data
	// return userdata
	function index_put() {
		$requested_data = json_decode($this->put('models'));
		foreach($requested_data as $d) {
			$Segments = new Segment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$Segments->where('id', $d->id)->get();

			$Segments->code_length = $d->code_length;
			$Segments->name = $d->name;
			$Segments->active = $d->active;
			if($Segments->save()) {
				$data[] = array(
					'id' 		=> intval($Segments->id),
					'code_length' 	=> $Segments->code_length,
					'name'   	=> $Segments->name,
					'active' => $Segments->active
				);
			}
		}
		if(count($data) > 0) {
			$this->response(array('msg'=>'good', 'results'=>$data, 'count'=> count($data)), 200);
		} else {
			$this->response(array('results'=>array(), 'count'=> 0), 200);
		}
	}

	// create user information
	// @param: user data
	// return userdata
	function index_post() {
		$requested_data = json_decode($this->post('models'));
		
		$Segments = new Segment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$Segments->get();
		if($Segments->result_count() >= 5) {
			$this->response(array('error'=>'You have reached the limit for segments.'), 200);
		} else {
			foreach($requested_data as $d) {
				$Segments = new Segment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$Segments->code_length = $d->code_length;
				$Segments->name = $d->name;
				if($Segments->save()) {
					$data[] = array(
						'id' 			=> intval($Segments->id),
						'code_length' 	=> $Segments->code_length,
						'name'   		=> $Segments->name,
						'created_at' 	=> $Segments->created_at,
						'updated_at' 	=> $Segments->updated_at
					);
				}
			}
			if(count($data) > 0) {
				$this->response(array('results'=>$data, 'count'=> count($data)), 201);
			} else {
				$this->response(array('results'=>array(), 'count'=> 0), 201);
			}
		}
	}

	// delete user information
	// @param: user data
	// return true: successful, false: failed
	function index_delete() {
		$requested_data = json_decode($this->delete('models'));
		$count = 0;
		foreach($requested_data as $d) {
			$Segments = new Segment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$Segments->where('id', $d->id)->get();
			$Segments->active = 'false';
			if($Segements->save()) {
				$count += 1;
			}
		}
		$this->response(array('msg'=>count($requested_data). 'sent '.$count. " deleted.", 'results'=>$array(), 'count'=> count($data)), 301);	
	}

	function items_get() {
		$requested_data = $this->get('filter');
		$filters = $requested_data['filters'];
		$limit = $this->get('limit') !== false ? $this->get('limit') : 100;
		$page = $this->get('page') !== false ? $this->get('page') : 1;

		$list = new Segmentlist(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$this->benchmark->mark('benchmark_start');
		if(isset($filters)) {			
			foreach($filters as $f) {
				$list->where($f['field'], $f['value']);
			}
		}
		$list->get_paged($page, $limit);	
		if($list->exists()) {
			foreach($list as $l) {
				$segment = $l->segment->get();
				$data[] = array(
					'id' => $l->id,
					'code'=> $l->code,
					'name'=> $l->name,
					'segment_id' => $l->segment_id,
					'segment' => array(
						'id' => $segment->id,
						'code_length' => $segment->code_length,
						'name' => $segment->name
					)
				);
			}
			$this->benchmark->mark('benchmark_end');
			$this->response(array('results'=>$data, 
								  'count'=>$list->paged->total_rows, 
								  'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')), 200);
		} else {
			$this->response(array('error'=>'no criteria.', 'msg' => 'no result found'), 200);
		}	
	}

	/* create new items for given segment
	* @param array segment and array items
	*/
	function items_post() {
		$requested_data = json_decode($this->post('models'));
		$data = [];
		$this->benchmark->mark('benchmark_start');
		foreach($requested_data as $d) {
			$Segment = new Segment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$item = new Segmentlist(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$Segment->where('id', $d->segment->id)->get();
			$item->code = $d->code;
			$item->name = $d->name;
			if($item->save($Segment)){
				$data[] = $item;
			}
		}
		if(count($data) > 0) {
			$this->benchmark->mark('benchmark_end');
			$this->response(array('results'=>$data, 
								  'count'=>count($data), 
								  'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')), 200);
		} else {
			$this->response(array('error'=>'no criteria.', 'msg' => 'no result found', 'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')), 200);
		}
	}

	function items_put() {
		$requested_data = json_decode($this->put('models'));
		$data = [];
		$this->benchmark->mark('benchmark_start');
		foreach($requested_data as $d) {
			$item = new Segmentlist(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$item->where('id', $d->id)->get();
			$item->code = $d->code;
			$item->name = $d->name;
			if($item->save()){
				$data[] = $item;
			}
		}
		if(count($data) > 0) {
			$this->benchmark->mark('benchmark_end');
			$this->response(array('results'=>$data, 
								  'count'=>count($data), 
								  'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')), 200);
		} else {
			$this->response(array('error'=>'no criteria.', 'msg' => 'no result found', 'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')), 200);
		}
	}

	function items_delete() {
		$requested_data = json_decode($this->delete('models'));

		foreach($requested_data as $d) {
			$item = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$item->where('id', $d->id)->get();
			$item->delete();
		}
	}
}
/* End of file users.php */
/* Location: ./application/controllers/api/users.php */