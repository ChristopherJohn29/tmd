<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'provider_management/profile_model'
		));
	}

	public function index()
	{
		$this->check_permission('list_provider');

		$params = [
			'table_key' => 'provider_dateCreated',
			'order_type' => 'DESC'
		];

		$page_data['records'] = $this->profile_model->records($params);
		$page_data['total'] = count($page_data['records']);

		$this->twig->view('provider_management/profile/list', $page_data);
	}

	public function add()
	{
		$this->check_permission('add_provider');

		$this->twig->view('provider_management/profile/add');
	}

	public function edit(string $provider_id)
	{
		$this->check_permission('edit_provider');

		$params = [
			'key' => 'provider_id',
        	'value' => $provider_id,
		];

		$page_data['record'] = $this->profile_model->record($params);

		if ( ! $page_data['record'])
		{
			redirect('errors/page_not_found');
		}

		$this->twig->view('provider_management/profile/edit', $page_data);
	}

	public function save(string $formtype, string $provider_id = '')
	{
		$this->check_permission('add_provider');

		// only check for duplicate emails when the email field has been changed
		$validation_group = '';
		if ($formtype == 'edit')
		{
			$params = [
				'key' => 'provider_id',
	        	'value' => $provider_id,
			];

			$provider_record = $this->profile_model->record($params);

			if ( ! $provider_record)
			{
				redirect('errors/page_not_found');
			}

			if ($provider_record->has_changed_email($this->input->post('provider_email')))
			{
				$validation_group = 'provider_management/profile/save';
			}
			else
			{
				$validation_group = 'provider_management/profile/save_update';
			}
		}
		else 
		{
			$validation_group = 'provider_management/profile/save';
		}

		$params = [
			'record_id' => $provider_id,
			'table_key' => 'provider_id',
			'save_model' => 'profile_model',
			'redirect_url' => 'provider_management/profile/',
			'validation_group' => $validation_group
		];

		parent::save_data($params);   
	}

	public function details(string $provider_id)
	{
		$this->check_permission('view_provider');

		$params = [
			'key' => 'provider_id',
        	'value' => $provider_id,
		];

		$page_data['record'] = $this->profile_model->record($params);

		if ( ! $page_data['record'])
		{
			redirect('errors/page_not_found');
		}

		$this->twig->view('provider_management/profile/details', $page_data);
	}
}