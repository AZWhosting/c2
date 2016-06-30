<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Users extends REST_Controller {

	public function index_get() {
		
		$query = $this->db->get('users');
		foreach($query->result() as $user) {
			$data[] = array(
				'id' => $user->id,
				'username' => $user->username,
				'lastname' => $user->last_name,
				'firstname'=> $user->first_name,
				'photo'    => $user->profile_photo_url,
				'mobile'   => $user->mobile,
				'email'    => $user->email		
			);
		}
		if(count($data) > 0) {
			$this->respnose(array(
				'results' => $data,
				'error'   => FALSE,
				'count'   => count($data)
			), 200);
		} else {
			$this->respnose(array(
				'results' => array(),
				'error'   => TRUE,
				'count'   => 0
			), 200);
		}
	}
}