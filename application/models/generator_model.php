<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Generator_model extends MY_Model {
	public $before_create = array( 'created_at', 'updated_at' );
	public $before_update = array( 'updated_at' );
}

/* End of file generator_model.php */
/* Location: ./application/models/generator_model.php */