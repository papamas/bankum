	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="<?php echo site_url()?>/home">
				<img src="<?php echo base_url()?>vendors/images/bankumApp.svg" alt="" class="dark-logo">
				<img src="<?php echo base_url()?>vendors/images/bankumAppw.svg" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="<?php echo site_url()?>/home" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
						</a>
						
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-email"></span><span class="mtext">Surat Saksi/Ahli</span>
						</a>
						<ul class="submenu">
							<li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">
									<span class="micon fa fa-envelope-open"></span><span class="mtext">Permintaan </span>
								</a>
								<ul class="submenu child">
									<li><a href="<?php echo site_url()?>/permintaan">Tambah</a></li>
									<li><a href="<?php echo site_url()?>/permintaan/daftar">Daftar</a></li>
								</ul>
							</li>
							
							<li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">
									<span class="micon fa fa-vcard"></span><span class="mtext">Penunjukan </span>
								</a>
								<ul class="submenu child">
									<li><a href="<?php echo site_url()?>/penunjukan">Tambah</a></li>
									<li><a href="<?php echo site_url()?>/penunjukan/daftar">Daftar</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">
									<span class="micon fa fa-users"></span><span class="mtext">Pendampingan </span>
								</a>
								<ul class="submenu child">
									<li><a href="<?php echo site_url()?>/pendampingan">Tambah</a></li>
									<li><a href="<?php echo site_url()?>/pendampingan/daftar">Daftar</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-id-card"></span><span class="mtext">Rekam Perkara</span>
						</a>
						<ul class="submenu">
							<li><a href="<?php echo site_url()?>/perkara">Tambah Perkara</a></li>
							<li><a href="<?php echo site_url()?>/perkara/daftar">Daftar Perkara</a></li>						
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Laporan</span>
						</a>
						<ul class="submenu">
							<li><a href="<?php echo site_url()?>/laporan/">Penunjukan Saksi/Ahli</a></li>
							<li><a href="<?php echo site_url()?>/laporan/pendampingan">Pendamping Saksi/Ahli</a></li>
							<li><a href="<?php echo site_url()?>/laporan/perkara">Perkara</a></li>
						</ul>
					</li>
					
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon fi fi-check"></span><span class="mtext"> Approval</span>
						</a>
						<ul class="submenu">
							<li><a href="<?php echo site_url()?>/approval">Penunjukan Saksi/Ahli</a></li>
							<li><a href="<?php echo site_url()?>/approval/pendampingan">Pendamping Saksi/Ahli</a></li>
							<li><a href="<?php echo site_url()?>/approval/perkara">Perkara</a></li>
						</ul>
					</li>
					
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-help"></span><span class="mtext">Helpdesk</span>
						</a>
						<ul class="submenu">
							<li><a href="<?php echo site_url()?>/tiket">Tiket</a></li>							
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-idea1"></span><span class="mtext">Peraturan</span>
						</a>
						<ul class="submenu">
							<li><a href="<?php echo site_url()?>/faq">FAQ</a></li>
							<li><a href="<?php echo site_url()?>/kb">Knowledge</a></li>							
						</ul>
					</li>
					
				</ul>
			</div>
		</div>
	</div>