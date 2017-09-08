<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location_type extends DataMapper {	
	// protected $created_field = "created_at";
	// protected $updated_field = "updated_at";

	public $has_many = array(
		'location' => array(
			'class' => 'location',
			'other_field' => 'location_type'
		)
	);

	public function __construct($id = null) {
		parent::__construct($id);
	}
}

/* End of file brand.php */
/* Location: ./application/models/location_type.php */