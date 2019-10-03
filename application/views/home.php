{% extends "main.php" %}

{% 
  set scripts = [
    'dist/js/home'
  ]
%}

{% set page_title = 'Welcome!' %}

{% block content %}
<div class="row"> 
    
    <div class="col-lg-12">
        
        <div class="box">
      
        <div class="box-header with-border">
            <h3 class="box-title">Recently Added Patients</h3>
        </div>
        <!-- /.box-header -->
        
        <div class="box-body">
            
            <div class="table-responsive">
                
                <table id="" class="table no-margin table-hover">
                    
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Referral Date</th>
                            <th>ICD10 - Code Diagnoses</th>
                            <th>Date of Service</th>
                            <th width="120px">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        {% if patients %}

                            {% for patient in patients %}
                        
                                <tr>
                                    <td>{{ patient['patientName'] }}</td>
                                    <td>{{ patient['patientReferralDate'] }}</td>
                                    
                                    {% if pt_profile_entity.is_sel_noshow_cancelled(patient['pt_tovID']) %}

                                        <td><span class="text-red">{{ patient['notes'] }}</span></td>

                                    {% else %}

                                        <td>{{ patient['ICD10'] }}</td>

                                    {% endif %}

                                    <td>{{ patient['dateOfService'] }}</td>

                                    <td>

                                        {% if roles_permission_entity.has_permission_name(['view_pt']) %}
                                            
                                            <a target="_blank" href="{{ site_url("patient_management/profile/details/#{ patient['patientId'] }") }}"><span class="label label-primary">View</span></a>

                                        {% endif %}

                                        {% if roles_permission_entity.has_permission_name(['add_tr']) %}

                                            <a href="{{ site_url("patient_management/transaction/add/#{ patient['patientId'] }") }}" title=""><span class="label label-primary">Add</span></a>

                                        {% endif %}
                                    </td>
                                </tr>

                            {% endfor %}

                        {% else %}

                            <tr>
                                <td colspan="5" class="text-center">No data available in table</td>
                            </tr>

                        {% endif %}
                        
                    </tbody>
                    
                </table>
                
            </div>
            
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">

            {% if roles_permission_entity.has_permission_module(['PTPM']) %}

                <a href="{{ site_url('patient_management/profile/') }}">View All Patients</a>

            {% endif %}

        </div>
          
        </div>

    </div>
      
</div>

{% if roles_permission_entity.has_permission_module(['PRSM']) %}

<div class="row"> 
    
    <div class="col-lg-12">
        
        <div class="box">
      
        <div class="box-header with-border">
            <h3 class="box-title">Recently Added Route Sheet</h3>
        </div>
        <!-- /.box-header -->
        
        <div class="box-body">
            
            <div class="table-responsive">
                
                <table id="" class="table no-margin table-hover">
                    
                    <thead>
                        <tr>
                            <th>Date of Service</th>
                            <th>Provider</th>
                            <th width="120px">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                        {% if provider_route_sheets %}

                            {% for provider_route_sheet in provider_route_sheets %}

                                <tr>
                                   <td>{{ provider_route_sheet.get_date_format(provider_route_sheet.prs_dateOfService) }}</td>
                                    <td>{{ provider_route_sheet.get_provider_fullname() }}</td>
                                    <td>
                                        
                                        {% if roles_permission_entity.has_permission_name(['view_prs']) %}

                                            <a target="_blank" href='{{ site_url("provider_route_sheet_management/route_sheet/details/#{ provider_route_sheet.prs_id }") }}'><span class="label label-primary">View</span></a>
                                        
                                        {% endif %}

                                        {% if roles_permission_entity.has_permission_name(['edit_prs']) %}

                                            <a href='{{ site_url("provider_route_sheet_management/route_sheet/edit/#{ provider_route_sheet.prs_id }") }}' title="Edit"><span class="label label-primary">Update</span></a>

                                        {% endif %}

                                    </td>
                                </tr>

                            {% endfor %}
                        
                        {% else %}

                            <tr>
                                <td colspan="5" class="text-center">No data available in table</td>
                            </tr>

                        {% endif %}
                        
                        
                    </tbody>
                    
                </table>
                
            </div>
            
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">

            {% if roles_permission_entity.has_permission_module(['PRSM']) %}

                <a href="{{ site_url('provider_route_sheet_management/route_sheet/') }}">View All Route Sheet</a>

            {% endif %}

        </div>
          
        </div>

    </div>
      
</div>

{% endif %}


{% endblock %}