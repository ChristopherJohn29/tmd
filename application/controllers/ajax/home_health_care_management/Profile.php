<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'core/MY_AJAX_Controller.php');

class Profile extends \Mobiledrs\core\MY_AJAX_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'home_health_care_management/profile_model' => 'hhc_model'
		));
	}

	public function search(string $search_term)
	{
		$this->check_permission('add_pt');

		$params = [
			'where_data' => [
				['key' => 'hhc_name', 'value' => $search_term]
			]
		];

		$res = $this->hhc_model->find($params);

		$search_data = [];

		for ($i = 0; $i < count($res); $i++) 
		{
			$search_data[] = [
				'id' => $res[$i]->hhc_id,
				'text' => $res[$i]->hhc_name
			];
		}

		if ($res)
		{
			echo json_encode([
				'state' => true,
				'data' => $search_data
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