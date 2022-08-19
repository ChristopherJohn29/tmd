<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'core/MY_AJAX_Controller.php');

class Profile extends \Mobiledrs\core\MY_AJAX_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'specialist/profile_model' => 'specialist_mode'
		));
	}

	public function search()
	{
		

		$params = [
			'where_data' => [
				['key' => 'company_name', 'value' => $this->input->get('term')]
			]
		];

		$res = $this->specialist_mode->find($params);

		$search_data = [];

		if ($res)
		{
			for ($i = 0; $i < count($res); $i++) 
			{
				$search_data[] = [
					'id' => $res[$i]->id,
					'value' => $res[$i]->company_name
				];
			}
		}

		echo json_encode($search_data);
	}
}