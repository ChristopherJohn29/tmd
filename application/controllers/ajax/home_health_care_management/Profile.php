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

	public function search()
	{
		$this->check_permission('add_pt');

		$params = [
			'where_data' => [
				['key' => 'hhc_name', 'value' => $this->input->get('term')]
			]
		];

		$res = $this->hhc_model->find($params);

		$search_data = [];

		if ($res)
		{
			for ($i = 0; $i < count($res); $i++) 
			{
				$search_data[] = [
					'id' => $res[$i]->hhc_id,
					'value' => $res[$i]->hhc_name
				];
			}
		}

		echo json_encode($search_data);
	}
}