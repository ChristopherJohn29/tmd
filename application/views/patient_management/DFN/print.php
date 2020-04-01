{% extends "basic.php" %}

{% set page_title = 'Print Due For 485' %}
{% set body_class = 'print' %}

{% block content %}
    
<script type="text/javascript">
	window.print();
</script>

<div class="box-body">
    <div class="table-responsive">
        <h3 class="box-title">Due For 485</h3><br>

        <p>
            Date: {{ currentDate }}<br>
            Total: {{ total }}
        </p>

        <table id="headcount-list" class="table no-margin table-hover">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Date Referral was Emailed</th>
                    <th>Home Health</th>
                    <th>Contact Person</th>
                    <th>Phone</th>
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
                    </tr>

                {% endfor %}

            </tbody>
        </table>
    </div>
</div>

{% endblock %}