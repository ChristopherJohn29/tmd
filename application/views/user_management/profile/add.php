{% extends "main.php" %}

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
							{{ form_open('user_management/profile/save', {'class': 'form-horizontal'}) }}
								<div class="box-body">
								
									<div class="form-group xrx-form-subheader">
										<div class="col-sm-3"></div>
										<div class="col-sm-7"><p class="lead">User Information</p></div>
									</div>
									
									<div class="form-group">
										<label for="" class="col-sm-3 control-label">First Name</label>
										
										<div class="col-sm-7">
											<input type="text" class="form-control" id="" placeholder="" name="user_firstname">
										</div>
									</div>
									
									<div class="form-group">
										<label for="" class="col-sm-3 control-label">Last Name</label>
										
										<div class="col-sm-7">
											<input type="text" class="form-control" id="" placeholder="" name="user_lastname">
										</div>
									</div>
									
									<div class="form-group">
										<label for="" class="col-sm-3 control-label">Date of Birth</label>
										
										<div class="col-sm-7">
											<input type="text" class="form-control" id="" placeholder="" name="user_dateOfBirth">
										</div>
										
									</div>
									
									<div class="form-group">
										<label for="" class="col-sm-3 control-label">Email</label>
										
										<div class="col-sm-7">
											<input type="text" class="form-control" id="" placeholder="" name="user_email">
										</div>
										
									</div>
									
									<div class="form-group">
										<label for="" class="col-sm-3 control-label">Type of Access</label>
										
										<div class="col-sm-7">
											<select class="form-control select2" style="width: 100%;" name="user_roleID">
												<option selected="true" value="">Please select</option>

												{% for role in roles %}
													<option value="{{ role.roles_id }}">{{ role.roles_name }}</option>
												{% endfor %}

											</select>
										</div>
									</div>
									
									<input type="password" name="user_password">
									<input type="password" name="confirm_password">
									
									
									<div class="form-group xrx-btn-handler">
										<div class="col-sm-3"></div>
										<div class="col-sm-7">
											<button type="submit" class="btn btn-primary xrx-btn">
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