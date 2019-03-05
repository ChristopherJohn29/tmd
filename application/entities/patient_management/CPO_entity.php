<?php

namespace Mobiledrs\entities\patient_management;

class CPO_entity extends \Mobiledrs\entities\Entity {

	protected $ptcpo_id;
	protected $ptcpo_patientID;
	protected $ptcpo_period;
	protected $ptcpo_dateSigned;
	protected $ptcpo_firstMonthCPO;
	protected $ptcpo_secondMonthCPO;
	protected $ptcpo_thirdMonthCPO;
	protected $ptcpo_dischargeDate;
	protected $ptcpo_dateBilled;
	protected $ptcpo_status;
	protected $ptcpo_dateCreated;

	public const CERTIFICATION = 'Certification';
	public const RECERTIFICATION = 'Re-Certification';
}