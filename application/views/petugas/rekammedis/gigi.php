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
					<h4 class="font-weight-bold">Rekam Medis Gigi</h4>
					<a href="<?= base_url('Export/gigirm') ?>" class="btn btn-success">
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
    </div>                </div>
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
                                <th>Anamnesa</th>
                                <th>Riwayat Penyakit</th>
                                <th>Tanda-Tanda Vital</th>
                                <th>Jenis Gigi</th>
                                <th>Detail</th>	
                                <th>Odontogram</th>
                                <th>Pemeriksaan Penunjang</th>
                                <th>Assesment</th>
                                <th>Planning</th>
                                <th>Lainnya</th>
                                <th>Dokter</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
                        <?php foreach ($rekam_medis as $key => $rm) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $rm['no_rekam_medis']; ?></td>
                                <td><?= $rm['nama_pasien']; ?></td>
                                <td><?= $rm['tanggal_kunjungan']; ?></td>
                                <td><?= $rm['nama_pelayanan']; ?></td>
                                <td><?= $rm['jam_periksa']; ?></td>
                                <td><?= 'Keluhan Utama: ' . $rm['keluhan_utama'] . ', ' .
           'Keluhan Tambahan: ' . $rm['keluhan_tambahan']. ', ' .
   'Obat Sering Digunakan: ' . $rm['obat_sering_digunakan'] . ', ' .
           'Obat Sering Konsumsi: ' . $rm['obat_sering_konsumsi'] . ', ' .
  'Tindakan Terapi: ' . $rm['tindakan_terapi']; ?></td>
  <td><?= 'Riwayat Penyakit Sekarang: ' . $rm['riwayat_penyakit_sekarang'] . ', ' .
           'Riwayat Penyakit Dahulu: ' . $rm['riwayat_penyakit_dahulu'] . ', ' .
           'Riwayat Penyakit Keluarga: ' . $rm['riwayat_penyakit_keluarga'] . ', ' .
           'Riwayat Alergi: ' . $rm['riwayat_alergi']; ?></td>
           <td><?=      'Tekanan Darah: ' . $rm['tekanan_darah'] . ', ' .
           'Nadi: ' . $rm['nadi'] . ', ' .
           'Suhu: ' . $rm['suhu']; ?></td>
             <td><?= $rm['odontogram']; ?></td>
             <td><?= $rm['lainnya']; ?></td>
             <td><?= 'Occlusi: ' . $rm['occlusi'] . ', ' .
           'Torus Palatines: ' . $rm['torus_palatines'] . ', ' .
           'Torus Mandibularis: ' . $rm['torus_mandibularis'] . ', ' .
           'Palatum: ' . $rm['palatum'] . ', ' .
           'Diasterna: ' . $rm['diasterna'] . ', ' .
           'Gigi Anomaly: ' . $rm['gigi_anomaly']; ?>
</td>
<td><?= 'Lab: ' . $rm['lab'] . ', ' .
 'Radiology: ' . $rm['radiology']; ?>
   <td><?= $rm['diagnosa_medis']; ?></td>
 <td><?= 'Rencana Pengobatan: ' . $rm['rencana_pengobatan'] . ', ' .
           'Rencana Edukasi: ' . $rm['rencana_edukasi'] . ', ' .
           'Rencana Diagnostik: ' . $rm['rencana_diagnostik'] . ', ' .
           'Rencana Monitoring Tanggal: ' . $rm['rencana_mon_tgl']. ', ' .
           'Rujuk RS: ' . $rm['rujuk_rs']; ?></td>   
                                <td><?= $rm['lainnya1']; ?></td>
                                <td><?= $rm['nama']; ?></td>
                                <td>
                                    <a href="<?= base_url('Petugas/detail_data_rekammedis/') . $rm['id_rekam']; ?>" class="badge badge-warning">Detail</a>
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
        rekamMedisData.forEach(function (rm) {
            filterDropdown.append('<option value="' + rm.no_rekam_medis + '">' + rm.no_rekam_medis + '</option>');
        });
    } else if (filterType === 'tanggal_kunjungan') {
        rekamMedisData.forEach(function (rm) {
            filterDropdown.append('<option value="' + rm.tanggal_kunjungan + '">' + rm.tanggal_kunjungan + '</option>');
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