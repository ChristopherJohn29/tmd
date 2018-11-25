<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'authentication/user_model'
		));

		$this->load->library('twig');
	}

	public function index()
	{
		$this->twig->view('authentication/user');
	}

	public function verify()
	{
		$this->load->library('form_validation');

		if ($this->form_validation->run() == FALSE)
        {
        	$this->index();

        	return;
        }

		if ($this->user_model->verify())
		{
			redirect('dashboard');
		}
		else 
		{
			redirect('authentication/user');
		}
	}
}