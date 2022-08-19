<?php

class DFLO extends \Mobiledrs\core\MY_Controller {
	
	private $tableColumns = [
        '0' => 'patientName',
        '1' => 'date_referral',
        '2' => 'provider',
        '3' => 'status',
        '4' => 'added_by',
	];

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/profile_model',
			'patient_management/lab_orders_model'
		));
	}

	public function index()
	{
		$page_data = [];

		if ($this->input->post('submit')) {
			$page_data = $this->get_DFLO_data(
				$this->input->post('year'),
				$this->input->post('month'),
				$this->input->post('fromDate'),
				$this->input->post('toDate')
			);
		}

		$this->twig->view('patient_management/DFLO/create', $page_data);
	}

	public function print(
		string $year, 
		string $month, 
		string $fromDate, 
		string $toDate, 
		string $tableColumndID = null, 
		string $sortDirection = null
	) {
		$this->twig->view('patient_management/DFLO/print', $this->get_DFLO_data(
			$year, 
			$month, 
			$fromDate, 
			$toDate, 
			$tableColumndID, 
			$sortDirection
		));
	}

	public function pdf(
		string $year, 
		string $month, 
		string $fromDate, 
		string $toDate,
		string $tableColumndID = null,
		string $sortDirection = null
	) {
		$this->load->library('PDF');

		$page_data = $this->get_DFLO_data(
			$year, 
			$month, 
			$fromDate, 
			$toDate,
			$tableColumndID, 
			$sortDirection
		);

		$currentDate = str_replace(' ', '_', $page_data['currentDate']);

		$html = $this->load->view('patient_management/DFLO/pdf', $page_data, true);
		$filename = 'Due_for_Lab_Orders_' . $currentDate;

		$this->pdf->generate($html, $filename);
	}

	public function get_DFLO_data(
		string $year, 
		string $month, 
		string $fromDate, 
		string $toDate,
		string $tableColumndID = null,
		string $sortDirection = null
	) {
		$this->load->library('Date_formatter');

		$fromDateSelected = implode('-', [$year, $month, $fromDate]);
		$toDateSelected = implode('-', [$year, $month, $toDate]);

		$dateList = '';
		foreach(range((int) $fromDate, (int) $toDate) as $dateDay) {
			$date = implode('-', [$year, $month, $dateDay]);
			$dateList .= (empty($dateList) ? '' : ',' ) . 'DATE("' . $date . '")';	
		}

		$labOrderParams = [
			'joins' => [
				[
					'join_table_name' => 'patient',
					'join_table_key' => 'patient.patient_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_lab_order.patient_id',
					'join_table_type' => 'left'
				],
				[
					'join_table_name' => 'provider',
					'join_table_key' => 'provider.provider_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_lab_order.provider_id',
					'join_table_type' => 'left'
				],
				[
					'join_table_name' => 'user',
					'join_table_key' => 'user.user_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_lab_order.added_by',
					'join_table_type' => 'left'
				]
			],
			'where' => [
				[
					'key' => "patient_lab_order.date_referral IN (" . $dateList . ')',
					'condition' => NULL,
	        		'value' => NULL
				],
				[
					'key' => "patient_lab_order.column_archive",
					'condition' => '=',
	        		'value' => 0
        		],
				[
					'key' => "patient_lab_order.status",
					'condition' => '!=',
	        		'value' => 'Complete'
        		]
			],
			'return_type' => 'object'
		];


		$this->date_formatter->set_date($fromDateSelected, $toDateSelected);
		$dateSelected = $this->date_formatter->format();

		$records = $this->lab_orders_model->get_records_by_join($labOrderParams);

		// var_dump(	$records);
		// exit;

		$page_data['records'] = [];
		foreach ($records as $record) {

			$page_data['records'][] = [
				'patient_id' => $record->patient_id,
				'patientName' => $record->patient_name,
				'date_referral' => date("m/d/Y", strtotime($record->date_referral)),
				'provider' => $record->provider_firstname.' '.$record->provider_lastname,
				'added_by' => $record->user_firstname.' '.$record->user_lastname,
				'status' => $record->status
			];

		}



		if (!is_null($tableColumndID)) {
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
		$page_data['year'] = $year;
		$page_data['month'] = $month;
		$page_data['fromDate'] = $fromDate;
		$page_data['toDate'] = $toDate;


		// echo "<pre>";
		// var_dump($page_data);
		// echo "</pre>";
		// exit;

		return $page_data;
	}
}