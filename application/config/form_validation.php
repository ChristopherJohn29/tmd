<?php

$config = array(
    'user_management/profile/save' => array(
        array(
            'field' => 'user_firstname',
            'label' => 'Firstname',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'user_middlename',
            'label' => 'Middlename',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'user_lastname',
            'label' => 'Lastname',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'user_email',
            'label' => 'Email',
            'rules' => 'required|valid_emails|max_length[45]|is_unique[user.user_email]',
            'errors' => array(
                'is_unique' => 'This %s already exists.'
            )
        ),
        array(
            'field' => 'user_address',
            'label' => 'Address',
            'rules' => 'required|max_length[255]'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[8]|max_length[16]'
        ),
        array(
            'field' => 'confirm_password',
            'label' => 'Confirm Password',
            'rules' => 'required|min_length[8]|max_length[16]|matches[password]'
        ),
        array(
            'field' => 'user_roleID',
            'label' => 'Role',
            'rules' => 'required|integer'
        )
	)
);