<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
	<div class="container">
		<div class="container mt-5 mb-5">
			<div class="card">
				<div class="card-header">
					<div class="float">
						<a href="<?=base_url('Petugas/jadwaldokter')?>" class="btn btn-danger mb-2">Kembali</a>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card" style="background-color: rgba(245, 245, 245, 0.9);">
								<div class="card-header">
									<h4 class="title"><strong>Tambah Data Jadwal Dokter</strong></h4><br>
									<div class="card-body">
										<form action="<?= base_url('Petugas/tambah_jadwal'); ?>" method="POST"
											enctype="multipart/form-data">
											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Nama Dokter</label>
												<div class="col-sm-10">
													<select name="id_user" class="form-control form-control-user"
														id="id_user">
														<option value="">Pilih Nama Dokter</option>
														<?php foreach ($dokter as $d): ?>
														<option value="<?= $d['id_user']; ?>"
															<?= set_select('id_user', $d['id_user']); ?>>
															<?= $d['nama']; ?></option>
														<?php endforeach; ?>
													</select>
													<?= form_error('id_user', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
                                            <div class="form-group row">
												<label class="col-sm-2 col-form-label">Nama Poliklinik</label>
												<div class="col-sm-10">
													<select name="id_poli" class="form-control form-control-user"
														id="id_poli">
														<option value="">Pilih Nama Poliklinik</option>
														<?php foreach ($poli as $d): ?>
														<option value="<?= $d['id_poli']; ?>"
															<?= set_select('id_poli', $d['id_poli']); ?>>
															<?= $d['nama_poli']; ?></option>
														<?php endforeach; ?>
													</select>
													<?= form_error('id_poli', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Status</label>
												<div class="col-sm-10">
													<select name="status" class="form-control form-control-user"
														id="status">
														<option value="">Pilih Status</option>
														<option value="Ada" <?= set_select('status', 'Ada'); ?>>Ada
														</option>
														<option value="Tidak Ada"
															<?= set_select('status', 'Tidak Ada'); ?>>Tidak Ada</option>
													</select>
													<?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Jam</label>
												<div class="col-sm-10">
													<input type="datetime-local" name="jam" value="<?= set_value('jam'); ?>"
														class="form-control form-control-user" id="jam"
														placeholder="Masukkan Jam Pemeriksaan">
													<?= form_error('jam', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="float-right">
												<button type="submit" name="tambah"
													class="btn btn-primary float-right">Simpan</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		// Disable jam input if status is 'Tidak Ada'
		$('#status').change(function () {
			var status = $(this).val();
			if (status === 'Tidak Ada') {
				$('#jam').val('').prop('disabled', true);
			} else {
				$('#jam').prop('disabled', false);
			}
		});

		// Initialize the status and jam fields on page load
		var initialStatus = $('#status').val();
		if (initialStatus === 'Tidak Ada') {
			$('#jam').prop('disabled', true);
		}
	});

</script>
