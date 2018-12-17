<?php

class Route_sheet_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'provider_route_sheet';
	protected $entity = '\Mobiledrs\entities\provider_route_sheet_management\Routesheet_entity';

	public function __construct()
	{
		parent::__construct();
	}

	public function insert(array $params) : int
	{
		$entity = new \Mobiledrs\entities\Entity();

		$this->db->trans_start();

		$this->db->insert('provider_route_sheet', [
			'prs_providerID' => $this->input->post('prs_providerID'),
			'prs_dateOfService' => $entity->set_date_format($this->input->post('prs_dateOfService'))
		]);

		$prs_id = $this->db->insert_id();

		$this->db->insert_batch(
			'provider_route_sheet_list', 
			$this->prepare_patient_details_data($this->input->post(), $prs_id)
		);

		$this->db->trans_complete();

		return $this->db->trans_status() ? $prs_id : 0;
	}

	public function update(array $params) : bool
	{
		$entity = new \Mobiledrs\entities\Entity();

		$this->db->trans_start();

		$this->db->where($params['key'], $params['value']);

		$this->db->update('provider_route_sheet', [
			'prs_providerID' => $this->input->post('prs_providerID'),
			'prs_dateOfService' => $entity->set_date_format($this->input->post('prs_dateOfService'))
		]);

		$this->db->where_in('provider_route_sheet_list.prsl_id', $this->input->post('prsl_ids'));

		$this->db->delete('provider_route_sheet_list');

		$this->db->insert_batch(
			'provider_route_sheet_list', 
			$this->prepare_patient_details_data($this->input->post(), $params['value'])
		);

		$this->db->trans_complete();

		return $this->db->trans_status();
	}

	public function prepare_data()
	{
	}

	public function prepare_patient_details_data(array $inputPost, string $prsl_prsID) : array
	{
		$data = [];

		for ($i = 0; $i < count($inputPost['prsl_time']); $i++) 
		{
			$data[] = [
				'prsl_prsID' => $prsl_prsID,
				'prsl_time' => $inputPost['prsl_time'][$i],
				'prsl_patientID' => $inputPost['prsl_patientID'][$i],
				'prsl_hhcID' => $inputPost['prsl_hhcID'][$i],
				'prsl_tovID' => $inputPost['prsl_tovID'][$i],
				'prsl_notes' => $inputPost['prsl_notes'][$i]
			];
		}

		return $data;
	}
}