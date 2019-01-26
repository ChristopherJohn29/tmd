{% extends "main.php" %}

{% set page_title = 'Home Health Care List' %}

{% 
  set scripts = [
    'bower_components/datatables.net/js/dataTables.buttons.min',
    'dist/js/home_health_care_management/profile/list'
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
              <h3 class="box-title">Home Health Care</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                <div class="table-responsive">
                    <table id="all-homehealthcare-list" class="table no-margin table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Home Health</th>
                                <th>Contact Person</th>
                                <th>Phone</th>
                                <th>Fax</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th width="50px">Action</th>
                            </tr>
                        </thead>
                      
                        <tbody>

                            {% if records %}					

                                {% for record in records %}

                                    <tr>
                                        <td class="text-center">{{ loop.index }}</td>
                                        <td>{{ record.hhc_name }}</td>
                                        <td>{{ record.hhc_contact_name }}</td>
                                        <td>{{ record.hhc_phoneNumber }}</td>
                                        <td>{{ record.hhc_faxNumber }}</td>
                                        <td>{{ record.hhc_email }}</td>
                                        <td>{{ record.hhc_address }}</td>
                                        <td>

                                            {% if roles_permission_entity.has_permission_name(['edit_hhc']) %}
                                            
                                                <a href="{{ site_url("home_health_care_management/profile/edit/#{ record.hhc_id }") }}" title="Edit"><span class="label label-primary">Update</span></a>

                                            {% endif %}

                                        </td>
                                    </tr>


                                {% endfor %}

                            {% else %}

                                <tr>
                                    <td colspan="7" class="text-center">No data available in table</td>
                                </tr>

                            {% endif %}

                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <th>Home Health</th>
                                <th>Contact Person</th>
                                <th>Phone</th>
                                <th>Fax</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Action</th>
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