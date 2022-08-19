<?php

class Supervising_md_model extends \Mobiledrs\core\MY_Models {

	public function search()
	{
		$newFromDate = implode('-', [
			$this->input->post('year'),
			$this->input->post('fromMonth'),
			$this->input->post('fromDate')
		]);

		$newToDate = implode('-', [
			$this->input->post('year'),
			$this->input->post('toMonth'),
			$this->input->post('toDate')
		]);

		$record_params = [
			'joins' => [
				[
					'join_table_name' => 'patient',
					'join_table_key' => 'patient.patient_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_transactions.pt_patientID',
					'join_table_type' => 'inner'
				],
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
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '>=',
	        		'value' => $newFromDate
        		],
        		[
					'key' => 'patient_transactions.pt_dateOfService',
					'condition' => '<=',
	        		'value' => $newToDate
        		],
        		[
					'key' => 'patient_transactions.pt_supervising_mdID',
					'condition' => '=',
	        		'value' => $this->input->post('patient_supervising_mdID')
        		],
        		[
					'key' => 'patient_transactions.pt_archive',
					'condition' => '=',
	        		'value' => NULL
        		]
			],
			'return_type' => 'object'
		];

		$patient_trans = $this->transaction_model->get_records_by_join($record_params);
		$page_data['records'] = [];

		foreach ($patient_trans as $patient_tran)
		{			
			$homeHealth_params = [
				'key' => 'home_health_care.hhc_id',
				'value' => $patient_tran->patient_hhcID
			];

			$homeHealthInfo = $this->Profile_model->record($homeHealth_params);

			$page_data['records'][] = [
				'patientName' => $patient_tran->patient_name,
				'refDate' => $patient_tran->get_date_format($patient_tran->pt_dateRef),
				'providerName' => $patient_tran->get_provider_fullname(),
				'dateOfService' => $patient_tran->get_date_format($patient_tran->pt_dateOfService),
				'homeHealth' => $homeHealthInfo->hhc_name,
				'patientID' => $patient_tran->patient_id,
				'icd' => $patient_tran->pt_icd10_codes
			];
		}

		return $page_data['records'];
	}	
}