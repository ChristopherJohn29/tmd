<?php

namespace Mobiledrs\entities\patient_management;

class Lab_order_entity extends \Mobiledrs\entities\Entity {

	protected $lab_order_id;
	protected $patient_id;
	protected $provider_id;
	protected $date_referral;
	protected $status;
	protected $notes;
	protected $added_by;
	protected $from_visit;
	protected $column_archive;

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
	protected $provider_inactive;
	protected $provider_photo;
	protected $provider_rate_ca_homeHealth;
	protected $provider_rate_ca_teleHealth;

	protected $patient_name;
	protected $patient_gender;
	protected $patient_medicareNum; 
	protected $patient_dateOfBirth; 
	protected $patient_phoneNum;
	protected $patient_address;
	protected $patient_hhcID;
	protected $patient_dateCreated;
	protected $patient_caregiver_family;
	protected $patient_sub_note;
	protected $patient_spouse;
	protected $patient_placeOfService;
	protected $patient_pharmacy;
	protected $patient_pharmacyPhone;
	protected $patient_drug_allergy;
	protected $lab_file;



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

	public function get_provider_fullname() : string
	{
		return ($this->provider_firstname != '' ? ($this->provider_firstname . ' ') : '') . $this->provider_lastname;
	}


}