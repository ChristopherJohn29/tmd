<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends \Mobiledrs\core\MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->check_permission('logs');

		$page_data['logs'] = [];

		$this->twig->view('user_management/logs', $page_data);
	}
}