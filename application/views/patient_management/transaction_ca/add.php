
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
						
							{{ form_open("patient_management/transaction_ca/save/add/#{ record.0.patient_id }", {"class": "xrx-form"}) }}
							
								<div class="row">
								
									<!-- This is the patient's information -->
									<div class="xrx-info">

										<input type="hidden" name="patient_id" value="{{ record.0.patient_id }}">
									
										<div class="col-lg-6">
											<p class="lead"><span>Patient Name: </span> {{ record.0.patient_name }}</p>
										</div>
										
										<div class="col-lg-6">
											<p class="lead"><span>Date of Birth: </span> {{ record.0.patient_dateOfBirth }}</p>
										</div>
										
										<div class="col-lg-6">
											<p class="lead"><span>Medicare: </span> {{ record.0.patient_medicareNum }}</p>
										</div>
										
										<div class="col-lg-6">
											<p class="lead"><span>Home Health: </span> {{ record.0.hhc_name }}</p>
										</div>
										
									</div>
									
									<div class="form-container">
                                        
                                        <div class="row" style="margin:0 !important;     margin-bottom: 15px !important;">
											<div class="col-md-6 form-group">
											
												<label class="control-label">Supervising MD <span>*</span></label>
												<select class="form-control" style="width: 100%;" required="true" name="supervising_md_id">
													<option value="" selected="true">Select</option>

													{% for supervisingMD in supervisingMDs %}

														<option value="{{ supervisingMD.provider_id }}">
															{{ supervisingMD.provider_firstname ~ ' ' ~ supervisingMD.provider_lastname }}
														</option>

													{% endfor %}

												</select>

												
											</div>

											<div class="col-md-6 form-group {{ form_error('pt_providerID') ? 'has-error' : '' }}">
										
												<label class="control-label">Provider <span>*</span></label>

												<div class="dropdown mobiledrs-autosuggest-select">
													<input type="hidden" name="provider_id" required="true">

													<input class="form-control" 
														type="text" 
														data-mobiledrs_autosuggest 
														data-mobiledrs_autosuggest_url="{{ site_url('ajax/provider_management/profile/search') }}"
														data-mobiledrs_autosuggest_dropdown_id="pt_providerID_dropdown">

													<div data-mobiledrs_autosuggest_dropdown id="pt_providerID_dropdown" style="width: 100%;">
														</div>
												</div>
												
											</div>
				
                                        </div>

									
										<div class="row" style="margin:0 !important; margin-bottom: 15px !important;">
										<div class="col-md-6 form-group {{ form_error('pt_dateOfService') ? 'has-error' : '' }}">
											<label>Date of Service</label>
											<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask name="pt_dateOfService" value="">
										</div>
										
                                        
							

										<div class="col-md-6 form-group {{ form_error('pt_tovID') ? 'has-error' : '' }}">
										
											<label class="control-label">Type of Visit <span>*</span></label>
											<select class="form-control" style="width: 100%;" required="true" name="type_of_visit">
												<option value="" selected="true">Select</option>
												<option value="Cognitive Assesment (Home Visits)">Cognitive Assesment (Home Visits)</option>
												<option value="Cognitive Assesment (Telehealth)">Cognitive Assesment (Telehealth)</option>
												

											</select>
											
										</div>
										</div>
										
										<div class="row" style="margin:0 !important;     margin-bottom: 15px !important;">
										
										<div class="col-md-6 form-group">
										
											<label class="control-label">AW/IPPE?</label>
											<select class="form-control" style="width: 100%;" name="pt_aw_ippe_code">
												<option value="" selected="true">Select</option>
												<option value="G0438">G0438</option>
												<option value="G0439">G0439</option>
												<option value="G0492">G0492</option>
											</select>
							                
										</div>
										
										<div class="col-md-6 form-group {{ form_error('pt_performed') ? 'has-error' : '' }}">
										
											<label class="control-label">AW Performed?</label>
											<select class="form-control" style="width: 100%;" name="pt_performed">
												<option value="" selected="true">Select</option>
												<option value="1">Yes</option>
												<option value="2">No</option>
											</select>
							                
										</div>

										</div>

										
										<div class="col-md-12 form-group {{ form_error('pt_icd10_codes') ? 'has-error' : '' }}">
										
											<label class="control-label">ICD-10 Codes</label>
											<input type="text" class="form-control" name="pt_icd10_codes" value="{{ set_value('pt_icd10_codes') }}">
											
										</div>

										<div class="col-md-12 has-error">
											<span class="help-block">{{ form_error('pt_icd10_codes') }}</span>
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
                                        <a href="{{ site_url("patient_management/profile/details/#{ record.0.patient_id }") }}" class="btn btn-default xrx-btn cancel">
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