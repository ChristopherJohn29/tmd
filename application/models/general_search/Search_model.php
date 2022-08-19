<?php

class Search_model extends \Mobiledrs\core\MY_Models {


	public function __construct()
	{
		parent::__construct();
	}

	public function search() : array
	{
		$results = [];

		$searchTerm = $this->input->post('q');
		if (substr_count($searchTerm, '/') == 2) {
			$searchTerm = date_format(date_create($searchTerm), 'Y-m-d');
		}

		$patient_module = $this->searchPatient($searchTerm);

		if ( ! empty($patient_module)) {
			$results['patient'] = $patient_module;
		}

		return $results;
	}

	private function searchPatient(string $searchTerm) : array 
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
		$this->db->or_like('patient.patient_medicareNum', $searchTerm);
		$this->db->or_like('patient.patient_dateOfBirth', $searchTerm);
		$this->db->or_like('patient.patient_phoneNum', $searchTerm);

		$query = $this->db->get('patient');

		return $query->result_array();
	}

}