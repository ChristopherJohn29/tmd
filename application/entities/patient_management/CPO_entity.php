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
	protected $ptcpo_firstMonthCPOFromDate;
	protected $ptcpo_firstMonthCPOToDate;
	protected $ptcpo_secondMonthCPO;
	protected $ptcpo_secondMonthCPOFromDate;
	protected $ptcpo_secondMonthCPOToDate;
	protected $ptcpo_thirdMonthCPO;
	protected $ptcpo_thirdMonthCPOFromDate;
	protected $ptcpo_thirdMonthCPOToDate;
	protected $ptcpo_dischargeDate;
	protected $ptcpo_dateBilled;
	protected $ptcpo_status;
	protected $ptcpo_dateCreated;
	protected $ptcpo_dateOfService;
	protected $ptcpo_archive;
	protected $ptcpo_addedByUserID;
	protected $cpo_file;
	protected $cpo_file_cert;
	
	

	protected $cpoStartDate = null;

	protected $user_id;
	protected $user_firstname;
	protected $user_lastname;
	protected $user_email;
	protected $user_dateCreated;
	protected $user_password;
	protected $user_roleID;
	protected $user_sessionID;
	protected $user_archive;
	protected $user_photo;

	public const CERTIFICATION = 'Certification';
	public const RECERTIFICATION = 'Re-Certification';

	public function get_start_date($date) {
		$startDate = explode(' - ', $date);

		return $startDate[0] ?? '';
	} 

	public function get_end_date($date) {
		$endDate = explode(' - ', $date);

		return $endDate[1] ?? '';
	}
}