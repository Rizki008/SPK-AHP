<!-- End Navbar -->
<div class="container-fluid py-4">
	<div class="row">
		<div class="col-12">
			<div class="card my-4">
				<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
						<h6 class="text-white text-capitalize ps-3"><?= $title ?></h6>
					</div>
				</div>
				<div class="card-body px-0 pb-2">
					<div class="table-responsive p-0">
						<table class="table align-items-center mb-0">
							<tbody>
								<?php $data = $this->db->query("SELECT MAX(no_permintaan) AS otomatis FROM penjualan ");
								foreach ($data->result_array() as $row) {
									$otomatis = $row['otomatis'];
									$urutan =  substr($otomatis, 3, 3);
									$urutan++;
								}
								?>
								<?php
								echo form_open('penjualan/add');
								$kode = '00';
								$permintaan = $kode . sprintf("%03s", $urutan);
								$no_tlpn = 1312 . strtoupper(random_string('nozero', 7));
								?>
								<input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>" class="form-control">
								<div class="modal-body">
									<h5>Detail Permintaan</h5>
									<hr>
									<div class="row">
										<div class="col">
											<label class="form-label">No Permintaan</label>
											<div class="input-group input-group-outline mb-3">
												<input type="text" name="no_permintaan" value="<?= $permintaan ?>" class="form-control" placeholder="No permintaan" readonly aria-label="No permintaan">
											</div>
										</div>
										<div class="col">
											<label class="form-label">Jenis Permohonan</label>
											<div class="input-group input-group-outline mb-3">
												<input type="text" name="jenis_permohonan" class="form-control" placeholder="Jenis Perhmohonan" aria-label="Jenis Perhmohonan">
											</div>
										</div>
									</div>
									<h5>Layanan IndoHome</h5>
									<hr>
									<div class="row">
										<div class="col">
											<label class="form-label">No Telepon / Internet</label>
											<div class="input-group input-group-outline mb-3">
												<input type="text" name="no_tlp_internet" value="<?= $no_tlpn ?>" class="form-control" placeholder="Nomor Telepon / Internet" aria-label="Nomor Telepon / Internet" readonly>
											</div>
										</div>
										<div class="col">
											<label class="form-label">Produk Layanan</label>
											<div class="input-group input-group-outline mb-3">
												<input type="text" name="produk_layanan" class="form-control" placeholder="Produk Layanan" aria-label="Produk Layanan">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<label class="form-label">Paket</label>
											<div class="input-group input-group-outline mb-3">
												<input type="text" name="paket" class="form-control" placeholder="Paket" aria-label="Paket">
											</div>
										</div>
										<div class="col">
											<label class="form-label">Kecepatan</label>
											<div class="input-group input-group-outline mb-3">
												<input type="text" name="kecepatan" class="form-control" placeholder="Kecepatan" aria-label="Kecepatan">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<label class="form-label">Perangkat</label>
											<div class="input-group input-group-outline mb-3">
												<input type="text" name="perangkat" class="form-control" placeholder="Perangkat" aria-label="Perangkat">
											</div>
										</div>
										<div class="col">
											<label class="form-label">Fitur tambahan</label>
											<div class="input-group input-group-outline mb-3">
												<input type="text" name="fitur_tambahan" class="form-control" placeholder="Fitur Tambahan" aria-label="Fitur Tambahan">
											</div>
										</div>
									</div>
									<h5>Data Pelanggan</h5>
									<hr>
									<div class="row">
										<div class="col">
											<label class="form-label">Nama Pelanggan</label>
											<div class="input-group input-group-outline mb-3">
												<input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan" aria-label="Nama Pelanggan">
											</div>
										</div>
										<div class="col">
											<label class="form-label">Tipe Pelanggan</label>
											<div class="input-group input-group-outline mb-3">
												<input type="text" name="tipe_pelanggan" class="form-control" placeholder="Tipe Pelanggan" aria-label="Tipe Pelanggan">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<label class="form-label">No KTP</label>
											<div class="input-group input-group-outline mb-3">
												<input type="number" name="no_ktp" class="form-control" placeholder="NO KTP" aria-label="NO KTP">
											</div>
										</div>
										<div class="col">
											<label class="form-label">Kode Post</label>
											<div class="input-group input-group-outline mb-3">
												<input type="number" name="kode_pos" class="form-control" placeholder="Last name" aria-label="Last name">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<label class="form-label">Kota</label>
											<div class="input-group input-group-outline mb-3">
												<input type="text" name="kota" class="form-control" placeholder="Kota" aria-label="Kota">
											</div>
										</div>
										<div class="col">
											<label class="form-label">No Telepon</label>
											<div class="input-group input-group-outline mb-3">
												<input type="number" name="no_tlpn" class="form-control" placeholder="No Telepon" aria-label="No Telepon">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<label class="form-label">No HP</label>
											<div class="input-group input-group-outline mb-3">
												<input type="number" name="no_hp" class="form-control" placeholder="No Hp" aria-label="No Hp">
											</div>
										</div>
										<div class="col">
											<label class="form-label">Email</label>
											<div class="input-group input-group-outline mb-3">
												<input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<label class="form-label">Alamat Pelanggan</label>
											<div class="input-group input-group-outline mb-3">
												<textarea name="alamat_pelanggan" class="form-control" cols="30" rows="10" placeholder="Alamat Pelanggan"></textarea>
											</div>
										</div>
										<div class="col">
											<label class="form-label">Alamat Instalasi</label>
											<div class="input-group input-group-outline mb-3">
												<textarea name="alamat_instalasi" class="form-control" cols="30" rows="10" placeholder="Alamat Instalasi"></textarea>
											</div>
										</div>
									</div>
									<h5>BIAYA BULANAN</h5>
									<hr>
									<div class="row">
										<div class="col-lg-4">
											<label class="form-label">Biaya Paket IndiHome</label>
											<div class="input-group input-group-outline mb-3">
												<input type="number" name="biaya_paket" class="form-control" placeholder="Biaya Paket IndiHome" aria-label="Biaya Paket IndiHome">
											</div>
										</div>
										<div class="col-lg-4">
											<label class="form-label">Biaya Paket Tambahan (add-on)</label>
											<div class="input-group input-group-outline mb-3">
												<input type="number" name="biaya_paket_tambahan" class="form-control" placeholder="Biaya Paket Tambahan (add-on)" aria-label="Biaya Paket Tambahan (add-on)">
											</div>
										</div>
										<div class="col-lg-4">
											<label class="form-label">Biaya Sewa Perangkat (CPE)</label>
											<div class="input-group input-group-outline mb-3">
												<input type="number" name="biaya_sewa_perangkat" class="form-control" placeholder="Biaya Sewa Perangkat (CPE)" aria-label="Biaya Sewa Perangkat (CPE)">
											</div>
										</div>
									</div>
									<h5>BIAYA BAYAR DI DEPAN</h5>
									<hr>
									<div class="row">
										<div class="col">
											<label class="form-label">Biaya Pembelian CPE</label>
											<div class="input-group input-group-outline mb-3">
												<input type="number" name="biaya_pembelian_cpe" class="form-control" placeholder="Biaya Pembelian CPE" aria-label="Biaya Pembelian CPE">
											</div>
										</div>
										<div class="col">
											<label class="form-label">Biaya Pasang Baru (PSB) IndiHome</label>
											<div class="input-group input-group-outline mb-3">
												<input type="number" name="biaya_pasang_baru" class="form-control" placeholder="Biaya Pasang Baru" aria-label="Biaya Pasang Baru">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<label class="form-label">Biaya Instalasi</label>
											<div class="input-group input-group-outline mb-3">
												<input type="number" name="biaya_instalasi" class="form-control" placeholder="Biaya Installasi" aria-label="Biaya Installasi">
											</div>
										</div>
										<div class="col">
											<label class="form-label">Uang Jaminan CPE</label>
											<div class="input-group input-group-outline mb-3">
												<input type="number" name="uang_jaminan" class="form-control" placeholder="Uang Jaminan" aria-label="Uang Jaminan">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<label class="form-label">Catatan</label>
											<div class="input-group input-group-outline mb-3">
												<input type="text" name="catatan" class="form-control" placeholder="Catatan" aria-label="Catatan">
											</div>
										</div>
									</div>
									<h5>DURASI LANGGANAN</h5>
									<hr>
									<div class="row">
										<div class="col-lg-12">
											<label class="form-label">Durasi Langganan</label>
											<div class="input-group input-group-outline mb-3">
												<select name="durasi_langganan" class="form-control" id="">
													<option value="3">3 Bulan</option>
													<option value="6">6 Bulan</option>
													<option value="12">1 Tahun</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<a href="<?= base_url('penjualan') ?>" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
								<?php echo form_close() ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
