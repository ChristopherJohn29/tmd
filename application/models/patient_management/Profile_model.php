<?php

class Profile_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'patient';
	protected $entity = '\Mobiledrs\entities\patient_management\Profile_entity';
	protected $record_entity = null;

	public function __construct()
	{
		parent::__construct();

		$this->record_entity = new \Mobiledrs\entities\patient_management\Profile_entity();
	}

	public function prepare_data() : array
	{
		$this->prepare_entity_data();

		return [
			'patient_name' => $this->record_entity->patient_name,
			'patient_gender' => $this->record_entity->patient_gender,
			'patient_referralDate' => $this->record_entity->set_date_format($this->record_entity->patient_referralDate),
			'patient_medicareNum' => $this->record_entity->patient_medicareNum,
			'patient_dateOfBirth' => $this->record_entity->set_date_format($this->record_entity->patient_dateOfBirth),
			'patient_phoneNum' => $this->record_entity->patient_phoneNum,
			'patient_address' => $this->record_entity->patient_address,
			'patient_hhcID' => $this->record_entity->patient_hhcID,
			'patient_caregiver_family' => $this->record_entity->patient_caregiver_family
		];
	}

	public function search() : array
	{
		$patients_params = [
			'where_data' => [
				[ 
					'key' => 'patient.patient_firstname', 
					'value' => $this->input->post('search_term')
				],
				[ 
					'key' => 'patient.patient_lastname', 
					'value' => $this->input->post('search_term') 
				],
				[ 
					'key' => 'patient.patient_medicareNum', 
					'value' => $this->input->post('search_term') 
				]
			]
		];

		$records = $this->find($patients_params);

		return $this->get_pt_profile_trans($records);
	}
	
	public function get_pt_profile_trans(array $records) : array
	{
		$new_records = [];

		for ($i = 0; $i < count($records); $i++) {
			$trans_params = [
				'key' => 'patient_transactions.pt_patientID',
				'value' => $records[$i]->patient_id,
				'joins' => [
					[
						'join_table_name' => 'provider',
						'join_table_key' => 'provider.provider_id',
						'join_table_condition' => '=',
						'join_table_value' => 'patient_transactions.pt_providerID',
						'join_table_type' => 'left'
					]
				]
			];

			$patient_trans = $this->transaction_model->record($trans_params);

			$new_records[] = [
				'patientId' => $records[$i]->patient_id,
				'pt_tovID' => $patient_trans ? $patient_trans->pt_tovID : '',
				'patientName' => $records[$i]->patient_name,
				'patientReferralDate' => $records[$i]->get_date_format($records[$i]->patient_referralDate),
				'ICD10' => $patient_trans ? $patient_trans->pt_icd10_codes : '',
				'notes' => $patient_trans ? $patient_trans->pt_notes : '',
				'dateOfService' => $patient_trans ? $patient_trans->get_date_format($patient_trans->pt_dateOfService) : '',
				'provider' => $patient_trans ? $patient_trans->get_provider_fullname() : ''
			];
		}

		return $new_records;
	}
}