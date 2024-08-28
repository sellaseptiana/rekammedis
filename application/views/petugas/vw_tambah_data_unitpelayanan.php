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
						<a href="<?= base_url('Petugas/unitpelayanan') ?>" class="btn btn-danger mb-2">Kembali</a>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card" style="background-color: rgba(245, 245, 245, 0.9);">
								<div class="card-header">
									<center>
										<h4 class="title"><strong>Tambah Data</strong></h4><br><br>
									</center>
									<div class="card-body">
										<?php if(isset($message)) { echo "<div class='alert alert-info'>$message</div>"; } ?>
										<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

										<form action="<?= base_url('Petugas/tambah_poli'); ?>" method="post"
											class="mt-4">
											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Poliklinik</label>
												<div class="col-sm-10">
													<input type="text" name="nama_poli"
														value="<?= set_value('nama_poli'); ?>"
														class="form-control form-control-user" id="nama_poli"
														placeholder="Masukkan Nama Poliklinik">
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
