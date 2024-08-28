<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="<?= base_url('Dokter/index') ?>" class="btn btn-danger mb-2">Kembali</a>
        </div>
    </nav>

    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-header">
                <h4>Data Kunjungan</h4>
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
                                <th>Tambah Rekam Medis</th>
                                <th>No</th>
                                <th>No Rekam Medis</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Umur</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Pekerjaan</th>
                                <th>No HP</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>No BPJS</th>
                                <th>Poli</th>
                                <th>Nama Pelayanan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kunjungan as $key => $kp) : ?>
                                <tr>
                                    <td><a href="<?= base_url('Dokter/tambah_rekammedispasien/' . $kp['id_kunjungan']) ?>" class="btn btn-primary">Tambah Data</a></td>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= htmlspecialchars($kp['no_rekam_medis'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($kp['nama_pasien'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($kp['tanggal_lahir'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($kp['umur'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($kp['alamat'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($kp['jenis_kelamin'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($kp['pekerjaan'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($kp['no_hp'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($kp['tanggal_kunjungan'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($kp['status'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($kp['no_bpjs'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($kp['nama_poli'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($kp['nama_pelayanan'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><a href="<?= base_url('Dokter/detail_pasien/' . $kp['id_kunjungan']) ?>" class="badge badge-warning">Detail</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

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
                rekamMedisData.forEach(function (kp) {
                    if (!noRekamMedisSet.has(kp.no_rekam_medis)) {
                        noRekamMedisSet.add(kp.no_rekam_medis);
                        filterDropdown.append('<option value="' + kp.no_rekam_medis + '">' + kp.no_rekam_medis + '</option>');
                    }
                });
            } else if (filterType === 'tanggal_kunjungan') {
                var tanggalKunjunganSet = new Set();
                rekamMedisData.forEach(function (kp) {
                    if (!tanggalKunjunganSet.has(kp.tanggal_kunjungan)) {
                        tanggalKunjunganSet.add(kp.tanggal_kunjungan);
                        filterDropdown.append('<option value="' + kp.tanggal_kunjungan + '">' + kp.tanggal_kunjungan + '</option>');
                    }
                });
            } else if (filterType === 'status') {
                var statusSet = new Set();
                rekamMedisData.forEach(function (kp) {
                    if (!statusSet.has(kp.status)) {
                        statusSet.add(kp.status);
                        filterDropdown.append('<option value="' + kp.status + '">' + kp.status + '</option>');
                    }
                });
            }
        });

        // Ketika filter dipilih
        $('#filter-dropdown').on('change', function () {
            var selectedValue = $(this).val();
            var filterType = $('#filter-type').val();

            if (filterType === 'no_rekam_medis') {
                table.columns(2).search(selectedValue).draw();
            } else if (filterType === 'status') {
                table.columns(11).search(selectedValue).draw();
            } else if (filterType === 'tanggal_kunjungan') {
                table.columns(10).search(selectedValue).draw();
            }
        });
    });
</script>
</body>
</html>