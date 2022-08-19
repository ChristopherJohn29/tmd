{% extends "basic.php" %}

{% set page_title = 'Print Due For Visits' %}
{% set body_class = 'print' %}

{% block content %}
    -`
<script type="text/javascript">
	window.print();
</script>

<div class="box-body">
    <div class="table-responsive">
        <h3 class="box-title">Due For Lab Orders</h3><br>

        <p>
            Date: {{ currentDate }}<br>
            Total: {{ total }}
        </p>

        <table id="headcount-list" class="table no-margin table-hover">
            <thead>
                <tr>
                     <th>Patient Name</th>
                    <th>Date Lab Orders were sent</th>
                    <th>Orders by</th>
                    <th>Status</th>
                    <th>Added by</th>
            </thead>

            <tbody>

                {% for record in records %}

                    <tr>
                       <td>{{ record['patientName'] }}</td>
                        <td>{{ record['date_referral'] }}</td>
                        <td>{{ record['provider'] }}</td>
                        <td>{{ record['status'] }}</td>
                        <td>{{ record['added_by'] }}</td>
                    </tr>

                {% endfor %}

            </tbody>
        </table>
    </div>
</div>

{% endblock %}