<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Module extends DataMapper {
	// protected $created_field = "created_at";
	// protected $updated_field = "updated_at";

	public $has_one = array(
		'developer' => array(
			'class' => 'user',
			'other_field' => 'app'
		)
	);
	public $has_many = array(
		"institute",
		"user",
		"image" => array(
			'class' => 'module_image',
			'other_field' => 'module'
		),
		"type" => array(
			'class' => 'module_type',
			'other_field' => 'module'
		),
		"review" => array(
			'class' => 'module_review',
			'other_field' => 'module'
		),
	);

	public function __construct($id = null, $db = null) {	
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
		parent::__construct($id);
	}	
}

/* End of file meter.php */
/* Location: ./application/models/meter.php */