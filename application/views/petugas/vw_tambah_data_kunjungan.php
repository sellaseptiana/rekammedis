<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="container-fluid">
    <div class="container">
        <div class="container mt-5 mb-5">
            <div class="card">
                <div class="card-header">
                    <div class="float">
                        <a href="<?= base_url('Petugas/kunjungan') ?>" class="btn btn-danger mb-2">Kembali</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card" style="background-color: rgba(245, 245, 245, 0.9);">
                            <div class="card-header">
                                <center>
                                    <h4 class="title"><strong>Tambah Data Kunjungan</strong></h4><br><br>
                                </center>
                                  <!-- Alert jika ada error -->
                                  <?php if ($this->session->flashdata('error')): ?>
                                <script>
                                    alert('<?php echo $this->session->flashdata('error'); ?>');
                                </script>
                                <?php endif; ?>
                                <div class="card-body">
                                    <form id="formCekPasien" method="POST" action="<?= base_url('Petugas/cek_pasien') ?>">
                                        <div class="form-group">
                                            <label for="metode">Pilih Metode Cek :</label>
                                            <div>
                                                <input type="radio" id="cek_no_ktp" name="metode_cek" value="no_ktp" checked>
                                                <label for="cek_no_ktp">Cek No KTP</label>
                                            </div>
                                            <div>
                                                <input type="radio" id="cek_no_rekam_medis" name="metode_cek" value="no_rekam_medis">
                                                <label for="cek_no_rekam_medis">Cek No Rekam Medis</label>
                                            </div>
                                        </div>
                                        <div class="form-group row" id="div_no_ktp">
                                            <label for="no_ktp" class="col-sm-2 col-form-label">No KTP :</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="no_ktp" name="no_ktp" class="form-control">
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="button" class="btn btn-primary" onclick="cekPasien()">Cek</button>
                                            </div>
                                        </div>
                                        <div class="form-group row" id="div_no_rekam_medis" style="display: none;">
                                            <label for="no_rekam_medis" class="col-sm-2 col-form-label">No Rekam Medis :</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="no_rekam_medis" name="no_rekam_medis" class="form-control">
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="button" class="btn btn-primary" onclick="cekPasien()">Cek</button>
                                            </div>
                                        </div>
                                    </form>

                                    <?php if (isset($pasien) && !empty($pasien)): ?>
                                    <form id="formKunjungan" action="<?= base_url('Petugas/tambah_kunjungan') ?>" method="POST">
                                        <input type="hidden" name="id_pasien" value="<?= $pasien['id_pasien'] ?>">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">No Rekam Medis</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="no_rekam_medis" class="form-control"
                                                    value="<?= isset($pasien['no_rekam_medis']) ? $pasien['no_rekam_medis'] : '' ?>"
                                                    placeholder="Masukkan No Rekam Medis"
                                                    <?= isset($pasien['no_rekam_medis']) ? 'readonly' : '' ?>>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Pasien</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nama_pasien" class="form-control"
                                                    value="<?= $pasien['nama_pasien'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
    <label class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-10">
        <select name="status" id="status" class="form-control" onchange="toggleNoBpjs()">
            <option value="Umum" <?= (isset($pasien['status']) && $pasien['status'] == 'Umum') ? 'selected' : '' ?>>Umum</option>
            <option value="BPJS" <?= (isset($pasien['status']) && $pasien['status'] == 'BPJS') ? 'selected' : '' ?>>BPJS</option>
        </select>
    </div>
</div>

<!-- No BPJS Field -->
<div class="form-group row" id="no_bpjs_field" style="display: <?= (isset($pasien['status']) && $pasien['status'] == 'Umum') ? 'none' : 'flex' ?>;">
    <label class="col-sm-2 col-form-label">No BPJS</label>
    <div class="col-sm-10">
        <input type="text" name="no_bpjs" class="form-control"
               value="<?= isset($pasien['no_bpjs']) ? htmlspecialchars($pasien['no_bpjs'], ENT_QUOTES, 'UTF-8') : '' ?>">
    </div>
</div>

<script>
    // Function to toggle visibility of No BPJS field based on status
    function toggleNoBpjs() {
        var status = document.getElementById('status').value;
        var noBpjsField = document.getElementById('no_bpjs_field');
        
        if (status === 'Umum') {
            noBpjsField.style.display = 'none';
        } else {
            noBpjsField.style.display = 'flex';
        }
    }

    // Initialize visibility based on the current status value
    document.addEventListener('DOMContentLoaded', function() {
        toggleNoBpjs();
    });
</script>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Kunjungan</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="tanggal_kunjungan" class="form-control">
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10">
                                                <select name="status" class="form-control">
                                                    <option value="Umum">Umum</option>
                                                    <option value="BPJS">BPJS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">No BPJS</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="no_bpjs" class="form-control"
                                                    placeholder="Masukkan No BPJS">
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Poli</label>
                                            <div class="col-sm-10">
                                                <select name="id_poli" id="id_poli"   class="form-control"
                                                onchange="updatePelayananOptions(this)">
                                                    <?php foreach ($poli as $p): ?>
                                                    <option value="<?= $p['id_poli'] ?>"><?= $p['nama_poli'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
    <label class="col-sm-2 col-form-label">Nama Pelayanan</label>
    <div class="col-sm-10">
        <select name="nama_pelayanan" id="nama_pelayanan" class="form-control" onchange="showPelayanan(this)">
            <option value="">Pilih Nama Pelayanan</option>
            <!-- Options will be populated dynamically -->
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="id_user" class="col-sm-2 col-form-label">Nama Dokter</label>
    <div class="col-sm-10">
        <select name="id_user" class="form-control form-control-user" id="id_user">
            <option value="">Pilih Nama Dokter</option>
            <option value="20" <?= set_select('id_user', '20'); ?>>Reti</option>
            <option value="25" <?= set_select('id_user', '25'); ?>>Sinta</option>
            <option value="34" <?= set_select('id_user', '34'); ?>>Wati</option>
            <option value="35" <?= set_select('id_user', '35'); ?>>Ana</option>
        </select>
        <?= form_error('id_user', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

                                        <!-- Div for Anak -->
                                        <div id="divAnak" style="display: none;">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nama Ayah</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="nama_ayah" class="form-control" placeholder="Masukkan Nama Ayah">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nama Ibu</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="nama_ibu" class="form-control" placeholder="Masukkan Nama Ibu">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Berat Lahir</label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="berat_lahir" class="form-control" placeholder="Masukkan Berat Lahir">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Umur Ayah</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="umur_ayah" class="form-control" placeholder="Masukkan Umur Ayah">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Umur Ibu</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="umur_ibu" class="form-control" placeholder="Masukkan Umur Ibu">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Div for Bumil -->
                                        <div id="divBumil" style="display: none;">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nama Suami</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="nama_suami" class="form-control" placeholder="Masukkan Nama Suami">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
    <label class="col-sm-2 col-form-label">Tanggal Lahir Suami</label>
    <div class="col-sm-10">
        <input type="date" name="tanggal_lahir_suami"  class="form-control form-control-user" id="tanggal_lahir_suami" placeholder="Masukkan Tanggal Lahir Suami">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Umur Suami</label>
    <div class="col-sm-10">
        <input type="text" name="umur_suami" class="form-control form-control-user"  id="umur_suami" placeholder="Umur Otomatis Dihitung" readonly>
    </div>
</div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Pendidikan Terakhir Suami</label>
                                                <div class="col-sm-10">
                                                    <select name="pendidikan_suami" class="form-control">
                                                        <option value="">Pilih Pendidikan</option>
                                                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                                                        <option value="SD">SD</option>
                                                        <option value="SMP">SMP</option>
                                                        <option value="SMA">SMA</option>
                                                        <option value="D3">D3</option>
                                                        <option value="D4">D4</option>
                                                        <option value="S1">S1</option>
                                                        <option value="S2">S2</option>
                                                        <option value="S3">S3</option>
                                                    </select>
                                                </div>
                                            </div>
                                      
                                            <div class="form-group row">
    <label class="col-sm-2 col-form-label">Pekerjaan Suami</label>
    <div class="col-sm-10">
        <select name="pekerjaan_suami" class="form-control form-control-user" id="pekerjaan_suami" onchange="checkPekerjaan(this)">
            <option value="">Pilih Pekerjaan</option>
            <option value="Tidak Bekerja" <?= set_select('pekerjaan_suami', 'Tidak Bekerja'); ?>>Tidak Bekerja</option>
            <option value="Pelajar" <?= set_select('pekerjaan_suami', 'Pelajar'); ?>>Pelajar</option>
            <option value="Mahasiswa" <?= set_select('pekerjaan_suami', 'Mahasiswa'); ?>>Mahasiswa</option>
            <option value="Pegawai Negeri" <?= set_select('pekerjaan_suami', 'Pegawai Negeri'); ?>>Pegawai Negeri</option>
            <option value="Pegawai Swasta" <?= set_select('pekerjaan_suami', 'Pegawai Swasta'); ?>>Pegawai Swasta</option>
            <option value="Wiraswasta" <?= set_select('pekerjaan_suami', 'Wiraswasta'); ?>>Wiraswasta</option>
            <option value="Pensiunan" <?= set_select('pekerjaan_suami', 'Pensiunan'); ?>>Pensiunan</option>
            <option value="Lainnya" <?= set_select('pekerjaan_suami', 'Lainnya'); ?>>Lainnya</option>
        </select>
        <?= form_error('pekerjaan_suami', '<small class="text-danger pl-3">', '</small>'); ?>
        
        <div id="divPekerjaanLainnya" class="form-group row" style="display: none;">
            <label class="col-sm-3 col-form-label">Pekerjaan Lainnya</label>
            <div class="col-sm-12">
                <input type="text" name="pekerjaan_lainnya" id="pekerjaan_lainnya" class="form-control">
            </div>
        </div>
    </div>
</div>
</div>


                                        <!-- Div for KB -->
                                        <div id="divKB" style="display: none;">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Kode Faskes KB</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="kode_faskes" class="form-control" placeholder="Masukkan Kode Faskes KB">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nama Suami/Istri</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="nama_suami" class="form-control" placeholder="Masukkan Nama Suami/Istri">
                                                </div>
                                            </div>
                                            <div class="form-group row">
    <label class="col-sm-2 col-form-label">Tanggal Lahir Suami/Istri</label>
    <div class="col-sm-10">
        <input type="date" name="tanggal_lahir_suami_istri"  class="form-control form-control-user" id="tanggal_lahir_suami_istri" placeholder="Masukkan Tanggal Lahir Suami/Istri">
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Umur Suami/Istri</label>
    <div class="col-sm-10">
        <input type="text" name="umur_suami_istri" class="form-control form-control-user"  id="umur_suami_istri" placeholder="Umur Otomatis Dihitung" readonly>
    </div>
</div>
<div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Pendidikan Terakhir Suami</label>
                                                <div class="col-sm-10">
                                                    <select name="pendidikan_suami" class="form-control">
                                                        <option value="">Pilih Pendidikan</option>
                                                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                                                        <option value="SD">SD</option>
                                                        <option value="SMP">SMP</option>
                                                        <option value="SMA">SMA</option>
                                                        <option value="D3">D3</option>
                                                        <option value="D4">D4</option>
                                                        <option value="S1">S1</option>
                                                        <option value="S2">S2</option>
                                                        <option value="S3">S3</option>
                                                    </select>
                                                </div>
                                            </div>
                    
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Tahapan KS</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="tahapan_ks" class="form-control" placeholder="Masukkan Tahapan KS">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Status Peserta Jaminan Kesehatan Nasional</label>
                                                <div class="col-sm-10">
                                                    <select name="status_jkn" class="form-control">
                                                        <option value="">Pilih Status</option>
                                                        <option value="Peserta">Peserta</option>
                                                        <option value="Non Peserta">Non Peserta</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
    <label class="col-sm-2 col-form-label">Pekerjaan Suami/Istri</label>
    <div class="col-sm-10">
        <select name="pekerjaan_suami" class="form-control form-control-user" id="pekerjaan_suami" onchange="checkPekerjaan(this)">
            <option value="">Pilih Pekerjaan</option>
            <option value="Tidak Bekerja" <?= set_select('pekerjaan_suami', 'Tidak Bekerja'); ?>>Tidak Bekerja</option>
            <option value="Pelajar" <?= set_select('pekerjaan_suami', 'Pelajar'); ?>>Pelajar</option>
            <option value="Mahasiswa" <?= set_select('pekerjaan_suami', 'Mahasiswa'); ?>>Mahasiswa</option>
            <option value="Pegawai Negeri" <?= set_select('pekerjaan_suami', 'Pegawai Negeri'); ?>>Pegawai Negeri</option>
            <option value="Pegawai Swasta" <?= set_select('pekerjaan_suami', 'Pegawai Swasta'); ?>>Pegawai Swasta</option>
            <option value="Wiraswasta" <?= set_select('pekerjaan_suami', 'Wiraswasta'); ?>>Wiraswasta</option>
            <option value="Pensiunan" <?= set_select('pekerjaan_suami', 'Pensiunan'); ?>>Pensiunan</option>
            <option value="Lainnya" <?= set_select('pekerjaan_suami', 'Lainnya'); ?>>Lainnya</option>
        </select>
        <?= form_error('pekerjaan_suami', '<small class="text-danger pl-3">', '</small>'); ?>
        
        <div id="divPekerjaanLainnya" class="form-group row" style="display: none;">
            <label class="col-sm-3 col-form-label">Pekerjaan Lainnya</label>
            <div class="col-sm-12">
                <input type="text" name="pekerjaan_lainnya" id="pekerjaan_lainnya" class="form-control">
            </div>
        </div>
    </div>
</div>
                                                    </div>
<div class="float-right">
												<button type="submit" name="tambah" id="btnSimpan" 
													class="btn btn-primary float-right">Simpan</button>
											</div>
                                    </form>
                                    <?php elseif (isset($pasien)): ?>
                                    <script>
                                        alert('No Rekam Medis sudah ada: <?= $pasien["no_rekam_medis"] ?>. Cek melalui No Rekam Medis.');
                                    </script>
                                    <?php endif; ?>
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
<script>
    function cekPasien() {
        const metodeCek = document.querySelector('input[name="metode_cek"]:checked').value;
        if (metodeCek === 'no_ktp') {
            const noKtp = document.getElementById('no_ktp').value;
            checkNoRekamMedis(noKtp);
        } else {
            document.getElementById('formCekPasien').submit();
        }
    }

    function checkNoRekamMedis(noKtp) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '<?= base_url('Petugas/check_no_rekam_medis') ?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.exists) {
                    alert(`No Rekam Medis sudah ada: ${response.no_rekam_medis}. Cek melalui No Rekam Medis.`);
                } else {
                    document.getElementById('formCekPasien').submit();
                }
            }
        };
        xhr.send('no_ktp=' + noKtp);
    }
    document.addEventListener('DOMContentLoaded', function() {
    const metodeRadios = document.querySelectorAll('input[name="metode_cek"]');
    metodeRadios.forEach(function(radio) {
        radio.addEventListener('change', function() {
            const selectedMethod = this.value;
            const divNoKtp = document.getElementById('div_no_ktp');
            const divNoRekamMedis = document.getElementById('div_no_rekam_medis');
            if (selectedMethod === 'no_ktp') {
                divNoKtp.style.display = 'flex';
                divNoRekamMedis.style.display = 'none';
            } else {
                divNoKtp.style.display = 'none';
                divNoRekamMedis.style.display = 'flex';
            }
        });
    });
});
$(document).ready(function () {
    // Calculate age on page load if a date is already set
    const initialTanggalLahir = $('#tanggal_lahir_suami').val();
    if (initialTanggalLahir) {
        calculateAge(initialTanggalLahir);
    }

    // Calculate age when the date changes
    $('#tanggal_lahir_suami').change(function () {
        const tanggalLahir = $(this).val();
        calculateAge(tanggalLahir);
    });
});

function calculateAge(tanggalLahir) {
    if (!tanggalLahir) {
        $('#umur_suami').val('');
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
        $('#umur_suami').val(ageMonths + " bulan");
    } else {
        $('#umur_suami').val(ageYears + " tahun");
    }
}
</script>
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