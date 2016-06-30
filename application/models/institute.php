<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Institute extends DataMapper {
	
	protected $created_field = 'created_on';
	protected $updated_field = 'updated_on';
	public $has_one = array(
		"connection" => array(
			'class' => 'connection',
			'other_field' => 'institute'
		),
		"industry" => array(
			'class' => 'industry',
			'other_field' => 'institute'
		),
		"country" => array(
			'class' => 'country',
			'other_field' => 'institute'
		),
		"province" => array(
			'class' => 'province',
			'other_field' => 'institute'
		),
		"type" => array(
			"class" => "institute_type",
			"other_field" => "institute"
		),
		"login" => array(
			"class" => "login",
			"other_field" => "institute"
		),
		'monetary' => array(
			'class' => 'monetary',
			'other_field' => 'institute'
		),
		'report_monetary' => array(
			'class' => 'monetary',
			'other_field' => 'report'
		)
	);
	public $has_many = array('user', 'module', 'login');

	public function __construct() {	
		parent::__construct();
	}
}

/* End of file institute.php */
/* Location: ./application/models/institute.php */