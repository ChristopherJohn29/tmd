{% extends "main.php" %}

{% 
  set scripts = [
  	'bower_components/select2/dist/js/select2.full.min',
  	'plugins/input-mask/jquery.inputmask',
  	'plugins/input-mask/jquery.inputmask.date.extensions',
  	'plugins/input-mask/jquery.inputmask.extensions',
  	'bower_components/moment/min/moment.min',
  	'bower_components/bootstrap-daterangepicker/daterangepicker',
  	'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min',
  	'bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min',
  	'plugins/timepicker/bootstrap-timepicker.min',
  	'dist/js/provider_route_sheet_management/route_sheet/form_patient_details_validator',
  	'dist/js/provider_route_sheet_management/route_sheet/form_patient_details_adder'
  ]
%}

{% set page_title = 'Add Route' %}

{% block content %}
	  <div class="row">

		  <div class="col-lg-8">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Create Route Sheet</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							{{ form_open("provider_route_sheet_management/route_sheet/save/add", {"class": "xrx-form"}) }}
							
								<div class="row">

									<div class="col-xs-12">
									  {% if states %}
										{{ include('commons/alerts.php') }}
									  {% endif %}
									</div>
								
									<div class="col-md-12">
										<p class="lead">Provider</p>
									</div>
									
									<div class="col-md-12 form-group {{ form_error('prs_providerID') ? 'has-error' : '' }}">
									
										<label>Provider Name <span>*</span></label>

										<div class="dropdown mobiledrs-autosuggest-select">
											<input type="hidden" name="prs_providerID" required="true">

										  	<input class="form-control" 
										  		type="text" 
										  		required="true"
										  		data-mobiledrs_autosuggest 
										  		data-mobiledrs_autosuggest_url="{{ site_url('ajax/provider_management/profile/search') }}"
										  		data-mobiledrs_autosuggest_dropdown_id="prs_providerID_dropdown">

										  	<div data-mobiledrs_autosuggest_dropdown id="prs_providerID_dropdown" style="width: 100%;">
									  	  	</div>
										</div>
										
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('prs_providerID') }}</span>
									</div>
									
									<div class="col-md-12 subheader">
										<p class="lead">Schedule</p>
									</div>
									
									<div class="col-md-12 form-group {{ form_error('prs_dateOfService') ? 'has-error' : '' }}">
									
										<label class="control-label">Date of Service <span>*</span></label>
										<input type="hidden" name="currentDate" value="{{ current_date }}">
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required="true" name="prs_dateOfService">
										
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('prs_dateOfService') }}</span>
									</div>
								</div>

								<div class="row">						

									<div class="patient-details-container">

										<div class="patient-details-item ui-state-default pull-left" style="border:none;">

											<div class="col-md-12 subheader">
												<p class="lead">Patient <span class="item-num">1</span> Details</p>
											</div>									

											<div class="col-md-4 form-group {{ form_error('prsl_fromTime') ? 'has-error' : '' }}">
											
												<label class="control-label">Time of Visit from<span>*</span></label>
												<input  data-timepicker type="text" class="form-control" id="" placeholder="" required="true" name="prsl_fromTime[]">
												
											</div>
                                            
                                            <div class="col-md-4 form-group {{ form_error('prsl_toTime') ? 'has-error' : '' }}">
											
												<label class="control-label">Time of Visit to<span>*</span></label>
                                                <input  data-timepicker type="text" class="form-control" id="" placeholder="" required="true" name="prsl_toTime[]">
												
											</div>

											<div class="col-md-4 form-group {{ form_error('prsl_patientID') ? 'has-error' : '' }}">
											
												<label class="control-label">Patient Name <span>*</span></label>

												<div class="dropdown mobiledrs-autosuggest-select">
													<input type="hidden" name="prsl_patientID[]" required="true">

												  	<input class="form-control" 
												  		type="text" 
												  		required="true" 
												  		data-mobiledrs_autosuggest 
												  		data-mobiledrs_autosuggest_url="{{ site_url('ajax/patient_management/profile/search') }}"
												  		data-mobiledrs_autosuggest_dropdown_id="prsl_patientID_dropdown">

												  	<div data-mobiledrs_autosuggest_dropdown id="prsl_patientID_dropdown" style="width: 100%;">
											  	  	</div>
												</div>
												
											</div>
											
											<div class="col-md-4 has-error">
												<span class="help-block">{{ form_error('prsl_fromTime') }}</span>
											</div>

											<div class="col-md-4 has-error">
												<span class="help-block">{{ form_error('prsl_toTime') }}</span>
											</div>

											<div class="col-md-4 has-error">
												<span class="help-block">{{ form_error('prsl_patientID') }}</span>
											</div>

											<div class="col-md-6 form-group {{ form_error('prsl_tovID') ? 'has-error' : '' }}">
											
												<label class="control-label">Type of Visit <span>*</span></label>
												
												<select class="form-control" style="width: 100%;" required="true" name="prsl_tovID[]" data-tov_url="{{ site_url('ajax/patient_management/profile/get_tov') }}">
												</select>
												
											</div>

											<div class="col-md-6 form-group {{ form_error('prsl_dateRef') ? 'has-error' : '' }}">
									
												<label class="control-label">Date of Referral <span>*</span></label>
												<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required="true" name="prsl_dateRef[]">
												
											</div>

											<div class="col-md-4 has-error">
												<span class="help-block">{{ form_error('prsl_tovID') }}</span>
											</div>

											<div class="col-md-6 has-error">
												<span class="help-block">{{ form_error('prsl_dateRef') }}</span>
											</div>
											
											<div class="col-md-12 form-group {{ form_error('prsl_notes') ? 'has-error' : '' }}">
											
												<label class="control-label">Notes <span>*</span></label>
												<textarea class="form-control" id="" placeholder="" required="true" name="prsl_notes[]" rows="5"></textarea>
												
											</div>

											<div class="col-md-12 has-error">
												<span class="help-block">{{ form_error('prsl_notes') }}</span>
											</div>	

										</div>

									</div>
									
									<div class="col-md-12 form-group">
										
					                  	<button type="button" class="btn btn-default" id="addPatientBtn">
											<i class="fa fa-plus"></i> Add Patient
										</button>
					                  
					                </div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
                                        <a href="{{ site_url('provider_route_sheet_management/route_sheet') }}" class="btn btn-default xrx-btn cancel">
											Cancel
										</a>
                                        
					              		<button type="submit" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Add Route Sheet
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