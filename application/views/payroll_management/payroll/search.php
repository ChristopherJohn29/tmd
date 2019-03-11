{% extends "main.php" %}

{% 
  set scripts = [
    'dist/js/payroll_management/payroll/search',
    'dist/js/payroll_management/payroll/list',
    'dist/js/libraries/year_incrementor'
  ]
%}

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
                                
                                {{ form_open("payroll_management/payroll", {"class": "xrx-form"}) }}
                                    
                                    <p class="lead">Create a Payroll</p>
                                        
                                    <div class="row">
                                        <div class="col-md-3 form-group">
                                            <label class="control-label">Month <span>*</span></label>
                                            <select class="form-control" style="width: 100%;" name="month" id="dob" required="true">
                                                <option selected="selected" value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-2 form-group">
                                            <label class="control-label">From <span>*</span></label>
                                            <select class="form-control" style="width: 100%;" name="fromDate" id="dob" required="true">
                                                <option selected="selected">1</option>
                                                <option>16</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-2 form-group">
                                            <label class="control-label">To <span>*</span></label>
                                            <select class="form-control" style="width: 100%;" name="toDate" id="dob" readonly="true" required="true">
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-2 form-group">
                                            <label class="control-label">Year <span>*</span></label>
                                            <select class="form-control" style="width: 100%;" name="year" id="dob" required="true">
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-3 form-group">
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

                                {% if results is defined and results|length > 0 %}

                                    {{ include('payroll_management/payroll/list.php') }}

                                {% elseif results is defined and results|length == 0 %}

                                    <div class="no-data-handler">

                                        <p class="text-center">No search results found.</p>

                                    </div>

                                {% endif %}
                                
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