<div class="box-body">
    <div class="table-responsive">

        {% if headcounts_total %}
            <div class="xrx-tabletop-info">
                <div class="pull-left">
                    <p style="font-size: 1.3em; margin-top:5px;">
                        {{ typeTitle }}<br>
                        {{ datePeriod }}<br>
                        Total: {{ headcounts_total }}
                    </p>
                </div>
                <div class="pull-right text-right">
                    <a href="{{ site_url("patient_management/headcount/print/#{ type }/#{ month }/#{ fromDate }/#{ toDate }/#{ year }") }}" target="_blank"><span class="btn btn-primary btn-sm">Print</span></a>
                <a href="{{ site_url("patient_management/headcount/pdf/#{ type }/#{ month }/#{ fromDate }/#{ toDate }/#{ year }") }}"><span class="btn btn-primary btn-sm">Generate PDF</span></a>
                </div>
            </div>
        {% endif %}

        <table id="headcount-list" class="table no-margin table-hover">
            <thead>
                <tr>
                    <th>Provider Name</th>
                    <th>Total Visits</th>
                    <th>Total Salary</th>
                    <th width="60px">Action</th>
                </tr>
            </thead>

            <tbody>

                {% for headcount in headcounts %}

                    <tr>
                        <td>{{ headcount['provider_name'] }}</td>
                        <td>{{ headcount['total_visits'] }}</td>
                        <td>${{ headcount['total_salary'] }}</td>
                        <td><a target="_blank" href="{{ site_url("payroll_management/payroll/details/#{ headcount['provider_id'] }/#{ newfromDate|replace({'/': '_'}) }/#{ newToDate|replace({'/': '_'}) }") }}"><span class="label label-primary">View</span></a></td>
                    </tr>

                {% endfor %}

            </tbody>
        </table>
    </div>
</div>