{% extends "main.php" %}

{% 
  set scripts = [
    'dist/js/payroll_management/payroll/list'
  ]
%}

{% set page_title = 'Payroll List' %}

{% block content %}
	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Payroll</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
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
						<td><a href="details-payroll.php"><span class="label label-primary">View Details</span></a</td>
					</tr>
					
				</tbody>
				
				<tfoot>
					<tr>
						<th>Provider Name</th>
						<th>Total Visits</th>
						<th>Total Salary</th>
						<th>Action</th>
					</tr>
				</tfoot>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

      </div>

  </div>
{% endblock %}