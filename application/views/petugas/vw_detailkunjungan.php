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
					<div class="float">
						<a href="<?= base_url('Petugas/kunjungan') ?>" class="btn btn-danger mb-2">Kembali</a>
					</div>
					<div class="col-sm-12">
						<div class="card" style="background-color: rgba(245, 245, 245, 0.9);">
							<div class="row">
								<div class="card-body">
									<div class="row">
										<div class="col-md-10">
											<center>
												<h4 class="title"><strong>Detail Kunjungan Pasien</strong></h4><br><br>
											</center>

											<?= $this->session->flashdata('message') ?>
											<div class="card-block">
												<form
													action="<?= base_url('Petugas/detail_kunjungan/' . $kunjungan['id_kunjungan']) ?>"
													method="POST">
													<input type="hidden" name="id_kunjungan"
														value="<?= $kunjungan['id_kunjungan']; ?>">
													<div class="form-group row">
														<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;No
																Rekam
																Medis</strong></label>
														<div class="col-sm-6">
															<p>: <?= $kunjungan['no_rekam_medis']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Nama
																Pasien</strong></label>
														<div class="col-sm-6">
															<p>: <?= $pasien['nama_pasien']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Tanggal Lahir
																Pasien</strong></label>
														<div class="col-sm-6">
															<p>: <?= $pasien['tanggal_lahir']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Umur 
																Pasien</strong></label>
														<div class="col-sm-6">
															<p>: <?= $pasien['umur']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Pendidikan 
																Pasien</strong></label>
														<div class="col-sm-6">
															<p>: <?= $pasien['pendidikan']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Pekerjaan 
																Pasien</strong></label>
														<div class="col-sm-6">
															<p>: <?= $pasien['pekerjaan']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Alamat 
																</strong></label>
														<div class="col-sm-6">
															<p>: <?= $pasien['alamat']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Tanggal
																Kunjungan</strong></label>
														<div class="col-sm-6">
															<p>: <?= $kunjungan['tanggal_kunjungan']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label
															class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Status</strong></label>
														<div class="col-sm-6">
															<p>: <?= $kunjungan['status']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;No
																BPJS</strong></label>
														<div class="col-sm-6">
															<p>: <?= $kunjungan['no_bpjs']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label
															class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Poli</strong></label>
														<div class="col-sm-6">
															<p>: <?= $kunjungan['nama_poli']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Nama
																Pelayanan</strong></label>
														<div class="col-sm-6">
															<p>: <?= $kunjungan['nama_pelayanan']; ?></p>
														</div>
													</div>
													<?php if ($kunjungan['nama_pelayanan'] == 'Bumil') : ?>
													<div class="form-group row">
														<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Nama
																Suami</strong></label>
														<div class="col-sm-6">
															<p>: <?= $kunjungan['nama_suami']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Tanggal
																Lahir Suami</strong></label>
														<div class="col-sm-6">
															<p>: <?= $kunjungan['tanggal_lahir_suami']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Pendidikan
																Suami</strong></label>
														<div class="col-sm-6">
															<p>: <?= $kunjungan['pendidikan_suami']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Pekerjaan
																Suami</strong></label>
														<div class="col-sm-6">
															<p>: <?= $kunjungan['pekerjaan_suami']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Umur
																Suami</strong></label>
														<div class="col-sm-6">
															<p>: <?= $kunjungan['umur_suami']; ?></p>
														</div>
													</div>
													<?php elseif ($kunjungan['nama_pelayanan'] == 'Anak') : ?>
													<div class="form-group row">
														<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Nama
																Ayah</strong></label>
														<div class="col-sm-6">
															<p>: <?= $kunjungan['nama_ayah']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Nama
																Ibu</strong></label>
														<div class="col-sm-6">
															<p>: <?= $kunjungan['nama_ibu']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Berat
																Lahir</strong></label>
														<div class="col-sm-6">
															<p>: <?= $kunjungan['berat_lahir']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Umur
																Ayah</strong></label>
														<div class="col-sm-6">
															<p>: <?= $kunjungan['umur_ayah']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Umur
																Ibu</strong></label>
														<div class="col-sm-6">
															<p>: <?= $kunjungan['umur_ibu']; ?></p>
														</div>
													</div>
													<?php endif; ?>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
