<?php

class CPO extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/CPO_model',
			'patient_management/Profile_model'
		));
	}

	public function add(string $ptcpo_patientID)
	{
		$this->check_permission('add_cpo');

		$profile_params = [
			'limit' => 1,
			'order' => [
				'key' => 'patient_transactions.pt_dateOfService',
				'by' => 'DESC'
			],
			'joins' => [
				[
					'join_table_name' => 'patient_transactions',
					'join_table_key' => 'patient_transactions.pt_patientID',
					'join_table_condition' => '=',
					'join_table_value' => 'patient.patient_id',
					'join_table_type' => 'inner'
				],
				[
					'join_table_name' => 'home_health_care',
					'join_table_key' => 'home_health_care.hhc_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_transactions.patient_hhcID',
					'join_table_type' => 'inner'
				]
			],
			'where' => [
				[
					'key' => 'patient.patient_id',
					'condition' => '',
	        		'value' => $ptcpo_patientID
        		],
				[
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '<>',
	        		'value' => NULL
        		],
				[
					'key' => 'patient_transactions.pt_archive',
					'condition' => '=',
	        		'value' => NULL
        		]
			],
			'return_type' => 'row'
		];

		

		$page_data['record'] = $this->Profile_model->get_records_by_join($profile_params);


		if(!$page_data['record']){
			$profile_params = [
				'joins' => [
					[
						'join_table_name' => 'home_health_care',
						'join_table_key' => 'home_health_care.hhc_id',
						'join_table_condition' => '=',
						'join_table_value' => 'patient.patient_hhcID',
						'join_table_type' => 'left'
					]
				],
				'where' => [
					[
						'key' => 'patient_id',
						'condition' => '',
						'value' => $ptcpo_patientID
					]
				],
				'return_type' => 'row'
			];
			
			$page_data['record'] = $this->Profile_model->get_records_by_join($profile_params);
		}


		$this->twig->view('patient_management/CPO/add', $page_data);
	}

	public function edit(string $ptcpo_patientID, string $ptcpo_id)
	{
		$this->check_permission('edit_cpo');

		$profile_params = [
			'limit' => 1,
			'order' => [
				'key' => 'patient_transactions.pt_dateOfService',
				'by' => 'DESC'
			],
			'joins' => [
				[
					'join_table_name' => 'patient_transactions',
					'join_table_key' => 'patient_transactions.pt_patientID',
					'join_table_condition' => '=',
					'join_table_value' => 'patient.patient_id',
					'join_table_type' => 'inner'
				],
				[
					'join_table_name' => 'home_health_care',
					'join_table_key' => 'home_health_care.hhc_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_transactions.patient_hhcID',
					'join_table_type' => 'inner'
				]
			],
			'where' => [
				[
					'key' => 'patient.patient_id',
					'condition' => '',
	        		'value' => $ptcpo_patientID
        		],
				[
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '<>',
	        		'value' => NULL
        		],
				[
					'key' => 'patient_transactions.pt_archive',
					'condition' => '=',
	        		'value' => NULL
        		]
			],
			'return_type' => 'row'
		];

		

		$page_data['record'] = $this->Profile_model->get_records_by_join($profile_params);


		if(!$page_data['record']){
			$profile_params = [
				'joins' => [
					[
						'join_table_name' => 'home_health_care',
						'join_table_key' => 'home_health_care.hhc_id',
						'join_table_condition' => '=',
						'join_table_value' => 'patient.patient_hhcID',
						'join_table_type' => 'left'
					]
				],
				'where' => [
					[
						'key' => 'patient_id',
						'condition' => '',
						'value' => $ptcpo_patientID
					]
				],
				'return_type' => 'row'
			];

			$page_data['record'] = $this->Profile_model->get_records_by_join($profile_params);
		}

		if ( ! $page_data['record'])
		{
			redirect('errors/page_not_found');
		}

		$cpo_params = [
			'key' => 'patient_CPO.ptcpo_id',
    		'value' => $ptcpo_id
		];

		$page_data['cpo'] = $this->CPO_model->record($cpo_params);

		$this->twig->view('patient_management/CPO/edit', $page_data);
	}

	public function save(string $page_type, string $ptcpo_patientID = '', string $ptcpo_id = '')
	{
		$this->check_permission('add_cpo');

		$params = [
			'record_id' => $ptcpo_patientID,
			'table_key' => 'ptcpo_id',
			'save_model' => 'CPO_model',
			'redirect_url' => 'patient_management/profile/details/' . $ptcpo_patientID,
			'validation_group' => 'patient_management/cpo/save',
			'page_type' => $page_type,
			'sub_data_id' => $ptcpo_id
		];

		$_SERVER["REQUEST_METHOD"] = "POST";
	
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|pdf';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);

		if ( $this->upload->do_upload('userfile'))
		{
			$data = $this->upload->data();
			$_POST['cpo_file'] = $data['file_name'];
		}

		if ( $this->upload->do_upload('userfile_cert'))
		{
			$data = $this->upload->data();
			$_POST['cpo_file_cert'] = $data['file_name'];
		}

		$log = [];
		if ($page_type == 'edit') {
			$log = ['description' => 'Updates a patient certification record.'];
		} else {
			$log = ['description' => 'Added a new patient certification record.'];
		}

		parent::save_sub_data($params, false);

		$lastRecordID = $page_type == 'edit' ? $ptcpo_id : $this->db->insert_id();

	
		$this->CPO_model->update([
			'data' => ['ptcpo_addedByUserID' => $this->session->userdata('user_id')],
			'key' => 'ptcpo_id',
			'value' => $lastRecordID
		]);

		if ($this->session->userdata('user_roleID') != '1') {
            $this->logs_model->insert([
                'data' => [
                    'user_log_userID' => $this->session->userdata('user_id'),
                    'user_log_time' => date('H:m:s'),
                    'user_log_date' => date('Y-m-d'),
                    'user_log_description' => $log['description'],
                    'user_log_link' => 'patient_management/CPO/edit/'.$ptcpo_patientID.'/'.$lastRecordID
                ]
            ]);
        }

		return redirect($params['redirect_url']);
	}
}