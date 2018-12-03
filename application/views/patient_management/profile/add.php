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

{% set page_title = 'Add Patient' %}

{% block content %}
	 <div class="row">

		  <div class="col-lg-6">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Add Patient</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							{{ form_open("patient_management/profile/save", {"class": "xrx-form"}) }}
							
								<div class="row">									
								
									<div class="col-md-12">
										<p class="lead">Personal Information</p>
									</div>
									
									<div class="col-md-12 form-group">
										<label>Date of Referral <span>*</span></label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required="true" name="patient_referralDate">
									</div>

									<!-- <div class="col-md-12 form-group has-error">
										<label>Date of Referral <span>*</span></label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required="true">
                                        <span class="help-block">This field is required.</span>
									</div> -->
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">First Name <span>*</span></label>
										<input type="text" class="form-control" name="firstname" id="firstname" placeholder="" required="true" name="patient_firstname">
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Last Name <span>*</span></label>
										<input type="text" class="form-control" name="lastname" id="lastname" placeholder="" required="true" name="patient_lastname">
                                        
									</div>
                                    
									<div class="col-md-6 form-group">
									
										<label class="control-label">Date of Birth <span>*</span></label>
										<input type="text" class="form-control" name="dob" id="dob" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required="true" name="patient_dateOfBirth">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Gender <span>*</span></label>
										<select class="form-control" style="width: 100%;" name="patient_gender" id="dob" required="true">
											<option value="" selected="true">Please select</option>
						                  	<option value="Male">Male</option>
						                  	<option value="Female">Female</option>
						                </select>
						                
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Medicare <span>*</span></label>
										<input type="text" class="form-control" name="medicare" id="medicare" placeholder="" required="true" name="patient_medicareNum">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Phone <span>*</span></label>
										<input type="text" class="form-control" name="phone" id="phone" placeholder="" required="true" name="patient_phoneNum">
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Address <span>*</span></label>
										<input type="text" class="form-control" name="address" id="address" placeholder="" required="true" name="patient_address">
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Caregiver/Family</label>
										<input type="text" class="form-control" name="caregiver" id="caregiver" placeholder="" name="patient_caregiver_family">
										
									</div>
									
									<div class="col-md-12 subheader">
										<p class="lead ">Home Health Care</p>
									</div>
									
									<div class="col-md-12 form-group">
										<label class="control-label">Home Health <span>*</span></label>
										
										<select class="form-control select2" style="width: 100%;" name="homehealth" id="homehealth" required="true" name="patient_hhcID">
										</select>
										
									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
					              		<button type="submit" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Add Patient
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
