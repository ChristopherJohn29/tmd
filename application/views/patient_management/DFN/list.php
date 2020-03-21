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
                <a href="{{ site_url("patient_management/DFN/print/#{ year }/#{ month }/#{ fromDate }/#{ toDate }") }}" target="_blank"><span class="btn btn-primary btn-sm">Print</span></a>
                <a href="{{ site_url("patient_management/DFN/pdf/#{ year }/#{ month }/#{ fromDate }/#{ toDate }") }}"><span class="btn btn-primary btn-sm">Generate PDF</span></a>
            </div>
        </div>

        
        <table id="dfn-list" class="table no-margin table-hover">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Date Referral was Emailed</th>
                    <th>Home Health</th>
                    <th>Contact Person</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                {% for record in records %}

                    <tr>
                        <td>{{ record['patientName'] }}</td>
                        <td>{{ record['dfe'] }}</td>
                        <td>{{ record['homeHealth'] }}</td>
                        <td>{{ record['contactPerson'] }}</td>
                        <td>{{ record['phone'] }}</td>
                        <td width="80px">
                            <a target="_blank" href="{{ site_url("patient_management/profile/details/#{ record['patient_id'] }") }}" title=""><span class="label label-primary">View</span></a>
                        </td>
                    </tr>

                {% endfor %}

            </tbody>
        </table>
    </div>
</div>