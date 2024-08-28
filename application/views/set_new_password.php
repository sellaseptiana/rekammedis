<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SET NEW PASSWORD</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/') ?>images/logos/favicon.png" />
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/styles.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="<?= base_url() ?>" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="<?= base_url('assets/') ?>images/logos/logo_sign.png" width="100" alt="">
                                </a>
                                <p class="text-center">SET NEW PASSWORD</p>
                                <?= $this->session->flashdata('message') ?>
                                <form action="<?= base_url('Password/set_new_password'); ?>" method="post">
                                    <input type="hidden" name="username" value="<?= $username; ?>">
                                    <div class="mb-3">
                                        <label for="password1" class="form-label">New Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password1" name="password1">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="togglePassword1">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password2" class="form-label">Confirm New Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password2" name="password2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="togglePassword2">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Set New Password</button>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <a class="text-primary fw-bold" href="<?= base_url('Login') ?>">Back to Login</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/') ?>libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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

        document.getElementById('togglePassword2').addEventListener('click', function (e) {
            var passwordInput = document.getElementById('password2');
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
