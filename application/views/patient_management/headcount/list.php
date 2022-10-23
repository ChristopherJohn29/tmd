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
                <a href="{{ site_url("patient_management/headcount/print/#{ type }/#{ month }/#{ tomonth }/#{ fromDate }/#{ toDate }/#{ year }") }}" target="_blank"><span class="btn btn-primary btn-sm">Print</span></a>
                <a data-sortBtn href="{{ site_url("patient_management/headcount/pdf/#{ type }/#{ month }/#{ tomonth }/#{ fromDate }/#{ toDate }/#{ year }") }}">
                    <span class="btn btn-primary btn-sm">Generate PDF</span>
                </a>
            </div>
        </div>
        {% endif %}

        <table id="headcount-list" data-sortTable class="table no-margin table-hover">
            <thead>
                <tr>
                    <th data-columnid="1">Patient Name</th>
                    <th data-columnid="2">Provider</th>
                    <th data-columnid="3">Supervising MD</th>
                    <th data-columnid="4">Date of Service</th>
                    <th data-columnid="5">Deductible</th>
                    <th data-columnid="6">Home Health</th>
                    <th data-columnid="7">Paid</th>
                    <th data-columnid="8">AW Billed</th>
                    <th data-columnid="9">Visit Billed</th>

                    {% if (headcounts[0]['cpo_billed'] is defined) %}
                        <th data-columnid="10">CPO Billed</th>
                    {% endif %}

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
                            
                        {% if (headcount['cpo_billed'] is defined) %}
                            <td>{{ headcount['cpo_billed'] }}</td>
                        {% endif %}

                        <td width="80px">
                            <a target="_blank" href="{{ site_url("patient_management/profile/details/#{ headcount['patient_id'] }") }}" title=""><span class="label label-primary">View</span></a>
                        </td>
                    </tr>

                {% endfor %}

            </tbody>
        </table>
    </div>
</div>