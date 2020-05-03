<table id="all-patient-list" class="table no-margin table-hover">
    <thead>
        <tr>
            <th>Superbill</th>
            <th class="text-center">99345</th>
            <th class="text-center">99350</th>
            <th class="text-center">G0402</th>
            <th class="text-center">G0438</th>
            <th class="text-center">G0439</th>
            <th class="text-center">Total</th>
            <th width="70px">Action</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>TeleHealth Visits</td>
            <td class="text-center">{{ summary['INITIAL_VISIT_TELEHEALTH'] }}</td>
            <td class="text-center">{{ summary['FOLLOW_UP_TELEHEALTH'] }}</td>
            <td class="text-center">{{ summary['AW_CODES_G0402'] }}</td>
            <td class="text-center">{{ summary['AW_CODE_G0438'] }}</td>
            <td class="text-center">{{ summary['AW_CODE_G0439'] }}</td>
            <td class="text-center">{{ summary['total'] }}</td>
            <td><a target="_blank" href="{{ site_url("superbill_management/superbill/details/#{ table_name_page }/#{ fromDate|replace({'/': '_'}) }/#{ toDate|replace({'/': '_'}) }") }}"><span class="label label-primary">View</span></a></td>
        </tr>
    </tbody>
</table>