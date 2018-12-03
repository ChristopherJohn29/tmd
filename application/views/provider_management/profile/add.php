{% extends "main.php" %}

{% 
  set scripts = [
    'bower_components/select2/dist/js/select2.full.min',
    'plugins/input-mask/jquery.inputmask',
    'plugins/input-mask/jquery.inputmask.date.extensions',
    'plugins/input-mask/jquery.inputmask.extensions'
  ]
%}

{% set page_title = 'Add Provider' %}

{% block content %}
	<div class="row">
	  <div class="col-lg-6">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Add Provider</h3>
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
									
										<label class="control-label">First Name <span>*</span></label>
										<input type="text" class="form-control" id="" placeholder="" required>
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Last Name <span>*</span></label>
										<input type="text" class="form-control" id="" placeholder="" required>
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Phone Number <span>*</span></label>
										<input type="phone" class="form-control" id="" placeholder="" required>
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Email <span>*</span></label>
										<input type="email" class="form-control" id="" placeholder="" required>
										
									</div>
									
                                    <div class="col-md-6 form-group">
									
										<label class="control-label">Gender <span>*</span></label>
										<select class="form-control" style="width: 100%;" name="gender" id="dob" required>
						                  <option selected="selected">Male</option>
						                  <option>Female</option>
						                </select>
						                
									</div>
                                    
									<div class="col-md-6 form-group">
									
										<label class="control-label">Date of Birth <span>*</span></label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required>
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Languages <span>*</span></label>
										<input type="text" class="form-control" id="" placeholder="" required>
						                
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Areas <span>*</span></label>
										<input type="text" class="form-control" id="" placeholder="" required>
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Address <span>*</span></label>
										<input type="text" class="form-control" id="" placeholder="" required>
										
									</div>
									
									<div class="col-md-12">
										<p class="lead subheader">Credentials</p>
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">National Provider Identifier</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">DEA Registration Number</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">License</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-12">
										<p class="lead subheader">Rates</p>
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">Initial Visit <span>*</span></label>
										<input type="text" class="form-control" id="" placeholder="" required>
										
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">Follow-up Visit <span>*</span></label>
										<input type="text" class="form-control" id="" placeholder="" required>
										
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">Annual Wellness <span>*</span></label>
										<input type="text" class="form-control" id="" placeholder="" required>
										
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">ACP <span>*</span></label>
										<input type="text" class="form-control" id="" placeholder="" required>
										
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">No Show <span>*</span></label>
										<input type="text" class="form-control" id="" placeholder="" required>
										
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">Others <span>*</span></label>
										<input type="text" class="form-control" id="" placeholder="" required>
										
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">Mileage <span>*</span></label>
										<input type="text" class="form-control" id="" placeholder="" required>
										
									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
					              		<button type="submit" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Add Provider
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