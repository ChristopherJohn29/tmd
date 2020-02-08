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
			'provider_management/supervising_md_model'
		));
	}

	public function add(string $pt_patientID)
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

		$page_data['record'] = $this->profile_model->get_records_by_join($record_params);

		$page_data['supervisingMDs'] = $this->supervising_md_model->supervisingMD_records();
		
		$initial_followup_records = $this->transaction_model->records($records_params);
		$type_visits = $this->type_visit_model->records();

		$page_data['type_visit_entity'] = new \Mobiledrs\entities\patient_management\pages\Type_visit_entity(
			$initial_followup_records, $type_visits);

		$this->twig->view('patient_management/transaction/add', $page_data);
	}

	public function edit(string $pt_patientID, string $pt_id)
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

		$page_data['record'] = $this->profile_model->get_records_by_join($profile_params);
		$page_data['transaction'] = $this->transaction_model->get_records_by_join($transaction_params);
		$page_data['type_visits'] = (new Type_visit_entity())->filterRecords(
			$page_data['transaction']->pt_tovID,
			$this->type_visit_model->records()
		);

		$page_data['supervisingMDs'] = $this->supervising_md_model->supervisingMD_records();

		$this->twig->view('patient_management/transaction/edit', $page_data);
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