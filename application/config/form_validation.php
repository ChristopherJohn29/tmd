<?php

$config = array(
    'user_management/profile/save' => array(
        array(
            'field' => 'user_firstname',
            'label' => 'Firstname',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'user_lastname',
            'label' => 'Lastname',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'user_email',
            'label' => 'Email',
            'rules' => 'required|valid_email|max_length[45]|is_unique[user.user_email]',
            'errors' => array(
                'is_unique' => 'This %s already exists.',
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'user_password',
            'label' => 'Password',
            'rules' => 'required|min_length[8]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'confirm_password',
            'label' => 'Confirm Password',
            'rules' => 'required|min_length[8]|matches[user_password]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'user_roleID',
            'label' => 'Role',
            'rules' => 'required',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'user_dateOfBirth',
            'label' => 'Date of Birth',
            'rules' => 'required',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'user_phone',
            'label' => 'Phone',
            'rules' => 'required|max_length[20]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'user_address',
            'label' => 'Address',
            'rules' => 'required|max_length[255]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'user_gender',
            'label' => 'Gender',
            'rules' => 'required|max_length[10]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        )
	),
    'user_management/profile/save_update' => array(
        array(
            'field' => 'user_firstname',
            'label' => 'Firstname',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'user_lastname',
            'label' => 'Lastname',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'user_password',
            'label' => 'Password',
            'rules' => 'required|min_length[8]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'confirm_password',
            'label' => 'Confirm Password',
            'rules' => 'required|min_length[8]|matches[user_password]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'user_roleID',
            'label' => 'Role',
            'rules' => 'required',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'user_dateOfBirth',
            'label' => 'Date of Birth',
            'rules' => 'required',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'user_phone',
            'label' => 'Phone',
            'rules' => 'required|max_length[20]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'user_address',
            'label' => 'Address',
            'rules' => 'required|max_length[255]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'user_gender',
            'label' => 'Gender',
            'rules' => 'required|max_length[10]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        )
    ),
    'authentication/user/verify' => array(
        array(
            'field' => 'user_email',
            'label' => 'Email',
            'rules' => 'required|valid_email|max_length[45]'
        ),
        array(
            'field' => 'user_password',
            'label' => 'Password',
            'rules' => 'required|min_length[8]'
        )
    ),
    'provider_management/profile/save' => array(
        array(
            'field' => 'provider_firstname',
            'label' => 'Firstname',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'provider_lastname',
            'label' => 'Lastname',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'provider_contactNum',
            'label' => 'Contact Number',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'provider_email',
            'label' => 'Email',
            'rules' => 'required|valid_email|max_length[45]|is_unique[provider.provider_email]',
            'errors' => array(
                'is_unique' => 'This %s already exists.',
                'required' => 'This field is requried.'
            )
        ),
        array(
            'field' => 'provider_address',
            'label' => 'Address',
            'rules' => 'required|max_length[255]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'provider_languages',
            'label' => 'Languages',
            'rules' => 'max_length[255]'
        ),
        array(
            'field' => 'provider_areas',
            'label' => 'Areas',
            'rules' => 'max_length[255]'
        ),
        array(
            'field' => 'provider_npi',
            'label' => 'NPI',
            'rules' => 'max_length[45]'
        ),
        array(
            'field' => 'provider_dea',
            'label' => 'DEA',
            'rules' => 'max_length[45]'
        ),
        array(
            'field' => 'provider_license',
            'label' => 'License',
            'rules' => 'max_length[45]'
        ),
        array(
            'field' => 'provider_rate_initialVisit',
            'label' => 'Initial Visit',
            'rules' => 'required|max_length[10]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'provider_rate_followUpVisit',
            'label' => 'Follow up visit',
            'rules' => 'required|max_length[10]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'provider_rate_aw',
            'label' => 'AW',
            'rules' => 'required|max_length[10]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'provider_rate_acp',
            'label' => 'ACP',
            'rules' => 'required|max_length[10]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'provider_rate_noShowPT',
            'label' => 'No Show Patient',
            'rules' => 'required|max_length[10]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'provider_rate_mileage',
            'label' => 'Mileage',
            'rules' => 'required|max_length[10]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'provider_rate_others',
            'label' => 'Others',
            'rules' => 'max_length[10]'
        )
    ),
    'provider_management/profile/save_update' => array(
        array(
            'field' => 'provider_firstname',
            'label' => 'Firstname',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'provider_lastname',
            'label' => 'Lastname',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'provider_contactNum',
            'label' => 'Contact Number',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'provider_address',
            'label' => 'Address',
            'rules' => 'required|max_length[255]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'provider_languages',
            'label' => 'Languages',
            'rules' => 'max_length[255]'
        ),
        array(
            'field' => 'provider_areas',
            'label' => 'Areas',
            'rules' => 'max_length[255]'
        ),
        array(
            'field' => 'provider_npi',
            'label' => 'NPI',
            'rules' => 'max_length[45]'
        ),
        array(
            'field' => 'provider_dea',
            'label' => 'DEA',
            'rules' => 'max_length[45]'
        ),
        array(
            'field' => 'provider_license',
            'label' => 'License',
            'rules' => 'max_length[45]'
        ),
        array(
            'field' => 'provider_rate_initialVisit',
            'label' => 'Initial Visit',
            'rules' => 'required|max_length[10]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'provider_rate_followUpVisit',
            'label' => 'Follow up visit',
            'rules' => 'required|max_length[10]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'provider_rate_aw',
            'label' => 'AW',
            'rules' => 'required|max_length[10]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'provider_rate_acp',
            'label' => 'ACP',
            'rules' => 'required|max_length[10]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'provider_rate_noShowPT',
            'label' => 'No Show Patient',
            'rules' => 'required|max_length[10]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'provider_rate_mileage',
            'label' => 'Mileage',
            'rules' => 'required|max_length[10]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'provider_rate_others',
            'label' => 'Others',
            'rules' => 'max_length[10]',
        )
    ),
    'home_health_care_management/profile/save' => array(
        array(
            'field' => 'hhc_name',
            'label' => 'Name',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'hhc_contact_name',
            'label' => 'Contact Name',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'hhc_phoneNumber',
            'label' => 'Phone Number',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'hhc_faxNumber',
            'label' => 'Fax Number',
            'rules' => 'max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'hhc_email',
            'label' => 'Email',
            'rules' => 'required|valid_email|max_length[45]|is_unique[home_health_care.hhc_email]',
            'errors' => array(
                'is_unique' => 'This %s already exists.',
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'hhc_address',
            'label' => 'Address',
            'rules' => 'required|max_length[255]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        )
    ),
    'home_health_care_management/profile/save_update' => array(
        array(
            'field' => 'hhc_name',
            'label' => 'Name',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'hhc_contact_name',
            'label' => 'Contact Name',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'hhc_phoneNumber',
            'label' => 'Phone Number',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'hhc_faxNumber',
            'label' => 'Fax Number',
            'rules' => 'max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'hhc_address',
            'label' => 'Address',
            'rules' => 'required|max_length[255]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        )
    ),
    'patient_management/profile/save' => array(
        array(
            'field' => 'patient_firstname',
            'label' => 'Firstname',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'patient_lastname',
            'label' => 'Lastname',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'patient_gender',
            'label' => 'Gender',
            'rules' => 'required|max_length[10]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'patient_referralDate',
            'label' => 'Referral Date',
            'rules' => 'required',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'patient_medicareNum',
            'label' => 'Medicare Number',
            'rules' => 'required|max_length[45]|is_unique[patient.patient_medicareNum]',
            'errors' => array(
                'is_unique' => 'This %s already exists.',
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'patient_dateOfBirth',
            'label' => 'Date of Birth',
            'rules' => 'required',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'patient_phoneNum',
            'label' => 'Phone Number',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'patient_address',
            'label' => 'Address',
            'rules' => 'required|max_length[255]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'patient_hhcID',
            'label' => 'Home Health',
            'rules' => 'required',
            'errors' => array(
                'required' => 'This field is required.'
            )
        )
    ),
    'patient_management/profile/save_update' => array(
        array(
            'field' => 'patient_firstname',
            'label' => 'Firstname',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'patient_lastname',
            'label' => 'Lastname',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'patient_gender',
            'label' => 'Gender',
            'rules' => 'required|max_length[10]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'patient_referralDate',
            'label' => 'Referral Date',
            'rules' => 'required',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'patient_dateOfBirth',
            'label' => 'Date of Birth',
            'rules' => 'required',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'patient_phoneNum',
            'label' => 'Phone Number',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'patient_address',
            'label' => 'Address',
            'rules' => 'required|max_length[255]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'patient_hhcID',
            'label' => 'Home Health',
            'rules' => 'required',
            'errors' => array(
                'required' => 'This field is required.'
            )
        )
    ),
    'patient_management/transaction/save' => array(
        array(
            'field' => 'pt_tovID',
            'label' => 'Type of Visit',
            'rules' => 'required',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'pt_providerID',
            'label' => 'Provider',
            'rules' => 'required',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'pt_dateOfService',
            'label' => 'Date of Service',
            'rules' => 'required',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'pt_performed',
            'label' => 'Performed',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'pt_acp',
            'label' => 'ACP',
            'rules' => 'required',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'pt_diabetes',
            'label' => 'Diabetes',
            'rules' => 'required',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'pt_tobacco',
            'label' => 'Tobacco',
            'rules' => 'required',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'pt_tcm',
            'label' => 'TCM',
            'rules' => 'required',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'pt_others',
            'label' => 'Others',
            'rules' => 'max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'pt_icd10_codes',
            'label' => 'ICD-10 Codes',
            'rules' => 'required|max_length[255]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'pt_dateRefEmailed',
            'label' => 'Date Referral Was Emailed',
            'rules' => 'required',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'pt_notes',
            'label' => 'Notes',
            'rules' => 'max_length[255]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        )
    ),
    'patient_management/transaction/save_noShow_cancelled' => array(
        array(
            'field' => 'pt_tovID',
            'label' => 'Type of Visit',
            'rules' => 'required',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'pt_providerID',
            'label' => 'Provider',
            'rules' => 'required',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'pt_dateOfService',
            'label' => 'Date of Service',
            'rules' => 'required',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'pt_notes',
            'label' => 'Notes',
            'rules' => 'max_length[255]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        )
    ),
    'patient_management/communication_notes/save' => array(
        array(
            'field' => 'ptcn_message',
            'label' => 'Message',
            'rules' => 'required|max_length[255]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        )
    ),
    'patient_management/cpo/save' => array(
        array(
            'field' => 'ptcpo_period',
            'label' => 'Certification Period',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'ptcpo_dateSigned',
            'label' => '485 Date Signed',
            'rules' => 'required',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'ptcpo_firstMonthCPO',
            'label' => '1st Month CPO',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'ptcpo_secondMonthCPO',
            'label' => '2st Month CPO',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        ),
        array(
            'field' => 'ptcpo_thirdMonthCPO',
            'label' => '3st Month CPO',
            'rules' => 'required|max_length[45]',
            'errors' => array(
                'required' => 'This field is required.'
            )
        )
    )
);