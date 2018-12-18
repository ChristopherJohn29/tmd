{% extends "main.php" %}

{% set page_title = 'Superbill Create' %}

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
                                
                            <p class="lead">Create Superbill</p>
                                
                            <div class="row">
                                <div class="col-md-2 form-group">
                                    <label class="control-label">Superbill <span>*</span></label>
                                    <select class="form-control" style="width: 100%;" name="gender" id="dob" required>
                                        <option value selected="true">Select</option>
                                        <option>Annual Wellness</option>
                                        <option>Home Visits</option>
                                        <option>Facility Visits</option>
                                        <option>CPO-485</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-2 form-group">
                                    <label class="control-label">Month <span>*</span></label>
                                    <select class="form-control" style="width: 100%;" name="gender" id="dob" required>
                                        <option value selected="true">Select</option>
                                        <option>January</option>
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
                                    <select class="form-control" style="width: 100%;" name="" id="" required>
                                        <option value selected="true">Select</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                        <option>24</option>
                                        <option>25</option>
                                        <option>26</option>
                                        <option>27</option>
                                        <option>28</option>
                                        <option>29</option>
                                        <option>30</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-2 form-group">
                                    <label class="control-label">To <span>*</span></label>
                                    <select class="form-control" style="width: 100%;" name="" id="" required>
                                        <option value selected="true">Select</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                        <option>24</option>
                                        <option>25</option>
                                        <option>26</option>
                                        <option>27</option>
                                        <option>28</option>
                                        <option>29</option>
                                        <option>30</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-2 form-group">
                                    <label class="control-label">Year <span>*</span></label>
                                    <select class="form-control" style="width: 100%;" name="" id="" required>
                                        <option value selected="true">Select</option>
                                        <option>2018</option>
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
                                
                                <div class="col-md-2 form-group">
					              		<button type="submit" class="btn btn-primary xrx-custom-btn-payroll">
											Submit
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
                                        <th>Superbill</th>
                                        <th class="text-center">G0402</th>
                                        <th class="text-center">G0438</th>
                                        <th class="text-center">G0439</th>
                                        <th class="text-center">Total</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Annual Wellness</td>
                                        <td class="text-center">0</td>
                                        <td class="text-center">4</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">5</td>
                                        <td><a href="{{ site_url('superbill_management/annual_wellness/') }}"><span class="label label-primary">View Details</span></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
                    
                <div class="row">

                    <div class="box-body">
                        
                        <div class="table-responsive">
                            <table id="all-patient-list" class="table no-margin table-hover">
                                <thead>
                                    <tr>
                                        <th>Superbill</th>
                                        <th class="text-center">99345</th>
                                        <th class="text-center">99350</th>
                                        <th class="text-center">99497</th>
                                        <th class="text-center">G0108</th>
                                        <th class="text-center">99407</th>
                                        <th class="text-center">Total</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Home Visits</td>
                                        <td class="text-center">2</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">2</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">9</td>
                                        <td><a href="{{ site_url('superbill_management/home_visits/') }}"><span class="label label-primary">View Details</span></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
                    
                <div class="row">

                    <div class="box-body">
                        
                        <div class="table-responsive">
                            <table id="all-patient-list" class="table no-margin table-hover">
                                <thead>
                                    <tr>
                                        <th>Superbill</th>
                                        <th class="text-center">99328</th>
                                        <th class="text-center">G0402</th>
                                        <th class="text-center">G0438</th>
                                        <th class="text-center">G0439</th>
                                        <th class="text-center">Total</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Facility Visits</td>
                                        <td class="text-center">5</td>
                                        <td class="text-center">0</td>
                                        <td class="text-center">4</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">10</td>
                                        <td><a href="{{ site_url('superbill_management/facility_visits/') }}"><span class="label label-primary">View Details</span></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
                    
                <div class="row">

                    <div class="box-body">
                        
                        <div class="table-responsive">
                            <table id="all-patient-list" class="table no-margin table-hover">
                                <thead>
                                    <tr>
                                        <th>Superbill</th>
                                        <th class="text-center">G0180</th>
                                        <th class="text-center">G0181</th>
                                        <th class="text-center">G0181</th>
                                        <th class="text-center">G0181</th>
                                        <th class="text-center">G0179</th>
                                        <th class="text-center">G0181</th>
                                        <th class="text-center">G0181</th>
                                        <th class="text-center">G0181</th>
                                        <th class="text-center">Total</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>CPO-485</td>
                                        <td class="text-center">5</td>
                                        <td class="text-center">5</td>
                                        <td class="text-center">5</td>
                                        <td class="text-center">5</td>
                                        <td class="text-center">4</td>
                                        <td class="text-center">4</td>
                                        <td class="text-center">4</td>
                                        <td class="text-center">0</td>
                                        <td class="text-center">32</td>
                                        <td><a href="{{ site_url('superbill_management/CPO_485/') }}"><span class="label label-primary">View Details</span></a></td>
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