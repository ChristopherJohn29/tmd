{% extends "main.html" %}

{% set page_title = "Add User" %}

{% block content %}
	<div class="row">

		  <div class="col-lg-8">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <form class="form-horizontal">
	              <div class="box-body">
	              
	              	<div class="form-group xrx-form-subheader">
	              		<div class="col-sm-3"></div>
	              		<div class="col-sm-7"><p class="lead">User Information</p></div>
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
	                  	<input type="text" class="form-control" id="" placeholder="">
	                  </div>
	                  
	                </div>
	                
	                <div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Email</label>
	                  
	                  <div class="col-sm-7">
	                  	<input type="text" class="form-control" id="" placeholder="">
	                  </div>
	                  
	                </div>
	                
	                <div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Type of Access</label>
	                  
	                  <div class="col-sm-7">
	                  	<select class="form-control select2" style="width: 100%;">
		                  <option selected="selected">Normal user</option>
		                  <option>Administrator</option>
		                </select>
	                  </div>
	                </div>
	                
	                
	                
	                <div class="form-group xrx-btn-handler">
	              		<div class="col-sm-3"></div>
	              		<div class="col-sm-7">
		              		<button type="button" class="btn btn-primary xrx-btn">
								<i class="fa fa-check"></i> Add User
							</button>
	              		</div>
	              	</div>
	                
	              </div>
	              
	            </form>
            
          </div>
          <!-- /.box -->

      </div>
{% endblock %}