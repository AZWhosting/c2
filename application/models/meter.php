<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meter extends DataMapper {
	protected $created_field = "created_at";
	protected $updated_field = "updated_at";

	public $has_one = array("company", "location", "electricity_box", "contact",
		'item' => array(
            'class' => 'item',
            'other_field' => 'meter'
        ),
        'invoice' => array(
            'class' => 'meter',
            'other_field' => 'invoice'
        ),
        'tariff' => array(
            'class' => 'fee',
            'other_field' => 'tariff'
        ),
        'exemption' => array(
            'class' => 'fee',
            'other_field' => 'exemption'
        ),
        'maintenance' => array(
            'class' => 'fee',
            'other_field' => 'maintenance'
        ),
        'ampere' => array(
            'class' => 'electricity_unit',
            'other_field' => 'ampere'
        ),
        'phase' => array(
            'class' => 'electricity_unit',
            'other_field' => 'phase'
        ),
        'voltage' => array(
            'class' => 'electricity_unit',
            'other_field' => 'voltage'
        )
	);
	public $has_many = array("electricity_unit", "meter_record", 
		'payment' => array(
            'class' => 'payment',
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