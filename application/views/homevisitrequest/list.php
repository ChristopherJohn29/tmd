{% extends "main.php" %}

{% set page_title = 'Route List' %}

{% 
  set scripts = [
    'bower_components/datatables.net/js/dataTables.buttons.min',
	'dist/js/provider_route_sheet_management/route_sheet/list_ca'
  ]
%}

{% block content %}
<style>
	.toolbar{
		display: none !important;
	}
	.xrx-info {
		padding-top: 80px;
		padding-bottom: 80px;
	}
</style>
	<div class="row">

		<div class="col-xs-12">
		  {% if states %}
			{{ include('commons/alerts.php') }}
		  {% endif %}
		</div>

		
		
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Home Visit Request</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div class="table-responsive">
                    <table id="all-routesheet-list" class="table no-margin table-hover">
						<thead>
							<tr>
								<th>Home Health</th>
								<th>Patient Name</th>
								<th>Medicare</th>
								<th>Date of Birth</th>
								<th>Type of Visit</th>
								<th>Date of Sent</th>
								<th style="width: 120px;">Action</th>
							</tr>
						</thead>
                  
						<tbody>

							{% if records %}

								{% for record in records %}

									<tr>
										<td>{{ record.pf_name_of_facility }}</td>
										<td>{{ record.pi_patient_name }}</td>
										<td>{{ record.ii_medicare }}</td>
										<td>{{ record.pi_dob|date('m/d/Y') }}</td>
										<td>{{ record.tov }}</td>
										<td>{{ record.date_of_sent|date('m/d/Y') }}</td>
										<td style="width: 120px;">
										<a href='{{ site_url("home_visit_request/generate_pdf/#{ record.id }") }}' title="Edit"><span class="label label-primary">Email To Homehealth</span></a>
										<a href='{{ site_url("home_visit_request/generate_pdf/#{ record.id }") }}' title="Edit"><span class="label label-primary">Email To Admin</span></a>
										</td>
									</tr>

								{% endfor %}

							{% endif %}

						</tbody>
						
						<tfoot>
							<tr>
							<th>Home Health</th>
								<th>Patient Name</th>
								<th>Medicare</th>
								<th>Date of Birth</th>
								<th>Type of Visit</th>
								<th>Date of Sent</th>
								<th style="width: 120px;">Action</th>
							</tr>
						</tfoot>
	                </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>

      </div>
        
{% endblock %}