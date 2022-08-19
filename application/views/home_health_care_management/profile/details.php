{% extends "main.php" %}

{% set page_title = 'Home Health Care Details' %}

{% block content %}

<div class="row">
        <div class="col-md-12">
          <div class="box">
            
            <div class="box-body">
              
             	<section class="xrx-info">
             		
             		<div class="row">
             			<div class="col-md-12">

             				<h1 class="name">{{ record.hhc_name }}<small>Home Health Care Name</small></h1>

             			</div>
             			
             			<div class="col-md-6">
             				<p class="lead blue-bg">Basic Information</p>
             				
             				<table class="table xrx-table">
             					<tr>
             						<th>Contact Name:</th>
             						<td>{{ record.hhc_contact_name }}</td>
             					</tr>
             					<tr>
             						<th>Phone Number:</th>
             						<td>{{ record.hhc_phoneNumber }}</td>
             					</tr>
             					<tr>
             						<th>Fax Number:</th>
             						<td>{{ record.hhc_faxNumber }}</td>
             					</tr>
             				</table>
             			</div>
             			
             			<div class="col-md-6">
             				<p class="lead blue-bg">Contact Information</p>
             				
             				<table class="table xrx-table">
             					<tr>
             						<th>Email:</th>
             						<td>{{ record.hhc_email }}</td>
             					</tr>
                                 <tr>
             						<th>Second Email:</th>
             						<td>{{ record.hhc_email_additional }}</td>
             					</tr>
             					<tr>
             						<th>Address:</th>
             						<td>{{ record.hhc_address }}</td>
             					</tr>
             				</table>
             			</div>
                        
                        <div class="col-md-12 text-center">
                            {% if roles_permission_entity.has_permission_name(['edit_hhc']) %}

                                <a href="{{ site_url("home_health_care_management/profile/edit/#{ record.hhc_id }") }}">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i> Update Entry
                                    </button>
                                </a>

                            {% endif %}
                            
                        </div>
             			
             		</div>                    
					
             		<div class="row xrx-row-spacer last-row">
             		
             			<div class="col-md-12">
             			
             				<p class="lead">Notes</p>
         				   
                            {% if notes %}

                                <div class="table-responsive">
                                    <table class="table no-margin table-hover">
                                        <thead>
                                            <tr>
                                                <th width="150px">Date</th>
                                                <th>Notes</th>
                                                <th style="width: 150px;">Note from</th>
                                                <th width="120px">Actions</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>

                                            {% for note in notes %}

                                                <tr>
                                                    <th style="width: 150px;">{{ note.get_date_format(note.hhcn_date) }}</th>
                                                    <td>{{ note.hhcn_notes }}</td>
                                                    <td style="width: 150px;">{{ note.getNotesFromUserID() }}</td>

                                                    <td style="width: 120px;">

                                                        <a {% if session['user_id'] == note.hhcn_userID %} href="{{ site_url("home_health_care_management/notes/edit/#{ record.hhc_id }/#{ note.hhcn_id }") }}" {% endif %}><span class="label label-primary">Update</span></a>

                                                        <a {% if session['user_id'] == note.hhcn_userID %} href="{{ site_url("ajax/home_health_care_management/notes/delete/#{ record.hhc_id }/#{ note.hhcn_id }") }}" data-delete-btn {% endif %}><span class="label label-primary">Delete</span></a>

                                                    </td>
                                                    
                                                </tr>

                                            {% endfor %}
                                            
                                        </tbody>
                                        
                                    </table>
                                </div>

                            {% else %}

                                <div class="no-data-handler">

                                    <p class="text-center">No Data available</p>
                                    
                                </div>
                                
                            {% endif %}
                                                            
                            <a href="{{ site_url("home_health_care_management/notes/add/#{ record.hhc_id }") }}" title="">
                                <button type="button" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Add Notes
                                </button>
                            </a>
             				
             			</div>
             			
             		</div>
             		             		
             	</section>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>

      </div>

{% endblock %}