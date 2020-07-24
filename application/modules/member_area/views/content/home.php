<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<?php $this->load->view('sidebar') ?>

		<!-- Main content -->
		<div class="content-wrapper">
		 
			<!-- Content area -->
			<div class="content">
				<div class="row">
					<div class="col-sm-6 col-xl-4">
						<div class="card card-body bg-indigo-800 has-bg-image">
							<div class="media">
								<div class="mr-3 align-self-center"> 
									<i class="icon-enter6 icon-3x opacity-75"></i>
									<span class="text-uppercase font-size-xs ml-2">Ketahanan Pangan</span>
									<a href="<?php echo base_url('member_area/data_ketahanan_pangan'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Input Data<b><i class="icon-spinner4 spinner"></i></b></a>
								</div>
							</div>
						</div>
					</div>
				
				</div>
			</div>
			<!-- /main content -->
		</div>
		<!-- /content area -->

<?php $this->load->view('footer') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/PrintArea/2.4.1/jquery.PrintArea.min.js"></script>
<script>

</script>