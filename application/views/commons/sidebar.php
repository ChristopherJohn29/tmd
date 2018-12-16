<section class="sidebar">
	<!-- sidebar menu: : style can be found in sidebar.less -->
	<ul class="sidebar-menu" data-widget="tree">
		<li class="header">MAIN NAVIGATION</li>

		<li class="treeview">
			<a href="#">
				<i class="fa fa-dashboard"></i>
				<span>Dashboard</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="{{ site_url('dashboard') }}"><i class="fa fa-angle-right"></i> Home</a></li>
			</ul>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-wheelchair"></i>
				<span>Patients</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="{{ site_url('patient_management/profile/') }}"><i class="fa fa-angle-right"></i> View</a></li>
				<li><a href="{{ site_url('patient_management/profile/add') }}"><i class="fa fa-angle-right"></i> Add</a></li>
				<li><a href="{{ site_url('patient_management/profile/search') }}"><i class="fa fa-angle-right"></i> Search </a></li>
			</ul>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-stethoscope"></i>
				<span>Providers</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="{{ site_url('provider_management/profile/') }}"><i class="fa fa-angle-right"></i> View</a></li>
				<li><a href="{{ site_url('provider_management/profile/add') }}"><i class="fa fa-angle-right"></i> Add</a></li>
			</ul>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-car"></i>
				<span>Route Sheet</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="{{ site_url('provider_route_sheet_management/route_sheet') }}"><i class="fa fa-angle-right"></i> View</a></li>
				<li><a href="{{ site_url('provider_route_sheet_management/route_sheet/add') }}"><i class="fa fa-angle-right"></i> Add</a></li>
			</ul>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-heartbeat"></i>
				<span>Facilities</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="{{ site_url('home_health_care_management/profile') }}"><i class="fa fa-angle-right"></i> View</a></li>
				<li><a href="{{ site_url('home_health_care_management/profile/add') }}"><i class="fa fa-angle-right"></i> Add</a></li>
			</ul>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-money"></i>
				<span>Payroll</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="{{ site_url('payroll_management/payroll') }}"><i class="fa fa-angle-right"></i> Create</a></li>
			</ul>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-list-alt"></i> <span>Superbill</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
                <li><a href="{{ site_url('superbill_management/annual_wellness/') }}"><i class="fa fa-angle-right"></i> Create</a></li>
				<li><a href="{{ site_url('superbill_management/annual_wellness/') }}"><i class="fa fa-angle-right"></i> Annual Wellness</a></li>
				<li><a href="{{ site_url('superbill_management/home_visits/') }}"><i class="fa fa-angle-right"></i> Home Visits</a></li>
				<li><a href="{{ site_url('superbill_management/facility_visits/') }}"><i class="fa fa-angle-right"></i> Facility Visits</a></li>
				<li><a href="{{ site_url('superbill_management/CPO_485/') }}"><i class="fa fa-angle-right"></i> CPO-485</a></li>
			</ul>
		</li>
		
		<li class="treeview">
			<a href="#">
				<i class="fa fa-users"></i>
				<span>Users</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="{{ site_url('user_management/profile') }}"><i class="fa fa-angle-right"></i> View</a></li>
				<li><a href="{{ site_url('user_management/profile/add') }}"><i class="fa fa-angle-right"></i> Add</a></li>
			</ul>
		</li>
		</ul>
</section>