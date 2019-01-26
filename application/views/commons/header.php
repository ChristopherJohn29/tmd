<!-- Logo -->
<a href="{{ site_url('dashboard') }}" class="logo">
	<!-- mini logo for sidebar mini 50x50 pixels -->
	<span class="logo-mini"><b>TMD</b></span>
	<!-- logo for regular state and mobile devices -->
	<span class="logo-lg"><img src="{{ base_url }}dist/img/tmd_logo_white.png"></span>
</a>

<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
	<!-- Sidebar toggle button-->
	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
		<span class="sr-only">Toggle navigation</span>
	</a>
	<!-- Navbar Right Menu -->
	<div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
			
			<li class="dropdown user user-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<span class="hidden-xs">{{ session['user_fullname'] }}</span>
				</a>
				<ul class="dropdown-menu">
					<!-- User image -->
                    <li class="user-header">
                        <p>{{ session['user_fullname'] }}<br>
                        <span>{{ session['user_email'] }}</span>

                        {% if session['user_roleID'] != '1' %}
                        	<span><a href="{{ site_url("account_management/account/edit/#{ session['user_id'] }") }}" title="Manage Account">Manage Account</a></span></p>
                        {% endif %}
                        
                    </li>
					<!-- Menu Footer-->
					<li class="user-footer">
						<div class="pull-left">
							<a href="{{ site_url('authentication/user/logout') }}"><i class="glyphicon glyphicon-off"></i> Sign out</a>
						</div>
					</li>
				</ul>
			</li>
			
		</ul>
	</div>

</nav>