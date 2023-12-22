<body class="g-sidenav-show  bg-gray-200">
	<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
		<div class="sidenav-header">
			<i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
			<?php if ($this->session->userdata('level_user') == 'pimpinan') { ?>
				<a class="navbar-brand m-0" href=" <?= base_url('pimpinan') ?> ">
					<img src="<?= base_url() ?>template/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
					<span class="ms-1 font-weight-bold text-white">Telkom Indonesia</span>
				</a>
			<?php } else { ?>
				<a class="navbar-brand m-0" href=" <?= base_url('sales') ?> ">
					<img src="<?= base_url() ?>template/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
					<span class="ms-1 font-weight-bold text-white">Telkom Indonesia</span>
				</a>
			<?php } ?>
		</div>
		<hr class="horizontal light mt-0 mb-2">
		<div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
			<ul class="navbar-nav">
				<?php if ($this->session->userdata('level_user') == 'pimpinan') { ?>
					<li class="nav-item">
						<a class="nav-link text-white <?php if (
															$this->uri->segment(1) == 'pimpinan' && $this->uri->segment(2) == ''
														) {
															echo "active bg-gradient-primary";
														} ?>" href="<?= base_url('pimpinan') ?>">
							<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
								<i class="material-icons opacity-10">dashboard</i>
							</div>
							<span class="nav-link-text ms-1">Dashboard</span>
						</a>
					</li>
				<?php } else { ?>
					<li class="nav-item">
						<a class="nav-link text-white <?php if (
															$this->uri->segment(1) == 'sales' && $this->uri->segment(2) == ''
														) {
															echo "active bg-gradient-primary";
														} ?>" href="<?= base_url('sales') ?>">
							<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
								<i class="material-icons opacity-10">dashboard</i>
							</div>
							<span class="nav-link-text ms-1">Dashboard</span>
						</a>
					</li>
				<?php } ?>
				<?php if ($this->session->userdata('level_user') == 'pimpinan') { ?>
					<!-- <li class="nav-item">
						<a class="nav-link text-white <?php if (
															$this->uri->segment(1) == 'laporan'
														) {
															echo "active bg-gradient-primary";
														} ?> " href="<?= base_url('laporan') ?>">
							<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
								<i class="material-icons opacity-10">book</i>
							</div>
							<span class="nav-link-text ms-1">Master Laporan</span>
						</a>
					</li> -->
					<li class="nav-item">
						<a class="nav-link text-white <?php if (
															$this->uri->segment(1) == 'analisisdummy'
														) {
															echo "active bg-gradient-primary";
														} ?> " href="<?= base_url('analisisdummy') ?>">
							<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
								<i class="material-icons opacity-10">receipt_long</i>
							</div>
							<span class="nav-link-text ms-1">Analisis AHP</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white <?php if (
															$this->uri->segment(2) == 'bulan' and $this->uri->segment(1) == 'analisisdummy'
														) {
															echo "active bg-gradient-primary";
														} ?> " href="<?= base_url('analisisdummy/bulan') ?>">
							<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
								<i class="material-icons opacity-10">receipt_long</i>
							</div>
							<span class="nav-link-text ms-1">Analisis AHP Perbulan</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white <?php if (
															$this->uri->segment(2) == 'tahun' and $this->uri->segment(1) == 'analisisdummy'
														) {
															echo "active bg-gradient-primary";
														} ?> " href="<?= base_url('analisisdummy/tahun') ?>">
							<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
								<i class="material-icons opacity-10">receipt_long</i>
							</div>
							<span class="nav-link-text ms-1">Analisis AHP Pertahun</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white <?php if (
															$this->uri->segment(1) == 'pimpinan' && $this->uri->segment(2) == 'akun'
														) {
															echo "active bg-gradient-primary";
														} ?> " href="<?= base_url('pimpinan/akun') ?>">
							<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
								<i class="material-icons opacity-10">person</i>
							</div>
							<span class="nav-link-text ms-1">Akun Sales</span>
						</a>
					</li>
				<?php } else { ?>
					<li class="nav-item">
						<a class="nav-link text-white <?php if (
															$this->uri->segment(1) == 'sales' && $this->uri->segment(2) == 'absen'
														) {
															echo "active bg-gradient-primary";
														} ?> " href="<?= base_url('sales/absen') ?>">
							<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
								<i class="material-icons opacity-10">table_view</i>
							</div>
							<span class="nav-link-text ms-1">Absensi</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white <?php if (
															$this->uri->segment(1) == 'penjualan'
														) {
															echo "active bg-gradient-primary";
														} ?> " href="<?= base_url('penjualan') ?>">
							<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
								<i class="material-icons opacity-10">receipt_long</i>
							</div>
							<span class="nav-link-text ms-1">Data Penjualan</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white <?php if (
															$this->uri->segment(1) == 'pelanggan'
														) {
															echo "active bg-gradient-primary";
														} ?> " href="<?= base_url('pelanggan') ?>">
							<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
								<i class="material-icons opacity-10">person</i>
							</div>
							<span class="nav-link-text ms-1">Data Pelanggan</span>
						</a>
					</li>
				<?php } ?>
				<li class="nav-item">
					<a class="nav-link text-white <?php if (
														$this->uri->segment(1) == 'home' && $this->uri->segment(2) == 'logout'
													) {
														echo "active bg-gradient-primary";
													} ?>" href="<?= base_url('home/logout') ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">login</i>
						</div>
						<span class="nav-link-text ms-1">Sign Out</span>
					</a>
				</li>
			</ul>
		</div>
	</aside>