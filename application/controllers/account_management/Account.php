<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'user_management/profile_model'
		));
	}

	public function edit(string $user_id)
	{
		$this->check_permission('edit_account');

		if ($user_id != $this->session->userdata('user_id'))
		{
			redirect('errors/page_not_found');
		}

		$params = [
			'key' => 'user_id',
        	'value' => $user_id
		];

		$page_data['record'] = $this->profile_model->record($params);

		if ( ! $page_data['record'])
		{
			redirect('errors/page_not_found');
		}
		
		$this->twig->view('account_management/account/edit', $page_data);
	}

	public function save(string $user_id)
	{
		$this->check_permission('edit_account');

		if ($user_id != $this->session->userdata('user_id'))
		{
			redirect('errors/page_not_found');
		}

		$params = [
			'record_id' => $user_id,
			'table_key' => 'user_id',
			'save_model' => 'profile_model',
			'redirect_url' => 'dashboard',
			'validation_group' => 'user_management/profile/save_update'
		];

		parent::save_data($params);
	}
}