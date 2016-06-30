<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Institute_type extends DataMapper {
	
	protected $created_field = 'created_on';
	protected $updated_field = 'updated_on';
	// public $has_one = array(
	// 	"institute" => array(
	// 		'class' => 'institute',
	// 		'other_field' => 'institute'
	// 	)
	// );
	// public $has_many = array('user', 'module', 'login');

	public function __construct() {	
		parent::__construct();
	}
}

/* End of file institute.php */
/* Location: ./application/models/institute.php */