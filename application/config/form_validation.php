<?php

$config = array(
    'user_management/profile/save' => array(
        array(
            'field' => 'user_firstname',
            'label' => 'Firstname',
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
            'rules' => 'required|valid_email|max_length[45]|is_unique[user.user_email]',
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
        ),
        array(
            'field' => 'user_contactNum',
            'label' => 'Role',
            'rules' => 'required|max_length[45]'
        )
	),
    'authentication/user/verify' => array(
        array(
            'field' => 'user_email',
            'label' => 'Email',
            'rules' => 'required|valid_email|max_length[45]'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[8]|max_length[16]'
        )
    ),
    'provider_management/profile/save' => array(
        array(
            'field' => 'provider_firstname',
            'label' => 'Firstname',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'provider_lastname',
            'label' => 'Lastname',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'provider_contactNum',
            'label' => 'Contact Number',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'provider_email',
            'label' => 'Email',
            'rules' => 'required|valid_email|max_length[45]'
        ),
        array(
            'field' => 'provider_address',
            'label' => 'Address',
            'rules' => 'required|max_length[255]'
        ),
        array(
            'field' => 'provider_dateOfBirth',
            'label' => 'Date of Birth',
            'rules' => 'required'
        ),
        array(
            'field' => 'provider_languages',
            'label' => 'Languages',
            'rules' => 'required|max_length[255]'
        ),
        array(
            'field' => 'provider_areas',
            'label' => 'Areas',
            'rules' => 'required|max_length[255]'
        ),
        array(
            'field' => 'provider_npi',
            'label' => 'NPI',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'provider_dea',
            'label' => 'DEA',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'provider_license',
            'label' => 'License',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'provider_rate_initialVisit',
            'label' => 'Initial Visit',
            'rules' => 'required'
        ),
        array(
            'field' => 'provider_rate_followUpVisit',
            'label' => 'Follow up visit',
            'rules' => 'required|max_length[10]'
        ),
        array(
            'field' => 'provider_rate_aw',
            'label' => 'AW',
            'rules' => 'required|max_length[10]'
        ),
        array(
            'field' => 'provider_rate_acp',
            'label' => 'ACP',
            'rules' => 'required|max_length[10]'
        ),
        array(
            'field' => 'provider_rate_noShowPT',
            'label' => 'No Show Patient',
            'rules' => 'required|max_length[10]'
        ),
        array(
            'field' => 'provider_rate_others',
            'label' => 'Others',
            'rules' => 'required|max_length[10]'
        ),
        array(
            'field' => 'provider_rate_mileage',
            'label' => 'Mileage',
            'rules' => 'required|max_length[10]'
        )
    ),
    'home_health_care_management/profile/save' => array(
        array(
            'field' => 'hhc_name',
            'label' => 'Firstname',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'hhc_contact_name',
            'label' => 'Firstname',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'hhc_phoneNumber',
            'label' => 'Firstname',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'hhc_faxNumber',
            'label' => 'Firstname',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'hhc_email',
            'label' => 'Firstname',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'hhc_address',
            'label' => 'Firstname',
            'rules' => 'required|max_length[255]'
        )
    ),
    'patient_management/profile/save' => array(
        array(
            'field' => 'patient_firstname',
            'label' => 'Firstname',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'patient_lastname',
            'label' => 'Lastname',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'patient_sex',
            'label' => 'Sex',
            'rules' => 'required|max_length[2]'
        ),
        array(
            'field' => 'patient_referralDate',
            'label' => 'Referral Date',
            'rules' => 'required'
        ),
        array(
            'field' => 'patient_medicareNum',
            'label' => 'Medicare Number',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'patient_dateOfBirth',
            'label' => 'Date of Birth',
            'rules' => 'required'
        ),
        array(
            'field' => 'patient_phoneNum',
            'label' => 'Phone Number',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'patient_address',
            'label' => 'Address',
            'rules' => 'required|max_length[255]'
        ),
        array(
            'field' => 'patient_hhcID',
            'label' => 'Firstname',
            'rules' => 'required|integer'
        )
    )
);