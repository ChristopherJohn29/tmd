<?php

class Transaction_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'patient_transactions';

	public function __construct()
	{
		parent::__construct();
	}

	public function prepare_data() : array
	{
		return [
			'pt_tovID' => $this->input->post('pt_tovID'),
			'pt_providerID' => $this->input->post('pt_providerID'),
			'pt_dateOfService' => $this->input->post('pt_dateOfService'),
			'pt_deductible' => $this->input->post('pt_deductible'),
			'pt_serviceStatus' => $this->input->post('pt_serviceStatus'),
			'pt_aw_ippe_date' => $this->input->post('pt_aw_ippe_date'),
			'pt_aw_ippe_performed' => $this->input->post('pt_aw_ippe_performed'),
			'pt_acp' => $this->input->post('pt_acp'),
			'pt_diabetes' => $this->input->post('pt_diabetes'),
			'pt_tobacco' => $this->input->post('pt_tobacco'),
			'pt_tcm' => $this->input->post('pt_tcm'),
			'pt_others' => $this->input->post('pt_others'),
			'pt_icd10_codes' => $this->input->post('pt_icd10_codes'),
			'pt_visitBilled' => $this->input->post('pt_visitBilled'),
			'pt_dateRefEmailed' => $this->input->post('pt_dateRefEmailed'),
			'pt_comments' => $this->input->post('pt_comments')
		];
	}

	public function details(string $pt_id) : array
	{
		$this->db->join(
			'type_of_visits',
			'type_of_visits.tov_id  = patient_transactions.pt_tovID',
			'inner'
		);

		$this->db->join(
			'provider',
			'provider.provider_id  = patient_transactions.pt_providerID',
			'inner'
		);

		$this->db->where('pt_id', $pt_id);

		$query = $this->db->get($this->table_name);

		return $query->row_array() ?? [];
	}
}