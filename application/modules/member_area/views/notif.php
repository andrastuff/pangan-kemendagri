<script>
	function loadNotif(){
		$.ajax({
					data: "",
					url: ServUrl+"skpd/meta/loadnotif",
                    crossDomain: true,
                    headers: header,
                    method: 'GET',
                    complete: function(response){ 				
                        if(response.status == 200){
							if((response.responseJSON.all_ajuan == 0) && (response.responseJSON.all_laporan == 0)){
								help();
							}
							$('.oprocess').html(0)
							if(parseInt(response.responseJSON.oprocess) >= 1){
							$('.oprocess').html(parseInt($('.oprocess').html()) + response.responseJSON.oprocess);
							$('.alerts').append('<div class="alert bg-danger text-white alert-styled-right alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span>×</span></button><span class="font-weight-semibold">Warning ! </span> anda memiliki '+response.responseJSON.oprocess+' laporan intervensi program yang belum tersimpan.</div>');
							}
							if(parseInt(response.responseJSON.perbaikan_ajuan) >= 1){
							$('.perbaikan_ajuan').html(response.responseJSON.perbaikan_ajuan);
							$('.alerts').append('<div class="alert bg-danger text-white alert-styled-right alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span>×</span></button><span class="font-weight-semibold">Warning ! </span> anda memiliki '+response.responseJSON.perbaikan_ajuan+' perbaikan ajuan intervensi program yang harus segera diselesaikan.</div>');
							}
							if(parseInt(response.responseJSON.perbaikan_laporan) >= 1){
							$('.oprocess').html(parseInt($('.oprocess').html()) + response.responseJSON.perbaikan_laporan);
							$('.alerts').append('<div class="alert bg-danger text-white alert-styled-right alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span>×</span></button><span class="font-weight-semibold">Warning ! </span> anda memiliki '+response.responseJSON.perbaikan_laporan+' perbaikan laporan intervensi program yang harus segera diselesaikan.</div>');
							}
							if(parseInt($('.oprocess').html()) == 0){$('.oprocess').html('')}
						}else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	
	loadNotif();
</script>