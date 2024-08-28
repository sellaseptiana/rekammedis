<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="float">
                    <a href="<?= base_url('Apoteker/resep') ?>" class="btn btn-danger mb-2">Kembali</a>
                </div>
                <div class="col-sm-12">
                    <div class="card" style="background-color: rgba(245, 245, 245, 0.9);">
                        <div class="row">
                            <div class="card-body">
                                <center>
                                    <h4 class="title"><strong>Detail Resep</strong></h4><br><br>
                                </center>
                                <div class="card-block">
                                    <form>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label"><strong>No Rekam Medis</strong></label>
                                            <div class="col-sm-6">
                                                <p>: <?= $obat['no_rekam_medis']; ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label"><strong>Nama Pasien</strong></label>
                                            <div class="col-sm-6">
                                                <p>: <?= $obat['nama_pasien']; ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label"><strong>Nama Pelayanan</strong></label>
                                            <div class="col-sm-6">
                                                <p>: <?= $obat['nama_pelayanan']; ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label"><strong>Nama Obat</strong></label>
                                            <div class="col-sm-6">
                                                <p>: <?= $obat['nama_obat']; ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label"><strong>Jenis Obat</strong></label>
                                            <div class="col-sm-6">
                                                <p>: <?= $obat['jenis_obat']; ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label"><strong>Jumlah</strong></label>
                                            <div class="col-sm-6">
                                                <p>: <?= $obat['jumlah']; ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label"><strong>Keterangan Resep</strong></label>
                                            <div class="col-sm-6">
                                                <p>: <?= $obat['keterangan_resep']; ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label"><strong>Tanggal Periksa</strong></label>
                                            <div class="col-sm-6">
                                                <p>: <?= $obat['tanggal_periksa']; ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label"><strong>Nama Dokter</strong></label>
                                            <div class="col-sm-6">
                                                <p>: <?= $obat['nama']; ?></p>
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
