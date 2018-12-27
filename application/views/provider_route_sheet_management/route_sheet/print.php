{% extends "basic.php" %}

{% set page_title = 'Print Provider Route sheet' %}
{% set body_class = 'print' %}

{% block content %}
 
 <script type="text/javascript">
 	window.print();
 </script>

{% endblock %}