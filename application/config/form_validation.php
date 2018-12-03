<?php

$config = array(
    'user_management/profile/save/' => array(
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
            'field' => 'user_password',
            'label' => 'Password',
            'rules' => 'required|min_length[8]'
        ),
        array(
            'field' => 'confirm_password',
            'label' => 'Confirm Password',
            'rules' => 'required|min_length[8]|matches[user_password]'
        ),
        array(
            'field' => 'user_roleID',
            'label' => 'Role',
            'rules' => 'required'
        ),
        array(
            'field' => 'user_dateOfBirth',
            'label' => 'Date of Birth',
            'rules' => 'required'
        ),
        array(
            'field' => 'user_phone',
            'label' => 'Phone',
            'rules' => 'required|max_length[20]'
        ),
        array(
            'field' => 'user_address',
            'label' => 'Address',
            'rules' => 'required|max_length[255]'
        ),
        array(
            'field' => 'user_gender',
            'label' => 'Gender',
            'rules' => 'required|max_length[10]'
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
            'rules' => 'required|valid_email|max_length[45]|is_unique[provider.provider_email]',
            'errors' => array(
                'is_unique' => 'This %s already exists.'
            )
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
            'rules' => 'required|max_length[10]'
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
        ),
        array(
            'field' => 'provider_gender',
            'label' => 'Gender',
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
    ),
    'patient_management/transaction/save' => array(
        array(
            'field' => 'pt_tovID',
            'label' => 'Type of Visit',
            'rules' => 'required|integer'
        ),
        array(
            'field' => 'pt_providerID',
            'label' => 'Provider',
            'rules' => 'required|integer'
        ),
        array(
            'field' => 'pt_dateOfService',
            'label' => 'Date of Service',
            'rules' => 'required'
        ),
        array(
            'field' => 'pt_deductible',
            'label' => 'Deductible',
            'rules' => 'required|max_length[10]'
        ),
        array(
            'field' => 'pt_aw_ippe_date',
            'label' => 'AW / IPPE (Date)',
            'rules' => 'required'
        ),
        array(
            'field' => 'pt_aw_ippe_performed',
            'label' => 'Performed',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'pt_acp',
            'label' => 'ACP',
            'rules' => 'required'
        ),
        array(
            'field' => 'pt_diabetes',
            'label' => 'Diabetes',
            'rules' => 'required'
        ),
        array(
            'field' => 'pt_tobacco',
            'label' => 'Tobacco',
            'rules' => 'required'
        ),
        array(
            'field' => 'pt_tcm',
            'label' => 'TCM',
            'rules' => 'required'
        ),
        array(
            'field' => 'pt_others',
            'label' => 'Others',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'pt_icd10_codes',
            'label' => 'ICD-10 Codes',
            'rules' => 'required|max_length[255]'
        ),
        array(
            'field' => 'pt_visitBilled',
            'label' => 'Visit Billed',
            'rules' => 'required'
        ),
        array(
            'field' => 'pt_dateRefEmailed',
            'label' => 'Date Referral Was Emailed',
            'rules' => 'required'
        ),
        array(
            'field' => 'pt_comments',
            'label' => 'Comments',
            'rules' => 'required|max_length[255]'
        )
    ),
    'patient_management/communication_notes/save' => array(
        array(
            'field' => 'ptcn_message',
            'label' => 'Message',
            'rules' => 'required|max_length[255]'
        )
    ),
    'patient_management/cpo/save' => array(
        array(
            'field' => 'ptcpo_period',
            'label' => 'Certification Period',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'ptcpo_dateSigned',
            'label' => '485 Date Signed',
            'rules' => 'required'
        ),
        array(
            'field' => 'ptcpo_firstMonthCPO',
            'label' => '1st Month CPO',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'ptcpo_secondMonthCPO',
            'label' => '2st Month CPO',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'ptcpo_thirdMonthCPO',
            'label' => '3st Month CPO',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'ptcpo_dischargeDate',
            'label' => 'Discharged Date',
            'rules' => 'required'
        ),
        array(
            'field' => 'ptcpo_dateBilled',
            'label' => 'Date Billed',
            'rules' => 'required'
        )
    )
);