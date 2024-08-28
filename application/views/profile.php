<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Navbar bagian atas -->
            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-icon-hover" href="#" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= base_url('assets/')?>images/profile/<?= $user['foto']; ?>" alt="Foto Profil" width="35" height="35" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                            <div class="message-body">
                                <a href="#" class="d-flex align-items-center gap-2 dropdown-item" id="profile-link">
                                    <i class="ti ti-user fs-6"></i>
                                    <p class="mb-0 fs-3">My Profile</p>
                                </a>
                                <a href="<?= base_url('Login/logout') ?>" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal untuk menampilkan profil pengguna -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">My Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="user-box">
                        <div class="avatar-lg text-center mb-3">
                            <img src="<?= base_url('assets/')?>images/profile/<?= $user['foto']; ?>" alt="Foto Profil" class="avatar-img rounded">
                        </div>
                        <div class="u-text text-center">
                            <h4><?= $user["nama"]; ?></h4>
                            <p class="text-muted">Username: <?= $user["username"]; ?></p>
                            <p class="text-muted">Jenis Kelamin: <?= $user["jenis_kelamin"]; ?></p>
                            <p class="text-muted">Role: <?= $user["role"]; ?></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Script untuk menampilkan modal profil saat link "My Profile" diklik
        document.getElementById('profile-link').addEventListener('click', function(event) {
            event.preventDefault();
            var myModal = new bootstrap.Modal(document.getElementById('profileModal'), {
                keyboard: false
            });
            myModal.show();
        });
    </script>
</body>
</html>
