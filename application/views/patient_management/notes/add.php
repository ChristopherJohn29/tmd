{% extends "main.php" %}

{% 
  set scripts = [
    'plugins/input-mask/jquery.inputmask',
    'plugins/input-mask/jquery.inputmask.date.extensions',
    'plugins/input-mask/jquery.inputmask.extensions'
  ]
%}

{% set page_title = 'Add Notes' %}

{% block content %}
	 <div class="row">

		  <div class="col-lg-8">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Add Notes</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							{{ form_open("patient_management/communication_notes/save/add/#{ record.patient_id }", {"class": "xrx-form"}) }}
							
								<div class="row">

									<input type="hidden" name="ptcn_patientID" value="{{ record.patient_id }}">
								
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

									<div class="col-md-6 form-group {{ form_error('ptcn_category') ? 'has-error' : '' }}">
									
										<label class="control-label">Category <span>*</span></label>
                                        <select class="form-control" required="true" name="ptcn_category">
                                        	<option value="">Select</option>

                                        	{% for category in categories %}
										        <option value="{{ category }}">{{ category }}</option>
										    {% endfor %}
                                        </select>
										
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('ptcn_category') }}</span>
									</div>

									<div class="col-md-12 form-group {{ form_error('ptcn_message') ? 'has-error' : '' }}">
									
										<label class="control-label">Note <span>*</span></label>
                                        <textarea class="form-control" rows="7" required="true" name="ptcn_message"></textarea>
										
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('ptcn_message') }}</span>
									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
                                        <a href="{{ site_url("patient_management/profile/details/#{ record.patient_id }") }}" class="btn btn-default xrx-btn cancel">
											Cancel
										</a>
                                        
					              		<button type="submit" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Add Note
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
