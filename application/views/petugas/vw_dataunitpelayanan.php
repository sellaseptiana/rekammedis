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
                <!-- <a href="<?= base_url() ?>Petugas/tambah_poli" class="btn btn-primary">Tambah Data</a> -->
            </ul>
            <h4>Data Poliklinik</h4>
        </div>
        <div class="card-body" style="min-height: 500px; overflow-y: auto;">
        <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                <?php endif; ?>
                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                <?php endif; ?>

                <div class="card-body" style="min-height: 500px; overflow-y: auto;">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
           
                    <thead>
                        <tr>
                        <th width="5px">No</th>
                            <th><center>Nama Poli</center></th>
                            
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody><?php $i =1; ?>
                        <?php foreach ($unit_pelayanan as $unit) : ?>
                            <tr>
                            <td><?= $i; ?>.</td>
                                <td><center><?= $unit['nama_poli']; ?></center></td>
                                          <!-- <td> -->
                            <!-- <a href="<?= base_url('Petugas/edit_poli/') . $unit['id_poli']; ?>" class="badge badge-primary">Update</a> -->
                        <!-- </td> -->
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/jquery-3.6.0.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>
</html>