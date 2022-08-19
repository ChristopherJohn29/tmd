<div class="box-body">
    
    <div class="table-responsive">

        {% if headcounts_total %}
        <div class="xrx-tabletop-info">
            <div class="pull-left">
                <p style="font-size: 1.3em; margin-top:5px;">
                    {{ results[0]['tov_name'] }}<br>
                    {{ datePeriod }}<br>
                    Total: {{ headcounts_total }}
                </p>
            </div>
            <div class="pull-right text-right">
                <a href="/payroll_management/payroll/print/{{ fromDate|replace({'/': '_'}) }}/{{ toDate|replace({'/': '_'}) }}/{{ results[0]['pt_tovID'] }}" target="_blank"><span class="btn btn-primary btn-sm">Print</span></a>
                <a data-sortbtn="" href="/payroll_management/payroll/pdf/{{ fromDate|replace({'/': '_'}) }}/{{ toDate|replace({'/': '_'}) }}/{{ results[0]['pt_tovID'] }}">
                    <span class="btn btn-primary btn-sm">Generate PDF</span>
                </a>
            </div>
          
        </div>
        {% endif %}


        <table id="all-patient-list-report" class="table no-margin table-hover">
            <thead>
                <tr>
                    <th>Provider Name</th>
                    <th>Total {{ results[0]['tov_name'] }}</th>
                    <th>Total </th>
                    <th width="60px">Action</th>
                </tr>
            </thead>

            <tbody>

                {% for result in results %}

                    <tr>
                        <td>{{ result['provider_name'] }}</td>
                        <td>{{ result['total_visits'] }}</td>
                        <td>${{ result['total_salary']|number_format(2) }}</td>
                        <td><a target="_blank" href="{{ site_url("payroll_management/payroll/detailsReport/#{ result['provider_id'] }/#{ fromDate|replace({'/': '_'}) }/#{ toDate|replace({'/': '_'}) }/#{ result['pt_tovID'] }") }}"><span class="label label-primary">View</span></a></td>
                    </tr>

                {% endfor %}

            </tbody>
        </table>
    </div>
</div>