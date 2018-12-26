{% extends "main.php" %}

{% set page_title = 'Payroll Details' %}

{% block content %}
<div class="row">
        <div class="col-md-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              
             	<section class="xrx-info">
             		
             		<div class="row">
             			<div class="col-md-12">
             				<h1 class="name">{{ provider_details.get_fullname() }}<small>Provider Name</small></h1>
             			</div>
                    </div>
                    
                    <div class="row spacer-bottom">
                        <div class="col-md-12">
                            <h4>Pay Period: {{ pay_period }}</h4>
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
             			
             				<p class="lead">Transactions</p>
                            
             				<div class="table-responsive">
             				<table class="table no-margin table-striped">
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
											<td>{{ provider_transaction.pt_aw_ippe_code }}</td>
											<td>{{ provider_transaction.get_selected_choice_format(provider_transaction.pt_acp) }}</td>
											<td>{{ provider_transaction.get_patient_fullname() }}</td>
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
             				
             				<p class="text-muted well well-sm no-shadow">Notes will be added here.</p>
							
                            <div class="form-handler">
                                <form>
                                    <textarea class="form-control" id="" placeholder=""></textarea>
                                </form>
                            </div>
                            
             			</div>
             			
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
									<tr>
										<th>Initial Visit (Home)</th>
										<td>{{ provider_payment_summary['initial_visit_home']['qty'] }}</td>
										<td>{{ provider_payment_summary['initial_visit_home']['amount'] }}</td>
										<td>{{ provider_payment_summary['initial_visit_home']['total'] }}</td>
									</tr>
									<tr>
										<th>Initial Visit (Facility)</th>
										<td>{{ provider_payment_summary['initial_visit_facility']['qty'] }}</td>
										<td>{{ provider_payment_summary['initial_visit_facility']['amount'] }}</td>
										<td>{{ provider_payment_summary['initial_visit_facility']['total'] }}</td>
									</tr>
									<tr>
										<th>Follow-Up Visit (Home)</th>
										<td>{{ provider_payment_summary['follow_up_home']['qty'] }}</td>
										<td>{{ provider_payment_summary['follow_up_home']['amount'] }}</td>
										<td>{{ provider_payment_summary['follow_up_home']['total'] }}</td>
									</tr>
									<tr>
										<th>Follow-Up Visit (Facility)</th>
										<td>{{ provider_payment_summary['follow_up_facility']['qty'] }}</td>
										<td>{{ provider_payment_summary['follow_up_facility']['amount'] }}</td>
										<td>{{ provider_payment_summary['follow_up_facility']['total'] }}</td>
									</tr>
									<tr>
										<th>No Show</th>
										<td>{{ provider_payment_summary['no_show']['qty'] }}</td>
										<td>{{ provider_payment_summary['no_show']['amount'] }}</td>
										<td>{{ provider_payment_summary['no_show']['total'] }}</td>
									</tr>
									<tr>
										<th>AW / IPPE</th>
										<td>{{ provider_payment_summary['aw_ippe']['qty'] }}</td>
										<td>{{ provider_payment_summary['aw_ippe']['amount'] }}</td>
										<td>{{ provider_payment_summary['aw_ippe']['total'] }}</td>
									</tr>
									<tr>
										<th>ACP</th>
										<td>{{ provider_payment_summary['acp']['qty'] }}</td>
										<td>{{ provider_payment_summary['acp']['amount'] }}</td>
										<td>{{ provider_payment_summary['acp']['total'] }}</td>
									</tr>
									<tr>
										<th>Mileage</th>
										<td>{{ provider_payment_summary['mileage']['qty'] }}</td>
										<td>{{ provider_payment_summary['mileage']['amount'] }}</td>
										<td>{{ provider_payment_summary['mileage']['total'] }}</td>
									</tr>
									<tr>
										<th>Others</th>
										<td>-</td>
										<td>
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <input type="text" class="form-control" style="width:50px">
                                              </div>
                                        </td>
										<td>-</td>
									</tr>
									<tr class="total">
										<th colspan="3">Total</th>
										<td>${{ provider_payment_summary['total'] }}</td>
									</tr>
								</tbody>
								
							</table>
                            </div>
             			</div>
             			
             			
			 		</div>
             		
             		<div class="row no-print">
          	
                        <div class="col-xs-12 xrx-btn-handler">
                            <div>
                                <a href="{{ site_url("payroll_management/payroll/print/#{ provider_details.provider_id }/#{ fromDate|replace({'/': '_'}) }/#{ toDate|replace({'/': '_'}) }") }}" target="_blank" class="btn btn-primary xrx-btn"><i class="fa fa-print"></i> Print</a>

                                <button type="button" class="btn btn-primary xrx-btn" style="margin-right: 5px;">
                                <i class="fa fa-download"></i> Generate PDF
                                </button>
                                
                                <button type="button" class="btn btn-primary xrx-btn" style="margin-right: 5px;">
                                <i class="fa fa-envelope-o"></i> Email to Provider
                                </button>

                                <button type="button" class="btn btn-danger xrx-btn pull-right" style="margin-right: 5px;">
                                <i class="fa fa-credit-card"></i> Paid
                                </button>
                            </div>
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