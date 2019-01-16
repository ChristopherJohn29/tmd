<div class="table-responsive">
    <table class="table no-margin table-hover">
        <thead>
            <tr>
                <th>Provider</th>
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
                <td>{{ transaction.get_date_format(transaction.pt_dateOfService) }}</td>
                <td>{{ transaction.pt_deductible }}</td>
                <td>{{ transaction.pt_aw_ippe_code }}</td>
                <td>{{ transaction.get_selected_choice_format(transaction.pt_performed) }}</td>
                <td>{{ transaction.get_date_format(transaction.pt_aw_ippe_date) }}</td>
                <td></td>
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
                <th>TCM</th>
                <th>Others</th>
                <th>ICD-Code Diagnoses</th>
                <th>Referral Date</th>
                <th>Date Referral was Emailed</th>
                <th width="110px">Visits Billed</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td>{{ transaction.get_selected_choice_format(transaction.pt_acp) }}</td>
                <td>{{ transaction.get_selected_choice_format(transaction.pt_diabetes) }}</td>
                <td>{{ transaction.get_selected_choice_format(transaction.pt_tobacco) }}</td>
                <td>{{ transaction.get_selected_choice_format(transaction.pt_tcm) }}</td>
                <td>{{ transaction.pt_others }}</td>
                <td>{{ transaction.pt_icd10_codes }}</td>
                <td>{{ transaction.get_date_format(transaction.pt_dateRef) }}</td>
                <td>{{ transaction.get_date_format(transaction.pt_dateRefEmailed) }}</td>
                <td>{{ transaction.pt_dateBilled }}</td>
            </tr>
        </tbody>

    </table>
</div>