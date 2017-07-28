<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends DataMapper {
	
	protected $created_field = 'created_at';
	protected $updated_field = 'updated_at';
	public $has_one = array(
		"institute",
		'pimage' => array(
			'class' => 'pimage',
			'other_field' => 'user'
		)
	);
	public $has_many = array(
		'module',
		'role',
		'review' => array(
			'class' => 'module_review',
			'other_field' => 'reviewer_id'
		),
		'app' => array(
			'class' => 'module',
			'other_field' => 'developer'
		)
	);
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

	public function __construct($db = null) {	
		if($db != null) {
			$this->db_params = array(
				'dbdriver' => 'mysql',
				'pconnect' => true,
				'db_debug' => true,
				'cache_on' => false,
				'char_set' => 'utf8',
				'cachedir' => '',
				'dbcollat' => 'utf8_general_ci',
				'hostname' => 'banhji-db-instance.cwxbgxgq7thx.ap-southeast-1.rds.amazonaws.com',
				'username' => 'mightyadmin',
				'password' => 'banhji2016',
				'database' => $db,
				'prefix'   => ''
			);
		}
		
		parent::__construct();
	}
}

/* End of file user.php */
/* Location: ./application/models/user.php */