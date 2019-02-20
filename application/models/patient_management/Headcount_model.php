<?php

use \Mobiledrs\entities\patient_management\Type_visit_entity;

class Headcount_model extends \Mobiledrs\core\MY_Models {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_headcount(string $month, string $fromDate, string $toDate, string $year) : array
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
	        		'value' => $year . '-' . $month . '-' . $fromDate
        		],
        		[
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '<=',
	        		'value' => $year . '-' . $month . '-' . $toDate
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
		$dup_patient_id_list = [];

		foreach ($transactions as $index => $transaction) 
		{
			// if (in_array($transaction->pt_patientID, $dup_patient_id_list))
			// {
			// 	continue;
			// }

			$patient_details = $this->get_patient_details($transaction->pt_patientID);

			$headcount_list[] = [
				'patient_id' => $patient_details->patient_id,
				'patient_name' => $patient_details->patient_name,
				'provider' => $transaction->get_provider_fullname(),
				'dateOfService' => $transaction->get_date_format($transaction->pt_dateOfService),
				'deductible' => $transaction->pt_deductible,
				'home_health' => $patient_details->hhc_name,
				'visit_billed' => $transaction->get_date_format($transaction->pt_visitBilled)
			];

			$dup_patient_id_list[] = $transaction->pt_patientID;
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

		return $this->profile_model->get_records_by_join($patient_params);
	}
}