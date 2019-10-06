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
                    <th>Patient Name</th>
                    <th>Provider</th>
                    <th>Supervising MD</th>
                    <th>Date of Service</th>
                    <th>Deductible</th>
                    <th>Home Health</th>
                    <th>Paid</th>
                    <th>AW Billed</th>
                    <th>Visit Billed</th>
                    <th>CPO Billed</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                {% for headcount in headcounts %}

                    <tr>
                        <td>{{ headcount['patient_name'] }}</td>
                        <td>{{ headcount['provider'] }}</td>
                        <td>{{ headcount['supervisingMD_firstname'] ~ ' ' ~ headcount['supervisingMD_lastname'] }}</td>
                        <td>{{ headcount['dateOfService'] }}</td>
                        <td>
                            {% if headcount['deductible'] starts with '$' %}
                                <span class="text-red"><strong>{{ headcount['deductible'] }}</strong></span>
                            {% else %}
                                {{ headcount['deductible'] }}
                            {% endif %}
                        </td>
                        <td>{{ headcount['home_health'] }}</td>
                        <td>{{ headcount['paid'] }}</td>
                        <td>{{ headcount['aw_billed'] }}</td>
                        <td>{{ headcount['visit_billed'] }}</td>
                        <td>{{ headcount['cpo_billed'] }}</td>
                        <td width="80px">
                            <a target="_blank" href="{{ site_url("patient_management/profile/details/#{ headcount['patient_id'] }") }}" title=""><span class="label label-primary">View</span></a>
                        </td>
                    </tr>

                {% endfor %}

            </tbody>
        </table>
    </div>
</div>