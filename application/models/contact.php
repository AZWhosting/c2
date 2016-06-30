<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends DataMapper {
	protected $created_field = "created_at";
	protected $updated_field = "updated_at";

	public $has_one = array(	
		"company" => array(
			'class' => "company",
			'other_field' => 'contact'
		),			
		"currency" => array(
			'class' => "currency",
			'other_field' => 'contact'
		),			
		'contact_type' => array(
			'class' => 'contact_type',
			'other_field' => 'contact'
		),		
		'business_type' => array(
			'class' => 'business_type',
			'other_field' => 'contact'
		),		
		'discount_account' => array(
			'class' => 'account',
			'other_field' => 'discount'
		),
		'deposit_account' => array(
			'class' => 'account',
			'other_field' => 'deposit'
		),
		'ebranch' => array(
			'class' => 'company',
			'other_field' => 'ebranch'
		),
		'wbranch' => array(
			'class' => 'company',
			'other_field' => 'wbranch'
		),
		'elocation' => array(
			'class' => 'location',
			'other_field' => 'elocation'
		),
		'wlocation' => array(
			'class' => 'location',
			'other_field' => 'wlocation'
		)
	);

	public $has_many = array(
		'transaction' => array(
			"class" => 'transaction',
			"other_field" => "contact"
		),
		'journal_line' => array(
			"class" => 'journal_line',
			"other_field" => "contact"
		),
		'account_line' => array(
			"class" => 'account_line',
			"other_field" => "contact"
		),
		'item' => array(
			'class' => 'item',
			'other_field' => 'contact'
		),
		'item_contact' => array(
			'class' => 'item_contact',
			'other_field' => 'contact'
		),
		'contact_person' => array(
			'class' => 'contact_person',
			'other_field' => 'contact'
		),
		'note' => array(
			'class' => 'note',
			'other_field' => 'contact'
		),
		'meter' => array(
			'class' => 'meter',
			'other_field' => 'contact'
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

/* End of file contact.php */
/* Location: ./application/models/contact.php */