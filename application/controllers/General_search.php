<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_search extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->library('twig');
		$this->load->model('general_search/Search_model');
	}

	public function index()
	{
		$search_entity = new \Mobiledrs\entities\general_search\Search_entity();
		$search_entity->set_result($this->Search_model->search());
		$search_entity->set_searchTerm($this->input->post('q'));

		$page_data['results'] = $search_entity->format_display();
		$page_data['total'] = count($page_data['results']);
		$page_data['searchTerm'] = $this->input->post('q');

		$this->twig->view('general_search/list', $page_data);
	}
}
