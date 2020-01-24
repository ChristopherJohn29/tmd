
{% extends "main.php" %}

{% 
  set scripts = [
    'bower_components/select2/dist/js/select2.full.min',
    'plugins/input-mask/jquery.inputmask',
    'plugins/input-mask/jquery.inputmask.date.extensions',
    'plugins/input-mask/jquery.inputmask.extensions',
    'bower_components/moment/min/moment.min',
    'plugins/timepicker/bootstrap-timepicker.min',
    'dist/js/patient_management/cpo/form'
  ]
%}

{# 
    'bower_components/bootstrap-daterangepicker/daterangepicker',
    'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min',
    'bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min',
#}


{% set page_title = 'Update CPO' %}

{% block content %}
	<div class="row">

		  <div class="col-lg-12">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Update Certification</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							{{ form_open("patient_management/CPO/save/edit/#{ record.patient_id }/#{ cpo.ptcpo_id }", {"class": "xrx-form"}) }}
								
								<input type="hidden" name="ptcpo_id" value="{{ cpo.ptcpo_id }}">
								<input type="hidden" name="ptcpo_patientID" value="{{ record.patient_id }}">
								<input type="hidden" id="scheduledHolidayList" value="{{ site_url('ajax/scheduled_holidays_management/scheduled_holidays/list') }}">
								
								<div class="row">
								
									<!-- This is the patient's information -->
									<div class="xrx-info">
									
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

									<div class="col-md-12 form-group">
										<div class="row">
											<div class="col-lg-6 {{ form_error('ptcpo_status') ? 'has-error' : '' }}">
												<label class="control-label">Status <span>*</span></label>
												<select class="form-control" name="ptcpo_status">
													<option value="">Select</option>
													<option value="Certification" {{ cpo.ptcpo_status == 'Certification' ? 'selected=true' : ''}}>Certification</option>
													<option value="Re-Certification" {{ cpo.ptcpo_status == 'Re-Certification' ? 'selected=true' : ''}}>Re-Certification</option>
												</select>
											</div>

											<div class="col-lg-6 {{ form_error('ptcpo_dateOfService') ? 'has-error' : '' }}">
												<label class="control-label">Date of Service <span>*</span></label>
												<input type="text" class="form-control" name="ptcpo_dateOfService" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask value="{{ set_value('ptcpo_dateOfService', cpo.get_date_format(cpo.ptcpo_dateOfService)) }}">
											</div>
										</div>

										<div class="row">
											<div class="col-lg-6 has-error">
												<span class="help-block">{{ form_error('ptcpo_status') }}</span>
											</div>

											<div class="col-lg-6 has-error">
												<span class="help-block">{{ form_error('ptcpo_dateOfService') }}</span>
											</div>
										</div>
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block"></span>
									</div>
									
									<div class="col-md-3 form-group {{ form_error('ptcpo_start_period') ? 'has-error' : '' }}">
									
										<label class="control-label">Certification Start Period <span>*</span></label>
										<input type="text" class="form-control" name="ptcpo_start_period" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask value="{{ set_value('ptcpo_start_period', cpo.get_start_date(cpo.ptcpo_period)) }}">

									</div>

									<div class="col-md-3 form-group {{ form_error('ptcpo_end_period') ? 'has-error' : '' }}">
										<label class="control-label">Certification End Period <span>*</span></label>

										<input type="text" class="form-control" name="ptcpo_end_period" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask value="{{ set_value('ptcpo_end_period', cpo.get_end_date(cpo.ptcpo_period)) }}">
										
									</div>
									
									<div class="col-md-6 form-group {{ form_error('ptcpo_dateSigned') ? 'has-error' : '' }}">
									
										<label class="control-label">485 Date Signed <span>*</span></label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required="true" name="ptcpo_dateSigned" value="{{ set_value('ptcpo_dateSigned', cpo.get_date_format(cpo.ptcpo_dateSigned)) }}">
										
									</div>

									<div class="col-md-3 has-error">
										<span class="help-block">{{ form_error('ptcpo_start_period') }}</span>
									</div>

									<div class="col-md-3 has-error">
										<span class="help-block">{{ form_error('ptcpo_end_period') }}</span>
									</div>

									<div class="col-md-6 has-error">
										<span class="help-block">{{ form_error('ptcpo_dateSigned') }}</span>
									</div>
									
									<div class="col-md-2 form-group {{ form_error('ptcpo_firstMonthCPOFromDate') ? 'has-error' : '' }}">
									
										<label class="control-label">1st Month CPO</label>
										<input type="text" class="form-control holiday-date" name="ptcpo_firstMonthCPOFromDate" value="{{ set_value('ptcpo_firstMonthCPOFromDate', cpo.get_start_date(cpo.ptcpo_firstMonthCPO)) }}" autocomplete="off">
										
									</div>

									<div class="col-md-2 form-group {{ form_error('ptcpo_firstMonthCPOToDate') ? 'has-error' : '' }}">
									
										<label class="control-label">&nbsp;</label>
										<input type="text" class="form-control holiday-date" name="ptcpo_firstMonthCPOToDate" value="{{ set_value('ptcpo_firstMonthCPOToDate', cpo.get_end_date(cpo.ptcpo_firstMonthCPO)) }}" autocomplete="off">
										
									</div>
									
									<div class="col-md-2 form-group {{ form_error('ptcpo_secondMonthCPOFromDate') ? 'has-error' : '' }}">
									
										<label class="control-label">2nd Month CPO</label>
										<input type="text" class="form-control holiday-date" name="ptcpo_secondMonthCPOFromDate" value="{{ set_value('ptcpo_secondMonthCPOFromDate', cpo.get_start_date(cpo.ptcpo_secondMonthCPO)) }}" autocomplete="off">
										
									</div>

									<div class="col-md-2 form-group {{ form_error('ptcpo_secondMonthCPOToDate') ? 'has-error' : '' }}">
									
										<label class="control-label">&nbsp;</label>
										<input type="text" class="form-control holiday-date" name="ptcpo_secondMonthCPOToDate" value="{{ set_value('ptcpo_secondMonthCPOToDate', cpo.get_end_date(cpo.ptcpo_secondMonthCPO)) }}" autocomplete="off">
										
									</div>
									
									<div class="col-md-2 form-group {{ form_error('ptcpo_thirdMonthCPOFromDate') ? 'has-error' : '' }}">
									
										<label class="control-label">3rd Month CPO</label>
										<input type="text" class="form-control holiday-date" name="ptcpo_thirdMonthCPOFromDate" value="{{ set_value('ptcpo_thirdMonthCPOFromDate', cpo.get_start_date(cpo.ptcpo_thirdMonthCPO)) }}" autocomplete="off">
										
									</div>

									<div class="col-md-2 form-group {{ form_error('ptcpo_thirdMonthCPOToDate') ? 'has-error' : '' }}">
									
										<label class="control-label">&nbsp;</label>
										<input type="text" class="form-control holiday-date" name="ptcpo_thirdMonthCPOToDate" value="{{ set_value('ptcpo_thirdMonthCPOToDate', cpo.get_end_date(cpo.ptcpo_thirdMonthCPO)) }}" autocomplete="off">
										
									</div>
									
									<div class="col-md-2 has-error">
										<span class="help-block">{{ form_error('ptcpo_firstMonthCPOFromDate') }}</span>
									</div>

									<div class="col-md-2 has-error">
										<span class="help-block">{{ form_error('ptcpo_firstMonthCPOToDate') }}</span>
									</div>


									<div class="col-md-2 has-error">
										<span class="help-block">{{ form_error('ptcpo_secondMonthCPOFromDate') }}</span>
									</div>

									<div class="col-md-2 has-error">
										<span class="help-block">{{ form_error('ptcpo_secondMonthCPOToDate') }}</span>
									</div>

									<div class="col-md-2 has-error">
										<span class="help-block">{{ form_error('ptcpo_thirdMonthCPOFromDate') }}</span>
									</div>

									<div class="col-md-2 has-error">
										<span class="help-block">{{ form_error('ptcpo_thirdMonthCPOToDate') }}</span>
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Discharged Date</label>
										<input type="text" class="form-control" name="ptcpo_dischargeDate" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask value="{{ set_value('ptcpo_dischargeDate', cpo.get_date_format(cpo.ptcpo_dischargeDate)) }}">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Date Billed</label>
										<input type="text" class="form-control" name="ptcpo_dateBilled" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask value="{{ set_value('ptcpo_dateBilled', cpo.get_date_format(cpo.ptcpo_dateBilled)) }}">
										
									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
                                        <a href="{{ site_url("patient_management/profile/details/#{ record.patient_id }") }}" class="btn btn-default xrx-btn cancel">
											Cancel
										</a>
                                        
					              		<button type="submit" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Update Certification
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