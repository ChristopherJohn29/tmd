<?php

class Search_model extends \Mobiledrs\core\MY_Models {

	private $access_modules = [
		'1' => ['patient', 'provider', 'facilities', 'user', 'routesheet'],
		'2' => ['patient', 'provider', 'facilities', 'user', 'routesheet'],
		'3' => ['patient', 'provider', 'facilities', 'routesheet']
	];
	
	public function __construct()
	{
		parent::__construct();
	}

	public function search() : array
	{
		$results = [];
		$user_access_module = $this->access_modules[$this->session->userdata('user_roleID')];

		$searchTerm = $this->input->post('q');
		if (substr_count($searchTerm, '/') == 2) {
			$searchTerm = date_format(date_create($searchTerm), 'Y-m-d');
		}

		// if (in_array('patient', $user_access_module)) {
		$patient_module = $this->search_patient_module($searchTerm);

		if ( ! empty($patient_module)) {
			$results['patient'] = $patient_module;
		}
		// }

		// if (in_array('provider', $user_access_module)) {
		// 	$provider_module = $this->search_provider_module($searchTerm);
		// 	if ( ! empty($provider_module)) {
		// 		$results['provider'] = $provider_module;
		// 	}
		// }

		// if (in_array('facilities', $user_access_module)) {
		// 	$homehealth_module = $this->search_homehealth_module($searchTerm);
		// 	if ( ! empty($homehealth_module)) {
		// 		$results['facilities'] = $homehealth_module;
		// 	}
		// }

		// if (in_array('user', $user_access_module)) {
		// 	$user_module = $this->search_user_module($searchTerm);
		// 	if ( ! empty($user_module)) {
		// 		$results['user'] = $user_module;
		// 	}
		// }

		// if (in_array('routesheet', $user_access_module)) {
		// 	$routesheet_module = $this->search_routesheet_module($searchTerm);
		// 	if ( ! empty($routesheet_module)) {
		// 		$results['routesheet'] = $routesheet_module;
		// 	}
		// }

		return $results;
	}

	private function search_patient_module(string $searchTerm) : array 
	{
		$this->db->join(
			'patient_communication_notes',
			'patient_communication_notes.ptcn_patientID = patient.patient_id',
			'left'
		);

		$this->db->join(
			'patient_CPO',
			'patient_CPO.ptcpo_patientID = patient.patient_id',
			'left'
		);

		$this->db->join(
			'place_of_service',
			'place_of_service.pos_id = patient.patient_placeOfService',
			'left'
		);

		$this->db->join(
			'patient_transactions',
			'patient_transactions.pt_patientID = patient.patient_id',
			'left'
		);

		$this->db->join(
			'type_of_visits',
			'type_of_visits.tov_id = patient_transactions.pt_tovID',
			'left'
		);

		$this->db->like('patient.patient_name', $searchTerm);
		// $this->db->or_like('patient.patient_gender', $searchTerm);
		$this->db->or_like('patient.patient_medicareNum', $searchTerm);
		$this->db->or_like('patient.patient_dateOfBirth', $searchTerm);
		// $this->db->or_like('patient.patient_phoneNum', $searchTerm);
		// $this->db->or_like('patient.patient_address', $searchTerm);
		// $this->db->or_like('patient.patient_caregiver_family', $searchTerm);
		// $this->db->or_like('patient.patient_placeOfService', $searchTerm);

		// $this->db->or_like('patient_CPO.ptcpo_period', $searchTerm);
		// $this->db->or_like('patient_CPO.ptcpo_dateSigned', $searchTerm);
		// $this->db->or_like('patient_CPO.ptcpo_firstMonthCPO', $searchTerm);
		// $this->db->or_like('patient_CPO.ptcpo_secondMonthCPO', $searchTerm);
		// $this->db->or_like('patient_CPO.ptcpo_thirdMonthCPO', $searchTerm);
		// $this->db->or_like('patient_CPO.ptcpo_dischargeDate', $searchTerm);
		// $this->db->or_like('patient_CPO.ptcpo_dateBilled', $searchTerm);

		// $this->db->or_like('patient_communication_notes.ptcn_message', $searchTerm);

		// $this->db->or_like('patient_transactions.pt_dateOfService', $searchTerm);
		// $this->db->or_like('patient_transactions.pt_deductible', $searchTerm);
		// $this->db->or_like('patient_transactions.pt_aw_ippe_date', $searchTerm);
		// $this->db->or_like('patient_transactions.pt_aw_ippe_code', $searchTerm);
		// $this->db->or_like('patient_transactions.pt_performed', $searchTerm);
		// $this->db->or_like('patient_transactions.pt_acp', $searchTerm);
		// $this->db->or_like('patient_transactions.pt_diabetes', $searchTerm);
		// $this->db->or_like('patient_transactions.pt_tobacco', $searchTerm);
		// $this->db->or_like('patient_transactions.pt_tcm', $searchTerm);
		// $this->db->or_like('patient_transactions.pt_others', $searchTerm);
		// $this->db->or_like('patient_transactions.pt_icd10_codes', $searchTerm);
		// $this->db->or_like('patient_transactions.pt_visitBilled', $searchTerm);
		// $this->db->or_like('patient_transactions.pt_dateRef', $searchTerm);
		// $this->db->or_like('patient_transactions.pt_dateRefEmailed', $searchTerm);
		// $this->db->or_like('patient_transactions.pt_notes', $searchTerm);
		// $this->db->or_like('patient_transactions.pt_mileage', $searchTerm);
		// $this->db->or_like('patient_transactions.pt_aw_billed', $searchTerm);

		// $this->db->or_like('place_of_service.pos_code', $searchTerm);
		// $this->db->or_like('place_of_service.pos_name', $searchTerm);

		$query = $this->db->get('patient');

		return $query->result_array();
	}

	public function search_provider_module(string $searchTerm) : array
	{
		$this->db->like('provider.provider_firstname', $searchTerm);
		$this->db->or_like('provider.provider_lastname', $searchTerm);
		$this->db->or_like("CONCAT_WS(' ', provider.provider_firstname, provider.provider_lastname)", $searchTerm);
		$this->db->or_like('provider.provider_contactNum', $searchTerm);
		$this->db->or_like('provider.provider_email', $searchTerm);
		$this->db->or_like('provider.provider_address', $searchTerm);
		$this->db->or_like('provider.provider_dateOfBirth', $searchTerm);
		$this->db->or_like('provider.provider_languages', $searchTerm);
		$this->db->or_like('provider.provider_areas', $searchTerm);
		$this->db->or_like('provider.provider_npi', $searchTerm);
		$this->db->or_like('provider.provider_dea', $searchTerm);
		$this->db->or_like('provider.provider_license', $searchTerm);
		$this->db->or_like('provider.provider_rate_initialVisit', $searchTerm);
		$this->db->or_like('provider.provider_rate_followUpVisit', $searchTerm);
		$this->db->or_like('provider.provider_rate_aw', $searchTerm);
		$this->db->or_like('provider.provider_rate_acp', $searchTerm);
		$this->db->or_like('provider.provider_rate_noShowPT', $searchTerm);
		$this->db->or_like('provider.provider_rate_mileage', $searchTerm);
		$this->db->or_like('provider.provider_gender', $searchTerm);
		$this->db->or_like('provider.provider_rate_initialVisit_TeleHealth', $searchTerm);
		$this->db->or_like('provider.provider_rate_followUpVisit_TeleHealth', $searchTerm);

		$query = $this->db->get('provider');

		return $query->result_array();
	}

	public function search_homehealth_module(string $searchTerm) : array
	{
		$this->db->like('home_health_care.hhc_name', $searchTerm);
		$this->db->or_like('home_health_care.hhc_contact_name', $searchTerm);
		$this->db->or_like('home_health_care.hhc_phoneNumber', $searchTerm);
		$this->db->or_like('home_health_care.hhc_faxNumber', $searchTerm);
		$this->db->or_like('home_health_care.hhc_email', $searchTerm);
		$this->db->or_like('home_health_care.hhc_address', $searchTerm);

		$query = $this->db->get('home_health_care');

		return $query->result_array();
	}

	private function search_user_module(string $searchTerm) : array 
	{
		$this->db->join(
			'roles',
			'roles.roles_id = user.user_roleID',
			'inner'
		);

		$this->db->like('user.user_firstname', $searchTerm);
		$this->db->or_like('user.user_lastname', $searchTerm);
		$this->db->or_like('user.user_email', $searchTerm);

		$this->db->or_like('roles.roles_name', $searchTerm);

		$query = $this->db->get('user');

		return $query->result_array();
	}

	private function search_routesheet_module(string $searchTerm) : array 
	{
		$this->db->join(
			'provider_route_sheet_list',
			'provider_route_sheet_list.prsl_prsID = provider_route_sheet.prs_id',
			'left'
		);

		$this->db->join(
			'provider',
			'provider.provider_id = provider_route_sheet.prs_providerID',
			'left'
		);

		$this->db->join(
			'patient',
			'patient.patient_id = provider_route_sheet_list.prsl_patientID',
			'left'
		);

		$this->db->like('provider_route_sheet.prs_dateOfService', $searchTerm);

		$this->db->or_like('provider_route_sheet_list.prsl_fromTime', $searchTerm);
		$this->db->or_like('provider_route_sheet_list.prsl_toTime', $searchTerm);
		$this->db->or_like('provider_route_sheet_list.prsl_notes', $searchTerm);
		$this->db->or_like('provider_route_sheet_list.prsl_dateRef', $searchTerm);

		$this->db->or_like('provider.provider_firstname', $searchTerm);
		$this->db->or_like('provider.provider_lastname', $searchTerm);
		$this->db->or_like("CONCAT_WS(' ', provider.provider_firstname, provider.provider_lastname)", $searchTerm);

		$this->db->or_like('patient.patient_name', $searchTerm);

		$this->db->group_by("provider_route_sheet_list.prsl_prsID");

		$query = $this->db->get('provider_route_sheet');

		return $query->result_array();
	}
}