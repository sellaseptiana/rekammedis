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
							flex: 1 1 calc(50% - 20px);
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
					</style>
</head>

<body>
	<div class="card-header">
	<div class="dashboard-container mt-5 mb-5">
		<div class="box">
    <div class="icon">📋</div>
			<div class="description">Jumlah Rekam Medis</div>
			<div class="total"><strong><?= $jumlah_rekam_medis_per_poli ?></strong></div>
		</div>
        <div class="box">
    <div class="icon"><i class="fas fa-users"></i></div>
    <div class="description">Jumlah Pasien</div>
    <div class="total"><strong><?= $jumlah_pasien_per_poli ?></strong></div>
</div>
	
	</div>

	<div class="dashboard-container mt-5 mb-5">
    <div class="box">
        <h3>Umur Pasien</h3>
        <canvas id="genderByAgeChart"></canvas>
                    </div>
        <div class="box">
        <h3>Diagnosa Pasien</h3>
        <canvas id="diagnosaChart"></canvas>
    </div>
</div>
<div class="dashboard-container mt-5 mb-5">
    <div class="box">
    <h3>Kunjungan Pasien</h3>
    <div class="row">
    <div class="col-md-12">
                <select id="filterSelect" class="form-control">
                    <option value="daily">Kunjungan Perhari</option>
                    <option value="weekly">Kunjungan Perminggu</option>
                    <option value="monthly">Kunjungan Perbulan</option>
                    <option value="yearly">Kunjungan Pertahun</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <canvas id="visitsChart" width="400" height="400"></canvas>            </div>
        </div>
    </div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var usia_pasien_per_poli = <?= json_encode($usia_pasien_per_poli) ?>;

    if (usia_pasien_per_poli && Array.isArray(usia_pasien_per_poli)) {
        var ageRanges = ['0-15', '16-30', '31-45', '46-60', '>60'];
        var genders = ['Laki-Laki', 'Perempuan'];

        var maleCounts = ageRanges.map(function(range) {
            var item = usia_pasien_per_poli.find(function(item) {
                return item.umur >= getRangeStart(range) && item.umur <= getRangeEnd(range) && item.jenis_kelamin === 'Laki-Laki';
            });
            return item ? item.jumlah_pasien : 0;
        });

        var femaleCounts = ageRanges.map(function(range) {
            var item = usia_pasien_per_poli.find(function(item) {
                return item.umur >= getRangeStart(range) && item.umur <= getRangeEnd(range) && item.jenis_kelamin === 'Perempuan';
            });
            return item ? item.jumlah_pasien : 0;
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
        console.error('Invalid usia_pasien_per_poli data:', usia_pasien_per_poli);
    }

    function getRangeStart(range) {
        switch (range) {
            case '0-15':
                return 0;
            case '16-30':
                return 16;
            case '31-45':
                return 31;
            case '46-60':
                return 46;
            case '>60':
                return 61;
            default:
                return 0;
        }
    }

    function getRangeEnd(range) {
        switch (range) {
            case '0-15':
                return 15;
            case '16-30':
                return 30;
            case '31-45':
                return 45;
            case '46-60':
                return 60;
            case '>60':
                return Infinity;
            default:
                return Infinity;
        }
    }
</script>
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
                        beginAtZero: true,
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
document.addEventListener('DOMContentLoaded', function() {
    // Data untuk Diagnosa Medis
    var diagnosaMedisData = <?= json_encode($diagnosa_medis) ?>;
    if (diagnosaMedisData && Array.isArray(diagnosaMedisData)) {
        var diagnosaNames = diagnosaMedisData.map(item => item.diagnosa_medis);
        var diagnosaCounts = diagnosaNames.reduce((acc, diagnosa) => {
            acc[diagnosa] = (acc[diagnosa] || 0) + 1;
            return acc;
        }, {});

        var ctxDiagnosa = document.getElementById('diagnosaChart').getContext('2d');
        var diagnosaChart = new Chart(ctxDiagnosa, {
            type: 'bar',
            data: {
                labels: Object.keys(diagnosaCounts),
                datasets: [{
                    label: 'Jumlah',
                    data: Object.values(diagnosaCounts),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
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
                        text: 'Diagnosa Medis Pasien'
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
        console.error('Invalid diagnosa_medis data:', diagnosaMedisData);
    }
});
</script>