<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Roles extends REST_Controller {
	public $entity;
	public $host;
	public $user;
	public $pwd;
	function __construct() {
		parent::__construct();
		$institute = new Institute();
		$institute->where('id', $this->input->get_request_header('Entity'))->get();
		if($institute->exists()) {
			$conn = $institute->connection->get();
			$this->host = $conn->server_name;
			$this->user = $conn->username;
			$this->pwd = $conn->password;	
			$this->entity = $conn->inst_database;
		}
	}

	/*
	* get role(s) based on filter, limit and offset
	* param filter, limit, offset
	*/
	function index_get() {
		$filter = $this->get('filter')?$this->get('filter'): null;
		$limit = $this->get('limit');
		$offset = $this->get('offset')?$this->get('offset'):0;
		
		$role = new Role(null, $this->host, $this->user, $this->pwd, $this->entity);
		$role->get();
		foreach($role as $r) {
			$data[] = array(
				'id' => $r->id,
				'name'=>$r->name,
				'description'=>$r->description,
				'system' => $r->is_system === "1" ? TRUE:FALSE
			);
		}
		if(count($data) > 0) {
			$this->response(array('results'=>$data), 200);
		} else {
			$this->response(array('results'=>array()), 200);
		}
		// $this->response(array('host'=>$this->host), 200);
	}

	/* 
	* create new role
	*/
	function index_post() {
		$models = json_decode($this->post('models'));

		$r = new Role(null, $this->host, $this->user, $this->pwd, $this->entity);
		foreach($models as $model) {
			$r->name = $model->name;
			$r->description = $model->description;
			if($r->save()) {
				$data[] = array(
					'id' => $r->id,
					'name'=>$r->name,
					'description'=>$r->description
				);
			}
		}
		if(count($data) > 0) {
			$this->response(array('results'=>$data), 201);
		} else {
			$this->response(array('results'=>array()), 200);
		}
	}

	/*
	* update existing role
	* param: role Id and name
	*/
	function index_put() {
		$models = json_decode($this->put('models'));

		$r = new Role(null, $this->host, $this->user, $this->pwd, $this->entity);
		foreach($models as $model) {
			$r->where('id', $model->id)->get();
			if($r->exists()) {
				$r->name = $model->name;
				$r->description = $model->description;
				if($r->save()) {
					$data[] = array(
						'id' => $r->id,
						'name'=>$r->name,
						'description'=>$r->description
					);
				}
			}				
		}
		if(count($data) > 0) {
			$this->response(array('results'=>$data), 201);
		} else {
			$this->response(array('results'=>array()), 200);
		}
	}

	function index_delete() {
		$models = json_decode($this->delete('models'));

		$r = new Role(null, $this->host, $this->user, $this->pwd, $this->entity);
		foreach($models as $model) {
			$r->where('id', $model->id)->get();
			if($r->exists()) {
				if($r->is_system !== "1") {
					if($r->delete()) {
						$data[] = array(
							'id' => $r->id,
							'name'=>$r->name,
							'description'=>$r->description
						);
					}
				}
			}				
		}
		if(count($data) > 0) {
			$this->response(array('results'=>$data), 201);
		} else {
			$this->response(array('results'=>$model), 200);
		}
	}

	// get all users in this role
	// param: role id
	function user_get() {
		$filter = $this->get('filter')?$this->get('filter'): null;
		$limit = $this->get('limit');
		$offset = $this->get('offset')?$this->get('offset'):0;

		$roles = new Role(null, $this->entity);
		foreach($filter['filters'] as $f) {
			$roles->where($f['field'], $f['value']);
		}
		$users = $roles->user->get_raw();
		$data[] = $users->result(); 
		$this->response(array('results'=>$data), 200);
	}

	// assign user to a role
	function user_post() {
		$model = json_decode($this->post('models'));
		foreach($model as $d) {
			$user = new User(null, $this->entity);
			$user->where('id', $d->user);
			$user->get();

			$role = new Role(null, $this->entity);
			$role->where('id', $d->role);
			$role->get();

			if($user->exists() && $role->exists()) {
				if($user->save($role)){
					$this->response(array('msg'=>'assigned'), 201);
				}
			}
			// $this->response(array('user'=>$user->id), 201);
		}
		// $this->response(array('user'=>$model[0]->user), 201);
	}

	// update user role
	function user_put() {
		$model = json_decode($this->put('models'));
		foreach($model as $d) {
			$user = new User(null, $this->entity);
			$user->where('id', $d->user);
			$user->get();

			$role = new Role(null, $this->entity);
			$role->where('id', $d->role);
			$role->get();

			if($user->exists() && $role->exists()) {
				$user->set_join_field($role, 'role_id', $d->role);
				if($user->save($role)){
					$this->response(array('msg'=>'assigned'), 201);
				}
			}
			// $this->response(array('user'=>$user->id), 201);
		}
		// $this->response(array('user'=>$model[0]->user), 201);
	}

	// remove user from role
	function user_delete() {
		$model = json_decode($this->delete('models'));
	}
}

/* End of file auth.php */
/* Location: ./application/controller/api/role.php */