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
							<h4 class="text-blue h4">Daftar Approval Perkara</h4>
								 <?php echo $pesan; ?>
							<form action="<?php echo site_url()?>/approval/perkara" method="post">
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
						<table id="tbDaftar"  class="table table-striped">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nomor Perkara</th>
									<th scope="col">Status</th>
									<th scope="col">Approval</th>
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
									<td align="center"><?php echo ($value->approval == 1 ? '<i style="color:green" class="fa fa-check"></i>' : '<i style="color:red" class="fa fa-remove"></i>' )?></td>
									
									<td><?php echo $value->nama_tahapan?></td>
									<td><?php echo $value->penggugat?></td>
									<td><?php echo $value->materi_gugatan?></td>
									<td>
									<a href="#" style="color:blue;" data-nomor="<?php echo $this->myencrypt->encode($value->nomor_perkara) ?>"  data-toggle="modal" data-target="#caseModal" title="Case Close"><i class="fa fa-gavel"></i></a>&nbsp;
									<a style="color:red;"  data-nomor="<?php echo $this->myencrypt->encode($value->nomor_perkara) ?>"  data-toggle="modal" data-target="#kirimModal" title="Berikan Approval"><i class="fa fa-check"></i></a>
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
	
	<div class="modal fade" id="kirimModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
				    <h5 class="modal-title" id="myModalLabel"><span id="msg"></span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					
				</div>
				<div class="modal-body">				    
					<form id="nfrmKirim">
					   <p class="text text-center"> Anda Yakin,Perkara ini akan di Approval ?</p>
					   <input type="hidden" name="nomor"/>	                     					   
					</form>
				 </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" id="nBtnKirim">Ya,Saya Yakin !</button>
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
		$('#kirimModal').on('show.bs.modal',function(e){
			 $('#kirimModal #msg').text('Konfirmasi Approval Perkara')
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
				url : "<?php echo site_url()?>/approval/okPerkara",
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
				url : "<?php echo site_url()?>/approval/caseClose",
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
			    url: '<?php echo site_url()?>/approval/getPerkara',   
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