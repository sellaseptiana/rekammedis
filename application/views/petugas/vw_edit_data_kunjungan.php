<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
	<div class="container">
		<div class="container mt-5 mb-5">
			<div class="card">
				<div class="card-header">
					<div class="float">
						<a href="<?= base_url('Petugas/pasien') ?>" class="btn btn-danger mb-2">Kembali</a>
					</div>
                    <center>
                            <h4 class="title"><strong>Edit Data Kunjungan</strong></h4><br><br>
                        </center
				</div>
				<div class="card-body">
					<form method="POST"
						<form method="POST"
							action="<?= base_url('Petugas/update_kunjungan/' . $kunjungan['id_kunjungan']) ?>">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">No Rekam Medis</label>
								<div class="col-sm-9">
									<input type="text" name="no_rekam_medis" class="form-control"
										value="<?= $kunjungan['no_rekam_medis'] ?>" readonly>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Nama Pasien</label>
								<div class="col-sm-9">
									<input type="text" name="nama_pasien" class="form-control"
										value="<?= $pasien['nama_pasien'] ?>" readonly>
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
								<label class="col-sm-3 col-form-label">Status</label>
								<div class="col-sm-9">
									<select name="status" class="form-control">
										<option value="Umum" <?= $kunjungan['status'] == 'Umum' ? 'selected' : '' ?>>
											Umum</option>
										<option value="BPJS" <?= $kunjungan['status'] == 'BPJS' ? 'selected' : '' ?>>
											BPJS</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">No BPJS</label>
								<div class="col-sm-9">
									<input type="text" name="no_bpjs" class="form-control"
										value="<?= $kunjungan['no_bpjs'] ?>">
								</div>
							</div>
                            <div class="form-group row">
    <label class="col-sm-3 col-form-label">Poli</label>
    <div class="col-sm-9">
        <select name="id_poli" id="id_poli" class="form-control" onchange="updatePelayananOptions(this)">
            <?php foreach ($poli as $p): ?>
                <option value="<?= $p['id_poli'] ?>" <?= $kunjungan['id_poli'] == $p['id_poli'] ? 'selected' : '' ?>>
                    <?= $p['nama_poli'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Nama Pelayanan</label>
    <div class="col-sm-9">
        <select name="nama_pelayanan" id="nama_pelayanan" class="form-control"  onchange="showPelayanan(this)">
            <!-- Options will be populated based on selected poli -->
            <option value="<?= $kunjungan['nama_pelayanan'] ?>" selected><?= $kunjungan['nama_pelayanan'] ?></option>
        </select>
    </div>
</div>

							<div id="divBumil" style="display: none;">
								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Nama Suami</label>
									<div class="col-sm-9">
										<input type="text" name="nama_suami" class="form-control"
											placeholder="Masukkan Nama Suami"
											value="<?= isset($kunjungan['nama_suami']) ? $kunjungan['nama_suami'] : '' ?>">
									</div>
								</div>
                                <div class="form-group row">
											<label class="col-sm-3 col-form-label">Tanggal Lahir Suami</label>
											<div class="col-sm-9">
												<input type="date" name="tanggal_lahir_suami" class="form-control"
													id="tanggal_lahir_suami"
													value="<?= isset($kunjungan['tanggal_lahir_suami']) ? $kunjungan['tanggal_lahir_suami'] : ''; ?>">
												<?= form_error('tanggal_lahir_suami', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
                                        <div class="form-group row">
    <label class="col-sm-3 col-form-label">Pendidikan Terakhir Suami</label>
    <div class="col-sm-9">
        <select name="pendidikan_suami" class="form-control" id="pendidikan_suami">
            <option value="">Pilih Pendidikan</option>
            <option value="Tidak Sekolah" <?= set_select('pendidikan_suami', 'Tidak Sekolah', ($kunjungan['pendidikan_suami'] == 'Tidak Sekolah')); ?>>Tidak Sekolah</option>
            <option value="SD" <?= set_select('pendidikan_suami', 'SD', ($kunjungan['pendidikan_suami'] == 'SD')); ?>>SD</option>
            <option value="SMP" <?= set_select('pendidikan_suami', 'SMP', ($kunjungan['pendidikan_suami'] == 'SMP')); ?>>SMP</option>
            <option value="SMA" <?= set_select('pendidikan_suami', 'SMA', ($kunjungan['pendidikan_suami'] == 'SMA')); ?>>SMA</option>
            <option value="D2" <?= set_select('pendidikan_suami', 'D2', ($kunjungan['pendidikan_suami'] == 'D2')); ?>>D3</option>
            <option value="D3" <?= set_select('pendidikan_suami', 'D3', ($kunjungan['pendidikan_suami'] == 'D3')); ?>>D4</option>
            <option value="S1" <?= set_select('pendidikan_suami', 'S1', ($kunjungan['pendidikan_suami'] == 'S1')); ?>>S1</option>
            <option value="S2" <?= set_select('pendidikan_suami', 'S2', ($kunjungan['pendidikan_suami'] == 'S2')); ?>>S2</option>
            <option value="S3" <?= set_select('pendidikan_suami', 'S3', ($kunjungan['pendidikan_suami'] == 'S3')); ?>>S3</option>
            <option value="Tidak Bekerja" <?= set_select('pendidikan_suami', 'Tidak Bekerja', ($kunjungan['pendidikan_suami'] == 'Tidak Bekerja')); ?>>Tidak Bekerja</option>
        </select>
        <?= form_error('pendidikan_suami', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>
                                <!-- <div class="form-group row">
											<label class="col-sm-3 col-form-label">Umur Suami</label>
											<div class="col-sm-9">
												<input type="text" name="umur_suami" class="form-control form-control-user"
													id="umur_suami"
													value="<?= isset($kunjungan['umur_suami']) ? $kunjungan['umur_suami'] : ''; ?>"
													readonly>
												<?= form_error('umur_suami', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div> -->
                             
								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Pekerjaan Suami</label>
									<div class="col-sm-9">
										<select name="pekerjaan_suami" class="form-control form-control-user"
											id="pekerjaan_suami" onchange="checkPekerjaan(this)">
											<option value="">Pilih Pekerjaan</option>
											<option value="Tidak Bekerja"
												<?= set_select('pekerjaan_suami', 'Tidak Bekerja', ($kunjungan['pekerjaan_suami'] == 'Tidak Bekerja')); ?>>
												Tidak Bekerja</option>
											<option value="Pelajar"
												<?= set_select('pekerjaan_suami', 'Pelajar', ($kunjungan['pekerjaan_suami'] == 'Pelajar')); ?>>
												Pelajar</option>
											<option value="Mahasiswa"
												<?= set_select('pekerjaan_suami', 'Mahasiswa', ($kunjungan['pekerjaan_suami'] == 'Mahasiswa')); ?>>
												Mahasiswa</option>
											<option value="Pegawai Negeri"
												<?= set_select('pekerjaan_suami', 'Pegawai Negeri', ($kunjungan['pekerjaan_suami'] == 'Pegawai Negeri')); ?>>
												Pegawai Negeri</option>
											<option value="Pegawai Swasta"
												<?= set_select('pekerjaan_suami', 'Pegawai Swasta', ($kunjungan['pekerjaan_suami'] == 'Pegawai Swasta')); ?>>
												Pegawai Swasta</option>
											<option value="Wiraswasta"
												<?= set_select('pekerjaan_suami', 'Wiraswasta', ($kunjungan['pekerjaan_suami'] == 'Wiraswasta')); ?>>
												Wiraswasta</option>
											<option value="Pensiunan"
												<?= set_select('pekerjaan_suami', 'Pensiunan', ($kunjungan['pekerjaan_suami'] == 'Pensiunan')); ?>>
												Pensiunan</option>
											<option value="Lainnya"
												<?= set_select('pekerjaan_suami', 'Lainnya', ($kunjungan['pekerjaan_suami'] == 'Lainnya')); ?>>
												Lainnya</option>
										</select>
										<?= form_error('pekerjaan_suami', '<small class="text-danger pl-3">', '</small>'); ?>

										<!-- Input tambahan untuk pekerjaan "Lainnya" -->
										<div id="divPekerjaanLainnya" class="form-group row"
											style="<?= ($kunjungan['pekerjaan_suami'] == 'Lainnya') ? 'display: block;' : 'display: none;'; ?>">
											<label class="col-sm-3 col-form-label">Pekerjaan Lainnya</label>
											<div class="col-sm-9">
												<input type="text" name="pekerjaan_lainnya" id="pekerjaan_lainnya"
													class="form-control"
													value="<?= isset($pasien['pekerjaan_lainnya']) ? $pasien['pekerjaan_lainnya'] : ''; ?>">
											</div>
										</div>
									</div>
								</div>

								<script>
									function checkPekerjaan(select) {
										var pekerjaanInput = document.getElementById('divPekerjaanLainnya');
										if (select.value === 'Lainnya') {
											pekerjaanInput.style.display = 'block';
										} else {
											pekerjaanInput.style.display = 'none';
										}
									}

									// Jalankan sekali saat halaman dimuat ulang
									checkPekerjaan(document.getElementById('pekerjaan_suami'));

								</script>
							
							</div>
							<div id="divKB" style="display: none;">
								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Nama Suami/Istri</label>
									<div class="col-sm-9">
										<input type="text" name="nama_suami" class="form-control"
											placeholder="Masukkan Nama Suami/Istri"
											value="<?= isset($kunjungan['nama_suami']) ? $kunjungan['nama_suami'] : '' ?>">
									</div>
								</div>
                                <div class="form-group row">
											<label class="col-sm-3 col-form-label">Tanggal Lahir Suami/Istri</label>
											<div class="col-sm-9">
												<input type="date" name="tanggal_lahir_suami_istri" class="form-control"
													id="tanggal_lahir_suami_istri"
													value="<?= isset($kunjungan['tanggal_lahir_suami_istri']) ? $kunjungan['tanggal_lahir_suami_istri'] : ''; ?>">
												<?= form_error('tanggal_lahir_suami_istri', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
                                        <div class="form-group row">
    <label class="col-sm-3 col-form-label">Pendidikan Terakhir Suami/Istri</label>
    <div class="col-sm-9">
        <select name="pendidikan_suami" class="form-control" id="pendidikan_suami">
            <option value="">Pilih Pendidikan</option>
            <option value="Tidak Sekolah" <?= set_select('pendidikan_suami', 'Tidak Sekolah', ($kunjungan['pendidikan_suami'] == 'Tidak Sekolah')); ?>>Tidak Sekolah</option>
            <option value="SD" <?= set_select('pendidikan_suami', 'SD', ($kunjungan['pendidikan_suami'] == 'SD')); ?>>SD</option>
            <option value="SMP" <?= set_select('pendidikan_suami', 'SMP', ($kunjungan['pendidikan_suami'] == 'SMP')); ?>>SMP</option>
            <option value="SMA" <?= set_select('pendidikan_suami', 'SMA', ($kunjungan['pendidikan_suami'] == 'SMA')); ?>>SMA</option>
            <option value="D2" <?= set_select('pendidikan_suami', 'D2', ($kunjungan['pendidikan_suami'] == 'D2')); ?>>D3</option>
            <option value="D3" <?= set_select('pendidikan_suami', 'D3', ($kunjungan['pendidikan_suami'] == 'D3')); ?>>D4</option>
            <option value="S1" <?= set_select('pendidikan_suami', 'S1', ($kunjungan['pendidikan_suami'] == 'S1')); ?>>S1</option>
            <option value="S2" <?= set_select('pendidikan_suami', 'S2', ($kunjungan['pendidikan_suami'] == 'S2')); ?>>S2</option>
            <option value="S3" <?= set_select('pendidikan_suami', 'S3', ($kunjungan['pendidikan_suami'] == 'S3')); ?>>S3</option>
            <option value="Tidak Bekerja" <?= set_select('pendidikan_suami', 'Tidak Bekerja', ($kunjungan['pendidikan_suami'] == 'Tidak Bekerja')); ?>>Tidak Bekerja</option>
        </select>
        <?= form_error('pendidikan_suami', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>
                                <div class="form-group row">
											<label class="col-sm-3 col-form-label">Umur Suami</label>
											<div class="col-sm-9">
												<input type="text" name="umur_suami_istri" class="form-control form-control-user"
													id="umur_suami_istri"
													value="<?= isset($kunjungan['umur_suami_istri']) ? $kunjungan['umur_suami_istri'] : ''; ?>"
													readonly>
												<?= form_error('umur_suami_istri', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
                             
								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Pekerjaan Suami</label>
									<div class="col-sm-9">
										<select name="pekerjaan_suami" class="form-control form-control-user"
											id="pekerjaan_suami" onchange="checkPekerjaan(this)">
											<option value="">Pilih Pekerjaan</option>
											<option value="Tidak Bekerja"
												<?= set_select('pekerjaan_suami', 'Tidak Bekerja', ($kunjungan['pekerjaan_suami'] == 'Tidak Bekerja')); ?>>
												Tidak Bekerja</option>
											<option value="Pelajar"
												<?= set_select('pekerjaan_suami', 'Pelajar', ($kunjungan['pekerjaan_suami'] == 'Pelajar')); ?>>
												Pelajar</option>
											<option value="Mahasiswa"
												<?= set_select('pekerjaan_suami', 'Mahasiswa', ($kunjungan['pekerjaan_suami'] == 'Mahasiswa')); ?>>
												Mahasiswa</option>
											<option value="Pegawai Negeri"
												<?= set_select('pekerjaan_suami', 'Pegawai Negeri', ($kunjungan['pekerjaan_suami'] == 'Pegawai Negeri')); ?>>
												Pegawai Negeri</option>
											<option value="Pegawai Swasta"
												<?= set_select('pekerjaan_suami', 'Pegawai Swasta', ($kunjungan['pekerjaan_suami'] == 'Pegawai Swasta')); ?>>
												Pegawai Swasta</option>
											<option value="Wiraswasta"
												<?= set_select('pekerjaan_suami', 'Wiraswasta', ($kunjungan['pekerjaan_suami'] == 'Wiraswasta')); ?>>
												Wiraswasta</option>
											<option value="Pensiunan"
												<?= set_select('pekerjaan_suami', 'Pensiunan', ($kunjungan['pekerjaan_suami'] == 'Pensiunan')); ?>>
												Pensiunan</option>
											<option value="Lainnya"
												<?= set_select('pekerjaan_suami', 'Lainnya', ($kunjungan['pekerjaan_suami'] == 'Lainnya')); ?>>
												Lainnya</option>
										</select>
										<?= form_error('pekerjaan_suami', '<small class="text-danger pl-3">', '</small>'); ?>

										<!-- Input tambahan untuk pekerjaan "Lainnya" -->
										<div id="divPekerjaanLainnya" class="form-group row"
											style="<?= ($kunjungan['pekerjaan_suami'] == 'Lainnya') ? 'display: block;' : 'display: none;'; ?>">
											<label class="col-sm-3 col-form-label">Pekerjaan Lainnya</label>
											<div class="col-sm-9">
												<input type="text" name="pekerjaan_lainnya" id="pekerjaan_lainnya"
													class="form-control"
													value="<?= isset($pasien['pekerjaan_lainnya']) ? $pasien['pekerjaan_lainnya'] : ''; ?>">
											</div>
										</div>
									</div>
								</div>

								<script>
									function checkPekerjaan(select) {
										var pekerjaanInput = document.getElementById('divPekerjaanLainnya');
										if (select.value === 'Lainnya') {
											pekerjaanInput.style.display = 'block';
										} else {
											pekerjaanInput.style.display = 'none';
										}
									}

									// Jalankan sekali saat halaman dimuat ulang
									checkPekerjaan(document.getElementById('pekerjaan_suami'));

								</script>
							
							</div>
							<div id="divAnak" style="display: none;">
								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Nama Ayah</label>
									<div class="col-sm-9">
										<input type="text" name="nama_ayah" class="form-control"
											placeholder="Masukkan Nama Ayah"
											value="<?= isset($kunjungan['nama_ayah']) ? $kunjungan['nama_ayah'] : '' ?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Nama Ibu</label>
									<div class="col-sm-9">
										<input type="text" name="nama_ibu" class="form-control"
											placeholder="Masukkan Nama Ibu"
											value="<?= isset($kunjungan['nama_ibu']) ? $kunjungan['nama_ibu'] : '' ?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Berat Lahir (gram)</label>
									<div class="col-sm-9">
										<input type="number" name="berat_lahir" class="form-control"
											placeholder="Masukkan Berat Lahir"
											value="<?= isset($kunjungan['berat_lahir']) ? $kunjungan['berat_lahir'] : '' ?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Umur Ayah</label>
									<div class="col-sm-9">
										<input type="text" name="umur_ayah" class="form-control"
											placeholder="Masukkan Umur Ayah"
											value="<?= isset($kunjungan['umur_ayah']) ? $kunjungan['umur_ayah'] : '' ?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Umur Ibu</label>
									<div class="col-sm-9">
										<input type="text" name="umur_ibu" class="form-control"
											placeholder="Masukkan Umur Ibu"
											value="<?= isset($kunjungan['umur_ibu']) ? $kunjungan['umur_ibu'] : '' ?>">
									</div>
								</div>
							</div>
                            <div class="float-right">
							<button type="submit" class="btn btn-primary">Update</button>
                                </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
function updatePelayananOptions(element) {
    const selectedPoli = element.options[element.selectedIndex].text; // Use text instead of data-poli
    const pelayananSelect = document.getElementById('nama_pelayanan');

    // Clear existing options
    pelayananSelect.innerHTML = '<option value="">Pilih Nama Pelayanan</option>';

    let options = [];
    switch (selectedPoli) {
        case 'Gigi':
            options = ['Pemeriksaan Gigi & Mulut'];
            break;
        case 'Umum':
            options = ['Pemeriksaan Umum'];
            break;
        case 'Anak':
            options = ['Pemeriksaan Anak'];
            break;
        case 'KIA & KB':
            options = ['Bumil', 'KB'];
            break;
        default:
            options = [];
            break;
    }

    // Populate the Nama Pelayanan dropdown
    options.forEach(option => {
        let opt = document.createElement('option');
        opt.value = option;
        opt.textContent = option;
        pelayananSelect.appendChild(opt);
    });

    // Reset the displayed divs when changing Poli
    document.getElementById('divAnak').style.display = 'none';
    document.getElementById('divBumil').style.display = 'none';
    document.getElementById('divKB').style.display = 'none';
}

function showPelayanan(element) {
    const selectedPelayanan = element.value;
    const divAnak = document.getElementById('divAnak');
    const divBumil = document.getElementById('divBumil');
    const divKB = document.getElementById('divKB');

    // Show/Hide divs based on selected 'Nama Pelayanan'
    switch (selectedPelayanan) {
        case 'Pemeriksaan Anak':
            divAnak.style.display = 'block';
            divBumil.style.display = 'none';
            divKB.style.display = 'none';
            break;
        case 'Bumil':
            divAnak.style.display = 'none';
            divBumil.style.display = 'block';
            divKB.style.display = 'none';
            break;
        case 'KB':
            divAnak.style.display = 'none';
            divBumil.style.display = 'none';
            divKB.style.display = 'block';
            break;
        case 'Kunjungan KB':
            divAnak.style.display = 'none';
            divBumil.style.display = 'none';
            divKB.style.display = 'block';
            break;
        default:
            divAnak.style.display = 'none';
            divBumil.style.display = 'none';
            divKB.style.display = 'none';
            break;
    }
}
</script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function () {
			$('#tanggal_lahir_suami').change(function () {
				var tanggalLahir = $(this).val();
				calculateAge(tanggalLahir);
			});
		});

		function calculateAge(tanggalLahir) {
			if (tanggalLahir === '') {
				return;
			}

			var today = new Date();
			var birthDate = new Date(tanggalLahir);
			var ageYears = today.getFullYear() - birthDate.getFullYear();
			var ageMonths = (today.getFullYear() - birthDate.getFullYear()) * 12 + (today.getMonth() - birthDate.getMonth());
			var m = today.getMonth() - birthDate.getMonth();
			if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
				ageYears--;
			}

			if (ageYears < 5) {
				$('#umur_suami').val(ageMonths + " bulan");
			} else {
				$('#umur_suami').val(ageYears + " tahun");
			}
		}

	</script>
	<script>
$(document).ready(function () {
    // Calculate age on page load if a date is already set
    const initialTanggalLahir = $('#tanggal_lahir_suami_istri').val();
    if (initialTanggalLahir) {
        calculateAge(initialTanggalLahir);
    }

    // Calculate age when the date changes
    $('#tanggal_lahir_suami_istri').change(function () {
        const tanggalLahir = $(this).val();
        calculateAge(tanggalLahir);
    });
});

function calculateAge(tanggalLahir) {
    if (!tanggalLahir) {
        $('#umur_suami_istri').val('');
        return;
    }

    const today = new Date();
    const birthDate = new Date(tanggalLahir);
    let ageYears = today.getFullYear() - birthDate.getFullYear();
    const ageMonths = today.getMonth() - birthDate.getMonth();

    // Adjust age if the birth date hasn't occurred yet this year
    if (ageMonths < 0 || (ageMonths === 0 && today.getDate() < birthDate.getDate())) {
        ageYears--;
    }

    // Display age in months if less than a year
    if (ageYears < 1) {
        $('#umur_suami_istri').val(ageMonths + " bulan");
    } else {
        $('#umur_suami_istri').val(ageYears + " tahun");
    }
}
</script>
</body>

</html>
