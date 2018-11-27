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
          {% if records %}
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

                {% for record in records %}

                  <tr>
                    <td>{# {{ record.user_email }} #}</td>
                    <td>{{ record.get_fullname() }}</td>
                    <td></td>
                    <td><a href="{{ site_url('user_management/profile/edit/{{ record.user_id }}') }}" title="Edit"><span class="label label-primary">Update</span></a></td>
                  </tr>

                {% endfor %}
                
                
              </tbody>
            </table>
         {% endif %}
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </div>
  </div>

{% endblock %}