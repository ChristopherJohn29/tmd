{% extends "main.php" %}

{% set page_title = 'Search Home Health' %}

{%

set scripts = [
    'dist/js/home_health_care_management/profile/search',
    'dist/js/libraries/year_incrementor'
]

%}

{% block content %}

<div class="row">
    
    <div class="col-lg-12">
    
        <div class="box">

            <div class="box-body">

                <section class="xrx-info">

                    <div class="row">

                        <div class="col-xs-12">
                          {% if states %}
                            {{ include('commons/alerts.php') }}
                          {% endif %}
                        </div>
                        
                        <div class="col-lg-10 col-md-offset-2">
                            <div class="search-handler">
                                
                                {{ form_open("home_health_care_management/profile/search", {"class": "xrx-form"}) }}
                                    
                                    <p class="lead">Search Home Health</p>
                                        
                                    <div class="row">
                                    	<div class="col-md-2 form-group">
                                    		<label class="control-label">Home Health <span>*</span></label>
                                    		<div class="dropdown mobiledrs-autosuggest-select">
												<input type="hidden" name="hhcID" required="true">

											  	<input class="form-control"
											  		style="border-radius: 4px !important;font-size: 14px;border: 1px solid #ccc !important;"
											  		type="text" 
											  		data-mobiledrs_autosuggest 
											  		data-mobiledrs_autosuggest_url="{{ site_url('ajax/home_health_care_management/profile/search') }}"
											  		data-mobiledrs_autosuggest_dropdown_id="patient_hhcID_dropdown">

											  	<div data-mobiledrs_autosuggest_dropdown id="patient_hhcID_dropdown">
										  	  	</div>
											</div>
                                    	</div>
                                        <div class="col-md-2 form-group">
                                            <label class="control-label">Month <span>*</span></label>
                                            <select class="form-control" style="width: 100%;" name="fromMonth" required="true">
                                                <option value="1">January</option>
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
                                        
                                        <div class="col-md-1 form-group">
                                            <label class="control-label">From <span>*</span></label>
                                            <select class="form-control" style="width: 100%;" name="fromDate" required="true" data-fromDate-incrementor>
                                            </select>
                                        </div>

                                        <div class="col-md-2 form-group">
                                            <label class="control-label">Month <span>*</span></label>
                                            <select class="form-control" style="width: 100%;" name="toMonth" required="true">
                                                <option value="1">January</option>
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
                                        
                                        <div class="col-md-1 form-group">
                                            <label class="control-label">To <span>*</span></label>
                                            <select class="form-control" style="width: 100%;" name="toDate" required="true" data-toDate-incrementor>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-2 form-group">
                                            <label class="control-label">Year <span>*</span></label>
                                            <select class="form-control" style="width: 100%;" name="year" required="true">
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
                                
                                {% if records is defined and records|length > 0 %}

                                    {{ include("home_health_care_management/profile/result.php") }}

                                 {% elseif records is defined and records|length == 0 %}

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