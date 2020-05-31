<div class="table-responsive">
    <table class="table no-margin table-hover">
        <thead>
            <tr>
                <th>Provider</th>
                <th>Supervising MD</th>
                <th>Date of Service</th>
                <th>Deductible</th>
                <th>AW/IPPE</th>
                <th>Performed</th>
                <th>AW/IPPE Date</th>
                <th width="110px">AW Billed</th>
            </tr>

        </thead>

        <tbody>
            <tr>
                <td>{{ transaction.get_provider_fullname() }}</td>
                <td>{{ transaction.supervisingMD_firstname ~ ' ' ~ transaction.supervisingMD_lastname }}</td>
                <td>{{ transaction.get_date_format(transaction.pt_dateOfService) }}</td>
                <td>{{ transaction.pt_deductible }}</td>
                <td>{{ transaction.pt_aw_ippe_code }}</td>
                <td>{{ transaction.get_selected_choice_format(transaction.pt_performed) }}</td>
                <td>{{ transaction.get_date_format(transaction.pt_aw_ippe_date) }}</td>
                <td><span class="text-red"><strong>{{ transaction.get_date_format(transaction.pt_aw_billed) }}</strong></span></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="table-responsive">
    <table class="table no-margin table-hover">
        <thead>
            <tr>
                <th>ACP</th>
                <th>Diabetes</th>
                <th>Tobacco</th>
                <th>Status</th>
                <th>ICD-Code Diagnoses</th>
                <th>Intake Received</th>
                <th>Date Referral was Emailed</th>
                <th width="110px">Visits Billed</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>{{ transaction.get_selected_choice_format(transaction.pt_acp) }}</td>
                <td>{{ transaction.get_selected_choice_format(transaction.pt_diabetes) }}</td>
                <td>{{ transaction.get_selected_choice_format(transaction.pt_tobacco) }}</td>
                <td>{{ transaction.get_selected_status(transaction.pt_status) }}</td>
                <td>{{ transaction.pt_icd10_codes }}</td>
                <td>{{ transaction.get_date_format(transaction.pt_dateRef) }}</td>
                <td>{{ transaction.get_date_format(transaction.pt_dateRefEmailed) }}</td>
                <td><span class="text-red"><strong>{{ transaction.get_date_format(transaction.pt_visitBilled) }}</strong></span></td>
            </tr>
        </tbody>

    </table>
</div>