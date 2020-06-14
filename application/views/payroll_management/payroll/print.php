{% extends "basic.php" %}

{% set page_title = 'Print Payroll' %}
{% set body_class = 'print' %}

{% block content %}
 
<script type="text/javascript">
	window.print();
</script>

<div class="row">
        <div class="col-md-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              
             	<section class="xrx-info">
             		
             		<div class="row">
             			<div class="col-md-12">
                            <h3 class="name">{{ provider_details.get_fullname() }}</h3>
             			</div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Pay Period: {{ pay_period }}</h4>
                        </div>
                    </div>
             		
             		<div class="row">
             		
             			<div class="col-md-12">
             			
             				<p class="lead">Visits</p>
                            
             				<div class="table-responsive">
             				<table class="table no-margin">
								<thead>
									<tr>
										<th>Date of Service</th>
										<th>Type of Visit</th>
										<th>AW / IPPE</th>
										<th>ACP</th>
										<th>Patient Name</th>
										<th>Mileage</th>
									</tr>
								</thead>
								
								<tbody>

									{% for provider_transaction in provider_transactions %}

										<tr>
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
             			
             				<p class="lead">Payment Summary</p>
             			    <div class="table-responsive">
             				<table class="table no-margin">
								<thead>
									<tr>
										<th>Description</th>
										<th width="140px">Quantity</th>
										<th>Amount</th>
										<th>Total Amount</th>
									</tr>
								</thead>
								
								<tbody>

									{% if provider_payment_summary['initial_visit_home']['total'] != 0 %}

										<tr>
											<td><strong>Initial Visit (Home)</strong></td>
											<td>{{ provider_payment_summary['initial_visit_home']['qty'] }}</td>
											<td>${{ provider_payment_summary['initial_visit_home']['amount'] }}</td>
											<td>${{ provider_payment_summary['initial_visit_home']['total'] }}</td>
										</tr>

									{% endif %}

									{% if provider_payment_summary['initial_visit_facility']['total'] != 0 %}
										
										<tr>
											<td><strong>Initial Visit (Facility)</strong></td>
											<td>{{ provider_payment_summary['initial_visit_facility']['qty'] }}</td>
											<td>${{ provider_payment_summary['initial_visit_facility']['amount'] }}</td>
											<td>${{ provider_payment_summary['initial_visit_facility']['total'] }}</td>
										</tr>

									{% endif %}

									{% if provider_payment_summary['initial_visit_telehealth']['total'] != 0 %}
										
										<tr>
											<th><strong>Initial Visit (Office)</strong></th>
											<td>{{ provider_payment_summary['initial_visit_telehealth']['qty'] }}</td>
											<td>${{ provider_payment_summary['initial_visit_telehealth']['amount'] != '' ? provider_payment_summary['initial_visit_telehealth']['amount'] : 0 }}</td>
											<td>${{ provider_payment_summary['initial_visit_telehealth']['total'] }}</td>
										</tr>

									{% endif %}

									{% if provider_payment_summary['follow_up_home']['total'] != 0 %}
										
										<tr>
											<td><strong>Follow-Up Visit (Home)</strong></td>
											<td>{{ provider_payment_summary['follow_up_home']['qty'] }}</td>
											<td>${{ provider_payment_summary['follow_up_home']['amount'] }}</td>
											<td>${{ provider_payment_summary['follow_up_home']['total'] }}</td>
										</tr>

									{% endif %}

									{% if provider_payment_summary['follow_up_facility']['total'] != 0 %}
										
										<tr>
											<td><strong>Follow-Up Visit (Facility)</strong></td>
											<td>{{ provider_payment_summary['follow_up_facility']['qty'] }}</td>
											<td>${{ provider_payment_summary['follow_up_facility']['amount'] }}</td>
											<td>${{ provider_payment_summary['follow_up_facility']['total'] }}</td>
										</tr>

									{% endif %}

									{% if provider_payment_summary['follow_up_telehealth']['total'] != 0 %}
										
										<tr>
											<th><strong>Follow-Up Visit (Office)</strong></th>
											<td>{{ provider_payment_summary['follow_up_telehealth']['qty'] }}</td>
											<td>${{ provider_payment_summary['follow_up_telehealth']['amount'] != '' ? provider_payment_summary['follow_up_telehealth']['amount'] : 0 }}</td>
											<td>${{ provider_payment_summary['follow_up_telehealth']['total'] }}</td>
										</tr>

									{% endif %}

									{% if provider_payment_summary['no_show']['total'] != 0 %}
										
										<tr>
											<td><strong>No Show</strong></td>
											<td>{{ provider_payment_summary['no_show']['qty'] }}</td>
											<td>${{ provider_payment_summary['no_show']['amount'] }}</td>
											<td>${{ provider_payment_summary['no_show']['total'] }}</td>
										</tr>

									{% endif %}

									<tr>
										<td><strong>AW / IPPE</strong></td>
										<td>{{ provider_payment_summary['aw_ippe']['qty'] }}</td>
										<td>${{ provider_payment_summary['aw_ippe']['amount'] }}</td>
										<td>${{ provider_payment_summary['aw_ippe']['total'] }}</td>
									</tr>
									<tr>
										<td><strong>ACP</strong></td>
										<td>{{ provider_payment_summary['acp']['qty'] }}</td>
										<td>${{ provider_payment_summary['acp']['amount'] }}</td>
										<td>${{ provider_payment_summary['acp']['total'] }}</td>
									</tr>
									<tr>
										<td><strong>Mileage</strong></td>
										<td>{{ mileageQty ?? provider_payment_summary['mileage']['qty'] }}</td>
										<td>${{ mileageAmount ?? provider_payment_summary['mileage']['amount'] }}</td>
										<td>${{ mileageTotal ?? provider_payment_summary['mileage']['total'] }}</td>
									</tr>
									<tr>
										<td colspan="3"><strong>{{ others_field }}</strong></td>
										<td>{{ others }}</td>
									</tr>
									<tr class="total">
										<td colspan="3"><strong>Total</strong></td>
										<td>${{ total|number_format(2) }}</td>
									</tr>
								</tbody>
								
							</table>
                            </div>
             			</div>
             			
             			<div class="col-md-6">
             				<p class="lead">Notes</p>
         					
         					<p class="text-muted well well-sm no-shadow">
         						
         						{% if notes %}

             						{{ notes }}

	         					{% else %}

	         						There are no additional notes.

	         					{% endif %}

         					</p>
                            
             			</div>
			 		</div>
             		
             		
             		
             	</section>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>

      </div>
{% endblock %}