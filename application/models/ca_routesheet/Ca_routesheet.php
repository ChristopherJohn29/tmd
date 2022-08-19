<?php

class Ca_routesheet extends \Mobiledrs\core\MY_Models {


	public function __construct()
	{
		parent::__construct();
	}

    public function getSuperMd($provider_id){
        $this->db->select('*');
        $this->db->where('provider_id', $provider_id);
        $this->db->from('provider');
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function getRouteSheet(){

        $this->db->select('*');
        $this->db->where('prs_archive', NULL);
        $this->db->from('provider_ca_route_sheet');
        $this->db->join('provider', 'provider.provider_id = provider_ca_route_sheet.prs_providerID');
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function checkRouteSheet($provId, $prs_dateOfService){

        $this->db->select('*');
        $this->db->where('prs_archive !=', NULL);
        $this->db->where('prs_providerID', $provId);
        $this->db->where('prs_dateOfService', $prs_dateOfService);
        $this->db->from('provider_ca_route_sheet');
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function fetchTransactions($patient_id) {
        $this->db->select('*');
        $this->db->where('patient_transaction_ca.patient_id', $patient_id);
        $this->db->from('patient_transaction_ca');
        $this->db->join('provider', 'provider.provider_id = patient_transaction_ca.provider_id', 'left');
        $this->db->join('patient', 'patient.patient_id = patient_transaction_ca.patient_id', 'left');
        $this->db->join('home_health_care', 'home_health_care.hhc_id = patient.patient_hhcID', 'left');
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function updateRouteSheet($data){

        $time = strtotime($data['prs_dateOfService']);
        $prs_dateOfService = date('Y-m-d',$time);

        $list = array();
        $this->db->set('prs_providerID', $data['prs_providerID']);
        $this->db->set('prs_dateOfService', $prs_dateOfService);
        $this->db->set('prs_dateCreated', $data['currentDate']);
        $this->db->where('prs_id', $data['prs_id']);

        $this->db->update('provider_ca_route_sheet');

        $prsl_prsID = $data['prsl_prsID'];

        foreach($data['prsl_patientID'] as $key => $value){

            $this->db->set('patient_id', $value);
            $this->db->set('provider_id', $data['prs_providerID']);
            $this->db->set('pt_dateOfService', $prs_dateOfService);
            $this->db->set('type_of_visit', $data['prsl_tov'][$key]);
            $this->db->set('pt_notes', $data['prsl_notes'][$key]);
            $this->db->set('pt_reasonForVisit', $data['pt_reasonForVisit'][$key]);
            $this->db->set('supervising_md_id', $data['supervising_md_id'][$key]);
            $this->db->where('id', $data['prsl_patientTransID'][$key]);

            $this->db->update('patient_transaction_ca');

            $prsl_patientTransID =  $data['prsl_patientTransID'][$key];

            $prsl_dateRefRaw = strtotime($data['prsl_dateRef'][$key]);
            $prsl_dateRef = date('Y-m-d',$prsl_dateRefRaw);

        //    $entry = array(
        //        'prsl_id' => $data['prsl_id'][$key],
        //        'prsl_patientID' => $value,
        //        'prsl_tov' => $data['prsl_tov'][$key],
        //        'prsl_dateRef' => $prsl_dateRef,
        //        'prsl_notes' => $data['prsl_notes'][$key],
        //        'prsl_toTime' => $data['prsl_toTime'][$key],
        //        'prsl_fromTime' => $data['prsl_fromTime'][$key],
        //        'prsl_prsID' => $prsl_prsID,
        //        'prsl_patientTransID' => $prsl_patientTransID
        //    );

           $this->db->set('prsl_patientID', $value);
           $this->db->set('prsl_tov', $data['prsl_tov'][$key]);
           $this->db->set('prsl_dateRef', $prsl_dateRef);
           $this->db->set('prsl_notes', $data['prsl_notes'][$key]);
           $this->db->set('prsl_toTime', $data['prsl_toTime'][$key]);
           $this->db->set('prsl_fromTime', $data['prsl_fromTime'][$key]);
           $this->db->set('prsl_prsID', $prsl_prsID);
           $this->db->set('prsl_patientTransID', $prsl_patientTransID);
           $this->db->where('prsl_id', $data['prsl_id'][$key]);

           $this->db->update('provider_ca_route_sheet_list');
       
        }

    }

    public function addRouteSheet($data){

        $time = strtotime($data['prs_dateOfService']);
        $prs_dateOfService = date('Y-m-d',$time);

        $list = array();
        $this->db->set('prs_providerID', $data['prs_providerID']);
        $this->db->set('prs_dateOfService', $prs_dateOfService);
        $this->db->set('prs_dateCreated', $data['currentDate']);
        $this->db->insert('provider_ca_route_sheet');

        $prsl_prsID = $this->db->insert_id();

        foreach($data['prsl_patientID'] as $key => $value){

            $prsl_dateRefRaw = strtotime($data['prsl_dateRef'][$key]);
            $prsl_dateRef = date('Y-m-d',$prsl_dateRefRaw);

            $this->db->set('patient_id', $value);
            $this->db->set('provider_id', $data['prs_providerID']);
            $this->db->set('pt_dateOfService', $prs_dateOfService);
            $this->db->set('type_of_visit', $data['prsl_tov'][$key]);
            $this->db->set('pt_notes', $data['prsl_notes'][$key]);
            $this->db->set('pt_reasonForVisit', $data['pt_reasonForVisit'][$key]);
            $this->db->set('supervising_md_id', $data['supervising_md_id'][$key]);
            $this->db->set('pt_dateRef', $prsl_dateRef);
            

            $this->db->insert('patient_transaction_ca');

            $prsl_patientTransID = $this->db->insert_id();

            

           $entry = array(
               'prsl_patientID' => $value,
               'prsl_tov' => $data['prsl_tov'][$key],
               'prsl_dateRef' => $prsl_dateRef,
               'prsl_notes' => $data['prsl_notes'][$key],
               'prsl_toTime' => $data['prsl_toTime'][$key],
               'prsl_fromTime' => $data['prsl_fromTime'][$key],
               'prsl_prsID' => $prsl_prsID,
               'prsl_patientTransID' => $prsl_patientTransID
           );

            $list[] = $entry;
        }

       $this->db->insert_batch('provider_ca_route_sheet_list', $list);
    }


    public function getDetails($prs_id){

        $this->db->select('*');
        $this->db->where('prsl_prsID', $prs_id);
        $this->db->from('provider_ca_route_sheet_list');
        $this->db->join('provider', 'provider.provider_id = provider_ca_route_sheet.prs_providerID', 'left');
        $this->db->join('patient', 'patient.patient_id = provider_ca_route_sheet_list.prsl_patientID', 'left');
        $this->db->join('home_health_care', 'home_health_care.hhc_id = patient.patient_hhcID', 'left');
        
        $this->db->join('patient_transaction_ca', 'patient_transaction_ca.id = provider_ca_route_sheet_list.prsl_patientTransID', 'left');
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function getPatientRecord($patient_id){
        $this->db->select('*');
        $this->db->where('patient_id', $patient_id);
        $this->db->from('patient');
        $this->db->join('home_health_care', 'home_health_care.hhc_id = patient.patient_hhcID', 'left');
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function addCATransaction($data){
        $time = strtotime($data['pt_dateOfService']);
        $pt_dateOfService = date('Y-m-d',$time);

        $this->db->set('patient_id', $data['patient_id']);
        $this->db->set('pt_dateOfService', $pt_dateOfService);
        $this->db->set('supervising_md_id', $data['supervising_md_id']);
        $this->db->set('provider_id', $data['provider_id']);
        $this->db->set('pt_aw_ippe_code', $data['pt_aw_ippe_code']);
        $this->db->set('pt_performed', $data['pt_performed']);
        $this->db->set('pt_icd10_codes', $data['pt_icd10_codes']);
        $this->db->set('pt_notes', $data['pt_notes']);
        $this->db->set('type_of_visit', $data['type_of_visit']);
        
        
        $this->db->insert('patient_transaction_ca');
    }

    public function getTransactionRecord($id){
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('patient_transaction_ca');
        $this->db->join('provider', 'provider.provider_id = patient_transaction_ca.provider_id', 'left');
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function getTransaction($fromDate, $toDate, $type, array $ids = []){

        $this->db->select('*');
        $this->db->where('pt_dateOfService >=', $fromDate);
        $this->db->where('pt_dateOfService <=', $toDate);
        $this->db->where('pt_archive !=', 1);
        $this->db->from('patient_transaction_ca');
        $this->db->join('provider', 'provider.provider_id = patient_transaction_ca.provider_id', 'left');
        $this->db->join('patient', 'patient.patient_id = patient_transaction_ca.patient_id', 'left');

        $result = $this->db->get()->result_array();

        return $result;
    }

    public function updateCATransaction($data, $id){
        $time = strtotime($data['pt_dateOfService']);
        $pt_dateOfService = date('Y-m-d',$time);

        $this->db->set('patient_id', $data['patient_id']);
        $this->db->set('pt_dateOfService', $pt_dateOfService);
        $this->db->set('supervising_md_id', $data['supervising_md_id']);
        $this->db->set('provider_id', $data['provider_id']);
        $this->db->set('pt_aw_ippe_code', $data['pt_aw_ippe_code']);
        $this->db->set('pt_performed', $data['pt_performed']);
        $this->db->set('pt_icd10_codes', $data['pt_icd10_codes']);
        $this->db->set('type_of_visit', $data['type_of_visit']);
        $this->db->set('pt_notes', $data['pt_notes']);
        $this->db->where('id', $id);
        

        $this->db->update('patient_transaction_ca');
    }
}