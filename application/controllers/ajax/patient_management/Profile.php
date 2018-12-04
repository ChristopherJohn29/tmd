<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'core/MY_AJAX_Controller.php');

class Profile extends \Mobiledrs\core\MY_AJAX_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			// 'patient_management/profile_model' => 'pt_profile_model',
			'home_health_care_management/profile_model' => 'hhc_model'
		));
	}

	public function search(string $search_term)
	{
		$this->check_permission('search_pt');

		$params = [
			'where_data' => [
				['key' => 'hhc_name', 'value' => $search_term]
			]
		];

		$res = $this->hhc_model->find($params);

		if ($res)
		{
			echo json_encode([
				'state' => true,
				'data' => $res
			]);
		}
		else
		{
			echo json_encode([
				'state' => false,
				'data' => []
			]);
		}
	}
}