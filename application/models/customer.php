<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends DataMapper {
	public $table = 'contacts';
	protected $created_field = "created_at";
	protected $updated_field = "updated_at";

	public $has_one = array(
		'contact_type' => array(
			'class' => 'contact_type',
			'other_field' => 'contact'
		),
		'account' => array(
			'class' => 'account',
			'other_field' => 'contact'
		),
		'trade_discount' => array(
			'class' => 'account',
			'other_field' => 'trade_discount'
		),
		'settlement_discount' => array(
			'class' => 'account',
			'other_field' => 'settlement_discount'
		),
		'deposit_account' => array(
			'class' => 'account',
			'other_field' => 'deposit'
		),
		// 'ebranch' => array(
		// 	'class' => 'branch',
		// 	'other_field' => 'ebranch'
		// ),
		// 'wbranch' => array(
		// 	'class' => 'branch',
		// 	'other_field' => 'wbranch'
		// ),
		'location' => array(
			'class' => 'location',
			'other_field' => 'contact'
		),
		// 'wlocation' => array(
		// 	'class' => 'location',
		// 	'other_field' => 'wlocation'
		// ),
		'payroll' => array(
			'class' => 'payroll',
			'other_field' => 'contact'
		),
		'branch' => array(
			'class' => 'branch',
			'other_field' => 'meter'
		)
	);

	public $has_many = array(
		// 'transaction' => array(
		// 	"class" => 'transaction',
		// 	"other_field" => "contact"
		// ),
		// 'journal_line' => array(
		// 	"class" => 'journal_line',
		// 	"other_field" => "contact"
		// ),
		// 'account_line' => array(
		// 	"class" => 'account_line',
		// 	"other_field" => "contact"
		// ),
		// 'item' => array(
		// 	'class' => 'item',
		// 	'other_field' => 'contact'
		// ),
		// 'item_contact' => array(
		// 	'class' => 'item_contact',
		// 	'other_field' => 'contact'
		// ),
		// 'contact_person' => array(
		// 	'class' => 'contact_person',
		// 	'other_field' => 'contact'
		// ),
		// 'note' => array(
		// 	'class' => 'note',
		// 	'other_field' => 'contact'
		// ),
		// 'job' => array(
		// 	'class' => 'job',
		// 	'other_field' => 'contact'
		// ),
		'meter' => array(
			'class' => 'meter',
			'other_field' => 'contact'
		),
		'file' => array(
			'class' => 'attachment',
			'other_field' => 'user'
		),
		'attachment' => array(
			'class' => 'attachment',
			'other_field' => 'contact'
		),
		'property' => array(
			'class' => 'property',
			'other_field' => 'contact'
		),
		'transaction' => array(
            'class' => 'transaction',
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
