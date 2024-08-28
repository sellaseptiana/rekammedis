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
						<a href="<?= base_url('Petugas/poli') ?>" class="btn btn-danger mb-2">Kembali</a>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card" style="background-color: rgba(245, 245, 245, 0.9);">
								<div class="card-header">
									<center>
										<h4 class="title"><strong>Edit Data</strong></h4><br><br>
									</center>
									<div class="card-body">
										<form action="" method="POST" enctype="multipart/form-data">
											<input type="hidden" name="id_poli" value="<?= $poli['id_poli']; ?>">
											<!-- <div class="form-group row">
												<label class="col-sm-2 col-form-label">Poliklinik</label>
												<div class="col-sm-10">
													<select name="nama_poli" id="nama_poli" class="form-control">
													<?php foreach ($poli as $p) : ?>
														<option value="<?= $p['nama_poli']; ?>"
															<?= set_select('nama_poli', $p['nama_poli'], $p['nama_poli'] == $p['nama_poli']); ?>>
															<?= $p['nama_poli']; ?></option>
														<?php endforeach; ?>
													</select>
													<?= form_error('nama_poli', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div> -->
                                            <div class="form-group row">
    <label class="col-sm-2 col-form-label">Poliklinik</label>
    <div class="col-sm-10">
        <input type="text" name="nama_poli" value="<?= $poli['nama_poli']; ?>" class="form-control" id="nama_poli" placeholder="Masukkan Nama Poliklinik">
        <?= form_error('nama_poli', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

								
											<div class="form-group row">
												<div class="col-sm-10 offset-sm-2">
													<input type="submit" value="Submit" class="btn btn-primary">
												</div>
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
