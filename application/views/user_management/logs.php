{% extends "main.php" %}

{% set page_title = "User Logs" %}

{%  
  set scripts = [
	'dist/js/user_management/logs'
  ]
%}

{% block content %}
  <div class="row">

	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header with-border">
		  <h3 class="box-title">Users</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">

			<div class="table-responsive">
				<table id="logs" class="table no-margin table-hover">

					<thead>
						<tr>
							<th>Username</th>
							<th>Time</th>
							<th>Date</th>
							<th>Description</th>
							<th width="10px" class="text-center">Actions</th>
						</tr>
					</thead>

					<tbody>

					</tbody>
					
					<tfoot>
						<tr>
							<th>Username</th>
							<th>Time</th>
							<th>Date</th>
							<th>Description</th>
							<th class="text-center" width="10px">Actions</th>
						</tr>
				  	</tfoot>

				</table>
			</div>
		</div>
		<!-- /.box-body -->
	  </div>
	  <!-- /.box -->

	</div>
  </div>

{% endblock %}

