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
                        <th>Phone</th>
                        <th>Birthday</th>
                        <th>Account Type</th>
                        <th width="120px">Actions</th>
                    </tr>
                  </thead>

                  <tbody>

                    {% if records %}

                      {% for record in records %}
                        
                        <tr>
                            <td>{{ record.get_fullname }}</td>
                            <td>{{ record.user_email }}</td>
                            <td>{{ record.user_phone }}</td>
                            <td>{{ record.get_date_format(record.user_dateOfBirth) }}</td>
                            <td>{{ record.roles_name }}</td>
                            <td>
                                <a href="{{ site_url("user_management/profile/edit/#{ record.user_id }") }}" title="Edit"><span class="label label-primary">Update</span></a>
                                <a href="{{ site_url("ajax/user_management/profile/delete/#{ record.user_id }") }}" data-delete-btn><span class="label label-primary">Delete</span></a>
                            </td>
                        </tr>

                      {% endfor %}
                      
                    {% else %}
						
						<tr>
	                        <td colspan="6" class="text-center">No data available in table</td>
	                    </tr>

					{% endif %}

                  </tbody>
                    
                    <tfoot>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Birthday</th>
                        <th>Account Type</th>
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

