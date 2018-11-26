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
            
            <!-- /.box-header -->
            <div class="box-body">
              
                <section class="xrx-info">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="name">Sharon Cuneta<small>Patient Name</small></h1>
                        </div>
                        
                        <div class="col-md-4">
                            <p class="lead">Basic Information</p>
                            
                            <table class="table xrx-table">
                                <tr>
                                    <th>Referral Date:</th>
                                    <td>11/07/2018</td>
                                </tr>
                                <tr>
                                    <th>Medicare:</th>
                                    <td>604384610M</td>
                                </tr>
                                <tr>
                                    <th>Date of Birth:</th>
                                    <td>04/07/1944</td>
                                </tr>
                                <tr>
                                    <th>Gender:</th>
                                    <td>Female</td>
                                </tr>
                            </table>
                        </div>
                        
                        <div class="col-md-4">
                            <p class="lead">Contact Information</p>
                            
                            <table class="table xrx-table">
                                <tr>
                                    <th>Address:</th>
                                    <td>340 E. Harvard Rd., Apt 509, Burbank,<br>CA 91502-1036</td>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <td>818.846.4843</td>
                                </tr>
                            </table>
                        </div>
                        
                        <div class="col-md-4">
                            <p class="lead">Home Health Information</p>
                            
                            <table class="table xrx-table">
                                <tr>
                                    <th>Home Health:</th>
                                    <td>GMO Home Health</td>
                                </tr>
                                <tr>
                                    <th>Contact Person:</th>
                                    <td>Marina</td>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <td>818.909.2599</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>gmahomehealth@yahoo.com</td>
                                </tr>
                            </table>
                        </div>
                        
                    </div>
                    
                    <div class="row xrx-row-spacer">
                        <div class="col-md-12">
                            
                            <p class="lead">Transactions</p>
                            
                            <table class="table no-margin table-hover">
                                <thead>
                                    <tr>
                                        <th>Type of Visit</th>
                                        <th>Provider</th>
                                        <th>Date of Service</th>
                                        <th>Deductible</th>
                                        <th>AW/IPPE</th>
                                        <th>ACP</th>
                                        <th>Diabetes</th>
                                        <th>Tobacco</th>
                                        <th>ICD-Code Diagnoses</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <td>Initial (Home)</td>
                                        <td>Alexandra Kirtchik</td>
                                        <td>06/10/2018</td>
                                        <td>QMB-0</td>
                                        <td>Yes (11/21/2018)</td>
                                        <td>Yes</td>
                                        <td>No</td>
                                        <td>No</td>
                                        <td>J45.51,R06.02,M54.5,R42,R60.1,M79.1,R26.81</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                    
                    
                    
                    <div class="row xrx-row-spacer">
                    
                        <div class="col-md-12">
                            
                            <p class="lead">Certifications</p>
                            
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
                                    </tr>
                                    
                                    <tr>
                                        <th>Re-Certification</th>
                                        <td>6/18/2018 - 8/16/2018</td>
                                        <td>02/07/201</td>
                                        <td>7/3 - 7/19</td>
                                        <td>8/2 - 8/14</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                                
                            </table>
                            
                        </div>
                        
                    </div>
                    
                    
                    
                    <div class="row xrx-row-spacer">
                    
                        <div class="col-md-7">
                        
                            <p class="lead">Communication Notes</p>
                            
                                <ul>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                                    <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                                </ul>
                            
                        </div>
                        
                    </div>
                    
             
                    <div class="row no-print">
            
                    <div class="col-xs-12 xrx-btn-handler">
                        <a href="xindex.html" target="_blank" class="btn btn-primary xrx-btn"><i class="fa fa-print"></i> Print</a>
                        
                        <button type="button" class="btn btn-success xrx-btn" style="margin-right: 5px;">
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