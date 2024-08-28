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
	.text-danger {
    color: red;
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
										<h4 class="title"><strong>Tambah Data Rekam Medis Gigi</strong></h4><br><br>
									</center>
									<div class="container">
										<?php if ($this->session->flashdata('success')): ?>
										<p class="alert alert-success">
											<?php echo $this->session->flashdata('success'); ?></p>
										<?php endif; ?>

										<?php if ($this->session->flashdata('error')): ?>
										<p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?>
										</p>
										<?php endif; ?>

										<form action="" method="POST" enctype="multipart/form-data">
										<input type="hidden" name="id_kunjungan" value="<?= $kunjungan['id_kunjungan'] ?>">
											<div class="card-body">
											<div class="form-group row">
                            <label class="col-sm-3 col-form-label">No Rekam Medis</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_rekam_medis" class="form-control" value="<?= $kunjungan['no_rekam_medis'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Pasien</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_pasien" class="form-control" value="<?= $kunjungan['nama_pasien'] ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Kunjungan</label>
                            <div class="col-sm-9">
                                <input type="date" name="tanggal_kunjungan" class="form-control" value="<?= $kunjungan['tanggal_kunjungan'] ?>">
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-sm-3 col-form-label">Umur</label>
                            <div class="col-sm-9">
                                <input type="text" name="umur"  id="umur-pasien" class="form-control" value="<?= $kunjungan['umur'] ?>" readonly>
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <input type="text" name="jenis_kelamin"  id="jenis_kelamin" class="form-control" value="<?= $kunjungan['jenis_kelamin'] ?>" readonly>
                            </div>
                        </div>
						<label class="col-sm-12 col-form-label"><strong><center> SUBJECTIVE ANAMNESA</center></strong></label>

												<div class="form-group row">
													<label for="jam_periksa" class="col-sm-3 col-form-label">Jam
														Periksa<span class="text-danger">*</span></label>
													<div class="col-sm-9">
														<input type="time" name="jam_periksa" class="form-control"
															id="jam_periksa">
													</div>
												</div>
												<div class="form-group row">
													<label for="keluhan_utama" class="col-sm-3 col-form-label">Keluhan
														Utama<span class="text-danger">*</span></label>
													<div class="col-sm-9">
														<textarea name="keluhan_utama" class="form-control"
															id="keluhan_utama"></textarea>
													</div>
												</div>
													<!-- Keluhan Tambahan -->
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Keluhan Tambahan</label>
														<div class="col-sm-9">
															<input type="text" name="keluhan_tambahan"
																value="<?= set_value('keluhan_tambahan'); ?>"
																class="form-control form-control-user"
																id="keluhan_tambahan"
																placeholder="Masukkan Keluhan Tambahan">
															<?= form_error('keluhan_tambahan', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Riwayat Penyakit
															Sekarang<span class="text-danger">*</span></label>
														<div class="col-sm-9">
															<input type="text" name="riwayat_penyakit_sekarang"
																value="<?= set_value('riwayat_penyakit_sekarang'); ?>"
																class="form-control form-control-user"
																id="riwayat_penyakit_sekarang"
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
													<!-- Riwayat Alergi -->
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Riwayat Alergi<span class="text-danger">*</span></label>
														<div class="col-sm-9">
															<select name="riwayat_alergi"
																class="form-control form-control-user"
																id="riwayat_alergi">
																<option value="">Pilih Riwayat Alergi</option>
																<option value="Tidak Ada"
																	<?= set_select('riwayat_alergi', 'Tidak Ada'); ?>>
																	Tidak Ada</option>
																<option value="Alergi Obat"
																	<?= set_select('riwayat_alergi', 'Alergi Obat'); ?>>
																	Alergi Obat</option>
																<option value="Alergi Makanan"
																	<?= set_select('riwayat_alergi', 'Alergi Makanan'); ?>>
																	Alergi Makanan</option>
																
															</select>
															<?= form_error('riwayat_alergi', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>

													<!-- Tindakan Terapi -->
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Tindakan Terapi<span class="text-danger">*</span></label>
														<div class="col-sm-9">
															<input type="text" name="tindakan_terapi"
																value="<?= set_value('tindakan_terapi'); ?>"
																class="form-control form-control-user"
																id="tindakan_terapi"
																placeholder="Masukkan Tindakan Terapi">
															<?= form_error('tindakan_terapi', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Obat Sering
															Digunakan</label>
														<div class="col-sm-9">
															<input type="text" name="obat_sering_digunakan"
																value="<?= set_value('obat_sering_digunakan'); ?>"
																class="form-control form-control-user"
																id="obat_sering_digunakan"
																placeholder="Masukkan Obat Sering Digunakan">
															<?= form_error('obat_sering_digunakan', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>
													<!-- Obat Sering Dikonsumsi -->
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Obat Sering
															Dikonsumsi</label>
														<div class="col-sm-9">
															<input type="text" name="obat_sering_konsumsi"
																value="<?= set_value('obat_sering_konsumsi'); ?>"
																class="form-control form-control-user"
																id="obat_sering_konsumsi"
																placeholder="Masukkan Obat Sering Dikonsumsi">
															<?= form_error('obat_sering_konsumsi', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>
													<label class="col-sm-12 col-form-label"><strong><center> OBJECTIVE</center></strong></label>

													<!-- Tekanan Darah -->
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Tekanan Darah<span class="text-danger">*</span></label>
														<div class="col-sm-9">
															<input type="text" name="tekanan_darah"
																value="<?= set_value('tekanan_darah'); ?>"
																class="form-control form-control-user"
																id="tekanan_darah" placeholder="Masukkan Tekanan Darah">
															<?= form_error('tekanan_darah', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>
													<!-- Nadi -->
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Nadi</label>
														<div class="col-sm-9">
															<input type="text" name="nadi"
																value="<?= set_value('nadi'); ?>"
																class="form-control form-control-user" id="nadi"
																placeholder="Masukkan Nadi">
															<?= form_error('nadi', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>
													<!-- Suhu -->
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Suhu</label>
														<div class="col-sm-9">
															<input type="text" name="suhu"
																value="<?= set_value('suhu'); ?>"
																class="form-control form-control-user" id="suhu"
																placeholder="Masukkan Suhu">
															<?= form_error('suhu', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>
													<div class="form-group row">
    <label class="col-sm-3 col-form-label">Pilih Gigi<span class="text-danger">*</span></label>
    <div class="col-sm-9">
        <select name="id_odontogram[]" id="id_odontogram" class="form-control form-control-user" multiple>
            <?php foreach ($odontograms as $p) : ?>
                <option value="<?= $p['id_odontogram']; ?>"><?= $p['odontogram']; ?></option>
            <?php endforeach; ?>
        </select>
        <?= form_error('id_odontogram', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>
<div class="form-group row">
													<label for="lainnya" class="col-sm-3 col-form-label"> Detail </label>
													<div class="col-sm-9">
														<input type="text" name="lainnya"
															value="<?= set_value('lainnya'); ?>"
															class="form-control form-control-user" id="lainnya"
															placeholder="Masukkan Lainnya">
														<?= form_error('lainnya', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Occlusi<span class="text-danger">*</span></label>
														<div class="col-sm-9">
															<select name="occlusi"
																class="form-control form-control-user" id="occlusi">
																<option value="">Pilih Occlusi</option>
																<option value="Normal Bite"
																	<?= set_select('occlusi', 'Normal Bite'); ?>>Normal
																	Bite</option>
																<option value="Cross Bite"
																	<?= set_select('occlusi', 'Cross Bite'); ?>>Cross
																	Bite</option>
																<option value="Step Bite"
																	<?= set_select('occlusi', 'Step Bite'); ?>>Step Bite
																</option>
															</select>
															<?= form_error('occlusi', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Torus Palatines<span class="text-danger">*</span></label>
														<div class="col-sm-9">
															<select name="torus_palatines"
																class="form-control form-control-user"
																id="torus_palatines">
																<option value="">Pilih Torus Palatines</option>
																<option value="Tidak Ada"
																	<?= set_select('torus_palatines', 'Tidak Ada'); ?>>
																	Tidak Ada</option>
																<option value="Kecil"
																	<?= set_select('torus_palatines', 'Kecil'); ?>>Kecil
																</option>
																<option value="Sedang"
																	<?= set_select('torus_palatines', 'Sedang'); ?>>
																	Sedang</option>
																<option value="Besar"
																	<?= set_select('torus_palatines', 'Besar'); ?>>Besar
																</option>
																<option value="Multiple"
																	<?= set_select('torus_palatines', 'Multiple'); ?>>
																	Multiple</option>
															</select>
															<?= form_error('torus_palatines', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Torus
															Mandibularis<span class="text-danger">*</span></label>
														<div class="col-sm-9">
															<select name="torus_mandibularis"
																class="form-control form-control-user"
																id="torus_mandibularis">
																<option value="">Pilih Torus Mandibularis</option>
																<option value="Tidak Ada"
																	<?= set_select('torus_mandibularis', 'Tidak Ada'); ?>>
																	Tidak Ada</option>
																<option value="Sisi Kiri"
																	<?= set_select('torus_mandibularis', 'Sisi Kiri'); ?>>
																	Sisi Kiri</option>
																<option value="Sisi Kanan"
																	<?= set_select('torus_mandibularis', 'Sisi Kanan'); ?>>
																	Sisi Kanan</option>
																<option value="Kedua Sisi"
																	<?= set_select('torus_mandibularis', 'Kedua Sisi'); ?>>
																	Kedua Sisi</option>
															</select>
															<?= form_error('torus_mandibularis', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Palatum<span class="text-danger">*</span></label>
														<div class="col-sm-9">
															<select name="palatum"
																class="form-control form-control-user" id="palatum">
																<option value="">Pilih Palatum</option>
																<option value="Dalam"
																	<?= set_select('palatum', 'Dalam'); ?>>Dalam
																</option>
																<option value="Sedang"
																	<?= set_select('palatum', 'Sedang'); ?>>Sedang
																</option>
																<option value="Rendah"
																	<?= set_select('palatum', 'Rendah'); ?>>Rendah
																</option>
															</select>
															<?= form_error('palatum', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Diasterna<span class="text-danger">*</span></label>
														<div class="col-sm-9">
															<select name="diasterna"
																class="form-control form-control-user" id="diasterna">
																<option value="">Pilih Diasterna</option>
																<option value="Tidak"
																	<?= set_select('diasterna', 'Tidak'); ?>>Tidak
																</option>
																<option value="Ada"
																	<?= set_select('diasterna', 'Ada'); ?>>Ada</option>
															</select>
															<?= form_error('diasterna', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>
													<div id="diasternaDetail" class="form-group row"
														style="display: none;">
														<label class="col-sm-3 col-form-label">Detail Diasterna</label>
														<div class="col-sm-9">
															<input type="text" name="diasternaDetail"
																value="<?= set_value('diasternaDetail'); ?>"
																class="form-control form-control-user"
																id="diasternaDetail"
																placeholder="Masukkan Detail Diasterna">
															<?= form_error('diasternaDetail', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>

													<script>
														$(document).ready(function () {
															$('#diasterna').on('change', function () {
																var selectedOption = $(this).val();
																if (selectedOption === 'Ada') {
																	$('#diasternaDetail').show();
																} else {
																	$('#diasternaDetail').hide();
																}
															});
														});

													</script>


													<div id="gigiAnomalyOption" class="form-group row">
														<label class="col-sm-3 col-form-label">Gigi Anomaly</label>
														<div class="col-sm-9">
															<select name="gigi_anomaly"
																class="form-control form-control-user"
																id="gigi_anomaly">
																<option value="">Pilih Gigi Anomaly</option>
																<option value="Tidak Ada"
																	<?= set_select('gigi_anomaly', 'Tidak Ada'); ?>>
																	Tidak Ada</option>
																<option value="Ada"
																	<?= set_select('gigi_anomaly', 'Ada'); ?>>Ada
																</option>
															</select>
															<?= form_error('gigi_anomaly', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>

													<div id="gigiAnomalyDetail" class="form-group row"
														style="display: none;">
														<label class="col-sm-3 col-form-label">Detail Gigi
															Anomaly</label>
														<div class="col-sm-9">
															<input type="text" name="gigi_anomaly_detail"
																value="<?= set_value('gigi_anomaly_detail'); ?>"
																class="form-control form-control-user"
																id="gigi_anomaly_detail"
																placeholder="Masukkan Detail Gigi Anomaly">
															<?= form_error('gigi_anomaly_detail', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>

													<script>
														$(document).ready(function () {
															$('#gigi_anomaly').on('change', function () {
																var selectedOption = $(this).val();
																if (selectedOption === 'Ada') {
																	$('#gigiAnomalyDetail').show();
																} else {
																	$('#gigiAnomalyDetail').hide();
																}
															});
														});

													</script>
	<div class="form-group row">
													<label for="lab" class="col-sm-3 col-form-label"> Lab</label>
													<div class="col-sm-9">
														<input type="text" name="lab" value="<?= set_value('lab'); ?>"
															class="form-control form-control-user" id="lab"
															placeholder="Masukkan Lab">
														<?= form_error('lab', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>
													<!-- radiology -->
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Radiology</label>
														<div class="col-sm-9">
															<input type="text" name="radiology"
																value="<?= set_value('radiology'); ?>"
																class="form-control form-control-user" id="radiology"
																placeholder="Masukkan Radiology">
															<?= form_error('radiology', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>


													<!-- Lainnya 1 -->
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Lainnya</label>
														<div class="col-sm-9">
															<input type="text" name="lainnya1"
																value="<?= set_value('lainnya1'); ?>"
																class="form-control form-control-user" id="lainnya1"
																placeholder="Masukkan Lainnya 1">
															<?= form_error('lainnya1', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>
													<label class="col-sm-12 col-form-label"><strong><center> ASSESMENT</center></label>

													<!-- Diagnosa Medis -->
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Diagnosa Medis<span class="text-danger">*</span></label>
														<div class="col-sm-9">
															<input type="text" name="diagnosa_medis"
																value="<?= set_value('diagnosa_medis'); ?>"
																class="form-control form-control-user"
																id="diagnosa_medis"
																placeholder="Masukkan Diagnosa Medis">
															<?= form_error('diagnosa_medis', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>
													<label class="col-sm-12 col-form-label"><strong><center> PLANNING</center></strong></label>

													<!-- Rencana Pengobatan -->
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Rencana
															Pengobatan</label>
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
														<label class="col-sm-3 col-form-label">Rencana Edukasi</label>
														<div class="col-sm-9">
															<input type="text" name="rencana_edukasi"
																value="<?= set_value('rencana_edukasi'); ?>"
																class="form-control form-control-user"
																id="rencana_edukasi"
																placeholder="Masukkan Rencana Edukasi">
															<?= form_error('rencana_edukasi', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>

													<!-- Rencana Diagnostik -->
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Rencana
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
														<label class="col-sm-3 col-form-label">Rencana Monitoring
															</label>
														<div class="col-sm-9">
														<input type="date" name="rencana_mon_tgl"
															value="<?= set_value('rencana_mon_tgl'); ?>"
															class="form-control form-control-user" id="rencana_mon_tgl"
															placeholder="Masukkan Rencana Monitoring Tanggal">
														<?= form_error('rencana_mon_tgl', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>


													<!-- Rencana Layanan Terpadu -->
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Rencana Layanan
															Terpadu</label>
														<div class="col-sm-9">
															<input type="text" name="rencana_layanan_terpadu"
																value="<?= set_value('rencana_layanan_terpadu'); ?>"
																class="form-control form-control-user"
																id="rencana_layanan_terpadu"
																placeholder="Masukkan Rencana Layanan Terpadu">
															<?= form_error('rencana_layanan_terpadu', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>

													<!-- Rujuk RS -->
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Rujuk RS</label>
														<div class="col-sm-9">
															<input type="text" name="rujuk_rs"
																value="<?= set_value('rujuk_rs'); ?>"
																class="form-control form-control-user" id="rujuk_rs"
																placeholder="Masukkan Rujuk RS">
															<?= form_error('rujuk_rs', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>
													<div class="form-group row">
    <label for="id_user" class="col-sm-3 col-form-label">Nama Dokter<span class="text-danger">*</span></label>
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
