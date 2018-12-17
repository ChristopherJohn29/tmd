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
  	'dist/js/provider_route_sheet_management/route_sheet/form',
  	'dist/js/provider_route_sheet_management/route_sheet/form_patient_details_validator',
  	'dist/js/provider_route_sheet_management/route_sheet/form_patient_details_adder'
  ]
%}

{% set page_title = 'Add Route' %}

{% block content %}
	  <div class="row">

		  <div class="col-lg-6">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Create Route Sheet</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							{{ form_open("provider_route_sheet_management/route_sheet/save", {"class": "xrx-form"}) }}
							
								<div class="row">
								
									<div class="col-md-12">
										<p class="lead">Provider</p>
									</div>
									
									<div class="col-md-12 form-group {{ form_error('prs_providerID') ? 'has-error' : '' }}">
									
										<label>Provider Name <span>*</span></label>

										<input type="hidden" name="prs_providerID" required="true">
										<div class="dropdown mobiledrs-autosuggest-select">
										  	<input type="text" class="form-control" data-mobiledrs-autosuggest-select data-action-url="{{ site_url('ajax/provider_management/profile/search') }}" data-input-target-name="prs_providerID">
										  	<ul class="dropdown-menu mobiledrs-autosuggest-select-dropdown" aria-labelledby="dropdownMenu1" style="width:100%;">
									  	  </ul>
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
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required="true" name="prs_dateOfService">
										
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('prs_dateOfService') }}</span>
									</div>									

									<div class="patient-details-container">
										
										<div class="patient-details-item">

											<div class="col-md-12 subheader">
												<p class="lead">Patient <span class="item-num">1</span> Details</p>
											</div>									

											<div class="col-md-6 form-group {{ form_error('prsl_time') ? 'has-error' : '' }}">
											
												<label class="control-label">Time of Visit <span>*</span></label>
												<input type="text" class="form-control" id="" placeholder="" required="true" name="prsl_time[]">
												
											</div>
											
											<div class="col-md-6 form-group {{ form_error('prsl_tovID') ? 'has-error' : '' }}">
											
												<label class="control-label">Type of Visit <span>*</span></label>
												
												<select class="form-control" style="width: 100%;" required="true" name="prsl_tovID[]">
													<option value="">Select</option>

													{% for tov in tovs %}

														<option value="{{ tov.tov_id }}">{{ tov.tov_name }}</option>

													{% endfor %}

												</select>
												
											</div>

											<div class="col-md-6 has-error">
												<span class="help-block">{{ form_error('prsl_time') }}</span>
											</div>

											<div class="col-md-6 has-error">
												<span class="help-block">{{ form_error('prsl_tovID') }}</span>
											</div>	
											
											<div class="col-md-12 form-group {{ form_error('prsl_patientID') ? 'has-error' : '' }}">
											
												<label class="control-label">Patient Name <span>*</span></label>

												<input type="hidden" name="prsl_patientID[]" required="true">
												<div class="dropdown mobiledrs-autosuggest-select">
												  	<input type="text" class="form-control" data-mobiledrs-autosuggest-select data-action-url="{{ site_url('ajax/patient_management/profile/search') }}" data-input-target-name="prsl_patientID[]">
												  	<ul class="dropdown-menu mobiledrs-autosuggest-select-dropdown" aria-labelledby="dropdownMenu1" style="width:100%;">
											  	  </ul>										
												</div>
												
											</div>

											<div class="col-md-12 has-error">
												<span class="help-block">{{ form_error('prsl_patientID') }}</span>
											</div>	
											
											<div class="col-md-12 form-group {{ form_error('prsl_hhcID') ? 'has-error' : '' }}">
												<label class="control-label">Home Health <span>*</span></label>
												
												<input type="hidden" name="prsl_hhcID[]" required="true">
												<div class="dropdown mobiledrs-autosuggest-select">
												  	<input type="text" class="form-control" data-mobiledrs-autosuggest-select data-action-url="{{ site_url('ajax/home_health_care_management/profile/search') }}" data-input-target-name="prsl_hhcID[]">
												  	<ul class="dropdown-menu mobiledrs-autosuggest-select-dropdown" aria-labelledby="dropdownMenu1" style="width:100%;">
											  	  </ul>										
												</div>
												
											</div>

											<div class="col-md-12 has-error">
												<span class="help-block">{{ form_error('prsl_hhcID') }}</span>
											</div>	
											
											<div class="col-md-12 form-group {{ form_error('prsl_notes') ? 'has-error' : '' }}">
											
												<label class="control-label">Notes <span>*</span></label>
												<textarea class="form-control" id="" placeholder="" required="true" name="prsl_notes[]"></textarea>
												
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