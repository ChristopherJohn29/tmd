<div class="table-responsive">
    <table class="table no-margin table-hover">
        <thead>
            <tr>
                <th>Provider</th>
                <th>Supervising MD</th>
                <th>Date of Service</th>
                <th>ICD-Code Diagnoses</th>
                <th>View File</th>
                <th width="110px">Visits Billed</th>
            </tr>

        </thead>

        <tbody>
            <tr>
            <td>{{ transaction.get_provider_fullname() }}</td>
            <td>{{ transaction.supervisingMD_firstname ~ ' ' ~ transaction.supervisingMD_lastname }}</td>
            <td>{{ transaction.get_date_format(transaction.pt_dateOfService) }}</td>
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
            


                <td><span class="text-red"><strong>{{ transaction.get_date_format(transaction.pt_visitBilled) }}</strong></span></td>
              
            </tr>
        </tbody>
    </table>
</div>
