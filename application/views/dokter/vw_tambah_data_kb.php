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
										<h4 class="title"><strong>Tambah Data Rekam Medis KB</strong></h4><br><br>
									</center>
									<form method="post" action="<?= base_url('Dokter/tambah_rekammedispasien') ?>" enctype="multipart/form-data">
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
												<label class="col-sm-3 col-form-label">Nama Suami/Istri</label>
												<div class="col-sm-9">
													<input type="text" name="nama_suami" class="form-control"
														value="<?= $kunjungan['nama_suami'] ?>" readonly>
												</div>
											</div>
											
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Pendidikan Suami/Istri</label>
												<div class="col-sm-9">
													<input type="text" name="pendidikan_suami" id="pendidikan_suami"
														class="form-control"
														value="<?= $kunjungan['pendidikan_suami'] ?>" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Pekerjaan Suami/Istri</label>
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
												<label class="col-sm-3 col-form-label">Jumlah Anak Hidup</label>
												<div class="col-sm-9">
													<input type="text" name="jumlah_anak"
														value="<?= set_value('jumlah_anak'); ?>"
														class="form-control form-control-user" id="jumlah_anak"
														placeholder="Masukkan jumlah Anak">
													<?= form_error('jumlah_anak', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div id="anak_hidup_details" style="display: none;">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Jumlah Anak Laki-laki</label>
													<div class="col-sm-9">
														<input type="text" name="jumlah_anak_laki"
															value="<?= set_value('jumlah_anak_laki'); ?>"
															class="form-control form-control-user" id="jumlah_anak_laki"
															placeholder="Masukkan jumlah Anak Laki-laki">
														<?= form_error('jumlah_anak_laki', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Jumlah Anak Perempuan</label>
													<div class="col-sm-9">
														<input type="text" name="jumlah_anak_perempuan"
															value="<?= set_value('jumlah_anak_perempuan'); ?>"
															class="form-control form-control-user"
															id="jumlah_anak_perempuan"
															placeholder="Masukkan jumlah Anak Perempuan">
														<?= form_error('jumlah_anak_perempuan', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>
											</div>
											<script>
												$(document).ready(function () {
													$('#jumlah_anak').on('keyup', function () {
														var jumlahAnakHidup = $(this).val();
														if (jumlahAnakHidup > 0) {
															$('#anak_hidup_details').show();
														} else {
															$('#anak_hidup_details').hide();
														}
													});
												});

											</script>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Umur Anak Terkecil</label>
												<div class="col-sm-9">
													<input type="text" name="umur_anak_terkecil"
														value="<?= set_value('umur_anak_terkecil'); ?>"
														class="form-control form-control-user" id="umur_anak_terkecil"
														placeholder="Masukkan umur dalam format Tahun dan Bulan (misal: 3 Tahun 2 Bulan)">
													<?= form_error('umur_anak_terkecil', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Status Peserta KB</label>
												<div class="col-sm-9">
													<select name="status_kb" class="form-control form-control-user"
														id="status_kb">
														<option value="">Pilih</option>
														<option value="Pertama Kali"
															<?= set_select('status_kb', 'Pertama Kali'); ?>>Pertama Kali
														</option>
														<option value="Pernah pakai berhenti sesudah bersalin/keguguran"
															<?= set_select('status_kb', 'Pernah pakai berhenti sesudah bersalin/keguguran'); ?>>
															Pernah pakai berhenti sesudah bersalin/keguguran</option>
													</select>
													<?= form_error('status_kb', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Cara KB Terakhir</label>
												<div class="col-sm-9">
													<select name="cara_kb_terakhir"
														class="form-control form-control-user" id="cara_kb_terakhir">
														<option value="">Pilih</option>
														<option value="IUD"
															<?= set_select('cara_kb_terakhir', 'IUD'); ?>>IUD</option>
														<option value="MOW"
															<?= set_select('cara_kb_terakhir', 'MOW'); ?>>MOW</option>
														<option value="MOP"
															<?= set_select('cara_kb_terakhir', 'MOP'); ?>>MOP</option>
														<option value="Kondom"
															<?= set_select('cara_kb_terakhir', 'Kondom'); ?>>Kondom
														</option>
														<option value="Implant"
															<?= set_select('cara_kb_terakhir', 'Implant'); ?>>Implant
														</option>
														<option value="Suntikan"
															<?= set_select('cara_kb_terakhir', 'Suntikan'); ?>>Suntikan
														</option>
														<option value="Pil"
															<?= set_select('cara_kb_terakhir', 'Pil'); ?>>Pil</option>
													</select>
													<?= form_error('cara_kb_terakhir', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<label class="col-sm-12 col-form-label"><strong>
													<center> Ananmesa</center>
												</strong></label>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Haid Terakhir</label>
												<div class="col-sm-9">
													<input type="date" name="haid_terakhir"
														value="<?= set_value('haid_terakhir'); ?>"
														class="form-control form-control-user" id="haid_terakhir"
														placeholder="Masukkan Tanggal Haid terakhir">
													<?= form_error('haid_terakhir', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Hamil/Diduga Hamil</label>
												<div class="col-sm-9">
													<select name="kehamilan" class="form-control form-control-user"
														id="kehamilan">
														<option value="">Pilih</option>
														<option value="Ya" <?= set_select('kehamilan', 'Ya'); ?>>Ya
														</option>
														<option value="Tidak"
															<?= set_select('kehamilan', 'Tidak'); ?>>Tidak</option>
													</select>
													<?= form_error('kehamilan', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row"><label for="gravida"
													class="col-sm-3 col-form-label"> Jumlah GPA
												</label>
											</div>
											<div class="form-group row">
												<label for="gravida" class="col-sm-3 col-form-label"> Gravida(Kehamilan)
												</label>
												<div class="col-sm-9">
													<input type="number" name="gravida" class="form-control"
														id="gravida" placeholder="Masukkan Jumlah Gravida">
												</div>
											</div>
											<div class="form-group row">
												<label for="gravida" class="col-sm-3 col-form-label"> Partus(Persalinan)
												</label>
												<div class="col-sm-9">
													<input type="number" name="partus" class="form-control" id="partus"
														placeholder="Masukkan Jumlah Partus">
												</div>
											</div>
											<div class="form-group row">
												<label for="abotus" class="col-sm-3 col-form-label"> Abotus(Keguguran)
												</label>
												<div class="col-sm-9">
													<input type="number" name="abotus" class="form-control" id="abotus"
														placeholder="Masukkan Jumlah abotus">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Menyusui</label>
												<div class="col-sm-9">
													<select name="menyusui" class="form-control form-control-user"
														id="menyusui">
														<option value="">Pilih</option>
														<option value="Ya" <?= set_select('menyusui', 'Ya'); ?>>Ya
														</option>
														<option value="Tidak" <?= set_select('menyusui', 'Tidak'); ?>>
															Tidak</option>
													</select>
													<?= form_error('menyusui', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
    <label class="col-sm-3 col-form-label">Riwayat Penyakit Dahulu</label>
    <div class="col-sm-9">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="riwayat_penyakit_dahulu[]" value="Tidak Ada" id="tidak_ada" <?= set_checkbox('riwayat_penyakit_dahulu[]', 'Tidak Ada'); ?>>
                    <label class="form-check-label" for="tidak_ada">Tidak Ada</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="riwayat_penyakit_dahulu[]" value="Penyakit Jantung" id="penyakit_jantung" <?= set_checkbox('riwayat_penyakit_dahulu[]', 'Penyakit Jantung'); ?>>
                    <label class="form-check-label" for="penyakit_jantung">Penyakit Jantung</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="riwayat_penyakit_dahulu[]" value="Diabetes Mellitus" id="diabetes_mellitus" <?= set_checkbox('riwayat_penyakit_dahulu[]', 'Diabetes Mellitus'); ?>>
                    <label class="form-check-label" for="diabetes_mellitus">Diabetes Mellitus</label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="riwayat_penyakit_dahulu[]" value="Hepatitis" id="hepatitis" <?= set_checkbox('riwayat_penyakit_dahulu[]', 'Hepatitis'); ?>>
                    <label class="form-check-label" for="hepatitis">Hepatitis</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="riwayat_penyakit_dahulu[]" value="Gastritis" id="gastritis" <?= set_checkbox('riwayat_penyakit_dahulu[]', 'Gastritis'); ?>>
                    <label class="form-check-label" for="gastritis">Gastritis</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="riwayat_penyakit_dahulu[]" value="Lainnya" id="lainnya" <?= set_checkbox('riwayat_penyakit_dahulu[]', 'Lainnya'); ?>>
                    <label class="form-check-label" for="lainnya">Lainnya</label>
                </div>
            </div>
        </div>
        <?= form_error('riwayat_penyakit_dahulu', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div id="lainnyaOption" class="form-group row" style="display: none;">
    <label class="col-sm-3 col-form-label">Detail Penyakit Dahulu</label>
    <div class="col-sm-9">
        <input type="text" name="riwayat_penyakit_dahulu_lainnya" value="<?= set_value('riwayat_penyakit_dahulu_lainnya'); ?>" class="form-control form-control-user" id="riwayat_penyakit_dahulu_lainnya" placeholder="Masukkan Detail Riwayat Penyakit Dahulu Lainnya">
        <?= form_error('riwayat_penyakit_dahulu_lainnya', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<script>
$(document).ready(function() {
    $('input[type="checkbox"][value="Lainnya"]').on('change', function() {
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
    <label class="col-sm-3 col-form-label">Riwayat Penyakit Keluarga</label>
    <div class="col-sm-9">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="riwayat_penyakit_keluarga[]" value="Tidak Ada" id="tidak_ada" <?= set_checkbox('riwayat_penyakit_keluarga[]', 'Tidak Ada'); ?>>
                    <label class="form-check-label" for="tidak_ada">Tidak Ada</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="riwayat_penyakit_keluarga[]" value="Penyakit Jantung" id="penyakit_jantung" <?= set_checkbox('riwayat_penyakit_keluarga[]', 'Penyakit Jantung'); ?>>
                    <label class="form-check-label" for="penyakit_jantung">Penyakit Jantung</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="riwayat_penyakit_keluarga[]" value="Diabetes Mellitus" id="diabetes_mellitus" <?= set_checkbox('riwayat_penyakit_keluarga[]', 'Diabetes Mellitus'); ?>>
                    <label class="form-check-label" for="diabetes_mellitus">Diabetes Mellitus</label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="riwayat_penyakit_keluarga[]" value="Hepatitis" id="hepatitis" <?= set_checkbox('riwayat_penyakit_keluarga[]', 'Hepatitis'); ?>>
                    <label class="form-check-label" for="hepatitis">Hepatitis</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="riwayat_penyakit_keluarga[]" value="Gastritis" id="gastritis" <?= set_checkbox('riwayat_penyakit_keluarga[]', 'Gastritis'); ?>>
                    <label class="form-check-label" for="gastritis">Gastritis</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="riwayat_penyakit_keluarga[]" value="Lainnya1" id="lainnya1" <?= set_checkbox('riwayat_penyakit_keluarga[]', 'Lainnya'); ?>>
                    <label class="form-check-label" for="lainnya1">Lainnya</label>
                </div>
            </div>
        </div>
        <?= form_error('riwayat_penyakit_keluarga', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div id="lainnyaOption1" class="form-group row" style="display: none;">
    <label class="col-sm-3 col-form-label">Detail Penyakit Keluarga</label>
    <div class="col-sm-9">
        <input type="text" name="riwayat_penyakit_keluarga_lainnya" value="<?= set_value('riwayat_penyakit_keluarga_lainnya'); ?>" class="form-control form-control-user" id="riwayat_penyakit_keluarga_lainnya" placeholder="Masukkan Detail Riwayat Penyakit Keluarga Lainnya">
        <?= form_error('riwayat_penyakit_keluarga_lainnya', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<script>
$(document).ready(function() {
    $('input[type="checkbox"][value="Lainnya1"]').on('change', function() {
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
												<label class="col-sm-3 col-form-label">Riwayat Penyakit
													Sebelumnya</label>
												<div class="col-sm-9">
													<div class="row">
														<div class="col-sm-6">
															<div class="form-check">
																<input class="form-check-input" type="checkbox"
																	name="riwayat_penyakit[]" value="Tidak Ada"
																	id="tidak_ada"
																	<?= set_checkbox('riwayat_penyakit[]', 'Tidak Ada'); ?>>
																<label class="form-check-label" for="tidak_ada">Tidak
																	Ada</label>
															</div>
															<div class="form-check">
																<input class="form-check-input" type="checkbox"
																	name="riwayat_penyakit[]" value="Tidak Ada"
																	id="sakit_kuning"
																	<?= set_checkbox('riwayat_penyakit[]', 'Tidak Ada'); ?>>
																<label class="form-check-label" for="tidak_ada">Sakit
																	Kuning</label>
															</div>
															<div class="form-check">
																<input class="form-check-input" type="checkbox"
																	name="riwayat_penyakit[]"
																	value="Pendarahan Perviginam"
																	id="pendarahan_perviginam"
																	<?= set_checkbox('riwayat_penyakit[]', 'Pendarahan Perviginam'); ?>>
																<label class="form-check-label"
																	for="pendarahan_perviginam">Pendarahan
																	Perviginam</label>
															</div>
															<div class="form-check">
																<input class="form-check-input" type="checkbox"
																	name="riwayat_penyakit[]"
																	value="Keputihan yang Lama" id="keputihan"
																	<?= set_checkbox('riwayat_penyakit[]', 'Keputihan yang Lama'); ?>>
																<label class="form-check-label"
																	for="keputihan">Keputihan yang Lama</label>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-check">
																<input class="form-check-input" type="checkbox"
																	name="riwayat_penyakit[]" value="Tumor Payudara"
																	id="tumor_payudara"
																	<?= set_checkbox('riwayat_penyakit[]', 'Tumor Payudara'); ?>>
																<label class="form-check-label"
																	for="tumor_payudara">Tumor Payudara</label>
															</div>
															<div class="form-check">
																<input class="form-check-input" type="checkbox"
																	name="riwayat_penyakit[]" value="Tumor Rahim"
																	id="tumor_rahim"
																	<?= set_checkbox('riwayat_penyakit[]', 'Tumor Rahim'); ?>>
																<label class="form-check-label" for="tumor_rahim">Tumor
																	Rahim</label>
															</div>
															<div class="form-check">
																<input class="form-check-input" type="checkbox"
																	name="riwayat_penyakit[]" value="Tumor Indung Telur"
																	id="tumor_indung_telur"
																	<?= set_checkbox('riwayat_penyakit[]', 'Tumor Indung Telur'); ?>>
																<label class="form-check-label"
																	for="tumor_indung_telur">Tumor Indung Telur</label>
															</div>
														</div>
													</div>
													<?= form_error('riwayat_penyakit', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<label for class="col-sm-12 col-form-label"><u>Pemeriksaan</u></label>
											<div class="form-group row">
												<label for="keadaan_umum" class="col-sm-3 col-form-label"> Keadaan
													Umum</label>
												<div class="col-sm-9">
													<select name="keadaan_umum" class="form-control" id="keadaan_umum">
														<option value="">Pilih</option>
														<option value="Baik" <?= set_select('keadaan_umum', 'Baik'); ?>>
															Baik</option>
														<option value="Sedang"
															<?= set_select('keadaan_umum', 'Sedang'); ?>>Sedang
														</option>
														<option value="Kurang"
															<?= set_select('keadaan_umum', 'Kurang'); ?>>Kurang
														</option>
													</select>
													<?= form_error('keadaan_umum', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="berat_badan" class="col-sm-3 col-form-label"> Berat Badan
													(kg)</label>
												<div class="col-sm-9">
													<input type="number" name="berat_badan" class="form-control"
														id="berat_badan" placeholder="Masukkan Berat Badan">
												</div>
											</div>
											<div class="form-group row">
												<label for="tekanan_darah" class="col-sm-3 col-form-label"> Tekanan
													Darah
												</label>
												<div class="col-sm-9">
													<input type="number" name="tekanan_darah"
														value="<?= set_value('tekanan_darah'); ?>" class="form-control"
														id="tekanan_darah" placeholder="Masukkan Tekanan Darah">
													<?= form_error('tekanan_darah', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
    <label class="col-sm-3 col-form-label">Pemeriksaan Dalma</label>
    <div class="col-sm-9">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-check">
                    <input class="form-check-input dalma-checkbox" type="checkbox" name="dalma[]" value="Tidak Ada" id="tidak_ada" <?= set_checkbox('dalma[]', 'Tidak Ada'); ?>>
                    <label class="form-check-label" for="tidak_ada">Tidak Ada</label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-check">
                    <input class="form-check-input dalma-checkbox" type="checkbox" name="dalma[]" value="Tanda-Tanda Radang" id="tanda_tanda_radang" <?= set_checkbox('dalma[]', 'Tanda-Tanda Radang'); ?>>
                    <label class="form-check-label" for="tanda_tanda_radang">Tanda-Tanda Radang</label>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-check">
                    <input class="form-check-input dalma-checkbox" type="checkbox" name="dalma[]" value="Tumor/Keganasan Ginekologi" id="tumor_keganasan" <?= set_checkbox('dalma[]', 'Tumor/Keganasan Ginekologi'); ?>>
                    <label class="form-check-label" for="tumor_keganasan">Tumor/Keganasan Ginekologi</label>
                </div>
            </div>
        </div>
        <?= form_error('dalma', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Posisi Rahim</label>
												<div class="col-sm-9">
													<select name="posisi_rahim"
														class="form-control form-control-user" id="posisi_rahim">
														<option value="">Pilih</option>
														<option value="Retofleksi"
															<?= set_select('posisi_rahim', 'Retofleksi'); ?>>Retofleksi</option>
														<option value="Antefleksi"
															<?= set_select('posisi_rahim', 'Antefleksi'); ?>>Antefleksi</option>
													</select>
													<?= form_error('posisi_rahim', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Metode dan Jenis Alat
													Kontrasepsi</label>
												<div class="col-sm-9">
													<select name="jenis_kontrasepsi"
														class="form-control form-control-user" id="jenis_kontrasepsi">
														<option value="">Pilih</option>
														<option value="IUD"
															<?= set_select('jenis_kontrasepsi', 'IUD'); ?>>IUD</option>
														<option value="MOW"
															<?= set_select('jenis_kontrasepsi', 'MOW'); ?>>MOW</option>
														<option value="MOP"
															<?= set_select('jenis_kontrasepsi', 'MOP'); ?>>MOP</option>
														<option value="Kondom"
															<?= set_select('jenis_kontrasepsi', 'Kondom'); ?>>Kondom
														</option>
														<option value="Implant"
															<?= set_select('jenis_kontrasepsi', 'Implant'); ?>>Implant
														</option>
														<option value="Suntikan"
															<?= set_select('jenis_kontrasepsi', 'Suntikan'); ?>>
															Suntikan</option>
														<option value="Pil"
															<?= set_select('jenis_kontrasepsi', 'Pil'); ?>>Pil</option>
													</select>
													<?= form_error('jenis_kontrasepsi', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row" id="pemeriksaan_tambahan" style="display: none;">
    <label class="col-sm-3 col-form-label">Pemeriksaan Tambahan</label>
    <div class="col-sm-9">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-check">
                    <input class="form-check-input tambahan-checkbox" type="checkbox" name="tambahan[]" value="Tidak Ada" id="tidak_ada_tambahan" <?= set_checkbox('tambahan[]', 'Tidak Ada'); ?>>
                    <label class="form-check-label" for="tidak_ada_tambahan">Tidak Ada</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input tambahan-checkbox" type="checkbox" name="tambahan[]" value="Adanya Tanda Diabetes" id="diabetes" <?= set_checkbox('tambahan[]', 'Adanya Tanda Diabetes'); ?>>
                    <label class="form-check-label" for="diabetes">Adanya Tanda Diabetes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input tambahan-checkbox" type="checkbox" name="tambahan[]" value="Kelainan Pembekuan Darah" id="pembekuan_darah" <?= set_checkbox('tambahan[]', 'Kelainan Pembekuan Darah'); ?>>
                    <label class="form-check-label" for="pembekuan_darah">Kelainan Pembekuan Darah</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-check">
                    <input class="form-check-input tambahan-checkbox" type="checkbox" name="tambahan[]" value="Radang Orchitis/Epididymitis" id="radang_orchitis" <?= set_checkbox('tambahan[]', 'Radang Orchitis/Epididymitis'); ?>>
                    <label class="form-check-label" for="radang_orchitis">Radang Orchitis/Epididymitis</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input tambahan-checkbox" type="checkbox" name="tambahan[]" value="Tumor/Keganasan Ginekologi" id="ginekologi" <?= set_checkbox('tambahan[]', 'Tumor/Keganasan Ginekologi'); ?>>
                    <label class="form-check-label" for="ginekologi">Tumor/Keganasan Ginekologi</label>
                </div>
            </div>
        </div>
        <?= form_error('tambahan', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>
<div class="form-group row" id="rujuk_rs_group" style="display: none;">
    <label for="rujuk_rs" class="col-sm-3 col-form-label">Rujuk RS</label>
    <div class="col-sm-12">
        <input type="text" name="rujuk_rs" value="<?= set_value('rujuk_rs'); ?>" class="form-control form-control-user" id="rujuk_rs" placeholder="Masukkan Rujuk RS">
        <?= form_error('rujuk_rs', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>
<script>
    function toggleRujukRS() {
        var dalmaCheckboxes = document.querySelectorAll('.dalma-checkbox');
        var tambahanCheckboxes = document.querySelectorAll('.tambahan-checkbox');
        var rujukRsGroup = document.getElementById('rujuk_rs_group');
        var isChecked = false;

        dalmaCheckboxes.forEach(function(checkbox) {
            if (checkbox.checked && checkbox.value !== 'Tidak Ada') {
                isChecked = true;
            }
        });

        tambahanCheckboxes.forEach(function(checkbox) {
            if (checkbox.checked && checkbox.value !== 'Tidak Ada') {
                isChecked = true;
            }
        });

        if (isChecked) {
            rujukRsGroup.style.display = 'block';
        } else {
            rujukRsGroup.style.display = 'none';
        }
    }

    document.querySelectorAll('.dalma-checkbox, .tambahan-checkbox').forEach(function(checkbox) {
        checkbox.addEventListener('change', toggleRujukRS);
    });

    document.getElementById('jenis_kontrasepsi').addEventListener('change', function() {
        var pemeriksaanTambahan = document.getElementById('pemeriksaan_tambahan');
        if (this.value === 'MOP' || this.value === 'MOW') {
            pemeriksaanTambahan.style.display = 'block';
        } else {
            pemeriksaanTambahan.style.display = 'none';
        }
    });

    // Initialize visibility on page load
    toggleRujukRS();
</script>
<div class="form-group row">
											<label class="col-sm-3 col-form-label">Tanggal Pelayanan</label>
											
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Tanggal Dipesan Kembali</label>
											<div class="col-sm-9">
												<input type="date" name="tgl_pesan_kembali"
													value="<?= set_value('tgl_pesan_kembali'); ?>"
													class="form-control form-control-user" id="tgl_pesan_kembali"
													placeholder="Masukkan Tanggal Dipesan Kembali">
												<?= form_error('tgl_pesan_kembali', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row" id="tanggal_dicabut_group" style="display: none;">
    <label class="col-sm-3 col-form-label">Tanggal Dicabut</label>
    <div class="col-sm-12">
        <input type="date" name="tgl_cabut" value="<?= set_value('tgl_cabut'); ?>" class="form-control form-control-user" id="tgl_cabut" placeholder="Masukkan Tanggal Dicabut">
        <?= form_error('tgl_cabut', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<script>
    document.getElementById('metode_kontrasepsi').addEventListener('change', function() {
        var tanggalDicabutGroup = document.getElementById('tanggal_dicabut_group');
        var selectedValue = this.value;

        if (selectedValue === 'IUD' || selectedValue === 'Implant') {
            tanggalDicabutGroup.style.display = 'block';
        } else {
            tanggalDicabutGroup.style.display = 'none';
        }
    });
</script>
<div class="form-group row">
    <label for="id_user" class="col-sm-3 col-form-label"> Nama Dokter</label>
    <div class="col-sm-9">
        <select name="id_user" class="form-control form-control-user" id="id_user">
            <option value="">Pilih Nama Dokter/Bidan</option>
            <?php foreach ($dokter as $d): ?>
                <option value="<?= $d['id_user']; ?>" <?= set_select('id_user', $d['id_user']); ?>>
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
													<button type="button" class="btn btn-primary"
														onclick="addResep()">Tambah
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
														<label for="jumlah"
															class="col-sm-3 col-form-label">&emsp;Jumlah</label>
														<div class="col-sm-9">
															<input type="number" name="jumlah[]" class="form-control"
																placeholder="Jumlah">
														</div>
													</div>
													<div class="form-group row">
														<label for="keterangan_resep"
															class="col-sm-3 col-form-label">&emsp;Keterangan
															(opsional)</label>
														<div class="col-sm-9">
															<input type="text" name="keterangan_resep[]"
																class="form-control"
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
