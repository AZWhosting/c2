<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Measurement extends DataMapper {
	protected $created_field = "created_at";
	protected $updated_field = "updated_at";

	public $has_one = array(
		'measurement_category' => array(
			'class' => 'measurement_category',
			'other_field' => 'measurement'
		)
	);

	public $has_many = array(
		'item_line' => array(
			'class' => 'item_line',
			'other_field' => 'measurement'
		),
		'item' => array(
			'class' => 'item',
			'other_field' => 'measurement'
		),
		'item_price' => array(
			'class' => 'item_price',
			'other_field' => 'measurement'
		),
		'item_assembly' => array(
			'class' => 'item_assembly',
			'other_field' => 'measurement'
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

/* End of file measurement.php */
/* Location: ./application/models/measurement.php */