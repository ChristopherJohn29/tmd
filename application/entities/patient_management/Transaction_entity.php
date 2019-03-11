<?php

namespace Mobiledrs\entities\patient_management;

use \Mobiledrs\entities\patient_management\Type_visit_entity as tv_entity;

class Transaction_entity extends \Mobiledrs\entities\Entity {

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

	protected $tov_id; 
	protected $tov_name;

	private $tov_codes = [
		'1' => '99345', // Initial Visit (Home)
		'3' => '99350', // Facility Visit (Home)
		'2' => '99328', // Initial Visit (Facility)
		'4' => '99337', // Facility Visit (Facility)
		'7' => '99205', // Initial Visit (Office)
		'8' => '99215' // Facility Visit (Office)
	];

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
	protected $provider_rate_initialVisitOffice;
	protected $provider_rate_followUpVisitOffice;
	protected $provider_supervising_MD;

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

    public function get_selected_choice_format(string $choice) : string
    {
		return ($choice == '1') ? 'Yes' : (($choice == '2') ? 'No' : '');
    }

    public function get_provider_fullname() : string
	{
		return ($this->provider_firstname != '' ? ($this->provider_firstname . ' ') : '') . $this->provider_lastname;
	}

	public function get_selected_aw_ippe_code(string $code) : string
	{
		return $this->pt_aw_ippe_code == $code ? 'selected=true' : '';
	}

	public function get_aw_ippe_format(string $aw_ippe_code) : string
	{
		return ( ! empty($this->pt_aw_ippe_code) && $this->is_aw_performed()) ? 'Yes' : 'No';
	}

	public function getLatestServiceBilledDate($transactions) : string
	{
		$dateList = [];

		foreach($transactions as $transaction) {
			if (empty($transaction->pt_service_billed)) {
				continue;
			}

			$dateList[] = $transaction->pt_service_billed;
		}

		rsort($dateList);

		return ( ! empty($dateList)) ? parent::get_date_format($dateList[0]) : '';
	}

	public function is_service_paid() : bool
	{
		return ( ! empty($this->pt_service_billed)) && $this->pt_service_billed != '0000-00-00';
	}

	public function has_performed_in_list(array $transactions) : array
	{
		$data = [];

		foreach ($transactions as $transaction)
		{
			if ( ! $transaction->is_aw_performed() &&
				(empty($transaction->pt_aw_ippe_code) || (  ! empty($transaction->pt_aw_ippe_code))))
			{
				continue;
			}
			else if ($transaction->is_aw_performed() && empty($transaction->pt_aw_ippe_code))
			{
				continue;
			}

			$data[] = $transaction;
		}

		return $data;
	}

	public function get_selected_choice(string $data, string $choice) : string
	{
		return $data == $choice ? 'selected=true' : '';
	}

	public function get_selected_tov(string $tov) : string
	{
		return $this->pt_tovID == $tov ? 'selected=true' : '';
	}

	public function get_tov_code(string $tov_id) : string
	{
		return $this->tov_codes[$tov_id] ?? '';
	}

	public function is_aw_performed() : bool
	{
		return $this->pt_performed == '1';
	}

	public function is_acp_selected() : bool
	{
		return $this->pt_acp == '1';
	}

	public function is_diabetes_selected() : bool
	{
		return $this->pt_diabetes == '1';
	}

	public function is_tobacco_selected() : bool
	{
		return $this->pt_tobacco == '1';
	}

	public function has_mileage() : bool
	{
		return (float) $this->pt_mileage > 0;
	}

	public function is_provider_paid() : bool
	{
		return ! empty($this->pt_service_billed);
	}

	public function get_notBilledVisit(array $transactions) : array
	{
		$data = [];

		for ($i = 0, $totalRecords = count($transactions); $i < $totalRecords; $i++)
		{
			$transaction = $transactions[$i];
			if (( ! empty($transaction->pt_visitBilled)) && ($transaction->pt_visitBilled != '0000-00-00'))
			{
				continue;
			}

			$data[] = $transactions[$i];
		}

		return $data;
	}

	public function get_notBilledAW(array $transactions) : array
	{
		$data = [];

		for ($i = 0, $totalRecords = count($transactions); $i < $totalRecords; $i++)
		{
			$transaction = $transactions[$i];
			if (( ! empty($transaction->pt_aw_billed)) && ($transaction->pt_aw_billed != '0000-00-00'))
			{
				continue;
			}

			$data[] = $transactions[$i];
		}

		return $data;
	}

	public function notCancelledTOV() : bool
	{
		return $this->pt_tovID != tv_entity::CANCELLED;
	}

	public function notServicePaid() : bool
	{
		return empty($this->pt_service_billed) || $this->pt_service_billed == '0000-00-00';
	}
}