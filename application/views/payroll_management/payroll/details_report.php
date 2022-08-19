{% extends "main.php" %}

{% set page_title = 'Payroll Details' %}

{% 
  set scripts = [
    'dist/js/payroll_management/payroll/details',
    'dist/js/payroll_management/payroll/mileageCalc'
  ]
%}

{% block content %}
<div class="row">
    <div class="col-md-12">
      	<div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              
             	<section class="xrx-info">

             		{{ form_open("payroll_management/payroll/formReport/#{ provider_details.provider_id }/#{ fromDate|replace({'/': '_'}) }/#{ toDate|replace({'/': '_'}) }/#{ provider_details.pt_tovID }") }}
             		
	             		<div class="row">
	             			<div class="col-xs-12">
							  {% if states %}
								{{ include('commons/alerts.php') }}
							  {% endif %}
							</div>

	             			<div class="col-md-12">
	             				<input type="hidden" name="providerName" value="{{ provider_details.provider_firstname }}">
	             				<h1 class="name">{{ provider_details.get_fullname() }}<small>Provider Name</small></h1>
	             			</div>
	                    </div>
	                    
	                    <div class="row spacer-bottom">
	                        <div class="col-md-12">
	                        	<input type="hidden" name="payPeriod" value="{{ pay_period }}">
	                            <h4>
	                        		Report Period: {{ pay_period }}
	                        	</h4>
	                        </div>
	                    </div>
	                    
	                    <div class="row">
	             			<div class="col-md-6">
	             				<p class="lead">Contact Information</p>
	             				
	             				<table class="table xrx-table">
	             					<tr>
	             						<th>Address:</th>
	             						<td>{{ provider_details.provider_address }}</td>
	             					</tr>
	             					<tr>
	             						<th>Phone:</th>
	             						<td>{{ provider_details.provider_contactNum }}</td>
	             					</tr>
	             					<tr>
	             						<th>Email:</th>
	             						<td>{{ provider_details.provider_email }}</td>
	             					</tr>
	             				</table>
	             			</div>
	             		</div>             		
             		
	             		<div class="row xrx-row-spacer">
	             		
	             			<div class="col-md-12">
	             			
	             				<p class="lead">Visits</p>
	                            
	             				<div class="table-responsive">
	             				<table class="table no-margin table-striped">
									<thead>
										<tr>
											<th><input type="checkbox" id="checkAll"></th>
											<th>Date of Service</th>
											<th>Type of Visit</th>
											<th>AW / IPPE</th>
											<th>ACP</th>
											<th>Patient Name</th>
											<th width="120px">Mileage</th>
										</tr>
									</thead>
									
									<tbody>

										{% for provider_transaction in provider_transactions %}

											<tr>
												<td>
													<input type="checkbox" {{ provider_transaction.is_service_paid() ? 'disabled="true"' : 'name="pt_id[]"' }} value="{{ provider_transaction.pt_id }}">
												</td>
												<td>{{ provider_transaction.get_date_format(provider_transaction.pt_dateOfService) }}</td>
												<td>{{ provider_transaction.tov_name }}</td>
												<td>{{ provider_transaction.get_aw_ippe_format(provider_transaction.pt_aw_ippe_code) }}</td>
												<td>{{ provider_transaction.get_selected_choice_format(provider_transaction.pt_acp) }}</td>
												<td>{{ provider_transaction.patient_name }}</td>
												<td>{{ provider_transaction.pt_mileage }}</td>
											</tr>

										{% endfor %}

									</tbody>
									
								</table>
	                            </div>
	             			</div>
	             		</div>
					
						
             		
	             		<div class="row no-print">
	          	
	                        <div class="col-xs-12 xrx-btn-handler">
	                            <div>
	                            	<button type="submit" class="btn btn-primary xrx-btn" name="submit_type" value="print" formtarget="_blank">
	                            		<i class="fa fa-print"></i> Print
	                            	</button>

	                                <button type="submit" class="btn btn-primary xrx-btn" name="submit_type" style="margin-right: 5px;" value="pdf">
	                                	<i class="fa fa-download"></i> Generate PDF
	                                </button>
	                                
	                                <!-- <button type="submit" class="btn btn-primary xrx-btn" name="submit_type"style="margin-right: 5px;" value="email">
	                                	<i class="fa fa-envelope-o"></i> Email to Provider
	                                </button> -->

	                          

	                            </div>

	                        </div>

	                    </div>

			 		</form>
             		
             	</section>
              
            </div>
            <!-- /.box-body -->
      	</div>
          <!-- /.box -->
  	</div>
</div>
{% endblock %}