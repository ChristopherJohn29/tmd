
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
    'dist/js/patient_management/CPO/form'
  ]
%}

{% set page_title = 'Update CPO' %}

{% block content %}
	<div class="row">

		  <div class="col-lg-6">
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

								<div class="row">
								
									<!-- This is the patient's information -->
									<div class="xrx-info">
									
										<div class="col-lg-6">
											<p class="lead"><span>Patient Name: </span> {{ record.get_reverse_fullname() }}</p>
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
									
									<div class="col-md-6 form-group {{ form_error() ? 'has-error' : '' }}">
									
										<label class="control-label">Certification Period <span>*</span></label>
										<input type="text" class="form-control" required="true" name="ptcpo_period" value="{{ set_value('ptcpo_period', cpo.ptcpo_period) }}">
										
									</div>
									
									<div class="col-md-6 form-group {{ form_error() ? 'has-error' : '' }}">
									
										<label class="control-label">485 Date Signed <span>*</span></label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required="true" name="ptcpo_dateSigned" value="{{ set_value('ptcpo_dateSigned', cpo.get_field_date_format(cpo.ptcpo_dateSigned)) }}">
										
									</div>
									
									<div class="col-md-4 form-group {{ form_error() ? 'has-error' : '' }}">
									
										<label class="control-label">1st Month CPO <span>*</span></label>
										<input type="text" class="form-control" required="true" name="ptcpo_firstMonthCPO" value="{{ set_value('ptcpo_firstMonthCPO', cpo.ptcpo_firstMonthCPO) }}">
										
									</div>
									
									<div class="col-md-4 form-group {{ form_error() ? 'has-error' : '' }}">
									
										<label class="control-label">2nd Month CPO <span>*</span></label>
										<input type="text" class="form-control" required="true" name="ptcpo_secondMonthCPO" value="{{ set_value('ptcpo_secondMonthCPO', cpo.ptcpo_secondMonthCPO) }}">
										
									</div>
									
									<div class="col-md-4 form-group {{ form_error() ? 'has-error' : '' }}">
									
										<label class="control-label">3rd Month CPO <span>*</span></label>
										<input type="text" class="form-control" required="true" name="ptcpo_thirdMonthCPO" value="{{ set_value('ptcpo_thirdMonthCPO', cpo.ptcpo_thirdMonthCPO) }}">
										
									</div>
									
									
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Discharged Date</label>
										<input type="text" class="form-control" name="ptcpo_dischargeDate" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask value="{{ set_value('ptcpo_dischargeDate', cpo.get_field_date_format(cpo.ptcpo_dischargeDate)) }}">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Date Billed</label>
										<input type="text" class="form-control" name="ptcpo_dateBilled" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask value="{{ set_value('ptcpo_dateBilled', cpo.get_field_date_format(cpo.ptcpo_dateBilled)) }}">
										
									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
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