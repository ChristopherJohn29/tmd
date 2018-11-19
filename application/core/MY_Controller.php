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
}