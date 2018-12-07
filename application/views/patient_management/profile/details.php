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
									<tr>
										<th>Certification</th>
										<td>4/19/2018 - 6/17/2018</td>
										<td>03/05/2018</td>
										<td>4/23 - 4/30</td>
										<td>5/22 - 5/28</td>
										<td>6/1 - 6/14</td>
										<td>-</td>
										<td>-</td>
                                        <td>
                                            <a href="{{ site_url('patient_management/CPO/edit/1') }}"><span class="label label-primary">Update</span></a>
                                        </td>
									</tr>
									
									<tr>
										<th>Re-Certification</th>
										<td>6/18/2018 - 8/16/2018</td>
										<td>02/07/2018</td>
										<td>7/3 - 7/19</td>
										<td>8/2 - 8/14</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
                                        <td>
                                            <a href="{{ site_url('patient_management/CPO/edit/1') }}"><span class="label label-primary">Update</span></a>
                                        </td>
									</tr>
								</tbody>
								
							 </table>
                            </div>
                            
							<a href="{{ site_url('patient_management/CPO/add') }}" title="">
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
									<tr>
										<th>11/25/2018</th>
										<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
										<td>
                                            <a href="{{ site_url('patient_management/profile/notes/edit/1') }}"><span class="label label-primary">Update</span></a>
                                        </td>
									</tr>
                                    <tr>
										<th>11/26/2018</th>
										<td>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>
										<td>
                                            <a href="{{ site_url('patient_management/profile/notes/edit/1') }}"><span class="label label-primary">Update</span></a>
                                        </td>
									</tr>
                                    <tr>
										<th>11/27/2018</th>
										<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
										<td>
                                            <a href="{{ site_url('patient_management/profile/notes/edit/1') }}"><span class="label label-primary">Update</span></a>
                                        </td>
									</tr>
                                    <tr>
										<th>11/29/2018</th>
										<td>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>
										<td>
                                            <a href="{{ site_url('patient_management/profile/notes/edit/1') }}"><span class="label label-primary">Update</span></a>
                                        </td>
									</tr>
								</tbody>
								
							 </table>
                            </div>
                            
                            <a href="{{ site_url('patient_management/notes/add') }}" title="">
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