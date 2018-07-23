<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends DataMapper {    
	protected $created_field = "created_at";
	protected $updated_field = "updated_at";

	public $has_one = array(
        'location' => array(
            'class' => 'location',
            'other_field' => 'transaction'
        ),
        'contact' => array(
            'class' => 'contact',
            'other_field' => 'transaction'
        ),
        // 'meter' => array(
        //     'class' => 'meter',
        //     'other_field' => 'transaction'
        // ),       
        'payment_term' => array(
            'class' => 'payment_term',
            'other_field' => 'transaction'
        ),
        'payment_method' => array(
            'class' => 'payment_method',
            'other_field' => 'transaction'
        ),
        'reference' => array(
            'class' => 'transaction',
            'other_field' => 'transaction'
        ),
        'job' => array(
            'class' => 'job',
            'other_field' => 'transaction'
        )
	);
	public $has_many = array(
        'transaction' => array(
            'class' => 'transaction',
            'other_field' => 'reference'
        ),
        'attachment' => array(
            'class' => 'attachment',
            'other_field' => 'transaction'
        ),		
		'item_line' => array(
            'class' => 'item_line',
            'other_field' => 'transaction'
        ),
        'winvoice_line' => array(
            'class' => 'winvoice_line',
            'other_field' => 'transaction'
        ),        
        'journal_line' => array(
            'class' => 'journal_line',
            'other_field' => 'transaction'
        ),
        'account_line' => array(
            'class' => 'account_line',
            'other_field' => 'transaction'
        ),
        'segmentitem' => array(
            'class' => 'segmentitem',
            'other_field' => 'transaction'
        ),
        'related_transaction' => array(
            'class' => 'transaction',
            'other_field' => 'transaction'
        ),
        'transaction' => array(
            'other_field' => 'related_transaction'
        ),
        'billing_cycle' => array(
            'class' => 'billing_cycle',
            'other_field' => 'transaction'
        )
	);

	public function __construct($id = null, $server_name = null, $server_username = null, $server_password = null, $db = null) {   
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

/* End of file transaction.php */
/* Location: ./application/models/transaction.php */