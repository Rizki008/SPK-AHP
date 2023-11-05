<div class="container-fluid py-4">
	<div class="card mt-4">
		<div class="card-header p-3">
			<h5 class="mb-0"><?= $title ?></h5>
		</div>
		<div class="col-md-12 mb-lg-0 mb-4">
			<div class="card-body p-3">
				<div class="row">
					<div class="card-header">
						<h5>Priode Analisis</h5>
					</div>
					<?php echo form_open('AnalisisDummy/hitung_penjualan') ?>
					<div class="row">
						<div class="col">
							<label class="form-label">Priode Analisis</label>
							<div class="input-group input-group-outline mb-3">
								<select name="bulan" id="analisis" class="form-control">
									<option>---Pilih Priode Analisis---</option>
									<?php foreach ($periode as $key => $value) {
										$cek_analisis = $this->M_analisis->cek_analisis_penjualan($value->bulan, $value->tahun);
									?>
										<option data-tahun="<?= $value->tahun ?>" data-bulan="<?= $value->bulan ?>" value="<?= $value->bulan ?>" <?php if ($cek_analisis) {
																																						echo 'disabled';
																																					} ?>>Bulan <?= $value->bulan ?> - Tahun <?= $value->tahun ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<input type="text" name="tahun" class="tahun form-control" hidden>
						<input type="text" name="bulan" class="bulan form-control" hidden>
					</div>
					<div class="text-center">
						<button class="btn bg-gradient-info w-100 mb-0 toast-btn" type="submit">Hitung</button>
					</div>
					<?php echo form_close() ?>
				</div>
			</div>
		</div>
		<div class="card-body px-0 pb-2">
			<div class="table-responsive p-0">
				<table class="table align-items-center mb-0">
					<thead>
						<tr>
							<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
							<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Priode Analisis</th>
							<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hasil Analisis</th>
							<th class="text-secondary opacity-7"></th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($bulantahun as $key => $value) { ?>
							<tr>
								<td>
									<div class="d-flex px-2 py-1">
										<div>
											<!-- <img src="<?= base_url() ?>template/assets/img/team-3.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user2"> -->
										</div>
										<div class="d-flex flex-column justify-content-center">
											<h6 class="mb-0 text-sm"><?= $no++ ?></h6>
										</div>
									</div>
								</td>
								<td>
									<span class="badge badge-sm bg-gradient-success">Bulan <?= $value->bulan ?>&nbsp;Tahun <?= $value->tahun ?></span>
								</td>
								<td class="align-middle text-center text-sm">
									<a href="<?= base_url('AnalisisDummy/hasil_penjualan/' . $value->bulan . '/' . $value->tahun) ?>" class="btn bg-gradient-info btn-sm">
										Lihat Hasil
									</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<br>