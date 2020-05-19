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
	protected $patient_pharmacy;
	protected $patient_pharmacyPhone;
	protected $patient_drug_allergy;

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

	protected $provider_id;
	protected $provider_firstname;
	protected $provider_lastname;
	protected $provider_contactNum;
	protected $provider_email;
	protected $provider_address;
	protected $provider_dateOfBirth;
	protected $provider_languages;
	protected $provider_areas;
	protected $provider_npi;
	protected $provider_dea;
	protected $provider_license;
	protected $provider_gender;
	protected $provider_dateCreated;
	protected $provider_rate_initialVisit;
	protected $provider_rate_followUpVisit;
	protected $provider_rate_aw;
	protected $provider_rate_acp;
	protected $provider_rate_noShowPT;
	protected $provider_rate_mileage;
	protected $provider_rate_initialVisit_TeleHealth;
	protected $provider_rate_followUpVisit_TeleHealth;
	protected $provider_supervising_MD;

	public function get_selected_gender(string $gender) : string
	{
		return $gender == $this->patient_gender ? 'selected=true' : '';
	}

	public function get_supervising_md_fullname(): string
	{
		return $this->provider_firstname . ' ' . $this->provider_lastname; 
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