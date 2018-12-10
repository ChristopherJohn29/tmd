{% extends "main.php" %}

{% 
  set scripts = [
    'dist/js/patient_management/profile/add'
  ]
%}

{% set page_title = 'Patients Details' %}

{% block content %}
     <div class="row">
        <div class="col-md-12">
          <div class="box">
            
            <div class="box-body">
              
             	<section class="xrx-info">
             		
             		<div class="row">
             			<div class="col-md-12">

             				<h1 class="name">{{ record.get_reverse_fullname() }}<small>Patient Name</small></h1>

             			</div>
             			
             			<div class="col-md-4">
             				<p class="lead">Basic Information</p>
             				
             				<table class="table xrx-table">
             					<tr>
             						<th>Referral Date:</th>
             						<td>{{ record.get_date_format(record.patient_referralDate) }}</td>
             					</tr>
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
             			
             			<div class="col-md-4">
             				<p class="lead">Contact Information</p>
             				
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
             			
             			<div class="col-md-4">
             				<p class="lead">Home Health Information</p>
             				
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
             			
             		</div>
             		
             		<div class="row xrx-row-spacer">
             			<div class="col-md-12">
             				
             				<p class="lead">Transactions</p>
                            
             				<div class="table-responsive">
             				   <table class="table no-margin table-hover">
								<thead>
									<tr>
										<th>Type of Visit</th>
										<th>Provider</th>
										<th>Date of Service</th>
										<th>Deductible</th>
										<th>AW/IPPE</th>
										<th>Date Billed</th>
										<th>ACP</th>
										<th>Diabetes</th>
										<th>Tobacco</th>
										<th>ICD-Code Diagnoses</th>
										<th>Visit Billed</th>
                                        <th width="90px">Actions</th>
									</tr>
								</thead>
								
								<tbody>


                                    {% for transaction in transactions %}

    									<tr>
    										<td>{{ transaction.tov_name }}</td>
    										<td>{{ transaction.get_provider_fullname() }}</td>
    										<td>{{ transaction.pt_dateOfService }}</td>
    										<td>{{ transaction.pt_deductible }}</td>
    										<td>{{ transaction.pt_aw_ippe_code }}</td>
                                            <td>{{ transaction.pt_aw_ippe_date }}</td>
                                            <td>{{ transaction.get_selected_choice_format(transaction.pt_acp) }}</td>
                                            <td>{{ transaction.get_selected_choice_format(transaction.pt_diabetes) }}</td>
                                            <td>{{ transaction.get_selected_choice_format(transaction.pt_tobacco) }}</td>
                                            <td>{{ transaction.pt_icd10_codes }}</td>
                                            <td>{{ transaction.pt_dateBilled }}</td>
                                            <td>
                                                <a href="{{ site_url("patient_management/transaction/edit/#{ transaction.pt_patientID }/#{ transaction.pt_id }") }}"><span class="label label-primary">Update</span></a>
                                            </td>
    									</tr>

                                    {% endfor %}


								</tbody>
							</table>
                            </div>
                            
							<a href="{{ site_url("patient_management/transaction/add/#{ record.patient_id }") }}" title="">
								<button type="button" class="btn btn-default">
									<i class="fa fa-plus"></i> Add Transaction
								</button>
							</a>
             				
             			</div>
             		</div>
             		
             		
					
					<div class="row xrx-row-spacer">
					
             			<div class="col-md-12">
             				
             				<p class="lead">Certifications</p>
             				
                            <div class="table-responsive">
             				   <table class="table no-margin table-hover">
								<thead>
									<tr>
										<th></th>
										<th>Period</th>
										<th>485 Date Signed</th>
										<th>1st Month CPO</th>
										<th>2nd Month CPO</th>
										<th>3rd Month CPO</th>
										<th>Discharged</th>
										<th>Date Billed</th>
                                        <th width="90px">Actions</th>
									</tr>
								</thead>
								
								<tbody>
									   
                                   {% for cpo in cpos %}

                                        <tr>
    										<th>{{ cpo.ptcpo_status }}</th>
    										<td>{{ cpo.ptcpo_period }}</td>
    										<td>{{ cpo.get_date_format(cpo.ptcpo_dateSigned) }}</td>
    										<td>{{ cpo.ptcpo_firstMonthCPO }}</td>
    										<td>{{ cpo.ptcpo_secondMonthCPO }}</td>
    										<td>{{ cpo.ptcpo_thirdMonthCPO }}</td>
    										<td>{{ cpo.get_date_format(cpo.ptcpo_dischargeDate) }}</td>
    										<td>{{ cpo.get_date_format(cpo.ptcpo_dateBilled) }}</td>
                                            <td>
                                                <a href="{{ site_url("patient_management/CPO/edit/#{ record.patient_id }/#{ cpo.ptcpo_id }") }}"><span class="label label-primary">Update</span></a>
                                            </td>
    									</tr>

                                    {% endfor %}

								</tbody>
								
							 </table>
                            </div>
                            
							<a href="{{ site_url("patient_management/CPO/add/#{ record.patient_id }") }}" title="">
								<button type="button" class="btn btn-default">
									<i class="fa fa-plus"></i> Add Certification
								</button>
							</a>  
							         				
             			</div>
             			
             		</div>
             		
             		
             		
             		<div class="row xrx-row-spacer last-row">
             		
             			<div class="col-md-12">
             			
             				<p class="lead">Communication Notes</p>
             				
                            <div class="table-responsive">
             				   <table class="table no-margin table-hover">
								<thead>
									<tr>
										<th>Notes Added</th>
										<th>Note</th>
										<th width="90px">Actions</th>
									</tr>
								</thead>
								
								<tbody>
									
                                    {% for cn in communication_notes %}

                                        <tr>
    										<th>{{ cn.get_date_format(cn.ptcn_dateCreated) }}</th>
    										<td>{{ cn.ptcn_message }}</td>
    										<td>
                                                <a href="{{ site_url("patient_management/communication_notes/edit/#{ record.patient_id }/#{ cn.ptcn_id }") }}"><span class="label label-primary">Update</span></a>
                                            </td>
    									</tr>

                                    {% endfor %}

								</tbody>
								
							 </table>
                            </div>
                            
                            <a href="{{ site_url("patient_management/communication_notes/add/#{ record.patient_id }") }}" title="">
								<button type="button" class="btn btn-default">
									<i class="fa fa-plus"></i> Add Notes
								</button>
							</a>
             				
             			</div>
             			
             		</div>
             		
             
					<div class="row no-print">
          	
                        <div class="col-xs-12 xrx-btn-handler">
                            <a href="xindex.html" target="_blank" class="btn btn-primary xrx-btn"><i class="fa fa-print"></i> Print</a>

                            <button type="button" class="btn btn-primary xrx-btn" style="margin-right: 5px;">
                            <i class="fa fa-download"></i> Generate PDF
                            </button>
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