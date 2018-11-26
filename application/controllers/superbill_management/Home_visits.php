<?php

class Home_visits extends MY_Controller {
	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$this->check_permission('generate_sbhvr');


		$this->twig->view('superbill_management/home_visits');
	}
}