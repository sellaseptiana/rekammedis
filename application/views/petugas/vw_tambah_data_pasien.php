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
						<a href="<?=base_url('Petugas/pasien')?>" class="btn btn-danger mb-2">Kembali</a>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card" style="background-color: rgba(245, 245, 245, 0.9);">
								<div class="card-header">
									<center>
										<h4 class="title"><strong>Tambah Data</strong></h4><br><br>
									</center>
									<div class="card-body">
										<form action="" method="POST" enctype="multipart/form-data">
										<div class="form-group row">
												<label class="col-sm-2 col-form-label">No KTP</label>
												<div class="col-sm-10">
													<input type="text" name="no_ktp"
														value="<?= set_value('no_ktp'); ?>"
														class="form-control form-control-user" id="no_ktp"
														placeholder="Masukkan No KTP">
													<?= form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
										<div class="form-group row">
												<label class="col-sm-2 col-form-label">Nama</label>
												<div class="col-sm-10">
													<input type="text" name="nama_pasien"
														value="<?= set_value('nama_pasien'); ?>"
														class="form-control form-control-user" id="nama_pasien"
														placeholder="Masukkan Nama">
													<?= form_error('nama_pasien', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
												<div class="col-sm-10">
													<input type="date" name="tanggal_lahir"
														value="<?= set_value('tanggal_lahir'); ?>"
														class="form-control form-control-user" id="tanggal_lahir"
														placeholder="Masukkan Tanggal Lahir">
													<?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Umur</label>
												<div class="col-sm-10">
													<input type="teks" name="umur"
														class="form-control form-control-user"
														value="<?= set_value('umur'); ?>" id="umur"
														placeholder="Umur Otomatis Dihitung" readonly>
													<?= form_error('umur', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Alamat</label>
												<div class="col-sm-10">
													<input type="teks" name="alamat"
														class="form-control form-control-user"
														value="<?= set_value('alamat'); ?>" id="alamat"
														placeholder="Masukkan Alamat">
													<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
												<div class="col-sm-10">
													<select name="jenis_kelamin" class="form-control form-control-user"
														id="jenis_kelamin">
														<option value="">Pilih Jenis Kelamin</option>
														<option value="Perempuan"
															<?= set_select('jenis_kelamin', 'Perempuan'); ?>>Perempuan
														</option>
														<option value="Laki-Laki"
															<?= set_select('jenis_kelamin', 'Laki-Laki'); ?>>Laki-Laki
														</option>
													</select>
													<?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											
											<div class="form-group row">
												<label class="col-sm-2 col-form-label">No HP</label>
												<div class="col-sm-10">
													<input type="teks" name="no_hp"
														class="form-control form-control-user"
														value="<?= set_value('no_hp'); ?>" id="no_hp"
														placeholder="Masukkan No HP">
													<?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
    <label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
    <div class="col-sm-10">
        <select name="pendidikan" class="form-control form-control-user" id="pendidikan">
            <option value="">Pilih Pendidikan</option>
            <option value="Tidak Sekolah" <?= set_select('pendidikan', 'Tidak Sekolah'); ?>>Tidak Sekolah</option>
            <option value="SD" <?= set_select('pendidikan', 'SD'); ?>>SD</option>
            <option value="SMP" <?= set_select('pendidikan', 'SMP'); ?>>SMP</option>
            <option value="SMA" <?= set_select('pendidikan', 'SMA'); ?>>SMA</option>
            <option value="D2" <?= set_select('pendidikan', 'D2'); ?>>D3</option>
            <option value="D3" <?= set_select('pendidikan', 'D3'); ?>>D4</option>
            <option value="S1" <?= set_select('pendidikan', 'S1'); ?>>S1</option>
            <option value="S2" <?= set_select('pendidikan', 'S2'); ?>>S2</option>
            <option value="S3" <?= set_select('pendidikan', 'S3'); ?>>S3</option>
        </select>
        <?= form_error('pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Pekerjaan</label>
    <div class="col-sm-10">
        <select name="pekerjaan" class="form-control form-control-user" id="pekerjaan" onchange="checkPekerjaan(this)">
            <option value="">Pilih Pekerjaan</option>
            <option value="Tidak Bekerja" <?= set_select('pekerjaan', 'Tidak Bekerja'); ?>>Tidak Bekerja</option>
            <option value="Pelajar" <?= set_select('pekerjaan', 'Pelajar'); ?>>Pelajar</option>
            <option value="Mahasiswa" <?= set_select('pekerjaan', 'Mahasiswa'); ?>>Mahasiswa</option>
            <option value="Pegawai Negeri" <?= set_select('pekerjaan', 'Pegawai Negeri'); ?>>Pegawai Negeri</option>
            <option value="Pegawai Swasta" <?= set_select('pekerjaan', 'Pegawai Swasta'); ?>>Pegawai Swasta</option>
            <option value="Wiraswasta" <?= set_select('pekerjaan', 'Wiraswasta'); ?>>Wiraswasta</option>
            <option value="Pensiunan" <?= set_select('pekerjaan', 'Pensiunan'); ?>>Pensiunan</option>
            <option value="Lainnya" <?= set_select('pekerjaan', 'Lainnya'); ?>>Lainnya</option>
        </select>
        <?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>

        <!-- Input tambahan untuk pekerjaan "Lainnya" -->
        <div id="divPekerjaanLainnya" class="form-group row" style="display: none;">
		<label class="col-sm-3 col-form-label">Pekerjaan Lainnya</label>
		<div class="col-sm-9">
            <input type="text" name="pekerjaan_lainnya" id="pekerjaan_lainnya" class="form-control">
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
</script>
</div>
											<div class="float-right">
												<button type="submit" name="tambah" id="btnSimpan" 
													class="btn btn-primary float-right">Simpan</button>
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