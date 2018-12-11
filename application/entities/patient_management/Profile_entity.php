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

	protected $hhc_id;
	protected $hhc_name;
	protected $hhc_contact_name;
	protected $hhc_phoneNumber;
	protected $hhc_faxNumber;
	protected $hhc_email;
	protected $hhc_address;
	protected $hhc_dateCreated;

	public function get_fullname() : string
	{
		return $this->patient_firstname . ' ' . $this->patient_lastname;
	}

	public function get_reverse_fullname() : string
	{
		return $this->patient_lastname . ', ' . $this->patient_firstname;
	}

	public function get_selected_gender(string $gender) : string
	{
		return $gender == $this->patient_gender ? 'selected=true' : '';
	}

	public function has_changed_medicareNum(string $medicareNum) : bool
	{
		return ($this->patient_medicareNum != $medicareNum) ? true : false;
	}
}