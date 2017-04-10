<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meter extends DataMapper {
	protected $created_field = "created_at";
	protected $updated_field = "updated_at";

	public $has_one = array("branch", "location", "electricity_box",
		"property" => array(
			'class' => 'property',
			'other_field' => 'meter'
		),
        'plan' => array(
            'class' => 'plan',
            'other_field' => 'meter'
        ),
        'currency' => array(
            'class' => "currency",
            'other_field' => 'meter'
        ),
        'location' => array(
            'class' => "location",
            'other_field' => 'meter'
        ),
        'attachment' => array(
            'class' => "attachment",
            'other_field' => 'meter'
        ),
        'reactive' => array(
            'class' => "meter",
            'other_field' => 'meter'
        ),
        'meter' => array(
            'other_field' => 'reactive'
        ),
        'contact' => array(
            'class' => "customer",
            'other_field' => 'meter'
        ),
	);
	public $has_many = array(
		'reading' => array(
            'class' => 'reading',
            'other_field' => 'meter'
        ),
        'electricity_unit' => array(
            'class' => 'electricity_unit',
            'other_field' => 'meter'
        ),
        'record' => array(
            'class' => 'meter_record',
            'other_field' => 'meter'
        ),
		'installment' => array(
			'class' => 'installment',
			'other_field' => 'meter'
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

/* End of file meter.php */
/* Location: ./application/models/meter.php */
