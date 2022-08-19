<div class="box-body">
    <div class="table-responsive">
        
        <div class="xrx-tabletop-info">
            <div class="pull-left">
                <p style="font-size: 1.3em; margin-top:5px;">
                    Date: {{ currentDate }}<br>
                    Total : {{ total }}
                </p>
            </div>
            <div class="pull-right text-right">
                <a data-sortBtn href="{{ site_url("patient_management/DFLO/print/#{ year }/#{ month }/#{ fromDate }/#{ toDate }") }}" target="_blank"><span class="btn btn-primary btn-sm">Print</span></a>
                <a data-sortBtn href="{{ site_url("patient_management/DFLO/pdf/#{ year }/#{ month }/#{ fromDate }/#{ toDate }") }}"><span class="btn btn-primary btn-sm">Generate PDF</span></a>
            </div>
        </div>

        
        <table data-sortTable id="dflo-list" class="table no-margin table-hover">
            <thead>
                <tr>
                    <th data-columnid="0">Patient Name</th>
                    <th data-columnid="1">Date Lab Orders were sent</th>
                    <th data-columnid="2">Orders by</th>
                    <th data-columnid="3">Status</th>
                    <th data-columnid="4">Added by</th>
                    <th data-columnid="5">Action</th>
                </tr>
            </thead>

            <tbody>

                {% for record in records %}

                    <tr>
                        <td>{{ record['patientName'] }}</td>
                        <td>{{ record['date_referral'] }}</td>
                        <td>{{ record['provider'] }}</td>
                        <td>{{ record['status'] }}</td>
                        <td>{{ record['added_by'] }}</td>
                        <td width="80px">
                            <a target="_blank" href="{{ site_url("patient_management/profile/details/#{ record['patient_id'] }") }}" title=""><span class="label label-primary">View</span></a>
                        </td>
                    </tr>

                {% endfor %}

            </tbody>
        </table>
    </div>
</div>