<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends DataMapper {
	public $table = 'companies';
	protected $created_field = 'created_at';
	protected $updated_field = 'updated_at';

	public $has_one = array(
		'currency'		
	);

	public $has_many = array('user',		
		'fee' => array(
			"class" => 'fee',
			"other_field" => "company"
		),
		'contact' => array(
			"class" => 'contact',
			"other_field" => "company"
		),
		'location' => array(
			"class" => 'location',
			"other_field" => "company"
		),
		'ebranch' => array(
			"class" => 'contact',
			"other_field" => "ebranch"
		),
		'wbranch' => array(
			"class" => 'contact',
			"other_field" => "wbranch"
		),		
		'invoice');
	
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

/* End of file company.php */
/* Location: ./application/models/company.php */