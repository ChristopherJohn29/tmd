<div class="box-body">
    
    <div class="table-responsive">
        <table id="all-patient-list" class="table no-margin table-hover">
            <thead>
                <tr>
                    <th>Provider Name</th>
                    <th>Total Visits</th>
                    <th>Total Salary</th>
                    <th>Date Billed</th>
                    <th width="60px">Action</th>
                </tr>
            </thead>

            <tbody>

                {% for result in results %}

                    <tr>
                        <td>{{ result['provider_name'] }}</td>
                        <td>{{ result['total_visits'] }}</td>
                        <td>${{ result['total_salary'] }}</td>
                        <td><span class="text-red"><strong>{{ result['dateBilled'] }}</strong></span></td>
                        <td><a target="_blank" href="{{ site_url("payroll_management/payroll/details/#{ result['provider_id'] }/#{ fromDate|replace({'/': '_'}) }/#{ toDate|replace({'/': '_'}) }") }}"><span class="label label-primary">View</span></a></td>
                    </tr>

                {% endfor %}

            </tbody>
        </table>
    </div>
</div>