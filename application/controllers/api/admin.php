<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Admin extends REST_Controller {
	
	public $_database;
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		$institute = new Institute();
		$institute->where('id', $this->input->get_request_header('Entity'))->get();
		if($institute->exists()) {
			$conn = $institute->connection->get();
			// $this->entity = $conn->server_name;
			// $this->user = $conn->user;
			// $this->pwd = $conn->password;	
			$this->_database = $conn->inst_database;
		}
	}

	/* Login section *
	*  @param: username and password *
	*  for admin that could create new company *
	*/
	public function vendors_get() {
		$requested_data = $this->get('filter');
		$filters = $requested_data['filters'];
		$limit = $this->get('limit') !== false ? $this->get('limit') : 100;
		$page = $this->get('page') !== false ? $this->get('page') : 1;
		$data = array();

		$types = new Contact_type(null, $this->_database);
		$types->where('parent_id', 2)->get_iterated();

		foreach($types as $type) {
			$typeIds[] = $type->id;
		}
		
		$vendors = new Contact(null, $this->_database);
		$vendors->where_in('contact_type_id', $typeIds);
		$numberOfVendor = $vendors->count();
		$data[] =array('count'=>$numberOfVendor);
		$this->response(
			array(
				'error'=>'false',
				'results'=>$data,
				'msg' => 'no result found'),
			200);
	}

	public function customers_get() {
		$requested_data = $this->get('filter');
		$filters = $requested_data['filters'];
		$limit = $this->get('limit') !== false ? $this->get('limit') : 100;
		$page = $this->get('page') !== false ? $this->get('page') : 1;
		$data = array();

		$types = new Contact_type(null, $this->_database);
		$types->where('parent_id', 1)->get_iterated();

		foreach($types as $type) {
			$typeIds[] = $type->id;
		}
		
		$customers = new Contact(null, $this->_database);
		$customers->where_in('contact_type_id', $typeIds);
		$customers->where_in('status', array(0,1));
		$numberOfCust = $customers->count();
		$data[] =array('count'=>$numberOfCust);
		$this->response(
			array(
				'error'=>'false',
				'results'=>$data,
				'msg' => 'no result found'),
			200);
	}

	public function activeCustomers_get() {
		$requested_data = $this->get('filter');
		$filters = $requested_data['filters'];
		$limit = $this->get('limit') !== false ? $this->get('limit') : 100;
		$page = $this->get('page') !== false ? $this->get('page') : 1;
		$data = array();

		$types = new Contact_type(null, $this->_database);
		$types->where('parent_id', 1)->get_iterated();

		foreach($types as $type) {
			$typeIds[] = $type->id;
		}
		
		$customers = new Contact(null, $this->_database);
		$customers->where_in('contact_type_id', $typeIds);
		$customers->where_in('status', 1);
		$numberOfCust = $customers->count();
		$data[] =array('count'=>$numberOfCust);
		$this->response(
			array(
				'error'=>'false',
				'results'=>$data,
				'msg' => 'no result found'),
			200);
	}

	public function apaccounts_get() {
		$requested_data = $this->get('filter');
		$filters = $requested_data['filters'];
		$limit = $this->get('limit') !== false ? $this->get('limit') : 100;
		$page = $this->get('page') !== false ? $this->get('page') : 1;
		$data = array();
		$amount = 0;
		// 7, 13

		$types = new Account(null, $this->_database);
		$types->where('account_type_id', 7)->get_iterated();

		foreach($types as $type) {
			$typeIds[] = $type->id;
		}

		$entries = new Entry(null, $this->_database);
		$entries->where_in('account_id', $typeIds);
		$entries->get();

		if($entries->exists()) {
			foreach($entries as $entry) {
				if($entry->is_debit === 'false') {
					$amount -= $entry->amount;
				} else {
					$amount += $entry->amount;
				}				
			}
			$data[] = array('amount'=>$amount);
			$this->response(
				array(
					'error'=>'false',
					'results'=>$data,
					'count' => 0,
					'msg' => 'no result found'),
				200);
		} else {
			$this->response(
			array(
				'error'=>'false',
				'results'=>array(),
				'count' => 0,
				'msg' => 'no result found'),
			200);
		}
	}

	public function araccounts_get() {
		$requested_data = $this->get('filter');
		$filters = $requested_data['filters'];
		$limit = $this->get('limit') !== false ? $this->get('limit') : 100;
		$page = $this->get('page') !== false ? $this->get('page') : 1;
		$data = array();
		$amount = 0;
		// 7, 13

		$types = new Account(null, $this->_database);
		$types->where('account_type_id', 13)->get_iterated();

		foreach($types as $type) {
			$typeIds[] = $type->id;
		}

		$entries = new Entry(null, $this->_database);
		$entries->where_in('account_id', $typeIds);
		$entries->get();

		if($entries->exists()) {
			foreach($entries as $entry) {
				if($entry->is_debit === 'true') {
					$amount -= $entry->amount;
				} else {
					$amount += $entry->amount;
				}
			}
			$data[] = array('amount'=>$amount);
			$this->response(
				array(
					'error'=>'false',
					'results'=>$data,
					'count' => 0,
					'msg' => 'no result found'),
				200);
		} else {
			$this->response(
			array(
				'error'=>'false',
				'results'=>array(),
				'count' => 0,
				'msg' => 'no result found'),
			200);
		}
	}

	public function modules_get() {
		$requested_data = $this->get('filter');
		$filters = $requested_data['filters'];
		// $limit = $this->get('limit') !== NULL ? $this->get('limit') : 1;
		// $page= $this->get('page') !== NULL ? $this->get('page') : 1;
		$related = array();
		$data = array();
		$this->benchmark->mark('benchmark_start');
		$modules = new Module(NULL, NULL);
		if(isset($filters)) {
			foreach($filters as $f) {
				$modules->where($f['field'], $f['value']);
			}
		}
		// $modules->get_paged($page, $limit);
		$modules->where('is_core', 'false');
		$modules->get_paged(1, 20);
		if($modules->exists()) {
			foreach($modules as $mod) {	
				$data[] = array(
					'id' => $mod->id,
					'name' 	 => $mod->name,
					'href' => $mod->href,
					'image_url' => $mod->image_url,
					'coreProduct' => $mod->is_core === 'true' ? true : false,
					'description' => $mod->description
				);
			}
			$this->benchmark->mark('benchmark_end');
			$this->response(
				array(
					'error'=> FALSE, 
					'results'=> $data, 
					'msg' => 'no result found',
					'count' => $modules->paged->total_rows,
					'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')
				),
				200
			);
		} else {
			$this->benchmark->mark('benchmark_end');
			$this->response(
				array(
					'error'=> TRUE, 
					'results'=> array(), 
					'msg' => 'no result found',
					'count' => 0,
					'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')
				),
				200
			);
		}
	}

	public function modules_post() {
		$requested_data = json_decode($this->post('models'));
		$data = array();
		$modules = new Module();

		$this->benchmark->mark('benchmark_start');
		foreach($requested_data as $data) {
			$modules->name 	= $data->name;
			if($modules->save()) {
				$data[] = array(
					'id' 	=> $modules->id,
					'name' 	=> $modules->name
				);
			}
		}

		$this->benchmark->mark('benchmark_end');
		if(count($data) > 0) {
			$this->response(
				array(
					'error'=> FALSE, 
					'results'=> $data, 
					'msg' => 'no result found',
					'count' => count($data),
					'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')
				),
				200
			);
		} else {
			$this->response(
				array(
					'error'=> TRUE, 
					'results'=> array(), 
					'msg' => 'no result found',
					'count' => 0,
					'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')
				),
				200
			);
		}
	}

	public function modules_put() {}

	public function modules_delete() {}

	public function modules_institute_get() {
		$requested_data = $this->get('filter');
		$filters = $requested_data['filters'];
		// $limit = $this->get('limit') !== NULL ? $this->get('limit') : 1;
		// $page= $this->get('page') !== NULL ? $this->get('page') : 1;
		$related = array();
		$data = array();
		$this->benchmark->mark('benchmark_start');
		$institute = new Institute(NULL, NULL);
		if(isset($filters)) {
			foreach($filters as $f) {
				$institute->where($f['field'], $f['value']);
			}
		}
		// $modules->get_paged($page, $limit);
		$institute->get_paged(1, 20);
		if($institute->exists()) {
			foreach($institute as $mod) {
				$modules = $mod->module->include_join_fields()->get();
				foreach($modules as $m) {
					if($m->join_deletable === 'true') {
						$data[] = array(
							'id' => $m->id,
							'logo' => $m->image_url,
							'name' 	 => $m->name,
							'href' 	 => $m->href,
							'description' => $m->description,
							'core' => $m->is_core,
							'deletable' => TRUE
						);
					} else {
						$data[] = array(
							'id' => $m->id,
							'logo' => $m->image_url,
							'name' 	 => $m->name,
							'href' 	 => $m->href,
							'description' => $m->description,
							'core' => $m->is_core,
							'deletable' 	 => FALSE
						);
					}
				}	
				
			}
			$this->benchmark->mark('benchmark_end');
			$this->response(
				array(
					'error'=> FALSE, 
					'results'=> $data, 
					'msg' => 'no result found',
					'count' => count($data),
					'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')
				),
				200
			);
		} else {
			$this->benchmark->mark('benchmark_end');
			$this->response(
				array(
					'error'=> TRUE, 
					'results'=> array(), 
					'msg' => 'no result found',
					'count' => 0,
					'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')
				),
				200
			);
		}
	}

	public function modules_institute_post() {
		$requested_data = json_decode($this->post('models'));
		$data = array();
		foreach($requested_data as $data) {
			$module = new Module();
			$module->where('id', $data->moduleId)->get();
			$institute = new Institute();
			$institute->where('id', $data->instId)->get();
			if($data->save) {
				if($institute->save($module)) {			
				}
			} else {
				if($institute->delete($module)) {
					$logins = $module->login->get();
					$module->delete($logins->all);
				}
			}
		}
		if(count($data) > 0) {
			$this->response(array(
				'error' => false,
				'results' => $data,
				'count' => 1
				), 201);
		} else {
			$this->response(array(
				'error' => true,
				'results' => array(),
				'count' => 0
				), 200);
		}			
	}

	public function modules_institute_delete() {
		$requested_data = json_decode($this->post('models'));
		$data = array();
		// foreach($requested_data as $data) {
		// 	$module = new Module();
		// 	$module->where('id', $data->moduleId)->get();
		// 	$institute = new Institute();
		// 	$institute->where('id', $data->instId)->get();

		// 	if($institute->save($module)) {
		// 		$data[] = array('moduleId' => $data->moduleId); 			
		// 	}
		// }
		// if(count($data) > 0) {
		// 	$this->response(array(
		// 		'error' => false,
		// 		'results' => $data,
		// 		'count' => 1
		// 		), 201);
		// } else {
			$this->response(array(
				'error' => true,
				'results' => $requested_data,
				'count' => 0
				), 200);
		// }			
	}

	public function modules_users_get() {
		$requested_data = $this->get('filter');
		$filters = $requested_data['filters'];
		// $limit = $this->get('limit') !== NULL ? $this->get('limit') : 1;
		// $page= $this->get('page') !== NULL ? $this->get('page') : 1;
		$related = array();
		$data = array();
		$this->benchmark->mark('benchmark_start');
		$contact = new Login(NULL, NULL);
		if(isset($filters)) {
			foreach($filters as $f) {
				$contact->where($f['field'], $f['value']);
			}
		}
		// $modules->get_paged($page, $limit);
		$contact->get_paged(1, 20);
		if($contact->exists()) {
			foreach($contact as $c) {
				$modules = $c->module->include_join_fields()->get();
				foreach($modules as $m) {
					if($m->join_used === 'true') {
						$data[] = array(
							'id' => $m->join_id,
							'moduleId' => $m->id,
							'userId' => $c->id,
							'name' 	 => $m->name
						);
					} else {
						$data[] = array(
							'id' => $m->join_id,
							'moduleId' => $m->id,
							'userId' => $c->id,
							'name' 	 => $m->name
						);
					}
				}	
				
			}
			$this->benchmark->mark('benchmark_end');
			$this->response(
				array(
					'error'=> FALSE, 
					'results'=> $data, 
					'msg' => 'no result found',
					'count' => count($data),
					'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')
				),
				200
			);
		} else {
			$this->benchmark->mark('benchmark_end');
			$this->response(
				array(
					'error'=> TRUE, 
					'results'=> array(), 
					'msg' => 'no result found',
					'count' => 0,
					'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')
				),
				200
			);
		}
	}

	public function modules_users_post() {
		$requested_data = json_decode($this->post('models'));
		$data = array();
		foreach($requested_data as $data) {
			$module = new Module();
			$module->where('id', $data->moduleId)->get();
			$login = new Login();
			$login->where('id', $data->userId)->get();
			if($data->save) {
				if($login->save($module)) {	
					$res[] = array(
						'id' => $data->id,
						'moduleId' => $data->id,
						'userId' => $data->id,
						'name' 	 => $data->name
					);		
				}
			} elseif(!$data->save) {
				if($login->delete($module)) {
					$res[] = array(
						'id' => $data->id,
						'moduleId' => $data->id,
						'userId' => $data->id,
						'name' 	 => $data->name
					);
				}
			}
		}
		if(count($res) > 0) {
			$this->response(array(
				'error' => false,
				'results' => $res,
				'count' => 1
				), 201);
		} else {
			$this->response(array(
				'error' => true,
				'results' => array(),
				'count' => 0
				), 200);
		}
	}

	public function modules_users_delete() {
		$requested_data = json_decode($this->delete('models'));
		// $data = array();
		// foreach($requested_data as $data) {
		// 	$module = new Module();
		// 	$module->where('id', $data->moduleId)->get();
		// 	$institute = new Institute();
		// 	$institute->where('id', $data->instId)->get();

		// 	if($institute->delete($module)) {
		// 		$data[] = array('moduleId' => $data->moduleId); 			
		// 	}
		// }
		// if(count($data) > 0) {
		// 	$this->response(array(
		// 		'error' => false,
		// 		'results' => $data,
		// 		'count' => 1
		// 		), 201);
		// } else {
			$this->response(array(
				'error' => true,
				'results' => $requested_data,
				'count' => 0
				), 200);
		// }	
	}

	public function allowed_get() {
		$requested_data = $this->get('filter');
		$filters = $requested_data['filters'];
		// $limit = $this->get('limit') !== NULL ? $this->get('limit') : 1;
		// $page= $this->get('page') !== NULL ? $this->get('page') : 1;
		$related = array();
		$data = array();
		$this->benchmark->mark('benchmark_start');
		$contact = new Login(NULL, NULL);
		if(isset($filters)) {
			foreach($filters as $f) {
				$contact->where($f['field'], $f['value']);
			}
		}
		// $modules->get_paged($page, $limit);
		$contact->get_paged(1, 20);
		if($contact->exists()) {
			foreach($contact as $c) {
				$modules = $c->module->include_join_fields()->get();

				foreach($modules as $m) {
					if($m->join_used === 'true') {
						$module[] = array(
							'moduleId' => $m->id,
							'name' 	 => $m->name
						);
					} else {
						$module[] = array(
							'moduleId' => $m->id,
							'name' 	 => $m->name
						);
					}
				}	
				$data = array(
					'id' => $c->id,
					'firstName' => $c->name,
					'lastName'  => $c->surname,
					'modules'   => $module
				);
			}
			$this->benchmark->mark('benchmark_end');
			$this->response(
				array(
					'error'=> FALSE, 
					'results'=> array($data), 
					'msg' => 'result found',
					'count' => count($data),
					'generatedIn'=>floatval($this->benchmark->elapsed_time('benchmark_start', 'benchmark_end'))
				),
				200
			);
		} else {
			$this->benchmark->mark('benchmark_end');
			$this->response(
				array(
					'error'=> TRUE, 
					'results'=> array(), 
					'msg' => 'no result found',
					'count' => 0,
					'generatedIn'=>floatval($this->benchmark->elapsed_time('benchmark_start', 'benchmark_end'))
				),
				200
			);
		}
	}

	private function _encrypt($data) {
		$addSalt = $data . $this->config->item('encryption_key');;
		return hash('sha256', $addSalt);
	}
}
