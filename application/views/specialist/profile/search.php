{% extends "main.php" %}

{% set page_title = 'Search Specialist' %}

{%

set scripts = [
    'dist/js/specialist/profile/search',
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
                                
                                {{ form_open("specialist/profile/search", {"class": "xrx-form"}) }}
                                    
                                    <p class="lead">Search specialist</p>
                                        
                                    <div class="row">
                                    	<div class="col-md-6 form-group">
                                    		<label class="control-label">Company Name <span>*</span></label>
                                    		<div class="dropdown mobiledrs-autosuggest-select">
												<input type="hidden" name="id" required="true">

											  	<input class="form-control"
											  		style="border-radius: 4px !important;font-size: 14px;border: 1px solid #ccc !important;"
											  		type="text" 
											  		data-mobiledrs_autosuggest 
											  		data-mobiledrs_autosuggest_url="{{ site_url('ajax/specialist/profile/search') }}"
											  		data-mobiledrs_autosuggest_dropdown_id="company_name">

											  	<div data-mobiledrs_autosuggest_dropdown id="company_name">
										  	  	</div>
											</div>
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

                                    {{ include("specialist/profile/result.php") }}

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