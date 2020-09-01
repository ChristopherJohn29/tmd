{% extends "main.php" %}

{% set page_title = 'Add Notes' %}

{% block content %}
	 <div class="row">

		  <div class="col-lg-8">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Add Notes</h3>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <div class="row">
					<div class="col-lg-12">
						<div class="box-body">
						
							{{ form_open("home_health_care_management/notes/save/add/#{ hhc_id }") }}
							
								<div class="row">

									<div class="xrx-info" style="min-height: initial;">
										
										<div class="col-lg-6">
											<p class="lead"><span>Home Health Care: </span> {{ record.hhc_name }}</p>
										</div>
										
										<div class="col-lg-6">
											<p class="lead"><span>Contact Person: </span> {{ record.hhc_contact_name }}</p>
										</div>
										
									</div>

									<input type="hidden" name="hhcn_hhcID" value="{{ hhc_id }}">
								
									<div class="col-md-12 form-group {{ form_error('hhcn_notes') ? 'has-error' : '' }}">
									
										<label class="control-label">Note <span>*</span></label>
                                        <textarea class="form-control" rows="7" required="true" name="hhcn_notes"></textarea>
										
									</div>

									<div class="col-md-12 has-error">
										<span class="help-block">{{ form_error('hhcn_notes') }}</span>
									</div>
									
									<div class="col-md-12 form-group xrx-btn-handler">
                                        <a href="{{ site_url("home_health_care_management/profile/details/#{ hhc_id }") }}" class="btn btn-default xrx-btn cancel">
											Cancel
										</a>
                                        
					              		<button type="submit" class="btn btn-primary xrx-btn">
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
