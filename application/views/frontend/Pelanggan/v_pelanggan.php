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
								Tambah Pelanggan
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
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Paket</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Durasi Langganan</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Denda</th>
									<th class="text-secondary opacity-7"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($pelanggan as $key => $value) { ?>
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
											<span class="badge badge-sm bg-gradient-success"><?= $value->tgl_kontrak_langganan ?></span>
										</td>
										<td class="align-middle text-center">
											<span class="text-secondary text-xs font-weight-bold"><?= $value->produk_layanan ?>,<?= $value->paket ?></span>
										</td>
										<td class="align-middle text-center">
											<span class="text-secondary text-xs font-weight-bold"><?= $value->durasi_langganan ?> Bulan</span>
										</td>
										<td class="align-middle text-center">
											<?php if ($value->durasi_langganan >= '12') { ?>
												<span class="badge badge-sm bg-gradient-info">0</span>
											<?php } else { ?>
												<span class="badge badge-sm bg-gradient-warning">Rp. 1.000.000</span>
											<?php } ?>
										</td>
										<td class="align-middle">
											<button type="button" class="btn bg-gradient-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $value->id_pelanggan ?>">
												Edit
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
				echo form_open('pelanggan/add')
				?>
				<div class="modal-body">
					<label class="form-label">Nama Pelanggan</label>
					<div class="input-group input-group-outline mb-3">
						<?php $penjualan = $this->m_sales->penjualan(); ?>
						<select name="id_penjualan" class="form-control">
							<?php foreach ($penjualan as $key => $jual) { ?>
								<option value="<?= $jual->id_penjualan ?>"><?= $jual->nama_pelanggan ?></option>
							<?php } ?>
						</select>
					</div>
					<!-- <label class="form-label">Durasi Langganan</label>
					<div class="input-group input-group-outline mb-3">
						<select name="durasi_langganan" class="form-control" id="">
							<option value="3">3 Bulan</option>
							<option value="6">6 Bulan</option>
							<option value="12">1 Tahun</option>
						</select>
					</div> -->
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
	<?php foreach ($pelanggan as $key => $rows) { ?>
		<div class="modal fade" id="edit<?= $rows->id_pelanggan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<?php
					echo form_open('pelanggan/update/' . $rows->id_pelanggan)
					?>
					<div class="modal-body">
						<label class="form-label">Nama Pelanggan</label>
						<div class="input-group input-group-outline mb-3">
							<?php $penjualan = $this->m_sales->penjualan(); ?>
							<select name="id_penjualan" class="form-control">
								<option value="<?= $rows->id_penjualan ?>"><?= $rows->nama_pelanggan ?></option>
								<?php foreach ($penjualan as $key => $jual) { ?>
									<option value="<?= $jual->id_penjualan ?>"><?= $jual->nama_pelanggan ?></option>
								<?php } ?>
							</select>
						</div>
						<!-- <label class="form-label">Durasi Langganan</label>
						<div class="input-group input-group-outline mb-3">
							<select name="durasi_langganan" class="form-control" id="">
								<option value="<?= $rows->durasi_langganan ?>"><?= $rows->durasi_langganan ?></option>
								<option value="3">3 Bulan</option>
								<option value="6">6 Bulan</option>
								<option value="12">1 Tahun</option>
							</select>
						</div> -->
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
