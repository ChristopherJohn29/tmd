<?php

class Transaction extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/transaction_model',
			'patient_management/type_visit_model'
		));
	}

	public function index()
	{
		$this->check_permission('list_tr');

		$params = [
			'table_key' => 'pt_dateCreated',
			'order_type' => 'DESC',
			'records_model' => 'transaction_model'
		];

		$page_data['records'] = parent::get_latest_records($params);
	}

	public function add()
	{
		$this->check_permission('add_tr');

		$page_data['type_visits'] = $this->type_visit_model->records();

		$this->twig->view('patient_management/transaction/add', $page_data);
	}

	public function edit(string $pt_patientID)
	{
		$this->check_permission('edit_tr');

		$params = [
			'table_key' => 'pt_patientID',
        	'record_key' => $pt_patientID,
        	'record_table' => 'transaction_model'
		];

		$page_data['record'] = parent::get_record($params);
		$page_data['type_visits'] = $this->type_visit_model->records();
	}

	public function save(string $pt_patientID = '')
	{
		$this->check_permission('add_tr');

		$params = [
			'record_id' => $pt_patientID,
			'table_key' => 'pt_patientID',
			'save_model' => 'transaction_model',
			'redirect_url' => 'patient_management/transaction/details/'
		];

		parent::save_data($params);   
	}

	public function details(string $pt_patientID)
	{
		$this->check_permission('view_tr');

		$params = [
			'table_key' => 'pt_patientID',
        	'record_key' => $pt_patientID
		];

		$page_data['record'] = $this->transaction_model->details($pt_patientID);
	}
}