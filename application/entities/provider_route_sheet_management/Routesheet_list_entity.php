<?php

namespace Mobiledrs\entities\provider_route_sheet_management;

class Routesheet_list_entity extends \Mobiledrs\entities\Entity {
	
	protected $prsl_id;
	protected $prsl_prsID;
	protected $prsl_fromTime;
	protected $prsl_toTime;
	protected $prsl_patientID;
	protected $prsl_hhcID;
	protected $prsl_tovID;
	protected $prsl_notes;
	protected $prsl_patientTransID;
	protected $prsl_dateRef;

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

	protected $tov_id; 
	protected $tov_name;

	protected $pt_id;
	protected $pt_tovID;
	protected $pt_patientID;
	protected $pt_providerID;
	protected $pt_dateOfService;
	protected $pt_deductible;
	protected $pt_service_billed;
	protected $pt_aw_ippe_date;
	protected $pt_aw_ippe_code;
	protected $pt_performed;
	protected $pt_acp;
	protected $pt_diabetes;
	protected $pt_tobacco;
	protected $pt_tcm;
	protected $pt_others;
	protected $pt_icd10_codes;
	protected $pt_visitBilled;
	protected $pt_dateRef;
	protected $pt_dateRefEmailed;
	protected $pt_notes;
	protected $pt_dateCreated;
	protected $pt_mileage;
	protected $pt_aw_billed;
	protected $pt_supervising_mdID;
	protected $pt_archive;
	protected $pt_status;

	protected $supervisingMD_firstname;
	protected $supervisingMD_lastname;

	public function get_selected_tov(string $tov_id) : string
	{
		return ($tov_id == $this->tov_id) ? 'selected=true' : '';
	}

	public function get_combined_time() : string
	{
		return $this->get_fromTime() . ' - ' . $this->get_toTime();
	}

	public function get_fromTime() : string
	{
		return date_format(date_create($this->prsl_fromTime), 'h:i A');
	}

	public function get_toTime() : string
	{
		return date_format(date_create($this->prsl_toTime), 'h:i A');
	}
}