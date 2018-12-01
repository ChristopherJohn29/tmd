{% extends "main.php" %}

{% 
  set scripts = [
    'bower_components/select2/dist/js/select2.full.min',
    'plugins/input-mask/jquery.inputmask',
    'plugins/input-mask/jquery.inputmask.date.extensions',
    'plugins/input-mask/jquery.inputmask.extensions'
  ]
%}

{% set page_title = 'Update Provider' %}

{% block content %}
	<div class="row">
	  <div class="col-lg-6">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Update Provider</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							<form class="xrx-form">
							
								<div class="row">
								
									<div class="col-md-12">
										<p class="lead">Personal Information</p>
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">First Name</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Last Name</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Phone Number</label>
										<input type="phone" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Email</label>
										<input type="email" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Date of Birth</label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Languages</label>
										<input type="text" class="form-control" id="" placeholder="">
						                
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Areas</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Address</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-12">
										<p class="lead subheader">Credentials</p>
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">National Provider Identifier</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">DEA Registration Number</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">License</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-12">
										<p class="lead subheader">Rates</p>
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">Initial Visit</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">Follow-up Visit</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">Annual Wellness</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">ACP</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">No Show</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">Others</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">Mileage</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
					              		<button type="button" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Update Provider
										</button>
					              	</div>
								
								</div>
								
							</form>
							
						</div>
					</div>
				</div>
            
          </div>
          <!-- /.box -->

      	</div>
      </div>
{% endblock %}