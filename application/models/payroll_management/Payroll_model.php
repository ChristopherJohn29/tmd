<?php

class Payroll_model extends \Mobiledrs\core\MY_Models {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function details(string $provider_id, string $fromDate, string $toDate) : array
	{
		$transaction_params = [
			'order' => [
				'key' => 'patient_transactions.pt_dateOfService',
				'by' => 'ASC'
			],
			'joins' => [
				[
					'join_table_name' => 'provider',
					'join_table_key' => 'provider.provider_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_transactions.pt_providerID',
					'join_table_type' => 'inner'
				],
				[
					'join_table_name' => 'type_of_visits',
					'join_table_key' => 'type_of_visits.tov_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_transactions.pt_tovID',
					'join_table_type' => 'inner'
				],
				[
					'join_table_name' => 'patient',
					'join_table_key' => 'patient.patient_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_transactions.pt_patientID',
					'join_table_type' => 'inner'
				]
			],
			'where' => [
				[
					'key' => 'patient_transactions.pt_providerID',
					'condition' => '=',
	        		'value' => $provider_id
				],
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

		return $this->transaction_model->get_records_by_join($transaction_params);
	}
}