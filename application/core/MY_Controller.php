<?php

namespace Mobiledrs\core;

require_once(APPPATH . 'entities/Entity.php');
require_once(APPPATH . 'entities/authentication/User_entity.php');

class MY_Controller extends \CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->is_logged_in();

		$this->load->library(array(
			'acl',
			'twig',
            'form_validation'
		));

        $this->load->model('user_management/logs_model');

        $this->form_validation->set_error_delimiters('', '');
	}

	public function is_logged_in()
	{
        $this->load->model('authentication/user_model');


        $cookie_name = "computer_cookie";
        
        if(!isset($_COOKIE[$cookie_name])) {
           redirect('Cookie/generate_cookie');
        } else {

		
			$result = $this->user_model->checkCookie($_COOKIE[$cookie_name]);

			if(empty($result)) {
				redirect('Cookie/generate_cookie');
			}
  
        }

        $user_params = [
            'key' => 'user.user_id',
            'value' => $this->session->userdata('user_id')
        ];

        $user_entity = $this->user_model->record($user_params);

		if ( ! isset($user_entity) || $user_entity->not_valid_sessionID(session_id())) 
		{
			return redirect('authentication/user/logout');
		}
	}

	public function check_permission(string $permission_name)
	{
		if ( ! $this->acl->has_permission($this->session->userdata('user_roleID'), $permission_name))
		{
			return redirect('errors/access_denied');
		}
	}

	public function save_data(array $params, $redirect = true)
	{
		if ($this->form_validation->run($params['validation_group']) == FALSE)
        {
			return ( ! empty($params['record_id'])) ? $this->edit($params['record_id']) : $this->add();
        }

        $save = null;

        if ( ! empty($params['record_id']))
        {
        	$save = $this->{$params['save_model']}->update([
        		'data' => $this->{$params['save_model']}->prepare_data(),
        		'key' => $params['table_key'],
	        	'value' => $params['record_id']
        	]);
        }
        else
        {
        	$save = $this->{$params['save_model']}->insert([
        		'data' => $this->{$params['save_model']}->prepare_data()]
        	);
        }

        if ($save) 
        {
        	$this->session->set_flashdata('success', $this->lang->line('success_save'));
        } 
        else 
        {
        	$this->session->set_flashdata('danger', $this->lang->line('danger_save'));
        }

        if (isset($params['redirect_url']) && $redirect)
        {
            return redirect($params['redirect_url']);
        }

        if (isset($params['redirect_url_details']) && $redirect) 
        {
            $recordID = ( ! empty($params['record_id'])) ? $params['record_id'] : $save;
            $redirect_url = $params['redirect_url_details'] . $recordID;

            return redirect($redirect_url);   
        }
	}

	public function save_sub_data(array $params, $redirect = true)
	{
		if ($this->form_validation->run($params['validation_group']) == FALSE)
        {
            return ($params['page_type'] == 'edit') ?
                $this->edit($params['record_id'], $params['sub_data_id']) :
                $this->add($params['record_id']);
        }

        $save = null;

        if ($params['page_type'] == 'edit')
        {
        	$save = $this->{$params['save_model']}->update([
        		'data' => $this->{$params['save_model']}->prepare_data(),
        		'key' => $params['table_key'],
	        	'value' => $params['sub_data_id']
        	]);
        }
        else
        {
        	$save = $this->{$params['save_model']}->insert([
        		'data' => $this->{$params['save_model']}->prepare_data()]
        	);
        }

        if ($save) 
        {
        	$this->session->set_flashdata('success', $this->lang->line('success_save'));
        } 
        else 
        {
        	$this->session->set_flashdata('danger', $this->lang->line('danger_save'));
        }

        if ($redirect) {
            return redirect($params['redirect_url']);
        }
	}

    public function make_paid(array $params)
    {
        $save = $this->{$params['model']}->make_paid($params);

        if ($save) 
        {
            $this->session->set_flashdata('success', $this->lang->line('success_save'));
        } 
        else 
        {
            $this->session->set_flashdata('danger', $this->lang->line('danger_save'));
        }

        return redirect($params['redirect_url']);
    }


    public function make_unpaid(array $params)
    {
        $save = $this->{$params['model']}->make_unpaid($params);

        if ($save) 
        {
            $this->session->set_flashdata('success', $this->lang->line('success_save'));
        } 
        else 
        {
            $this->session->set_flashdata('danger', $this->lang->line('danger_save'));
        }

        return redirect($params['redirect_url']);
    }
}