<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_search extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->library('twig');
	}

	public function index()
	{
		$this->twig->view('general_search/list');
	}
}
