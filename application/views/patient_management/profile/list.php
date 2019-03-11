{% extends "main.php" %}

{% 
  set scripts = [
	'bower_components/datatables.net/js/dataTables.buttons.min',
	'dist/js/patient_management/profile/list'
  ]
%}

{% set page_title = 'Patients List' %}

{% block content %}
	 <div class="row">

		<div class="col-xs-12">
		  {% if states %}
			{{ include('commons/alerts.php') }}
		  {% endif %}
		</div>

		<div class="col-xs-12">
		  <div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title">Patients</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					
                    <table id="all-patient-list" class="table no-margin table-hover fix-width">
                        
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Referral Date</th>
                            <th>ICD10 - Code Diagnoses</th>
                            <th>Date of Service</th>
                            <th class="provider">Provider</th>
                            <th>PAID</th>
                            <th>AW Billed</th>
                            <th>Visits Billed</th>
                            <th>CPO Billed</th>
                            <th class="actions">Actions</th>
                        </tr>
                    </thead>
				  
				  <tbody>

					  {% if records %}

						{% for record in records %}

							<tr>
								<td>{{ record['patientName'] }}</td>
								<td data-order="{{ record['patientReferralDate']|date("Ymd") }}">{{ record['patientReferralDate'] }}</td>

								{% if profile_entity.is_sel_noshow_cancelled(record['pt_tovID']) %}

									<td><span class="text-red">{{ record['notes'] }}</span></td>

								{% else %}

									<td>{{ record['ICD10'] }}</td>

								{% endif %}

								<td>{{ record['dateOfService'] }}</td>
								<td>{{ record['provider'] }}</td>
								<td><span class="text-red"><strong>{{ record['provider_paid'] }}</strong></span></td>
								<td><span class="text-red"><strong>{{ record['aw_billed'] }}</strong></span></td>
                                <td><span class="text-red"><strong>{{ record['visit_billed'] }}</strong></span></td>
								<td><span class="text-red"><strong>{{ record['cpo_billed'] }}</strong></span></td>
								<td>
									
									{% if roles_permission_entity.has_permission_name(['view_pt']) %}
										
										<a target="_blank" href="{{ site_url("patient_management/profile/details/#{ record['patientId'] }") }}"><span class="label label-primary">View</span></a>
									{% endif %}

									{% if roles_permission_entity.has_permission_name(['add_tr']) %}

										<a href="{{ site_url("patient_management/transaction/add/#{ record['patientId'] }") }}" title=""><span class="label label-primary">Add</span></a>

									{% endif %}
									
									{% if roles_permission_entity.has_permission_name(['edit_pt']) %}
										
										<a href="{{ site_url("patient_management/profile/edit/#{ record['patientId'] }") }}"><span class="label label-primary">Update</span></a>

									{% endif %}

								</td>
							</tr>

						{% endfor %}

					  {% endif %}

					  </tbody>
					  <tfoot>
						<tr>
							<th>Patient Name</th>
							<th>Referral Date</th>
							<th>ICD10 - Code Diagnoses</th>
							<th>Date of Service</th>
							<th>Provider</th>
							<th>PAID</th>
                            <th>AW Billed</th>
                            <th>Visits Billed</th>
							<th>CPO Billed</th>
							<th>Actions</th>
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