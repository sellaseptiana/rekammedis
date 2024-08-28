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
				<a href="<?=base_url('Apoteker/rekammedis')?>" class="btn btn-danger mb-2">Kembali</a>
			</div>
		</div>
	</nav>
	<div class="container mt-5 mb-5">
		<div class="card">
			<div class="card-header">
				<ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
							</ul>
				<h4>Data Resep</h4>
			</div>
            <div class="row ml-2 mt-2">
                <div class="col-sm-4">
                    <strong>No Rekam Medis</strong>
                    <input type="text" class="form-control" value="<?= $rekam_medis['no_rekam_medis']; ?>" disabled>
                </div>
                <div class="col-sm-4">
                    <strong>Nama Pasien</strong>
                    <input type="text" class="form-control" value="<?= $rekam_medis['nama_pasien']; ?>" disabled>
                </div>
                <div class="col-sm-3">
                    <strong>Nama Dokter</strong>
                    <input type="text" class="form-control" value="<?= $rekam_medis['nama']; ?>" disabled>
                </div>
                <div class="col-sm-4">
                    <strong>Pelayanan</strong>
                    <input type="text" class="form-control" value="<?= $rekam_medis['nama_pelayanan']; ?>" disabled>
                </div>
                <div class="col-sm-4">
                    <strong>Tanggal Kunjungan</strong>
                    <input type="text" class="form-control" value="<?= $rekam_medis['tanggal_kunjungan']; ?>" disabled>
                </div>
            </div>

			<div class="card-body" style="min-height: 400px; overflow-x: auto;">
				<div class="table-responsive">
					<table class="table table-striped table-bordered" id="table-obat">
						<thead>
							<tr>
							<th>No</th>
                    <th>Nama Obat</th>
                    <th>Jenis Obat</th>
                   
                    <th>Jumlah</th>
                    <th>Keterangan Resep</th>
                </tr>
            </thead>
            <tbody>
                <!-- Pastikan $rekammedis tidak kosong dan merupakan array -->
                <?php if (!empty($rekammedis) && is_array($rekammedis)) : ?>
                    <?php $no = 1; ?>
                    <?php foreach ($rekammedis as $rm) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo isset($rm['nama_obat']) ? $rm['nama_obat'] : ''; ?></td>
                            <td><?php echo isset($rm['jenis_obat']) ? $rm['jenis_obat'] : ''; ?></td>
                            <td><?php echo isset($rm['jumlah']) ? $rm['jumlah'] : ''; ?></td>
                            <td><?php echo isset($rm['keterangan_resep']) ? $rm['keterangan_resep'] : ''; ?></td>
                            
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
