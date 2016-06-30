<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

/* for creating and editing company and their database */

class Tenants extends REST_Controller {
	
	function __construct() {
		parent::__construct();	
	}


	public function index_get() {
		$filter = json_decode($this->get('filter'));
		$limit = $this->get('limit');
		$offset= $this->get('offset');
		if(isset($filter)) {
			foreach($filter->filters as $v) {
				if(isset($v->operator) && $v->operator === 'like') {
					$this->db->like($v->field, $v->value);
				}
				if(isset($v->operator) && $v->operator === 'or_like') {
					$this->db->or_like($v->field, $v->value);
				}
				if(isset($v->operator) && $v->operator === 'where_in') {
					$this->db->where_in($v->field, $v->value);
				}
				if(isset($v->operator) && $v->operator === 'having') {
					$this->db->having($v->field, $v->value);
				}
				if(isset($v->operator)) {
					$this->db->where($v->field, $v->value);
				}
			}
		}
			
		$this->db->limit($limit, $offset);
		$query = $this->db->get('tenants');
		foreach($query->result() as $t) {
			$data[] = array(
				'id' => (int) $t->id,
				'name' => $t->name,
				'db_host' => $t->db_host,
				'db_user' => $t->db_user,
				'db_password' => $t->db_password,
				'db_port' => $t->db_port,
				'is_active'=> (bool)$t->is_active
			);
		}
		$this->response(array('results'=>$data, 'count'=>1), 200);
	}

	public function index_post() {
		// decode data sent from client back to php array for processing
		$posted = json_decode($this->post('models'));
		$this->load->dbforge();
		foreach($posted as $c) {
			$this->db->insert('tenants', array(
				'name'=>$c->name,
				'db_host'=>$c->db_host,
				'db_user'=>$c->db_user,
				'db_password'=>$c->db_password,
				'db_port'=>$c->db_port,
				'is_active'=>$c->is_active,
				'created_at' => date("y-m-d"),
				'updated_at' => date("y-m-d")
			));
			$id = $this->db->insert_id();
			$ids[] = $id;
			if(!$this->dbforge->create_database($c->name)){
				break;
			}
		}
		$this->db->flush_cache();
		$this->db->where_in('id', $ids);
		$this->db->from('tenants');
		$query = $this->db->get();
		foreach($query->result() as $t) {
			$data[] = array(
				'id' => (int) $t->id,
				'name' => $t->name,
				'db_host' => $t->db_host,
				'db_user' => $t->db_user,
				'db_password' => $t->db_password,
				'db_port' => $t->db_port,
				'is_active'=> (bool)$t->is_active
			);
		}
		$this->response(array('results'=>$data, 'count'=>count($ids)), 201);
	}

	public function index_put() {
		$posted = json_decode($this->put('models'));

		foreach($posted as $c) {
			$this->db->where('id', $c->id);
			$this->db->update('tenants', array(
				'db_host' => $c->db_host,
				'db_user' => $c->db_user,
				'db_password' => $c->db_password,
				'db_port' => $c->db_port,
				'updated_at' => date("y-m-d")
			));
			$ids[] = $c->id;
		}

		$this->db->flush_cache();
		$this->db->where_in('id', $ids);
		$this->db->from('tenants');
		$query = $this->db->get();
		foreach($query->result() as $t) {
			$data[] = array(
				'id' => (int) $t->id,
				'name' => $t->name,
				'db_host' => $t->db_host,
				'db_user' => $t->db_user,
				'db_password' => $t->db_password,
				'db_port' => $t->db_port,
				'is_active'=> (bool)$t->is_active
			);
		}
		$this->response(array('results'=>$data, 'count'=>count($ids)), 200);
	}

	public function index_delete() {
		$posted = json_decode($this->delete('models'));
		$this->load->dbforge();
		foreach($posted as $c) {
			if(!$this->dbforge->drop_database($c->name)) {
				break;
			} else {
				$this->db->where('id', $c->id);
				$this->db->delete('tenants');
				$ids[] = $c->id;
			}
		}
		$this->response(array('results'=>array(), 'count'=>count($ids)), 200);
	}
}
