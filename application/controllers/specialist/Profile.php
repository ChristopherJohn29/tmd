<?php

class Profile extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'specialist/profile_model'
		));
	}

	public function index(string $highlight = '')
	{
	
		$params = [
			'table_key' => 'date_created',
			'order_type' => 'DESC'
		];

		$page_data['highlight'] = $highlight;
		$page_data['records'] = $this->profile_model->records($params);
		$page_data['total'] = count($page_data['records']);

		$this->twig->view('specialist/profile/list', $page_data);
	}

	public function add()
	{


		$this->twig->view('specialist/profile/add');
	}

	public function edit(string $id)
	{


		$params = [
			'key' => 'id',
        	'value' => $id
		];

		$page_data['record'] = $this->profile_model->record($params);

		if ( ! $page_data['record'])
		{
			redirect('errors/page_not_found');
		}

		$this->twig->view('specialist/profile/edit', $page_data);
	}

	public function save(string $formtype, string $id = '')
	{


		// only check for duplicate emails when the email field has been changed
		$validation_group = '';
		if ($formtype == 'edit')
		{
			$params = [
				'key' => 'id',
	        	'value' => $id
			];

			$specialist = $this->profile_model->record($params);

			if ( ! $specialist)
			{
				redirect('errors/page_not_found');
			}

			$validation_group = 'specialist/profile/save';

		}
		else
		{

			$validation_group = 'specialist/profile/save';

		}



		$params = [
			'record_id' => $id,
			'table_key' => 'id',
			'save_model' => 'profile_model',
			'redirect_url_details' => 'specialist/profile/details/',
			'validation_group' => $validation_group
		];


		parent::save_data($params);
	}

	public function search()
	{

		$page_data = [];

		if ( ! empty($this->input->post('id')))
		{
			$page_data['records'] = $this->profile_model->search();
			$page_data['total'] = count($page_data['records']);
		}

		$this->twig->view('specialist/profile/search', $page_data);
	}

	public function details($id)
	{
		$params = [
			'key' => 'id',
        	'value' => $id
		];

		$page_data['record'] = $this->profile_model->record($params);

		if ( ! $page_data['record'])
		{
			redirect('errors/page_not_found');
		}


		$this->twig->view('specialist/profile/details', $page_data);
	}
}