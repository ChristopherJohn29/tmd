{% extends "basic.php" %}

{% set page_title = 'Print Patient Details' %}
{% set body_class = 'print' %}

{% block content %}

<style type="text/css">
    @media print {
        @page {size: 9.5in 4.125in; }
    }
</style>
<style>
   .container {
  height: 396px;
  position: relative;
  /* border: 3px solid green; */
  text-align: center;
}

.vertical-center {
  margin: 0;
  position: absolute;
  top: 50%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  width: 912px;
}

.name.rs{
  font-size: 19px !important;
}
</style>
    
<script type="text/javascript">
	window.print();
</script>

<div class="container">
  <div class="vertical-center">
    <h4 class="name rs">{{ record.patient_name }}
      <br>
            {{ record.patient_address|nl2br  }}
    </h4>
  </div>
</div>


{% endblock %}