<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Budget extends DataMapper {
	protected $created_field = "created_at";
	protected $updated_field = "updated_at";

	public $has_one = array("budget_type",
		'budget_type' => array(
			'class' => "budget_type",
			'other_field' => 'budget_type'
		)
	);

	public $has_many = array(
		'voucher' => array(
			'class' => 'entry',
			'other_field' => 'budget'
		),
	);
	public function __construct($id = null, $server_name = null, $db_username = null, $server_password = null, $db = null) {	
		$this->db_params = array(
				'dbdriver' => 'mysql',
				'pconnect' => true,
				'db_debug' => true,
				'cache_on' => false,
				'char_set' => 'utf8',
				'cachedir' => '',
				'hostname' => 'localhost',
				'username' => 'root',
				'password' => '',
				'database' => $db,
				'prefix'   => ''
			);
		parent::__construct($id);
	}
}
