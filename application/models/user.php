<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends DataMapper {
	
	protected $created_field = 'created_at';
	protected $updated_field = 'updated_at';
	public $has_one = array("institute");
	public $has_many = array('module');
	// protected $db_params = 
	// public $validation = array(
	// 	'username' => array(
	// 		'label' => 'Username',
	// 		'rules' => array('required','trim','unique')
	// 	),
	// 	'password' => array(
	// 		'label' => 'password',
	// 		'rules' => array('required', 'encrypt')
	// 	)
	// );

	public function __construct() {	
		// $this->db_params = array(
		// 		'dbdriver' => 'mysql',
		// 		'pconnect' => true,
		// 		'db_debug' => true,
		// 		'cache_on' => false,
		// 		'char_set' => 'utf8',
		// 		'cachedir' => '',
		// 		'dbcollat' => 'utf8_general_ci',
		// 		'hostname' => 'localhost',
		// 		'username' => 'root',
		// 		'password' => '',
		// 		'database' => $db,
		// 		'prefix'   => ''
		// 	);
		parent::__construct();
	}
}

/* End of file user.php */
/* Location: ./application/models/user.php */