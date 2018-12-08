{% extends "main.php" %}

{% set page_title = 'Add Home Health Care' %}

{% block content %}
	 <div class="row">

	  	<div class="col-lg-6">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Add Home Health</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							{{ form_open("home_health_care_management/profile/save", {"class": "xrx-form"}) }}
							
								<div class="row">
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Home Health <span>*</span></label>
										<input type="text" class="form-control"  required="true" name="hhc_name" value="{{ set_value('hhc_name') }}">
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Contact Person <span>*</span></label>
										<input type="text" class="form-control" " required="true" name="hhc_contact_name" value="{{ set_value('hhc_name') }}">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Phone Number <span>*</span></label>
										<input type="phone" class="form-control"  required="true" name="hhc_phoneNumber" value="{{ set_value('hhc_phoneNumber') }}">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Fax</label>
										<input type="phone" class="form-control" name="hhc_faxNumber" value="{{ set_value('hhc_faxNumber') }}">
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Email <span>*</span></label>
										<input type="email" class="form-control"  required="true" name="hhc_email" value="{{ set_value('hhc_email') }}">
						                
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Address <span>*</span></label>
										<input type="text" class="form-control"  required="true" name="hhc_address" value="{{ set_value('hhc_address') }}">
										
									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
					              		<button type="submit" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Add Home Health
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
