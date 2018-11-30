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
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Users</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="all-patient-list" class="table no-margin table-hover">

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
                    <tr>
                        <td>Jayson Arcayna</td>
                        <td>jayson.arcayna@gmail.com</td>
                        <td>+63 9158826474</td>
                        <td>10/28/1979</td>
                        <td>Administrator</td>
                        <td>
                            <a href="{{ site_url('user_management/profile/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
                            <a href="#"><span class="label label-primary">Delete</span></a>
                        </td>
                    </tr>
                  </tbody>

                </table>
            </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </div>
  </div>

{% endblock %}