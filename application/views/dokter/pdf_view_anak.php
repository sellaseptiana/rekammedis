<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detail Resep</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }

            .container {
                width: 100%;
                margin: 0 auto;
                padding: 20px;
            }

            .card {
                border: 1px solid #ddd;
                border-radius: 5px;
                padding: 15px;
            }

            .card-header {
                font-size: 18px;
                margin-bottom: 15px;
                font-weight: bold;
            }

            .form-control {
                border: 1px solid #ced4da;
                padding: 5px;
                margin-bottom: 10px;
                width: 100%;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            table,
            th,
            td {
                border: 1px solid #ddd;
            }

            th,
            td {
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Data Resep
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <strong>No Rekam Medis</strong>
                        <input type="text" class="form-control" value="<?= $rekam_medis['no_rekam_medis']; ?>" disabled>
                    </div>
                    <div class="col-sm-3">
                        <strong>Nama Pasien</strong>
                        <input type="text" class="form-control" value="<?= $rekam_medis['nama_pasien']; ?>" disabled>
                    </div>
                    <div class="col-sm-3">
                        <strong>Nama Dokter</strong>
                        <input type="text" class="form-control" value="<?= $rekam_medis['nama']; ?>" disabled>
                    </div>
                    <div class="col-sm-3">
                        <strong>Pelayanan</strong>
                        <input type="text" class="form-control" value="<?= $rekam_medis['nama_pelayanan']; ?>" disabled>
                    </div>
                    <div class="col-sm-3">
                        <strong>Tanggal Kunjungan</strong>
                        <input type="text" class="form-control" value="<?= $rekam_medis['tanggal_kunjungan']; ?>"
                            disabled>
                    </div>
                </div>

                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Obat</th>
                                <th>Jenis Obat</th>
                                <th>Jumlah</th>
                                <th>Keterangan Resep</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($rekammedis) && is_array($rekammedis)): ?>
                                <?php $no = 1; ?>
                                <?php foreach ($rekammedis as $rm): ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo isset($rm['nama_obat']) ? $rm['nama_obat'] : ''; ?></td>
                                        <td><?php echo isset($rm['jenis_obat']) ? $rm['jenis_obat'] : ''; ?></td>
                                        <td><?php echo isset($rm['jumlah']) ? $rm['jumlah'] : ''; ?></td>
                                        <td><?php echo isset($rm['keterangan_resep']) ? $rm['keterangan_resep'] : ''; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5">Data tidak ditemukan</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>

</html>