{% extends "main.php" %}

{% 
  set scripts = [
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
                    <table id="all-patient-list" class="table no-margin table-hover">
                <thead>
                  <tr>
                    <th>Patient Name</th>
                    <th>Referral Date</th>
                    <th>ICD10 - Code Diagnoses</th>
                    <th>Date of Service</th>
                    <th width="170px">Actions</th>
                  </tr>
                  </thead>
                  
                  <tbody>

	                  {% if records %}

	                  	{% for record in records %}

                  			<tr>
			                    <td>{{ record.get_reverse_fullname() }}</td>
			                    <td>{{ record.get_date_format(record.patient_referralDate) }}</td>
			                    <td>{{ '' }}</td>
			                    <td>{{ '' }}</td>
			                    <td>
									<a href="{{ site_url("patient_management/profile/details/#{ record.patient_id }") }}"><span class="label label-primary">View Details</span></a>
									<a href="{{ site_url('patient_management/transaction/add') }}" title=""><span class="label label-primary">Add Transaction</span></a>
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