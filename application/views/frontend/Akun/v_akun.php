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
						Tambah Akun Sales
					</button>
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

						<div class="tab-content" id="nav-tabContent">
							<table class="table align-items-center mb-0">
								<thead>
									<tr>
										<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
										<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No HP</th>
										<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
										<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
										<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Password</th>
										<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
										<th class="text-secondary opacity-7"></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($akun as $key => $value) { ?>
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
												<p class="text-xs font-weight-bold mb-0"><?= $value->no_hp ?></p>
											</td>
											<td class="align-middle text-center text-sm">
												<span class="badge badge-sm bg-gradient-danger">
													<?= $value->alamat ?>
												</span>
											</td>
											<td class="align-middle text-center text-sm">
												<span class="badge badge-sm bg-gradient-danger">
													<?= $value->username ?>
												</span>
											</td>
											<td class="align-middle text-center text-sm">
												<span class="badge badge-sm bg-gradient-danger">
													******
												</span>
											</td>
											<td class="align-middle text-center text-sm">
												<span class="badge badge-sm bg-gradient-warning">
													<?= $value->status ?>
												</span>
											</td>
											<td class="align-middle text-center">
												<button class="btn bg-gradient-info w-30 mb-0 toast-btn" type="button" data-bs-toggle="modal" data-bs-target="#infoToast<?= $value->id_user ?>">Update status</button>
												<button class="btn bg-gradient-warning w-30 mb-0 toast-btn" type="button" data-bs-toggle="modal" data-bs-target="#warningToast<?= $value->id_user ?>">Edit</button>
												<button class="btn bg-gradient-danger w-30 mb-0 toast-btn" type="button" data-bs-toggle="modal" data-bs-target="#dangerToast<?= $value->id_user ?>">Hapus</button>
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
<!-- Modal Add -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<?php
			echo form_open('pimpinan/add')
			?>
			<div class="modal-body">
				<label class="form-label">Nama Lengkap</label>
				<div class="input-group input-group-outline mb-3">
					<input type="text" name="nama_lengkap" class="form-control">
				</div>
				<label class="form-label">No HP</label>
				<div class="input-group input-group-outline mb-3">
					<input type="number" name="no_hp" class="form-control">
				</div>
				<label class="form-label">Username</label>
				<div class="input-group input-group-outline mb-3">
					<input type="text" name="username" class="form-control">
				</div>
				<label class="form-label">Password</label>
				<div class="input-group input-group-outline mb-3">
					<input type="password" name="password" class="form-control">
				</div>
				<label class="form-label">Status</label>
				<div class="input-group input-group-outline mb-3">
					<select name="status" class="form-control">
						<option>---Pilih status---</option>
						<option value="aktif">Aktif</option>
						<option value="resign">Resign</option>
					</select>
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


<?php foreach ($akun as $key => $update) { ?>
	<!-- Modal Update -->
	<div class="modal fade" id="warningToast<?= $update->id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<?php
				echo form_open('pimpinan/update/' . $update->id_user)
				?>
				<div class="modal-body">
					<label class="form-label">Nama Lengkap</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="nama_lengkap" value="<?= $update->nama_lengkap ?>" class="form-control">
					</div>
					<label class="form-label">No HP</label>
					<div class="input-group input-group-outline mb-3">
						<input type="number" name="no_hp" value="<?= $update->no_hp ?>" class="form-control">
					</div>
					<label class="form-label">Username</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="username" value="<?= $update->username ?>" class="form-control">
					</div>
					<label class="form-label">Password</label>
					<div class="input-group input-group-outline mb-3">
						<input type="password" name="password" value="<?= $update->password ?>" class="form-control">
					</div>
					<label class="form-label">Status</label>
					<div class="input-group input-group-outline mb-3">
						<select name="status" class="form-control">
							<option value="<?= $update->status ?>"><?= $update->status ?></option>
							<option>---Pilih status---</option>
							<option value="aktif">Aktif</option>
							<option value="resign">Resign</option>
						</select>
					</div>
					<label class="form-label">Alamat</label>
					<div class="input-group input-group-outline mb-3">
						<input type="text" name="alamat" value="<?= $update->alamat ?>" class="form-control">
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
<?php foreach ($akun as $key => $status) { ?>
	<!-- Modal status -->
	<div class="modal fade" id="infoToast<?= $status->id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<?php
				echo form_open('pimpinan/status/' . $status->id_user)
				?>
				<div class="modal-body">
					<label class="form-label">Status</label>
					<div class="input-group input-group-outline mb-3">
						<select name="status" class="form-control">
							<option value="<?= $status->status ?>"><?= $status->status ?></option>
							<option>---Pilih status---</option>
							<option value="aktif">Aktif</option>
							<option value="resign">Resign</option>
						</select>
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

<?php foreach ($akun as $key => $delete) { ?>
	<!-- Modal Delete -->
	<div class="modal fade" id="dangerToast<?= $delete->id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<?php
				echo form_open('pimpinan/delete/' . $delete->id_user)
				?>
				<div class="modal-body">
					<h5>Apakah Anda Yakin Hapus Sales <?= $delete->nama_lengkap ?></h5>
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