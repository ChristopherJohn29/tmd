{% extends "main.php" %}

{% 
  set scripts = [
    'dist/js/patient_management/profile/list'
  ]
%}

{% set page_title = 'Patients List' %}

{% block content %}
	 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Patients</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="all-patient-list" class="table no-margin table-hover">
                <thead>
                  <tr>
                    <th>Patient Name</th>
                    <th>Referral Date</th>
                    <th>ICD10 - Code Diagnoses</th>
                    <th>Date of Service</th>
                    <th width="170px">Actions</th>
                  </tr>
                  </thead>
                  
                  <tbody>
	                  <tr>
	                    <td>Tolentino, Lorna</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="{{ site_url('patient_management/profile/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('patient_management/transaction/add') }}" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Concepcion, Gabby</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="{{ site_url('patient_management/profile/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('patient_management/transaction/add') }}" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Soriano, Maricel</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="{{ site_url('patient_management/profile/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('patient_management/transaction/add') }}" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Bautista, Herbert</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="{{ site_url('patient_management/profile/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('patient_management/transaction/add') }}" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Cuneta, Sharon</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="{{ site_url('patient_management/profile/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('patient_management/transaction/add') }}" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Bonnevie, Dina</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="{{ site_url('patient_management/profile/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('patient_management/transaction/add') }}" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Muhlach, Aga</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="{{ site_url('patient_management/profile/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('patient_management/transaction/add') }}" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Salonga, Lea</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="{{ site_url('patient_management/profile/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('patient_management/transaction/add') }}" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Fernandez, Rudy</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="{{ site_url('patient_management/profile/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('patient_management/transaction/add') }}" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Quizon, Dolphy</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="{{ site_url('patient_management/profile/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('patient_management/transaction/add') }}" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  	                  <tr>
	                    <td>Tolentino, Lorna</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="{{ site_url('patient_management/profile/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('patient_management/transaction/add') }}" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Concepcion, Gabby</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="{{ site_url('patient_management/profile/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('patient_management/transaction/add') }}" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Soriano, Maricel</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="{{ site_url('patient_management/profile/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('patient_management/transaction/add') }}" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Bautista, Herbert</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="{{ site_url('patient_management/profile/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('patient_management/transaction/add') }}" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Cuneta, Sharon</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="{{ site_url('patient_management/profile/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('patient_management/transaction/add') }}" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Bonnevie, Dina</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="{{ site_url('patient_management/profile/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('patient_management/transaction/add') }}" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Muhlach, Aga</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="{{ site_url('patient_management/profile/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('patient_management/transaction/add') }}" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Salonga, Lea</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="{{ site_url('patient_management/profile/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('patient_management/transaction/add') }}" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  
					  </tbody>
					  <tfoot>
		                <tr>
		                  	<th>Patient Name</th>
		                    <th>Referral Date</th>
		                    <th>ICD10 - Code Diagnoses</th>
		                    <th>Date of Service</th>
		                    <th>Actions</th>
		                </tr>
		              </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
         </div> 

         </div> 
{% endblock %}