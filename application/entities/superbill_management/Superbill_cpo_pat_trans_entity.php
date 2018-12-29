<?php

namespace Mobiledrs\entities\superbill_management;

use \Mobiledrs\entities\patient_management\Type_visit_entity;
use \Mobiledrs\entities\patient_management\CPO_entity;

class Superbill_cpo_pat_trans_entity {

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

	private $cpo = null;
	private $pat_trans = null;

	public function get_patient_fullname() : string
	{
		return $this->patient_firstname . ' ' . $this->patient_lastname;
	}

	public function set_display_data(array $CPO, array $pat_trans)
	{
		$this->cpo = $CPO;
		$this->pat_trans = $pat_trans;
	}

	public function format_display() : array
	{
		$data = [];

		$last_ptcpo_patientID = 0;

		foreach ($this->cpo as $i => $cpo)
		{
			if ($last_ptcpo_patientID == $cpo->ptcpo_patientID && 
				$cpo->ptcpo_status == CPO_entity::RECERTIFICATION)
			{
				$data[$i - 1]['Recert_Period'] = $cpo->ptcpo_period;
				$data[$i - 1]['Recert_Date_Signed'] = $cpo->ptcpo_dateSigned;
				$data[$i - 1]['Refirst_Month_CPO'] = $cpo->ptcpo_firstMonthCPO;
				$data[$i - 1]['Resecond_Month_CPO'] = $cpo->ptcpo_secondMonthCPO;
				$data[$i - 1]['Rethird_Month_CPO'] = $cpo->ptcpo_dischargeDate;

				continue;
			}

			$data[$i] = [
				'cert_Period' => $cpo->ptcpo_period,
				'date_Signed' => $cpo->ptcpo_dateSigned,
				'first_Month_CPO' => $cpo->ptcpo_firstMonthCPO,
				'second_Month_CPO' => $cpo->ptcpo_secondMonthCPO,
				'third_Month_CPO' => $cpo->ptcpo_thirdMonthCPO,
				'discharge_Date' => $cpo->ptcpo_dischargeDate,
				'Recert_Period' => '',
				'Recert_Date_Signed' => '',
				'Refirst_Month_CPO' => '',
				'Resecond_Month_CPO' => '',
				'Rethird_Month_CPO' => ''
			];

			foreach ($this->pat_trans as $pat_tran)
			{
				if ($pat_tran->pt_patientID == $cpo->ptcpo_patientID && 
					in_array($pat_tran->pt_tovID, Type_visit_entity::get_visits_list()))
				{
					$data[$i]['patient_name'] = $pat_tran->get_patient_fullname();
					$data[$i]['icd10'] = $pat_tran->pt_icd10_codes;

					break;
				}
			}

			$last_ptcpo_patientID = $cpo->ptcpo_patientID;
		}

		return $data;
	}
}