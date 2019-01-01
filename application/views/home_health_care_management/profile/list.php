{% extends "main.php" %}

{% set page_title = 'Home Health Care List' %}

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

                <div class="row">
                    <div class="col-md-12">
                        <div class="text-right">
                            <a href="{{ site_url('home_health_care_management/profile/add') }}"><span class="label label-primary">Add</span></a>
                        </div>
                        <br>
                    </div>
                </div>
                
                <div class="table-responsive">
                <table id="" class="table no-margin table-hover">
                    <thead>
                        <tr>
                            <th>Home Health</th>
                            <th>Contact Person</th>
                            <th>Phone</th>
                            <th>Fax</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th width="80px">Action</th>
                        </tr>
                    </thead>
                  
                    <tbody>

                        {% if records %}					

                            {% for record in records %}

                                <tr>
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