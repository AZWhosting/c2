<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Banhji extends REST_Controller {
	private $user = null;
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		$this->entity = $this->input->get_request_header('Entity');
		$this->user   = $this->input->get_request_header('User');
		$this->company= null;
		// $login = new Login();
		// $login->where('id', $this->user)->get();
		// if($login->exists()) {
		// 	$company = $login->institute->get();
		// 	$this->company = $company->id;
		// }
	}

	public function users_get() {
		$requested_data = $this->get('filter');
		$filters = $requested_data['filters'];
		$limit = $this->get('limit') !== false ? $this->get('limit') : 1000;
		$page = $this->get('page') !== false ? $this->get('page') : 1;

		$institute = new Institute();
		// if(isset($filters)) {
		// 	foreach($filters as $f) {
		// 		$institute->where($f['field'], $f['value']);
		// 	}
		// } else {
			$institute->where('id', $this->company);
		// }
		$institute->get();
		if($institute->exists()) {
			$logins = $institute->login->get();

			foreach($logins as $u) {
				$perm = $u->permission->get();
				$data[] = array(
					'id' 		=> $u->id,
					'username'  => $u->username,
					'first_name'=> $u->first_name,
					'last_name' => $u->last_name,
					'password'  => "*******",
					'permission'=> array(
						'id' 	=> $perm->id,
						'name' 	=> $perm->name
					)

				);
			}
		}

		if($data) {
			$this->response(
				array(
					'error'  => false,
					'count' => count($data),
					'results'=> $data

				),
				200
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

	public function users_put() {
		$requested_data = json_decode($this->put('models'));
		foreach($requested_data as $r) {
			// permission
			$permission = new Permission();
			$permission->where('id', $r->permission->id)->get();
			$login = new Login();
			$login->where('id', $r->id)->get();
			if($login->save($permission)){
				$data[] = array(
					'id' 		=> $login->id,
					'username'  => $login->username,
					'password'  => "*******",
					'permission'=> array(
						'id' 	=> $permission->id,
						'name' 	=> $permission->name
					)
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
				200
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

	public function users_post() {
		$requested_data = json_decode($this->post('models'));
		foreach($requested_data as $r) {
			// permission
			$permission = new Permission();
			$permission->where('id', $r->permission->id)->get();
			$institute = new Institute();
			$institute->where('id', $this->company)->get();
			$login = new Login();
			$login->where('username', $r->username)->get();
			if($login->exists()) {
				if($login->save($institute)){
					$data[] = array(
						'id' 		=> $login->id,
						'username'  => $login->username,
						'password'  => "*******",
						'permission'=> array(
							'id' 	=> $permission->id,
							'name' 	=> $permission->name
						)
					);
				}
			} else {
				$login->username = $r->username;
				$login->hashedPassword = hash('sha512', $this->config->item('encryption_key').$r->password);
				if($login->save(array($institute, $permission))){
					$data[] = array(
						'id' 		=> $login->id,
						'username'  => $login->username,
						'password'  => "*******",
						'permission'=> array(
							'id' 	=> $permission->id,
							'name' 	=> $permission->name
						)
					);
				}
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

	public function users_delete() {
		$requested_data = json_decode($this->delete('models'));
		foreach($requested_data as $r) {
			// permission
			$login = new Login();
			$login->where('id', $r->id)->get();
			$institute = $login->institute->get();
			$temp = array('id'=>$login->id);
			if($login->delete($institute)){
				$data[] = $temp;
			}
		}
		if(isset($data)) {
			$this->response(
				array(
					'error'  => false,
					'count' => count($data),
					'results'=> $data

				),
				200
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

	// Company section
	public function company_get() {
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

	public function company_post() {
		$posted_data = json_decode($this->post('models'));

		foreach($posted_data as $d) {
			$company = new Institute();
			$company->industry_id = $d->industry->id;
			$company->name = $d->name;
			$company->email= $d->email;
			$company->address = $d->address;
			// $company->logo = $d->logo;
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

	public function company_put() {
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

	public function company_delete() {
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

	// role
	public function roles_get() {
		$permission = new Permission();
		$permission->get_iterated();

		foreach($permission as $perm) {
			$data[] = array(
				'id' 	=> $perm->id,
				'name' 	=> $perm->name
			);
		}

		$this->response(
			array(
				'error'  => false,
				'count' => count($data),
				'results'=> $data

			),
			200
		);
	}

	public function roles_put() {}

	public function roles_post() {
		$models = json_decode($this->post('models'));
		$r = new Role();
		foreach($models as $model) {
			$r->name = $model->name;
			$r->description = $model->description;
			if($r->save()) {
				$data[] = array(
					'id' => $r->id,
					'name'=>$r->name,
					'description'=>$r->description
				);
			}
		}
	}

	public function roles_delete() {}

	// add role to user
	public function addroles_post() {}
	public function addroles_put() {}
	public function addroles_delete() {}

	public function password_post() {
		$requested_data = json_decode($this->post('models'));
		foreach($requested_data as $r) {
			$login = new Login();
			$login->where('username', $r->username)->get();
			if($login->exists()) {
				$login->hashedPassword = hash('sha512', $this->config->item('encryption_key').$r->password);
				if($login->save()){
					$this->response(
						array(
							'error'  => false,
							'count' => 1,
							'results'=> array()
						),
						201
					);
				} else {
					$this->response(
						array(
							'error'  => true,
							'count' => 1,
							'results'=> array()

						),
						200
					);
				}
			} else {
				$this->response(
					array(
						'error'  => true,
						'count' => 1,
						'results'=> array()

					),
					200
				);
			}
		}
	}

	public function industry_get() {
		$industry = new Industry();
		$industry->get();
		foreach($industry as $i) {
			$data[] = array(
				'id' => $i->id,
				'code' => $i->code,
				'name' => $i->name
			);
		}
		$this->response(
			array(
				'error'  => false,
				'count' => count($data),
				'results'=> $data

			),
			200
		);
	}

	public function types_get() {
		$industry = new Institute_type();
		$industry->get();
		foreach($industry as $i) {
			$data[] = array(
				'id' => $i->id,
				'country' => $i->country_id,
				'name' => $i->type
			);
		}
		$this->response(
			array(
				'error'  => false,
				'count' => count($data),
				'results'=> $data

			),
			200
		);
	}

	public function countries_get() {
		$country = new Country();
		$country->where('active', 1);
		$country->get();
		foreach($country as $i) {
			$data[] = array(
				'id' => $i->id,
				'code' => $i->code,
				'name' => $i->name
			);
		}
		$this->response(
			array(
				'error'  => false,
				'count' => count($data),
				'results'=> $data

			),
			200
		);
		// $this->response(array('error'=>FALSE,'count'=>1, 'results'=> array('test'=>'good')), 200);
	}

	public function provinces_get() {
		$industry = new Province();
		$industry->get();
		foreach($industry as $i) {
			$data[] = array(
				'id' => $i->id,
				'country' => $i->country_id,
				'local' => $i->name_local,
				'english' => $i->name_en
			);
		}
		$this->response(
			array(
				'error'  => false,
				'count' => count($data),
				'results'=> $data

			),
			200
		);
	}

	public function logo_post() {
		$files = $_FILES['userFile'];
		if(isset($files['name'])) {
			if($files['type'] === "image/jpeg" || $files['type'] === "image/jpg" || $files['type'] === "image/png") {
				if($files['size'] < 3000000) {
					$type = explode(".", $files['name']);
					$sourcePath = $files['tmp_name'];
					$fileName = 'logo_'.uniqid().'.'.$type[1];
					$targetPath = './uploads/logo/'.$fileName;
					if(move_uploaded_file($sourcePath,$targetPath)){
						// crop image
						$config['image_library'] = 'gd2';
						$config['source_image']	= './uploads/logo/'.$fileName;
						$config['quality'] = "97%";
						$config['create_thumb'] = FALSE;
						$config['master_dim'] = 'auto';
						$config['maintain_ratio'] = TRUE;
						$config['width']	= 200;
						$config['height']	= 200;

						$this->load->library('image_lib', $config);

						$this->image_lib->resize();

						$this->response(
							array(
								'error'  => false,
								'count' => 1,
								'msg' => 'uploaded.',
								'results'=> array(
									'error' => 0,
									'url' => "uploads/logo/".$fileName
								)
							),
							200
						);
					} else {
						$this->response(
							array(
								'error'  => false,
								'count' => 1,
								'msg' => 'Exceed max size limit.',
								'results'=> array('url' => $files['name'])
							),
							200
						);
					}
				} else {
					$this->response(
						array(
							'error'  => true,
							'count' => 1,
							'msg' => 'Exceed max size limit.'.$files['name'],
							'results'=> array()
						),
						200
					);
				}
			} else {
				$this->response(
					array(
						'error'  => true,
						'count' => 1,
						'msg' => 'picture type not allowed (only jpeg, jpg or png is allowed).',
						'results'=> array()
					),
					200
				);
			}
		} else {
			$this->response(
				array(
					'error'  => false,
					'count' => 1,
					'results'=> $files
				),
				200
			);
		}
			$this->response(
				array(
					'error'  => false,
					'count' => 1,
					'results'=> array()
				),
				200
			);
	}

	public function signup_post() {
		$request = json_decode($this->post('models'));

		foreach($request as $r) {
			$user = new Login();

			$user->where('username', $r->email)->get();
			if($user->exists()) {
				$this->response(array('results'=>array(), 'msg'=>'Email existed.', 'err'=> TRUE), 200);
			} else {
				// $role = new Permission ();
				// $role->where('id', 1)->get();
				$user->username = $r->email;
				$user->hashedPassword = hash('sha512', $this->config->item('encryption_key').$r->password);
				$user->first_name = $r->firstName;
				$user->last_name = $r->lastName;
				if($user->save()) {

				}
			}
		}
		$this->response($request, 201);
	}

	public function createDB_post() {
		$request = json_decode($this->post('models'));

		// todo: add user to institute during creation
		foreach($request as $r) {
			// find user
			$inst = new Institute();
			$inst->select('id, name, country_id');
			$inst->where('id', $r->institute);
			$inst->include_related('monetary', array('locale'));
			$inst->get();
			$data = array();
			if($inst->exists()) {
				// create connection data for this inst
				$country = new Country();
				$country->select('code');
				$country->where('id', $inst->country_id)->get();
				
				$tz = new Timezone();
				$tz->where('country_code', strtoupper($country->code));
				$tz->get();
				
				$now = new DateTime();
				$db_name = 'db_'. $now->getTimestamp();
				$conn = new Connection();
				$conn->institute_id = $inst->id;
				$conn->server_name  = 'banhji-acct.cwxbgxgq7thx.ap-southeast-1.rds.amazonaws.com';
				$conn->username 	= 'mightyadmin';
				$conn->password 	= 'banhji2016';
				$conn->time_zone 	= $tz->timezonename;
				$conn->inst_database= strtolower($db_name);
				if($conn->save()) {
					// create database base on connection name
					$this->load->dbforge();
					if($this->dbforge->create_database($conn->inst_database)) {
						// create database
						// $this->_install($conn->inst_database);
						// get file based on industry id
						$data = 'use ' . $conn->inst_database;
						$files = new Dbfile();
						$industryID = $inst->industry_id;
						if($inst->industry_id == 94) {
							$files->where('industry_id', $inst->industry_id);
						} else {
							$files->where('industry_id', 0);
						}
						$files->where('country_id', $inst->country_id)->get();
						
						// $files->get();
						$my_table = new Systemtable();
						$my_table->get();
						foreach($my_table as $t) {
							$this->db->query($data);
							$query = $this->db->query($t->content);
						}

						foreach($files as $f) {
							$this->db->query($data);
							$sql = $this->db->query($f->statement);
						}
						// add currency based on company to contact
						$this->db->where('locale <>', "");
						$this->db->update('contacts', array('locale'=> "$inst->monetary_locale"));

						// add currency based on company to inventory
						$this->db->where('locale <>', "");
						$this->db->update('items', array('locale'=> "$inst->monetary_locale"));

						$this->db->where('locale', "$inst->monetary_locale");
						$this->db->update('currencies', array('status' => 1));
						// add currency to rate
						$this->db->insert('currency_rates', array(
							'currency_id' => "$inst->monetary_id", 
							'user_id' => 0, 
							'rate' => 1, 
							'source' => '', 
							'method' => 'Manual', 
							'date' => date('Y-m-d'), 
							'is_system' => 1, 
							'created_at' => date('Y-m-d'),
							'locale'=> "$inst->monetary_locale"
						));
					}
				}

				// fillin dafault data
				$data = array(
					'institute' => $inst->name,
					'databaseName' => $conn->inst_name
				);
			}
		}
		if(count($data) > 0) {
			$this->response(array(
				'error' => FALSE,
				'msgCode' => 2001,
				'msg' => 'Comany created',
				'results' => $data,
				'count' => count($data)
			),
			201);
		} else {
			$this->response(array(
				'error' => TRUE,
				'msgCode' => 2000,
				'msg' => 'Comany created',
				'results' => array(),
				'count' => 0
			),
			201);
		}
	}

	private function _install($data_name) {
		$data = 'use ' . $data_name;
		$this->db->query("$data");
		$acTypes = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 45
			),
			'name_en' => array(
				'type' => 'VARCHAR',
				'constraint' => '45'
			),
			'nature' => array(
				'type' => 'ENUM("Dr", "Cr")',
				'default' => 'Dr',
				'null' => FALSE
				),
			'cash_flow_source' => array(
				'type' => 'ENUM("Operating","Investing","Financing")',
				'default' => 'Operating',
				'null' => FALSE
			),
			'financial_statement' => array(
				'type' => 'VARCHAR',
				'constraint' => 5
			),
			'parent_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'default' => 0
			),
			'created_at' => array(
				'type' => 'DATE'
			),
			'updated_at' => array(
				'type' => 'DATE'
			)
		);
		$this->dbforge->add_field($acTypes);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('account_types', TRUE);

		$accounts= array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'account_type_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'parent_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'default' => 0
			),
			'code' => array(
				'type' => 'VARCHAR',
				'constraint' => 10
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 45
			),
			'name_en' => array(
				'type' => 'VARCHAR',
				'constraint' => 45
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => 255
			),
			'is_taxable' => array(
				'type' => 'TINYINT',
				'constraint' => 1
			),
			'active' => array(
				'type' => 'ENUM("true","false")',
				'default' => 'true',
				'null' => FALSE
			),
			'created_at' => array(
				'type' => 'DATE'
			),
			'updated_at' => array(
				'type' => 'DATE'
			)
		);
		$this->dbforge->add_field($accounts);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('accounts', TRUE);

		$contactTypes = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'parent_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'default' => 0
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 150
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'default' => 'Here is the description of the type'
			)
		);
		$this->dbforge->add_field($contactTypes);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('contact_types', TRUE);

		$contacts = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'company_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'currency_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'user_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'contact_type_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'number' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
			),
			'surname' => array(
				'type' => 'VARCHAR',
				'constraint' => 255
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 255
			),
			'gender' => array(
				'type' => 'ENUM("M", "F")',
				'default' => "M"
			),
			'dob' => array(
				'type' => 'DATE'
			),
			'pob' => array(
				'type' => 'VARCHAR',
				'constraint' => 255
			),
			'family_member' => array(
				'type' => 'TINYINT',
				'constraint' => 2
			),
			'id_number' => array(
				'type' => 'VARCHAR',
				'constraint' => 20
			),
			'phone' => array(
				'type' => 'VARCHAR',
				'constraint' => 20
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => 250
			),
			'website' => array(
				'type' => 'VARCHAR',
				'constraint' => 255
			),
			'job' => array(
				'type' => 'VARCHAR',
				'constraint' => 255
			),
			'company' => array(
				'type' => 'VARCHAR',
				'constraint' => 255
			),
			'company_en' => array(
				'type' => 'VARCHAR',
				'constraint' => 255
			),
			'business_type_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'vat_no' => array(
				'type' => 'VARCHAR',
				'constraint' => 20
			),
			'image_url' => array(
				'type' => 'TINYTEXT'
			),
			'memo' => array(
				'type' => 'TINYTEXT'
			),
			'address' => array(
				'type' => 'VARCHAR',
				'constraint' => 255
			),
			'payment_term_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'credit_limit' => array(
				'type' => 'DECIMAL',
				'constraint' => '30,15'
			),
			'registered_date' => array(
				'type' => 'DATE'
			),
			'payment_main_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'payment_second_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'bank_id'=> array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'name_on_cheque' => array(
				'type' => 'VARCHAR',
				'constraint' => 250
			),
			'bank_account_number' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'default' => '000000000000000000'
			),
			'bank_account_name' => array(
				'type' => 'VARCHAR',
				'constraint' => 250
			),
			'bank_address' => array(
				'type' => 'VARCHAR',
				'constraint' => 250
			),
			'is_local' => array(
				'type' => 'ENUM("true","false")',
				'default' => 'true',
				'null' => FALSE
			),
			'status' => array(
				'type' => 'TINYINT',
				'constraint' => 2
			),
			'deleted' => array(
				'type' => 'ENUM("true","false")',
				'default' => 'false',
				'null' => FALSE
			),
			'created_at' => array(
				'type' => 'DATE'
			),
			'updated_at' => array(
				'type' => 'DATE'
			)
		);
		$this->dbforge->add_field($contacts);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('contacts', TRUE);

		$banks = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 250
			),
			'swift_code' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
			),
			'deleted' => array(
				'type' => 'ENUM("true","false")',
				'default' => 'false',
				'null' => FALSE
			),
			'created_at' => array(
				'type' => 'DATE'
			),
			'updated_at' => array(
				'type' => 'DATE'
			)
		);
		$this->dbforge->add_field($banks);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('banks', TRUE);

		$paymentTerms = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
			),
			'term' => array(
				'type' => 'TINYINT',
				'constraint' => 8
			),
			'discount_percentage' => array(
				'type' => 'DECIMAL(10,2)',
				'default' => 0.00
			),
			'updated_at' => array(
				'type' => 'DATE'
			),
			'created_at' => array(
				'type' => 'DATE'
			)
		);
		$this->dbforge->add_field($paymentTerms);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('payment_terms', TRUE);

		$paymentMethods = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 90
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => 255
			),
			'created_at' => array(
				'type' => 'DATE'
			),
			'updated_at' => array(
				'type' => 'DATE'
			)
		);
		$this->dbforge->add_field($paymentMethods);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('payment_methods', TRUE);

		$itemTypes = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 50
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
			),
			'created_at' => array(
				'type' => 'DATE'
			),
			'updated_at' => array(
				'type' => 'DATE'
			)
		);
		$this->dbforge->add_field($itemTypes);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('item_types', TRUE);

		$measurements = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 255
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => 500
			)
		);
		$this->dbforge->add_field($measurements);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('measurements', TRUE);

		$items = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'company_id'=> array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'category_id'=> array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'item_type_id'=> array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'measurement_id'=> array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'brand_id'=> array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'main_id'=> array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'sku' => array(
				'type' => 'VARCHAR',
				'constraint' => 50
			),
			'supplier_code' => array(
				'type' => 'VARCHAR',
				'constraint' => 255
			),
			'color_code' => array(
				'type' => 'VARCHAR',
				'constraint' => 255
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 255
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => 500
			),
			'cost' => array(
				'type' => 'DECIMAL',
				'constraint' => '30,25',
				'default' => 0.00,
				'null' => FALSE
			),
			'on_hand' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'order_point' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'income_account_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'cogs_account_id'=> array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'inventory_account_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'preferred_vendor_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'image_url' => array(
				'type' => 'VARCHAR',
				'constraint' => 500
			),
			'favorite' => array(
				'type' => 'TINYINT',
				'constraint' => 2,
				'unsigned' => TRUE
			),
			'status' => array(
				'type' => 'TINYINT',
				'constraint' => 2,
				'unsigned' => TRUE
			),
			'deleted' => array(
				'type' => 'ENUM("true","false")',
				'default' => 'false',
				'null' => FALSE
			),
			'created_at' => array(
				'type' => 'DATE'
			),
			'updated_at' => array(
				'type' => 'DATE'
			)
		);
		$this->dbforge->add_field($items);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('items', TRUE);

		$currencies = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'code' => array(
				'type' => 'VARCHAR',
				'constraint' => 5
			),
			'country' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
			),
			'locale' => array(
				'type' => 'VARCHAR',
				'constraint' => 10
			),
			'rate' => array(
				'type' => 'DECIMAL',
				'constraint' => '30,15',
				'default' => 0.00,
				'null' => FALSE
			),
			'enabled' => array(
				'type' => 'ENUM("true","false")',
				'default' => 'true',
				'null' => FALSE
			),
			'created_at' => array(
				'type' => 'DATE'
			),
			'updated_at' => array(
				'type' => 'DATE'
			)
		);
		$this->dbforge->add_field($currencies);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('currencies', TRUE);

		$transactions = array(
			'id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'company_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'location_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'contact_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'payment_term_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'payment_method_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'reference_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'account_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'vat_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'user_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'number' => array(
				'type' => 'VARCHAR',
				'constraint' => 10
			),
			'reference_no' => array(
				'type' => 'VARCHAR',
				'constraint' => 10
			),
			'type' => array(
				'type' => 'ENUM("Invoice", "eInvoice", "Receipt", "SO", "Estimate", "GDN", "Notice", "PO", "GRN", "Purchase", "Expense", "Deposit", "eDeposit", "wDeposit", "Item_Adjustment", "Journal")'
			),
			'sub_total' => array(
				'type' => 'DECIMAL',
				'constraint' => '30,2',
				'default' => 0.00
			),
			'amount' => array(
				'type' => 'DECIMAL',
				'constraint' => '30,2',
				'default' => 0.00
			),
			'amount_paid' => array(
				'type' => 'DECIMAL',
				'constraint' => '30,2',
				'default' => 0.00
			),
			'deposit' => array(
				'type' => 'DECIMAL',
				'constraint' => '30,2',
				'default' => 0.00
			),
			'fine' => array(
				'type' => 'DECIMAL',
				'constraint' => '30,2',
				'default' => 0.00
			),
			'discount' => array(
				'type' => 'DECIMAL',
				'constraint' => '30,2',
				'default' => 0.00
			),
			'vat' => array(
				'type' => 'DECIMAL',
				'constraint' => '30,2',
				'default' => 0.00
			),
			'rate' => array(
				'type' => 'DECIMAL',
				'constraint' => '30,15',
				'default' => 0.00
			),
			'locale' => array(
				'type' => 'VARCHAR',
				'constraint' => 5,
				'null' => FALSE,
				'default' => 'us-US'
			),
			'month_of' => array(
				'type' => 'DATE'
			),
			'issued_date' => array(
				'type' => 'DATE'
			),
			'payment_date' => array(
				'type' => 'DATE'
			),
			'due_date' => array(
				'type' => 'DATE'
			),
			'deposit_date' => array(
				'type' => 'DATE'
			),
			'check_no'  => array(
				'type' => 'VARCHAR',
				'constraint' => 10
			),
			'segments' => array(
				'type' => 'VARCHAR',
				'constraint' => 500
			),
			'bill_to' => array(
				'type' => 'VARCHAR',
				'constraint' => 500
			),
			'ship_to' => array(
				'type' => 'VARCHAR',
				'constraint' => 500
			),
			'memo' => array(
				'type' => 'VARCHAR',
				'constraint' => 500
			),
			'memo2' => array(
				'type' => 'VARCHAR',
				'constraint' => 500
			),
			'status' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'default' => 0,
				'unsigned' => TRUE,
				'null' => FALSE
			),
			'print_count' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'printed_by' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'updated_by' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'deleted' => array(
				'type' => 'ENUM("true","false")',
				'default' => 'false',
				'null' => FALSE
			),
			'created_at' => array(
				'type' => 'DATE'
			),
			'updated_at' => array(
				'type' => 'DATE'
			)
		);
		$this->dbforge->add_field($transactions);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('transactions', TRUE);

		$transactionLines = array(
			'id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'transaction_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'measurement_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'item_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => 500
			),
			'on_hand' => array(
				'type' => 'DECIMAL(30,2)',
				'default' => 0.00
			),
			'on_po' => array(
				'type' => 'DECIMAL(30,2)',
				'default' => 0.00
			),
			'on_so' => array(
				'type' => 'DECIMAL(30,2)',
				'default' => 0.00
			),
			'quantity' => array(
				'type' => 'DECIMAL(30,2)',
				'default' => 0.00
			),
			'actual_quantity' => array(
				'type' => 'DECIMAL(30,2)',
				'default' => 0.00
			),
			'cost' => array(
				'type' => 'DECIMAL(30,2)',
				'default' => 0.00
			),
			'price' => array(
				'type' => 'DECIMAL(30,2)',
				'default' => 0.00
			),
			'price_avg' => array(
				'type' => 'DECIMAL(30,2)',
				'default' => 0.00
			),
			'amount' => array(
				'type' => 'DECIMAL(30,2)',
				'default' => 0.00
			),
			'rate' => array(
				'type' => 'DECIMAL(30,15)',
				'default' => 0.00
			),
			'locale' => array(
				'type' => 'VARCHAR',
				'constraint' => 5
			),
			'has_vat' => array(
				'type' => 'ENUM("true", "false")',
				'default' => 'false',
				'null' => FALSE
			),
			'movement' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'default' => 0
			),
			'created_at' => array(
				'type' => 'DATE'
			),
			'updated_at' => array(
				'type' => 'DATE'
			)
		);
		$this->dbforge->add_field($transactionLines);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('transaction_lines', TRUE);

		$depositLines = array(
			'id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'transaction_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'measurement_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'item_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => 500
			),
			'quantity' => array(
				'type' => 'DECIMAL(30,2)',
				'default' => 0.00
			),
			'amount' => array(
				'type' => 'DECIMAL(30,2)',
				'default' => 0.00
			),
			'rate' => array(
				'type' => 'DECIMAL(30,15)',
				'default' => 0.00
			),
			'locale' => array(
				'type' => 'VARCHAR',
				'constraint' => 5
			),
			'created_at' => array(
				'type' => 'DATE'
			),
			'updated_at' => array(
				'type' => 'DATE'
			)
		);
		$this->dbforge->add_field($depositLines);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('deposit_lines', TRUE);

		$expenseLines = array(
			'id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'transaction_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'account_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => 500
			),
			'amount' => array(
				'type' => 'DECIMAL(30,2)',
				'default' => 0.00
			),
			'rate' => array(
				'type' => 'DECIMAL(30,15)',
				'default' => 0.00
			),
			'has_vat' => array(
				'type' => 'ENUM("true","false")',
				'default' => 'false',
				'null' => FALSE
			),
			'locale' => array(
				'type' => 'VARCHAR',
				'constraint' => 5
			),
			'created_at' => array(
				'type' => 'DATE'
			),
			'updated_at' => array(
				'type' => 'DATE'
			)
		);
		$this->dbforge->add_field($expenseLines);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('expense_lines', TRUE);

		$journalLines = array(
			'id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'transaction_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'account_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'contact_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => 500
			),
			'reference_no' => array(
				'type' => 'VARCHAR',
				'constraint' => 500
			),
			'segments' => array(
				'type' => 'VARCHAR',
				'constraint' => 500,
			),
			'dr' => array(
				'type' => 'DECIMAL(30,2)',
				'default' => 0.00
			),
			'cr' => array(
				'type' => 'DECIMAL(30,2)',
				'default' => 0.00
			),
			'rate' => array(
				'type' => 'DECIMAL(30,15)',
				'default' => 0.00
			),
			'locale' => array(
				'type' => 'VARCHAR',
				'constraint' => 5
			),
			'created_at' => array(
				'type' => 'DATE'
			),
			'updated_at' => array(
				'type' => 'DATE'
			)
		);
		$this->dbforge->add_field($journalLines);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('journal_lines', TRUE);

		$winvoiceLines = array(
			'id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'transaction_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'meter_record_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => 500
			),
			'quantity' => array(
				'type' => 'DECIMAL(30,2)',
				'default' => 0.00
			),
			'price' => array(
				'type' => 'DECIMAL(30,2)',
				'default' => 0.00
			),
			'amount' => array(
				'type' => 'DECIMAL(30,2)',
				'default' => 0.00
			),
			'rate' => array(
				'type' => 'DECIMAL(30,15)',
				'default' => 0.00
			),
			'locale' => array(
				'type' => 'VARCHAR',
				'constraint' => 5
			),
			'type' => array(
				'type' => 'ENUM("tariff","maintenance","instatllment", "exemption", "exemptionMoney", "exemptionUsage","exemptionP")'
			),
			'movement' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'default' => '0'
			),
			'created_at' => array(
				'type' => 'DATE'
			),
			'updated_at' => array(
				'type' => 'DATE'
			)
		);
		$this->dbforge->add_field($winvoiceLines);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('winvoice_lines', TRUE);

		$einvoiceLines = array(
			'id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'transaction_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'meter_record_id' => array(
				'type'=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => 500
			),
			'quantity' => array(
				'type' => 'DECIMAL(30,2)',
				'default' => 0.00
			),
			'price' => array(
				'type' => 'DECIMAL(30,2)',
				'default' => 0.00
			),
			'amount' => array(
				'type' => 'DECIMAL(30,2)',
				'default' => 0.00
			),
			'rate' => array(
				'type' => 'DECIMAL(30,15)',
				'default' => 0.00
			),
			'locale' => array(
				'type' => 'VARCHAR',
				'constraint' => 5
			),
			'type' => array(
				'type' => 'ENUM("tariff","maintenance","instatllment", "exemption", "exemptionMoney", "exemptionUsage","exemptionP")'
			),
			'movement' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'default' => '0'
			),
			'created_at' => array(
				'type' => 'DATE'
			),
			'updated_at' => array(
				'type' => 'DATE'
			)
		);
		$this->dbforge->add_field($einvoiceLines);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('einvoice_line', TRUE);

		$segments = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'code_length' => array(
				'type' => 'TINYINT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 255
			),
			'active' => array(
				'type' => 'ENUM("true","false")',
				'default' => 'true',
				'null' => FALSE
			),
			'created_at' => array(
				'type' => 'DATE'
			),
			'updated_at' => array(
				'type' => 'DATE'
			)
		);
		$this->dbforge->add_field($segments);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('segments', TRUE);

		$segmentItems = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'segment_id' => array(
				'type' => 'INT',
				'constraint' => 11
			),
			'code' => array(
				'type' => 'VARCHAR',
				'constraint' => 20
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 255
			),
			'created_at' => array(
				'type' => 'DATE'
			),
			'updated_at' => array(
				'type' => 'DATE'
			)
		);
		$this->dbforge->add_field($segmentItems);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('segment_items', TRUE);
	}
}//End Of Class
