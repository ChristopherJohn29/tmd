{% extends "main.php" %}

{% 
  set scripts = [
    'dist/js/patient_management/profile/add'
  ]
%}

{% set page_title = 'Add Patient' %}

{% block content %}
	 <div class="row">

		  <div class="col-lg-8">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Add Patient</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <form class="form-horizontal">
	              <div class="box-body">
	              
	              	<div class="form-group xrx-form-subheader">
	              		<div class="col-sm-3"></div>
	              		<div class="col-sm-7"><p class="lead">Personal Information</p></div>
	              	</div>
	              	
	              	<div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Date of Referral</label>
	                  
	                  <div class="col-sm-7">
	                  	<div class="input-group date">
		                  <input type="text" class="form-control" id="dateofreferral">
		                </div>
	                  </div>
	                </div>
	                
	                <div class="form-group">
	                  <label for="" class="col-sm-3 control-label">First Name</label>
	                  
	                  <div class="col-sm-7">
	                  	<input type="text" class="form-control" id="" placeholder="">
	                  </div>
	                  
	                </div>
	                
	                <div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Last Name</label>
	                  
	                  <div class="col-sm-7">
	                  	<input type="text" class="form-control" id="" placeholder="">
	                  </div>
	                </div>
	                
	                <div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Date of Birth</label>
	                  
	                  <div class="col-sm-7">
	                  	<div class="input-group date">
		                  <input type="text" class="form-control" id="dateofbirth">
		                </div>
	                  </div>
	                </div>
	                
	                <div class="form-group">
	                  <label for="inputGender" class="col-sm-3 control-label">Gender</label>
	                  
	                  <div class="col-sm-7">
	                  	<select class="form-control select2" style="width: 100%;">
		                  <option selected="selected">Male</option>
		                  <option>Female</option>
		                </select>
	                  </div>
	                </div>
	                
	                <div class="form-group">
	                  <label for="inputMedicare" class="col-sm-3 control-label">Medicare</label>
	                  
	                  <div class="col-sm-7">
	                  	<input type="text" class="form-control" id="Medicare" placeholder="">
	                  </div>
	                </div>
	                
	                <div class="form-group">
	                  <label for="inputphone" class="col-sm-3 control-label">Phone No</label>
	                  
	                  <div class="col-sm-7">
	                  	<input type="text" class="form-control" id="Phone" placeholder="">
	                  </div>
	                </div>
	                
	                <div class="form-group">
	                  <label for="inputAddress1" class="col-sm-3 control-label">Address</label>
	                  
	                  <div class="col-sm-7">
	                  	<input type="text" class="form-control" id="Address1" placeholder="">
	                  </div>
	                </div>
	                
	                <div class="form-group xrx-form-subheader">
	              		<div class="col-sm-3"></div>
	              		<div class="col-sm-7"><p class="lead">Home Health Care</p></div>
	              	</div>
	              	
	              	<div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Home Health</label>
	                  
	                  <div class="col-sm-7">
	                  	<select class="form-control select2" style="width: 100%;">
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
	                </div>
	                
	                <div class="form-group xrx-btn-handler">
	              		<div class="col-sm-3"></div>
	              		<div class="col-sm-7">
		              		<button type="button" class="btn btn-primary xrx-btn">
								<i class="fa fa-check"></i> Add Patient
							</button>
	              		</div>
	              	</div>
	                
	              </div>
	              
	            </form>
            
          </div>
          <!-- /.box -->

      </div>

      </div>
{% endblock %}
