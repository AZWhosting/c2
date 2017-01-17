<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Branch extends DataMapper {
	public $table = 'branches';
	protected $created_field = 'created_at';
	protected $updated_field = 'updated_at';
	
	public $has_one = array(		
		'currency' => array(
			"class" => 'currency', 
			"other_field" => "branch"
		),
		'contact' => array(
			"class" => 'contact', 
			"other_field" => "branch"
		)
	);

	public $has_many = array('user',		
		'fee' => array(
			"class" => 'fee',
			"other_field" => "branch"
		),
		'customer' => array(
			"class" => 'customer',
			"other_field" => "branch"
		),
		'location' => array(
			"class" => 'location',
			"other_field" => "branch"
		),
		'ebranch' => array(
			"class" => 'contact',
			"other_field" => "branch"
		),
		'wbranch' => array(
			"class" => 'contact',
			"other_field" => "branch"
		),
		'contact_utility' => array(
			"class" => 'contact_utility',
			"other_field" => "branch"
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

/* End of file branch.php */
/* Location: ./application/models/branch.php */