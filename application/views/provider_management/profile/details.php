{% extends "main.php" %}

{% set page_title = 'Provider Details' %}

{% block content %}

<div class="row">
    
    <div class="col-lg-12">
    
        <div class="box">
    
            <div class="box-body">

                <section class="xrx-info">

                    <div class="row">

                        <div class="col-lg-12">
                            <h1 class="name">Kirtchik, Alexandra<small>Provider Name</small></h1>
                        </div>

                        <div class="col-md-4">
                            <p class="lead">Contact Information</p>

                            <div class="table-responsive">
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
                        
                        <div class="col-md-4">
                            <p class="lead">Basic Information</p>

                            <div class="table-responsive">
                                <table class="table xrx-table">
                                    <tr>
                                        <th>Date of Birth:</th>
                                        <td>04/07/1944</td>
                                    </tr>
                                    <tr>
                                        <th>Gender:</th>
                                        <td>Female</td>
                                    </tr>
                                    <tr>
                                        <th>Languages:</th>
                                        <td>English, Spanish, Filipino</td>
                                    </tr>
                                    <tr>
                                        <th>Areas:</th>
                                        <td>Downtown L.A.</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <p class="lead">Credentials</p>

                            <div class="table-responsive">
                                <table class="table xrx-table">
                                    <tr>
                                        <th>National Provider Identifier:</th>
                                        <td>N09909812-Jh818</td>
                                    </tr>
                                    <tr>
                                        <th>DEA Registration Number:</th>
                                        <td>09287615389109-918817-221</td>
                                    </tr>
                                    <tr>
                                        <th>License:</th>
                                        <td>0918230981Youq089</td>
                                    </tr>
                                </table>
                            </div>
                            
                        </div>

                    </div>
                    
                    <div class="row xrx-row-spacer">
             			<div class="col-md-12">
             				
             				<p class="lead">Rates</p>
             				
             				<table class="table no-margin table-striped">
								<thead>
									<tr>
										<th>Initial Visit</th>
										<th>Follow-up Visit</th>
										<th>Annual Wellness</th>
										<th>ACP</th>
										<th>No Show</th>
                                        <th>Mileage</th>
										<th>Others</th>
									</tr>
								</thead>
								
								<tbody>
									<tr>
										<td>$120.00</td>
										<td>$80.00</td>
										<td>$20.00</td>
										<td>$10.00</td>
                                        <td>$20.00</td>
										<td>10¢</td>
										<td>-</td>
									</tr>
								</tbody>
							</table>
             				
             			</div>
             		</div>

                </section>

            </div>
            
        </div>
        
    </div>
    
</div>

{% endblock %}