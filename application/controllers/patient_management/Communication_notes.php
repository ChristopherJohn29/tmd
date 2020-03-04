<?php

use Mobiledrs\entities\patient_management\Communication_notes_entity;

class Communication_notes extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/communication_notes_model' => 'cn_model',
			'patient_management/profile_model' => 'pt_model',
		));
	}

	public function add(string $ptcn_patientID)
	{
		$this->check_permission('add_cn');

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
	        		'value' => $ptcn_patientID
        		]
			],
			'return_type' => 'row'
		];

		$page_data['record'] = $this->pt_model->get_records_by_join($profile_params);

		$page_data['categories'] = (new Communication_notes_entity())->getCategories();

		$this->twig->view('patient_management/notes/add', $page_data);
	}

	public function edit(string $ptcn_patientID, string $ptcn_id)
	{
		$this->check_permission('edit_cn');

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
	        		'value' => $ptcn_patientID
        		]
			],
			'return_type' => 'row'
		];

		$cn_params = [
			'key' => 'patient_communication_notes.ptcn_id',
			'value' => $ptcn_id
		];

		$page_data['record'] = $this->pt_model->get_records_by_join($profile_params);
		$page_data['communication_note'] = $this->cn_model->record($cn_params);
		$page_data['categories'] = (new Communication_notes_entity())->getCategories();

		if ( ! $page_data['record'])
		{
			redirect('errors/page_not_found');
		}

		$this->twig->view('patient_management/notes/edit', $page_data);
	}

	public function save(string $page_type, string $ptcn_patientID = '', string $ptcn_id = '')
	{
		$this->check_permission('add_cn');

		$params = [
			'record_id' => $ptcn_patientID,
			'table_key' => 'ptcn_id',
			'save_model' => 'cn_model',
			'redirect_url' => 'patient_management/profile/details/' . $ptcn_patientID,
			'validation_group' => 'patient_management/communication_notes/save',
			'page_type' => $page_type,
			'sub_data_id' => $ptcn_id
		];

		$log = [];
		if ($page_type == 'edit') {
			$log = ['description' => 'Updates a patient communication notes record.'];
		} else {
			$log = ['description' => 'Added a new patient communication notes record.'];
		}

		parent::save_sub_data($params, false);

		$lastRecordID = $page_type == 'edit' ? $ptcn_id : $this->db->insert_id();

		if ($this->session->userdata('user_roleID') != '1') {
            $this->logs_model->insert([
                'data' => [
                    'user_log_userID' => $this->session->userdata('user_id'),
                    'user_log_time' => date('H:m:s'),
                    'user_log_date' => date('Y-m-d'),
                    'user_log_description' => $log['description'],
                    'user_log_link' => 'patient_management/communication_notes/edit/'.$ptcn_patientID.'/'.$lastRecordID
                ]
            ]);
        }		

		return redirect($params['redirect_url']); 
	}
}