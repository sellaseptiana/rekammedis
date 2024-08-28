<div class="container-fluid">
    <div class="container">
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            </ul>
        </div>
    </div>
</div>

<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="float">
                    <a href="<?= base_url('Apoteker/obat') ?>" class="btn btn-danger mb-2">Kembali</a>
                </div>
                <div class="col-sm-12">
                    <div class="card" style="background-color: rgba(245, 245, 245, 0.9);">
                        <div class="row">
                            <div class="card-body">
                                <center>
                                    <h4 class="title"><strong>Detail Obat</strong></h4><br><br>
                                </center>
                                <div class="card-block">
                                    <form>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Nama Obat</strong></label>
                                            <div class="col-sm-6">
                                                <p>: <?= $obat['nama_obat']; ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Jenis Obat</strong></label>
                                            <div class="col-sm-6">
                                                <p>: <?= $obat['jenis_obat']; ?></p>
                                            </div>
                                        </div>
                                  
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Stok</strong></label>
                                            <div class="col-sm-6">
                                                <p>: <?= $obat['stok']; ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label"><strong>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Expire</strong></label>
                                            <div class="col-sm-6">
                                                <p>: <?= $obat['expire']; ?></p>
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
