<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends DataMapper {
	// public $table = 'categories';
	protected $created_field = "created_at";
	protected $updated_field = "updated_at";

	public $has_many = array(
		'institute'
	);	

	public function __construct() {	
		parent::__construct();
	}
}

/* End of file category.php */
/* Location: ./application/models/category.php */