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
					<h4 class="font-weight-bold">Rekam Medis Bumil</h4>
					<a href="<?= base_url('Export/bumil') ?>" class="btn btn-success">
						<i class="fas fa-file-excel mr-1"></i> Excel
					</a>
				</div>
			</div>
        <div class="card-body">
            <div class="card-body" style="min-height: 400px; overflow-x: auto;">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="table-tbrekammedis">
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
                                <th>Lainnya</th>
                                <th>Dokter</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rekam_medis as $key => $rm) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><a href="<?= base_url('Dokter/detailResep/' . $rm['id_rekam_medis']) ?>" class="btn btn-primary">Detail Resep</a></td>
                                <td><?= $rm['no_rekam_medis']; ?></td>
                                <td><?= $rm['nama_pasien']; ?></td>
                                <td><?= $rm['tanggal_kunjungan']; ?></td>
                                <td><?= $rm['nama_pelayanan']; ?></td>
                                <td><?= $rm['jam_periksa']; ?></td>
                                <td><?= $rm['riwayat_kontrasepsi_trk']; ?></td>
                                <td><?= 'Hamil Ke: ' . $rm['hamilke'] . ', ' .
          
            'Penolong Persalinan: ' . $rm['penolong_persalinan'] . ', ' .
            'Cara Persalinan: ' . $rm['cara_persalinan'] ; ?>
		
									<td><?= 'Bersuami: ' . $rm['bersuami'] . ', ' .
           'Usia Pertama Kali Kawin: ' . $rm['usia_pertama_kali_kawin']; ?>
									
									<td><?= 'HPHT: ' . $rm['hpht'] . ', ' .
           'Siklus Menstruasi: ' . $rm['siklus_mens']. ', ' .
 'Fluor: ' . $rm['fluor']; ?>
                                 <td><?= $rm['imunisasi']; ?></td>
                                 <td><?= 'Keadaan Umum: ' . $rm['keadaan_umum'] . ', ' .
         'Tekanan Darah: ' . $rm['tekanan_darah'] . ', ' .
           'Nadi: ' . $rm['nadi'] . ', ' .
           'Suhu: ' . $rm['suhu'] . ', ' .
           'Payudara: ' . $rm['payudara']. ', ' .
           'Frekuensi Napas: ' . $rm['frekuensi_napas']; ?></td>
									<td><?= 'Keluhan Utama: ' . $rm['keluhan_utama'] . ', ' .
           'Keluhan Tambahan: ' . $rm['keluhan_lain']; ?></td>
		  
		   <td><?= 'Tinggi Fundus Uteri : ' . $rm['tinggi_fundus_uteri'] . ', ' .
         'Bentuk Uterus: ' . $rm['bentuk_uterus'] . ', ' .
           'Letak Janin: ' . $rm['letak_janin'] . ', ' .
           'Gerak Janin: ' . $rm['gerak_janin'] . ', ' .
		   'Indikasi: ' . $rm['indikasi']; ?></td>
          <td><?=  'Tinggi Badan: ' . $rm['tinggi_badan'] . ', ' .
           'Berat Badan: ' . $rm['berat_badan'] . ', ' .
		   'Lingkar Lengan: ' . $rm['lingkar_lengan'] . ', ' .
           'IMT: ' . $rm['imt']; ?></td>
<td><?= 'Hb: ' . $rm['pemeriksaan_hb'] . ', ' .
           'Urine: ' . $rm['pemeriksaan_urine'] . ', ' .
           'Albumin: ' . $rm['pemeriksaan_albumin'] . ', ' .
           'HIV: ' . $rm['pemeriksaan_hiv']. ', ' .
           'HbsAg: ' . $rm['pemeriksaan_hbsag']; ?>
				
		   <td><?= 
 'Lainnya: ' . $rm['lainnya']. ', ' .
$rm['lainnya1']; ?></td>
                                <td><?= $rm['nama']; ?></td>
                                <td>
                                    <a href="<?= base_url('Dokter/detail_data_rekammedis/') . $rm['id_rekam_medis']; ?>" class="badge badge-warning">Detail</a>
                                    <a href="<?= base_url('Dokter/update_rekam_medis/') . $rm['id_rekam_medis']; ?>" class="badge badge-primary">Update</a>
                                    <a href="<?= base_url('Dokter/hapus_rekam_medis/'). $rm['id_rekam_medis']; ?>" class="badge badge-danger" onclick="return confirm('Yakin untuk menghapus Data ini?');">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Initialize DataTables -->
<script>
    $(document).ready(function() {
        $('#table-tbrekammedis').DataTable();
    });
</script>
</body>
</html>
