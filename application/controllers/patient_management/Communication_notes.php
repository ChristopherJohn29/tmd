<?php

class Communication_notes extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/communication_notes_model' => 'cn_model',
		));
	}

	public function index()
	{
		$this->check_permission('list_cn');

		$params = [
			'table_key' => 'ptcn_dateCreated',
			'order_type' => 'DESC',
			'records_model' => 'cn_model'
		];

		$page_data['records'] = parent::get_latest_records($params);
	}

	public function add()
	{
		$this->check_permission('add_cn');
	}

	public function edit(string $ptcn_patientID)
	{
		$this->check_permission('edit_cn');

		$params = [
			'table_key' => 'ptcn_patientID',
        	'record_key' => $ptcn_patientID,
        	'record_table' => 'cn_model'
		];

		$page_data['record'] = parent::get_record($params);
	}

	public function save(string $ptcn_patientID = '')
	{
		$this->check_permission('add_cn');

		$params = [
			'record_id' => $ptcn_patientID,
			'table_key' => 'ptcn_patientID',
			'save_model' => 'cn_model',
			'redirect_url' => 'patient_management/communication_notes/details/'
		];

		parent::save_data($params);   
	}

	public function details(string $ptcn_patientID)
	{
		$this->check_permission('view_cn');

		$params = [
			'table_key' => 'ptcn_patientID',
        	'record_key' => $ptcn_patientID,
        	'record_table' => 'cn_model'
		];

		$page_data['record'] = parent::get_record($params);
	}
}