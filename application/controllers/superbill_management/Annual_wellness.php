<?php

class Annual_wellness extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$this->check_permission('generate_sbawr');


		$this->twig->view('superbill_management/annual_wellness');
	}
}