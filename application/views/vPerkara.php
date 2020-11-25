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
					<div class="card-header">
						Tambah Data Perkara
					</div>
					<div class="card-body">
						<?php echo $pesan;?>
						<form action="<?php echo site_url()?>/perkara/simpan" method="post">
							<div class="form-group row">
								<label class="col-md-2 col-form-label">No.Perkara</label>
								<div class="col-md-5">
									<input name="nomorPerkara" value="<?php echo set_value('nomorPerkara')?>" class="form-control" type="text" placeholder="Nomor Perkara">
								</div>
								<label class="col-md-2 col-form-label">Tingkat Pengadilan</label>
								<div class="col-md-3">
									<select  name="tingkatPengadilan" class="form-control">
										<option value="">--Silahkan Pilih--</option>
										<?php foreach($tingkatPengadilan->result() as $value):?>
										<option value="<?php echo $value->kode?>" <?php echo set_select('tingkatPengadilan', $value->kode)?>><?php echo $value->nama?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-2 col-form-label">Jenis Pengadilan</label>
								<div class="col-md-10">
									<select name="jenisPengadilan" class="form-control">								
										<option value="">--Silahkan Pilih--</option>
										<?php foreach($jenisPengadilan->result() as $value):?>
										<option <option value="<?php echo $value->kode?>" <?php echo set_select('jenisPengadilan', $value->kode)?>><?php echo $value->nama?></option>
										<?php endforeach;?>							
									</select>
								</div>	
								
							</div>
							<div class="form-group row">
								<label class="col-md-2 col-form-label">Provinsi</label>
								<div class="col-md-4">
									<select name="provinsi" class="form-control">
										<option value="">--Silahkan Pilih--</option>
										<?php foreach($provinsi->result() as $value):?>
										<option  <option value="<?php echo $value->kode?>" <?php echo set_select('provinsi', $value->kode)?>><?php echo $value->nama?></option>
										<?php endforeach;?>										
									</select>
								</div>		
								<label class="col-md-2 col-form-label">Kab/Kota</label>
								<div class="col-md-4">
									<select  name="kabKota" class="form-control">
										<option value="">--Silahkan Pilih--</option>
										<?php foreach($kabKota->result() as $value):?>
										<option <option value="<?php echo $value->kode?>" <?php echo set_select('kabKota', $value->kode)?>><?php echo $value->nama?></option>
										<?php endforeach;?>										
									</select>
								</div>		
							</div>
							<div class="form-group row">								
								<label class="col-md-2 col-form-label">Instansi</label>
								<div class="col-md-10">
									<select  name="instansi" class="form-control">
										<option value="">--Silahkan Pilih--</option>
										<?php foreach($instansi->result() as $value):?>
										<option <option value="<?php echo $value->kode?>" <?php echo set_select('instansi', $value->kode)?>><?php echo $value->nama?></option>
										<?php endforeach;?>										
									</select>
								</div>		
							</div>
							<div class="form-group row">
								<label class="col-md-2 col-form-label">Penggugat</label>
								<div class="col-md-10">
									<input name="penggugat" value="<?php echo set_value('penggugat')?>" class="form-control" type="text" placeholder="Nama Penggugat">
								</div>								
							</div>
							<div class="form-group row">
								<label class="col-md-2 col-form-label">Materi Gugatan</label>
								<div class="col-md-10">
									<input name="materiGugatan" value="<?php echo set_value('materiGugatan')?>" class="form-control" type="text" placeholder="Materi Gugatan">
								</div>								
							</div>
											
						
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Simpan</button>
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
	
</body>
</html>