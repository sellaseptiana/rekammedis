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
                                        <div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Riwayat Alergi</strong></label>
											<div class="col-sm-8 col-form-label">
											<select name="riwayat_alergi" class="form-control form-control-user" id="riwayat_alergi">
											<option value="">Pilih</option>
													<option value="Tidak Ada"
														<?= set_select('riwayat_alergi', 'Tidak Ada', (isset($rekam_medis['riwayat_alergi']) && $rekam_medis['riwayat_alergi'] == 'Tidak Ada')); ?>>
														Tidak Ada</option>
													<option value="Alergi Obat"
														<?= set_select('riwayat_alergi', 'Alergi Obat', (isset($rekam_medis['riwayat_alergi']) && $rekam_medis['riwayat_alergi'] == 'Alergi Obat')); ?>>
														Alergi Obat</option>
                                                        <option value="Alergi Makanan"
														<?= set_select('riwayat_alergi', 'Alergi Obat', (isset($rekam_medis['riwayat_alergi']) && $rekam_medis['riwayat_alergi'] == 'Alergi Makanan')); ?>>
														Alergi Makanan</option>
												</select>		<?= form_error('riwayat_alergi', '<small class="text-danger pl-3">', '</small>'); ?>
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
                                        <div class="form-group row">
    <label class="col-sm-4 col-form-label"><strong>&emsp;Pilih Gigi</strong></label>
    <div class="col-sm-8">
        <select name="id_odontogram[]" id="id_odontogram" class="form-control form-control-user" multiple>
            <?php foreach ($odontograms as $p) : ?>
                <option value="<?= $p['id_odontogram']; ?>" <?= isset($rekam_medis) && in_array($p['id_odontogram'], $rekam_medis) ? 'selected' : ''; ?>>
                    <?= $p['odontogram']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?= form_error('id_odontogram', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>
<!-- Occlusi -->
<div class="form-group row">
    <label class="col-sm-4 col-form-label"><strong>&emsp;Occlusi</strong></label>
    <div class="col-sm-8">
        <select name="occlusi" class="form-control form-control-user" id="occlusi">
            <option value="">Pilih Occlusi</option>
            <option value="Normal Bite" <?= set_select('occlusi', 'Normal Bite', (isset($rekam_medis['occlusi']) && $rekam_medis['occlusi'] == 'Normal Bite')); ?>>Normal Bite</option>
            <option value="Cross Bite" <?= set_select('occlusi', 'Cross Bite', (isset($rekam_medis['occlusi']) && $rekam_medis['occlusi'] == 'Cross Bite')); ?>>Cross Bite</option>
            <option value="Step Bite" <?= set_select('occlusi', 'Step Bite', (isset($rekam_medis['occlusi']) && $rekam_medis['occlusi'] == 'Step Bite')); ?>>Step Bite</option>
        </select>
        <?= form_error('occlusi', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<!-- Torus Palatines -->
<div class="form-group row">
    <label class="col-sm-4 col-form-label"><strong>&emsp;Torus Palatines</strong></label>
    <div class="col-sm-8">
        <select name="torus_palatines" class="form-control form-control-user" id="torus_palatines">
            <option value="">Pilih Torus Palatines</option>
            <option value="Tidak Ada" <?= set_select('torus_palatines', 'Tidak Ada', (isset($rekam_medis['torus_palatines']) && $rekam_medis['torus_palatines'] == 'Tidak Ada')); ?>>Tidak Ada</option>
            <option value="Kecil" <?= set_select('torus_palatines', 'Kecil', (isset($rekam_medis['torus_palatines']) && $rekam_medis['torus_palatines'] == 'Kecil')); ?>>Kecil</option>
            <option value="Sedang" <?= set_select('torus_palatines', 'Sedang', (isset($rekam_medis['torus_palatines']) && $rekam_medis['torus_palatines'] == 'Sedang')); ?>>Sedang</option>
            <option value="Besar" <?= set_select('torus_palatines', 'Besar', (isset($rekam_medis['torus_palatines']) && $rekam_medis['torus_palatines'] == 'Besar')); ?>>Besar</option>
            <option value="Multiple" <?= set_select('torus_palatines', 'Multiple', (isset($rekam_medis['torus_palatines']) && $rekam_medis['torus_palatines'] == 'Multiple')); ?>>Multiple</option>
        </select>
        <?= form_error('torus_palatines', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<!-- Torus Mandibularis -->
<div class="form-group row">
    <label class="col-sm-4 col-form-label"><strong>&emsp;Torus Mandibularis</strong></label>
    <div class="col-sm-8">
        <select name="torus_mandibularis" class="form-control form-control-user" id="torus_mandibularis">
            <option value="">Pilih Torus Mandibularis</option>
            <option value="Tidak Ada" <?= set_select('torus_mandibularis', 'Tidak Ada', (isset($rekam_medis['torus_mandibularis']) && $rekam_medis['torus_mandibularis'] == 'Tidak Ada')); ?>>Tidak Ada</option>
            <option value="Sisi Kiri" <?= set_select('torus_mandibularis', 'Sisi Kiri', (isset($rekam_medis['torus_mandibularis']) && $rekam_medis['torus_mandibularis'] == 'Sisi Kiri')); ?>>Sisi Kiri</option>
            <option value="Sisi Kanan" <?= set_select('torus_mandibularis', 'Sisi Kanan', (isset($rekam_medis['torus_mandibularis']) && $rekam_medis['torus_mandibularis'] == 'Sisi Kanan')); ?>>Sisi Kanan</option>
            <option value="Kedua Sisi" <?= set_select('torus_mandibularis', 'Kedua Sisi', (isset($rekam_medis['torus_mandibularis']) && $rekam_medis['torus_mandibularis'] == 'Kedua Sisi')); ?>>Kedua Sisi</option>
        </select>
        <?= form_error('torus_mandibularis', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<!-- Palatum -->
<div class="form-group row">
    <label class="col-sm-4 col-form-label"><strong>&emsp;Palatum</strong></label>
    <div class="col-sm-8">
        <select name="palatum" class="form-control form-control-user" id="palatum">
            <option value="">Pilih Palatum</option>
            <option value="Dalam" <?= set_select('palatum', 'Dalam', (isset($rekam_medis['palatum']) && $rekam_medis['palatum'] == 'Dalam')); ?>>Dalam</option>
            <option value="Sedang" <?= set_select('palatum', 'Sedang', (isset($rekam_medis['palatum']) && $rekam_medis['palatum'] == 'Sedang')); ?>>Sedang</option>
            <option value="Rendah" <?= set_select('palatum', 'Rendah', (isset($rekam_medis['palatum']) && $rekam_medis['palatum'] == 'Rendah')); ?>>Rendah</option>
        </select>
        <?= form_error('palatum', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<!-- Diasterna -->
<div class="form-group row">
    <label class="col-sm-4 col-form-label"><strong>&emsp;Diasterna</strong></label>
    <div class="col-sm-8">
        <select name="diasterna" class="form-control form-control-user" id="diasterna">
            <option value="">Pilih Diasterna</option>
            <option value="Tidak" <?= set_select('diasterna', 'Tidak', (isset($rekam_medis['diasterna']) && $rekam_medis['diasterna'] == 'Tidak')); ?>>Tidak</option>
            <option value="Ada" <?= set_select('diasterna', 'Ada', (isset($rekam_medis['diasterna']) && $rekam_medis['diasterna'] == 'Ada')); ?>>Ada</option>
        </select>
        <?= form_error('diasterna', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div id="diasternaDetail" class="form-group row" style="display: none;">
    <label class="col-sm-4 col-form-label"><strong>&emsp;Detail Diasterna</strong></label>
    <div class="col-sm-8">
        <input type="text" name="diasternaDetail" value="<?= set_value('diasternaDetail'); ?>" class="form-control form-control-user" id="diasternaDetail" placeholder="Masukkan Detail Diasterna">
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

<!-- Gigi Anomaly -->
<div id="gigiAnomalyOption" class="form-group row">
    <label class="col-sm-4 col-form-label"><strong>&emsp;Gigi Anomaly</strong></label>
    <div class="col-sm-8">
        <select name="gigi_anomaly" class="form-control form-control-user" id="gigi_anomaly">
            <option value="">Pilih Gigi Anomaly</option>
            <option value="Tidak" <?= set_select('gigi_anomaly', 'Tidak', (isset($rekam_medis['gigi_anomaly']) && $rekam_medis['gigi_anomaly'] == 'Tidak')); ?>>Tidak</option>
            <option value="Ada" <?= set_select('gigi_anomaly', 'Ada', (isset($rekam_medis['gigi_anomaly']) && $rekam_medis['gigi_anomaly'] == 'Ada')); ?>>Ada</option>
        </select>
        <?= form_error('gigi_anomaly', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div id="gigiAnomalyDetail" class="form-group row" style="display: none;">
    <label class="col-sm-4 col-form-label"><strong>&emsp;Detail Gigi Anomaly</strong></label>
    <div class="col-sm-8">
        <input type="text" name="gigi_anomaly_detail" value="<?= set_value('gigi_anomaly_detail'); ?>" class="form-control form-control-user" id="gigi_anomaly_detail" placeholder="Masukkan Detail Gigi Anomaly">
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
											<label class="col-sm-4 col-form-label"><strong>&emsp;Lab</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="lab" class="form-control form-control-user"
													id="lab" :
													value="<?= isset($rekam_medis['lab']) ? $rekam_medis['lab'] : ''; ?> ">
												<?= form_error('lab', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
<!-- radiology -->
    <div class="form-group row">
											<label class="col-sm-4 col-form-label"><strong>&emsp;Radiology</strong></label>
											<div class="col-sm-8 col-form-label">
												<input type="text" name="radiology" class="form-control form-control-user"
													id="radiology" :
													value="<?= isset($rekam_medis['radiology']) ? $rekam_medis['radiology'] : ''; ?> ">
												<?= form_error('radiology', '<small class="text-danger pl-3">', '</small>'); ?>
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