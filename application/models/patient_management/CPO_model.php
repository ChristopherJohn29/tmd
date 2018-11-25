<?php

class CPO_model extends MY_Model {
	protected $table_name = 'patient_CPO';

	private $certification_status = 'Certification';
	private $re_certification_status= 'Re-Certification';

	public function __construct()
	{
		parent::__construct();
	}

	public function prepare_data() : array
	{
		return [
			'ptcpo_patientID' => $this->uri->segment(3),
			'ptcpo_period' => $this->input->post('ptcpo_period'),
			'ptcpo_dateSigned' => $this->input->post('ptcpo_dateSigned'),
			'ptcpo_firstMonthCPO' => $this->input->post('ptcpo_firstMonthCPO'),
			'ptcpo_secondMonthCPO' => $this->input->post('ptcpo_secondMonthCPO'),
			'ptcpo_thirdMonthCPO' => $this->input->post('ptcpo_thirdMonthCPO'),
			'ptcpo_dischargeDate' => $this->input->post(''),
			'ptcpo_dateBilled' => $this->input->post(''),
			'ptcpo_status' => $this->input->post('ptcpo_status')
		];
	}

	public function generate_status() : string
	{
		$query = $this->db->get($this->table_name);

		$res = $query->result_array();

		return count($res) ? $this->certification_status : $this->re_certification_status;
	}
}