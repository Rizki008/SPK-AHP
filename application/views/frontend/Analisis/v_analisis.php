<div class="container-fluid py-4">
	<div class="card mt-4">
		<div class="card-header p-3">
			<h5 class="mb-0"><?= $title ?></h5>
			<br>
			<h6>Informasi Alur Perhitungan : </h6>
			<p>Hasil Dari Perhitungan Analisis diambil dari data <br>
				1. Absensi Selama satu bulan Dengan nilai bobot 25%<br>
				2. Data Pejualana selama satu bulan Dengan nilai bobot 50%<br>
				3. Dan Data Pelanggan baru dengan nilai bobo 25%</p>
			------------------------------------------------------------------------------
			<br>
			Data Akan Dihitung secara otomatis oleh sistem selama 1 bulan sesuai dengan nilai bobot yang di cantumkan.
		</div>



		<div class="col-md-12 mb-lg-0 mb-4">
			<div class="card-body p-3">
				<div class="row">
					<div class="card-header">
						<h5>Pilih Karyawan</h5>
					</div>
					<?php echo form_open('AnalisisDummy/hitung') ?>
					<div class="row">
						<div class="col">
							<label class="form-label">Nama Karyawan</label>
							<div class="input-group input-group-outline mb-3">
								<select name="sales" class="form-control">
									<option>---Pilih Karyawan---</option>

									<?php foreach ($karyawan as $key => $value) {
										$cek_analisis = $this->M_analisis->cek_analisis($value->id_user);
										$id_user = $cek_analisis->id_user;
									?>
										<option value="<?= $value->id_user ?>" <?php if ($value->id_user == $id_user) {
																					echo 'disabled';
																				} else {
																					echo ' ';
																				} ?>><?= $value->nama_lengkap ?></option>
									<?php } ?>
								</select>
							</div>
						</div>

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
							<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Sales</th>
							<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nilai Kehadiran</th>
							<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nilai Kualitas</th>
							<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nilai Penjualan</th>
							<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hasil</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($hasil as $key => $value) {
						?>
							<tr>
								<td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><?= $no++ ?></td>
								<td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><?= $value->nama_lengkap ?></td>
								<td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><?= $value->kehadiran ?></td>
								<td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><?= $value->kualitas ?></td>
								<td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><?= $value->penjualan ?></td>
								<td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><?= $value->hasil ?></td>
							</tr>
						<?php
						}
						?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
	<br>