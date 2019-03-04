<?php

class DFV extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/transaction_model'
		));
	}

	public function index()
	{
		$this->twig->view('patient_management/DFV/list', $this->get_dfv_data());
	}

	public function print()
	{
		$this->twig->view('patient_management/DFV/print', $this->get_dfv_data());
	}

	public function pdf()
	{
		$this->load->library('PDF');

		$page_data = $this->get_dfv_data();

		$html = $this->load->view('patient_management/DFV/pdf', $page_data, true);
		$filename = 'Due_for_Visits';

		$this->pdf->generate($html, $filename);
	}

	public function get_dfv_data()
	{
		$transaction_params = [
			'joins' => [
				[
					'join_table_name' => 'patient',
					'join_table_key' => 'patient.patient_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_transactions.pt_patientID',
					'join_table_type' => 'left'
				],
				[
					'join_table_name' => 'provider',
					'join_table_key' => 'provider.provider_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_transactions.pt_providerID',
					'join_table_type' => 'left'
				]
			],
			'where' => [
				[
					'key' => 'patient_transactions.pt_dateOfService = DATE_SUB(CURDATE(), INTERVAL 45 DAY)',
					'condition' => NULL,
	        		'value' => NULL
        		]
			],
			'return_type' => 'object'
		];

		$page_data['records'] = $this->transaction_model->get_records_by_join($transaction_params);

		return $page_data;
	}
}