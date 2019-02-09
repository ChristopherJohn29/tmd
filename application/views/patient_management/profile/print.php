{% extends "basic.php" %}

{% set page_title = 'Print Patient Details' %}
{% set body_class = 'print' %}

{% block content %}
 
 <script type="text/javascript">
 	window.print();
 </script>

<div class="row">
    <div class="col-md-12">
      <div class="box">

        <!-- /.box-header -->
        <div class="box-body">

            <section class="xrx-info">

                <div class="row">

                        <div class="col-md-12">
                            <h3 class="name rs">Patient Name</h3>
                        </div>
                        
                        <div class="col-md-4">
             				<p class="lead blue-bg">Basic Information</p>
             				
             				<table class="table xrx-table">
             					<tr>
             						<th>Medicare:</th>
             						<td>a</td>
             					</tr>
             					<tr>
             						<th>Date of Birth:</th>
             						<td>a</td>
             					</tr>
             					<tr>
             						<th>Gender:</th>
             						<td>a</td>
             					</tr>
                                <tr>
                                    <th>Place of Service:</th>
                                    <td>a</td>
                                </tr>
             				</table>
             			</div>
             			
             			<div class="col-md-4">
             				<p class="lead blue-bg">Contact Information</p>
             				
             				<table class="table xrx-table">
             					<tr>
             						<th>Address:</th>
             						<td>a</td>
             					</tr>
             					<tr>
             						<th>Phone:</th>
             						<td>a</td>
             					</tr>
             					<tr>
             						<th>Caregiver/Family:</th>
             						<td>a</td>
             					</tr>
             				</table>
             			</div>
             			
             			<div class="col-md-4">
             				<p class="lead blue-bg">Home Health Information</p>
             				
             				<table class="table xrx-table">
             					<tr>
             						<th>Home Health:</th>
             						<td>a</td>
             					</tr>
             					<tr>
             						<th>Contact Person:</th>
             						<td>a</td>
             					</tr>
             					<tr>
             						<th>Phone:</th>
             						<td>a</td>
             					</tr>
             					<tr>
             						<th>Email:</th>
             						<td>a</td>
             					</tr>
             				</table>
             			</div>
                    
                    </div>
                
                <div class="row xrx-row-spacer">
                    
                    <div class="col-md-12">
                    
                        <p class="lead">Visits</p>
                        
                        <div class="table-responsive">
                            
                            <p>Type of visit : a</p>
                            
                            <table id="" class="table no-margin table-striped">
                                
                                <thead>
                                    <tr>
                                        <th>Provider</th>
                                        <th>Date of Service</th>
                                        <th>Deductible</th>
                                        <th>AW/IPPE</th>
                                        <th>Performed</th>
                                        <th>AW/IPPE Date</th>
                                        <th width="200px">AW Billed</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>

                            </table>
                            
                            <table id="" class="table no-margin table-striped">
                                
                                <thead>
                                    <tr>
                                        <th>ACP</th>
                                        <th>Diabetes</th>
                                        <th>Tobacco</th>
                                        <th>TCM</th>
                                        <th>Others</th>
                                        <th>ICD-Code Diagnoses</th>
                                        <th>Referral Date</th>
                                        <th>Date Referral was Emailed</th>
                                        <th width="200px">Visit Billed</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        
                    </div>

                </div>
                
                <div class="row xrx-row-spacer">
                    
                    <div class="col-md-12">
                    
                        <p class="lead">Certifications</p>
                        
                        <div class="table-responsive">
                            
                            <p>ICD Code Diagnoses : a</p>
                            
                            <table id="" class="table no-margin table-striped">
                                
                                <thead>
                                    <tr>
                                        <th>Cert Period</th>
                                        <th>485 Date Signed</th>
                                        <th>1st month CPO</th>
                                        <th>2nd month CPO</th>
                                        <th>3rd month CPO</th>
                                        <th width="200px">Discharge Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>

                            </table>
                            
                            <table id="" class="table no-margin table-striped">
                                
                                <thead>
                                    <tr>
                                        <th>Re-cert Period</th>
                                        <th>485 Re-cert Date Signed</th>
                                        <th>1st month CPO</th>
                                        <th>2nd month CPO</th>
                                        <th>3rd month CPO</th>
                                        <th width="200px">Discharge Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        
                    </div>

                </div>
                
                <div class="row xrx-row-spacer">
                    
                    <div class="col-md-12">
                    
                        <p class="lead">Communication Notes</p>
                        
                        <div class="table-responsive">
                            
                            <table id="" class="table no-margin table-striped">
                                
                                <thead>
                                    <tr>
                                        <th width="200px">Note Added</th>
                                        <th>Note</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
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