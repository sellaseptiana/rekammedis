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
                            <h4 class="title"><strong>Edit Pasien</strong></h4><br><br>
                        </center
				</div>
				<div class="card-body">
					<form method="POST"
                                <form action="<?= site_url('Petugas/edit_pasien/' . $pasien['id_pasien']); ?>" method="post">
        <input type="hidden" name="id_pasien" value="<?= $pasien['id_pasien']; ?>">
		<div class="form-group row">
											<label class="col-sm-3 col-form-label">No KTP</label>
											<div class="col-sm-9">
												<input type="text" name="no_ktp"
													class="form-control form-control-user" id="no_ktp"
													value="<?= isset($pasien['no_ktp']) ? $pasien['no_ktp'] : ''; ?>">
												<?= form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Nama</label>
											<div class="col-sm-9">
												<input type="text" name="nama_pasien"
													class="form-control form-control-user" id="nama_pasien"
													value="<?= isset($pasien['nama_pasien']) ? $pasien['nama_pasien'] : ''; ?>">
												<?= form_error('nama_pasien', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Tanggal Lahir</label>
											<div class="col-sm-9">
												<input type="date" name="tanggal_lahir" class="form-control"
													id="tanggal_lahir"
													value="<?= isset($pasien['tanggal_lahir']) ? $pasien['tanggal_lahir'] : ''; ?>">
												<?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Umur</label>
											<div class="col-sm-9">
												<input type="text" name="umur" class="form-control form-control-user"
													id="umur"
													value="<?= isset($pasien['umur']) ? $pasien['umur'] : ''; ?>"
													readonly>
												<?= form_error('umur', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Alamat</label>
											<div class="col-sm-9">
												<input type="text" name="alamat" class="form-control form-control-user"
													id="alamat"
													value="<?= isset($pasien['alamat']) ? $pasien['alamat'] : ''; ?>">
												<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Jenis Kelamin</label>
											<div class="col-sm-9">
												<select name="jenis_kelamin" class="form-control form-control-user"
													id="jenis_kelamin">
													<option value="Perempuan"
														<?= set_select('jenis_kelamin', 'Perempuan', (isset($pasien['jenis_kelamin']) && $pasien['jenis_kelamin'] == 'Perempuan')); ?>>
														Perempuan</option>
													<option value="Laki-Laki"
														<?= set_select('jenis_kelamin', 'Laki-Laki', (isset($pasien['jenis_kelamin']) && $pasien['jenis_kelamin'] == 'Laki-Laki')); ?>>
														Laki-Laki</option>
												</select>
												<?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">No HP</label>
											<div class="col-sm-9">
												<input type="text" name="no_hp" class="form-control form-control-user"
													id="no_hp"
													value="<?= isset($pasien['no_hp']) ? $pasien['no_hp'] : ''; ?>">
												<?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<!-- Bagian Pendidikan -->
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
    <div class="col-sm-9">
        <select name="pendidikan" class="form-control form-control-user" id="pendidikan">
            <option value="">Pilih Pendidikan</option>
            <option value="Tidak Sekolah" <?= set_select('pendidikan', 'Tidak Sekolah', ($pasien['pendidikan'] == 'Tidak Sekolah')); ?>>Tidak Sekolah</option>
            <option value="SD" <?= set_select('pendidikan', 'SD', ($pasien['pendidikan'] == 'SD')); ?>>SD</option>
            <option value="SMP" <?= set_select('pendidikan', 'SMP', ($pasien['pendidikan'] == 'SMP')); ?>>SMP</option>
            <option value="SMA" <?= set_select('pendidikan', 'SMA', ($pasien['pendidikan'] == 'SMA')); ?>>SMA</option>
            <option value="D2" <?= set_select('pendidikan', 'D2', ($pasien['pendidikan'] == 'D2')); ?>>D3</option>
            <option value="D3" <?= set_select('pendidikan', 'D3', ($pasien['pendidikan'] == 'D3')); ?>>D4</option>
            <option value="S1" <?= set_select('pendidikan', 'S1', ($pasien['pendidikan'] == 'S1')); ?>>S1</option>
            <option value="S2" <?= set_select('pendidikan', 'S2', ($pasien['pendidikan'] == 'S2')); ?>>S2</option>
            <option value="S3" <?= set_select('pendidikan', 'S3', ($pasien['pendidikan'] == 'S3')); ?>>S3</option>
        </select>
        <?= form_error('pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<!-- Bagian Pekerjaan -->
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Pekerjaan</label>
    <div class="col-sm-9">
        <select name="pekerjaan" class="form-control form-control-user" id="pekerjaan" onchange="checkPekerjaan(this)">
            <option value="">Pilih Pekerjaan</option>
            <option value="Tidak Bekerja" <?= set_select('pekerjaan', 'Tidak Bekerja', ($pasien['pekerjaan'] == 'Tidak Bekerja')); ?>>Tidak Bekerja</option>
            <option value="Pelajar" <?= set_select('pekerjaan', 'Pelajar', ($pasien['pekerjaan'] == 'Pelajar')); ?>>Pelajar</option>
            <option value="Mahasiswa" <?= set_select('pekerjaan', 'Mahasiswa', ($pasien['pekerjaan'] == 'Mahasiswa')); ?>>Mahasiswa</option>
            <option value="Pegawai Negeri" <?= set_select('pekerjaan', 'Pegawai Negeri', ($pasien['pekerjaan'] == 'Pegawai Negeri')); ?>>Pegawai Negeri</option>
            <option value="Pegawai Swasta" <?= set_select('pekerjaan', 'Pegawai Swasta', ($pasien['pekerjaan'] == 'Pegawai Swasta')); ?>>Pegawai Swasta</option>
            <option value="Wiraswasta" <?= set_select('pekerjaan', 'Wiraswasta', ($pasien['pekerjaan'] == 'Wiraswasta')); ?>>Wiraswasta</option>
            <option value="Pensiunan" <?= set_select('pekerjaan', 'Pensiunan', ($pasien['pekerjaan'] == 'Pensiunan')); ?>>Pensiunan</option>
            <option value="Lainnya" <?= set_select('pekerjaan', 'Lainnya', ($pasien['pekerjaan'] == 'Lainnya')); ?>>Lainnya</option>
        </select>
        <?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>

        <!-- Input tambahan untuk pekerjaan "Lainnya" -->
        <div id="divPekerjaanLainnya" class="form-group row" style="<?= ($pasien['pekerjaan'] == 'Lainnya') ? 'display: block;' : 'display: none;'; ?>">
		<label class="col-sm-3 col-form-label">Pekerjaan Lainnya</label>
		<div class="col-sm-9">
            <input type="text" name="pekerjaan_lainnya" id="pekerjaan_lainnya" class="form-control" value="<?= isset($pasien['pekerjaan_lainnya']) ? $pasien['pekerjaan_lainnya'] : ''; ?>">
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
    checkPekerjaan(document.getElementById('pekerjaan'));
</script>
										
										<button type="submit" name="update" id="btnSimpan" 
											class="btn btn-primary float-right">Update</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
			<script>
    $(document).ready(function () {
        $('#tanggal_lahir').change(function () {
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
            $('#umur').val(ageMonths + " bulan");
        } else {
            $('#umur').val(ageYears + " tahun");
        }
    }
</script>
		</div>
	</div>
