<?php

class MY_Controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('user_logged_in')) 
		{
			redirect('login');
		}

		$this->load->library('acl');
	}

	public function check_permission(string $permission_name)
	{
		if (!$this->acl->has_permission($this->session->userdata('user_role_id'), $permission_name))
		{
			// redirect to access denied page
			// redirect();
		}
	}

	/**
	* @param array $params['record_id'] the record id used for updating data
	* @param array $params['table_key'] the table column name used for updating data
	* @param array $params['save_model'] the model name for saving the data
	* @param array $params['redirect_url'] the route url to redirect after successfull save data
	*/
	public function save(array $params)
	{
		$this->load->library('form_validation');

		if ($this->form_validation->run() == FALSE)
        {
			(!empty($params['record_id'])) ? $this->edit() : $this->add();	

			return;
        }

        $save = null;

        if (!empty($params['record_id']))
        {
        	$save = $this->$params['save_model']->update([
        		'data' => $this->$params['save_model']->prepare_data(),
        		'key' => $params['table_key'],
	        	'value' => $params['record_id']
        	]);
        }
        else
        {
        	$save = $this->$params['save_model']->insert([
        		'data' => $this->$params['save_model']->prepare_data()]
        	);
        }

        if ($save) 
        {
        	$this->session->set_flashdata('success', $this->lang->line('success_save'));
        } else {
        	$this->session->set_flashdata('error', $this->lang->line('error_save'));
        }

        redirect($params['redirect_url'] . (!empty($params['record_id'])) ? $params['user_id'] : $save);
	}

	/**
	* @param array $params['search_model'] the model name for searching the data
	*
	* @return array the searched data
	*/
	public function search(array $params) : array
	{		
		return $this->$params['search_model']->find([
			'where_data' => $this->$params['search_model']->prepare_search_data()
		]);
	}

	/**
	* @param array $params['table_key'] the table column name used for fetching data
	* @param array $params['record_id'] the record id used for fetching data
	* @param array $params['record_table'] the table where to fetch the data
	*
	* @return array the fetched data
	*/
	public function get_record(array $params) : array
	{
		return $this->$params['record_table']->record([
			'key' => $params['table_key'],
        	'value' => $params['record_id']
		]);
	}

	/**
	* @param array $params['table_key'] the table column name used for fetching latest records data
	* @param array $params['order_type'] the order type when fetching latest records data
	* @param array $params['records_model'] the model name for fetching latest records data
	*
	* @return array fetched the latest records data
	*/
	public function get_latest_records(array $params) : array
	{
		return $this->$param['records_model']->records([
			'key' => $params['table_key'], 
			'order_by' => $params['order_type']
		]);
	}
}