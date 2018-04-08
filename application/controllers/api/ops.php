<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Ops extends REST_Controller {

	function runs_get() {
		$this->load->dbutil();
		$this->load->dbforge();
		$dbs = $this->dbutil->list_databases();
		$companyList = array("db_1505276837","api","banhji","banhji0055","choeun_reeco","banhji_center","banhji_mac","information_schema","innodb","mysql","performance_schema","tmp");
		$data["results"] = [];
		$data["count"] = 0;
		$startQ = false;

		foreach ($dbs as $key => $db)
		{	
			if (!in_array("$db", $companyList)) {
				$connection = 'use ' . $db;
				$this->db->query($connection);

				// if($db=="db_1505299843"){
				// 	$startQ = true;
				// }

				// $counter = $this->db->count_all('transactions');
				// $data["results"][] = array( "db" => $db, "rows" => $counter );

			    //Check missing field
				// if ($this->db->field_exists('account_id', 'attachments')===FALSE){
				//    	$data["results"][] = $db;
				// }

			    //Create new table
			    // $this->dbforge->add_field('id');
			    // $this->dbforge->add_field("location_id int(11) NOT NULL DEFAULT '0'");
			    // $this->dbforge->add_field("month_of date DEFAULT NULL");
			    // $this->dbforge->add_field("usage int(11) NOT NULL DEFAULT '0'");
			    // $this->dbforge->add_field("amount decimal(30,15) DEFAULT NULL");
			    // $this->dbforge->add_field("maintenance decimal(30,15) DEFAULT NULL");
			    // $this->dbforge->add_field("installment decimal(30,15) DEFAULT NULL");
			    // $this->dbforge->add_field("other_charge decimal(30,15) DEFAULT NULL");
			    // $this->dbforge->add_field("exemption decimal(30,15) DEFAULT NULL");
			    // $this->dbforge->add_field("amount_recieved decimal(30,15) DEFAULT NULL");
			    // $this->dbforge->add_field("discount decimal(30,15) DEFAULT NULL");
			    // $this->dbforge->add_field("ending_ballance decimal(30,15) DEFAULT NULL");
			    // $this->dbforge->add_field("created_at date DEFAULT NULL");
			    // $this->dbforge->add_field("updated_at date DEFAULT NULL");
			    // $this->dbforge->create_table('tmp_total_sales', TRUE);
			    
				//Rename Table 'old_table_name' to 'new_table_name'
			    // $this->dbforge->rename_table('contacts_custom_fields', 'field_values');

				//DROP TABLE IF EXISTS table_name
			    // $this->dbforge->drop_table('references');
			    
			    //Update data
			    // $this->db->where('conversion_ratio', 0);
			    // $this->db->update('item_prices', array('conversion_ratio' => 1));

			 	//Update batch
			 	// 	$raw = array(
				//    	array(
				//       	'id' 						=> 1,
				//       	'measurement_category_id' 	=> 2
				//    	),
				//    	array(
				//       	'id' 						=> 2,
				//       	'measurement_category_id' 	=> 2
				//    	)
				// );
			 	//    $this->db->update_batch('measurements', $raw, 'id');

			    //Insert batch data
		 	// 	$raw = array(
				// 	// array(
			 // 	//    		'type' 			=> 'Receipt_Note',
			 // 	//    		'abbr' 			=> 'RTN',
			 // 	//    		'name' 			=> 'Receipt Note'
			 // 	//    	),
			 // 	   	array(
			 // 	   		'name' 			=> 'AMK',
			 // 	   		'is_system' 	=> 1
			 // 	   	)
				// );
			 // 	$this->db->insert_batch('payment_methods', $raw);
				
				// Add new fields
				// $fields = array(
				// 	// "tags" => array(
				// 	// 	"type" 		=> "DECIMAL",
				// 	// 	"constraint"=> "30,15",
				// 	// 	"null" 		=> FALSE,
				// 	// 	"default" 	=> 0
				// 	// )
				// );
				// $data['results'][] = $this->dbforge->add_column("field_values", $fields);
				
			    // Modify fields
		 	// 	$fields = array(
				// 	// "conversion_ratio" => array(
				// 	// 	"name" 		=> "conversion_ratio",//New Field Name 
				// 	// 	"type" 		=> "DECIMAL",
				// 	// 	"constraint"=> "30,15",
				// 	// 	"null" 		=> FALSE,
				// 	// 	"default" 	=> 1
				// 	// ),
				// 	"graduateion_date" => array(
				// 		"name" 		=> "graduation_date",//New Field Name 
				// 		"type" 		=> "DATE"
				// 	)
				// );
				// $data['results'][] = $this->dbforge->modify_column('memberships', $fields);

			 	//Remove column, 'table_name', 'column_to_drop'
				// $this->dbforge->drop_column('item_assemblies', 'amount');

				//Custom
				// $dsn = 'mysql://'.$this->db->username.':'.$this->db->password.'@'.$this->db->hostname.'/'.$db;
				// $DB1 = $this->load->database($dsn, TRUE);
				// get all of the tables				
				// $this->db = $DB1;
			    
			    // $this->db->query($connection);
			    // if($this->db->table_exists('plan_items')) {
			    // 	$field = array(
			    // 		'type' => array(
			    // 			'name' => 'type',
			    // 			'type' => 'VARCHAR',
			    // 			'constraint' => 255
			    // 		)
			    // 	);
			    // 	if($this->dbforge->modify_column('plan_items', $field)) {
			    // 		$data['results'][] = $db;
			    // 	}
			    // } 
			 	//    $fields = array(
			    //                     'usage' => array(
			    //                     	'type' => 'INT',
			    //                     	'constraint' => 11
			    //                     )
				// );
				// $this->dbforge->add_column('tmp_total_sales', $fields);

			}//End If
		}//End Foreach

		$data["total"] = count($data["results"]);

		//Response Data		
		$this->response($data, 200);

	}//End Function

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

	// function run_db_banhji_get() {
	// 	$this->load->dbutil();	
	//     $connection = 'use db_banhji';
	//     $this->db->query($connection);

	//     // transactions
	//     // transaction_templates
	//     // prefixes
 //        $this->dbforge->modify_column(
 //        	'prefixes', array(
	// 			'type' => array(
	// 						'name' 		=> 'type', 
	// 						'type'		=> 'VARCHAR',
	// 						'constraint'=> '255',
	// 						'null' 		=> TRUE,
	// 						'default' 	=> 'NULL'
	// 			)
 //        	)
 //        );

 //    //     $this->dbforge->modify_column(
 //    //     	'transactions', array(
	// 			// 'journal_type' => array(
	// 			// 			'name' 		=> 'journal_type', 
	// 			// 			'type'		=> 'VARCHAR',
	// 			// 			'constraint'=> '255',
	// 			// 			'null' 		=> TRUE,
	// 			// 			'default' 	=> 'NULL'
	// 			// )
 //    //     	)
 //    //     );
	// }

	

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

	function list_get() {		
		$this->db->select('table_schema, data_length, index_length');
		$this->db->from('information_schema.TABLES');
		$this->db->group_by('table_schema');

		$result = $this->db->get();
		foreach($result->result() as $row) {
			$data[] = array(
				'database' => $row->table_schema,
				'size' => ($row->data_length + $row->index_length) / 1024/1024
			);
		}
		$this->response($data, 200);
	}

	function connection_get() {
		$this->db->select('connections.inst_database, connections.institute_id, institutes.id, institutes.name, institutes.telephone');
		$this->db->from('connections');
		$this->db->join('institutes', 'institutes.id = connections.institute_id');
		$query = $this->db->get();

		foreach($query->result() as $row) {
			$data[] = array('name' => $row->name, 'db' => $row->inst_database, 'tel'=> $row->telephone);
		}
		$this->response($data, 200);
	}
}