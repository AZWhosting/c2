<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membership extends DataMapper {
	protected $created_field = "created_at";
	protected $updated_field = "updated_at";

	public $has_one = array(
		'membership_type' => array(
			'class' => 'membership_type',
			'other_field' => 'membership'
		),
		'contact' => array(
			'class' => 'contact',
			'other_field' => 'membership'
		),
		'cpd_record' => array(
			'class' => 'cpd_record',
			'other_field' => 'membership'
		)
	);

	public $has_many = array(
		'billing_cycle' => array(
			'class' => 'billing_cycle',
			'other_field' => 'membership'
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
				'hostname' => 'banhji-db-instance.cwxbgxgq7thx.ap-southeast-1.rds.amazonaws.com',
				'username' => 'mightyadmin',
				'password' => 'banhji2016',
				'database' => $db,
				'prefix'   => ''
			);
		parent::__construct($id);
	}
}

/* End of file membership.php */
/* Location: ./application/models/membership.php */