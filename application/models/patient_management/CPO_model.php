<?php

class CPO_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'patient_CPO';
	protected $entity = '\Mobiledrs\entities\patient_management\CPO_entity';
	protected $record_entity = null;

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
			'ptcpo_period' => $this->formatDate(
				$this->record_entity->ptcpo_start_period,
				$this->record_entity->ptcpo_end_period
			),
			'ptcpo_dateSigned' =>  $this->record_entity->set_date_format($this->record_entity->ptcpo_dateSigned),
			'ptcpo_firstMonthCPO' => $this->formatDate(
				$this->record_entity->ptcpo_firstMonthCPOFromDate,
				$this->record_entity->ptcpo_firstMonthCPOToDate
			),
			'ptcpo_secondMonthCPO' => $this->formatDate(
				$this->record_entity->ptcpo_secondMonthCPOFromDate,
				$this->record_entity->ptcpo_secondMonthCPOToDate
			),
			'ptcpo_thirdMonthCPO' => $this->formatDate(
				$this->record_entity->ptcpo_thirdMonthCPOFromDate,
				$this->record_entity->ptcpo_thirdMonthCPOToDate
			),
			'ptcpo_dischargeDate' => $this->record_entity->set_date_format($this->record_entity->ptcpo_dischargeDate),
			'ptcpo_dateBilled' => $this->record_entity->set_date_format($this->record_entity->ptcpo_dateBilled),
			'ptcpo_status' => $this->record_entity->ptcpo_status,
			'ptcpo_dateOfService' => $this->record_entity->set_date_format($this->record_entity->ptcpo_dateOfService)
		];
	}

	public function formatDate($startDate, $endDate) : string
	{
		return (empty($startDate) ? '' : $startDate) . (empty($endDate) ? '' : ' - ') . (empty($endDate) ? '' : $endDate);
	}
}