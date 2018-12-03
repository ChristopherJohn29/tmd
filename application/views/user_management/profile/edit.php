{% extends "main.php" %}

{% 
  set scripts = [
    'bower_components/select2/dist/js/select2.full.min',
    'plugins/input-mask/jquery.inputmask',
    'plugins/input-mask/jquery.inputmask.date.extensions',
    'plugins/input-mask/jquery.inputmask.extensions',
    'dist/js/tmd'
  ]
%}

{% set page_title = "Update User" %}

{% block content %}
    <div class="row">

          <div class="col-lg-6">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Update User</h3>
            </div>
            <!-- /.box-header -->
                
                <!-- form start -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box-body">
                        
                            {{ form_open("user_management/profile/save/#{ record.user_id }", {"class": "xrx-form"}) }}
                            
                                <div class="row">
                                
                                    <div class="col-md-12">
                                        <p class="lead">Personal Information</p>
                                    </div>
                                    
                                    <div class="col-md-6 form-group">
                                    
                                        <label class="control-label">First Name <span>*</span></label>
                                        <input type="text" class="form-control" required="true" name="user_firstname" value="{{ set_value('user_firstname', record.user_firstname) }}">
                                        
                                    </div>
                                    
                                    <div class="col-md-6 form-group">
                                    
                                        <label class="control-label">Last Name <span>*</span></label>
                                        <input type="text" class="form-control" required="true" name="user_lastname" value="{{ set_value('user_lastname', record.user_lastname) }}">
                                        
                                    </div>
                                    
                                    <div class="col-md-6 form-group">
                                        
                                        <label>Upload Image</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-default xrx-upload-file">
                                                Browse... <input type="file" id="imgInp">
                                                </span>
                                            </span>
                                            <input type="text" class="form-control" disabled>
                                        </div>
                                        <span class="help-block">Suggested image size is 200px x 200px only.</span>
                                        <img id="img-upload" class="img-circle" />
                                        
                                    </div>
                                    
                                    <div class="col-md-12 subheader">
                                        <p class="lead">Basic Information</p>
                                    </div>
                                    
                                    <div class="col-md-6 form-group">

                                    
                                        <label class="control-label">Date of Birth <span>*</span></label>
                                        <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required="true" name="user_dateOfBirth" value="{{ set_value('user_dateOfBirth', record.user_dateOfBirth) }}">
                                        
                                    </div>
                                    
                                    <div class="col-md-6 form-group">
                                    
                                        <label class="control-label">Gender <span>*</span></label>
                                        <select class="form-control" style="width: 100%;" id="dob" required="true" name="user_gender">
                                            <option value="">Please select</option>
                                            <option value="Male" {{ record.get_selected_gender('Male') }}>Male</option>
                                            <option value="Female" {{ record.get_selected_gender('Female') }}>Female</option>
                                        </select>
                                        
                                    </div>

                                    
                                    <div class="col-md-12 subheader">
                                        <p class="lead">Contact Information</p>
                                    </div>
                                    
                                    <div class="col-md-6 form-group">
                                    
                                        <label class="control-label">Phone <span>*</span></label>
                                        <input type="text" class="form-control" required="true" name="user_phone" value="{{ set_value('user_phone', record.user_phone) }}">
                                        
                                    </div>
                                    
                                    <div class="col-md-6 form-group">
                                    
                                        <label class="control-label">Email <span>*</span></label>
                                        <input type="text" class="form-control" required="true" name="user_email" value="{{ set_value('user_email', record.user_email) }}">
                                        
                                    </div>
                                    
                                    <div class="col-md-12 form-group">
                                    
                                        <label class="control-label">Address <span>*</span></label>
                                        <input type="text" class="form-control" required="true" name="user_address" value="{{ set_value('user_address', record.user_address) }}">
                                        
                                    </div>
                                    
                                    <div class="col-md-12 subheader">
                                        <p class="lead">Access Details</p>
                                    </div>
                                    
                                    <div class="col-md-12 form-group">

                                    
                                        <label class="control-label">Account Type <span>*</span></label>
                                        
                                        <select class="form-control" style="width: 100%;" required="true" name="user_roleID">
                                            <option value="">Please Select</option>
                                            
                                            {% for role in roles %}
                                                <option value="{{ role.roles_id }}" {{ record.get_selected_role(role.roles_id) }}>{{ role.roles_name }}</option>
                                            {% endfor %}

                                        </select>
                                        
                                    </div>
                                    
                                    <div class="col-md-6 form-group">
                                    
                                        <label class="control-label">Password <span>*</span></label>
                                        <input type="password" class="form-control" required="true" name="user_password">
                                        
                                    </div>
                                    
                                    <div class="col-md-6 form-group">
                                    
                                        <label class="control-label">Confirm Password <span>*</span></label>
                                        <input type="password" class="form-control" required="true" name="confirm_password">
                                        
                                    </div>
                                    
                                    <div class="col-md-12 form-group xrx-btn-handler">
                                        <button type="submit" class="btn btn-primary xrx-btn">
                                            <i class="fa fa-check"></i> Update
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
{% endblock %}