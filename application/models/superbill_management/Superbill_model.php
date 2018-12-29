<?php

class Superbill_model extends \Mobiledrs\core\MY_Models {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_transaction(string $fromDate, string $toDate, array $type_of_visit = []) : array
	{
		$transaction_params = [
			'joins' => [
				[
					'join_table_name' => 'type_of_visits',
					'join_table_key' => 'type_of_visits.tov_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_transactions.pt_tovID',
					'join_table_type' => 'inner'
				],
				[
					'join_table_name' => 'provider',
					'join_table_key' => 'provider.provider_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_transactions.pt_providerID',
					'join_table_type' => 'left'
				],
				[
					'join_table_name' => 'patient',
					'join_table_key' => 'patient.patient_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_transactions.pt_patientID',
					'join_table_type' => 'left'
				]
			],
			'where' => [
				[
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '>=',
	        		'value' => $fromDate
        		],
        		[
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '<=',
	        		'value' => $toDate
        		]
			],
			'return_type' => 'object'
		];

		if ( ! empty($type_of_visit))
		{
			$transaction_params['where_in_list'] = [
				'key' => 'patient_transactions.pt_tovID',
				'values' => $type_of_visit
			];
		}

		return $this->transaction_model->get_records_by_join($transaction_params);
	}
}