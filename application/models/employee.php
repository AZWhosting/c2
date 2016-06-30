<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends DataMapper {
	protected $created_field = "created_at";
	protected $updated_field = "updated_at";

	// public $has_one = array(
		
	// );

	public $has_many = array(
		'meter_record' => array(
			'class' => "meter_record",
			'other_field' => 'employee'
		)
	);

	// public $validation = array(
	// 		'code' => array(
	// 			'label' => 'Account Code',
	// 			'roles' => array('required', 'unique')
	// 		),
	// 		'name' => array(
	// 			'label' => 'Account Name',
	// 			'roles' => array('required', 'unique')
	// 		)
	// 	);

	public function __construct($id = null, $server_name = null, $server_username = null, $server_password = null, $db = null) {	
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
		parent::__construct($id);
	}
}

/* End of file employee.php */
/* Location: ./application/models/employee.php */