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
										<h4 class="title"><strong>Update Data Rekam Medis Kunjungan KB</strong></h4><br>
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
											<div class="form-group row">
												<label class="col-sm-4 col-form-label"><strong>&emsp; Umur
														Suami</strong></label>
												<div class="col-sm-12">
													<input type="text" name="umur_suami" id="umur_suami"
														class="form-control" value="<?= $rekam_medis['umur_suami'] ?>"
														readonly>
												</div>
											</div>

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
											<label class="col-sm-12 col-form-label"><strong><center>SUBJECTIF</center></strong></label>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Jumlah Anak Hidup</label>
    <div class="col-sm-9">
        <input type="text" name="jumlah_anak"
            value="<?= isset($rekam_medis['jumlah_anak']) ? $rekam_medis['jumlah_anak'] : ''; ?>"
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
                value="<?= isset($rekam_medis['jumlah_anak_laki']) ? $rekam_medis['jumlah_anak_laki'] : ''; ?>"
                class="form-control form-control-user" id="jumlah_anak_laki"
                placeholder="Masukkan jumlah Anak Laki-laki">
            <?= form_error('jumlah_anak_laki', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Jumlah Anak Perempuan</label>
        <div class="col-sm-9">
            <input type="text" name="jumlah_anak_perempuan"
                value="<?= isset($rekam_medis['jumlah_anak_perempuan']) ? $rekam_medis['jumlah_anak_perempuan'] : ''; ?>"
                class="form-control form-control-user" id="jumlah_anak_perempuan"
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

        // Initialize visibility based on pre-existing value
        if ($('#jumlah_anak').val() > 0) {
            $('#anak_hidup_details').show();
        }
    });
</script>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Umur Anak Terkecil</label>
    <div class="col-sm-9">
        <input type="text" name="umur_anak_terkecil"
            value="<?= isset($rekam_medis['umur_anak_terkecil']) ? $rekam_medis['umur_anak_terkecil'] : ''; ?>"
            class="form-control form-control-user" id="umur_anak_terkecil"
            placeholder="Masukkan umur dalam format Tahun dan Bulan (misal: 3 Tahun 2 Bulan)">
        <?= form_error('umur_anak_terkecil', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Status Peserta KB</label>
    <div class="col-sm-9">
        <select name="status_kb" class="form-control form-control-user" id="status_kb">
            <option value="">Pilih</option>
            <option value="Pertama Kali"
                <?= isset($rekam_medis['status_kb']) && $rekam_medis['status_kb'] == 'Pertama Kali' ? 'selected' : ''; ?>>
                Pertama Kali
            </option>
            <option value="Pernah pakai berhenti sesudah bersalin/keguguran"
                <?= isset($rekam_medis['status_kb']) && $rekam_medis['status_kb'] == 'Pernah pakai berhenti sesudah bersalin/keguguran' ? 'selected' : ''; ?>>
                Pernah pakai berhenti sesudah bersalin/keguguran
            </option>
        </select>
        <?= form_error('status_kb', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Cara KB Terakhir</label>
    <div class="col-sm-9">
        <select name="cara_kb_terakhir" class="form-control form-control-user" id="cara_kb_terakhir">
            <option value="">Pilih</option>
            <option value="IUD"
                <?= isset($rekam_medis['cara_kb_terakhir']) && $rekam_medis['cara_kb_terakhir'] == 'IUD' ? 'selected' : ''; ?>>
                IUD
            </option>
            <option value="MOW"
                <?= isset($rekam_medis['cara_kb_terakhir']) && $rekam_medis['cara_kb_terakhir'] == 'MOW' ? 'selected' : ''; ?>>
                MOW
            </option>
            <option value="MOP"
                <?= isset($rekam_medis['cara_kb_terakhir']) && $rekam_medis['cara_kb_terakhir'] == 'MOP' ? 'selected' : ''; ?>>
                MOP
            </option>
            <option value="Kondom"
                <?= isset($rekam_medis['cara_kb_terakhir']) && $rekam_medis['cara_kb_terakhir'] == 'Kondom' ? 'selected' : ''; ?>>
                Kondom
            </option>
            <option value="Implant"
                <?= isset($rekam_medis['cara_kb_terakhir']) && $rekam_medis['cara_kb_terakhir'] == 'Implant' ? 'selected' : ''; ?>>
                Implant
            </option>
            <option value="Suntikan"
                <?= isset($rekam_medis['cara_kb_terakhir']) && $rekam_medis['cara_kb_terakhir'] == 'Suntikan' ? 'selected' : ''; ?>>
                Suntikan
            </option>
            <option value="Pil"
                <?= isset($rekam_medis['cara_kb_terakhir']) && $rekam_medis['cara_kb_terakhir'] == 'Pil' ? 'selected' : ''; ?>>
                Pil
            </option>
        </select>
        <?= form_error('cara_kb_terakhir', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<label class="col-sm-12 col-form-label"><strong><center>ANAMNESA</center></strong></label>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Haid Terakhir</label>
    <div class="col-sm-9">
        <input type="date" name="haid_terakhir"
            value="<?= isset($rekam_medis['haid_terakhir']) ? $rekam_medis['haid_terakhir'] : ''; ?>"
            class="form-control form-control-user" id="haid_terakhir"
            placeholder="Masukkan Tanggal Haid terakhir">
        <?= form_error('haid_terakhir', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Hamil/Diduga Hamil</label>
    <div class="col-sm-9">
        <select name="kehamilan" class="form-control form-control-user" id="kehamilan">
            <option value="">Pilih</option>
            <option value="Ya" <?= isset($rekam_medis['kehamilan']) && $rekam_medis['kehamilan'] == 'Ya' ? 'selected' : ''; ?>>Ya
            </option>
            <option value="Tidak" <?= isset($rekam_medis['kehamilan']) && $rekam_medis['kehamilan'] == 'Tidak' ? 'selected' : ''; ?>>Tidak
            </option>
        </select>
        <?= form_error('kehamilan', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>
<div class="form-group row"><label for="gravida"
													class="col-sm-3 col-form-label"> Jumlah GPA
												</label>
											</div>
<div class="form-group row">
    <label for="gravida" class="col-sm-3 col-form-label">Gravida (Kehamilan)</label>
    <div class="col-sm-9">
        <input type="number" name="gravida" class="form-control" id="gravida" 
            value="<?= isset($rekam_medis['gravida']) ? $rekam_medis['gravida'] : ''; ?>" 
            placeholder="Masukkan Jumlah Gravida">
        <?= form_error('gravida', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div class="form-group row">
    <label for="partus" class="col-sm-3 col-form-label">Partus (Persalinan)</label>
    <div class="col-sm-9">
        <input type="number" name="partus" class="form-control" id="partus" 
            value="<?= isset($rekam_medis['partus']) ? $rekam_medis['partus'] : ''; ?>" 
            placeholder="Masukkan Jumlah Partus">
        <?= form_error('partus', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div class="form-group row">
    <label for="abotus" class="col-sm-3 col-form-label">Abotus (Keguguran)</label>
    <div class="col-sm-9">
        <input type="number" name="abotus" class="form-control" id="abotus" 
            value="<?= isset($rekam_medis['abotus']) ? $rekam_medis['abotus'] : ''; ?>" 
            placeholder="Masukkan Jumlah Abotus">
        <?= form_error('abotus', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Menyusui</label>
    <div class="col-sm-9">
        <select name="menyusui" class="form-control form-control-user" id="menyusui">
            <option value="">Pilih</option>
            <option value="Ya" <?= isset($rekam_medis['menyusui']) && $rekam_medis['menyusui'] == 'Ya' ? 'selected' : ''; ?>>Ya</option>
            <option value="Tidak" <?= isset($rekam_medis['menyusui']) && $rekam_medis['menyusui'] == 'Tidak' ? 'selected' : ''; ?>>Tidak</option>
        </select>
        <?= form_error('menyusui', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

										<div class="form-group row">
											<label class="col-sm-3 col-form-label">&emsp;Riwayat
												Penyakit
												Dahulu</label>
											<div class="col-sm-9">
												<input type="text" name="riwayat_penyakit_dahulu"
													class="form-control form-control-user" id="riwayat_penyakit_dahulu"
													:
													value="<?= isset($rekam_medis['riwayat_penyakit_dahulu']) ? $rekam_medis['riwayat_penyakit_dahulu'] : ''; ?> ">
												<?= form_error('riwayat_penyakit_dahulu', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Riwayat Penyakit Keluarga -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">&emsp;Riwayat
												Penyakit
												Keluarga</label>
											<div class="col-sm-9">
												<input type="text" name="riwayat_penyakit_keluarga"
													class="form-control form-control-user"
													id="riwayat_penyakit_keluarga" :
													value="<?= isset($rekam_medis['riwayat_penyakit_keluarga']) ? $rekam_medis['riwayat_penyakit_keluarga'] : ''; ?> ">
												<?= form_error('riwayat_penyakit_keluarga', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
    <label class="col-sm-3 col-form-label">Riwayat Penyakit Sebelumnya</label>
    <div class="col-sm-9">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="riwayat_penyakit[]" value="Tidak Ada" id="tidak_ada"
                        <?= isset($rekam_medis['riwayat_penyakit']) && in_array('Tidak Ada', $rekam_medis['riwayat_penyakit']) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="tidak_ada">Tidak Ada</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="riwayat_penyakit[]" value="Sakit Kuning" id="sakit_kuning"
                        <?= isset($rekam_medis['riwayat_penyakit']) && in_array('Sakit Kuning', $rekam_medis['riwayat_penyakit']) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="sakit_kuning">Sakit Kuning</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="riwayat_penyakit[]" value="Pendarahan Perviginam" id="pendarahan_perviginam"
                        <?= isset($rekam_medis['riwayat_penyakit']) && in_array('Pendarahan Perviginam', $rekam_medis['riwayat_penyakit']) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="pendarahan_perviginam">Pendarahan Perviginam</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="riwayat_penyakit[]" value="Keputihan yang Lama" id="keputihan"
                        <?= isset($rekam_medis['riwayat_penyakit']) && in_array('Keputihan yang Lama', $rekam_medis['riwayat_penyakit']) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="keputihan">Keputihan yang Lama</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="riwayat_penyakit[]" value="Tumor Payudara" id="tumor_payudara"
                        <?= isset($rekam_medis['riwayat_penyakit']) && in_array('Tumor Payudara', $rekam_medis['riwayat_penyakit']) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="tumor_payudara">Tumor Payudara</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="riwayat_penyakit[]" value="Tumor Rahim" id="tumor_rahim"
                        <?= isset($rekam_medis['riwayat_penyakit']) && in_array('Tumor Rahim', $rekam_medis['riwayat_penyakit']) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="tumor_rahim">Tumor Rahim</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="riwayat_penyakit[]" value="Tumor Indung Telur" id="tumor_indung_telur"
                        <?= isset($rekam_medis['riwayat_penyakit']) && in_array('Tumor Indung Telur', $rekam_medis['riwayat_penyakit']) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="tumor_indung_telur">Tumor Indung Telur</label>
                </div>
            </div>
        </div>
        <?= form_error('riwayat_penyakit[]', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>
									
										<label for class="col-sm-12 col-form-label"><u>Pemeriksaan</u></label>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Keadaan
											Umum</strong></label>
											<div class="col-sm-8">
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
										

<!-- Tekanan Darah -->
<div class="form-group row">
    <label class="col-sm-4 col-form-label">&emsp;Tekanan Darah</strong></label>
    <div class="col-sm-8">
        <input type="number" name="tekanan_darah"
               class="form-control form-control-user" id="tekanan_darah"
               value="<?= isset($rekam_medis['tekanan_darah']) ? $rekam_medis['tekanan_darah'] : ''; ?>">
        <?= form_error('tekanan_darah', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

										<!-- Berat Badan -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Berat
													Badan</label>
											<div class="col-sm-8">
												<input type="number" name="berat_badan"
													class="form-control form-control-user" id="berat_badan" :
													value="<?= isset($rekam_medis['berat_badan']) ? $rekam_medis['berat_badan'] : ''; ?> ">
												<?= form_error('berat_badan', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Tekanan
													Darah</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="number" name="tekanan_darah"
													class="form-control form-control-user" id="tekanan_darah" :
													value="<?= isset($rekam_medis['tekanan_darah']) ? $rekam_medis['tekanan_darah'] : ''; ?> ">
												<?= form_error('tekanan_darah', '<small class="text-danger pl-3">', '</small>'); ?>
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
                                        
										
										<label for class="col-sm-12 col-form-label"><u>Pemeriksaan</u></label>
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
												<div class="col-sm-12 offset-sm-4">
													<button type="button" class="btn btn-primary"
														onclick="addResep()">Tambah Resep</button>
												</div>
											</div>
											<div id="resep-container">
												<?php if (isset($resep_list) && !empty($resep_list)): ?>
												<?php foreach ($resep_list as $index => $resep): ?>
												<div class="resep-row">
													<input type="hidden" name="id_resep[]"
														value="<?= $resep->id_resep; ?>">
													<div class="form-group row">
														<label for="id_obat"
															class="col-sm-4 col-form-label"><strong>&emsp;Nama
																Obat</strong></label>
														<div class="col-sm-12">
															<select name="id_obat[]" class="form-control">
																<?php foreach ($obat_list as $obat): ?>
																<option value="<?= $obat->id_obat; ?>"
																	<?= ($obat->id_obat == $resep->id_obat) ? 'selected' : ''; ?>>
																	<?= $obat->nama_obat; ?></option>
																<?php endforeach; ?>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label for="jenis_obat"
															class="col-sm-4 col-form-label"><strong>&emsp;Jenis
																Obat</strong></label>
														<div class="col-sm-12">
															<select name="jenis_obat[]" class="form-control">
																<?php foreach ($obat_list as $obat): ?>
																<option value="<?= $obat->id_obat; ?>"
																	<?= ($obat->id_obat == $resep->id_obat) ? 'selected' : ''; ?>>
																	<?= $obat->jenis_obat; ?></option>
																<?php endforeach; ?>
															</select>
														</div>
													</div>

													<div class="form-group row">
														<label for="jumlah"
															class="col-sm-4 col-form-label"><strong>&emsp;Jumlah</strong></label>
														<div class="col-sm-12">
															<input type="number" name="jumlah[]" class="form-control"
																placeholder="Jumlah" value="<?= $resep->jumlah; ?>">
														</div>
													</div>
													<div class="form-group row">
														<label for="keterangan_resep"
															class="col-sm-4 col-form-label"><strong>&emsp;Keterangan</strong></label>
														<div class="col-sm-12">
															<input type="text" name="keterangan_resep[]"
																class="form-control" placeholder="Keterangan (opsional)"
																value="<?= $resep->keterangan_resep; ?>">
														</div>
													</div>
													<div class="form-group row">
														<div class="col-sm-12 offset-sm-3">
															<button type="button" class="btn btn-danger"
																onclick="removeResep(this)">Hapus</button>
														</div>
													</div>
												</div>
												<?php endforeach; ?>
												<?php else: ?>
												<div class="resep-row">
													<div class="form-group row">
														<label for="id_obat" class="col-sm-4 col-form-label">Nama
															Obat</label>
														<div class="col-sm-12">
															<select name="id_obat[]" class="form-control">
																<?php foreach ($obat_list as $obat): ?>
																<option value="<?= $obat->id_obat; ?>">
																	<?= $obat->nama_obat; ?></option>
																<?php endforeach; ?>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label for="jenis_obat" class="col-sm-4 col-form-label">Jenis
															Obat</label>
														<div class="col-sm-12">
															<select name="jenis_obat[]" class="form-control">
																<?php foreach ($obat_list as $obat): ?>
																<option value="<?= $obat->jenis_obat; ?>">
																	<?= $obat->jenis_obat; ?></option>
																<?php endforeach; ?>
															</select>
														</div>
													</div>

													<div class="form-group row">
														<label for="jumlah"
															class="col-sm-4 col-form-label">Jumlah</label>
														<div class="col-sm-12">
															<input type="number" name="jumlah[]" class="form-control"
																placeholder="Jumlah">
														</div>
													</div>
													<div class="form-group row">
														<label for="keterangan_resep"
															class="col-sm-4 col-form-label">Keterangan
															(opsional)</label>
														<div class="col-sm-12">
															<input type="text" name="keterangan_resep[]"
																class="form-control"
																placeholder="Keterangan (opsional)">
														</div>
													</div>
													<div class="form-group row">
														<div class="col-sm-12 offset-sm-3">
															<button type="button" class="btn btn-danger"
																onclick="removeResep(this)">Hapus</button>
														</div>
													</div>
												</div>
												<?php endif; ?>
											</div>
										</div>

										<div class="form-group row">
											<div class="col-sm-7 offset-sm-5">
												<button type="submit" class="btn btn-primary">Simpan</button>
											</div>
										</div>

										<script>
											function addResep() {
												const container = document.getElementById('resep-container');
												const row = document.createElement('div');
												row.className = 'resep-row';
												row.innerHTML = `
        <div class="form-group row">
            <label for="id_obat" class="col-sm-4 col-form-label">Nama Obat</label>
            <div class="col-sm-12">
                <select name="id_obat[]" class="form-control">
                    <?php foreach ($obat_list as $obat): ?>
                        <option value="<?= $obat->id_obat; ?>"><?= $obat->nama_obat; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="jenis_obat" class="col-sm-4 col-form-label">Jenis Obat</label>
            <div class="col-sm-12">
                <select name="jenis_obat[]" class="form-control">
                    <?php foreach ($obat_list as $obat): ?>
                        <option value="<?= $obat->jenis_obat; ?>"><?= $obat->jenis_obat; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
       
        <div class="form-group row">
            <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
            <div class="col-sm-12">
                <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah">
            </div>
        </div>
        <div class="form-group row">
            <label for="keterangan_resep" class="col-sm-4 col-form-label">Keterangan (opsional)</label>
            <div class="col-sm-12">
                <input type="text" name="keterangan_resep[]" class="form-control" placeholder="Keterangan (opsional)">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 offset-sm-3">
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
