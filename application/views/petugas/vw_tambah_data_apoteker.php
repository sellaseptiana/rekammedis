<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
	<div class="container">

		<div class="container mt-5 mb-5">
			<div class="card">
				<div class="card-header">
					<div class="float">
						<a href="<?=base_url('Petugas/apoteker')?>" class="btn btn-danger mb-2">Kembali</a>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card" style="background-color: rgba(245, 245, 245, 0.9);">
								<div class="card-header">
													<h4 class="title"><strong>Tambah Data Apoteker</strong></h4><br>
                <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
																<label class="col-sm-2 col-form-label">Nama Dokter</label>
																<div class="col-sm-10">
                                <input type="text" name="nama"
																		value="<?= set_value('nama'); ?>"
																		class="form-control form-control-user"
																		id="nama" placeholder="Masukkan Nama Dokter">
																	<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
															 </div>
															</div>
                                                            <div class="form-group row">
																<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
																<div class="col-sm-10">
                                <input type="text" name="jenis_kelamin"
																		value="<?= set_value('jenis_kelamin'); ?>"
																		class="form-control form-control-user"
																		id="jenis_kelamin" placeholder="Masukkan Jenis Kelamin">
																	<?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
															 </div>
															</div>
                                  <div class="form-group row">
																<label class="col-sm-2 col-form-label">alamat</label>
																<div class="col-sm-10">
																	<input type="teks" name="alamat"
																		class="form-control form-control-user"
																		value="<?= set_value('alamat'); ?>"
																		id="alamat"
																		placeholder="Masukkan Alamat">
																	<?= form_error('umur', '<small class="text-danger pl-3">', '</small>'); ?>
																</div>
															</div>
                                                            <div class="form-group row">
																<label class="col-sm-2 col-form-label">No HP</label>
																<div class="col-sm-10">
                                <input type="teks" name="no_hp"
																		value="<?= set_value('no_hp'); ?>"
																		class="form-control form-control-user"
																		id="no_hp"
																		placeholder="Masukkan No HP">
																	<?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                                  </div>
															</div>
															<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Masukkan Password">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Confirm Password</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input type="password" name="password1" class="form-control form-control-user" id="password1" placeholder="Masukkan Konfirmasi Password">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword1">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                              <div class="float-right">
														<button type="submit" name="tambah"
															class="btn btn-primary float-right">Simpan</button>
                                                                        </div>
                                    </div>
									<script src="<?= base_url('assets/') ?>libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function (e) {
            var passwordInput = document.getElementById('password');
            var icon = this.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        document.getElementById('togglePassword1').addEventListener('click', function (e) {
            var passwordInput = document.getElementById('password1');
            var icon = this.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>