<div class="container-fluid py-4">
	<div class="row">
		<div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
			<div class="card">
				<div class="card-header p-3 pt-2">
					<?php foreach ($penjualan as $key => $jual) { ?>
					<?php } ?>
					<div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
						<i class="material-icons opacity-10">payments</i>
					</div>
					<div class="text-end pt-1">
						<p class="text-sm mb-0 text-capitalize">Data Penjualan Perhari</p>
						<h4 class="mb-0"><?= $jual->jml_jual ?></h4>
					</div>
				</div>
				<hr class="dark horizontal my-0">
				<div class="card-footer p-3">
					<!-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than lask week</p> -->
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
			<div class="card">
				<div class="card-header p-3 pt-2">
					<div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
						<i class="material-icons opacity-10">person</i>
					</div>
					<div class="text-end pt-1">
						<p class="text-sm mb-0 text-capitalize">Data Pelanggan</p>
						<h4 class="mb-0"><?= $pelanggan ?></h4>
					</div>
				</div>
				<hr class="dark horizontal my-0">
				<div class="card-footer p-3">
					<!-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than lask month</p> -->
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
			<div class="card">
				<?php foreach ($absen as $key => $absensi) { ?>
				<?php } ?>
				<div class="card-header p-3 pt-2">
					<div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
						<i class="material-icons opacity-10">person</i>
					</div>
					<div class="text-end pt-1">
						<p class="text-sm mb-0 text-capitalize">Data Absensi Kehadiran Perbulan</p>
						<h4 class="mb-0"><?= $absensi->jml_absen ?></h4>
					</div>
				</div>
				<hr class="dark horizontal my-0">
				<div class="card-footer p-3">
					<!-- <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p> -->
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-4">
	</div>
	<div class="row mb-4">
		<div class="col-lg-8 col-md-6 mb-md-0 mb-4">
			<div class="card">
				<div class="card-header pb-0">
					<div class="row">
						<div class="col-lg-6 col-7">
							<h6>Data Penjualan</h6>
							<p class="text-sm mb-0">
								<i class="fa fa-check text-info" aria-hidden="true"></i>
								<span class="font-weight-bold ms-1">1 Bulan</span>
							</p>
						</div>
					</div>
				</div>
				<div class="card-body px-0 pb-2">
					<div class="table-responsive">
						<table class="table align-items-center mb-0">
							<thead>
								<tr>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pelanggan</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Paket</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Durasi Paket</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Denda</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($total_jual as $key => $value) { ?>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm"><?= $value->nama_pelanggan ?></h6>
												</div>
											</div>
										</td>
										<td class="align-middle text-center text-sm">
											<span class="text-xs font-weight-bold"> <?= $value->produk_layanan ?>,<?= $value->paket ?> </span>
										</td>
										<td class="align-middle text-center text-sm">
											<span class="text-xs font-weight-bold"> <?= $value->durasi_langganan ?> </span>
										</td>
										<td class="align-middle">
											<div class="progress-wrapper w-75 mx-auto">
												<div class="progress-info">
													<div class="progress-percentage">
														<?php if ($value->durasi_langganan >= 12) { ?>
															<span class="text-xs font-weight-bold">Rp. 0</span>
														<?php } else { ?>
															<span class="text-xs font-weight-bold">Rp. 1.000.000</span>
														<?php } ?>
													</div>
												</div>
											</div>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-6">
			<div class="card h-100">
				<div class="card-header pb-0">
					<h6>Total Keseluruhan Absensi</h6>
					<p class="text-sm">
						<i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
						<span class="font-weight-bold">1</span> Bulan
					</p>
				</div>
				<div class="card-body p-3">
					<div class="timeline timeline-one-side">
						<div class="timeline-block mb-3">
							<?php foreach ($absen as $key => $ab) { ?>
							<?php } ?>
							<span class="timeline-step">
								<i class="material-icons text-success text-gradient">notifications</i>
							</span>
							<div class="timeline-content">
								<h6 class="text-dark text-sm font-weight-bold mb-0"><?= $ab->jml_absen ?> x Hadir</h6>
								<!-- <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p> -->
							</div>
						</div>
						<div class="timeline-block mb-3">
							<?php foreach ($sakit as $key => $as) { ?>
							<?php } ?>
							<span class="timeline-step">
								<i class="material-icons text-danger text-gradient">code</i>
							</span>
							<div class="timeline-content">
								<h6 class="text-dark text-sm font-weight-bold mb-0"><?= $as->jml_sakit ?> x Sakit</h6>
								<!-- <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p> -->
							</div>
						</div>
						<div class="timeline-block mb-3">
							<?php foreach ($ijin as $key => $ai) { ?>
							<?php } ?>
							<span class="timeline-step">
								<i class="material-icons text-info text-gradient">shopping_cart</i>
							</span>
							<div class="timeline-content">
								<h6 class="text-dark text-sm font-weight-bold mb-0"><?= $ai->jml_ijin ?> x Izin</h6>
								<!-- <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p> -->
							</div>
						</div>
						<div class="timeline-block mb-3">
							<?php foreach ($cuti as $key => $ac) { ?>
							<?php } ?>
							<span class="timeline-step">
								<i class="material-icons text-warning text-gradient">credit_card</i>
							</span>
							<div class="timeline-content">
								<h6 class="text-dark text-sm font-weight-bold mb-0"><?= $ac->jml_cuti ?> x Cuti</h6>
								<!-- <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>