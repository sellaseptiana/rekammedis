<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="container">
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0"></ul>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="<?= base_url('Dokter/index') ?>" class="btn btn-danger mb-2">Kembali</a>
        </div>
    </div>
</nav>
<div class="container mt-5 mb-5">
		<div class="card">
			<div class="card-header">
				<div class="d-flex flex-wrap justify-content-between align-items-center">
					<h4 class="font-weight-bold">Rekam Medis KIA & KB</h4>
					<a href="<?= base_url('Export/kiakb') ?>" class="btn btn-success">
						<i class="fas fa-file-excel mr-1"></i> Excel
					</a>
				</div>
			</div>
           
    <select id="filterUnitPelayanan">
        <option value="">Pilih Unit Pelayanan</option>
        <option value="Bumil">Bumil</option>
        <option value="KB">KB</option>
    </select>
    <!-- Tabel Bumil -->
    <div class="card-body">
    <h2>Bumil</h2>
    <div class="row mb-3">
        <div class="col-md-4">
        <select id="filter-type" class="form-control">
            <option value="">-- Pilih Jenis Filter --</option>
            <option value="no_rekam_medis">No Rekam Medis</option>
            <option value="tanggal_kunjungan">Tanggal Periksa</option>
        </select>
    </div>
    <div class="col-md-4">
        <select id="filter-dropdown" class="form-control">
            <option value="">-- Pilih Filter --</option>
        </select>
    </div>                </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="table-tbrekammedisbumil">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Resep</th>
                        <th>No Rekam Medis</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Unit Pelayanan</th>
                        <th>Jam Periksa</th>
                        <th>Riwayat Kontrasepsi Terakhir</th>
                        <th>Riwayat Kehamilan Terdahulu</th>
                        <th>Riwayat Perkawinan</th>
                        <th>Riwayat Menstruasi</th>
                        <th>Status Imunisasi</th>
                        <th>Status Generalis</th>
                        <th>Keluhan</th>
                        <th>Status Kebidanan</th>
                        <th>Status Gizi</th>
                        <th>Pemeriksaan Penunjang</th>
                        <th>Dokter</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rekam_medis_bumil as $key => $rm) : ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><a href="<?= base_url('Dokter/detailResep/' . $rm['id_rekam']) ?>" class="btn btn-primary">Detail Resep</a></td>
                        <td><?= $rm['no_rekam_medis']; ?></td>
                        <td><?= $rm['nama_pasien']; ?></td>
                        <td><?= $rm['tanggal_kunjungan']; ?></td>
                        <td><?= $rm['nama_pelayanan']; ?></td>
                        <td><?= $rm['jam_periksa']; ?></td>
                        <td><?= $rm['riwayat_kontrasepsi_trk']; ?></td>
                        <td><?= 'Hamil Ke: ' . $rm['hamilke'] . ', Penolong Persalinan: ' . $rm['penolong_persalinan'] . ', Cara Persalinan: ' . $rm['cara_persalinan']; ?></td>
                        <td><?= 'Bersuami: ' . $rm['bersuami'] . ', Usia Pertama Kali Kawin: ' . $rm['usia_pertama_kali_kawin']; ?></td>
                        <td><?= 'HPHT: ' . $rm['hpht'] . ', Siklus Menstruasi: ' . $rm['siklus_mens']. ', Fluor: ' . $rm['fluor']; ?></td>
                        <td><?= $rm['imunisasi']; ?></td>
                        <td><?= 'Keadaan Umum: ' . $rm['keadaan_umum'] . ', Tekanan Darah: ' . $rm['tekanan_darah'] . ', Nadi: ' . $rm['nadi'] . ', Suhu: ' . $rm['suhu'] . ', Payudara: ' . $rm['payudara']. ', Frekuensi Napas: ' . $rm['frekuensi_napas']; ?></td>
                        <td><?= 'Keluhan Utama: ' . $rm['keluhan_utama'] . ', Keluhan Tambahan: ' . $rm['keluhan_lain']; ?></td>
                        <td><?= 'Tinggi Fundus Uteri: ' . $rm['tinggi_fundus_uteri'] . ', Bentuk Uterus: ' . $rm['bentuk_uterus'] . ', Letak Janin: ' . $rm['letak_janin'] . ', Gerak Janin: ' . $rm['gerak_janin'] .', inspekulo:' . $rm['inspekulo'] .', Indikasi: ' . $rm['indikasi']; ?></td>
                        <td><?= 'Tinggi Badan: ' . $rm['tinggi_badan'] . ', Berat Badan: ' . $rm['berat_badan'] . ', Lingkar Lengan: ' . $rm['lingkar_lengan'] . ', IMT: ' . $rm['imt']; ?></td>
                        <td><?= 'Hb: ' . $rm['pemeriksaan_hb'] . ', Urine: ' . $rm['pemeriksaan_urine'] . ', Albumin: ' . $rm['pemeriksaan_albumin'] . ', HIV: ' . $rm['pemeriksaan_hiv']. ', HbsAg: ' . $rm['pemeriksaan_hbsag']; ?></td>
                        <td><?= $rm['nama']; ?></td>
                        <td>
                            <a href="<?= base_url('Dokter/detail_data_rekammedis/') . $rm['id_rekam']; ?>" class="badge badge-warning">Detail</a>
                            <a href="<?= base_url('Dokter/update_rekam_medis/') . $rm['id_rekam']; ?>" class="badge badge-primary">Update</a>
                            <a href="<?= base_url('Dokter/hapus_rekam_medis/'). $rm['id_rekam']; ?>" class="badge badge-danger" onclick="return confirm('Yakin untuk menghapus Data ini?');">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tabel KB -->
    <div class="card-body">
    <h2>KB</h2>
    <div class="row mb-3">
        <div class="col-md-4">
        <select id="filter-type-kb" class="form-control">
            <option value="">-- Pilih Jenis Filter --</option>
            <option value="no_rekam_medis">No Rekam Medis</option>
            <option value="tanggal_kunjungan">Tanggal Periksa</option>
        </select>
    </div>
    <div class="col-md-4">
        <select id="filter-dropdown-kb" class="form-control">
            <option value="">-- Pilih Filter --</option>
        </select>
    </div>                </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="table-tbrekammediskb">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Resep</th>
                        <th>No Rekam Medis</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Unit Pelayanan</th>
                        <th>Jam Periksa</th>
                        <th>Riwayat Kehamilan</th>
                        <th>Anamnesa</th>
                        <th>Pemeriksaan</th>
                        <th>Jenis Kontrasepsi</th>
                        <th>Pelayanan</th>
                        <th>Dokter</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rekam_medis_kb as $key => $rm) : ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><a href="<?= base_url('Dokter/detailResep/' . $rm['id_rekam']) ?>" class="btn btn-primary">Detail Resep</a></td>
                        <td><?= $rm['no_rekam_medis']; ?></td>
                        <td><?= $rm['nama_pasien']; ?></td>
                        <td><?= $rm['tanggal_kunjungan']; ?></td>
                        <td><?= $rm['nama_pelayanan']; ?></td>
                        <td><?= $rm['jam_periksa']; ?></td>
                        <td><?= 'Jumlah Anak: ' . $rm['jumlah_anak'] . ', Jumlah Anak Laki: ' . $rm['jumlah_anak_laki'] . ', Jumlah Anak Perempuan: ' . $rm['jumlah_anak_perempuan'] . ', Umur Anak Terkecil: ' . $rm['umur_anak_terkecil'] . ', Status KB: ' . $rm['status_kb'] . ', Cara KB Terakhir: ' . $rm['cara_kb_terakhir']; ?></td>
                        <td><?= 'Haid Terakhir: ' . $rm['haid_terakhir'] . ', Kehamilan: ' . $rm['kehamilan'] . ', Gravida: ' . $rm['gravida'] . ', Partus: ' . $rm['partus'] . ', Abotus: ' . $rm['abotus']; ?></td>
                        <td><?= 'Pemeriksaan: ' . $rm['keadaan_umum'] . ', BB: ' . $rm['berat_badan'].'Tekanan Darah: '. $rm['tekanan_darah'].'Dalma: '. $rm['dalma'].'Posisi Rahim: '. $rm['posisi_rahim']; ?></td>
                        
                        <td><?= 'Jenis Kontrasepsi: ' . $rm['jenis_kontrasepsi']; ?></td>
                        <td><?= 'Pesan Kembali: ' . $rm['tgl_pesan_kembali'].'Dicabut: ' . $rm['tgl_cabut']; ?></td>
                        <td><?= $rm['nama']; ?></td>
                        <td>
                            <a href="<?= base_url('Dokter/detail_data_rekammedis/') . $rm['id_rekam']; ?>" class="badge badge-warning">Detail</a>
                            <a href="<?= base_url('Dokter/update_rekam_medis/') . $rm['id_rekam']; ?>" class="badge badge-primary">Update</a>
                            <a href="<?= base_url('Dokter/hapus_rekam_medis/'). $rm['id_rekam']; ?>" class="badge badge-danger" onclick="return confirm('Yakin untuk menghapus Data ini?');">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
document.getElementById('filterUnitPelayanan').addEventListener('change', function() {
    const selectedUnit = this.value;

    // Menyembunyikan semua card-body
    document.querySelectorAll('.card-body').forEach(function(card) {
        // Menampilkan card-body jika header sesuai dengan unit yang dipilih
        if (card.querySelector('h2') && card.querySelector('h2').innerText.trim() === selectedUnit) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
});
</script>
<script>
    $(document).ready(function() {
        var table = $('#table-tbrekammedisbumil').DataTable();
        var rekamMedisData = <?php echo json_encode($rekam_medis_bumil); ?>; // Mengambil data rekam medis dari PHP

// Ketika jenis filter dipilih
$('#filter-type').on('change', function () {
    var filterType = $(this).val();
    var filterDropdown = $('#filter-dropdown');

    // Menghapus semua opsi di dropdown filter
    filterDropdown.empty();
    filterDropdown.append('<option value="">-- Pilih Filter --</option>');

    // Menambahkan opsi sesuai dengan jenis filter yang dipilih
    if (filterType === 'no_rekam_medis') {
        rekamMedisData.forEach(function (rm) {
            filterDropdown.append('<option value="' + rm.no_rekam_medis + '">' + rm.no_rekam_medis + '</option>');
        });
    } else if (filterType === 'tanggal_kunjungan') {
        rekamMedisData.forEach(function (rm) {
            filterDropdown.append('<option value="' + rm.tanggal_kunjungan + '">' + rm.tanggal_kunjungan + '</option>');
        });
    }
});

// Ketika filter dipilih
$('#filter-dropdown').on('change', function () {
    var selectedValue = $(this).val();
    var filterType = $('#filter-type').val();

    if (filterType === 'no_rekam_medis') {
        table.columns(2).search(selectedValue).draw();
    } else if (filterType === 'tanggal_kunjungan') {
        table.columns(4).search(selectedValue).draw();
    }
});
});
</script>
<script>
$(document).ready(function() {
    // Inisialisasi DataTable
    var table = $('#table-tbrekammediskb').DataTable();
    
    var rekamMedisDataKb = <?php echo json_encode($rekam_medis_kb); ?>; // Mengambil data rekam medis dari PHP

    // Ketika jenis filter dipilih
    $('#filter-type-kb').on('change', function () {
        var filterType = $(this).val();
        var filterDropdown = $('#filter-dropdown-kb');

        // Menghapus semua opsi di dropdown filter
        filterDropdown.empty();
        filterDropdown.append('<option value="">-- Pilih Filter --</option>');

        // Menambahkan opsi sesuai dengan jenis filter yang dipilih
        if (filterType === 'no_rekam_medis') {
            rekamMedisDataKb.forEach(function (rm) {
                filterDropdown.append('<option value="' + rm.no_rekam_medis + '">' + rm.no_rekam_medis + '</option>');
            });
        } else if (filterType === 'tanggal_kunjungan') {
            rekamMedisDataKb.forEach(function (rm) {
                filterDropdown.append('<option value="' + rm.tanggal_kunjungan + '">' + rm.tanggal_kunjungan + '</option>');
            });
        }
    });

    // Ketika filter dipilih
    $('#filter-dropdown-kb').on('change', function () {
        var selectedValue = $(this).val();
        var filterType = $('#filter-type-kb').val();

        if (filterType === 'no_rekam_medis') {
            table.columns(2).search(selectedValue).draw(); // Index kolom mungkin perlu disesuaikan
        } else if (filterType === 'tanggal_kunjungan') {
            table.columns(4).search(selectedValue).draw(); // Index kolom mungkin perlu disesuaikan
        }
    });
});
</script>
</body>
</html>
