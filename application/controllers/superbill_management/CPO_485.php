<?php

class CPO_485 extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$this->check_permission('generate_sbcpor');

		$this->twig->view('superbill_management/cpo_485');
	}
}