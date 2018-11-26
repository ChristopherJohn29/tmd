{% extends "main.html" %}

{% set page_title = "User List" %}

{% 
  set scripts = [
    'dist/js/user_management/profile/list'
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
          <table id="all-patient-list" class="table no-margin table-hover">
    <thead>
      <tr>
        <th>Email</th>
        <th>Full Name</th>
        <th>Type of Access</th>
        <th width="80px">Actions</th>
      </tr>
    </thead>
              
    <tbody>
      <tr>
        <td>jayson.arcayna@gmail.com</td>
        <td>Jayson Arcayna</td>
        <td>Administrator</td>
        <td><a href="update-user.php" title="Edit"><span class="label label-primary">Update</span></a></td>
      </tr>
      
      
      
    </tbody>
            </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </div>
  </div>
{% endblock %}