{% extends "main.php" %}

{% 
  set scripts = [
    'bower_components/select2/dist/js/select2.full.min',
    'plugins/input-mask/jquery.inputmask',
    'plugins/input-mask/jquery.inputmask.date.extensions',
    'plugins/input-mask/jquery.inputmask.extensions'
  ]
%}

{% set page_title = "Add User" %}

{% block content %}
	<div class="row">
		  <div class="col-lg-6">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							{{ form_open('user_management/profile/save', {"class": "xrx-form"}) }}
							
								<div class="row">
								
									<div class="col-md-12">
										<p class="lead">Personal Information</p>
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">First Name <span class="field-required">*</span></label>
										<input type="text" class="form-control" required="true" name="user_firstname">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Last Name <span class="field-required">*</span></label>
										<input type="text" class="form-control" required="true" name="user_lastname">
										
									</div>
                                    
                                    <div class="col-md-12 subheader">
										<p class="lead">Basic Information</p>
									</div>
                                    
                                    <div class="col-md-6 form-group">
									
										<label class="control-label">Date of Birth <span class="field-required">*</span></label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required="true" name="user_dateOfBirth">
										
									</div>
                                    
                                    <div class="col-md-6 form-group">
									
										<label class="control-label">Gender <span class="field-required">*</span></label>
										<select class="form-control" style="width: 100%;" id="dob" required="true" name="user_gender">
											<option value="" selected="true">Please select</option>
						                  <option value="Male">Male</option>
						                  <option value="Female">Female</option>
						                </select>
										
									</div>
                                    
                                    <div class="col-md-12 subheader">
										<p class="lead">Contact Information</p>
									</div>
                                    
                                    <div class="col-md-6 form-group">
									
										<label class="control-label">Phone <span class="field-required">*</span></label>
										<input type="text" class="form-control" required="true" name="user_phone">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Email <span class="field-required">*</span></label>
										<input type="text" class="form-control" required="true" name="user_email">
										
									</div>
                                    
                                    <div class="col-md-12 form-group">
									
										<label class="control-label">Address <span class="field-required">*</span></label>
										<input type="text" class="form-control" required="true" name="user_address">
										
									</div>
                                    
                                    <div class="col-md-12 subheader">
										<p class="lead">Access Details</p>
									</div>
                                    
                                    <div class="col-md-12 form-group">
									
										<label class="control-label">Account Type <span class="field-required">*</span></label>
										
										<select class="form-control" style="width: 100%;" required="true" name="user_roleID">
											<option value="" selected="true">Please Select</option>

											{% for role in roles %}
												<option value="{{ role.roles_id }}">{{ role.roles_name }}</option>
											{% endfor %}

										</select>
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Password <span class="field-required">*</span></label>
										<input type="password" class="form-control" required="true" name="user_password">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Confirm Password <span class="field-required">*</span></label>
										<input type="password" class="form-control" required="true" name="confirm_password">
										
									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
					              		<button type="submit" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Add User
										</button>
					              	</div>
								
								</div>
								
							</form>
							
						</div>
					</div>
				</div>
            
          </div>
          <!-- /.box -->
{% endblock %}