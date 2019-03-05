{% extends "basic.php" %}

{% set page_title = 'Print Patient Details' %}
{% set body_class = 'print' %}

{% block content %}

<style type="text/css">
    @media print {
        @page {size: A4 landscape; }
    }
</style>
    
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
                            <h3 class="name rs">{{ record.patient_name }}</h3>
                        </div>
                        
                        <div class="col-md-4">
             				<p class="lead blue-bg">Basic Information</p>
             				
             				<table class="table xrx-table">
             					<tr>
                                    <th>Medicare:</th>
                                    <td>{{ record.patient_medicareNum }}</td>
                                </tr>
                                <tr>
                                    <th>Date of Birth:</th>
                                    <td>{{ record.get_date_format(record.patient_dateOfBirth) }}</td>
                                </tr>
                                <tr>
                                    <th>Gender:</th>
                                    <td>{{ record.patient_gender }}</td>
                                </tr>
                                <tr>
                                    <th>Place of Service:</th>
                                    <td>{{ record.get_fullpos_name() }}</td>
                                </tr>
                                <tr>
                                    <th>Supervising MD:</th>
                                    <td>{{ record.patient_supervising_MD }}</td>
                                </tr>
             				</table>
             			</div>
             			
             			<div class="col-md-4">
             				<p class="lead blue-bg">Contact Information</p>
             				
             				<table class="table xrx-table">
             					<tr>
                                    <th>Address:</th>
                                    <td>{{ record.patient_address }}</td>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <td>{{ record.patient_phoneNum }}</td>
                                </tr>
                                <tr>
                                    <th>Caregiver/Family:</th>
                                    <td>{{ record.patient_caregiver_family }}</td>
                                </tr>
             				</table>
             			</div>
             			
             			<div class="col-md-4">
             				<p class="lead blue-bg">Home Health Information</p>
             				
             				<table class="table xrx-table">
             					<tr>
                                    <th>Home Health:</th>
                                    <td>{{ record.hhc_name }}</td>
                                </tr>
                                <tr>
                                    <th>Contact Person:</th>
                                    <td>{{ record.hhc_contact_name }}</td>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <td>{{ record.hhc_phoneNumber }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ record.hhc_email }}</td>
                                </tr>
             				</table>
             			</div>
                    
                    </div>
                
                <div class="row xrx-row-spacer">
                    
                    <div class="col-md-12">
                    
                        <p class="lead">Visits</p>
                        
                        <div class="table-responsive">

                            {% for transaction in transactions %}

                                {% if transaction_entity.not_in_tab_list(transaction.tov_id) %}
                            
                                    <p>Type of visit : {{ transaction.tov_name }}</p>

                                {% endif %}
                                
                                {% if transaction_entity.is_tov_sel_noshow_cancelled(transaction.pt_tovID) %}

                                    {{ include('patient_management/profile/mixins/transaction_table_noshow_cancelled.php') }}

                                {% else %}

                                    {{ include('patient_management/profile/mixins/transaction_table_generic.php') }}

                                {% endif %}

                            {% endfor %}

                        </div>
                        
                    </div>

                </div>
                
                <div class="row xrx-row-spacer">
                    
                    <div class="col-md-12">
                    
                        <p class="lead">Certifications</p>
                        
                        <div class="table-responsive">
                                                                                    
                            <table id="" class="table no-margin table-striped">
                                
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>485 Cert Date Signed</th>
                                        <th>1st month CPO</th>
                                        <th>2nd month CPO</th>
                                        <th>3rd month CPO</th>
                                        <th width="200px">Discharge Date</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    {% for cpo in cpos %}

                                        <tr>
                                            <th>{{ cpo.ptcpo_status }}</th>
                                            <td>{{ cpo.get_date_format(cpo.ptcpo_dateSigned) }}</td>
                                            <td>{{ cpo.ptcpo_firstMonthCPO }}</td>
                                            <td>{{ cpo.ptcpo_secondMonthCPO }}</td>
                                            <td>{{ cpo.ptcpo_thirdMonthCPO }}</td>
                                            <td>{{ cpo.get_date_format(cpo.ptcpo_dischargeDate) }}</td>
                                        </tr>

                                    {% endfor %}

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

                                    {% for cn in communication_notes %}

                                        <tr>
                                            <th>{{ cn.get_date_format(cn.ptcn_dateCreated) }}</th>
                                            <td>{{ cn.ptcn_message }}</td>
                                        </tr>

                                    {% endfor %}

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