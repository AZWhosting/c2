<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Institutes extends REST_Controller {
	public function index_get() {
		$requested_data = $this->get("filter");
		$filters = $requested_data['filters'];
		$limit = $this->get('limit') ? $this->get('limit'): 50;
		$offset= $this->get('offset')? $this->get('offset'): null;

		$institute = new Institute();
		$institute->limit($limit, $offset);
		if(isset($filters)) {
			foreach($filters as $f) {
				$institute->where($f['field'], $f['value']);
			}
			// $institute->get_paged($page, $limit);
			$institute->get();
			if($institute->exists()) {
				foreach($institute as $i) {
					// $industry = $i->industry->get();
					$data[] = array(
						'id' => $i->id,
						'name' => $i->name,
						'email'=> $i->email,
						'address'=> $i->address,
						'logo' => $i->logo,
						'description' => $i->description,
						'country' => array('id' => $i->country_id),
						'province' => array('id' => $i->province_id),
						'industry'=> array('id' => $i->industry_id),
						'tax_regime' => $i->tax_regime,
						'type' => array('id' => $i->type_id),
						'locale' => $i->locale,
						'report_locale' => $i->report_locale,
						'vat_no' => $i->vat_number,
						'date_founded' => $i->year_founded,
						'fiscal_date' => $i->fiscal_date,
						'financial_year' => $i->financial_year,
						'financial_report_date' => $i->financial_report_date,
						'legal_name' => $i->legal_name,
						'is_local' => $i->is_local === 'true' ? TRUE:FALSE
					);
				}
				$this->response(
					array('error' => false, 'msg' => 'data found', 'results'=>$data, 'count'=>count($data)), 200);
			} else {		
				$this->response(
					array('error' => false, 'msg' => 'no user found', 'results'=>array(), 'count'=>0), 200);
			}	
		} else {
			$this->response(array('error' => true, 'msg' => 'no filter', 'results'=>array(), 'count'=>0), 200);
		}
	}

	public function index_post() {
		$posted_data = json_decode($this->post('models'));

		foreach($posted_data as $d) {
			$company = new Institute();
			$company->industry_id = $d->industry->id;
			$company->name = $d->name;
			$company->email= $d->email;
			$company->address = $d->address;
			$company->logo = $d->logo;
			$company->description = $d->description;
			$company->country_id = $d->country->id;
			$company->province_id = $d->province->id;
			$company->type_id = $d->type->id;
			$company->year_founded = $d->date_founded;
			$company->legal_name = $d->legal_name;
			$company->fiscal_date = $d->fiscal_date;
			$company->locale = $d->locale->locale;
			$company->tax_regime = $d->tax_regime->code;
			$company->vat_number = $d->vat_no;
			$company->report_locale = $d->report_locale->locale;
			$company->is_local = $d->is_local;
			$company->deleted = 'false';

			$login = new Login();
			$login->where('id', $d->login)->get();
			$module = new Module();
			$module->where('is_core', 'true')->get();
			if($company->save(array($login, $module))) {
				$data[] = array(
					'id' => $company->id,
					'name' => $company->name,
					'email'=> $company->email,
					'address'=> $company->address,
					'logo' => $company->logo,
					'description' => $company->description,
					'country' => array('id' => $company->country_id),
					'province' => array('id' => $company->province_id),
					'industry'=> array('id' => $company->industry_id),
					'tax_regime' => $company->tax_regime,
					'type' => array('id' => $company->type_id),
					'locale' => $company->locale,
					'report_locale' => $company->report_locale,
					'vat_no' => $company->vat_number,
					'date_founded' => $company->year_founded,
					'fiscal_date' => $company->fiscal_date,
					'financial_year' => $company->financial_year,
					'financial_report_date' => $company->financial_report_date,
					'legal_name' => $company->legal_name,
					'is_local' => $company->is_local === 'true' ? TRUE:FALSE
				);
			}
		}
		if(isset($data)) {
			$this->response(
				array(
					'error'  => false,
					'count' => count($data),
					'results'=> $data
				),
				201
			);
		} else {
			$this->response(
				array(
					'error'  => true,
					'count' => 0,
					'results'=> array()					
				),
				200
			);
		}
	}

	public function index_put() {
		$posted_data = json_decode($this->put('models'));

		foreach($posted_data as $d) {
			$company = new Institute();
			$company->where('id', $d->id)->get();
			if($company->exists()) {
				$company->industry_id = $d->industry->id;
				$company->name = $d->name;
				$company->email= $d->email;
				$company->address = $d->address;
				$company->logo = $d->logo;
				$company->description = $d->description;
				$company->country_id = $d->country->id;
				$company->province_id = $d->province->id;
				$company->type_id = $d->type->id;
				$company->year_founded = $d->date_founded;
				$company->legal_name = $d->legal_name;
				$company->fiscal_date = $d->fiscal_date;
				$company->locale = $d->locale;
				$company->tax_regime = $d->tax_regime;
				$company->vat_number = $d->vat_no;
				$company->logo = $d->logo;
				$company->financial_year = $d->financial_year;
				$company->is_local = $d->is_local;
				$company->report_locale = $d->report_locale;
				$company->type_id = $d->type->id;
				if($company->save()){
					$data[] = $d;
				}
			}
		}
		if(isset($data)) {
			$this->response(
				array(
					'error'  => false,
					'count' => count($data),
					'results'=> $data,
				),
				201
			);
		} else {
			$this->response(
				array(
					'error'  => true,
					'count' => 0,
					'results'=> array()					
				),
				200
			);
		}
	}

	public function index_delete() {
		$posted_data = json_decode($this->delete('models'));

		foreach($posted_data as $d) {
			$company = new Institute();
			$company->where('id', $d->id)->get();
			$company->deleted = 'true';
			if($company->save()){
				$data[] = $d;
			}
		}
		if(isset($data)) {
			$this->response(
				array(
					'error'  => false,
					'count' => count($data),
					'results'=> $data,
					'upload'=> $this->upload->data()
				),
				201
			);
		} else {
			$this->response(
				array(
					'error'  => true,
					'count' => 0,
					'results'=> array()					
				),
				200
			);
		}
	}

	public function types_get() {
		$requested_data = $this->get("filter");
		$filters = $requested_data['filters'];

		$types = new Institute_type();
		// foreach($filters as $filter) {
		// 	$types->where($filter['field'], $filter['value']);
		// }

		$types->get();
		if($types->exists()) {
			foreach($types as $type) {
				$data[] = array(
					'id'		=> $type->id,
					'country_id' 	=> $type->country_id,
					'name' 		=> $type->type
				);
			}
			$this->response(array('results' => $data, 'count' => count($data), 'error' => FALSE), 200);
		} else {
			$this->response(array('results' => array(), 'count' => 0, 'error' => TRUE), 200);
		}
	}

	public function activateWater_post() {
		$request = json_decode($this->post('models'));
		$this->load->dbforge();
		if(isset($request)) {
			foreach($request as $r) {
				$conn = new Connection();
				$conn->where('institute_id', $r->institute)->get();
				$data = 'use ' . $conn->inst_database;
				$this->db->query($data);
				$this->db->trans_start();
				// contact_utility
				$this->db->query("DROP TABLE IF EXISTS `contact_utilities`;");
				$this->db->query("CREATE TABLE `contact_utilities` (`id` int(11) unsigned NOT NULL AUTO_INCREMENT,`contact_id` int(11) DEFAULT NULL,`type` enum('w','e','g') DEFAULT 'w' COMMENT 'w = water, e = electricity, g = gas',`code` int(11) DEFAULT NULL,`location_id` int(11) DEFAULT NULL,`branch_id` int(11) DEFAULT NULL,`id_card` varchar(15) DEFAULT NULL,`family_member` int(11) DEFAULT NULL,`occupation` varchar(255) DEFAULT NULL,`abbr` varchar(15) DEFAULT NULL,PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

				// branches
				$this->db->query("CREATE TABLE IF NOT EXISTS `branches` (`id` int(11) unsigned NOT NULL AUTO_INCREMENT, `type` char(1) DEFAULT 'w', `number` varchar(20) DEFAULT NULL, `name` varchar(100) DEFAULT NULL, `abbr` varchar(10) DEFAULT NULL, `representative` varchar(100) DEFAULT NULL, `currency_id` varchar(10) DEFAULT NULL, `status` varchar(10) DEFAULT NULL, `expire_date` date DEFAULT NULL, `max_customer` int(10) DEFAULT NULL, `description` varchar(300) DEFAULT NULL, `address` varchar(200) DEFAULT NULL, `province` varchar(100) DEFAULT NULL, `district` varchar(200) DEFAULT NULL, `email` varchar(100) DEFAULT NULL, `mobile` varchar(100) DEFAULT NULL, `telephone` varchar(100) DEFAULT NULL, `term_of_condition` varchar(500) DEFAULT NULL, `created_at` date DEFAULT NULL, `updated_at` date DEFAULT NULL, PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;");
				// $this->db->query("LOCK TABLES `branches` WRITE;");

				$this->db->query("CREATE TABLE IF NOT EXISTS `installment_schedules` (`id` int(11) unsigned NOT NULL AUTO_INCREMENT, `installment_id` int(11) NOT NULL, `date` date NOT NULL, `amount` decimal(15,2) NOT NULL DEFAULT '0.00', `invoiced` tinyint(1) NOT NULL DEFAULT '0', `created_at` date NOT NULL, `updated_at` date DEFAULT NULL, PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;");
				// $this->db->query("LOCK TABLES `branches` WRITE;");

				$this->db->query("CREATE TABLE IF NOT EXISTS `plans` (`id` int(11) unsigned NOT NULL AUTO_INCREMENT, `currency_id` int(11) DEFAULT NULL, `name` varchar(50) DEFAULT NULL, `code` varchar(10) DEFAULT NULL, `type` varchar(1) DEFAULT '', `is_deleted` int(11) DEFAULT '0', `created_at` date DEFAULT NULL, `updated_at` date DEFAULT NULL, PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;");

				$this->db->query("CREATE TABLE IF NOT EXISTS `plan_items` (`id` int(11) unsigned NOT NULL AUTO_INCREMENT, `tariff_id` int(11) unsigned DEFAULT '0', `currency_id` int(11) DEFAULT NULL, `name` varchar(50) DEFAULT NULL, `is_flat` int(11) DEFAULT NULL, `type` enum('tariff','deposit','service','exemption','maintenance','installment') NOT NULL DEFAULT 'tariff', `unit` varchar(10) NOT NULL, `amount` decimal(11,2) NOT NULL, `usage` int(15) unsigned NOT NULL, `account_id` int(11) DEFAULT '0', `is_active` tinyint(1) DEFAULT '1', `is_deleted` tinyint(1) DEFAULT '0', PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;");

				$this->db->query("CREATE TABLE IF NOT EXISTS `plan_items_plans` (`id` int(11) unsigned NOT NULL AUTO_INCREMENT, `plan_id` int(11) DEFAULT NULL, `plan_item_id` int(11) DEFAULT NULL, PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;");

				$this->db->query("DROP TABLE IF EXISTS `locations`;");
				$this->db->query("CREATE TABLE `locations` (`id` int(11) unsigned NOT NULL AUTO_INCREMENT, `branch_id` int(11) DEFAULT NULL, `main_bloc` int(11) DEFAULT '0', `company_id` int(11) unsigned NOT NULL DEFAULT '0', `type` char(1) NOT NULL DEFAULT '0' COMMENT 's-sme, e-electricity, w-water', `name` varchar(255) NOT NULL DEFAULT '', `abbr` varchar(255) DEFAULT NULL, `created_at` date DEFAULT NULL, `updated_at` date DEFAULT NULL, PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;");

				$this->db->query("DROP TABLE IF EXISTS `reconciles`;");
				$this->db->query("CREATE TABLE `reconciles` ( `id` int(11) unsigned NOT NULL AUTO_INCREMENT, `cashier` int(11) unsigned NOT NULL DEFAULT '0', `memo` tinytext, `reconciled_date` int(11) NOT NULL, `status` tinyint(1) NOT NULL DEFAULT '0', `currencies` tinytext, `created_at` int(11) DEFAULT NULL, `updated_at` datetime DEFAULT NULL, PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;");

				$this->db->query("CREATE TABLE IF NOT EXISTS `reconcile_items` (`id` int(11) unsigned NOT NULL AUTO_INCREMENT, `reconcile_id` int(11) unsigned NOT NULL DEFAULT '0', `denomination` int(11) NOT NULL DEFAULT '0', `currency_id` int(11) DEFAULT '0', `note` int(11) DEFAULT '0', `unit` int(11) DEFAULT '0', `status` tinyint(1) DEFAULT '1' COMMENT '0 deleted after editing, 1 is new not edited', `created_at` int(11) DEFAULT NULL, `updated_at` int(11) DEFAULT NULL, PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;");

				$this->db->query("DROP TABLE IF EXISTS `installments`;");
				$this->db->query("CREATE TABLE `installments` (`id` int(11) unsigned NOT NULL AUTO_INCREMENT, `biller_id` int(11) unsigned NOT NULL DEFAULT '0', `meter_id` int(11) unsigned NOT NULL DEFAULT '0', `start_month` date NOT NULL, `percentage` decimal(4,2) DEFAULT '0.00', `amount` decimal(30,2) NOT NULL DEFAULT '0.00', `period` int(11) NOT NULL DEFAULT '0', `payment_number` int(11) NOT NULL DEFAULT '0', `paid_in_full` tinyint(1) NOT NULL DEFAULT '0', `updated_at` date DEFAULT NULL, `created_at` date DEFAULT NULL, PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;");

				$this->db->query("use banhji");
				$inst = new Institute(null);
				$inst->where('id', $r->institute)->get();
				$module = new Module(null);
				$module->where('id', 12)->get();
				$module->save($inst);
				$user = new User(null);

				$fx = new Role(null);
				$fx->get(); 

				$user->where('id', $r->user)->get();
				$user->save($fx->all, $module);

				$this->db->trans_complete();
				if($this->db->trans_status() === FALSE) {
					$this->response(array('results'=> array(), 'msg'=>'error activated.'), 500);
				} else {
					$this->response(array('results'=> array(), 'msg'=>'successfully activated.'), 201);
				}
			}
		}
					
	}
}