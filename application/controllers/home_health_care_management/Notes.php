<?php

class Notes extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'home_health_care_management/profile_model',
			'home_health_care_management/notes_model'
		));
	}

	public function add(string $hhc_id)
	{
		$page_data['hhc_id'] = $hhc_id;
		
		$params = [
			'key' => 'hhc_id',
        	'value' => $hhc_id
		];

		$page_data['record'] = $this->profile_model->record($params);

		$this->twig->view('home_health_care_management/notes/add', $page_data);
	}

	public function edit(string $hhc_id, string $hhcn_id)
	{
		$params = [
			'key' => 'hhc_id',
        	'value' => $hhc_id
		];

		$page_data['profile'] = $this->profile_model->record($params);

		$params = [
			'key' => 'hhcn_id',
        	'value' => $hhcn_id
		];

		$page_data['record'] = $this->notes_model->record($params);

		if ( ! $page_data['record'])
		{
			redirect('errors/page_not_found');
        }
        
        $page_data['hhc_id'] = $hhc_id;
        $page_data['hhcn_id'] = $hhcn_id;

		$this->twig->view('home_health_care_management/notes/edit', $page_data);
	}

	public function save(string $formtype, string $hhc_id = '', string $hhcn_id = '')
	{
		$params = [
			'record_id' => $hhc_id,
			'table_key' => 'hhcn_id',
			'save_model' => 'notes_model',
			'redirect_url' => 'home_health_care_management/profile/details/' . $hhc_id,
			'validation_group' => 'home_health_care_management/notes/save',
			'page_type' => $formtype,
			'sub_data_id' => $hhcn_id
		];

		$log = [];
		if ($formtype == 'edit') {
			$log = ['description' => 'Updates a home health care notes record.'];
		} else {
			$log = ['description' => 'Added a new home health care notes record.'];
		}

		parent::save_sub_data($params, false);

		$lastRecordID = $formtype == 'edit' ? $hhcn_id : $this->db->insert_id();

		if ($this->session->userdata('user_roleID') != '1') {
            $this->logs_model->insert([
                'data' => [
                    'user_log_userID' => $this->session->userdata('user_id'),
                    'user_log_time' => date('H:m:s'),
                    'user_log_date' => date('Y-m-d'),
                    'user_log_description' => $log['description'],
                    'user_log_link' => 'home_health_care_management/notes/edit/'.$hhc_id.'/'.$lastRecordID
                ]
            ]);
        }		

		return redirect($params['redirect_url']); 
    }
}