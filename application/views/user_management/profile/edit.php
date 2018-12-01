{% extends "main.php" %}

{% 
  set scripts = [
    'bower_components/select2/dist/js/select2.full.min',
    'plugins/input-mask/jquery.inputmask',
    'plugins/input-mask/jquery.inputmask.date.extensions',
    'plugins/input-mask/jquery.inputmask.extensions'
  ]
%}

{% set page_title = "Update User" %}

{% block content %}
	<div class="row">

		  <div class="col-lg-6">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Update User</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							<form class="xrx-form">
							
								<div class="row">
								
									<div class="col-md-12">
										<p class="lead">Personal Information</p>
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">First Name</label>
										<input type="text" class="form-control" id="" placeholder="" required>
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Last Name</label>
										<input type="text" class="form-control" id="" placeholder="" required>
										
									</div>
                                    
                                    <div class="col-md-12 subheader">
										<p class="lead">Basic Information</p>
									</div>
                                    
                                    <div class="col-md-6 form-group">
									
										<label class="control-label">Date of Birth</label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required>
										
									</div>
                                    
                                    <div class="col-md-6 form-group">
									
										<label class="control-label">Gender</label>
										<select class="form-control" style="width: 100%;" name="gender" id="dob" required>
						                  <option selected="selected">Male</option>
						                  <option>Female</option>
						                </select>
										
									</div>
                                    
                                    <div class="col-md-12 subheader">
										<p class="lead">Contact Information</p>
									</div>
                                    
                                    <div class="col-md-6 form-group">
									
										<label class="control-label">Phone</label>
										<input type="text" class="form-control" id="" placeholder="" required>
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Email</label>
										<input type="text" class="form-control" id="" placeholder="" required>
										
									</div>
                                    
                                    <div class="col-md-12 form-group">
									
										<label class="control-label">Address</label>
										<input type="text" class="form-control" id="" placeholder="" required>
										
									</div>
                                    
                                    <div class="col-md-12 subheader">
										<p class="lead">Access Details</p>
									</div>
                                    
                                    <div class="col-md-12 form-group">
									
										<label class="control-label">Account Type</label>
										
										<select class="form-control" style="width: 100%;" required>
											<option selected="selected">Administrator</option>
											<option>Normal</option>
										</select>
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Password</label>
										<input type="password" class="form-control" id="" placeholder="" required>
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Confirm Password</label>
										<input type="password" class="form-control" id="" placeholder="" required>
										
									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
					              		<button type="button" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Update
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
{% endblock %}