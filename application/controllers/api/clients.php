<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Clients extends REST_Controller {

	public $entity;
	public $institute;
	function __construct() {
		parent::__construct();
		$this->institute = $this->input->get_request_header('Institute');
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

	public function index_options() {
		header('Allow-Access-Control-Headers: Institute');
	}

	// get user information
	// @param: optional userId
	// return userdata
	function index_get() {
		$requested_data = $this->get("filter");
		// $filters = $requested_data['filters'];
		$limit = $this->get('limit') ? $this->get('limit'): 50;
		$offset= $this->get('offset')? $this->get('offset'): 0;
		$data = array();
		$clients = new Client();

		$clients->get_paged($offset, $limit);
		foreach($clients as $client) {
			$data[] = array(
				'id' 		=> $client->uid,
				'name' 		=> $client->name,
				'summary'	=> $client->summary,
				'description' => $client->description
			);
		}

		if(count($data) > 0) {
			$this->response(array('results'=>$data, 'count'=>$clients->paged->total_rows), 200);
		} else {
			$this->response(array('results'=>$data, 'count'=>0), 200);
		}
	}

	function access_get() {
		$requested_data = $this->get("filter");
		// $filters = $requested_data['filters'];
		$limit = $this->get('limit') ? $this->get('limit'): 50;
		$offset= $this->get('offset')? $this->get('offset'): 0;
		$data = array();
		$instutite = new Institute();

		$instutite->where('id', $this->institute);
		$instutite->get();
		foreach($instutite as $inst) {
			$clients = $inst->client->include_join_fields()->get();
			
			foreach($clients as $client) {
				$data[] = array(
					'id' => $client->join_id,
					'clientId' 			=> $client->uid,
					'name' 			=> $client->name,
					'summary'		=> $client->summary,
					'description' 	=> $client->description,
					'status' 		=> $client->join_status,
					'instutite'		=> array(
										'id' => $inst->id,
										'name' => $inst->name
									)
				);
			}
			
		}

		if(count($data) > 0) {
			$this->response(array('results'=>$data), 200);
		} else {
			$this->response(array('results'=>$data, 'count'=>0), 200);
		}
	}

	function access_post() {
		$models = json_decode($this->post('models'));
		$data = array();
		foreach($models as $model) {
			$client = new Client();
			$institute = new Institute();

			$client->where('uid', $model->clientId)->get();

			$institute->where('id', $model->institute->id)->get();

			if($client->save($institute)) {
				$data[] = array(
					'clientId' => $client->uid
				);
			}
		}
		$this->response(array('msg'=> 'client added', 'results' => $data), 201);
	}

	function access_delete() {
		$models = json_decode($this->delete('models'));
		$data = array();
		foreach($models as $model) {
			$client = new Client();
			$institute = new Institute();

			$client->where('uid', $model->clientId)->get();

			$institute->where('id', $model->instutite->id)->get();

			if($client->delete($institute)){
				$data[] = array(
					'clientId' => $client->uid
				);
			}
		}

		if(count($data) > 0) {
			$this->response(array('msg'=> 'client added', 'results' => $data), 200);
		} else {
			$this->response(array('msg'=> 'error removing', 'results' => []), 500);
		}
	}
}
/* End of file users.php */
/* Location: ./application/controllers/api/users.php */
