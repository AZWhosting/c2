<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Currency extends DataMapper {
	var $table = "currencies";

	protected $created_field = "created_at";
	protected $updated_field = "updated_at";

	public $has_many = array(
		'currency_rate' => array(
			'class' => 'currency_rate',
			'other_field' => 'currency'
		),
		'measurement' => array(
			'class' => 'measurement',
			'other_field' => 'currency'
		),		
		'item_record' => array(
			'class' => 'item_record',
			'other_field' => 'currency'
		),
		"contact" => array(
			'class' => 'contact',
			'other_field' => 'currency'
		), 
		"institute", 
		"deposit"
	);

	public function __construct($id = null, $server_name = null, $server_username = null, $server_password = null, $db = null) {	
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

/* End of file currency.php */
/* Location: ./application/models/currency.php */