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

             				<h1 class="name">{{ record.patient_name }}
                                
                                <small> <span style="margin-bottom:5px; color: #333333">{{ record.patient_sub_note }}</span></small>
                                </h1>

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
             						<td>{{ record.patient_address|nl2br }}</td>
             					</tr>
             					<tr>
             						<th>Phone:</th>
             						<td>{{ record.patient_phoneNum }}</td>
             					</tr>
             					<tr>
             						<th>Caregiver/Family:</th>
             						<td>{{ record.patient_caregiver_family }}</td>
             					</tr>
                                <tr>
                                    <th>Spouse:</th>
                                    <td><a target="_blank" href="{{ site_url("patient_management/profile/details/") }}{{ record.patient_spouse }}">{{ spouse[0].patient_name }}</a></td>
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
                                 <tr>
             						<th>2nd Email:</th>
             						<td>{{ record.hhc_email_additional }}</td>
             					</tr>
             				</table>
             			</div>
                        
                        <div class="col-md-12 text-center">
                       
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-create-label">
                                    <i class="fa fa-edit"></i> Create Label
                                </button>
                          
                            <a href="{{ site_url("patient_management/profile/edit/#{ record.patient_id }") }}">
                                <button type="button" class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i> Update Entry
                                </button>
                            </a>
                        </div>
                        <div class="modal fade" id="modal-create-label" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    {{ form_open("patient_management/profile/save_label/edit/#{ record.patient_id }", {"class": "xrx-form"}) }}
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Create Label</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                        <div class="col-md-12 form-group {{ form_error('patient_name') ? 'has-error' : '' }}">
                                            <label class="control-label">Last name, First name <span>*</span></label>
                                            <input type="text" class="form-control" id="name" placeholder="" required="true" name="patient_name" value="{{ set_value('patient_name', record.patient_name) }}">
                                        </div>
                                        <div class="col-md-12 has-error">
                                            <span class="help-block">{{ form_error('patient_name') }}</span>
                                        </div>
                                        <div class="col-md-12 form-group {{ form_error('patient_address') ? 'has-error' : '' }}">
                                            <label class="control-label">Address <span>*</span></label>
                                            <textarea class="form-control" id="address" placeholder="" required="true" name="patient_address" value="{{ set_value('patient_address', record.patient_address) }}">{{ set_value('patient_address', record.patient_address) }}</textarea>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal" onClick="window.location.reload();">Close</button>
                                        <button type="submit" class="btn btn-primary" onclick="this.form.target='_blank';return true;">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
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

                                                <div>
                                                
                                                {%  if transaction.not_our_md %}
                                                    <span class="visit_redbg">
                                                    <input type="checkbox" class="form-check-input" id="not_our_md" name="not_our_md" value="1" checked="" onclick="return false;">
                                                    <label class="form-check-label" for="not_our_md">Not under our MD </label>
                                                    
                                                {% endif %}

                                                {%  if transaction.not_our_md_checked_by %} 
                                                - Last updated by {{transaction.not_our_md_checked_by}}
                                                {% endif %}
                                                    </span>

                                                    <br>
                                                {%  if transaction.no_homehealth_ref %}
                                                    <span class="visit_redbg">
                                                
                                                    <input type="checkbox" class="form-check-input" id="no_homehealth_ref" name="no_homehealth_ref" checked value="1" onclick="return false;">
                                                    <label class="form-check-label" for="no_homehealth_ref">No Homehealth Referral</label>
                                              
                                                {% endif %}

                                                {%  if transaction.no_homehealth_ref_checked_by %} 
                                                - Last updated by {{transaction.no_homehealth_ref_checked_by}}
                                                {% endif %}
                                                    </span>

                                                    <br>
                                                {%  if transaction.non_admit %}
                                                    <span class="visit_redbg">
                                                
                                                    <input type="checkbox" class="form-check-input" id="non_admit" name="non_admit" checked value="1" onclick="return false;">
                                                    <label class="form-check-label" for="non_admit">Non-admit</label>
                                              
                                                {% endif %}

                                                {%  if transaction.non_admit_checked_by %} 
                                                - Last updated by {{transaction.non_admit_checked_by}}
                                                {% endif %}
                                                    </span>
                                                    
                                                </div>
                                                
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
             				
             				<p class="lead">Cognitive Assessment Visits</p>
                            
                            {% if transaction_ca %}

                                <div class="nav-tabs-custom">
                                    
                                    <ul class="nav nav-tabs">

                                        {% for index, transaction in transaction_ca %}

                                        

                                                <li class="{{ index < 1 ? 'active' : '' }}">
                                                    <a href="#tab_ca_{{ index }}" data-toggle="tab" aria-expanded="true" {{ transaction.pt_tovID == 11 ? 'style="color:red !important; font-weight: bold;"'  : '' }} {{ transaction.pt_tovID == 12 ? 'style="color:red !important; font-weight: bold;"'  : '' }}>   {{ transaction.tov_name }}

                                                        <span class="text-red"><strong>{{ transaction.is_provider_paid() ? 'PAID' : '' }}</strong></span>
                                                    </a>

                                                </li>


                                        {% endfor %}

                                    </ul>

                                    <div class="tab-content">

                                        {% for index, transaction in transaction_ca %}

                                        <div class="tab-pane {{ index < 1 ? 'active' : '' }}" id="tab_ca_{{ index }}">
                                                
                                            {% if transaction.pt_tovID == 11 or transaction.pt_tovID == 12 %}
                                                {{ include('patient_management/profile/mixins/transaction_table_generic_ca_refused.php') }}

                                                {% else %}
                                                    {% if transaction_entity.is_tov_sel_noshow_cancelled(transaction.pt_tovID) %}
                                                    {{ include('patient_management/profile/mixins/transaction_table_noshow_cancelled.php') }}
                                                    {% else %}
                                                    {{ include('patient_management/profile/mixins/transaction_table_generic_ca.php') }}
                                                    {% endif %}

                                            {% endif %}

                                          
                                                <div class="text-center">
                                                    
                                             

                            

                                                    {% if roles_permission_entity.has_permission_name(['edit_tr']) %}

                                                        <a href="{{ site_url("patient_management/transaction/edit/#{ transaction.pt_patientID }/#{ transaction.pt_id }/ca") }}">
                                                            <button type="button" class="btn btn-primary btn-sm">
                                                                <i class="fa fa-edit"></i> Update Entry
                                                            </button>
                                                        </a>

                                                    {% endif %}


                                                    {% if roles_permission_entity.has_permission_name(['delete_tr']) %}

                                                        <a href="{{ site_url("ajax/patient_management/transaction/delete/#{ transaction.pt_patientID }/#{ transaction.pt_id }/ca") }}" data-delete-btn>
                                                            <button type="button" class="btn btn-primary btn-sm">
                                                                <i class="fa fa-trash"></i> Delete Entry
                                                            </button>
                                                        </a>

                                                    {% endif %}

                                              

                                                    
                                                </div>

                                        </div>

                                        {% endfor %}
                                    
                                    </div>

                                </div>

                            {% else %}
                                
                                <div class="no-data-handler">

                                    <p class="text-center">No Data available</p>
                                    
                                </div>

                            {% endif %}
                            
                            {% if roles_permission_entity.has_permission_name(['add_tr']) %}

					           <a href="{{ site_url("patient_management/transaction/add/#{ record.patient_id }/ca") }}" title="">
    								<button type="button" class="btn btn-default">
    									<i class="fa fa-plus"></i> Add Visit
    								</button>
					           </a>

                            {% endif %}
             				
             			</div>
             		</div>



             		<div class="row xrx-row-spacer">
                    
                        <div class="col-md-12">
                            
                            <p class="lead">Lab Orders and Results</p>

                            {% if lab_orders %}

                                <div class="table-responsive">
                                   <table class="table no-margin table-hover">
                                    <thead>
                                        <tr>
                                            <th width="130px">Date Lab Orders were sent</th>
                                            <th width="230px">Order by</th>
                                            <th width="100px">Status</th>
                                            <th>Note</th>
                                            <th width="135px">Added by</th>
                                            <th width="120px">Actions</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                        {% for lab_order in lab_orders %}

                                            <tr>
                                                <th>{{ lab_order.date_referral|date('m/d/Y') }}</th>
                                                <td>{{ lab_order.provider_firstname }} {{ lab_order.provider_lastname }}</td>
                                                <td>
                                                {% if lab_order.lab_file %}
                                                    <a style="color:#0531ee" href="../../../uploads/{{lab_order.lab_file}}" target="_blank"><strong>{{ lab_order.status }}</strong></a>
                                                    {% else %}
                                                    {{ lab_order.status }}
                                                {% endif %}
                                                </td>
                                                <td>{{ lab_order.notes|nl2br }}</td>
                                                <td>{{ lab_order.user_firstname }} {{ lab_order.user_lastname }}</td>
                                                <td>
                                                   
                                                    <a href="{{ site_url("patient_management/lab_order/edit/#{ record.patient_id }/#{ lab_order.lab_order_id }") }}"><span class="label label-primary">Update</span></a>
                        
                                                    <a href="{{ site_url("ajax/patient_management/lab_order/delete/#{ record.patient_id }/#{ lab_order.lab_order_id }") }}" data-delete-btn><span class="label label-primary">Delete</span></a>
                                                
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

                           

                                <a href="{{ site_url("patient_management/lab_order/add/#{ record.patient_id }") }}" title="">
                                    <button type="button" class="btn btn-default">
                                        <i class="fa fa-plus"></i> Add Order
                                    </button>
                                </a>

                 
                                                    
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
                    <td>
                    {% if cpo.cpo_file %}
                        <a style="color:#0531ee" href="../../../uploads/{{cpo.cpo_file}}" target="_blank"><strong>{{ cpo.ptcpo_period }}</strong></a>
                        {% else %}
                        {{ cpo.ptcpo_period }}
                    {% endif %}
                    </td>
                    <td>{{ cpo.get_date_format(cpo.ptcpo_dateOfService) }}</td>
                    <td>{{ cpo.get_date_format(cpo.ptcpo_dateSigned) }}</td>
                    <td>{{ cpo.ptcpo_firstMonthCPO }}</td>
                    <td>{{ cpo.ptcpo_secondMonthCPO }}</td>
                    <td>{{ cpo.ptcpo_thirdMonthCPO }}</td>
                    <td>

                    {% if cpo.cpo_file_cert %}
                        <a style="color:#0531ee" href="../../../uploads/{{cpo.cpo_file_cert}}" target="_blank"><strong>{{ cpo.get_date_format(cpo.ptcpo_dischargeDate) }}</strong></a>
                        {% else %}
                        {{ cpo.get_date_format(cpo.ptcpo_dischargeDate) }}
                    {% endif %}
                        
                    
                
                
                </td>
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

                                                    <a {% if session['user_id'] == cn.ptcn_notesFromUserID %} href="{{ site_url("patient_management/communication_notes/edit/#{ record.patient_id }/#{ cn.ptcn_id }") }}" {% endif %}><span class="label label-primary">Update</span></a>

                                                {% endif %}

                                                {% if roles_permission_entity.has_permission_name(['delete_cn']) %}

                                                    <a {% if session['user_id'] == cn.ptcn_notesFromUserID %} href="{{ site_url("ajax/patient_management/communication_notes/delete/#{ cn.ptcn_patientID }/#{ cn.ptcn_id }") }}" data-delete-btn  {% endif %}><span class="label label-primary">Delete</span></a>

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