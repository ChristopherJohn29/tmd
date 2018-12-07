
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

{% set page_title = 'Add Transaction' %}

{% block content %}
	<div class="row">

		  <div class="col-lg-6">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Add Transaction</h3>
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
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Type of Visit <span>*</span></label>
										<select class="form-control" style="width: 100%;" required>
											<option selected="selected">Initial Visit (Home)</option>
											<option>Initial Visit (Facility)</option>
											<option>Follow-up Visit</option>
											<option>No Show</option>
											<option>Cancelled</option>
										</select>
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Provider <span>*</span></label>
										<select class="form-control select2" style="width: 100%;" required>
											<option selected="selected">Alexandra Kirtchik</option>
											<option>Fidelia Nchetam</option>
											<option>Grace Adeagbo</option>
											<option>Henry Barraza</option>
											<option>Kaixuan Luo</option>
											<option>Lilibeth Ramirez</option>
											<option>Reynaldo Salcedo</option>
										</select>
										
									</div>
									
									<div class="col-md-6 form-group">
										<label>Date of Service <span>*</span></label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required>
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Deductible</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">AW/IPPE Date</label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
										
									</div>
									
									<div class="col-md-3 form-group">
									
										<label class="control-label">AW or IPPE?</label>
										<select class="form-control" style="width: 100%;">
											<option selected="selected">G0438</option>
											<option>G0439</option>
											<option>G0402</option>
										</select>
						                
									</div>
									
									<div class="col-md-3 form-group">
									
										<label class="control-label">Performed? <span>*</span></label>
										<select class="form-control" style="width: 100%;" required>
											<option selected="selected">Yes</option>
											<option>No</option>
										</select>
						                
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">ACP <span>*</span></label>
										<select class="form-control" style="width: 100%;" required>
											<option selected="selected">Yes</option>
											<option>No</option>
										</select>
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Diabetes <span>*</span></label>
										<select class="form-control" style="width: 100%;" required>
											<option selected="selected">Yes</option>
											<option>No</option>
										</select>
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Tobacco <span>*</span></label>
										<select class="form-control" style="width: 100%;" required>
											<option selected="selected">Yes</option>
											<option>No</option>
										</select>
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">TCM <span>*</span></label>
										<select class="form-control" style="width: 100%;" required>
											<option selected="selected">Yes</option>
											<option>No</option>
										</select>
										
									</div>
									
									<div class="col-md-6 form-group">
									
										<label class="control-label">Mileage</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
                                    
                                    <div class="col-md-6 form-group">
									
										<label class="control-label">Others</label>
										<input type="text" class="form-control" id="" placeholder="">
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">ICD-10 Codes <span>*</span></label>
										<input type="text" class="form-control" id="" placeholder="" required>
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Date Referral was Emailed <span>*</span></label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required>
										
									</div>
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Notes</label>
										<textarea class="form-control" id="" placeholder=""></textarea>
										
									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
					              		<button type="button" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Add Transaction
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