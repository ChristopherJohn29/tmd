<?php

class Payroll_model extends \Mobiledrs\core\MY_Models {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function list(string $fromDate, string $toDate, array $payroll_summaries) : array
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
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '>=',
	        		'value' => $fromDate
				],
				[
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '<=',
	        		'value' => $toDate
				],
				[
					'key' => 'patient_transactions.pt_archive',
					'condition' => '=',
	        		'value' => NULL
				],
				[
					'key' => 'patient_transactions.pt_tovID',
					'condition' => '<>',
	        		'value' => \Mobiledrs\entities\patient_management\Type_visit_entity::CANCELLED
				]
			],
			'return_type' => 'object'
		];

		$provider_lists = $this->transaction_model->get_records_by_join($transaction_params);

		$payroll_list = [];

		foreach ($provider_lists as  $provider_list) 
		{	
			$provider_params = [
				'key' => 'provider_id',
	        	'value' => $provider_list->provider_id,
			];

			$provider_details = $this->profile_model->record($provider_params);

			$provider_transactions = $this->details(
				$provider_list->provider_id,
				$fromDate,
				$toDate
			);

			$payroll_entity = new \Mobiledrs\entities\payroll_management\Payroll_entity(
				$provider_details,
				$provider_transactions
			);

			$provider_payment_summary = $payroll_entity->compute_payment_summary();
			$transaction_entity = new \Mobiledrs\entities\patient_management\Transaction_entity;
			
			foreach ($payroll_summaries as $payroll_summary) 
			{
				if ($payroll_summary->provider_id === $provider_list->provider_id) {
					$provider_payment_summary['total_salary'] += ((float) $payroll_summary->mileage) * 
						$provider_payment_summary['mileage']['amount'];
				}
			}

			$payroll_list[] = [
				'provider_id' => $provider_list->provider_id,
				'provider_name' => $provider_list->get_provider_fullname(),
				'total_visits' => $provider_payment_summary['total_visits'],
				'total_salary' => $provider_payment_summary['total_salary'],
				'dateBilled' => $transaction_entity->getLatestServiceBilledDate($provider_transactions)
			];
		}

		return $payroll_list;
	}

	public function get_unpaid_providers(string $fromDate, string $toDate) : array
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
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '>=',
	        		'value' => $fromDate
				],
				[
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '<=',
	        		'value' => $toDate
				],
				[
					'key' => 'patient_transactions.pt_archive',
					'condition' => '=',
	        		'value' => NULL
				],
				[
					'key' => 'patient_transactions.pt_tovID',
					'condition' => '<>',
	        		'value' => \Mobiledrs\entities\patient_management\Type_visit_entity::CANCELLED
				],
				[
					'key' => 'patient_transactions.pt_service_billed',
					'condition' => '=',
	        		'value' => NULL
				]
			],
			'return_type' => 'object'
		];

		$provider_lists = $this->transaction_model->get_records_by_join($transaction_params);

		$payroll_list = [];

		foreach ($provider_lists as  $provider_list) 
		{	
			$provider_params = [
				'key' => 'provider_id',
	        	'value' => $provider_list->provider_id,
			];

			$provider_details = $this->pr_profile_model->record($provider_params);

			$provider_transactions = $this->unpaidProviderTransactions(
				$provider_list->provider_id,
				$fromDate,
				$toDate
			);

			$payroll_entity = new \Mobiledrs\entities\payroll_management\Payroll_entity(
				$provider_details,
				$provider_transactions
			);

			$provider_payment_summary = $payroll_entity->compute_payment_summary();

			$payroll_list[] = [
				'provider_id' => $provider_list->provider_id,
				'provider_name' => $provider_list->get_provider_fullname(),
				'total_visits' => $provider_payment_summary['total_visits'],
				'total_salary' => $provider_payment_summary['total_salary']
			];
		}

		return $payroll_list;
	}

	public function unpaidProviderTransactions(string $provider_id, string $fromDate, string $toDate)
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
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '>=',
	        		'value' => $fromDate
				],
				[
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '<=',
	        		'value' => $toDate
				],
				[
					'key' => 'patient_transactions.pt_archive',
					'condition' => '=',
	        		'value' => NULL
				],
				[
					'key' => 'patient_transactions.pt_tovID',
					'condition' => '<>',
	        		'value' => \Mobiledrs\entities\patient_management\Type_visit_entity::CANCELLED
				],
				[
					'key' => 'patient_transactions.pt_service_billed',
					'condition' => '=',
	        		'value' => NULL
				],
				[
					'key' => 'patient_transactions.pt_providerID',
					'condition' => '=',
	        		'value' => $provider_id
				]
			],
			'return_type' => 'object'
		];

		return $this->transaction_model->get_records_by_join($transaction_params);
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
					'key' => 'patient_transactions.pt_archive',
					'condition' => '=',
	        		'value' => NULL
				],
				[
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '<=',
	        		'value' => $toDate
				],
				[
					'key' => 'patient_transactions.pt_tovID',
					'condition' => '<>',
	        		'value' => \Mobiledrs\entities\patient_management\Type_visit_entity::CANCELLED
				]
			],
			'return_type' => 'object'
		];

		return $this->transaction_model->get_records_by_join($transaction_params);
	}
}