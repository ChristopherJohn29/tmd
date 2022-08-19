{% extends "main.php" %}

{% set page_title = 'Specialist Details' %}

{% block content %}

<div class="row">
        <div class="col-md-12">
          <div class="box">
            
            <div class="box-body">
              
             	<section class="xrx-info">
             		
             		<div class="row">
             			<div class="col-md-12">

             				<h1 class="name">{{ record.company_name }}<small>Specialist</small></h1>

             			</div>
             			
             			<div class="col-md-6">
             				<p class="lead blue-bg">Basic Information</p>
             				
             				<table class="table xrx-table">
             					<tr>
             						<th>Company Name:</th>
             						<td>{{ record.company_name }}</td>
             					</tr>
             					<tr>
             						<th>Phone Number:</th>
             						<td>{{ record.phone_number }}</td>
             					</tr>
             					<tr>
             						<th>Fax Number:</th>
             						<td>{{ record.fax }}</td>
             					</tr>
             				</table>
             			</div>
             			
             			<div class="col-md-6">
             				<p class="lead blue-bg">Contact Information</p>
             				
             				<table class="table xrx-table">
             			
             					<tr>
             						<th>Address:</th>
             						<td>{{ record.address }}</td>
             					</tr>
             				</table>
             			</div>

                        <div class="col-md-12">
                            <p class="lead blue-bg">Other Information</p>
                            
                            <table class="table xrx-table">
                        
                                <tr>
                                    <th>Services Provided:</th>
                                    <td>{{ record.services_provided|nl2br }}</td>
                                </tr>
                            </table>

                            <table class="table xrx-table">
                        
                                <tr>
                                    <th>Notes:</th>
                                    <td>{{ record.notes|nl2br }}</td>
                                </tr>
                            </table>
                        </div>
                     
                   
                        <div class="col-md-12 text-center">
                      
                                <a href="{{ site_url("specialist/profile/edit/#{ record.id }") }}">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i> Update Entry
                                    </button>
                                </a>

                            
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