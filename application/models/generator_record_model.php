<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Generator_Record_model extends MY_Model {
	public $before_create = array( 'created_at', 'updated_at' );
	public $before_update = array( 'updated_at' );
}

/* End of file generator_record_model.php */
/* Location: ./application/models/generator_record_model.php */