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
						
							{{ form_open("provider_management/profile/save/#{ record.provider_id }", {"class": "xrx-form"}) }}
							
								<div class="row">
								
									<div class="col-md-12">
										<p class="lead">Personal Information</p>
									</div>
									
									<div class="col-md-6 form-group">
									

										<label class="control-label">First Name <span>*</span></label>
										<input type="text" class="form-control" name="provider_firstname" value="{{ set_value('provider_firstname', record.provider_firstname) }}">

										
									</div>
									
									<div class="col-md-6 form-group">
									

										<label class="control-label">Last Name <span>*</span></label>
										<input type="text" class="form-control" name="provider_lastname" value="{{ set_value('provider_lastname', record.provider_lastname) }}">

										
									</div>
									
									<div class="col-md-6 form-group">
									

										<label class="control-label">Phone Number <span>*</span></label>
										<input type="phone" class="form-control" name="provider_contactNum" value="{{ set_value('provider_contactNum', record.provider_contactNum) }}">

										
									</div>
									
									<div class="col-md-6 form-group">
									

										<label class="control-label">Email <span>*</span></label>
										<input type="email" class="form-control" name="provider_email" value="{{ set_value('provider_email', record.provider_email) }}">

										
									</div>
									
                                    <div class="col-md-6 form-group">
									
										<label class="control-label">Gender <span>*</span></label>
										<select class="form-control" style="width: 100%;" name="gender" id="dob" required>
						                  <option selected="selected">Male</option>
						                  <option>Female</option>
						                </select>
						                
									</div>
                                    
									<div class="col-md-6 form-group">
									

										<label class="control-label">Date of Birth <span>*</span></label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask name="provider_dateOfBirth" value="{{ set_value('provider_dateOfBirth', record.provider_dateOfBirth) }}">

										
									</div>
									
									<div class="col-md-12 form-group">
									

										<label class="control-label">Languages <span>*</span></label>
										<input type="text" class="form-control" name="provider_languages" value="{{ set_value('provider_languages', record.provider_languages) }}">

						                
									</div>
									
									<div class="col-md-12 form-group">
									

										<label class="control-label">Areas <span>*</span></label>
										<input type="text" class="form-control" name="provider_areas" value="{{ set_value('provider_areas', record.provider_areas) }}">

										
									</div>
									
									<div class="col-md-12 form-group">
									

										<label class="control-label">Address <span>*</span></label>
										<input type="text" class="form-control" name="provider_address" value="{{ set_value('provider_address', record.provider_address) }}">

										
									</div>
									
									<div class="col-md-12">
										<p class="lead subheader">Credentials</p>
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">National Provider Identifier <span>*</span></label>
										<input type="text" class="form-control" name="provider_npi" value="{{ set_value('provider_npi', record.provider_npi) }}">
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">DEA Registration Number <span>*</span></label>
										<input type="text" class="form-control" name="provider_dea" value="{{ set_value('provider_dea', record.provider_dea) }}">
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">License <span>*</span></label>
										<input type="text" class="form-control" name="provider_license" value="{{ set_value('provider_license', record.provider_license) }}">
										
									</div>
									
									<div class="col-md-12">
										<p class="lead subheader">Rates</p>
									</div>
									
									<div class="col-md-4 form-group">
									

										<label class="control-label">Initial Visit <span>*</span></label>
										<input type="text" class="form-control" name="provider_rate_initialVisit" value="{{ set_value('provider_rate_initialVisit', record.provider_rate_initialVisit) }}">

										
									</div>
									
									<div class="col-md-4 form-group">
									

										<label class="control-label">Follow-up Visit <span>*</span></label>
										<input type="text" class="form-control" name="provider_rate_followUpVisit" value="{{ set_value('provider_rate_followUpVisit', record.provider_rate_followUpVisit) }}">

										
									</div>
									
									<div class="col-md-4 form-group">
									

										<label class="control-label">Annual Wellness <span>*</span></label>
										<input type="text" class="form-control" name="provider_rate_aw" value="{{ set_value('provider_rate_aw', record.provider_rate_aw) }}">

										
									</div>
									
									<div class="col-md-4 form-group">
									

										<label class="control-label">ACP <span>*</span></label>
										<input type="text" class="form-control" name="provider_rate_acp" value="{{ set_value('provider_rate_acp', record.provider_rate_acp) }}">

										
									</div>
									
									<div class="col-md-4 form-group">
									

										<label class="control-label">No Show <span>*</span></label>
										<input type="text" class="form-control" name="provider_rate_noShowPT" value="{{ set_value('provider_rate_noShowPT', record.provider_rate_noShowPT) }}">

										
									</div>
									
									<div class="col-md-4 form-group">
									

										<label class="control-label">Others <span>*</span></label>
										<input type="text" class="form-control" name="provider_rate_others" value="{{ set_value('provider_rate_others', record.provider_rate_others) }}">

										
									</div>
									
									<div class="col-md-4 form-group">
									

										<label class="control-label">Mileage <span>*</span></label>
										<input type="text" class="form-control" name="provider_rate_mileage" value="{{ set_value('provider_rate_mileage', record.provider_rate_mileage) }}">

										
									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
					              		<button type="submit" class="btn btn-primary xrx-btn">
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