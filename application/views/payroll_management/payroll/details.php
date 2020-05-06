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

             		{{ form_open("payroll_management/payroll/form/#{ provider_details.provider_id }/#{ fromDate|replace({'/': '_'}) }/#{ toDate|replace({'/': '_'}) }") }}
             		
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
	                        		Pay Period: {{ pay_period }}
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
					
						<div class="row xrx-row-spacer">
						
	             			<div class="col-md-6">
	             				<p class="lead">Notes</p>
	             				
	             				<div class="form-handler">
                                    <textarea class="form-control" name="notes" rows="5"></textarea>
	                            </div>
	                            
	             			</div>
	             			
	             			<div class="col-md-6">
	             			
	             				<p class="lead">Payment Summary</p>
	             			    <div class="table-responsive">
		             				<table class="table no-margin">
										<thead>
											<tr>
												<th>Description</th>
												<th>Quantity</th>
												<th>Amount</th>
												<th width="120px">Total Amount</th>
											</tr>
										</thead>
										
										<tbody>

											{% if provider_payment_summary['initial_visit_home']['total'] != 0 %}

												<tr>
													<th>Initial Visit (Home)</th>
													<td>{{ provider_payment_summary['initial_visit_home']['qty'] }}</td>
													<td>${{ provider_payment_summary['initial_visit_home']['amount'] }}</td>
													<td>${{ provider_payment_summary['initial_visit_home']['total'] }}</td>
												</tr>

											{% endif %}

											{% if provider_payment_summary['initial_visit_facility']['total'] != 0 %}

												<tr>
													<th>Initial Visit (Facility)</th>
													<td>{{ provider_payment_summary['initial_visit_facility']['qty'] }}</td>
													<td>${{ provider_payment_summary['initial_visit_facility']['amount'] }}</td>
													<td>${{ provider_payment_summary['initial_visit_facility']['total'] }}</td>
												</tr>

											{% endif %}

											{% if provider_payment_summary['initial_visit_telehealth']['total'] != 0 %}

												<tr>
													<th>Initial Visit (TeleHealth)</th>
													<td>{{ provider_payment_summary['initial_visit_telehealth']['qty'] }}</td>
													<td>${{ provider_payment_summary['initial_visit_telehealth']['amount'] != '' ? provider_payment_summary['initial_visit_telehealth']['amount'] : 0 }}</td>
													<td>${{ provider_payment_summary['initial_visit_telehealth']['total'] }}</td>
												</tr>

											{% endif %}

											{% if provider_payment_summary['follow_up_home']['total'] != 0 %}

												<tr>
													<th>Follow-Up Visit (Home)</th>
													<td>{{ provider_payment_summary['follow_up_home']['qty'] }}</td>
													<td>${{ provider_payment_summary['follow_up_home']['amount'] }}</td>
													<td>${{ provider_payment_summary['follow_up_home']['total'] }}</td>
												</tr>

											{% endif %}

											{% if provider_payment_summary['follow_up_facility']['total'] != 0 %}

												<tr>
													<th>Follow-Up Visit (Facility)</th>
													<td>{{ provider_payment_summary['follow_up_facility']['qty'] }}</td>
													<td>${{ provider_payment_summary['follow_up_facility']['amount'] }}</td>
													<td>${{ provider_payment_summary['follow_up_facility']['total'] }}</td>
												</tr>

											{% endif %}

											{% if provider_payment_summary['follow_up_telehealth']['total'] != 0 %}

												<tr>
													<th>Follow-Up Visit (TeleHealth)</th>
													<td>{{ provider_payment_summary['follow_up_telehealth']['qty'] }}</td>
													<td>${{ provider_payment_summary['follow_up_telehealth']['amount'] != '' ? provider_payment_summary['follow_up_telehealth']['amount'] : 0 }}</td>
													<td>${{ provider_payment_summary['follow_up_telehealth']['total'] }}</td>
												</tr>

											{% endif %}

											{% if provider_payment_summary['no_show']['total'] != 0 %}

												<tr>
													<th>No Show</th>
													<td>{{ provider_payment_summary['no_show']['qty'] }}</td>
													<td>${{ provider_payment_summary['no_show']['amount'] }}</td>
													<td>${{ provider_payment_summary['no_show']['total'] }}</td>
												</tr>

											{% endif %}
												
											<tr>
												<th>AW / IPPE</th>
												<td>{{ provider_payment_summary['aw_ippe']['qty'] }}</td>
												<td>${{ provider_payment_summary['aw_ippe']['amount'] }}</td>
												<td>${{ provider_payment_summary['aw_ippe']['total'] }}</td>
											</tr>
											<tr>
												<th>ACP</th>
												<td>{{ provider_payment_summary['acp']['qty'] }}</td>
												<td>${{ provider_payment_summary['acp']['amount'] }}</td>
												<td>${{ provider_payment_summary['acp']['total'] }}</td>
											</tr>
											<tr>
												<th>Mileage</th>
												<td>
													<input type="number" id="mileageQty" name="mileageQty" value="{{ provider_payment_summary['mileage']['qty'] }}" style="width:50%;">
												</td>
												<td>
													<input type="hidden" id="mileageAmount" name="mileageAmount" value="{{ provider_payment_summary['mileage']['amount'] }}">
													<span id="mileageAmountOutput">{{ provider_payment_summary['mileage']['amount'] }}</span>¢
												</td>
												<td>
													<input type="hidden" name="mileageTotal" id="mileageTotal" value="{{ provider_payment_summary['mileage']['total'] }}">

													$<span id="mileageTotalOutput">{{ provider_payment_summary['mileage']['total'] }}</span>
												</td>
											</tr>
											<tr>
												<th><input type="text" name="others_field" class="form-control"></th>
												<td>-</td>
												<td>
		                                            <div class="input-group">
		                                                <span class="input-group-addon">$</span>
		                                                <input type="text" 
		                                                	class="form-control" 
		                                                	style="width:50px" 
		                                                	name="others"
		                                                	data-action-url="{{ site_url('ajax/payroll_management/payroll/compute_others') }}">
		                                              </div>
		                                        </td>
												<td class="others-amount">-</td>
											</tr>
											<tr class="total">
												<th colspan="3">Total</th>
												<input type="hidden" id="grandTotal" name="total" value="{{ provider_payment_summary['total_salary'] }}">
												<td>$ <span class="total-amount">{{ provider_payment_summary['total_salary'] }}</span></td>
											</tr>
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
	                                
	                                <button type="submit" class="btn btn-primary xrx-btn" name="submit_type"style="margin-right: 5px;" value="email">
	                                	<i class="fa fa-envelope-o"></i> Email to Provider
	                                </button>

	                                <button type="submit" class="btn btn-danger xrx-btn pull-right" name="submit_type" style="margin-right: 5px;" value="paid" disabled="true" id="paidBtn">
	                                	<i class="fa fa-credit-card"></i> Paid
	                                </button>

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