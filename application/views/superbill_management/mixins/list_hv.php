<table id="all-patient-list" class="table no-margin table-hover">
    <thead>
        <tr>
            <th>Superbill</th>
            <th class="text-center">99345</th>
            <th class="text-center">99349</th>
            <th class="text-center">99497</th>
            <th class="text-center">G0108</th>
            <th class="text-center">99407</th>
            <th class="text-center">Total</th>
            <th width="70px">Action</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>Home Visits</td>
            <td class="text-center">{{ summary['INITIAL_VISIT_HOME'] }}</td>
            <td class="text-center">{{ summary['FOLLOW_UP_HOME'] }}</td>
            <td class="text-center">{{ summary['ACP'] }}</td>
            <td class="text-center">{{ summary['DM'] }}</td>
            <td class="text-center">{{ summary['TOBACCO'] }}</td>
            <td class="text-center">{{ summary['total'] }}</td>
            <td><a target="_blank" href="{{ site_url("superbill_management/superbill/details/#{ table_name_page }/#{ fromDate|replace({'/': '_'}) }/#{ toDate|replace({'/': '_'}) }") }}"><span class="label label-primary">View</span></a></td>
        </tr>
    </tbody>
</table>