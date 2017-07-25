<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prefix extends DataMapper {
	public $table = 'prefixes';	
	protected $created_field = "created_at";
	protected $updated_field = "updated_at";	

	public function __construct($id = null) {
		parent::__construct($id);
	}
}

/* End of file brand.php */
/* Location: ./application/models/brand.php */