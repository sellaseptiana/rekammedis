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
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h4 class="font-weight-bold">Rekam Medis Umum</h4>
                <a href="<?= base_url('Export/umum') ?>" class="btn btn-success">
                    <i class="fas fa-file-excel mr-1"></i> Excel
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body" style="min-height: 400px; overflow-x: auto;">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <select id="filter-type" class="form-control">
                            <option value="">-- Pilih Jenis Filter --</option>
                            <option value="no_rekam_medis">No Rekam Medis</option>
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
                                <th>Anamnesa</th>
                                <th>Riwayat Penyakit</th>
                                <th>Pemeriksaan Fisik</th>
                                <th>Antropometri</th>
                                <th>Hasil MST</th>
                                <th>Status Generalis</th>
                                <th>Status Psiko</th>
                                <th>Pemeriksaan Penunjang</th>
                                <th>Assesment</th>
                                <th>Planning</th>
                                <th>Detail Lainnya</th>
                                <th>Dokter</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rekam_medis as $key => $rm) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><a href="<?= base_url('Dokter/detailResep/' . $rm['id_rekam']) ?>" class="btn btn-primary">Detail Resep</a></td>
                                <td><?= htmlspecialchars($rm['no_rekam_medis'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= htmlspecialchars($rm['nama_pasien'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= htmlspecialchars($rm['tanggal_kunjungan'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= htmlspecialchars($rm['nama_pelayanan'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= htmlspecialchars($rm['jam_periksa'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td> <?= 'Keluhan Utama: ' . htmlspecialchars($rm['keluhan_utama'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'Keluhan Tambahan: ' . htmlspecialchars($rm['keluhan_tambahan'], ENT_QUOTES, 'UTF-8'). ', ' .
                                    'Obat Sering Digunakan: ' . htmlspecialchars($rm['obat_sering_digunakan'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'Obat Sering Konsumsi: ' . htmlspecialchars($rm['obat_sering_konsumsi'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'Tindakan Terapi: ' . htmlspecialchars($rm['tindakan_terapi'], ENT_QUOTES, 'UTF-8'); ?>
                                </td>
                                <td><?= 'Riwayat Penyakit Sekarang: ' . htmlspecialchars($rm['riwayat_penyakit_sekarang'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'Riwayat Penyakit Dahulu: ' . htmlspecialchars($rm['riwayat_penyakit_dahulu'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'Riwayat Penyakit Keluarga: ' . htmlspecialchars($rm['riwayat_penyakit_keluarga'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'Riwayat Alergi: ' . htmlspecialchars($rm['riwayat_alergi'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= 'Keadaan Umum: ' . htmlspecialchars($rm['keadaan_umum'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'Kesadaran: ' . htmlspecialchars($rm['kesadaran'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'Tekanan Darah: ' . htmlspecialchars($rm['tekanan_darah'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'Nadi: ' . htmlspecialchars($rm['nadi'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'Suhu: ' . htmlspecialchars($rm['suhu'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'Frekuensi Napas: ' . htmlspecialchars($rm['frekuensi_napas'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= 'Tinggi Badan: ' . htmlspecialchars($rm['tinggi_badan'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'Berat Badan: ' . htmlspecialchars($rm['berat_badan'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'IMT: ' . htmlspecialchars($rm['imt'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td>
                                    <?php if ($rm['total_skor'] > 2): ?>
                                        Butuh penangan lebih lanjut oleh ahli gizi
                                    <?php else: ?>
                                        Gizi baik
                                    <?php endif; ?>
                                </td>
                                <td><?= 'Kepala Leher: ' . htmlspecialchars($rm['kepala_leher'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'Thorax: ' . htmlspecialchars($rm['thorax'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'Abdomen: ' . htmlspecialchars($rm['abdomen'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'Ekstremitas: ' . htmlspecialchars($rm['ekstremitas'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= 'Status Mental: ' . htmlspecialchars($rm['status_mental'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'Respons Emosi: ' . htmlspecialchars($rm['respons_emosi'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'Hubungan Pasien dan Keluarga: ' . htmlspecialchars($rm['hub_pasien_keluarga'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'Taat Ibadah: ' . htmlspecialchars($rm['taat_ibadah'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'Bahasa: ' . htmlspecialchars($rm['bahasa'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= 'Lab: ' . htmlspecialchars($rm['lab'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'Pemeriksaan Lain: ' . htmlspecialchars($rm['pemeriksaan_lain'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= 'Diagnosa Medis: ' . htmlspecialchars($rm['diagnosa_medis'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'Diagnosa Keperawatan: ' . htmlspecialchars($rm['diagnosa_keperawatan'], ENT_QUOTES, 'UTF-8') . ', ' .
                                    'Masalah: ' . htmlspecialchars($rm['masalah'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= htmlspecialchars($rm['rencana_tindakan'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= htmlspecialchars($rm['detail_lain'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= htmlspecialchars($rm['nama_dokter'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td>
                                    <a href="<?= base_url('Dokter/edit/' . $rm['id_rekam']) ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url('Dokter/delete/' . $rm['id_rekam']) ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
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
<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#table-tbrekammedis').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
        });

        // Event listener for filter type dropdown
        $('#filter-type').on('change', function() {
            var selectedFilterType = $(this).val();
            var columnIdx = -1;

            switch (selectedFilterType) {
                case 'no_rekam_medis':
                    columnIdx = 2; // No Rekam Medis
                    break;
                case 'tanggal_kunjungan':
                    columnIdx = 4; // Tanggal Periksa
                    break;
            }

            if (columnIdx !== -1) {
                // Populate the filter dropdown based on the selected filter type
                var uniqueValues = [];
                table.column(columnIdx).data().unique().sort().each(function(d) {
                    if (d) {
                        uniqueValues.push(d);
                    }
                });

                var $filterDropdown = $('#filter-dropdown');
                $filterDropdown.empty();
                $filterDropdown.append('<option value="">-- Pilih Filter --</option>');
                $.each(uniqueValues, function(index, value) {
                    $filterDropdown.append('<option value="' + value + '">' + value + '</option>');
                });

                // Show the filter dropdown
                $filterDropdown.show();
            } else {
                // Hide the filter dropdown if no valid filter type is selected
                $('#filter-dropdown').hide();
            }
        });

        // Event listener for filter dropdown
        $('#filter-dropdown').on('change', function() {
            var selectedFilterValue = $(this).val();
            var selectedFilterType = $('#filter-type').val();
            var columnIdx = -1;

            switch (selectedFilterType) {
                case 'no_rekam_medis':
                    columnIdx = 2; // No Rekam Medis
                    break;
                case 'tanggal_kunjungan':
                    columnIdx = 4; // Tanggal Periksa
                    break;
            }

            if (columnIdx !== -1) {
                table.column(columnIdx).search(selectedFilterValue).draw();
            }
        });
    });
</script>
</body>
</html>