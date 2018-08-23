<header class="main-header">
	<!-- Logo -->
	<a href="<?=base_url('resource');?>/index2.html" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>PCIP</b></span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>CI CRUD</b> product</span>
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>

		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?=base_url('resource');?>/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
						<span class="hidden-xs"><?=$this->ss->User_Name?></span>
					</a>
					<ul class="dropdown-menu" style="width:auto!important">

						<!-- Menu Footer-->
						<li class="user-footer">
							<a href="<?=base_url('/Logout')?>" class="btn btn-danger btn-flat btn-block"><span style="color:white">Sign out</span>	</a>
						</li>
					</ul>
				</li>
				<!-- Control Sidebar Toggle Button -->
				<li>
					<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
				</li>
			</ul>
		</div>
	</nav>
</header>
