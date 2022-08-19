<div class="table-responsive">
    <table class="table no-margin table-hover">
        <thead>
            <tr>
                <th style="width: 10%;">Date Refused</th>
                <th style="width: 80%;">Notes</th>
                <th style="width: 10%;">Added by User</th>
            </tr>

        </thead>

        <tbody>
            <tr>
           
            <td style="width: 10%;">{{ transaction.get_date_format(transaction.pt_dateOfService) }}</td>
            <td style="width: 80%;">{{ transaction.pt_notes }}</td>
            <td style="width: 10%;">{{ transaction.user_firstname ~ ' ' ~ transaction.user_lastname }} </td>
            
            
            </tr>
        </tbody>
    </table>
</div>
