<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Donor extends DataMapper {
	// public $table = 'account_types';
	protected $created_field = 'created_at';
	protected $updated_field = 'updated_at';

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