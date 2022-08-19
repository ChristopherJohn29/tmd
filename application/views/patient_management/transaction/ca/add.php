
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
										<input type="hidden" name="is_ca" value="1">
									
										<div class="col-lg-6">
											<p class="lead"><span>Patient Name: </span> {{ record.patient_name }}</p>
										</div>
										
										<div class="col-lg-6">
											<p class="lead"><span>Date of Birth: </span> {{ record.get_date_format(record.patient_dateOfBirth) }}</p>
										</div>
										
										<div class="col-lg-6">
											<p class="lead"><span>Medicare: </span> {{ record.patient_medicareNum }}</p>
										</div>
										
										<div class="col-lg-6">
											<p class="lead"><span>Home Health: </span> {{ record.hhc_name }}</p>
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

											<br>
											
										</div>
										
                                        </div>


										<div class="row" style="margin:0 !important;">

										<div class="col-md-6 form-group {{ form_error('pt_dateOfService') ? 'has-error' : '' }}">
											<label>Date of Service</label>
											<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask name="pt_dateOfService" value="">
										
											<br>
										</div>


										<div class="col-md-6 form-group {{ form_error('pt_tovID') ? 'has-error' : '' }}">
										
											<label class="control-label">Type of Visit <span>*</span></label>
											<select class="form-control" style="width: 100%;" required="true" name="pt_tovID">
												<option value="" selected="true">Select</option>
												<option value="9">Cognitive Assesment (Home Visits)</option>
												<option value="10">Cognitive Assesment (Telehealth)</option>
												<option value="11">Home Health Refused Visit</option>
												<option value="12">Patient Refused Visit</option>
												<option  value="5"> No Show</option>
												<option  value="6"> Cancelled</option>
											</select>

											<br>
											
										</div>

										</div>
										
									
									

										<!-- <div class="row" style="margin:0 !important;">

									

										<div class="col-md-12 form-group {{ form_error('pt_acp') ? 'has-error' : '' }}">
										
											<label class="control-label">ACP</label>
											<select class="form-control" style="width: 100%;" name="pt_acp">
												<option value="" selected="true">Select</option>
												<option value="1">Yes</option>
												<option value="2">No</option>
											</select>

											<br>
											
										</div>

										</div> -->


	                                    
										<div class="col-md-12 form-group {{ form_error('pt_icd10_codes') ? 'has-error' : '' }}">
										
											<label class="control-label">ICD-10 Codes</label>
											<input type="text" class="form-control" name="pt_icd10_codes" value="{{ set_value('pt_icd10_codes') }}">
											
										</div>

										<div class="col-md-12 has-error">
											<span class="help-block">{{ form_error('pt_icd10_codes') }}</span>
										</div>

										<div class="col-md-12 form-check" style="">
											<label class="control-label">Upload File</label>
											<input type="file" class="form-check-input" id="userfile" name="userfile[]" multiple accept=".pdf,.jpg,.jpeg,.png,.gif">
											<!-- <label class="form-check-label" for="labOrdes">Files</label> -->
											<br>
										</div>

										<div class="col-md-12 form-check">
									    <input type="checkbox" class="form-check-input" id="labOrdes" name="lab_orders">
									    <label class="form-check-label" for="labOrdes">Create Lab Orders and Results Entry</label>
									  </div>
																			
										<div class="col-md-12 form-group">
										
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