<?php

class CPO_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'patient_CPO';
	protected $entity = '\Mobiledrs\entities\patient_management\CPO_entity';

	private $certification_status = 'Certification';
	private $re_certification_status= 'Re-Certification';

	public function __construct()
	{
		parent::__construct();
	}

	public function prepare_data() : array
	{
		return [
			'ptcpo_id' => $this->input->post('ptcpo_id'),
			'ptcpo_patientID' => $this->input->post('ptcpo_patientID'),
			'ptcpo_period' => $this->input->post('ptcpo_period'),
			'ptcpo_dateSigned' => $this->input->post('ptcpo_dateSigned'),
			'ptcpo_firstMonthCPO' => $this->input->post('ptcpo_firstMonthCPO'),
			'ptcpo_secondMonthCPO' => $this->input->post('ptcpo_secondMonthCPO'),
			'ptcpo_thirdMonthCPO' => $this->input->post('ptcpo_thirdMonthCPO'),
			'ptcpo_dischargeDate' => $this->input->post('ptcpo_dischargeDate'),
			'ptcpo_dateBilled' => $this->input->post('ptcpo_dateBilled'),
			'ptcpo_status' => $this->generate_status()
		];
	}

	public function generate_status() : string
	{
		$this->db->where('ptcpo_patientID', $this->input->post('ptcpo_patientID'));

		$query = $this->db->get($this->table_name);

		$res = $query->result_array();

		return count($res) ? 
			$this->re_certification_status :
			$this->certification_status;
	}
}