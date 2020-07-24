
<?php $this->load->view('navbar_login'); ?>
<style>
.fixed-bg {
    /* The background image */
    background-image: url("<?php echo base_url(); ?>assets/images/web/bg2.jpg");
    /* Set a specified height, or the minimum height for the background image */
    min-height: 500px;
    /* Set background image to fixed (don't scroll along with the page) */
    background-attachment: fixed;
    /* Center the background image */
    background-position: center;
    /* Set the background image to no repeat */
    background-repeat: no-repeat;
    /* Scale the background image to be as large as possible */
    background-size: cover;
	
}

#chart {
    height: 900px; 
   
    margin: 0 auto; 
}

#persediaan, #kebutuhan {
    height: 600px; 
   
    margin: 0 auto; 
}

.loading {
    margin-top: 10em;
    text-align: center;
    color: gray;
}
.page-title h1{
		color: #ffffff;
		text-shadow: 1px 1px 2px #1504bb, 0 0 15px #5600ff, 0 0 5px #6200ff;
	}
</style>
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="<? echo base_url('assets/front/id-all.js')?>"></script>
<!-- Page content -->
	<div class="page-content fixed-bg">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
				<div class="text-center mb-3 py-2 page-title">
					<h1 class="font-weight-semibold mb-1 text-uppercase">Kebutuhan Alat Kesehatan dan Ketahanan Pangan</h1>
					 
				</div>
			 <div class="navbar navbar-expand-lg navbar-light navbar-component rounded mt-3">
							<div class="text-center d-lg-none w-100">
								<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-filter">
									<i class="icon-unfold mr-2"></i>
									Filters
								</button>
							</div>

							<div class="navbar-collapse collapse" id="navbar-filter">
								<span class="navbar-text font-weight-semibold mr-3">
									Filter:
								</span>
								
								<div class="d-flex align-items-center mb-3 mb-sm-0 col-lg-3">
									 
										<select name="uraian" class="years form-control form-control-lg">
										</select>
									
								</div>
								
								
								<div class="d-flex align-items-center mb-3 mb-sm-0 col-lg-3">
									<select name="bulan" class="form-control form-control-md">
										<option value="Januari"  class="text-danger" disabled> Januari </option>
										<option value="Februari"  class="text-danger" disabled> Februari </option>
										<option value="Maret"  class="text-danger" disabled> Maret </option>
										<option value="April"> April </option>
										<option value="Mei"> Mei </option>
										<option value="Juni"> Juni </option>
										<option value="Juli"> Juli </option>
										<option value="Agustus"> Agustus </option>
										<option value="September"> September </option>
										<option value="Oktober"> Oktober </option>
										<option value="November"  class="text-danger" disabled> November </option>
										<option value="Desember"  class="text-danger" disabled> Desember </option>
									</select>
								</div>

							
							</div>
			</div>
			<div class="card bg-dark">
				<div class="card-body">
					 
						<div id="persediaan"></div>
					 
				</div>
			</div>
			
			<div class="card bg-dark">
				<div class="card-body">
					 
						
						<div id="kebutuhan"></div>
					 
				</div>
			</div>
			<div class="card bg-dark">
				<div class="card-body">
					 
						
						<div id="chart"></div>
					 
				</div>
			</div>
			</div>
			<!-- /content area -->
		</div>
		<!-- /main content -->

	</div>
 

<script>
var param = 'dashboard';
var sub = "member_area/";
function loadPerlengkapan(){
		$.ajax({
					data: {},
					url: ServUrl+sub+param+"/list_perlengkapan",
                    
                    method: 'GET',
                    complete: function(response){                
						if(response.status == 200){
							var toAppend = '';
								
								$.each(response.responseJSON.data, function( key, val ) {
										toAppend +='<option value=' + val.uraian + '>' + val.uraian + '</option>';
								});
							$('select[name=uraian]').html(toAppend);
							loadData();
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	}
	loadPerlengkapan();
	
	
	function loadData(){
		
		var uraian =  $("select[name=uraian] option:selected").html();
		var m =  $("select[name=bulan]").val();
		$('.title').html(" - "+$("select[name=uraian] option:selected").html());
		var url =  ServUrl+sub+param+"/list", data =  
	$.ajax({
					data: {"uraian" : uraian, "bulan" : m},
					url: ServUrl+"report/lists/kebutuhan_penanganan_covid_provinsi",
                    
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 200){
							 
								rendersPersediaan(response.responseJSON.data);
								rendersKebutuhan(response.responseJSON.data);
								rendersChart(response.responseJSON.data);
							$('#api').html(url+'?uraian='+uraian+'&bulan='+m);
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	
	function rendersPersediaan(data){
	
		var datas = [];
		var satuan = []; 
		$.each(data, function(d,i){
			datas.push([i.id_maps, i.persediaan]);
			satuan.push(i.satuan);
		  });
		    
		// Create the chart
		Highcharts.mapChart('persediaan', {
			chart: {
				map: 'countries/id/id-all'
			},

			title: {
				text: "Data Persediaan "+$('select[name=uraian] option:selected').html()
			},

			subtitle: {
				text: 'Bulan '+$('select[name=bulan] option:selected').html()
			},

			mapNavigation: {
				enabled: true,
				buttonOptions: {
					verticalAlign: 'bottom'
				}
			},

			colorAxis: {
				min: 0
			},

			series: [{
				data: datas,
				name: 'Jumlah Persediaan '+$('select[name=uraian] option:selected').html(),
				states: {
					hover: {
						color: '#BADA55'
					}
				},
				dataLabels: {
					enabled: true,
					format: '{point.name}'
				},
                tooltip: {
                    valueSuffix: " "+satuan[0]
                }
			}],
			credits: {
				enabled: false
			}
		});
		
	}	
	
	function rendersKebutuhan(data){
	 
		var datas = [];
		var satuan = []; 
		$.each(data, function(d,i){
			datas.push([i.id_maps, i.kebutuhan]);
			satuan.push(i.satuan);
		});
		  
		// Create the chart
		Highcharts.mapChart('kebutuhan', {
			chart: {
				map: 'countries/id/id-all'
			},

			title: {
				text: "Data Kebutuhan "+$('select[name=uraian] option:selected').html()
			},

			subtitle: {
				text: 'Bulan '+$('select[name=bulan] option:selected').html()
			},

			mapNavigation: {
				enabled: true,
				buttonOptions: {
					verticalAlign: 'bottom'
				}
			},

			colorAxis: {
				min: 0
			},

			series: [{
				data: datas,
				name: 'Jumlah Kebutuhan '+$('select[name=uraian] option:selected').html(),
				states: {
					hover: {
						color: '#BADA55'
					}
				},
				dataLabels: {
					enabled: true,
					format: '{point.name}'
				},
                tooltip: {
                    valueSuffix: " "+satuan[0]
                }
			}],
			credits: {
				enabled: false
			}
		});
		
	}
	
    function rendersChart(data){
		
		var index = [];
		var persediaan = [];
		var kebutuhan = [];
		var series = [];	
		var satuan = [];	
		 $.each(data, function(d,i){

			persediaan.push(parseInt(i.persediaan));
			kebutuhan.push(parseInt(i.kebutuhan));
			index.push(i.instansi);
			satuan.push(i.satuan); 
			 
		  });
	 
		series.push({"name" : "Persediaan", "data" : persediaan});
		series.push({"name" : "Kebutuhan", "data" : kebutuhan});
		
		 
		// Create the chartc
		
		Highcharts.chart('chart', {
			chart: {
				type: 'bar'
			},
			title: {
				text: "Chart Persediaan dan Kebutuhan "+$('select[name=uraian] option:selected').html()
			},
			subtitle: {
				text: 'Bulan '+$('select[name=bulan] option:selected').html()
			},
			xAxis: {
				categories: index,
				title: {
					text: null
				}
			},
			yAxis: {
				min: 0,
				title: {
					text: " "+satuan[0],
					align: 'high'
				},
				labels: {
					overflow: 'justify'
				}
			},
			tooltip: {
				valueSuffix: " "+satuan[0]
			},
			plotOptions: {
				bar: {
					dataLabels: {
						enabled: true
					}
				}
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'top',
				x: -40,
				y: 80,
				floating: true,
				borderWidth: 1,
				backgroundColor:
					Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
				shadow: true
			},
			credits: {
				enabled: false
			},
			series: series
		});
		
	}
	
    	// Load the fonts
	Highcharts.createElement('link', {
		href: 'https://fonts.googleapis.com/css?family=Signika:400,700',
		rel: 'stylesheet',
		type: 'text/css'
	}, null, document.getElementsByTagName('head')[0]);
	// Add the background image to the container
	Highcharts.addEvent(Highcharts.Chart, 'afterGetContainer', function () {
		// eslint-disable-next-line no-invalid-this
		this.container.style.background =
			'url(https://www.highcharts.com/samples/graphics/sand.png)';
	});
	Highcharts.theme = {
		colors: ['#f45b5b', '#8085e9', '#8d4654', '#7798BF', '#aaeeee',
			'#ff0066', '#eeaaee', '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
		chart: {
			backgroundColor: null,
			style: {
				fontFamily: 'Signika, serif'
			}
		},
		title: {
			style: {
				color: 'black',
				fontSize: '16px',
				fontWeight: 'bold'
			}
		},
		subtitle: {
			style: {
				color: 'black'
			}
		},
		tooltip: {
			borderWidth: 0
		},
		labels: {
			style: {
				color: '#6e6e70'
			}
		},
		legend: {
			backgroundColor: '#E0E0E8',
			itemStyle: {
				fontWeight: 'bold',
				fontSize: '13px'
			}
		},
		xAxis: {
			labels: {
				style: {
					color: '#6e6e70'
				}
			}
		},
		yAxis: {
			labels: {
				style: {
					color: '#6e6e70'
				}
			}
		},
		plotOptions: {
			series: {
				shadow: true
			},
			candlestick: {
				lineColor: '#404048'
			},
			map: {
				shadow: false
			}
		},
		// Highstock specific
		navigator: {
			xAxis: {
				gridLineColor: '#D0D0D8'
			}
		},
		rangeSelector: {
			buttonTheme: {
				fill: 'white',
				stroke: '#C0C0C8',
				'stroke-width': 1,
				states: {
					select: {
						fill: '#D0D0D8'
					}
				}
			}
		},
		scrollbar: {
			trackBorderColor: '#C0C0C8'
		}
	};
	// Apply the theme
	Highcharts.setOptions(Highcharts.theme);


	$('select[name=uraian]').change(function(){
		loadData();
	});
	
	$('select[name=bulan]').change(function(){
		loadData();
	});
</script>