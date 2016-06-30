<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Electricity_box extends DataMapper {
	public $table = "Electricity_boxes";
	protected $created_field = "created_at";
	protected $updated_field = "updated_at";

	public $has_one = array("location");
	public $has_many = array("meter");

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

/* End of file electricity_box.php */
/* Location: ./application/models/electricity_box.php */