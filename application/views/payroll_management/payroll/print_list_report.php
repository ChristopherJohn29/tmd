{% extends "basic.php" %}

{% set page_title = 'Print REPORT GENERATION PER PROVIDER' %}
{% set body_class = 'print' %}

{% block content %}
    
<script type="text/javascript">
	window.print();
</script>

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
        </div>
        {% endif %}


        <table id="all-patient-list" class="table no-margin table-hover">
            <thead>
                <tr>
                    <th>Provider Name</th>
                    <th>Total {{ results[0]['tov_name'] }}</th>
                    <th>Total </th>
                    <th>Date Paid</th>
                </tr>
            </thead>

            <tbody>

                {% for result in results %}

                    <tr>
                        <td>{{ result['provider_name'] }}</td>
                        <td>{{ result['total_visits'] }}</td>
                        <td>${{ result['total_salary']|number_format(2) }}</td>
                        <td><span class="text-red"><strong>{{ result['dateBilled'] }}</strong></span></td>
                    </tr>

                {% endfor %}

            </tbody>
        </table>
    </div>
</div>


{% endblock %}