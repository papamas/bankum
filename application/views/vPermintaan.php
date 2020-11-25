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
					<form action="<?php echo site_url()?>/permintaan/simpan" method="post" enctype="multipart/form-data">
					<div class="card-header">
						Tambah Data Surat Permintaan Saksi/Ahli
					</div>
					<div class="card-body">
                        <?php echo $pesan;?>					
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
	
	
	
	<!-- js -->
	<script src="<?php echo base_url()?>vendors/scripts/core.js"></script>
	<script src="<?php echo base_url()?>vendors/scripts/script.js"></script>
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
	<script type="text/javascript">
		$(document).ready(function(){
			
		});		
    </script>	
</body>
</html>