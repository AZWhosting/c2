<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role extends DataMapper {
	public $table = 'functions';
	// protected $created_field = "created_at";
	// protected $updated_field = "updated_at";

	// public $has_one = array("company", "location", "electricity_box", "contact",
	// 	'item' => array(
 //            'class' => 'item',
 //            'other_field' => 'meter'
 //        )
	// );
	public $has_many = array(
		"institute",
		"user"
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