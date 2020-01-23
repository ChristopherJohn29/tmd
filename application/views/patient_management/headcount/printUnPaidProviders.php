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
                    <th>Provider Name</th>
                    <th>Total Visits</th>
                    <th>Total Salary</th>
                    <th>Date Paid</th>
                </tr>
            </thead>

            <tbody>

                {% for headcount in headcounts %}

                     <tr>
                        <td>{{ headcount['provider_name'] }}</td>
                        <td>{{ headcount['total_visits'] }}</td>
                        <td>${{ headcount['total_salary'] }}</td>
                        <td><span class="text-red"><strong>{{ headcount['dateBilled'] }}</strong></span></td></td>
                    </tr>

                {% endfor %}

            </tbody>
        </table>
    </div>
</div>

{% endblock %}