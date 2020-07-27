<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<?php $this->load->view('sidebar') ?>
	<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/demo_pages/picker_date.js"></script>
	
	<style>
	.daterangepicker{ z-index:99999 !important; }
	</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script> 
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script> 

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
			<span id="alert"></span>
				<!-- Basic responsive configuration -->
				<div class="card">
					<div class="card-header mb-4 header-elements-inline">
						<h5 class="card-title"><?php echo $halaman; ?> <span class="title"></span></h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                	 
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">
							<div class="card-body row d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap">
								<div class="d-flex align-items-center mb-3 mb-sm-0 col-lg-10">
									
								</div>
								<div class="float-right pull-right">
									<div class="btn-group dropleft">
										<button type="button" class="btn bg-teal dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Drop menu</button>
										<div class="dropdown-menu dropdown-menu-right" x-placement="left-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-2px, 0px, 0px);">
											<div class="dropdown-header">Options</div>
											<a onclick="loadData()" class="dropdown-item"><i class="icon-reload-alt"></i> Reload</a>
											<a onclick="pdf()" class="dropdown-item"><i class="icon-screen-full"></i> Print</a>
											<a onclick="excel()" class="dropdown-item"><i class="icon-file-excel"></i> Excel</a>
										</div>
									</div>
								</div>
							</div>							
							<div class="card-body row d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap">
								<div class="d-flex align-items-center mb-3 mb-sm-0 col-lg-3">
									<label class="col-form-label col-lg-4">Instansi</label>
										<input class="form-control" name="instansiname" type="text" value="<?php if($this->session->userdata('instansi')){echo $this->session->userdata('instansi');} ?>" disabled>
										<input name="instansiid" type="hidden" value="<?php if($this->session->userdata('id')){echo $this->session->userdata('id');} ?>">
										 
									
								</div>
								 
								<div class="d-flex align-items-center mb-3 mb-sm-0 col-lg-3">
									<label class="col-form-label col-lg-4">Bulan</label>
									<select name="bulan" class="form-control form-control-md">
										<option value="01" <?php if(date('m')=='01'){ echo 'selected="selected"' ; }?>>Januari</option>
										<option value="02" <?php if(date('m')=='02'){ echo 'selected="selected"' ; }?>>Februari</option>
										<option value="03" <?php if(date('m')=='03'){ echo 'selected="selected"' ; }?>>Maret</option>
										<option value="04" <?php if(date('m')=='04'){ echo 'selected="selected"' ; }?>>April</option>
										<option value="05" <?php if(date('m')=='05'){ echo 'selected="selected"' ; }?>>Mei</option>
										<option value="06" <?php if(date('m')=='06'){ echo 'selected="selected"' ; }?>>Juni</option>
										<option value="07" <?php if(date('m')=='07'){ echo 'selected="selected"' ; }?>>Juli</option>
										<option value="08" <?php if(date('m')=='08'){ echo 'selected="selected"' ; }?>>Agustus</option>
										<option value="09" <?php if(date('m')=='09'){ echo 'selected="selected"' ; }?>>September</option>
										<option value="10" <?php if(date('m')=='10'){ echo 'selected="selected"' ; }?>>Oktober</option>
										<option value="11" <?php if(date('m')=='11'){ echo 'selected="selected"' ; }?>>November</option>
										<option value="12" <?php if(date('m')=='12'){ echo 'selected="selected"' ; }?>>Desember</option>
									</select>
								</div>
								<div class="d-flex align-items-center mb-3 mb-sm-0 col-lg-3">
									<label class="col-form-label col-lg-4">Tahun</label>
									<?php $start = 2018; $end = date('Y')+2;?>
									<select name="tahun" class="form-control form-control-md">
										<?php for($i=$start; $i<=$end; $i++) { ?>
										<option value="<?php echo $i; ?>" <?php if(date('Y') == $i){ echo 'selected'; } ?>><?php echo ucwords($i); ?></option>
										<?php } ?>
									</select>
								</div>
								
							</div>
					<div class="table-responsive">
					
					<table class="table table-bordered table-condensed table-hover" id="table" width="100%">
										<thead>
											<tr>
												<th colspan="7" class="t-title text-center" id="table-title">Laporan Harga Pangan di Pasar <span class="title"></span></th>
											</tr>
											<tr>
												<th rowspan="2" class="t-no">No.</th>
												<th rowspan="2" class="t-commodity">Komoditi</th>
												<th class="title-periode text-center" id="header-periode" colspan="2"></th>
												 
											</tr>
											<tr id="list-date"></tr>
										</thead>
										<tbody>
											
										</tbody>
									</table><div class="loader text-center mt-5 mb-5"></div>
									</div>
					</div>
				</div>
				<!-- /basic responsive configuration -->
			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->
		 <!-- Custom background color -->
				
				<div id="modal_open" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title"><span id="title-open"></span></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<input name="param" type="hidden" value=""/>
							<form id="form-open" action="#">
							 
							<input name="komoditi_id" type="hidden" placeholder="" class="form-control">
							<input name="instansi" type="hidden" placeholder="" class="form-control">
							<div class="modal-body">
							<div class="alert bg-info text-white">
									 
									<span class="font-weight-semibold"></span> <span id="name-open"></span>.
							</div>
							<div class="form-group">
								<div class="row">
									<label class="col-form-label col-md-3">Tanggal</label>
									<div class="col-lg-8">
										<input name="period_start" id="tanggal" type="text" class="form-control daterange-single" value="<?php echo date("Y-m-d"); ?>" >
																
									</div>
								</div>
							</div>
							 <div class="form-group">
										<div class="row">
											<label class="col-form-label col-md-3">Harga</label>
											<div class="col-md-8">
												<input name="harga" type="number" placeholder="Harga" class="form-control">
											</div>
										</div>
							 </div>
							 <div class="form-group">
										<div class="row">
											<label class="col-form-label col-md-3">Ketersediaan</label>
											<div class="col-md-8">
												<label></label>
												<input name="ketersediaan" type="number" placeholder="Ketersediaan" class="form-control">
											</div>
										</div>
							 </div>
							 <div class="form-group">
										<div class="row">
											<label class="col-form-label col-md-3">Kebutuhan</label>
											<div class="col-md-8">
												<label></label>
												<input name="kebutuhan" type="number" placeholder="Kebutuhan" class="form-control">
											</div>
										</div>
							 </div>
							 <div class="form-group">
										<div class="row">
											<label class="col-form-label col-md-3">Hambatan</label>
											<div class="col-md-8">
												<label></label>
												<select id="multiselect" name="hambatansInput[]" class="form-control multiselect" multiple>
													 
												</select>
											</div>
										</div>
							 </div>
							 <div class="form-group">
										<div class="row">
											<label class="col-form-label col-md-3">Keterangan</label>
											<div class="col-md-8">
												<label></label>
												<textarea name="keterangan" type="text" placeholder="Keterangan" class="form-control"></textarea>
											</div>
										</div>
							 </div>
							</div>
							
							<div class="modal-footer ">
								<div id="btndelete"></div> 
								<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn bg-teal-600">Save changes</button>
							</div>
							</form>
						</div>
					</div>
				</div>
				
				<!-- /custom background color -->
				
<?php $this->load->view('footer') ?>
<input class="form-control" name="instansiname" type="hidden" value="" disabled>
<script>
$('body').addClass('sidebar-xs');

		$.ajaxSetup({
		 
		});
		
	function romanize(num) {
	  var lookup = {M:1000,CM:900,D:500,CD:400,C:100,XC:90,L:50,XL:40,X:10,IX:9,V:5,IV:4,I:1},roman = '',i;
	  for ( i in lookup ) {
		while ( num >= lookup[i] ) {
		  roman += i;
		  num -= lookup[i];
		}
	  }
	  return roman;
	}
	
	var param = window.location.pathname.split('/').pop();
	var sub = "trn-report/";
	
	
		var month_names = new Array();
		month_names[0] = 'Januari';
		month_names[1] = 'Februari';
		month_names[2] = 'Maret';
		month_names[3] = 'April';
		month_names[4] = 'Mei';
		month_names[5] = 'Juni';
		month_names[6] = 'Juli';
		month_names[7] = 'Agustus';
		month_names[8] = 'September';
		month_names[9] = 'Oktober';
		month_names[10] = 'November';
		month_names[11] = 'Desember';

	Number.prototype.formatMoney = function(c, d, t){
		var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
		return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
	};
		
	today = new Date();
	initCompleteCommodity = false;
	initCompleteYear = false;

	function getLastDateOfMonth(month, year){
		if(today.getMonth()+1 == month && today.getFullYear() == year){
			return today.getDate();
		}
		return (new Date(year, month, 0)).getDate();
	}

	function getCurrentMonth(){
		return today.getMonth()+1;
	}

	function getCurrentYear () {
		return today.getFullYear();
	}
	
	$.extend( $.fn.dataTable.defaults, {
			paging: false,
            autoWidth: false,
			dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ipB>', 	
			buttons: ['copy',
            'excel',
            'csv',
            'pdf'],
            language: {
                search: '<span>Search by Name:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
        });
		
	function loadHambatan(){
		$.ajax({
					data: "",
					url: ServUrl+"dropdown/list-hambatan-group",
                    method: 'GET',
                    complete: function(response){                
						if(response.status == 200){
							var toAppend = '';
								 
								$.each(response.responseJSON, function( key, val ) {
										toAppend +='<optgroup label="'+val.name+'">';
										$.each(val.mstHambatans, function( x, y ) {
											toAppend +='<option value=' + y.id + '>' + y.name + '</option>';
										});
										toAppend +='</optgroup>';
								});
							$('#multiselect').html(toAppend);
							$('#multiselect').multiselect();  
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	}
	
	function loadData(){
		$('#table tbody').html('');
		var m = $('select[name=bulan]').val();
		var y = $('select[name=tahun]').val();
		var instansi = $('input[name=instansiid]').val();

		var monthName = month_names[m-1];;
		lastDate = getLastDateOfMonth(m, y);

		$('#header-periode').attr('colspan',lastDate);
		$('#table-title').attr('colspan',lastDate + 5);
		$('.title-periode').html(monthName + ' ' + y);

		var listDate = '';
		for(var d = 1; d <= lastDate; d++){
			listDate += "<th class='t-price'>"+d+"</th>";
		}

		$('#list-date').html(listDate);
		
		$.ajax({
			type: "GET",
			data: {"ym" : y+"-"+m},
			headers: {
				accept: 'application/json',
				Authorization: 'Bearer <?php echo $this->session->userdata('auth_key'); ?>',
			},
			url: ServUrl+sub+"komoditi-table",
			complete:function(response){
				if(response.status == 200){
					if ( $.fn.dataTable.isDataTable( '#table' ) ) {
							table = $('#table').DataTable().destroy();
							
						}
					var tbody = '';
					var no = 0;

					$.each(response.responseJSON.data, function(k,v){
						no++;
						tbody += '<tr class="small">';
						tbody += "<td>"+no+".</td>";
						tbody += '<td class="text-left"><a class="add btn btn-sm clearfix" data-id="'+v.id+'" data-instansi="'+instansi+'" data-komoditi="'+v.komoditi+'"><b>'+v.komoditi+' ('+v.satuan+')</b></a></td>';
						if(v.series != null){
						for(var d = 1; d <= lastDate; d++){
							var price = v.series[d];
							if(price == undefined){
								tbody += '<td><span class="label text-danger small"><i class="icon-cross"></i></span></td>';	
							}else{
								
								tbody += '<td class="text-right"><a class="open btn list-icons-item" data-instansi="'+instansi+'" data-id="'+v.id+'" data-date="'+y+'-'+m+'-'+(d < 10? '0' : '') + d+'" data-komoditi="'+v.komoditi+'">'+price+'</a></td>';
								
							}
						}
						}
						 
						tbody += "</tr>";
					
					});

					$('#table tbody').html(tbody);
							table = $('#table').DataTable( {
								 
								retrieve: true, 
								responsive: true,
							} );
						 
					loadHambatan();	
				} else {
					$('#table tbody').html('');
				}

			},
			dataType:'json'
		});
		 
	}
	 
	
	$(document).ajaxComplete(function(){ 
		var m = parseInt($('select[name=bulan]').val());
		var y = $('select[name=tahun]').val();
		
		$( ".add" ).off('click').on( "click", function() {
			$('#multiselect').multiselect("deselectAll", false).multiselect("refresh");
			$('#modal_open').find('#form-open')[0].reset();
			
			$(this).addClass("btn-outline-primary");
				var id = $(this).data("id");
				var instansi = $(this).data("instansi");
				var komoditi = $(this).data("komoditi");
				$("input[name=param]").val("create");
				$("input[name=komoditi_id]").val(id);
				$("input[name=instansi]").val(instansi);
				
				$('#title-open').html('Update Harian per Bulan '+month_names[m-1]+' '+y);
					
				 
				$('#name-open').html("Komoditi "+komoditi);
				$("#modal_open").modal("show");
			
		});
		 
		$( ".open" ).off('click').on( "click", function(event) {
			event.preventDefault();
			$('#multiselect').multiselect("deselectAll", false).multiselect("refresh");
			$('#modal_open').find('#form-open')[0].reset();
			
			
			$(this).addClass("btn-outline-primary");
			var id 	= $(this).data("id");
			var instansi = $('input[name=instansiid]').val();
			var date = $(this).data("date");
			var komoditi = $(this).data("komoditi");
			$.ajax({
				type: "GET",
				data: "",
				headers: {
					accept: 'application/json',
					Authorization: 'Bearer <?php echo $this->session->userdata('auth_key'); ?>',
				},
				url: ServUrl+sub+"detail/"+id+"/"+instansi+"/"+date,
				complete:function(response){
					if(response.status == 200){
						var data = response.responseJSON; 
						var id = data.id; 
						 
						   
						$("input[name=param]").val("update/"+id);
						$("input[name=komoditi_id]").val(data.komoditi_id);
						$("input[name=instansi]").val(data.provinsi_id);
						$("input[name=period_start]").val(data.period_end);
						$("input[name=harga]").val(parseInt(data.harga));
						$("input[name=ketersediaan]").val(parseInt(data.ketersediaan));
						$("input[name=kebutuhan]").val(parseInt(data.kebutuhan));
						 
							$.each(data.hambatans, function(x,y){
								  
								 $('option[value="'+y.id+'"]', $('#multiselect')).attr('selected', 'selected');
								 
							});
							
						$('#multiselect').multiselect('rebuild'); 
						
						$("textarea[name=keterangan]").val(data.keterangan);
						
						$('#title-open').html('Data Harian per Bulan '+month_names[m-1]+' '+y);
							
						if(id){
						$('#btndelete').html('<a onclick="remove('+id+')" class="btn bg-transparent text-danger border-danger ml-1"><i class="icon-bin"></i> Remove</a>');		
						}
						$('#name-open').html("Komoditi "+komoditi);
						$("#modal_open").modal("show");
					}
				}
			});
			
		});
	});
	
	$("#form-open").submit(function(event) {
		event.preventDefault();
			var param =  $("input[name=param]").val();
			
			 
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, save it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function (result) {
				if(result.value == true){
				$("#modal_open").modal("hide");
				$.ajax({
							data: $('#form-open').serialize(),
							url: ServUrl+sub+param,
							headers: {
								accept: 'application/json',
								Authorization: 'Bearer <?php echo $this->session->userdata('auth_key'); ?>',
							},
							type: 'POST',
							complete: function(response){                
							  if(response.status == 200){
								 
								  swal({
										title: response.status+' Saved!',
										text: "success",
										type:'success',
										onClose: function () {
										loadData();
										}
									}); 
							  }else if(response.status == 401){
								e('info','401 server conection error');
							  }else if(response.status == 403){
								    swal({
										title: response.status+' Aborted!',
										text: "error",
										type:'warning',
										onClose: function () {
										loadData();										
										}
									}); 
									 
							  }else{
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
									}); 
									 
							  }
							},
							dataType:'json'
				})
				}
				if (result.dismiss == 'cancel') {
					 swal({
							title: ' Cancelled',
							text: 'Your imaginary file is safe :)',
							type:'error',
					}); 
                   
                }
            });
			
	});
	
	
	function remove(id){
	          swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, remove it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function (result) {
				if(result.value == true){
				$("#modal_open").modal("hide");
				$.ajax({
							data: "",
							url: ServUrl+sub+"delete/"+id,
							headers: {
								accept: 'application/json', 
								Authorization: 'Bearer <?php echo $this->session->userdata('auth_key'); ?>',
							},
							method: 'POST',
							complete: function(response){                
							  if(response.status == 200){
								  
								  swal({
										title: response.status+' Removed!',
										text:'success',
										type:'success',
										onClose: function () {
										loadData();
										}
									}); 
							  }else if(response.status == 401){
								e('info','401 server conection error');
							  }else if(response.status == 403){
								    swal({
										title: response.status+' Aborted!',
										text:'warning',
										type:'warning',
										onClose: function () {
										loadData();										
										}
									}); 
									 
							  }else{
								    swal({
										title: response.status+' Aborted!',
										text:'warning',
										type:'warning',
									}); 
									 
							  }
							},
							dataType:'json'
				})
				}
				
				if (result.dismiss == 'cancel') {
					 swal({
							title: ' Cancelled',
							text: 'Your imaginary file is safe :)',
							type:'error',
					}); 
                   
                }
            });
	
	}
	
	
	$('select[name=bulan]').change(function(){
		loadData();
		 
	});
	
	$('select[name=tahun]').change(function(){
		loadData();
	});
	
	function reload() {
		
		loadData();
		 
	};

	loadData();
</script>

<input name="title" type="hidden" placeholder="" value="<?php echo $halaman; ?>">
<?php $this->load->view('print') ?>