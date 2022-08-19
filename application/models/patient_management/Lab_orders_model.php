<?php

class Lab_orders_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'patient_lab_order';
	protected $entity = '\Mobiledrs\entities\patient_management\Lab_order_entity';
	protected $record_entity = null;

	public function __construct()
	{
		parent::__construct();
		$this->record_entity = new \Mobiledrs\entities\patient_management\Lab_order_entity();
	}

	public function updatePatientHomeHealth($patient_id = false, $patient_hhcID = NULL){
		$query['patient_hhcID'] = $patient_hhcID;

		$this->db->set($query);
        $this->db->where('patient_id', $patient_id);
		return $this->db->update('patient');
	}

	public function fetchLabOrdersByPatientId($patient_id = false){
		$this->db->select('*');
		$this->db->where('patient_id', $patient_id);
		$this->db->where('column_archive', 0);
		$this->db->from('patient_lab_order');
		$this->db->join('user', 'user.user_id = patient_lab_order.added_by');
		$this->db->join('provider', 'provider.provider_id = patient_lab_order.provider_id');
		$this->db->order_by('date_referral', 'DESC');
		$result = $this->db->get()->result_array();

		return $result;
	}

	public function createOrdersFromVisit($patient_id = false, $dateRefEmailed = '', $provider_id = false, $added_by = false){

		$query['patient_id'] = $patient_id;
		$query['date_referral'] = date("Y-m-d", strtotime($dateRefEmailed));
		$query['provider_id'] = $provider_id;
		$query['from_visit'] = 1;
		$query['added_by'] = $added_by;

		return $this->db->insert('patient_lab_order', $query);

	}

	public function addLabOrder($data = array()){
		$query['patient_id'] = $data['patient_id'];
		$query['date_referral'] = date("Y-m-d", strtotime($data['date_referral']));
		$query['provider_id'] = $data['provider_id'];
		$query['from_visit'] = 0;
		$query['added_by'] = $data['added_by'];
		$query['notes'] = $data['notes'];
		$query['status'] = $data['status'];
		$query['lab_file'] = $data['lab_file'];

		return $this->db->insert('patient_lab_order', $query);
	}

	public function editLabOrder($data = array()) {

		$query['date_referral'] = date("Y-m-d", strtotime($data['date_referral']));
		$query['provider_id'] = $data['provider_id'];
		$query['added_by'] = $data['added_by'];
		$query['notes'] = $data['notes'];
		$query['status'] = $data['status'];
		$query['lab_file'] = $data['lab_file'];

		$this->db->set($query);
        $this->db->where('patient_id', $data['patient_id']);
        $this->db->where('lab_order_id', $data['lab_order_id']);
        return $this->db->update('patient_lab_order');
	}

	public function deleteLabOrder($data = array()) {

		$query['column_archive'] = 1;
		$this->db->set($query);
        $this->db->where('patient_id', $data['patient_id']);
        $this->db->where('lab_order_id', $data['lab_order_id']);
        return $this->db->update('patient_lab_order');
	}
	
}