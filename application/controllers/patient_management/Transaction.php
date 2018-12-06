<?php

class Transaction extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/profile_model',
			'patient_management/transaction_model',
			'patient_management/type_visit_model'
		));
	}

	public function add(string $pt_patientID)
	{
		$this->check_permission('add_tr');

		$params = [
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
				'key' => 'patient_id',
				'condition' => '',
        		'value' => $pt_patientID
			],
			'return_type' => 'row'
		];

		$page_data['record'] = $this->profile_model->get_records_by_join($params);
		$page_data['type_visits'] = $this->type_visit_model->records();

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
				'key' => 'patient_id',
				'condition' => '',
        		'value' => $pt_patientID
			],
			'return_type' => 'row'
		];

		$transaction_params = [
			'key' => 'pt_id',
			'value' => $pt_id
		];

		$page_data['record'] = $this->profile_model->get_records_by_join($profile_params);
		$page_data['transaction'] = $this->transaction_model->record($transaction_params);
		$page_data['type_visits'] = $this->type_visit_model->records();

		$this->twig->view('patient_management/transaction/edit', $page_data);
	}

	public function save(string $page_type, string $pt_patientID = '', string $pt_id = '')
	{
		$this->check_permission('add_tr');

		$params = [
			'record_id' => $pt_patientID,
			'table_key' => 'pt_patientID',
			'save_model' => 'transaction_model',
			'redirect_url' => 'patient_management/profile/details/' . $pt_patientID,
			'validation_group' => 'patient_management/transaction/save',
			'page_type' => $page_type,
			'sub_data_id' => $pt_id
		];

		parent::save_sub_data($params);   
	}
}