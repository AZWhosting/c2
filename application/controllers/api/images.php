<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Images extends REST_Controller {

	public $entity;
	function __construct() {
		parent::__construct();
		// $institute = new Institute();
		// $institute->where('name', $this->input->get_request_header('Entity'))->get();
		// if($institute->exists()) {
		// 	$conn = $institute->connection->get();
		// 	// $this->entity = $conn->server_name;
		// 	// $this->user = $conn->user;
		// 	// $this->pwd = $conn->password;
		// 	$this->entity = $conn->inst_database;
		// }
	}

	// get user information
	// @param: optional userId
	// return userdata
	function index_get() {
		$requested_data = $this->get("filter");
		$filters = $requested_data['filters'];
		$limit = $this->get('limit') ? $this->get('limit'): 50;
		$offset= $this->get('offset')? $this->get('offset'): null;
		$data = array();
		$images = new Pimage();

		if(isset($filters)) {
			foreach($filters as $f) {
				$images->where($f['field'], $f['value']);				
			}
		}

		$images->get_paged($offset, $limit);
		foreach($images as $i) {
			$data[] = array(
				'id' 	=> $i->id,
				'url' 	=> $i->url,
				'name' 	=> $i->name,
				'key' 	=> $i->key,
				'type' 	=> $i->type,
				'size' 	=> $i->size,
				'created_at' => $i->created_at
			);
		}

		if(count($images) > 0) {
			$this->response(array('results'=>$data, 'count'=>$images->paged->total_rows), 200);
		} else {
			$this->response(array('results'=>$data, 'count'=>0), 200);
		}
	}

	// update user information
	// @param: user data
	// return userdata
	function index_put() {
		$requested_data = json_decode($this->put('models'));
		$data = array();
		foreach($requested_data as $req) {
			$image = new Pimage();
			$image->where('id', $date->id)->get();
			$image->url 	= $data->url;
			$image->name 	= $data->name;
			$image->key 	= $data->key;
			$image->type 	= $data->type;
			$image->size 	= $data->size;
			if($image->save()) {
				$data[] = array(
					'id' 		 => $image->id,
					'url' 		 => $image->url,
					'name' 		 => $image->name,
					'key' 		 => $image->key,
					'type' 	 	 => $image->type,
					'size' 		 => $image->size,
					'created_at' => $image->created_at,
					'updated_at' => $image->updated_at
				);
			}
		}
		if(count($data) > 0) {
			$this->response(array('results'=>$data, 'count'=> count($data)), 201);
		} else {
			$this->response(array('results'=>array(), 'count'=> 0), 200);
		}
	}

	// create user information
	// @param: user data
	// return userdata
	function index_post() {
		$requested_data = json_decode($this->post('models'));
		foreach($requested_data as $req) {
			$image = new Pimage();
			$image->url 	= $req->url;
			$image->name 	= $req->name;
			$image->key 	= $req->key;
			$image->type 	= $req->type;
			$image->size 	= $req->size;
			if($image->save()) {
				$data[] = array(
					'id' 		 => $image->id,
					'url' 		 => $image->url,
					'name' 		 => $image->name,
					'key' 		 => $image->key,
					'type' 	 	 => $image->type,
					'size' 		 => $image->size,
					'created_at' => $image->created_at,
					'updated_at' => $image->updated_at
				);
			}
		}
		if(count($data) > 0) {
			$this->response(array('results'=>$data, 'count'=> count($data)), 201);
		} else {
			$this->response(array('results'=>array(), 'count'=> 0), 201);
		}
	}

	// delete user information
	// @param: user data
	// return true: successful, false: failed
	function index_delete() {
		$requested_data = json_decode($this->delete('models'));
		$data = array();
		foreach($requested_data as $req) {
			if($req->id >2) {
				$image = new Pimage();
				$image->where('id', $req->id)->get();
				$image->url 	= $req->url;
				$image->name 	= $req->name;
				$image->key 	= $req->key;
				$image->type 	= $req->type;
				$image->size 	= $req->size;
				if($image->delete()) {
					$data[] = array(
						'id' 		 => $image->id,
						'url' 		 => $image->url,
						'name' 		 => $image->name,
						'key' 		 => $image->key,
						'type' 	 	 => $image->type,
						'size' 		 => $image->size,
						'created_at' => $image->created_at,
						'updated_at' => $image->updated_at
					);
				}
			}				
		}
		if(count($data) > 0) {
			$this->response(array('results'=>$data, 'count'=> count($data)), 201);
		} else {
			$this->response(array('results'=>array(), 'count'=> 0), 201);
		}
	}
}
/* End of file users.php */
/* Location: ./application/controllers/api/users.php */
