<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Ops extends REST_Controller {

	// function destroyCol_get() {
	// 	$this->load->dbutil();
	// 	$dbs = $this->dbutil->list_databases();

	// 	$companyList = array("banhji","banhji_mac", "db_banhji", "information_schema","innodb","mysql","performance_schema","tmp");
	// 	$data = array();
	// 	foreach ($dbs as $db)
	// 	{	
	// 		if (!in_array("$db", $companyList)) {
	// 		    $data[] = $db;
	// 		    $connection = 'use ' . $db;
	// 		    $this->db->query($connection);

	// 		    $this->dbforge->modify_column('items', array('cogs_account_id' => array('name' => 'expense_account_id', 'type' => 'INT')));
	// 		    // $this->dbforge->drop_column('items', 'account_id');
	// 		    // $this->dbforge->drop_column('items', 'fixed_assets_account_id');
	// 		    // $this->dbforge->drop_column('items', 'accumulated_account_id');
	// 		    // $this->dbforge->drop_column('items', 'depreciation_account_id');
	// 		}
		    
	// 	}
	// }

	// function items_get() {
	// 	$this->load->dbutil();
	// 	$dbs = $this->dbutil->list_databases();

	// 	$companyList = array("banhji","banhji_mac", "db_banhji", "information_schema","innodb","mysql","performance_schema","tmp");
	// 	$data = array();
	// 	foreach ($dbs as $db)
	// 	{	
	// 		if (!in_array("$db", $companyList)) {
	// 		    $data[] = $db;
	// 		    $connection = 'use ' . $db;
	// 		    $this->db->query($connection);
			
	// 			$myData = array(
	// 				array('expense_account_id' => 106, 'income_account_id' => 38, 'inventory_account_id' => 26, 'abbr' => "LAN"),
	// 				array('expense_account_id' => 106, 'income_account_id' => 39, 'inventory_account_id' => 27, 'abbr' => "BUS"),
	// 				array('expense_account_id' => 106, 'income_account_id' => 38, 'inventory_account_id' => 28, 'abbr' => "AUC"),
	// 				array('expense_account_id' => 106, 'income_account_id' => 40, 'inventory_account_id' => 29, 'abbr' => "ESM"),
	// 				array('expense_account_id' => 106, 'income_account_id' => 41, 'inventory_account_id' => 30, 'abbr' => "AUV"),
	// 				array('expense_account_id' => 106, 'income_account_id' => 42, 'inventory_account_id' => 31, 'abbr' => "FFF"),
	// 				array('expense_account_id' => 106, 'income_account_id' => 43, 'inventory_account_id' => 32, 'abbr' => "CRE"),
	// 				array('expense_account_id' => 106, 'income_account_id' => 45, 'inventory_account_id' => 34, 'abbr' => "HEM"),
	// 				array('expense_account_id' => 106, 'income_account_id' => 46, 'inventory_account_id' => 25, 'abbr' => "INA")
	// 			);
	// 			$this->db->update_batch('items', $myData, 'abbr');
	// 			// $this->db->insert('accounts', $dataInserted);
	
	// 		}
		    
	// 	}

	// 	// $this->response(array('results'=>$data), 200);
	// }

	// function create_get() {
	// 	$this->load->dbutil();
	// 	$dbs = $this->dbutil->list_databases();

	// 	$companyList = array("banhji","banhji_mac", "db_banhji", "information_schema","innodb","mysql","performance_schema","tmp");
	// 	$data = array();
	// 	foreach ($dbs as $db)
	// 	{	
	// 		if (!in_array("$db", $companyList)) {
	// 		    $data[] = $db;
	// 		    $connection = 'use ' . $db;

	// 		 //    $dataInserted = array(
	// 			//    'account_type_id' => 34,
	// 			//    'sub_of_id' => 70,
	// 			//    'number' => '32900',
	// 			//    'locale' => 'km-KH',
	// 			//    'name' => 'Opening Balance Equity',
	// 			//    'status' => 1,
	// 			//    'is_system' => 1
	// 			// );

	// 			$this->db->query($connection);
	// 			// $this->dbforge->add_column("account_types", array('code'=> array('type'=> 'SMALLINT')));
	// 			$myData = array(
	// 				array('order' => 13, 'id' => 10),
	// 				array('order' => 12, 'id' => 11),
	// 				array('order' => 11, 'id' => 12),
	// 				array('order' => 10, 'id' => 13),
	// 				array('order' => 9, 'id' => 14),
	// 				array('order' => 8, 'id' => 15),
	// 				array('order' => 1, 'id' => 16),
	// 				array('order' => 2, 'id' => 17),
	// 				array('order' => 3, 'id' => 18),
	// 				array('order' => 4, 'id' => 19),
	// 				array('order' => 5, 'id' => 20),
	// 				array('order' => 6, 'id' => 21),
	// 				array('order' => 7, 'id' => 22),
	// 				array('order' => 22, 'id' => 23),
	// 				array('order' => 21, 'id' => 24),
	// 				array('order' => 20, 'id' => 25),
	// 				array('order' => 19, 'id' => 26),
	// 				array('order' => 18, 'id' => 27),
	// 				array('order' => 14, 'id' => 28),
	// 				array('order' => 15, 'id' => 29),
	// 				array('order' => 16, 'id' => 30),
	// 				array('order' => 17, 'id' => 31)
	// 			);
	// 			$this->db->update_batch('account_types', $myData, 'id');
	// 			// $this->db->insert('accounts', $dataInserted);
	
	// 		}
		    
	// 	}

	// 	// $this->response(array('results'=>$data), 200);

	// }
	
}