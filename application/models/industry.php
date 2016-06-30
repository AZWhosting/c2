<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Industry extends DataMapper {
	public $table = 'industries';
	protected $created_field = "created_at";
	protected $updated_field = "updated_at";

	// public $has_one = array("account_type");

	public $has_many = array(
		'institute' => array(
			'class' => 'institute',
			'other_field' => 'industry'
		)
	);

	// public $validation = array(
	// 		'code' => array(
	// 			'label' => 'Account Code',
	// 			'roles' => array('required', 'unique')
	// 		),
	// 		'name' => array(
	// 			'label' => 'Account Name',
	// 			'roles' => array('required', 'unique')
	// 		)
	// 	);

	public function __construct($id = null) {	
		parent::__construct($id);
	}
}

/* End of file bank.php */
/* Location: ./application/models/bank.php */