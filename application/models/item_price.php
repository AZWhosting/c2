<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item_price extends DataMapper {	
	protected $created_field = "created_at";
	protected $updated_field = "updated_at";

	public $has_one = array(
		'measurement' => array(
			'class' => 'measurement',
			'other_field' => 'item_price'
		),
		'item' => array(
			'class' => 'item',
			'other_field' => 'item_price'
		),
		'assembly' => array(
			'class' => 'item',
			'other_field' => 'assembly'
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

/* End of file item_price.php */
/* Location: ./application/models/item_price.php */