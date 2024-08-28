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
            <div class="d-flex justify-content-between align-items-center">
                <h4>Data Kunjungan Poli Anak</h4>
                <a href="<?= base_url() ?>Petugas/tambah_kunjungan" class="btn btn-primary">Tambah Data</a>
            </div>
            <a href="<?= base_url('Export/kunjungan') ?>" class="btn btn-success">
						<i class="fas fa-file-excel mr-1"></i> Excel
					</a>
        </div>
        <div class="card-body">
        <div class="row mb-3">
                <div class="col-md-4">
                    <select id="filter-type" class="form-control">
                        <option value="">-- Pilih Jenis Filter --</option>
                        <option value="no_rekam_medis">No Rekam Medis</option>
                        <option value="status">Status</option>
                        <option value="tanggal_kunjungan">Tanggal Periksa</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select id="filter-dropdown" class="form-control">
                        <option value="">-- Pilih Filter --</option>
                    </select>
                </div>
            </div>

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
                            <th>Nama Pelayanan</th>
                            <th>Nama Dokter</th>
                            <!-- <th>Detail Tambahan</th> -->
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
                                <td><?= $k['nama_pelayanan']; ?></td>
                                <td><?= $k['nama']; ?></td>
                            <!-- Kolom untuk detail tambahan -->
                            <!-- <td>
                                    <?php if ($k['nama_pelayanan'] == 'Bumil') : ?>
                                        <strong>Nama Suami:</strong> <?= $k['nama_suami']; ?><br>
                                        <strong>Tanggal Lahir Suami:</strong> <?= $k['tanggal_lahir_suami']; ?><br>
                                        <strong>Pendidikan Suami:</strong> <?= $k['pendidikan_suami']; ?><br>
                                        <strong>Pekerjaan Suami:</strong> <?= $k['pekerjaan_suami']; ?><br>
                                        <strong>Umur Suami:</strong> <?= $k['umur_suami']; ?><br>
                                    <?php elseif ($k['nama_pelayanan'] == 'Pemeriksaan Anak') : ?>
                                        <strong>Nama Ayah:</strong> <?= $k['nama_ayah']; ?><br>
                                        <strong>Nama Ibu:</strong> <?= $k['nama_ibu']; ?><br>
                                        <strong>Berat Lahir:</strong> <?= $k['berat_lahir']; ?><br>
                                        <strong>Umur Ayah:</strong> <?= $k['umur_ayah']; ?><br>
                                        <strong>Umur Ibu:</strong> <?= $k['umur_ibu']; ?><br>
                                    <?php endif; ?>
                                </td> -->
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
<!-- Include jQuery and DataTables JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        var table = $('#table-kunjungan').DataTable();
        var rekamMedisData = <?php echo json_encode($kunjungan); ?>; // Mengambil data rekam medis dari PHP

        // Ketika jenis filter dipilih
        $('#filter-type').on('change', function () {
            var filterType = $(this).val();
            var filterDropdown = $('#filter-dropdown');

            // Menghapus semua opsi di dropdown filter
            filterDropdown.empty();
            filterDropdown.append('<option value="">-- Pilih Filter --</option>');

            // Menambahkan opsi sesuai dengan jenis filter yang dipilih
            if (filterType === 'no_rekam_medis') {
                var noRekamMedisSet = new Set();
                rekamMedisData.forEach(function (k) {
                    if (!noRekamMedisSet.has(k.no_rekam_medis)) {
                        noRekamMedisSet.add(k.no_rekam_medis);
                        filterDropdown.append('<option value="' + k.no_rekam_medis + '">' + k.no_rekam_medis + '</option>');
                    }
                });
            } else if (filterType === 'tanggal_kunjungan') {
                var tanggalKunjunganSet = new Set();
                rekamMedisData.forEach(function (k) {
                    if (!tanggalKunjunganSet.has(k.tanggal_kunjungan)) {
                        tanggalKunjunganSet.add(k.tanggal_kunjungan);
                        filterDropdown.append('<option value="' + k.tanggal_kunjungan + '">' + k.tanggal_kunjungan + '</option>');
                    }
                });
            } else if (filterType === 'status') {
                var statusSet = new Set();
                rekamMedisData.forEach(function (k) {
                    if (!statusSet.has(k.status)) {
                        statusSet.add(k.status);
                        filterDropdown.append('<option value="' + k.status + '">' + k.status + '</option>');
                    }
                });
            }
        });

        // Ketika filter dipilih
        $('#filter-dropdown').on('change', function () {
            var selectedValue = $(this).val();
            var filterType = $('#filter-type').val();

            if (filterType === 'no_rekam_medis') {
                table.columns(1).search(selectedValue).draw();
            } else if (filterType === 'status') {
                table.columns(4).search(selectedValue).draw();
            } else if (filterType === 'tanggal_kunjungan') {
                table.columns(3).search(selectedValue).draw();
            }
        });
    });
</script>
</body>
</html>
