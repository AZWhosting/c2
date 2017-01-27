<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Ops extends REST_Controller {

	// function index_get() {

	// 	$list = array(
	// 		'name' => "Roberto",
	// 		'surname'=>"Ritchie",
	// 		'account' => array('id'=>1, 'name'=> 'Roberto', 'number' => '0112354', 'amount' => 12,21554.23),
	// 		'address' => array('id'=>12, 'street'=> "King's Landing", 'zip' => '21456', 'house' => '#25'),
	// 		'website' => array('url' => 'app.banhji.com', 'title'=> "cloud accounting", 'tags' => 'cloude, accounting, finance')
	// 	);

	// 	$loop = 100000;
	// 	$data = array();
	// 	for($i=0; $i<$loop; $i++) {
	// 		$data[][$i] = $list;
	// 	}

	// 	$this->response(array('result'=>$data,'count'=>count($data)), 200);
	// }

	// function updateItems_get() {
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
	// 		    $this->db->where('unit_value', 0.000000000000000);
	// 		    $this->db->update('item_lines', array('unit_value'=> 1.000000000000000));
	// 		    // $this->db->where('id', 8);
	// 		    // $this->db->update('items', array('income_account_id'=> 0, 'expense_account_id'=> 0, 'inventory_account_id'=> 70, 'item_type_id' => 5));
	// 		    // $this->db->where('id', 9);
	// 		    // $this->db->update('items', array('income_account_id'=> 0, 'expense_account_id'=> 0, 'inventory_account_id'=> 105, 'item_type_id' => 5));
	// 		    // $this->dbforge->modify_column('items', array('cogs_account_id' => array('name' => 'expense_account_id', 'type' => 'INT')));
	// 		    // $this->dbforge->drop_column('items', 'account_id');
	// 		    // $this->dbforge->drop_column('items', 'fixed_assets_account_id');
	// 		    // $this->dbforge->drop_column('items', 'accumulated_account_id');
	// 		    // $this->dbforge->drop_column('items', 'depreciation_account_id');
	// 		}
		    
	// 	}
	// }

	function runs_get() {
		$this->load->dbutil();
		$dbs = $this->dbutil->list_databases();

		$companyList = array("banhji","banhji_mac", "db_banhji", "information_schema","innodb","mysql","performance_schema","tmp");
		$data = array();
		foreach ($dbs as $db)
		{	
			if (!in_array("$db", $companyList)) {
			    $data[] = $db;
			    $connection = 'use '.$db;
			    $this->db->query($connection);

        //         $this->dbforge->add_column(
        //         	"attachments", array(
	       //          	'account_id'=> array(
	       //          			'type'=> 'TINYINT', 
	       //          			'constraint'=> 11,
	       //          			'unsigned' 	=> TRUE,
								// 'null' 		=> FALSE,
								// 'default' 	=> 0
	       //          	)
        //         	)
        //         );                

                $this->dbforge->modify_column(
                	'transactions', array(
                					'issued_date' => array(
                								'name' 		=> 'issued_date', 
                								'type'		=> 'DATETIME',
                								'null' 		=> FALSE
                					)
                	)
                );

                // $this->dbforge->modify_column(
                // 	'item_prices', array(
                // 					'assembly_id' => array(
                // 								'name' 		=> 'assembly_id', 
                // 								'type'		=> 'INT',
                // 								'constraint'=> 11,
                // 								'unsigned' 	=> TRUE,
                // 								'null' 		=> FALSE,
                // 								'default' 	=> 0
                // 					)
                // 	)
                // );
			    
			    // $this->dbforge->modify_column('attachments', 
			    // 	array('type' => array(
			    // 		'name' => 'type', 
			    // 		'type' => "ENUM('Transaction','Item','Contact','Account')"
			    // 	)
			    // ));
			    
			    // $this->db->where('id', 23);
			    // $this->db->update('prefixes', array('type'=> 'Withdraw', 'name'=>"Withdraw"));
			}
		}

	}

	// function create_get() {
	// 	$this->load->dbutil();
	// 	$dbs = $this->dbutil->list_databases();

	// 	$companyList = array("banhji","banhji_mac", "db_banhji", "information_schema","innodb","mysql","performance_schema","tmp");
	// 	$data = array();
	// 	// foreach ($dbs as $db)
	// 	// {	
	// 		// if (!in_array("$db", $companyList)) {
	// 		//     $data[] = $db;
	// 		    $connection = 'use db_1480145014';//. $db;
	// 		    $this->db->query($connection);

	// 		   	$this->dbforge->modify_column('items', array('cogs_account_id' => array('name' => 'expense_account_id', 'type' => 'INT')));
	// 		    $this->dbforge->drop_column('items', 'account_id');
	// 		    $this->dbforge->drop_column('items', 'fixed_assets_account_id');
	// 		    $this->dbforge->drop_column('items', 'accumulated_account_id');
	// 		    $this->dbforge->drop_column('items', 'depreciation_account_id');
				
	// 			// $this->dbforge->add_column("account_types", array('order'=> array('type'=> 'SMALLINT')));
	// 			// $myData = array(
	// 			// 	array('order' => 13, 'id' => 10),
	// 			// 	array('order' => 12, 'id' => 11),
	// 			// 	array('order' => 11, 'id' => 12),
	// 			// 	array('order' => 10, 'id' => 13),
	// 			// 	array('order' => 9, 'id' => 14),
	// 			// 	array('order' => 8, 'id' => 15),
	// 			// 	array('order' => 1, 'id' => 16),
	// 			// 	array('order' => 2, 'id' => 17),
	// 			// 	array('order' => 3, 'id' => 18),
	// 			// 	array('order' => 4, 'id' => 19),
	// 			// 	array('order' => 5, 'id' => 20),
	// 			// 	array('order' => 6, 'id' => 21),
	// 			// 	array('order' => 7, 'id' => 22),
	// 			// 	array('order' => 22, 'id' => 23),
	// 			// 	array('order' => 21, 'id' => 24),
	// 			// 	array('order' => 20, 'id' => 25),
	// 			// 	array('order' => 19, 'id' => 26),
	// 			// 	array('order' => 18, 'id' => 27),
	// 			// 	array('order' => 14, 'id' => 28),
	// 			// 	array('order' => 15, 'id' => 29),
	// 			// 	array('order' => 16, 'id' => 30),
	// 			// 	array('order' => 17, 'id' => 31)
	// 			// );
	// 			// $this->db->update_batch('account_types', $myData, 'id');

	// 			// $this->db->insert('accounts', $dataInserted);
	
	// 	// 	}
		    
	// 	// }

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
	// 			$dataInserted = array(
	// 				array(
	// 					"is_pattern" => 0,
	// 					"number" => "00001",
	// 					"abbr" => "LAN",
	// 					"name" => "Freehold Land"
	// 				),
	// 				array(
	// 					"is_pattern" => 0,
	// 					"number" => "00001",
	// 					"abbr" => "CRE",
	// 					"name" => "Computer & Related Equipment"
	// 				),
	// 				array(
	// 					"is_pattern" => 0,
	// 					"number" => "00001",
	// 					"abbr" => "BUS",
	// 					"name" => "Building & Structure"
	// 				),
	// 				array(
	// 					"is_pattern" => 0,
	// 					"number" => "00001",
	// 					"abbr" => "AUC",
	// 					"name" => "Asset Under Construction"
	// 				),
	// 				array(
	// 					"is_pattern" => 0,
	// 					"number" => "00001",
	// 					"abbr" => "ESM",
	// 					"name" => "Electrical System & Machine"
	// 				),
	// 				array(
	// 					"is_pattern" => 0,
	// 					"number" => "00001",
	// 					"abbr" => "AUV",
	// 					"name" => "Automobiles & Vehicles"
	// 				),
	// 				array(
	// 					"is_pattern" => 0,
	// 					"number" => "00001",
	// 					"abbr" => "FFF",
	// 					"name" => "Furniture, Fixtures & Fitting"
	// 				),
	// 				array(
	// 					"is_pattern" => 0,
	// 					"number" => "00001",
	// 					"abbr" => "HEM",
	// 					"name" => "Heavy Machineries"
	// 				),
	// 				array(
	// 					"is_pattern" => 0,
	// 					"number" => "00001",
	// 					"abbr" => "INA",
	// 					"name" => "Intangible Asset"
	// 				)
 // 				);
	
	// 			$this->db->query($connection);
	// 			// $this->db->insert('items', array(
	// 			// 	"is_pattern" => 1,
	// 			//
	// 			// 	"abbr" => "CRE",
	// 			// 	"purchase_description" => "Computer & Related Equipment",
	// 			// 	"sale_description" => "Computer & Related Equipment",
	// 			// 	"fixed_assets_account_id" => 32,
	// 			// 	"accumulated_account_id" => 43,
	// 			// 	"depreciation_account_id" => 106,
	// 			// 	"is_system" => 1
	// 			// ));
	// 			// $this->dbforge->add_column("account_types", array('code'=> array('type'=> 'SMALLINT')));
	// 			// $myData = array(
	// 			// 	array('order' => 13, 'id' => 10),
	// 			// 	array('order' => 12, 'id' => 11),
	// 			// 	array('order' => 11, 'id' => 12),
	// 			// 	array('order' => 10, 'id' => 13),
	// 			// 	array('order' => 9, 'id' => 14),
	// 			// 	array('order' => 8, 'id' => 15),
	// 			// 	array('order' => 1, 'id' => 16),
	// 			// 	array('order' => 2, 'id' => 17),
	// 			// 	array('order' => 3, 'id' => 18),
	// 			// 	array('order' => 4, 'id' => 19),
	// 			// 	array('order' => 5, 'id' => 20),
	// 			// 	array('order' => 6, 'id' => 21),
	// 			// 	array('order' => 7, 'id' => 22),
	// 			// 	array('order' => 22, 'id' => 23),
	// 			// 	array('order' => 21, 'id' => 24),
	// 			// 	array('order' => 20, 'id' => 25),
	// 			// 	array('order' => 19, 'id' => 26),
	// 			// 	array('order' => 18, 'id' => 27),
	// 			// 	array('order' => 14, 'id' => 28),
	// 			// 	array('order' => 15, 'id' => 29),
	// 			// 	array('order' => 16, 'id' => 30),
	// 			// 	array('order' => 17, 'id' => 31)
	// 			// );
	// 			$this->db->update_batch('items', $dataInserted, 'name');
	// 			// $this->db->insert('accounts', $dataInserted);
	
	// 		}
	
	// 	}
	
	// 	// $this->response(array('results'=>$data), 200);
	
	// }

	// 			// $myData = array(
	// 			// 	array('expense_account_id' => 106, 'income_account_id' => 38, 'inventory_account_id' => 26, 'abbr' => "LAN"),
	// 			// 	array('expense_account_id' => 106, 'income_account_id' => 39, 'inventory_account_id' => 27, 'abbr' => "BUS"),
	// 			// 	array('expense_account_id' => 106, 'income_account_id' => 38, 'inventory_account_id' => 28, 'abbr' => "AUC"),
	// 			// 	array('expense_account_id' => 106, 'income_account_id' => 40, 'inventory_account_id' => 29, 'abbr' => "ESM"),
	// 			// 	array('expense_account_id' => 106, 'income_account_id' => 41, 'inventory_account_id' => 30, 'abbr' => "AUV"),
	// 			// 	array('expense_account_id' => 106, 'income_account_id' => 42, 'inventory_account_id' => 31, 'abbr' => "FFF"),
	// 			// 	array('expense_account_id' => 106, 'income_account_id' => 43, 'inventory_account_id' => 32, 'abbr' => "CRE"),
	// 			// 	array('expense_account_id' => 106, 'income_account_id' => 45, 'inventory_account_id' => 34, 'abbr' => "HEM"),
	// 			// 	array('expense_account_id' => 106, 'income_account_id' => 46, 'inventory_account_id' => 25, 'abbr' => "INA")
	// 			// );
	// 			// $this->db->update_batch('items', $myData, 'abbr');

	// 			// $fields = array(
	// 			// 	"received" => array("type" => "DECIMAL", "constraint" => '30,2'),
	// 			// 	"change" => array("type" => "DECIMAL", "constraint" => '30,2')
	// 			// );

	// 		    // $this->dbforge->add_column('transactions', $fields);

	// 		 //    $fields = array(
	// 			// 	"received" => array(
	// 			// 		"name" => "received", "type" => "DECIMAL", "constraint" => '30,2'
	// 			// 	),
	// 			// 	"change" => array(
	// 			// 		"name" => "change", "type" => "DECIMAL", "constraint" => '30,2'
	// 			// 	)
	// 			// );
	// 		 //    $this->dbforge->modify_column('transactions', $fields);

	// 		    $data = array(
	// 		    	array(
	// 		    		'type' => 'Electricity_Invoice',
	// 		    		'abbr' => 'EI'
	// 		    	),
	// 		    	array(
	// 		    		'type' => 'Water_Invoice',
	// 		    		'abbr' => 'WI'
	// 		    	)
	// 		    );

	// 		    $this->db->update_batch('prefixes', $data, 'abbr'); 
				
	// 			// $dataInserted = array(
	// 			// 	array(
	// 			// 		"type" => "Commercial_Invoice",
	// 			// 		'abbr' => "CIN",
	// 			// 		'startup_number' => 1,
	// 			// 		'name' => "Commercial Invoice"
	// 			// 	),
	// 			// 	array(
	// 			// 		"type" => "Commercial_Cash_Sale",
	// 			// 		'abbr' => "CCS",
	// 			// 		'startup_number' => 1,
	// 			// 		'name' => "Commercial Cash Sale"
	// 			// 	),
	// 			// 	array(
	// 			// 		"type" => "Vat_Invoice",
	// 			// 		'abbr' => "VIN",
	// 			// 		'startup_number' => 1,
	// 			// 		'name' => "VAT Invoice"
	// 			// 	),
	// 			// 	array(
	// 			// 		"type" => "Vat_Cash_Sale",
	// 			// 		'abbr' => "VCS",
	// 			// 		'startup_number' => 1,
	// 			// 		'name' => "VAT Cash Sale"
	// 			// 	)
 // 			// 	);
	// 			// $this->db->insert_batch('prefixes', $dataInserted);
	// 			// $this->db->where('abbr', "");
	// 			// $this->db->delete('prefixes');
	
		// 	}   
		// }

	// 	// $this->response(array('results'=>$data), 200);


	//Made by Great Mighty Dawine ^_^
	// function add_new_field_get() {
	// 	$this->load->dbutil();
	// 	$dbs = $this->dbutil->list_databases();

	// 	$companyList = array("banhji","banhji_mac", "db_banhji", "information_schema","innodb","mysql","performance_schema","tmp");
	// 	$data = array();
	// 	foreach ($dbs as $db)
	// 	{	
	// 		if (!in_array("$db", $companyList)) {
	// 		    $data[] = $db;
	// 		    $connection = 'use '.$db;
	// 		    $this->db->query($connection);

 //                $this->dbforge->add_column(
 //                	"account_lines", array(//Table Name
	//                 	'movement'=> array(//New Field Name
	//                 			'type'=> 'TINYINT', 
	//                 			'constraint'=> 1, 
	//                 			'unsigned'=> TRUE
	//                 	)
 //                	)
 //                );
	// 		}
	// 	}

	// }
	//End made by Great Mighty Dawine ^_^
}