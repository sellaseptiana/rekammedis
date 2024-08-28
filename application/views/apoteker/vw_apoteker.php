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
        <a href="<?=base_url('Apoteker/index')?>"
											class="btn btn-danger mb-2">Kembali</a>
									</div>
    </div>
</nav>
<div class="container mt-5 mb-5">
            <div class="card">
                <div class="card-header">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">    <a href="<?= base_url() ?>Petugas/tambah_data_apoteker"  class="btn btn-primary">Tambah Data</a>
</ul>
<h4> Data Apoteker</h4>
                </div>
    <div class="card-body">
        <table class="table table-striped table-bordered" id="table-user">
            <thead>
                <tr>
                <th width="5px">No</th>
                <th> Nama Apoteker </th>
                                <th> Jenis Kelamin </th>
                                <th> Alamat </th>
                                <th> No Hp </th>
                                <th>Aksi</th>

                </tr>
            </thead>
            <tbody><?php $i =1; ?>
                        <?php foreach ($user as $us) : ?>
												<tr>
													<td><?= $i; ?>.</td>
													<td><?= $us['nama']; ?></td>
                          <td><?= $us['jenis_kelamin']; ?></td>
                          <td><?= $us['alamat']; ?></td>
                          <td><?= $us['no_hp']; ?></td>
                          
														<td>
                             <a href="<?= base_url('Apoteker/detail_apoteker/'). $us['id_user']; ?>"
															class="badge badge-warning">Detail</a> 
                        </div>
                              <a href="<?= base_url('Apoteker/hapus/'). $us['id_user']; ?> "
															class="badge badge-danger"
															onclick="return confirm('Yakin untuk menghapus Data ini?');"
															class="ik ik-trash-2 text-red">Hapus</a>
                             
                            </td>
												</tr>
                        <?php $i++; ?>
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
                "url": "<?= base_url('Petugas/view_data_apoteker');?>",
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
                { "data": "alamat" },  
                { "data": "no_hp" }, 
                { "data": "id_user",
                    "render": function(data, type, row, meta) {
                        return '<a href="<?= base_url('Apoteker/detail_apoteker/'); ?>' + data + '" class="badge badge-warning">Detail</a> ' + '<a href="<?= base_url('Petugas/edit_apoteker/'); ?>' + data + '" class="badge badge-primary">Update</a> ' +
                           '<a href="<?= base_url('Apoteker/hapus/'); ?>' + data + '" class="badge badge-danger" onclick="return confirm(\'Yakin untuk menghapus Data ini?\');">Hapus</a>';
                        }
            }
        ]
    });
});
</script>
<script src="<?= base_url('assets/js/demo/datatables-demo.js') ?>"></script>
<script src="<?= base_url('assets') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
