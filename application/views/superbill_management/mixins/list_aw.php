{% if summary['total'] > 0 %}

    <table id="all-patient-list" class="table no-margin table-hover">
        <thead>
            <tr>
                <th>Superbill</th>
                <th class="text-center">G0402</th>
                <th class="text-center">G0438</th>
                <th class="text-center">G0439</th>
                <th class="text-center">Total</th>
                <th width="70px">Action</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Annual Wellness</td>
                <td class="text-center">{{ summary['AW_CODES_G0402'] }}</td>
                <td class="text-center">{{ summary['AW_CODE_G0438'] }}</td>
                <td class="text-center">{{ summary['AW_CODE_G0439'] }}</td>
                <td class="text-center">{{ summary['total'] }}</td>
                <td><a target="_blank" href="{{ site_url("superbill_management/superbill/details/#{ table_name_page }/#{ fromDate|replace({'/': '_'}) }/#{ toDate|replace({'/': '_'}) }") }}"><span class="label label-primary">View</span></a></td>
            </tr>
        </tbody>
    </table>

{% else %}

    <div class="no-data-handler">

        <p class="text-center">No search results found.</p>
        
    </div>

{% endif %}