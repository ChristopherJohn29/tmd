<?php

class Supervising_MD extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/transaction_model',
			'patient_management/supervising_md_model',
			'home_health_care_management/Profile_model'
		));
	}

	public function index()
	{
		$page_data = [];

		if ($this->input->post('patient_supervising_mdID')) {
			$page_data = $this->get_data();
		}
		
		$this->twig->view('patient_management/supervising_MD/create', $page_data);
	}

	private function get_data() : array
	{
		$page_data['records'] = $this->supervising_md_model->search();
		$page_data['total'] = count($page_data['records']);

		return $page_data;
	}
}