{% extends "main.php" %}

{% 
  set scripts = [
    'bower_components/select2/dist/js/select2.full.min',
    'plugins/input-mask/jquery.inputmask',
    'plugins/input-mask/jquery.inputmask.date.extensions',
    'plugins/input-mask/jquery.inputmask.extensions',
    'dist/js/user_management/profile/add',
    'dist/js/tmd'
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

					            	<div class="col-xs-12">
								      {% if states %}
								        {{ include('commons/alerts.php') }}
								      {% endif %}
								    </div>
					            	
								
									<div class="col-md-12">
										<p class="lead">Personal Information</p>
									</div>
									
									<div class="col-md-6 form-group">
									

										<label class="control-label">First Name <span>*</span></label>
										<input type="text" class="form-control" required="true" name="user_firstname" value="{{ set_value('user_firstname') }}">

										
									</div>
									
									<div class="col-md-6 form-group">
									

										<label class="control-label">Last Name <span>*</span></label>
										<input type="text" class="form-control" required="true" name="user_lastname" value="{{ set_value('user_lastname') }}">

										
									</div>
                                    
                                    <div class="col-md-6 form-group">
                                        
                                        <label>Upload Image</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-default xrx-upload-file">
                                                Browse... <input type="file" id="imgInp" accept=".jpg">
                                                </span>
                                            </span>
                                            <input type="text" class="form-control" disabled>
                                        </div>
                                        <span class="help-block">Suggested image size is 200px x 200px only.</span>
                                        
                                    </div>
                                    
                                    <div class="col-md-6 form-group">
                                        
                                        <center><img id="img-upload" class="img-circle" /></center>
                                        
                                    </div>
                                    
                                    <div class="col-md-12 subheader">
										<p class="lead">Basic Information</p>
									</div>
                                    
                                    <div class="col-md-6 form-group">
									

										<label class="control-label">Date of Birth <span>*</span></label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required="true" name="user_dateOfBirth" value="{{ set_value('user_dateOfBirth') }}">

										
									</div>
                                    
                                    <div class="col-md-6 form-group">
									

										<label class="control-label">Gender <span>*</span></label>
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
									

										<label class="control-label">Phone <span>*</span></label>
										<input type="text" class="form-control" required="true" name="user_phone" value="{{ set_value('user_phone') }}">

										
									</div>
									
									<div class="col-md-6 form-group">
									

										<label class="control-label">Email <span>*</span></label>
										<input type="text" class="form-control" required="true" name="user_email" value="{{ set_value('user_email') }}">

										
									</div>
                                    
                                    <div class="col-md-12 form-group">
									

										<label class="control-label">Address <span>*</span></label>
										<input type="text" class="form-control" required="true" name="user_address" value="{{ set_value('user_address') }}">

										
									</div>
                                    
                                    <div class="col-md-12 subheader">
										<p class="lead">Access Details</p>
									</div>
                                    
                                    <div class="col-md-12 form-group">
									

										<label class="control-label">Account Type <span>*</span></label>

										
										<select class="form-control" style="width: 100%;" required="true" name="user_roleID">
											<option value="" selected="true">Please Select</option>

											{% for role in roles %}
												<option value="{{ role.roles_id }}">{{ role.roles_name }}</option>
											{% endfor %}

										</select>
										
									</div>
									
									<div class="col-md-6 form-group">
									

										<label class="control-label">Password <span>*</span></label>
										<input type="password" class="form-control" required="true" name="user_password" value="{{ set_value('user_password') }}">

										
									</div>
									
									<div class="col-md-6 form-group">
									

										<label class="control-label">Confirm Password <span>*</span></label>
										<input type="password" class="form-control" required="true" name="confirm_password" value="{{ set_value('confirm_password') }}">

										
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