<?php

class My_Model extends DataMapper {
	public $my_db = null,
    // Optionally, don't include a constructor if you don't need one.
 
	$this->db_params = array(
			'dbdriver' => 'mysql',
			'pconnect' => true,
			'db_debug' => true,
			'cache_on' => false,
			'char_set' => 'utf8',
			'cachedir' => '',
			'dbcollat' => 'utf8_general_ci',
			'hostname' => 'localhost',
			'username' => 'root',
			'password' => '',
			'database' => $this->my_db,
			'prefix'   => ''
		);
}

/* End of file my_model.php */
/* Location: ./application/library/my_model.php */