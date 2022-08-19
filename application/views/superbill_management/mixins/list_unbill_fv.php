<table id="all-patient-list" class="table no-margin table-hover">
    <thead>
        <tr>
            <th>Superbill</th>
            <th class="text-center">Date Billed</th>
            <th class="text-center">Total</th>
            <th width="70px">Action</th>
        </tr>
    </thead>

    <tbody>
       
           

            {% for key, sum in summary %}
            <tr>
            <td>Facility Visits</td>
            <td class="text-center">{{ key }}</td>
            <td class="text-center">{{ sum }}</td>  
            <td><a target="_blank" href="{{ site_url("superbill_management/superbill/details_unbill/#{ table_name_page }/#{ key|replace({'/': '_'}) }") }}"><span class="label label-primary">View</span></a></td>
            </tr>
            {% endfor %}

            

     
    </tbody>
</table>