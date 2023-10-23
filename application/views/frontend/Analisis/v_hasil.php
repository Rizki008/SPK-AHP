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
				<br>
				<div class="card-body px-0 pb-2">
					<div class="table-responsive p-0">
						<table class="table align-items-center mb-0">
							<thead>
								<tr>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Priode Analisis</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hasil Analisis</th>
									<th class="text-secondary opacity-7"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($hasil as $key => $value) { ?>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div>
													<!-- <img src="<?= base_url() ?>template/assets/img/team-3.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user2"> -->
												</div>
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm"><?= $value->nama_lengkap ?></h6>
												</div>
											</div>
										</td>
										<td>
											<p class="text-xs font-weight-bold mb-0">Bulan <?= $value->bulan ?> &nbsp; Tahun <?= $value->tahun ?></p>
										</td>
										<td class="align-middle text-center text-sm">
											<span class="badge badge-sm bg-gradient-danger">
												<?= $value->hasil_analisis ?>
											</span>
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