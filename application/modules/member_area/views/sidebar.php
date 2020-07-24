	<style>
	.sidebar-user-material .sidebar-user-material-body {
    background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/data.jpeg) center center no-repeat;
    background-size: cover;
	}
	.text-shadow-dark {
    text-shadow: 0 0 0.1875rem rgb(0, 0, 0);
	}
	.page-title h4{
		color: #ffffff;
		
		text-shadow: 1px 1px 2px red, 0 0 25px red, 0 0 5px red;
	}
	</style>	 
			<!-- Page content -->
	<div class="page-content pt-0 fixed-bg">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark bg-blue-800 sidebar-main sidebar-expand-md align-self-start">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				<span class="font-weight-semibold">Main sidebar</span>
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user-material">
					<div class="sidebar-user-material-body card-img-top">
						<div class="card-body text-center">
							<a href="#">
								<img src="#" class="img-fluid rounded-circle shadow-2 mb-3" width="80" height="80" alt="">
							</a>
							<h6 class="mb-0 text-white text-shadow-dark"><?php echo $this->session->userdata('name'); ?></h6>
							<span class="font-size-sm text-white text-shadow-dark"><?php echo $this->session->userdata('alamat'); ?></span>
						</div>
													
						<div class="sidebar-user-material-footer">
							<a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>My account</span></a>
						</div>
					</div>

					<div class="collapse" id="user-nav">
						<ul class="nav nav-sidebar">
							<li class="nav-item">
								<a href="<?php echo base_url('member_area/profile'); ?>" class="nav-link">
									<i class="icon-user-plus"></i>
									<span>My profile</span>
								</a>
							</li>
							<li class="nav-item">
								<a onClick="signOut()" class="nav-link">
									<i class="icon-switch2"></i>
									<span>Logout</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /user menu -->

				
				<div class="card card-sidebar-mobile">
				<div class="card-body p-0">
						<ul class="nav nav-sidebar" data-nav-type="accordion">
							<li class="nav-item" data-popup="tooltip" title="" data-original-title="Dashboard" data-placement="right" id="right"><a href="<?php echo base_url('member_area/'); ?>" class="nav-link <?php if(!$this->uri->segment(2)){ echo "active"; } ?>"><i class="icon-home4"></i><span>Dashboard Home</span></a></li>
							 
						</ul>
						</div>
					<div class="card-header header-elements-inline">
						<h6 class="card-title">Form Input Data</h6>
						<div class="header-elements">
							<div class="list-icons">
								<a class="list-icons-item" data-action="collapse"></a>
							</div>
						</div>
					</div>

					<div class="card-body p-0">
						
						<ul class="nav nav-sidebar" data-nav-type="accordion">
							<li class="nav-item" data-popup="tooltip" title="" data-original-title="Ketahanan Pangan" data-placement="right" id="right"><a href="<?php echo base_url('member_area/data_ketahanan_pangan'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'data_ketahanan_pangan'){ echo "active"; }; ?>"><i class="icon-file-spreadsheet"></i> <span>Ketahanan Pangan</span></a></li>
						</ul>
						
					</div>
				</div>
				<!-- /navigation -->
				

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->

			
			
			 
				
					
			 
			