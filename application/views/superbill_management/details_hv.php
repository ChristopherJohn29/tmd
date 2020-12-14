{% extends "main.php" %}

{% set page_title = 'Home Visits' %}

{% 
  set scripts = [
    'dist/js/superbill_management/details_checkboxes'
  ]
%}

{% block content %}
	<div class="row">
        <div class="col-md-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              
             	<section class="xrx-info">
             		
             		<div class="row">
             			<div class="col-xs-12">
						  {% if states %}
							{{ include('commons/alerts.php') }}
						  {% endif %}
						</div>
             			
             			<div class="col-md-12">
             				<h1 class="name">Home Visits<small>Superbill</small></h1>
             			</div>
             			
             			<div class="col-md-6">
             				
             				<table class="table xrx-table">
             					<tr>
             						<th>Date Billed:</th>
             						<td>{{ date_billed }}</td>
             					</tr>
             				</table>
             			</div>
             		</div>

             		{{ form_open("superbill_management/superbill/form/hv/#{ fromDate|replace({'/': '_'}) }/#{ toDate|replace({'/': '_'}) }") }}
             		
	             		<div class="row xrx-row-spacer">
	             		
	             			<div class="col-md-12">
	             			
	             				<p class="lead">Transactions</p>
	             				<div class="table-responsive">
	             				   <table class="table no-margin table-striped">
									<thead>
										<tr>
											<th><input type="checkbox" id="checkAll"></th>
	                                        <th>&nbsp;</th>
											<th width="200px">Patient Name</th>
											<th>Medicare</th>
											<th>DOB</th>
											<th>Address</th>
											<th>Phone</th>
											<th>ACP</th>
											<th>DM</th>
											<th>Tobacco</th>
											<th>TCM</th>
											<th>Provider</th>
                                            <th>Supervising MD</th>
											<th>Date of Service</th>
											<th>Type of Visit</th>
											<th>Place of Service</th>
											<th>ICD-Code Diagnoses</th>
										</tr>
									</thead>
									
									<tbody>

										{% for transaction in newTransactions %}
										
											<tr>
												<td>
													<input type="checkbox" class="superbill_checkboxes" name="pt_id[]" value="{{ transaction.pt_id }}">
												</td>
												<td class="text-center">{{ loop.index }}</td>
												<td>{{ transaction.patient_name }}</td>
												<td>{{ transaction.patient_medicareNum }}</td>
												<td>{{ transaction.get_date_format(transaction.patient_dateOfBirth) }}</td>
												<td>{{ transaction.patient_address }}</td>
												<td>{{ transaction.patient_phoneNum }}</td>
												<td>{{ transaction.get_selected_choice_format(transaction.pt_acp) == 'Yes' ? 1 : '0' }}</td>
												<td>{{ transaction.get_selected_choice_format(transaction.pt_diabetes) == 'Yes' ? 1 : '0' }}</td>
												<td>{{ transaction.get_selected_choice_format(transaction.pt_tobacco) == 'Yes' ? 1 : '0' }}</td>
												<td>{{ transaction.get_selected_choice_format(transaction.pt_tcm) == 'Yes' ? 1 : '0' }}</td>
												<td>{{ transaction.get_provider_fullname }}</td>
                                                <td>{{ transaction.supervisingMD_firstname ~ ' ' ~ transaction.supervisingMD_lastname }}</td>
												<td>{{ transaction.get_date_format(transaction.pt_dateOfService) }}</td>
												<td>{{ transaction.get_tov_code(transaction.pt_tovID, transaction.pt_status) }}</td>
												<td>{{ POS_entity.get_pos_name(transaction.pt_tovID) }}</td>
												<td>{{ transaction.pt_icd10_codes }}</td>
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
	                                <textarea class="form-control" name="notes"></textarea>
	                            </div>
	                            
	             			</div>
	             			
	             			<div class="col-md-6">
	             			
	             				<p class="lead">Summary</p>
	             			
	             				<table class="table no-margin">
						
									<tbody>
										<tr>
											<th>99345</th>
											<td>INITIAL VISIT</td>
											<td>{{ summary['INITIAL_VISIT_HOME'] }}</td>
										</tr>
										
										<tr>
											<th>99349</th>
											<td>FOLLOW UP</td>
											<td>{{ summary['FOLLOW_UP_HOME'] }}</td>
										</tr>
										
										<tr>
											<th>99497</th>
											<td>ACP</td>
											<td>{{ summary['ACP'] }}</td>
										</tr>
										
										<tr>
											<th>G0108</th>
											<td>DM</td>
											<td>{{ summary['DM'] }}</td>
										</tr>
										
										<tr>
											<th>99407</th>
											<td>TOBACCO</td>
											<td>{{ summary['TOBACCO'] }}</td>
										</tr>
										
										<tr class="total">
											<th colspan="2">TOTAL</th>
											<th>{{ summary['total'] }}</th>
										</tr>
									</tbody>
									
								</table>
	             			
	             			</div>	             			
	             			
				 		</div>
	             		
	             		<div class="row no-print">
	          	
	                        <div class="col-xs-12 xrx-btn-handler">
	                            <button type="submit" id="generatePDF" name="submit_type" value="pdf" formtarget="_blank" class="btn btn-primary xrx-btn" style="margin-right: 5px;" disabled="true">
	                            <i class="fa fa-download"></i> Generate PDF
	                            </button>

	                            <button type="submit" id="billedBtn" name="submit_type" value="paid" class="btn btn-danger xrx-btn pull-right" style="margin-right: 5px;" disabled="true">
	                            <i class="fa fa-credit-card"></i> Visit Billed
	                            </button>
	                        </div>

	                    </div>

             		<form>

             	</section>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>

      </div>
{% endblock %}