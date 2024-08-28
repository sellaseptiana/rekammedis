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
				<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
				</ul>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="<?=base_url('Apoteker/index')?>" class="btn btn-danger mb-2">Kembali</a>
			</div>
		</div>
	</nav>
	<div class="container mt-5 mb-5">
		<div class="card">
			<div class="card-header">
				<ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
				</ul>
				<h4> Data Rekam Medis</h4>
			</div>
			<div class="card-body" style="min-height: 400px; overflow-x: auto;">
			<!-- <div class="row mb-3">
    <div class="col-md-4">
        <select id="filter-type" class="form-control">
            <option value="">-- Pilih Jenis Filter --</option>
            <option value="no_rekam_medis">No Rekam Medis</option>
            <option value="nama">Nama Dokter</option>
        </select>
    </div>
    <div class="col-md-4">
        <select id="filter-dropdown" class="form-control">
            <option value="">-- Pilih Filter --</option>
        </select>
    </div>                </div> -->
				<div class="table-responsive">
					<table class="table table-striped table-bordered" id="table-tbrekammedis">
						<thead>
							<tr>
								<th width="5px">No</th>
								<th> Resep </th>
								<th> No Rekam Medis </th>
								<th> Nama </th>
								<th> Unit Layanan </th>

								<th> Keluhan Utama </th>
								<th> Keluhan Tambahan </th>
								
								<th> Riwayat Alergi </th>
								
								<th> Diagnosa Medis </th>
								<th> Rencana Pengobatan </th>
								
								<th> Lainnya</th>
								<th> Rujuk RS </th>
								<th> Dokter </th>
								<th> Aksi </th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($rekam_medis as $key => $rm) : ?>
							<tr>
								<td><?= $key + 1 ?></td>
                                <td><a href="<?= base_url('Apoteker/detailResep/' . $rm['id_rekam_medis']) ?>" class="btn btn-primary">Detail Resep</a></td>
								<td><?= $rm['no_rekam_medis']; ?></td>
								<td><?= $rm['nama_pasien']; ?></td>
								<td><?= $rm['nama_pelayanan']; ?></td>
								<td><?= $rm['keluhan_utama']; ?></td>
								<td><?= $rm['keluhan_tambahan']; ?></td>
								
								<td><?= $rm['riwayat_alergi']; ?></td>
								
								<td><?= $rm['diagnosa_medis']; ?></td>
								<td><?= $rm['rencana_pengobatan']; ?></td>
								
								<td><?= $rm['lainnya']; ?></td>
								<td><?= $rm['rujuk_rs']; ?></td>
								<td><?= $rm['nama']; ?></td>
								<td>
									<a href="<?= base_url('Apoteker/detail_data_rekammedis/'). $rm['id_rekam_medis']; ?>"
										class="badge badge-warning">Detail</a>


								</td>
							</tr>
							<?php $key++; ?>
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
    } else if (filterType === 'nama') {
        rekamMedisData.forEach(function (rm) {
            filterDropdown.append('<option value="' + rm.nama + '">' + rm.nama + '</option>');
        });
    }
});

// Ketika filter dipilih
$('#filter-dropdown').on('change', function () {
    var selectedValue = $(this).val();
    var filterType = $('#filter-type').val();

    if (filterType === 'no_rekam_medis') {
        table.columns(2).search(selectedValue).draw();
    } else if (filterType === 'nama') {
        table.columns(12).search(selectedValue).draw();
    }
});
});
</script>