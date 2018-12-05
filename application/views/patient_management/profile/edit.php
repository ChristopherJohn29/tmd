{% extends "main.php" %}

{% 
  set scripts = [
    'dist/js/patient_management/profile/add',
    'bower_components/select2/dist/js/select2.full.min',
    'plugins/input-mask/jquery.inputmask',
    'plugins/input-mask/jquery.inputmask.date.extensions',
    'plugins/input-mask/jquery.inputmask.extensions'
  ]
%}

{% set page_title = 'Update Patient' %}

{% block content %}
	 <div class="row">

		  <div class="col-lg-6">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Update Patient</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							<form class="xrx-form">
							
								<div class="row">
									
									<div class="col-lg-12">
										<div class="alert alert-success" role="alert"> <strong>Well done!</strong> You successfully read this important alert message. </div>
										<div class="alert alert-info" role="alert"> <strong>Heads up!</strong> This <a href="#" class="alert-link">alert needs your attention</a>, but it's not super important. </div>
										<div class="alert alert-warning" role="alert"> <strong>Warning!</strong> Better check yourself, you're <a href="#" class="alert-link">not looking too good</a>. </div>
										<div class="alert alert-danger" role="alert"> <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again. </div>
									</div>
								
									<div class="col-md-12">
										<p class="lead">Personal Information</p>
									</div>
									
									<div class="col-md-12 form-group has-error">
										<label>Date of Referral <span>*</span></label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required>
                                        <span class="help-block">This field is required.</span>
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">First Name <span>*</span></label>
										<input type="text" class="form-control" name="firstname" id="firstname" placeholder="" required>
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Last Name <span>*</span></label>
										<input type="text" class="form-control" name="lastname" id="lastname" placeholder="" required>
                                        
									</div>
                                    
									<div class="col-md-6 form-group">
									
										<label class="control-label">Date of Birth <span>*</span></label>
										<input type="text" class="form-control" name="dob" id="dob" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required>
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Gender <span>*</span></label>
										<select class="form-control" style="width: 100%;" name="gender" id="dob" required>
						                  <option selected="selected">Male</option>
						                  <option>Female</option>
						                </select>
						                
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Medicare <span>*</span></label>
										<input type="text" class="form-control" name="medicare" id="medicare" placeholder="" required>
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Phone <span>*</span></label>
										<input type="text" class="form-control" name="phone" id="phone" placeholder="" required>
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Address <span>*</span></label>
										<input type="text" class="form-control" name="address" id="address" placeholder="" required>
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Caregiver/Family</label>
										<input type="text" class="form-control" name="caregiver" id="caregiver" placeholder="">
										
									</div>
									
									<div class="col-md-12 subheader">
										<p class="lead ">Home Health Care</p>
									</div>
									
									<div class="col-md-12 form-group">
										<label class="control-label">Home Health <span>*</span></label>
										
										<select class="form-control select2" style="width: 100%;" name="homehealth" id="homehealth" required>
											<option selected="selected">Advance Home Care</option>
											<option>Divine Care Home Health</option>
											<option>Faith and Hope</option>
											<option>GMO Home Health</option>
											<option>Healthy Choice Home Care</option>
											<option>Millenium Home Health</option>
											<option>Nightingle Home Health</option>
											<option>Prestige Home Health</option>
											<option>R & G Home Health Care</option>
										</select>
										
									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
					              		<button type="submit" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Update Patient
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
