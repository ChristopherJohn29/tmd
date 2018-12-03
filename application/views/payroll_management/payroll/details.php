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
             				<h1 class="name">Alexandra Kirtchik<small>Pay Period: November 1 - 15, 2018</small></h1>
             			</div>
             			
             			<div class="col-md-6">
             				<p class="lead">Contact Information</p>
             				
             				<table class="table xrx-table">
             					<tr>
             						<th>Address:</th>
             						<td>38 Poplar St., Watsonville, CA 95076</td>
             					</tr>
             					<tr>
             						<th>Phone:</th>
             						<td>202-555-0162</td>
             					</tr>
             					<tr>
             						<th>Email:</th>
             						<td>alexandra.kirtchik@email.com</td>
             					</tr>
             				</table>
             			</div>
             		</div>
             		
             		<div class="row xrx-row-spacer">
             		
             			<div class="col-md-12">
             			
             				<p class="lead">Transactions</p>
             				
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
									<tr>
										<td>10/27/2018</td>
										<td>Initial Visit (Home)</td>
										<td>Yes</td>
										<td>Yes</td>
										<td>Charito Solis</td>
										<td>22</td>
									</tr>
									<tr>
										<td>10/27/2018</td>
										<td>Follow-Up Visit</td>
										<td>Yes</td>
										<td>Yes</td>
										<td>Charito Solis</td>
										<td>14</td>
									</tr>
									<tr>
										<td>10/27/2018</td>
										<td>Initial Visit (Home)</td>
										<td>Yes</td>
										<td>Yes</td>
										<td>Charito Solis</td>
										<td>9</td>
									</tr>
									<tr>
										<td>10/27/2018</td>
										<td>Initial Visit (Home)</td>
										<td>Yes</td>
										<td>Yes</td>
										<td>Charito Solis</td>
										<td>31</td>
									</tr>
									<tr>
										<td>10/27/2018</td>
										<td>Follow-Up Visit</td>
										<td>Yes</td>
										<td>Yes</td>
										<td>Charito Solis</td>
										<td>50</td>
									</tr>
									<tr>
										<td>10/27/2018</td>
										<td>No Show</td>
										<td>-</td>
										<td>-</td>
										<td>Charito Solis</td>
										<td>-</td>
									</tr>
									<tr>
										<td>10/27/2018</td>
										<td>Follow-Up Visit</td>
										<td>Yes</td>
										<td>Yes</td>
										<td>Charito Solis</td>
										<td>20</td>
									</tr>
									<tr>
										<td>10/27/2018</td>
										<td>Cancelled</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
									</tr>
									<tr>
										<td>10/27/2018</td>
										<td>Initial Visit (Home)</td>
										<td>Yes</td>
										<td>Yes</td>
										<td>Charito Solis</td>
										<td>20</td>
									</tr>
									<tr>
										<td>10/27/2018</td>
										<td>Follow-Up Visit</td>
										<td>Yes</td>
										<td>Yes</td>
										<td>Charito Solis</td>
										<td>35</td>
									</tr>
									<tr>
										<td>10/27/2018</td>
										<td>Follow-Up Visit</td>
										<td>Yes</td>
										<td>Yes</td>
										<td>Charito Solis</td>
										<td>10</td>
									</tr>
								</tbody>
								
							</table>
					
             			</div>
             		</div>
             		
             		
					
					<div class="row xrx-row-spacer">
					
             			<div class="col-md-6">
             				<p class="lead">Notes</p>
             				
             				<p class="text-muted well well-sm no-shadow">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							
             			</div>
             			
             			<div class="col-md-6">
             			
             				<p class="lead">Payment Summary</p>
             			
             				<table class="table no-margin">
								<thead>
									<tr>
										<th>Description</th>
										<th>Quantity</th>
										<th>Amount</th>
										<th>Total Amount</th>
									</tr>
								</thead>
								
								<tbody>
									<tr>
										<th>Initial Visit (Home)</th>
										<td>4</td>
										<td>$120</td>
										<td>$480</td>
									</tr>
									<tr>
										<th>Initial Visit (Facility)</th>
										<td>-</td>
										<td>-</td>
										<td>-</td>
									</tr>
									<tr>
										<th>Follow-Up Visit (Home)</th>
										<td>5</td>
										<td>$80</td>
										<td>$400</td>
									</tr>
									<tr>
										<th>No Show</th>
										<td>1</td>
										<td>$20</td>
										<td>$20</td>
									</tr>
									<tr>
										<th>AW / IPPE</th>
										<td>9</td>
										<td>$20</td>
										<td>$180</td>
									</tr>
									<tr>
										<th>ACP</th>
										<td>9</td>
										<td>$10</td>
										<td>$90</td>
									</tr>
									<tr>
										<th>Mileage</th>
										<td>211</td>
										<td>$.10</td>
										<td>$21.10</td>
									</tr>
									<tr>
										<th>Others</th>
										<td>-</td>
										<td>-</td>
										<td>-</td>
									</tr>
									<tr class="total">
										<th colspan="3">Total</th>
										<td>$1,191.10</td>
									</tr>
								</tbody>
								
							</table>
             			
             			</div>
             			
             			
			 		</div>
             		
             		<div class="row no-print">
          	
                        <div class="col-xs-12 xrx-btn-handler">
                            <div>
                                <a href="xindex.html" target="_blank" class="btn btn-primary xrx-btn"><i class="fa fa-print"></i> Print</a>

                                <button type="button" class="btn btn-success xrx-btn" style="margin-right: 5px;">
                                <i class="fa fa-download"></i> Generate PDF
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