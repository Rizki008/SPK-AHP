<!-- End Navbar -->
<div class="container-fluid py-4">
	<div class="card mt-4">
		<div class="card-header p-3">
			<h5 class="mb-0"><?= $title ?></h5>
		</div>
		<div class="card-body p-3">
			<div class="row">
				<div class="col-lg-3 col-sm-6 col-12">
					<button type="button" class="btn bg-gradient-success w-100 mb-0 toast-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
						Absen
					</button>
				</div>
				<div class="col-lg-3 col-sm-6 col-12 mt-sm-0 mt-2">
					<button type="button" class="btn bg-gradient-info w-100 mb-0 toast-btn" data-bs-target="#infoToast" data-bs-toggle="modal">Izin</button>
				</div>
				<div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
					<button class="btn bg-gradient-warning w-100 mb-0 toast-btn" type="button" data-bs-toggle="modal" data-bs-target="#warningToast">Cuti</button>
				</div>
				<div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
					<button class="btn bg-gradient-danger w-100 mb-0 toast-btn" type="button" data-bs-toggle="modal" data-bs-target="#dangerToast">Sakit</button>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-12">
			<div class="card my-4">
				<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
						<h6 class="text-white text-capitalize ps-3"><?= $title ?></h6>
					</div>
				</div>
				<br>
				<?php if ($this->session->userdata('pesan')) { ?>
					<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
						<div class="alert alert-success" role="alert">
							<h6 class="text-white text-capitalize ps-3"><?= $this->session->userdata('pesan') ?></p>
						</div>
					</div>
				<?php } ?>
				<?php if ($this->session->userdata('error')) { ?>
					<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
						<div class="alert alert-danger" role="alert">
							<h6 class="text-white text-capitalize ps-3"><?= $this->session->userdata('error') ?></p>
						</div>
					</div>
				<?php } ?>
				<div class="card-body px-0 pb-2">
					<div class="table-responsive p-0">
						<nav>
							<div class="nav nav-tabs" id="nav-tab" role="tablist">
								<button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Absensi</button>
								<button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Izin</button>
								<button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Cuti</button>
								<button class="nav-link" id="nav-sakit-tab" data-bs-toggle="tab" data-bs-target="#nav-sakit" type="button" role="tab" aria-controls="nav-sakit" aria-selected="false">Sakit</button>
							</div>
						</nav>
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
								<table class="table align-items-center mb-0">
									<thead>
										<tr>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Absensi</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jam Absensi</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
											<th class="text-secondary opacity-7"></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($absen as $key => $value) { ?>
											<tr>
												<td>
													<div class="d-flex px-2 py-1">
														<div>
															<img src="<?= base_url() ?>template/assets/img/team-3.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
														</div>
														<div class="d-flex flex-column justify-content-center">
															<h6 class="mb-0 text-sm"><?= $value->nama_lengkap ?></h6>
														</div>
													</div>
												</td>
												<td>
													<p class="text-xs font-weight-bold mb-0"><?= $value->tanggal_absen ?></p>
												</td>
												<td class="align-middle text-center text-sm">
													<?php if ($value->jam_absen >= '09:00:00') { ?>
														<span class="badge badge-sm bg-gradient-danger">
															<?= $value->jam_absen ?>
														</span>
													<?php } else { ?>
														<span class="badge badge-sm bg-gradient-success">
															<?= $value->jam_absen ?>
														</span>
													<?php } ?>
												</td>
												<td class="align-middle text-center">
													<?php if ($value->keterangan_absen == 'Telat') { ?>
														<span class="badge badge-sm bg-gradient-danger">Telat</span>
													<?php } else { ?>
														<span class="badge badge-sm bg-gradient-success">Tepat Waktu</span>
													<?php } ?>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
							<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
								<table class="table align-items-center mb-0">
									<thead>
										<tr>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Absensi</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jam Absensi</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
											<th class="text-secondary opacity-7"></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($izin as $key => $ijinz) { ?>
											<tr>
												<td>
													<div class="d-flex px-2 py-1">
														<div>
															<img src="<?= base_url() ?>template/assets/img/team-3.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
														</div>
														<div class="d-flex flex-column justify-content-center">
															<h6 class="mb-0 text-sm"><?= $ijinz->nama_lengkap ?></h6>
														</div>
													</div>
												</td>
												<td>
													<p class="text-xs font-weight-bold mb-0"><?= $ijinz->tanggal_ijin ?></p>
												</td>
												<td class="align-middle text-center text-sm">
													<span class="badge badge-sm bg-gradient-success">
														<?= $ijinz->awal_ijin ?>
													</span> -
													<span class="badge badge-sm bg-gradient-warning">
														<?= $ijinz->akhir_ijin ?>
													</span>
												</td>
												<td class="align-middle text-center">
													<span class="badge badge-sm bg-gradient-warning"><?= $ijinz->keterangan_ijin ?></span>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
							<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
								<table class="table align-items-center mb-0">
									<thead>
										<tr>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Absensi</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jam Absensi</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
											<th class="text-secondary opacity-7"></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($cuti as $key => $cutis) { ?>
											<tr>
												<td>
													<div class="d-flex px-2 py-1">
														<div>
															<img src="<?= base_url() ?>template/assets/img/team-3.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
														</div>
														<div class="d-flex flex-column justify-content-center">
															<h6 class="mb-0 text-sm"><?= $cutis->nama_lengkap ?></h6>
														</div>
													</div>
												</td>
												<td>
													<p class="text-xs font-weight-bold mb-0"><?= $cutis->tanggal_cuti ?></p>
												</td>
												<td class="align-middle text-center text-sm">
													<span class="badge badge-sm bg-gradient-success">
														<?= $cutis->awal_cuti ?>
													</span> -
													<span class="badge badge-sm bg-gradient-warning">
														<?= $cutis->akhir_cuti ?>
													</span>
												</td>
												<td class="align-middle text-center">
													<span class="badge badge-sm bg-gradient-info"><?= $cutis->keterangan_cuti ?></span>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
							<div class="tab-pane fade" id="nav-sakit" role="tabpanel" aria-labelledby="nav-sakit-tab">
								<table class="table align-items-center mb-0">
									<thead>
										<tr>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Absensi</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jam Absensi</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
											<th class="text-secondary opacity-7"></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($sakit as $key => $sakits) { ?>
											<tr>
												<td>
													<div class="d-flex px-2 py-1">
														<div>
															<img src="<?= base_url() ?>template/assets/img/team-3.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
														</div>
														<div class="d-flex flex-column justify-content-center">
															<h6 class="mb-0 text-sm"><?= $sakits->nama_lengkap ?></h6>
														</div>
													</div>
												</td>
												<td>
													<p class="text-xs font-weight-bold mb-0"><?= $sakits->tanggal_sakit ?></p>
												</td>
												<td class="align-middle text-center text-sm">
													<span class="badge badge-sm bg-gradient-success">
														<?= $sakits->awal_sakit ?>
													</span> -
													<span class="badge badge-sm bg-gradient-warning">
														<?= $sakits->akhir_sakit ?>
												</td>
												<td class="align-middle text-center">
													<span class="badge badge-sm bg-gradient-warning"><?= $sakits->keterangan_sakit ?></span>
												</td>
												<td class="align-middle text-center">
													<img src="<?= base_url('assets/sakit/' . $sakits->surat_sakit) ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Absensi -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<?php
				date_default_timezone_set('Asia/Jakarta');
				echo form_open('sales/add_absen')
				?>
				<input type="hidden" name="nama_lengkap" value="<?= $this->session->userdata('nama_lengkap') ?>" class="form-control">
				<input type="hidden" name="tanggal_absen" value="<?= date('Y-m-d') ?>" class="form-control">
				<input type="hidden" name="jam_absen" value="<?= date('H:i:s') ?>" class="form-control">
				<?php if (date('H:i:s') >= '09:00:00') { ?>
					<input type="hidden" name="keterangan_absen" value="Telat" class="form-control">
				<?php } else { ?>
					<input type="hidden" name="keterangan_absen" value="Tepat waktu" class="form-control">
				<?php } ?>
				<div class="modal-body">
					<?php date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia 
					?>
					<label class="form-label">Nama Lengkap</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="nama_lengkap" value="<?= $this->session->userdata('nama_lengkap') ?>" class="form-control" readonly>
					</div>
					<label class="form-label">Tanggal Absen</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="tanggal_absen" value="<?= date('Y-m-d') ?>" class="form-control" readonly>
					</div>
					<label class="form-label">Jam Absen</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="jam_absen" value="<?= date('H:i:s') ?>" class="form-control" readonly>
					</div>
					<label class="form-label">Keterangan Absen</label>
					<div class="input-group input-group-outline mb-3">
						<?php if (date('H:i:s') > '09:00:00') { ?>
							<span class="badge badge-sm bg-gradient-danger">Telat</span>
							<!-- <input type="text" name="keterangan_absen" value="Telat" class="form-control" readonly> -->
						<?php } else { ?>
							<!-- <input type="text" name="keterangan_absen" value="Tepat waktu" class="form-control" readonly> -->
							<span class="badge badge-sm bg-gradient-success">Tepat Waktu</span>
						<?php } ?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>

	<!-- Modal Absensi Izin -->
	<div class="modal fade" id="infoToast" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<?php
				echo form_open('sales/add_izin')
				?>
				<input type="hidden" name="nama_lengkap" value="<?= $this->session->userdata('nama_lengkap') ?>" class="form-control">
				<input type="hidden" name="tanggal_ijin" value="<?= date('Y-m-d') ?>" class="form-control">
				<div class="modal-body">
					<?php date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia 
					?>
					<label class="form-label">Nama Lengkap</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="nama_lengkap" value="<?= $this->session->userdata('nama_lengkap') ?>" class="form-control" readonly>
					</div>
					<label class="form-label">Tanggal Izin</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="tanggal_ijin" value="<?= date('Y-m-d') ?>" class="form-control" readonly>
					</div>
					<label class="form-label">Tanggal Awal Izin</label>
					<div class="input-group input-group-outline mb-3">
						<input type="date" class="form-control" name="awal_ijin" id="searchDateFrom">
					</div>
					<label class="form-label">Tanggal Akhir Izin</label>
					<div class="input-group input-group-outline mb-3">
						<input type="date" class="form-control" name="akhir_ijin" id="searchDateTo">
					</div>
					<label class="form-label">Keterangan Izin</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="keterangan_ijin" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>

	<!-- Modal Absensi Cuti -->
	<div class="modal fade" id="warningToast" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<?php
				echo form_open('sales/add_cuti')
				?>
				<input type="hidden" name="nama_lengkap" value="<?= $this->session->userdata('nama_lengkap') ?>" class="form-control">
				<input type="hidden" name="tanggal_cuti" value="<?= date('Y-m-d') ?>" class="form-control">
				<div class="modal-body">
					<?php
					?>
					<label class="form-label">Nama Lengkap</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="nama_lengkap" value="<?= $this->session->userdata('nama_lengkap') ?>" class="form-control" readonly>
					</div>
					<label class="form-label">Tanggal Cuti</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="tanggal_cuti" value="<?= date('Y-m-d') ?>" class="form-control" readonly>
					</div>
					<label class="form-label">Tanggal Awal Cuti</label>
					<div class="input-group input-group-outline mb-3">
						<input type="date" class="form-control" name="awal_cuti" id="searchDateFromCuti">
					</div>
					<label class="form-label">Tanggal Akhir Cuti</label>
					<div class="input-group input-group-outline mb-3">
						<input type="date" class="form-control" name="akhir_cuti" id="searchDateToCuti">
					</div>
					<label class="form-label">Keterangan Cuti</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="keterangan_cuti" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>

	<!-- Modal Absensi Sakit -->
	<div class="modal fade" id="dangerToast" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<?php
				echo form_open_multipart('sales/add_sakit')
				?>
				<input type="hidden" name="nama_lengkap" value="<?= $this->session->userdata('nama_lengkap') ?>" class="form-control">
				<input type="hidden" name="tanggal_cuti" value="<?= date('Y-m-d') ?>" class="form-control">
				<div class="modal-body">
					<?php
					?>
					<label class="form-label">Nama Lengkap</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="nama_lengkap" value="<?= $this->session->userdata('nama_lengkap') ?>" class="form-control" readonly>
					</div>
					<label class="form-label">Tanggal Sakit</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="tanggal_sakit" value="<?= date('Y-m-d') ?>" class="form-control" readonly>
					</div>
					<label class="form-label">Tanggal Awal Sakit</label>
					<div class="input-group input-group-outline mb-3">
						<input type="date" class="form-control" name="awal_sakit" id="searchDateFromsakit">
					</div>
					<label class="form-label">Tanggal Akhir Sakit</label>
					<div class="input-group input-group-outline mb-3">
						<input type="date" class="form-control" name="akhir_sakit" id="searchDateTosakit">
					</div>
					<label class="form-label">Keterangan Sakit</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="keterangan_sakit" class="form-control">
					</div>
					<label class="form-label">Keterangan Sakit</label>
					<div class="input-group input-group-outline mb-3">
						<input type="file" name="surat_sakit" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>