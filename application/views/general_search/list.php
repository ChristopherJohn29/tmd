{% extends "main.php" %}

{% set page_title = '' %}

{% block content %}

	

<div class="row">

		<div class="col-xs-12">
		  <div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title">Search Result</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
                
                <p style="font-size: 1.3em; margin-bottom:35px; color:#808080;">{{ total }}  Search result for "<strong>{{ searchTerm }}</strong>"</p>
                
				<div class="table-responsive">
					
                {% for result in results %}

                    <p style="margin-bottom:20px;">
                        <span style="font-size:15px;"><a target="_blank" {{ result['url'] }}>{{ result['name'] }}</a></span><br>
                        <strong>{{ result['value']['field'] }}:</strong> {{ result['value']['value'] }}

                        {% if result['value']['dateField'] is defined %}
                        	<br>
                        	<strong>{{ result['value']['dateField'] }}:</strong> {{ result['value']['dateValue'] }}

                        {% endif %}
                    </p>

                {% endfor %}
                    
				</div>
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
		 </div> 

		 </div> 

{% endblock %}