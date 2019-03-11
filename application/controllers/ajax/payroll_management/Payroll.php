<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'core/MY_AJAX_Controller.php');

class Payroll extends \Mobiledrs\core\MY_AJAX_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function compute_others()
	{
		$total =  (float) $this->input->get('total') + (float) $this->input->get('others');

		echo json_encode($total);
	}
}