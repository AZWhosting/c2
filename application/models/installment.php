<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Installment extends DataMapper {
	protected $created_field = "created_at";
	protected $updated_field = "updated_at";

	public $has_one = array(
        'contact' => array(
            'class' => 'contact',
            'other_field' => 'installment'
        ),
				'meter' => array(
					'class' => 'meter',
					'other_field' => 'installment'
				)
	);

	public $has_many = array(
		'installment_schedule' => array(
			'class' => 'installment_schedule',
			'other_field' => 'installment'
		)
	);

	public function __construct($id = null, $server_name = null, $db_username = null, $server_password = null, $db = null) {
		$this->db_params = array(
				'dbdriver' => 'mysql',
				'pconnect' => true,
				'db_debug' => true,
				'cache_on' => false,
				'char_set' => 'utf8',
				'cachedir' => '',
				'dbcollat' => 'utf8_general_ci',
				'hostname' => 'banhji-db-instance.cwxbgxgq7thx.ap-southeast-1.rds.amazonaws.com',
				'username' => 'mightyadmin',
				'password' => 'banhji2016',
				'database' => $db,
				'prefix'   => ''
			);
		parent::__construct($id);
	}
}

/* End of file installment.php */
/* Location: ./application/models/installment.php */
