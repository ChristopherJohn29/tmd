{% extends "main.php" %}

{% 
  set scripts = [
    'bower_components/select2/dist/js/select2.full.min',
    'plugins/input-mask/jquery.inputmask',
    'plugins/input-mask/jquery.inputmask.date.extensions',
    'plugins/input-mask/jquery.inputmask.extensions',
    'dist/js/provider_management/profile/add'
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
						
							{{ form_open("provider_management/profile/save/add", {"class": "xrx-form"}) }}
							
								<div class="row">
								
									<div class="col-md-12">
										<p class="lead">Personal Information</p>
									</div>
									
									<div class="col-md-6 form-group">
									

										<label class="control-label">First Name <span>*</span></label>
										<input type="text" class="form-control" name="provider_firstname" required="true" value="{{ set_value('provider_firstname') }}">

										
									</div>
									
									<div class="col-md-6 form-group">
									

										<label class="control-label">Last Name <span>*</span></label>
										<input type="text" class="form-control" name="provider_lastname" required="true" value="{{ set_value('provider_lastname') }}">

										
									</div>
									
									<div class="col-md-6 form-group">
									

										<label class="control-label">Phone Number <span>*</span></label>
										<input type="phone" class="form-control" name="provider_contactNum" required="true" value="{{ set_value('provider_contactNum') }}">

										
									</div>
									
									<div class="col-md-6 form-group">
									

										<label class="control-label">Email <span>*</span></label>
										<input type="email" class="form-control" name="provider_email" required="true" value="{{ set_value('provider_email') }}">

										
									</div>
									
                                    <div class="col-md-6 form-group">
									
										<label class="control-label">Gender <span>*</span></label>
										<select class="form-control" style="width: 100%;" name="provider_gender" id="dob" required="true">
											<option value="" selected="true">Please select</option>
						                  	<option value="Male">Male</option>
						                  	<option value="Female">Female</option>
						                </select>
						                
									</div>
                                    
									<div class="col-md-6 form-group">
									

										<label class="control-label">Date of Birth <span>*</span></label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask name="provider_dateOfBirth" required="true" value="{{ set_value('provider_dateOfBirth') }}">

										
									</div>
									
									<div class="col-md-12 form-group">
									

										<label class="control-label">Languages <span>*</span></label>
										<input type="text" class="form-control" name="provider_languages" required="true" value="{{ set_value('provider_languages') }}">

						                
									</div>
									
									<div class="col-md-12 form-group">
									

										<label class="control-label">Areas <span>*</span></label>
										<input type="text" class="form-control" name="provider_areas" required="true" value="{{ set_value('provider_areas') }}">

										
									</div>
									
									<div class="col-md-12 form-group">
									

										<label class="control-label">Address <span>*</span></label>
										<input type="text" class="form-control" name="provider_address" required="true" value="{{ set_value('provider_address') }}">

										
									</div>
									
									<div class="col-md-12">
										<p class="lead subheader">Credentials</p>
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">National Provider Identifier <span>*</span></label>
										<input type="text" class="form-control" name="provider_npi" required="true" value="{{ set_value('provider_npi') }}">
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">DEA Registration Number <span>*</span></label>
										<input type="text" class="form-control" name="provider_dea" required="true" value="{{ set_value('provider_dea') }}">
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">License <span>*</span></label>
										<input type="text" class="form-control" name="provider_license" required="true" value="{{ set_value('provider_license') }}">
										
									</div>
									
									<div class="col-md-12">
										<p class="lead subheader">Rates</p>
									</div>
									
									<div class="col-md-4 form-group">
									

										<label class="control-label">Initial Visit <span>*</span></label>
										<input type="text" class="form-control" name="provider_rate_initialVisit" required="true" value="{{ set_value('provider_rate_initialVisit') }}">

										
									</div>
									
									<div class="col-md-4 form-group">
									

										<label class="control-label">Follow-up Visit <span>*</span></label>
										<input type="text" class="form-control" name="provider_rate_followUpVisit" required="true" value="{{ set_value('provider_rate_followUpVisit') }}">

										
									</div>
									
									<div class="col-md-4 form-group">
									

										<label class="control-label">Annual Wellness <span>*</span></label>
										<input type="text" class="form-control" name="provider_rate_aw" required="true" value="{{ set_value('provider_rate_aw') }}">

										
									</div>
									
									<div class="col-md-4 form-group">
									

										<label class="control-label">ACP <span>*</span></label>
										<input type="text" class="form-control" name="provider_rate_acp" required="true" value="{{ set_value('provider_rate_acp') }}">

										
									</div>
									
									<div class="col-md-4 form-group">
									

										<label class="control-label">No Show <span>*</span></label>
										<input type="text" class="form-control" name="provider_rate_noShowPT" required="true" value="{{ set_value('provider_rate_noShowPT') }}">

										
									</div>
									
									<div class="col-md-4 form-group">
									

										<label class="control-label">Others <span>*</span></label>
										<input type="text" class="form-control" name="provider_rate_others" required="true" value="{{ set_value('provider_rate_others') }}">

										
									</div>
									
									<div class="col-md-4 form-group">
									

										<label class="control-label">Mileage <span>*</span></label>
										<input type="text" class="form-control" name="provider_rate_mileage" required="true" value="{{ set_value('provider_rate_mileage') }}">

										
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