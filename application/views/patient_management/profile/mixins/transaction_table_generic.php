<div class="table-responsive">
    <table class="table no-margin table-hover">
        <thead>
            <tr>
                <th>Intake Received</th>
                <th>Date of Service</th>
                
                <th>Time of Visit</th>
                <th>Provider</th>
                <th>Supervising MD</th>
                
                <th>MSP</th>
                <th>AW/IPPE</th>
                <th>Performed</th>
                <th width="110px">AW Billed</th>
            </tr>

        </thead>

        <tbody>
            <tr>
            <td>{{ transaction.get_date_format(transaction.pt_dateRef) }}</td>
            <td>{{ transaction.get_date_format(transaction.pt_dateOfService) }}</td>
            
            <td>{{ transaction.prsl_fromTime|date('h:ia') }} - {{ transaction.prsl_toTime|date('h:ia')  }}</td>
                <td>{{ transaction.get_provider_fullname() }}</td>
                <td>{{ transaction.supervisingMD_firstname ~ ' ' ~ transaction.supervisingMD_lastname }}</td>
                <td>{{ transaction.msp == 'yes' ? 'Yes' : 'No' }}</td>
                <td>{{ transaction.pt_aw_ippe_code ? transaction.pt_aw_ippe_code : 'None' }}</td>
                <td>{{ transaction.get_selected_choice_format(transaction.pt_performed) }}</td>
                <td><span class="text-red"><strong>{{ transaction.get_date_format(transaction.pt_aw_billed) }}</strong></span></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="table-responsive">
    <table class="table no-margin table-hover">
        <thead>
            <tr>
                <th style="width: 20%;">Reason for Visit</th>
                <th>ACP</th>
                <th>DM</th>
                <th>HTN</th>
                <th>Tobacco</th>
                <th>Status</th>
                <th>Date Referral was Emailed</th>
                <th width="110px">Visits Billed</th>
            </tr>
        </thead>

        <tbody>
            <tr>
            <td>{{ transaction.pt_reasonForVisit }}</td>
                <td>{{ transaction.get_selected_choice_format(transaction.pt_acp) }}</td>
                <td>{{ transaction.get_selected_choice_format(transaction.pt_diabetes) }}</td>
                <td>{{ transaction.get_selected_choice_format(transaction.pt_hypertension) }}</td>
                <td>{{ transaction.get_selected_choice_format(transaction.pt_tobacco) }}</td>
                <td>{{ transaction.get_selected_status(transaction.pt_status) }}</td>
                <td>{{ transaction.get_date_format(transaction.pt_dateRefEmailed) }}</td>
                <td><span class="text-red"><strong>{{ transaction.get_date_format(transaction.pt_visitBilled) }}</strong></span></td>
            </tr>
        </tbody>

    </table>
</div>


<div class="table-responsive">
    <table class="table no-margin table-hover">
        <thead>
            <tr>
                <th style="width: 20%;">Home Health</th>
                <th style="width: 35%;">ICD-Code Diagnoses</th>
                <th style="width: 45%;">Download File</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>{{ transaction.hhc_name }}</td>
                
                <td>{{ transaction.pt_icd10_codes }}</td>
                <th>

                    {% if transaction.transaction_file %}


                    {% set datas = transaction.transaction_file|split(',') %}
                    {% for data in datas|slice(0, 5) %}



                    <a style="color:#0531ee" style="display: block;" href="../../../uploads/{{ data|replace({'"': ''})|replace({'[': ''})|replace({']': ''}) }}" target="_blank">{{ data|replace({'"': ''})|replace({'[': ''})|replace({']': ''}) }}</a><br>

                    {% endfor %}





                    {% else %}
                    No File to download
                    {% endif %}

                </th>
            </tr>
        </tbody>

    </table>
</div>