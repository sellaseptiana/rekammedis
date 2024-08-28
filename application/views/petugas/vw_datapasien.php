<head>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
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
                <a href="<?= base_url() ?>Petugas/tambah_data_pasien" class="btn btn-primary">Tambah Data</a>
            </ul>
            <h4>Data Pasien</h4>
        </div>
        <div class="card-body" style="min-height: 500px; overflow-y: auto;">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="table-pasien">
                <thead>
                    <tr>
                        <th width="5px">No</th>
                        <th>No KTP</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Pendidikan</th>
                        <th>Pekerjaan</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pasien as $key => $us) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $us['no_ktp']; ?></td>
                            <td><?= $us['nama_pasien']; ?></td>
                            <td><?= $us['tanggal_lahir']; ?></td>
                            <td><?= $us['umur']; ?></td>
                            <td><?= $us['alamat']; ?></td>
                            <td><?= $us['jenis_kelamin']; ?></td>
                            <td><?= $us['pendidikan']; ?></td>
                            <td><?= $us['pekerjaan']; ?></td>
                            <td><?= $us['no_hp']; ?></td>
                            <td>
                           
                                <a href="<?= base_url('Petugas/detail_pasien/') . $us['id_pasien']; ?>" class="badge badge-warning">Detail</a>
                                <a href="<?= base_url('Petugas/edit_pasien/') . $us['id_pasien']; ?>" class="badge badge-primary">Update</a>
                                <a href="<?= base_url('Petugas/hapus_pasien/') . $us['id_pasien']; ?>" class="badge badge-danger" onclick="return confirm('Yakin untuk menghapus Data ini?');">Hapus</a>
                            </td>
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
    $('#table-pasien').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering": true,
        "order": [[0, 'asc']],
        "ajax": {
                "url": "<?= base_url('Petugas/view_data_pasien');?>",
                "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [[10, 20, 50, 100], [10, 20, 50, 100]],
            "columns": [
                {"data": 'id_pasien', "sortable": false, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }  
            },
            { "data": "no_ktp" },
            { "data": "nama_pasien" },
            { "data": "tanggal_lahir" },
            { "data": "umur" },
         
            { "data": "alamat" },
            { "data": "jenis_kelamin" },
            { "data": "pendidikan" },
            { "data": "pekerjaan" },
            { "data": "no_hp" },
            {
                "data": "id_pasien",
                "render": function(data, type, row, meta) {
                    return '<a href="<?= base_url('Petugas/detail_pasien/'); ?>' + data + '" class="badge badge-warning">Detail</a> ' +
                        '<a href="<?= base_url('Petugas/edit_pasien/'); ?>' + data + '" class="badge badge-primary">Update</a> ' +
                        '<a href="<?= base_url('Petugas/hapus_pasien/'); ?>' + data + '" class="badge badge-danger" onclick="return confirm(\'Yakin untuk menghapus Data ini?\');">Hapus</a>';
                    }
            }
        ]
    });
});
</script>

</body>
</html>
