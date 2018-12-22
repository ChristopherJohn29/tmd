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
                            <th width="200px">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                        <tr>
                            <td>Tolentino, Lorna</td>
                            <td>10/29/18</td>
                            <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
                            <td>11/06/18</td>
                            <td>
                                <a href="details-patient.php"><span class="label label-primary">View Details</span></a>
                                <a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Concepcion, Gabby</td>
                            <td>10/29/18</td>
                            <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
                            <td>11/06/18</td>
                            <td>
                                <a href="details-patient.php"><span class="label label-primary">View Details</span></a>
                                <a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Soriano, Maricel</td>
                            <td>10/29/18</td>
                            <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
                            <td>11/06/18</td>
                            <td>
                                <a href="details-patient.php"><span class="label label-primary">View Details</span></a>
                                <a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Bautista, Herbert</td>
                            <td>10/29/18</td>
                            <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
                            <td>11/06/18</td>
                            <td>
                                <a href="details-patient.php"><span class="label label-primary">View Details</span></a>
                                <a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Cuneta, Sharon</td>
                            <td>10/29/18</td>
                            <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
                            <td>11/06/18</td>
                            <td>
                                <a href="details-patient.php"><span class="label label-primary">View Details</span></a>
                                <a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Bonnevie, Dina</td>
                            <td>10/29/18</td>
                            <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
                            <td>11/06/18</td>
                            <td>
                                <a href="details-patient.php"><span class="label label-primary">View Details</span></a>
                                <a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Muhlach, Aga</td>
                            <td>10/29/18</td>
                            <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
                            <td>11/06/18</td>
                            <td>
                                <a href="details-patient.php"><span class="label label-primary">View Details</span></a>
                                <a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Salonga, Lea</td>
                            <td>10/29/18</td>
                            <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
                            <td>11/06/18</td>
                            <td>
                                <a href="details-patient.php"><span class="label label-primary">View Details</span></a>
                                <a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Fernandez, Rudy</td>
                            <td>10/29/18</td>
                            <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
                            <td>11/06/18</td>
                            <td>
                                <a href="details-patient.php"><span class="label label-primary">View Details</span></a>
                                <a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Quizon, Dolphy</td>
                            <td>10/29/18</td>
                            <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
                            <td>11/06/18</td>
                            <td>
                                <a href="details-patient.php"><span class="label label-primary">View Details</span></a>
                                <a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
                            </td>
                        </tr>
                        
                    </tbody>
                    
                </table>
                
            </div>
            
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
            <a href="{{ site_url('patient_management/profile/') }}">View All Patients</a>
        </div>
          
        </div>

    </div>
      
</div>

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
                            <th width="160px">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                        <tr>
                            <td>01/03/2019</td>
                            <td>Alexandra Kirtchik</td>
                            <td>
                                <a href="details-patient.php"><span class="label label-primary">View Details</span></a>
                                <a href="details-patient.php"><span class="label label-primary">Update</span></a>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>01/03/2019</td>
                            <td>Alexandra Kirtchik</td>
                            <td>
                                <a href="details-patient.php"><span class="label label-primary">View Details</span></a>
                                <a href="details-patient.php"><span class="label label-primary">Update</span></a>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>01/03/2019</td>
                            <td>Alexandra Kirtchik</td>
                            <td>
                                <a href="details-patient.php"><span class="label label-primary">View Details</span></a>
                                <a href="details-patient.php"><span class="label label-primary">Update</span></a>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>01/03/2019</td>
                            <td>Alexandra Kirtchik</td>
                            <td>
                                <a href="details-patient.php"><span class="label label-primary">View Details</span></a>
                                <a href="details-patient.php"><span class="label label-primary">Update</span></a>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>01/03/2019</td>
                            <td>Alexandra Kirtchik</td>
                            <td>
                                <a href="details-patient.php"><span class="label label-primary">View Details</span></a>
                                <a href="details-patient.php"><span class="label label-primary">Update</span></a>
                            </td>
                        </tr>
                        
                        
                    </tbody>
                    
                </table>
                
            </div>
            
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
            <a href="{{ site_url('provider_route_sheet_management/route_sheet/') }}">View All Route Sheet</a>
        </div>
          
        </div>

    </div>
      
</div>



{% endblock %}