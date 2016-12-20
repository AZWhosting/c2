<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Users extends REST_Controller {

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

		$user = new User();

		if(isset($filters)) {
			foreach($filters as $f) {
				$user->where_related_institute($f['field'], $f['value']);
			}	
		}
		$user->include_related('institute', array('id', 'name'));
		$user->get_paged($offset, $limit);
		foreach($user as $u) {
			$data[] = array(
				'id' 		=> intval($u->id),
				'username' 	=> $u->username,
				'first_name'=> $u->first_name,
				'last_name' => $u->last_name,
				'profile_photo' => $u->profile_photo_url,
				'is_confirmed'	=> $u->is_confirmed == 0 ? FALSE : TRUE,
				'is_disabled'=> $u->is_diabled == 0 ? FALSE : TRUE,
				'password' => '********',
				'email' => $u->email,
				'mobile' => $u->mobile,
				'role' 	=> $u->role,
				'company' => array('id' =>$u->institute_id, 'name'=> intval($u->institute_name)),
				'created_at'=> $u->created_at,
				'updated_at'=> $u->updated_at
			);
		}

		if(count($user) > 0) {
			$this->response(array('results'=>$data, 'count'=>$user->paged->total_rows), 200);
		} else {
			$this->response(array('results'=>$data, 'count'=>0), 200);
		}
	}

	// update user information
	// @param: user data
	// return userdata
	function index_put() {
		$requested_data = json_decode($this->put('models'));
		foreach($requested_data as $user) {
			$company = new Institute();
			$company->where('id', $user->company->id)->get();
			$User = new User();
			$User->where('username', $user->username)->get();
			$User->first_name = $user->first_name;
			$User->last_name = $user->last_name;
			$User->email = $user->email;
			$User->mobile = $user->mobile;
			$User->profile_photo_url = $user->profile_photo;
			$User->is_confirmed = 0;
			$User->is_disabled = 0;
			if($User->save()) {
				$data[] = array(
					'id' 		=> intval($User->id),
					'username' 	=> $User->username,
					'first_name'=> $User->first_name,
					'last_name' => $User->last_name,
					'profile_photo' => $User->profile_photo_url,
					'is_confirmed'	=> $User->is_confirmed == 0 ? FALSE : TRUE,
					'is_disabled'=> $User->is_diabled == 0 ? FALSE : TRUE,
					'email' => $User->email,
					'mobile' => $User->mobile,
					'role' 	=> $User->role,
					'company' => array('id' =>$company->id, 'name'=> $company->name),
					'created_at'=> $User->created_at,
					'updated_at'=> $User->updated_at
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
		
		foreach($requested_data as $user) {
			$company = new Institute();
			$company->where('id', $user->company->id)->get();
			$User = new User();
			$User->username = $user->username;
			$User->first_name = $user->first_name;
			$User->last_name = $user->last_name;
			$User->email = $user->email;
			$User->mobile = $user->mobile;
			$User->role = $user->usertype;
			$User->profile_photo_url = $user->profile_photo;
			$User->is_confirmed = 0;
			$User->is_disabled = 0;
			if($company->exists()) {
				if($User->save($company)) {
					$data[] = array(
						'id' 		=> intval($User->id),
						'username' 	=> $User->username,
						'first_name'=> $User->first_name,
						'last_name' => $User->last_name,
						'profile_photo' => $User->profile_photo_url,
						'is_confirmed'	=> $User->is_confirmed == 0 ? FALSE : TRUE,
						'is_disabled'=> $User->is_diabled == 0 ? FALSE : TRUE,
						'email' => $User->email,
						'mobile' => $User->mobile,
						'role' 	=> $User->role,
						'company' => array('id' =>$company->id, 'name'=> $company->name),
						'created_at'=> $User->created_at,
						'updated_at'=> $User->updated_at
					);
				}
			} else {
				if($User->save()) {
					$data[] = array(
						'id' 		=> intval($User->id),
						'username' 	=> $User->username,
						'first_name'=> $User->first_name,
						'last_name' => $User->last_name,
						'profile_photo' => $User->profile_photo_url,
						'is_confirmed'	=> $User->is_confirmed == 0 ? FALSE : TRUE,
						'is_disabled'=> $User->is_diabled == 0 ? FALSE : TRUE,
						'email' => $User->email,
						'mobile' => $User->mobile,
						'role' 	=> $User->role,
						'company' => array('id' =>$company->id, 'name'=> $company->name),
						'created_at'=> $User->created_at,
						'updated_at'=> $User->updated_at
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
	function create_post() {
		$requested_data = json_decode($this->post('models'));
		
		foreach($requested_data as $user) {
			$User = new User();
			$User->username = $user->username;
			$User->first_name = $user->first_name;
			$User->last_name = $user->last_name;
			$User->email = $user->email;
			$User->mobile = $user->mobile;
			$User->profile_photo_url = $user->profile_photo;
			$User->is_confirmed = 0;
			$User->is_disabled = 0;
			if($User->save()) {
				$data[] = array(
					'id' 		=> intval($User->id),
					'username' 	=> $User->username,
					'first_name'=> $User->first_name,
					'last_name' => $User->last_name,
					'profile_photo' => $User->profile_photo_url,
					'email' => $User->email,
					'mobile' => $User->mobile
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
		$$requested_data = json_decode($this->post('models'));
		foreach($requested_data as $user) {
			$User = new User(null, $this->entity);
			$User->status = 0;
			if($User->save()) {
				$data[] = array(
					'id' => $User->id,
					'username' => $User->username,
					'password' => '*******',
					'status'   => $User->status,
					'created_at'=> $User->created_at,
					'updated_at'=> $User->updated_at
				);
			}
		}
		if(count($data) > 0) {
			$this->response(array('results'=>$data, 'count'=> count($data)), 201);
		} else {
			$this->response(array('results'=>array(), 'count'=> 0), 201);
		}
	}

	/* Get all roles for user
	* @param: user id
	*/
	function roles_get() {
		$filter = $this->get('filter')?$this->get('filter'): null;
		$limit = $this->get('limit');
		$offset = $this->get('offset')?$this->get('offset'):0;

		$user = new User(null, $this->entity);
		foreach($filter['filters'] as $f) {
			$user->where($f['field'], $f['value']);
		}

		$data = $user->include_related('role', NULL, TRUE)->get_raw();
		$this->response(array('results'=>$data->result()), 200);
	}

	/* assign user to role
	* @param: user id and role id
	*/
	function roles_post() {
		$requested_data = json_decode($this->post('models'));

		foreach($requested_data as $d) {
			$user = new User(null, $this->entity);
			$user->where('id', $d->user_id);
			$user->get();

			$role = new Role(null, $this->entity);
			$role->where('id', $d->role_id);
			$role->get();

			if($user->exists() && $role->exists()) {
				if($user->save($role)){
					$r = $user->include_related('role', NULL, TRUE)->get_raw();
					$this->response(array('msg'=>'assigned successfully.', 'results'=>$r->result()), 201);
				} else {
					$this->response(array('msg'=>'error assigning to role.', 'results'=>array()), 201);
				}
			} else {
				$this->response(array('msg'=>'either role or user does not exist', 'results'=>array()), 201);
			}
		}
		// $this->response(array('msg'=>'assigned successfully.', 'results'=>$r->result()), 201);
	}

	/* remove user from role
	* @param: user id and role id
	*/
	function roles_delete() {
		$requested_data = json_decode($this->delete('models'));

		foreach($requested_data as $d) {
			$user = new User(null, $this->entity);
			$user->where('id', $d->id)->get();
			$role = $user->role->where('id', $d->role_id)->get();

			if($role->exists()) {
				$role->delete($user);
				// if($role->delete($user)){
				// 	$this->response(array('msg'=>'deleted successfully.', 'results'=>$r->result()), 201);
				// } else {
				// 	$this->response(array('msg'=>'error removing from role.', 'results'=>array()), 201);
				// }

			} //else {
			// 	$this->response(array('msg'=>'either role or user does not exist', 'results'=>array()), 201);
			// }
		}
	}

	function modules_get() {
		$requested_data = $this->get("filter");
		$filters = $requested_data['filters'];
		$limit = $this->get('limit') ? $this->get('limit'): 50;
		$offset= $this->get('offset')? $this->get('offset'): null;

		$user = new User();

		if(isset($filters)) {
			foreach($filters as $f) {
				$user->where($f['field'], $f['value']);
			}	
		}
		$user->get_paged($offset, $limit);
		foreach($user as $u) {
			$u->module->get();
			foreach($u->module as $m) {
				$data[] = array(
					'id' 		=> intval($m->id),
					'name' 		=> $m->name,
					'img_url' 	=> $m->image_url,
					'description'=>$m->description
				);
			}				
		}

		if(count($user) > 0) {
			$this->response(array('results'=>$data, 'count'=>$user->paged->total_rows), 200);
		} else {
			$this->response(array('results'=>$data, 'count'=>0), 200);
		}
	}

	function modules_post() {}

	function moduels_delete() {}

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
/* Location: ./application/controllers/api/users.php */