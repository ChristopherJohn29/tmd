<?php

use \Mobiledrs\entities\superbill_management\Superbill_entity;
use \Mobiledrs\entities\patient_management\POS_entity;

class Superbill extends \Mobiledrs\core\MY_Controller {

	private $transactions = ['aw', 'hv', 'fv'];

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/CPO_model',
			'patient_management/profile_model',
			'patient_management/transaction_model',
			'superbill_management/superbill_model'
		));
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

		$page_data['fromDate'] = implode('/', [
			$this->input->post('year'),
			$this->input->post('month'),
			$this->input->post('fromDate')
		]);

		$page_data['toDate'] = implode('/', [
			$this->input->post('year'),
			$this->input->post('month'),
			$this->input->post('toDate')
		]);

		$Superbill_data = $this->get_superbill_data(
			$this->input->post('type'),
			$page_data['fromDate'],
			$page_data['toDate']
		);

		$page_data = array_merge($page_data, $Superbill_data);

		$page_data['table_name_page'] = $this->input->post('type');

		$this->twig->view('superbill_management/create', $page_data);
	}

	public function details(string $type, string $fromDate, string $toDate)
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

		$new_fromDate = str_replace('_', '/', $fromDate);
		$new_toDate = str_replace('_', '/', $toDate);

		$page_data['date_billed'] = date('m/d/y');

		$superbill_data = $this->get_superbill_data(
			$type,
			$new_fromDate,
			$new_toDate
		);

		$page_data = array_merge($page_data, $superbill_data);

		$this->twig->view('superbill_management/details_' . $type, $page_data);
	}

	private function get_superbill_data(
		string $type,
		string $fromDate,
		string $toDate
	)
	{
		if (in_array($type, $this->transactions))
		{
			$type_of_visit = [];
			if ($type == 'hv' || $type == 'fv')
			{
				$type_of_visit = (new Superbill_entity())->get_sel_type_visit($type);
			}

			$page_data['transactions'] = $this->superbill_model->get_transaction(
				$fromDate,
				$toDate,
				empty($type_of_visit) ? [] : $type_of_visit 
			);

			$page_data['POS_entity'] = new POS_entity();

			if ( ! empty($page_data['transactions']))
			{
				$superbill_entity = new Superbill_entity($page_data['transactions'], []);

				$summary_func = 'compute_transaction_' . $type . '_summary';

				$page_data['summary'] = $superbill_entity->$summary_func();
			}
			else
			{
				$page_data['summary'] = [];
			}
		}
		else if ($type == 'cpo')
		{
			$page_data = $this->superbill_model->get_CPO(
				$fromDate,
				$toDate
			);

			if ( ! empty($page_data['CPOs']))
			{
				$superbill_entity = new Superbill_entity([], $page_data['CPOs']);

				$page_data['summary'] = $superbill_entity->compute_CPO();
			}
			else
			{
				$page_data['summary'] = [];
			}
		}
		else 
		{
			redirect('errors/page_not_found');
		}

		return $page_data;
	}
}