<?php

namespace Mobiledrs\core;

class MY_AJAX_Controller extends MY_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->is_ajax_request();
	}

	public function is_ajax_request()
	{
		if ( ! $this->input->is_ajax_request())
		{
			return redirect('errors/access_denied');
		}
	}
}