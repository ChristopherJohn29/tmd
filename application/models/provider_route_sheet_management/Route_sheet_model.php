<?php

class Route_sheet_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'provider_route_sheet';
	protected $entity = '\Mobiledrs\entities\provider_route_sheet_management\Routesheet_entity';
	protected $pt_trans_entity = null;

	public function __construct()
	{
		parent::__construct();

		$this->pt_trans_entity = new \Mobiledrs\entities\patient_management\Transaction_entity();
	}

	public function insert(array $params) : int
	{
		$entity = new \Mobiledrs\entities\Entity();

		$this->db->trans_start();

		$this->db->insert('provider_route_sheet', [
			'prs_providerID' => $this->input->post('prs_providerID'),
			'prs_dateOfService' => $entity->set_date_format($this->input->post('prs_dateOfService')),
			'is_ca' => $this->input->post('is_ca') ? $this->input->post('is_ca') : NULL
		]);

		$prs_id = $this->db->insert_id();

		if ($this->session->userdata('user_roleID') != '1') {
            $this->logs_model->insert([
                'data' => [
                    'user_log_userID' => $this->session->userdata('user_id'),
                    'user_log_time' => date('H:m:s'),
                    'user_log_date' => date('Y-m-d'),
                    'user_log_description' => 'Added a new route sheet record.',
                    'user_log_link' => 'provider_route_sheet_management/route_sheet/details/'.$prs_id
                ]
            ]);
        }

		$patientTransIDs = $this->insert_patientTransData($this->input->post());

		$this->db->insert_batch(
			'provider_route_sheet_list', 
			$this->prepare_patient_details_data(
				$this->input->post(), 
				$prs_id, 
				$patientTransIDs
			)
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
			'prs_dateOfService' => $entity->set_date_format($this->input->post('prs_dateOfService')),
			'is_ca' => $this->input->post('is_ca') ? $this->input->post('is_ca') : NULL
		]);

		if ($this->session->userdata('user_roleID') != '1') {
            $this->logs_model->insert([
                'data' => [
                    'user_log_userID' => $this->session->userdata('user_id'),
                    'user_log_time' => date('H:m:s'),
                    'user_log_date' => date('Y-m-d'),
                    'user_log_description' => 'Updates a route sheet record.',
                    'user_log_link' => 'provider_route_sheet_management/route_sheet/details/'.$params['value']
                ]
            ]);
        }

		$this->db->where_in('provider_route_sheet_list.prsl_id', $this->input->post('prsl_ids'));

		$this->db->delete('provider_route_sheet_list');

		$patientTransIDs = $this->insert_patientTransData($this->input->post());

		$this->db->insert_batch(
			'provider_route_sheet_list', 
			$this->prepare_patient_details_data($this->input->post(), $params['value'], $patientTransIDs)
		);

		$this->db->trans_complete();

		return $this->db->trans_status();
	}

	public function prepare_data()
	{
	}

	public function insert_patientTransData(array $inputPost) : array
	{
		$this->table_name = 'patient_transactions';

		$data = [];

		for ($i = 0; $i < count($inputPost['prsl_fromTime']); $i++) 
		{
			$dataToDB = [
				'pt_tovID' => $inputPost['prsl_tovID'][$i],
				'pt_patientID' => $inputPost['prsl_patientID'][$i],
				'pt_providerID' => $inputPost['prs_providerID'],
				'pt_dateOfService' => $this->pt_trans_entity->set_date_format($inputPost['prs_dateOfService']),
				'pt_dateRef' => isset($inputPost['prsl_dateRef'][$i]) ? $this->pt_trans_entity->set_date_format($inputPost['prsl_dateRef'][$i]) : NULL,
				'pt_supervising_mdID' => $inputPost['pt_supervising_mdID'][$i],
				'pt_reasonForVisit' => isset($inputPost['pt_reasonForVisit'][$i]) ? $inputPost['pt_reasonForVisit'][$i] : NULL,
				'is_ca' => isset($inputPost['is_ca']) ? $inputPost['is_ca'] : NULL,
				'patient_hhcID' => isset($inputPost['patient_hhcID'][$i]) ? $inputPost['patient_hhcID'][$i] : NULL,
				'pt_aw_ippe_code' => isset($inputPost['pt_aw_ippe_code'][$i]) ? $inputPost['pt_aw_ippe_code'][$i] : NULL,
				'msp' => isset($inputPost['msp'][$i]) ? $inputPost['msp'][$i] : NULL
			];

			if (isset($inputPost['patientTransDateIDs'][$i]))
			{
				$patientTransID = $inputPost['patientTransDateIDs'][$i];

				parent::update([
					'data' => $dataToDB,
					'key' => 'patient_transactions.pt_id',
					'value' => $patientTransID
				]);

				$data[] = $patientTransID;
			}
			else
			{
				$data[] = parent::insert(['data' => $dataToDB]);
			}
		}

		if(isset($inputPost['patientTransDateIDs'])){
			for ($i = 0; $i < count($inputPost['patientTransDateIDs']); $i++) 
			{
				if (isset($inputPost['patientTransDateIDs'][$i]) &&
					(! isset($inputPost['prsl_dateRef'][$i]))
				) {
					$patientTransID = $inputPost['patientTransDateIDs'][$i];
	
					parent::delete_data([
						'table_key' => 'patient_transactions.pt_id',
						'record_id' => $patientTransID,
						'column_archive' => 'pt_archive'
					]);
				}
			}
			
		}
	
		$this->table_name = 'provider_route_sheet';

		return $data;
	}

	public function prepare_patient_details_data(array $inputPost, string $prsl_prsID, array $patientTransIDs) : array
	{
		$data = [];

		for ($i = 0; $i < count($inputPost['prsl_fromTime']); $i++) 
		{
			// get patient home health id from record
			$pt_hhc_params = [
				'key' => 'patient.patient_id',
				'value' => $inputPost['prsl_patientID'][$i]
			];

			$patient_record = $this->pt_model->record($pt_hhc_params);

			$data[] = [
				'prsl_prsID' => $prsl_prsID,
				'prsl_fromTime' => $this->time_converter->convert_to_twentyfour_hrs_time(
					$inputPost['prsl_fromTime'][$i]),
				'prsl_toTime' => $this->time_converter->convert_to_twentyfour_hrs_time(
					$inputPost['prsl_toTime'][$i]),
				'prsl_patientID' => $inputPost['prsl_patientID'][$i],
				'prsl_hhcID' => $patient_record->patient_hhcID,
				'prsl_tovID' => $inputPost['prsl_tovID'][$i],
				'prsl_notes' => $inputPost['prsl_notes'][$i],
				'prsl_patientTransID' => $patientTransIDs[$i],
				'prsl_dateRef' => isset($inputPost['prsl_dateRef'][$i]) ?  $this->pt_trans_entity->set_date_format($inputPost['prsl_dateRef'][$i]) : NULL,
				'is_ca' => isset($inputPost['is_ca']) ? $inputPost['is_ca'] : NULL
			];
		}

		return $data;
	}
}