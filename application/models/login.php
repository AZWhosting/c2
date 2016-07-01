<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends DataMapper {
	
	protected $created_field = 'created_on';
	protected $updated_field = 'updated_on';
	public $has_one = array(
		"institute",
		"login"
	);
	public $has_many = array('type', 'module');

	public function __construct() {	
		parent::__construct();
	}
}

/* End of file login.php */
/* Location: ./application/models/login.php */