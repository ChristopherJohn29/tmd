{% extends "main.php" %}

{% 
  set scripts = [
    'plugins/input-mask/jquery.inputmask',
    'plugins/input-mask/jquery.inputmask.date.extensions',
    'plugins/input-mask/jquery.inputmask.extensions'
  ]
%}

{% set page_title = 'Add Notes' %}

{% block content %}
	 <div class="row">

		  <div class="col-lg-6">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Add Notes</h3>
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
									
										<label class="control-label">Date <span>*</span></label>
										<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required>
										
									</div>
									
									
									
									<div class="col-md-12 form-group">
									
										<label class="control-label">Note <span>*</span></label>
                                        <textarea class="form-control" rows="7" required></textarea>
										
									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
					              		<button type="button" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Add Note
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
