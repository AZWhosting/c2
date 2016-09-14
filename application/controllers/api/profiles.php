<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Profiles extends REST_Controller {

	public $_database;
	public $entity;
	public $user;
	public $pwd;
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		$institute = new Institute();
		$institute->where('id', $this->input->get_request_header('Institute'))->get();
		if($institute->exists()) {
			$conn = $institute->connection->get();
			$this->entity = $conn->server_name;
			$this->user = $conn->username;
			$this->pwd = $conn->password;
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

		$users = new User(null);
		$users->limit($limit, $offset);
		if(isset($filters)) {
			foreach($filters as $f) {
				$users->where($f['field'], $f['value']);
			}
		}
		$users->get_iterated();
		foreach($users as $user) {
			$data[] = array(
				'id' => $user->id,
				'username' 	=> $user->username,
				'first_name'=> $user->first_name,
				'last_name' => $user->last_name,
				'role' 		=> $user->role,
				'profile_photo'=>$user->profile_photo_url,
				// 'modules'   => $modules,
				'facebook'	=> $user->facebook,
				'linkedin'	=> $user->linkedin,
				'twitter' 	=> $user->twitter,
				'joined'	=> $user->created_at,
				'logged_in' => $user->logged_in,
				'role' 	=> $user->role,
				'mobile'	=> $user->mobile,
				'email' 	=> $user->email,
				'usertype' 	=> $user->usertype_id,				
				'created_at'=> $user->created_at,
				'updated_at'=> $user->updated_at
			);
		}

		// if($users->result_count() > 0) {
			$this->response(array('results'=>$data, 'count'=>1), 200);
		// } else {
		// 	$this->response(array('results'=>$data, 'count'=>$users->result_count()), 200);
		// }
	}

	// Login
	function login_post() {
		$requested_data = $this->post("filter");
		$filters = $requested_data['filters'];
		$limit = $this->get('limit') ? $this->get('limit'): 50;
		$offset= $this->get('offset')? $this->get('offset'): null;

		$users = new User(null);
		if(isset($filters)) {
			foreach($filters as $f) {
				$users->where($f['field'], $f['value']);
			}
		}
		$users->get();
		$users->logged_in = date('Y-m-d');
		$users->save();
		foreach($users as $user) {
			// $user->module->get();
			// $modules = array();
			// if($user->module->exists()) {
			// 	foreach($user->module as $m) {
			// 		$modules[] = array(
			// 			'id' 		=> intval($m->id),
			// 			'name' 		=> $m->name,
			// 			'img_url' 	=> $m->image_url,
			// 			'description'=>$m->description
			// 		);
			// 	}
			// }
			$data[] = array(
				'id' => $user->id,
				'username' 	=> $user->username,
				'first_name'=> $user->first_name,
				'last_name' => $user->last_name,
				'role' 		=> $user->role,
				'profile_photo'=>$user->profile_photo_url,
				// 'modules'   => $modules,
				'created_at'=> $user->created_at,
				'updated_at'=> $user->updated_at
			);
		}

		// if($users->result_count() > 0) {
			$this->response(array('results'=>$data, 'count'=>1), 200);
		// } else {
		// 	$this->response(array('results'=>$data, 'count'=>$users->result_count()), 200);
		// }
	}

	// update user information
	// @param: user data
	// return userdata
	function index_put() {
		$requested_data = json_decode($this->put('models'));
		foreach($requested_data as $user) {
			$User = new User(null);
			$User->where('username', $user->username)->get();
			$User->username = $user->username;
			$User->email = $user->email;
			$User->mobile = $user->mobile;
			$User->linkedin = $user->linkedin;
			$User->facebook = $user->facebook;
			$User->twitter = $user->twitter;
			$User->first_name= $user->first_name;
			$User->last_name = $user->last_name;
			$User->profile_photo_url = $user->profile_photo;
			$User->role = $user->role;
			$User->usertype_id=$user->usertype;

			if($User->save()) {
				$data[] = array(
					'id' => $user->id,
				'username' 	=> $User->username,
				'first_name'=> $User->first_name,
				'last_name' => $User->last_name,
				'role' 		=> $User->role,
				'profile_photo'=>$User->profile_photo_url,
				// 'modules'   => $modules,
				'facebook'	=> $User->facebook,
				'linkedin'	=> $User->linkedin,
				'twitter' 	=> $User->twitter,
				'joined'	=> $User->created_at,
				'logged_in' => $User->logged_in,
				'role' 		=> $User->role,
				'mobile'	=> $User->mobile,
				'email' 	=> $User->email,
				'usertype' 	=> $User->usertype_id,				
				'created_at'=> $User->created_at,
				'updated_at'=> $User->updated_at
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

		foreach($requested_data as $user) {
			$User = new User(null);
			$User->username = $user->username;
			$User->email = $user->email;
			$User->mobile = $user->mobile;
			$User->linkedin = $user->linkedin;
			$User->facebook = $user->facebook;
			$User->twitter = $user->twitter;
			$User->first_name= $user->first_name;
			$User->last_name = $user->last_name;
			$User->profile_photo_url = $user->profile_photo;
			$User->role = $user->role;
			$User->usertype_id=$user->usertype->id;
			if($User->save()) {
				$data[] = array(
					'username' 	=> $User->username,
					'first_name'=> $User->first_name,
					'last_name' => $User->last_name,
					'profile_photo'=>$User->profile_photo_url,
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

	function company_get() {
		$requested_data = $this->get("filter");
		$filters = $requested_data['filters'];
		$limit = $this->get('limit') ? $this->get('limit'): 1;
		$offset= $this->get('offset')? $this->get('offset'): null;

		$user = new User();
		if(isset($filters)) {
			foreach($filters as $f) {
				$user->where($f['field'], $f['value']);
			}
		}
		$user->get_paged($offset, $limit);


		foreach($user as $u) {
			$u->institute->get();
			if($u->institute->exists()) {
				$industry = $u->institute->industry->get();
				$currency = $u->institute->monetary->get();
				$report = $u->institute->report_monetary->get();
				$country = $u->institute->country->get();
				$lastLogin = new User();
				$lastLogin->where_related('institute', 'id', $u->institute->id);
				$lastLogin->where('created_at <= ', date('Y-m-d'));
				$lastLogin->where('created_at >= ', date('Y-m-d', strtotime('-30 days')));
				$loginCount = $lastLogin->count();
				$data[] = array(
					'id' => $u->institute->id,
					'name'=>$u->institute->name,
					'email' => $u->institute->email,
					'address'=>$u->institute->address,
					'logo' => $u->institute->logo,
					'description' => $u->institute->description,
					'vat_number' => $u->institute->vat_number,
					'fiscal_date'=> $u->institute->fiscal_date,
					'tax_regime' => $u->institute->tax_regime,
					'year_founded'=>$u->institute->year_founded,
					'locale' => $u->institute->locale,
					'zip' => $u->institute->zip_code,
					'reportCurrency' => array('id'=>$report->id, 'code'=>$report->code, 'country' => $report->country, 'locale' =>$report->locale),
					'is_local' => $u->institute->is_local,
					'financial_year' => $u->institute->financial_year,
					'financial_report_date' => $u->institute->financial_report_date,
					'industry' => array('id'=>$industry->id,'type' => $industry->name),
					'currency' => $currency->id ? array('id'=> $currency->id, 'code' => $currency->code, 'country' => $currency->country, 'locale'=>$currency->locale):array('id'=>null),
					'country' => array('id' => $country->id, 'name' => $country->name),
					'users' => $u->institute->user->count(),
					'lastLogin' => $loginCount
				);
			} else {
				$data[] = array();
			}

		}
		if(count($data) > 0) {
			$this->response(array(
				'error' => FALSE,
				'count' => 1,
				'results'=>$data
			), 200);
		} else {
			$this->response(array(
				'error' => TRUE,
				'count' => 0,
				'results'=>array()
			), 200);
		}
	}
	function company_post() {
		$request = json_decode($this->post('models'));

		// todo: add currency base on country selected
		foreach($request as $r) {
			// find user
			$user = new User();
			$user->where('username', $r->username);
			$user->get();
			$modules = new Module();
			$modules->where('is_core', 'true')->get();
			$inst = new Institute();
			$inst->name = $r->name;
			$inst_year_founded = date('Y');
			$inst->monetary_id = 3;
			$inst->report_monetary_id = 3;
			$inst->logo = 'https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/default_logo.png';
			$inst->country_id = $r->country->id;
			$inst->industry_id = $r->industry->id;
			$inst->type_id = $r->type->id;
			$inst->monetary_id = 3;
			if($inst->save(array($user, $modules->all))) {
				$user->save($modules->all);
				// fillin dafault data
				$data[] = array(
					'id' => $inst->id,
					'institute' => $inst->name
				);
			}
		}
		if(count($data) > 0) {
			$this->response(array(
				'error' => FALSE,
				'msgCode' => 2001,
				'msg' => 'Comany created',
				'results' => $data,
				'count' => count($data)
			),
			201);
		} else {
			$this->response(array(
				'error' => TRUE,
				'msgCode' => 2000,
				'msg' => 'Comany created',
				'results' => array(),
				'count' => 0
			),
			201);
		}
	}
	function company_put() {
		$requested_data = json_decode($this->put("models"));

		foreach($requested_data as $req) {
			$company = new Institute();
			$company->where('id', $req->id)->get();

			$company->name = $req->name;
			$company->email= $req->email;
			$company->address=$req->address;
			$company->logo = $req->logo;
			$company->description=$req->description;
			$company->vat_number = $req->vat_number;
			$company->fiscal_date= $req->fiscal_date;
			$company->tax_regime= $req->tax_regime;
			$company->year_founded = $req->year_founded;
			$company->report_monetary_id=$req->reportCurrency->id;
			$company->monetary_id = $req->currency->id;
			$company->industry_id = $req->industry->id;
			$company->is_local = $req->is_local;
			$company->zip_code = $req->zip;
			$company->financial_year = $req->financial_year;
			$company->financial_report_date = $req->financial_report_date;
			if($company->save()) {
				$industry = $company->industry->get();
				$currency = $company->monetary->get();
				$report = $company->report_monetary->get();
				$country = $company->country->get();
				$data[] = array(
					'id' => $company->id,
					'name'=>$company->name,
					'email' => $company->email,
					'address'=>$company->address,
					'logo' => $company->logo,
					'description' => $company->description,
					'vat_number' => $company->vat_number,
					'fiscal_date'=> $company->fiscal_date,
					'tax_regime' => $company->tax_regime,
					'year_founded'=>$company->year_founded,
					'reportCurrency' => $report->exists() ? array('id'=>$report->id, 'code'=>$report->code, 'country' => $report->country, 'locale' =>$report->locale) : array('id' => null),
					'is_local' => $company->is_local,
					'financial_year' => $company->financial_year,
					'financial_report_date' => $company->financial_report_date,
					'industry' => array('id'=>$industry->id,'type' => $industry->name),
					'currency' => $currency->exists() ? array('id'=> $currency->id, 'code' => $currency->code, 'country' => $currency->country, 'locale'=>$currency->locale) : array('id'=>null),
					'country' => array('id' => $country->id, 'name' => $country->name),
					'zip' => $company->zip_code,
					'users' => $company->user->count()
				);
			}
		}

		if(count($data) > 0) {
			$this->response(array(
				'error' => FALSE,
				'count' => 1,
				'results'=>$data
			), 200);
		} else {
			$this->response(array(
				'error' => TRUE,
				'count' => 0,
				'results'=>$data
			), 200);
		}
	}

	function module_get() {
		$requested_data = $this->get("filter");
		$filters = $requested_data['filters'];
		$institute = new Institute(null);
		foreach($filters as $filter) {
			$institute->where($filter['field'], $filter['value']);
		}
		$institute->get();
		if($institute->exists()) {
			$institute->module->include_join_fields()->get();
			foreach($institute->module as $module) {
				$data[] = array(
					'id' => $module->id,
					'name' => $module->name,
					'href' => $module->href,
					'description' => $module->description,
					'image_url' => $module->image_url,
					'core' => $module->join_core == 'true' ? TRUE : FALSE
				);
			}
			$this->response(array('results'=>$data, 'error' => FALSE, 'count' => count($data)), 200);
		} else {
			$this->response(array('results'=>array(), 'error' => TRUE, 'count' => 0), 200);
		}
	}

	function module_post() {
		// $request = json_decode($this->post('models'));

		// foreach($request as $d) {

		// }
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
/* Location: ./application/controllers/api/users.php */
