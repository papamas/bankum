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
	<?php/*  $this->load->view('vLoader') */?>

	<?php $this->load->view('vHeader')?>
	
	<?php $this->load->view('vRsidebar')?>

	<?php $this->load->view('vLsidebar')?>
	
	<div class="mobile-menu-overlay"></div>

		<div class="main-container">
		<div class="pd-ltr-20">
		
		   <div class="col-sm-12 col-md-12 mb-30">
				<div class="card card-box">
					<form action="<?php echo site_url()?>/perkara/replikSimpan" method="post" enctype="multipart/form-data">
					<div class="card-header">
						Tahapan Perkara Replik
					</div>
					<div class="card-body">
                    <?php echo $pesan;?>					
					<div class="form-group row">
							<input type="hidden" name="tahapanPerkara" value="<?php echo $perkara->tahapan?>" />
							<input type="hidden" name="aksi" value="<?php echo (!empty($perkara->tanggal_sidang) ?  'update' : 'new') ?>" />	
							<input type="hidden" name="fileScanOld" value="<?php echo $perkara->file_scan?>" />
							
							<label class="col-md-2 col-form-label">Nomor Perkara</label>
							<div class="col-md-10">
								<input readonly  name="nomorPerkara" value="<?php echo $perkara->nomor_perkara?>"  class="form-control" type="text">
							</div>							
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Tingkat Pengadilan</label>
							<div class="col-md-5">
								<input readonly  value="<?php echo $perkara->tingkat_pengadilan?> - <?php echo $perkara->nama_tingkat?>"  class="form-control" type="text">
							</div>	
							<label class="col-md-1 col-form-label">Jenis</label>
							<div class="col-md-4">
								<input readonly  value="<?php echo $perkara->jenis_pengadilan?> - <?php echo $perkara->nama_jenis?>"  class="form-control" type="text">
							</div>			
						</div>
					
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Provinsi</label>
							<div class="col-md-10">
								<input readonly  value="<?php echo $perkara->provinsi?> - <?php echo $perkara->nama_provinsi?>"  class="form-control" type="text">
							</div>							
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Kab/Kota</label>
							<div class="col-md-10">
								<input readonly  value="<?php echo $perkara->kab_kota?> - <?php echo $perkara->nama_kab_kota?>"  class="form-control" type="text">
							</div>							
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Instansi</label>
							<div class="col-md-10">
								<input readonly  value="<?php echo $perkara->instansi?> - <?php echo $perkara->nama_instansi?>"  class="form-control" type="text">
							</div>							
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Nama Penggugat</label>
							<div class="col-md-10">
								<input readonly  value="<?php echo $perkara->penggugat?>"  class="form-control" type="text">
							</div>							
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Materi Gugatan</label>
							<div class="col-md-10">
								<input readonly  value="<?php echo $perkara->materi_gugatan?>" class="form-control" type="text">
							</div>							
						</div>
						
						<hr/>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Tanggal Sidang</label>
							<div class="col-md-10">
								<input name="tanggalSidang" value="<?php echo (!empty($perkara->tanggal_sidang) ?  $perkara->tanggal_sidang : set_value('tanggalSidang') ); ?>" class="form-control date-picker" type="text" placeholder="Tanggal Sidang">
								<?php echo form_error('tanggalSidang'); ?>
							</div>
						</div>	
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Acara Sidang</label>
							<div class="col-md-10">
								<textarea name="acaraSidang"  class="form-control"><?php echo (!empty($perkara->acara_sidang) ?  $perkara->acara_sidang : set_value('acaraSidang') ); ?></textarea>
								<?php echo form_error('acaraSidang'); ?>
							</div>										
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Isi Ringkas</label>
							<div class="col-md-10">
								<textarea name="isiRingkas" rows="2" class="form-control"><?php echo (!empty($perkara->isi_ringkas) ?  $perkara->isi_ringkas : set_value('isiRingkas') ); ?></textarea>
								<?php echo form_error('isiRingkas'); ?>
							</div>									
						</div>
						<div class="form-group row">								
							<label class="col-md-2 col-form-label">File scan</label>
							<div class="col-md-4">
								<input type="file" name="fileScan" class="form-control" />
								<a style="color:blue;" class="<?php echo (!empty($perkara->tanggal_sidang) ?  '' : 'd-none') ?>" data-toggle="modal"  data-tooltip="tooltip" data-placement="top" title="Lihat Surat" data-target="#fileSurat" data-id="?f=<?php echo $this->myencrypt->encode($perkara->file_scan)?>"><i class="fa fa-eye"> Lihat File</i></a>
							</div>
						</div>
						<div class="<?php echo (!empty($perkara->tanggal_sidang) ?  '' : 'd-none') ?> form-group row">
							<label class="control-label text-danger col-md-12">- Abaikan File jika tidak ingin diupdate</label>	
						</div>
					</div>	
					<div class="card-footer">
						<button class="btn btn-primary" type="submit">Simpan</button>
					</div>
					</form>
				</div>
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
				<h5 class="h4">File</h5>
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
	
	<!-- js -->
	<script src="<?php echo base_url()?>vendors/scripts/core.js"></script>
	<script src="<?php echo base_url()?>vendors/scripts/script.js"></script>
	<script src="<?php echo base_url()?>vendors/scripts/process.js"></script>
	<script src="<?php echo base_url()?>vendors/scripts/layout-settings.js"></script>
	<script src="<?php echo base_url()?>src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url()?>src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url()?>src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url()?>src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script>	
	$(document).ready(function () {
		$('#fileSurat').on('show.bs.modal',function(e) {    		
			var id=  $(e.relatedTarget).attr('data-id');
			var iframe = $('#frame');
			iframe.attr('src', '<?php echo site_url()?>'+'/perkara/getInline/'+id);			
	    });
	});	
   </script>	
</body>
</html>