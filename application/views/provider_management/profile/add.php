{% extends "main.php" %}

{% 
  set scripts = [
    'bower_components/select2/dist/js/select2.full.min',
    'plugins/input-mask/jquery.inputmask',
    'plugins/input-mask/jquery.inputmask.date.extensions',
    'plugins/input-mask/jquery.inputmask.extensions'
  ]
%}

{% set page_title = 'Add Provider' %}

{% block content %}
	<div class="row">
	  <div class="col-lg-6">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Add Provider</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							{{ form_open("", {"class": "xrx-form"}) }}
							
								<div class="row">
								
									<div class="col-md-12">
										<p class="lead">Personal Information</p>
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">First Name</label>
										<input type="text" class="form-control" name="provider_firstname">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Last Name</label>
										<input type="text" class="form-control" name="provider_lastname">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Phone Number</label>
										<input type="phone" class="form-control" name="provider_contactNum">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Email</label>
										<input type="email" class="form-control" name="provider_email">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Date of Birth</label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask name="provider_dateOfBirth">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Languages</label>
										<input type="text" class="form-control" name="provider_languages">
						                
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Areas</label>
										<input type="text" class="form-control" name="provider_areas">
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Address</label>
										<input type="text" class="form-control" name="provider_address">
										
									</div>
									
									<div class="col-md-12">
										<p class="lead subheader">Credentials</p>
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">National Provider Identifier</label>
										<input type="text" class="form-control" name="provider_npi">
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">DEA Registration Number</label>
										<input type="text" class="form-control" name="provider_dea">
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">License</label>
										<input type="text" class="form-control" name="provider_license">
										
									</div>
									
									<div class="col-md-12">
										<p class="lead subheader">Rates</p>
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">Initial Visit</label>
										<input type="text" class="form-control" name="provider_rate_initialVisit">
										
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">Follow-up Visit</label>
										<input type="text" class="form-control" name="provider_rate_followUpVisit">
										
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">Annual Wellness</label>
										<input type="text" class="form-control" name="provider_rate_aw">
										
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">ACP</label>
										<input type="text" class="form-control" name="provider_rate_acp">
										
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">No Show</label>
										<input type="text" class="form-control" name="provider_rate_noShow">
										
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">Others</label>
										<input type="text" class="form-control" name="provider_rate_others">
										
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">Mileage</label>
										<input type="text" class="form-control" name="provider_rate_mileage">
										
									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
					              		<button type="submit" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Add Provider
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