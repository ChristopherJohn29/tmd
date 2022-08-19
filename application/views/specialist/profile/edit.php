{% extends "main.php" %}

{% set page_title = 'Update Specialist' %}

{% block content %}
	 <div class="row">

	  	<div class="col-lg-8">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Update Specialist</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							{{ form_open("specialist/profile/save/edit/#{ record.id }", {"class": "xrx-form"}) }}
							
								<div class="row">
									
									<div class="col-md-12 form-group {{ form_error('company_name') ? 'has-error' : '' }}">
									
										<label class="control-label">Company name<span>*</span></label>
										<input type="text" class="form-control"  required="true" name="company_name" value="{{ set_value('company_name', record.company_name) }}">
										
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('company_name') }}</span>
									</div>

									<div class="col-md-12 form-group {{ form_error('contact_person)') ? 'has-error' : '' }}">
									
										<label class="control-label">Contact person<span>*</span></label>
										<input type="text" class="form-control"  required="true" name="contact_person" value="{{ set_value('contact_person', record.contact_person) }}">
										
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('contact_person') }}</span>
									</div>



									
									<div class="col-md-12 form-group {{ form_error('address') ? 'has-error' : '' }}">
									
										<label class="control-label">Address <span>*</span></label>
										<input type="text" class="form-control" required="true" name="address" value="{{ set_value('address', record.address) }}">
										
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('phone_number') }}</span>
									</div>
									
									<div class="col-md-6 form-group {{ form_error('phone_number') ? 'has-error' : '' }}">
									
										<label class="control-label">Phone Number <span>*</span></label>
										<input type="phone" class="form-control"  required="true" name="phone_number" value="{{ set_value('phone_number', record.phone_number) }}">
										
									</div>
									
									<div class="col-md-6 form-group {{ form_error('fax') ? 'has-error' : '' }}">
									
										<label class="control-label">Fax</label>
										<input type="phone" class="form-control" name="fax" value="{{ set_value('fax', record.fax) }}">
										
									</div>

									<div class="col-md-6 has-error">
										<span class="help-block">{{ form_error('phone_number') }}</span>
									</div>

									<div class="col-md-6 has-error">
										<span class="help-block">{{ form_error('fax') }}</span>
									</div>
									
									<div class="col-md-12 form-group {{ form_error('services_provided') ? 'has-error' : '' }}">
									
										<label class="control-label">Services Provided</label>
                           <textarea class="form-control" rows="5" name="services_provided">{{ set_value('services_provided', record.services_provided) }}</textarea>
						                
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('services_provided') }}</span>
									</div>
									
									<div class="col-md-12 form-group {{ form_error('notes') ? 'has-error' : '' }}">
									
										<label class="control-label">Notes</label>
                           <textarea class="form-control" rows="5" name="notes">{{ set_value('notes', record.notes) }}</textarea>
						                
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('notes') }}</span>
									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
                                        <a href="{{ site_url('specialist/profile') }}" class="btn btn-default xrx-btn cancel">
											Cancel
										</a>
                                                                                                    
					              		<button type="submit" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Update Specialist
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