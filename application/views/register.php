<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>SIGN UP</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/') ?>/images/logos/favicon.png" />
    <link rel="stylesheet" href="<?= base_url('assets/') ?>/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
         data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-4">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="<?= base_url('assets/') ?>/images/logos/logo_sign.png" width="100" alt="">
                                </a>
                                <p class="text-center">SIGN UP</p>
                                <form action="<?= base_url('Regis/tambah'); ?>" method="POST" enctype="multipart/form-data" onsubmit="return validatePassword()">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="nama" id="nama" value="<?= set_value('nama'); ?>"
                                               aria-describedby="textHelp">
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="mb-3">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" aria-describedby="textHelp">
                                            <option value="Perempuan" <?= set_select('jenis_kelamin', 'Perempuan'); ?>>Perempuan</option>
                                            <option value="Laki-Laki" <?= set_select('jenis_kelamin', 'Laki-Laki'); ?>>Laki-Laki</option>
                                        </select>
                                        <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">No HP</label>
                                        <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= set_value('no_hp'); ?>"
                                               aria-describedby="textHelp">
                                        <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" name="alamat" id="alamat"
                                               value="<?= set_value('alamat'); ?>" aria-describedby="emailHelp">
                                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" value="<?= set_value('username'); ?>" id="username"
                                               name="username" aria-describedby="emailHelp">
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password" name="password">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="mb-3">
                                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <?= form_error('confirmPassword', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="mb-3">
                                        <label for="roleSelect" class="form-label">Role</label>
                                        <select class="form-select" id="roleSelect" name="role" aria-describedby="textHelp" required onchange="showHideFields()">
                                            <option value="Petugas" <?= set_select('role', 'Petugas'); ?>>Petugas</option>
                                            <option value="Dokter" <?= set_select('role', 'Dokter'); ?>>Dokter</option>
                                            <option value="Apoteker" <?= set_select('role', 'Apoteker'); ?>>Apoteker</option>
                                        </select>
                                        <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="mb-3" id="poliField" style="display: none;">
                                        <label for="poli" class="form-label">Poli</label>
                                        <select class="form-select" id="poli" name="id_poli" aria-describedby="textHelp">
                                            <?php foreach ($poli as $p): ?>
                                                <option value="<?= $p['id_poli']; ?>" <?= set_select('id_poli', $p['id_poli']); ?>><?= $p['nama_poli']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('id_poli', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                                        <a class="text-primary fw-bold ms-2" href="<?= base_url('Login'); ?>">Sign In</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showHideFields() {
            var role = document.getElementById('roleSelect').value;
            var poliField = document.getElementById('poliField');
            if (role === 'dokter') {
                poliField.style.display = 'block';
            } else {
                poliField.style.display = 'none';
            }
        }

        // Call showHideFields on page load to ensure the field is shown/hidden correctly based on current selection
        window.onload = showHideFields;

        // Toggle Password Visibility
        document.getElementById('togglePassword').addEventListener('click', function (e) {
            var passwordInput = document.getElementById('password');
            var icon = e.currentTarget.querySelector('i');
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

        document.getElementById('toggleConfirmPassword').addEventListener('click', function (e) {
            var passwordInput = document.getElementById('confirmPassword');
            var icon = e.currentTarget.querySelector('i');
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

        function validatePassword() {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;
            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
