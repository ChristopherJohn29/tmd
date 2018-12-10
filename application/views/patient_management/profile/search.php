{% extends "main.php" %}

{% set page_title = 'Search Patient' %}

{% block content %}

<div class="row">
    
    <div class="col-lg-12">
    
        <div class="box">

            <div class="box-body">

                <section class="xrx-info">

                <div class="row">
                    
                    <div class="col-lg-4 col-lg-offset-4">
                        <div class="search-handler">
                            
                            <form class="xrx-form">
                                
                                <label><p class="lead">Search a Patient</p></label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-search"></i>
                                  </div>
                                  <input type="text" class="form-control input-lg">
                                </div>
                            
                            </form>
                            
                        </div>
                    </div>
                    
                </div>

                <div class="row xrx-row-spacer">

                    <div class="box-body">
                        <div class="table-responsive">
                            
                            <p class="lead">Search Result</p>
                            
                            <table id="all-patient-list" class="table no-margin table-hover">
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
                                    <tr>
                                        <td>Salonga, Lea</td>
                                        <td>10/29/18</td>
                                        <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
                                        <td>11/06/18</td>
                                        <td>
                                            <a href="{{ site_url('patient_management/profile/details/1') }}"><span class="label label-primary">View Details</span></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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