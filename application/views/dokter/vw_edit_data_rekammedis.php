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
										<h4 class="title"><strong>Update Data Rekam Medis</strong></h4><br>
									</center>

									<?= $this->session->flashdata('message') ?>
									<form method="POST" action="<?= base_url('Dokter/update_rekam_medis/' . $rekam_medis['id_rekam']) ?>" enctype="multipart/form-data">
									<input type="hidden" name="id_kunjungan" value="<?= $rekam_medis['id_kunjungan'] ?>">
<div class="card-body">
<div class="form-group row">
    <label class="col-sm-4 col-form-label"><strong>&emsp;No Rekam Medis</strong></label>
    <div class="col-sm-8">
        <input type="text" name="no_rekam_medis" class="form-control form-control-user" value="<?= $rekam_medis['no_rekam_medis'] ?>" readonly>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-4 col-form-label"><strong>&emsp;Nama Pasien</strong></label>
    <div class="col-sm-8">
        <input type="text" name="nama_pasien" class="form-control form-control-user" value="<?= $rekam_medis['nama_pasien'] ?>" readonly>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-4 col-form-label"><strong>&emsp;Tanggal Kunjungan</strong></label>
    <div class="col-sm-8">
        <input type="date" name="tanggal_kunjungan" class="form-control form-control-user" value="<?= $rekam_medis['tanggal_kunjungan'] ?>" readonly>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-4 col-form-label"><strong>&emsp;Umur</strong></label>
    <div class="col-sm-8">
        <input type="text" name="umur" id="umur-pasien" class="form-control form-control-user" value="<?= $rekam_medis['umur'] ?>" readonly>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-4 col-form-label"><strong>&emsp;Jenis Kelamin</strong></label>
    <div class="col-sm-8">
        <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-user" value="<?= $rekam_medis['jenis_kelamin'] ?>" readonly>
    </div>
</div>
										<div class="form-group row">
    <label class="col-sm-4 col-form-label"><strong>&emsp;Jam Periksa</strong>
    </label>
    <div class="col-sm-8 col-form-label">
        <input type="time" name="jam_periksa"
               class="form-control form-control-user" id="jam_periksa"
               value="<?= isset($rekam_medis['jam_periksa']) ? $rekam_medis['jam_periksa'] : ''; ?>">
        <?= form_error('jam_periksa', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>
<label class="col-sm-12 col-form-label"><strong><center> SUBJECTIVE ANAMNESA</center></strong></label>

									<!-- Keluhan Utama -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Keluhan Utama</strong>
											</label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="keluhan_utama"
													class="form-control form-control-user" id="keluhan_utama" :
													value="<?= isset($rekam_medis['keluhan_utama']) ? $rekam_medis['keluhan_utama'] : ''; ?>">
												<?= form_error('keluhan_utama', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Keluhan Tambahan -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;
													Keluhan
													Tambahan</strong>
											</label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="keluhan_tambahan"
													class="form-control form-control-user" id="keluhan_tambahan" :
													value="<?= isset($rekam_medis['keluhan_tambahan']) ? $rekam_medis['keluhan_tambahan'] : ''; ?> ">
												<?= form_error('keluhan_tambahan', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;
													Riwayat Penyakit
													Sekarang</strong>
											</label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="riwayat_penyakit_sekarang"
													class="form-control form-control-user"
													id="riwayat_penyakit_sekarang" :
													value="<?= isset($rekam_medis['riwayat_penyakit_sekarang']) ? $rekam_medis['riwayat_penyakit_sekarang'] : ''; ?> ">
												<?= form_error('riwayat_penyakit_sekarang', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Riwayat
													Penyakit
													Dahulu</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="riwayat_penyakit_dahulu"
													class="form-control form-control-user" id="riwayat_penyakit_dahulu"
													:
													value="<?= isset($rekam_medis['riwayat_penyakit_dahulu']) ? $rekam_medis['riwayat_penyakit_dahulu'] : ''; ?> ">
												<?= form_error('riwayat_penyakit_dahulu', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Riwayat Penyakit Keluarga -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Riwayat
													Penyakit
													Keluarga</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="riwayat_penyakit_keluarga"
													class="form-control form-control-user"
													id="riwayat_penyakit_keluarga" :
													value="<?= isset($rekam_medis['riwayat_penyakit_keluarga']) ? $rekam_medis['riwayat_penyakit_keluarga'] : ''; ?> ">
												<?= form_error('riwayat_penyakit_keluarga', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Riwayat Alergi -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Riwayat
													Alergi</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="riwayat_alergi"
													class="form-control form-control-user" id="riwayat_alergi" :
													value="<?= isset($rekam_medis['riwayat_alergi']) ? $rekam_medis['riwayat_alergi'] : ''; ?> ">
												<?= form_error('riwayat_alergi', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Tindakan Terapi -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Tindakan
													Terapi</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="tindakan_terapi"
													class="form-control form-control-user" id="tindakan_terapi" :
													value="<?= isset($rekam_medis['tindakan_terapi']) ? $rekam_medis['tindakan_terapi'] : ''; ?> ">
												<?= form_error('tindakan_terapi', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Obat
													Sering
													Digunakan</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="obat_sering_digunakan"
													class="form-control form-control-user" id="obat_sering_digunakan" :
													value="<?= isset($rekam_medis['obat_sering_digunakan']) ? $rekam_medis['obat_sering_digunakan'] : ''; ?> ">
												<?= form_error('obat_sering_digunakan', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Obat Sering Dikonsumsi -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Obat
													Sering
													Dikonsumsi</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="obat_sering_konsumsi"
													class="form-control form-control-user" id="obat_sering_konsumsi" :
													value="<?= isset($rekam_medis['obat_sering_konsumsi']) ? $rekam_medis['obat_sering_konsumsi'] : ''; ?> ">
												<?= form_error('obat_sering_konsumsi', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<label class="col-sm-12 col-form-label"><strong><center> OBJECTIVE</center></strong></label>

										<!-- Keadaan Umum -->
					
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Keadaan
											Umum</strong></label>
											<div class="col-sm-8 col-form-label">
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
												class="col-sm-4 col-form-label"><strong>&emsp;Kesadaran</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="kesadaran"
													class="form-control form-control-user" id="kesadaran" :
													value="<?= isset($rekam_medis['kesadaran']) ? $rekam_medis['kesadaran'] : ''; ?> ">
												<?= form_error('kesadaran', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Tekanan Darah -->
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
										<!-- Nadi -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Nadi</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="number" name="nadi" class="form-control form-control-user"
													id="nadi" :
													value="<?= isset($rekam_medis['nadi']) ? $rekam_medis['nadi'] : ''; ?> ">
												<?= form_error('nadi', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Suhu -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Suhu</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="number" name="suhu" class="form-control form-control-user"
													id="suhu" :
													value="<?= isset($rekam_medis['suhu']) ? $rekam_medis['suhu'] : ''; ?> ">
												<?= form_error('suhu', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>

										</div>
										<!-- Frekuensi Napas -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Frekuensi
													Napas</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="number" name="frekuensi_napas"
													class="form-control form-control-user" id="frekuensi_napas" :
													value="<?= isset($rekam_medis['frekuensi_napas']) ? $rekam_medis['frekuensi_napas'] : ''; ?> ">

												<?= form_error('frekuensi_napas', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Tinggi Badan -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Tinggi
													Badan</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="tinggi_badan"
													class="form-control form-control-user" id="tinggi_badan" :
													value="<?= isset($rekam_medis['tinggi_badan']) ? $rekam_medis['tinggi_badan'] : ''; ?> ">
												<?= form_error('tinggi_badan', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Berat Badan -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Berat
													Badan</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="number" name="berat_badan"
													class="form-control form-control-user" id="berat_badan" :
													value="<?= isset($rekam_medis['berat_badan']) ? $rekam_medis['berat_badan'] : ''; ?> ">
												<?= form_error('berat_badan', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- IMT -->
										<div class="form-group row">
											<label for="imt" class="col-sm-4 col-form-label"><strong>&emsp;IMT</strong></label>
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

										<div id="above-17-form" style="display: none;">
        <div class="form-group row">
            <label for="pertanyaan1" class="col-sm-8 col-form-label">Apakah pasien mengalami penurunan BB selama 6 bulan terakhir?</label>
            <div class="col-sm-4">
                <div>
                    <input type="radio" id="pertanyaan1_1" name="pertanyaan1" value="0" <?= isset($rekam_medis['pertanyaan1']) && $rekam_medis['pertanyaan1'] == '0' ? 'checked' : ''; ?>>
                    <label for="pertanyaan1_1">Tidak ada penurunan berat badan</label>
                </div>
                <div>
                    <input type="radio" id="pertanyaan1_2" name="pertanyaan1" value="2" <?= isset($rekam_medis['pertanyaan1']) && $rekam_medis['pertanyaan1'] == '2' ? 'checked' : ''; ?>>
                    <label for="pertanyaan1_2">Tidak yakin</label>
                </div>
                <div>
                    <input type="radio" id="pertanyaan1_3" name="pertanyaan1" value="1" <?= isset($rekam_medis['pertanyaan1']) && $rekam_medis['pertanyaan1'] == '1' ? 'checked' : ''; ?>>
                    <label for="pertanyaan1_3">Ya, BB turun:</label>
                </div>
                <div id="additional-options" style="<?= isset($rekam_medis['pertanyaan1']) && $rekam_medis['pertanyaan1'] == '1' ? '' : 'display: none;'; ?>">
                    <div>
                        <input type="radio" id="data1" name="weight_loss" value="1" <?= isset($rekam_medis['weight_loss']) && $rekam_medis['weight_loss'] == '1' ? 'checked' : ''; ?>>
                        <label for="data1">1 - 5 kg</label>
                    </div>
                    <div>
                        <input type="radio" id="data2" name="weight_loss" value="2" <?= isset($rekam_medis['weight_loss']) && $rekam_medis['weight_loss'] == '2' ? 'checked' : ''; ?>>
                        <label for="data2">6 - 10 kg</label>
                    </div>
                    <div>
                        <input type="radio" id="data3" name="weight_loss" value="3" <?= isset($rekam_medis['weight_loss']) && $rekam_medis['weight_loss'] == '3' ? 'checked' : ''; ?>>
                        <label for="data3">11 - 15 kg</label>
                    </div>
                    <div>
                        <input type="radio" id="data4" name="weight_loss" value="4" <?= isset($rekam_medis['weight_loss']) && $rekam_medis['weight_loss'] == '4' ? 'checked' : ''; ?>>
                        <label for="data4">> 15 kg</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="pertanyaan2" class="col-sm-8 col-form-label">Apakah asupan makanan berkurang karena tidak nafsu makan?</label>
            <div class="col-sm-4">
                <div>
                    <input type="radio" id="pertanyaan2_1" name="pertanyaan2" value="0" <?= isset($rekam_medis['pertanyaan2']) && $rekam_medis['pertanyaan2'] == '0' ? 'checked' : ''; ?>>
                    <label for="pertanyaan2_1">Tidak</label>
                </div>
                <div>
                    <input type="radio" id="pertanyaan2_2" name="pertanyaan2" value="1" <?= isset($rekam_medis['pertanyaan2']) && $rekam_medis['pertanyaan2'] == '1' ? 'checked' : ''; ?>>
                    <label for="pertanyaan2_2">Ya</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="pertanyaan3" class="col-sm-8 col-form-label">Apakah terdapat penyakit yang beresiko menyebabkan malnutrisi?</label>
            <div class="col-sm-4">
                <div>
                    <input type="radio" id="pertanyaan3_1" name="pertanyaan3" value="0" <?= isset($rekam_medis['pertanyaan3']) && $rekam_medis['pertanyaan3'] == '0' ? 'checked' : ''; ?>>
                    <label for="pertanyaan3_1">Tidak</label>
                </div>
                <div>
                    <input type="radio" id="pertanyaan3_2" name="pertanyaan3" value="1" <?= isset($rekam_medis['pertanyaan3']) && $rekam_medis['pertanyaan3'] == '1' ? 'checked' : ''; ?>>
                    <label for="pertanyaan3_2">Ya</label>
                </div>
            </div>
        </div>
    </div>

    <!-- Form for patients below 17 years old -->
    <div id="below-17-form" style="display: none;">
        <div class="form-group row">
            <label for="pertanyaan4" class="col-sm-8 col-form-label">Apakah pasien tampak kurus?</label>
            <div class="col-sm-4">
                <div>
                    <input type="radio" id="pertanyaan4_1" name="pertanyaan4" value="0" <?= isset($rekam_medis['pertanyaan4']) && $rekam_medis['pertanyaan4'] == '0' ? 'checked' : ''; ?>>
                    <label for="pertanyaan4_1">Tidak</label>
                </div>
                <div>
                    <input type="radio" id="pertanyaan4_2" name="pertanyaan4" value="1" <?= isset($rekam_medis['pertanyaan4']) && $rekam_medis['pertanyaan4'] == '1' ? 'checked' : ''; ?>>
                    <label for="pertanyaan4_2">Ya</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="pertanyaan5" class="col-sm-8 col-form-label">Apakah ada penurunan atau kenaikan BB selama 1 atau 3 bulan terakhir?</label>
            <div class="col-sm-4">
                <div>
                    <input type="radio" id="pertanyaan5_1" name="pertanyaan5" value="0" <?= isset($rekam_medis['pertanyaan5']) && $rekam_medis['pertanyaan5'] == '0' ? 'checked' : ''; ?>>
                    <label for="pertanyaan5_1">Tidak</label>
                </div>
                <div>
                    <input type="radio" id="pertanyaan5_2" name="pertanyaan5" value="1" <?= isset($rekam_medis['pertanyaan5']) && $rekam_medis['pertanyaan5'] == '1' ? 'checked' : ''; ?>>
                    <label for="pertanyaan5_2">Ya</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="pertanyaan6" class="col-sm-8 col-form-label">Apakah terdapat penyakit yang beresiko menyebabkan malnutrisi?</label>
            <div class="col-sm-4">
                <div>
                    <input type="radio" id="pertanyaan6_1" name="pertanyaan6" value="0" <?= isset($rekam_medis['pertanyaan6']) && $rekam_medis['pertanyaan6'] == '0' ? 'checked' : ''; ?>>
                    <label for="pertanyaan6_1">Tidak</label>
                </div>
                <div>
                    <input type="radio" id="pertanyaan6_2" name="pertanyaan6" value="1" <?= isset($rekam_medis['pertanyaan6']) && $rekam_medis['pertanyaan6'] == '1' ? 'checked' : ''; ?>>
                    <label for="pertanyaan6_2">Ya</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="pertanyaan7" class="col-sm-8 col-form-label">Apakah terdapat keluhan dari pasien?</label>
            <div class="col-sm-4">
                <div>
                    <input type="radio" id="pertanyaan7_1" name="pertanyaan7" value="0" <?= isset($rekam_medis['pertanyaan7']) && $rekam_medis['pertanyaan7'] == '0' ? 'checked' : ''; ?>>
                    <label for="pertanyaan7_1">Tidak</label>
                </div>
                <div>
                    <input type="radio" id="pertanyaan7_2" name="pertanyaan7" value="1" <?= isset($rekam_medis['pertanyaan7']) && $rekam_medis['pertanyaan7'] == '1' ? 'checked' : ''; ?>>
                    <label for="pertanyaan7_2">Ya</label>
                </div>
            </div>
        </div>
    </div>
	<div class="form-group row">
    <label for="total_skor" class="col-sm-4 col-form-label"><strong>&emsp; Total Skor</strong></label>
    <div class="col-sm-6">
        <input type="text" name="total_skor" value="<?= isset($rekam_medis['total_skor']) ? $rekam_medis['total_skor'] : ''; ?>"
               class="form-control form-control-user" id="total_skor"
               placeholder="Total Skor akan muncul disini" readonly>
        <?= form_error('total_skor', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="col-sm-2">
        <button type="button" id="hitung_skor_button" class="btn btn-primary float-right">Hasil</button><br>
    </div>
</div>
<div id="pesan_skor" class="form-group row" style="<?= isset($rekam_medis['total_skor']) && $rekam_medis['total_skor'] > 10 ? '' : 'display: none;'; ?>">
    <div class="col-sm-12">
        <div class="alert alert-warning" role="alert">
            Butuh penangan lebih lanjut oleh ahli gizi
        </div>
    </div>
</div>
										<!-- Kepala dan Leher -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Kepala
													dan
													Leher</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="kepala_leher"
													class="form-control form-control-user" id="kepala_leher" :
													value="<?= isset($rekam_medis['kepala_leher']) ? $rekam_medis['kepala_leher'] : ''; ?> ">
												<?= form_error('kepala_leher', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Thorax -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Thorax</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="thorax" class="form-control form-control-user"
													id="thorax" :
													value="<?= isset($rekam_medis['thorax']) ? $rekam_medis['thorax'] : ''; ?> ">
												<?= form_error('thorax', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Abdomen -->
										<div class="form-group row">
											<label
												class="col-sm-4 col-form-label"><strong>&emsp;Abdomen</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="abdomen" class="form-control form-control-user"
													id="abdomen" :
													value="<?= isset($rekam_medis['abdomen']) ? $rekam_medis['abdomen'] : ''; ?> ">
												<?= form_error('abdomen', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Ekstremitas -->
										<div class="form-group row">
											<label
												class="col-sm-4 col-form-label"><strong>&emsp;Ekstremitas</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="ekstremitas"
													class="form-control form-control-user" id="ekstremitas" :
													value="<?= isset($rekam_medis['ekstremitas']) ? $rekam_medis['ekstremitas'] : ''; ?> ">
												<?= form_error('ekstremitas', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
											<label
												class="col-sm-4 col-form-label"><strong>&emsp;Lainnya</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="lainnya" class="form-control form-control-user"
													id="lainnya" :
													value="<?= isset($rekam_medis['lainnya']) ? $rekam_medis['lainnya'] : ''; ?> ">
												<?= form_error('lainnya', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Status Mental -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Status
													Mental</strong></label>
											<div class="col-sm-8 col-form-label">
												<select name="status_mental" class="form-control form-control-user"
													id="status_mental">
													<option value="">Pilih</option>
													<option value="Orientasi Baik"
														<?= set_select('status_mental', 'Orientasi Baik', (isset($rekam_medis['status_mental']) && $rekam_medis['status_mental'] == 'Orientasi Baik')); ?>>
														Orientasi Baik</option>
													<option value="Disorientasi"
														<?= set_select('status_mental', 'Disorientasi', (isset($rekam_medis['status_mental']) && $rekam_medis['status_mental'] == 'Disorientasi')); ?>>
														Disorientasi</option>
													<option value="Gelisah"
														<?= set_select('status_mental', 'Gelisah', (isset($rekam_medis['status_mental']) && $rekam_medis['status_mental'] == 'Gelisah')); ?>>
														Gelisah</option>
													<option value="Tidak Respon"
														<?= set_select('status_mental', 'Tidak Respon', (isset($rekam_medis['status_mental']) && $rekam_medis['status_mental'] == 'Tidak Respon')); ?>>
														Tidak Respon</option>
												</select>
												<?= form_error('status_mental', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Respons Emosi -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Respons
													Emosi</strong></label>
											<div class="col-sm-8 col-form-label">
												<select name="respons_emosi" class="form-control form-control-user"
													id="respons_emosi">
													<option value="">Pilih</option>
													<option value="Tenang"
														<?= set_select('respons_emosi', 'Tenang', (isset($rekam_medis['respons_emosi']) && $rekam_medis['respons_emosi'] == 'Tenang')); ?>>
														Tenang</option>
													<option value="Takut"
														<?= set_select('respons_emosi', 'Takut', (isset($rekam_medis['respons_emosi']) && $rekam_medis['respons_emosi'] == 'Takut')); ?>>
														Takut</option>
													<option value="Tegang"
														<?= set_select('respons_emosi', 'Tegang', (isset($rekam_medis['respons_emosi']) && $rekam_medis['respons_emosi'] == 'Tegang')); ?>>
														Tegang</option>
													<option value="Marah"
														<?= set_select('respons_emosi', 'Marah', (isset($rekam_medis['respons_emosi']) && $rekam_medis['respons_emosi'] == 'Marah')); ?>>
														Marah</option>
													<option value="Sedih"
														<?= set_select('respons_emosi', 'Sedih', (isset($rekam_medis['respons_emosi']) && $rekam_medis['respons_emosi'] == 'Sedih')); ?>>
														Sedih</option>
													<option value="Menangis"
														<?= set_select('respons_emosi', 'Menangis', (isset($rekam_medis['respons_emosi']) && $rekam_medis['respons_emosi'] == 'Menangis')); ?>>
														Menangis</option>
													<option value="Gelisah"
														<?= set_select('respons_emosi', 'Gelisah', (isset($rekam_medis['respons_emosi']) && $rekam_medis['respons_emosi'] == 'Gelisah')); ?>>
														Gelisah</option>
												</select>
												<?= form_error('respons_emosi', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Hubungan Pasien dengan Keluarga -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Hubungan
													Pasien
													dengan
													Keluarga</strong></label>
											<div class="col-sm-8 col-form-label">
												<select name="hub_pasien_keluarga"
													class="form-control form-control-user" id="hub_pasien_keluarga">
													<option value="">Pilih</option>
													<option value="Baik"
														<?= set_select('hub_pasien_keluarga', 'Baik', (isset($rekam_medis['hub_pasien_keluarga']) && $rekam_medis['hub_pasien_keluarga'] == 'Baik')); ?>>
														Baik</option>
													<option value="Tidak Baik"
														<?= set_select('hub_pasien_keluarga', 'Tidak Baik', (isset($rekam_medis['hub_pasien_keluarga']) && $rekam_medis['hub_pasien_keluarga'] == 'Tidak Baik')); ?>>
														Tidak Baik</option>
												</select>
												</select>
												<?= form_error('hub_pasien_keluarga', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Taat Ibadah -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Taat
													Ibadah</strong></label>
											<div class="col-sm-8 col-form-label">
												<select name="taat_ibadah" class="form-control form-control-user"
													id="taat_ibadah">
													<option value="">Pilih</option>
													<option value="Baik"
														<?= set_select('taat_ibadah', 'Baik', (isset($rekam_medis['taat_ibadah']) && $rekam_medis['taat_ibadah'] == 'Baik')); ?>>
														Baik</option>
													<option value="Tidak Baik"
														<?= set_select('taat_ibadah', 'Tidak Baik', (isset($rekam_medis['taat_ibadah']) && $rekam_medis['taat_ibadah'] == 'Tidak Baik')); ?>>
														Tidak Baik</option>
												</select>
												<?= form_error('taat_ibadah', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Bahasa -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Bahasa</strong></label>
											<div class="col-sm-8 col-form-label">
											<select name="bahasa" class="form-control form-control-user" id="bahasa">
											<option value="">Pilih</option>
													<option value="Indonesia"
														<?= set_select('bahasa', 'Indonesia', (isset($rekam_medis['bahasa']) && $rekam_medis['bahasa'] == 'Indonesia')); ?>>
														Indonesia</option>
													<option value="Daerah"
														<?= set_select('bahasa', 'Daerah', (isset($rekam_medis['bahasa']) && $rekam_medis['bahasa'] == 'Daerah')); ?>>
														Daerah</option>
												</select>		<?= form_error('bahasa', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Lab -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Lab</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="lab" class="form-control form-control-user"
													id="lab" :
													value="<?= isset($rekam_medis['lab']) ? $rekam_medis['lab'] : ''; ?> ">
												<?= form_error('lab', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Pemeriksaan Lain -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Pemeriksaan
													Lain</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="pemeriksaan_lain"
													class="form-control form-control-user" id="pemeriksaan_lain" :
													value="<?= isset($rekam_medis['pemeriksaan_lain']) ? $rekam_medis['pemeriksaan_lain'] : ''; ?> ">
												<?= form_error('pemeriksaan_lain', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<label class="col-sm-12 col-form-label"><strong><center> ASSESMENT</center></label>

										<!-- Diagnosa Medis -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Diagnosa
													Medis</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="diagnosa_medis"
													class="form-control form-control-user" id="diagnosa_medis" :
													value="<?= isset($rekam_medis['diagnosa_medis']) ? $rekam_medis['diagnosa_medis'] : ''; ?> ">
												<?= form_error('diagnosa_medis', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Diagnosa Keperawatan -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Diagnosa
													Keperawatan</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="diagnosa_keperawatan"
													class="form-control form-control-user" id="diagnosa_keperawatan" :
													value="<?= isset($rekam_medis['diagnosa_keperawatan']) ? $rekam_medis['diagnosa_keperawatan'] : ''; ?> ">
												<?= form_error('diagnosa_keperawatan', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<label class="col-sm-12 col-form-label"><strong><center> PLANNING</center></strong></label>

										<!-- Rencana Pengobatan -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Rencana
													Pengobatan</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="rencana_pengobatan"
													class="form-control form-control-user" id="rencana_pengobatan" :
													value="<?= isset($rekam_medis['rencana_pengobatan']) ? $rekam_medis['rencana_pengobatan'] : ''; ?> ">
												<?= form_error('rencana_pengobatan', '<small class="text-danger pl-3">', '</small>'); ?>

											</div>
										</div>
										<!-- Rencana Edukasi -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Rencana
													Edukasi</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="rencana_edukasi"
													class="form-control form-control-user" id="rencana_edukasi" :
													value="<?= isset($rekam_medis['rencana_edukasi']) ? $rekam_medis['rencana_edukasi'] : ''; ?> ">
												<?= form_error('rencana_edukasi', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Rencana Diagnostik -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Rencana
													Diagnostik</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="rencana_diagnostik"
													class="form-control form-control-user" id="rencana_diagnostik" :
													value="<?= isset($rekam_medis['rencana_diagnostik']) ? $rekam_medis['rencana_diagnostik'] : ''; ?> ">
												<?= form_error('rencana_diagnostik', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Rencana Monitoring Tanggal -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Rencana
													Monitoring
													</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="date" name="rencana_mon_tgl" class="form-control form-control-user" 
													id="rencana_mon_tgl"
													value="<?= isset($rekam_medis['rencana_mon_tgl']) ? $rekam_medis['rencana_mon_tgl'] : ''; ?>">
												<?= form_error('rencana_mon_tgl', '<small class="text-danger pl-3">', '</small>'); ?>

											</div>
										</div>
										<!-- Lainnya 1 -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Lainnya
												</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="lainnya1"
													class="form-control form-control-user" id="lainnya1" :
													value="<?= isset($rekam_medis['lainnya1']) ? $rekam_medis['lainnya1'] : ''; ?> ">
												<?= form_error('lainnya1', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Rujuk RS -->
										<div class="form-group row">
    <label class="col-sm-4 col-form-label"><strong>&emsp;Rujuk RS</strong></label>
    <div class="col-sm-8 col-form-label">
        <input type="text" name="rujuk_rs" class="form-control form-control-user" id="rujuk_rs" value="<?= isset($rekam_medis['rujuk_rs']) ? $rekam_medis['rujuk_rs'] : ''; ?>">
        <?= form_error('rujuk_rs', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>
<div class="form-group row">
<!-- <input type="hidden" name="id_user" value="<?= $dokter['id_user']; ?>"> -->
    <label class="col-sm-4 col-form-label"><strong>&emsp;Nama Dokter</strong></label>
    <div class="col-sm-8 col-form-label">
        <select name="id_user" class="form-control form-control-user" id="id_user">
            <option value="">Pilih Nama Dokter</option>
            <?php foreach ($dokter as $d): ?>
                <option value="<?= $d['id_user']; ?>" <?= set_select('id_user', $d['id_user'], $d['id_user'] == $rekam_medis['id_user']); ?>><?= $d['nama']; ?></option>
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
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
	$(document).ready(function () {
		toggleAdditionalOptions();
		$('input[name="pertanyaan1"]').change(toggleAdditionalOptions);

		// Calculate total score
		$('#hitung_skor_button').click(function () {
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
