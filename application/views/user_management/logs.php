{% extends "main.php" %}

{% set page_title = "User Logs" %}

{%  
  set scripts = [
	'dist/js/user_management/logs'
  ]
%}

{% block content %}
  <div class="row">

	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header with-border">
		  <h3 class="box-title">Users</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">

			<div class="table-responsive">
				<table id="logs" class="table no-margin table-hover">

				  <thead>
					<tr>
						<th>Username</th>
						<th>Time</th>
						<th>Date</th>
						<th>Description</th>
						<th width="120px" class="text-center">Actions</th>
					</tr>
				  </thead>

				  <tbody>

					{% if logs %}

					  {% for log in logs %}
						
						<tr>
							<td>
								{{ log.user_firstname ~ ' ' ~ log.user_lastname }}
							</td>
							<td>
								{{ log.get_time_format(log.user_log_time) }}
							</td>
							<td>
								{{ log.get_date_format(log.user_log_date) }}
							</td>
							<td>
								{{ log.user_log_description }}
							</td>
							<td class="text-center">
								{% if log.user_log_link %}
									<a href="{{ site_url(log.user_log_link) }}" target="_blank">
										<span class="label label-primary">View</span>
									</a>
								{% endif %}
							</td>
						</tr>

					  {% endfor %}
					  
					{% else %}
						
						<tr>
							<td colspan="4" class="text-center">No data available in table</td>
						</tr>

					{% endif %}

				  </tbody>
					
					<tfoot>
						<tr>
							<th>Username</th>
							<th>Time</th>
							<th>Date</th>
							<th>Description</th>
							<th class="text-center" width="120px">Actions</th>
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

