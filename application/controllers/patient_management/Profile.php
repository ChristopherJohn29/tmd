<?php

class Profile extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/profile_model',
			'patient_management/transaction_model'
		));
	}

	public function index()
	{
		$this->check_permission('list_pt');

		$params = [
			'table_key' => 'patient_dateCreated',
			'order_type' => 'DESC'
		];

		$page_data['records'] = $this->profile_model->records($params);

		$this->twig->view('patient_management/profile/list', $page_data);
	}

	public function add()
	{
		$this->check_permission('add_pt');

		$this->twig->view('patient_management/profile/add');
	}

	public function edit(string $patient_id)
	{
		$this->check_permission('edit_pt');

		$params = [
			'key' => 'patient_id',
        	'value' => $patient_id
		];

		$page_data['record'] = $this->profile_model->record($params);

		if ( ! $page_data['record'])
		{
			redirect('errors/page_not_found');
		}

		$this->twig->view('patient_management/profile/edit', $page_data);
	}

	public function save(string $patient_id = '')
	{
		$this->check_permission('add_pt');

		$params = [
			'record_id' => $patient_id,
			'table_key' => 'patient_id',
			'save_model' => 'profile_model',
			'redirect_url' => 'patient_management/profile',
			'validation_group' => 'patient_management/profile/save'
		];

		parent::save_data($params);
	}

	public function details(string $patient_id)
	{
		$this->check_permission('view_pt');

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
				'key' => 'patient_id',
				'condition' => '',
        		'value' => $patient_id
			],
			'return_type' => 'row'
		];

		$transaction_params = [
			'joins' => [
				[
					'join_table_name' => 'type_of_visits',
					'join_table_key' => 'type_of_visits.tov_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_transactions.pt_tovID',
					'join_table_type' => 'inner'
				],
				[
					'join_table_name' => 'provider',
					'join_table_key' => 'provider.provider_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_transactions.pt_providerID',
					'join_table_type' => 'inner'
				]
			],
			'where' => [
				'key' => 'patient_transactions.pt_patientID',
				'condition' => '',
        		'value' => $patient_id
			],
			'return_type' => 'object'
		];

		$page_data['record'] = $this->profile_model->get_records_by_join($record_params);
		$page_data['transactions'] = $this->transaction_model->get_records_by_join($transaction_params);

		if ( ! $page_data['record'])
		{
			redirect('errors/page_not_found');
		}

		$this->twig->view('patient_management/profile/details', $page_data);
	}

	public function search()
	{
		$this->check_permission('search_pt');

		$this->twig->view('patient_management/profile/search');
	}
}