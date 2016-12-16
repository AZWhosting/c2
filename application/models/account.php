<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends DataMapper {
	protected $created_field = "created_at";
	protected $updated_field = "updated_at";

	public $has_one = array(
		'account_type' => array(
			'class' => "account_type",
			'other_field' => 'account'
		),		
		'sub_of' => array(
			'class' => "account",
			'other_field' => 'account'
		)
	);

	public $has_many = array(
		'journal_line' => array(
			'class' => "journal_line",
			'other_field' => 'account'
		),
		'account_line' => array(
			'class' => "account_line",
			'other_field' => 'account'
		),		
		'account' => array(
			'class' => 'account',
			'other_field' => 'sub_of'
		),
		'contact' => array(
			'class' => 'contact',
			'other_field' => 'account'
		),		
		'trade_discount' => array(
			'class' => 'contact',
			'other_field' => 'trade_discount'
		),
		'settlement_discount' => array(
			'class' => 'contact',
			'other_field' => 'settlement_discount'
		),
		'deposit' => array(
			'class' => 'contact',
			'other_field' => 'deposit_account'
		),
		'income' => array(
			'class' => 'item',
			'other_field' => 'income_account'
		),
		'expense' => array(
			'class' => 'item',
			'other_field' => 'expense_account'
		),
		'inventory' => array(
			'class' => 'item',
			'other_field' => 'inventory_account'
		), 
		'tax_item' => array(
			'class' => 'tax_item',
			'other_field' => 'account'
		),
		'plan_item' => array(
			'class' => 'plan_item',
			'other_field' => 'account'
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

/* End of file account.php */
/* Location: ./application/models/account.php */