{% extends "basic.php" %}

{% set page_title = 'Print Payroll' %}
{% set body_class = '' %}

{% block content %}
 

 <script type="text/javascript">
 	window.print();
 </script>
{% endblock %}