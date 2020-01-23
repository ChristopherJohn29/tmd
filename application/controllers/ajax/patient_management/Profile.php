<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'core/MY_AJAX_Controller.php');

use \Mobiledrs\entities\patient_management\Type_visit_entity;

class Profile extends \Mobiledrs\core\MY_AJAX_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/Profile_model' => 'pt_model',
			'patient_management/Transaction_model' => 'pt_trans_model'
		));
	}

	public function search()
	{
		$this->check_permission('add_tr');

		$params = [
			'where_data' => [
				['key' => 'patient_name', 'value' => $this->input->get('term')]
			]
		];

		$res = $this->pt_model->find($params);

		$search_data = [];

		if ($res)
		{
			for ($i = 0; $i < count($res); $i++) 
			{ 
				$search_data[] = [
					'id' => $res[$i]->patient_id,
					'value' => $res[$i]->patient_name
				];
			}
		}

		echo json_encode($search_data);
	}

	public function get_tov($type = 'add')
	{
		$initial_list = [
			Type_visit_entity::INITIAL_VISIT_HOME, 
			Type_visit_entity::INITIAL_VISIT_FACILITY, 
			Type_visit_entity::INITIAL_VISIT_OFFICE
		];

		$patient_params = [
			'where' => [
				[
					'key' => 'patient_transactions.pt_patientID',
					'condition' => '=',
					'value' => $this->input->get('patientID')
				],
				[
					'key' => 'patient_transactions.pt_archive',
					'condition' => '=',
					'value' => NULL
				]
			],
			'where_in' => [
				'column' => 'patient_transactions.pt_tovID',
				'values' => $initial_list
			]
		];

		$initialTrans = null;
		if ($type == 'edit' && ! empty($this->input->get('patientTransID'))) {
			$initial_params = [
				'key' => 'patient_transactions.pt_id',
				'value' => $this->input->get('patientTransID')
			];

			$initialTrans = $this->pt_trans_model->record($initial_params);
		}

		$patientTrans = $this->pt_trans_model->records($patient_params);
		
		$tov_datas = [];
		if ($type == 'add') {
			if ($patientTrans) {
				$tov_datas = (new Type_visit_entity)->get_followup_list();
			}
			else {
				$tov_datas = Type_visit_entity::get_visits_list();
			}	
		} else {
			if ((! empty($initialTrans) && in_array($initialTrans->pt_tovID, $initial_list)) ||
				($type == 'edit' && empty($this->input->get('patientTransID')))) {
				$tov_datas = Type_visit_entity::get_visits_list();
			}
			else {
				$tov_datas = (new Type_visit_entity)->get_followup_list();
			}
		}		

		$tov_list = '<option value="">Select</option>';

		foreach ($tov_datas as $tov_data)
		{
			if ($tov_data == Type_visit_entity::INITIAL_VISIT_HOME) 
			{
				$tov_list .= '<option value="1"> Initial Visit (Home)</option>';
			}
			else if ($tov_data == Type_visit_entity::INITIAL_VISIT_FACILITY) 
			{
				$tov_list .= '<option value="2"> Initial Visit (Facility)</option>';
			}
			else if ($tov_data == Type_visit_entity::FOLLOW_UP_HOME) 
			{
				$tov_list .= '<option value="3"> Follow-up Visit (Home)</option>';
			}
			else if ($tov_data == Type_visit_entity::FOLLOW_UP_FACILITY) 
			{
				$tov_list .= '<option value="4"> Follow-up Visit (Facility)</option>';
			}
			else if ($tov_data == Type_visit_entity::INITIAL_VISIT_OFFICE) 
			{
				$tov_list .= '<option value="7"> Initial Visit (Office)</option>';
			}
			else if ($tov_data == Type_visit_entity::FOLLOW_UP_OFFICE) 
			{
				$tov_list .= '<option value="8"> Follow-up Visit (Office)</option>';
			}
		}

		echo $tov_list;
	}
}