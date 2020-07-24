<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $meta['judul'];?></title>
	<link rel="icon" type="image/png/vnd.microsoft.icon" href="<?php echo base_url('assets/images/web/'.$meta['logo']); ?>" />

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin'); ?>/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin'); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin'); ?>/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin'); ?>/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin'); ?>/css/components2.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin'); ?>/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin'); ?>/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?php echo base_url('assets/admin'); ?>/js/main/jquery.min.js"></script>
	<script src="<?php echo base_url('assets/admin'); ?>/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/loaders/blockui.min.js"></script>
	<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/ui/ripple.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/notifications/noty.min.js"></script>
	<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/forms/validation/validate.min.js"></script>
	<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/forms/styling/uniform.min.js"></script>
	 
	<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/ui/prism.min.js"></script>
	<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/notifications/sweet_alert.min.js"></script>
	<script src="<?php echo base_url('assets/admin'); ?>/js/app.js"></script>
	 
	<script src="<?php echo base_url('assets/admin'); ?>/js/demo_pages/navbar_multiple.js"></script>

	<!-- /theme JS files -->
	
	<script>var BaseUrl = '<?php echo base_url(); ?>'; var ServUrl = 'http://pangan_beapi.perspektifindonesia.com/';</script>
</head>
<body>
<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
	<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				 
			</button>
		</div>


		<div class="collapse navbar-collapse" id="navbar-mobile">
			<i class="icon-spinner2 text-danger spinner d-none d-lg-block"></i><span class="ml-md-1 mr-md-auto text-muted d-none d-lg-block"><?php echo $meta['footer'];?></span>

			<ul class="navbar-nav">
				<li class="nav-item dropdown d-none d-lg-block">
					<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
						<i class="icon-info3"></i>
						<span class="d-md-none ml-2">Users</span>
					</a>
					
					<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-300">
						<div class="dropdown-content-header">
							<span class="font-weight-semibold">About Us</span>
							 
						</div>

						<div class="dropdown-content-body dropdown-scrollable">
							<ul class="media-list">
								<li class="media">
									 
									<div class="media-body">
										 
										<span class="d-block text-muted font-size-sm"><?php echo $meta['deskripsi'];?></span>
									</div>
									 
								</li>
							</ul>
						</div>
 
					</div>
				</li>
				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
						<i class="icon-menu3 mr-1"></i>MENU
					</a>
					
					<div class="dropdown-menu dropdown-menu-right bg-dark">
						<a href="<?php echo base_url(); ?>" class="dropdown-item"><i class="icon-home4"></i>Beranda</a>
						<div class="dropdown-divider"></div>
						<a href="<?php echo base_url("root"); ?>" class="dropdown-item"><i class="icon-diff-renamed mr-3"></i>Login</a>
						
						 
					</div>
				</li>
			</ul>
		</div>
	</div>
	
	<script>
	Noty.overrideDefaults({
            theme: 'limitless',
            layout: 'topRight',
            type: 'alert',
            timeout: 2500
        });
		
	function e(type, text){
		 new Noty({
						text: text,
						type: type,
						modal: true
					}).show();
 
	}
	 var setCustomDefaults = function() {
            swal.setDefaults({
                buttonsStyling: false,
				allowOutsideClick: false,
				reverseButtons: true,
				background: '#fff url(<?php echo base_url('assets/admin'); ?>/images/backgrounds/seamless.png) repeat',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-light'
            });
        }
        setCustomDefaults();
		var header = "";
		
		
	</script>