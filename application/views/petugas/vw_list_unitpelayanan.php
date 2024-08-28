<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="container">
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            </ul>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="navbar-header">
        <a href="<?=base_url('Dashboard')?>"
											class="btn btn-danger mb-2">Kembali</a>
									</div>
    </div>
</nav>
<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <a href="<?= base_url() ?>Petugas/save" class="btn btn-primary">Tambah Data</a>
            </ul>
            <h4>Data Tambah Unit Layanan</h4>
        </div>
        <div class="card-body" style="min-height: 500px; overflow-y: auto;">
        <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                <?php endif; ?>
                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                <?php endif; ?>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Poli</th>
                            <th>Nama Unit Pelayanan</th>
                            <th>Nama Dokter</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($unit_pelayanan as $unit) : ?>
                            <tr>
                                <td><?= $unit['nama_poli']; ?></td>
                                <td><?= $unit['nama_unit_pelayanan']; ?></td>
                                <td><?= $unit['nama_dokter'] ? $unit['nama_dokter'] : 'Tidak Ada Dokter'; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/jquery-3.6.0.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>
</html>