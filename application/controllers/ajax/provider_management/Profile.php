<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'core/MY_AJAX_Controller.php');

class Profile extends \Mobiledrs\core\MY_AJAX_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('provider_management/Profile_model', 'pt_model');
	}

	public function search(string $search_term)
	{
		$this->check_permission('add_tr');

		$params = [
			'where_data' => [
				['key' => 'provider_firstname', 'value' => $search_term],
				['key' => 'provider_lastname', 'value' => $search_term]
			]
		];

		$res = $this->pt_model->find($params);

		$search_data = [];

		for ($i = 0; $i < count($res); $i++) 
		{ 
			$search_data[] = [
				'id' => $res[$i]->provider_id,
				'text' => $res[$i]->get_fullname()
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