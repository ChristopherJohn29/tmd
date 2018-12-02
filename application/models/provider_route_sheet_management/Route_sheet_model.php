<?php

class Route_sheet_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'provider_route_sheet';

	public function __construct()
	{
		parent::__construct();
	}

	public function prepare_data() : array
	{
		return [
		];
	}

	public function prepare_search_data() : array
	{
		return [
			'provider_firstname' => $this->input->post('provider_firstname'),
			'provider_lastname' => $this->input->post('provider_lastname')
		];
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
}