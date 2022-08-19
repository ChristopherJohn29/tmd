{% extends "main.php" %}

{% 
  set scripts = [
  	'bower_components/select2/dist/js/select2.full.min',
  	'plugins/input-mask/jquery.inputmask',
  	'plugins/input-mask/jquery.inputmask.date.extensions',
  	'plugins/input-mask/jquery.inputmask.extensions',
  	'bower_components/moment/min/moment.min',
  ]
%}

{% set page_title = 'Add Cookie' %}

{% block content %}
	<style>
		.form-group{
			margin-top: 5px;
		}
	</style>
	  <div class="row">

		  <div class="col-lg-8">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Add Cookie Access</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
							{{ form_open("cookies/save/add", {"class": "xrx-form"}) }}
								<div class="row">
									<div class="col-xs-12">
									  {% if states %}
										{{ include('commons/alerts.php') }}
									  {% endif %}
									</div>
								
								
								
									<div class="col-md-12 form-group">
										<label class="control-label">Cookie <span>*</span></label>
										<input class="form-control"  type="text" name="cookie" value="" required>
									</div>

									<div class="col-md-12 form-group">
										<label class="control-label">Name <span>*</span></label>
										<input class="form-control"  type="text" name="name" value="" required>
									</div>

									<div class="col-md-12 form-group">
										<label class="control-label">Status <span>*</span></label>
										<select class="form-control" style="width: 100%;" name="status">
											<option value="1">Active</option>
											<option value="0">Inactive</option>
										</select>
									</div>

									<div class="col-md-12 form-group xrx-btn-handler">
                                        <a href="{{ site_url("cookies") }}" class="btn btn-default xrx-btn cancel">
											Cancel
										</a>
                                        
					              		<button type="submit" class="btn btn-primary xrx-btn">
											<i class="fa fa-check"></i> Add Cookie
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