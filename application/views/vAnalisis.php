<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Analisis Dummy</title>

</head>

<body>
	<form action="<?= base_url('AnalisisDummy/hitung') ?>" method="POST">
		<table>
			<tr>
				<td>Periode Analisis</td>
				<?php

				?>
				<td>

					<select id="analisis" name="bulan">
						<option>---Pilih Periode Analisis---</option>
						<?php
						foreach ($periode as $key => $value) {
							$cek_analisis = $this->M_analisis->cek_analisis($value->bulan, $value->tahun);
						?>
							<option data-tahun="<?= $value->tahun ?>" value="<?= $value->bulan ?>" <?php if ($cek_analisis) {
																										echo 'disabled';
																									} ?>><?= $value->bulan ?> Tahun <?= $value->tahun ?></option>
						<?php
						}
						?>

					</select>

				</td>
			</tr>
			<input type="text" name="tahun" class="tahun">
			<tr>
				<td><button type="submit">Hitung</button></td>
			</tr>
		</table>
	</form>
</body>

<script src="<?= base_url() ?>assets/jquery-3.7.1.min.js"></script>
<script>
	console.log = function() {}
	$("#analisis").on('change', function() {

		$(".tahun").html($(this).find(':selected').attr('data-tahun'));
		$(".tahun").val($(this).find(':selected').attr('data-tahun'));


	});
</script>

</html>