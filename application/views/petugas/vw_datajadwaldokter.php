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
        <a href="<?=base_url('Dashboard')?>"
											class="btn btn-danger mb-2">Kembali</a>
									</div>
    </div>
</nav>
<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <a href="<?= base_url() ?>Petugas/tambah_jadwal" class="btn btn-primary">Tambah Data</a>
            </ul>
            <h4>Data jadwal Dokter</h4>
        </div>
        <div class="card-body" style="min-height: 400px; overflow-x: auto;">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="table-tbjadwaldokter">
                <thead>
                    <tr>
                    <th width="5%">No</th>
                        <th>Nama Dokter</th>
                        <th>Nama Poli</th>
                        <th>Status</th>
                        <th>Jam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($jadwaldokter as $key => $k) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $k['nama_dokter']; ?></td>
                            <td><?= $k['nama_poli']; ?></td>
                            <td><?= $k['status']; ?></td>
                            <td><?= $k['jam']; ?></td>
                            <td>
                                <a href="<?= base_url('Petugas/detail_jadwaldokter/') . $k['id_jadwal_dokter']; ?>" class="badge badge-warning">Detail</a>
                                <a href="<?= base_url('Petugas/edit_jadwaldokter/') . $k['id_jadwal_dokter']; ?>" class="badge badge-primary">Update</a>
                                <a href="<?= base_url('Petugas/delete_jadwaldokter/') . $k['id_jadwal_dokter']; ?>" class="badge badge-danger" onclick="return confirm('Yakin untuk menghapus Data ini?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>

<!-- Optional JavaScript -->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script>
    var table = null;
    $(document).ready(function() {
        table = $('#table-tbjadwaldokter').DataTable({
            "processing": true,
            "responsive": true,
            "serverSide": true,
            "ordering": true,
            "order": [[0, 'asc']],
            "ajax": {
                "url": "<?= base_url('Petugas/view_data_jadwaldokter'); ?>",
                "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [[5, 10, 50], [5, 10, 50]],
            "columns": [
                {"data": 'id_jadwal_dokter', "sortable": false, 
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "nama_dokter" },
            { "data": "nama_poli" },
            { "data": "status" },
            { "data": "jam" },
            {
                "data": "id_jadwal_dokter",
                "render": function(data, type, row, meta) {
            return '<a href="<?= base_url('Petugas/detail_jadwaldokter/'); ?>' + data + '" class="badge badge-warning">Detail</a> ' +
                   '<a href="<?= base_url('Petugas/edit_jadwaldokter/'); ?>' + data + '" class="badge badge-primary">Update</a> ' +
                   '<a href="<?= base_url('Petugas/hapus_jadwaldokter/'); ?>' + data + '" class="badge badge-danger" onclick="return confirm(\'Yakin untuk menghapus Data ini?\');">Hapus</a>';
        }
    }
],
        });
    });
</script>
</body>
</html>
