<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>SIGN IN</title>
	<link rel="shortcut icon" type="image/png" href="<?=base_url('assets/')?>images/logos/favicon.png" />
	<link rel="stylesheet" href="<?=base_url('assets/')?>css/styles.min.css" />
</head>

<body>
	<!--  Body Wrapper -->
	<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
		data-sidebar-position="fixed" data-header-position="fixed">
		<div
			class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
			<div class="d-flex align-items-center justify-content-center w-100">
				<div class="row justify-content-center w-100">
					<div class="col-md-8 col-lg-6 col-xxl-3">
						<div class="card mb-0">
							<div class="card-body">
								<a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
									<img src="<?=base_url('assets/')?>images/logos/logo_sign.png" width="100" alt="">
								</a>
								<p class="text-center">SIGN IN</p>
								<?= $this->session->flashdata('message') ?>
                                    <form action="<?= base_url('Login'); ?>" method="post">
									<div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Username</label>
										<input type="text" class="form-control" value="<?= set_value('username'); ?>"
											id="username" name="username" aria-describedby="emailHelp">
										<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>

									</div>
									<div class="mb-4">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
            <input type="password" class="form-control" id="password" name="password" value="<?= set_value('username'); ?>">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        </div>
        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
									<div class="d-flex align-items-center justify-content-between mb-4">
										<div class="form-check">
											<input class="form-check-input primary" type="checkbox" value=""
												id="flexCheckChecked" checked>
											<label class="form-check-label text-dark" for="flexCheckChecked">
												Ingat Akun  
											</label>
										</div>
										<a class="text-primary fw-bold" href="<?= base_url('Password')?>">  Lupa Password? </a>
									</div>
									<button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign
										In</button>
									<div class="d-flex align-items-center justify-content-center">
										<p class="fs-4 mb-0 fw-bold">Belum Punya Akun?</p>
										<a href="<?= base_url() ?>Regis/tambah" class="text-primary fw-bold ms-2">Buat Akun</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?=base_url('assets/')?>libs/jquery/dist/jquery.min.js"></script>
	<script src="<?=base_url('assets/')?>libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script>
    document.getElementById('togglePassword').addEventListener('click', function (e) {
        var passwordInput = document.getElementById('password');
        var toggleButton = e.currentTarget;
        var icon = toggleButton.querySelector('i');
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
