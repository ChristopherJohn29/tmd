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
			'patient_firstname' => $this->record_entity->patient_firstname,
			'patient_lastname' => $this->record_entity->patient_lastname,
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

	public function prepare_search_data() : array
	{
		return [
			'patient_firstname' => $this->input->post('patient_firstname'),
			'patient_lastname' => $this->input->post('patient_lastname'),
			'patient_medicareNum' => $this->input->post('patient_medicareNum')
		];
	}
}