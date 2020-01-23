{% extends "main.php" %}

{% set page_title = 'Edit Schedule Holiday' %}

{% 
  set scripts = [
    'bower_components/select2/dist/js/select2.full.min',
    'plugins/input-mask/jquery.inputmask',
    'plugins/input-mask/jquery.inputmask.date.extensions',
    'plugins/input-mask/jquery.inputmask.extensions'
  ]
%}


{% block content %}

	<div class="row">

		  <div class="col-lg-8">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Edit Schedule Holiday</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							{{ form_open("scheduled_holidays_management/scheduled_holidays/save/edit/#{ scheduledHoliday.sh_id }", {"class": "xrx-form"}) }}
								
								<div class="row">

									<div class="col-md-6 form-group {{ form_error('sh_description') ? 'has-error' : '' }}">
										<label class="control-label">Description <span>*</span></label>
										<input type="text" class="form-control" id="sh_description" placeholder="" required="true" name="sh_description" value="{{ set_value('sh_description', scheduledHoliday.sh_description) }}">
									</div>

									<div class="col-md-6 form-group {{ form_error('sh_date') ? 'has-error' : '' }}">
										<label class="control-label">Date <span>*</span></label>
										<input type="text" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required="true"  class="form-control" id="sh_date" placeholder="" required="true" name="sh_date" value="{{ set_value('sh_date', scheduledHoliday.get_date_format(scheduledHoliday.sh_date)) }}">
									</div>

									<div class="col-md-6 has-error">
										<span class="help-block">{{ form_error('sh_description') }}</span>
									</div>

									<div class="col-md-6 has-error">
										<span class="help-block">{{ form_error('sh_date') }}</span>
									</div>

									<div class="col-md-12 form-group xrx-btn-handler">
					              		<a href="{{ site_url('scheduled_holidays_management/scheduled_holidays') }}" class="btn btn-default xrx-btn cancel">
											Cancel
										</a>
                                        
                                        <button type="submit" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Update Schedule Holiday
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