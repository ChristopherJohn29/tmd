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

{% set page_title = "Manage Account" %}

{% block content %}
    <div class="row">

          <div class="col-lg-8">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Manage Account</h3>
            </div>
            <!-- /.box-header -->
                
                <!-- form start -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box-body">
                        
                            {{ form_open_multipart("account_management/account/save/#{ record.user_id }", {"class": "xrx-form"}) }}
                                
                                <input type="hidden" name="user_roleID" value="{{ record.user_roleID }}">

                                <div class="row">
                                    <div class="col-xs-12">
                                      {% if states %}
                                        {{ include('commons/alerts.php') }}
                                      {% endif %}
                                    </div>

                                    <div class="col-md-12">
                                        <p class="lead">Personal Information</p>
                                    </div>
                                    
                                    <div class="col-md-6 form-group {{ form_error('user_firstname') ? 'has-error' : '' }}">
                                    
                                        <label class="control-label">First Name <span>*</span></label>
                                        <input type="text" class="form-control" required="true" name="user_firstname" value="{{ set_value('user_firstname', record.user_firstname) }}">
                                        
                                    </div>
                                    
                                    <div class="col-md-6 form-group {{ form_error('user_lastname') ? 'has-error' : '' }}">
                                    
                                        <label class="control-label">Last Name <span>*</span></label>
                                        <input type="text" class="form-control" required="true" name="user_lastname" value="{{ set_value('user_lastname', record.user_lastname) }}">
                                        
                                    </div>

                                    <div class="col-md-6 has-error">
                                        <span class="help-block">{{ form_error('user_firstname') }}</span>
                                    </div>

                                    <div class="col-md-6 has-error">
                                        <span class="help-block">{{ form_error('user_lastname') }}</span>
                                    </div>
                                    
                                    <div class="col-md-12 form-group {{ form_error('user_email') ? 'has-error' : '' }}">
                                    
                                        <label class="control-label">Email <span>*</span></label>
                                        <input type="text" class="form-control" required="true" name="user_email" value="{{ set_value('user_email', record.user_email) }}">
                                        
                                    </div>

                                    <div class="col-md-12 has-error">
                                        <span class="help-block">{{ form_error('user_email') }}</span>
                                    </div>
                                    
                                    <div class="col-md-12 subheader">
                                        <p class="lead">Access Details</p>
                                    </div>
                                                                        
                                    <div class="col-md-6 form-group {{ form_error('user_password') ? 'has-error' : '' }}">
                                    
                                        <label class="control-label">Password <span>*</span></label>
                                        <input type="password" class="form-control" required="true" name="user_password">
                                        
                                    </div>
                                    
                                    <div class="col-md-6 form-group {{ form_error('confirm_password') ? 'has-error' : '' }}">
                                    
                                        <label class="control-label">Confirm Password <span>*</span></label>
                                        <input type="password" class="form-control" required="true" name="confirm_password">
                                        
                                    </div>

                                    <div class="col-md-6 has-error">
                                        <span class="help-block">{{ form_error('user_password') }}</span>
                                    </div>

                                    <div class="col-md-6 has-error">
                                        <span class="help-block">{{ form_error('confirm_password') }}</span>
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