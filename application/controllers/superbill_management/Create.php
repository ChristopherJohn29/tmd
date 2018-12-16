<?php

class Create extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{


		$this->twig->view('superbill_management/create');
	}
}