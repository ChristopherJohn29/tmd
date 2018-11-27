<?php

class CPO extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/cpo_model'
		));
	}

	public function index()
	{
		$this->check_permission('view_cpo');

		$params = [
			'table_key' => 'ptcpo_dateCreated',
			'order_type' => 'DESC',
			'records_model' => 'cpo_model'
		];

		$page_data['records'] = parent::get_latest_records($params);
	}

	public function add()
	{
		$this->check_permission('add_cpo');

		$page_data['ptcpo_status'] = $this->cpo_model->generate_status();
	}

	public function edit(string $ptcpo_patientID)
	{
		$this->check_permission('edit_cpo');

		$params = [
			'table_key' => 'ptcpo_patientID',
        	'record_key' => $ptcpo_patientID,
        	'record_table' => 'cpo_model'
		];

		$page_data['record'] = parent::get_record($params);
	}

	public function save(string $ptcpo_patientID = '')
	{
		$this->check_permission('add_cpo');

		$params = [
			'record_id' => $ptcpo_patientID,
			'table_key' => 'ptcpo_patientID',
			'save_model' => 'cpo_model',
			'redirect_url' => 'patient_management/cpo/details/'
		];

		parent::save_data($params);
	}
}