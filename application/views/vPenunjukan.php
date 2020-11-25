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
		
		   <div class="col-sm-12 col-md-12 mb-30">
				<div class="card card-box">
					<div class="card-header">
						Tambah Data Surat Perintah Penunjukan Saksi/Ahli
					</div>
					<form id="fpratinjau" action="<?php echo site_url()?>/penunjukan/simpan" method="post">
					<div class="card-body">
						<?php echo $pesan;?>				
							<div class="form-group row">
								<label class="col-md-2 col-form-label">Nomor</label>
								<div class="col-md-10">
									<input name="nomor" class="form-control" type="text" value="1912/Sesma/SP/VIII/2020">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-2 col-form-label">Dasar</label>
								<div class="col-md-10">
									<input name="dasarSatu" class="form-control" type="text" value="Surat Kepala Kepolisian Resort Tangerang Selatan Nomor B/383/II/2019/Reskrim tanggal 7 Februari 2019 perihal  Bantuan menghadirkan saksi;">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-2 col-form-label"></label>
								<div class="col-md-10">
									<input name="dasarDua" class="form-control" type="text" value="Disposisi Kepala Badan Kepegawaian Negara tanggal 15 Februari 2019 untuk ditindaklanjuti;">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									<p class="text-center font-weight-bold">MEMERINTAHKAN</p>
								</div>	
							</div>
							<div class="form-group row">
								<label class="col-md-2 col-form-label">Kepada</label>
								<div class="col-md-10">
									<input name="kepada" class="form-control" type="text" value="Yuyud Yuchi Susanta, S.H. NIP. 196410011991031001, Pangkat Pembina Tingkat I, golongan ruang IV/b, Jabatan Kepala Bidang Konsultasi Hukum Kepegawaian pada Badan Kepegawaian Negara">
								</div>								
							</div>
							
							<div class="form-group row">
								<label class="col-md-2 col-form-label">Untuk</label>
								<div class="col-md-10">
									<textarea name="untuk" class="form-control">Memberikan keterangan klarifikasi tentang Surat penetapan NIP kepada Penyidik Polres Tangerang Selatan terkait dengan adanya dugaan tindak pidana penipuan sebagaimana dimaksud dalam Pasal 378 KUHP dan menurut keterangan korban bahwa pelaku menjanjikan bisa menjadikan anak korban yang bernama ARIE CAHYANI EKA PUTRI untuk menjadi Pegawai di Dinas Kesehatan Pemkot tangerang Selatan dan kemudian pelaku memberikan kepada korban NIP dengan Nomor 19995010 1201704 2 003 an. ARIE CAHYANI EKA PUTRI, yang akan dilaksanakan pada hari Selasa tanggal 12 Maret 2019;</textarea>
								</div>								
							</div>
							
							<div class="form-group row">
								<label class="col-md-2 col-form-label">Di Keluarkan</label>
								<div class="col-md-4">
									<input name="diKeluarkan" class="form-control" type="text" value="di Jakarta">
								</div>
								<label class="col-md-2 col-form-label">Tanggal</label>
								<div class="col-md-4">
									<input name="tanggalSurat" value="" class="form-control date-picker" type="text" placeholder="Tanggal Surat">
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-md-2 col-form-label">Tertanda</label>
								<div class="col-md-10">
									<select name="tertanda" class="form-control">
									    <option value="Kepala">Kepala Badan Kepegawaian Negara</option>
										<option value="Waka">Wakil Kepala Badan Kepegawaian Negara</option>
										<option value="Sesma">Sekretaris Utama</option>
										<option value="Kapus">Kepala Puskobankum</option>
									</select>
								</div>
							</div>
							
					
					</div>
					<div class="card-footer">
						<button  type="submit" class="btn btn-primary">Simpan</button>
						<a class="btn btn-secondary" data-toggle="modal"  data-tooltip="tooltip" data-placement="top" title="Pratinjau Surat" data-target="#pratinjauSurat">Pratinjau</a>						
					</div>
					</form>
				</div>
			</div>
					
			
			<div class="footer-wrap pd-20 mb-20 card-box">
				BanKumApp &copy 2020 Badan Kepegawaian Negara - Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="pratinjauSurat" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog modal-lg modal-dialog-centered md-dialog">
		  <div class="modal-content">
				<div class="modal-header">
				<h5 class="h4">Pratinjau Surat</h5>
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
	<script src="<?php echo base_url()?>vendors/scripts/script.min.js"></script>
	<script src="<?php echo base_url()?>vendors/scripts/process.js"></script>
	<script src="<?php echo base_url()?>vendors/scripts/layout-settings.js"></script>
	<script src="<?php echo base_url()?>src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url()?>src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url()?>src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url()?>src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!--
	<script src="<?php echo base_url()?>src/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="<?php echo base_url()?>vendors/scripts/dashboard.js"></script>

	!-->
	<script>	
	$(document).ready(function () {
		$('#pratinjauSurat').on('show.bs.modal',function(e) {    		
			//var id=  $(e.relatedTarget).attr('data-id');
			
			var data = $('#fpratinjau').serialize();
			
			var iframe = $('#frame');
			iframe.attr('src', '<?php echo site_url()?>'+'/penunjukan/pratinjau/?'+ data);			
	    });
		
	});	
	</script>
</body>
</html>