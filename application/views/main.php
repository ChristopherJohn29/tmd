<!DOCTYPE html>
<html>
<head>

	{{ include('commons/head_tag.php') }}
	
</head>
<body class="hold-transition skin-blue sidebar-mini">

	<div class="wrapper">

		<header class="main-header">

			{{ include('commons/header.php') }}
			
		</header>
		
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			
			{{ include('commons/sidebar.php') }}
			
		</aside>

		<!-- Content Wrapper. Contains page content -->
		
		<div class="content-wrapper">

			<!-- Main content -->
			<section class="content">

				{% block content %}
	      		{% endblock %}

			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		
		<footer class="main-footer">
			
			{{ include('commons/footer.php') }}
			{{ include('modules/alert_user_autologout.php') }}
			
		</footer>

	</div>
	<!-- ./wrapper -->

    <!-- jQuery 3 -->
	<script src="{{ base_url }}bower_components/jquery/dist/jquery.min.js"></script>

	<script src="{{ base_url }}bower_components/jquery-ui/jquery-ui.min.js"></script>

	<!-- Bootstrap 3.3.7 -->
	<script src="{{ base_url }}bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- DataTables -->
	<script src="{{ base_url }}bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="{{ base_url }}bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="{{ base_url }}bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="{{ base_url }}bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="{{ base_url }}dist/js/adminlte.min.js"></script>
    
	{% if scripts is defined %}
	    {% for script in scripts %}
	    <script src="{{ base_url }}{{ script }}.js"></script>
	    {% endfor %}
	{% endif %}

	<script src="{{ base_url }}dist/js/main.js"></script>
	<script src="{{ base_url }}dist/js/libraries/event_listener.js"></script>
	 
</body>
</html>