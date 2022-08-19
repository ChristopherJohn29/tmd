<div class="table-responsive">
    <table class="table no-margin table-hover">
        <thead>
            <tr>
                <th style="width: 10%;">Provider</th>
                <th style="width: 10%;">Date of Service</th>
                <th style="width: 70%;">Note</th>
                <th style="width: 10%;">Added by User</th>
            </tr>

        </thead>

        <tbody>
            <tr>
                <td style="width: 10%;">{{ transaction.get_provider_fullname() }}</td>
                <td style="width: 10%;">{{ transaction.get_date_format(transaction.pt_dateOfService) }}</td>
                <td style="width: 70%;">{{ transaction.pt_notes }}</td>
                <td style="width: 10%;">{{ transaction.user_firstname ~ ' ' ~ transaction.user_lastname }} </td>
            </tr>
        </tbody>
    </table>
</div>
