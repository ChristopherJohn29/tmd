<?php

class Profile_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'specialist';
	protected $entity = '\Mobiledrs\entities\specialist\Profile_entity';
	protected $record_entity = null;

	public function __construct()
	{
		parent::__construct();

		$this->record_entity = new \Mobiledrs\entities\specialist\Profile_entity();
	}

	public function prepare_data() : array
	{
		return [
			'company_name' => $this->input->post('company_name'),
			'contact_person' => $this->input->post('contact_person'),
			'address' => $this->input->post('address'),
			'phone_number' => $this->input->post('phone_number'),
			'fax' => $this->input->post('fax'),
			'services_provided' => $this->input->post('services_provided'),
			'notes' => $this->input->post('notes')
		];
	}

	public function search()
	{
		$page_data['records'] = array();
		$this->db->select('*');
		$this->db->from('specialist');
		$this->db->where('id', $this->input->post('id'));
		$results = $this->db->get()->result_array();
		
		foreach($results as $result) {

			$page_data['records'][] = [
				'company_name' => $result['company_name'],
				'contact_person' => $result['contact_person'],
				'address' => $result['address'],
				'phone_number' => $result['phone_number'],
				'fax' => $result['fax'],
				'services_provided' => $result['services_provided'],
				'notes' => $result['notes'],
				'id' => $result['id'],
			];
		}
		
		return $page_data['records'];
	}
}