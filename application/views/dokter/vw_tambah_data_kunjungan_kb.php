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
										<h4 class="title"><strong>Tambah Data Rekam Medis Kunjungan KB</strong></h4><br><br>
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
												<label class="col-sm-3 col-form-label">Nama Suami/Istri</label>
												<div class="col-sm-9">
													<input type="text" name="nama_suami" class="form-control"
														value="<?= $kunjungan['nama_suami'] ?>" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Umur Suami/Istri</label>
												<div class="col-sm-9">
													<input type="text" name="umur_suami" id="umur_suami"
														class="form-control" value="<?= $kunjungan['umur_suami'] ?>"
														readonly>
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
													<label for="berat_badan" class="col-sm-3 col-form-label"> Berat Badan
													(kg)</label>
													<div class="col-sm-9">
														<input type="number" name="bb" class="form-control"
															id="berat_badan" placeholder="Masukkan Berat Badan" required>
													</div>
												</div>
												
<div class="form-group row"><div class="form-group row">
    <label for="tekanan_darah" class="col-sm-3 col-form-label">Tekanan Darah</label>
    <div class="col-sm-9">
        <input type="text" name="tekanan_darah" class="form-control" id="tekanan_darah" placeholder="Masukkan Tekanan Darah">
    </div>
</div>

<div class="form-group row">
    <label for="komplikasi" class="col-sm-3 col-form-label">Komplikasi</label>
    <div class="col-sm-9">
        <input type="text" name="komplikasi" class="form-control" id="komplikasi" placeholder="Masukkan Komplikasi">
    </div>
</div>

<div class="form-group row">
    <label for="kegagalan" class="col-sm-3 col-form-label">Kegagalan</label>
    <div class="col-sm-9">
        <input type="text" name="kegagalan" class="form-control" id="kegagalan" placeholder="Masukkan Kegagalan">
    </div>
</div>

<div class="form-group row">
    <label for="pemeriksaan" class="col-sm-3 col-form-label">Pemeriksaan</label>
    <div class="col-sm-9">
        <input type="text" name="pemeriksaan" class="form-control" id="pemeriksaan" placeholder="Masukkan Pemeriksaan">
    </div>
</div>

											
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
