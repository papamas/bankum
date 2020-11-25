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
			<!-- Responsive tables Start !-->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">						
							<h4 class="text-blue h4">Daftar Surat Permintaan Saksi/Ahli</h4>
							 <?php echo $pesan; ?>
							<form name="frmDaftar" action="<?php echo site_url()?>/permintaan/daftar" method="post">
								<div class="input-group mb-3">
								  	
									<div class="input-group-prepend">
										<span class="input-group-text">Filter</span>
									</div>
									<select class="form-control" name="filter">
										<option value=" ">--Silahkan Pilih--</option>
										<option value="1" <?php echo set_select('filter', '1')?>>Nomor Surat</option>
										<option value="2" <?php echo set_select('filter', '2')?>>Asal Surat</option>
										<option value="3" <?php echo set_select('filter', '3')?>>Perihal Surat</option>
										<option value="4" <?php echo set_select('filter', '4')?>>Nomor Agenda</option>
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
									<th scope="col">Agenda</th>
									<th scope="col">Asal</th>
									<th scope="col">Surat</th>
									<th scope="col">Perihal</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>							
						    <tbody>							    
							    <?php $no =1; foreach($permintaan->result() as $value):?>
								<tr>
									<th scope="row"><?php echo $no?></th>
									<td><?php echo $value->nomor_agenda.'<br/>'.$value->tanggal_agenda?></td>
									<td><?php echo $value->asal_surat?></td>
									<td><?php echo $value->nomor_surat.'<br/>'.$value->tanggal_surat?></td>
									<td><?php echo $value->perihal_surat?></td>
									<td>									
									<a href="#" style="color:blue;"   data-id="<?php echo $this->myencrypt->encode($value->nomor_agenda)?>" data-toggle="modal" data-target="#ePermintaan" data-placement="top"  title="Edit"><i class="fa fa-pencil"></i></a>
									<a href="#" style="color:red;"  data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-close"></i></a>
									<a style="color:green;"  data-toggle="modal"  data-tooltip="tooltip" data-placement="top" title="Lihat Surat" data-target="#fileSurat" data-id="?f=<?php echo $this->myencrypt->encode($value->file_surat)?>"><i class="fa fa-eye"></i></a>
									</td>
								</tr>
								<?php $no++; endforeach?>	
							</tbody>
						</table>
					</div>
						
			
			<div class="footer-wrap pd-20 mb-20 card-box">
				BanKumApp &copy 2020 Badan Kepegawaian Negara - Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="fileSurat" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog modal-lg modal-dialog-centered md-dialog">
		  <div class="modal-content">
				<div class="modal-header">
				<h5 class="h4">File Surat</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>					
				</div>	
				<div class="modal-body md-body">
					<div class="embed-responsive z-depth-1-half" style="height:100%">
						<iframe   id="frame" width="100%" height="100%" frameborder="0" ></iframe>	
					</div>
				</div>
		  </div>
		</div>
	</div>	
	
	 <div id="ePermintaan" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg"" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><span id="msg"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">								
					<form id="efrmPermintaan" method='post' method='post' enctype="multipart/form-data">				
						<input name="fileOld" type="hidden" />
						<input name="nomorAgendaOld" type="hidden" />
						<div class="form-group row">
							<label class="col-md-2 col-form-label">No.Agenda</label>
							<div class="col-md-7">
								<input name="nomorAgenda"  value="<?php echo set_value('nomorAgenda'); ?>"  class="form-control" type="text" placeholder="Nomor Agenda">
								<?php echo form_error('nomorAgenda'); ?>
							</div>
							<div class="col-md-3">
								<input name="tanggalAgenda" value="<?php echo set_value('tanggalAgenda'); ?>" class="form-control date-picker" type="text" placeholder="Tanggal Agenda">
								<?php echo form_error('tanggalAgenda'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Asal</label>
							<div class="col-md-10">
								<input name="asalSurat" value="<?php echo set_value('asalSurat'); ?>" class="form-control" type="text" placeholder="Asal Surat">
								<?php echo form_error('asalSurat'); ?>
							</div>								
						</div>
						<div class="form-group row">								
							<label class="col-md-2 col-form-label">Nomor</label>
							<div class="col-md-7">
								<input name="nomorSurat" value="<?php echo set_value('nomorSurat'); ?>" class="form-control" type="text" placeholder="Nomor Surat">
								<?php echo form_error('nomorSurat'); ?>
							</div>
							<div class="col-md-3">
								<input name="tanggalSurat" value="<?php echo set_value('tanggalSurat'); ?>" class="form-control date-picker" type="text" placeholder="Tanggal Surat">
								<?php echo form_error('tanggalSurat'); ?>
							</div>
						</div>
						<div class="form-group row">								
							<label class="col-md-2 col-form-label">Perihal</label>
							<div class="col-md-10">
								<input name="perihalSurat" value="<?php echo set_value('perihalSurat'); ?>"  class="form-control" type="text" placeholder="Perihal Surat">
								<?php echo form_error('perihalSurat'); ?>
							</div>
							
						</div>
						<div class="form-group row">								
							<label class="col-md-2 col-form-label">File Surat</label>
							<div class="col-md-10">
								<input type="file" name="fileSurat" class="form-control" placeholder="File Surat" >
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label text-danger col-md-12">- Abaikan File jika tidak ingin diupdate</label>	
						</div>
					</form>
				</div>
				<div class="modal-footer justify-content-between">
				  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				  <button type="button" class="btn btn-primary" id="eBtn">Simpan Data</button>
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
		$('#fileSurat').on('show.bs.modal',function(e) {    		
			var id=  $(e.relatedTarget).attr('data-id');
			var iframe = $('#frame');
			iframe.attr('src', '<?php echo site_url()?>'+'/permintaan/getInline/'+id);			
	    });
		
		$("#ePermintaan").on("show.bs.modal",function(e){
			$('#ePermintaan #msg').text('Edit Data Surat Permintaan') 
			.removeClass( "text-success")
			.removeClass( "text-danger")
			.removeClass( "text-info" );			

			var id=$(e.relatedTarget).data("id");                   
			
			$.ajax({
				url: "<?php echo site_url()?>/permintaan/getPermintaanByid",
				dataType:'json',
				type:'GET',
				data:{nomorAgenda:id},
				success: function(r){                         
					$('#ePermintaan input[name=asalSurat]').val(r.asal_surat);
					$('#ePermintaan input[name=nomorAgenda]').val(r.nomor_agenda);
					$('#ePermintaan input[name=nomorSurat]').val(r.nomor_surat);	
					$('#ePermintaan input[name=perihalSurat]').val(r.perihal_surat);
					$('#ePermintaan input[name=tanggalAgenda]').val(r.tanggal_agenda);
					$('#ePermintaan input[name=tanggalSurat]').val(r.tanggal_surat);
					$('#ePermintaan input[name=fileOld]').val(r.file_surat);
					$('#ePermintaan input[name=nomorAgendaOld]').val(r.nomor_agenda);
				}				
			});		
		});
	
		$("#eBtn").on("click",function(e){                     
			$('#ePermintaan #msg').text('Updating Please Wait.....')
				  .removeClass( "text-success")
				  .removeClass("text-danger")
				  .addClass( "text-info" );
			 
			var form = $('#efrmPermintaan')[0];
			var data = new FormData(form);		
			$.ajax({
				url: '<?php  echo site_url()?>/permintaan/update',
				type: 'post',
				data: data,
				contentType: false,
				processData: false,
				cache:false,
				success: function(r){                        
					$('#ePermintaan #msg').text(r.pesan)
						 .removeClass( "text-info")
						 .removeClass( "text-danger")
						 .addClass( "text-success" );
					
				},
				error : function(r){
					$('#ePermintaan #msg').text(r.responseJSON.pesan)
						 .removeClass( "text-info")							 
						 .removeClass( "text-success")
						 .addClass( "text-danger" ); 					
				},
				complete: function () {
					refreshTable();	
				}	
			});
			
		});
		
		function refreshTable(){						
			$.ajax({   
			    type: 'POST',   
			    url: '<?php echo site_url()?>/permintaan/getPermintaan',   
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