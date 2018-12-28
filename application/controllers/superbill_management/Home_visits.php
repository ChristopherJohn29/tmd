<?php

class Home_visits extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

	}

	public function details(string $fromDate, string $toDate)
	{
		$this->check_permission('generate_sbhvr');


		$this->twig->view('superbill_management/home_visits');
	}
}