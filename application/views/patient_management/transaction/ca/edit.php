
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
										<input type="hidden" name="is_ca" value="1">

										<input type="hidden" name="no_homehealth_ref_checked_by" value="{{ transaction.no_homehealth_ref_checked_by }}">
										<input type="hidden" name="not_our_md_checked_by" value="{{ transaction.not_our_md_checked_by }}">
										<input type="hidden" name="non_admit_checked_by" value="{{ transaction.non_admit_checked_by }}">
										<input type="hidden" name="is_early_discharge_checked_by" value="{{ transaction.is_early_discharge_checked_by }}">
										
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

														<option value="{{ supervisingMD.provider_id }}" {{ supervisingMD.provider_id == transaction.pt_supervising_mdID ? 'selected=true' : '' }}>
															{{ supervisingMD.provider_firstname ~ ' ' ~ supervisingMD.provider_lastname }}
														</option>

													{% endfor %}

												</select>

												<br>
												
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

											<br>
											
										</div>

											
                                        </div>

										<div class="row" style="margin:0 !important;">

										<div class="col-md-6 form-group {{ form_error('pt_dateOfService') ? 'has-error' : '' }}">
											<label>Date of Service</label>
											<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask  name="pt_dateOfService" value="{{ set_value('pt_dateOfService', transaction.get_date_format( transaction.pt_dateOfService)) }}">
											<br>
										</div>
	


										<div class="col-md-6 form-group {{ form_error('pt_tovID') ? 'has-error' : '' }}">
										
											<label class="control-label">Type of Visit <span>*</span></label>
											<select class="form-control" style="width: 100%;" required="true" name="pt_tovID">
						
												<option value="" selected="true">Select</option>
												<option {{ transaction.pt_tovID == 9 ? 'selected' : ''}} value="9">Cognitive Assesment (Home Visits)</option>
												<option {{ transaction.pt_tovID == 10 ? 'selected' : ''}} value="10">Cognitive Assesment (Telehealth)</option>
												<option {{ transaction.pt_tovID == 11 ? 'selected' : ''}} value="11"> Home Health Refused Visit</option>
												<option {{ transaction.pt_tovID == 12 ? 'selected' : ''}} value="12"> Patient Refused Visit</option>
												<option {{ transaction.pt_tovID == 5 ? 'selected' : ''}} value="5"> No Show</option>
												<option {{ transaction.pt_tovID == 6 ? 'selected' : ''}} value="6"> Cancelled</option>
													
											</select>
											<br>
											
										</div>

										</div>
										
									
										
									

										<!-- <div class="row" style="margin:0 !important;">

									

										<div class="col-md-12 form-group {{ form_error('pt_acp') ? 'has-error' : '' }}">
										
											<label class="control-label">ACP</label>
											<select class="form-control" style="width: 100%;"  name="pt_acp">
												<option value="" selected="true">Select</option>
												<option value="1" {{ transaction.get_selected_choice(transaction.pt_acp, '1') }}>Yes</option>
												<option value="2" {{ transaction.get_selected_choice(transaction.pt_acp, '2') }}>No</option>
											</select>
											<br>
										</div>

										</div> -->

										
										<div class="col-md-12 form-group {{ form_error('pt_icd10_codes') ? 'has-error' : '' }}">
										
											<label class="control-label">ICD-10 Codes</label>
											<input type="text" class="form-control"  name="pt_icd10_codes" value="{{ set_value('pt_icd10_codes', transaction.pt_icd10_codes) }}">
											
										</div>

										<div class="col-md-12 has-error">
											<span class="help-block">{{ form_error('pt_icd10_codes') }}</span>
										</div>

										<div class="col-md-12 form-check" style="">
											<label class="control-label">Upload File </label>
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
									    <input type="checkbox" class="form-check-input" id="labOrdes" name="lab_orders">
									    <label class="form-check-label" for="labOrdes">Create Lab Orders and Results Entry</label>
									  </div>
									

										
										<div class="col-md-12 form-group">
										
											<label class="control-label">Notes</label>
											<textarea class="form-control" name="pt_notes" disabled>{{ set_value('pt_notes', transaction.pt_notes) }}</textarea>
											
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