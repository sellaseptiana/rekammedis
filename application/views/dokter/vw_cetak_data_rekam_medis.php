<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Rekam Medis</title>
    <style>
        /* Tambahkan gaya CSS di sini jika diperlukan */
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            margin: auto;
        }
        .header {
            text-align: center;
        }
        .content {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Detail Rekam Medis</h1>
            <p>No Rekam Medis: <?= $rekammedis['no_rekam_medis'] ?></p>
        </div>
        <div class="content">
            <p><strong>Nama Pasien:</strong> <?= $rekammedis['nama_pasien'] ?></p>
            <p><strong>Tanggal:</strong> <?= $rekammedis['tanggal_kunjungan'] ?></p>
          
        </div>
    </div>
</body>
</html>
