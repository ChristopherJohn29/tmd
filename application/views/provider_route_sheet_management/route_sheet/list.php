{% extends "main.php" %}

{% set page_title = 'Route List' %}

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
              <h3 class="box-title">Route Sheet</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="" class="table no-margin table-hover">
				<thead>
					<tr>
						<th>Date of Service</th>
						<th>Provider</th>
						<th width="160px">Action</th>
					</tr>
				</thead>
                  
				<tbody>

					{% if records %}

						{% for record in records %}

							<tr>
								<td>{{ record.get_date_format(record.prs_dateOfService) }}</td>
								<td>{{ record.get_provider_fullname() }}</td>
								<td>
									
									{% if roles_permission_entity.has_permission_name(['view_prs']) %}

										<a href='{{ site_url("provider_route_sheet_management/route_sheet/details/#{ record.prs_id }") }}'><span class="label label-primary">View Details</span></a>

									{% endif %}

									{% if roles_permission_entity.has_permission_name(['edit_prs']) %}
										
										<a href='{{ site_url("provider_route_sheet_management/route_sheet/edit/#{ record.prs_id }") }}' title="Edit"><span class="label label-primary">Update</span></a>

									{% endif %}

								</td>
							</tr>

						{% endfor %}	

					{% else %}
						
						<tr>
	                        <td colspan="3" class="text-center">No data available in table</td>
	                    </tr>

					{% endif %}

				</tbody>
				
				<tfoot>
					<tr>
						<th>Date of Service</th>
						<th>Provider</th>
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