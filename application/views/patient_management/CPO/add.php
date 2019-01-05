
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
  ]
%}

{% set page_title = 'Add CPO' %}

{% block content %}
	<div class="row">

		  <div class="col-lg-8">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Add Certification</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							{{ form_open("patient_management/CPO/save/add/#{ record.patient_id }", {"class": "xrx-form"}) }}
							
								<input type="hidden" name="ptcpo_patientID" value="{{ record.patient_id }}">

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
									
									<div class="col-md-6 form-group {{ form_error('ptcpo_period') ? 'has-error' : '' }}">
									
										<label class="control-label">Certification Period <span>*</span></label>
										<input type="text" class="form-control" required="true" name="ptcpo_period" value="{{ set_value('ptcpo_period') }}">
										
									</div>
									
									<div class="col-md-6 form-group {{ form_error('ptcpo_dateSigned') ? 'has-error' : '' }}">
									
										<label class="control-label">485 Date Signed <span>*</span></label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required="true" name="ptcpo_dateSigned" value="{{ set_value('ptcpo_dateSigned') }}">
										
									</div>

									<div class="col-md-6 has-error">
										<span class="help-block">{{ form_error('ptcpo_period') }}</span>
									</div>

									<div class="col-md-6 has-error">
										<span class="help-block">{{ form_error('ptcpo_dateSigned') }}</span>
									</div>
									
									<div class="col-md-4 form-group {{ form_error('ptcpo_firstMonthCPO') ? 'has-error' : '' }}">
									
										<label class="control-label">1st Month CPO</label>
										<input type="text" class="form-control" name="ptcpo_firstMonthCPO" value="{{ set_value('ptcpo_firstMonthCPO') }}">
										
									</div>
									
									<div class="col-md-4 form-group {{ form_error('ptcpo_secondMonthCPO') ? 'has-error' : '' }}">
									
										<label class="control-label">2nd Month CPO</label>
										<input type="text" class="form-control" name="ptcpo_secondMonthCPO" value="{{ set_value('ptcpo_secondMonthCPO') }}">
										
									</div>
									
									<div class="col-md-4 form-group {{ form_error('ptcpo_thirdMonthCPO') ? 'has-error' : '' }}">
									
										<label class="control-label">3rd Month CPO</label>
										<input type="text" class="form-control" name="ptcpo_thirdMonthCPO" value="{{ set_value('ptcpo_thirdMonthCPO') }}">
										
									</div>

									<div class="col-md-4 has-error">
										<span class="help-block">{{ form_error('ptcpo_firstMonthCPO') }}</span>
									</div>

									<div class="col-md-4 has-error">
										<span class="help-block">{{ form_error('ptcpo_secondMonthCPO') }}</span>
									</div>

									<div class="col-md-4 has-error">
										<span class="help-block">{{ form_error('ptcpo_thirdMonthCPO') }}</span>
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Discharged Date</label>
										<input type="text" class="form-control" name="ptcpo_dischargeDate" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask value="">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Date Billed</label>
										<input type="text" class="form-control" name="ptcpo_dateBilled" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask value="">
										
									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
                                        <button type="submit" class="btn btn-default xrx-btn cancel">
											Cancel
										</button>
                                        
					              		<button type="submit" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Add Certification
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