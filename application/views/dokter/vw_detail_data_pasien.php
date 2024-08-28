<div class="container-fluid">
	<div class="container">
		<div class="collapse navbar-collapse" id="collapsibleNavId">
			<ul class="navbar-nav ml-auto mt-2 mt-lg-0">

			</ul>
		</div>
	</div>
	</nav>

	<div class="container mt-5 mb-5">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="float">
						<a href="<?=base_url('Dokter/pasien')?>" class="btn btn-danger mb-2">Kembali</a>
					</div>
					<div class="col-sm-12">
						<div class="card" style="background-color: rgba(245, 245, 245, 0.9);">
							<div class="row">
								<div class="card-body">
									<center>
										<h4 class="title"><strong>Detail Kunjungan Pasien</strong></h4><br><br>
									</center>
									<?= $this->session->flashdata('message') ?>

									<div class="card-block">
										<form action="" method="POST" enctype="multipart/form-data">
											<input type="hidden" name="id_kunjungan"
												value="<?= $kunjungan['id_kunjungan']; ?>">
											<div class="form-group row">
												<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;No Rekam
														Medis</strong></label>
												<div class="col-sm-6">
													<p>: <?= $kunjungan['no_rekam_medis']; ?></p>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Nama
														Pasien</strong></label>
												<div class="col-sm-6">
													<p>: <?= $kunjungan['nama_pasien']; ?></p>
												</div>
											</div>

											<div class="form-group row">
												<label
													class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Umur</strong></label>
												<div class="col-sm-6">
													<p>: <?= $kunjungan['umur']; ?></p>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Tanggal
														Lahir</strong></label>
												<div class="col-sm-6">
													<p>: <?= $kunjungan['tanggal_lahir']; ?></p>
												</div>
											</div>

											<div class="form-group row">
												<label
													class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Alamat</strong></label>
												<div class="col-sm-6">
													<p>: <?= $kunjungan['alamat']; ?></p>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;Jenis
														Kelamin</strong></label>
												<div class="col-sm-6">
													<p>: <?= $kunjungan['jenis_kelamin']; ?></p>
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
												<label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp; No
														HP</strong></label>
												<div class="col-sm-6">
													<p>: <?= $kunjungan['no_hp']; ?></p>
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
												<label class="col-sm-6 col-form-label"><strong> &emsp;&emsp;&emsp;Poli</strong></label>
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

