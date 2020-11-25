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
							<h4 class="text-blue h4">Daftar Surat Perintah Pendampingan Saksi/Ahli</h4>	
							<form action="<?php echo site_url()?>/pendampingan/daftar" method="post">
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
								 <?php $no =1; foreach($pendampingan->result() as $value):?>
								<tr>
									<th scope="row"><?php echo $no?></th>
									<td><?php echo $value->nomor.'<br/>'.$value->tanggal_surat?></td>
									<td><?php echo $value->nama_tahapan?></td>
									<td><?php echo $value->kepada?></td>
									<td><?php echo $value->untuk?></td>
									<td>
									<a href="#" style="color:blue;"  data-id="<?php echo $this->myencrypt->encode($value->nomor)?>" data-toggle="modal" data-target="#ePendampingan" data-placement="top"  title="Edit"><i class="fa fa-pencil"></i></a>
									<a  style="color:brown;"  data-tooltip="tooltip" data-placement="top"  title="Pratinjau Surat" data-toggle="modal" data-target="#pratinjauSurat"  data-id="?n=<?php echo $this->myencrypt->encode($value->nomor)?>"><i class="fa fa-eye"></i></a>
									<a href="#" style="color:red;"  data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-close"></i></a>
									<a style="color:green;"  data-tooltip="tooltip"  title="Upload File" data-toggle="modal" data-target="#uploadModal" data-nomor="<?php echo $value->nomor ?>" data-placement="top"><i class="fa fa-upload"></i></a>
									<a style="color:red;"  data-toggle="modal"  data-tooltip="tooltip" data-placement="top" title="Lihat Surat" data-target="#fileSurat" data-id="?f=<?php echo $this->myencrypt->encode($value->file_surat)?>"><i class="fa fa-eye"></i></a>
									<a style="color:blue;"  data-nomor="<?php echo $this->myencrypt->encode($value->nomor) ?>" data-tooltip="tooltip" data-placement="top"  data-toggle="modal" data-target="#kirimModal" title="Kirim untuk approval"><i class="fa fa-mail-forward"></i></a>
																	
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
	
	<div id="uploadModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
				    <h4 class="modal-title"><span id="msg"></span></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    <form method='post' action='' enctype="multipart/form-data" id="fileUploadForm">
						<input class="form-control" type="hidden" value="" name="nomor" />
                        Select file : <input type='file' name='file' id='file' class='form-control' ><br>
                        <input type='button' class='btn btn-info' value='Upload' id='btn_upload'>
                    </form>
                </div>                
            </div>
        </div>
    </div>
	
	<div class="modal" id="fileSurat" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog  md-dialog modal-lg">
		  <div class="modal-content md-content">
				<div class="modal-header">
					<h4 class="modal-title" >File Surat Pendampingan</h4>
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
					   <p class="text text-center"> Anda Yakin,Surat ini akan dikirimkan untuk proses Approval ?</p>
					   <input type="hidden" name="nomor"/>	                     					   
					</form>
				 </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" id="nBtnKirim">OK Kirim !</button>
				</div>
			</div>
		</div>	
	</div>
	
	<div id="ePendampingan" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg"" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><span id="msg"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">								
					<form id="efrmPendampingan" method='post' method='post' enctype="multipart/form-data">				
						<input name="nomorOld" type="hidden" />						
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Nomor</label>
							<div class="col-md-10">
								<input name="nomor" class="form-control" type="text" value="">
							</div>
						</div>
						<div class="form-group row">
								<label class="col-md-2 col-form-label">Dasar</label>
								<div class="col-md-10">
									<input name="dasarSatu" class="form-control" type="text" value="">
								</div>
						</div>
						<div class="form-group row">
								<label class="col-md-2 col-form-label"></label>
								<div class="col-md-10">
									<input name="dasarDua" class="form-control" type="text" value="">
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
									<input name="kepada" class="form-control" type="text" value="">
								</div>								
						</div>
							
						<div class="form-group row">
								<label class="col-md-2 col-form-label">Untuk</label>
								<div class="col-md-10">
									<textarea name="untuk" class="form-control"></textarea>
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
							
						
					</form>
				</div>
				<div class="modal-footer justify-content-between">
				  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				  <button type="button" class="btn btn-primary" id="eBtn">Simpan Data</button>
				</div>
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
						<iframe   id="framePratinjau" width="100%" height="100%" frameborder="0" ></iframe>	
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
		
		$('#uploadModal').on('show.bs.modal',function(e){
			$('#uploadModal #msg').text('Upload File Surat Pendampingan')
                     .removeClass( "text-green")
					 .removeClass( "text-red")
				     .removeClass( "text-blue" ); 		
			var nomor   =  $(e.relatedTarget).attr('data-nomor');
			$("input[name=nomor]").val(nomor);
		});
		
		$('#btn_upload').click(function(){
			var form = $('#fileUploadForm')[0];
			// Create an FormData object 
			var data = new FormData(form);			
			// AJAX request
			$.ajax({
				url: '<?php  echo site_url()?>/pendampingan/doUpload',
				type: 'post',
				data: data,
				contentType: false,
				processData: false,
				cache:false,
				success: function(e){                        
					$('#uploadModal #msg').text(e.pesan)
						 .removeClass( "text-blue")
						 .removeClass( "text-red")
						 .addClass( "text-green" );
					refreshTable();	 
				},
				error : function(e){
					$('#uploadModal #msg').text(e.responseJSON.error)
						 .removeClass( "text-blue")							 
						 .removeClass( "text-green")
						 .addClass( "text-red" ); 
				}	
            });
        });
		
		$('#fileSurat').on('show.bs.modal',function(e) {    		
			var id=  $(e.relatedTarget).attr('data-id');
			var iframe = $('#frame');
			iframe.attr('src', '<?php echo site_url()?>'+'/pendampingan/showFile/'+id);			
	    });
		
		$('#kirimModal').on('show.bs.modal',function(e){
			 $('#kirimModal #msg').text('Konfirmasi Kirim Proses Approval')
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
				url : "<?php echo site_url()?>/pendampingan/kirimApproval",
				data: data,
				success: function(r){
					$('#kirimModal #msg').text(r.pesan)
						.removeClass( "text-blue")
						.addClass( "text-green");
					refreshTable();
					//$("#nBtnKirim").hide();	
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
		
		$("#ePendampingan").on("show.bs.modal",function(e){
			$('#ePendampingan #msg').text('Edit Data Surat Perintah Pendampingan') 
			.removeClass( "text-success")
			.removeClass( "text-danger")
			.removeClass( "text-info" );			

			var id=$(e.relatedTarget).data("id");                   
			
			$.ajax({
				url: "<?php echo site_url()?>/pendampingan/getPendampinganByid",
				dataType:'json',
				type:'GET',
				data:{nomor:id},
				success: function(r){                         
					$('#ePendampingan input[name=nomor]').val(r.nomor);
					$('#ePendampingan input[name=dasarSatu]').val(r.dasar_satu);
					$('#ePendampingan input[name=dasarDua]').val(r.dasar_dua);	
					$('#ePendampingan input[name=kepada]').val(r.kepada);
					$('#ePendampingan [name=untuk]').val(r.untuk);
					$('#ePendampingan input[name=diKeluarkan]').val(r.di_keluarkan);
					$('#ePendampingan input[name=tanggalSurat]').val(r.tanggal_surat);
					$('#ePendampingan [name=tertanda]').val(r.tertanda);					
					$('#ePendampingan input[name=nomorOld]').val(r.nomor);					
				}				
			});		
		});
	
		$("#eBtn").on("click",function(e){                     
			$('#ePendampingan #msg').text('Updating Please Wait.....')
				  .removeClass( "text-success")
				  .removeClass("text-danger")
				  .addClass( "text-info" );
			 
			var form = $('#efrmPendampingan')[0];
			var data = new FormData(form);		
			$.ajax({
				url: '<?php  echo site_url()?>/pendampingan/update',
				type: 'post',
				data: data,
				contentType: false,
				processData: false,
				cache:false,
				success: function(r){                        
					$('#ePendampingan #msg').text(r.pesan)
						 .removeClass( "text-info")
						 .removeClass( "text-danger")
						 .addClass( "text-success" );
					
				},
				error : function(r){
					$('#ePendampingan #msg').text(r.responseJSON.pesan)
						 .removeClass( "text-info")							 
						 .removeClass( "text-success")
						 .addClass( "text-danger" ); 					
				},
				complete: function () {
					refreshTable();	
				}	
			});
			
		});
		
		$('#pratinjauSurat').on('show.bs.modal',function(e) { 			
			var id=$(e.relatedTarget).data("id"); 		
			var iframe = $('#framePratinjau');
			iframe.attr('src', '<?php echo site_url()?>'+'/pendampingan/pratinjauSurat/'+ id);			
	    });
		
		function refreshTable(){						
			$.ajax({   
			    type: 'POST',   
			    url: '<?php echo site_url()?>/pendampingan/getPendampingan',   
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