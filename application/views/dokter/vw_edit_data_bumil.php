<style>
	.form-check-input {
		width: 20px;
		height: 20px;
		border: 1px solid #000;
		background-color: #fff;
		cursor: pointer;
		appearance: none;
		-webkit-appearance: none;
		display: inline-block;
		position: relative;
	}

	.form-check-input:checked {
		background-color: #007bff;
		border-color: #007bff;
	}

	.form-check-input:checked::before {
		content: '';
		display: block;
		position: absolute;
		top: 3px;
		left: 7px;
		width: 6px;
		height: 12px;
		border: solid white;
		border-width: 0 2px 2px 0;
		transform: rotate(45deg);
	}

</style>
<div class="container-fluid">
	<div class="container">

		<div class="container mt-5 mb-5">
			<div class="card">
				<div class="card-header">
					<div class="float">
						<a href="<?=base_url('Dokter/rekammedisdokter')?>" class="btn btn-danger mb-2">Kembali</a>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="card" style="background-color: rgba(245, 245, 245, 0.9);">
								<div class="card-header">
									<center>
										<h4 class="title"><strong>Update Data Rekam Medis Bumil</strong></h4><br>
									</center>

									<?= $this->session->flashdata('message') ?>
									<form method="POST"
										action="<?= base_url('Dokter/update_rekam_medis/' . $rekam_medis['id_rekam']) ?>"
										enctype="multipart/form-data">
										<input type="hidden" name="id_kunjungan"
											value="<?= $rekam_medis['id_kunjungan'] ?>">
										<input type="hidden" name="nama_pelayanan"
											value="<?= $rekam_medis['nama_pelayanan'] ?>">

										<div class="card-body">
											<div class="form-group row">
												<label class="col-sm-4 col-form-label"><strong>&emsp;No Rekam
														Medis</strong></label>
												<div class="col-sm-12">
													<input type="text" name="no_rekam_medis"
														class="form-control form-control-user"
														value="<?= $rekam_medis['no_rekam_medis'] ?>" readonly>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-4 col-form-label"><strong>&emsp;Nama
														Pasien</strong></label>
												<div class="col-sm-12">
													<input type="text" name="nama_pasien"
														class="form-control form-control-user"
														value="<?= $rekam_medis['nama_pasien'] ?>" readonly>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-4 col-form-label"><strong>&emsp;Tanggal
														Kunjungan</strong></label>
												<div class="col-sm-12">
													<input type="date" name="tanggal_kunjungan"
														class="form-control form-control-user"
														value="<?= $rekam_medis['tanggal_kunjungan'] ?>" readonly>
												</div>
											</div>

											<div class="form-group row">
												<label
													class="col-sm-4 col-form-label"><strong>&emsp;Umur</strong></label>
												<div class="col-sm-12">
													<input type="text" name="umur" id="umur-pasien"
														class="form-control form-control-user"
														value="<?= $rekam_medis['umur'] ?>" readonly>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-4 col-form-label"><strong>&emsp;Jenis
														Kelamin</strong></label>
												<div class="col-sm-12">
													<input type="text" name="jenis_kelamin" id="jenis_kelamin"
														class="form-control form-control-user"
														value="<?= $rekam_medis['jenis_kelamin'] ?>" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-4 col-form-label"><strong>&emsp; Nama
														Suami</strong></label>
												<div class="col-sm-12">
													<input type="text" name="nama_suami" id="nama_suami"
														class="form-control" value="<?= $rekam_medis['nama_suami'] ?>"
														readonly>
												</div>
											</div>
											<!-- <div class="form-group row">
												<label class="col-sm-4 col-form-label"><strong>&emsp; Umur
														Suami</strong></label>
												<div class="col-sm-12">
													<input type="text" name="umur_suami" id="umur_suami"
														class="form-control" value="<?= $rekam_medis['umur_suami'] ?>"
														readonly>
												</div>
											</div> -->

											<div class="form-group row">
												<label class="col-sm-4 col-form-label"><strong>&emsp;Jam
														Periksa</strong>
												</label>
												<div class="col-sm-12">
													<input type="time" name="jam_periksa"
														class="form-control form-control-user" id="jam_periksa"
														value="<?= isset($rekam_medis['jam_periksa']) ? $rekam_medis['jam_periksa'] : ''; ?>">
													<?= form_error('jam_periksa', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<label class="col-sm-12 col-form-label"><strong>
													<center> SUBJECTIF</center>

													<div class="form-group row">
														<label class="col-sm-4 col-form-label">Riwayat Kontrasepsi
															Terakhir</label>
														<div class="col-sm-12">
															<select name="riwayat_kontrasepsi_trk"
																class="form-control form-control-user"
																id="riwayat_kontrasepsi_trk">
																<option value="">Pilih</option>
																<option value="Tidak Menggunakan"
																	<?= set_select('riwayat_kontrasepsi_trk', 'Tidak Menggunakan', (isset($rekam_medis['riwayat_kontrasepsi_trk']) && $rekam_medis['riwayat_kontrasepsi_trk'] == 'Tidak Menggunakan')); ?>>
																	Tidak Menggunakan
																</option>
																<option value="IUD"
																	<?= set_select('riwayat_kontrasepsi_trk', 'IUD', (isset($rekam_medis['riwayat_kontrasepsi_trk']) && $rekam_medis['riwayat_kontrasepsi_trk'] == 'IUD')); ?>>
																	IUD
																</option>
																<option value="Suntik"
																	<?= set_select('riwayat_kontrasepsi_trk', 'Suntik', (isset($rekam_medis['riwayat_kontrasepsi_trk']) && $rekam_medis['riwayat_kontrasepsi_trk'] == 'Suntik')); ?>>
																	Suntik
																</option>
																<option value="Implan"
																	<?= set_select('riwayat_kontrasepsi_trk', 'Implan', (isset($rekam_medis['riwayat_kontrasepsi_trk']) && $rekam_medis['riwayat_kontrasepsi_trk'] == 'Implan')); ?>>
																	Implan
																</option>
																<option value="Pil"
																	<?= set_select('riwayat_kontrasepsi_trk', 'Pil', (isset($rekam_medis['riwayat_kontrasepsi_trk']) && $rekam_medis['riwayat_kontrasepsi_trk'] == 'Pil')); ?>>
																	Pil
																</option>
															</select>
															<?= form_error('riwayat_kontrasepsi_trk', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>
													<!-- <div class="form-group row">
														<label class="col-sm-4 col-form-label">Riwayat Kehamilan
															Terdahulu</label>
														<div class="col-sm-12">
															<div id="riwayat_kehamilan_terdahulu-container"></div>
															<button type="button" class="btn btn-primary"
																onclick="addHamil()">Tambah Hamil</button>
														</div>
													</div>
										</div>

										<script>
											function addHamil() {
												const container = document.getElementById('riwayat_kehamilan_terdahulu-container');
												const row = document.createElement('div');
												row.className = 'riwayat_kehamilan_terdahulu-row';
												row.innerHTML = `
    <div class="form-group row">
        <label for="hamilke" class="col-sm-2 col-form-label">Hamil Ke</label>
        <div class="col-sm-10">
            <input type="number" name="hamilke[]" class="form-control form-control-user" value="<?= isset($rekam_medis['hamilke']) ? $rekam_medis['hamilke'] : ''; ?>" />
        </div>
    </div>
    <div class="form-group row">
        <label for="umur_anak" class="col-sm-2 col-form-label">Umur Anak </label>
        <div class="col-sm-10">
            <input type="number" name="umur_anak[]" class="form-control form-control-user" value="<?= isset($rekam_medis['umur_anak']) ? $rekam_medis['umur_anak'] : ''; ?>" />
        </div>
    </div>
    <div class="form-group row">
        <label for="berat_lahir" class="col-sm-2 col-form-label">Berat Lahir (gram)</label>
        <div class="col-sm-10">
            <input type="number" name="berat_lahir[]" class="form-control form-control-user" value="<?= isset($rekam_medis['berat_lahir']) ? $rekam_medis['berat_lahir'] : ''; ?>" />
        </div>
    </div>
    <div class="form-group row">
        <label for="penolong_persalinan" class="col-sm-2 col-form-label">Penolong Persalinan</label>
        <div class="col-sm-10">
            <select name="penolong_persalinan[]" class="form-control form-control-user">
                <option value="">Pilih Penolong Persalinan</option>
                <option value="Dokter" <?= isset($rekam_medis['penolong_persalinan']) && $rekam_medis['penolong_persalinan'] == 'Dokter' ? 'selected' : ''; ?>>Dokter</option>
                <option value="Bidan" <?= isset($rekam_medis['penolong_persalinan']) && $rekam_medis['penolong_persalinan'] == 'Bidan' ? 'selected' : ''; ?>>Bidan</option>
                <option value="Dukun Terlatih" <?= isset($rekam_medis['penolong_persalinan']) && $rekam_medis['penolong_persalinan'] == 'Dukun Terlatih' ? 'selected' : ''; ?>>Dukun Terlatih</option>
                <option value="Dukun Tak Terlatih" <?= isset($rekam_medis['penolong_persalinan']) && $rekam_medis['penolong_persalinan'] == 'Dukun Tak Terlatih' ? 'selected' : ''; ?>>Dukun Tak Terlatih</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="cara_persalinan" class="col-sm-2 col-form-label">Cara Persalinan</label>
        <div class="col-sm-10">
            <select name="cara_persalinan[]" class="form-control form-control-user">
                <option value="">Pilih Cara Persalinan</option>
                <option value="Normal" <?= isset($rekam_medis['cara_persalinan']) && $rekam_medis['cara_persalinan'] == 'Normal' ? 'selected' : ''; ?>>Normal</option>
                <option value="Sungsang" <?= isset($rekam_medis['cara_persalinan']) && $rekam_medis['cara_persalinan'] == 'Sungsang' ? 'selected' : ''; ?>>Sungsang</option>
                <option value="Alat" <?= isset($rekam_medis['cara_persalinan']) && $rekam_medis['cara_persalinan'] == 'Alat' ? 'selected' : ''; ?>>Alat</option>
                <option value="SC" <?= isset($rekam_medis['cara_persalinan']) && $rekam_medis['cara_persalinan'] == 'SC' ? 'selected' : ''; ?>>SC</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="keadaan_bayi" class="col-sm-2 col-form-label">Keadaan Bayi</label>
        <div class="col-sm-10">
            <select name="keadaan_bayi[]" class="form-control form-control-user">
                <option value="">Pilih Keadaan Bayi</option>
                <option value="Sehat" <?= isset($rekam_medis['keadaan_bayi']) && $rekam_medis['keadaan_bayi'] == 'Sehat' ? 'selected' : ''; ?>>Sehat</option>
                <option value="Sakit/Cacat" <?= isset($rekam_medis['keadaan_bayi']) && $rekam_medis['keadaan_bayi'] == 'Sakit/Cacat' ? 'selected' : ''; ?>>Sakit/Cacat</option>
                <option value="Mati" <?= isset($rekam_medis['keadaan_bayi']) && $rekam_medis['keadaan_bayi'] == 'Mati' ? 'selected' : ''; ?>>Mati</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="komplikasi" class="col-sm-2 col-form-label">Komplikasi</label>
        <div class="col-sm-10">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-check">
                        <input type="checkbox" name="komplikasi[0][]" value="Perdarahan Antepartum" class="form-check-input" <?= isset($rekam_medis['komplikasi']) && in_array('Perdarahan Antepartum', $rekam_medis['komplikasi']) ? 'checked' : ''; ?>>
                        <label class="form-check-label">Perdarahan Antepartum</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="komplikasi[0][]" value="Perdarahan Postpartum" class="form-check-input" <?= isset($rekam_medis['komplikasi']) && in_array('Perdarahan Postpartum', $rekam_medis['komplikasi']) ? 'checked' : ''; ?>>
                        <label class="form-check-label">Perdarahan Postpartum</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="komplikasi[0][]" value="HT" class="form-check-input" <?= isset($rekam_medis['komplikasi']) && in_array('HT', $rekam_medis['komplikasi']) ? 'checked' : ''; ?>>
                        <label class="form-check-label">HT</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="komplikasi[0][]" value="Infeksi" class="form-check-input" <?= isset($rekam_medis['komplikasi']) && in_array('Infeksi', $rekam_medis['komplikasi']) ? 'checked' : ''; ?>>
                        <label class="form-check-label">Infeksi</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="komplikasi[0][]" value="Lain-lain" class="form-check-input" <?= isset($rekam_medis['komplikasi']) && in_array('Lain-lain', $rekam_medis['komplikasi']) ? 'checked' : ''; ?>>
                        <label class="form-check-label">Lain-lain</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-check">
                        <input type="checkbox" name="komplikasi[0][]" value="Pre-eklamsi/Eklamsi" class="form-check-input" <?= isset($rekam_medis['komplikasi']) && in_array('Pre-eklamsi/Eklamsi', $rekam_medis['komplikasi']) ? 'checked' : ''; ?>>
                        <label class="form-check-label">Pre-eklamsi/Eklamsi</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="komplikasi[0][]" value="Partus Macet" class="form-check-input" <?= isset($rekam_medis['komplikasi']) && in_array('Partus Macet', $rekam_medis['komplikasi']) ? 'checked' : ''; ?>>
                        <label class="form-check-label">Partus Macet</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="komplikasi[0][]" value="Plasenta Previa" class="form-check-input" <?= isset($rekam_medis['komplikasi']) && in_array('Plasenta Previa', $rekam_medis['komplikasi']) ? 'checked' : ''; ?>>
                        <label class="form-check-label">Plasenta Previa</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="komplikasi[0][]" value="Pervaginam" class="form-check-input" <?= isset($rekam_medis['komplikasi']) && in_array('Pervaginam', $rekam_medis['komplikasi']) ? 'checked' : ''; ?>>
                        <label class="form-check-label">Pervaginam</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="komplikasi[0][]" value="Lain-lain" class="form-check-input" <?= isset($rekam_medis['komplikasi']) && in_array('Lain-lain', $rekam_medis['komplikasi']) ? 'checked' : ''; ?>>
                        <label class="form-check-label">Lain-lain</label>
                    </div>
                </div>
            </div>
        </div>
		<div class="form-group row">
                <div class="col-sm-12 offset-sm-3">
                    <button type="button" class="btn btn-danger" onclick="removeHamil(this)">Hapus</button>
                </div>
            </div>
        `;
												container.appendChild(row);
											}

											function removeHamil(button) {
												const row = button.closest('.riwayat_kehamilan_terdahulu-row');
												row.remove();
											}

										</script> -->
										<label for class="col-sm-12 col-form-label">Riwayat Kehamilan Sekarang</label>
										<label for class="col-sm-12 col-form-label"><u>Riwayat Perkawinan</u></label>
										<div class="form-group row">
											<label for="bersuami" class="col-sm-4 col-form-label">&emsp;Bersuami</label>
											<div class="col-sm-12">
												<select name="bersuami" class="form-control" id="bersuami"
													onchange="toggleBersuamiDetails()">
													<option value="">Pilih</option>
													<option value="Ya"
														<?= set_select('bersuami', 'Ya', (isset($rekam_medis['bersuami']) && $rekam_medis['bersuami'] == 'Ya')); ?>>
														Ya</option>
													<option value="Tidak"
														<?= set_select('bersuami', 'Tidak', (isset($rekam_medis['bersuami']) && $rekam_medis['bersuami'] == 'Tidak')); ?>>
														Tidak</option>
												</select>
												<?= form_error('bersuami', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div id="bersuami-details"
											style="display: <?= (isset($rekam_medis['bersuami']) && $rekam_medis['bersuami'] == 'Ya') ? 'block' : 'none'; ?>;">
											<div class="form-group row">
												<label for="berapa_lama" class="col-sm-4 col-form-label">&emsp;Berapa
													lama</label>
												<div class="col-sm-12">
													<input type="text" name="berapa_lama" class="form-control"
														id="berapa_lama"
														value="<?= isset($rekam_medis['berapa_lama']) ? $rekam_medis['berapa_lama'] : ''; ?>">
												</div>
											</div>
											<div class="form-group row">
												<label for="berapa_kali" class="col-sm-4 col-form-label">&emsp;Berapa
													kali</label>
												<div class="col-sm-12">
													<input type="text" name="berapa_kali" class="form-control"
														id="berapa_kali"
														value="<?= isset($rekam_medis['berapa_kali']) ? $rekam_medis['berapa_kali'] : ''; ?>">
												</div>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Usia Pertama Kali Kawin</label>
											<div class="col-sm-12">
												<input type="text" name="usia_pertama_kali_kawin"
													value="<?= isset($rekam_medis['usia_pertama_kali_kawin']) ? $rekam_medis['usia_pertama_kali_kawin'] : set_value('usia_pertama_kali_kawin'); ?>"
													class="form-control form-control-user" id="usia_pertama_kali_kawin"
													placeholder="Masukkan Usia Pertama Kali Kawin">
												<?= form_error('usia_pertama_kali_kawin', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<script>
											function toggleBersuamiDetails() {
												var selectBox = document.getElementById('bersuami');
												var details = document.getElementById('bersuami-details');
												if (selectBox.value === 'Ya') {
													details.style.display = 'block';
												} else {
													details.style.display = 'none';
												}
											}

											// Initialize the display of bersuami-details based on the existing value in the form
											document.addEventListener('DOMContentLoaded', function () {
												toggleBersuamiDetails();
											});

										</script>
										<label for class="col-sm-12 col-form-label"><u>Riwayat Menstruasi</u></label>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;HPHT</label>
											<div class="col-sm-12">
												<input type="text" name="hpht"
													value="<?= isset($rekam_medis['hpht']) ? $rekam_medis['hpht'] : set_value('hpht'); ?>"
													class="form-control form-control-user" id="hpht"
													placeholder="Masukkan HPHT">
												<?= form_error('hpht', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="form-group row">
											<label for="siklus_mens" class="col-sm-4 col-form-label">&emsp;Siklus
												Menstruasi</label>
											<div class="col-sm-12">
												<input type="number" name="siklus_mens"
													value="<?= isset($rekam_medis['siklus_mens']) ? $rekam_medis['siklus_mens'] : set_value('siklus_mens'); ?>"
													class="form-control" id="siklus_mens" placeholder="Berapa Hari">
												<?= form_error('siklus_mens', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="form-group row">
											<label for="teratur" class="col-sm-4 col-form-label">&emsp;Teratur/Tidak
												Teratur</label>
											<div class="col-sm-12">
												<select name="teratur" class="form-control" id="teratur">
													<option value="">Pilih</option>
													<option value="Teratur"
														<?= set_select('teratur', 'Teratur', isset($rekam_medis['teratur']) && $rekam_medis['teratur'] == 'Teratur'); ?>>
														Teratur</option>
													<option value="Tidak Teratur"
														<?= set_select('teratur', 'Tidak Teratur', isset($rekam_medis['teratur']) && $rekam_medis['teratur'] == 'Tidak Teratur'); ?>>
														Tidak Teratur</option>
												</select>
												<?= form_error('teratur', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="form-group row">
											<label for="banyaknya_haid" class="col-sm-4 col-form-label">&emsp;Banyaknya
												Haid</label>
											<div class="col-sm-12">
												<select name="banyaknya_haid" class="form-control" id="banyaknya_haid">
													<option value="">Pilih</option>
													<option value="Banyak"
														<?= set_select('banyaknya_haid', 'Banyak', isset($rekam_medis['banyaknya_haid']) && $rekam_medis['banyaknya_haid'] == 'Banyak'); ?>>
														Banyak</option>
													<option value="Sedang"
														<?= set_select('banyaknya_haid', 'Sedang', isset($rekam_medis['banyaknya_haid']) && $rekam_medis['banyaknya_haid'] == 'Sedang'); ?>>
														Sedang</option>
													<option value="Sedikit"
														<?= set_select('banyaknya_haid', 'Sedikit', isset($rekam_medis['banyaknya_haid']) && $rekam_medis['banyaknya_haid'] == 'Sedikit'); ?>>
														Sedikit</option>
												</select>
												<?= form_error('banyaknya_haid', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="form-group row">
											<label for="gumpalan" class="col-sm-4 col-form-label">&emsp;Gumpalan</label>
											<div class="col-sm-12">
												<select name="gumpalan" class="form-control" id="gumpalan">
													<option value="">Pilih</option>
													<option value="Gumpal"
														<?= set_select('gumpalan', 'Gumpal', isset($rekam_medis['gumpalan']) && $rekam_medis['gumpalan'] == 'Gumpal'); ?>>
														Gumpal</option>
													<option value="Biasa"
														<?= set_select('gumpalan', 'Biasa', isset($rekam_medis['gumpalan']) && $rekam_medis['gumpalan'] == 'Biasa'); ?>>
														Biasa</option>
													<option value="Encer"
														<?= set_select('gumpalan', 'Encer', isset($rekam_medis['gumpalan']) && $rekam_medis['gumpalan'] == 'Encer'); ?>>
														Encer</option>
												</select>
												<?= form_error('gumpalan', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="form-group row">
											<label for="merasa_sakit" class="col-sm-4 col-form-label">&emsp;Merasa
												Sakit</label>
											<div class="col-sm-12">
												<select name="merasa_sakit" class="form-control" id="merasa_sakit">
													<option value="">Pilih</option>
													<option value="Sebelum Haid"
														<?= set_select('merasa_sakit', 'Sebelum Haid', isset($rekam_medis['merasa_sakit']) && $rekam_medis['merasa_sakit'] == 'Sebelum Haid'); ?>>
														Sebelum Haid</option>
													<option value="Selama Haid"
														<?= set_select('merasa_sakit', 'Selama Haid', isset($rekam_medis['merasa_sakit']) && $rekam_medis['merasa_sakit'] == 'Selama Haid'); ?>>
														Selama Haid</option>
													<option value="Sesudah Haid"
														<?= set_select('merasa_sakit', 'Sesudah Haid', isset($rekam_medis['merasa_sakit']) && $rekam_medis['merasa_sakit'] == 'Sesudah Haid'); ?>>
														Sesudah Haid</option>
												</select>
												<?= form_error('merasa_sakit', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="fluor" class="col-sm-4 col-form-label">&emsp;Fluor</label>
											<div class="col-sm-12">
												<select name="fluor" class="form-control" id="fluor"
													onchange="toggleFluorDetails(this)">
													<option value="">Pilih</option>
													<option value="Ya"
														<?= set_select('fluor', 'Ya', isset($rekam_medis['fluor']) && $rekam_medis['fluor'] == 'Ya'); ?>>
														Ya</option>
													<option value="Tidak"
														<?= set_select('fluor', 'Tidak', isset($rekam_medis['fluor']) && $rekam_medis['fluor'] == 'Tidak'); ?>>
														Tidak</option>
												</select>
												<?= form_error('fluor', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div id="fluor-details"
											style="display: <?= isset($rekam_medis['fluor']) && $rekam_medis['fluor'] == 'Ya' ? 'block' : 'none'; ?>;">
											<div class="form-group row">
												<label for="fluor_berapa_lama"
													class="col-sm-4 col-form-label">&emsp;Berapa Lama</label>
												<div class="col-sm-12">
													<input type="text" name="fluor_berapa_lama"
														value="<?= set_value('fluor_berapa_lama', isset($rekam_medis['fluor_berapa_lama']) ? $rekam_medis['fluor_berapa_lama'] : ''); ?>"
														class="form-control" id="fluor_berapa_lama"
														placeholder="Masukkan Berapa Lama">
													<?= form_error('fluor_berapa_lama', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="fluor_jumlah"
													class="col-sm-4 col-form-label">&emsp;Jumlah</label>
												<div class="col-sm-12">
													<input type="text" name="fluor_jumlah"
														value="<?= set_value('fluor_jumlah', isset($rekam_medis['fluor_jumlah']) ? $rekam_medis['fluor_jumlah'] : ''); ?>"
														class="form-control" id="fluor_jumlah"
														placeholder="Masukkan Jumlah">
													<?= form_error('fluor_jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="fluor_warna"
													class="col-sm-4 col-form-label">&emsp;Warna</label>
												<div class="col-sm-12">
													<input type="text" name="fluor_warna"
														value="<?= set_value('fluor_warna', isset($rekam_medis['fluor_warna']) ? $rekam_medis['fluor_warna'] : ''); ?>"
														class="form-control" id="fluor_warna"
														placeholder="Masukkan Warna">
													<?= form_error('fluor_warna', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="fluor_bau" class="col-sm-4 col-form-label">&emsp;Bau</label>
												<div class="col-sm-12">
													<input type="text" name="fluor_bau"
														value="<?= set_value('fluor_bau', isset($rekam_medis['fluor_bau']) ? $rekam_medis['fluor_bau'] : ''); ?>"
														class="form-control" id="fluor_bau" placeholder="Masukkan Bau">
													<?= form_error('fluor_bau', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
										</div>

										<script>
											function toggleFluorDetails(select) {
												var fluorDetails = document.getElementById('fluor-details');
												if (select.value === 'Ya') {
													fluorDetails.style.display = 'block';
												} else {
													fluorDetails.style.display = 'none';
												}
											}

											document.addEventListener('DOMContentLoaded', function () {
												var fluorSelect = document.getElementById('fluor');
												toggleFluorDetails(fluorSelect);
											});

										</script>
										<label for class="col-sm-12 col-form-label"><u>Status Imunisasi</u></label>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Imunisasi</label>
											<div class="col-sm-12">
												<input type="date" name="imunisasi"
													value="<?= isset($rekam_medis['imunisasi']) ? $rekam_medis['imunisasi'] : set_value('imunisasi'); ?>"
													class="form-control form-control-user" id="rencana_mon_tgl"
													placeholder="Masukkan Tanggal Imunisasi">
												<?= form_error('imunisasi', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="keluhan_utama" class="col-sm-4 col-form-label">&emsp;Keluhan
												Utama</label>
											<div class="col-sm-12">
												<textarea name="keluhan_utama" class="form-control"
													id="keluhan_utama"><?= isset($rekam_medis['keluhan_utama']) ? $rekam_medis['keluhan_utama'] : set_value('keluhan_utama'); ?></textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Keluhan Lain</label>
											<div class="col-sm-12">
												<div class="row">
													<div class="col-sm-6">
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="keluhan_lain[]" value="Tidak Ada" id="tidak_ada"
																<?= set_checkbox('keluhan_lain[]', 'Tidak Ada', isset($rekam_medis['keluhan_lain']) && in_array('Tidak Ada', explode(',', $rekam_medis['keluhan_lain']))); ?>>
															<label class="form-check-label" for="tidak_ada">Tidak
																Ada</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="keluhan_lain[]" value="Nafsu Makan Berkurang"
																id="nafsu_makan_berkurang"
																<?= set_checkbox('keluhan_lain[]', 'Nafsu Makan Berkurang', isset($rekam_medis['keluhan_lain']) && in_array('Nafsu Makan Berkurang', explode(',', $rekam_medis['keluhan_lain']))); ?>>
															<label class="form-check-label"
																for="nafsu_makan_berkurang">Nafsu Makan
																Berkurang</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="keluhan_lain[]" value="Muntah-Muntah"
																id="muntah_muntah"
																<?= set_checkbox('keluhan_lain[]', 'Muntah-Muntah', isset($rekam_medis['keluhan_lain']) && in_array('Muntah-Muntah', explode(',', $rekam_medis['keluhan_lain']))); ?>>
															<label class="form-check-label"
																for="muntah_muntah">Muntah-Muntah</label>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="keluhan_lain[]" value="Pusing" id="pusing"
																<?= set_checkbox('keluhan_lain[]', 'Pusing', isset($rekam_medis['keluhan_lain']) && in_array('Pusing', explode(',', $rekam_medis['keluhan_lain']))); ?>>
															<label class="form-check-label" for="pusing">Pusing</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="keluhan_lain[]" value="Nyeri Perut"
																id="nyeri_perut"
																<?= set_checkbox('keluhan_lain[]', 'Nyeri Perut', isset($rekam_medis['keluhan_lain']) && in_array('Nyeri Perut', explode(',', $rekam_medis['keluhan_lain']))); ?>>
															<label class="form-check-label" for="nyeri_perut">Nyeri
																Perut</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="keluhan_lain[]" value="Oedema" id="oedema"
																<?= set_checkbox('keluhan_lain[]', 'Oedema', isset($rekam_medis['keluhan_lain']) && in_array('Oedema', explode(',', $rekam_medis['keluhan_lain']))); ?>>
															<label class="form-check-label" for="oedema">Oedema</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="keluhan_lain[]" value="Tambahan" id="tambahan"
																<?= set_checkbox('keluhan_lain[]', 'Tambahan', isset($rekam_medis['keluhan_lain']) && in_array('Tambahan', explode(',', $rekam_medis['keluhan_lain']))); ?>>
															<label class="form-check-label"
																for="tambahan">Tambahan</label>
														</div>
													</div>
												</div>
												<?= form_error('keluhan_lain', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div id="tambahanOption" class="form-group row" style="display: none;">
											<label class="col-sm-4 col-form-label">&emsp;Detail Keluhan Lain</label>
											<div class="col-sm-12">
												<input type="text" name="keluhan_lain_lainnya"
													value="<?= set_value('keluhan_lain_lainnya', isset($rekam_medis['keluhan_lain_lainnya']) ? $rekam_medis['keluhan_lain_lainnya'] : ''); ?>"
													class="form-control form-control-user" id="keluhan_lain_lainnya"
													placeholder="Masukkan Detail Keluhan Lain">
												<?= form_error('keluhan_lain_lainnya', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<script>
											$(document).ready(function () {
												$('input[type="checkbox"][value="Tambahan"]').on('change', function () {
													if ($(this).is(':checked')) {
														$('#tambahanOption').show();
													} else {
														$('#tambahanOption').hide();
													}
												});

												// Show "Tambahan" detail input if "Tambahan" was already checked (on page load)
												if ($('input[type="checkbox"][value="Tambahan"]').is(':checked')) {
													$('#tambahanOption').show();
												}
											});

										</script>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Riwayat
												Penyakit
												Dahulu</label>
											<div class="col-sm-12">
												<input type="text" name="riwayat_penyakit_dahulu"
													class="form-control form-control-user" id="riwayat_penyakit_dahulu"
													:
													value="<?= isset($rekam_medis['riwayat_penyakit_dahulu']) ? $rekam_medis['riwayat_penyakit_dahulu'] : ''; ?> ">
												<?= form_error('riwayat_penyakit_dahulu', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Riwayat Penyakit Keluarga -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Riwayat
												Penyakit
												Keluarga</label>
											<div class="col-sm-12">
												<input type="text" name="riwayat_penyakit_keluarga"
													class="form-control form-control-user"
													id="riwayat_penyakit_keluarga" :
													value="<?= isset($rekam_medis['riwayat_penyakit_keluarga']) ? $rekam_medis['riwayat_penyakit_keluarga'] : ''; ?> ">
												<?= form_error('riwayat_penyakit_keluarga', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<label class="col-sm-12 col-form-label"><strong>
												<center> OBYEKTIF</center>
											</strong></label>
										<label for class="col-sm-12 col-form-label"><u>Status Generalis</u></label>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Keadaan
											Umum</strong></label>
											<div class="col-sm-12">
											<select name="keadaan_umum" class="form-control form-control-user" id="keadaan_umum">
											<option value="">Pilih</option>
													<option value="Baik"
														<?= set_select('keadaan_umum', 'Baik', (isset($rekam_medis['keadaan_umum']) && $rekam_medis['keadaan_umum'] == 'Baik')); ?>>
														Baik</option>
													<option value="Sedang"
														<?= set_select('keadaan_umum', 'Sedang', (isset($rekam_medis['keadaan_umum']) && $rekam_medis['keadaan_umum'] == 'Sedang')); ?>>
														Sedang</option>
                                                        <option value="Lemah"
														<?= set_select('keadaan_umum', 'Lemah', (isset($rekam_medis['keadaan_umum']) && $rekam_medis['keadaan_umum'] == 'Lemah')); ?>>
														Lemah</option>
												</select>		<?= form_error('keadaan_umum', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
    <label class="col-sm-4 col-form-label">&emsp;Kesadaran</strong></label>
    <div class="col-sm-12">
        <input type="text" name="kesadaran"
               class="form-control form-control-user" id="kesadaran"
               value="<?= isset($rekam_medis['kesadaran']) ? $rekam_medis['kesadaran'] : ''; ?>">
        <?= form_error('kesadaran', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<!-- Tekanan Darah -->
<div class="form-group row">
    <label class="col-sm-4 col-form-label">&emsp;Tekanan Darah</strong></label>
    <div class="col-sm-12">
        <input type="number" name="tekanan_darah"
               class="form-control form-control-user" id="tekanan_darah"
               value="<?= isset($rekam_medis['tekanan_darah']) ? $rekam_medis['tekanan_darah'] : ''; ?>">
        <?= form_error('tekanan_darah', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<!-- Nadi -->
<div class="form-group row">
    <label class="col-sm-4 col-form-label">&emsp;Nadi</strong></label>
    <div class="col-sm-12">
        <input type="number" name="nadi"
               class="form-control form-control-user" id="nadi"
               value="<?= isset($rekam_medis['nadi']) ? $rekam_medis['nadi'] : ''; ?>">
        <?= form_error('nadi', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<!-- Suhu -->
<div class="form-group row">
    <label class="col-sm-4 col-form-label">&emsp;Suhu</strong></label>
    <div class="col-sm-12">
        <input type="number" name="suhu"
               class="form-control form-control-user" id="suhu"
               value="<?= isset($rekam_medis['suhu']) ? $rekam_medis['suhu'] : ''; ?>">
        <?= form_error('suhu', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<!-- Frekuensi Napas -->
<div class="form-group row">
    <label class="col-sm-4 col-form-label">&emsp;Frekuensi Napas</strong></label>
    <div class="col-sm-12">
        <input type="number" name="frekuensi_napas"
               class="form-control form-control-user" id="frekuensi_napas"
               value="<?= isset($rekam_medis['frekuensi_napas']) ? $rekam_medis['frekuensi_napas'] : ''; ?>">
        <?= form_error('frekuensi_napas', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<!-- Bentuk Tubuh -->
<div class="form-group row">
    <label for="bentuk_tubuh" class="col-sm-4 col-form-label">&emsp;Bentuk Tubuh</label>
    <div class="col-sm-12">
        <select name="bentuk_tubuh" class="form-control" id="bentuk_tubuh">
            <option value="">Pilih</option>
            <option value="Normal"
                <?= set_select('bentuk_tubuh', 'Normal', isset($rekam_medis['bentuk_tubuh']) && $rekam_medis['bentuk_tubuh'] == 'Normal'); ?>>
                Normal
            </option>
            <option value="Kelainan Panggul"
                <?= set_select('bentuk_tubuh', 'Kelainan Panggul', isset($rekam_medis['bentuk_tubuh']) && $rekam_medis['bentuk_tubuh'] == 'Kelainan Panggul'); ?>>
                Kelainan Panggul
            </option>
            <option value="Kelainan Tulang Belakang"
                <?= set_select('bentuk_tubuh', 'Kelainan Tulang Belakang', isset($rekam_medis['bentuk_tubuh']) && $rekam_medis['bentuk_tubuh'] == 'Kelainan Tulang Belakang'); ?>>
                Kelainan Tulang Belakang
            </option>
            <option value="Kelainan Tungkai"
                <?= set_select('bentuk_tubuh', 'Kelainan Tungkai', isset($rekam_medis['bentuk_tubuh']) && $rekam_medis['bentuk_tubuh'] == 'Kelainan Tungkai'); ?>>
                Kelainan Tungkai
            </option>
        </select>
        <?= form_error('bentuk_tubuh', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Kepala/Leher</label>
											<div class="col-sm-12">
												<div class="row">
													<div class="col-sm-6">
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="kepala[]" value="Tidak Ada" id="tidak_ada"
																<?= set_checkbox('kepala[]', 'Tidak Ada', isset($rekam_medis['kepala']) && in_array('Tidak Ada', explode(',', $rekam_medis['kepala']))); ?>>
															<label class="form-check-label" for="tidak_ada">Tidak
																Ada</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="kepala[]" value="Anemia" id="anemia"
																<?= set_checkbox('kepala[]', 'Anemia', isset($rekam_medis['kepala']) && in_array('Anemia', explode(',', $rekam_medis['kepala']))); ?>>
															<label class="form-check-label" for="anemia">Anemia</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="kepala[]" value="Icterus" id="icterus"
																<?= set_checkbox('kepala[]', 'Icterus', isset($rekam_medis['kepala']) && in_array('Icterus', explode(',', $rekam_medis['kepala']))); ?>>
															<label class="form-check-label"
																for="icterus">Icterus</label>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="kepala[]" value="Tonsilitis" id="tonsilitis"
																<?= set_checkbox('kepala[]', 'Tonsilitis', isset($rekam_medis['kepala']) && in_array('Tonsilitis', explode(',', $rekam_medis['kepala']))); ?>>
															<label class="form-check-label"
																for="tonsilitis">Tonsilitis</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="kepala[]" value="Faringitis" id="faringitis"
																<?= set_checkbox('kepala[]', 'Faringitis', isset($rekam_medis['kepala']) && in_array('Faringitis', explode(',', $rekam_medis['kepala']))); ?>>
															<label class="form-check-label"
																for="faringitis">Faringitis</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="kepala[]" value="Lainnya" id="lainnya"
																<?= set_checkbox('kepala[]', 'Lainnya', isset($rekam_medis['kepala']) && in_array('Lainnya', explode(',', $rekam_medis['kepala']))); ?>>
															<label class="form-check-label"
																for="lainnya">Lainnya</label>
														</div>
													</div>
												</div>
												<?= form_error('kepala', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div id="lainnyaOption2" class="form-group row" style="display: none;">
											<label class="col-sm-4 col-form-label">&emsp;Detail Lainnya</label>
											<div class="col-sm-12">
												<input type="text" name="kepala_lainnya"
													value="<?= set_value('kepala_lainnya', isset($rekam_medis['kepala_lainnya']) ? $rekam_medis['kepala_lainnya'] : ''); ?>"
													class="form-control form-control-user" id="kepala_lainnya"
													placeholder="Masukkan Detail Lainnya">
												<?= form_error('kepala_lainnya', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<script>
											$(document).ready(function () {
												$('input[type="checkbox"][value="Lainnya"]').on('change', function () {
													if ($(this).is(':checked')) {
														$('#lainnyaOption2').show();
													} else {
														$('#lainnyaOption2').hide();
													}
												});

												// Show "Lainnya" detail input if "Lainnya" was already checked (on page load)
												if ($('input[type="checkbox"][value="Lainnya"]').is(':checked')) {
													$('#lainnyaOption2').show();
												}
											});

										</script>
										<div class="form-group row">
											<label for="thor" class="col-sm-4 col-form-label">&emsp;Thorax</label>
											<div class="col-sm-12">
												<label for="jantung" class="col-form-label d-inline">Jantung</label>
												<input type="text" name="jantung"
													value="<?= set_value('jantung', isset($rekam_medis['jantung']) ? $rekam_medis['jantung'] : ''); ?>"
													class="form-control d-inline w-55" id="jantung"
													placeholder="Masukkan Data">
												<?= form_error('jantung', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="form-group row">
											<label for="icterus" class="col-sm-4 col-form-label"></label>
											<div class="col-sm-12">
												<label for="paru" class="col-form-label d-inline">Paru</label>
												<input type="text" name="paru"
													value="<?= set_value('paru', isset($rekam_medis['paru']) ? $rekam_medis['paru'] : ''); ?>"
													class="form-control d-inline w-55" id="paru"
													placeholder="Masukkan Data">
												<?= form_error('paru', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="form-group row">
											<label for="payudara" class="col-sm-4 col-form-label"></label>
											<div class="col-sm-12">
												<label for="payudara" class="col-form-label d-inline">Payudara</label>
												<select name="payudara" class="form-control d-inline w-55"
													id="payudara">
													<option value="">Pilih</option>
													<option value="Normal"
														<?= set_select('payudara', 'Normal', isset($rekam_medis['payudara']) && $rekam_medis['payudara'] == 'Normal'); ?>>
														Normal</option>
													<option value="Benjolan"
														<?= set_select('payudara', 'Benjolan', isset($rekam_medis['payudara']) && $rekam_medis['payudara'] == 'Benjolan'); ?>>
														Benjolan</option>
													<option value="Kemerahan"
														<?= set_select('payudara', 'Kemerahan', isset($rekam_medis['payudara']) && $rekam_medis['payudara'] == 'Kemerahan'); ?>>
														Kemerahan</option>
													<option value="Retracted Nipple"
														<?= set_select('payudara', 'Retracted Nipple', isset($rekam_medis['payudara']) && $rekam_medis['payudara'] == 'Retracted Nipple'); ?>>
														Retracted Nipple</option>
												</select>
												<?= form_error('payudara', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="form-group row">
											<label for="thor" class="col-sm-4 col-form-label">&emsp;Abdomen</label>
											<div class="col-sm-12">
												<label for="hepar" class="col-form-label d-inline">Hepar/lien</label>
												<select name="hepar" class="form-control d-inline w-55" id="hepar">
													<option value="">Pilih</option>
													<option value="Normal"
														<?= set_select('hepar', 'Normal', isset($rekam_medis['hepar']) && $rekam_medis['hepar'] == 'Normal'); ?>>
														Normal</option>
													<option value="Abnormal"
														<?= set_select('hepar', 'Abnormal', isset($rekam_medis['hepar']) && $rekam_medis['hepar'] == 'Abnormal'); ?>>
														Abnormal</option>
												</select>
												<?= form_error('hepar', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="form-group row">
											<label for="bising_usus" class="col-sm-4 col-form-label"></label>
											<div class="col-sm-12">
												<label for="bising_usus" class="col-form-label d-inline">Bising
													Usus</label>
												<select name="bising_usus" class="form-control d-inline w-55"
													id="bising_usus">
													<option value="">Pilih</option>
													<option value="Normal"
														<?= set_select('bising_usus', 'Normal', isset($rekam_medis['bising_usus']) && $rekam_medis['bising_usus'] == 'Normal'); ?>>
														Normal</option>
													<option value="Abnormal"
														<?= set_select('bising_usus', 'Abnormal', isset($rekam_medis['bising_usus']) && $rekam_medis['bising_usus'] == 'Abnormal'); ?>>
														Abnormal</option>
												</select>
												<?= form_error('bising_usus', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<label for class="col-sm-12 col-form-label"><u>Status Gizi</u></label>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Tinggi
													Badan</label>
											<div class="col-sm-12">
												<input type="text" name="tinggi_badan"
													class="form-control form-control-user" id="tinggi_badan" :
													value="<?= isset($rekam_medis['tinggi_badan']) ? $rekam_medis['tinggi_badan'] : ''; ?> ">
												<?= form_error('tinggi_badan', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Berat Badan -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Berat
													Badan</label>
											<div class="col-sm-12">
												<input type="number" name="berat_badan"
													class="form-control form-control-user" id="berat_badan" :
													value="<?= isset($rekam_medis['berat_badan']) ? $rekam_medis['berat_badan'] : ''; ?> ">
												<?= form_error('berat_badan', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- IMT -->
										<div class="form-group row">
											<label for="imt" class="col-sm-4 col-form-label">&emsp;IMT</label>
											<div class="col-sm-6">
												<input type="number" name="imt" id="imt"
													value="<?= isset($rekam_medis['imt']) ? $rekam_medis['imt'] : ''; ?>"
													class="form-control form-control-user"
													placeholder="IMT akan muncul disini" readonly>
												<?= form_error('imt', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
											<div class="col-sm-2">
												<button type="button" id="hitung_imt"
													class="btn btn-primary float-right">Hasil</button>
											</div>
										</div>
										<label class="col-sm-12 col-form-label"> <strong>
												<center> SUBJECTIVE</center>
											</strong></label>

										<!-- Keluhan Utama -->
                                        <div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Keluhan Utama
											</label>
											<div class="col-sm-12">
												<input type="text" name="keluhan_utama"
													class="form-control form-control-user" id="keluhan_utama" :
													value="<?= isset($rekam_medis['keluhan_utama']) ? $rekam_medis['keluhan_utama'] : ''; ?>">
												<?= form_error('keluhan_utama', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Keluhan Tambahan -->
                                        <div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Keluhan Tambahan
											</label>
											<div class="col-sm-12">
												<input type="text" name="keluhan_tambahan"
													class="form-control form-control-user" id="keluhan_tambahan" :
													value="<?= isset($rekam_medis['keluhan_tambahan']) ? $rekam_medis['keluhan_tambahan'] : ''; ?>">
												<?= form_error('keluhan_tambahan', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Riwayat Penyakit Sekarang
											</label>
											<div class="col-sm-12">
												<input type="text" name="riwayat_penyakit_sekarang"
													class="form-control form-control-user" id="riwayat_penyakit_sekarang" :
													value="<?= isset($rekam_medis['riwayat_penyakit_sekarang']) ? $rekam_medis['riwayat_penyakit_sekarang'] : ''; ?>">
												<?= form_error('riwayat_penyakit_sekarang', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Riwayat Penyakit Dahulu
											</label>
											<div class="col-sm-12">
												<input type="text" name="riwayat_penyakit_dahulu"
													class="form-control form-control-user" id="riwayat_penyakit_dahulu" :
													value="<?= isset($rekam_medis['riwayat_penyakit_dahulu']) ? $rekam_medis['riwayat_penyakit_dahulu'] : ''; ?>">
												<?= form_error('riwayat_penyakit_dahulu', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
									
										<!-- Riwayat Penyakit Keluarga -->
                                        <div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Riwayat Penyakit Keluarga
											</label>
											<div class="col-sm-12">
												<input type="text" name="riwayat_penyakit_keluarga"
													class="form-control form-control-user" id="riwayat_penyakit_keluarga" :
													value="<?= isset($rekam_medis['riwayat_penyakit_keluarga']) ? $rekam_medis['riwayat_penyakit_keluarga'] : ''; ?>">
												<?= form_error('riwayat_penyakit_keluarga', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Riwayat Alergi
											</label>
											<div class="col-sm-12">
												<input type="text" name="riwayat_alergi"
													class="form-control form-control-user" id="riwayat_alergi" :
													value="<?= isset($rekam_medis['riwayat_alergi']) ? $rekam_medis['riwayat_alergi'] : ''; ?>">
												<?= form_error('riwayat_alergi', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										
										<label class="col-sm-12 col-form-label">
												<center> OBYEKTIF</center> <strong>
											</strong></label>
                                            <div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Keadaan
											Umum</label>
											<div class="col-sm-12 col-form-label">
											<select name="keadaan_umum" class="form-control form-control-user" id="keadaan_umum">
											<option value="">Pilih</option>
													<option value="Baik"
														<?= set_select('keadaan_umum', 'Baik', (isset($rekam_medis['keadaan_umum']) && $rekam_medis['keadaan_umum'] == 'Baik')); ?>>
														Baik</option>
													<option value="Sedang"
														<?= set_select('keadaan_umum', 'Sedang', (isset($rekam_medis['keadaan_umum']) && $rekam_medis['keadaan_umum'] == 'Sedang')); ?>>
														Sedang</option>
                                                        <option value="Lemah"
														<?= set_select('keadaan_umum', 'Lemah', (isset($rekam_medis['keadaan_umum']) && $rekam_medis['keadaan_umum'] == 'Lemah')); ?>>
														Lemah</option>
												</select>		<?= form_error('keadaan_umum', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Kesadaran -->
										<div class="form-group row">
											<label
												class="col-sm-4 col-form-label">&emsp;Kesadaran</label>
											<div class="col-sm-12 col-form-label">
												<input type="text" name="kesadaran"
													class="form-control form-control-user" id="kesadaran" :
													value="<?= isset($rekam_medis['kesadaran']) ? $rekam_medis['kesadaran'] : ''; ?> ">
												<?= form_error('kesadaran', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
											<label
												class="col-sm-4 col-form-label">&emsp;Tekanan darah</label>
											<div class="col-sm-12 col-form-label">
												<input type="text" name="tekanan_darah"
													class="form-control form-control-user" id="tekanan_darah" :
													value="<?= isset($rekam_medis['tekanan_darah']) ? $rekam_medis['tekanan_darah'] : ''; ?> ">
												<?= form_error('tekanan_darah', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
									
										<!-- Nadi -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Nadi</strong></label>
											<div class="col-sm-12 col-form-label">
												<input type="number" name="nadi" class="form-control form-control-user"
													id="nadi" :
													value="<?= isset($rekam_medis['nadi']) ? $rekam_medis['nadi'] : ''; ?> ">
												<?= form_error('nadi', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Suhu -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Suhu</strong></label>
											<div class="col-sm-12 col-form-label">
												<input type="number" name="suhu" class="form-control form-control-user"
													id="suhu" :
													value="<?= isset($rekam_medis['suhu']) ? $rekam_medis['suhu'] : ''; ?> ">
												<?= form_error('suhu', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>

										</div>
										<!-- Frekuensi Napas -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Frekuensi
													Napas</strong></label>
											<div class="col-sm-12 col-form-label">
												<input type="number" name="frekuensi_napas"
													class="form-control form-control-user" id="frekuensi_napas" :
													value="<?= isset($rekam_medis['frekuensi_napas']) ? $rekam_medis['frekuensi_napas'] : ''; ?> ">

												<?= form_error('frekuensi_napas', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Respiration Rate
													</strong></label>
											<div class="col-sm-12 col-form-label">
												<input type="number" name="rr"
													class="form-control form-control-user" id="rr" :
													value="<?= isset($rekam_medis['rr']) ? $rekam_medis['rr'] : ''; ?> ">

												<?= form_error('rr', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Lingkar Kepala
													</strong></label>
											<div class="col-sm-12 col-form-label">
												<input type="number" name="lp"
													class="form-control form-control-user" id="lp" :
													value="<?= isset($rekam_medis['lp']) ? $rekam_medis['lp'] : ''; ?> ">

												<?= form_error('lp', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										
										<!-- Tinggi Badan -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Tinggi
													Badan</strong></label>
											<div class="col-sm-12">
												<input type="text" name="tinggi_badan"
													class="form-control form-control-user" id="tinggi_badan" :
													value="<?= isset($rekam_medis['tinggi_badan']) ? $rekam_medis['tinggi_badan'] : ''; ?> ">
												<?= form_error('tinggi_badan', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Berat Badan -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Berat
													Badan</strong></label>
											<div class="col-sm-12">
												<input type="text" name="berat_badan" id="berat_badan"
													class="form-control form-control-user" id="diagnosa_medis" :
													value="<?= isset($rekam_medis['berat_badan']) ? $rekam_medis['berat_badan'] : ''; ?> ">
												<?= form_error('berat_badan', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<!-- IMT -->
										<div class="form-group row">
											<label for="imt"
												class="col-sm-4 col-form-label">&emsp;IMT</strong></label>
											<div class="col-sm-12">
												<input type="number" name="imt" id="imt"
													value="<?= isset($rekam_medis['imt']) ? $rekam_medis['imt'] : ''; ?>"
													class="form-control form-control-user"
													placeholder="IMT akan muncul disini" readonly>
												<?= form_error('imt', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
											<div class="col-sm-2">
												<button type="button" id="hitung_imt"
													class="btn btn-primary float-right">Hasil</button>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Lingkar Lengan (cm)</label>
											<div class="col-sm-12">
												<input type="number" name="lingkar_lengan"
													value="<?= isset($rekam_medis) ? $rekam_medis['lingkar_lengan'] : set_value('lingkar_lengan'); ?>"
													class="form-control form-control-user" id="lingkar_lengan"
													placeholder="Masukkan Lingkar Lengan">
												<?= form_error('lingkar_lengan', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<label for class="col-sm-12 col-form-label"><u>Pemeriksaan Penunjang</u></label>

										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Pemeriksaan Hb</label>
											<div class="col-sm-12">
												<input type="text" name="pemeriksaan_hb"
													value="<?= isset($rekam_medis) ? $rekam_medis['pemeriksaan_hb'] : set_value('pemeriksaan_hb'); ?>"
													class="form-control form-control-user" id="pemeriksaan_hb"
													placeholder="Masukkan Hasil Hb">
												<?= form_error('pemeriksaan_hb', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Pemeriksaan Urine</label>
											<div class="col-sm-12">
												<input type="text" name="pemeriksaan_urine"
													value="<?= isset($rekam_medis) ? $rekam_medis['pemeriksaan_urine'] : set_value('pemeriksaan_urine'); ?>"
													class="form-control form-control-user" id="pemeriksaan_urine"
													placeholder="Masukkan Hasil Urine">
												<?= form_error('pemeriksaan_urine', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Pemeriksaan Albumin</label>
											<div class="col-sm-12">
												<input type="text" name="pemeriksaan_albumin"
													value="<?= isset($rekam_medis) ? $rekam_medis['pemeriksaan_albumin'] : set_value('pemeriksaan_albumin'); ?>"
													class="form-control form-control-user" id="pemeriksaan_albumin"
													placeholder="Masukkan Hasil Albumin">
												<?= form_error('pemeriksaan_albumin', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Pemeriksaan HIV</label>
											<div class="col-sm-12">
												<input type="text" name="pemeriksaan_hiv"
													value="<?= isset($rekam_medis) ? $rekam_medis['pemeriksaan_hiv'] : set_value('pemeriksaan_hiv'); ?>"
													class="form-control form-control-user" id="pemeriksaan_hiv"
													placeholder="Masukkan Hasil HIV">
												<?= form_error('pemeriksaan_hiv', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Pemeriksaan HbsAg</label>
											<div class="col-sm-12">
												<input type="text" name="pemeriksaan_hbsag"
													value="<?= isset($rekam_medis) ? $rekam_medis['pemeriksaan_hbsag'] : set_value('pemeriksaan_hbsag'); ?>"
													class="form-control form-control-user" id="pemeriksaan_hbsag"
													placeholder="Masukkan Hasil HbsAg">
												<?= form_error('pemeriksaan_hbsag', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Golongan Darah</label>
											<div class="col-sm-12">
												<input type="text" name="pemeriksaan_gol_darah"
													value="<?= isset($rekam_medis) ? $rekam_medis['pemeriksaan_gol_darah'] : set_value('pemeriksaan_gol_darah'); ?>"
													class="form-control form-control-user" id="pemeriksaan_gol_darah"
													placeholder="Masukkan Golongan Darah">
												<?= form_error('pemeriksaan_gol_darah', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Gula Darah</label>
											<div class="col-sm-12">
												<input type="number" name="pemeriksaan_gula_darah"
													value="<?= isset($rekam_medis) ? $rekam_medis['pemeriksaan_gula_darah'] : set_value('pemeriksaan_gula_darah'); ?>"
													class="form-control form-control-user" id="pemeriksaan_gula_darah"
													placeholder="Masukkan Hasil Gula Darah">
												<?= form_error('pemeriksaan_gula_darah', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>


										<div class="form-group row">
											<!-- <input type="hidden" name="id_user" value="<?= $dokter['id_user']; ?>"> -->
											<label class="col-sm-4 col-form-label">&emsp;Nama
													Dokter</strong></label>
											<div class="col-sm-12">
												<select name="id_user" class="form-control form-control-user"
													id="id_user">
													<option value="">Pilih Nama Dokter</option>
													<?php foreach ($dokter as $d): ?>
													<option value="<?= $d['id_user']; ?>"
														<?= set_select('id_user', $d['id_user'], $d['id_user'] == $rekam_medis['id_user']); ?>>
														<?= $d['nama']; ?></option>
													<?php endforeach; ?>
												</select>
												<?= form_error('id_user', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<h3>Resep Obat</h3>
<div id="resep-obat">
    <div class="form-group row">
        <div class="col-sm-8 offset-sm-4">
            <button type="button" class="btn btn-primary" onclick="addResep()">Tambah Resep</button>
        </div>
    </div>
    <div id="resep-container">
        <?php if (isset($resep_list) && !empty($resep_list)): ?>
            <?php foreach ($resep_list as $index => $resep): ?>
                <div class="resep-row">
                    <input type="hidden" name="id_resep[]" value="<?= $resep->id_resep; ?>">
					<div class="form-group row">
    <label for="id_obat" class="col-sm-4 col-form-label"><strong>&emsp;Nama Obat</strong></label>
    <div class="col-sm-8">
        <select name="id_obat[]" class="form-control" onchange="updateJenisObat(this)">
            <option value="">Pilih Obat</option>
            <?php foreach ($obat_list as $obat): ?>
                <?php if ($obat->stok > 0 && $obat->stok < 5000): ?>
                    <option value="<?= $obat->id_obat; ?>" data-jenis="<?= $obat->jenis_obat; ?>" <?= ($obat->id_obat == $resep->id_obat) ? 'selected' : ''; ?>>
                        <?= $obat->nama_obat; ?>
                    </option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="jenis_obat" class="col-sm-4 col-form-label"><strong>&emsp;Jenis Obat</strong></label>
    <div class="col-sm-8">
        <select name="jenis_obat[]" class="form-control">
            <option value="">Pilih Jenis Obat</option>
            <?php foreach ($obat_list as $obat): ?>
                <option value="<?= $obat->id_obat; ?>" <?= ($obat->id_obat == $resep->id_obat) ? 'selected' : ''; ?>>
                    <?= $obat->jenis_obat; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-4 col-form-label"><strong>&emsp;Jumlah</strong></label>
                        <div class="col-sm-8">
                            <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" value="<?= $resep->jumlah; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="keterangan_resep" class="col-sm-4 col-form-label"><strong>&emsp;Keterangan</strong></label>
                        <div class="col-sm-8">
                            <input type="text" name="keterangan_resep[]" class="form-control" placeholder="Keterangan (opsional)" value="<?= $resep->keterangan_resep; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-8 offset-sm-4">
                            <button type="button" class="btn btn-danger" onclick="removeResep(this)">Hapus</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="resep-row">
                <div class="form-group row">
                    <label for="id_obat" class="col-sm-4 col-form-label">Nama Obat</label>
                    <div class="col-sm-8">
                        <select name="id_obat[]" class="form-control" onchange="updateJenisObat(this)">
                            <option value="">Pilih Obat</option>
                            <?php foreach ($obat_list as $obat): ?>
                                <?php if ($obat->stok > 0 && $obat->stok < 5000): ?>
                                    <option value="<?= $obat->id_obat; ?>" data-jenis="<?= $obat->jenis_obat; ?>">
                                        <?= $obat->nama_obat; ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jenis_obat" class="col-sm-4 col-form-label">Jenis Obat</label>
                    <div class="col-sm-8">
                        <select name="jenis_obat[]" class="form-control">
                            <option value="">Pilih Jenis Obat</option>
                            <?php foreach ($obat_list as $obat): ?>
                                <?php if ($obat->stok > 0 && $obat->stok < 5000): ?>
                                    <option value="<?= $obat->jenis_obat; ?>">
                                        <?= $obat->jenis_obat; ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
                    <div class="col-sm-8">
                        <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="keterangan_resep" class="col-sm-4 col-form-label">Keterangan (opsional)</label>
                    <div class="col-sm-8">
                        <input type="text" name="keterangan_resep[]" class="form-control" placeholder="Keterangan (opsional)">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-8 offset-sm-4">
                        <button type="button" class="btn btn-danger" onclick="removeResep(this)">Hapus</button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-8 offset-sm-4">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</div>

<script>
    function updateJenisObat(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const jenisObat = selectedOption.getAttribute('data-jenis');
        const jenisObatSelect = selectElement.closest('.resep-row').querySelector('select[name="jenis_obat[]"]');
        
        if (jenisObatSelect) {
            jenisObatSelect.value = jenisObat;
        }
    }

    function addResep() {
        const container = document.getElementById('resep-container');
        const row = document.createElement('div');
        row.className = 'resep-row';
        row.innerHTML = `
            <div class="form-group row">
                <label for="id_obat" class="col-sm-4 col-form-label"><strong>&emsp;Nama Obat</strong></label> 
                <div class="col-sm-8">
                    <select name="id_obat[]" class="form-control" onchange="updateJenisObat(this)">
                        <option value="">Pilih Obat</option>
                        <?php foreach ($obat_list as $obat): ?>
                            <?php if ($obat->stok > 0 && $obat->stok < 5000): ?>
                                <option value="<?= $obat->id_obat; ?>" data-jenis="<?= $obat->jenis_obat; ?>">
                                    <?= $obat->nama_obat; ?>
                                </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="jenis_obat" class="col-sm-4 col-form-label"><strong>&emsp;Jenis Obat</strong></label>
                <div class="col-sm-8">
                    <select name="jenis_obat[]" class="form-control">
                        <option value="">Pilih Jenis Obat</option>
                        <?php foreach ($obat_list as $obat): ?>
                            <?php if ($obat->stok > 0 && $obat->stok < 5000): ?>
                                <option value="<?= $obat->jenis_obat; ?>">
                                    <?= $obat->jenis_obat; ?>
                                </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="jumlah" class="col-sm-4 col-form-label"><strong>&emsp;Jumlah</strong></label>
                <div class="col-sm-8">
                    <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah">
                </div>
            </div>

            <div class="form-group row">
                <label for="keterangan_resep" class="col-sm-4 col-form-label"><strong>&emsp;Keterangan (opsional)</strong></label>
                <div class="col-sm-8">
                    <input type="text" name="keterangan_resep[]" class="form-control" placeholder="Keterangan (opsional)">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-8 offset-sm-4">
                    <button type="button" class="btn btn-danger" onclick="removeResep(this)">Hapus</button>
                </div>
            </div>
        `;
        container.appendChild(row);
    }

    function removeResep(button) {
        const row = button.closest('.resep-row');
        row.remove();
    }
</script>
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
