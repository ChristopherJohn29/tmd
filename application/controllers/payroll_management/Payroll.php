<?php

class Payroll extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$this->check_permission('generate_pr');

		$page_data['results'] = [];

		if ( ! empty($this->input->post()))
		{
			$page_data['results'] = [1,2,3];
		}

		$this->twig->view('payroll_management/payroll/search', $page_data);
	}

	public function details(string $patient_id)
	{
		$this->check_permission('generate_pr');
		
		$this->twig->view('payroll_management/payroll/details');
	}
}