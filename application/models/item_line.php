<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item_line extends DataMapper {
	protected $created_field = "created_at";
	protected $updated_field = "updated_at";

	public $has_one = array(
		'transaction' => array(
			'class' => 'transaction',
			'other_field' => 'item_line'
		),		
		'measurement' => array(
			'class' => 'measurement',
			'other_field' => 'item_line'
		),
		'tax_item' => array(
			'class' => 'tax_item',
			'other_field' => 'item_line'
		),
		'item' => array(
			'class' => 'item',
			'other_field' => 'item_line'
		)
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

/* End of file item_line.php */
/* Location: ./application/models/item_line.php */