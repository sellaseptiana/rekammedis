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
						<a href="<?= base_url('Petugas/dokter') ?>" class="btn btn-danger mb-2">Kembali</a>
					</div>
                    <center>
                            <h4 class="title"><strong>Update Data Dokter</strong></h4><br><br>
                        </center
				</div>
				<div class="card-body">
					<form method="POST"
									<form action="" method="POST" enctype="multipart/form-data">
										<input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Nama Dokter</label>
											<div class="col-sm-10">
												<input type="text" name="nama" value="<?= $user['nama']; ?>"
													class="form-control form-control-user" id="nama"
													placeholder="Masukkan Nama Dokter">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
											<div class="col-sm-10">
												<select name="jenis_kelamin" class="form-control form-control-user">
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
    <label class="col-sm-2 col-form-label">Poliklinik</label>
    <div class="col-sm-10">
        <select name="id_poli" id="id_poli" class="form-control">
            <?php foreach ($poli as $p) : ?>
                <option value="<?= $p['id_poli']; ?>" <?= (isset($user['id_poli']) && $p['id_poli'] == $user['id_poli']) ? 'selected' : ''; ?>>
                    <?= $p['nama_poli']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?= form_error('id_poli', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">No HP</label>
											<div class="col-sm-10">
												<input type="teks" name="no_hp" value="<?= $user['no_hp']; ?>"
													class="form-control form-control-user" id="no_hp"
													placeholder="Masukkan No HP">
											</div>
										</div>
										<div class="float-right">
											<button type="submit" name="update"
												class="btn btn-primary float-right">Update</button>
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
