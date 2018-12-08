<?php

class Profile extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'home_health_care_management/profile_model'
		));
	}

	public function index()
	{
		$this->check_permission('list_hhc');

		$params = [
			'table_key' => 'hhc_dateCreated',
			'order_type' => 'DESC'
		];

		$page_data['records'] = $this->profile_model->records($params);

		$this->twig->view('home_health_care_management/profile/list', $page_data);
	}

	public function add()
	{
		$this->check_permission('add_hhc');

		$this->twig->view('home_health_care_management/profile/add');
	}

	public function edit(string $hhc_id)
	{
		$this->check_permission('edit_hhc');

		$params = [
			'key' => 'hhc_id',
        	'value' => $hhc_id
		];

		$page_data['record'] = $this->profile_model->record($params);

		if ( ! $page_data['record'])
		{
			redirect('errors/page_not_found');
		}

		$this->twig->view('home_health_care_management/profile/edit', $page_data);
	}

	public function save(string $formtype, string $hhc_id = '')
	{
		$this->check_permission('add_hhc');

		// only check for duplicate emails when the email field has been changed
		$validation_group = 'home_health_care_management/profile/save_update';
		if ($formtype == 'edit')
		{
			$params = [
				'key' => 'hhc_id',
	        	'value' => $hhc_id
			];

			$hhc_record = $this->profile_model->record($params);

			if ( ! $hhc_record)
			{
				redirect('errors/page_not_found');
			}

			if ($this->input->post('hhc_address') != $hhc_record->hhc_address)
			{
				$validation_group = 'home_health_care_management/profile/save';
			}
		}

		$params = [
			'record_id' => $hhc_id,
			'table_key' => 'hhc_id',
			'save_model' => 'profile_model',
			'redirect_url' => 'home_health_care_management/profile',
			'validation_group' => $validation_group
		];

		parent::save_data($params);   
	}
}