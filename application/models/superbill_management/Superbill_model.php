<?php

class Superbill_model extends \Mobiledrs\core\MY_Models {

	protected $table_name = 'patient';
	protected $entity = '\Mobiledrs\entities\superbill_management\Superbill_cpo_pat_trans_entity';

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

	public function get_CPO(string $fromDate, string $toDate) : array
	{
		$new_fromDate = str_replace('/', '-', $fromDate) . ' 00:00:00';
		$new_toDate = str_replace('/', '-', $toDate) . ' 00:00:00';

		$cpo_trans = [
			'key' => 'ptcpo_patientID',
			'order_by' => 'ASC',
			'where' => [
				[
					'key' => 'patient_cpo.ptcpo_dateCreated',
					'condition' => '>=',
					'value' => $new_fromDate
				],
				[
					'key' => 'patient_cpo.ptcpo_dateCreated',
					'condition' => '<=',
					'value' => $new_toDate
				]
			]
		];

		$CPO =  $this->CPO_model->records($cpo_trans);

		$pat_trans_params = [
			'joins' => [
				[
					'join_table_name' => 'patient_transactions',
					'join_table_key' => 'patient_transactions.pt_patientID',
					'join_table_condition' => '=',
					'join_table_value' => 'patient.patient_id',
					'join_table_type' => 'inner'
				]
			],
			'return_type' => 'object'
		];

		$prof_trans = $this->get_records_by_join($pat_trans_params);

		$pat_trans_entity = new \Mobiledrs\entities\superbill_management\Superbill_cpo_pat_trans_entity();
		$pat_trans_entity->set_display_data(
			$CPO,
			$prof_trans
		);

		return [
			'transactions' => $pat_trans_entity->format_display(),
			'CPOs' => $CPO
		];
	}
}