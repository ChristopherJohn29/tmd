{% extends "main.php" %}

{% set page_title = 'Search Payroll' %}

{% block content %}

<div class="row">
    
    <div class="col-lg-12">
    
        <div class="box">

            <div class="box-body">

                <section class="xrx-info">

                <div class="row">
                    
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="search-handler">
                            
                            <form class="xrx-form">
                                
                            <p class="lead">Create a Payroll</p>
                                
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label class="control-label">Month <span>*</span></label>
                                    <select class="form-control" style="width: 100%;" name="gender" id="dob" required>
                                        <option selected="selected">January</option>
                                        <option>February</option>
                                        <option>March</option>
                                        <option>April</option>
                                        <option>May</option>
                                        <option>June</option>
                                        <option>July</option>
                                        <option>August</option>
                                        <option>September</option>
                                        <option>October</option>
                                        <option>November</option>
                                        <option>Decemer</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-2 form-group">
                                    <label class="control-label">From <span>*</span></label>
                                    <select class="form-control" style="width: 100%;" name="gender" id="dob" required>
                                        <option selected="selected">1</option>
                                        <option>16</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-2 form-group">
                                    <label class="control-label">To <span>*</span></label>
                                    <select class="form-control" style="width: 100%;" name="gender" id="dob" disabled required>
                                        <option selected="selected">15</option>
                                        <option>30</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-2 form-group">
                                    <label class="control-label">Year <span>*</span></label>
                                    <select class="form-control" style="width: 100%;" name="gender" id="dob" required>
                                        <option selected="selected">2018</option>
                                        <option>2019</option>
                                        <option>2020</option>
                                        <option>2021</option>
                                        <option>2022</option>
                                        <option>2023</option>
                                        <option>2024</option>
                                        <option>2025</option>
                                        <option>2026</option>
                                        <option>2027</option>
                                        <option>2028</option>
                                        <option>2029</option>
                                        <option>2030</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-3 form-group">
					              		<button type="submit" class="btn btn-primary xrx-custom-btn-payroll">
											Create Payroll
										</button>
					              	</div>
                                
                            </div>
                                
                            </form>
                            
                        </div>
                    </div>
                    
                </div>

                <div class="row xrx-row-spacer">

                    <div class="box-body">
                        
                        <div class="table-responsive">
                            <table id="all-patient-list" class="table no-margin table-hover">
                                <thead>
                                    <tr>
                                        <th>Provider Name</th>
                                        <th>Total Visits</th>
                                        <th>Total Salary</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Alexandra Kirtchik</td>
                                        <td>13</td>
                                        <td>$1,910</td>
                                        <td><a href="{{ site_url('payroll_management/payroll/details/1') }}"><span class="label label-primary">View Details</span></a></td>
                                    </tr>
                                    <tr>
                                        <td>Alexandra Kirtchik</td>
                                        <td>13</td>
                                        <td>$1,910</td>
                                        <td><a href="{{ site_url('payroll_management/payroll/details/1') }}"><span class="label label-primary">View Details</span></a></td>
                                    </tr>
                                    <tr>
                                        <td>Alexandra Kirtchik</td>
                                        <td>13</td>
                                        <td>$1,910</td>
                                        <td><a href="{{ site_url('payroll_management/payroll/details/1') }}"><span class="label label-primary">View Details</span></a></td>
                                    </tr>
                                    <tr>
                                        <td>Alexandra Kirtchik</td>
                                        <td>13</td>
                                        <td>$1,910</td>
                                        <td><a href="{{ site_url('payroll_management/payroll/details/1') }}"><span class="label label-primary">View Details</span></a></td>
                                    </tr>
                                    <tr>
                                        <td>Alexandra Kirtchik</td>
                                        <td>13</td>
                                        <td>$1,910</td>
                                        <td><a href="{{ site_url('payroll_management/payroll/details/1') }}"><span class="label label-primary">View Details</span></a></td>
                                    </tr>
                                    <tr>
                                        <td>Alexandra Kirtchik</td>
                                        <td>13</td>
                                        <td>$1,910</td>
                                        <td><a href="{{ site_url('payroll_management/payroll/details/1') }}"><span class="label label-primary">View Details</span></a></td>
                                    </tr>
                                    <tr>
                                        <td>Alexandra Kirtchik</td>
                                        <td>13</td>
                                        <td>$1,910</td>
                                        <td><a href="{{ site_url('payroll_management/payroll/details/1') }}"><span class="label label-primary">View Details</span></a></td>
                                    </tr>
                                    <tr>
                                        <td>Alexandra Kirtchik</td>
                                        <td>13</td>
                                        <td>$1,910</td>
                                        <td><a href="{{ site_url('payroll_management/payroll/details/1') }}"><span class="label label-primary">View Details</span></a></td>
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