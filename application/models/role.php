<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role extends DataMapper {
	protected $created_field = "created_at";
	protected $updated_field = "updated_at";
	// public $has_many = array('permission');

	public function __construct($id = null, $db_host = null, $db_user = null, $password = null, $db = null) {	
		$this->db_params = array(
				'dbdriver' => 'mysql',
				'pconnect' => true,
				'db_debug' => true,
				'cache_on' => false,
				'char_set' => 'utf8',
				'cachedir' => '',
				'dbcollat' => 'utf8_general_ci',
				'hostname' => $db_host,
				'username' => $db_user,
				'password' => '',
				'database' => $db,
				'prefix'   => ''
			);
		parent::__construct($id);
	}
}

/* End of file ser.php */
/* Location: ./application/models/user.php */