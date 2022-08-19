{% extends "main.php" %}

{% set page_title = 'Route List' %}

{% 
  set scripts = [
    'bower_components/datatables.net/js/dataTables.buttons.min',
    'dist/js/provider_route_sheet_management/route_sheet/list_ca'
  ]
%}

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
              <h3 class="box-title">Cognitive Visit Route Sheet</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div class="table-responsive">
                    <table id="all-routesheet-list" class="table no-margin table-hover">
						<thead>
							<tr>
								<th>Date of Service</th>
								<th>Provider</th>
								<th width="130px">Action</th>
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

												<a target="_blank" href='{{ site_url("provider_route_sheet_management/route_sheet/details/#{ record.prs_id }/ca") }}'><span class="label label-primary">View</span></a>

											{% endif %}

											{% if roles_permission_entity.has_permission_name(['edit_prs'])  %}
												
												<a href='{{ site_url("provider_route_sheet_management/route_sheet/edit/#{ record.prs_id }/ca") }}' title="Edit"><span class="label label-primary">Update</span></a>

											{% endif %}

											{% if roles_permission_entity.has_permission_name(['delete_prs']) %}
												
												<a href='{{ site_url("ajax/provider_route_sheet_management/route_sheet/delete/#{ record.prs_id }") }}' title="Delete" data-delete-btn><span class="label label-primary">Delete</span></a>

											{% endif %}

										</td>
									</tr>

								{% endfor %}

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