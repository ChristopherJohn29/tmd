
{% extends "main.php" %}

{% 
  set scripts = [
    'plugins/input-mask/jquery.inputmask',
    'plugins/input-mask/jquery.inputmask.date.extensions',
    'plugins/input-mask/jquery.inputmask.extensions',
    'dist/js/patient_management/transaction/form',
	'dist/js/patient_management/transaction/files'
  ]
%}

{% set page_title = 'Update Visit' %}

{% block content %}
	<div class="row">

		  <div class="col-lg-8">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Update Visit</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							{{ form_open_multipart("patient_management/transaction/save/edit/#{ record.patient_id }/#{ transaction.pt_id }", {"class": "xrx-form"}) }}
							
								<div class="row">
								
									<!-- This is the patient's information -->
									<div class="xrx-info">

										<input type="hidden" name="pt_patientID" value="{{ record.patient_id }}">
										<input type="hidden" name="pt_id" value="{{ transaction.pt_id }}">
										<input type="hidden" name="transaction_file[]" value="">

										{% if transaction.transaction_file %}
										{% set datas = transaction.transaction_file|split(',') %}
										{% for data in datas|slice(0, 5) %}

										<input type="hidden" class="{{ data|replace({'"': ''})|replace({'[': ''})|replace({']': ''})|replace({'.': ''})|replace({'(': ''})|replace({')': ''}) }}" value="{{ data|replace({'"': ''})|replace({'[': ''})|replace({']': ''}) }}" name="transaction_file[]">
										{% endfor %}


										{% else %}
										{% endif %}

										<input type="hidden" name="no_homehealth_ref_checked_by" value="{{ transaction.no_homehealth_ref_checked_by }}">
										<input type="hidden" name="not_our_md_checked_by" value="{{ transaction.not_our_md_checked_by }}">
										<input type="hidden" name="non_admit_checked_by" value="{{ transaction.non_admit_checked_by }}">
										
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

														<option value="{{ supervisingMD.provider_id }}" {{ supervisingMD.provider_id == transaction.pt_supervising_mdID ? 'selected=true' : '' }}>
															{{ supervisingMD.provider_firstname ~ ' ' ~ supervisingMD.provider_lastname }}
														</option>

													{% endfor %}

												</select>

												<br>
												
											</div>

											<div class="col-md-6 form-group {{ form_error('patient_hhcID') ? 'has-error' : '' }}">
											
											<label class="control-label">Home Health *</label>
										
										<div class="dropdown mobiledrs-autosuggest-select">
											<input type="hidden" name="patient_hhcID" value="{{ hhcrecord.patient_hhcID }}" required>

										  	<input class="form-control" 
											  	name="patient_homehealth"
										  		type="text" 
										  		data-mobiledrs_autosuggest 
										  		data-mobiledrs_autosuggest_url="{{ site_url('ajax/home_health_care_management/profile/search') }}"
										  		data-mobiledrs_autosuggest_dropdown_id="patient_hhcID_dropdown"
										  		value="{{ hhcrecord.hhc_name }}" required>

										  	<div data-mobiledrs_autosuggest_dropdown id="patient_hhcID_dropdown" style="width: 100%;">
									  	  	</div>
										</div>

												<br>
												
											</div>
                                        </div>
                                        
										<div class="col-md-6 form-group {{ form_error('pt_dateRef') ? 'has-error' : '' }}">
										
											<label class="control-label">Intake Received</label>
											<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask  name="pt_dateRef" value="{{ set_value('pt_dateRef', transaction.get_date_format(transaction.pt_dateRef)) }}">
											
										</div>

										<div class="col-md-6 form-group {{ form_error('pt_dateRefEmailed') ? 'has-error' : '' }}">
										
											<label class="control-label">Date Referral was Emailed <span>*</span></label>
											<input type="text" required="true" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask  name="pt_dateRefEmailed" value="{{ set_value('pt_dateRefEmailed', transaction.get_date_format(transaction.pt_dateRefEmailed)) }}">
											
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

												{% for type_visit in type_visits %}

													<option value="{{ type_visit.tov_id }}" {{ transaction.get_selected_tov(type_visit.tov_id) }}>{{ type_visit.tov_name }}</option>

												{% endfor %}

											</select>
											
										</div>
										
										<div class="col-md-6 form-group {{ form_error('pt_providerID') ? 'has-error' : '' }}">
										
											<label class="control-label">Provider <span>*</span></label>

											<div class="dropdown mobiledrs-autosuggest-select">
												<input type="hidden" required="true" name="pt_providerID"  value="{{ transaction.pt_providerID }}">

											  	<input class="form-control" 
											  		type="text" 
											  		data-mobiledrs_autosuggest 
											  		data-mobiledrs_autosuggest_url="{{ site_url('ajax/provider_management/profile/search') }}"
											  		data-mobiledrs_autosuggest_dropdown_id="pt_providerID_dropdown"
											  		value="{{ transaction.get_provider_fullname() }}">

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
											<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask  name="pt_dateOfService" value="{{ set_value('pt_dateOfService', transaction.get_date_format( transaction.pt_dateOfService)) }}">
										</div>
										
										<!-- <div class="col-md-6 form-group">
										
											<label class="control-label">Deductible</label>
											<input type="text" class="form-control" name="pt_deductible" value="{{ set_value('pt_deductible', transaction.pt_deductible) }}">
											
										</div> -->

										<div class="col-md-3 form-group">
										
										<label class="control-label">AW or IPPE?</label>
										<select class="form-control" style="width: 100%;" name="pt_aw_ippe_code">
											<option value="" selected="true">Select</option>
											<option value="G0438" {{ transaction.get_selected_aw_ippe_code('G0438') }}>G0438</option>
											<option value="G0439" {{ transaction.get_selected_aw_ippe_code('G0439') }}>G0439</option>
											<option value="G0402" {{ transaction.get_selected_aw_ippe_code('G0402') }}>G0402</option>
										</select>
										
									</div>

									<div class="col-md-3 form-group {{ form_error('pt_performed') ? 'has-error' : '' }}">
										
										<label class="control-label">Performed?</label>
										<select class="form-control" style="width: 100%;"  name="pt_performed">
											<option value="" selected="true">Select</option>
											<option value="1" {{ transaction.get_selected_choice(transaction.pt_performed, '1') }}>Yes</option>
											<option value="2"  {{ transaction.get_selected_choice(transaction.pt_performed, '2') }}>No</option>
										</select>
										
									</div>

										<div class="col-md-12 has-error">
											<span class="help-block">{{ form_error('pt_dateOfService') }}</span>
										</div>

										<!-- <div class="col-md-6 form-group">
										
											<label class="control-label">AW/IPPE Date</label>
											<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask name="pt_aw_ippe_date" value="{{ set_value('pt_aw_ippe_date', transaction.get_date_format(transaction.pt_aw_ippe_date)) }}">
											
										</div> -->
										
									
										
									

										<div class="col-md-12 has-error">
											<span class="help-block text-right">{{ form_error('pt_performed') }}</span>
										</div>
										
										<div class="col-md-6 form-group {{ form_error('pt_acp') ? 'has-error' : '' }}">
										
											<label class="control-label">ACP</label>
											<select class="form-control" style="width: 100%;"  name="pt_acp">
												<option value="" selected="true">Select</option>
												<option value="1" {{ transaction.get_selected_choice(transaction.pt_acp, '1') }}>Yes</option>
												<option value="2" {{ transaction.get_selected_choice(transaction.pt_acp, '2') }}>No</option>
											</select>
											
										</div>
										
										<div class="col-md-3 form-group {{ form_error('pt_diabetes') ? 'has-error' : '' }}">
										
											<label class="control-label">Diabetes</label>
											<select class="form-control" style="width: 100%;"  name="pt_diabetes">
												<option value="" selected="true">Select</option>
												<option value="1" {{ transaction.get_selected_choice(transaction.pt_diabetes, '1') }}>Yes</option>
												<option value="2" {{ transaction.get_selected_choice(transaction.pt_diabetes, '2') }}>No</option>
											</select>
											
										</div>


										<div class="col-md-3 form-group {{ form_error('pt_hypertension') ? 'has-error' : '' }}">
										
											<label class="control-label">Hypertension</label>
											<select class="form-control" style="width: 100%;"  name="pt_hypertension">
												<option value="" selected="true">Select</option>
												<option value="1" {{ transaction.get_selected_choice(transaction.pt_hypertension, '1') }}>Yes</option>
												<option value="2" {{ transaction.get_selected_choice(transaction.pt_hypertension, '2') }}>No</option>
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
											<select class="form-control" style="width: 100%;"  name="pt_tobacco">
												<option value="" selected="true">Select</option>
												<option value="1" {{ transaction.get_selected_choice(transaction.pt_tobacco, '1') }}>Yes</option>
												<option value="2" {{ transaction.get_selected_choice(transaction.pt_tobacco, '2') }}>No</option>
											</select>
											
										</div>
										
										<!-- <div class="col-md-6 form-group {{ form_error('pt_tcm') ? 'has-error' : '' }}" style="display:none">
										
											<label class="control-label">TCM</label>
											<select class="form-control" style="width: 100%;"  name="pt_tcm">
												<option value="" selected="true">Select</option>
												<option value="1" {{ transaction.get_selected_choice(transaction.pt_tcm, '1') }}>Yes</option>
												<option value="2" {{ transaction.get_selected_choice(transaction.pt_tcm, '2') }}>No</option>
											</select>
											
										</div> -->

										

										<!-- <div class="col-md-6 has-error">
											<span class="help-block">{{ form_error('pt_tcm') }}</span>
										</div>
										
										<div class="col-md-12 has-error">
											<span class="help-block">{{ form_error('pt_others') }}</span>
										</div>-->
                                        
										<div class="col-md-6 form-group">
										
											<label class="control-label">Mileage</label>
											<input type="text" class="form-control" name="pt_mileage" value="{{ set_value('pt_mileage', transaction.pt_mileage) }}">
											
										</div>
	                                    
	                                    <!-- <div class="col-md-6 form-group  {{ form_error('pt_others') ? 'has-error' : '' }}" style="display:none">
										
											<label class="control-label">Others</label>
											<input type="text" class="form-control" name="pt_others" value="{{ set_value('pt_others', transaction.pt_others) }}">
											
										</div> -->
										
	                                    <div class="col-md-6 has-error">
											<span class="help-block">{{ form_error('pt_tobacco') }}</span>
										</div>
	                                    
										<div class="col-md-12 form-group {{ form_error('pt_icd10_codes') ? 'has-error' : '' }}">
										
											<label class="control-label">ICD-10 Codes</label>
											<input type="text" class="form-control"  name="pt_icd10_codes" value="{{ set_value('pt_icd10_codes', transaction.pt_icd10_codes) }}">
											
										</div>

										<div class="col-md-12 has-error">
											<span class="help-block">{{ form_error('pt_icd10_codes') }}</span>
										</div>

										<div class="col-md-12 form-group">

											<label class="control-label">Status <span>*</span></label>
											<select class="form-control" style="width: 100%;" name="pt_status" required="true">
												<option value="" selected="true">Select</option>
												<option value="1" {{ transaction.pt_status == '1' ? 'selected=true' : '' }}>Patient is medically stable</option>
												<option value="2" {{ transaction.pt_status == '2' ? 'selected=true' : '' }}>Patient requires immediate medical attention</option>
											</select>
											<br>
										</div>

										<div class="col-md-12 form-check" style="">
									    <label class="control-label">Upload Intake Form File </label>
										<input type="file" class="form-check-input" id="userfile" name="userfile[]" multiple accept=".pdf,.jpg,.jpeg,.png,.gif">
									    <!-- <label class="form-check-label" for="labOrdes">Files</label> -->
									  </div>

										{% if transaction.transaction_file %}
										{% set datas = transaction.transaction_file|split(',') %}
										{% for data in datas|slice(0, 5) %}


										<div class="col-md-12 form-check" style="margin-top: 5px;">
										<label class="form-check-label" > {{ data|replace({'"': ''})|replace({'[': ''})|replace({']': ''}) }}<i class="fa fa-fw fa-remove remove-file" id="{{ data|replace({'"': ''})|replace({'[': ''})|replace({']': ''})|replace({'.': ''})|replace({'(': ''})|replace({')': ''}) }}" style="cursor: pointer;"></i></label>
										</div>
										{% endfor %}

								
										{% else %}
										{% endif %}



										<div class="col-md-12 form-check">
											<br>
									    <input type="checkbox" class="form-check-input" id="labOrdes" name="lab_orders">
									    <label class="form-check-label" for="labOrdes">Create Lab Orders and Results Entry</label>
									  </div>
									 

									  
									  <div class="col-md-12 form-check">
									    <input type="checkbox" class="form-check-input" id="not_our_md" name="not_our_md" value="1" {{ transaction.not_our_md ? 'checked' : '' }}>
									    <label class="form-check-label" for="not_our_md">Not under our MD</label>
									  </div>

									  <div class="col-md-12 form-check">
									    <input type="checkbox" class="form-check-input" id="no_homehealth_ref" name="no_homehealth_ref" value="1" {{ transaction.no_homehealth_ref ? 'checked' : '' }}>
									    <label class="form-check-label" for="no_homehealth_ref">No Homehealth Referral</label>
									  </div>

									  <div class="col-md-12 form-check">
									    <input type="checkbox" class="form-check-input" id="non_admit" name="non_admit" value="1" {{ transaction.non_admit ? 'checked' : '' }}>
									    <label class="form-check-label" for="non_admit">Non-admit</label>
									  </div>


										
										<div class="col-md-12 form-group">
										
											<label class="control-label">Notes</label>
											<textarea class="form-control" name="pt_notes">{{ set_value('pt_notes', transaction.pt_notes) }}</textarea>
											
										</div>

									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
                                        <a href="{{ site_url("patient_management/profile/details/#{ record.patient_id }") }}" class="btn btn-default xrx-btn cancel">
											Cancel
										</a>
                                        
					              		<button type="submit" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Update Visit
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