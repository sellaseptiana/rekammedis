<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Include Bootstrap CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div class="container-fluid">
		<div class="container">
			<div class="collapse navbar-collapse" id="collapsibleNavId">
				<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
				</ul>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="<?=base_url('Dashboard')?>" class="btn btn-danger mb-2">Kembali</a>
			</div>
		</div>
	</nav>
	<div class="container mt-5 mb-5">
		<div class="card">
			<div class="card-header">
				<ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
				</ul>
				<h4> Data Rekam Medis</h4>
			</div>
			<div class="card-body" style="min-height: 400px; overflow-x: auto;">
				<div class="table-responsive">
					<table class="table table-striped table-bordered" id="table-tbrekammedis">
						<thead>
							<tr>
								<th width="5px">No</th>
								<th> No Rekam Medis </th>
								<th> Nama </th>
								<th> Unit Layanan </th>
								<th> Jam Periksa</th>
								<th> keluhan_utama </th>
								<th> keluhan_tambahan </th>
								<th> riwayat_penyakit_sekarang </th>
								<th> riwayat_penyakit_dahulu </th>
								<th> riwayat_penyakit_keluarga </th>
								<th> riwayat_alergi </th>
								<th> tindakan_terapi </th>
								<th> obat_sering_digunakan </th>
								<th> obat_sering_konsumsi </th>
								<th> keadaan_umum </th>
								<th> kesadaran </th>
								<th> tekanan_darah </th>
								<th> nadi </th>
								<th> suhu </th>
								<th> frekuensi_napas </th>
								<th> tinggi_badan </th>
								<th> berat_badan </th>
								<th> imt </th>
								<th> Hasil Gizi </th>
								<th> kepala_leher </th>
								<th> thorax </th>
								<th> abdomen </th>
								<th> ekstremitas </th>
								<th> lainnya </th>
								<th> status_mental </th>
								<th> respons_emosi </th>
								<th> hub_pasien_keluarga </th>
								<th> taat_ibadah </th>
								<th> bahasa </th>
								<th> lab </th>
								<th> pemeriksaan_lain </th>
								<th> diagnosa_medis </th>
								<th> diagnosa_keperawatan </th>
								<th> rencana_pengobatan </th>
								<th> rencana_edukasi </th>
								<th> rencana_diagnostik </th>
								<th> rencana_mon_tgl </th>
								<th> lainnya </th>
								<th> rujuk_rs </th>
								<th> Dokter </th>
								<th> Aksi </th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($rekam_medis as $key => $rm) : ?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $rm['no_rekam_medis']; ?></td>
								<td><?= $rm['nama_pasien']; ?></td>
								<td><?= $rm['nama_pelayanan']; ?></td>
								<td><?= $rm['jam_periksa']; ?></td>
								<td><?= $rm['keluhan_utama']; ?></td>
								<td><?= $rm['keluhan_tambahan']; ?></td>
								<td><?= $rm['riwayat_penyakit_sekarang']; ?></td>
								<td><?= $rm['riwayat_penyakit_dahulu']; ?></td>
								<td><?= $rm['riwayat_penyakit_keluarga']; ?></td>
								<td><?= $rm['riwayat_alergi']; ?></td>
								<td><?= $rm['tindakan_terapi']; ?></td>
								<td><?= $rm['obat_sering_digunakan']; ?></td>
								<td><?= $rm['obat_sering_konsumsi']; ?></td>
								<td><?= $rm['keadaan_umum']; ?></td>
								<td><?= $rm['kesadaran']; ?></td>
								<td><?= $rm['tekanan_darah']; ?></td>
								<td><?= $rm['nadi']; ?></td>
								<td><?= $rm['suhu']; ?></td>
								<td><?= $rm['frekuensi_napas']; ?></td>
								<td><?= $rm['tinggi_badan']; ?></td>
								<td><?= $rm['berat_badan']; ?></td>
								<td><?= $rm['imt']; ?></td>
								<td>
                                    <?php if ($rm['total_skor'] > 2): ?>
                                        Butuh penangan lebih lanjut oleh ahli gizi
                                    <?php else: ?>
                                        Gizi baik
                                    <?php endif; ?>
                                </td>
								<td><?= $rm['kepala_leher']; ?></td>
								<td><?= $rm['thorax']; ?></td>
								<td><?= $rm['abdomen']; ?></td>
								<td><?= $rm['ekstremitas']; ?></td>
								<td><?= $rm['lainnya']; ?></td>
								<td><?= $rm['status_mental']; ?></td>
								<td><?= $rm['respons_emosi']; ?></td>
								<td><?= $rm['hub_pasien_keluarga']; ?></td>
								<td><?= $rm['taat_ibadah']; ?></td>
								<td><?= $rm['bahasa']; ?></td>
								<td><?= $rm['lab']; ?></td>
								<td><?= $rm['pemeriksaan_lain']; ?></td>
								<td><?= $rm['diagnosa_medis']; ?></td>
								<td><?= $rm['diagnosa_keperawatan']; ?></td>
								<td><?= $rm['rencana_pengobatan']; ?></td>
								<td><?= $rm['rencana_edukasi']; ?></td>
								<td><?= $rm['rencana_diagnostik']; ?></td>
								<td><?= $rm['rencana_mon_tgl']; ?></td>
								<td><?= $rm['lainnya1']; ?></td>
								<td><?= $rm['rujuk_rs']; ?></td>
								<td><?= $rm['nama']; ?></td>
								<td>
									<a href="<?= base_url('Petugas/detail_data_rekammedis/'). $rm['id_rekam_medis']; ?>"
										class="badge badge-warning">Detail</a>


								</td>
							</tr>
							<?php $key++; ?>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	</div>
	<br>
	<br>
	</div>
	<!-- Optional JavaScript -->
	<script>
		var tabel = null;
		$(document).ready(function () {
			tabel = $('#table-tbrekammedis').DataTable({
				"processing": true,
				"responsive": true,
				"serverSide": true,
				"ordering": true,
				"order": [
					[0, 'asc']
				],
				"ajax": {
					"url": "<?= base_url('Petugas/view_data_rekammedis');?>",
					"type": "POST"
				},
				"deferRender": true,
				"aLengthMenu": [
					[10, 20, 50, 100],
					[10, 20, 50, 100]
				],
				"columns": [{
						"data": 'id_rekam_medis',
						"sortable": false,
						render: function (data, type, row, meta) {
							return meta.row + meta.settings._iDisplayStart + 1;
						}
					},
					{
						"data": "no_rekam_medis"
					},
					{
						"data": "nama_pasien"
					}, ,
					{
						"data": "id_rekam_medis",
						"render": function (data, type, row, meta) {
							return '<a href="<?= base_url('
							Petugas / detail_data_rekammedis / '); ?>' + data +
								'" class="badge badge-warning">Detail</a> ' + '<a href="<?= base_url('
							Petugas / edit_dokter / '); ?>';

						}
					}
				]
			});
		});

	</script>
	<script src="<?= base_url('assets/js/demo/datatables-demo.js') ?>"></script>
	<script src="<?= base_url('assets') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
