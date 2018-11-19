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
	* @param array $params['check_permission'] the permission name to check if user has access
	* @param array $params['record_id'] the record id used for updating data
	* @param array $params['table_key'] the table column name used for updating data
	* @param array $params['save_model'] the model name for saving the data
	* @param array $params['redirect_url'] the route url to redirect after successfull save data
	*/
	public function save(array $params)
	{
		$required_params = array(
			'check_permission',
			'record_id',
			'table_key',
			'save_model',
			'redirect_url'
		);

		foreach($required_params as $param_key)
		{
			if (!isset($params[$param_key]))
			{
				throw new Exception("$param_key key is required in params save parameter");

				break;
			}
		}

		$this->check_permission($params['check_permission']);

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
	* @param array $params['check_permission'] the permission name to check if user has access
	* @param array $params['search_model'] the model name for searching the data
	*
	* @return array the searched data
	*/
	public function search(array $params) : array
	{
		$this->check_permission($params['check_permission']);
		
		return $this->$params['search_model']->find([
			'where_data' => $this->$params['search_model']->prepare_search_data()
		]);
	}
}