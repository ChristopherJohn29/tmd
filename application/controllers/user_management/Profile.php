<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'user_management/profile_model',
			'user_management/roles_model'
		));
	}

	public function index()
	{
		$page_data['records'] = $this->profile_model->records([
			'key' => 'user_dateCreated', 
			'order_by' => 'DESC'
		]);
	}

	public function add()
	{
		$page_data['roles'] = $this->roles_model->records();
	}

	public function edit(string $user_id)
	{
		$page_data = [
			'record' => $this->profile_model->record([
				'key' => 'user_id',
	        	'value' => $user_id
			]),
			'roles' => $this->roles_model->records()
		];
	}

	public function save(string $user_id = '')
	{
		$this->load->library('form_validation');

		if ($this->form_validation->run() == FALSE)
        {
			(empty($user_id)) ? $this->add() : $this->edit();	

			return;
        }

        $user = (empty($user_id)) ?
        	$this->profile_model->insert(['data' => $this->profile_model->prepare_data()]) :
        	$this->profile_model->update([
        		'data' => $this->profile_model->prepare_data(),
        		'key' => 'user_id',
	        	'value' => $user_id
        	]);

        if ($user) 
        {
        	$this->session->set_flashdata('success', $this->lang->line('success_save'));
        } else {
        	$this->session->set_flashdata('error', $this->lang->line('error_save'));
        }

        redirect('user_management/profile/details/' . (empty($user_id)) ? $user : $user_id);
	}

	public function details(string $user_id)
	{
		$page_data = [
			'record' => $this->profile_model->record([
				'key' => 'user_id',
	        	'value' => $user_id
			]),
			'roles' => $this->roles_model->records()
		];
	}

	public function search()
	{
		$page_data['records'] = $this->profile_model->find([
			'where_data' => $this->profile_model->prepare_search_data()
		]);
	}
}
