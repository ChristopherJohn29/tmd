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
						
							{{ form_open("patient_management/profile/save/#{ record.patient_id }", {"class": "xrx-form"}) }}
							
								<div class="row">									
								
									<div class="col-md-12">
										<p class="lead">Personal Information</p>
									</div>
									
									<div class="col-md-12 form-group">
										<label>Date of Referral <span>*</span></label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required="true" name="patient_referralDate" value="{{ set_value('patient_referralDate', record.patient_referralDate) }}">
									</div>

									<!-- <div class="col-md-12 form-group has-error">
										<label>Date of Referral <span>*</span></label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required="true">
                                        <span class="help-block">This field is required.</span>
									</div> -->
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">First Name <span>*</span></label>
										<input type="text" class="form-control" id="firstname" placeholder="" required="true" name="patient_firstname" value="{{ set_value('patient_firstname', record.patient_firstname) }}">
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Last Name <span>*</span></label>
										<input type="text" class="form-control" id="lastname" placeholder="" required="true" name="patient_lastname" value="{{ set_value('patient_lastname', record.patient_lastname) }}">
                                        
									</div>
                                    
									<div class="col-md-6 form-group">
									
										<label class="control-label">Date of Birth <span>*</span></label>
										<input type="text" class="form-control" id="dob" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required="true" name="patient_dateOfBirth" value="{{ set_value('patient_dateOfBirth', record.patient_dateOfBirth) }}">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Gender <span>*</span></label>
										<select class="form-control" style="width: 100%;" name="patient_gender" id="dob" required="true">
											<option value="">Please select</option>
						                  	<option value="Male" {{ record.get_selected_gender('Male') }}>Male</option>
						                  	<option value="Female" {{ record.get_selected_gender('Male') }}>Female</option>
						                </select>
						                
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Medicare <span>*</span></label>
										<input type="text" class="form-control" id="medicare" placeholder="" required="true" name="patient_medicareNum" value="{{ set_value('patient_medicareNum', record.patient_medicareNum) }}">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Phone <span>*</span></label>
										<input type="text" class="form-control" id="phone" placeholder="" required="true" name="patient_phoneNum" value="{{ set_value('patient_phoneNum', record.patient_phoneNum) }}">
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Address <span>*</span></label>
										<input type="text" class="form-control" id="address" placeholder="" required="true" name="patient_address" value="{{ set_value('patient_address', record.patient_address) }}">
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Caregiver/Family</label>
										<input type="text" class="form-control" id="caregiver" placeholder="" name="patient_caregiver_family" value="{{ set_value('patient_caregiver_family', record.patient_caregiver_family) }}">
										
									</div>
									
									<div class="col-md-12 subheader">
										<p class="lead ">Home Health Care</p>
									</div>
									
									<div class="col-md-12 form-group">
										<label class="control-label">Home Health <span>*</span></label>
										
										<input type="hidden" name="patient_hhcID" required="true" value="{{ record.patient_hhcID }}">
										<div class="dropdown mobiledrs-autosuggest-select">
										  	<input type="text" class="form-control" data-mobiledrs-autosuggest-select data-action-url="{{ site_url('ajax/patient_management/profile/search') }}" data-input-target-name="patient_hhcID">
										  	<ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="width:100%;">
									  	  </ul>										
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
