<?php

class Payroll_model extends \Mobiledrs\core\MY_Models {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function details(string $provider_id) : array
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
				]
			],
			'where' => [
				[
					'key' => 'patient_transactions.pt_providerID',
					'condition' => '=',
	        		'value' => $provider_id
				]/*,
				[
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '>=',
	        		'value' => $this->input->post('fromDate')
				],
				[
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '<=',
	        		'value' => $this->input->post('toDate')
				]*/
			],
			'return_type' => 'object'
		];

		return $this->transaction_model->get_records_by_join($transaction_params);
	}
}