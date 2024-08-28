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
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0"></ul>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="<?= base_url('Dashboard') ?>" class="btn btn-danger mb-2">Kembali</a>
        </div>
    </div>
</nav>
<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <a href="<?= base_url() ?>Petugas/tambah_kunjungan" class="btn btn-primary">Tambah Data</a>
            </ul>
            <h4>Data Kunjungan</h4>
        </div>
        <div class="card-body" style="min-height: 400px; overflow-x: auto;">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="table-kunjungan">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>No Rekam Medis</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>No BPJS</th>
                        <th>Poli</th>
                        <th>Nama Pelayanan</th>
                     
                        <th>Detail Tambahan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kunjungan as $key => $k) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $k['no_rekam_medis']; ?></td>
                            <td><?= $k['nama_pasien']; ?></td>
                            <td><?= $k['tanggal_kunjungan']; ?></td>
                            <td><?= $k['status']; ?></td>
                            <td><?= $k['no_bpjs']; ?></td>
                            <td><?= $k['nama_poli']; ?></td>
                            <td><?= $k['nama_pelayanan']; ?></td>
                            
                            <!-- Kolom untuk detail tambahan -->
                            <td>
                                    <?php if ($k['nama_pelayanan'] == 'Bumil') : ?>
                                        <strong>Nama Suami:</strong> <?= $k['nama_suami']; ?><br>
                                        <strong>Tanggal Lahir Suami:</strong> <?= $k['tanggal_lahir_suami']; ?><br>
                                        <strong>Pendidikan Suami:</strong> <?= $k['pendidikan_suami']; ?><br>
                                        <strong>Pekerjaan Suami:</strong> <?= $k['pekerjaan_suami']; ?><br>
                                        <!-- <strong>Umur Suami:</strong> <?= $k['umur_suami']; ?><br> -->
                                    <?php elseif ($k['nama_pelayanan'] == 'Pemeriksaan Anak') : ?>
                                        <strong>Nama Ayah:</strong> <?= $k['nama_ayah']; ?><br>
                                        <strong>Nama Ibu:</strong> <?= $k['nama_ibu']; ?><br>
                                        <strong>Berat Lahir:</strong> <?= $k['berat_lahir']; ?><br>
                                        <strong>Umur Ayah:</strong> <?= $k['umur_ayah']; ?><br>
                                        <strong>Umur Ibu:</strong> <?= $k['umur_ibu']; ?><br>
                                    <?php elseif ($k['nama_pelayanan'] == 'KB') : ?>
                                        <strong>Nama:</strong> <?= $k['nama_suami']; ?><br>
                                        <strong>Tanggal Lahir:</strong> <?= $k['tanggal_lahir_suami']; ?><br>
                                        <strong>Pendidikan:</strong> <?= $k['pendidikan_suami']; ?><br>
                                        <strong>Pekerjaan:</strong> <?= $k['pekerjaan_suami']; ?><br>
                                        <!-- <strong>Umur :</strong> <?= $k['umur_suami_istri']; ?><br> -->
                                  
                                    <?php elseif ($k['nama_pelayanan'] == 'Kunjungan KB') : ?>
                                        <strong>Nama:</strong> <?= $k['nama_suami']; ?><br>
                                        <strong>Tanggal Lahir:</strong> <?= $k['tanggal_lahir_suami']; ?><br>
                                        <strong>Pendidikan:</strong> <?= $k['pendidikan_suami']; ?><br>
                                        <strong>Pekerjaan:</strong> <?= $k['pekerjaan_suami']; ?><br>
                                        <strong>Umur :</strong> <?= $k['umur_suami']; ?><br>
                                    <?php endif; ?>
                                </td>
                            <td>
                                <a href="<?= base_url('Petugas/detail_kunjungan/') . $k['id_kunjungan']; ?>" class="badge badge-warning">Detail</a>
                                <a href="<?= base_url('Petugas/edit_kunjungan/') . $k['id_kunjungan']; ?>" class="badge badge-primary">Update</a>
                                <a href="<?= base_url('Petugas/delete_kunjungan/') . $k['id_kunjungan']; ?>" class="badge badge-danger" onclick="return confirm('Yakin untuk menghapus Data ini?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<script src="<?= base_url('assets') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table-kunjungan').DataTable();
    });
</script>
