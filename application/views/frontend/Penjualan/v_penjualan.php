<!-- End Navbar -->
<div class="container-fluid py-4">
	<div class="row">
		<div class="col-12">
			<div class="card my-4">
				<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
						<h6 class="text-white text-capitalize ps-3"><?= $title ?></h6>
						<div class="col-lg-3 col-sm-6 col-12">
							<button type="button" class="btn bg-gradient-success w-100 mb-0 toast-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
								Tambah Pejualan
							</button>
						</div>
					</div>
				</div>
				<div class="card-body px-0 pb-2">
					<div class="table-responsive p-0">
						<table class="table align-items-center mb-0">
							<thead>
								<tr>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pelanggan</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No HP</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Penjualan</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
									<th class="text-secondary opacity-7"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($penjualan as $key => $value) { ?>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm"><?= $value->nama_pelanggan ?></h6>
												</div>
											</div>
										</td>
										<td>
											<p class="text-xs font-weight-bold mb-0"><?= $value->no_hp ?></p>
										</td>
										<td class="align-middle text-center text-sm">
											<span class="badge badge-sm bg-gradient-success"><?= $value->tgl_penjualan ?></span>
										</td>
										<td class="align-middle text-center">
											<span class="text-secondary text-xs font-weight-bold"><?= $value->alamat ?></span>
										</td>
										<td class="align-middle">
											<button type="button" class="btn bg-gradient-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $value->id_penjualan ?>">
												Edit
											</button>
											<button type="button" class="btn bg-gradient-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?= $value->id_penjualan ?>">
												Hapus
											</button>
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

	<!-- Modal Absensi -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<?php
				// date_default_timezone_set('Asia/Jakarta');
				echo form_open('penjualan/add')
				?>
				<div class="modal-body">
					<label class="form-label">Nama Pelanggan</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="nama_pelanggan" class="form-control">
					</div>
					<label class="form-label">No Hp</label>
					<div class="input-group input-group-outline mb-3">
						<input type="number" name="no_hp" class="form-control">
					</div>
					<label class="form-label">Alamat</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="alamat" class="form-control">
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

	<!-- Modal Edit -->
	<?php foreach ($penjualan as $key => $edit) { ?>
		<div class="modal fade" id="edit<?= $edit->id_penjualan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<?php
					echo form_open('penjualan/update/' . $edit->id_penjualan)
					?>
					<div class="modal-body">
						<label class="form-label">Nama Pelanggan</label>
						<div class="input-group input-group-outline mb-3">
							<input type="text" name="nama_pelanggan" value="<?= $edit->nama_pelanggan ?>" class="form-control">
						</div>
						<label class="form-label">No Hp</label>
						<div class="input-group input-group-outline mb-3">
							<input type="number" name="no_hp" value="<?= $edit->no_hp ?>" class="form-control">
						</div>
						<label class="form-label">Alamat</label>
						<div class="input-group input-group-outline mb-3">
							<input type="text" name="alamat" value="<?= $edit->alamat ?>" class="form-control">
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
	<?php } ?>

	<!-- Modal Hapus -->
	<?php foreach ($penjualan as $key => $hapus) { ?>
		<div class="modal fade" id="hapus<?= $hapus->id_penjualan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<?php
					// date_default_timezone_set('Asia/Jakarta');
					echo form_open('penjualan/delete/' . $hapus->id_penjualan)
					?>
					<div class="modal-body">
						<h6>Yakin Hapus Data Penjualan <?= $hapus->nama_pelanggan ?></h6>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
					<?php echo form_close() ?>
				</div>
			</div>
		</div>
	<?php } ?>