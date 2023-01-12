{% extends "main.php" %}

{% set page_title = 'Route List' %}

{% 
  set scripts = [
    'bower_components/datatables.net/js/dataTables.buttons.min',
	'dist/js/provider_route_sheet_management/route_sheet/list_ca',
	'dist/js/superbill_management/dateRange',
    'dist/js/libraries/year_incrementor'
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
	<div class="row hvr">

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

			{{ form_open("home_visit_request", {"class": "xrx-form"}) }}
						
					
							
						<div class="row" style="width:60%; margin:auto auto;">
							<div class="col-md-3 form-group">
								<label class="control-label">Month <span>*</span></label>
								<select class="form-control" style="width: 100%;" name="fromMonth" required="true">
									<option value="1">January</option>
									<option value="2">February</option>
									<option value="3">March</option>
									<option value="4">April</option>
									<option value="5">May</option>
									<option value="6">June</option>
									<option value="7">July</option>
									<option value="8">August</option>
									<option value="9">September</option>
									<option value="10">October</option>
									<option value="11">November</option>
									<option value="12">December</option>
								</select>
							</div>
							
							<div class="col-md-1 form-group">
								<label class="control-label">From <span>*</span></label>
								<select class="form-control" style="width: 100%;" name="fromDate" required="true" data-fromDate-incrementor>
								</select>
							</div>

							<div class="col-md-3 form-group">
								<label class="control-label">Month <span>*</span></label>
								<select class="form-control" style="width: 100%;" name="toMonth" required="true">
									<option value="1">January</option>
									<option value="2">February</option>
									<option value="3">March</option>
									<option value="4">April</option>
									<option value="5">May</option>
									<option value="6">June</option>
									<option value="7">July</option>
									<option value="8">August</option>
									<option value="9">September</option>
									<option value="10">October</option>
									<option value="11">November</option>
									<option value="12">December</option>
								</select>
							</div>
							
							<div class="col-md-1 form-group">
								<label class="control-label">To <span>*</span></label>
								<select class="form-control" style="width: 100%;" name="toDate" required="true" data-toDate-incrementor>
								</select>
							</div>
							
							<div class="col-md-2 form-group">
								<label class="control-label">Year <span>*</span></label>
								<select class="form-control" style="width: 100%;" name="year" required="true">
								</select>
							</div>

							<div class="col-md-2 form-group text-center">
								<button type="submit" class="btn btn-primary xrx-custom-btn-payroll">
									Submit
								</button>
							
							</div>
							
						</div>
						
					</form>

                <div class="table-responsive">

				{% if fromDate %}
				<div class="xrx-tabletop-info">
					<div class="pull-left">
						<p style="font-size: 1.3em; margin-top:5px;">
							Home visit request<br>
							{{ datePeriod }}<br>
							Total: {{ headcounts_total }}
						</p>
					</div>
					<div class="pull-right text-right">
						<a data-sortBtn href="{{ site_url("home_visit_request/generate_pdf_list/#{ fromDate }/#{ toDate }") }}">
							<span class="btn btn-primary btn-sm">Generate PDF</span>
						</a>
					</div>
				</div>
				{% endif %}

                    <table id="home-visit-request" class="table no-margin table-hover">
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
										<a href='{{ site_url("home_visit_request/generate_pdf_admin/#{ record.id }") }}' title="Edit"><span class="label label-primary">Email To Admin</span></a>
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