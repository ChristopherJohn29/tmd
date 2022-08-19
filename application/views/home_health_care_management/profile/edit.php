{% extends "main.php" %}

{% set page_title = 'Update Home Health Care' %}

{% block content %}
	 <div class="row">

	  	<div class="col-lg-8">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Update Home Health</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							{{ form_open("home_health_care_management/profile/save/edit/#{ record.hhc_id }", {"class": "xrx-form"}) }}
							
								<div class="row">
									
									<div class="col-md-12 form-group {{ form_error('hhc_name') ? 'has-error' : '' }}">
									
										<label class="control-label">Home Health <span>*</span></label>
										<input type="text" class="form-control"  required="true" name="hhc_name" value="{{ set_value('hhc_name', record.hhc_name) }}">
										
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('hhc_name') }}</span>
									</div>
									
									<div class="col-md-12 form-group {{ form_error('hhc_contact_name') ? 'has-error' : '' }}">
									
										<label class="control-label">Contact Person <span>*</span></label>
										<input type="text" class="form-control" required="true" name="hhc_contact_name" value="{{ set_value('hhc_contact_name', record.hhc_contact_name) }}">
										
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('hhc_contact_name') }}</span>
									</div>
									
									<div class="col-md-6 form-group {{ form_error('hhc_phoneNumber') ? 'has-error' : '' }}">
									
										<label class="control-label">Phone Number <span>*</span></label>
										<input type="phone" class="form-control"  required="true" name="hhc_phoneNumber" value="{{ set_value('hhc_phoneNumber', record.hhc_phoneNumber) }}">
										
									</div>
									
									<div class="col-md-6 form-group {{ form_error('hhc_faxNumber') ? 'has-error' : '' }}">
									
										<label class="control-label">Fax</label>
										<input type="phone" class="form-control" name="hhc_faxNumber" value="{{ set_value('hhc_faxNumber', record.hhc_faxNumber) }}">
										
									</div>

									<div class="col-md-6 has-error">
										<span class="help-block">{{ form_error('hhc_phoneNumber') }}</span>
									</div>

									<div class="col-md-6 has-error">
										<span class="help-block">{{ form_error('hhc_faxNumber') }}</span>
									</div>
									
									<div class="col-md-12 form-group {{ form_error('hhc_email') ? 'has-error' : '' }}">
									
										<label class="control-label">Email</label>
										<input type="email" class="form-control" name="hhc_email" value="{{ set_value('hhc_email', record.hhc_email) }}">
						                
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('hhc_email') }}</span>
									</div>

									<div class="col-md-12 form-group {{ form_error('hhc_email_additional') ? 'has-error' : '' }}">
									
										<label class="control-label">Second Email</label>
										<input type="email" class="form-control" name="hhc_email_additional" value="{{ set_value('hhc_email_additional', record.hhc_email_additional) }}">
						                
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('hhc_email_additional') }}</span>
									</div>
									
									<div class="col-md-12 form-group {{ form_error('hhc_address') ? 'has-error' : '' }}">
									
										<label class="control-label">Address</label>
										<input type="text" class="form-control" name="hhc_address" value="{{ set_value('hhc_address', record.hhc_address) }}">
										
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('hhc_address') }}</span>
									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
					              		<a href="{{ site_url('home_health_care_management/profile') }}" class="btn btn-default xrx-btn cancel">
											Cancel
										</a>
                                        
                                        <button type="submit" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Update Home Health
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