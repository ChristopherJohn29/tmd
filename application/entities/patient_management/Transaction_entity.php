<?php

namespace Mobiledrs\entities\patient_management;

class Transaction_entity extends \Mobiledrs\entities\Entity {

	protected $pt_id;
	protected $pt_tovID;
	protected $pt_patientID;
	protected $pt_providerID;
	protected $pt_dateOfService;
	protected $pt_deductible;
	protected $pt_serviceStatus;
	protected $pt_aw_ippe_date;
	protected $pt_aw_ippe_code;
	protected $pt_performed;
	protected $pt_acp;
	protected $pt_diabetes;
	protected $pt_tobacco;
	protected $pt_tcm;
	protected $pt_others;
	protected $pt_icd10_codes;
	protected $pt_dateBilled;
	protected $pt_visitBilled;
	protected $pt_dateRefEmailed;
	protected $pt_notes;
	protected $pt_dateCreated;
	protected $pt_mileage;

	protected $tov_id; 
	protected $tov_name;

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
	protected $provider_rate_others;
	protected $provider_rate_mileage;

    public function get_selected_choice_format(string $choice) : string
    {
		return ($choice == '1') ? 'Yes' : (($choice == '2') ? 'No' : '');
    }

    public function get_provider_fullname() : string
	{
		return $this->provider_firstname . ' ' . $this->provider_lastname;
	}

	public function get_selected_aw_ippe_code(string $code) : string
	{
		return $this->pt_aw_ippe_code == $code ? 'selected=true' : '';
	}

	public function get_selected_choice(string $data, string $choice) : string
	{
		return $data == $choice ? 'selected=true' : '';
	}

	public function get_selected_tov(string $tov) : string
	{
		return $this->pt_tovID == $tov ? 'selected=true' : '';
	}
}