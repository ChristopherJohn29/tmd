<?php

namespace Mobiledrs\entities\patient_management;

class Profile_entity extends \Mobiledrs\entities\Entity {

	protected $patient_id;
	protected $patient_name;
	protected $patient_gender;
	protected $patient_medicareNum; 
	protected $patient_dateOfBirth; 
	protected $patient_phoneNum;
	protected $patient_address;
	protected $patient_hhcID;
	protected $patient_dateCreated;
	protected $patient_caregiver_family;
	protected $patient_placeOfService;
	protected $patient_supervising_MD;

	protected $hhc_id;
	protected $hhc_name;
	protected $hhc_contact_name;
	protected $hhc_phoneNumber;
	protected $hhc_faxNumber;
	protected $hhc_email;
	protected $hhc_address;
	protected $hhc_dateCreated;

	protected $pos_id;
	protected $pos_code;
	protected $pos_name;

	public function get_selected_gender(string $gender) : string
	{
		return $gender == $this->patient_gender ? 'selected=true' : '';
	}

	public function has_changed_medicareNum(string $medicareNum) : bool
	{
		return $this->patient_medicareNum != $medicareNum;
	}

	public function get_selected_pos(string $pos_id) : string
	{
		return $pos_id == $this->patient_placeOfService ? 'selected=true' : '';
	}

	public function get_fullpos_name() : string
	{
		return ($this->patient_placeOfService) ? ($this->pos_name .  ' (' . $this->pos_code . ')') : '' ;
	}
}