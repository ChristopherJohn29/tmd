{% extends "main.php" %}

{% set page_title = 'Route List' %}

{% block content %}
	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Route Sheet</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="" class="table no-margin table-hover">
				<thead>
					<tr>
						<th>Date of Service</th>
						<th>Provider</th>
						<th width="160px">Action</th>
					</tr>
				</thead>
                  
				<tbody>
					<tr>
						<td>Nov 23, 2018</td>
						<td>Alexandra Kirtchik</td>
						<td>
							<a href="{{ site_url('provider_route_sheet_management/route_sheet/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('provider_route_sheet_management/route_sheet/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
					<tr>
						<td>Nov 23, 2018</td>
						<td>Henry Barraza</td>
						<td>
							<a href="{{ site_url('provider_route_sheet_management/route_sheet/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('provider_route_sheet_management/route_sheet/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
					<tr>
						<td>Nov 24, 2018</td>
						<td>Shohreh Nourollah</td>
						<td>
							<a href="{{ site_url('provider_route_sheet_management/route_sheet/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('provider_route_sheet_management/route_sheet/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
					<tr>
						<td>Nov 25, 2018</td>
						<td>Lilibeth Ramirez</td>
						<td>
							<a href="{{ site_url('provider_route_sheet_management/route_sheet/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('provider_route_sheet_management/route_sheet/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
					<tr>
						<td>Nov 25, 2018</td>
						<td>Fidelia Nchetam</td>
						<td>
							<a href="{{ site_url('provider_route_sheet_management/route_sheet/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('provider_route_sheet_management/route_sheet/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
					<tr>
						<td>Nov 27, 2018</td>
						<td>Grace Adeagbo</td>
						<td>
							<a href="{{ site_url('provider_route_sheet_management/route_sheet/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('provider_route_sheet_management/route_sheet/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
					<tr>
						<td>Nov 27, 2018</td>
						<td>Kaixuan Luo</td>
						<td>
							<a href="{{ site_url('provider_route_sheet_management/route_sheet/details/1') }}"><span class="label label-primary">View Details</span></a>
							<a href="{{ site_url('provider_route_sheet_management/route_sheet/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
				</tbody>
				
				<tfoot>
					<tr>
						<th>Date of Service</th>
						<th>Provider</th>
						<th>Actions</th>
					</tr>
				</tfoot>
                </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>

      </div>
        
{% endblock %}