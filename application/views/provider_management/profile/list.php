{% extends "main.php" %}

{% set page_title = 'Provider List' %}

{% 
  set scripts = [
    'dist/js/provider_management/profile/list'
  ]
%}

{% block content %}
	 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Providers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
				    <table id="all-patient-list" class="table no-margin table-hover">
					<thead>
						<tr>
							<th>Provider Name</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Address</th>
							<th width="120px">Action</th>
						</tr>
					</thead>
	                  
					<tbody>
						<tr>
							<td>Alexandra Kirtchik</td>
							<td>202-555-0162</td>
							<td>alexandra.kirtchik@email.com</td>
							<td>38 Poplar St., Watsonville, CA 95076</td>
							<td>
								<a href="{{ site_url('provider_management/profile/details/1') }}" title="Edit"><span class="label label-primary">View Details</span></a>
                                <a href="{{ site_url('provider_management/profile/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
							</td>
						</tr>
						
						<tr>
							<td>Henry Barraza</td>
							<td>202-555-0166</td>
							<td>henry.arraza@email.com</td>
							<td>567 Longbranch Drive, Daly City, CA 94015</td>
							<td>
								<a href="{{ site_url('provider_management/profile/details/1') }}" title="Edit"><span class="label label-primary">View Details</span></a>
                                <a href="{{ site_url('provider_management/profile/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
							</td>
						</tr>
						
						<tr>
							<td>Shohreh Nourollah</td>
							<td>202-555-0145</td>
							<td>henry.arraza@email.com</td>
							<td>7234 Del Monte Street, Oxnard, CA 93030</td>
							<td>
								<a href="{{ site_url('provider_management/profile/details/1') }}" title="Edit"><span class="label label-primary">View Details</span></a>
                                <a href="{{ site_url('provider_management/profile/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
							</td>
						</tr>
						
						<tr>
							<td>Lilibeth Ramirez</td>
							<td>202-555-0128</td>
							<td>lilibeth.ramirez@email.com</td>
							<td>9433 East Glenridge Drive, San Francisco, CA 94109</td>
							<td>
								<a href="{{ site_url('provider_management/profile/details/1') }}" title="Edit"><span class="label label-primary">View Details</span></a>
                                <a href="{{ site_url('provider_management/profile/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
							</td>
						</tr>
						
						<tr>
							<td>Fidelia Nchetam</td>
							<td>202-555-0119</td>
							<td>fidelia.nchetam@email.com</td>
							<td>26 Arlington Drive, Spring Valley, CA 91977</td>
							<td>
								<a href="{{ site_url('provider_management/profile/details/1') }}" title="Edit"><span class="label label-primary">View Details</span></a>
                                <a href="{{ site_url('provider_management/profile/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
							</td>
						</tr>
						
						<tr>
							<td>Grace Adeagbo</td>
							<td>202-555-0159</td>
							<td>gracea.adeagbo@email.com</td>
							<td>520 Berkshire Drive, Alameda, CA 94501</td>
							<td>
								<a href="{{ site_url('provider_management/profile/details/1') }}" title="Edit"><span class="label label-primary">View Details</span></a>
                                <a href="{{ site_url('provider_management/profile/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
							</td>
						</tr>
						
						<tr>
							<td>Kaixuan Luo</td>
							<td>202-535-0551</td>
							<td>kaixuan.luo@email.com</td>
							<td>9690 Grandrose Street, Ontario, CA 91762</td>
							<td>
								<a href="{{ site_url('provider_management/profile/details/1') }}" title="Edit"><span class="label label-primary">View Details</span></a>
                                <a href="{{ site_url('provider_management/profile/edit/1') }}" title="Edit"><span class="label label-primary">Update</span></a>
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