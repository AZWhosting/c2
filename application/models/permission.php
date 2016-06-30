<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permission extends DataMapper {
	
	protected $created_field = 'created_on';
	protected $updated_field = 'updated_on';
	// public $has_one = array(
	// 	"institute"	
	// );
	public $has_many = array(
		'login' => array(
			'class' => 'login',
			'other_field' => 'permission'
		),
		'role'
	);

	public function __construct() {	
		parent::__construct();
	}
}

/* End of file permission.php */
/* Location: ./application/models/permission.php */