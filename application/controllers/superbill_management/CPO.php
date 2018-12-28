<?php

class CPO extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

	}

	public function details(string $fromDate, string $toDate)
	{
		$this->check_permission('generate_sbcpor');

		$this->twig->view('superbill_management/cpo_485');
	}
}