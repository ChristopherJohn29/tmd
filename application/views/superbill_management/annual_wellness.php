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
             						<td></td>
             					</tr>
             					<tr>
             						<th>Place of Service:</th>
             						<td></td>
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
										<th width="200px">Patient Name</th>
										<th>Medicare</th>
										<th>DOB</th>
										<th>Address</th>
										<th>Phone</th>
										<th>AW/IPPE</th>
										<th>Provider</th>
										<th>Date of Service</th>
										<th>Type of Visit</th>
										<th>ICD-Code Diagnoses</th>
									</tr>
								</thead>
								
								<tbody>
									<tr>
										<td>Tolentino, Lorna</td>
										<td>621547747M</td>
										<td>24/09/1930</td>
										<td>910 E. Harvard St., Apt. 2, Glendale, CA 91205-4501</td>
										<td>818.913.9139</td>
										<td>G0438</td>
										<td>Lilibeth Ramirez</td>
										<td>24/10/2018</td>
										<td>Do not bill</td>
										<td>E66.3,G20,F02.81,E78.2,I10,M15.0,R26.81,R53.1</td>
									</tr>
									
									<tr>
										<td>Tolentino, Lorna</td>
										<td>615492263M</td>
										<td>03/08/1937</td>
										<td>1761 WABASSO WAY, APT 103, GLENDALE, CA 91208-2567</td>
										<td>818.279.1965</td>
										<td>G0438</td>
										<td>Shohreh Nourollah</td>
										<td>22/10/2018</td>
										<td>Do not bill</td>
										<td>R26.81,F41.1,F32.5,.D64.4,E03.4,E78.2,R10.84,C26.1,F02.81,K21.9</td>
									</tr>
									
									<tr>
										<td>Tolentino, Lorna</td>
										<td>610120481M</td>
										<td>02/06/1937</td>
										<td>1559 WINONA BLVD., APT. 1A, LOS ANGELES, CA 90027-5029</td>
										<td>323.516.8391</td>
										<td>G0438</td>
										<td>Shohreh Nourollah</td>
										<td>22/10/2018</td>
										<td>Do not bill</td>
										<td>F03.90,E11.9,R26.81,R01.1,G30.9,I10,E55.0,I10,F41.1,J45.51,R42,F31.9</td>
									</tr>
									
									<tr>
										<td>Tolentino, Lorna</td>
										<td>610301666M</td>
										<td>03/03/1945</td>
										<td>4928 RUBIO AVE., ENCINO, CA 91436-1121</td>
										<td>310.944.2989</td>
										<td>G0439</td>
										<td>Zaydee Mercado</td>
										<td>22/10/2018</td>
										<td>Do not bill</td>
										<td>E11.9,M54.5,R53.1,R26.81,I10,E11.9,N40.1,F32.5,K21.9,G89.4</td>
									</tr>
									
									<tr>
										<td>Tolentino, Lorna</td>
										<td>566217745A</td>
										<td>16/04/1947</td>
										<td>11820 1/2 ALLIN ST., APT. 90, CULVER CITY, CA 90230-5724</td>
										<td>310.390.3560</td>
										<td>G0438</td>
										<td>Shohreh Nourollah</td>
										<td>22/10/2018</td>
										<td>Do not bill</td>
										<td>R26.81,F32.5,I10,E78.2,I25.3,F02.81,R32,M54.5</td>
									</tr>
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
                                <div class="xrx-btn-handler">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-check"></i> Add Note
                                </button></div>
                            </div>
                            
             			</div>
             			
             			<div class="col-md-6">
             			
             				<p class="lead">Summary</p>
             			
             				<table class="table no-margin">
					
								<tbody>
									<tr>
										<th>G0402</th>
										<td>IPPE</td>
										<td>0</td>
									</tr>
									
									<tr>
										<th>G0438</th>
										<td>AW – 8</td>
										<td>4</td>
									</tr>
									
									<tr>
										<th>G0439</th>
										<td>AW – 9</td>
										<td>1</td>
									</tr>
									
									<tr class="total">
										<th colspan="2">TOTAL</th>
										<th>5</th>
									</tr>
								</tbody>
							</table>
             			
             			</div>
             			
             			
			 		</div>
             		
             		<div class="row no-print">
          	
                        <div class="col-xs-12 xrx-btn-handler">
                            <a href="xindex.html" target="_blank" class="btn btn-primary xrx-btn"><i class="fa fa-print"></i> Print</a>

                            <button type="button" class="btn btn-primary xrx-btn" style="margin-right: 5px;">
                            <i class="fa fa-download"></i> Generate PDF
                            </button>

                            <button type="button" class="btn btn-danger xrx-btn pull-right" style="margin-right: 5px;">
                            <i class="fa fa-credit-card"></i> Paid
                            </button>
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