<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Currency extends DataMapper {
	public $table = "currencies";

	protected $created_field = "created_at";
	protected $updated_field = "updated_at";

	// public $has_one = array(		
	// 	'branch' => array(
	// 		"class" => 'branch',
	// 		"other_field" => "currency"
	// 	)
	// );

	public $has_many = array(
		'currency_rate' => array(
			'class' => 'currency_rate',
			'other_field' => 'currency'
		),
		'measurement' => array(
			'class' => 'measurement',
			'other_field' => 'currency'
		),
		'branch' => array(
			"class" => 'branch',
			"other_field" => "currency"
		),
		'plan' => array(
			'class' => "plan",
			'other_field' => 'currency'
		),
		'meter' => array(
			'class' => "meter",
			'other_field' => 'currency'
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

/* End of file currency.php */
/* Location: ./application/models/currency.php */