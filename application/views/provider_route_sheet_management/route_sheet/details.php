{% extends "main.php" %}

{% set page_title = 'Route Details' %}

{% block content %}
	 <div class="row">
        <div class="col-md-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              
             	<section class="xrx-info">
             		
             		<div class="row">
             			<div class="col-md-12">
             				<h1 class="name rs">Alexandra Kirtchik<small>Date of Service: November 23, 2018</small></h1>
             			</div>
             		</div>
             		
             		<div class="row">
             			<div class="col-md-12">
             				
             				<p class="lead">Route Sheet</p>
                            
             				<div class="table-responsive">
             				   <table id="" class="table no-margin table-striped">
								<thead>
									<tr>
										<th>Time</th>
										<th>Patient's Info</th>
										<th>Home Health Info</th>
										<th>Notes</th>
									</tr>
								</thead>
								
								<tbody>
									<tr>
										<td>9 AM - 11 AM</td>
										<td><b>Lorna Tolentino</b><br>910 E. Harvard St., Apt. 2, Glendale, CA 91205-4501<br>818.913.9139</td>
										<td><b>Advance Home Care</b><br>Seda<br>818 848 2100</td>
										<td>Type of Visit : Initial Visit w/ AW<br>Other Notes: Call the son first 818-498-6000</td>
									</tr>
									
									<tr>
										<td>11 AM - 12 PM</td>
										<td><b>Lorna Tolentino</b><br>910 E. Harvard St., Apt. 2, Glendale, CA 91205-4501<br>818.913.9139</td>
										<td><b>Advance Home Care</b><br>Seda<br>818 848 2100</td>
										<td>Type of Visit : Initial Visit w/ AW<br>Other Notes: Call the son first 818-498-6000</td>
									</tr>
									
									<tr>
										<td>12 PM - 2 PM</td>
										<td><b>Lorna Tolentino</b><br>910 E. Harvard St., Apt. 2, Glendale, CA 91205-4501<br>818.913.9139</td>
										<td><b>Advance Home Care</b><br>Seda<br>818 848 2100</td>
										<td>Type of Visit : Initial Visit w/ AW<br>Other Notes: Call the son first 818-498-6000</td>
									</tr>
									
									<tr>
										<td>2 PM - 3 PM</td>
										<td><b>Lorna Tolentino</b><br>910 E. Harvard St., Apt. 2, Glendale, CA 91205-4501<br>818.913.9139</td>
										<td><b>Advance Home Care</b><br>Seda<br>818 848 2100</td>
										<td>Type of Visit : Initial Visit w/ AW<br>Other Notes: Call the son first 818-498-6000</td>
									</tr>
									
									<tr>
										<td>3 PM - 5 PM</td>
										<td><b>Lorna Tolentino</b><br>910 E. Harvard St., Apt. 2, Glendale, CA 91205-4501<br>818.913.9139</td>
										<td><b>Advance Home Care</b><br>Seda<br>818 848 2100</td>
										<td>Type of Visit : Initial Visit w/ AW<br>Other Notes: Call the son first 818-498-6000</td>
									</tr>
								</tbody>
							</table>
                            </div>
             			</div>
             		</div>
             		
             
					<div class="row no-print">
          	
					<div class="col-xs-12 xrx-btn-handler">
						<a href="xindex.html" target="_blank" class="btn btn-primary xrx-btn"><i class="fa fa-print"></i> Print</a>
						
						<button type="button" class="btn btn-success xrx-btn" style="margin-right: 5px;">
						<i class="fa fa-download"></i> Generate PDF
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