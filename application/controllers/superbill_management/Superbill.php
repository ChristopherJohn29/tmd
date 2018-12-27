<?php

class Superbill extends \Mobiledrs\core\MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$roles_permissions = [
			'generate_sbawr',
			'generate_sbhvr',
			'generate_sbfvr',
			'generate_sbcpor'
		];

		foreach ($roles_permissions as $roles_permission)
		{
			$this->check_permission($roles_permission);	
		}

		$this->twig->view('superbill_management/create');
	}

	public function generate()
	{
		$roles_permissions = [
			'generate_sbawr',
			'generate_sbhvr',
			'generate_sbfvr',
			'generate_sbcpor'
		];

		foreach ($roles_permissions as $roles_permission)
		{
			$this->check_permission($roles_permission);	
		}

		$fromDate = implode('_', [
			$this->input->post('year'),
			$this->input->post('month'),
			$this->input->post('fromDate')
		]);

		$toDate = implode('_', [
			$this->input->post('year'),
			$this->input->post('month'),
			$this->input->post('toDate')
		]);

		if ($this->input->post('type') == 'aw')
		{
			redirect('superbill_management/annual_wellness/list/' . $fromDate . '/' . $toDate);
		}
		else if ($this->input->post('type') == 'hv')
		{
			redirect('superbill_management/home_visits/list/' . $fromDate . '/' . $toDate);
		}
		else if ($this->input->post('type') == 'fv')
		{
			redirect('superbill_management/facility_visits/list/' . $fromDate . '/' . $toDate);
		}
		else if ($this->input->post('type') == 'cpo')
		{
			redirect('superbill_management/CPO/list/' . $fromDate . '/' . $toDate);
		}
	}
}