<?php

class Route_sheet_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'provider_route_sheet';

	public function __construct()
	{
		parent::__construct();
	}

	public function routes_sheet_list(array $search_data) : array
	{
		$this->db->join(
			'provider',
			'provider.provider_id = provider_route_sheet.prs_providerID',
			'inner'
		);

		if ($search_data)
		{
			foreach ($search_data as $key => $value) 
			{
				$this->db->like($key, $value);
			}
		}

		$query = $this->db->get($this->table_name);

		return $query->result_array() ?? [];
	}

	public function routes_sheet_record(string $prs_id) : array 
	{
		$this->db->join(
			'provider_route_sheet',
			'provider_route_sheet.prs_id = provider_route_sheet_list.prsl_id',
			'inner'
		);

		$this->db->where('provider_route_sheet.prs_id', $prs_id);

		$query = $this->db->get('provider_route_sheet_list');

		return $query->row_array() ?? [];
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