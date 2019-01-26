<div class="table-responsive">
    <table class="table no-margin table-hover">
        <thead>
            <tr>
                <th>Provider</th>
                <th>Date of Service</th>
                <th>Note</th>
            </tr>

        </thead>

        <tbody>
            <tr>
                <td>{{ transaction.get_provider_fullname() }}</td>
                <td>{{ transaction.get_date_format(transaction.pt_dateOfService) }}</td>
                <td>{{ transaction.pt_notes }}</td>
            </tr>
        </tbody>
    </table>
</div>
