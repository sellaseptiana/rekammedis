<style>
.text-danger {
    color: red;
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
										<h4 class="title"><strong>Tambah Data Rekam Medis Umum</strong></h4><br><br>
									</center>
									<form method="post" action="<?= base_url('Dokter/tambah_rekammedispasien') ?>">
									<input type="hidden" name="id_kunjungan" value="<?= $kunjungan['id_kunjungan'] ?>">
									<div class="card-body"> 
							<div class="form-group row">
                            <label class="col-sm-3 col-form-label"> No Rekam Medis</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_rekam_medis" class="form-control" value="<?= $kunjungan['no_rekam_medis'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Nama Pasien</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_pasien" class="form-control" value="<?= $kunjungan['nama_pasien'] ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Tanggal Kunjungan</label>
                            <div class="col-sm-9">
                                <input type="date" name="tanggal_kunjungan" class="form-control" value="<?= $kunjungan['tanggal_kunjungan'] ?>">
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Umur</label>
                            <div class="col-sm-9">
                                <input type="text" name="umur"  id="umur-pasien" class="form-control" value="<?= $kunjungan['umur'] ?>" readonly>
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <input type="text" name="jenis_kelamin"  id="jenis_kelamin" class="form-control" value="<?= $kunjungan['jenis_kelamin'] ?>" readonly>
                            </div>
                        </div>

   						
												
                        <div class="form-group row">
    <label for="jam_periksa" class="col-sm-3 col-form-label">Jam Periksa <span class="text-danger">*</span></label>
    <div class="col-sm-9">
        <input type="time" name="jam_periksa" class="form-control" id="jam_periksa">
    </div>
</div>

<label class="col-sm-12 col-form-label">
    <strong><center>SUBJECTIVE ANAMNESA</center></strong>
</label>

<div class="form-group row">
    <label for="keluhan_utama" class="col-sm-3 col-form-label">Keluhan Utama <span class="text-danger">*</span></label>
    <div class="col-sm-9">
        <textarea name="keluhan_utama" class="form-control" id="keluhan_utama"></textarea>
    </div>
</div>

												<div class="form-group row">
													<label for="keluhan_tambahan"
														class="col-sm-3 col-form-label"> Keluhan
														Tambahan</label>
													<div class="col-sm-9">
														<input type="text" name="keluhan_tambahan"
															value="<?= set_value('keluhan_tambahan'); ?>"
															class="form-control" id="keluhan_tambahan"
															placeholder="Masukkan Keluhan Tambahan">
														<?= form_error('keluhan_tambahan', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>
												<div class="form-group row">
													<label for="riwayat_penyakit_sekarang"
														class="col-sm-3 col-form-label"> Riwayat Penyakit
														Sekarang<span class="text-danger">*</span></label>
													<div class="col-sm-9">
														<input type="text" name="riwayat_penyakit_sekarang"
															value="<?= set_value('riwayat_penyakit_sekarang'); ?>"
															class="form-control" id="riwayat_penyakit_sekarang"
															placeholder="Masukkan Riwayat Penyakit Sekarang">
														<?= form_error('riwayat_penyakit_sekarang', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>
												<div class="form-group row">
    <label class="col-sm-3 col-form-label">Riwayat Penyakit Dahulu<span class="text-danger">*</span></label>
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
    <label class="col-sm-3 col-form-label">Riwayat Penyakit Keluarga<span class="text-danger">*</span></label>
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
													<label for="riwayat_alergi" class="col-sm-3 col-form-label"> Riwayat
													Alergi<span class="text-danger">*</span></label>
													<div class="col-sm-9">
														<input type="text" name="riwayat_alergi"
															value="<?= set_value('riwayat_alergi'); ?>"
															class="form-control" id="riwayat_alergi"
															placeholder="Masukkan Riwayat Alergi">
														<?= form_error('riwayat_alergi', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<div class="form-group row">
													<label for="tindakan_terapi"
														class="col-sm-3 col-form-label"> Tindakan
														Terapi<span class="text-danger">*</span></label>
													<div class="col-sm-9">
														<input type="text" name="tindakan_terapi"
															value="<?= set_value('tindakan_terapi'); ?>"
															class="form-control" id="tindakan_terapi"
															placeholder="Masukkan Tindakan Terapi">
														<?= form_error('tindakan_terapi', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<div class="form-group row">
													<label for="obat_sering_digunakan"
														class="col-sm-3 col-form-label"> Obat
														Sering Digunakan</label>
													<div class="col-sm-9">
														<input type="text" name="obat_sering_digunakan"
															value="<?= set_value('obat_sering_digunakan'); ?>"
															class="form-control" id="obat_sering_digunakan"
															placeholder="Masukkan Obat Sering Digunakan">
														<?= form_error('obat_sering_digunakan', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<div class="form-group row">
													<label for="obat_sering_konsumsi"
														class="col-sm-3 col-form-label"> Obat
														Sering Dikonsumsi</label>
													<div class="col-sm-9">
														<input type="text" name="obat_sering_konsumsi"
															value="<?= set_value('obat_sering_konsumsi'); ?>"
															class="form-control" id="obat_sering_konsumsi"
															placeholder="Masukkan Obat Sering Dikonsumsi">
														<?= form_error('obat_sering_konsumsi', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>
												<label class="col-sm-12 col-form-label"><strong><center> OBJECTIVE</center></strong></label>
												
												<div class="form-group row">
													<label for="keadaan_umum" class="col-sm-3 col-form-label"> Keadaan
													Umum<span class="text-danger">*</span></label>
													<div class="col-sm-9">
														<select name="keadaan_umum" class="form-control"
															id="keadaan_umum">
															<option value="">Pilih</option>
															<option value="Baik"
																<?= set_select('keadaan_umum', 'Baik'); ?>>
																Baik</option>
															<option value="Sedang"
																<?= set_select('keadaan_umum', 'Sedang'); ?>>Sedang
															</option>
															<option value="Lemah"
																<?= set_select('keadaan_umum', 'Lemah'); ?>>Lemah
															</option>
														</select>
														<?= form_error('keadaan_umum', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<div class="form-group row">
													<label for="kesadaran"
														class="col-sm-3 col-form-label"> Kesadaran
														</label>
													<div class="col-sm-9">
														<input type="text" name="kesadaran"
															value="<?= set_value('kesadaran'); ?>" class="form-control"
															id="kesadaran" placeholder="Masukkan Kesadaran">
														<?= form_error('kesadaran', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<div class="form-group row">
													<label for="tekanan_darah" class="col-sm-3 col-form-label"> Tekanan
													Darah<span class="text-danger">*</span>
													</label>
													<div class="col-sm-9">
														<input type="number" name="tekanan_darah"
															value="<?= set_value('tekanan_darah'); ?>"
															class="form-control" id="tekanan_darah"
															placeholder="Masukkan Tekanan Darah">
														<?= form_error('tekanan_darah', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>
												<div class="form-group row">
													<label for="nadi" class="col-sm-3 col-form-label"> Nadi
													</label>
													<div class="col-sm-9">
														<input type="number" name="nadi" value="<?= set_value('nadi'); ?>"
															class="form-control" id="nadi" placeholder="Masukkan Nadi">
														<?= form_error('nadi', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<div class="form-group row">
													<label for="frekuensi_napas"
														class="col-sm-3 col-form-label"> Frekuensi
														Pernapasan
														</label>
													<div class="col-sm-9">
														<input type="number" name="frekuensi_napas"
															value="<?= set_value('frekuensi_napas'); ?>"
															class="form-control" id="frekuensi_napas"
															placeholder="Masukkan Frekuensi Pernapasan">
														<?= form_error('frekuensi_napas', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<div class="form-group row">
													<label for="suhu" class="col-sm-3 col-form-label"> Suhu
													</label>
													<div class="col-sm-9">
														<input type="number" name="suhu" value="<?= set_value('suhu'); ?>"
															class="form-control" id="suhu" placeholder="Masukkan Suhu">
														<?= form_error('suhu', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<div class="form-group row">
													<label for="tinggi_badan" class="col-sm-3 col-form-label"> Tinggi
														Badan
														(cm)<span class="text-danger">*</span>
													</label>
													<div class="col-sm-9">
														<input type="number" name="tinggi_badan" class="form-control"
															id="tinggi_badan" placeholder="Masukkan Tinggi Badan">
													</div>
												</div>

												<div class="form-group row">
													<label for="berat_badan" class="col-sm-3 col-form-label"> Berat Badan
													(kg)<span class="text-danger">*</span></label>
													<div class="col-sm-9">
														<input type="number" name="berat_badan" class="form-control"
															id="berat_badan" placeholder="Masukkan Berat Badan">
													</div>
												</div>

												<div class="form-group row">
													<label for="imt" class="col-sm-3 col-form-label"> IMT
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
								
												<div id="above-17-form" style="display: none;">
            <div class="form-group row">
                <label for="pertanyaan1_1" class="col-sm-8 col-form-label"> Apakah pasien mengalami penurunan BB selama 6 bulan terakhir?</label>
                <div class="col-sm-4">
                    <div>
                        <input type="radio" id="pertanyaan1_1" name="pertanyaan1" value="0" <?= set_value('pertanyaan1') == '0' ? 'checked' : ''; ?>>
                        <label for="pertanyaan1_1">Tidak ada penurunan berat badan</label>
                    </div>
                    <div>
                        <input type="radio" id="pertanyaan1_2" name="pertanyaan1" value="2" <?= set_value('pertanyaan1') == '2' ? 'checked' : ''; ?>>
                        <label for="pertanyaan1_2">Tidak yakin</label>
                    </div>
                    <div>
                        <input type="radio" id="pertanyaan1_3" name="pertanyaan1" value="1" <?= set_value('pertanyaan1') == '1' ? 'checked' : ''; ?>>
                        <label for="pertanyaan1_3">Ya, BB turun:</label>
                    </div>
                    <div id="additional-options" style="<?= set_value('pertanyaan1') == '1' ? '' : 'display: none;'; ?>">
                        <div>
                            <input type="radio" id="data1" name="weight_loss" value="1" <?= set_value('weight_loss') == '1' ? 'checked' : ''; ?>>
                            <label for="data1">1 - 5 kg</label>
                        </div>
                        <div>
                            <input type="radio" id="data2" name="weight_loss" value="2" <?= set_value('weight_loss') == '2' ? 'checked' : ''; ?>>
                            <label for="data2">6 - 10 kg</label>
                        </div>
                        <div>
                            <input type="radio" id="data3" name="weight_loss" value="3" <?= set_value('weight_loss') == '3' ? 'checked' : ''; ?>>
                            <label for="data3">11 - 15 kg</label>
                        </div>
                        <div>
                            <input type="radio" id="data4" name="weight_loss" value="4" <?= set_value('weight_loss') == '4' ? 'checked' : ''; ?>>
                            <label for="data4">> 15 kg</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="pertanyaan2_1" class="col-sm-8 col-form-label"> Apakah asupan makanan berkurang karena tidak nafsu makan?</label>
                <div class="col-sm-4">
                    <div>
                        <input type="radio" id="pertanyaan2_1" name="pertanyaan2" value="0" <?= set_value('pertanyaan2') == '0' ? 'checked' : ''; ?>>
                        <label for="pertanyaan2_1">Tidak</label>
                    </div>
                    <div>
                        <input type="radio" id="pertanyaan2_2" name="pertanyaan2" value="1" <?= set_value('pertanyaan2') == '1' ? 'checked' : ''; ?>>
                        <label for="pertanyaan2_2">Ya</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="pertanyaan3_1" class="col-sm-8 col-form-label"> Apakah terdapat penyakit yang beresiko menyebabkan malnutrisi?</label>
                <div class="col-sm-4">
                    <div>
                        <input type="radio" id="pertanyaan3_1" name="pertanyaan3" value="0" <?= set_value('pertanyaan3') == '0' ? 'checked' : ''; ?>>
                        <label for="pertanyaan3_1">Tidak</label>
                    </div>
                    <div>
                        <input type="radio" id="pertanyaan3_2" name="pertanyaan3" value="1" <?= set_value('pertanyaan3') == '1' ? 'checked' : ''; ?>>
                        <label for="pertanyaan3_2">Ya</label>
                    </div>
                </div>
            </div>
        </div>

        <div id="below-17-form" style="display: none;">
            <div class="form-group row">
                <label for="pertanyaan4_1" class="col-sm-8 col-form-label"> Apakah pasien tampak kurus?</label>
                <div class="col-sm-4">
                    <div>
                        <input type="radio" id="pertanyaan4_1" name="pertanyaan4" value="0" <?= set_value('pertanyaan4') == '0' ? 'checked' : ''; ?>>
                        <label for="pertanyaan4_1">Tidak</label>
                    </div>
                    <div>
                        <input type="radio" id="pertanyaan4_2" name="pertanyaan4" value="1" <?= set_value('pertanyaan4') == '1' ? 'checked' : ''; ?>>
                        <label for="pertanyaan4_2">Ya</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="pertanyaan5_1" class="col-sm-8 col-form-label"> Apakah ada penurunan atau kenaikan BB selama 1 atau 3 bulan terakhir?</label>
                <div class="col-sm-4">
                    <div>
                        <input type="radio" id="pertanyaan5_1" name="pertanyaan5" value="0" <?= set_value('pertanyaan5') == '0' ? 'checked' : ''; ?>>
                        <label for="pertanyaan5_1">Tidak</label>
                    </div>
                    <div>
                        <input type="radio" id="pertanyaan5_2" name="pertanyaan5" value="1" <?= set_value('pertanyaan5') == '1' ? 'checked' : ''; ?>>
                        <label for="pertanyaan5_2">Ya</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="pertanyaan6_1" class="col-sm-8 col-form-label"> Apakah terdapat diare > 5 kali atau asupan berkurang selama 1 minggu terakhir?</label>
                <div class="col-sm-4">
                    <div>
                        <input type="radio" id="pertanyaan6_1" name="pertanyaan6" value="0" <?= set_value('pertanyaan6') == '0' ? 'checked' : ''; ?>>
                        <label for="pertanyaan6_1">Tidak</label>
                    </div>
                    <div>
                        <input type="radio" id="pertanyaan6_2" name="pertanyaan6" value="1" <?= set_value('pertanyaan6') == '1' ? 'checked' : ''; ?>>
                        <label for="pertanyaan6_2">Ya</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="pertanyaan7_1" class="col-sm-8 col-form-label">  Apakah terdapat penyakit yang beresiko menyebabkan malnutrisi?</label>
                <div class="col-sm-4">
                    <div>
                        <input type="radio" id="pertanyaan7_1" name="pertanyaan7" value="0" <?= set_value('pertanyaan7') == '0' ? 'checked' : ''; ?>>
                        <label for="pertanyaan7_1">Tidak</label>
                    </div>
                    <div>
                        <input type="radio" id="pertanyaan7_2" name="pertanyaan7" value="1" <?= set_value('pertanyaan7') == '1' ? 'checked' : ''; ?>>
                        <label for="pertanyaan7_2">Ya</label>
                    </div>
                </div>
            </div>
        </div>
        
<div class="form-group row">
    <label for="total_skor" class="col-sm-3 col-form-label"> Total Skor</label>
    <div class="col-sm-7">
        <input type="text" name="total_skor" value="<?= set_value('total_skor'); ?>"
               class="form-control form-control-user" id="total_skor"
               placeholder="Total Skor akan muncul disini" readonly>
        <?= form_error('total_skor', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="col-sm-2">
        <button type="button" id="hitung_skor_button" class="btn btn-primary float-right">Hasil</button><br>
    </div>
</div>
<div id="pesan_skor" class="form-group row" style="display: none;">
    <div class="col-sm-12">
        <div class="alert alert-warning" role="alert">
            Butuh penangan lebih lanjut oleh ahli gizi
        </div>
    </div>
</div>


												<!-- Kepala dan Leher -->
												<div class="form-group row">
													<label for="kepala_leher" class="col-sm-3 col-form-label"> Kepala / Leher</label>
													<div class="col-sm-9">
														<input type="text" name="kepala_leher"
															value="<?= set_value('kepala_leher'); ?>"
															class="form-control form-control-user" id="kepala_leher"
															placeholder="Masukkan Kepala dan Leher">
														<?= form_error('kepala_leher', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<!-- Thorax -->
												<div class="form-group row">
													<label for="thorax" class="col-sm-3 col-form-label"> Thorax</label>
													<div class="col-sm-9">
														<input type="text" name="thorax"
															value="<?= set_value('thorax'); ?>"
															class="form-control form-control-user" id="thorax"
															placeholder="Masukkan Thorax">
														<?= form_error('thorax', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<!-- Abdomen -->
												<div class="form-group row">
													<label for="abdomen" class="col-sm-3 col-form-label"> Abdomen</label>
													<div class="col-sm-9">
														<input type="text" name="abdomen"
															value="<?= set_value('abdomen'); ?>"
															class="form-control form-control-user" id="abdomen"
															placeholder="Masukkan Abdomen">
														<?= form_error('abdomen', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<!-- Ekstremitas -->
												<div class="form-group row">
													<label for="ekstremitas"
														class="col-sm-3 col-form-label"> Ekstremitas</label>
													<div class="col-sm-9">
														<input type="text" name="ekstremitas"
															value="<?= set_value('ekstremitas'); ?>"
															class="form-control form-control-user" id="ekstremitas"
															placeholder="Masukkan Ekstremitas">
														<?= form_error('ekstremitas', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>
												<div class="form-group row">
													<label for="lainnya" class="col-sm-3 col-form-label"> Lainnya</label>
													<div class="col-sm-9">
														<input type="text" name="lainnya"
															value="<?= set_value('lainnya'); ?>"
															class="form-control form-control-user" id="lainnya"
															placeholder="Masukkan Lainnya">
														<?= form_error('lainnya', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<!-- Status Mental -->
												<div class="form-group row">
													<label for="status_mental" class="col-sm-3 col-form-label"> Status Mental</label>
													<div class="col-sm-9">
														<select name="status_mental"
															class="form-control form-control-user" id="status_mental">
															<option value="">Pilih </option>
															<option value="Orientasi Baik"
																<?= set_select('status_mental', 'Orientasi Baik'); ?>>
																Orientasi
																Baik</option>
															<option value="Disorientasi"
																<?= set_select('status_mental', 'Disorientasi'); ?>>
																Disorientasi</option>
															<option value="Gelisah"
																<?= set_select('status_mental', 'Gelisah'); ?>>
																Gelisah
															</option>
															<option value="Tidak Respon"
																<?= set_select('status_mental', 'Tidak Respon'); ?>>
																Tidak Respon</option>
														</select>
														<?= form_error('status_mental', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<!-- Respons Emosi -->
												<div class="form-group row">
													<label for="respons_emosi" class="col-sm-3 col-form-label"> Respons Emosi</label>
													<div class="col-sm-9">
														<select name="respons_emosi"
															class="form-control form-control-user" id="respons_emosi">
															<option value="">Pilih </option>
															<option value="Tenang"
																<?= set_select('respons_emosi', 'Tenang'); ?>>
																Tenang
															</option>
															<option value="Takut"
																<?= set_select('respons_emosi', 'Takut'); ?>>
																Takut</option>
															<option value="Tegang"
																<?= set_select('respons_emosi', 'Tegang'); ?>>
																Tegang
															</option>
															<option value="Marah"
																<?= set_select('respons_emosi', 'Marah'); ?>>
																Marah</option>
															<option value="Sedih"
																<?= set_select('respons_emosi', 'Sedih'); ?>>
																Sedih</option>
															<option value="Menangis"
																<?= set_select('respons_emosi', 'Menangis'); ?>>
																Menangis
															</option>
															<option value="Gelisah"
																<?= set_select('respons_emosi', 'Gelisah'); ?>>
																Gelisah
															</option>
														</select>
														<?= form_error('respons_emosi', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<!-- Hubungan Pasien dengan Keluarga -->
												<div class="form-group row">
													<label for="hub_pasien_keluarga"
														class="col-sm-3 col-form-label">Hub Pasien dengan Keluarga</label>
													<div class="col-sm-9">
														<select name="hub_pasien_keluarga"
															class="form-control form-control-user"
															id="hub_pasien_keluarga">
															<option value="">Pilih </option>
															<option value="Baik"
																<?= set_select('hub_pasien_keluarga', 'Baik'); ?>>
																Baik
															</option>
															<option value="Tidak Baik"
																<?= set_select('hub_pasien_keluarga', 'Tidak Baik'); ?>>
																Tidak Baik</option>
														</select>
														<?= form_error('hub_pasien_keluarga', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<!-- Taat Ibadah -->
												<div class="form-group row">
													<label for="taat_ibadah" class="col-sm-3 col-form-label"> Taat Ibadah</label>
													<div class="col-sm-9">
														<select name="taat_ibadah"
															class="form-control form-control-user" id="taat_ibadah">
															<option value="">Pilih </option>
															<option value="Baik"
																<?= set_select('taat_ibadah', 'Baik'); ?>>
																Baik
															</option>
															<option value="Tidak Baik"
																<?= set_select('taat_ibadah', 'Tidak Baik'); ?>>
																Tidak
																Baik</option>
														</select>
														<?= form_error('taat_ibadah', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<!-- Bahasa -->
												<div class="form-group row">
													<label for="bahasa" class="col-sm-3 col-form-label"> Bahasa</label>
													<div class="col-sm-9">
													<select name="bahasa"
															class="form-control form-control-user" id="bahasa">
															<option value="">Pilih </option>
															<option value="Indonesia"
																<?= set_select('bahasa', 'Indonesia'); ?>>
																Indonesia
															</option>
															<option value="Daerah"
																<?= set_select('bahasa', 'Daerah'); ?>>
																Daerah</option>
														</select>	
													<?= form_error('bahasa', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<!-- Lab -->
												<div class="form-group row">
													<label for="lab" class="col-sm-3 col-form-label"> Lab<span class="text-danger">*</span></label>
													<div class="col-sm-9">
														<input type="text" name="lab" value="<?= set_value('lab'); ?>"
															class="form-control form-control-user" id="lab"
															placeholder="Masukkan Lab">
														<?= form_error('lab', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<!-- Pemeriksaan Lain -->
												<div class="form-group row">
													<label for="pemeriksaan_lain"
														class="col-sm-3 col-form-label"> Pemeriksaan Lain</label>
													<div class="col-sm-9">
														<input type="text" name="pemeriksaan_lain"
															value="<?= set_value('pemeriksaan_lain'); ?>"
															class="form-control form-control-user" id="pemeriksaan_lain"
															placeholder="Masukkan Pemeriksaan Lain">
														<?= form_error('pemeriksaan_lain', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>
												<label class="col-sm-12 col-form-label"><strong><center> ASSESMENT</center></label>

												<!-- Diagnosa Medis -->
												<div class="form-group row">
													<label for="diagnosa_medis" class="col-sm-3 col-form-label"> Diagnosa Medis <span class="text-danger">*</span></label>
													<div class="col-sm-9">
														<input type="text" name="diagnosa_medis"
															value="<?= set_value('diagnosa_medis'); ?>"
															class="form-control form-control-user" id="diagnosa_medis"
															placeholder="Masukkan Diagnosa Medis">
														<?= form_error('diagnosa_medis', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<!-- Diagnosa Keperawatan -->
												<div class="form-group row">
													<label for="diagnosa_keperawatan"
														class="col-sm-3 col-form-label"> Diagnosa Keperawatan</label>
													<div class="col-sm-9">
														<input type="text" name="diagnosa_keperawatan"
															value="<?= set_value('diagnosa_keperawatan'); ?>"
															class="form-control form-control-user"
															id="diagnosa_keperawatan"
															placeholder="Masukkan Diagnosa Keperawatan">
														<?= form_error('diagnosa_keperawatan', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>
												<label class="col-sm-12 col-form-label"><strong><center> PLANNING</center></strong></label>

												<!-- Rencana Pengobatan -->
												<div class="form-group row">
													<label for="rencana_pengobatan"
														class="col-sm-3 col-form-label"> Rencana Pengobatan</label>
													<div class="col-sm-9">
														<input type="text" name="rencana_pengobatan"
															value="<?= set_value('rencana_pengobatan'); ?>"
															class="form-control form-control-user"
															id="rencana_pengobatan"
															placeholder="Masukkan Rencana Pengobatan">
														<?= form_error('rencana_pengobatan', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>
												<!-- Rencana Edukasi -->
												<div class="form-group row">
													<label for="rencana_edukasi" class="col-sm-3 col-form-label"> Rencana
														Edukasi</label>
													<div class="col-sm-9">
														<input type="text" name="rencana_edukasi"
															value="<?= set_value('rencana_edukasi'); ?>"
															class="form-control form-control-user" id="rencana_edukasi"
															placeholder="Masukkan Rencana Edukasi">
														<?= form_error('rencana_edukasi', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<!-- Rencana Diagnostik -->
												<div class="form-group row">
													<label for="rencana_diagnostik"
														class="col-sm-3 col-form-label"> Rencana
														Diagnostik</label>
													<div class="col-sm-9">
														<input type="text" name="rencana_diagnostik"
															value="<?= set_value('rencana_diagnostik'); ?>"
															class="form-control form-control-user"
															id="rencana_diagnostik"
															placeholder="Masukkan Rencana Diagnostik">
														<?= form_error('rencana_diagnostik', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<!-- Rencana Monitoring Tanggal -->
												<div class="form-group row">
													<label for="rencana_mon_tgl" class="col-sm-3 col-form-label"> Rencana
														Monitoring
														</label>
													<div class="col-sm-9">
														<input type="date" name="rencana_mon_tgl"
															value="<?= set_value('rencana_mon_tgl'); ?>"
															class="form-control form-control-user" id="rencana_mon_tgl"
															placeholder="Masukkan Rencana Monitoring Tanggal">
														<?= form_error('rencana_mon_tgl', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<!-- Lainnya 1 -->
												<div class="form-group row">
													<label for="lainnya1" class="col-sm-3 col-form-label"> Lainnya
													</label>
													<div class="col-sm-9">
														<input type="text" name="lainnya1"
															value="<?= set_value('lainnya1'); ?>"
															class="form-control form-control-user" id="lainnya1"
															placeholder="Masukkan Lainnya 1">
														<?= form_error('lainnya1', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<!-- Rujuk RS -->
												<div class="form-group row">
													<label for="rujuk_rs" class="col-sm-3 col-form-label"> Rujuk
														RS</label>
													<div class="col-sm-9">
														<input type="text" name="rujuk_rs"
															value="<?= set_value('rujuk_rs'); ?>"
															class="form-control form-control-user" id="rujuk_rs"
															placeholder="Masukkan Rujuk RS">
														<?= form_error('rujuk_rs', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>
												<div class="form-group row">
    <label for="id_user" class="col-sm-3 col-form-label"> Nama Dokter<span class="text-danger">*</span></label>
    <div class="col-sm-9">
        <select name="id_user" class="form-control form-control-user" id="id_user">
            <option value="">Pilih Nama Dokter</option>
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
            <button type="button" class="btn btn-primary" onclick="addResep()">Tambah Resep </button>
        </div>
    </div>
    <div id="resep-container">
        <div class="resep-row">
		<div class="form-group row">
                <label for="id_obat" class="col-sm-3 col-form-label">Nama Obat</label>
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
                <label for="jenis_obat" class="col-sm-3 col-form-label">Jenis Obat</label>
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
                <label for="jumlah" class="col-sm-3 col-form-label"> Jumlah</label>
                <div class="col-sm-9">
                    <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah">
                </div>
            </div>
            <div class="form-group row">
                <label for="keterangan_resep" class="col-sm-3 col-form-label"> Keterangan (opsional)</label>
                <div class="col-sm-9">
                    <input type="text" name="keterangan_resep[]" class="form-control" placeholder="Keterangan (opsional)">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2 offset-sm-10">
                    <button type="button" class="btn btn-danger" onclick="removeResep(this)">Hapus</button>
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
                <label for="id_obat" class="col-sm-3 col-form-label">Nama Obat</label>
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
                <label for="jenis_obat" class="col-sm-3 col-form-label">Jenis Obat</label>
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
                <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                <div class="col-sm-9">
                    <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah">
                </div>
            </div>
            <div class="form-group row">
                <label for="keterangan_resep" class="col-sm-3 col-form-label">Keterangan (opsional)</label>
                <div class="col-sm-9">
                    <input type="text" name="keterangan_resep[]" class="form-control" placeholder="Keterangan (opsional)">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-9 offset-sm-3">
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
	<script>
    document.addEventListener('DOMContentLoaded', function() {
        var umur = document.getElementById('umur-pasien').value;
        var above17Form = document.getElementById('above-17-form');
        var below17Form = document.getElementById('below-17-form');
        
        if (umur > 17) {
            above17Form.style.display = 'block';
        } else {
            below17Form.style.display = 'block';
        }
        
        var additionalOptions = document.getElementById('additional-options');
        var pertanyaan1_1 = document.getElementById('pertanyaan1_1');
        var pertanyaan1_2 = document.getElementById('pertanyaan1_2');
        var pertanyaan1_3 = document.getElementById('pertanyaan1_3');
        
        pertanyaan1_3.addEventListener('change', function() {
            if (pertanyaan1_3.checked) {
                additionalOptions.style.display = 'block';
            }
        });
        
        pertanyaan1_1.addEventListener('change', function() {
            if (pertanyaan1_1.checked) {
                additionalOptions.style.display = 'none';
            }
        });
        
        pertanyaan1_2.addEventListener('change', function() {
            if (pertanyaan1_2.checked) {
                additionalOptions.style.display = 'none';
            }
        });
    });
</script>

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

		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Function to toggle additional options based on pertanyaan1
    function toggleAdditionalOptions() {
        var answer = $('input[name="pertanyaan1"]:checked').val();

        if (answer == '1') {
            $('#additional-options').show();
        } else {
            $('#additional-options').hide();
        }
    }

    // Call the function when the page is loaded and when pertanyaan1 changes
    $(document).ready(function() {
        toggleAdditionalOptions();
        $('input[name="pertanyaan1"]').change(toggleAdditionalOptions);

        // Calculate total score
        $('#hitung_skor_button').click(function() {
            var total_skor = 0;

            // Pertanyaan 1
            var pertanyaan1 = $('input[name="pertanyaan1"]:checked').val();
            if (pertanyaan1 == '1') {
                var weight_loss = $('input[name="weight_loss"]:checked').val();
                if (weight_loss !== undefined) {
                    total_skor += parseInt(weight_loss);
                }
            } else if (pertanyaan1 == '2') {
                total_skor += 2;
            }

            // Pertanyaan 2
            var pertanyaan2 = $('input[name="pertanyaan2"]:checked').val();
            if (pertanyaan2 == '1') {
                total_skor += 1;
            }

            // Pertanyaan 4
            var pertanyaan4 = $('input[name="pertanyaan4"]:checked').val();
            if (pertanyaan4 == '1') {
                total_skor += 1;
            }

            // Pertanyaan 5
            var pertanyaan5 = $('input[name="pertanyaan5"]:checked').val();
            if (pertanyaan5 == '1') {
                total_skor += 1;
            }

            // Pertanyaan 6
            var pertanyaan6 = $('input[name="pertanyaan6"]:checked').val();
            if (pertanyaan6 == '1') {
                total_skor += 1;
            }

            // Update nilai total skor pada input
            $('#total_skor').val(total_skor);

            // Tampilkan/sembunyikan pesan berdasarkan total skor
            if (total_skor > 2) {
                $('#pesan_skor').show();
            } else {
                $('#pesan_skor').hide();
            }
        });
    });
</script>
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