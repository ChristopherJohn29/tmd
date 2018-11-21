<?php

class Transaction extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/transaction_model',
			'patient_management/type_visits_model'
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

		$page_data['type_visits'] = $this->type_visits_model->records();
	}

	public function edit(string $pt_id)
	{
		$this->check_permission('edit_tr');

		$params = [
			'table_key' => 'pt_id',
        	'record_key' => $pt_id
		];

		$page_data['record'] = parent::get_record($params);
		$page_data['type_visits'] = $this->type_visits_model->records();
	}

	public function save(string $pt_id = '')
	{
		$this->check_permission('add_tr');

		$params = [
			'record_id' => $pt_id,
			'table_key' => 'pt_id',
			'save_model' => 'transaction_model',
			'redirect_url' => 'patient_management/transaction/details/'
		];

		parent::save($params);   
	}

	public function details(string $pt_id)
	{
		$this->check_permission('view_tr');

		$params = [
			'table_key' => 'pt_id',
        	'record_key' => $pt_id
		];

		$page_data['record'] = $this->transaction_model->details($pt_id);
	}
}