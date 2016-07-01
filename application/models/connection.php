<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Connection extends DataMapper {
	
	protected $created_field = 'created_on';
	protected $updated_field = 'updated_on';
	public $has_one = array(
		"institute"	=> array(
			'class' => 'institute',
			'other_field' => 'connection'
		)
	);

	public function __construct($id = null, $server_name = null, $db_username = null, $server_password = null, $db = null) {	
		parent::__construct($id);
	}
}

/* End of file connection.php */
/* Location: ./application/models/connection.php */