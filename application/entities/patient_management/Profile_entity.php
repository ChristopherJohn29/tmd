<?php

namespace Mobiledrs\entities\patient_management;

class Profile_entity extends \Mobiledrs\entities\Entity {

	protected $patient_id;
	protected $patient_firstname;
	protected $patient_lastname;
	protected $patient_gender;
	protected $patient_referralDate; 
	protected $patient_medicareNum; 
	protected $patient_dateOfBirth; 
	protected $patient_phoneNum;
	protected $patient_address;
	protected $patient_hhcID;
	protected $patient_dateCreated;
	protected $patient_caregiver_family;

	public function get_reverse_fullname() : string
	{
		return $this->patient_lastname . ', ' . $this->patient_firstname;
	}
}