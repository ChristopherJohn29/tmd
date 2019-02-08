{% extends "main.php" %}

{% set page_title = 'Route Details' %}

{% block content %}
	 <div class="row">
        <div class="col-md-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">

                {{ form_open("provider_route_sheet_management/route_sheet/form/#{ record.prs_id }") }}
              
                 	<section class="xrx-info">
                 		
                 		<div class="row">
                            <div class="col-xs-12">
                              {% if states %}
                                {{ include('commons/alerts.php') }}
                              {% endif %}
                            </div>
                            
                 			<div class="col-md-12">
                 				<h1 class="name rs">{{ record.get_provider_fullname() }}<small>Provider Name</small></h1>
                 			</div>
                 		</div>
                        
                        <div class="row spacer-bottom">
                            <div class="col-md-12">
                                <h4>Date of Service: {{ record.get_date_format(record.prs_dateOfService) }}</h4>
                            </div>
                        </div>
                 		
                 		<div class="row">
                 			<div class="col-md-12">
                 				
                 				<p class="lead">Route Sheet</p>
                                
                 				<div class="table-responsive">
                 				   <table id="" class="table no-margin table-striped route-sheet">
    								<thead>
    									<tr>
    										<th>Time</th>
    										<th>Patient's Info</th>
    										<th>Home Health Info</th>
    										<th>Notes</th>
    									</tr>
    								</thead>
    								
    								<tbody>

    									{% for list in lists %}

    										<tr>
    											<td>{{ list.get_combined_time() }}</td>
    											<td><p>{{ list.patient_name }}<span>{{ list.patient_address }}<br>{{ list.patient_phoneNum }}</span></p></td>
    	                                        <td><p>{{ list.hhc_name }}<span>{{ list.hhc_contact_name }}<br>{{ list.hhc_phoneNumber }}</span></p></td>
    											<td><p>Type of Visit : {{ list.tov_name }}<span>Other Notes: {{ list.prsl_notes }}</span></p></td>
    										</tr>

    									{% endfor %}

    								</tbody>
    							</table>
                                </div>
                 			</div>
                 		</div>
                 		
                 
    					<div class="row no-print">
              	
        					<div class="col-xs-12 xrx-btn-handler">

                                {% if roles_permission_entity.has_permission_name(['print_prs']) %}
        						  
                                  <a href="{{ site_url("provider_route_sheet_management/route_sheet/print/#{ record.prs_id }") }}" target="_blank" class="btn btn-primary xrx-btn"><i class="fa fa-print"></i> Print</a>

                                {% endif %}
        						
                                {% if roles_permission_entity.has_permission_name(['download_prs']) %}
        				            
                                    <button type="submit" name="submit_type" value="pdf" class="btn btn-primary xrx-btn" style="margin-right: 5px;">
        				                <i class="fa fa-download"></i> Generate PDF
        				            </button>

                                {% endif %}
                                
                                {% if roles_permission_entity.has_permission_name(['email_prs']) %}

                                    <button type="submit" name="submit_type" value="email" class="btn btn-primary xrx-btn" style="margin-right: 5px;">
                                    	<i class="fa fa-envelope-o"></i> Email to Provider
                                    </button>

                                {% endif %}
                                
        					</div>
        		          
        		        </div>
                 		
                 	</section>

                </form>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>

      </div>
{% endblock %}