{% extends "main.php" %}

{% set page_title = 'Home Health Care List' %}

{% 
  set scripts = [
    'dist/js/home_health_care_management/profile/add'
  ]
%}

{% block content %}
	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Home Health Care</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="" class="table no-margin table-hover">
				<thead>
					<tr>
						<th>Home Health</th>
						<th>Contact Name</th>
						<th>Phone</th>
						<th>Address</th>
						<th width="80px">Action</th>
					</tr>
				</thead>
                  
				<tbody>
					<tr>
						<td>GMO Home Health</td>
						<td>Marina</td>
						<td>808 909 2599</td>
						<td>605 Roberts Road, San Francisco, CA 94112</td>
						<td>
							<a href="{{ site_url('home_health_care_management/profile/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
					<tr>
						<td>Faith and Hope</td>
						<td>Hilda</td>
						<td>808 920 8482</td>
						<td>7526 Mechanic Street, Westminster, CA 92683</td>
						<td>
							<a href="{{ site_url('home_health_care_management/profile/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
					<tr>
						<td>Divine Care Home Health</td>
						<td>Jean</td>
						<td>805 578 9481</td>
						<td>9898 Coffee St., Chino, CA 91710</td>
						<td>
							<a href="{{ site_url('home_health_care_management/profile/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
					<tr>
						<td>White Shield Home Health</td>
						<td>Kristina</td>
						<td>818 241 7404</td>
						<td>5 S. School Drive, San Diego, CA 92126</td>
						<td>
							<a href="{{ site_url('home_health_care_management/profile/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
					<tr>
						<td>Millenium Home Health</td>
						<td>Mike</td>
						<td>323 868 1034</td>
						<td>751 Thorne Avenue, Livermore, CA 94550</td>
						<td>
							<a href="{{ site_url('home_health_care_management/profile/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
					<tr>
						<td>Nightingle Home Health</td>
						<td>Anika</td>
						<td>818 245 6900</td>
						<td>61 Wilson Road, Indio, CA 92201</td>
						<td>
							<a href="{{ site_url('home_health_care_management/profile/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
					<tr>
						<td>Prestige Home Health</td>
						<td>Alvita</td>
						<td>323 644 0607</td>
						<td>36 Canterbury Street, Long Beach, CA 90813</td>
						<td>
							<a href="{{ site_url('home_health_care_management/profile/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
					<tr>
						<td>Advance Home Care</td>
						<td>Seda</td>
						<td>818 848 2100</td>
						<td>7056 North Foster Court, Ontario, CA 91761</td>
						<td>
							<a href="{{ site_url('home_health_care_management/profile/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
					<tr>
						<td>Healthy Choice Home Care</td>
						<td>Karina</td>
						<td>818 787 2482</td>
						<td>68 Pacific St., Compton, CA 90221</td>
						<td>
							<a href="{{ site_url('home_health_care_management/profile/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
					<tr>
						<td>R & G Home Health Care</td>
						<td>Rita</td>
						<td>818 840 0900</td>
						<td>8192 Windsor Drive, Simi Valley, CA 93065</td>
						<td>
							<a href="{{ site_url('home_health_care_management/profile/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
				</tbody>
                </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>

      </div>
{% endblock %}