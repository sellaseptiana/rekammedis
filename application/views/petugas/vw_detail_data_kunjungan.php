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
<div class="container mt-5 mb-5">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-md-6">
					<a href="<?= base_url('Petugas/kunjungan') ?>" class="btn btn-danger mb-2">Kembali</a>
				</div>
				<div class="col-md-6 text-right">
					<a href="<?= base_url() ?>Petugas/tambah_kunjungan" class="btn btn-primary">Tambah Data</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<center>
				<h4 class="title"><strong>Detail Kunjungan Pasien</strong></h4><br><br>
			</center>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;No Rekam Medis</strong></label>
				<div class="col-sm-8">
					<p>: <?= $kunjungan['no_rekam_medis']; ?></p>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Nama Pasien</strong></label>
				<div class="col-sm-8">
					<p>: <?= $pasien['nama_pasien']; ?></p>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Umur Pasien</strong></label>
				<div class="col-sm-8">
					<p>: <?= $pasien['umur']; ?></p>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Tanggal Lahir Pasien</strong></label>
				<div class="col-sm-8">
					<p>: <?= $pasien['tanggal_lahir']; ?></p>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Alamat</strong></label>
				<div class="col-sm-8">
					<p>: <?= $pasien['alamat']; ?></p>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Pendidikan Pasien</strong></label>
				<div class="col-sm-8">
					<p>: <?= $pasien['pendidikan']; ?></p>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Pekerjaan Pasien</strong></label>
				<div class="col-sm-8">
					<p>: <?= $pasien['pekerjaan']; ?></p>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Tanggal Kunjungan</strong></label>
				<div class="col-sm-8">
					<p>: <?= $kunjungan['tanggal_kunjungan']; ?></p>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Status</strong></label>
				<div class="col-sm-8">
					<p>: <?= $kunjungan['status']; ?></p>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;No BPJS</strong></label>
				<div class="col-sm-8">
					<p>: <?= $kunjungan['no_bpjs']; ?></p>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Poli</strong></label>
				<div class="col-sm-8">
					<p>: <?= $kunjungan['nama_poli']; ?></p>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Nama Pelayanan</strong></label>
				<div class="col-sm-8">
					<p>: <?= $kunjungan['nama_pelayanan']; ?></p>
				</div>
			</div>
			<?php if ($kunjungan['nama_pelayanan'] == 'Bumil') : ?>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Nama
																Suami</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['nama_suami']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Tanggal
																Lahir Suami</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['tanggal_lahir_suami']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Pendidikan
																Suami</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['pendidikan_suami']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Pekerjaan
																Suami</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['pekerjaan_suami']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Umur
																Suami</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['umur_suami']; ?></p>
														</div>
													</div>
													<?php elseif ($kunjungan['nama_pelayanan'] == 'KB') : ?>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Nama
																Suami</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['nama_suami']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;
																Tanggal Lahir Suami</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['tanggal_lahir_suami']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;
																Suami</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['umur_suami']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;
																Pekerjaan Suami</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['pekerjaan_suami']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Umur
																Pendidikan Suami</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['pendidikan_suami']; ?></p>
														</div>
													</div>
													<?php elseif ($kunjungan['nama_pelayanan'] == 'Anak') : ?>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Nama
																Ayah</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['nama_ayah']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Nama
																Ibu</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['nama_ibu']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Berat
																Lahir</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['berat_lahir']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Umur
																Ayah</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['umur_ayah']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Umur
																Ibu</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['umur_ibu']; ?></p>
														</div>
													</div>
													<?php endif; ?>
		</div>
		<div class="card-body">
			<h4>Semua Kunjungan Pasien <?= $pasien['nama_pasien']; ?></h4>
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
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
							<!-- <th>Detail Tambahan</th> -->
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($kunjungan1 as $key => $k) : ?>
						<tr>
							<td><?= $key + 1 ?></td>
							<td><?= $k['no_rekam_medis']; ?></td>
							<td><?= $k['nama_pasien']; ?></td>
							<td><?= $k['tanggal_kunjungan']; ?></td>
							<td><?= $k['status']; ?></td>
							<td><?= $k['no_bpjs']; ?></td>
							<td><?= $k['nama_poli']; ?></td>
							<td><?= $k['nama_pelayanan']; ?></td>
							<!-- <td>
                                    <?php if ($k['nama_pelayanan'] == 'Bumil') : ?>
                                        <strong>Nama Suami:</strong> <?= $k['nama_suami']; ?><br>
                                        <strong>Tanggal Lahir Suami:</strong> <?= $k['tanggal_lahir_suami']; ?><br>
                                        <strong>Pendidikan Suami:</strong> <?= $k['pendidikan_suami']; ?><br>
                                        <strong>Pekerjaan Suami:</strong> <?= $k['pekerjaan_suami']; ?><br>
                                        <strong>Umur Suami:</strong> <?= $k['umur_suami']; ?><br>
                                    <?php elseif ($k['nama_pelayanan'] == 'Anak') : ?>
                                        <strong>Nama Ayah:</strong> <?= $k['nama_ayah']; ?><br>
                                        <strong>Nama Ibu:</strong> <?= $k['nama_ibu']; ?><br>
                                        <strong>Berat Lahir:</strong> <?= $k['berat_lahir']; ?><br>
                                        <strong>Umur Ayah:</strong> <?= $k['umur_ayah']; ?><br>
                                        <strong>Umur Ibu:</strong> <?= $k['umur_ibu']; ?><br>
                                    <?php endif; ?>
                                </td> -->
								<td>
    <a href="<?= base_url('Petugas/detail/') . $k['id_kunjungan']; ?>" class="badge badge-warning">Detail</a><br>
    <a href="<?= base_url('Petugas/edit_kunjungan/') . $k['id_kunjungan']; ?>" class="badge badge-primary">Update</a><br>
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

