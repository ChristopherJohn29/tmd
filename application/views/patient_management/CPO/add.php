
{% extends "main.php" %}

{% 
  set scripts = [
    'bower_components/select2/dist/js/select2.full.min',
    'plugins/input-mask/jquery.inputmask',
    'plugins/input-mask/jquery.inputmask.date.extensions',
    'plugins/input-mask/jquery.inputmask.extensions',
    'bower_components/moment/min/moment.min',
    'bower_components/bootstrap-daterangepicker/daterangepicker',
    'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min',
    'bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min',
    'plugins/timepicker/bootstrap-timepicker.min'
  ]
%}

{% set page_title = 'Add CPO' %}

{% block content %}
	<div class="row">

		  <div class="col-lg-6">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Add Certification</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							<form class="xrx-form">
							
								<div class="row">
								
									<!-- This is the patient's information -->
									<div class="xrx-info">
									
										<div class="col-lg-6">
											<p class="lead"><span>Patient Name: </span> Cuneta, Sharon</p>
										</div>
										
										<div class="col-lg-6">
											<p class="lead"><span>Date of Birth: </span> 04/07/1974</p>
										</div>
										
										<div class="col-lg-6">
											<p class="lead"><span>Medicare: </span> 604384610M</p>
										</div>
										
										<div class="col-lg-6">
											<p class="lead"><span>Home Health: </span> Advance Home Care</p>
										</div>
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Type of Certification</label>
										<select class="form-control" style="width: 100%;">
											<option selected="selected">Certification</option>
											<option>Re-Certification</option>
										</select>
										
									</div>
									
									
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Certification Period</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">485 Date Signed</label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
										
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">1st Month CPO</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">2nd Month CPO</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-4 form-group">
									
										<label class="control-label">3rd Month CPO</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Discharged Date</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Date Billed</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
					              		<button type="button" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Add Certification
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