<div class="container-fluid px-2 px-md-4">
	<div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
		<span class="mask  bg-gradient-primary  opacity-6"></span>
	</div>
	<div class="card card-body mx-3 mx-md-4 mt-n6">
		<?php foreach ($detail as $key => $detail) { ?>
			<div class="row gx-4 mb-2">
				<div class="col-auto">

				</div>
				<div class="col-auto my-auto">
					<div class="h-100">
						<h5 class="mb-1">
							<?= $detail->nama_pelanggan ?>
						</h5>
						<p class="mb-0 font-weight-normal text-sm">
							<?= $detail->tipe_pelanggan ?>
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="row">
					<div class="col-12 col-xl-4">
						<div class="card card-plain h-100">
							<div class="card-header pb-0 p-3">
								<h6 class="mb-0">Data Permintaan</h6>
							</div>
							<div class="card-body p-3">
								<h6 class="text-uppercase text-body text-xs font-weight-bolder">No Permintaan</h6>
								<ul class="list-group">
									<li class="list-group-item border-0 px-0">
										<div class="form-check form-switch ps-0">
											<label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault"><?= $detail->no_permintaan ?></label>
										</div>
									</li>
								</ul>
								<h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">Jenis Perhomohonan</h6>
								<ul class="list-group">
									<li class="list-group-item border-0 px-0">
										<div class="form-check form-switch ps-0">
											<label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault3"><?= $detail->jenis_permohonan ?></label>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-12 col-xl-4">
						<div class="card card-plain h-100">
							<div class="card-header pb-0 p-3">
								<div class="row">
									<div class="col-md-8 d-flex align-items-center">
										<h6 class="mb-0">Data pelanggan</h6>
									</div>
									<div class="col-md-4 text-end">
										<!-- <a href="javascript:;">
											<i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
										</a> -->
									</div>
								</div>
							</div>
							<div class="card-body p-3">
								<ul class="list-group">
									<li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; <?= $detail->nama_pelanggan ?></li>
									<li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Tipe Pelanggan:</strong> &nbsp; <?= $detail->tipe_pelanggan ?></li>
									<li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">No. KTP:</strong> &nbsp; <?= $detail->no_ktp ?></li>
									<li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Alamat Installasi:</strong> &nbsp; <?= $detail->alamat_instalasi ?></li>
									<li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Alamat Pelanggan:</strong> &nbsp; <?= $detail->alamat_pelanggan ?></li>
									<li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Kode Pos:</strong> &nbsp; <?= $detail->kode_pos ?></li>
									<li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Kota</strong> &nbsp; <?= $detail->kota ?></li>
									<li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">No. Telepon:</strong> &nbsp; <?= $detail->no_tlpn ?></li>
									<li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">No. Handphone:</strong> &nbsp; <?= $detail->no_hp ?></li>
									<li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <?= $detail->email ?></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-12 col-xl-4">
						<div class="card card-plain h-100">
							<div class="card-header pb-0 p-3">
								<h6 class="mb-0">Layanan IndiHome</h6>
							</div>
							<div class="card-body p-3">
								<ul class="list-group">
									<li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
										<div class="d-flex align-items-start flex-column justify-content-center">
											<h6 class="mb-0 text-sm">Nomor Telepon / Internet</h6>
											<p class="mb-0 text-xs"><?= $detail->no_tlp_internet ?></p>
										</div>
									</li>
									<li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
										<div class="d-flex align-items-start flex-column justify-content-center">
											<h6 class="mb-0 text-sm">Produk Layanan</h6>
											<p class="mb-0 text-xs"><?= $detail->paket ?></p>
										</div>
									</li>
									<li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
										<div class="d-flex align-items-start flex-column justify-content-center">
											<h6 class="mb-0 text-sm">Kecepatan</h6>
											<p class="mb-0 text-xs"><?= $detail->kecepatan ?></p>
										</div>
									</li>
									<li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
										<div class="d-flex align-items-start flex-column justify-content-center">
											<h6 class="mb-0 text-sm">Perangkat</h6>
											<p class="mb-0 text-xs"><?= $detail->perangkat ?></p>
										</div>
									</li>
									<li class="list-group-item border-0 d-flex align-items-center px-0">
										<div class="d-flex align-items-start flex-column justify-content-center">
											<h6 class="mb-0 text-sm">Fitur Tambahan</h6>
											<p class="mb-0 text-xs"><?= $detail->fitur_tambahan ?></p>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-12 mt-4">
						<div class="mb-5 ps-3">
							<h6 class="mb-1">BIAYA BULANAN</h6>
						</div>
						<div class="row">
							<div class="col-xl-4 col-md-6 mb-xl-0 mb-4">
								<div class="card card-blog card-plain">
									<div class="card-header p-0 mt-n4 mx-3">
									</div>
									<div class="card-body p-3">
										<a href="javascript:;">
											<h6>
												Biaya Paket IndiHome
											</h6>
										</a>
										<p class="mb-4 text-sm">
											Rp.<?= number_format($detail->biaya_paket, 0) ?>
										</p>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-md-6 mb-xl-0 mb-4">
								<div class="card card-blog card-plain">
									<div class="card-header p-0 mt-n4 mx-3">
									</div>
									<div class="card-body p-3">
										<a href="javascript:;">
											<h6>
												Biaya Paket Tambahan (add-on)
											</h6>
										</a>
										<p class="mb-4 text-sm">
											Rp.<?= number_format($detail->biaya_paket_tambahan, 0) ?>
										</p>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-md-6 mb-xl-0 mb-4">
								<div class="card card-blog card-plain">
									<div class="card-header p-0 mt-n4 mx-3">

									</div>
									<div class="card-body p-3">
										<a href="javascript:;">
											<h6>
												Biaya Sewa Perangkat (CPE)
											</h6>
										</a>
										<p class="mb-4 text-sm">
											Rp.<?= number_format($detail->biaya_sewa_perangkat, 0) ?>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 mt-4">
						<div class="mb-5 ps-3">
							<h6 class="mb-1"> Biaya Bayar di Depan</h6>
						</div>
						<div class="row">
							<div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
								<div class="card card-blog card-plain">
									<div class="card-header p-0 mt-n4 mx-3">
									</div>
									<div class="card-body p-3">
										<a href="javascript:;">
											<h6>
												Biaya Pembelian CPE
											</h6>
										</a>
										<p class="mb-4 text-sm">
											Rp.<?= number_format($detail->biaya_pembelian_cpe, 0) ?>
										</p>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
								<div class="card card-blog card-plain">
									<div class="card-header p-0 mt-n4 mx-3">
									</div>
									<div class="card-body p-3">
										<a href="javascript:;">
											<h6>
												Biaya Instalasi
											</h6>
										</a>
										<p class="mb-4 text-sm">
											Rp.<?= number_format($detail->biaya_instalasi, 0) ?>
										</p>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
								<div class="card card-blog card-plain">
									<div class="card-header p-0 mt-n4 mx-3">

									</div>
									<div class="card-body p-3">
										<a href="javascript:;">
											<h6>
												Uang Jaminan CPE
											</h6>
										</a>
										<p class="mb-4 text-sm">
											Rp.<?= number_format($detail->uang_jaminan, 0) ?>
										</p>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
								<div class="card card-blog card-plain">
									<div class="card-header p-0 mt-n4 mx-3">

									</div>
									<div class="card-body p-3">
										<a href="javascript:;">
											<h6>
												Biaya Pasang Baru (PSB) IndiHome
											</h6>
										</a>
										<p class="mb-4 text-sm">
											Rp.<?= number_format($detail->biaya_pasang_baru, 0) ?>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>