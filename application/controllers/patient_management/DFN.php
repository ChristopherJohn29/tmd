<?php

class DFN extends \Mobiledrs\core\MY_Controller {
	
	private $tableColumns = [
        '1' => 'dfe',
        '2' => 'homeHealth'
	];

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

		if (!empty($this->input->post())) {
			$fromDate = implode('/', [
				$this->input->post('year'),
				$this->input->post('fromMonth'),
				$this->input->post('fromDate')
			]);

			$toDate = implode('/', [
				$this->input->post('year'),
				$this->input->post('toMonth'),
				$this->input->post('toDate')
			]);

			$page_data = $this->get_dfn_data(
				$fromDate,
				$toDate
			);
		}

		$this->twig->view('patient_management/DFN/create', $page_data);
	}

	public function print(
		string $fromDate, 
		string $toDate,
		string $tableColumndID = null, 
		string $sortDirection = null
	) {
		$this->twig->view('patient_management/DFN/print', $this->get_dfn_data(
			$fromDate, 
			$toDate,
			$tableColumndID,
			$sortDirection	
		));
	}

	public function pdf(
		string $fromDate, 
		string $toDate,
		string $tableColumndID = null, 
		string $sortDirection = null
	) {
		$this->load->library('PDF');

		$page_data = $this->get_dfn_data(
			$fromDate, 
			$toDate,
			$tableColumndID,
			$sortDirection
		);

		$currentDate = str_replace(' ', '_', $page_data['currentDate']);

		$html = $this->load->view('patient_management/DFN/pdf', $page_data, true);
		$filename = 'Due_for_Visits_' . $currentDate;

		$this->pdf->generate($html, $filename);
	}

	public function get_dfn_data(
		string $fromDate, 
		string $toDate,
		string $tableColumndID = null, 
		string $sortDirection = null
	) {
		$this->load->library('Date_formatter');

		$fromDateSelected = str_replace('/', '-', $fromDate);
		$toDateSelected = str_replace('/', '-', $toDate);

		$dateList = '';
		$fromDateObj = date_create($fromDate);
		$toDateObj = date_create($toDate);
		$year = $fromDateObj->format('Y');
		foreach (range((int) $fromDateObj->format('m'), (int) $toDateObj->format('m')) as $monthDate) {
			foreach (range((int) $fromDateObj->format('d'), (int) $toDateObj->format('d')) as $dayDate) {
				$date = implode('-', [$year, $monthDate, $dayDate]);
				$dateList .= (empty($dateList) ? '' : ',' ) . 'DATE_SUB("' . $date . '", INTERVAL 14 DAY)';	
			}
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
					'key' => "patient_transactions.pt_dateRefEmailed IN (" . $dateList . ')',
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
				'dfe' => $record->get_date_format($record->pt_dateRefEmailed),
				'homeHealth' => $patient_info->hhc_name,
				'contactPerson' => $patient_info->hhc_contact_name,
				'phone' => $patient_info->hhc_phoneNumber
			];
		}

		if ((int)$tableColumndID) {
			$tableColumns = $this->tableColumns;

			usort($page_data['records'], function($a, $b) use (
				$sortDirection, 
				$tableColumndID,
				$tableColumns
			) {
				$tableColumn = $tableColumns[$tableColumndID];
				$aKey = $a[$tableColumn];
				$bKey = $b[$tableColumn];

				if ($aKey == $bKey) {
					return 0;
				}

				if ($sortDirection === 'ascending') {
					if ($aKey < $bKey) {
						return -1;
					} else {
						return 1;
					}
				} else {
					if ($aKey < $bKey) {
						return 1;
					} else {
						return -1;
					}
				}
			});
		}

		$page_data['total'] = count($page_data['records']);
		$page_data['currentDate'] = $dateSelected;
		$page_data['fromDate'] = str_replace('/', '-', $fromDate);
		$page_data['toDate'] = str_replace('/', '-', $toDate);

		return $page_data;
	}
}