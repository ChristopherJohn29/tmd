<?php

class CI_Controller {
	public $acl = null;
	public $session = null;
	public $load = null;
	public $form_validation = null;
	public $lang = null;
	public $sample_model = null;

	public function __construct()
	{
	}

	public function add()
	{
		return 'add page';
	}

	public function edit()
	{
		return 'edit page';
	}
}