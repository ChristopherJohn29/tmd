{% extends "main.php" %}

{% set page_title = "Scheduled Holidays" %}

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
		  <h3 class="box-title">Scheduled Holidays</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">

			<div class="table-responsive">
				<div id="" class="toolbar">
					<a href="{{ site_url('scheduled_holidays_management/scheduled_holidays/add') }}" class="pull-right">
						<span class="label label-primary">Add</span>
					</a>
				</div>

				<table id="" class="table no-margin table-hover">

				  <thead>
					<tr>
						<th>Description</th>
						<th>Date</th>
						<th width="120px">Actions</th>
					</tr>
				  </thead>

				  <tbody>

					{% if scheduledHolidays %}

					  {% for scheduledHoliday in scheduledHolidays %}
						
						<tr>
							<td>
								{{ scheduledHoliday.sh_description }}
							</td>
							<td>
								{{ scheduledHoliday.get_date_format(scheduledHoliday.sh_date)|date("F d, Y") }}
							</td>
							<td>

								{% if roles_permission_entity.has_permission_name(['scheduled_holidays']) %}

									<a href="{{ site_url("scheduled_holidays_management/scheduled_holidays/edit/#{ scheduledHoliday.sh_id }") }}" title="Edit"><span class="label label-primary">Edit</span></a>

								{% endif %}

								{% if roles_permission_entity.has_permission_name(['scheduled_holidays']) %}

									<a href="{{ site_url("ajax/scheduled_holidays_management/scheduled_holidays/delete/#{ scheduledHoliday.sh_id }") }}" data-delete-btn><span class="label label-primary">Delete</span></a>

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
							<th>Description</th>
							<th>Date</th>
							<th width="120px">Actions</th>
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

