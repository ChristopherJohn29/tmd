<?php

class DFV extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/profile_model',
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
				$this->input->post('fromDate'),
				$this->input->post('toDate')
			);
		}

		$this->twig->view('patient_management/DFV/create', $page_data);
	}

	public function print(string $year, string $month, string $fromDate, string $toDate)
	{
		$this->twig->view('patient_management/DFV/print', $this->get_dfv_data($year, $month, $fromDate, $toDate));
	}

	public function pdf(string $year, string $month, string $fromDate, string $toDate)
	{
		$this->load->library('PDF');

		$page_data = $this->get_dfv_data($year, $month, $fromDate, $toDate);
		$currentDate = str_replace(' ', '_', $page_data['currentDate']);

		$html = $this->load->view('patient_management/DFV/pdf', $page_data, true);
		$filename = 'Due_for_Visits_' . $currentDate;

		$this->pdf->generate($html, $filename);
	}

	public function get_dfv_data(string $year, string $month, string $fromDate, string $toDate)
	{
		$this->load->library('Date_formatter');

		$fromDateSelected = implode('-', [$year, $month, $fromDate]);
		$toDateSelected = implode('-', [$year, $month, $toDate]);

		$dateList = '';
		foreach(range((int) $fromDate, (int) $toDate) as $dateDay) {
			$date = implode('-', [$year, $month, $dateDay]);
			$dateList .= (empty($dateList) ? '' : ',' ) . 'DATE_SUB("' . $date . '", INTERVAL 55 DAY)';	
		}

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
					'key' => "patient_transactions.pt_dateOfService IN (" . $dateList . ')',
					'condition' => NULL,
	        		'value' => NULL
        		]
			],
			'return_type' => 'object'
		];

		$this->date_formatter->set_date($fromDateSelected, $toDateSelected);
		$dateSelected = $this->date_formatter->format();

		$records = $this->transaction_model->get_records_by_join($transaction_params);

		$page_data['records'] = [];
		foreach ($records as $record) {
			$record_params = [
				'joins' => [
					[
						'join_table_name' => 'home_health_care',
						'join_table_key' => 'home_health_care.hhc_id',
						'join_table_condition' => '=',
						'join_table_value' => 'patient.patient_hhcID',
						'join_table_type' => 'inner'
					]
				],
				'where' => [
					[
						'key' => 'patient_id',
						'condition' => '',
		        		'value' => $record->patient_id
	        		]
				],
				'return_type' => 'row'
			];

			$patient_info = $this->profile_model->get_records_by_join($record_params);

			$page_data['records'][] = [
				'patient_id' => $record->patient_id,
				'patientName' => $record->patient_name,
				'dos' => $record->get_date_format($record->pt_dateOfService),
				'homeHealth' => $patient_info->hhc_name,
				'contactPerson' => $patient_info->hhc_contact_name,
				'phone' => $patient_info->hhc_phoneNumber
			];
		}

		$page_data['total'] = count($page_data['records']);
		$page_data['currentDate'] = $dateSelected;
		$page_data['year'] = $year;
		$page_data['month'] = $month;
		$page_data['fromDate'] = $fromDate;
		$page_data['toDate'] = $toDate;

		return $page_data;
	}
}