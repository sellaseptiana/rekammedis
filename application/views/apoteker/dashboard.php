<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .dashboard-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .box,
        .chart-box,
        .table-box {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 1 1 calc(33.33% - 20px);
            text-align: center;
        }

        .box .description,
        .table-box .description {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .box .total,
        .table-box .total {
            font-size: 24px;
            font-weight: bold;
        }

        .icon {
            font-size: 48px;
            color: #28a745; /* Warna hijau */
            margin-bottom: 8px;
        }

        .description {
            font-size: 18px;
            color: #333;
            margin-bottom: 8px;
        }
        .icon.resep {
            color: #00bfff;
        }

        .total {
            font-size: 24px;
            color: #007bff;
            font-weight: bold;
        }
        .icon.obat {
            color: #ff4500; 
        }

        .chart-box h2,
        .table-box h2 {
            margin-top: 0;
        }

        table.table-striped {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="container mt-5 mb-5">
            <div class="card">
                <div class="card-header">
                <div class="dashboard-container mt-5 mb-5">
                    <div class="box">
                    <div class="icon"><i class="fas fa-users"></i></div>
                        <div class="description">Jumlah Kunjungan</div>
                        <div class="total"><strong><?= $total_visits ?></strong></div>
                    </div>
                    <div class="box">
                    <div class="icon resep"><i class="fas fa-notes-medical"></i></div>
                        <div class="description">Jumlah Resep</div>
                        <div class="total"><strong><?= $total_prescriptions ?></strong></div>
                    </div>
                    <div class="box">
                    <div class="icon obat"><i class="fas fa-capsules"></i></div>
                        <div class="description">Jumlah Obat</div>
                        <div class="total"><strong><?= $total_obat ?></strong></div>
                    </div>
                </div>
                <div class="dashboard-container mt-5 mb-5">
                    <div class="chart-box">
                        <h2>Top 5 Obat Paling Sering Digunakan</h2>
                        <canvas id="top5obatChart"></canvas>
                    </div>
                    <div class="table-box">
                        <h2>Obat dengan Stok Rendah</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Obat</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($low_stock_obat as $obat) : ?>
                                    <tr>
                                        <td><?= $obat->nama_obat ?></td>
                                        <td><?= $obat->stok ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-box">
                        <h2>Obat yang Akan Kedaluwarsa</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Obat</th>
                                    <th>Tanggal Kedaluwarsa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($expiring_obat as $obat) : ?>
                                    <tr>
                                        <td><?= $obat->nama_obat ?></td>
                                        <td><?= date('d-m-Y', strtotime($obat->expire)) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data untuk 5 Obat yang Paling Sering Digunakan
            var top5obatData = <?= json_encode($top_5_obat) ?>;
            if (top5obatData && Array.isArray(top5obatData)) {
                var obatNames = top5obatData.map(item => item.nama_obat);
                var obatCounts = top5obatData.map(item => item.jumlah);

                var ctxTop5Obat = document.getElementById('top5obatChart').getContext('2d');
                var top5obatChart = new Chart(ctxTop5Obat, {
                    type: 'bar',
                    data: {
                        labels: obatNames,
                        datasets: [{
                            label: 'Jumlah',
                            data: obatCounts,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top'
                            },
                            title: {
                                display: true,
                                text: '5 Obat Paling Sering Digunakan'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            } else {
                console.error('Invalid top_5_obat data:', top5obatData);
            }
        });
    </script>
</body>

</html>
