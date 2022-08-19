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
             		
             		
					
				
             		
             		
             		
             	</section>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>

      </div>
{% endblock %}