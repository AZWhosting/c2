<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tax_item extends DataMapper {	
	protected $created_field = "created_at";
	protected $updated_field = "updated_at";	

	public $has_one = array(
		'tax_type' => array(
			'class' => 'tax_type',
			'other_field' => 'tax_item'
		),
		'account' => array(
			'class' => 'account',
			'other_field' => 'tax_item'
		)
	);

	public $has_many = array(
		'item_line' => array(
			'class' => 'item_line',
			'other_field' => 'tax_item'
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

/* End of file tax_item.php */
/* Location: ./application/models/tax_item.php */