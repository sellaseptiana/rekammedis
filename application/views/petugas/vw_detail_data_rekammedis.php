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
						<a href="<?=base_url('Petugas/rekammedis')?>" class="btn btn-danger mb-2">Kembali</a>
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
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;No
																Rekam
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
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Hasil
																Gizi</strong>
														</label>
														<br>
														<label class="col-sm-8 col-form-label">
															<td> : <?php if ($rekammedis['total_skor'] > 2): ?>
																Butuh penangan lebih lanjut oleh ahli gizi
																<?php else: ?>
																Gizi baik
																<?php endif; ?></td>
														</label>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Kepala
																/
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
													<?php if ($kunjungan['nama_pelayanan'] == 'Bumil') : ?>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;
																Riwayat Kontrasepsi Terakhir</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['riwayat_kontrasepsi_trk']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Hamil
																Ke</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['hamilke']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label
															class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Bersuami</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['bersuami']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label
															class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Usia Pertama Kali Kawin</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['usia_pertama_kali_kawin']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label
															class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;HPHT</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['hpht']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp; Siklus Menstruasi
															</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['siklus_mens']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Teratur
															</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['teratur']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Banyaknya Haid
															</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['banyak_haid']; ?></p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Gumpalan
															</strong></label>
														<div class="col-sm-8">
															<p>: <?= $kunjungan['gumpalan']; ?></p>
														</div>
													</div>
													<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Merasa Sakit</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['merasa_sakit']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Fluor</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['fluor']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Imunisasi</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['imunisasi']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Keluhan Lain</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['keluhan_lain']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Kebiasaan</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['kebiasaan']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Bentuk Tubuh</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['bentuk_tubuh']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Kepala</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['kepala']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Ekstrem</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['ekstrem']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Tinggi Fundus Uteri</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['tinggi_fundus_uteri']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Bentuk Uterus</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['bentuk_uterus']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Letak Janin</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['letak_janin']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Gerak Janin</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['gerak_janin']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Detak Jantung Janin</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['detak_jantung_janin']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Inspekulo</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['inspekulo']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Pendarahan</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['pendarahan']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Indikasi</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['indikasi']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Lingkar Lengan</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['lingkar_lengan']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Pemeriksaan HB</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['pemeriksaan_hb']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Pemeriksaan Urine</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['pemeriksaan_urine']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Pemeriksaan Albumin</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['pemeriksaan_albumin']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Pemeriksaan HIV</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['pemeriksaan_hiv']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Pemeriksaan HBSAG</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['pemeriksaan_hbsag']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Pemeriksaan Gol Darah</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['pemeriksaan_gol_darah']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Pemeriksaan Gula Darah</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['pemeriksaan_gula_darah']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Jantung</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['jantung']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Paru</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['paru']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Payudara</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['payudara']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Hepar</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['hepar']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Bising Usus</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['bising_usus']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Pembesaran</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['pembesaran']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Superior</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['superior']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Inferior</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['inferior']; ?></p>
  </div>
</div>
													<?php elseif ($kunjungan['nama_pelayanan'] == 'KB') : ?>
														<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Jumlah Anak</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['jumlah_anak']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Jumlah Anak Laki</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['jumlah_anak_laki']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Jumlah Anak Perempuan</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['jumlah_anak_perempuan']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Umur Anak Terkecil</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['umur_anak_terkecil']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Status KB</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['status_kb']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Cara KB Terakhir</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['cara_kb_terakhir']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Haid Terakhir</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['haid_terakhir']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Kehamilan</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['kehamilan']; ?></p>
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Gravida</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['gravida']; ?></p>
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Partus</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['partus']; ?></p>
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Abortus</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['abotus']; ?></p>
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Menyusui</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['menyusui']; ?></p>
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Riwayat Penyakit</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['riwayat_penyakit']; ?></p>
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Pemeriksaan Tambahan</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['dalma']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Posisi Rahim</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['posisi_rahim']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Jenis Kontrasepsi</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['jenis_kontrasepsi']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Tambahan</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['tambahan']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Tanggal Dilayani</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['tgl_dilayani']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Tanggal Pesan Kembali</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['tgl_pesan_kembali']; ?></p>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Tanggal Cabut</strong></label>
  <div class="col-sm-8">
    <p>: <?= $kunjungan['tgl_cabut']; ?></p>
  </div>
</div>
													<?php elseif ($kunjungan['nama_pelayanan'] == 'Pemeriksaan Anak') : ?>

														<?php elseif ($kunjungan['nama_pelayanan'] == 'Pemeriksaan Gigi & Mulut') : ?>
													
													<?php endif; ?>

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
											<div class="card-body">
												<h4>Semua Rekam Medis Pasien <?= $pasien['nama_pasien']; ?></h4>
												<div class="table-responsive">
													<table class="table table-striped table-bordered">
														<thead>
															<tr>
																<th width="5px">No</th>
																<th>No Rekam Medis</th>
																<th>Nama</th>
																<th>Unit Pelayanan</th>
																<th>Jam Periksa</th>
																<th>Keluhan Utama</th>
																<th>Keluhan Tambahan</th>
																<th>Riwayat Penyakit Sekarang</th>
																<th>Riwayat Penyakit Dahulu</th>
																<th>Riwayat Penyakit Keluarga</th>
																<th>Riwayat Alergi</th>
																<th>Tindakan Terapi</th>
																<th>Obat Sering Digunakan</th>
																<th>Obat Sering Dikonsumsi</th>
																<th>Keadaan Umum</th>
																<th>Kesadaran</th>
																<th>Tekanan Darah</th>
																<th>Nadi</th>
																<th>Suhu</th>
																<th>Frekuensi Napas</th>
																<th>Tinggi Badan</th>
																<th>Berat Badan</th>
																<th>IMT</th>
																<th> pertanyaan1 </th>
																<th> pertanyaan2 </th>
																<th> pertanyaan3 </th>
																<th> pertanyaan4 </th>
																<th> pertanyaan5 </th>
																<th> pertanyaan6 </th>
																<th> pertanyaan7 </th>
																<th>Kepala Leher</th>
																<th>Thorax</th>
																<th>Abdomen</th>
																<th>Ekstremitas</th>
																<th>Lainnya</th>
																<th>Status Mental</th>
																<th>Respons Emosi</th>
																<th>Hubungan Pasien Keluarga</th>
																<th>Taat Ibadah</th>
																<th>Bahasa</th>
																<th>Lab</th>
																<th>Pemeriksaan Lain</th>
																<th>Diagnosa Medis</th>
																<th>Diagnosa Keperawatan</th>
																<th>Rencana Pengobatan</th>
																<th>Rencana Edukasi</th>
																<th>Rencana Diagnostik</th>
																<th>Rencana Monitoring Tanggal</th>
																<th>Lainnya 1</th>
																<th>Rujuk RS</th>
																<th>Dokter</th>
																<th>Aksi</th>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($rekam_medis1 as $key => $rm) : ?>
															<tr>
																<td><?= $key + 1 ?></td>
																<td><?= $rm['no_rekam_medis']; ?></td>
																<td><?= $rm['nama_pasien']; ?></td>
																<td><?= $rm['nama_pelayanan']; ?></td>
																<td><?= $rm['jam_periksa']; ?></td>
																<td><?= $rm['keluhan_utama']; ?></td>
																<td><?= $rm['keluhan_tambahan']; ?></td>
																<td><?= $rm['riwayat_penyakit_sekarang']; ?></td>
																<td><?= $rm['riwayat_penyakit_dahulu']; ?></td>
																<td><?= $rm['riwayat_penyakit_keluarga']; ?></td>
																<td><?= $rm['riwayat_alergi']; ?></td>
																<td><?= $rm['tindakan_terapi']; ?></td>
																<td><?= $rm['obat_sering_digunakan']; ?></td>
																<td><?= $rm['obat_sering_konsumsi']; ?></td>
																<td><?= $rm['keadaan_umum']; ?></td>
																<td><?= $rm['kesadaran']; ?></td>
																<td><?= $rm['tekanan_darah']; ?></td>
																<td><?= $rm['nadi']; ?></td>
																<td><?= $rm['suhu']; ?></td>
																<td><?= $rm['frekuensi_napas']; ?></td>
																<td><?= $rm['tinggi_badan']; ?></td>
																<td><?= $rm['berat_badan']; ?></td>
																<td><?= $rm['imt']; ?></td>
																<td> <?php if ($rm['total_skor'] > 2): ?>
																	Butuh penangan lebih lanjut oleh ahli gizi
																	<?php else: ?>
																	Gizi baik
																	<?php endif; ?></td>
																<td><?= $rm['kepala_leher']; ?></td>
																<td><?= $rm['thorax']; ?></td>
																<td><?= $rm['abdomen']; ?></td>
																<td><?= $rm['ekstremitas']; ?></td>
																<td><?= $rm['lainnya']; ?></td>
																<td><?= $rm['status_mental']; ?></td>
																<td><?= $rm['respons_emosi']; ?></td>
																<td><?= $rm['hub_pasien_keluarga']; ?></td>
																<td><?= $rm['taat_ibadah']; ?></td>
																<td><?= $rm['bahasa']; ?></td>
																<td><?= $rm['lab']; ?></td>
																<td><?= $rm['pemeriksaan_lain']; ?></td>
																<td><?= $rm['diagnosa_medis']; ?></td>
																<td><?= $rm['diagnosa_keperawatan']; ?></td>
																<td><?= $rm['rencana_pengobatan']; ?></td>
																<td><?= $rm['rencana_edukasi']; ?></td>
																<td><?= $rm['rencana_diagnostik']; ?></td>
																<td><?= $rm['rencana_mon_tgl']; ?></td>
																<td><?= $rm['lainnya1']; ?></td>
																<td><?= $rm['rujuk_rs']; ?></td>
																<td><?= $rm['nama']; ?></td>
																<td>
																	<a href="<?= base_url('Petugas/detailrekammedis/') . $rm['id_rekam_medis']; ?>"
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
