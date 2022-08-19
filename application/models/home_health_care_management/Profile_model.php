<?php

class Profile_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'home_health_care';
	protected $entity = '\Mobiledrs\entities\home_health_care_management\Profile_entity';
	protected $record_entity = null;

	public function __construct()
	{
		parent::__construct();

		$this->record_entity = new \Mobiledrs\entities\home_health_care_management\Profile_entity();
	}

	public function prepare_data() : array
	{
		return [
			'hhc_name' => $this->input->post('hhc_name'),
			'hhc_contact_name' => $this->input->post('hhc_contact_name'),
			'hhc_phoneNumber' => $this->input->post('hhc_phoneNumber'),
			'hhc_faxNumber' => $this->input->post('hhc_faxNumber'),
			'hhc_email' => $this->input->post('hhc_email'),
			'hhc_email_additional' => $this->input->post('hhc_email_additional'),
			'hhc_address' => $this->input->post('hhc_address')
		];
	}

	public function search()
	{
		$newFromDate = $this->input->post('year') . '-' . $this->input->post('fromMonth')  . '-' . $this->input->post('fromDate');
		$newToDate = $this->input->post('year') . '-' . $this->input->post('toMonth')  . '-' . $this->input->post('toDate');

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
        		]
			],
			'return_type' => 'object',
			'select' => '*,patient_transactions.patient_hhcID as patient_hhcID,patient.patient_hhcID as patient_hhcID_2'
		];

		$patient_trans = $this->transaction_model->get_records_by_join($record_params);

		// echo "<pre>";
		// var_dump($patient_trans);
		// echo "</pre>";
		// exit;

		$page_data['records'] = [];

		foreach ($patient_trans as $patient_tran)
		{
			if ($this->input->post('hhcID') != $patient_tran->patient_hhcID) 
			{
				continue;
			}
			
			$homeHealth_params = [
				'key' => 'home_health_care.hhc_id',
				'value' => $patient_tran->patient_hhcID
			];

			$homeHealthInfo = $this->record($homeHealth_params);

			$page_data['records'][] = [
				'patientName' => $patient_tran->patient_name,
				'refDate' => $patient_tran->get_date_format($patient_tran->pt_dateRef),
				'providerName' => $patient_tran->get_provider_fullname(),
				'dateOfService' => $patient_tran->get_date_format($patient_tran->pt_dateOfService),
				'homeHealth' => $homeHealthInfo->hhc_name,
				'patientID' => $patient_tran->patient_id,
			];
		}

		return $page_data['records'];
	}
}