<?php

use \Mobiledrs\entities\patient_management\Type_visit_entity;

class Transaction extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/profile_model',
			'patient_management/transaction_model',
			'patient_management/type_visit_model',
			'patient_management/lab_orders_model',
			'provider_management/supervising_md_model'
		));
	}

	public function add(string $pt_patientID, string $is_ca = '')
	{
		$this->check_permission('add_tr');

		$record_params = [
			'joins' => [
				[
					'join_table_name' => 'home_health_care',
					'join_table_key' => 'home_health_care.hhc_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient.patient_hhcID',
					'join_table_type' => 'inner'
				]
			],
			'where' => [
				[
					'key' => 'patient_id',
					'condition' => '',
	        		'value' => $pt_patientID
        		]
			],
			'return_type' => 'row'
		];

		$records_params = [
			'where' => [
				[
					'key' => 'patient_transactions.pt_patientID',
					'condition' => '',
					'value' => $pt_patientID
				],
				[
					'key' => 'patient_transactions.pt_archive',
					'condition' => '=',
					'value' => NULL
				]
			],
			'where_in' => [
				'column' => 'patient_transactions.pt_tovID',
				'values' => (new Type_visit_entity())->get_visits_list(),
			]
		];

		if($is_ca == 'ca'){
			$records_params['where'][] = 
			[
				'key' => 'patient_transactions.is_ca',
				'condition' => '=',
				'value' => 1
			];
		} else {
			$records_params['where'][] = 
			[
				'key' => 'patient_transactions.is_ca',
				'condition' => '=',
				'value' => NULL
			];
		}

		$page_data['record'] = $this->profile_model->get_records_by_join($record_params);

		$page_data['supervisingMDs'] = $this->supervising_md_model->supervisingMD_records();
		
		$initial_followup_records = $this->transaction_model->records($records_params);
		$type_visits = $this->type_visit_model->records();

		$page_data['type_visit_entity'] = new \Mobiledrs\entities\patient_management\pages\Type_visit_entity(
			$initial_followup_records, $type_visits);


		if($is_ca == 'ca'){
			$this->twig->view('patient_management/transaction/ca/add', $page_data);
		} else {
			
			$this->twig->view('patient_management/transaction/add', $page_data);
		}
	}

	public function edit(string $pt_patientID, string $pt_id, string $is_ca = '')
	{
		$this->check_permission('edit_tr');

		$profile_params = [
			'joins' => [
				[
					'join_table_name' => 'home_health_care',
					'join_table_key' => 'home_health_care.hhc_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient.patient_hhcID',
					'join_table_type' => 'inner'
				]
			],
			'where' => [
				[
					'key' => 'patient_id',
					'condition' => '',
	        		'value' => $pt_patientID
        		]
			],
			'return_type' => 'row'
		];

		$transaction_params = [
			'joins' => [
				[
					'join_table_name' => 'provider',
					'join_table_key' => 'provider.provider_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_transactions.pt_providerID',
					'join_table_type' => 'left'
				]
			],
			'where' => [
				[
					'key' => 'pt_id',
					'condition' => '',
	        		'value' => $pt_id
        		]
			],
			'return_type' => 'row'
		];


		if($is_ca == 'ca'){
			$transaction_params['where'][] = 
			[
				'key' => 'patient_transactions.is_ca',
				'condition' => '=',
				'value' => 1
			];
		} else {
			$transaction_params['where'][] = 
			[
				'key' => 'patient_transactions.is_ca',
				'condition' => '=',
				'value' => NULL
			];
		}

		$hhc_params = [
			'joins' => [
				[
					'join_table_name' => 'home_health_care',
					'join_table_key' => 'home_health_care.hhc_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_transactions.patient_hhcID',
					'join_table_type' => 'left'
				]
			],
			'where' => [
				[
					'key' => 'pt_id',
					'condition' => '',
	        		'value' => $pt_id
        		]
			],
			'return_type' => 'row'
		];

		$page_data['hhcrecord'] = $this->transaction_model->get_records_by_join($hhc_params);
		$page_data['record'] = $this->profile_model->get_records_by_join($profile_params);
		$page_data['transaction'] = $this->transaction_model->get_records_by_join($transaction_params);
		$page_data['type_visits'] = (new Type_visit_entity())->filterRecords(
			$page_data['transaction']->pt_tovID,
			$this->type_visit_model->records()
		);

		$page_data['supervisingMDs'] = $this->supervising_md_model->supervisingMD_records();

	
		
		
		if($is_ca == 'ca'){
			$this->twig->view('patient_management/transaction/ca/edit', $page_data);
		} else {
			$this->twig->view('patient_management/transaction/edit', $page_data);
		}
	}

	private function upload_files($files)
	{
		$config = array(
			'upload_path'   => './uploads/',
			'allowed_types' => 'gif|jpg|png|pdf',      
		);

		$this->load->library('upload', $config);

		if(is_array($this->input->post('transaction_file') )){
			$filesArray = array_values(array_filter($this->input->post('transaction_file')));
		} else {
			$filesArray = array();
		}
		

		foreach ($files['name'] as $key => $image) {
			$_FILES['images[]']['name']= $files['name'][$key];
            $_FILES['images[]']['type']= $files['type'][$key];
            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['images[]']['error']= $files['error'][$key];
            $_FILES['images[]']['size']= $files['size'][$key];

            $fileName = str_replace(',', '',$image);


            $images[] = $fileName;

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);

			if ($this->upload->do_upload('images[]')) {
				$data = array('upload_data' => $this->upload->data());
                $filesArray[] = $data['upload_data']['file_name'];
			} else {
				$filesArray[] = 'error';
			}
		}

		return json_encode($filesArray);
	}

	public function save(string $page_type, string $pt_patientID = '', string $pt_id = '')
	{
		$this->check_permission('add_tr');

		$validation_group = 'patient_management/transaction/save';
		if ($this->input->post('pt_tovID') == Type_visit_entity::NO_SHOW ||
			$this->input->post('pt_tovID') == Type_visit_entity::CANCELLED) 
		{
			$validation_group = 'patient_management/transaction/save_noShow_cancelled';
		}
		$is_ca = $this->input->post('is_ca') ? 'ca' : NULL;

		if($is_ca == 'ca'){
			$dateRefEmailed = date('Y-m-d');
		} else {
			$dateRefEmailed =  date('Y-m-d');
		}
	
		$providerId = $this->input->post('pt_providerID');

		if($this->input->post('lab_orders') ){

		
			$this->lab_orders_model->createOrdersFromVisit($pt_patientID, $dateRefEmailed, $providerId, $this->session->userdata('user_id'));
		}

		if($this->input->post('patient_hhcID') && $page_type != 'edit' ){

		
			$this->lab_orders_model->updatePatientHomeHealth($pt_patientID, $this->input->post('patient_hhcID'));
		}

		

		$_SERVER["REQUEST_METHOD"] = "POST";

	
		if (!empty($_FILES['userfile']['name'][0])) {
		
			$_POST['transaction_file'] = $this->upload_files($_FILES['userfile']);
		}else {
			
			if(empty(array_filter($this->input->post('transaction_file')))){
				$_POST['transaction_file'] = '';
			} else {
				$_POST['transaction_file'] = json_encode(array_values(array_filter($this->input->post('transaction_file'))));
			}
			
		}	



		$params = [
			'record_id' => $pt_patientID,
			'table_key' => 'pt_id',
			'save_model' => 'transaction_model',
			'redirect_url' => 'patient_management/profile/details/' . $pt_patientID,
			'validation_group' => $validation_group,
			'page_type' => $page_type,
			'sub_data_id' => $pt_id
		];

		$log = [];
		if ($page_type == 'edit') {
			$log = ['description' => 'Updates a patient transaction record.'];
		} else {
			$log = ['description' => 'Added a new patient transaction record.'];
		}

		parent::save_sub_data($params, false);

		if($page_type != 'edit'){
			$this->transaction_model->addUser($this->db->insert_id(), $this->session->userdata('user_id'));
		}

		$lastRecordID = $page_type == 'edit' ? $pt_id : $this->db->insert_id();

		if ( ! empty($log) && $this->session->userdata('user_roleID') != '1') {
            $this->logs_model->insert([
                'data' => [
                    'user_log_userID' => $this->session->userdata('user_id'),
                    'user_log_time' => date('H:m:s'),
                    'user_log_date' => date('Y-m-d'),
                    'user_log_description' => $log['description'],
                    'user_log_link' => 'patient_management/transaction/edit/'.$pt_patientID.'/'.$lastRecordID
                ]
            ]);
        }

        return redirect($params['redirect_url']);
	}
}