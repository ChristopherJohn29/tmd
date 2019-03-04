{% extends "main.php" %}

{% set page_title = 'Due For Visits' %}

{% block content %}

<div class="box-body">
	<h3 class="box-title">Due For Visits</h3><br>

    <div class="table-responsive">	

        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{ site_url("patient_management/DFV/print") }}" target="_blank"><span class="label label-primary">Print</span></a>
                <a href="{{ site_url("patient_management/DFV/pdf") }}"><span class="label label-primary">Generate PDF</span></a>
            </div>
        </div>
        <br>

        <table id="dfv-list" class="table no-margin table-hover">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Referral Date</th>
                    <th>Date of Service</th>
                    <th>Provider</th>
                   <th>Action</th>
                </tr>
            </thead>

            <tbody>

                {% for record in records %}

                    <tr>
                        <td>{{ record.patient_name }}</td>
                        <td>{{ record.get_date_format(record.pt_dateRef) }}</td>
                        <td>{{ record.get_date_format(record.pt_dateOfService) }}</td>
                        <td>{{ record.get_provider_fullname() }}</td>
                        <td width="80px">
                            <a target="_blank" href="{{ site_url("patient_management/profile/details/#{ record.patient_id }") }}" title=""><span class="label label-primary">View</span></a>
                        </td>
                    </tr>

                {% endfor %}

            </tbody>
        </table>
    </div>
</div>

{% endblock %}