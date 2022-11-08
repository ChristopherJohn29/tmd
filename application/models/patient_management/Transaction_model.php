<?php

class Transaction_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'patient_transactions';
	protected $entity = '\Mobiledrs\entities\patient_management\Transaction_entity';
	protected $record_entity = null;

	public function __construct()
	{
		parent::__construct();

		$this->record_entity = new \Mobiledrs\entities\patient_management\Transaction_entity();
	}

	public function fetchTransactionWithoutHhc(){

			$this->db->select('*');
			$this->db->where('patient_transactions.patient_hhcID', NULL);
			$this->db->where('patient_transactions.is_ca', NULL);
			$this->db->from('patient_transactions');
			$this->db->limit(10000);
			$this->db->join('patient', 'patient.patient_id = patient_transactions.pt_patientID');
			$result = $this->db->get()->result_array();

			return $result;
	}

	public function updateTransaction($data){

		$query['patient_hhcID'] = $data['patient_hhcID'];

		$this->db->set($query);
		$this->db->where('pt_id', $data['pt_id']);
		$this->db->update('patient_transactions');
		
		return;

	}

	public function createCAFromVisit($patient_id, $pt_dateOfService, $toUpdate, $provider_id, $pt_supervising_mdID){
		$query['pt_patientID'] = $patient_id;
		$query['pt_dateOfService'] = date("Y-m-d", strtotime($pt_dateOfService));
		$query['is_ca'] = 1;
		$query[$toUpdate] = 1;


		return $this->db->insert('patient_transactions', $query);
	}

	public function addUser($id, $userId){
		$this->db->set('userId', $userId);
		$this->db->where('pt_id', $id);
		$this->db->update('patient_transactions');
		
		return;

	}

	public function get_latest_transaction_ids(){

			$this->db->select('pt_id, pt_dateOfService, pt_patientID');
			$this->db->from('patient_transactions');
			// $this->db->group_by('pt_patientID');
			$this->db->order_by('pt_dateOfService', 'DESC');
			$result = $this->db->get()->result_array();

			return $result;
	}

	public function prepare_data() : array
	{
		$this->prepare_entity_data();

		if(!empty($this->record_entity->no_homehealth_ref)){
			if(empty($this->record_entity->no_homehealth_ref_checked_by)){
				$no_homehealth_ref_checked_by = $this->session->userdata('user_fullname');
			} else {
				$no_homehealth_ref_checked_by = $this->record_entity->no_homehealth_ref_checked_by;
			}
		} else {
			$no_homehealth_ref_checked_by = '';
		}

		if(!empty($this->record_entity->not_our_md)){
			if(empty($this->record_entity->not_our_md_checked_by)){
				$not_our_md_checked_by = $this->session->userdata('user_fullname');
			} else {
				$not_our_md_checked_by = $this->record_entity->not_our_md_checked_by;
			}
		} else {
			$not_our_md_checked_by = '';
		}


		if(!empty($this->record_entity->non_admit)){
			if(empty($this->record_entity->non_admit_checked_by)){
				$non_admit_checked_by = $this->session->userdata('user_fullname');
			} else {
				$non_admit_checked_by = $this->record_entity->non_admit_checked_by;
			}
		} else {
			$non_admit_checked_by = '';
		}

		if(!empty($this->record_entity->is_early_discharge)){
			if(empty($this->record_entity->is_early_discharge_checked_by)){
				$is_early_discharge_checked_by = $this->session->userdata('user_fullname');
			} else {
				$is_early_discharge_checked_by = $this->record_entity->is_early_discharge_checked_by;
			}
		} else {
			$is_early_discharge_checked_by = '';
		}

		

		$toReturn = [
			'pt_id' => $this->record_entity->pt_id,
			'pt_tovID' => $this->record_entity->pt_tovID,
			'pt_patientID' => $this->record_entity->pt_patientID,
			'pt_providerID' => empty($this->record_entity->pt_providerID) ? 
				NULL : $this->record_entity->pt_providerID,
			'pt_dateOfService' => $this->record_entity->set_date_format($this->record_entity->pt_dateOfService),
			'pt_deductible' => $this->record_entity->pt_deductible,
			'pt_aw_ippe_date' => $this->record_entity->set_date_format($this->record_entity->pt_aw_ippe_date),
			'pt_aw_ippe_code' => $this->record_entity->pt_aw_ippe_code,
			'pt_performed' => $this->record_entity->pt_performed,
			'pt_acp' => $this->record_entity->pt_acp,
			'pt_diabetes' => $this->record_entity->pt_diabetes,
			'pt_hypertension' => $this->record_entity->pt_hypertension,
			'pt_tobacco' => $this->record_entity->pt_tobacco,
			'pt_tcm' => $this->record_entity->pt_tcm,
			'pt_mileage' => $this->record_entity->pt_mileage,
			'pt_others' => $this->record_entity->pt_others,
			'pt_icd10_codes' => $this->record_entity->pt_icd10_codes,
			'pt_reasonForVisit' => $this->record_entity->pt_reasonForVisit,
			'pt_dateRef' => $this->record_entity->set_date_format($this->record_entity->pt_dateRef),
			'pt_dateRefEmailed' => $this->record_entity->set_date_format($this->record_entity->pt_dateRefEmailed),
			'early_discharge_date' => $this->record_entity->set_date_format($this->record_entity->early_discharge_date),
			'is_early_discharge' => empty($this->record_entity->is_early_discharge) ? 0 : $this->record_entity->is_early_discharge,
			'pt_notes' => $this->record_entity->pt_notes,
			'pt_supervising_mdID' => empty($this->record_entity->pt_supervising_mdID) ? null : $this->record_entity->pt_supervising_mdID,
			'pt_status' => empty($this->record_entity->pt_status) ? null : $this->record_entity->pt_status,
			'not_our_md' => empty($this->record_entity->not_our_md) ? 0 : $this->record_entity->not_our_md,
			'non_admit' => empty($this->record_entity->non_admit) ? 0 : $this->record_entity->non_admit,
			'no_homehealth_ref' => empty($this->record_entity->no_homehealth_ref) ? 0 : $this->record_entity->no_homehealth_ref,
			'no_homehealth_ref_checked_by' =>  $no_homehealth_ref_checked_by,
			'not_our_md_checked_by' => $not_our_md_checked_by,
			'non_admit_checked_by' => $non_admit_checked_by,
			'is_early_discharge_checked_by' => $is_early_discharge_checked_by,
			'is_ca' => $this->record_entity->is_ca ?  $this->record_entity->is_ca : NULL,
			'patient_hhcID' => empty($_POST['patient_homehealth']) ? null : $this->record_entity->patient_hhcID,
			'transaction_file' => $this->record_entity->transaction_file,
			'userId' => $this->session->userdata('user_id')
		];

		


		return $toReturn;
	}
}