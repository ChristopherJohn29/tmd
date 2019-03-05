{% extends "basic.php" %}

{% set page_title = 'Log in' %}
{% set body_class = 'hold-transition login-page' %}

{% block content %}
  <div class="login-box">

  <!-- /.login-logo -->
  <div class="login-box-body xrx-round-corners xrx-box-padding">
    <div class="login-logo">
      <img src="{{ base_url }}dist/img/tmd_logo.png">
    </div>

    {% if states %}
      {{ include('modules/alert_danger.php') }}
    {% endif %}

    {{ form_open('authentication/user/verify') }}
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="user_email" placeholder="Email" required="true">
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="user_password" placeholder="Password" required="true">
      </div>
      <div class="row xrx-row">
        
        <!-- /.col -->
        <div class="col-xs-12 text-center">
          <button type="submit" class="btn btn-primary xrx-btn">
            <i class="glyphicon glyphicon-log-in"></i> Login
          </button>
        </div>
        <!-- /.col -->
        
      </div>
    </form>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
{% endblock %}