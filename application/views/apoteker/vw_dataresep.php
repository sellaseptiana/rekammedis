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
				<a href="<?=base_url('Apoteker/index')?>" class="btn btn-danger mb-2">Kembali</a>
			</div>
		</div>
	</nav>
    <div class="container mt-5 mb-5">
		<div class="card">
			<div class="card-header">
				<div class="d-flex flex-wrap justify-content-between align-items-center">
					<h3 class="font-weight-bold">Resep</h3>
					<a href="<?= base_url('Export/resep') ?>" class="btn btn-success">
						<i class="fas fa-file-excel mr-1"></i> Excel
					</a>
				</div>
			</div>
			<div class="card-body" style="min-height: 400px; overflow-x: auto;">
				<div class="table-responsive">
					<table class="table table-striped table-bordered" id="table-resep">
						<thead>
							<tr>
							<th>No</th>
                    <th>No Rekam Medis</th>
                    <th>Nama Pasien</th>
                    <th>Nama Pelayanan</th>
                    <th>Nama Obat</th>
                    <th>Jenis Obat</th>
                  
                    <th>Jumlah</th>
                    <th>Keterangan Resep</th>
                    <th>Tanggal Periksa</th>
                    <th>Nama Dokter</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Pastikan $rekammedis tidak kosong dan merupakan array -->
                <?php if (!empty($rekammedis) && is_array($rekammedis)) : ?>
                    <?php $no = 1; ?>
                    <?php foreach ($rekammedis as $rm) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo isset($rm['no_rekam_medis']) ? $rm['no_rekam_medis'] : ''; ?></td>
                            <td><?php echo isset($rm['nama_pasien']) ? $rm['nama_pasien'] : ''; ?></td>
                            <td><?php echo isset($rm['nama_pelayanan']) ? $rm['nama_pelayanan'] : ''; ?></td>
                            <td><?php echo isset($rm['nama_obat']) ? $rm['nama_obat'] : ''; ?></td>
                            <td><?php echo isset($rm['jenis_obat']) ? $rm['jenis_obat'] : ''; ?></td>
                            <td><?php echo isset($rm['jumlah']) ? $rm['jumlah'] : ''; ?></td>
                            <td><?php echo isset($rm['keterangan_resep']) ? $rm['keterangan_resep'] : ''; ?></td>
                            <td><?php echo isset($rm['tanggal_periksa']) ? $rm['tanggal_periksa'] : ''; ?></td>
                            <td><?php echo isset($rm['nama_dokter']) ? $rm['nama_dokter'] : ''; ?></td>
                            <td>
                                <a href="<?= base_url('Apoteker/detail_resep/') . $rm['id_resep']; ?>" class="badge badge-warning">Detail</a>                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="12">Data tidak ditemukan</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

			</div>
		</div>
	</div>
	</div>
	<!-- Tambahkan JavaScript dan Bootstrap JS yang diperlukan -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<script src="<?= base_url('assets') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table-resep').DataTable();
    });
</script>