<div class="box-body">
    <div class="table-responsive">

        {% if headcounts_total %}

            <div class="row">
                <div class="col-md-6">
                    <p style="font-size: 1.5em;"><strong>Total: </strong> {{ headcounts_total }}</p>        
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ site_url("patient_management/headcount/print/#{ month }/#{ year }") }}" target="_blank"><span class="label label-primary">Print</span></a>
                    <a href="{{ site_url("patient_management/headcount/pdf/#{ month }/#{ year }") }}"><span class="label label-primary">Generate PDF</span></a>
                </div>
            </div>

        {% endif %}

        <table id="headcount-list" class="table no-margin table-hover">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Provider</th>
                    <th>Date of Service</th>
                    <th>Deductible</th>
                    <th>Home Health</th>
                    <th>Visit Billed</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                {% for headcount in headcounts %}

                    <tr>
                        <td>{{ headcount['patient_name'] }}</td>
                        <td>{{ headcount['provider'] }}</td>
                        <td>{{ headcount['dateOfService'] }}</td>
                        <td>
                            {% if headcount['deductible'] == '$185' %}
                                <span class="text-red"><strong>{{ headcount['deductible'] }}</strong></span>
                            {% else %}
                                {{ headcount['deductible'] }}
                            {% endif %}
                        </td>
                        <td>{{ headcount['home_health'] }}</td>
                        <td>{{ headcount['visit_billed'] }}</td>
                        <td>
                            <a href="{{ site_url("patient_management/profile/details/#{ headcount['patient_id'] }") }}" title=""><span class="label label-primary">View</span></a>
                        </td>
                    </tr>

                {% endfor %}

            </tbody>
        </table>
    </div>
</div>