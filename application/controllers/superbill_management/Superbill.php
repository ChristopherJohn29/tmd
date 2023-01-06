<?php

use \Mobiledrs\entities\superbill_management\Superbill_entity;
use \Mobiledrs\entities\patient_management\POS_entity;
use \Mobiledrs\entities\patient_management\Transaction_entity;

class Superbill extends \Mobiledrs\core\MY_Controller {

	private $transactions = ['aw', 'hv', 'fv', 'tv', 'ca'];

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/CPO_model',
			'patient_management/profile_model',
			'provider_management/supervising_md_model',
			'patient_management/transaction_model',
			'superbill_management/superbill_model',
		));

		$this->load->library('Date_formatter');
		
		ini_set('max_execution_time', 0);
		ini_set('memory_limit', '2048M');
	}

	public function index()
	{
		$roles_permissions = [
			'generate_sbawr',
			'generate_sbhvr',
			'generate_sbfvr',
			'generate_sbtv',
			'generate_sbcpor'
		];

		foreach ($roles_permissions as $roles_permission)
		{
			$this->check_permission($roles_permission);	
		}

		$this->twig->view('superbill_management/create');
	}

	public function unbill()
	{
		$roles_permissions = [
			'generate_sbawr',
			'generate_sbhvr',
			'generate_sbfvr',
			'generate_sbtv',
			'generate_sbcpor'
		];

		foreach ($roles_permissions as $roles_permission)
		{
			$this->check_permission($roles_permission);	
		}

		$this->twig->view('superbill_management/unbill');
	}

	public function generate()
	{
		$roles_permissions = [
			'generate_sbawr',
			'generate_sbhvr',
			'generate_sbfvr',
			'generate_sbcpor',
			'generate_sbtv'
		];

		foreach ($roles_permissions as $roles_permission)
		{
			$this->check_permission($roles_permission);	
		}

		$page_data['fromDate'] = implode('/', [
			$this->input->post('year'),
			$this->input->post('fromMonth'),
			$this->input->post('fromDate')
		]);

		$page_data['toDate'] = implode('/', [
			$this->input->post('year'),
			$this->input->post('toMonth'),
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

	public function generateUnbill()
	{
		$roles_permissions = [
			'generate_sbawr',
			'generate_sbhvr',
			'generate_sbfvr',
			'generate_sbcpor',
			'generate_sbtv'
		];

		foreach ($roles_permissions as $roles_permission)
		{
			$this->check_permission($roles_permission);	
		}

		$page_data['fromDate'] = implode('/', [
			$this->input->post('year'),
			$this->input->post('fromMonth'),
			$this->input->post('fromDate')
		]);

		$page_data['toDate'] = implode('/', [
			$this->input->post('year'),
			$this->input->post('toMonth'),
			$this->input->post('toDate')
		]);

		$Superbill_data = $this->get_superbill_data_unbill(
			$this->input->post('type'),
			$page_data['fromDate'],
			$page_data['toDate']
		);

		$page_data = array_merge($page_data, $Superbill_data);

		$page_data['table_name_page'] = $this->input->post('type');

		$this->twig->view('superbill_management/unbill', $page_data);
	}

	public function details(string $type, string $fromDate, string $toDate)
	{
		$roles_permissions = [
			'generate_sbawr',
			'generate_sbhvr',
			'generate_sbfvr',
			'generate_sbtv',
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

	public function details_unbill(string $type, string $fromDate)
	{
		$roles_permissions = [
			'generate_sbawr',
			'generate_sbhvr',
			'generate_sbfvr',
			'generate_sbtv',
			'generate_sbcpor'
		];

		foreach ($roles_permissions as $roles_permission)
		{
			$this->check_permission($roles_permission);	
		}

		$new_fromDate = str_replace('_', '/', $fromDate);

		$page_data['date_billed'] = $fromDate;

		$new_fromDate = date_format(date_create($new_fromDate), 'Y/m/d');

		$superbill_data = $this->get_superbill_data_unbill_details(
			$type,
			$new_fromDate
		);

		$page_data = array_merge($page_data, $superbill_data);

		$this->twig->view('superbill_management/unbill_' . $type, $page_data);
	}

	private function get_superbill_data(
		string $type,
		string $fromDate,
		string $toDate,
		array $ids = []
	)
	{
		if (in_array($type, $this->transactions))
		{
			$type_of_visit = [];
			if ($type == 'hv' || $type == 'fv' || $type == 'tv' || $type == 'ca')
			{
				$type_of_visit = (new Superbill_entity())->get_sel_type_visit($type);
			}

			if ($type == 'ca') {
				$is_ca = 'ca';
			} else {
				$is_ca = '';
			}

			$transactions = $this->superbill_model->get_transaction(
				$fromDate,
				$toDate,
				empty($type_of_visit) ? [] : $type_of_visit,
				$type,
				$ids,
				$is_ca
			);

		
			$page_data['transaction_entity'] = new Transaction_entity();
			$page_data['POS_entity'] = new POS_entity();
			$page_data['transactions'] = '';

			if (in_array($type, ['hv', 'fv', 'tv', 'ca']))
			{
				$page_data['transactions'] = $page_data['transaction_entity']->get_notBilledVisit($transactions);
			}
			else if ($type == 'aw') 
			{
			
				$page_data['transactions'] = $page_data['transaction_entity']->get_notBilledAW($transactions);
			}

			if ( ! empty($page_data['transactions']))
			{
				$superbill_entity = new Superbill_entity($page_data['transactions'], []);

				$summary_func = 'compute_transaction_' . $type . '_summary';

				$page_data['summary'] = $superbill_entity->$summary_func();

				

				$page_data['newTransactions'] = $this->supervising_md_model->get_supervisingMD_details($page_data['transactions']);
			}
			else
			{
				$page_data['summary'] = [];
				$page_data['newTransactions'] = [];
			}
		}
		else if ($type == 'cpo')
		{
			$page_data = $this->superbill_model->get_CPO(
				$fromDate,
				$toDate,
				$ids
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

		$page_data['fromDate'] = str_replace('_', '/', $fromDate);
		$page_data['toDate'] = str_replace('_', '/', $toDate);

		return $page_data;
	}

	private function get_superbill_data_unbill_details(
		string $type,
		string $fromDate,
		array $ids = []
	)
	{
		if (in_array($type, $this->transactions))
		{
			$type_of_visit = [];
			if ($type == 'hv' || $type == 'fv' || $type == 'tv' || $type == 'ca')
			{
				$type_of_visit = (new Superbill_entity())->get_sel_type_visit($type);
			}

			if ($type == 'ca') {
				$is_ca = 'ca';
			} else {
				$is_ca = '';
			}

			$transactions = $this->superbill_model->get_transaction_unbill_details(
				$fromDate,
				empty($type_of_visit) ? [] : $type_of_visit,
				$type,
				$ids,
				$is_ca
			);

			$page_data['transaction_entity'] = new Transaction_entity();
			$page_data['POS_entity'] = new POS_entity();
			$page_data['transactions'] = '';

			if (in_array($type, ['hv', 'fv', 'tv', 'ca']))
			{
				$page_data['transactions'] = $page_data['transaction_entity']->get_BilledVisit($transactions);
			}
			else if ($type == 'aw') 
			{	
				
				
				$page_data['transactions'] = $page_data['transaction_entity']->get_BilledAW($transactions);
			}

			if ( ! empty($page_data['transactions']))
			{
				$superbill_entity = new Superbill_entity($page_data['transactions'], []);

				$summary_func = 'compute_transaction_' . $type . '_summary_unbill';

				$page_data['summary'] = $superbill_entity->$summary_func();

				$page_data['newTransactions'] = $this->supervising_md_model->get_supervisingMD_details($page_data['transactions']);
			}
			else
			{
				$page_data['summary'] = [];
				$page_data['newTransactions'] = [];
			}
		}
		else if ($type == 'cpo')
		{
			
			$page_data = $this->superbill_model->get_CPO_unbill_details(
				$fromDate,
				$ids
			);

		

			if ( ! empty($page_data['CPOs']))
			{
				$superbill_entity = new Superbill_entity([], $page_data['CPOs']);

				$page_data['summary'] = $superbill_entity->compute_CPO_unbill();
		
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

		$page_data['fromDate'] = str_replace('_', '/', $fromDate);
	

		return $page_data;
	}

	private function get_superbill_data_unbill(
		string $type,
		string $fromDate,
		string $toDate,
		array $ids = []
	)
	{
		if (in_array($type, $this->transactions))
		{
			$type_of_visit = [];
			if ($type == 'hv' || $type == 'fv' || $type == 'tv' || $type == 'ca')
			{
				$type_of_visit = (new Superbill_entity())->get_sel_type_visit($type);
			}

			if ($type == 'ca') {
				$is_ca = 'ca';
			} else {
				$is_ca = '';
			}

			$transactions = $this->superbill_model->get_transaction_unbill(
				$fromDate,
				$toDate,
				empty($type_of_visit) ? [] : $type_of_visit,
				$type,
				$ids,
				$is_ca
			);

			$page_data['transaction_entity'] = new Transaction_entity();
			$page_data['POS_entity'] = new POS_entity();
			$page_data['transactions'] = '';

			if (in_array($type, ['hv', 'fv', 'tv', 'ca']))
			{
				$page_data['transactions'] = $page_data['transaction_entity']->get_BilledVisit($transactions);
			}
			else if ($type == 'aw') 
			{	
				
				
				$page_data['transactions'] = $page_data['transaction_entity']->get_BilledAW($transactions);
			}

			if ( ! empty($page_data['transactions']))
			{
				$superbill_entity = new Superbill_entity($page_data['transactions'], []);

				$summary_func = 'compute_transaction_' . $type . '_summary_unbill';

				$page_data['summary'] = $superbill_entity->$summary_func();

				$page_data['newTransactions'] = $this->supervising_md_model->get_supervisingMD_details($page_data['transactions']);
			}
			else
			{
				$page_data['summary'] = [];
				$page_data['newTransactions'] = [];
			}
		}
		else if ($type == 'cpo')
		{
			
			$page_data = $this->superbill_model->get_CPO_unbill(
				$fromDate,
				$toDate,
				$ids
			);

		

			if ( ! empty($page_data['CPOs']))
			{
				$superbill_entity = new Superbill_entity([], $page_data['CPOs']);

				$page_data['summary'] = $superbill_entity->compute_CPO_unbill();
		
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

		$page_data['fromDate'] = str_replace('_', '/', $fromDate);
	

		return $page_data;
	}


	public function form(string $type, string $fromDate, string $toDate)
	{
		ini_set('max_execution_time', 0);
		ini_set('memory_limit', '2048M');
		$roles_permissions = [
			'generate_sbawr',
			'generate_sbhvr',
			'generate_sbtv',
			'generate_sbfvr',
			'generate_sbcpor'
		];

		foreach ($roles_permissions as $roles_permission)
		{
			$this->check_permission($roles_permission);	
		}

		$types = [
			'aw' => [
				'column' => 'pt_aw_billed',
				'filename' => 'Superbill_Annual_Wellness_',
				'model' => 'transaction_model',
				'html' => 'aw',
				'data' => 'pt_id',
				'columnID' => 'pt_id'
			],
			'hv' => [
				'column' => 'pt_visitBilled',
				'filename' => 'Superbill_Home_Visits_',
				'model' => 'transaction_model',
				'html' => 'hv',
				'data' => 'pt_id',
				'columnID' => 'pt_id'
			],
			'fv' => [
				'column' => 'pt_visitBilled',
				'filename' => 'Superbill_Facility_Visits_',
				'model' => 'transaction_model',
				'html' => 'fv',
				'data' => 'pt_id',
				'columnID' => 'pt_id'
			],
			'tv' => [
				'column' => 'pt_visitBilled',
				'filename' => 'Superbill_TeleHealth_Visits_',
				'model' => 'transaction_model',
				'html' => 'tv',
				'data' => 'pt_id',
				'columnID' => 'pt_id'
			],
			'ca' => [
				'column' => 'pt_visitBilled',
				'filename' => 'Cognitive_Assesment_Visits_',
				'model' => 'transaction_model',
				'html' => 'ca',
				'data' => 'pt_id',
				'columnID' => 'pt_id'
			],
			'cpo' => [
				'column' => 'ptcpo_dateBilled',
				'filename' => 'Superbill_CPO_',
				'model' => 'CPO_model',
				'html' => 'cpo',
				'data' => 'ptcpo_id',
				'columnID' => 'ptcpo_id'
			]
		];

		$page_data = $this->get_superbill_data(
			$type, 
			$fromDate, 
			$toDate,
			$this->input->post($types[$type]['data'])
		);
		$page_data['notes'] = $this->input->post('notes');
		$page_data['date_billed'] = date('m/d/y');

		if ($this->input->post('submit_type') == 'paid')
		{
			$transaction_params = [
				'data' => $this->input->post($types[$type]['data']),
				'columnPaid' => $types[$type]['column'],
				'columnID' => $types[$type]['columnID'],
				'model' => $types[$type]['model'],
				'redirect_url' => 'superbill_management/superbill'
			];

			parent::make_paid($transaction_params);
		}
		elseif ($this->input->post('submit_type') == 'pdf')
		{
			// temporary remove the max exceed time execution
			ini_set('max_execution_time', 0);
			ini_set('memory_limit', '2048M');

			$this->load->library(['Date_formatter', 'PDF']);

			$new_fromDate = str_replace('_', '/', $fromDate);
			$new_toDate = str_replace('_', '/', $toDate);

			$this->date_formatter->set_date($new_fromDate, $new_toDate);
			$date_period = $this->date_formatter->format();

			$html = $this->load->view('superbill_management/pdf/' . $types[$type]['html'], $page_data, true);
			$filename = $types[$type]['filename'] . $date_period;

			$this->pdf->page_orientation = 'L';
			$this->pdf->generate($html, $filename);
		}
		else
		{
			redirect('errors/page_not_found');
		}
	}

	public function form_unbill(string $type, string $fromDate)
	{
		$roles_permissions = [
			'generate_sbawr',
			'generate_sbhvr',
			'generate_sbtv',
			'generate_sbfvr',
			'generate_sbcpor'
		];

		foreach ($roles_permissions as $roles_permission)
		{
			$this->check_permission($roles_permission);	
		}

		$types = [
			'aw' => [
				'column' => 'pt_aw_billed',
				'filename' => 'Superbill_Annual_Wellness_',
				'model' => 'transaction_model',
				'html' => 'aw',
				'data' => 'pt_id',
				'columnID' => 'pt_id'
			],
			'hv' => [
				'column' => 'pt_visitBilled',
				'filename' => 'Superbill_Home_Visits_',
				'model' => 'transaction_model',
				'html' => 'hv',
				'data' => 'pt_id',
				'columnID' => 'pt_id'
			],
			'fv' => [
				'column' => 'pt_visitBilled',
				'filename' => 'Superbill_Facility_Visits_',
				'model' => 'transaction_model',
				'html' => 'fv',
				'data' => 'pt_id',
				'columnID' => 'pt_id'
			],
			'tv' => [
				'column' => 'pt_visitBilled',
				'filename' => 'Superbill_TeleHealth_Visits_',
				'model' => 'transaction_model',
				'html' => 'tv',
				'data' => 'pt_id',
				'columnID' => 'pt_id'
			],
			'ca' => [
				'column' => 'pt_visitBilled',
				'filename' => 'Cognitive_Assessment_Visits_',
				'model' => 'transaction_model',
				'html' => 'ca',
				'data' => 'pt_id',
				'columnID' => 'pt_id'
			],
			'cpo' => [
				'column' => 'ptcpo_dateBilled',
				'filename' => 'Superbill_CPO_',
				'model' => 'CPO_model',
				'html' => 'cpo',
				'data' => 'ptcpo_id',
				'columnID' => 'ptcpo_id'
			]
		];

		$page_data = $this->get_superbill_data_unbill_details(
			$type, 
			$fromDate, 
			$this->input->post($types[$type]['data'])
		);
		$page_data['notes'] = $this->input->post('notes');
		$page_data['date_billed'] = $fromDate;

		if ($this->input->post('submit_type') == 'paid')
		{
			$transaction_params = [
				'data' => $this->input->post($types[$type]['data']),
				'columnPaid' => $types[$type]['column'],
				'columnID' => $types[$type]['columnID'],
				'model' => $types[$type]['model'],
				'redirect_url' => 'superbill_management/superbill/unbill'
			];

			parent::make_unpaid($transaction_params);
		}
		elseif ($this->input->post('submit_type') == 'pdf')
		{
			// temporary remove the max exceed time execution
			ini_set('max_execution_time', 0);
			ini_set('memory_limit', '2048M');

			$this->load->library(['Date_formatter', 'PDF']);

			$new_fromDate = str_replace('_', '/', $fromDate);
			$new_toDate = str_replace('_', '/', $toDate);

			$this->date_formatter->set_date($new_fromDate, $new_toDate);
			$date_period = $this->date_formatter->format();

			$html = $this->load->view('superbill_management/pdf/' . $types[$type]['html'], $page_data, true);
			$filename = $types[$type]['filename'] . $date_period;

			$this->pdf->page_orientation = 'L';
			$this->pdf->generate($html, $filename);
		}
		else
		{
			redirect('errors/page_not_found');
		}
	}
}
