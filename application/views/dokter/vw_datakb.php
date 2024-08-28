<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
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
            <a href="<?= base_url('Dokter/index') ?>" class="btn btn-danger mb-2">Kembali</a>
        </div>
    </div>
</nav>
<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <a href="<?= base_url() ?>Dokter/tambah_rekammedis" class="btn btn-primary">Tambah Data</a>
            </ul>
            <h4>Data Rekam Medis</h4>
        </div>
        <div class="card-body">
            <div class="card-body" style="min-height: 400px; overflow-x: auto;">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="table-tbrekammedis">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Resep</th>
                                <th>No Rekam Medis</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Unit Pelayanan</th>
                                <th>Jam Periksa</th>
                                <th>Riwayat Kontrasepsi Terakhir</th>
                                <th>Riwayat Perkawinan</th>
                                <th>Riwayat Menstruasi</th>
                                <th>Status Imunisasi<</th>
                                <th>Status Generalis</th>
                                <th>Status Kebidanan</th>
                                <th>Status Gizi</th>
                                <th>Pemeriksaan Penunjang</th>
                                <th>Dokter</th>
                                <th>Lainnya</th>
                                <th>Dokter</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rekam_medis as $key => $rm) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><a href="<?= base_url('Dokter/detailResep/' . $rm['id_rekam_medis']) ?>" class="btn btn-primary">Detail Resep</a></td>
                                <td><?= $rm['no_rekam_medis']; ?></td>
                                <td><?= $rm['nama_pasien']; ?></td>
                                <td><?= $rm['tanggal_kunjungan']; ?></td>
                                <td><?= $rm['nama_pelayanan']; ?></td>
                                <td><?= $rm['jam_periksa']; ?></td>
                                <td><?= $rm['keluhan_utama']; ?></td>
                                <td><?= $rm['keluhan_tambahan']; ?></td>
                                <td><?= $rm['riwayat_penyakit_sekarang']; ?></td>
                                <td><?= $rm['riwayat_penyakit_dahulu']; ?></td>
                                <td><?= $rm['riwayat_penyakit_keluarga']; ?></td>
                                <td><?= $rm['riwayat_alergi']; ?></td>
                                <td><?= $rm['tindakan_terapi']; ?></td>
                                <td><?= $rm['obat_sering_digunakan']; ?></td>
                                <td><?= $rm['obat_sering_konsumsi']; ?></td>
                                <td><?= $rm['tekanan_darah']; ?></td>
                                <td><?= $rm['nadi']; ?></td>
                                <td><?= $rm['suhu']; ?></td>
                                <td><?= $rm['odontogram']; ?></td>
                                <td><?= $rm['occlusi']; ?></td>
                                <td><?= $rm['torus_palatines']; ?></td>
                                <td><?= $rm['torus_mandibularis']; ?></td>
                                <td><?= $rm['palatum']; ?></td>
                                <td><?= $rm['diasterna']; ?></td>
                                <td><?= $rm['gigi_anomaly']; ?></td>
                                <td><?= $rm['radiology']; ?></td>
                                <td><?= $rm['lainnya1']; ?></td>
                                <td><?= $rm['diagnosa_medis']; ?></td>
                                <td><?= $rm['rencana_pengobatan']; ?></td>
                                <td><?= $rm['rencana_edukasi']; ?></td>
                                <td><?= $rm['rencana_diagnostik']; ?></td>
                                <td><?= $rm['rencana_mon_tgl']; ?></td>
                                <td><?= $rm['rujuk_rs']; ?></td>
                                <td><?= $rm['nama']; ?></td>
                                <td>
                                    <a href="<?= base_url('Dokter/detail_data_rekammedis/') . $rm['id_rekam_medis']; ?>" class="badge badge-warning">Detail</a>
                                    <a href="<?= base_url('Dokter/update_rekam_medis/') . $rm['id_rekam_medis']; ?>" class="badge badge-primary">Update</a>
                                    <a href="<?= base_url('Dokter/hapus_rekam_medis/'). $rm['id_rekam_medis']; ?>" class="badge badge-danger" onclick="return confirm('Yakin untuk menghapus Data ini?');">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Initialize DataTables -->
<script>
    $(document).ready(function() {
        $('#table-tbrekammedis').DataTable();
    });
</script>
</body>
</html>
