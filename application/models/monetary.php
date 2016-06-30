<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Monetary extends DataMapper {
	var $table = "monetaries";

	protected $created_field = "created_at";
	protected $updated_field = "updated_at";

	public $has_many = array(
		'institute' => array(
			'class' => 'institute',
			'other_field' => 'monetary'
		),
		'report' => array(
			'class' => 'institute',
			'other_field' => 'report_monetary'
		)
	);

	public function __construct($id = null) {	
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

/* End of file currency.php */
/* Location: ./application/models/currency.php */