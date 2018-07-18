<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loyalty_card extends DataMapper {
	protected $created_field = "created_at";
	protected $updated_field = "updated_at";

	// public $has_one = array('meter', 'invoice', 'user', 'contact');
	

	public function __construct($id = null, $server_name = null, $db_username = null, $server_password = null, $db = null) {
		parent::__construct($id);
	}
}

/* End of file payment.php */
/* Location: ./application/models/payment.php */