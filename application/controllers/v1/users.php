<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Users extends REST_Controller {

	public $entity;
	function __construct() {
		parent::__construct();
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
		$user = new User();

		if(isset($filters)) {
			foreach($filters as $f) {
				if(isset($f['operator'])) {
					$user->where($f['field'], $f['value']);
				} else {
					$user->where_related_institute($f['field'], $f['value']);
				}				
			}
		}
		$user->include_related('institute', array('id', 'name'));
		$user->get_paged($offset, $limit);
		foreach($user as $u) {
			$profile_photo = $u->pimage->get();
			$data[] = array(
				'id' 		=> intval($u->id),
				'username' 	=> $u->username,
				'company' => array('id' => intval($u->institute_id), 'name'=> $u->institute_name),
				'joined'=> $u->created_at,
				'updated_at'=> $u->updated_at,
				'logged_in' => $u->logged_in
			);
		}

		if(count($user) > 0) {
			$this->response(array('results'=>$data, 'count'=>$user->paged->total_rows), 200);
		} else {
			$this->response(array('results'=>$data, 'count'=>0), 400);
		}
	}

	private function _check_email($email) {
		$query = $this->login->get_by(array("username"=>$email));
		if(!empty($query)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function _encrypt($field){
        $hash = null;
        // Don't encrypt an empty string
        if (!empty($field))
        {
            $hash = $this->{$field} = sha1($this->config->item('encryption_key').$field);
        }
        return $hash;
    }
}
/* End of file users.php */
/* Location: ./application/controllers/v1/users.php */
