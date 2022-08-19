{% extends "main.php" %}

{% 
  set scripts = [
    'bower_components/select2/dist/js/select2.full.min',
    'plugins/input-mask/jquery.inputmask',
    'plugins/input-mask/jquery.inputmask.date.extensions',
    'plugins/input-mask/jquery.inputmask.extensions'
  ]
%}

{% set page_title = 'Create Label' %}

{% block content %}
	 <div class="row">

		  <div class="col-lg-8">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Create Label</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							{{ form_open("patient_management/profile/save/edit/#{ record.patient_id }", {"class": "xrx-form"}) }}
							
								<div class="row">									
								
									<div class="col-md-12 form-group {{ form_error('patient_name') ? 'has-error' : '' }}">
									
										<label class="control-label">Last name, First name <span>*</span></label>
										<input type="text" class="form-control" id="name" placeholder="" required="true" name="patient_name" value="{{ set_value('patient_name', record.patient_name) }}">
									</div>

								
									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('patient_name') }}</span>
									</div>
                                    
									<div class="col-md-12 form-group {{ form_error('patient_address') ? 'has-error' : '' }}">
									
										<label class="control-label">Address <span>*</span></label>
										<textarea class="form-control" id="address" placeholder="" required="true" name="patient_address" value="{{ set_value('patient_address', record.patient_address) }}">{{ set_value('patient_address', record.patient_address) }}</textarea>
										
									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
                                        <a href="{{ site_url('patient_management/profile/details') }}/{{ record.patient_id }}" class="btn btn-default xrx-btn cancel">
											Cancel
										</a>
                                        
					              		<button type="submit" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Submit
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
