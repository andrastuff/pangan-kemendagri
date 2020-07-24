<?php $this->load->view('navbar_login'); ?>
<style>
.fixed-bg {
    /* The background image */
    background-image: url("<?php echo base_url('assets/images/web/bg1.jpg'); ?>");
    /* Set a specified height, or the minimum height for the background image */
    //min-height: 500px;
    /* Set background image to fixed (don't scroll along with the page) */
    background-attachment: fixed;
    /* Center the background image */
    background-position: center;
    /* Set the background image to no repeat */
    background-repeat: no-repeat;
    /* Scale the background image to be as large as possible */
    background-size: cover;
	
}
</style>
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
					signOut()
	}
</script>
<!-- Page content -->
	<div class="page-content fixed-bg">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login card -->
				<form id="form-login" method="post" class="login-form form-validate" action="<?php echo base_url("root/auth_login"); ?>">
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3"><br>
								 
								<h5 class="mb-0 h2 text-success"> <br></h5>
								 
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" class="form-control" name="email" placeholder="Username" required>
								<div class="form-control-feedback">
									<i class="icon-user text-orange-800"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" class="form-control" name="password" placeholder="Password" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-orange-800"></i>
								</div>
							</div>

							
							<div class="form-group">
								<button type="submit" class="btn bg-purple btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
							</div>

							
							<span class="form-text text-center text-muted">By continuing, you're confirming that you've read our <a href="<?php echo base_url('root/terms'); ?>">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a>
							<small class="mt-2"><br>Developed &amp; Designed by: <a href="http://facebook.com/dye.ard" target="_blank">Andrastuff</a></small>
							</span>
						</div>
					</div>
				</form>
				<!-- /login card -->
				
				

			</div>
			<!-- /content area -->
		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
	 
	<script>
	$(document).ready(function () { 
	$("#form-logins").submit(function(event) {
		event.preventDefault();
		 var datas = $(this).serialize(); 
		 var data = $(this).serializeArray(); 
		 var data = JSON.stringify([
            {email: data[0].value, password: data[1].value}
			]);


				$.ajax({
							data: datas,
							url: ServUrl+"site/login",
							method: 'POST', 
							complete: function(response){                
								if(response.status == 200){
									console.log(response.responseJSON.user);
									document.cookie = "access_token = "+response.responseJSON.user.auth_key;
									window.location.replace(BaseUrl+'admin/'); 
									 new Noty({
											text: response.data.status,
											type: 'warning',
											modal: true
										}).show();
								}else{
									//window.location.reload();
								}
							},
							 
							dataType:'json'
				})
				 
	});
	});
	<?php if($this->session->flashdata('error')){ ?>
	e("error",<?php echo json_encode($this->session->flashdata('error')); ?>);
	<?php } ?>
</script>