<?php

class Headcount extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/profile_model',
			'patient_management/transaction_model',
			'patient_management/headcount_model',
		));
	}

	public function index()
	{
		$this->check_permission('headcount_pt');

		$this->twig->view('patient_management/headcount/create');
	}

	public function generate()
	{
		$this->check_permission('headcount_pt');

		$page_data['headcounts'] = $this->headcount_model->get_headcount(
			$this->input->post('month'),
			$this->input->post('year')
		);

		$this->twig->view('patient_management/headcount/create', $page_data);
	}
}