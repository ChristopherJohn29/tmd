<?php

class Payroll extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$this->check_permission('generate_pr');


		$this->twig->view('payroll_management/payroll/search');
	}

	public function details(string $patient_id)
	{
		$this->check_permission('generate_pr');

		
		$this->twig->view('payroll_management/payroll/details');
	}

	public function search()
	{
		$this->check_permission('send_pr');


		$this->twig->view('payroll_management/payroll/search');
	}
}