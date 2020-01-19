{% extends "main.php" %}

{% set page_title = 'CPO-485' %}

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
             			<div class="col-md-12">
             				<h1 class="name">CP0-485<small>Superbill</small></h1>
             			</div>
             			
             			<div class="col-md-6">
             				
             				<table class="table xrx-table">
             					<tr>
             						<th>Date Billed:</th>
             						<td>{{ date_billed }}</td>
             					</tr>
             					<tr>
             						<th>Date Period:</th>
             						<td>{{ datePeriod }}</td>
             					</tr>
             				</table>
             			</div>
             		</div>
         			
         			{{ form_open("superbill_management/superbill/form/cpo/#{ fromDate|replace({'/': '_'}) }/#{ toDate|replace({'/': '_'}) }") }}

	             		<div class="row xrx-row-spacer">
	             		
	             			<div class="col-md-12">
	             			
	             				<p class="lead">Transactions</p>
	             				<div class="table-responsive">
	             				   <table class="table no-margin table-striped">
									<thead>
										<tr>
											<th><input type="checkbox" id="checkAll"></th>
											<th width="200px">Patient Name</th>
											<th>Medicare</th>
											<th>ICD-Code Diagnoses</th>
											<th>Supervising MD</th>
                                            <th></th>
											<th>Cert Period</th>
											<th>485 Date Signed</th>
											<th>1st Month CPO</th>
											<th>2nd Month CPO</th>
											<th>3rd Month CPO</th>
											<th>Discharge Date</th>
										</tr>
									</thead>
									
									<tbody>

										{% for index, transaction in transactions %}
											{% set borderTopStyle = '1px solid #d2d6de !important;' %}

											<tr>
												<td>
													<input type="checkbox" class="superbill_checkboxes" name="ptcpo_id[]" value="{{ transaction['ptcpo_id'] }}">
												</td>
												{% if index > 0 and attribute(transactions, index - 1).patient_name == 	transaction['patient_name'] %}
													{% set borderTopStyle = 'border-top: 0 !important;' %}

													<td style="{{ borderTopStyle }}"></td>
													<td style="{{ borderTopStyle }}"></td>
													<td style="{{ borderTopStyle }}"></td>
												{% else %}
													<td style="{{ borderTopStyle }}">{{ transaction['patient_name'] }}</td>
													<td style="{{ borderTopStyle }}">{{ transaction['medicare'] }}</td>
													<td style="{{ borderTopStyle }}">{{ transaction['icd10'] }}</td>
												{% endif %}
                                                <td>{{ transaction.supervisingMD_fullname }}</td>
												<td style="{{ borderTopStyle }}">{{ transaction['status'] }}</td>
												<td style="{{ borderTopStyle }}">{{ transaction['cert_Period'] }}</td>
												<td style="{{ borderTopStyle }}">{{ transaction['date_Signed'] }}</td>
												<td style="{{ borderTopStyle }}">{{ transaction['first_Month_CPO'] }}</td>
												<td style="{{ borderTopStyle }}">{{ transaction['second_Month_CPO'] }}</td>
												<td style="{{ borderTopStyle }}">{{ transaction['third_Month_CPO'] }}</td>
												<td style="{{ borderTopStyle }}">{{ transaction['discharge_Date'] }}</td>
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
											<th>G0180</th>
											<td>Certification</td>
											<td>{{ summary['certification'] }}</td>
										</tr>
										
										<tr>
											<th>G0181</th>
											<td>1st Month CPO</td>
											<td>{{ summary['first_Month_CPO'] }}</td>
										</tr>
										
										<tr>
											<th>G0181</th>
											<td>2nd Month CPO</td>
											<td>{{ summary['second_Month_CPO'] }}</td>
										</tr>
										
										<tr>
											<th>G0181</th>
											<td>3rd Month CPO</td>
											<td>{{ summary['third_Month_CPO'] }}</td>
										</tr>

										<tr>
											<th>G0179</th>
											<td>Recertification</td>
											<td>{{ summary['recertification'] }}</td>
										</tr>

										<tr>
											<th>G0181</th>
											<td>1st Month CPO</td>
											<td>{{ summary['Refirst_Month_CPO'] }}</td>
										</tr>
										
										<tr>
											<th>G0181</th>
											<td>2nd Month CPO</td>
											<td>{{ summary['Resecond_Month_CPO'] }}</td>
										</tr>
										
										<tr>
											<th>G0181</th>
											<td>3rd Month CPO</td>
											<td>{{ summary['Rethird_Month_CPO'] }}</td>
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
	                            <button type="submit" id="generatePDF" value="pdf" name="submit_type" class="btn btn-primary xrx-btn" style="margin-right: 5px;" disabled="true">
	                            	<i class="fa fa-download"></i> Generate PDF
	                            </button>

	                            <button type="submit" id="billedBtn" value="paid" name="submit_type" class="btn btn-danger xrx-btn pull-right" style="margin-right: 5px;" disabled="true">
	                            	<i class="fa fa-credit-card"></i> Billed
	                            </button>
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