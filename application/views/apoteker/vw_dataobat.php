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
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0"></ul>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="<?= base_url('Apoteker/index') ?>" class="btn btn-danger mb-2">Kembali</a>
        </div>
    </div>
</nav>
<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Data Obat</h3>
                <a href="<?= base_url() ?>Apoteker/tambah_obat" class="btn btn-primary">Tambah Data</a>
            </div>
            <a href="<?= base_url('Export/obat') ?>" class="btn btn-success">
						<i class="fas fa-file-excel mr-1"></i> Excel
					</a>
        </div>
        <div class="card-body" style="min-height: 400px; overflow-x: auto;">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="table-obat">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Obat</th>
                        <th>Jenis Obat</th>
                       
                        <th>Stok</th>
                        <th>Expire</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($obat_data as $key => $obat) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $obat['nama_obat']; ?></td>
                            <td><?= $obat['jenis_obat']; ?></td>
                          
                            <td><?= $obat['stok']; ?></td>
                            <td><?= $obat['expire']; ?></td>
                            <td>
                                <a href="<?= base_url('Apoteker/detail_obat/') . $obat['id_obat']; ?>" class="badge badge-warning">Detail</a>
                                <a href="<?= base_url('Apoteker/edit_obat/') . $obat['id_obat']; ?>" class="badge badge-primary">Update</a>
                                <a href="<?= base_url('Apoteker/hapus_obat/') . $obat['id_obat']; ?>" class="badge badge-danger" onclick="return confirm('Yakin untuk menghapus Data ini?');">Hapus</a>
                            </td>
                        </tr>
                           </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function() {
    $('#table-obat').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering": true,
        "order": [[0, 'asc']],
        "ajax": {
                "url": "<?= base_url('Apoteker/view_data_obat');?>",
                "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [[10, 20, 50, 100], [10, 20, 50, 100]],
            "columns": [
                {"data": 'id_obat', "sortable": false, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }  
            },
            { "data": "nama_obat" },
            { "data": "jenis_obat" },
           
            { "data": "stok" },
            { "data": "expire" },
            {
                "data": "id_obat",
                "render": function(data, type, row, meta) {
                    return '<a href="<?= base_url('Apoteker/detail_obat/'); ?>' + data + '" class="badge badge-warning">Detail</a> ' +
                        '<a href="<?= base_url('Apoteker/edit_obat/'); ?>' + data + '" class="badge badge-primary">Update</a> ' +
                        '<a href="<?= base_url('Apoteker/hapus_obat/'); ?>' + data + '" class="badge badge-danger" onclick="return confirm(\'Yakin untuk menghapus Data ini?\');">Hapus</a>';
                    }
            }
        ]
    });
});
</script>

</body>
</html>
