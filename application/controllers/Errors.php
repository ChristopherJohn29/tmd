<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->library('twig');
	}

	public function page_not_found()
	{
		$this->twig->view('errors/html/404');
	}

	public function access_denied()
	{
		$this->twig->view('errors/html/403');	
	}
}
