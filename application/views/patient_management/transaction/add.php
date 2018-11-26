
{% extends "main.php" %}

{% 
  set scripts = [
    'bower_components/select2/dist/js/select2.full.min'
    'plugins/input-mask/jquery.inputmask'
    'plugins/input-mask/jquery.inputmask.date.extensions'
    'plugins/input-mask/jquery.inputmask.extensions'
    'bower_components/moment/min/moment.min'
    'bower_components/bootstrap-daterangepicker/daterangepicker'
    'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min'
    'bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min'
    'plugins/timepicker/bootstrap-timepicker.min'
  ]
%}

{% set page_title = 'Add Transaction' %}

{% block content %}
	<div class="row">

		  <div class="col-lg-8">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Add Transaction</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <form class="form-horizontal">
	              <div class="box-body">
	              
	              	<div class="xrx-info-handler">
		              	<div class="form-group">
		                  <label for="" class="col-sm-3 control-label">Patient Name</label>
		                  
		                  <div class="col-sm-3">
		                  	<p class="lead">Lorna Tolentino</p>
		                  </div>
		                  <label for="" class="col-sm-2 control-label">Date of Birth</label>
		                  
		                  <div class="col-sm-2">
		                  	<p class="lead">04/07/1944</p>
		                  </div>
		                </div>
		                
		                <div class="form-group">
		                  <label for="" class="col-sm-3 control-label">Medicare</label>
		                  
		                  <div class="col-sm-3">
		                  	<p class="lead">604384610M</p>
		                  </div>
		                  <label for="" class="col-sm-2 control-label">Date of Referral</label>
		                  
		                  <div class="col-sm-2">
		                  	<p class="lead">11/12/2018</p>
		                  </div>
		                </div>
	              	</div>
	              	
	              	<div class="form-group">
	              	
	                  <label for="" class="col-sm-3 control-label">Type of Visit</label>
	                  <div class="col-sm-3">
	                  	<select class="form-control select2" style="width: 100%;">
		                  <option selected="selected">Initial Visit (Home)</option>
		                  <option>Initial Visit (Facility)</option>
		                  <option>Follow-up Visit</option>
		                  <option>No Show</option>
		                  <option>Cancelled</option>
		                </select>
	                  </div>
	                  
	                  <label for="" class="col-sm-1 control-label">Provider</label>
	                  
	                  <div class="col-sm-3">
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
	                  
	                </div>
	                
	                <div class="form-group">
	                  
	                  <label for="" class="col-sm-3 control-label">Date of Service</label>
	                  <div class="col-sm-3">
	                  	<div class="input-group date">
		                  <input type="text" class="form-control pull-right" id="dos">
		                </div>
	                  </div>
	                  
	                  <label for="" class="col-sm-1 control-label">Deductible</label>
	                  
	                  <div class="col-sm-3">
	                  	<input type="text" class="form-control" id="" placeholder="">
	                  </div>
	                </div>
	                
	                <div class="form-group">
	                  <label for="inputLastName" class="col-sm-3 control-label">AW / IPPE (Date)</label>
	                  
	                  <div class="col-sm-2">
	                  	<div class="input-group date">
		                  <input type="text" class="form-control pull-right" id="awippe">
		                </div>
	                  </div>
					  <div class="col-sm-2">
					  	<select class="form-control select2" style="width: 100%;">
		                  <option selected="selected">G0438</option>
		                  <option>G0439</option>
		                  <option>G0402</option>
		                </select>
					  </div>
					  
					  	<label for="inputLastName" class="col-sm-1 control-label">Performed?</label>
					  
					  <div class="col-sm-2">
					  	<select class="form-control select2" style="width: 100%;">
		                  <option selected="selected">Yes</option>
		                  <option>No</option>
		                </select>
					  </div>
	                </div>
	                
	                <div class="form-group">
	                  <label for="inputLastName" class="col-sm-3 control-label">ACP</label>
	                  
					  <div class="col-sm-3">
					  	<select class="form-control select2" style="width: 100%;">
		                  <option selected="selected">Yes</option>
		                  <option>No</option>
		                </select>
					  </div>
					  
					  <label for="inputLastName" class="col-sm-1 control-label">Diabetes</label>
					  <div class="col-sm-3">
					  	<select class="form-control select2" style="width: 100%;">
		                  <option selected="selected">Yes</option>
		                  <option>No</option>
		                </select>
					  </div>
	                </div>
					  
					<div class="form-group">
					  <label for="inputLastName" class="col-sm-3 control-label">Tobacco</label>
					  <div class="col-sm-3">
					  	<select class="form-control select2" style="width: 100%;">
		                  <option selected="selected">Yes</option>
		                  <option>No</option>
		                </select>
					  </div>
					  
					  <label for="inputLastName" class="col-sm-1 control-label">TCM</label>
					  <div class="col-sm-3">
					  	<select class="form-control select2" style="width: 100%;">
		                  <option selected="selected">Yes</option>
		                  <option>No</option>
		                </select>
					  </div>
					  
	                </div>
	                
	                <div class="form-group">
	                  <label for="inputMedicare" class="col-sm-3 control-label">Others</label>
	                  
	                  <div class="col-sm-7">
	                  	<input type="text" class="form-control" id="" placeholder="">
	                  </div>
	                </div>
	                
	                <div class="form-group">
	                  <label for="inputMedicare" class="col-sm-3 control-label">ICD-10 Codes</label>
	                  
	                  <div class="col-sm-7">
	                  	<input type="text" class="form-control" id="" placeholder="">
	                  </div>
	                </div>
	                
	                <div class="form-group">
	                  <label for="inputphone" class="col-sm-3 control-label">Date Referral was Emailed</label>
	                  
	                  <div class="col-sm-7">
		                  <input type="text" class="form-control" id="drwe" placeholder="">
	                  </div>
	                </div>
	                
	                <div class="form-group">
	                  <label for="inputAddress1" class="col-sm-3 control-label">Comments</label>
	                  
	                  <div class="col-sm-7">
	                  	<textarea class="form-control" rows="3" placeholder=""></textarea>
	                  </div>
	                </div>
	                
	                <div class="form-group xrx-btn-handler">
	              		<div class="col-sm-3"></div>
	              		<div class="col-sm-7">
		              		<button type="button" class="btn btn-primary xrx-btn">
								<i class="fa fa-check"></i> Add Transaction
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