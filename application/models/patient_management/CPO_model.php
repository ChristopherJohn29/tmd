<?php

class CPO_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'patient_CPO';
	protected $entity = '\Mobiledrs\entities\patient_management\CPO_entity';
	protected $record_entity = null;

	private $certification_status = 'Certification';
	private $re_certification_status= 'Re-Certification';

	public function __construct()
	{
		parent::__construct();

		$this->record_entity = new \Mobiledrs\entities\patient_management\CPO_entity();
	}

	public function prepare_data() : array
	{
		$this->prepare_entity_data();

		return [
			'ptcpo_id' => $this->record_entity->ptcpo_id,
			'ptcpo_patientID' => $this->record_entity->ptcpo_patientID,
			'ptcpo_period' => $this->record_entity->ptcpo_period,
			'ptcpo_dateSigned' =>  $this->record_entity->set_date_format($this->record_entity->ptcpo_dateSigned),
			'ptcpo_firstMonthCPO' => $this->record_entity->ptcpo_firstMonthCPO,
			'ptcpo_secondMonthCPO' => $this->record_entity->ptcpo_secondMonthCPO,
			'ptcpo_thirdMonthCPO' => $this->record_entity->ptcpo_thirdMonthCPO,
			'ptcpo_dischargeDate' => $this->record_entity->set_date_format($this->record_entity->ptcpo_dischargeDate),
			'ptcpo_dateBilled' => $this->record_entity->set_date_format($this->record_entity->ptcpo_dateBilled),
			'ptcpo_status' => $this->generate_status()
		];
	}

	public function generate_status() : string
	{
		$status = '';

		if ($this->record_entity->ptcpo_id)
		{
			$cpo_params = [
				'key' => 'ptcpo_id',
				'value' => $this->record_entity->ptcpo_id
			];

			$res = parent::record($cpo_params);

			$status = ( ! empty($res)) ?
				$res->ptcpo_status :
				$this->certification_status;
		}
		else
		{
			$cpo_params = [
				'key' => 'ptcpo_patientID',
				'value' => $this->record_entity->ptcpo_patientID
			];

			$res = parent::record($cpo_params);

			$status = ( ! empty($res)) ? 
				$this->re_certification_status :
				$this->certification_status;
		}

		return $status;
	}
}