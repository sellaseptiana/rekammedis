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
    <div class="container-fluid">
    <div class="container">
    <div class="container mt-5 mb-5">
    <div class="card">
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

        .box {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 1 1 calc(25% - 20px);
            text-align: center;
        }

        .box .description {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .box .total {
            font-size: 24px;
            font-weight: bold;
        }

        .icon {
            font-size: 48px;
            color: #28a745; /* Warna hijau */
            margin-bottom: 8px;
        }
        .icon.petugas {
            color: #17a2b8; /* Warna biru */
        }

        .icon.dokter {
            color: #28a745; /* Warna hijau */
        }

        .icon.apoteker {
            color: #ffc107; /* Warna kuning */
        }
        .description {
            font-size: 18px;
            color: #333;
            margin-bottom: 8px;
        }

        .total {
            font-size: 24px;
            color: #007bff;
            font-weight: bold;
        }

        .chart-box {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 1 1 calc(33.33% - 20px);
            text-align: center;
        }

        .chart-box h2 {
            margin-top: 0;
        }
    </style>
</head>

<body>
<div class="card-header">
<div class="dashboard-container mt-5 mb-5">
    <div class="box">
    <div class="icon dokter"><i class="fas fa-user-md"></i></div>
        <div class="description">Dokter</div>
        <div class="total"><strong><?= $dokter_count ?></strong></div>
    </div>
    <div class="box">
    <div class="icon apoteker"><i class="fas fa-prescription-bottle-alt"></i></div>
        <div class="description">Apoteker</div>
        <div class="total"><strong><?= $apoteker_count ?></strong></div>
    </div>
    <div class="box">
    <div class="icon petugas"><i class="fas fa-user-shield"></i></div>
        <div class="description">Petugas</div>
        <div class="total"><strong><?= $petugas_count ?></strong></div>
    </div>
    <div class="box">
    <div class="icon"><i class="fas fa-users"></i></div>
        <div class="description">Jumlah Kunjungan</div>
        <div class="total"><strong><?= $total_visits ?></strong></div>
    </div>
</div>

<div class="dashboard-container mt-5 mb-5">
    <div class="chart-box">
        <h2>Usia Pasien</h2>
        <canvas id="genderByAgeChart"></canvas>
    </div>
    <div class="chart-box">
        <h2>Kunjungan Poli</h2>
        <canvas id="visitsByPoliChart"></canvas>
    </div>
</div>

<div class="dashboard-container mt-5 mb-5">
    <div class="chart-box">
        <h2>Kategori Pasien</h2>
        <canvas id="patientsByStatusChart"></canvas>
    </div>
    <div class="chart-box">
        <h2 class="text-center">Kunjungan Pasien</h2>
        <div class="row">
            <div class="col-md-12">
                <select id="filterSelect" class="form-control">
                    <option value="daily">Perhari</option>
                    <option value="weekly">Perminggu</option>
                    <option value="monthly">Perbulan</option>
                    <option value="yearly">Pertahun</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <canvas id="visitsChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
</div>
 </div> 

    <script>
    // PHP data to JavaScript arrays
    var dailyData = <?= json_encode($dailyVisits) ?>;
    var weeklyData = <?= json_encode($weeklyVisits) ?>;
    var monthlyData = <?= json_encode($monthlyVisits) ?>;
    var yearlyData = <?= json_encode($yearlyVisits) ?>;

    var visitsChart;

    // Function to create chart
    function createChart(chartData, label, labels) {
        var ctx = document.getElementById('visitsChart').getContext('2d');
        if (visitsChart) {
            visitsChart.destroy();
        }
        visitsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: label,
                    data: chartData,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: label
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 0,
                        ticks: {
                            stepSize: 15,
                            callback: function(value) {
                                if (value === 0) return '0';
                                return value;
                            }
                        },
                        max: Math.ceil(Math.max(...chartData) / 15) * 15
                    }
                }
            }
        });
    }

    // Function to update chart based on filter
    function updateChart() {
        var filter = document.getElementById('filterSelect').value;
        var chartData, label, labels;

        if (filter === 'daily') {
            chartData = dailyData.map(entry => entry.visit_count);
            labels = dailyData.map(entry => entry.visit_date);
            label = 'Kunjungan Perhari';
        } else if (filter === 'weekly') {
            chartData = weeklyData.map(entry => entry.visit_count);
            labels = weeklyData.map(entry => `Minggu ${entry.week}, ${entry.year}`);
            label = 'Kunjungan Perminggu';
        } else if (filter === 'monthly') {
            chartData = monthlyData.map(entry => entry.visit_count);
            labels = monthlyData.map(entry => new Date(entry.year, entry.month - 1).toLocaleString('default', {
                month: 'long'
            }));
            label = 'Kunjungan Perbulan';
        } else if (filter === 'yearly') {
            chartData = yearlyData.map(entry => entry.visit_count);
            labels = yearlyData.map(entry => entry.year);
            label = 'Kunjungan Pertahun';
        }

        createChart(chartData, label, labels);
    }

    // Event listener for filter change
    document.getElementById('filterSelect').addEventListener('change', updateChart);

    // Initial chart display
    document.addEventListener('DOMContentLoaded', function() {
        updateChart();
    });
</script>
<script>
var patientGenderByAge = <?= json_encode($patient_gender_by_age) ?>;
        if (patientGenderByAge && Array.isArray(patientGenderByAge)) {
          var ageRanges = ['0-15', '16-30', '31-45', '46-60', '>60'];
var genders = ['Laki-Laki', 'Perempuan'];

var maleCounts = ageRanges.map(function(range) {
    var item = patientGenderByAge.find(function(item) {
        return item.age_range === range && item.jenis_kelamin === 'Laki-Laki';
    });
    return item ? item.count : 0;
});

var femaleCounts = ageRanges.map(function(range) {
    var item = patientGenderByAge.find(function(item) {
        return item.age_range === range && item.jenis_kelamin === 'Perempuan';
    });
    return item ? item.count : 0;
});

var ctx = document.getElementById('genderByAgeChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ageRanges,
        datasets: [
            {
                label: 'Laki-Laki',
                data: maleCounts.map(count => -count), // Menggunakan nilai negatif untuk Laki-Laki
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'Perempuan',
                data: femaleCounts,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }
        ]
    },
                options: {
                    indexAxis: 'y', // Mengatur sumbu utama sebagai sumbu y (horizontal)
                    responsive: true,
                    scales: {
                        x: {
                            stacked: true,
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Pasien'
                            }
                        },
                        y: {
                            stacked: true
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        title: {
                            display: true,
                            text: 'Jenis Kelamin Pasien berdasarkan Umur'
                        }
                    }
                }
            });
        } else {
            console.error('Invalid patient_gender_by_age data:', patientGenderByAge);
        }
  // Data untuk Pasien yang Berkunjung berdasarkan Nama Poli
        var visitsByPoli = <?= json_encode($visits_by_poli) ?>;
        if (visitsByPoli && Array.isArray(visitsByPoli)) {
            var poliNames = visitsByPoli.map(item => item.nama_poli);
            var visitCounts = visitsByPoli.map(item => item.count);

            var ctxVisitsByPoli = document.getElementById('visitsByPoliChart').getContext('2d');
            var visitsByPoliChart = new Chart(ctxVisitsByPoli, {
                type: 'doughnut',
                data: {
                    labels: poliNames,
                    datasets: [{
                        data: visitCounts,
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
                            text: 'Poliklinik'
                        }
                    }
                }
            });
        } else {
            console.error('Invalid visits_by_poli data:', visitsByPoli);
        }
    </script>
</body>
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var patientsByStatus = <?= json_encode($patients_by_status) ?>;
    if (patientsByStatus && Array.isArray(patientsByStatus)) {
        var statusLabels = patientsByStatus.map(function(p) { return p.status; });
        var statusCounts = patientsByStatus.map(function(p) { return p.count; });

        var ctxPatientsByStatus = document.getElementById('patientsByStatusChart').getContext('2d');
        var patientsByStatusChart = new Chart(ctxPatientsByStatus, {
            type: 'bar', // Use 'bar' for vertical bar chart
            data: {
                labels: statusLabels,
                datasets: [{
                    data: statusCounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    maxBarThickness: 70 // Set max bar thickness to 50 pixels
                }]
            },
            options: {
                indexAxis: 'x', // Display vertical bars along the x-axis
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 15 // Set tick step size for y-axis
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Status'
                    }
                }
            }
        });
    } else {
        console.error('Invalid patients_by_status data:', patientsByStatus);
    }
</script>

    </div>
    </div>
    </div>
      </div>
</body>

</html>