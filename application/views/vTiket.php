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
	<?php /* $this->load->view('vLoader') */?>

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
						All Open Tiket : 45 Tiket
					</div>
					<div class="card-body">
                        <div class="table-responsive">
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>TICKET ID</th>
										<th>STATUS</th>
										<th>SUBJECT</th>
										<th>CATEGORY</th>
										<th>USERNAME</th>
										<th>LAST UPDATED</th>
										 <th>PRIORITY</th>
										 <th>VIEW</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>#109</td>
										<td><span class="badge badge-danger">Open</span></td>
										<td>Template Dummy Subject Line</td>
										<td><span class="badge badge-danger">Template Support</span></td>
										<td>Dummy Username</td>
										<td>2nd July 2014</td>
										<td><span class="badge badge-primary">Medium </span></td>
										  <td><a href="#" class="badge badge-success">Details <i class="fa fa-forward"></i></a></td>
									</tr>
								   <tr>
										<td>#110</td>
										<td><span class="badge badge-danger">Open</span></td>
										<td>Template Dummy Subject Line</td>
										<td><span class="badge badge-success">Billing Support</span></td>
										<td>Dummy Username</td>
										<td>30th June 2014</td>
										<td><span class="badge badge-info">High </span></td>
										 <td><a href="#" class="badge badge-success">Details <i class="fa fa-forward"></i></a></td>
									</tr>
									<tr>
										<td>#111</td>
										 <td><span class="badge badge-info">Closed</span></td>
										<td>Template Dummy Subject Line</td>
										<td><span class="badge badge-danger">General Information</span></td>
										 <td>Dummy Username</td>
										<td>12 May 2014</td>
										<td><span class="badge badge-warning">Very High </span></td>
										  <td><a href="#" class="badge badge-success">Details <i class="fa fa-forward"></i></a></td>
									</tr>
									 <tr>
										<td>#112</td>
										  <td><span class="badge badge-danger">Open</span></td>
										<td>Template Dummy Subject Line</td>
										<td><span class="badge badge-info">Billing Support</span></td>
										  <td>Dummy Username</td>
										<td>30th June 2014</td>
										<td><span class="badge badge-primary">High </span></td>
										   <td><a href="#" class="badge badge-success">Details <i class="fa fa-forward"></i></a></td>
									</tr>
									<tr>
										<td>#113</td>
										 <td><span class="badge badge-info">Closed</span></td>
										<td>Template Dummy Subject Line</td>
										<td><span class="badge badge-warning">General Information</span></td>
										 <td>Dummy Username</td>
										<td>12 May 2014</td>
										<td><span class="badge badge-danger">Very High </span></td>
										  <td><a href="#" class="badge badge-success">Details <i class="fa fa-forward"></i></a></td>
									</tr>
									 <tr>
										<td>#114</td>
										  <td><span class="badge badge-info">Closed</span></td>
										<td>Template Dummy Subject Line</td>
										<td><span class="badge badge-danger">Billing Support</span></td>
										  <td>Dummy Username</td>
										<td>30th June 2014</td>
										<td><span class="badge badge-success">High </span></td>
										   <td><a href="#" class="badge badge-success">Details <i class="fa fa-forward"></i></a></td>
									</tr>
									<tr>
										<td>#115</td>
										 <td><span class="badge badge-info">Closed</span></td>
										<td>Template Dummy Subject Line</td>
										<td><span class="badge badge-success">General Information</span></td>
										 <td>Dummy Username</td>
										<td>12 May 2014</td>
										<td><span class="badge badge-warning">Very High </span></td>
										  <td><a href="#" class="badge badge-success">Details <i class="fa fa-forward"></i></a></td>
									</tr>
									 <tr>
										<td>#116</td>
										  <td><span class="badge badge-info">Closed</span></td>
										<td>Template Dummy Subject Line</td>
										<td><span class="badge badge-danger">Billing Support</span></td>
										  <td>Dummy Username</td>
										<td>30th June 2014</td>
										<td><span class="badge badge-danger">High </span></td>
										   <td><a href="#" class="badge badge-success">Details <i class="fa fa-forward"></i></a></td>
									</tr>
									<tr>
										<td>#117</td>
										 <td><span class="badge badge-info">Closed</span></td>
										<td>Template Dummy Subject Line</td>
										<td><span class="badge badge-warning">General Information</span></td>
										 <td>Dummy Username</td>
										<td>12 May 2014</td>
										<td><span class="badge badge-primary">Very High </span></td>
										  <td><a href="#" class="badge badge-success">Details <i class="fa fa-forward"></i></a></td>
									</tr>
									<tr>
										<td>#118</td>
										 <td><span class="badge badge-info">Closed</span></td>
										<td>Template Dummy Subject Line</td>
										<td><span class="badge badge-info">Billing Support</span></td>
										 <td>Dummy Username</td>
										<td>30th June 2014</td>
										<td><span class="badge badge-success">High </span></td>
										  <td><a href="#" class="badge badge-success">Details <i class="fa fa-forward"></i></a></td>
									</tr>
									<tr>
										<td>#119</td>
										 <td><span class="badge badge-info">Closed</span></td>
										<td>Template Dummy Subject Line</td>
										<td><span class="badge badge-danger">General Information</span></td>
										 <td>Dummy Username</td>
										<td>12 May 2014</td>
										<td><span class="badge badge-warning">Very High </span></td>
										  <td><a href="#" class="badge badge-success">Details <i class="fa fa-forward"></i></a></td>
									</tr>
									<tr>
										<td>#120</td>
										 <td><span class="badge badge-danger">Open</span></td>
										<td>Template Dummy Subject Line</td>
										<td><span class="badge badge-success">Billing Support</span></td>
										 <td>Dummy Username</td>
										<td>30th June 2014</td>
										<td><span class="badge badge-info">High </span></td>
										  <td><a href="#" class="badge badge-success">Details <i class="fa fa-forward"></i></a></td>
									</tr>
									<tr>
										<td>#121</td>
										 <td><span class="badge badge-danger">Open</span></td>
										<td>Template Dummy Subject Line</td>
										<td><span class="badge badge-warning">General Information</span></td>
										 <td>Dummy Username</td>
										<td>12 May 2014</td>
										<td><span class="badge badge-danger">Very High </span></td>
										  <td><a href="#" class="badge badge-success">Details <i class="fa fa-forward"></i></a></td>
									</tr>
								</tbody>
							</table>
						</div>
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
	<script src="<?php echo base_url()?>src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url()?>src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url()?>src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url()?>src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
</body>
</html>