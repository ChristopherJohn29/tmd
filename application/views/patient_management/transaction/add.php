
{% extends "main.php" %}

{% 
  set scripts = [
    'plugins/input-mask/jquery.inputmask',
    'plugins/input-mask/jquery.inputmask.date.extensions',
    'plugins/input-mask/jquery.inputmask.extensions',
    'dist/js/patient_management/transaction/form'
  ]
%}

{% set page_title = 'Add Visit' %}

{% block content %}
	<div class="row">

		  <div class="col-lg-8">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Add Visit</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							{{ form_open_multipart("patient_management/transaction/save/add/#{ record.patient_id }", {"class": "xrx-form"}) }}
							
								<div class="row">
								
									<!-- This is the patient's information -->
									<div class="xrx-info">

										<input type="hidden" name="pt_patientID" value="{{ record.patient_id }}">
									
										<div class="col-lg-6">
											<p class="lead"><span>Patient Name: </span> {{ record.patient_name }}</p>
										</div>
										
										<div class="col-lg-6">
											<p class="lead"><span>Date of Birth: </span> {{ record.get_date_format(record.patient_dateOfBirth) }}</p>
										</div>
										
										<div class="col-lg-6">
											<p class="lead"><span>Medicare: </span> {{ record.patient_medicareNum }}</p>
										</div>
								
									</div>
									
									<div class="form-container">
                                        
                                        <div class="row" style="margin:0 !important;">
											<div class="col-md-6 form-group">
											
												<label class="control-label">Supervising MD <span>*</span></label>
												<select class="form-control" style="width: 100%;" required="true" name="pt_supervising_mdID">
													<option value="" selected="true">Select</option>

													{% for supervisingMD in supervisingMDs %}

														<option value="{{ supervisingMD.provider_id }}">
															{{ supervisingMD.provider_firstname ~ ' ' ~ supervisingMD.provider_lastname }}
														</option>

													{% endfor %}

												</select>

												<br>
												
											</div>

											<div class="col-md-6 form-group  {{ form_error('patient_hhcID') ? 'has-error' : '' }}">

												<label class="control-label">Home Health *</label>
											
											<div class="dropdown mobiledrs-autosuggest-select">
												<input type="hidden" name="patient_hhcID" require>

												<input class="form-control" 
													name="patient_homehealth"
													type="text" 
													data-mobiledrs_autosuggest 
													data-mobiledrs_autosuggest_url="{{ site_url('ajax/home_health_care_management/profile/search') }}"
													data-mobiledrs_autosuggest_dropdown_id="patient_hhcID_dropdown" require>

												<div data-mobiledrs_autosuggest_dropdown id="patient_hhcID_dropdown" style="width: 100%;">
												</div>
											</div>
												
												
											</div>

										
                                        </div>
                                        
										<div class="col-md-6 form-group  {{ form_error('pt_dateRef') ? 'has-error' : '' }}">
											
											<label class="control-label">Intake Received</label>
											<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask name="pt_dateRef" value="">

										</div>

										<div class="col-md-6 form-group {{ form_error('pt_dateRefEmailed') ? 'has-error' : '' }}">
										
											<label class="control-label">Date Referral was Emailed</label>
											<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask name="pt_dateRefEmailed" value="">
											
										</div>

										<div class="col-md-6 has-error">
											<span class="help-block">{{ form_error('pt_dateRef') }}</span>
										</div>

										<div class="col-md-6 has-error">
											<span class="help-block">{{ form_error('pt_dateRefEmailed') }}</span>
										</div>

										<div class="col-md-6 form-group {{ form_error('pt_tovID') ? 'has-error' : '' }}">
										
											<label class="control-label">Type of Visit <span>*</span></label>
											<select class="form-control" style="width: 100%;" required="true" name="pt_tovID">
												<option value="" selected="true">Select</option>

												{% for type_visit in type_visit_entity.get_list_non_ca() %}

													<option value="{{ type_visit.tov_id }}">{{ type_visit.tov_name }}</option>

												{% endfor %}

											</select>
											
										</div>
										
										<div class="col-md-6 form-group {{ form_error('pt_providerID') ? 'has-error' : '' }}">
										
											<label class="control-label">Provider <span>*</span></label>

											<div class="dropdown mobiledrs-autosuggest-select">
												<input type="hidden" name="pt_providerID" required="true">

											  	<input class="form-control" 
											  		type="text" 
											  		data-mobiledrs_autosuggest 
											  		data-mobiledrs_autosuggest_url="{{ site_url('ajax/provider_management/profile/search') }}"
											  		data-mobiledrs_autosuggest_dropdown_id="pt_providerID_dropdown">

											  	<div data-mobiledrs_autosuggest_dropdown id="pt_providerID_dropdown" style="width: 100%;">
										  	  	</div>
											</div>
											
										</div>

										<div class="col-md-6 has-error">
											<span class="help-block">{{ form_error('pt_tovID') }}</span>
										</div>

										<div class="col-md-6 has-error">
											<span class="help-block">{{ form_error('pt_providerID') }}</span>
										</div>
										
										<div class="col-md-6 form-group {{ form_error('pt_dateOfService') ? 'has-error' : '' }}">
											<label>Date of Service</label>
											<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask name="pt_dateOfService" value="">
										</div>
										
										<!-- <div class="col-md-6 form-group">
										
											<label class="control-label">Deductible</label>
											<input type="text" class="form-control" name="pt_deductible" value="{{ set_value('pt_deductible') }}">
											
										</div> -->

										<div class="col-md-3 form-group">
										
										<label class="control-label">AW or IPPE?</label>
										<select class="form-control" style="width: 100%;" name="pt_aw_ippe_code">
											<option value="" selected="true">Select</option>
											<option value="G0438">G0438</option>
											<option value="G0439">G0439</option>
											<option value="G0402">G0402</option>
										</select>
										
									</div>
									

									<div class="col-md-3 form-group {{ form_error('pt_performed') ? 'has-error' : '' }}">
										
											<label class="control-label">Performed?</label>
											<select class="form-control" style="width: 100%;" name="pt_performed">
												<option value="" selected="true">Select</option>
												<option value="1">Yes</option>
												<option value="2">No</option>
											</select>
							                
										</div>

										<div class="col-md-12 has-error">
											<span class="help-block">{{ form_error('pt_dateOfService') }}</span>
										</div>
										
										<!-- <div class="col-md-6 form-group">
										
											<label class="control-label">AW/IPPE Date</label>
											<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask name="pt_aw_ippe_date" value="">
											
										</div> -->
										
									
										

										<div class="col-md-12 has-error">
											<span class="help-block text-right">{{ form_error('pt_performed') }}</span>
										</div>
										
										<div class="col-md-6 form-group {{ form_error('pt_acp') ? 'has-error' : '' }}">
										
											<label class="control-label">ACP</label>
											<select class="form-control" style="width: 100%;" name="pt_acp">
												<option value="" selected="true">Select</option>
												<option value="1">Yes</option>
												<option value="2">No</option>
											</select>
											
										</div>
										
										<div class="col-md-3 form-group {{ form_error('pt_diabetes') ? 'has-error' : '' }}">
										
											<label class="control-label">Diabetes</label>
											<select class="form-control" style="width: 100%;" name="pt_diabetes">
												<option value="" selected="true">Select</option>
												<option value="1">Yes</option>
												<option value="2">No</option>
											</select>
											
										</div>

										<div class="col-md-3 form-group {{ form_error('pt_hypertension') ? 'has-error' : '' }}">
										
											<label class="control-label">Hypertension</label>
											<select class="form-control" style="width: 100%;" name="pt_hypertension">
												<option value="" selected="true">Select</option>
												<option value="1">Yes</option>
												<option value="2">No</option>
											</select>
											
										</div>

										<div class="col-md-6 has-error">
											<span class="help-block">{{ form_error('pt_acp') }}</span>
										</div>

										<div class="col-md-6 has-error">
											<span class="help-block">{{ form_error('pt_diabetes') }}</span>
										</div>
										
										<div class="col-md-6 form-group {{ form_error('pt_tobacco') ? 'has-error' : '' }}">
										
											<label class="control-label">Tobacco</label>
											<select class="form-control" style="width: 100%;" name="pt_tobacco">
												<option value="" selected="true">Select</option>
												<option value="1">Yes</option>
												<option value="2">No</option>
											</select>
											
										</div>									
										
                                        
										<!-- <div class="col-md-6 form-group {{ form_error('pt_tcm') ? 'has-error' : '' }}" style="display:none">
										
											<label class="control-label">TCM</label>
											<select class="form-control" style="width: 100%;" name="pt_tcm">
												<option value="" selected="true">Select</option>
												<option value="1">Yes</option>
												<option value="2">No</option>
											</select>
											
										</div> -->

										<!-- 

										<div class="col-md-6 has-error">
											<span class="help-block">{{ form_error('pt_tcm') }}</span>
										</div>

                                        <div class="col-md-12 has-error">
											<span class="help-block">{{ form_error('pt_others') }}</span>
										</div> -->
										
										<div class="col-md-6 form-group">
										
											<label class="control-label">Mileage</label>
											<input type="text" class="form-control" value="{{ set_value('pt_mileage') }}" name="pt_mileage">
											
										</div>
	                                    
	                                    <!-- <div class="col-md-6 form-group {{ form_error('pt_others') ? 'has-error' : '' }}" style="display:none">
										
											<label class="control-label">Others</label>
											<input type="text" class="form-control" name="pt_others" value="{{ set_value('pt_others') }}">
											
										</div> -->
                                        
                                        <div class="col-md-6 has-error">
											<span class="help-block">{{ form_error('pt_tobacco') }}</span>
										</div>
                                        
										

										<div class="col-md-12 form-group {{ form_error('pt_icd10_codes') ? 'has-error' : '' }}">
										
											<label class="control-label">ICD-10 Codes</label>
											<input type="text" class="form-control" name="pt_icd10_codes" value="{{ set_value('pt_icd10_codes') }}">
											
										</div>

										<div class="col-md-12 has-error">
											<span class="help-block">{{ form_error('pt_icd10_codes') }}</span>
										</div>

										<div class="col-md-12 form-group">

									<label class="control-label">Status <span>*</span></label>
												<select class="form-control" style="width: 100%;" name="pt_status">
													<option value="" selected="true">Select</option>
													<option value="1">Patient is medically stable</option>
													<option value="2">Patient requires immediate medical attention</option>
												</select>

												<br>

									</div>

									<div class="col-md-12 form-group">
										<label>Reason for Visit <span>*</span></label>
										<select class="form-control" required="true" name="pt_reasonForVisit">
											<option value="">Select</option>
												<option value="Follow-up Visit">Follow-up Visit</option>
												<option value="Discharged from hospital">Discharged from hospital</option>
												<option value="Home Health Referral/Admission">Home Health Referral/Admission</option>
												<option value="Transfer of Care">Transfer of Care</option>
												<option value="Office Request Visit (Meds / Labs)">Office Request Visit</option>
												<option value="Patient Requested For Assessment Only">Patient Requested For Assessment Only</option>
										</select>
										<br>
									</div>

									<div class="col-md-12 form-check" style="">
									<label class="control-label">Upload Intake Form File</label>
									    <input type="file" class="form-check-input" id="userfile" name="userfile[]" multiple accept=".pdf,.jpg,.jpeg,.png,.gif">
									    <!-- <label class="form-check-label" for="labOrdes">Files</label> -->
										<br>
									  </div>

									  <div class="col-md-12 form-check">
									    <input type="checkbox" class="form-check-input" id="labOrdes" name="lab_orders">
									    <label class="form-check-label" for="labOrdes">Create Lab Orders and Results Entry</label>
									  </div>

									  <div class="col-md-3 form-check mb-10">
									    <input type="checkbox" class="form-check-input" id="is_early_discharge" name="is_early_discharge" value="1">
									    <label class="form-check-label" for="labOrdes">Early Discharge</label>
										<input type="text" class="form-control" id="early_discharge_date" placeholder="Date" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask="" name="early_discharge_date" value="">
									  </div>
									
																			
										<div class="col-md-12 form-group" style="margin-top:10px;">
									
											<label class="control-label">Notes</label>
											<textarea class="form-control" name="pt_notes">{{ set_value('pt_notes') }}</textarea>
											
										</div>

									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
                                        <a href="{{ site_url("patient_management/profile/details/#{ record.patient_id }") }}" class="btn btn-default xrx-btn cancel">
											Cancel
										</a>
                                        
					              		<button type="submit" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Add Visit
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