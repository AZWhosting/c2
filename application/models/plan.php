<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plan extends DataMapper {
	// protected $created_field = "created_at";
	// protected $updated_field = "updated_at";

	public $has_one = array(
		'meter' => array(
			'class' => "meter",
			'other_field' => 'plan'
		),
		'currency' => array(
			'class' => "currency",
			'other_field' => 'plan'
		)
	);

	public $has_many = array(
		'plan_item'
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
				'hostname' => 'banhji-db-instance.cwxbgxgq7thx.ap-southeast-1.rds.amazonaws.com',
				'username' => 'mightyadmin',
				'password' => 'banhji2016',
				'database' => $db,
				'prefix'   => ''
			);
		parent::__construct($id);
	}
}

/* End of file account.php */
/* Location: ./application/models/account.php */
