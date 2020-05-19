<?php

namespace Mobiledrs\entities\general_search;

class Search_entity extends \Mobiledrs\entities\Entity {
	
	private $results = [];
	private $searchTerm = '';


	public function set_result(array $data)
	{
		$this->results = $data;
	}

	public function set_searchTerm(string $searchTerm)
	{
		$this->searchTerm = $searchTerm;
	}

	public function format_display() : array
	{
		$display = [];

		foreach($this->results as $moduleName => $result) {		

			if ($moduleName == 'patient') {
				$patient_list = [];

				foreach ($result as $key => $value) {
					if (in_array($value['patient_name'], $patient_list)) {
						continue;
					}

					$display[] = [
						'name' => $value['patient_name'],
						'url' => 'href=patient_management/profile/details/' . $value['patient_id'],
						'value' => $this->get_patient_keyword($value)
					];

					$patient_list[] = $value['patient_name'];
				}
			}
			else if ($moduleName == 'provider') {
				foreach ($result as $key => $value) {
					$display[] = [
						'name' => $value['provider_firstname'] . ' ' . $value['provider_lastname'],
						'url' => 'href=provider_management/profile/details/' . $value['provider_id'],
						'value' => $this->get_provider_keyword($value)
					];
				}
			}
			else if ($moduleName == 'facilities') {
				foreach ($result as $key => $value) {
					$userKeyword = $this->get_facilities_keyword($value);

					$display[] = [
						'name' => $value['hhc_name'],
						'url' => 'href=home_health_care_management/profile/index/' . $userKeyword['value'],
						'value' => $userKeyword
					];
				}
			}
			else if ($moduleName == 'user') {
				foreach ($result as $key => $value) {
					$userKeyword = $this->get_user_keyword($value);

					$display[] = [
						'name' => $value['user_firstname'] . ' ' . $value['user_lastname'],
						'url' => 'href=user_management/profile/index/' . $userKeyword['value'],
						'value' => $userKeyword
					];
				}
			}
			else if ($moduleName == 'routesheet') {
				foreach ($result as $key => $value) {
					$display[] = [
						'name' => $value['provider_firstname'] . ' ' . $value['provider_lastname'],
						'url' => 'href=provider_route_sheet_management/route_sheet/details/' . $value['prs_id'],
						'value' => $this->get_routesheet_keyword($value)
					];
				}
			}

		}

		return $display;
	}

	private function get_patient_keyword(array $data) : array
	{
		$searchValue = [
			'field' => '',
			'value' => ''
		];

		if (stripos($data['patient_name'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Name';
			$searchValue['value'] = $data['patient_name'];
		}
		else if (stripos($data['patient_gender'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Gender';
			$searchValue['value'] = $data['patient_gender'];
		}
		else if (stripos($data['patient_medicareNum'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Medicare #';
			$searchValue['value'] = $data['patient_medicareNum'];
		}
		else if (stripos($data['patient_dateOfBirth'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Date of Birth';
			$searchValue['value'] = $data['patient_dateOfBirth'];
		}
		else if (stripos($data['patient_phoneNum'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Phone #';
			$searchValue['value'] = $data['patient_phoneNum'];
		}
		else if (stripos($data['patient_address'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Address';
			$searchValue['value'] = $data['patient_address'];
		}
		else if (stripos($data['patient_caregiver_family'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Caregiver Family';
			$searchValue['value'] = $data['patient_caregiver_family'];
		}
		else if (stripos($data['patient_placeOfService'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Place of Service';
			$searchValue['value'] = $data['patient_placeOfService'];
		}
		else if (stripos($data['ptcpo_period'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Period';
			$searchValue['value'] = $data['ptcpo_period'];
		}
		else if (stripos($data['ptcpo_dateSigned'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Date signed';
			$searchValue['value'] = $data['ptcpo_dateSigned'];
		}
		else if (stripos($data['ptcpo_firstMonthCPO'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = '1st Month CPO';
			$searchValue['value'] = $data['ptcpo_firstMonthCPO'];
		}
		else if (stripos($data['ptcpo_secondMonthCPO'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = '2nd Month CPO';
			$searchValue['value'] = $data['ptcpo_secondMonthCPO'];
		}
		else if (stripos($data['ptcpo_thirdMonthCPO'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = '3rd Month CPO';
			$searchValue['value'] = $data['ptcpo_thirdMonthCPO'];
		}
		else if (stripos($data['ptcpo_dischargeDate'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Discharged';
			$searchValue['value'] = $data['ptcpo_dischargeDate'];
		}
		else if (stripos($data['ptcpo_dateBilled'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Date Billed';
			$searchValue['value'] = $data['ptcpo_dateBilled'];
		}
		else if (stripos($data['ptcn_message'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Message';
			$searchValue['value'] = $data['ptcn_message'];
		}
		else if (stripos($data['pos_code'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Place of Service Code';
			$searchValue['value'] = $data['pos_code'];
		}
		else if (stripos($data['pos_name'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Place of Service  Name';
			$searchValue['value'] = $data['pos_name'];
		}
		else if (stripos($data['pt_dateOfService'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Date of Service';
			$searchValue['value'] = $data['pt_dateOfService'];
		}
		else if (stripos($data['pt_deductible'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Deductible';
			$searchValue['value'] = $data['pt_deductible'];
		}
		else if (stripos($data['pt_aw_ippe_date'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'AW/IPPE Date';
			$searchValue['value'] = $data['pt_aw_ippe_date'];
		}
		else if (stripos($data['pt_aw_ippe_code'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = ' 	AW/IPPE';
			$searchValue['value'] = $data['pt_aw_ippe_code'];
		}
		else if (stripos($data['pt_performed'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Performed';
			$searchValue['value'] = $data['pt_performed'];
		}
		else if (stripos($data['pt_acp'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'ACP';
			$searchValue['value'] = $data['pt_acp'];
		}
		else if (stripos($data['pt_diabetes'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Diabetes';
			$searchValue['value'] = $data['pt_diabetes'];
		}
		else if (stripos($data['pt_tobacco'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Tobacco';
			$searchValue['value'] = $data['pt_tobacco'];
		}
		else if (stripos($data['pt_tcm'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'TCM';
			$searchValue['value'] = $data['pt_tcm'];
		}
		else if (stripos($data['pt_others'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Others';
			$searchValue['value'] = $data['pt_others'];
		}
		else if (stripos($data['pt_icd10_codes'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'ICD-Code Diagnoses';
			$searchValue['value'] = $data['pt_icd10_codes'];
		}
		else if (stripos($data['pt_visitBilled'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Visits Billed';
			$searchValue['value'] = $data['pt_visitBilled'];
		}
		else if (stripos($data['pt_dateRef'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Referral Date';
			$searchValue['value'] = $data['pt_dateRef'];
		}
		else if (stripos($data['pt_dateRefEmailed'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Date Referral was Emailed';
			$searchValue['value'] = $data['pt_dateRefEmailed'];
		}
		else if (stripos($data['pt_notes'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Note';
			$searchValue['value'] = $data['pt_notes'];
		}
		else if (stripos($data['pt_mileage'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Mileage';
			$searchValue['value'] = $data['pt_mileage'];
		}
		else if (stripos($data['pt_aw_billed'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'AW Billed';
			$searchValue['value'] = $data['pt_aw_billed'];
		}

		return $searchValue;
	}

	private function get_provider_keyword(array $data) : array
	{
		$searchValue = [
			'field' => '',
			'value' => ''
		];

		$provider_fullname = $data['provider_firstname'] . ' ' . $data['provider_lastname'];

		if (stripos($data['provider_firstname'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Firstname';
			$searchValue['value'] = $data['provider_firstname'];
		}
		else if (stripos($data['provider_lastname'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Lastname';
			$searchValue['value'] = $data['provider_lastname'];
		}
		else if (stripos($provider_fullname, $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Provider fullname';
			$searchValue['value'] = $provider_fullname;
		}
		else if (stripos($data['provider_contactNum'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Contact #';
			$searchValue['value'] = $data['provider_contactNum'];
		}
		else if (stripos($data['provider_email'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Email';
			$searchValue['value'] = $data['provider_email'];
		}
		else if (stripos($data['provider_address'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Address';
			$searchValue['value'] = $data['provider_address'];
		}
		else if (stripos($data['provider_dateOfBirth'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Date of Birth';
			$searchValue['value'] = $data['provider_dateOfBirth'];
		}
		else if (stripos($data['provider_languages'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Languages';
			$searchValue['value'] = $data['provider_languages'];
		}
		else if (stripos($data['provider_areas'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Areas';
			$searchValue['value'] = $data['provider_areas'];
		}
		else if (stripos($data['provider_npi'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'NPI';
			$searchValue['value'] = $data['provider_npi'];
		}
		else if (stripos($data['provider_dea'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'DEA';
			$searchValue['value'] = $data['provider_dea'];
		}
		else if (stripos($data['provider_license'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'License';
			$searchValue['value'] = $data['provider_license'];
		}
		else if (stripos($data['provider_rate_initialVisit'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Rate - nitial visit';
			$searchValue['value'] = $data['provider_rate_initialVisit'];
		}
		else if (stripos($data['provider_rate_followUpVisit'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Rate - Follow-up visit';
			$searchValue['value'] = $data['provider_rate_followUpVisit'];
		}
		else if (stripos($data['provider_rate_aw'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Rate - AW';
			$searchValue['value'] = $data['provider_rate_aw'];
		}
		else if (stripos($data['provider_rate_acp'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Rate - ACP';
			$searchValue['value'] = $data['provider_rate_acp'];
		}
		else if (stripos($data['provider_rate_noShowPT'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Rate - No show';
			$searchValue['value'] = $data['provider_rate_noShowPT'];
		}
		else if (stripos($data['provider_rate_mileage'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Rate - Mileage';
			$searchValue['value'] = $data['provider_rate_mileage'];
		}
		else if (stripos($data['provider_gender'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Gender';
			$searchValue['value'] = $data['provider_gender'];
		}
		else if (stripos($data['provider_rate_initialVisit_TeleHealth'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Rate - Initial visit office';
			$searchValue['value'] = $data['provider_rate_initialVisit_TeleHealth'];
		}
		else if (stripos($data['provider_rate_followUpVisit_TeleHealth'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Rate - Follow-up visit office';
			$searchValue['value'] = $data['provider_rate_followUpVisit_TeleHealth'];
		}

		return $searchValue;
	}

	private function get_facilities_keyword(array $data) : array
	{
		$searchValue = [
			'field' => '',
			'value' => ''
		];

		if (stripos($data['hhc_name'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Name';
			$searchValue['value'] = $data['hhc_name'];
		}
		else if (stripos($data['hhc_contact_name'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Contact name';
			$searchValue['value'] = $data['hhc_contact_name'];
		}
		else if (stripos($data['hhc_phoneNumber'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Phone #';
			$searchValue['value'] = $data['hhc_phoneNumber'];
		}
		else if (stripos($data['hhc_faxNumber'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Fax #';
			$searchValue['value'] = $data['hhc_faxNumber'];
		}
		else if (stripos($data['hhc_email'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Email';
			$searchValue['value'] = $data['hhc_email'];
		}
		else if (stripos($data['hhc_address'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Address';
			$searchValue['value'] = $data['hhc_address'];
		}

		return $searchValue;
	}

	private function get_user_keyword(array $data) : array
	{
		$searchValue = [
			'field' => '',
			'value' => ''
		];

		if (stripos($data['user_firstname'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Firstname';
			$searchValue['value'] = $data['user_firstname'];
		}
		else if (stripos($data['user_lastname'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Lastname';
			$searchValue['value'] = $data['user_lastname'];
		}
		else if (stripos($data['user_email'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Email';
			$searchValue['value'] = $data['user_email'];
		}
		else if (stripos($data['roles_name'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Role name';
			$searchValue['value'] = $data['roles_name'];
		}

		return $searchValue;
	}

	private function get_routesheet_keyword(array $data) : array
	{
		$searchValue = [
			'field' => '',
			'value' => ''
		];

		$provider_fullname = $data['provider_firstname'] . ' ' . $data['provider_lastname'];

		if (stripos($data['prs_dateOfService'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Date of Service';
			$searchValue['value'] = $data['prs_dateOfService'];
		}
		else if (stripos($data['prsl_fromTime'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'From Time';
			$searchValue['value'] = $data['prsl_fromTime'];
		}
		else if (stripos($data['prsl_toTime'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'To time';
			$searchValue['value'] = $data['prsl_toTime'];
		}
		else if (stripos($data['prsl_notes'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Notes';
			$searchValue['value'] = $data['prsl_notes'];
		}
		else if (stripos($data['prsl_dateRef'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Date Referral';
			$searchValue['value'] = $data['prsl_dateRef'];
		}
		else if (stripos($data['provider_firstname'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Provider firstname';
			$searchValue['value'] = $data['provider_firstname'];
			$searchValue['dateField'] = 'Date of Service';
			$searchValue['dateValue'] = date_format(date_create($data['prs_dateOfService']), 'm/d/Y');
		}
		else if (stripos($data['provider_lastname'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Provider lastname';
			$searchValue['value'] = $data['provider_lastname'];
			$searchValue['dateField'] = 'Date of Service';
			$searchValue['dateValue'] = date_format(date_create($data['prs_dateOfService']), 'm/d/Y');
		}
		else if (stripos($provider_fullname, $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Provider name';
			$searchValue['value'] = $provider_fullname;
			$searchValue['dateField'] = 'Date of Service';
			$searchValue['dateValue'] = date_format(date_create($data['prs_dateOfService']), 'm/d/Y');
		}
		else if (stripos($data['patient_name'], $this->searchTerm) !== FALSE) {
			$searchValue['field'] = 'Patient name';
			$searchValue['value'] = $data['patient_name'];
		}

		return $searchValue;
	}
}