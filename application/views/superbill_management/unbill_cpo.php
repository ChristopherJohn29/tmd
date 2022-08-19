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
             						<td>{{ date_billed|replace({'_': '/'}) }}</td>
             					</tr>
             					<tr>
             						<th>Date Period:</th>
             						<td>{{ datePeriod }}</td>
             					</tr>
             				</table>
             			</div>
             		</div>
         			
         			{{ form_open("superbill_management/superbill/form_unbill/cpo/#{ fromDate|replace({'/': '_'}) } ") }}

	             		<div class="row xrx-row-spacer">
	             		
	             			<div class="col-md-12">
	             			
	             				<p class="lead">Transactions</p>
	             				<div class="table-responsive">
	             				   <table class="table no-margin table-striped">
									<thead>
										<tr>
											<th><input type="checkbox" id="checkAll"></th>
											<th width="200px">Patient Name</th>
											<th>Supervising MD</th>
											<th>Cert Period</th>
											<th>485 Date Signed</th>
											<th>Discharge Date</th>
											<th>Billed Date</th>
											
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
													<td style="{{ borderTopStyle }}"></td>
													<td style="{{ borderTopStyle }}"></td>
												{% else %}
													<td style="{{ borderTopStyle }}">{{ transaction['patient_name'] }}</td>
													<td style="{{ borderTopStyle }}">{{ transaction.supervisingMD_fullname }}</td>
													<td style="{{ borderTopStyle }}">{{ transaction['cert_Period'] }}</td>
													<td style="{{ borderTopStyle }}">{{ transaction['date_Signed'] }}</td>
													<td style="{{ borderTopStyle }}">{{ transaction['discharge_Date'] }}</td>

												{% endif %}
												<td style="{{ borderTopStyle }}">{{ date_billed|replace({'_': '/'}) }}</td>
                                                
											</tr>

										{% endfor %}

									</tbody>
								</table>
	                            </div>
	             			</div>
	             		</div>
					
			
	             		
	             		<div class="row no-print">
	          	
	                        <div class="col-xs-12 xrx-btn-handler">
	                            <!-- <button type="submit" id="generatePDF" value="pdf" name="submit_type" class="btn btn-primary xrx-btn" style="margin-right: 5px;" disabled="true">
	                            	<i class="fa fa-download"></i> Generate PDF
	                            </button> -->

	                            <button type="submit" id="billedBtn" value="paid" name="submit_type" class="btn btn-danger xrx-btn pull-right unbill-btn" style="margin-right: 5px;" disabled="true">
	                            	<i class="fa fa-credit-card"></i> UNBILL
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