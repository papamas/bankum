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
						Tahapan Perkara Tingkat Pertama
					</div>
					<div class="card-body">
                        <?php echo $pesan;?>					
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Nomor Perkara</label>
							<div class="col-md-10">
								<input name="nomorAgenda" readonly  value="<?php echo $perkara->nomor_perkara?>"  class="form-control" type="text">
							</div>							
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Tingkat Pengadilan</label>
							<div class="col-md-5">
								<input name="nomorAgenda" readonly  value="<?php echo $perkara->tingkat_pengadilan?> - <?php echo $perkara->nama_tingkat?>"  class="form-control" type="text">
							</div>	
							<label class="col-md-1 col-form-label">Jenis</label>
							<div class="col-md-4">
								<input name="nomorAgenda" readonly  value="<?php echo $perkara->jenis_pengadilan?> - <?php echo $perkara->nama_jenis?>"  class="form-control" type="text">
							</div>			
						</div>
					
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Provinsi</label>
							<div class="col-md-10">
								<input name="nomorAgenda" readonly  value="<?php echo $perkara->provinsi?> - <?php echo $perkara->nama_provinsi?>"  class="form-control" type="text">
							</div>							
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Kab/Kota</label>
							<div class="col-md-10">
								<input name="nomorAgenda" readonly  value="<?php echo $perkara->kab_kota?> - <?php echo $perkara->nama_kab_kota?>"  class="form-control" type="text">
							</div>							
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Instansi</label>
							<div class="col-md-10">
								<input name="nomorAgenda" readonly  value="<?php echo $perkara->instansi?> - <?php echo $perkara->nama_instansi?>"  class="form-control" type="text">
							</div>							
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Nama Penggugat</label>
							<div class="col-md-10">
								<input name="nomorAgenda" readonly  value="<?php echo $perkara->penggugat?>"  class="form-control" type="text">
							</div>							
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Materi Gugatan</label>
							<div class="col-md-10">
								<input name="nomorAgenda" readonly  value="<?php echo $perkara->materi_gugatan?>" class="form-control" type="text">
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
	<script src="<?php echo base_url()?>src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="<?php echo base_url()?>src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url()?>src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url()?>src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url()?>src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="<?php echo base_url()?>vendors/scripts/dashboard.js"></script>
</body>
</html>