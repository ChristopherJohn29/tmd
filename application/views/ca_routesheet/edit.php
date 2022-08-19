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
  	'dist/js/provider_route_sheet_management/route_sheet/form_patient_details_adder',
  	'dist/js/provider_route_sheet_management/route_sheet/edit'
  ]
%}

{% set page_title = 'Add Route' %}

{% block content %}
	  <div class="row">

		  <div class="col-lg-8">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Update Route Sheet</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
							{{ form_open("ca_routesheet/routesheet/save/edit/#{ record.0.prs_id }", {"class": "xrx-form"}) }}
								<input type="hidden" name="prs_id" value="{{ record.0.prs_id }}">
								<input type="hidden" name="prsl_prsID" value="{{ record.0.prsl_prsID }}">
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
											
											<input type="hidden" name="prs_providerID" required="true" value="{{ record.0.provider_id }}">
				
										  	<input class="form-control" 
										  		type="text" 
										  		required="true"
										  		data-mobiledrs_autosuggest 
										  		data-mobiledrs_autosuggest_url="{{ site_url('ajax/provider_management/profile/search') }}"
										  		data-mobiledrs_autosuggest_dropdown_id="prs_providerID_dropdown"
										  		value="{{  record.0.provider_firstname }} {{  record.0.provider_lastname }}">

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
										<input type="hidden" name="currentDate" value="{{ record.0.prs_dateOfService }}">
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required="true" name="prs_dateOfService" value="{{ record.0.prs_dateOfService }}" data-ajaxUrl="{{ site_url('ajax/provider_route_sheet_management/route_sheet/check_provider_routesheet_by_date') }}">
										
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('prs_dateOfService') }}</span>
									</div>		
								</div>

								<div class="row">
									<div class="patient-details-container">
										
										{% for index, list in record %}								

											<input type="hidden" name="prsl_id[]" value="{{ list.prsl_id }}">
											<input type="hidden" name="prsl_patientTransID[]" value="{{ list.prsl_patientTransID }}">

											<div class="patient-details-item ui-state-default pull-left" style="border:none;" {{ index > 0 ? "data-item-num=#{ index + 1 }" }}>

												<div class="col-md-12 subheader">
													<p class="lead">Patient <span class="item-num">{{ index + 1 }}</span> Details

													{% if index > 0 %}

														<a class="removeItemBtn" href="#" style="float:right;clear:both;">Remove Item</a>

													{% endif %}

													</p>
												</div>									

												<div class="col-md-4 form-group {{ form_error('prsl_fromTime') ? 'has-error' : '' }}">
											
													<label class="control-label">Time of Visit from<span>*</span></label>
													<input  data-timepicker type="text" class="form-control" id="" placeholder="" required="true" name="prsl_fromTime[]" value="{{ list.prsl_fromTime }}">
													
												</div>
	                                            
	                                            <div class="col-md-4 form-group {{ form_error('prsl_toTime') ? 'has-error' : '' }}">
												
													<label class="control-label">Time of Visit to<span>*</span></label>
	                                                <input  data-timepicker type="text" class="form-control" id="" placeholder="" required="true" name="prsl_toTime[]" value="{{ list.prsl_toTime }}">
													
												</div>
												
												<div class="col-md-4 form-group {{ form_error('prsl_patientID') ? 'has-error' : '' }}">
												
													<label class="control-label">Patient Name <span>*</span></label>

													<div class="dropdown mobiledrs-autosuggest-select">
														<input type="hidden" name="prsl_patientID[]" required="true" value="{{ list.patient_id }}">

													  	<input class="form-control" 
													  		type="text" 
													  		required="true"
													  		data-mobiledrs_autosuggest 
													  		data-mobiledrs_autosuggest_url="{{ site_url('ajax/patient_management/profile/search') }}"
													  		data-mobiledrs_autosuggest_dropdown_id="prsl_patientID_dropdown{{ index > 0 ? "_#{ index + 1 }" }}"
													  		value="{{ list.patient_name }}">

													  	<div data-mobiledrs_autosuggest_dropdown id="prsl_patientID_dropdown{{ index > 0 ? "_#{ index + 1 }" }}" style="width: 100%;">
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

												<div class="col-md-4 form-group {{ form_error('prsl_tovID') ? 'has-error' : '' }}">
												
													<label class="control-label">Type of Visit <span>*</span></label>
<!-- 													
													<input type="hidden" id="prsl_patientID" value="{{ list.prsl_patientTransID }}"> -->
													<select class="form-control" style="width: 100%;" required="true" name="prsl_tov[]">
														<option {{ list.prsl_tov == 'Cognitive Assesment (Home Visits)' ? 'selected' : '' }} value="Cognitive Assesment (Home Visits)">Cognitive Assesment (Home Visits)</option>
														<option {{ list.prsl_tov == 'Cognitive Assesment (Telehealth)' ? 'selected' : '' }} value="Cognitive Assesment (Telehealth)">Cognitive Assesment (Telehealth)</option>
													</select>
													
												</div>
												
												<div class="col-md-4 form-group {{ form_error('prsl_dateRef') ? 'has-error' : '' }}">
									
													<label class="control-label">Intake Received <span>*</span></label>
													<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required="true" name="prsl_dateRef[]" value="{{ list.prsl_dateRef }}">
												</div>

												<div class="col-md-4 form-group {{ form_error('prsl_dateRef') ? 'has-error' : '' }}">
									
													<label class="control-label">Supervising MD <span>*</span></label>
													<select class="form-control" required="true" name="supervising_md_id[]">
														<option value="">Select</option>

														{% for supervisingMD in supervisingMDs %}

															<option value="{{ supervisingMD.provider_id }}" {{ list.supervising_md_id == supervisingMD.provider_id ? 'selected=true' : '' }}>
																{{ supervisingMD.provider_firstname ~ ' ' ~ supervisingMD.provider_lastname }}
															</option>

														{% endfor %}

													</select>
												</div>

												<div class="col-md-6 has-error">
													<span class="help-block">{{ form_error('prsl_tovID') }}</span>
												</div>

												<div class="col-md-4 has-error">
													<span class="help-block">{{ form_error('prsl_dateRef') }}</span>
												</div>

												<div class="col-md-12 form-group">

												<label>Reason for Visit <span>*</span></label>
												<select class="form-control" required="true" name="pt_reasonForVisit[]">
													<option value="">Select</option>
														<option value="Follow-up Visit" {{ list.pt_reasonForVisit == 'Follow-up Visit' ? 'selected=true' : '' }}>Follow-up Visit</option>
														<option value="Discharged from hospital" {{ list.pt_reasonForVisit == 'Discharged from hospital' ? 'selected=true' : '' }}>Discharged from hospital</option>
														<option value="Patient is using assistive equipment" {{ list.pt_reasonForVisit == 'Patient is using assistive equipment' ? 'selected=true' : '' }}>Patient is using assistive equipment</option>
														<option value="Home Health Referral/Admission" {{ list.pt_reasonForVisit == 'Home Health Referral/Admission' ? 'selected=true' : '' }}>Home Health Referral/Admission</option>
														<option value="Transfer of Care" {{ list.pt_reasonForVisit == 'Transfer of Care' ? 'selected=true' : '' }}>Transfer of Care</option>
														<option value="Other" {{ list.pt_reasonForVisit == 'Other' ? 'selected=true' : '' }}>Other</option>
												</select>
											</div>
												
												<div class="col-md-12 form-group {{ form_error('prsl_notes') ? 'has-error' : '' }}" style="margin-top: 10px;">
												
													<label class="control-label">Notes <span>*</span></label>
													<textarea class="form-control" id="" placeholder="" required="true" name="prsl_notes[]" rows="5" maxlength="2000">{{ list.prsl_notes }}</textarea>
													
												</div>

												<div class="col-md-12 has-error">
													<span class="help-block">{{ form_error('prsl_notes') }}</span>
												</div>	

											</div>

										{% endfor %}

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
											<i class="fa fa-check"></i> update Route Sheet
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