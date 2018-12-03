{% extends "main.php" %}

{% set page_title = 'Update Home Health Care' %}

{% 
  set scripts = [
    'dist/js/home_health_care_management/profile/edit'
  ]
%}

{% block content %}
	 <div class="row">

	  	<div class="col-lg-6">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Update Home Health</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							<form class="xrx-form">
							
								<div class="row">
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Home Health <span>*</span></label>
										<input type="text" class="form-control" id="" placeholder="" required>
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Contact Person <span>*</span></label>
										<input type="text" class="form-control" id="" placeholder="" required>
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Phone Number <span>*</span></label>
										<input type="phone" class="form-control" id="" placeholder="" required>
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Fax</label>
										<input type="email" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Email <span>*</span></label>
										<input type="email" class="form-control" id="" placeholder="" required>
						                
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Address <span>*</span></label>
										<input type="text" class="form-control" id="" placeholder="" required>
										
									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
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