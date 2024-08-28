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
            <a href="<?= base_url('Dashboard') ?>" class="btn btn-danger mb-2">Kembali</a>
        </div>
    </div>
</nav>
	<div class="container mt-5 mb-5">
		<div class="card">
			<div class="card-header">
				<div class="d-flex flex-wrap justify-content-between align-items-center">
					<h4 class="font-weight-bold">Rekam Medis Anak</h4>
					<a href="<?= base_url('Export/anakrm') ?>" class="btn btn-success">
						<i class="fas fa-file-excel mr-1"></i> Excel
					</a>
				</div>
			</div>
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
            <th width="5px">No</th>
            <th>No Rekam Medis</th>
									<th>Nama</th>
									<th>Tanggal</th>
									<th>Unit Pelayanan</th>
									<th>Jam Periksa</th>
									<th>Status Imunisasi</th>
									<th>Pemberian Vit A</th>
									<th>Deteksi Perkembangan Anak</th>
									<th>Anamnesa</th>
									<th>Riwayat Penyakit</th>
									<th>Objektif</th>
									<th>Pemeriksaan Fisik</th>
									<th>Status Gizi</th>
									<th>Assesment</th>
									<th>Planning</th>
									<th>Detail Lainnya</th>
									<th>Dokter</th>
									<th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($rekam_medis as $key => $rm): ?>
									   <tr>
										   <td><?= $key + 1 ?></td>
    <td><?= htmlspecialchars($rm['no_rekam_medis'], ENT_QUOTES, 'UTF-8'); ?></td>
										   <td><?= htmlspecialchars($rm['nama_pasien'], ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?= htmlspecialchars($rm['tanggal_kunjungan'], ENT_QUOTES, 'UTF-8'); ?></td>
										   <td><?= htmlspecialchars($rm['nama_pelayanan'], ENT_QUOTES, 'UTF-8'); ?></td>
										   <td><?= htmlspecialchars($rm['jam_periksa'], ENT_QUOTES, 'UTF-8'); ?></td>
											<td>
										   	<?= 'Imunisasi: ' . htmlspecialchars($rm['jenis_imunisasi'], ENT_QUOTES, 'UTF-8') . ', ' .
											   	'Tanggal: ' . htmlspecialchars($rm['tgl_imunisasi'], ENT_QUOTES, 'UTF-8'); ?>
											</td>
											<td><?= htmlspecialchars($rm['tgl_vit_A'], ENT_QUOTES, 'UTF-8'); ?></td>
											<td>
												<?= 'Motorik Kasar: ' . htmlspecialchars($rm['motoric_kasar'], ENT_QUOTES, 'UTF-8') . ', ' .
													'Motorik Halus: ' . htmlspecialchars($rm['motoric_halus'], ENT_QUOTES, 'UTF-8') . ', ' .
													'Gangguan Bicara: ' . htmlspecialchars($rm['gangguan_bicara'], ENT_QUOTES, 'UTF-8') . ', ' .
													'Gangguan Sosialisasi: ' . htmlspecialchars($rm['gangguan_sosialisasi'], ENT_QUOTES, 'UTF-8') . ', ' .
													'Pendengaran: ' . htmlspecialchars($rm['pendengaran'], ENT_QUOTES, 'UTF-8') . ', ' .
													'Penglihatan: ' . htmlspecialchars($rm['penglihatan'], ENT_QUOTES, 'UTF-8'); ?>
											</td>
											<td>
										   	<?= 'Keluhan Utama: ' . htmlspecialchars($rm['keluhan_utama'], ENT_QUOTES, 'UTF-8') . ', ' .
											   	'Keluhan Tambahan: ' . htmlspecialchars($rm['keluhan_tambahan'], ENT_QUOTES, 'UTF-8'); ?>
											</td>
											<td>
												<?= 'Riwayat Penyakit Sekarang: ' . htmlspecialchars($rm['riwayat_penyakit_sekarang'], ENT_QUOTES, 'UTF-8') . ', ' .
													'Riwayat Penyakit Dahulu: ' . htmlspecialchars($rm['riwayat_penyakit_dahulu'], ENT_QUOTES, 'UTF-8') . ', ' .
													'Riwayat Penyakit Keluarga: ' . htmlspecialchars($rm['riwayat_penyakit_keluarga'], ENT_QUOTES, 'UTF-8') . ', ' .
													'Riwayat Alergi: ' . htmlspecialchars($rm['riwayat_alergi'], ENT_QUOTES, 'UTF-8'); ?>
											</td>
											<td>
										   	<?= 'Keadaan Umum: ' . htmlspecialchars($rm['keadaan_umum'], ENT_QUOTES, 'UTF-8') . ', ' .
											   	'Tekanan Darah: ' . htmlspecialchars($rm['tekanan_darah'], ENT_QUOTES, 'UTF-8') . ', ' .
											   	'Nadi: ' . htmlspecialchars($rm['nadi'], ENT_QUOTES, 'UTF-8') . ', ' .
											   	'Suhu: ' . htmlspecialchars($rm['suhu'], ENT_QUOTES, 'UTF-8') . ', ' .
											   	'RR: ' . htmlspecialchars($rm['rr'], ENT_QUOTES, 'UTF-8') . ', ' .
											   	'Frekuensi Napas: ' . htmlspecialchars($rm['frekuensi_napas'], ENT_QUOTES, 'UTF-8'); ?>
										   </td>
											<td>
												<?= 'Tinggi Badan: ' . htmlspecialchars($rm['tinggi_badan'], ENT_QUOTES, 'UTF-8') . ', ' .
													'Berat Badan: ' . htmlspecialchars($rm['berat_badan'], ENT_QUOTES, 'UTF-8') . ', ' .
													'LP: ' . htmlspecialchars($rm['lp'], ENT_QUOTES, 'UTF-8') . ', ' .
													'IMT: ' . htmlspecialchars($rm['imt'], ENT_QUOTES, 'UTF-8'); ?>
										   </td>
											<td>
												<?= 'Kepala Leher: ' . htmlspecialchars($rm['kepala_leher'], ENT_QUOTES, 'UTF-8') . ', ' .
													'Thorax: ' . htmlspecialchars($rm['thorax'], ENT_QUOTES, 'UTF-8') . ', ' .
													'Abdomen: ' . htmlspecialchars($rm['abdomen'], ENT_QUOTES, 'UTF-8') . ', ' .
													'Ekstremitas: ' . htmlspecialchars($rm['ekstremitas'], ENT_QUOTES, 'UTF-8'); ?>
										   </td>
										   <td>
										   	<?= 'Diagnosa Medis: ' . htmlspecialchars($rm['diagnosa_medis'], ENT_QUOTES, 'UTF-8') . ', ' .
											   	'Diagnosa Keperawatan: ' . htmlspecialchars($rm['diagnosa_keperawatan'], ENT_QUOTES, 'UTF-8'); ?>
										   </td>
										   <td>
										   	<?= 'Rencana Pengobatan: ' . htmlspecialchars($rm['rencana_pengobatan'], ENT_QUOTES, 'UTF-8') . ', ' .
											   	'Rencana Edukasi: ' . htmlspecialchars($rm['rencana_edukasi'], ENT_QUOTES, 'UTF-8') . ', ' .
											   	'Rencana Diagnostik: ' . htmlspecialchars($rm['rencana_diagnostik'], ENT_QUOTES, 'UTF-8') . ', ' .
											   	'Rencana Monitoring Tanggal: ' . htmlspecialchars($rm['rencana_mon_tgl'], ENT_QUOTES, 'UTF-8') . ', ' .
											   	'Rencana Asuhan Keperawatan: ' . htmlspecialchars($rm['rencana_asuhan_keperawatan'], ENT_QUOTES, 'UTF-8') . ', ' .
											   	'Rujuk RS: ' . htmlspecialchars($rm['rujuk_rs'], ENT_QUOTES, 'UTF-8'); ?>
											</td>
											<td>
												<?= 'Lainnya: ' . htmlspecialchars($rm['lainnya'], ENT_QUOTES, 'UTF-8') . ', ' .
													htmlspecialchars($rm['lainnya1'], ENT_QUOTES, 'UTF-8'); ?>
											</td>
											<td><?= htmlspecialchars($rm['nama'], ENT_QUOTES, 'UTF-8'); ?></td>
											<td>
												<a href="<?= base_url('Petugas/detail_data_rekammedis/' . $rm['id_rekam']); ?>"
													class="badge badge-warning">Detail</a>
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
	<br>
	<br>
	</div>
	<!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        var table = $('#table-tbrekammedis').DataTable();
        var rekamMedisData = <?php echo json_encode($rekam_medis); ?>; // Mengambil data rekam medis dari PHP

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
        rekamMedisData.forEach(function (rm) {
            if (!noRekamMedisSet.has(rm.no_rekam_medis)) {
                noRekamMedisSet.add(rm.no_rekam_medis);
                filterDropdown.append('<option value="' + rm.no_rekam_medis + '">' + rm.no_rekam_medis + '</option>');
            }
        });
    } else if (filterType === 'tanggal_kunjungan') {
        var tanggalKunjunganSet = new Set();
        rekamMedisData.forEach(function (rm) {
            if (!tanggalKunjunganSet.has(rm.tanggal_kunjungan)) {
                tanggalKunjunganSet.add(rm.tanggal_kunjungan);
                filterDropdown.append('<option value="' + rm.tanggal_kunjungan + '">' + rm.tanggal_kunjungan + '</option>');
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
   
    } else if (filterType === 'tanggal_kunjungan') {
        table.columns(3).search(selectedValue).draw();
    }
});
});
</script>
</body>
</html>
