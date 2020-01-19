<?php

class Superbill_model extends \Mobiledrs\core\MY_Models {

	protected $table_name = 'patient';
	protected $entity = '\Mobiledrs\entities\superbill_management\Superbill_cpo_pat_trans_entity';

	public function __construct()
	{
		parent::__construct();
	}

	public function get_transaction(
		string $fromDate, 
		string $toDate, 
		array $type_of_visit = [], 
		string $type,
		array $ids
	) : array
	{
		$billed_columns = [
			'aw' => 'pt_aw_billed',
			'hv' => 'pt_visitBilled',
			'fv' => 'pt_visitBilled'
		];

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
        		],
        		[
					'key' => 'patient_transactions.pt_deductible',
					'condition' => '<>',
	        		'value' => 'Hospice'
        		],
        		[
					'key' => 'patient_transactions.pt_archive',
					'condition' => '=',
	        		'value' => NULL
        		]
			],
			'return_type' => 'object'
		];

		if ( ! empty($ids)) {
			$transaction_params['where_in_list'] = [
				'key' => 'patient_transactions.pt_id',
				'values' => $ids
			];
		}

		if ( ! empty($type_of_visit))
		{
			$transaction_params['where_in_list'] = [
				'key' => 'patient_transactions.pt_tovID',
				'values' => $type_of_visit
			];
		}

		return $this->transaction_model->get_records_by_join($transaction_params);
	}

	public function get_CPO(string $fromDate, string $toDate, array $ids) : array
	{
		$new_fromDate = strpos($fromDate, '/') !== FALSE ?
			date_format(date_create($fromDate), 'Y-m-d') :
			date_format(date_create(str_replace('_', '/', $fromDate)), 'Y-m-d');

		$new_toDate =  strpos($toDate, '/') !== FALSE ?
			date_format(date_create($toDate), 'Y-m-d') :
			date_format(date_create(str_replace('_', '/', $toDate)), 'Y-m-d');

		// SELECT 
		// 	ptcpo_id,
		// 	STR_TO_DATE(TRIM(SUBSTRING(patient_CPO.ptcpo_period, 1, INSTR(patient_CPO.ptcpo_period, ' - '))), '%m/%d/%Y') AS cpoStartDatePeriod,
		// 	STR_TO_DATE(TRIM(SUBSTRING(patient_CPO.ptcpo_period, INSTR(patient_CPO.ptcpo_period, ' - ') + 3)), '%m/%d/%Y') AS cpoEndDatePeriod
		// FROM `patient_CPO`
		// WHERE STR_TO_DATE(TRIM(SUBSTRING(patient_CPO.ptcpo_period, 1, INSTR(patient_CPO.ptcpo_period, ' - '))), '%m/%d/%Y') >= '2018-08-01' AND
		// 	STR_TO_DATE(TRIM(SUBSTRING(patient_CPO.ptcpo_period, INSTR(patient_CPO.ptcpo_period, ' - ') + 3)), '%m/%d/%Y')  <= '2018-10-30'

		$cpo_trans = [
			'select' => "*, STR_TO_DATE(SUBSTRING(patient_CPO.ptcpo_period, 1, INSTR(patient_CPO.ptcpo_period, ' - ')), '%m/%d/%Y') AS cpoStartDate",
			'where' => [
				[
					'key' => "STR_TO_DATE(SUBSTRING(patient_CPO.ptcpo_period, 1, INSTR(patient_CPO.ptcpo_period, ' - ')), '%m/%d/%Y')",
					'condition' => '>=',
					'value' => $new_fromDate
				],
				[
					'key' => "STR_TO_DATE(SUBSTRING(patient_CPO.ptcpo_period, 1, INSTR(patient_CPO.ptcpo_period, ' - ')), '%m/%d/%Y')",
					'condition' => '<=',
					'value' => $new_toDate
				],
				[
					'key' => 'patient_CPO.ptcpo_dischargeDate',
					'condition' => '<>',
					'value' => NULL
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
			'orders' => [
				/*[
					'column' => 'patient_CPO.ptcpo_patientID',
					'direction' => 'ASC'
				],
				[
					'column' => 'patient_CPO.ptcpo_dateCreated',
					'direction' => 'ASC'
				],*/
				[
					'column' => "cpoStartDate",
					'direction' => 'ASC'
				]
			]
		];

		if ( ! empty($ids)) {
			$cpo_trans['where_in'] = [
				'column' => 'ptcpo_id',
				'values' => $ids
			];
		}
		
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

		$newProf_trans = $this->supervising_md_model->get_supervisingMD_details($prof_trans);

		$pat_trans_entity = new \Mobiledrs\entities\superbill_management\Superbill_cpo_pat_trans_entity();
		$pat_trans_entity->set_display_data(
			$CPO,
			$newProf_trans
		);

		$dateFormatter = new Date_formatter();
		$dateFormatter->set_date($new_fromDate, $new_toDate);
		$datePeriod = $dateFormatter->format();

		return [
			'transactions' => $pat_trans_entity->format_display(),
			'CPOs' => $CPO,
			'datePeriod' => $datePeriod
		];
	}
}