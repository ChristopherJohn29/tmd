<?php

class Facility_visits extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$this->check_permission('generate_sbfvr');


		$this->twig->view('superbill_management/facility_visits');
	}
}