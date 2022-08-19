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

            	<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">PROVIDERS</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false" id="inactive">INACTIVE PROVIDERS</a></li>
              <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false" id="supervising">SUPERVISING MDs</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">


           <div class="table-responsive">
                	<input type="hidden" name="total" value="{{ total }}">

					<style>
						.tooltips {
						position: relative;
						cursor:pointer;
						}

						.tooltips .tooltiptext {
						visibility: hidden;
						width: 50%;
						background-color: black;
						color: #fff;
						text-align: center;
						border-radius: 6px;
						padding: 5px 0;

						/* Position the tooltip */
						position: absolute;
						z-index: 1;
						}

						.tooltips:hover .tooltiptext {
						visibility: visible;
						}
						
					</style>

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
						
						{% if active_providers is defined %}

							{% for record in active_providers %}

								<tr>
									<td class="tooltips">{{ record.get_fullname() }}
									{% if record.provider_photo %}
									<img class="tooltiptext" src="../../../uploads/{{ record.provider_photo }}">
									{% endif %}
									</td>
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
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">



              	<div class="table-responsive">
                	<input type="hidden" name="total2" value="{{ total2 }}">

				    <table id="inactive-patient-list" class="table no-margin table-hover">
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
						
						{% if inactive_providers is defined %}

							{% for record in inactive_providers %}

								<tr>
								<td class="tooltips">{{ record.get_fullname() }}
									{% if record.provider_photo %}
									<img class="tooltiptext" src="../../../uploads/{{ record.provider_photo }}">
									{% endif %}
									</td>
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
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">


              	 	<div class="table-responsive">
                	<input type="hidden" name="total3" value="{{ total3 }}">

				    <table id="supervising-patient-list" class="table no-margin table-hover">
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
						
						{% if supervising_mds is defined %}

							{% for record in supervising_mds %}

								<tr>
								<td class="tooltips">{{ record.get_fullname() }}
									{% if record.provider_photo %}
									<img class="tooltiptext" src="../../../uploads/{{ record.provider_photo }}">
									{% endif %}
									</td>
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
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>

          
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          
        </div>
    </div>
{% endblock %}