{% extends "main.php" %}

{% set page_title = 'Provider List' %}

{% 
  set scripts = [
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
				    <table id="all-patient-list" class="table no-margin table-hover">
					<thead>
						<tr>
							<th>Provider Name</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Address</th>
							<th width="120px">Action</th>
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
										<a href="{{ site_url("provider_management/profile/details/#{ record.provider_id }") }}" title="Edit"><span class="label label-primary">View Details</span></a>
		                                <a href="{{ site_url("provider_management/profile/edit/#{ record.provider_id }") }}" title="Edit"><span class="label label-primary">Update</span></a>
									</td>
								</tr>

							{% endfor %}

						{% endif %}

					</tbody>
                </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          
        </div>
    </div>
{% endblock %}