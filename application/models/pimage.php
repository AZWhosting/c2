<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pimage extends DataMapper {
	protected $created_field = "created_at";
	protected $updated_field = "updated_at";

	public $has_many = array(
		'institute' => array(
			'class' => "institute",
			'other_field' => 'pimage'
		),		
		'user' => array(
			'class' => "user",
			'other_field' => 'pimage'
		)
	);

	public function __construct() {	
		parent::__construct();
	}
}

/* End of file account.php */
/* Location: ./application/models/account.php */