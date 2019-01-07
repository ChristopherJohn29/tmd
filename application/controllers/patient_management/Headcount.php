<?php

class Headcount extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->twig->view('patient_management/headcount/create');
	}
}