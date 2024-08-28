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
						<a href="<?=base_url('Petugas/detail_data_rekammedis')?>" class="btn btn-danger mb-2">Kembali</a>
					</div>
					<div class="col-sm-12">
						<div class="card" style="background-color: rgba(245, 245, 245, 0.9);">
							<div class="row">
								<div class="card-body">
									<center>
										<h4 class="title"><strong>Detail rekam Medis</strong></h4><br><br>
									</center>
									<?= $this->session->flashdata('message') ?>

									<div class="card-block">
										<form action="" method="POST" enctype="multipart/form-data">
											<div class="form-group">
												<div class="form-group">

													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;No Rekam
																Medis</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $kunjungan['no_rekam_medis']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label
															class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Nama</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $pasien['nama_pasien']; ?></td>
														</label>
													</div>

													<div class="form-group row">
														<label
															class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Umur</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $pasien['umur']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Tanggal
																Lahir</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $pasien['tanggal_lahir']; ?></td>
														</label>
													</div>

													<div class="form-group row">
														<label
															class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Alamat</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $pasien['alamat']; ?></td>
														</label>
													</div>

													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Jenis
																Kelamin</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $pasien['jenis_kelamin']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp; No
																HP</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $pasien['no_hp']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Keluhan
																Utama</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['keluhan_utama']; ?></td>
														</label>
													</div>

													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Keluhan
																Tambahan</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['keluhan_tambahan']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Riwayat
																Penyakit Sekarang</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['riwayat_penyakit_sekarang']; ?>
															</td>
														</label>
													</div>

													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Riwayat
																Penyakit Dahulu</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['riwayat_penyakit_dahulu']; ?>
															</td>
														</label>
													</div>

													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Riwayat
																Penyakit Keluarga</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['riwayat_penyakit_keluarga']; ?>
															</td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Riwayat
																Alergi</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['riwayat_alergi']; ?></td>
														</label>
													</div>

													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Tindakan
																Terapi</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['tindakan_terapi']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Obat
																Sering Digunakan</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['obat_sering_digunakan']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Obat
																Sering Konsumsi</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['obat_sering_konsumsi']; ?></td>
														</label>
													</div>

													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Keadaan
																Umum</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['keadaan_umum']; ?></td>
														</label>
													</div>

													<div class="form-group row">
														<label
															class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Kesadaran</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['kesadaran']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Tekanan
																Darah</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['tekanan_darah']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label
															class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Nadi</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['nadi']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label
															class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Suhu</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['suhu']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label
															class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Frekuensi</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['frekuensi_napas']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Tinggi
																badan</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['tinggi_badan']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Berat
																badan</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['berat_badan']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label
															class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;IMT</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['imt']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Hasil Gizi</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> :  <?php if ($rekammedis['total_skor'] > 2): ?>
                                        Butuh penangan lebih lanjut oleh ahli gizi
                                    <?php else: ?>
                                        Gizi baik
                                    <?php endif; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Kepala /
																Leher</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['kepala_leher']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label
															class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Thorax</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['thorax']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label
															class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Abdomen</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['abdomen']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label
															class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Ekstremitas</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['ekstremitas']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label
															class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Lainnya</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['lainnya']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Status
																Mental</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['status_mental']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Respons
																Emosi</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['respons_emosi']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Hubungan
																Pasien Keluarga</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['hub_pasien_keluarga']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Taat
																Ibadah</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['taat_ibadah']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label
															class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Bahasa</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['bahasa']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label
															class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Lab</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['lab']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Pemeriksaan
																Lain</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['pemeriksaan_lain']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Diagnosa
																Medis</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['diagnosa_medis']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Diagnosa
																Keperawatan</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['diagnosa_keperawatan']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Rencana
																Pengobatan</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['rencana_pengobatan']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Rencana
																Edukasi</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['rencana_edukasi']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Rencana
																Diagnostik</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['rencana_diagnostik']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Rencana
																Monitoring</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['rencana_mon_tgl']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label
															class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Lainnya</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['lainnya1']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Rujuk
																Rumah Sakit</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $rekammedis['rujuk_rs']; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Nama
																Dokter</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?= $dokter['nama']; ?></td>
														</label>
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
	</div>
</div>
