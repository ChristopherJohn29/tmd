<?php

namespace Mobiledrs\entities\patient_management;

class CPO_entity extends \Mobiledrs\entities\Entity {

	protected $ptcpo_id;
	protected $ptcpo_patientID;
	protected $ptcpo_period;
	protected $ptcpo_start_period;
	protected $ptcpo_end_period;
	protected $ptcpo_dateSigned;
	protected $ptcpo_firstMonthCPO;
	protected $ptcpo_secondMonthCPO;
	protected $ptcpo_thirdMonthCPO;
	protected $ptcpo_dischargeDate;
	protected $ptcpo_dateBilled;
	protected $ptcpo_status;
	protected $ptcpo_dateCreated;
	protected $ptcpo_dateOfService;

	public const CERTIFICATION = 'Certification';
	public const RECERTIFICATION = 'Re-Certification';

	public function get_start_date_period($date) {
		return explode(' - ', $date)[0];
	} 

	public function get_end_date_period($date) {
		return explode(' - ', $date)[1];
	}
}