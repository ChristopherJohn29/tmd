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
		$page_data = [];

		if ($this->input->post('submit')) {
			$page_data = $this->get_dfv_data(
				$this->input->post('year'),
				$this->input->post('month'),
				$this->input->post('day')
			);
		}

		$this->twig->view('patient_management/DFV/create', $page_data);
	}

	public function print(string $year, string $month, string $day)
	{
		$this->twig->view('patient_management/DFV/print', $this->get_dfv_data($year, $month, $day));
	}

	public function pdf(string $year, string $month, string $day)
	{
		$this->load->library('PDF');

		$page_data = $this->get_dfv_data($year, $month, $day);
		$currentDate = date_format(date_create($page_data['currentDate']), 'F_j_Y');

		$html = $this->load->view('patient_management/DFV/pdf', $page_data, true);
		$filename = 'Due_for_Visits_' . $currentDate;

		$this->pdf->generate($html, $filename);
	}

	public function get_dfv_data(string $year, string $month, string $day)
	{
		$dateSelected = implode('-', [$year, $month, $day]);

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
					'key' => "patient_transactions.pt_dateOfService = DATE_SUB('" . $dateSelected . "', INTERVAL 45 DAY)",
					'condition' => NULL,
	        		'value' => NULL
        		]
			],
			'return_type' => 'object'
		];

		$page_data['records'] = $this->transaction_model->get_records_by_join($transaction_params);
		$page_data['currentDate'] = date_format(date_create($dateSelected), 'm/d/Y');
		$page_data['year'] = $year;
		$page_data['month'] = $month;
		$page_data['day'] = $day;

		return $page_data;
	}
}