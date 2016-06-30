<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Connections extends REST_Controller {
	public $entity;
	public $host;
	public $user;
	public $pwd;
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
	}

	//GET 
	function index_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data = array();

		$connections = new Connection();
		if(isset($filters)) {
			foreach($filters as $filter) {
				$connections->where($filter['field'], $filter['value']);
			}
		}
		$connections->get();
		if($connections->exists()) {
			foreach($connections as $conn) {
				$data[] = array(
					'id' => $conn->id,
					'institute' => $conn->institute_id,
					'dbServer' => $conn->server_name,
					'dbUser' => $conn->username,
					'dbPwd' => '***********',
					'dbName' => $conn->inst_database
				);
			}
		}

		if(count($data) > 0) {
			$this->response(array('error' => FALSE, 'results'=> $data, 'count'=>count($data)), 200);
		} else {
			$this->response(array('error' => TRUE, 'results'=> array(), 'count'=>0), 200);
		}			
	}
	
	//POST
	function index_post() {
		$models = json_decode($this->post('models'));

		foreach($models as $model) {
			$connection = new Connection();
			$connection->where('institute_id', $model->institute)->get();
			if($connection->exists()) {
				$this->response(array('error' => TRUE, 'msg'=>'existed', 'results'=> array(), 'count'=>0), 200);
				break;
			} else {
				$connection->institute_id = $model->institute;
				$connection->server_name  = $model->dbServer;
				$connection->username 	  = $model->dbUser;
				$connection->password     = $model->dbPwd;
				$connection->inst_database= $model->dbName;
				if($connection->save()) {
					$data[] = array(
					'id' => $connection->id,
					'institute' => $connection->institute_id,
					'dbServer' => $connection->server_name,
					'dbUser' => $connection->username,
					'dbPwd' => '***********',
					'dbName' => $connection->inst_database
				);
					$this->response(array('error' => FALSE, 'msg'=>'Created', 'results'=> $data, 'count'=>count($data)), 201);
					break;
				} else {
					$this->response(array('error' => TRUE, 'msg'=>'error creating', 'results'=> array(), 'count'=>0), 200);
					break;
				}
			}
		}
	}
	
	//PUT
	function index_put() {
		$models = json_decode($this->put('models'));
		
		foreach($models as $model) {
			$connection = new Connection();
			$connection->where('institute_id', $model->institute)->get();
			if($connection->exists()) {
				$connection->server_name  = $model->dbServer;
				$connection->username 	  = $model->dbUser;
				$connection->password     = $model->dbPwd;
				$connection->inst_database= $model->dbName;
				if($connection->save()) {
					$data[] = array(
						'id' => $connection->id,
						'institute' => $connection->institute_id,
						'dbServer' => $connection->server_name,
						'dbUser' => $connection->username,
						'dbPwd' => '***********',
						'dbName' => $connection->inst_database
					);
					$this->response(array('error' => FALSE, 'msg'=>'Updated', 'results'=> $data, 'count'=>count($data)), 201);
					break;
				}
			} else {
				$this->response(array('error' => TRUE, 'msg'=>'error updated', 'results'=> array(), 'count'=>0), 200);
				break;
			}
		}
	}
	
	//DELETE
	function index_delete() {
		$models = json_decode($this->delete('models'));

		foreach($models as $model) {
			$connection = new Connection();
			$connection->where('institute_id', $model->institute)->get();
			if($connection->exists()) {
				if($connection->delete()) {
					$data[] = array(
						'id' => $model->id,
						'institute' => $model->institute,
						'dbServer' => $model->dbServer,
						'dbUser' => $model->dbUser,
						'dbPwd' => '***********',
						'dbName' => $model->dbName
					);
					$this->response(array('error' => FALSE, 'msg'=>'Deleted', 'results'=> $data, 'count'=>count($data)), 201);
					break;
				}
			} else {
				$this->response(array('error' => TRUE, 'msg'=>'error deleting', 'results'=> array(), 'count'=>0), 200);
				break;
			}
		}
	}		
}

/* End of file contacts.php */
/* Location: ./application/controllers/api/contacts.php */