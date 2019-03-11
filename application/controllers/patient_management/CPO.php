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
	        		'value' => $ptcpo_patientID
        		]
			],
			'return_type' => 'row'
		];

		$page_data['record'] = $this->Profile_model->get_records_by_join($profile_params);

		$this->twig->view('patient_management/CPO/add', $page_data);
	}

	public function edit(string $ptcpo_patientID, string $ptcpo_id)
	{
		$this->check_permission('edit_cpo');

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
	        		'value' => $ptcpo_patientID
        		]
			],
			'return_type' => 'row'
		];

		$page_data['record'] = $this->Profile_model->get_records_by_join($profile_params);

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

		parent::save_sub_data($params);
	}
}