{% extends "main.php" %}

{% set page_title = 'TeleHealth Visits' %}

{%
  set scripts = [
    'dist/js/superbill_management/details_checkboxes'
  ]
%}

{% block content %}
	<div class="row">
        <div class="col-md-12">
          <div class="box">

            <!-- /.box-header -->
            <div class="box-body">

             	<section class="xrx-info">

             		<div class="row">
             			<div class="col-xs-12">
						  {% if states %}
							{{ include('commons/alerts.php') }}
						  {% endif %}
						</div>

             			<div class="col-md-12">
             				<h1 class="name">Facility Visits<small>Unbill</small></h1>
             			</div>

             			<div class="col-md-6">

             				<table class="table xrx-table">
             					<tr>
             						<th>Date Billed:</th>
									 <td>{{ date_billed|replace({'_': '/'}) }}</td>
             					</tr>
             				</table>
             			</div>
             		</div>

             		{{ form_open("superbill_management/superbill/form_unbill/fv/#{ fromDate|replace({'/': '_'}) }") }}

	             		<div class="row xrx-row-spacer">

	             			<div class="col-md-12">

	             				<p class="lead">Transactions</p>
	             				<div class="table-responsive">
	             				   <table class="table no-margin table-striped">
									<thead>
										<tr>
											<th><input type="checkbox" id="checkAll"></th>
	                                        <th>&nbsp;</th>
											<th width="200px">Patient Name</th>
											<th>Supervising MD</th>
											<th>Date of Service</th>
											<th>Type of Visit</th>
											<th>Date Billed </th>
										</tr>
									</thead>

									<tbody>

										{% for transaction in newTransactions %}

											<tr>
												<td>
													<input type="checkbox" class="superbill_checkboxes" name="pt_id[]" value="{{ transaction.pt_id }}">
												</td>
												<td class="text-center">{{ loop.index }}</td>
												<td>{{ transaction.patient_name }}</td>
                                                <td>{{ transaction.supervisingMD_firstname ~ ' ' ~ transaction.supervisingMD_lastname }}</td>
												<td>{{ transaction.get_date_format(transaction.pt_dateOfService) }}</td>
												<td>{{ transaction.get_tov_code(transaction.pt_tovID, transaction.pt_status) }}</td>
												<td>{{ transaction.get_date_format(transaction.pt_visitBilled) }}</td>

											</tr>

										{% endfor %}

									</tbody>
	                                </table>
	                            </div>
	             			</div>
	             		</div>

		

	             		<div class="row no-print">

	                        <div class="col-xs-12 xrx-btn-handler">
	                            <!-- <button type="submit" id="generatePDF" name="submit_type"  value="pdf" formtarget="_blank" class="btn btn-primary xrx-btn" style="margin-right: 5px;" disabled="true">
	                            <i class="fa fa-download"></i> Generate PDF
	                            </button> -->

	                            <button type="submit" id="billedBtn" name="submit_type"  value="paid" class="btn btn-danger xrx-btn pull-right unbill-btn" style="margin-right: 5px;" disabled="true">
	                            <i class="fa fa-credit-card"></i> Visit Unbill
	                            </button>
	                        </div>

	                    </div>

                    </form>

             	</section>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      	</div>
  	</div>

{% endblock %}