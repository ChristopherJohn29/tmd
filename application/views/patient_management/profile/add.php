{% extends "main.php" %}

{% 
  set scripts = [
    'plugins/input-mask/jquery.inputmask',
    'plugins/input-mask/jquery.inputmask.date.extensions',
    'plugins/input-mask/jquery.inputmask.extensions'
  ]
%}

{% set page_title = 'Add Patient' %}

{% block content %}
	 <div class="row">

		  <div class="col-lg-8">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Add Patient</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							{{ form_open("patient_management/profile/save/add", {"class": "xrx-form"}) }}
							
								<div class="row">									
								
									<div class="col-md-12">
										<p class="lead">Personal Information</p>
									</div>
									
									<div class="col-md-6 form-group {{ form_error('patient_name') ? 'has-error' : '' }}">
									
										<label class="control-label">Last name, First name <span>*</span></label>
										<input type="text" class="form-control" id="name" placeholder="" required="true" name="patient_name" value="{{ set_value('patient_name') }}">
									</div>
                                    
                                    <div class="col-md-6 form-group {{ form_error('patient_referralDate') ? 'has-error' : '' }}">
										<label>Date of Referral <span>*</span></label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required="true" name="patient_referralDate" value="{{ set_value('patient_referralDate') }}">
									</div>
									
									<div class="col-md-6 has-error">
										<span class="help-block">{{ form_error('patient_name') }}</span>
									</div>
                                    
                                    <div class="col-md-6 has-error">
										<span class="help-block">{{ form_error('patient_referralDate') }}</span>
									</div>
                                    
									<div class="col-md-6 form-group {{ form_error('patient_dateOfBirth') ? 'has-error' : '' }}">
									
										<label class="control-label">Date of Birth <span>*</span></label>
										<input type="text" class="form-control" id="dob" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required="true" name="patient_dateOfBirth" value="{{ set_value('patient_dateOfBirth') }}">
										
									</div>
									
									<div class="col-md-6 form-group {{ form_error('patient_gender') ? 'has-error' : '' }}">
									
										<label class="control-label">Gender <span>*</span></label>

										<select class="form-control" style="width: 100%;" name="patient_gender" id="dob" required="true">
											<option value="" selected="true">Select</option>
						                  	<option value="Male">Male</option>
						                  	<option value="Female">Female</option>

						                </select>
						                
									</div>

									<div class="col-md-6 has-error">
										<span class="help-block">{{ form_error('patient_dateOfBirth') }}</span>
									</div>

									<div class="col-md-6 has-error">
										<span class="help-block">{{ form_error('patient_gender') }}</span>
									</div>
									
									<div class="col-md-6 form-group {{ form_error('patient_medicareNum') ? 'has-error' : '' }}">
									
										<label class="control-label">Medicare <span>*</span></label>
										<input type="text" class="form-control" id="medicare" placeholder="" required="true" name="patient_medicareNum" value="{{ set_value('patient_medicareNum') }}">
										
									</div>
									
									<div class="col-md-6 form-group {{ form_error('patient_phoneNum') ? 'has-error' : '' }}">
									
										<label class="control-label">Phone <span>*</span></label>
										<input type="text" class="form-control" id="phone" placeholder="" required="true" name="patient_phoneNum" value="{{ set_value('patient_phoneNum') }}">
										
									</div>

									<div class="col-md-6 has-error">
										<span class="help-block">{{ form_error('patient_medicareNum') }}</span>
									</div>

									<div class="col-md-6 has-error">
										<span class="help-block">{{ form_error('patient_phoneNum') }}</span>
									</div>
									
									<div class="col-md-12 form-group {{ form_error('patient_address') ? 'has-error' : '' }}">
									
										<label class="control-label">Address <span>*</span></label>
										<input type="text" class="form-control" id="address" placeholder="" required="true" name="patient_address" value="{{ set_value('patient_address') }}">
										
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('patient_address') }}</span>
									</div>
									
									<div class="col-md-6 form-group {{ form_error('patient_caregiver_family') ? 'has-error' : '' }}">
									
										<label class="control-label">Caregiver/Family</label>
										<input type="text" class="form-control" id="caregiver" placeholder="" name="patient_caregiver_family" value="{{ set_value('patient_caregiver_family') }}">
										
									</div>

									<div class="col-md-6 form-group">
										
										<label class="control-label">Place of Service</label>
										<select class="form-control" name="patient_placeOfService">
											<option value="">Select</option>

											{% for pos in place_of_service %}

												<option value="{{ pos.pos_id }}">{{ pos.pos_name }}</option>

											{% endfor %}

										</select>

									</div>

									<div class="col-md-6 has-error">
										<span class="help-block">{{ form_error('patient_caregiver_family') }}</span>
									</div>
									
									<div class="col-md-12 subheader">
										<p class="lead ">Home Health Care</p>
									</div>
									
									<div class="col-md-12 form-group {{ form_error('patient_hhcID') ? 'has-error' : '' }}">
										<label class="control-label">Home Health <span>*</span></label>
										
										<div class="dropdown mobiledrs-autosuggest-select">
											<input type="hidden" name="patient_hhcID" required="true">

										  	<input class="form-control" 
										  		type="text" 
										  		data-mobiledrs_autosuggest 
										  		data-mobiledrs_autosuggest_url="{{ site_url('ajax/home_health_care_management/profile/search') }}"
										  		data-mobiledrs_autosuggest_dropdown_id="patient_hhcID_dropdown">

										  	<div data-mobiledrs_autosuggest_dropdown id="patient_hhcID_dropdown" style="width: 100%;">
									  	  	</div>
										</div>
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('patient_hhcID') }}</span>
									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
					              		<button type="submit" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Add Patient
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
