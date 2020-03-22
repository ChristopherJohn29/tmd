<?php

use \Mobiledrs\entities\patient_management\Type_visit_entity;

class Headcount_model extends \Mobiledrs\core\MY_Models {

	private $fromDate = null;
	private $toDate = null;
	
	public function __construct()
	{
		parent::__construct();
	}

	public function prepare_dateRange(string $month, string $fromDate, string $toDate, string $year) {
		$this->fromDate = $year . '-' . $month . '-' . $fromDate;
		$this->toDate = $year . '-' . $month . '-' . $toDate;
	}

	public function get_total_patients($tableColumn = '', $sortDirection = '') : array
	{
		$transaction_params = [
			'order' => [
				'key' => 'patient_transactions.pt_dateOfService',
				'by' => 'DESC'
			],
			'joins' => [
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
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '>=',
	        		'value' => $this->fromDate
        		],
        		[
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '<=',
	        		'value' => $this->toDate
        		],
        		[
					'key' => 'patient_transactions.pt_archive',
					'condition' => '=',
	        		'value' => NULL
        		]
			],
			'where_in_list' => [
				'key' => 'patient_transactions.pt_tovID',
				'values' => Type_visit_entity::get_visits_list()
			],
			'return_type' => 'object'
		];

		$transactions = $this->transaction_model->get_records_by_join($transaction_params);

		if (empty($transactions))
		{
			return [];
		}

		$headcount_list = [];

		foreach ($transactions as $index => $transaction) 
		{
			$patient_details = $this->get_patient_details($transaction->pt_patientID);
			$cpo_details = $this->get_cpo_details($transaction->pt_patientID);

			$headcount_list[] = [
				'patient_id' => $patient_details->patient_id,
				'patient_name' => $patient_details->patient_name,
				'provider' => $transaction->get_provider_fullname(),
				'dateOfService' => $transaction->get_date_format($transaction->pt_dateOfService),
				'deductible' => $transaction->pt_deductible,
				'home_health' => $patient_details->hhc_name,
				'paid' => $transaction->get_date_format($transaction->pt_service_billed),
				'aw_billed' => $transaction->get_date_format($transaction->pt_aw_billed),
				'visit_billed' => $transaction->get_date_format($transaction->pt_visitBilled),
				'cpo_billed' => $cpo_details ? $cpo_details->get_date_format($cpo_details->ptcpo_dateBilled) : '',
				'pt_supervising_mdID' => $transaction->pt_supervising_mdID
			];
		}

		usort($headcount_list, function($a, $b) use ($tableColumn, $sortDirection) {
			if ($tableColumn == 'patient_name') {
				return $sortDirection == 'ascending' ? 
					strcmp($a["patient_name"], $b["patient_name"]) :
					strcmp($b["patient_name"], $a["patient_name"]);
			} else if ($tableColumn == 'provider') {
				return $sortDirection == 'ascending' ? 
					strcmp($a["provider"], $b["provider"]) :
					strcmp($b["provider"], $a["provider"]);
			} else if ($tableColumn == 'dateOfService') {
				return $sortDirection == 'ascending' ? 
					strtotime($a["dateOfService"]) > strtotime($b["dateOfService"]) :
					strtotime($a["dateOfService"]) < strtotime($b["dateOfService"]);
			} else if ($tableColumn == 'deductible') {
				return $sortDirection == 'ascending' ? 
					$a["deductible"] > $b["deductible"] : 
					$a["deductible"] < $b["deductible"];
			} else if ($tableColumn == 'home_health') {
				return $sortDirection == 'ascending' ? 
					strcmp($a["home_health"], $b["home_health"]) :
					strcmp($b["home_health"], $a["home_health"]);
			} else if ($tableColumn == 'visit_billed') {
				return $sortDirection == 'ascending' ? 
					strtotime($a["visit_billed"]) > strtotime($b["visit_billed"]) : 
					strtotime($a["visit_billed"]) < strtotime($b["visit_billed"]);
			} else {
				return $a["patient_name"] > $b["patient_name"];
			}
		});

		return $headcount_list;
	}

	public function get_unbilled_cpo($tableColumn = '', $sortDirection = '') : array 
	{
		$cpo_params = [
			'where' => [
				[
					'key' => "STR_TO_DATE(SUBSTRING(patient_CPO.ptcpo_period, 1, INSTR(patient_CPO.ptcpo_period, ' - ')), '%m/%d/%Y')",
					'condition' => '>=',
	        		'value' => $this->fromDate
				],
				[
					'key' => "STR_TO_DATE(SUBSTRING(patient_CPO.ptcpo_period, 1, INSTR(patient_CPO.ptcpo_period, ' - ')), '%m/%d/%Y')",
					'condition' => '<=',
	        		'value' => $this->toDate
				],
				[
					'key' => 'patient_CPO.ptcpo_dateBilled',
					'condition' => '=',
	        		'value' => NULL
				],
				[
					'key' => 'patient_CPO.ptcpo_archive',
					'condition' => '=',
	        		'value' => NULL
				]
			],
			'return_type' => 'object'
		];

		$cpos = $this->CPO_model->get_records_by_join($cpo_params);

		$headcount_list = [];

		foreach ($cpos as $index => $cpo) 
		{
			$patient_details = $this->get_patient_details($cpo->ptcpo_patientID);
			$transaction_details = $this->get_transaction_details(
				$cpo->ptcpo_patientID,
				$cpo->ptcpo_dateOfService
			);

			$headcount_list[] = [
				'patient_id' => $patient_details->patient_id,
				'patient_name' => $patient_details->patient_name,
				'provider' => $transaction_details ? $transaction_details->get_provider_fullname() : '',
				'dateOfService' => $transaction_details ? $transaction_details->get_date_format($transaction_details->pt_dateOfService)  : '',
				'deductible' => $transaction_details ? $transaction_details->pt_deductible : '',
				'home_health' => $transaction_details ? $patient_details->hhc_name : '',
				'paid' => $transaction_details ? $transaction_details->get_date_format($transaction_details->pt_service_billed) : '',
				'aw_billed' => $transaction_details ? $transaction_details->get_date_format($transaction_details->pt_aw_billed) : '',
				'visit_billed' => $transaction_details ? $transaction_details->get_date_format($transaction_details->pt_visitBilled) : '',
				'pt_supervising_mdID' => $transaction_details ? $transaction_details->pt_supervising_mdID : ''
			];
		}

		return $headcount_list;
	}

	public function get_unbilled_aw($tableColumn = '', $sortDirection = '') : array
	{
		$transaction_params = [
			'order' => [
				'key' => 'patient_transactions.pt_dateOfService',
				'by' => 'DESC'
			],
			'joins' => [
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
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '>=',
	        		'value' => $this->fromDate
        		],
        		[
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '<=',
	        		'value' => $this->toDate
        		],
        		[
					'key' => 'patient_transactions.pt_aw_billed',
					'condition' => '=',
	        		'value' => NULL
        		],
        		[
					'key' => 'patient_transactions.pt_archive',
					'condition' => '=',
	        		'value' => NULL
        		]
			],
			'where_in_list' => [
				'key' => 'patient_transactions.pt_tovID',
				'values' => Type_visit_entity::get_visits_list()
			],
			'return_type' => 'object'
		];

		$transactions = $this->transaction_model->get_records_by_join($transaction_params);

		if (empty($transactions))
		{
			return [];
		}

		$headcount_list = [];

		foreach ($transactions as $index => $transaction) 
		{
			$patient_details = $this->get_patient_details($transaction->pt_patientID);
			$cpo_details = $this->get_cpo_details($transaction->pt_patientID);

			$headcount_list[] = [
				'patient_id' => $patient_details->patient_id,
				'patient_name' => $patient_details->patient_name,
				'provider' => $transaction->get_provider_fullname(),
				'dateOfService' => $transaction->get_date_format($transaction->pt_dateOfService),
				'deductible' => $transaction->pt_deductible,
				'home_health' => $patient_details->hhc_name,
				'paid' => $transaction->get_date_format($transaction->pt_service_billed),
				'aw_billed' => $transaction->get_date_format($transaction->pt_aw_billed),
				'visit_billed' => $transaction->get_date_format($transaction->pt_visitBilled),
				'cpo_billed' => $cpo_details ? $cpo_details->get_date_format($cpo_details->ptcpo_dateBilled) : '',
				'pt_supervising_mdID' => $transaction->pt_supervising_mdID
			];
		}

		return $headcount_list;
	}

	public function get_unbilled_visits($tableColumn = '', $sortDirection = '') : array
	{
		$transaction_params = [
			'order' => [
				'key' => 'patient_transactions.pt_dateOfService',
				'by' => 'DESC'
			],
			'joins' => [
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
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '>=',
	        		'value' => $this->fromDate
        		],
        		[
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '<=',
	        		'value' => $this->toDate
        		],
        		[
					'key' => 'patient_transactions.pt_visitBilled',
					'condition' => '=',
	        		'value' => NULL
        		],
        		[
					'key' => 'patient_transactions.pt_archive',
					'condition' => '=',
	        		'value' => NULL
        		]
			],
			'where_in_list' => [
				'key' => 'patient_transactions.pt_tovID',
				'values' => Type_visit_entity::get_visits_list()
			],
			'return_type' => 'object'
		];

		$transactions = $this->transaction_model->get_records_by_join($transaction_params);

		if (empty($transactions))
		{
			return [];
		}

		$headcount_list = [];

		foreach ($transactions as $index => $transaction) 
		{
			$patient_details = $this->get_patient_details($transaction->pt_patientID);
			$cpo_details = $this->get_cpo_details($transaction->pt_patientID);

			$headcount_list[] = [
				'patient_id' => $patient_details->patient_id,
				'patient_name' => $patient_details->patient_name,
				'provider' => $transaction->get_provider_fullname(),
				'dateOfService' => $transaction->get_date_format($transaction->pt_dateOfService),
				'deductible' => $transaction->pt_deductible,
				'home_health' => $patient_details->hhc_name,
				'paid' => $transaction->get_date_format($transaction->pt_service_billed),
				'aw_billed' => $transaction->get_date_format($transaction->pt_aw_billed),
				'visit_billed' => $transaction->get_date_format($transaction->pt_visitBilled),
				'cpo_billed' => $cpo_details ? $cpo_details->get_date_format($cpo_details->ptcpo_dateBilled) : '',
				'pt_supervising_mdID' => $transaction->pt_supervising_mdID
			];
		}

		return $headcount_list;
	}

	public function get_blank_diagnoses($tableColumn = '', $sortDirection = '') : array
	{
		$transaction_params = [
			'order' => [
				'key' => 'patient_transactions.pt_dateOfService',
				'by' => 'DESC'
			],
			'joins' => [
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
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '>=',
	        		'value' => $this->fromDate
        		],
        		[
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '<=',
	        		'value' => $this->toDate
        		],
        		[
					'key' => 'patient_transactions.pt_icd10_codes',
					'condition' => '',
	        		'value' => ''
        		],
        		[
					'key' => 'patient_transactions.pt_archive',
					'condition' => '=',
	        		'value' => NULL
        		]
			],
			'where_in_list' => [
				'key' => 'patient_transactions.pt_tovID',
				'values' => Type_visit_entity::get_visits_list()
			],
			'return_type' => 'object'
		];

		$transactions = $this->transaction_model->get_records_by_join($transaction_params);

		if (empty($transactions))
		{
			return [];
		}

		$headcount_list = [];

		foreach ($transactions as $index => $transaction) 
		{
			$patient_details = $this->get_patient_details($transaction->pt_patientID);
			$cpo_details = $this->get_cpo_details($transaction->pt_patientID);

			$headcount_list[] = [
				'patient_id' => $patient_details->patient_id,
				'patient_name' => $patient_details->patient_name,
				'provider' => $transaction->get_provider_fullname(),
				'dateOfService' => $transaction->get_date_format($transaction->pt_dateOfService),
				'deductible' => $transaction->pt_deductible,
				'home_health' => $patient_details->hhc_name,
				'paid' => $transaction->get_date_format($transaction->pt_service_billed),
				'aw_billed' => $transaction->get_date_format($transaction->pt_aw_billed),
				'visit_billed' => $transaction->get_date_format($transaction->pt_visitBilled),
				'cpo_billed' => $cpo_details ? $cpo_details->get_date_format($cpo_details->ptcpo_dateBilled) : '',
				'pt_supervising_mdID' => $transaction->pt_supervising_mdID
			];
		}

		return $headcount_list;
	}

	public function get_noshow_patients($tableColumn = '', $sortDirection = '') : array
	{
		$transaction_params = [
			'order' => [
				'key' => 'patient_transactions.pt_dateOfService',
				'by' => 'DESC'
			],
			'joins' => [
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
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '>=',
	        		'value' => $this->fromDate
        		],
        		[
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '<=',
	        		'value' => $this->toDate
        		],
        		[
					'key' => 'patient_transactions.pt_archive',
					'condition' => '=',
	        		'value' => NULL
        		]
			],
			'where_in_list' => [
				'key' => 'patient_transactions.pt_tovID',
				'values' => Type_visit_entity::NO_SHOW
			],
			'return_type' => 'object'
		];

		$transactions = $this->transaction_model->get_records_by_join($transaction_params);

		if (empty($transactions))
		{
			return [];
		}

		$headcount_list = [];

		foreach ($transactions as $index => $transaction) 
		{
			$patient_details = $this->get_patient_details($transaction->pt_patientID);
			$cpo_details = $this->get_cpo_details($transaction->pt_patientID);

			$headcount_list[] = [
				'patient_id' => $patient_details->patient_id,
				'patient_name' => $patient_details->patient_name,
				'provider' => $transaction->get_provider_fullname(),
				'dateOfService' => $transaction->get_date_format($transaction->pt_dateOfService),
				'deductible' => $transaction->pt_deductible,
				'home_health' => $patient_details->hhc_name,
				'paid' => $transaction->get_date_format($transaction->pt_service_billed),
				'aw_billed' => $transaction->get_date_format($transaction->pt_aw_billed),
				'visit_billed' => $transaction->get_date_format($transaction->pt_visitBilled),
				'cpo_billed' => $cpo_details ? $cpo_details->get_date_format($cpo_details->ptcpo_dateBilled) : '',
				'pt_supervising_mdID' => $transaction->pt_supervising_mdID
			];
		}

		return $headcount_list;
	}

	private function get_patient_details(string $patient_id) : object
	{
		$patient_params = [
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
	        		'value' => $patient_id
        		]
			],
			'return_type' => 'row'
		];

		return $this->pt_profile_model->get_records_by_join($patient_params);
	}

	private function get_cpo_details(string $patient_id)
	{
		$cpo_params = [
			'where' => [
				[
					'key' => 'patient_CPO.ptcpo_patientID',
					'condition' => '',
	        		'value' => $patient_id
				],
				[
					'key' => 'patient_CPO.ptcpo_dateSigned',
					'condition' => '>=',
	        		'value' => $this->fromDate
				],
				[
					'key' => 'patient_CPO.ptcpo_dateSigned',
					'condition' => '<=',
	        		'value' => $this->toDate
				],
				[
					'key' => 'patient_CPO.ptcpo_archive',
					'condition' => '=',
	        		'value' => NULL
				]
			],
			'return_type' => 'row'
		];

		return $this->CPO_model->get_records_by_join($cpo_params);
	}

	private function get_transaction_details(string $patient_id, string $dateOfService) {
		$transaction_params = [
			'order' => [
				'key' => 'patient_transactions.pt_dateOfService',
				'by' => 'DESC'
			],
			'joins' => [
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
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '>=',
	        		'value' => $dateOfService
        		],
        		[
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '<=',
	        		'value' => $dateOfService
        		],
        		[
					'key' => 'patient_transactions.pt_patientID',
					'condition' => '',
	        		'value' => $patient_id
        		],
        		[
					'key' => 'patient_transactions.pt_archive',
					'condition' => '=',
	        		'value' => NULL
        		]
			],
			'where_in_list' => [
				'key' => 'patient_transactions.pt_tovID',
				'values' => Type_visit_entity::get_visits_list()
			],
			'return_type' => 'row'
		];

		return $this->transaction_model->get_records_by_join($transaction_params);
	}
}