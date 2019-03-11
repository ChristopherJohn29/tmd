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
	protected $patient_supervising_mdID;

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