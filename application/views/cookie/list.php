{% extends "main.php" %}

{% set page_title = 'Route List' %}

{% 
  set scripts = [
    'bower_components/datatables.net/js/dataTables.buttons.min',
	'dist/js/provider_route_sheet_management/route_sheet/list_ca'
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
	<div class="row">

		<div class="col-xs-12">
		  {% if states %}
			{{ include('commons/alerts.php') }}
		  {% endif %}
		</div>

		<div class="col-lg-12">
    
        <div class="box">

            <div class="box-body">

                <section class="xrx-info">

                    <div class="row">
                        
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="">
                                
							{{ form_open("cookies/save/add", {"class": "xrx-form"}) }}
								<input type="hidden" name="status" value="1">
                                    
                                    <p class="lead">Add New User Access</p>
                                        
                                    <div class="row">
                                        <div class="col-md-5 form-group">
                                            <label class="control-label">User Name <span>*</span></label>
											<input class="form-control"  type="text" name="name" value="" required>
                                        </div>

										<div class="col-md-5 form-group">
                                            <label class="control-label">Unique Computer Cookie <span>*</span></label>
											<input class="form-control"  type="text" name="cookie" value="" required>
                                        </div>

                                        <div class="col-md-2 form-group">
    					              		<button type="submit" class="btn btn-primary xrx-custom-btn-payroll">
    											Submit
    										</button>
    					              	</div>
                                        
                                    </div>
                                    
                                </form>
                                
                            </div>
                        </div>
                        
                    </div>

                

                </section>

            </div>
        <!-- /.box-body -->
        </div>
    <!-- /.box -->
    </div>
		
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">User With EHR Access</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div class="table-responsive">
                    <table id="all-routesheet-list" class="table no-margin table-hover">
						<thead>
							<tr>
								<th>Name</th>
								<th>Cookie</th>
								<th>Date Added</th>
								<th>Status</th>
								<th style="width: 120px;">Action</th>
							</tr>
						</thead>
                  
						<tbody>

							{% if records %}

								{% for record in records %}

									<tr>
										<td>{{ record.name }}</td>
										<td>{{ record.cookie }}</td>
										<td>{{ record.dateCreated|date('m/d/Y') }}</td>
										<td>{{  record.status == '1' ? 'Active' : 'Inactive' }}</td>
										<td style="width: 120px;">
											
											{% if roles_permission_entity.has_permission_name(['cookie_restriction'])  %}
												
												<a href='{{ site_url("cookies/edit/#{ record.id }") }}' title="Edit"><span class="label label-primary">Update</span></a>

											{% endif %}

											{% if roles_permission_entity.has_permission_name(['cookie_restriction']) %}
												
												<a href='{{ site_url("ajax/user_management/profile/deleteCookies/#{ record.id }") }}' disabled title="Delete" data-delete-btn><span class="label label-primary">Delete</span></a>

											{% endif %}

										</td>
									</tr>

								{% endfor %}

							{% endif %}

						</tbody>
						
						<tfoot>
							<tr>
								<th>Name</th>
								<th>Cookie</th>
								<th>Date Added</th>
								<th>Status</th>
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