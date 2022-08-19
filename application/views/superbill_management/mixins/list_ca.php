<table id="all-patient-list" class="table no-margin table-hover">
    <thead>
        <tr>
            <th>Superbill</th>
            <th class="text-center">99483</th>
            <th class="text-center">99483</th>
            <th class="text-center">Total</th>
            <th width="70px">Action</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>Cognitive Visits</td>
            <td class="text-center">{{ summary['COGNITIVE_HOME'] }}</td>
            <td class="text-center">{{ summary['COGNITIVE_TELEHEALTH'] }}</td>
            <td class="text-center">{{ summary['total'] }}</td>
            <td><a target="_blank" href="{{ site_url("superbill_management/superbill/details/#{ table_name_page }/#{ fromDate|replace({'/': '_'}) }/#{ toDate|replace({'/': '_'}) }") }}"><span class="label label-primary">View</span></a></td>
        </tr>
    </tbody>
</table>