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
              <a href="<?= base_url() ?>Petugas/tambah_data_dokter" class="btn btn-primary">Tambah Data</a>
</ul>
<h4> Data Dokter</h4>
                </div>
                <div class="card-body">
                <div class="table-responsive">
    <table class="table table-striped table-bordered" id="table-user">
        <thead>
            <tr>
                <th width="5px">No</th>
                <th>Nama Dokter</th>
                <th>Jenis Kelamin</th>
                <th>Poliklinik</th>
                <th>No Hp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user as $key => $us) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $us['nama']; ?></td>
                    <td><?= $us['jenis_kelamin']; ?></td>
                    <td><?= $us['nama_poli']; ?></td>
                    <td><?= $us['no_hp']; ?></td>
                    <td>
                        <a href="<?= base_url('Petugas/detail_dokter/') . $us['id_user']; ?>" class="badge badge-warning">Detail</a>
                        <a href="<?= base_url('Petugas/hapus/') . $us['id_user']; ?>" class="badge badge-danger" onclick="return confirm('Yakin untuk menghapus Data ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
    $(document).ready(function() {
        tabel = $('#table-user').DataTable({
            "processing": true,
            "responsive": true,
            "serverSide": true,
            "ordering": true,
            "order": [[ 0, 'asc' ]],
            "ajax": {
                "url": "<?= base_url('Petugas/view_data_dokter');?>",
                "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [[10, 20, 50, 100], [10, 20, 50, 100]],
            "columns": [
                {"data": 'id_user', "sortable": false, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }  
                },
                { "data": "nama" },  
                { "data": "jenis_kelamin" }, 
                { "data": "nama_poli" },  
                { "data": "no_hp" }, 
                { "data": "id_user",
                    "render": function(data, type, row, meta) {
                        return '<a href="<?= base_url('Petugas/detail_dokter/'); ?>' + data + '" class="badge badge-warning">Detail</a> ' + '<a href="<?= base_url('Petugas/edit_data_dokter/'); ?>' + data + '" class="badge badge-primary">Update</a> ' +
                           '<a href="<?= base_url('Petugas/hapus_dokter/'); ?>' + data + '" class="badge badge-danger" onclick="return confirm(\'Yakin untuk menghapus Data ini?\');">Hapus</a>';
                        }
            }
        ]
    });
});
</script>
<script src="<?= base_url('assets') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
