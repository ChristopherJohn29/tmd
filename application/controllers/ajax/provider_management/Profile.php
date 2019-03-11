<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'core/MY_AJAX_Controller.php');

class Profile extends \Mobiledrs\core\MY_AJAX_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('provider_management/Profile_model', 'pt_model');
	}

	public function search()
	{
		$this->check_permission('add_tr');

		$params = [
			'where_data' => [
				['key' => 'provider_firstname', 'value' =>  $this->input->get('term')],
				['key' => 'provider_lastname', 'value' =>  $this->input->get('term')]
			]
		];

		$res = $this->pt_model->find($params);

		$search_data = [];

		if ($res)
		{
			for ($i = 0; $i < count($res); $i++) 
			{ 
				$search_data[] = [
					'id' => $res[$i]->provider_id,
					'value' => $res[$i]->get_fullname()
				];
			}
		}

		echo json_encode($search_data);
	}

	public function supervising_md_search()
	{
		$this->check_permission('add_tr');

		$params = [
			'where_data' => [
				['key' => 'provider_firstname', 'value' =>  $this->input->get('term')],
				['key' => 'provider_lastname', 'value' =>  $this->input->get('term')]
			]
		];

		$res = $this->pt_model->find($params);

		$search_data = [];

		if ($res)
		{
			for ($i = 0; $i < count($res); $i++) 
			{
				if ($res[$i]->provider_supervising_MD == '0') {
					continue;
				} 

				$search_data[] = [
					'id' => $res[$i]->provider_id,
					'value' => $res[$i]->get_fullname()
				];
			}
		}

		echo json_encode($search_data);
	}
}