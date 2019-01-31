{% extends "main.php" %}

{% set page_title = 'Provider List' %}

{% 
  set scripts = [
    'bower_components/datatables.net/js/dataTables.buttons.min',
    'dist/js/provider_management/profile/list'
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
              <h3 class="box-title">Providers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                	<input type="hidden" name="total" value="{{ total }}">

				    <table id="all-patient-list" class="table no-margin table-hover">
					<thead>
						<tr>
							<th>Provider Name</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Address</th>
							<th width="80px">Action</th>
						</tr>
					</thead>
	                  
					<tbody>
						
						{% if records is defined %}

							{% for record in records %}

								<tr>
									<td>{{ record.get_fullname() }}</td>
									<td>{{ record.provider_contactNum }}</td>
									<td>{{ record.provider_email }}</td>
									<td>{{ record.provider_address }}</td>
									<td>
										
										{% if roles_permission_entity.has_permission_name(['view_provider']) %}

											<a target="_blank" href="{{ site_url("provider_management/profile/details/#{ record.provider_id }") }}" title="Edit"><span class="label label-primary">View</span></a>

										{% endif %}

										{% if roles_permission_entity.has_permission_name(['edit_provider']) %}

		                                	<a href="{{ site_url("provider_management/profile/edit/#{ record.provider_id }") }}" title="Edit"><span class="label label-primary">Update</span></a>

	                                	{% endif %}

									</td>
								</tr>

							{% endfor %}

						{% endif %}

					</tbody>
                        
                    <tfoot>
		                <tr>
		                  	<th>Provider Name</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Address</th>
							<th>Action</th>
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