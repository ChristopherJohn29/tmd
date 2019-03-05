{% extends "basic.php" %}

{% set page_title = 'Error 404! Page Not Found!' %}
{% set body_class = '' %}

{% block content %}
  
<div class="container xrx-container">
  <div class="row">
    <div class="center-block xrx-404">
      <img src="{{ base_url }}dist/img/404.png">
      <h1>404<small>Page not found</small></h1>
      <span><a href="{{ site_url('dashboard') }}">Go back to Dashboard</a></span>
    </div>
  </div>
</div>

{% endblock %}