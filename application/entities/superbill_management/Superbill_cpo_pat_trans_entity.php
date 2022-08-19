<?php

namespace Mobiledrs\entities\superbill_management;

use \Mobiledrs\entities\patient_management\Type_visit_entity;
use \Mobiledrs\entities\patient_management\CPO_entity;

class Superbill_cpo_pat_trans_entity {

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
	protected $patient_pharmacy;
	protected $patient_pharmacyPhone;
	protected $patient_drug_allergy;

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
	protected $pt_archive;
	protected $pt_status;
	protected $pt_hypertension;

	public $supervisingMD_firstname;
	public $supervisingMD_lastname;

	private $cpo = null;
	private $pat_trans = null;

	public function set_display_data(array $CPO, array $pat_trans)
	{
		$this->cpo = $CPO;
		$this->pat_trans = $pat_trans;
	}

	public function format_display() : array
	{
		$data = [];

		foreach ($this->cpo as $i => $cpo)
		{
			$data[$i] = [
				'cert_Period' => $cpo->ptcpo_period,
				'date_Signed' => $cpo->get_date_format($cpo->ptcpo_dateSigned),
				'first_Month_CPO' => $cpo->ptcpo_firstMonthCPO,
				'second_Month_CPO' => $cpo->ptcpo_secondMonthCPO,
				'third_Month_CPO' => $cpo->ptcpo_thirdMonthCPO,
				'discharge_Date' => $cpo->get_date_format($cpo->ptcpo_dischargeDate),
				'patient_name' => '',
				'medicare' => '',
				'dob' => '',
				'icd10' => '',
				'status' => $cpo->ptcpo_status,
				'ptcpo_id' => $cpo->ptcpo_id,
				'supervisingMD_fullname' => ''
			];

			foreach ($this->pat_trans as $pat_tran)
			{
				if ($pat_tran->pt_patientID == $cpo->ptcpo_patientID)
				{
					$data[$i]['patient_name'] = $pat_tran->patient_name;
					$data[$i]['medicare'] = $pat_tran->patient_medicareNum;
					$data[$i]['dob'] = date_format(date_create($pat_tran->patient_dateOfBirth), 'm/d/Y');

					if ($pat_tran->pt_dateOfService == $cpo->ptcpo_dateOfService) {
						$data[$i]['icd10'] = $pat_tran->pt_icd10_codes;

						if ( ! empty($pat_tran->supervisingMD_firstname)) {
							$data[$i]['supervisingMD_fullname'] = $pat_tran->supervisingMD_firstname . ' ' . $pat_tran->supervisingMD_lastname;
						}
					}
				}
			}
		}

		return $data;
	}
}