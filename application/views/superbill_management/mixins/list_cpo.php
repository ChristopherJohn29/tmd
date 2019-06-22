<table id="all-patient-list" class="table no-margin table-hover">
    <thead>
        <tr>
            <th>Superbill</th>
            <th class="text-center">G0180</th>
            <th class="text-center">G0181</th>
            <th class="text-center">G0181</th>
            <th class="text-center">G0181</th>
            <th class="text-center">G0179</th>
            <th class="text-center">G0181</th>
            <th class="text-center">G0181</th>
            <th class="text-center">G0181</th>
            <th class="text-center">Total</th>
            <th width="70px">Action</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>CPO-485</td>
            <td class="text-center">{{ summary['certification'] }}</td>
            <td class="text-center">{{ summary['first_Month_CPO'] }}</td>
            <td class="text-center">{{ summary['second_Month_CPO'] }}</td>
            <td class="text-center">{{ summary['third_Month_CPO'] }}</td>
            <td class="text-center">{{ summary['recertification'] }}</td>
            <td class="text-center">{{ summary['Refirst_Month_CPO'] }}</td>
            <td class="text-center">{{ summary['Resecond_Month_CPO'] }}</td>
            <td class="text-center">{{ summary['Rethird_Month_CPO'] }}</td>
            <td class="text-center">{{ summary['total'] }}</td>
            <td><a target="_blank" href="{{ site_url("superbill_management/superbill/details/#{ table_name_page }/#{ fromDate|replace({'/': '_'}) }/#{ toDate|replace({'/': '_'}) }") }}"><span class="label label-primary">View</span></a></td>
        </tr>
    </tbody>
</table>