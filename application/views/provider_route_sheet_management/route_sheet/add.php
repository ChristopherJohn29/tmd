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

{% set page_title = 'Add Route' %}

{% block content %}
	  <div class="row">

		  <div class="col-lg-6">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Create Route Sheet</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							<form class="xrx-form">
							
								<div class="row">
								
									<div class="col-md-12">
										<p class="lead">Provider</p>
									</div>
									
									<div class="col-md-12 form-group">
									
										<label>Provider Name</label>
										<select class="form-control select2" style="width: 100%;">
											<option selected="selected">Alexandra Kirtchik</option>
											<option>Fidelia Nchetam</option>
											<option>Grace Adeagbo</option>
											<option>Henry Barraza</option>
											<option>Kaixuan Luo</option>
											<option>Lilibeth Ramirez</option>
											<option>Reynaldo Salcedo</option>
										</select>
										
									</div>
									
									<div class="col-md-12 subheader">
										<p class="lead">Schedule</p>
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Date of Service</label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
										
									</div>
									
									<div class="col-md-12 subheader">
										<p class="lead">Patient Details</p>
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Time of Visit</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Type of Visit</label>
										
										<select class="form-control" style="width: 100%;">
											<option selected="selected">Initial Visit (Home)</option>
											<option>Initial Visit (Facility)</option>
											<option>Follow-up Visit</option>
										</select>
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Patient Name</label>
										<select class="form-control select2" style="width: 100%;">
											<option selected="selected">Cuneta, Sharon</option>
											<option>Tolentino, Lorna</option>
											<option>Soriano, Maricel</option>
											<option>Padilla, Zsa Zsa</option>
											<option>Concepcion, Gabby</option>
											<option>Rickets, Ronnie</option>
											<option>Gibbs, Janno</option>
										</select>
										
									</div>
									
									<div class="col-md-12 form-group">
										<label class="control-label">Home Health</label>
										
										<select class="form-control" style="width: 100%;">
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
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Notes</label>
										<textarea class="form-control" id="" placeholder=""></textarea>
										
									</div>
									
									<div class="col-md-12 form-group">
										
					                  	<button type="button" class="btn btn-default">
											<i class="fa fa-plus"></i> Add Patient
										</button>
					                  
					                </div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
					              		<button type="button" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Add Route Sheet
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