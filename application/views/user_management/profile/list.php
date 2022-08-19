{% extends "main.php" %}

{% set page_title = "User List" %}

{%  
  set scripts = [
	'dist/js/user_management/profile/list'
  ]
%}

{% block content %}
  <div class="row">

	<div class="col-xs-12">
	  {% if states %}
		{{ include('commons/alerts.php') }}
	  {% endif %}
	</div>
	<style>
		.tooltips {
		position: relative;
		cursor:pointer;
		}
		.wrapper{
			overflow: hidden;
		}

		.table-responsive{
			overflow: inherit;
		}

		.tooltips .tooltiptext {
		visibility: hidden;
		width: 50%;
		background-color: black;
		color: #fff;
		text-align: center;
		border-radius: 6px;
		padding: 5px 0;

		/* Position the tooltip */
		position: absolute;
		z-index: 1;
		}

		.tooltips:hover .tooltiptext {
		visibility: visible;
		}
		
	</style>

	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header with-border">
		  <h3 class="box-title">Users</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">

			<div class="table-responsive">
				<table id="" class="table no-margin table-hover">

				  <thead>
					<tr>
						<th>Full Name</th>
						<th>Email</th>
						<th>Account Type</th>
						<th width="120px">Actions</th>
					</tr>
				  </thead>

				  <tbody>

					{% if records %}

					  {% for record in records %}
						
						<tr>
							<td class="tooltips">{{ highlight_phrase(record.get_fullname, highlight, '<span style="background-color: #f1d40f;">', '</span>') }}
							{% if record.user_photo %}
							<img class="tooltiptext" src="../../../uploads/{{ record.user_photo }}">
							{% endif %}
							</td>
							<td>{{ highlight_phrase(record.user_email, highlight, '<span style="background-color: #f1d40f;">', '</span>') }}</td>
							<td>{{ highlight_phrase(record.roles_name, highlight, '<span style="background-color: #f1d40f;">', '</span>') }}</td>
							<td>

								{% if roles_permission_entity.has_permission_name(['edit_user']) %}

									<a href="{{ site_url("user_management/profile/edit/#{ record.user_id }") }}" title="Edit"><span class="label label-primary">Update</span></a>

								{% endif %}

								{% if roles_permission_entity.has_permission_name(['delete_user']) %}

									<a href="{{ site_url("ajax/user_management/profile/delete/#{ record.user_id }") }}" data-delete-btn><span class="label label-primary">Delete</span></a>

								{% endif %}

							</td>
						</tr>

					  {% endfor %}
					  
					{% else %}
						
						<tr>
							<td colspan="4" class="text-center">No data available in table</td>
						</tr>

					{% endif %}

				  </tbody>
					
					<tfoot>
					<tr>
						<th>Full Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Actions</th>
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

