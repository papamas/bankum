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
	@media (max-width: 767px) {
    .table-responsive .dropdown-menu {
        position: static !important;
    }
}
@media (min-width: 768px) {
    .table-responsive {
        overflow: inherit;
    }
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
							<h4 class="text-blue h4">Daftar Perkara</h4>
								 <?php echo $pesan; ?>
							<form action="<?php echo site_url()?>/perkara/daftar" method="post">
								<div class="input-group mb-3">								  	
									<div class="input-group-prepend">
										<span class="input-group-text">Filter</span>
									</div>
									<select class="form-control" name="filter">
										<option value=" ">--Silahkan Pilih--</option>
										<option value="1" <?php echo set_select('filter', '1')?>>Nomor Pekara</option>
										<option value="2" <?php echo set_select('filter', '2')?>>Nama Penggugat</option>
										<option value="3" <?php echo set_select('filter', '3')?>>Materi Gugatan</option>
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
									<th scope="col">Nomor Perkara</th>
									<th scope="col">Status</th>
									<th scope="col">Tahapan</th>
									<th scope="col">Penggugat</th>
									<th scope="col">Materi Gugatan</th>
									<th scope="col">Perintah</th>
								</tr>
							</thead>
							<tbody>
							 <?php $no =1; foreach($perkara->result() as $value):?>
								<tr>
									<th scope="row"><?php echo $no?></th>
									<td><?php echo $value->nomor_perkara?></td>
									<td><?php echo $value->status?></td>
									<td><?php echo $value->nama_tahapan?></td>
									<td><?php echo $value->penggugat?></td>
									<td><?php echo $value->materi_gugatan?></td>
									<td>
									<a href="#" style="color:blue;"   data-id="<?php echo $this->myencrypt->encode($value->nomor_perkara)?>" data-toggle="modal" data-target="#ePerkara" data-placement="top"  title="Edit"><i class="fa fa-pencil"></i></a>
									<a href="#" style="color:red;"  title="Delete"><i class="fa fa-close"></i></a>
									<a href="#" style="color:blue;" data-nomor="<?php echo $this->myencrypt->encode($value->nomor_perkara) ?>"  data-toggle="modal" data-target="#caseModal" title="Case Close"><i class="fa fa-gavel"></i></a>
									<div class="user-info-dropdown">
										<div class="dropdown">
											<a style="color:black;"  class="dropdown-toggle" href="#" title="Tahapan Perkara" role="button" data-toggle="dropdown">
												<i class="fa fa-balance-scale"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="<?php echo site_url()?>/perkara/tingkatPertama?n=<?php echo $this->myencrypt->encode($value->nomor_perkara)?>"><i class="dw dw-user1"></i> Tingkat Pertama</a>
												<a class="dropdown-item" href="<?php echo site_url()?>/perkara/suratPanggilan?n=<?php echo $this->myencrypt->encode($value->nomor_perkara)?>"><i class="dw dw-settings2"></i> Surat Panggilan</a>
												<a class="dropdown-item" href="<?php echo site_url()?>/perkara/pemeriksaanPersiapan?n=<?php echo $this->myencrypt->encode($value->nomor_perkara)?>"><i class="dw dw-help"></i> Pemeriksaan Persiapan</a>
												<a class="dropdown-item" href="<?php echo site_url()?>/perkara/gugatan?n=<?php echo $this->myencrypt->encode($value->nomor_perkara)?>"><i class="dw dw-logout"></i>Gugatan</a>
												<a class="dropdown-item" href="<?php echo site_url()?>/perkara/jawaban?n=<?php echo $this->myencrypt->encode($value->nomor_perkara)?>"><i class="dw dw-user1"></i> Jawaban</a>
												<a class="dropdown-item" href="<?php echo site_url()?>/perkara/replik?n=<?php echo $this->myencrypt->encode($value->nomor_perkara)?>"><i class="dw dw-settings2"></i> Replik</a>
												<a class="dropdown-item" href="<?php echo site_url()?>/perkara/duplik?n=<?php echo $this->myencrypt->encode($value->nomor_perkara)?>"><i class="dw dw-help"></i> Duplik</a>
												<a class="dropdown-item" href="<?php echo site_url()?>/perkara/pembuktian?n=<?php echo $this->myencrypt->encode($value->nomor_perkara)?>"><i class="dw dw-logout"></i> Pembuktian</a>
												<a class="dropdown-item" href="<?php echo site_url()?>/perkara/kesimpulan?n=<?php echo $this->myencrypt->encode($value->nomor_perkara)?>"><i class="dw dw-settings2"></i> Kesimpulan</a>
												<a class="dropdown-item" href="<?php echo site_url()?>/perkara/putusan?n=<?php echo $this->myencrypt->encode($value->nomor_perkara)?>"><i class="dw dw-help"></i> Putusan</a>
											</div>
										</div>
									</div>
																							
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
	
	<div id="ePerkara" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg"" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><span id="msg"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">								
					<form id="efrmPerkara" method='post' method='post' enctype="multipart/form-data">				
						<input name="nomorPerkaraOld" type="hidden" />
						
						<div class="form-group row">
								<label class="col-md-3 col-form-label">No.Perkara</label>
								<div class="col-md-9">
									<input name="nomorPerkara" value="<?php echo set_value('nomorPerkara')?>" class="form-control" type="text" placeholder="Nomor Perkara">
								</div>								
							</div>
							<div class="form-group row">
								<label class="col-md-3 col-form-label">Tingkat Pengadilan</label>
								<div class="col-md-9">
									<select  name="tingkatPengadilan" class="form-control">
										<option value="">--Silahkan Pilih--</option>
										<?php foreach($tingkatPengadilan->result() as $value):?>
										<option value="<?php echo $value->kode?>" <?php echo set_select('tingkatPengadilan', $value->kode)?>><?php echo $value->nama?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 col-form-label">Jenis Pengadilan</label>
								<div class="col-md-9">
									<select name="jenisPengadilan" class="form-control">								
										<option value="">--Silahkan Pilih--</option>
										<?php foreach($jenisPengadilan->result() as $value):?>
										<option <option value="<?php echo $value->kode?>" <?php echo set_select('jenisPengadilan', $value->kode)?>><?php echo $value->nama?></option>
										<?php endforeach;?>							
									</select>
								</div>	
								
							</div>
							<div class="form-group row">
								<label class="col-md-3 col-form-label">Provinsi</label>
								<div class="col-md-9">
									<select name="provinsi" class="form-control">
										<option value="">--Silahkan Pilih--</option>
										<?php foreach($provinsi->result() as $value):?>
										<option  <option value="<?php echo $value->kode?>" <?php echo set_select('provinsi', $value->kode)?>><?php echo $value->nama?></option>
										<?php endforeach;?>										
									</select>
								</div>				
							</div>
							<div class="form-group row">								
								<label class="col-md-3 col-form-label">Kab/Kota</label>
								<div class="col-md-9">
									<select  name="kabKota" class="form-control">
										<option value="">--Silahkan Pilih--</option>
										<?php foreach($kabKota->result() as $value):?>
										<option <option value="<?php echo $value->kode?>" <?php echo set_select('kabKota', $value->kode)?>><?php echo $value->nama?></option>
										<?php endforeach;?>										
									</select>
								</div>		
							</div>
							<div class="form-group row">								
								<label class="col-md-3 col-form-label">Instansi</label>
								<div class="col-md-9">
									<select  name="instansi" class="form-control">
										<option value="">--Silahkan Pilih--</option>
										<?php foreach($instansi->result() as $value):?>
										<option <option value="<?php echo $value->kode?>" <?php echo set_select('instansi', $value->kode)?>><?php echo $value->nama?></option>
										<?php endforeach;?>										
									</select>
								</div>		
							</div>
							<div class="form-group row">
								<label class="col-md-3 col-form-label">Penggugat</label>
								<div class="col-md-9">
									<input name="penggugat" value="<?php echo set_value('penggugat')?>" class="form-control" type="text" placeholder="Nama Penggugat">
								</div>								
							</div>
							<div class="form-group row">
								<label class="col-md-3 col-form-label">Materi Gugatan</label>
								<div class="col-md-9">
									<input name="materiGugatan" value="<?php echo set_value('materiGugatan')?>" class="form-control" type="text" placeholder="Materi Gugatan">
								</div>								
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

	<div class="modal fade" id="caseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
				    <h5 class="modal-title" id="myModalLabel"><span id="msg"></span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					
				</div>
				<div class="modal-body">				    
					<form id="nfrmCase">
					   <p class="text text-center"> Anda Yakin, Case Close ?</p>
					   <input type="hidden" name="nomor"/>	                     					   
					</form>
				 </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" id="nBtnCase">Ya,Saya Yakin !</button>
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
	<script>	
	$(document).ready(function () {
		$('[data-tooltip="tooltip"]').tooltip();

		$("#ePerkara").on("show.bs.modal",function(e){
			$('#ePerkara #msg').text('Edit Data Perkara') 
			.removeClass( "text-success")
			.removeClass( "text-danger")
			.removeClass( "text-info" );			

			var id=$(e.relatedTarget).data("id");                   
			
			$.ajax({
				url: "<?php echo site_url()?>/perkara/getPerkaraByid",
				dataType:'json',
				type:'GET',
				data:{nomorPerkara:id},
				success: function(r){                         
					$('#ePerkara input[name=nomorPerkara]').val(r.nomor_perkara);
					$('#ePerkara [name=tingkatPengadilan]').val(r.tingkat_pengadilan);
					$('#ePerkara [name=jenisPengadilan]').val(r.jenis_pengadilan);	
					$('#ePerkara [name=provinsi]').val(r.provinsi);
					$('#ePerkara [name=kabKota]').val(r.kab_kota);
					$('#ePerkara [name=instansi]').val(r.instansi);
					$('#ePerkara input[name=penggugat]').val(r.penggugat);
					$('#ePerkara input[name=materiGugatan]').val(r.materi_gugatan);
					$('#ePerkara input[name=nomorPerkaraOld]').val(r.nomor_perkara);
				}				
			});		
		});
	
		$("#eBtn").on("click",function(e){                     
			$('#ePerkara #msg').text('Updating Please Wait.....')
				  .removeClass( "text-success")
				  .removeClass("text-danger")
				  .addClass( "text-info" );
			 
			var form = $('#efrmPerkara')[0];
			var data = new FormData(form);		
			$.ajax({
				url: '<?php  echo site_url()?>/perkara/update',
				type: 'post',
				data: data,
				contentType: false,
				processData: false,
				cache:false,
				success: function(r){                        
					$('#ePerkara #msg').text(r.pesan)
						 .removeClass( "text-info")
						 .removeClass( "text-danger")
						 .addClass( "text-success" );
					
				},
				error : function(r){
					$('#ePerkara #msg').text(r.responseJSON.pesan)
						 .removeClass( "text-info")							 
						 .removeClass( "text-success")
						 .addClass( "text-danger" ); 					
				},
				complete: function () {
					refreshTable();	
				}	
			});
			
		});
		
		$('#caseModal').on('show.bs.modal',function(e){
			 $('#caseModal #msg').text('Konfirmasi Case Close')
			.removeClass( "text-green")
			.removeClass( "text-blue" ); 
			
			var nomor			=  $(e.relatedTarget).attr('data-nomor');			
			$('#caseModal input[name=nomor]').val(nomor);
		
		});
		
		$("#nBtnCase").on("click",function(e){
			e.preventDefault();
			var data = $('#nfrmCase').serialize();
			
			$('#caseModal #msg').text('Updating Please Wait.....')
					 .removeClass( "text-green")
					 .addClass( "text-blue" );  
			
			$.ajax({
				type: "POST",
				url : "<?php echo site_url()?>/perkara/caseClose",
				data: data,
				success: function(r){
					$('#caseModal #msg').text(r.pesan)
						.removeClass( "text-blue")
						.addClass( "text-green");
					refreshTable();					
				}, // akhir fungsi sukses
				error : function(r) {				    
					 $('#caseModal #msg').text(r.responseJSON.pesan)
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
			    url: '<?php echo site_url()?>/perkara/getPerkara',   
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