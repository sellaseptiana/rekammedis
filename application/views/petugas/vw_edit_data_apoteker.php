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
						<a href="<?= base_url('Petugas/kunjungan') ?>" class="btn btn-danger mb-2">Kembali</a>
					</div>
                    <center>
                            <h4 class="title"><strong>Update Data Apoteker</strong></h4><br><br>
                        </center
				</div>
				<div class="card-body">
					<form method="POST"
								<form action="" method="POST" enctype="multipart/form-data">
									<div class="form-group row">
					
										<input type="hidden" name="id_user" value="<?= $user['id_user']; ?>"
											id="id_pasien">

										<label class="col-sm-3 col-form-label">Nama</label>
										<div class="col-sm-9">
											<input type="text" name="nama" class="form-control form-control-user"
												id="nama"
												value="<?= isset($user['nama']) ? $user['nama'] : ''; ?> ">
											<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Jenis Kelamin</label>
										<div class="col-sm-9">
											<select name="jenis_kelamin" class="form-control form-control-user"
												id="jenis_kelamin">
												<option value="Perempuan"
													<?= set_select('jenis_kelamin', 'Perempuan', (isset($user['jenis_kelamin']) && $user['jenis_kelamin'] == 'Perempuan')); ?>>
													Perempuan</option>
												<option value="Laki-Laki"
													<?= set_select('jenis_kelamin', 'Laki-Laki', (isset($user['jenis_kelamin']) && $user['jenis_kelamin'] == 'Laki-Laki')); ?>>
													Laki-Laki</option>
											</select>
											<?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>

									</div>
						
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Alamat</label>
										<div class="col-sm-9">
											<input type="text" name="alamat" class="form-control form-control-user"
												id="alamat"
												value="<?= isset($user['alamat']) ? $user['alamat'] : ''; ?> ">
											<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
									</div>
								
									<div class="form-group row">

										<label class="col-sm-3 col-form-label">No HP</label>
										<div class="col-sm-9">
											<input type="text" name="no_hp" class="form-control form-control-user"
												id="no_hp"
												value="<?= isset($user['no_hp']) ? $user['no_hp'] : '';?> ">
											<?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
									</div>

									<button type="submit" name="update"
										class="btn btn-primary float-right">Update</button>
								</form>
							</div>
