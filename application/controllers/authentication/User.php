<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'authentication/user_model'
		));
	}

	public function verify()
	{
		if ($this->user_model->verify())
		{
			redirect('dashboard');
		}
		else 
		{
			redirect('');
		}
	}
}