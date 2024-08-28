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
						<a href="<?=base_url('Dokter/pasien')?>" class="btn btn-danger mb-2">Kembali</a>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card" style="background-color: rgba(245, 245, 245, 0.9);">
								<div class="card-header">
									<center>
										<h4 class="title"><strong>Tambah Data Rekam Medis Bumil</strong></h4><br><br>
									</center>
									<form method="post" action="<?= base_url('Dokter/tambah_rekammedispasien') ?>">
										<input type="hidden" name="id_kunjungan"
											value="<?= $kunjungan['id_kunjungan'] ?>">
											<input type="hidden" name="nama_pelayanan"
											value="<?= $kunjungan['nama_pelayanan'] ?>">
										<div class="card-body">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label"> No Rekam Medis</label>
												<div class="col-sm-9">
													<input type="text" name="no_rekam_medis" class="form-control"
														value="<?= $kunjungan['no_rekam_medis'] ?>" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label"> Nama Pasien</label>
												<div class="col-sm-9">
													<input type="text" name="nama_pasien" class="form-control"
														value="<?= $kunjungan['nama_pasien'] ?>" readonly>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Tanggal Kunjungan</label>
												<div class="col-sm-9">
													<input type="date" name="tanggal_kunjungan" class="form-control"
														value="<?= $kunjungan['tanggal_kunjungan'] ?>">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Umur</label>
												<div class="col-sm-9">
													<input type="text" name="umur" id="umur-pasien" class="form-control"
														value="<?= $kunjungan['umur'] ?>" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Jenis Kelamin</label>
												<div class="col-sm-9">
													<input type="text" name="jenis_kelamin" id="jenis_kelamin"
														class="form-control" value="<?= $kunjungan['jenis_kelamin'] ?>"
														readonly>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Pendidikan terakhir</label>
												<div class="col-sm-9">
													<input type="text" name="pendidikan" id="pendidikan"
														class="form-control" value="<?= $kunjungan['pendidikan'] ?>"
														readonly>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Pekerjaan</label>
												<div class="col-sm-9">
													<input type="text" name="pekerjaan" id="pekerjaan"
														class="form-control" value="<?= $kunjungan['pekerjaan'] ?>"
														readonly>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Nama Suami</label>
												<div class="col-sm-9">
													<input type="text" name="nama_suami" class="form-control"
														value="<?= $kunjungan['nama_suami'] ?>" readonly>
												</div>
											</div>
											<!-- <div class="form-group row">
												<label class="col-sm-3 col-form-label">Umur Suami</label>
												<div class="col-sm-9">
													<input type="text" name="umur_suami" id="umur_suami"
														class="form-control" value="<?= $kunjungan['umur_suami'] ?>"
														readonly>
												</div>
											</div> -->
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Pendidikan Suami</label>
												<div class="col-sm-9">
													<input type="text" name="pendidikan_suami" id="pendidikan_suami"
														class="form-control"
														value="<?= $kunjungan['pendidikan_suami'] ?>" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Pekerjaan Suami</label>
												<div class="col-sm-9">
													<input type="text" name="pekerjaan_suami" id="pekerjaan_suami"
														class="form-control"
														value="<?= $kunjungan['pekerjaan_suami'] ?>" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label for="jam_periksa" class="col-sm-3 col-form-label">Jam
													Periksa</label>
												<div class="col-sm-9">
													<input type="time" name="jam_periksa" class="form-control"
														id="jam_periksa">
												</div>
											</div>
											<label class="col-sm-12 col-form-label"><strong>
													<center> SUBJECTIF</center>
												</strong></label>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Riwayat Kontrasepsi
													Terakhir</label>
												<div class="col-sm-9">
													<select name="riwayat_kontrasepsi_trk"
														class="form-control form-control-user"
														id="riwayat_kontrasepsi_trk">
														<option value="">Pilih Riwayat Kontrasepsi</option>
														<option value="Tidak Menggunakan"
															<?= set_select('riwayat_kontrasepsi_trk', 'Tidak Menggunakan'); ?>>
															Tidak Menggunakan</option>
														<option value="IUD"
															<?= set_select('riwayat_kontrasepsi_trk', 'IUD'); ?>>IUD
														</option>
														<option value="Suntik"
															<?= set_select('riwayat_kontrasepsi_trk', 'Suntik'); ?>>
															Suntik</option>
														<option value="Implan"
															<?= set_select('riwayat_kontrasepsi_trk', 'Implan'); ?>>
															Implan</option>
														<option value="Pil"
															<?= set_select('riwayat_kontrasepsi_trk', 'Pil'); ?>>Pil
														</option>
													</select>
													<?= form_error('riwayat_kontrasepsi_trk', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Riwayat Kehamilan
													Terdahulu</label>
												<div class="col-sm-9">
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
                <label class="col-sm-2 col-form-label">Hamil Ke</label>
                <div class="col-sm-10">
                    <input type="number" name="hamilke[]" class="form-control form-control-user" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Umur Anak </label>
                <div class="col-sm-10">
                    <input type="number" name="umur_anak[]" class="form-control form-control-user" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Berat Lahir (gram)</label>
                <div class="col-sm-10">
                    <input type="number" name="berat_lahir[]" class="form-control form-control-user" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Penolong Persalinan</label>
                <div class="col-sm-10">
                    <select name="penolong_persalinan[]" class="form-control form-control-user">
                        <option value="">Pilih Penolong Persalinan</option>
                        <option value="Dokter">Dokter</option>
                        <option value="Bidan">Bidan</option>
                        <option value="Dukun Terlatih">Dukun Terlatih</option>
                        <option value="Dukun Tak Terlatih">Dukun Tak Terlatih</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Cara Persalinan</label>
                <div class="col-sm-10">
                    <select name="cara_persalinan[]" class="form-control form-control-user">
                        <option value="">Pilih Cara Persalinan</option>
                        <option value="Normal">Normal</option>
                        <option value="Sungsang">Sungsang</option>
                        <option value="Alat">Alat</option>
                        <option value="SC">SC</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keadaan Bayi</label>
                <div class="col-sm-10">
                    <select name="keadaan_bayi[]" class="form-control form-control-user">
                        <option value="">Pilih Keadaan Bayi</option>
                        <option value="Sehat">Sehat</option>
                        <option value="Sakit/Cacat">Sakit/Cacat</option>
                        <option value="Mati">Mati</option>
                    </select>
                </div>
            </div>
			    <div class="form-group row">
                <label class="col-sm-2 col-form-label">Komplikasi</label>
                <div class="col-sm-10">
            <div class="row">
                        <div class="col-sm-6">
                            <div class="form-check">
                                <input type="checkbox" name="komplikasi[${container.children.length}][]" value="Perdarahan Antepartum" class="form-check-input">
                                <label class="form-check-label">Perdarahan Antepartum</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="komplikasi[${container.children.length}][]" value="Perdarahan Postpartum" class="form-check-input">
                                <label class="form-check-label">Perdarahan Postpartum</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="komplikasi[${container.children.length}][]" value="HT" class="form-check-input">
                                <label class="form-check-label">HT</label>
                            </div>
                           
                        </div>
                        <div class="col-sm-6">
						 <div class="form-check">
                                <input type="checkbox" name="komplikasi[${container.children.length}][]" value="Infeksi" class="form-check-input">
                                <label class="form-check-label">Infeksi</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="komplikasi[${container.children.length}][]" value="Partus Lama" class="form-check-input">
                                <label class="form-check-label">Partus Lama</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="komplikasi[${container.children.length}][]" value="Partus Praterm" class="form-check-input">
                                <label class="form-check-label">Partus Praterm</label>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="form-group row">
                <div class="col-sm-9 offset-sm-3">
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

										</script>

										<label for class="col-sm-12 col-form-label">Riwayat Kehamilan Sekarang</label>
										<label for class="col-sm-12 col-form-label"><u>Riwayat Perkawinan</u></label>
										<div class="form-group row">
											<label for="bersuami" class="col-sm-3 col-form-label">&emsp;Bersuami</label>
											<div class="col-sm-9">
												<select name="bersuami" class="form-control" id="bersuami"
													onchange="toggleBersuamiDetails()">
													<option value="">Pilih</option>
													<option value="Ya" <?= set_select('bersuami', 'Ya'); ?>>Ya
													</option>
													<option value="Tidak" <?= set_select('bersuami', 'Tidak'); ?>>Tidak
													</option>
												</select>
												<?= form_error('bersuami', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div id="bersuami-details" style="display: none;">
											<div class="form-group row">
												<label for="berapa_lama" class="col-sm-3 col-form-label">&emsp;Berapa
													lama</label>
												<div class="col-sm-9">
													<input type="text" name="berapa_lama" class="form-control"
														id="berapa_lama">
												</div>
											</div>
											<div class="form-group row">
												<label for="berapa_kali" class="col-sm-3 col-form-label">&emsp;Berapa
													kali</label>
												<div class="col-sm-9">
													<input type="text" name="berapa_kali" class="form-control"
														id="berapa_kali">
												</div>
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

										</script>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">&emsp;Usia Pertama Kali Kawin</label>
    <div class="col-sm-9">
        <input type="text" name="usia_pertama_kali_kawin"
            value="<?= set_value('usia_pertama_kali_kawin'); ?>"
            class="form-control form-control-user" id="usia_pertama_kali_kawin"
            placeholder="Masukkan Usia Pertama Kali Kawin">
        <?= form_error('usia_pertama_kali_kawin', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>
										<label for class="col-sm-12 col-form-label"><u>Riwayat Menstruasi</u></label>

										<div class="form-group row">
											<label class="col-sm-3 col-form-label">&emsp;HPHT</label>
											<div class="col-sm-9">
												<input type="text" name="hpht" value="<?= set_value('hpht'); ?>"
													class="form-control form-control-user" id="hpht"
													placeholder="Masukkan HPHT">
												<?= form_error('hpht', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="siklus_mens" class="col-sm-3 col-form-label">&emsp;Siklus
												Menstruasi</label>
											<div class="col-sm-9">
												<input type="number" name="siklus_mens"
													value="<?= set_value('siklus_mens'); ?>" class="form-control"
													id="siklus_mens" placeholder="Berapa Hari">
												<?= form_error('siklus_mens', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="form-group row">
											<label for="teratur" class="col-sm-3 col-form-label">&emsp;Teratur/Tidak
												Teratur</label>
											<div class="col-sm-9">
												<select name="teratur" class="form-control" id="teratur">
													<option value="">Pilih</option>
													<option value="Teratur" <?= set_select('teratur', 'Teratur'); ?>>
														Teratur</option>
													<option value="Tidak Teratur"
														<?= set_select('teratur', 'Tidak Teratur'); ?>>Tidak Teratur
													</option>
												</select>
												<?= form_error('teratur', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
    <label for="banyaknya_haid" class="col-sm-3 col-form-label">&emsp;Banyaknya Haid</label>
    <div class="col-sm-9">
        <select name="banyaknya_haid" class="form-control" id="banyaknya_haid">
            <option value="">Pilih</option>
            <option value="Banyak" <?= set_select('banyaknya_haid', 'Banyak'); ?>>Banyak</option>
            <option value="Sedang" <?= set_select('banyaknya_haid', 'Sedang'); ?>>Sedang</option>
            <option value="Sedikit" <?= set_select('banyaknya_haid', 'Sedikit'); ?>>Sedikit</option>
        </select>
        <?= form_error('banyaknya_haid', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

										<div class="form-group row">
											<label for="gumpalan" class="col-sm-3 col-form-label">&emsp;Gumpalan</label>
											<div class="col-sm-9">
												<select name="gumpalan" class="form-control" id="gumpalan">
													<option value="">Pilih</option>
													<option value="Gumpal" <?= set_select('gumpalan', 'Gumpal'); ?>>
														Gumpal</option>
													<option value="Biasa" <?= set_select('gumpalan', 'Biasa'); ?>>Biasa
													</option>
													<option value="Encer" <?= set_select('gumpalan', 'Encer'); ?>>Encer
													</option>
												</select>
												<?= form_error('gumpalan', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="form-group row">
											<label for="merasa_sakit" class="col-sm-3 col-form-label">&emsp;Merasa
												Sakit</label>
											<div class="col-sm-9">
												<select name="merasa_sakit" class="form-control" id="merasa_sakit">
													<option value="">Pilih</option>
													<option value="Sebelum Haid"
														<?= set_select('merasa_sakit', 'Sebelum Haid'); ?>>Sebelum Haid
													</option>
													<option value="Selama Haid"
														<?= set_select('merasa_sakit', 'Selama Haid'); ?>>Selama Haid
													</option>
													<option value="Sesudah Haid"
														<?= set_select('merasa_sakit', 'Sesudah Haid'); ?>>Sesudah Haid
													</option>
												</select>
												<?= form_error('merasa_sakit', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="form-group row">
											<label for="fluor" class="col-sm-3 col-form-label">&emsp;Fluor</label>
											<div class="col-sm-9">
												<select name="fluor" class="form-control" id="fluor"
													onchange="toggleFluorDetails(this)">
													<option value="">Pilih</option>
													<option value="Ya" <?= set_select('fluor', 'Ya'); ?>>Ya</option>
													<option value="Tidak" <?= set_select('fluor', 'Tidak'); ?>>Tidak
													</option>
												</select>
												<?= form_error('fluor', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div id="fluor-details" style="display: none;">
											<div class="form-group row">
												<label for="fluor_berapa_lama"
													class="col-sm-3 col-form-label">&emsp;Berapa Lama</label>
												<div class="col-sm-9">
													<input type="text" name="fluor_berapa_lama"
														value="<?= set_value('fluor_berapa_lama'); ?>"
														class="form-control" id="fluor_berapa_lama"
														placeholder="Masukkan Berapa Lama">
													<?= form_error('fluor_berapa_lama', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="fluor_jumlah"
													class="col-sm-3 col-form-label">&emsp;Jumlah</label>
												<div class="col-sm-9">
													<input type="text" name="fluor_jumlah"
														value="<?= set_value('fluor_jumlah'); ?>" class="form-control"
														id="fluor_jumlah" placeholder="Masukkan Jumlah">
													<?= form_error('fluor_jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="fluor_warna"
													class="col-sm-3 col-form-label">&emsp;Warna</label>
												<div class="col-sm-9">
													<input type="text" name="fluor_warna"
														value="<?= set_value('fluor_warna'); ?>" class="form-control"
														id="fluor_warna" placeholder="Masukkan Warna">
													<?= form_error('fluor_warna', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="fluor_bau" class="col-sm-3 col-form-label">&emsp;Bau</label>
												<div class="col-sm-9">
													<input type="text" name="fluor_bau"
														value="<?= set_value('fluor_bau'); ?>" class="form-control"
														id="fluor_bau" placeholder="Masukkan Bau">
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

										</script>
										<label for class="col-sm-12 col-form-label"><u>Status Imunisasi</u></label>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">&emsp;Imunisasi</label>
											<div class="col-sm-9">
												<input type="date" name="imunisasi"
													value="<?= set_value('imunisasi'); ?>"
													class="form-control form-control-user" id="rencana_mon_tgl"
													placeholder="Masukkan Tanggal Imunisasi">
												<?= form_error('imunisasi', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="keluhan_utama" class="col-sm-3 col-form-label">&emsp;Keluhan
												Utama</label>
											<div class="col-sm-9">
												<textarea name="keluhan_utama" class="form-control"
													id="keluhan_utama"></textarea>
											</div>
										</div>
										<!-- Keluhan lain -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">&emsp;Keluhan Lain</label>
											<div class="col-sm-9">
												<div class="row">
													<div class="col-sm-6">
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="keluhan_lain[]" value="Tidak Ada" id="tidak_ada"
																<?= set_checkbox('keluhan_lain[]', 'Tidak Ada'); ?>>
															<label class="form-check-label" for="tidak_ada">Tidak
																Ada</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="keluhan_lain[]" value="Nafsu Makan Berkurang"
																id="nafsu_makan_berkurang"
																<?= set_checkbox('keluhan_lain[]', 'Nafsu Makan Berkurang'); ?>>
															<label class="form-check-label"
																for="nafsu_makan_berkurang">Nafsu Makan
																Berkurang</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="keluhan_lain[]" value="Muntah-Muntah "
																id="muntah_muntah"
																<?= set_checkbox('keluhan_lain[]', 'Muntah-Muntah'); ?>>
															<label class="form-check-label"
																for="muntah_muntah">Muntah-Muntah</label>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="keluhan_lain[]" value="Pusing" id="pusing"
																<?= set_checkbox('keluhan_lain[]', 'Pusing'); ?>>
															<label class="form-check-label" for="pusing">Pusing</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="keluhan_lain[]" value="Nyeri Perut"
																id="nyeri_perut"
																<?= set_checkbox('keluhan_lain[]', 'Nyeri Perut'); ?>>
															<label class="form-check-label" for="nyeri_perut">Nyeri
																Perut</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="keluhan_lain[]" value="Oedema" id="oedema"
																<?= set_checkbox('keluhan_lain[]', 'Oedema'); ?>>
															<label class="form-check-label" for="oedema">Oedema</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="keluhan_lain[]" value="Tambahan" id="tambahan"
																<?= set_checkbox('keluhan_lain[]', 'Tambahan'); ?>>
															<label class="form-check-label"
																for="tambahan">Tambahan</label>
														</div>
													</div>
												</div>
												<?= form_error('keluhan_lain', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div id="tambahanOption" class="form-group row" style="display: none;">
											<label class="col-sm-3 col-form-label">&emsp;Detail Keluhan Lain</label>
											<div class="col-sm-9">
												<input type="text" name="keluhan_lain_lainnya"
													value="<?= set_value('keluhan_lain_lainnya'); ?>"
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

												// Show "Lainnya" detail input if "Tambahan" was already checked (on page load)
												if ($('input[type="checkbox"][value="Tambahan"]').is(':checked')) {
													$('#tambahanOption').show();
												}
											});

										</script>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">&emsp;Riwayat Penyakit Dahulu</label>
											<div class="col-sm-9">
												<div class="row">
													<div class="col-sm-6">
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="riwayat_penyakit_dahulu[]" value="Tidak Ada"
																id="tidak_ada"
																<?= set_checkbox('riwayat_penyakit_dahulu[]', 'Tidak Ada'); ?>>
															<label class="form-check-label" for="tidak_ada">Tidak
																Ada</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="riwayat_penyakit_dahulu[]"
																value="Penyakit Jantung" id="penyakit_jantung"
																<?= set_checkbox('riwayat_penyakit_dahulu[]', 'Penyakit Jantung'); ?>>
															<label class="form-check-label"
																for="penyakit_jantung">Penyakit Jantung</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="riwayat_penyakit_dahulu[]"
																value="Diabetes Mellitus" id="diabetes_mellitus"
																<?= set_checkbox('riwayat_penyakit_dahulu[]', 'Diabetes Mellitus'); ?>>
															<label class="form-check-label"
																for="diabetes_mellitus">Diabetes Mellitus</label>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="riwayat_penyakit_dahulu[]" value="Hepatitis"
																id="hepatitis"
																<?= set_checkbox('riwayat_penyakit_dahulu[]', 'Hepatitis'); ?>>
															<label class="form-check-label"
																for="hepatitis">Hepatitis</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="riwayat_penyakit_dahulu[]" value="Gastritis"
																id="gastritis"
																<?= set_checkbox('riwayat_penyakit_dahulu[]', 'Gastritis'); ?>>
															<label class="form-check-label"
																for="gastritis">Gastritis</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="riwayat_penyakit_dahulu[]" value="Lainnya"
																id="lainnya"
																<?= set_checkbox('riwayat_penyakit_dahulu[]', 'Lainnya'); ?>>
															<label class="form-check-label"
																for="lainnya">Lainnya</label>
														</div>
													</div>
												</div>
												<?= form_error('riwayat_penyakit_dahulu', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div id="lainnyaOption" class="form-group row" style="display: none;">
											<label class="col-sm-3 col-form-label">&emsp;Detail Penyakit Dahulu</label>
											<div class="col-sm-9">
												<input type="text" name="riwayat_penyakit_dahulu_lainnya"
													value="<?= set_value('riwayat_penyakit_dahulu_lainnya'); ?>"
													class="form-control form-control-user"
													id="riwayat_penyakit_dahulu_lainnya"
													placeholder="Masukkan Detail Riwayat Penyakit Dahulu Lainnya">
												<?= form_error('riwayat_penyakit_dahulu_lainnya', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<script>
											$(document).ready(function () {
												$('input[type="checkbox"][value="Lainnya"]').on('change', function () {
													if ($(this).is(':checked')) {
														$('#lainnyaOption').show();
													} else {
														$('#lainnyaOption').hide();
													}
												});
												// Show "Lainnya" detail input if "Lainnya" was already checked (on page load)
												if ($('input[type="checkbox"][value="Lainnya"]').is(':checked')) {
													$('#lainnyaOption').show();
												}
											});

										</script>
										<!-- Riwayat Penyakit Keluarga -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">&emsp;Riwayat Penyakit
												Keluarga</label>
											<div class="col-sm-9">
												<div class="row">
													<div class="col-sm-6">
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="riwayat_penyakit_keluarga[]" value="Tidak Ada"
																id="tidak_ada"
																<?= set_checkbox('riwayat_penyakit_keluarga[]', 'Tidak Ada'); ?>>
															<label class="form-check-label" for="tidak_ada">Tidak
																Ada</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="riwayat_penyakit_keluarga[]"
																value="Penyakit Jantung" id="penyakit_jantung"
																<?= set_checkbox('riwayat_penyakit_keluarga[]', 'Penyakit Jantung'); ?>>
															<label class="form-check-label"
																for="penyakit_jantung">Penyakit Jantung</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="riwayat_penyakit_keluarga[]"
																value="Diabetes Mellitus" id="diabetes_mellitus"
																<?= set_checkbox('riwayat_penyakit_keluarga[]', 'Diabetes Mellitus'); ?>>
															<label class="form-check-label"
																for="diabetes_mellitus">Diabetes Mellitus</label>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="riwayat_penyakit_keluarga[]" value="Hepatitis"
																id="hepatitis"
																<?= set_checkbox('riwayat_penyakit_keluarga[]', 'Hepatitis'); ?>>
															<label class="form-check-label"
																for="hepatitis">Hepatitis</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="riwayat_penyakit_keluarga[]" value="Gastritis"
																id="gastritis"
																<?= set_checkbox('riwayat_penyakit_keluarga[]', 'Gastritis'); ?>>
															<label class="form-check-label"
																for="gastritis">Gastritis</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="riwayat_penyakit_keluarga[]" value="Lainnya1"
																id="lainnya1"
																<?= set_checkbox('riwayat_penyakit_keluarga[]', 'Lainnya'); ?>>
															<label class="form-check-label"
																for="lainnya1">Lainnya</label>
														</div>
													</div>
												</div>
												<?= form_error('riwayat_penyakit_keluarga', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div id="lainnyaOption1" class="form-group row" style="display: none;">
											<label class="col-sm-3 col-form-label">&emsp;Detail Penyakit
												Keluarga</label>
											<div class="col-sm-9">
												<input type="text" name="riwayat_penyakit_keluarga_lainnya"
													value="<?= set_value('riwayat_penyakit_keluarga_lainnya'); ?>"
													class="form-control form-control-user"
													id="riwayat_penyakit_keluarga_lainnya"
													placeholder="Masukkan Detail Riwayat Penyakit Keluarga Lainnya">
												<?= form_error('riwayat_penyakit_keluarga_lainnya', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<script>
											$(document).ready(function () {
												$('input[type="checkbox"][value="Lainnya1"]').on('change', function () {
													if ($(this).is(':checked')) {
														$('#lainnyaOption1').show();
													} else {
														$('#lainnyaOption1').hide();
													}
												});
												// Show "Lainnya" detail input if "Lainnya" was already checked (on page load)
												if ($('input[type="checkbox"][value="Lainnya1"]').is(':checked')) {
													$('#lainnyaOption1').show();
												}
											});

										</script>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">&emsp;Kebiasaan yang Mempengaruhi
												Kehamilan</label>
											<div class="col-sm-9">
												<div class="row">
													<div class="col-sm-6">
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="kebiasaan[]" value="Tidak Ada" id="tidak_ada"
																<?= set_checkbox('kebiasaan[]', 'Tidak Ada'); ?>>
															<label class="form-check-label" for="tidak_ada">Tidak
																Ada</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="kebiasaan[]" value="Merokok" id="merokok"
																<?= set_checkbox('kebiasaan[]', 'Merokok'); ?>>
															<label class="form-check-label"
																for="merokok">Merokok</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="kebiasaan[]" value="Minum Obat Penenang"
																id="minum_obat_penenang"
																<?= set_checkbox('kebiasaan[]', 'Minum Obat Penenang'); ?>>
															<label class="form-check-label"
																for="minum_obat_penenang">Minum Obat Penenang</label>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="kebiasaan[]" value="Narkoba" id="narkoba"
																<?= set_checkbox('kebiasaan[]', 'Narkoba'); ?>>
															<label class="form-check-label"
																for="narkoba">Narkoba</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="kebiasaan[]" value="Minum Alkohol"
																id="minum_alkohol"
																<?= set_checkbox('kebiasaan[]', 'Minum Alkohol'); ?>>
															<label class="form-check-label" for="minum_alkohol">Minum
																Alkohol</label>
														</div>
													</div>
												</div>
												<?= form_error('kebiasaan', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<label class="col-sm-12 col-form-label"><strong>
												<center> OBYEKTIF</center>
											</strong></label>
										<label for class="col-sm-12 col-form-label"><u>Status Generalis</u></label>

										<div class="form-group row">
											<label for="keadaan_umum" class="col-sm-3 col-form-label">&emsp;Keadaan
												Umum</label>
											<div class="col-sm-9">
												<select name="keadaan_umum" class="form-control" id="keadaan_umum">
													<option value="">Pilih</option>
													<option value="Baik" <?= set_select('keadaan_umum', 'Baik'); ?>>
														Baik</option>
													<option value="Sedang" <?= set_select('keadaan_umum', 'Sedang'); ?>>
														Sedang
													</option>
													<option value="Lemah" <?= set_select('keadaan_umum', 'Lemah'); ?>>
														Lemah
													</option>
												</select>
												<?= form_error('keadaan_umum', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="form-group row">
											<label for="kesadaran"
												class="col-sm-3 col-form-label">&emsp;Kesadaran</label>
											<div class="col-sm-9">
												<input type="text" name="kesadaran"
													value="<?= set_value('kesadaran'); ?>" class="form-control"
													id="kesadaran" placeholder="Masukkan Kesadaran">
												<?= form_error('kesadaran', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="form-group row">
											<label for="tekanan_darah" class="col-sm-3 col-form-label">&emsp;Tekanan
												Darah</label>
											<div class="col-sm-9">
												<input type="text" name="tekanan_darah"
													value="<?= set_value('tekanan_darah'); ?>" class="form-control"
													id="tekanan_darah" placeholder="Masukkan Tekanan Darah">
												<?= form_error('tekanan_darah', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="nadi" class="col-sm-3 col-form-label">&emsp;Nadi</label>
											<div class="col-sm-9">
												<input type="text" name="nadi" value="<?= set_value('nadi'); ?>"
													class="form-control" id="nadi" placeholder="Masukkan Nadi">
												<?= form_error('nadi', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="form-group row">
											<label for="frekuensi_napas" class="col-sm-3 col-form-label">&emsp;Frekuensi
												Pernapasan</label>
											<div class="col-sm-9">
												<input type="text" name="frekuensi_napas"
													value="<?= set_value('frekuensi_napas'); ?>" class="form-control"
													id="frekuensi_napas" placeholder="Masukkan Frekuensi Pernapasan">
												<?= form_error('frekuensi_napas', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="form-group row">
											<label for="suhu" class="col-sm-3 col-form-label">&emsp;Suhu</label>
											<div class="col-sm-9">
												<input type="text" name="suhu" value="<?= set_value('suhu'); ?>"
													class="form-control" id="suhu" placeholder="Masukkan Suhu">
												<?= form_error('suhu', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
    <label for="bentuk_tubuh" class="col-sm-3 col-form-label">&emsp;Bentuk Tubuh</label>
    <div class="col-sm-9">
        <select name="bentuk_tubuh" class="form-control" id="bentuk_tubuh">
            <option value="">Pilih</option>
            <option value="Normal" <?= set_select('bentuk_tubuh', 'Normal'); ?>>Normal</option>
            <option value="Kelainan Panggul" <?= set_select('bentuk_tubuh', 'Kelainan Panggul'); ?>>Kelainan Panggul</option>
            <option value="Kelainan Tulang Belakang" <?= set_select('bentuk_tubuh', 'Kelainan Tulang Belakang'); ?>>Kelainan Tulang Belakang</option>
            <option value="Kelainan Tungkai" <?= set_select('bentuk_tubuh', 'Kelainan Tungkai'); ?>>Kelainan Tungkai</option>
        </select>
        <?= form_error('bentuk_tubuh', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

										<div class="form-group row">
											<label class="col-sm-3 col-form-label">&emsp;Kepala/Leher</label>
											<div class="col-sm-9">
												<div class="row">
													<div class="col-sm-6">
													<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="kepala[]" value="Tidak Ada" id="tidak_ada"
																<?= set_checkbox('kepala[]', 'Tidak Ada'); ?>>
															<label class="form-check-label" for="tidak_ada">Tidak
																Ada</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="kepala[]" value="Anemia" id="anemia"
																<?= set_checkbox('kepala[]', 'Anemia'); ?>>
															<label class="form-check-label" for="anemia">Anemia</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="kepala[]" value="Icterus" id="icterus"
																<?= set_checkbox('kepala[]', 'Icterus'); ?>>
															<label class="form-check-label"
																for="icterus">Icterus</label>
														</div>
													</div>
													<div class="col-sm-6">
													<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="kepala[]" value="Tonsilitis" id="tonsilitis"
																<?= set_checkbox('kepala[]', 'Tonsilitis'); ?>>
															<label class="form-check-label"
																for="tonsilitis">Tonsilitis</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="kepala[]" value="Faringitis" id="faringitis"
																<?= set_checkbox('kepala[]', 'Faringitis'); ?>>
															<label class="form-check-label"
																for="faringitis">Faringitis</label>
														</div>

														<div class="form-check">
															<input class="form-check-input" type="checkbox"
																name="kepala[]" value="Lainnya"
																id="lainnya"
																<?= set_checkbox('kepala[]', 'Lainnya'); ?>>
															<label class="form-check-label"
																for="lainnya">Lainnya</label>
														</div>
													</div>
												</div>
												<?= form_error('kepala', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div id="lainnyaOption2" class="form-group row" style="display: none;">
											<label class="col-sm-3 col-form-label">&emsp;Detail Lainnya</label>
											<div class="col-sm-9">
												<input type="text" name="kepala_lainnya"
													value="<?= set_value('kepala_lainnya'); ?>"
													class="form-control form-control-user"
													id="kepala_lainnya"
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
									<label for="thor" class="col-sm-3 col-form-label">&emsp;Thorax</label>
									<div class="col-sm-9">
										<label for="jantung" class="col-form-label d-inline">Jantung</label>
										<input type="text" name="jantung" value="<?= set_value('jantung'); ?>"
											class="form-control d-inline w-55" id="jantung" placeholder="Masukkan Data">
										<?= form_error('jantung', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="icterus" class="col-sm-3 col-form-label"></label>
									<div class="col-sm-9">
										<label for="paru" class="col-form-label d-inline">Paru</label>
										<input type="text" name="paru" value="<?= set_value('paru'); ?>"
											class="form-control d-inline w-55" id="paru" placeholder="Masukkan Data">
										<?= form_error('paru', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="payudara" class="col-sm-3 col-form-label"></label>
									<div class="col-sm-9">
										<label for="payudara" class="col-form-label d-inline">Payudara</label>
										<select name="payudara" class="form-control d-inline w-55" id="payudara">
											<option value="">Pilih</option>
											<option value="Normal" <?= set_select('payudara', 'Normal'); ?>>Normal
											</option>
											<option value="Benjolan" <?= set_select('payudara', 'Benjolan'); ?>>Benjolan
											</option>
											<option value="Kemerahan" <?= set_select('payudara', 'Kemerahan'); ?>>
												Kemerahan</option>
											<option value="Retracted Nipple"
												<?= set_select('payudara', 'Retracted Nipple'); ?>>Retracted Nipple
											</option>
										</select>
										<?= form_error('payudara', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="thor" class="col-sm-3 col-form-label">&emsp;Abdomen</label>
									<div class="col-sm-9">
										<label for="hepar" class="col-form-label d-inline">Hepar/lien</label>
										<select name="hepar" class="form-control d-inline w-55" id="hepar">
											<option value="">Pilih</option>
											<option value="Normal" <?= set_select('hepar', 'Normal'); ?>>Normal</option>
											<option value="Abnormal" <?= set_select('hepar', 'Abnormal'); ?>>Abnormal
											</option>
										</select>
										<?= form_error('hepar', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="bising_usus" class="col-sm-3 col-form-label"></label>
									<div class="col-sm-9">
										<label for="bising_usus" class="col-form-label d-inline">Bising Usus</label>
										<select name="bising_usus" class="form-control d-inline w-55" id="bising_usus">
											<option value="">Pilih</option>
											<option value="Normal" <?= set_select('bising_usus', 'Normal'); ?>>Normal
											</option>
											<option value="Abnormal" <?= set_select('bising_usus', 'Abnormal'); ?>>
												Abnormal</option>
										</select>
										<?= form_error('bising_usus', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="pembesaran" class="col-sm-3 col-form-label"></label>
									<div class="col-sm-9">
										<label for="pembesaran" class="col-form-label d-inline">Bising Usus</label>
										<select name="pembesaran" class="form-control d-inline w-55" id="pembesaran">
											<option value="">Pilih</option>
											<option value="Normal" <?= set_select('pembesaran', 'Normal'); ?>>Normal
											</option>
											<option value="Abnormal" <?= set_select('pembesaran', 'Abnormal'); ?>>
												Abnormal</option>
										</select>
										<?= form_error('pembesaran', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="superior" class="col-sm-3 col-form-label">&emsp;Ekstremitas</label>
									<div class="col-sm-9">
										<label for="superior" class="col-form-label d-inline">Superior</label>
										<select name="superior" class="form-control d-inline w-55" id="superior">
											<option value="">Pilih</option>
											<option value="Normal" <?= set_select('superior', 'Normal'); ?>>Normal
											</option>
											<option value="Abnormal" <?= set_select('superior', 'Abnormal'); ?>>Abnormal
											</option>
										</select>
										<?= form_error('superior', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="inferior" class="col-sm-3 col-form-label"></label>
									<div class="col-sm-9">
										<label for="inferior" class="col-form-label d-inline">Inferior</label>
										<select name="inferior" class="form-control d-inline w-55" id="inferior">
											<option value="">Pilih</option>
											<option value="Normal" <?= set_select('inferior', 'Normal'); ?>>Normal
											</option>
											<option value="Abnormal" <?= set_select('inferior', 'Abnormal'); ?>>Abnormal
											</option>
										</select>
										<?= form_error('inferior', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="lainnya" class="col-sm-3 col-form-label">&emsp;Lainnya</label>
									<div class="col-sm-9">
										<input type="text" name="lainnya" value="<?= set_value('lainnya'); ?>"
											class="form-control form-control-user" id="lainnya"
											placeholder="Masukkan Lainnya">
										<?= form_error('lainnya', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
								<label for class="col-sm-12 col-form-label"><u>Status Kebidanan</u></label>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">&emsp;Tinggi Fundus Uteri</label>
									<div class="col-sm-9">
										<input type="text" name="tinggi_fundus_uteri"
											value="<?= set_value('tinggi_fundus_uteri'); ?>"
											class="form-control form-control-user" id="tinggi_fundus_uteri"
											placeholder="Masukkan Tinggi Fundus Uteri">
										<?= form_error('tinggi_fundus_uteri', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
    <label for="bentuk_uterus" class="col-sm-3 col-form-label">&emsp;Bentuk Uterus</label>
    <div class="col-sm-9">
        <select name="bentuk_uterus" class="form-control d-inline w-55" id="bentuk_uterus">
            <option value="">Pilih</option>
            <option value="Normal" <?= set_select('bentuk_uterus', 'Normal'); ?>>Normal</option>
            <option value="Tidak Normal" <?= set_select('bentuk_uterus', 'Tidak Normal'); ?>>Tidak Normal</option>
        </select>
        <?= form_error('bentuk_uterus', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">&emsp;Letak Janin</label>
    <div class="col-sm-9">
        <select name="letak_janin" class="form-control form-control-user" id="letak_janin">
            <option value="">Pilih</option>
            <option value="Kepala" <?= set_select('letak_janin', 'Kepala'); ?>>Kepala</option>
            <option value="Sungsang" <?= set_select('letak_janin', 'Sungsang'); ?>>Sungsang</option>
            <option value="Lintang" <?= set_select('letak_janin', 'Lintang'); ?>>Lintang</option>
        </select>
        <?= form_error('letak_janin', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">&emsp;Gerak Janin</label>
    <div class="col-sm-9">
        <select name="gerak_janin" class="form-control form-control-user" id="gerak_janin">
            <option value="">Pilih</option>
            <option value="Aktif" <?= set_select('gerak_janin', 'Aktif'); ?>>Aktif</option>
            <option value="Jarang" <?= set_select('gerak_janin', 'Jarang'); ?>>Jarang</option>
            <option value="Tidak Ada" <?= set_select('gerak_janin', 'Tidak Ada'); ?>>Tidak Ada</option>
        </select>
        <?= form_error('gerak_janin', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div class="form-group row">
    <label for="detak_jantung_janin" class="col-sm-3 col-form-label">&emsp;Detak Jantung Janin</label>
    <div class="col-sm-9">
        <input type="number" name="detak_jantung_janin" value="<?= set_value('detak_jantung_janin'); ?>"
            class="form-control" id="detak_jantung_janin" placeholder="Masukkan Detak Jantung Janin x(menit)">
        <?= form_error('detak_jantung_janin', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">&emsp;Inspekulo</label>
    <div class="col-sm-9">
        <select name="inspekulo" class="form-control form-control-user" id="inspekulo">
            <option value="">Pilih</option>
            <option value="Normal" <?= set_select('inspekulo', 'Normal'); ?>>Normal</option>
            <option value="Vaginitis/Cartisis" <?= set_select('inspekulo', 'Vaginitis/Cartisis'); ?>>Vaginitis/Cartisis</option>
            <option value="Tumor/Ca Cervix" <?= set_select('inspekulo', 'Tumor/Ca Cervix'); ?>>Tumor/Ca Cervix</option>
        </select>
        <?= form_error('inspekulo', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div class="form-group row">
    <label for="pendarahan" class="col-sm-3 col-form-label">&emsp;Perdarahan</label>
    <div class="col-sm-9">
        <select name="pendarahan" class="form-control" id="pendarahan">
            <option value="">Pilih</option>
            <option value="Ya" <?= set_select('pendarahan', 'Ya'); ?>>Ya</option>
            <option value="Tidak" <?= set_select('pendarahan', 'Tidak'); ?>>Tidak</option>
        </select>
        <?= form_error('pendarahan', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div class="form-group row">
    <label for="indikasi" class="col-sm-3 col-form-label">&emsp;Pemeriksaan dalam Indikasi</label>
    <div class="col-sm-9">
        <select name="indikasi" class="form-control" id="indikasi">
            <option value="">Pilih</option>
            <option value="Panggul Normal" <?= set_select('indikasi', 'Panggul Normal'); ?>>Panggul Normal</option>
            <option value="Panggul Sempit" <?= set_select('indikasi', 'Panggul Sempit'); ?>>Panggul Sempit</option>
        </select>
        <?= form_error('indikasi', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>
										<label for class="col-sm-12 col-form-label"><u>Status Gizi</u></label>
										<div class="form-group row">
													<label for="tinggi_badan" class="col-sm-3 col-form-label">&emsp;Tinggi
														Badan
														(cm)
													</label>
													<div class="col-sm-9">
														<input type="number" name="tinggi_badan" class="form-control"
															id="tinggi_badan" placeholder="Masukkan Tinggi Badan">
													</div>
												</div>

												<div class="form-group row">
													<label for="berat_badan" class="col-sm-3 col-form-label">&emsp;Berat Badan
													(kg)</label>
													<div class="col-sm-9">
														<input type="number" name="berat_badan" class="form-control"
															id="berat_badan" placeholder="Masukkan Berat Badan">
													</div>
												</div>

												<div class="form-group row">
													<label for="imt" class="col-sm-3 col-form-label">&emsp;IMT
													</label>
													<div class="col-sm-7">
														<input type="text" name="imt" value="<?= set_value('imt'); ?>"
															class="form-control form-control-user" id="imt"
															placeholder="IMT akan muncul disini" readonly>
														<?= form_error('imt', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
													<div class="col-sm-2">
														<button type="button" id="hitung_imt"
															class="btn btn-primary float-right">Hasil</button><br>
													</div>
												</div>
								
		<script>
    $(document).ready(function () {
        // Calculate IMT
        $('#hitung_imt').on('click', function () {
            var tinggi = $('#tinggi_badan').val();
            var berat = $('#berat_badan').val();

            if (tinggi && berat) {
                $.ajax({
                    url: '<?php echo site_url('Dokter/hitung_imt'); ?>',
                    method: 'POST',
                    data: {
                        tinggi_badan: tinggi,
                        berat_badan: berat
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data && !data.error) {
                            $('#imt').val(data.imt);
                        } else {
                            $('#imt').val('');
                            if (data.error) {
                                alert(data.error);
                            }
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error(textStatus, errorThrown);
                        alert('Terjadi kesalahan saat menghitung IMT.');
                    }
                });
            } else {
                alert('Tinggi badan dan berat badan harus diisi.');
                $('#imt').val('');
            }
        });   }); </script>
<div class="form-group row">
									<label class="col-sm-3 col-form-label">&emsp;Lingkar Lengan (cm)</label>
									<div class="col-sm-9">
										<input type="number" name="lingkar_lengan"
											value="<?= set_value('lingkar_lengan'); ?>"
											class="form-control form-control-user" id="lingkar_lengan"
											placeholder="Masukkan Lingkar Lengan">
										<?= form_error('lingkar_lengan', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
										<label for class="col-sm-12 col-form-label"><u>Pemeriksaan Penunjang</u></label>

										<div class="form-group row">
    <label class="col-sm-3 col-form-label">&emsp;Pemeriksaan Hb</label>
    <div class="col-sm-9">
        <input type="text" name="pemeriksaan_hb" value="<?= set_value('pemeriksaan_hb'); ?>"
               class="form-control form-control-user" id="pemeriksaan_hb" placeholder="Masukkan Hasil Hb">
        <?= form_error('pemeriksaan_hb', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">&emsp;Pemeriksaan Urine</label>
    <div class="col-sm-9">
        <input type="text" name="pemeriksaan_urine" value="<?= set_value('pemeriksaan_urine'); ?>"
               class="form-control form-control-user" id="pemeriksaan_urine" placeholder="Masukkan Hasil Urine">
        <?= form_error('pemeriksaan_urine', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">&emsp;Pemeriksaan Albumin</label>
    <div class="col-sm-9">
        <input type="text" name="pemeriksaan_albumin" value="<?= set_value('pemeriksaan_albumin'); ?>"
               class="form-control form-control-user" id="pemeriksaan_albumin" placeholder="Masukkan Hasil Albumin">
        <?= form_error('pemeriksaan_albumin', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">&emsp;Pemeriksaan HIV</label>
    <div class="col-sm-9">
        <input type="text" name="pemeriksaan_hiv" value="<?= set_value('pemeriksaan_hiv'); ?>"
               class="form-control form-control-user" id="pemeriksaan_hiv" placeholder="Masukkan Hasil HIV">
        <?= form_error('pemeriksaan_hiv', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">&emsp;Pemeriksaan HbsAg</label>
    <div class="col-sm-9">
        <input type="text" name="pemeriksaan_hbsag" value="<?= set_value('pemeriksaan_hbsag'); ?>"
               class="form-control form-control-user" id="pemeriksaan_hbsag" placeholder="Masukkan Hasil HbsAg">
        <?= form_error('pemeriksaan_hbsag', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">&emsp;Golongan Darah</label>
    <div class="col-sm-9">
        <input type="text" name="pemeriksaan_gol_darah" value="<?= set_value('pemeriksaan_gol_darah'); ?>"
               class="form-control form-control-user" id="pemeriksaan_gol_darah" placeholder="Masukkan Golongan Darah">
        <?= form_error('pemeriksaan_gol_darah', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">&emsp;Gula Darah</label>
    <div class="col-sm-9">
        <input type="number" name="pemeriksaan_gula_darah" value="<?= set_value('pemeriksaan_gula_darah'); ?>"
               class="form-control form-control-user" id="pemeriksaan_gula_darah" placeholder="Masukkan Hasil Gula Darah">
        <?= form_error('pemeriksaan_gula_darah', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

								<div class="form-group row">
									<label for="id_user" class="col-sm-3 col-form-label">&emsp;Nama Dokter/Bidan</label>
									<div class="col-sm-9">
										<select name="id_user" class="form-control form-control-user" id="id_user">
											<option value="">Pilih Nama Dokter</option>
											<?php foreach ($dokter as $d): ?>
											<option value="<?= $d['id_user']; ?>"
												<?= set_select('id_user', $d['id_user']); ?>>
												<?= $d['nama']; ?>
											</option>
											<?php endforeach; ?>
										</select>
										<?= form_error('id_user', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>

								<h3>Resep Obat</h3>
								<div id="resep-obat">
									<div class="form-group row">
										<div class="col-sm-9 offset-sm-3">
											<button type="button" class="btn btn-primary" onclick="addResep()">Tambah
												Resep </button>
										</div>
									</div>
									<div id="resep-container">
										<div class="resep-row">
										<div class="form-group row">
                <label for="id_obat" class="col-sm-3 col-form-label">&emsp;Nama Obat</label>
                <div class="col-sm-9">
                    <select name="id_obat[]" class="form-control" onchange="updateJenisObat(this)">
                        <option value="">Pilih Obat</option>
                        <?php foreach ($obat_list as $obat): ?>
                            <?php if ($obat->stok > 0 && $obat->stok < 5000): ?>
                                <option value="<?php echo $obat->id_obat; ?>" data-jenis="<?php echo $obat->jenis_obat; ?>">
                                    <?php echo $obat->nama_obat; ?>
                                </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="jenis_obat" class="col-sm-3 col-form-label">&emsp;Jenis Obat</label>
                <div class="col-sm-9">
                    <select name="jenis_obat[]" class="form-control">
                        <option value="">Pilih Jenis Obat</option>
                        <?php foreach ($obat_list as $obat): ?>
                            <?php if ($obat->stok > 0 && $obat->stok < 5000): ?>
                                <option value="<?php echo $obat->jenis_obat; ?>">
                                    <?php echo $obat->jenis_obat; ?>
                                </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
											<div class="form-group row">
												<label for="jumlah" class="col-sm-3 col-form-label">&emsp;Jumlah</label>
												<div class="col-sm-9">
													<input type="number" name="jumlah[]" class="form-control"
														placeholder="Jumlah">
												</div>
											</div>
											<div class="form-group row">
												<label for="keterangan_resep" class="col-sm-3 col-form-label">&emsp;Keterangan
													(opsional)</label>
												<div class="col-sm-9">
													<input type="text" name="keterangan_resep[]" class="form-control"
														placeholder="Keterangan (opsional)">
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-2 offset-sm-10">
													<button type="button" class="btn btn-danger"
														onclick="removeResep(this)">Hapus</button>
												</div>
											</div>
										</div>
									</div>

								</div>

								<div class="form-group row">
									<div class="col-sm-7 offset-sm-5">
										<button type="submit" class="btn btn-primary">Simpan</button>
									</div>
								</div>

								<?php echo form_close(); ?>

								<script>
									function updateJenisObat(selectElement) {
        const selectedId = selectElement.value;
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const jenisObat = selectedOption.getAttribute('data-jenis');
        
        // Find the corresponding jenis_obat dropdown
        const jenisObatSelect = selectElement.closest('.resep-row').querySelector('select[name="jenis_obat[]"]');
        
        // Update the jenis_obat dropdown
        if (jenisObatSelect) {
            // Set value based on jenis_obat
            jenisObatSelect.value = jenisObat;
        }
    }
									function addResep() {
										const container = document.getElementById('resep-container');
										const row = document.createElement('div');
										row.className = 'resep-row';
										row.innerHTML = `
									<div class="form-group row">
                <label for="id_obat" class="col-sm-3 col-form-label">&emsp;Nama Obat</label>
                <div class="col-sm-9">
                    <select name="id_obat[]" class="form-control" onchange="updateJenisObat(this)">
                        <option value="">Pilih Obat</option>
                        <?php foreach ($obat_list as $obat): ?>
                            <?php if ($obat->stok > 0 && $obat->stok < 5000): ?>
                                <option value="<?php echo $obat->id_obat; ?>" data-jenis="<?php echo $obat->jenis_obat; ?>">
                                    <?php echo $obat->nama_obat; ?>
                                </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="jenis_obat" class="col-sm-3 col-form-label">&emsp;Jenis Obat</label>
                <div class="col-sm-9">
                    <select name="jenis_obat[]" class="form-control">
                        <option value="">Pilih Jenis Obat</option>
                        <?php foreach ($obat_list as $obat): ?>
                            <?php if ($obat->stok > 0 && $obat->stok < 5000): ?>
                                <option value="<?php echo $obat->jenis_obat; ?>">
                                    <?php echo $obat->jenis_obat; ?>
                                </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
											
										<div class="form-group row">
											<label for="jumlah" class="col-sm-3 col-form-label">&emsp;Jumlah</label>
											<div class="col-sm-9">
												<input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah">
											</div>
										</div>
										<div class="form-group row">
											<label for="keterangan_resep" class="col-sm-3 col-form-label">&emsp;Keterangan (opsional)</label>
											<div class="col-sm-9">
												<input type="text" name="keterangan_resep[]" class="form-control" placeholder="Keterangan (opsional)">
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-2 offset-sm-10">
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


							</div>
						</div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function () {
		$('#cek_nomor_rm').on('click', function () {
			var no_rekam_medis = $('#no_rekam_medis').val();
			$.ajax({
				url: 'http://localhost/rekammedis/Dokter/cek_nomor_rm',
				method: 'POST',
				data: {
					no_rekam_medis: no_rekam_medis
				},
				dataType: 'json',
				success: function (data) {
					console.log(data); // Log response to check the data
					if (data.status == 'success') {
						$('#nama_pasien').val(data.nama_pasien);
						$('#form_rekammedis').show();


					} else {
						alert('Nomor rekam medis tidak ditemukan.');
						$('#nama_pasien').val('');
						$('#form_rekammedis').hide();
					}
				},
				error: function (xhr, status, error) {
					console.log('AJAX error:', error); // Log AJAX errors
				}
			});
		});
	});

</script>
