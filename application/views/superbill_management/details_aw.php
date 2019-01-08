{% extends "main.php" %}

{% set page_title = 'Annual Wellness' %}

{% block content %}
	<div class="row">
        <div class="col-md-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              
             	<section class="xrx-info">
             		
             		<div class="row">
             			<div class="col-md-12">
             				<h1 class="name">Annual Wellness<small>Superbill</small></h1>
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
             		
             		<div class="row xrx-row-spacer">
             		
             			<div class="col-md-12">
             			
             				<p class="lead">Transactions</p>
             				<div class="table-responsive">
             				   <table id="all-patient-list" class="table no-margin table-striped">
									<thead>
										<tr>
											<td></td>
											<th width="200px">Patient Name</th>
											<th>Medicare</th>
											<th>DOB</th>
											<th>Address</th>
											<th>Phone</th>
											<th>AW/IPPE</th>
											<th>Provider</th>
											<th>Date of Service</th>
											<th>Place of Service</th>
											<th>ICD-Code Diagnoses</th>
										</tr>
									</thead>
									
									<tbody>

										{% for transaction in transaction_entity.has_selected_aw_ippe_list(transactions) %}

											<tr>
												<td class="text-center">{{ loop.index }}</td>
												<td>{{ transaction.patient_name }}</td>
												<td>{{ transaction.patient_medicareNum }}</td>
												<td>{{ transaction.get_date_format(transaction.patient_dateOfBirth) }}</td>
												<td>{{ transaction.patient_address }}</td>
												<td>{{ transaction.patient_phoneNum }}</td>
												<td>{{ transaction.pt_aw_ippe_code }}</td>
												<td>{{ transaction.get_provider_fullname }}</td>
												<td>{{ transaction.get_date_format(transaction.pt_dateOfService) }}</td>
												<td>{{ POS_entity.get_pos_name(transaction.patient_placeOfService) }}</td>
												<td>{{ transaction.pt_icd10_codes }}</td>
											</tr>

										{% endfor %}

									</tbody>
								</table>
                            </div>
             			</div>
             		</div>

             		<form>
             		
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
											<th>G0402</th>
											<td>IPPE</td>
											<td>{{ summary['AW_CODES_G0402'] }}</td>
										</tr>
										
										<tr>
											<th>G0438</th>
											<td>AW – 8</td>
											<td>{{ summary['AW_CODE_G0438'] }}</td>
										</tr>
										
										<tr>
											<th>G0439</th>
											<td>AW – 9</td>
											<td>{{ summary['AW_CODE_G0439'] }}</td>
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
	                            <button type="submit" class="btn btn-primary xrx-btn" value="pdf" formtarget="_blank" style="margin-right: 5px;">
	                            <i class="fa fa-download"></i> Generate PDF
	                            </button>

	                            <button type="submit" class="btn btn-danger xrx-btn pull-right" value="paid" style="margin-right: 5px;">
	                            <i class="fa fa-credit-card"></i> Paid
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