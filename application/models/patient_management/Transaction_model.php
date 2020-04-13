<?php

class Transaction_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'patient_transactions';
	protected $entity = '\Mobiledrs\entities\patient_management\Transaction_entity';
	protected $record_entity = null;

	public function __construct()
	{
		parent::__construct();

		$this->record_entity = new \Mobiledrs\entities\patient_management\Transaction_entity();
	}

	public function prepare_data() : array
	{
		$this->prepare_entity_data();

		return [
			'pt_id' => $this->record_entity->pt_id,
			'pt_tovID' => $this->record_entity->pt_tovID,
			'pt_patientID' => $this->record_entity->pt_patientID,
			'pt_providerID' => empty($this->record_entity->pt_providerID) ? 
				NULL : $this->record_entity->pt_providerID,
			'pt_dateOfService' => $this->record_entity->set_date_format($this->record_entity->pt_dateOfService),
			'pt_deductible' => $this->record_entity->pt_deductible,
			'pt_aw_ippe_date' => $this->record_entity->set_date_format($this->record_entity->pt_aw_ippe_date),
			'pt_aw_ippe_code' => $this->record_entity->pt_aw_ippe_code,
			'pt_performed' => $this->record_entity->pt_performed,
			'pt_acp' => $this->record_entity->pt_acp,
			'pt_diabetes' => $this->record_entity->pt_diabetes,
			'pt_tobacco' => $this->record_entity->pt_tobacco,
			'pt_tcm' => $this->record_entity->pt_tcm,
			'pt_mileage' => $this->record_entity->pt_mileage,
			'pt_others' => $this->record_entity->pt_others,
			'pt_icd10_codes' => $this->record_entity->pt_icd10_codes,
			'pt_dateRef' => $this->record_entity->set_date_format($this->record_entity->pt_dateRef),
			'pt_dateRefEmailed' => $this->record_entity->set_date_format($this->record_entity->pt_dateRefEmailed),
			'pt_notes' => $this->record_entity->pt_notes,
			'pt_supervising_mdID' => empty($this->record_entity->pt_supervising_mdID) ? null : $this->record_entity->pt_supervising_mdID,
			'pt_status' => empty($this->record_entity->pt_status) ? null : $this->record_entity->pt_status
		];
	}
}