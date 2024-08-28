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
										<h4 class="title"><strong>Tambah Data Rekam Medis Anak(0-5 Tahun)</strong></h4><br><br>
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
                            <label class="col-sm-3 col-form-label"> Nama Ibu</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_ibu"  id="nama_ibu" class="form-control" value="<?= $kunjungan['nama_ibu'] ?>" readonly>
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Nama Ayah</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_ayah"  id="nama_ayah" class="form-control" value="<?= $kunjungan['nama_ayah'] ?>" readonly>
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Berat Lahir (gram)</label>
                            <div class="col-sm-9">
                                <input type="text" name="berat_lahir"  id="berat_lahir" class="form-control" value="<?= $kunjungan['berat_lahir'] ?>" readonly>
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Umur Ibu</label>
                            <div class="col-sm-9">
                                <input type="text" name="umur_ibu"  id="umur_ibu" class="form-control" value="<?= $kunjungan['umur_ibu'] ?>" readonly>
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Umur Ayah</label>
                            <div class="col-sm-9">
                                <input type="text" name="umur_ayah"  id="umur_ayah" class="form-control" value="<?= $kunjungan['umur_ayah'] ?>" readonly>
                            </div>
                        </div>
   						
												
												<div class="form-group row">
													<label for="jam_periksa" class="col-sm-3 col-form-label"> Jam
														Periksa</label>
													<div class="col-sm-9">
														<input type="time" name="jam_periksa" class="form-control"
															id="jam_periksa">
													</div>
												</div>
												<label class="col-sm-12 col-form-label"><strong><center> STATUS IMUNISASI</center></strong></label>
												<!-- <div class="form-group row">
													<label for="jenis_imunisasi" class="col-sm-3 col-form-label"> Jenis Imunisasi</label>
													<div class="col-sm-9">
														<select name="jenis_imunisasi" class="form-control"
															id="jenis_imunisasi">
															<option value="">Pilih</option>
															<option value="BCG"
																<?= set_select('jenis_imunisasi', 'BCG'); ?>>
																BCG</option>
															<option value="Pentabio"
																<?= set_select('jenis_imunisasi', 'Pentabio'); ?>> Pentabio
															</option>
															<option value="Polio"
																<?= set_select('jenis_imunisasi', 'Polio'); ?>>
																Polio</option>
															<option value="Campak"
																<?= set_select('jenis_imunisasi', 'Campak'); ?>> Campak
															</option>
															<option value="Hepatitis B"
																<?= set_select('jenis_imunisasi', 'Hepatitis B'); ?>> Hepatitis B
															</option>
														</select>
														<?= form_error('jenis_imunisasi', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div> -->
												<div class="form-group row">
    <label class="col-sm-3 col-form-label">Jenis Imunisasi</label>
    <div class="col-sm-9">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="jenis_imunisasi[]" value="BCG" id="bcg" <?= set_checkbox('jenis_imunisasi[]', 'BCG'); ?>>
                    <label class="form-check-label" for="bcg">BCG</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="jenis_imunisasi[]" value="Pentabio" id="pentabio" <?= set_checkbox('jenis_imunisasi[]', 'Pentabio'); ?>>
                    <label class="form-check-label" for="pentabio">Pentabio</label>
                </div>
				<div class="form-check">
                    <input class="form-check-input" type="checkbox" name="jenis_imunisasi[]" value="Hepatitis B" id="hepatitis_b" <?= set_checkbox('jenis_imunisasi[]', 'Hepatitis B'); ?>>
                    <label class="form-check-label" for="hepatitis_b">Hepatitis B</label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="jenis_imunisasi[]" value="Polio" id="polio" <?= set_checkbox('jenis_imunisasi[]', 'Polio'); ?>>
                    <label class="form-check-label" for="polio">Polio</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="jenis_imunisasi[]" value="Campak" id="campak" <?= set_checkbox('jenis_imunisasi[]', 'Campak'); ?>>
                    <label class="form-check-label" for="campak">Campak</label>
                </div>
            </div>
        </div>
        <?= form_error('jenis_imunisasi', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

												<div class="form-group row">
													<label for="tgl_imunisasi" class="col-sm-3 col-form-label"> Tanggal Imunisasi
													</label>
													<div class="col-sm-9">
														<input type="date" name="tgl_imunisasi" class="form-control"
															id="tgl_imunisasi">
													</div>
												</div>
												<!-- Bagian Status Imunisasi -->
		 <!-- <div class="form-group row">
												<label class="col-sm-12 col-form-label">Jenis Imunisasi</label>
</div> 
 
<div class="form-group row">
    <div class="col-sm-3">
        <input class="form-check-input" type="checkbox" name="imunisasi[]" value="BCG" id="bcg">
        <label for="bcg" class="form-check-label">&emsp;BCG</label>
    </div>
    <div class="col-sm-9">
        <input type="date" name="tanggal_imunisasi_bcg" class="form-control form-control-user mb-2" id="tanggal_imunisasi_bcg">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-3">
        <input class="form-check-input" type="checkbox" name="imunisasi[]" value="Pentabio" id="pentabio">
        <label for="pentabio" class="form-check-label">&emsp;Pentabio</label>
    </div>
    <div class="col-sm-9">
        <input type="date" name="tanggal_imunisasi_pentabio" class="form-control form-control-user mb-2" id="tanggal_imunisasi_pentabio">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-3">
        <input class="form-check-input" type="checkbox" name="imunisasi[]" value="Polio" id="polio">
        <label for="polio" class="form-check-label">&emsp;Polio</label>
    </div>
    <div class="col-sm-9">
        <input type="date" name="tanggal_imunisasi_polio" class="form-control form-control-user mb-2" id="tanggal_imunisasi_polio">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-3">
        <input class="form-check-input" type="checkbox" name="imunisasi[]" value="Campak" id="campak">
        <label for="campak" class="form-check-label">&emsp;Campak</label>
    </div>
    <div class="col-sm-9">
        <input type="date" name="tanggal_imunisasi_campak" class="form-control form-control-user mb-2" id="tanggal_imunisasi_campak">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-3">
        <input class="form-check-input" type="checkbox" name="imunisasi[]" value="Hepatitis B" id="hepatitis_b">
        <label for="hepatitis_b" class="form-check-label">&emsp;Hepatitis B</label>
    </div>
    <div class="col-sm-9">
        <input type="date" name="tanggal_imunisasi_hepatitis_b" class="form-control form-control-user mb-2" id="tanggal_imunisasi_hepatitis_b">
    </div>
</div> -->
<label class="col-sm-12 col-form-label"><strong><center>VITAMIN A DOSIS TINGGI</center></strong></label>
<div class="form-group row">
													<label for="tgl_vit_A" class="col-sm-3 col-form-label">Pemberian Vit A
														</label>
													<div class="col-sm-9">
														<input type="date" name="tgl_vit_A" class="form-control"
															id="tgl_vit_A">
													</div>
												</div>

												<label class="col-sm-12 col-form-label"><strong><center> DETEKSI DINI PERKEMBANGAN ANAK</center></strong></label>
												<div class="form-group row">
													<label for="motoric_kasar" class="col-sm-3 col-form-label">Motorik Kasar</label>
													<div class="col-sm-9">
														<select name="motoric_kasar" class="form-control"
															id="motoric_kasar">
															<option value="">Pilih</option>
															<option value="Normal"
																<?= set_select('motoric_kasar', 'Normal'); ?>>
																Normal</option>
															<option value="Tidak Normal"
																<?= set_select('motoric_kasar', 'Tidak Normal'); ?>>Tidak Normal
															</option>
														</select>
														<?= form_error('motoric_kasar', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>
												<div class="form-group row">
													<label for="motoric_halus" class="col-sm-3 col-form-label">Motorik Halus</label>
													<div class="col-sm-9">
														<select name="motoric_halus" class="form-control"
															id="motoric_halus	">
															<option value="">Pilih</option>
															<option value="Normal"
																<?= set_select('motoric_halus', 'Normal'); ?>>
																Normal</option>
															<option value="Tidak Normal"
																<?= set_select('motoric_halus', 'Tidak Normal'); ?>>Tidak Normal
															</option>
														</select>
														<?= form_error('motoric_halus', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>
												<div class="form-group row">
													<label for="gangguan_bicara" class="col-sm-3 col-form-label"> Gangguan Bicara</label>
													<div class="col-sm-9">
														<select name="gangguan_bicara" class="form-control"
															id="gangguan_bicara		">
															<option value="">Pilih</option>
															<option value="Normal"
																<?= set_select('gangguan_bicara', 'Normal'); ?>>
																Normal</option>
															<option value="Tidak Normal"
																<?= set_select('gangguan_bicara', 'Tidak Normal'); ?>>Tidak Normal
															</option>
														</select>
														<?= form_error('gangguan_bicara', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>
												<div class="form-group row">
													<label for="gangguan_sosialisasi" class="col-sm-3 col-form-label"> Gangguan Sosialisasi & Kemandirian</label>
													<div class="col-sm-9">
														<select name="gangguan_sosialisasi" class="form-control"
															id="gangguan_sosialisasi">
															<option value="">Pilih</option>
															<option value="Normal"
																<?= set_select('gangguan_sosialisasi', 'Normal'); ?>>
																Normal</option>
															<option value="Tidak Normal"
																<?= set_select('gangguan_sosialisasi', 'Tidak Normal'); ?>>Tidak Normal
															</option>
														</select>
														<?= form_error('gangguan_sosialisasi', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>
												<div class="form-group row">
													<label for="pendengaran" class="col-sm-3 col-form-label"> Pendengaran</label>
													<div class="col-sm-9">
														<select name="pendengaran" class="form-control"
															id="pendengaran">
															<option value="">Pilih</option>
															<option value="Normal"
																<?= set_select('pendengaran', 'Normal'); ?>>
																Normal</option>
															<option value="Tidak Normal"
																<?= set_select('pendengaran', 'Tidak Normal'); ?>>Tidak Normal
															</option>
														</select>
														<?= form_error('pendengaran', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>
												<div class="form-group row">
													<label for="penglihatan" class="col-sm-3 col-form-label"> Penglihatan</label>
													<div class="col-sm-9">
														<select name="penglihatan" class="form-control"
															id="penglihatan">
															<option value="">Pilih</option>
															<option value="Normal"
																<?= set_select('penglihatan', 'Normal'); ?>>
																Normal</option>
															<option value="Tidak Normal"
																<?= set_select('penglihatan', 'Tidak Normal'); ?>>Tidak Normal
															</option>
														</select>
														<?= form_error('penglihatan', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>
												<label class="col-sm-12 col-form-label"><strong><center> SUBJECTIVE</center></strong></label>

												<div class="form-group row">
													<label for="keluhan_utama" class="col-sm-3 col-form-label"> 
													Keluhan
														Utama</label>
													<div class="col-sm-9">
														<textarea name="keluhan_utama" class="form-control"
															id="keluhan_utama"></textarea>
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
														Sekarang</label>
													<div class="col-sm-9">
														<input type="text" name="riwayat_penyakit_sekarang"
															value="<?= set_value('riwayat_penyakit_sekarang'); ?>"
															class="form-control" id="riwayat_penyakit_sekarang"
															placeholder="Masukkan Riwayat Penyakit Sekarang">
														<?= form_error('riwayat_penyakit_sekarang', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>
												<!-- <div class="form-group row">
    <label class="col-sm-3 col-form-label"> Riwayat Penyakit Dahulu</label>
    <div class="col-sm-9">
        <select name="riwayat_penyakit_dahulu[]" class="form-control form-control-user" id="riwayat_penyakit_dahulu" multiple>
        
            <option value="Tidak Ada"<?= set_select('riwayat_penyakit_dahulu[]', 'Tidak Ada'); ?>>Tidak Ada</option>
            <option value="Penyakit Jantung" <?= set_select('riwayat_penyakit_dahulu[]', 'Penyakit Jantung'); ?>>Penyakit Jantung</option>
            <option value="Diabetes Mellitus" <?= set_select('riwayat_penyakit_dahulu[]', 'Diabetes Mellitus'); ?>>Diabetes Mellitus</option>
            <option value="Haemophilia" <?= set_select('riwayat_penyakit_dahulu[]', 'Haemophilia'); ?>>Haemophilia</option>
            <option value="Hepatitis" <?= set_select('riwayat_penyakit_dahulu[]', 'Hepatitis'); ?>>Hepatitis</option>
            <option value="Gastritis" <?= set_select('riwayat_penyakit_dahulu[]', 'Gastritis'); ?>>Gastritis</option>
            <option value="Lainnya" <?= set_select('riwayat_penyakit_dahulu[]', 'Lainnya'); ?>>Lainnya</option>
        </select>
        <?= form_error('riwayat_penyakit_dahulu', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div id="lainnyaOption" class="form-group row" style="display: none;">
    <label class="col-sm-3 col-form-label"> Detail Lainnya</label>
    <div class="col-sm-9">
        <input type="text" name="riwayat_penyakit_dahulu_lainnya"
               value="<?= set_value('riwayat_penyakit_dahulu_lainnya'); ?>"
               class="form-control form-control-user" id="riwayat_penyakit_dahulu_lainnya"
               placeholder="Masukkan Detail Riwayat Penyakit Dahulu Lainnya">
        <?= form_error('riwayat_penyakit_dahulu_lainnya', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#riwayat_penyakit_dahulu').on('change', function() {
        var selectedOptions = $(this).val();
        if (selectedOptions && selectedOptions.includes('Lainnya')) {
            $('#lainnyaOption').show();
        } else {
            $('#lainnyaOption').hide();
        }
    });
});
</script> -->
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
													<label for="riwayat_alergi" class="col-sm-3 col-form-label"> Riwayat
													Alergi</label>
													<div class="col-sm-9">
														<input type="text" name="riwayat_alergi"
															value="<?= set_value('riwayat_alergi'); ?>"
															class="form-control" id="riwayat_alergi"
															placeholder="Masukkan Riwayat Alergi">
														<?= form_error('riwayat_alergi', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>
												<label class="col-sm-12 col-form-label"><strong><center> OBJECTIVE</center></strong></label>
												
												<div class="form-group row">
													<label for="keadaan_umum" class="col-sm-3 col-form-label"> Keadaan
													Umum</label>
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
													<label for="tekanan_darah" class="col-sm-3 col-form-label"> Tekanan
													Darah
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
													<label for="rr" class="col-sm-3 col-form-label"> Respiration Rate
													(x/menit)</label>
													<div class="col-sm-9">
														<input type="number" name="rr" class="form-control"
															id="rr" placeholder="Masukkan Laju Pernapasan (RR)">
													</div>
												</div>
												<div class="form-group row">
													<label for="lp" class="col-sm-3 col-form-label"> Lingkar Kepala (cm)</label>
													<div class="col-sm-9">
														<input type="number" name="lp" class="form-control"
															id="lp" placeholder="Masukkan Lingkar Kepala ">
													</div>
												</div>
												<div class="form-group row">
													<label for="tinggi_badan" class="col-sm-3 col-form-label"> Tinggi
														Badan
														(cm)
													</label>
													<div class="col-sm-9">
														<input type="number" name="tinggi_badan" class="form-control"
															id="tinggi_badan" placeholder="Masukkan Tinggi Badan">
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

												<label class="col-sm-12 col-form-label"><strong><center> ASSESMENT</center></label>

												<!-- Diagnosa Medis -->
												<div class="form-group row">
													<label for="diagnosa_medis" class="col-sm-3 col-form-label"> Diagnosa Medis</label>
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
												<div class="form-group row">
													<label for="rencana_mon_tgl" class="col-sm-3 col-form-label"> Rencana
														Asuhan Keperawatan
														</label>
													<div class="col-sm-9">
														<input type="text" name="rencana_asuhan_keperawatan"
															value="<?= set_value('rencana_asuhan_keperawatan'); ?>"
															class="form-control form-control-user" id="rencana_asuhan_keperawatan"
															placeholder="Masukkan Rencana Asuhan Keperawatan">
														<?= form_error('rencana_asuhan_keperawatan', '<small class="text-danger pl-3">', '</small>'); ?>
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
    <label for="id_user" class="col-sm-3 col-form-label"> Nama Dokter</label>
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