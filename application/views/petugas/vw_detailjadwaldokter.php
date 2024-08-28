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
    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="float">
                        <a href="<?= base_url('Petugas/jadwaldokter') ?>" class="btn btn-danger mb-2">Kembali</a>
                    </div>
                    <div class="col-sm-12">
                        <div class="card" style="background-color: rgba(245, 245, 245, 0.9);">
                            <div class="row">
                                <div class="card-body">
                                    <center>
                                        <h4 class="title"><strong>Detail Dokter</strong></h4><br><br>
                                    </center>
                                    <?= $this->session->flashdata('message') ?>

                                    <div class="card-block">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id_user" value="<?= $dokter['id_user']; ?>">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Nama Dokter</strong></label>
                                                <div class="col-sm-8 col-form-label">
                                                    : <?= $dokter['nama']; ?>
                                                </div>
                                            </div>
                                                <div class="form-group row">
                                                <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Nama Poliklinik</strong></label>
                                                <div class="col-sm-8 col-form-label">
                                                    : <?= $dokter['nama_poli']; ?>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Status</strong></label>
                                                <div class="col-sm-8 col-form-label">
                                                    : <?= $dokter['status']; ?>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Jam</strong></label>
                                                <div class="col-sm-8 col-form-label">
                                                    : <?= $dokter['jam']; ?>
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
