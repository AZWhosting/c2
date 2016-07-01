<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends DataMapper {
	protected $created_field = "created_at";
	protected $updated_field = "updated_at";

	public $has_one = array(		
		'item_type' => array(
			'class' => 'item_type',
			'other_field' => 'item'
		),
		'category' => array(
			'class' => 'category',
			'other_field' => 'item'
		),
		'item_group' => array(
			'class' => 'item_group',
			'other_field' => 'item'
		),
		'brand' => array(
			'class' => 'brand',
			'other_field' => 'item'
		),		
		'measurement' => array(
			'class' => 'measurement',
			'other_field' => 'item'
		),
		'contact' => array(
			'class' => 'contact',
			'other_field' => 'item'
		),		
		'income_account' => array(
			'class' => 'account',
			'other_field' => 'income'
		),
		'cogs_account' => array(
			'class'=>'account',
			'other_field' => 'cogs'
		),
		'inventory_account' => array(
			'class'=>'account',
			'other_field' => 'inventory'
		)
	);

	public $has_many = array(
		'item_line' => array(
			'class' => 'item_line',
			'other_field' => 'item'
		),
		'item_contact' => array(
			'class' => 'item_contact',
			'other_field' => 'item'
		),		
		'meter' => array(
			'class' => 'meter',
			'other_field' => 'item'
		),
		'item_price' => array(
			'class' => 'item_price',
			'other_field' => 'item'
		),				
		'assembly' => array(
			'class' => 'item_price',
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

/* End of file item.php */
/* Location: ./application/models/item.php */