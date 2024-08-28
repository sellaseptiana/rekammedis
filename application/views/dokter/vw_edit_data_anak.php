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
										<h4 class="title"><strong>Update Data Rekam Medis Anak(0-5 Tahun)</strong></h4><br>
									</center>

									<?= $this->session->flashdata('message') ?>
									<form method="POST" action="<?= base_url('Dokter/update_rekam_medis/' . $rekam_medis['id_rekam']) ?>" enctype="multipart/form-data">
									<input type="hidden" name="id_kunjungan" value="<?= $rekam_medis['id_kunjungan'] ?>">
<div class="card-body">
<div class="form-group row">
    <label class="col-sm-4 col-form-label"><strong>&emsp;No Rekam Medis</strong></label>
    <div class="col-sm-8 col-form-label">
        <input type="text" name="no_rekam_medis" class="form-control form-control-user" value="<?= $rekam_medis['no_rekam_medis'] ?>" readonly>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-4 col-form-label"><strong>&emsp;Nama Pasien</strong></label>
    <div class="col-sm-8 col-form-label">
        <input type="text" name="nama_pasien" class="form-control form-control-user" value="<?= $rekam_medis['nama_pasien'] ?>" readonly>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-4 col-form-label"><strong>&emsp;Tanggal Kunjungan</strong></label>
    <div class="col-sm-8 col-form-label">
        <input type="date" name="tanggal_kunjungan" class="form-control form-control-user" value="<?= $rekam_medis['tanggal_kunjungan'] ?>" readonly>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-4 col-form-label"><strong>&emsp;Umur</strong></label>
    <div class="col-sm-8 col-form-label">
        <input type="text" name="umur" id="umur-pasien" class="form-control form-control-user" value="<?= $rekam_medis['umur'] ?>" readonly>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-4 col-form-label"><strong>&emsp;Jenis Kelamin</strong></label>
    <div class="col-sm-8 col-form-label">
        <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-user" value="<?= $rekam_medis['jenis_kelamin'] ?>" readonly>
    </div>
</div>
<div class="form-group row">
                            <label class="col-sm-4 col-form-label"><strong>&emsp; Nama Ibu</strong></label>
                            <div class="col-sm-8 col-form-label col-form-label">
                                <input type="text" name="nama_ibu"  id="nama_ibu" class="form-control" value="<?= $rekam_medis['nama_ibu'] ?>" readonly>
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-sm-4 col-form-label"><strong>&emsp; Nama Ayah</strong></label>
                            <div class="col-sm-8 col-form-label col-form-label">
                                <input type="text" name="nama_ayah"  id="nama_ayah" class="form-control" value="<?= $rekam_medis['nama_ayah'] ?>" readonly>
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-sm-4 col-form-label"><strong>&emsp; Berat Lahir (gram)</strong></label>
                            <div class="col-sm-8 col-form-label col-form-label">
                                <input type="text" name="berat_lahir"  id="berat_lahir" class="form-control" value="<?= $rekam_medis['berat_lahir'] ?>" readonly>
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-sm-4 col-form-label"><strong>&emsp; Umur Ibu</strong></label>
                            <div class="col-sm-8 col-form-label col-form-label">
                                <input type="text" name="umur_ibu"  id="umur_ibu" class="form-control" value="<?= $rekam_medis['umur_ibu'] ?>" readonly>
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-sm-4 col-form-label"><strong>&emsp; Umur Ayah</strong></label>
                            <div class="col-sm-8 col-form-label col-form-label">
                                <input type="text" name="umur_ayah"  id="umur_ayah" class="form-control" value="<?= $rekam_medis['umur_ayah'] ?>" readonly>
                            </div>
                        </div>
										<div class="form-group row">
    <label class="col-sm-4 col-form-label"><strong>&emsp;Jam Periksa</strong>
    </label>
    <div class="col-sm-8 col-form-label col-form-label">
        <input type="time" name="jam_periksa"
               class="form-control form-control-user" id="jam_periksa"
               value="<?= isset($rekam_medis['jam_periksa']) ? $rekam_medis['jam_periksa'] : ''; ?>">
        <?= form_error('jam_periksa', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>
<label class="col-sm-12 col-form-label"><strong><center> STATUS IMUNISASI</center></strong></label>
<div class="form-group row">
    <label for="jenis_imunisasi" class="col-sm-4 col-form-label"><strong>&emsp;Jenis Imunisasi</strong></label>
    <div class="col-sm-8 col-form-label col-form-label">
        <select name="jenis_imunisasi" class="form-control" id="jenis_imunisasi">
            <option value="">Pilih</option>
            <option value="BCG" <?= set_select('jenis_imunisasi', 'BCG', (isset($rekam_medis['jenis_imunisasi']) && $rekam_medis['jenis_imunisasi'] == 'BCG')); ?>>BCG</option>
            <option value="Pentabio" <?= set_select('jenis_imunisasi', 'Pentabio', (isset($rekam_medis['jenis_imunisasi']) && $rekam_medis['jenis_imunisasi'] == 'Pentabio')); ?>>Pentabio</option>
            <option value="Polio" <?= set_select('jenis_imunisasi', 'Polio', (isset($rekam_medis['jenis_imunisasi']) && $rekam_medis['jenis_imunisasi'] == 'Polio')); ?>>Polio</option>
            <option value="Campak" <?= set_select('jenis_imunisasi', 'Campak', (isset($rekam_medis['jenis_imunisasi']) && $rekam_medis['jenis_imunisasi'] == 'Campak')); ?>>Campak</option>
            <option value="Hepatitis B" <?= set_select('jenis_imunisasi', 'Hepatitis B', (isset($rekam_medis['jenis_imunisasi']) && $rekam_medis['jenis_imunisasi'] == 'Hepatitis B')); ?>>Hepatitis B</option>
        </select>
        <?= form_error('jenis_imunisasi', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp; Tanggal Imunisasi
													</strong></label>
											<div class="col-sm-8 col-form-label col-form-label">
												<input type="date" name="tgl_imunisasi" class="form-control form-control-user" 
													id="tgl_imunisasi"
													value="<?= isset($rekam_medis['tgl_imunisasi']) ? $rekam_medis['tgl_imunisasi'] : ''; ?>">
												<?= form_error('tgl_imunisasi', '<small class="text-danger pl-3">', '</small>'); ?>

											</div>
										</div>

<label class="col-sm-12 col-form-label"><strong><center>VITAMIN A DOSIS TINGGI</center></strong></label>
<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Pemberian Vit A
													</strong></label>
											<div class="col-sm-8 col-form-label col-form-label">
												<input type="date" name="tgl_vit_A" class="form-control form-control-user" 
													id="tgl_vit_A"
													value="<?= isset($rekam_medis['tgl_vit_A']) ? $rekam_medis['tgl_vit_A'] : ''; ?>">
												<?= form_error('tgl_vit_A', '<small class="text-danger pl-3">', '</small>'); ?>

											</div>
										</div>

<label class="col-sm-12 col-form-label"><strong><center> DETEKSI DINI PERKEMBANGAN ANAK</center></strong></label>

<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Motorik Kasar</strong></label>
											<div class="col-sm-8 col-form-label col-form-label">
											<select name="motoric_kasar" class="form-control form-control-user" id="motoric_kasar">
											<option value="">Pilih</option>
													<option value="Normal"
														<?= set_select('motoric_kasar', 'Normal', (isset($rekam_medis['motoric_kasar']) && $rekam_medis['motoric_kasar'] == 'Normal')); ?>>
														Normal</option>
													<option value="Tidak Normal"
														<?= set_select('motoric_kasar', 'Tidak Normal', (isset($rekam_medis['motoric_kasar']) && $rekam_medis['motoric_kasar'] == 'Tidak Normal')); ?>>
														Sedang</option>
												</select>		<?= form_error('motoric_kasar', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Motorik Halus</strong></label>
											<div class="col-sm-8 col-form-label col-form-label">
											<select name="motoric_halus" class="form-control form-control-user" id="motoric_halus">
											<option value="">Pilih</option>
													<option value="Normal"
														<?= set_select('motoric_halus', 'Normal', (isset($rekam_medis['motoric_halus']) && $rekam_medis['motoric_halus'] == 'Normal')); ?>>
														Normal</option>
													<option value="Tidak Normal"
														<?= set_select('motoric_halus', 'Tidak Normal', (isset($rekam_medis['motoric_halus']) && $rekam_medis['motoric_halus'] == 'Tidak Normal')); ?>>
														Sedang</option>
												</select>		<?= form_error('motoric_halus', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Gangguan Bicara</strong></label>
											<div class="col-sm-8 col-form-label col-form-label">
											<select name="gangguan_bicara" class="form-control form-control-user" id="gangguan_bicara">
											<option value="">Pilih</option>
													<option value="Normal"
														<?= set_select('gangguan_bicara', 'Normal', (isset($rekam_medis['gangguan_bicara']) && $rekam_medis['gangguan_bicara'] == 'Normal')); ?>>
														Normal</option>
													<option value="Tidak Normal"
														<?= set_select('gangguan_bicara', 'Tidak Normal', (isset($rekam_medis['gangguan_bicara']) && $rekam_medis['gangguan_bicara'] == 'Tidak Normal')); ?>>
														Sedang</option>
												</select>		<?= form_error('gangguan_bicara', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Gangguan Sosialisasi & Kemandirian</strong></label>
											<div class="col-sm-8 col-form-label col-form-label">
											<select name="gangguan_sosialisasi" class="form-control form-control-user" id="gangguan_sosialisasi">
											<option value="">Pilih</option>
													<option value="Normal"
														<?= set_select('gangguan_sosialisasi', 'Normal', (isset($rekam_medis['gangguan_sosialisasi']) && $rekam_medis['gangguan_sosialisasi'] == 'Normal')); ?>>
														Normal</option>
													<option value="Tidak Normal"
														<?= set_select('gangguan_sosialisasi', 'Tidak Normal', (isset($rekam_medis['gangguan_sosialisasi']) && $rekam_medis['gangguan_sosialisasi'] == 'Tidak Normal')); ?>>
														Sedang</option>
												</select>		<?= form_error('gangguan_sosialisasi', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Pendengaran</strong></label>
											<div class="col-sm-8 col-form-label col-form-label">
											<select name="pendengaran" class="form-control form-control-user" id="pendengaran">
											<option value="">Pilih</option>
													<option value="Normal"
														<?= set_select('pendengaran', 'Normal', (isset($rekam_medis['pendengaran']) && $rekam_medis['pendengaran'] == 'Normal')); ?>>
														Normal</option>
													<option value="Tidak Normal"
														<?= set_select('pendengaran', 'Tidak Normal', (isset($rekam_medis['pendengaran']) && $rekam_medis['pendengaran'] == 'Tidak Normal')); ?>>
														Sedang</option>
												</select>		<?= form_error('pendengaran', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Penglihatan</strong></label>
											<div class="col-sm-8 col-form-label col-form-label">
											<select name="penglihatan" class="form-control form-control-user" id="penglihatan">
											<option value="">Pilih</option>
													<option value="Normal"
														<?= set_select('penglihatan', 'Normal', (isset($rekam_medis['penglihatan']) && $rekam_medis['penglihatan'] == 'Normal')); ?>>
														Normal</option>
													<option value="Tidak Normal"
														<?= set_select('penglihatan', 'Tidak Normal', (isset($rekam_medis['penglihatan']) && $rekam_medis['penglihatan'] == 'Tidak Normal')); ?>>
														Sedang</option>
												</select>		<?= form_error('penglihatan', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
<label class="col-sm-12 col-form-label"><strong><center> SUBJECTIVE</center></strong></label>

									<!-- Keluhan Utama -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Keluhan Utama</strong>
											</label>
											<div class="col-sm-8 col-form-label col-form-label">
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
											<div class="col-sm-8 col-form-label col-form-label">
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
											<div class="col-sm-8 col-form-label col-form-label">
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
											<div class="col-sm-8 col-form-label col-form-label">
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
											<div class="col-sm-8 col-form-label col-form-label">
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
											<div class="col-sm-8 col-form-label col-form-label">
												<input type="text" name="riwayat_alergi"
													class="form-control form-control-user" id="riwayat_alergi" :
													value="<?= isset($rekam_medis['riwayat_alergi']) ? $rekam_medis['riwayat_alergi'] : ''; ?> ">
												<?= form_error('riwayat_alergi', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<label class="col-sm-12 col-form-label"><strong><center> OBYEKTIF</center></strong></label>

										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Keadaan
											Umum</strong></label>
											<div class="col-sm-8 col-form-label col-form-label">
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
											<label class="col-sm-4 col-form-label"><strong>&emsp;Tekanan
													Darah</strong></label>
											<div class="col-sm-8 col-form-label col-form-label">
												<input type="text" name="tekanan_darah"
													class="form-control form-control-user" id="tekanan_darah" :
													value="<?= isset($rekam_medis['tekanan_darah']) ? $rekam_medis['tekanan_darah'] : ''; ?> ">
												<?= form_error('tekanan_darah', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Nadi -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Nadi</strong></label>
											<div class="col-sm-8 col-form-label col-form-label">
												<input type="text" name="nadi" class="form-control form-control-user"
													id="nadi" :
													value="<?= isset($rekam_medis['nadi']) ? $rekam_medis['nadi'] : ''; ?> ">
												<?= form_error('nadi', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Suhu -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Suhu</strong></label>
											<div class="col-sm-8 col-form-label col-form-label">
												<input type="text" name="suhu" class="form-control form-control-user"
													id="suhu" :
													value="<?= isset($rekam_medis['suhu']) ? $rekam_medis['suhu'] : ''; ?> ">
												<?= form_error('suhu', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>

										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Respiration Rate
											(x/menit)</strong></label>
											<div class="col-sm-8 col-form-label col-form-label">
												<input type="text" name="rr" class="form-control form-control-user"
													id="rr" :
													value="<?= isset($rekam_medis['rr']) ? $rekam_medis['rr'] : ''; ?> ">
												<?= form_error('rr', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
											</div>
											<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Lingkar Kepala (cm)</strong></label>
											<div class="col-sm-8 col-form-label col-form-label">
												<input type="text" name="lp" class="form-control form-control-user"
													id="lp" :
													value="<?= isset($rekam_medis['lp']) ? $rekam_medis['lp'] : ''; ?> ">
												<?= form_error('lp', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
											</div>
										<!-- Frekuensi Napas -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Frekuensi
													Napas</strong></label>
											<div class="col-sm-8 col-form-label col-form-label">
												<input type="text" name="frekuensi_napas"
													class="form-control form-control-user" id="frekuensi_napas" :
													value="<?= isset($rekam_medis['frekuensi_napas']) ? $rekam_medis['frekuensi_napas'] : ''; ?> ">

												<?= form_error('frekuensi_napas', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Tinggi Badan -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Tinggi
													Badan</strong></label>
											<div class="col-sm-8 col-form-label col-form-label">
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
											<div class="col-sm-8 col-form-label col-form-label">
												<input type="text" name="berat_badan"  id="berat_badan"
													class="form-control form-control-user" id="diagnosa_medis" :
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
										<!-- Kepala dan Leher -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Kepala
													dan
													Leher</strong></label>
											<div class="col-sm-8 col-form-label col-form-label">
												<input type="text" name="kepala_leher"
													class="form-control form-control-user" id="kepala_leher" :
													value="<?= isset($rekam_medis['kepala_leher']) ? $rekam_medis['kepala_leher'] : ''; ?> ">
												<?= form_error('kepala_leher', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Thorax -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Thorax</strong></label>
											<div class="col-sm-8 col-form-label col-form-label">
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
											<div class="col-sm-8 col-form-label col-form-label">
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
											<div class="col-sm-8 col-form-label col-form-label">
												<input type="text" name="ekstremitas"
													class="form-control form-control-user" id="ekstremitas" :
													value="<?= isset($rekam_medis['ekstremitas']) ? $rekam_medis['ekstremitas'] : ''; ?> ">
												<?= form_error('ekstremitas', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
											<label
												class="col-sm-4 col-form-label"><strong>&emsp;Lainnya</strong></label>
											<div class="col-sm-8 col-form-label col-form-label">
												<input type="text" name="lainnya" class="form-control form-control-user"
													id="lainnya" :
													value="<?= isset($rekam_medis['lainnya']) ? $rekam_medis['lainnya'] : ''; ?> ">
												<?= form_error('lainnya', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
									
										<label class="col-sm-12 col-form-label"><strong><center> ASSESMENT</center></label>

										<!-- Diagnosa Medis -->
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Diagnosa
													Medis</strong></label>
											<div class="col-sm-8 col-form-label col-form-label">
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
											<div class="col-sm-8 col-form-label col-form-label">
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
											<div class="col-sm-8 col-form-label col-form-label">
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
											<div class="col-sm-8 col-form-label col-form-label">
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
											<div class="col-sm-8 col-form-label col-form-label">
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
											<div class="col-sm-8 col-form-label col-form-label">
												<input type="date" name="rencana_mon_tgl" class="form-control form-control-user" 
													id="rencana_mon_tgl"
													value="<?= isset($rekam_medis['rencana_mon_tgl']) ? $rekam_medis['rencana_mon_tgl'] : ''; ?>">
												<?= form_error('rencana_mon_tgl', '<small class="text-danger pl-3">', '</small>'); ?>

											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Rencana
													Asuhan Keperawatan</strong></label>
											<div class="col-sm-8 col-form-label col-form-label">
												<input type="text" name="rencana_asuhan_keperawatan"
													class="form-control form-control-user" id="rencana_asuhan_keperawatan" :
													value="<?= isset($rekam_medis['rencana_asuhan_keperawatan']) ? $rekam_medis['rencana_asuhan_keperawatan'] : ''; ?> ">
												<?= form_error('rencana_asuhan_keperawatan', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Rujuk RS -->
										<div class="form-group row">
    <label class="col-sm-4 col-form-label"><strong>&emsp;Rujuk RS</strong></label>
    <div class="col-sm-8 col-form-label col-form-label">
        <input type="text" name="rujuk_rs" class="form-control form-control-user" id="rujuk_rs" value="<?= isset($rekam_medis['rujuk_rs']) ? $rekam_medis['rujuk_rs'] : ''; ?>">
        <?= form_error('rujuk_rs', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>
<div class="form-group row">
<!-- <input type="hidden" name="id_user" value="<?= $dokter['id_user']; ?>"> -->
    <label class="col-sm-4 col-form-label"><strong>&emsp;Nama Dokter</strong></label>
    <div class="col-sm-8 col-form-label col-form-label">
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