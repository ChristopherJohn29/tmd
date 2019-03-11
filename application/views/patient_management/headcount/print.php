{% extends "basic.php" %}

{% set page_title = 'Print Headcount' %}
{% set body_class = 'print' %}

{% block content %}
    
<script type="text/javascript">
	window.print();
</script>

<div class="box-body">
    <div class="table-responsive">

        {% if headcounts_total %}

            <p style="font-size: 1.5em;"><strong>Total: </strong> {{ headcounts_total }}</p>    

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
                    </tr>

                {% endfor %}

            </tbody>
        </table>
    </div>
</div>

{% endblock %}