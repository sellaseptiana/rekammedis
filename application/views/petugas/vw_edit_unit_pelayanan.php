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
                        <a href="<?= base_url('Petugas/unitpelayanan') ?>" class="btn btn-danger mb-2">Kembali</a>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card" style="background-color: rgba(245, 245, 245, 0.9);">
                                <div class="card-header">
                                    <center>
                                        <h4 class="title"><strong>Edit Poliklinik</strong></h4><br><br>
                                    </center>
                                    <div class="card-body">
                                        <form action="<?= base_url('Petugas/edit_poli/'.$unitpelayanan['id_unit_pelayanan']); ?>" method="post" class="mt-4">
                                        <div class="form-group row">
    <label class="col-sm-2 col-form-label">Poliklinik</label>
    <div class="col-sm-10">
        <select name="id_poli" id="id_poli" class="form-control">
            <?php foreach ($poli as $p) : ?>
                <option value="<?= $p['id_poli']; ?>" <?= ($p['id_poli'] == $unitpelayanan['id_poli']) ? 'selected' : ''; ?>>
                    <?= $p['nama_poli']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?= form_error('id_poli', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nama Dokter</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control form-control-user" id="id_user" name="id_user">
                                                        <option value="">Pilih Dokter</option>
                                                        <?php foreach ($dokter as $dok) : ?>
                                                            <option value="<?= $dok['id_user']; ?>" <?= set_select('id_user', $dok['id_user'], $dok['id_user'] == $unitpelayanan['id_user']); ?>><?= $dok['nama']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <?= form_error('id_user', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <input type="submit" value="Update" class="btn btn-primary">
                                                </div>
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
