<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bin_location extends DataMapper {	
	// protected $created_field = "created_at";
	// protected $updated_field = "updated_at";

	public $has_one = array(
		'warehouse' => array(
			'class' => 'warehouse',
			'other_field' => 'bin_location'
		),
		'location' => array(
			'class' => 'location',
			'other_field' => 'bin_location'
		),
		'zone' => array(
			'class' => 'zone',
			'other_field' => 'bin_location'
		),
		'section' => array(
			'class' => 'section',
			'other_field' => 'bin_location'
		),
		'rack' => array(
			'class' => 'rack',
			'other_field' => 'bin_location'
		),
		'level' => array(
			'class' => 'level',
			'other_field' => 'bin_location'
		),
		'position' => array(
			'class' => 'position',
			'other_field' => 'bin_location'
		)
	);

	public $has_many = array(
		'item' => array(
			'class' => 'item',
			'other_field' => 'bin_location'
		),
		'item_line' => array(
			'class' => 'item_line',
			'other_field' => 'bin_location'
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

/* End of file brand.php */
/* Location: ./application/models/item_location.php */