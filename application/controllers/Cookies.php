<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cookies extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'authentication/user_model',
		));
	}

    public function index(){

        $this->check_permission('cookie_restriction');

        $page_data['records'] = $this->user_model->fetchCookies();
        
        $this->twig->view('cookie/list', $page_data);
		
	}


    public function edit(int $id = 0){

        $this->check_permission('cookie_restriction');

        $record = $this->user_model->fetchCookieDetails($id);

        if(isset($record[0])){

            $page_data['record'] = $record[0];

            $this->twig->view('cookie/edit', $page_data);

        } else {
            show_404();
        }


    }

    public function save(string $page_type, int $id = 0){

        $this->check_permission('cookie_restriction');

        if ($page_type == 'edit') {
            $this->user_model->updateCookie($id);
        } else {
            $this->user_model->addCookie();
        }

        $this->session->set_flashdata('success', $this->lang->line('success_save'));

        return redirect('cookies');
    }


}