<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_method extends DataMapper {	
	protected $created_field = 'created_at';
	protected $updated_field = 'updated_at';
	
	// public $has_one = array('contact');
	public $has_many = array(
		'transaction' => array(
			"class" => 'transaction',
			"other_field" => "payment_method"
		),
		'first_payment' => array(
			'class' => 'contact',
			'other_field' => 'payment_main'
		),
		'second_payment' => array(
			'class' => 'contact',
			'other_field' => 'payment_second'
		),
		'payment' => array(
			'class' => 'payment',
			'other_field' => 'payment_method'
		),
		'account_line' => array(
			'class' => 'account_line',
			'other_field' => 'payment_method'
		)
	);

	public function __construct($id = null, $server_name = null, $db_username = null, $server_password = null, $db = null) {	
		$this->db_params = array(
				'dbdriver' => 'mysql',
				'pconnect' => true,
				'db_debug' => true,
				'cache_on' => false,
				'char_set' => 'utf8',
				'cachedir' => '',
				'dbcollat' => 'utf8_general_ci',
				'hostname' => 'localhost',
				'username' => 'root',
				'password' => '',
				'database' => $db,
				'prefix'   => ''
			);
		parent::__construct($id);
	}
}

/* End of file payment_method.php */
/* Location: ./application/models/payment_method.php */