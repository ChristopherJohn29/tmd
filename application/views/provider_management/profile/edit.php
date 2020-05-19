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
	  <div class="col-lg-8">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Update Provider</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							{{ form_open("provider_management/profile/save/edit/#{ record.provider_id }", {"class": "xrx-form"}) }}
							
								<div class="row">
								
									<div class="col-md-12">
										<p class="lead">Personal Information</p>
									</div>
									
									<div class="col-md-6 {{ form_error('provider_firstname') ? 'has-error' : '' }}">
									

										<label class="control-label">First Name <span>*</span></label>
										<input type="text" class="form-control" name="provider_firstname" value="{{ set_value('provider_firstname', record.provider_firstname) }}">

										
									</div>
									
									<div class="col-md-6 {{ form_error('provider_lastname') ? 'has-error' : '' }}">
									

										<label class="control-label">Last Name <span>*</span></label>
										<input type="text" class="form-control" name="provider_lastname" value="{{ set_value('provider_lastname', record.provider_lastname) }}">

										
									</div>

									<div class="col-md-6 has-error">
										<span class="help-block">{{ form_error('provider_firstname') }}</span>
									</div>

									<div class="col-md-6 has-error">
										<span class="help-block">{{ form_error('provider_lastname') }}</span>
									</div>
									
									<div class="col-md-6 {{ form_error('provider_contactNum') ? 'has-error' : '' }}">
									

										<label class="control-label">Phone Number <span>*</span></label>
										<input type="phone" class="form-control" name="provider_contactNum" value="{{ set_value('provider_contactNum', record.provider_contactNum) }}">

										
									</div>
									
									<div class="col-md-6 {{ form_error('provider_email') ? 'has-error' : '' }}">
									

										<label class="control-label">Email <span>*</span></label>
										<input type="email" class="form-control" name="provider_email" value="{{ set_value('provider_email', record.provider_email) }}">

										
									</div>

									<div class="col-md-6 has-error">
										<span class="help-block">{{ form_error('provider_contactNum') }}</span>
									</div>

									<div class="col-md-6 has-error">
										<span class="help-block">{{ form_error('provider_email') }}</span>
									</div>
									
                                    <div class="col-md-6 {{ form_error('provider_gender') ? 'has-error' : '' }}">
									
										<label class="control-label">Gender</label>
										<select class="form-control" style="width: 100%;" name="provider_gender" id="dob">
											<option value="">Select</option>
						                  	<option value="Male" {{ record.get_selected_gender('Male') }}>Male</option>
						                  	<option value="Female" {{ record.get_selected_gender('Female') }}>Female</option>
						                </select>
						                
									</div>
                                    
									<div class="col-md-6 {{ form_error('provider_dateOfBirth') ? 'has-error' : '' }}">
									

										<label class="control-label">Date of Birth</label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask name="provider_dateOfBirth" value="{{ set_value('provider_dateOfBirth', record.get_date_format(record.provider_dateOfBirth)) }}">

										
									</div>

									<div class="col-md-6 has-error">
										<span class="help-block">{{ form_error('provider_gender') }}</span>
									</div>

									<div class="col-md-6 has-error">
										<span class="help-block">{{ form_error('provider_dateOfBirth') }}</span>
									</div>
									
									<div class="col-md-12 {{ form_error('provider_languages') ? 'has-error' : '' }}">
									

										<label class="control-label">Languages</label>
										<input type="text" class="form-control" name="provider_languages" value="{{ set_value('provider_languages', record.provider_languages) }}">

						                
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('provider_languages') }}</span>
									</div>
									
									<div class="col-md-12 {{ form_error('provider_areas') ? 'has-error' : '' }}">
									

										<label class="control-label">Areas</label>
										<input type="text" class="form-control" name="provider_areas" value="{{ set_value('provider_areas', record.provider_areas) }}">

										
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('provider_areas') }}</span>
									</div>
									
									<div class="col-md-12 {{ form_error('provider_address') ? 'has-error' : '' }}">

										<label class="control-label">Address <span>*</span></label>
										<input type="text" class="form-control" name="provider_address" value="{{ set_value('provider_address', record.provider_address) }}">

									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('provider_address') }}</span>
									</div>

									<div class="col-md-12">
										<input type="checkbox" name="provider_supervising_MD" id="provider_supervising_MD" value="1" {{ record.get_selected_supervising_MD('1') }}>
										<label class="control-label" for="provider_supervising_MD" style="vertical-align: 3px;">Assign as Supervising MD</label>
									</div>
									
									<div class="col-md-12">
										<p class="lead subheader">Credentials</p>
									</div>
									
									<div class="col-md-12 {{ form_error('provider_npi') ? 'has-error' : '' }}">
									
										<label class="control-label">National Provider Identifier</label>
										<input type="text" class="form-control" name="provider_npi" value="{{ set_value('provider_npi', record.provider_npi) }}">
										
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('provider_npi') }}</span>
									</div>
									
									<div class="col-md-12 {{ form_error('provider_dea') ? 'has-error' : '' }}">
									
										<label class="control-label">DEA Registration Number</label>
										<input type="text" class="form-control" name="provider_dea" value="{{ set_value('provider_dea', record.provider_dea) }}">
										
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('provider_dea') }}</span>
									</div>
									
									<div class="col-md-12 {{ form_error('provider_license') ? 'has-error' : '' }}">
									
										<label class="control-label">License</label>
										<input type="text" class="form-control" name="provider_license" value="{{ set_value('provider_license', record.provider_license) }}">
										
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('provider_license') }}</span>
									</div>
									
									<div class="col-md-12">
										<p class="lead subheader">Rates</p>
									</div>
									
									<div class="col-md-3 {{ form_error('provider_rate_initialVisit') ? 'has-error' : '' }}">
									

										<label class="control-label">Initial Visit <span>*</span></label>
										<input type="text" required="true" class="form-control" name="provider_rate_initialVisit" value="{{ set_value('provider_rate_initialVisit', record.provider_rate_initialVisit) }}">

										
									</div>

									<div class="col-md-3 {{ form_error('provider_rate_initialVisit_TeleHealth') ? 'has-error' : '' }}">
									

										<label class="control-label">Initial Visit TeleHealth</label>
										<input type="text" class="form-control" name="provider_rate_initialVisit_TeleHealth" value="{{ set_value('provider_rate_initialVisit_TeleHealth', record.provider_rate_initialVisit_TeleHealth) }}">

										
									</div>
									
									<div class="col-md-3 {{ form_error('provider_rate_followUpVisit') ? 'has-error' : '' }}">
									

										<label class="control-label">Follow-up Visit <span>*</span></label>
										<input type="text" required="true" class="form-control" name="provider_rate_followUpVisit" value="{{ set_value('provider_rate_followUpVisit', record.provider_rate_followUpVisit) }}">

										
									</div>

									<div class="col-md-3 {{ form_error('provider_rate_followUpVisit_TeleHealth') ? 'has-error' : '' }}">
									
										<label class="control-label">Follow-up Visit TeleHealth</label>

										<input type="text" class="form-control" name="provider_rate_followUpVisit_TeleHealth" value="{{ set_value('provider_rate_followUpVisit_TeleHealth', record.provider_rate_followUpVisit_TeleHealth) }}">

										
									</div>

									<div class="col-md-3 has-error">
										<span class="help-block">{{ form_error('provider_rate_initialVisit') }}</span>
									</div>

									<div class="col-md-3 has-error">
										<span class="help-block">{{ form_error('provider_rate_initialVisit_TeleHealth') }}</span>
									</div>

									<div class="col-md-3 has-error">
										<span class="help-block">{{ form_error('provider_rate_followUpVisit_TeleHealth') }}</span>
									</div>

									<div class="col-md-3 has-error">
										<span class="help-block">{{ form_error('provider_rate_followUpVisit') }}</span>
									</div>
									
									<div class="col-md-3 {{ form_error('provider_rate_aw') ? 'has-error' : '' }}">
									

										<label class="control-label">Annual Wellness <span>*</span></label>
										<input type="text" required="true" class="form-control" name="provider_rate_aw" value="{{ set_value('provider_rate_aw', record.provider_rate_aw) }}">

										
									</div>
									
									<div class="col-md-3 {{ form_error('provider_rate_acp') ? 'has-error' : '' }}">
									

										<label class="control-label">ACP <span>*</span></label>
										<input type="text" required="true" class="form-control" name="provider_rate_acp" value="{{ set_value('provider_rate_acp', record.provider_rate_acp) }}">

										
									</div>
									
									<div class="col-md-3 {{ form_error('provider_rate_noShowPT') ? 'has-error' : '' }}">
									

										<label class="control-label">No Show <span>*</span></label>
										<input type="text" required="true" class="form-control" name="provider_rate_noShowPT" value="{{ set_value('provider_rate_noShowPT', record.provider_rate_noShowPT) }}">

										
									</div>
									
									<div class="col-md-3 {{ form_error('provider_rate_mileage') ? 'has-error' : '' }}">
									

										<label class="control-label">Mileage <span>*</span></label>
										<input type="text" required="true" class="form-control" name="provider_rate_mileage" value="{{ set_value('provider_rate_mileage', record.provider_rate_mileage) }}">

										
									</div>

									<div class="col-md-3 has-error">
										<span class="help-block">{{ form_error('provider_rate_aw') }}</span>
									</div>

									<div class="col-md-3 has-error">
										<span class="help-block">{{ form_error('provider_rate_acp') }}</span>
									</div>

									<div class="col-md-3 has-error">
										<span class="help-block">{{ form_error('provider_rate_noShowPT') }}</span>
									</div>

									<div class="col-md-3 has-error">
										<span class="help-block">{{ form_error('provider_rate_mileage') }}</span>
									</div>
									
									<div class="col-md-12 xrx-btn-handler">
                                        <a href="{{ site_url('provider_management/profile') }}" class="btn btn-default xrx-btn cancel">
											Cancel
										</a>
                                        
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