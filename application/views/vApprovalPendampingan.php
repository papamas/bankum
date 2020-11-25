<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>BanKum - Aplikasi Bantuan Hukum</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url()?>vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url()?>vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
	<style>
    /*Bootstrap modal size iframe*/
	@media (max-width: 1280px){
		.md-dialog  {
			height:630px;
			width:800px;
		}
		.md-body {
			height: 500px;	
		}
	}
	@media screen and (min-width:1281px) and (max-width:1600px){
		.md-dialog  {
			height:700px;
			width:1000px;
		}
		.md-body {
			height: 550px;	
		}
	}
	@media screen and (min-width:1601px) and (max-width:1920px){
		.md-dialog  {
			height:830px;
			width:1200px;
		}
		.md-body {
			height: 700px;	
		}
	}

	
	.md-content {
		/* Bootstrap sets the size of the modal in the modal-dialog class, we need to inherit it */
		width:inherit;
		height:inherit;
		/* To center horizontally */
		margin: 0 auto;
		pointer-events: all;
	}
	
	
	</style>
</head>
<body>
	<?php /* $this->load->view('vLoader') */?>

	<?php $this->load->view('vHeader')?>
	
	<?php $this->load->view('vRsidebar')?>

	<?php $this->load->view('vLsidebar')?>
	
	<div class="mobile-menu-overlay"></div>

		<div class="main-container">
		<div class="pd-ltr-20">
			<!-- Responsive tables Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">						
							<h4 class="text-blue h4">Daftar Approval Surat Perintah Pendampingan Saksi/Ahli</h4>	
							 <?php echo $pesan; ?>
							<form name="frmDaftar" action="<?php echo site_url()?>/approval/pendampingan" method="post">
								<div class="input-group mb-3">								  	
									<div class="input-group-prepend">
										<span class="input-group-text">Filter</span>
									</div>
									<select class="form-control" name="filter">
										<option value=" ">--Silahkan Pilih--</option>
										<option value="1" <?php echo set_select('filter', '1')?>>Nomor</option>
										<option value="2" <?php echo set_select('filter', '2')?>>Kepada</option>
										<option value="3" <?php echo set_select('filter', '3')?>>Untuk</option>
									</select>
									 
									 <input class="form-control" name="find" type="text" value="<?php echo set_value('find')?>" placeholder="Masukan Pencarian" />
									 <button class="btn btn-primary" type="submit"> Tampilkan Data </button>
								</div>												
							</form>			
					</div>
					<div class="table-responsive">
						<table id="tbDaftar" class="table table-striped">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nomor</th>
									<th scope="col">Tahap</th>
									<th scope="col">Kepada</th>
									<th scope="col">Untuk</th>
									<th scope="col">Perintah</th>
								</tr>
							</thead>
							<tbody>
								 <?php $no =1; foreach($penunjukan->result() as $value):?>
								<tr>
									<th scope="row"><?php echo $no?></th>
									<td><?php echo $value->nomor.'<br/>'.$value->tanggal_surat?></td>
									<td><?php echo $value->nama_tahapan?></td>
									<td><?php echo $value->kepada?></td>
									<td><?php echo $value->untuk?></td>
									<td>
									<a style="color:red;"  data-toggle="modal"  data-tooltip="tooltip" data-placement="top" title="Pratinjau Surat" data-target="#fileSurat" data-id="?n=<?php echo $this->myencrypt->encode($value->nomor)?>"><i class="fa fa-eye"></i></a>
									<a style="color:blue;"  data-nomor="<?php echo $this->myencrypt->encode($value->nomor) ?>" data-tooltip="tooltip" data-placement="top"  data-toggle="modal" data-target="#kirimModal" title="Berikan Approval"><i class="fa fa-check"></i></a>
																	
									</td>
								</tr>	
								<?php $no++; endforeach?>	
							</tbody>
						</table>
					</div>
					
				</div>
				<!-- Responsive tables End -->
			
			
			
			<div class="footer-wrap pd-20 mb-20 card-box">
				BanKumApp &copy 2020 Badan Kepegawaian Negara - Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
			</div>
		</div>
	</div>
	
	<div class="modal" id="fileSurat" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog  md-dialog modal-lg">
		  <div class="modal-content md-content">
				<div class="modal-header">
					<h4 class="modal-title" >Pratinjau Surat Pendampingan</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>					
				</div>	
				<div class="modal-body md-body">
					<iframe  id="frame" width="100%" height="100%" frameborder="0" ></iframe>					
				</div>
		  </div>
		</div>
	</div>	
	
	
	<div class="modal fade" id="kirimModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
				    <h5 class="modal-title" id="myModalLabel"><span id="msg"></span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					
				</div>
				<div class="modal-body">				    
					<form id="nfrmKirim">
					   <p class="text text-center"> Anda Yakin,Surat ini akan di Approval ?</p>
					   <input type="hidden" name="nomor"/>	                     					   
					</form>
				 </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" id="nBtnKirim">Ya,Saya Yakin !</button>
				</div>
			</div>
		</div>	
	</div>
	
	
	<!-- js -->
	<script src="<?php echo base_url()?>vendors/scripts/core.js"></script>
	<script src="<?php echo base_url()?>vendors/scripts/script.min.js"></script>
	<script src="<?php echo base_url()?>vendors/scripts/process.js"></script>
	<script src="<?php echo base_url()?>vendors/scripts/layout-settings.js"></script>
	<!-- 
	<script src="<?php echo base_url()?>src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="<?php echo base_url()?>vendors/scripts/dashboard.js"></script>
	!-->
	<script src="<?php echo base_url()?>src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url()?>src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url()?>src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url()?>src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script>	
	$(document).ready(function () {
		
		$('[data-tooltip="tooltip"]').tooltip();	
		
		$('#fileSurat').on('show.bs.modal',function(e) {    		
			var id=  $(e.relatedTarget).attr('data-id');
			var iframe = $('#frame');
			iframe.attr('src', '<?php echo site_url()?>'+'/pendampingan/pratinjauSurat/'+id);			
	    });
		
		$('#kirimModal').on('show.bs.modal',function(e){
			 $('#kirimModal #msg').text('Konfirmasi Approval Pendampingan')
			.removeClass( "text-green")
			.removeClass( "text-blue" ); 
			
			var nomor			=  $(e.relatedTarget).attr('data-nomor');			
			$('#kirimModal input[name=nomor]').val(nomor);
		
		});
		
		$("#nBtnKirim").on("click",function(e){
			e.preventDefault();
			var data = $('#nfrmKirim').serialize();
			
			$('#kirimModal #msg').text('Updating Please Wait.....')
					 .removeClass( "text-green")
					 .addClass( "text-blue" );  
			
			$.ajax({
				type: "POST",
				url : "<?php echo site_url()?>/approval/setuju",
				data: data,
				success: function(r){
					$('#kirimModal #msg').text(r.pesan)
						.removeClass( "text-blue")
						.addClass( "text-green");
					refreshTable();
						
				}, // akhir fungsi sukses
				error : function(r) {				    
					 $('#kirimModal #msg').text(r.responseJSON.pesan)
					 .removeClass( "text-green")
					 .removeClass( "text-blue")
					 .addClass( "text-red" ); 
				}
			});
			return false;
		});
		
		function refreshTable(){						
			$.ajax({   
			    type: 'POST',   
			    url: '<?php echo site_url()?>/approval/getPendampingan',   
			    data: $('form[name=frmDaftar]').serialize(),
			    success: function(res) {
					$("#tbDaftar").html(res);					
				},
			});
		}
		
		
	});	
   </script>	
</body>
</html>