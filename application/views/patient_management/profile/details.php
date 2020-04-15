{% extends "main.php" %}

{% set page_title = 'Patients Details' %}

{% block content %}
     <div class="row">
        <div class="col-md-12">
          <div class="box">
            
            <div class="box-body">
              
             	<section class="xrx-info">
             		
             		<div class="row">
             			<div class="col-md-12">

             				<h1 class="name">{{ record.patient_name }}<small>Patient Name</small></h1>

             			</div>
             			
             			<div class="col-md-3">
             				<p class="lead blue-bg">Basic Information</p>
             				
             				<table class="table xrx-table">
             					<tr>
             						<th>Medicare:</th>
             						<td>{{ record.patient_medicareNum }}</td>
             					</tr>
             					<tr>
             						<th>Date of Birth:</th>
             						<td>{{ record.get_date_format(record.patient_dateOfBirth) }}</td>
             					</tr>
             					<tr>
             						<th>Gender:</th>
             						<td>{{ record.patient_gender }}</td>
             					</tr>
             				</table>
             			</div>
             			
             			<div class="col-md-3">
             				<p class="lead blue-bg">Contact Information</p>
             				
             				<table class="table xrx-table">
             					<tr>
             						<th>Address:</th>
             						<td>{{ record.patient_address }}</td>
             					</tr>
             					<tr>
             						<th>Phone:</th>
             						<td>{{ record.patient_phoneNum }}</td>
             					</tr>
             					<tr>
             						<th>Caregiver/Family:</th>
             						<td>{{ record.patient_caregiver_family }}</td>
             					</tr>
             				</table>
             			</div>

                        <div class="col-md-3">
                            <p class="lead blue-bg">Pharmacy Information</p>
                            
                            <table class="table xrx-table">
                                <tr>
                                    <th>Pharmacy:</th>
                                    <td>{{ record.patient_pharmacy }}</td>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <td>{{ record.patient_pharmacyPhone }}</td>
                                </tr>
                                <tr>
                                    <th>Drug Allergy:</th>
                                    <td>{{ record.patient_drug_allergy }}</td>
                                </tr>
                            </table>
                        </div>
             			
             			<div class="col-md-3">
             				<p class="lead blue-bg">Home Health Information</p>
             				
             				<table class="table xrx-table">
             					<tr>
             						<th>Home Health:</th>
             						<td>{{ record.hhc_name }}</td>
             					</tr>
             					<tr>
             						<th>Contact Person:</th>
             						<td>{{ record.hhc_contact_name }}</td>
             					</tr>
             					<tr>
             						<th>Phone:</th>
             						<td>{{ record.hhc_phoneNumber }}</td>
             					</tr>
             					<tr>
             						<th>Email:</th>
             						<td>{{ record.hhc_email }}</td>
             					</tr>
             				</table>
             			</div>
                        
                        <div class="col-md-12 text-center">
                            <a href="{{ site_url("patient_management/profile/edit/#{ record.patient_id }") }}">
                                <button type="button" class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i> Update Entry
                                </button>
                            </a>
                        </div>
             			
             		</div>
             		
             		<div class="row xrx-row-spacer">
             			<div class="col-md-12">
             				
             				<p class="lead">Visits</p>
                            
                            {% if transactions %}

                                <div class="nav-tabs-custom">
                                    
                                    <ul class="nav nav-tabs">

                                        {% for index, transaction in transactions %}

                                            {% if transaction_entity.not_in_tab_list(transaction.tov_id) %}

                                                <li class="{{ index < 1 ? 'active' : '' }}">
                                                    <a href="#tab_{{ index }}" data-toggle="tab" aria-expanded="true">  {{ transaction.tov_name }}

                                                        <span class="text-red"><strong>{{ transaction.is_provider_paid() ? 'PAID' : '' }}</strong></span>
                                                    </a>

                                                </li>

                                            {% endif %}

                                        {% endfor %}

                                    </ul>

                                    <div class="tab-content">

                                        {% for index, transaction in transactions %}

                                            {% if transaction_entity.not_in_tab_list(transaction.tov_id) %}

                                                <div class="tab-pane {{ index < 1 ? 'active' : '' }}" id="tab_{{ index }}">

                                            {% endif %}

                                                {% if transaction_entity.is_tov_sel_noshow_cancelled(transaction.pt_tovID) %}

                                                    {{ include('patient_management/profile/mixins/transaction_table_noshow_cancelled.php') }}

                                                {% else %}

                                                    {{ include('patient_management/profile/mixins/transaction_table_generic.php') }}

                                                {% endif %}
                                                
                                                <div class="text-center">

                                                    {% if roles_permission_entity.has_permission_name(['edit_tr']) %}

                                                        <a href="{{ site_url("patient_management/transaction/edit/#{ transaction.pt_patientID }/#{ transaction.pt_id }") }}">
                                                            <button type="button" class="btn btn-primary btn-sm">
                                                                <i class="fa fa-edit"></i> Update Entry
                                                            </button>
                                                        </a>

                                                    {% endif %}

                                                    {% if roles_permission_entity.has_permission_name(['delete_tr']) %}

                                                        <a href="{{ site_url("ajax/patient_management/transaction/delete/#{ transaction.pt_patientID }/#{ transaction.pt_id }") }}" data-delete-btn>
                                                            <button type="button" class="btn btn-primary btn-sm">
                                                                <i class="fa fa-trash"></i> Delete Entry
                                                            </button>
                                                        </a>

                                                    {% endif %}

                                                    {% if roles_permission_entity.has_permission_name(['mark_service_paid']) and transaction.notCancelledTOV() and transaction.notServicePaid() %}

                                                        <a href="{{ site_url("ajax/patient_management/transaction/mark_service_paid/#{ transaction.pt_patientID }/#{ transaction.pt_id }") }}" data-paid-btn>
                                                            <button type="button" class="btn btn-primary btn-sm bg-btn-red">
                                                                <i class="fa fa-money"></i> Mark as Service Paid
                                                            </button>
                                                        </a>

                                                    {% endif %}
                                                    
                                                </div>

                                            {% if transaction_entity.not_in_tab_list(transaction.tov_id) %}

                                                </div>

                                            {% endif %}

                                        {% endfor %}
                                    
                                    </div>

                                </div>

                            {% else %}
                                
                                <div class="no-data-handler">

                                    <p class="text-center">No Data available</p>
                                    
                                </div>

                            {% endif %}
                            
                            {% if roles_permission_entity.has_permission_name(['add_tr']) %}

					           <a href="{{ site_url("patient_management/transaction/add/#{ record.patient_id }") }}" title="">
    								<button type="button" class="btn btn-default">
    									<i class="fa fa-plus"></i> Add Visit
    								</button>
					           </a>

                            {% endif %}
             				
             			</div>
             		</div>
             		
                    
					
					<div class="row xrx-row-spacer">
					
             			<div class="col-md-12">
             				
             				<p class="lead">Certifications</p>
             				
                            {% if cpos %}

                                <div class="table-responsive">
                 				   <table class="table no-margin table-hover">
    								<thead>
    									<tr>
    										<th></th>
    										<th>Period</th>
                                            <th>Date of Service</th>
    										<th>485 Date Signed</th>
    										<th>1st Month CPO</th>
    										<th>2nd Month CPO</th>
    										<th>3rd Month CPO</th>
    										<th>Discharged</th>
    										<th>Date Billed</th>
                                            <th>Added By User</th>
                                            <th width="120px">Actions</th>
    									</tr>
    								</thead>
    								
    								<tbody>

                                        {% for cpo in cpos %}

                                            <tr>
        										<th>{{ cpo.ptcpo_status }}</th>
        										<td>{{ cpo.ptcpo_period }}</td>
                                                <td>{{ cpo.get_date_format(cpo.ptcpo_dateOfService) }}</td>
        										<td>{{ cpo.get_date_format(cpo.ptcpo_dateSigned) }}</td>
        										<td>{{ cpo.ptcpo_firstMonthCPO }}</td>
        										<td>{{ cpo.ptcpo_secondMonthCPO }}</td>
        										<td>{{ cpo.ptcpo_thirdMonthCPO }}</td>
        										<td>{{ cpo.get_date_format(cpo.ptcpo_dischargeDate) }}</td>
        										<td><span class="text-red"><strong>{{ cpo.get_date_format(cpo.ptcpo_dateBilled) }}</strong></span></td>
                                                <td>{{ cpo.user_firstname ~ ' ' ~ cpo.user_lastname }}</td>
                                                <td>
                                                    {% if roles_permission_entity.has_permission_name(['edit_cpo']) %}

                                                        <a href="{{ site_url("patient_management/CPO/edit/#{ record.patient_id }/#{ cpo.ptcpo_id }") }}"><span class="label label-primary">Update</span></a>

                                                    {% endif %}

                                                    {% if roles_permission_entity.has_permission_name(['delete_cpo']) %}

                                                        <a href="{{ site_url("ajax/patient_management/certifications/delete/#{ cpo.ptcpo_patientID }/#{ cpo.ptcpo_id }") }}" data-delete-btn><span class="label label-primary">Delete</span></a>

                                                    {% endif %}

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

                            {% if roles_permission_entity.has_permission_name(['add_cpo']) %}

    							<a href="{{ site_url("patient_management/CPO/add/#{ record.patient_id }") }}" title="">
    								<button type="button" class="btn btn-default">
    									<i class="fa fa-plus"></i> Add Certification
    								</button>
    							</a>

                            {% endif %}
							         				
             			</div>
             			
             		</div>
             		
             		
             		
             		<div class="row xrx-row-spacer last-row">
             		
             			<div class="col-md-12">
             			
             				<p class="lead">Communication Notes</p>
         				   
                            {% if communication_notes %}

                            <div class="table-responsive">
             				   <table class="table no-margin table-hover">
								<thead>
									<tr>
										<th width="150px">Date</th>
                                        <th style="width: 200px;">Category</th>
										<th>Note</th>
                                        <th style="width: 150px;">Note from</th>
										<th width="120px">Actions</th>
									</tr>
								</thead>
								
								<tbody>

                                    {% for cn in communication_notes %}

                                        <tr>
    										<th>{{ cn.get_date_format(cn.ptcn_dateCreated) }}</th>
                                            <td>{{ cn.ptcn_category }}</td>
    										<td>{{ cn.ptcn_message }}</td>
                                            <td>{{ cn.getNotesFromUserID() }}</td>
    										<td>

                                                {% if roles_permission_entity.has_permission_name(['edit_cn']) %}

                                                    <a href="{{ site_url("patient_management/communication_notes/edit/#{ record.patient_id }/#{ cn.ptcn_id }") }}"><span class="label label-primary">Update</span></a>

                                                {% endif %}

                                                {% if roles_permission_entity.has_permission_name(['delete_cn']) %}

                                                    <a href="{{ site_url("ajax/patient_management/communication_notes/delete/#{ cn.ptcn_patientID }/#{ cn.ptcn_id }") }}" data-delete-btn><span class="label label-primary">Delete</span></a>

                                                {% endif %}

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
                            
                            {% if roles_permission_entity.has_permission_name(['add_cn']) %}
                                
                                <a href="{{ site_url("patient_management/communication_notes/add/#{ record.patient_id }") }}" title="">
    								<button type="button" class="btn btn-default">
    									<i class="fa fa-plus"></i> Add Notes
    								</button>
    							</a>

                            {% endif %}
             				
             			</div>
             			
             		</div>
             		
             
					<div class="row no-print">
          	
                        <div class="col-xs-12 xrx-btn-handler">

                            {% if roles_permission_entity.has_permission_name(['print_pt']) %}
                                
                                <a href="{{ site_url("patient_management/profile/print/#{ record.patient_id }") }}" target="_blank" class="btn btn-primary xrx-btn"><i class="fa fa-print"></i> Print</a>

                            {% endif %}

                            {% if roles_permission_entity.has_permission_name(['downoad_pt']) %}

                                <a href="{{ site_url("patient_management/profile/pdf/#{ record.patient_id }") }}" target="_blank" class="btn btn-primary xrx-btn" style="margin-right: 5px;">
                                    <i class="fa fa-download"></i> Generate PDF
                                </a>

                            {% endif %}

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