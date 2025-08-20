
<?php
include_once '../../../function/auth.php';
requireLogin();

// Pastikan hanya karyawan yang bisa akses
if (getUserRole() === 'admin') {
    header("Location: ../../admin/dashboard/view.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Karyawan - SMCK</title>
    <!-- Bootstrap CSS -->
    <link href="../../../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="../../../assets/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom CSS -->
    <link href="../../../assets/css/style.css" rel="stylesheet">
</head>
<body class="dashboard-page">
    <?php include '../../../layout/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        <?php include '../../../layout/navbar.php'; ?>

        <!-- Dashboard Content -->
        <div class="container-fluid py-3">
            <div class="row mb-4">
                <div class="col-12">
                    <h1 class="h3 text-dark mb-0">Dashboard Karyawan</h1>
                    <p class="text-muted">Selamat datang, <?php echo $_SESSION['user_name']; ?>!</p>
                </div>
            </div>

            <!-- Key Metrics Cards -->
            <div class="row mb-3">
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="metric-card">
                        <div class="metric-icon revenue">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <div class="metric-content">
                            <h3 class="metric-value">12</h3>
                            <p class="metric-label">Sisa Cuti</p>
                            <div class="metric-trend positive">
                                <i class="fas fa-info-circle"></i>
                                <span>Dari 12 hari</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="metric-card">
                        <div class="metric-icon costs">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="metric-content">
                            <h3 class="metric-value">2</h3>
                            <p class="metric-label">Cuti Menunggu</p>
                            <div class="metric-trend negative">
                                <i class="fas fa-hourglass-half"></i>
                                <span>Proses review</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="metric-card">
                        <div class="metric-icon profits">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="metric-content">
                            <h3 class="metric-value">8</h3>
                            <p class="metric-label">Cuti Disetujui</p>
                            <div class="metric-trend positive">
                                <i class="fas fa-arrow-up"></i>
                                <span>Tahun ini</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="metric-card">
                        <div class="metric-icon shipments">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="metric-content">
                            <h3 class="metric-value">3</h3>
                            <p class="metric-label">Tahun Kerja</p>
                            <div class="metric-trend positive">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Sejak 2021</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="chart-card">
                        <div class="chart-header">
                            <h5>Menu Cepat</h5>
                        </div>
                        <div class="chart-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <a href="../cuti/ajukan.php" class="btn btn-primary btn-lg w-100">
                                        <i class="fas fa-plus mb-2"></i><br>
                                        Ajukan Cuti
                                    </a>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <a href="../cuti/view.php" class="btn btn-outline-primary btn-lg w-100">
                                        <i class="fas fa-list mb-2"></i><br>
                                        Lihat Cuti
                                    </a>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <a href="../riwayat/view.php" class="btn btn-outline-primary btn-lg w-100">
                                        <i class="fas fa-history mb-2"></i><br>
                                        Riwayat Cuti
                                    </a>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <a href="../profile/view.php" class="btn btn-outline-primary btn-lg w-100">
                                        <i class="fas fa-user mb-2"></i><br>
                                        Profil Saya
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="row mb-3">
                <div class="col-lg-8 mb-3">
                    <div class="chart-card">
                        <div class="chart-header">
                            <h5>Riwayat Cuti Saya</h5>
                        </div>
                        <div class="chart-body">
                            <canvas id="cutiChart" height="200"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-3">
                    <div class="chart-card">
                        <div class="chart-header">
                            <h5>Status Cuti</h5>
                        </div>
                        <div class="chart-body">
                            <canvas id="statusChart" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Leave Requests -->
            <div class="row">
                <div class="col-12">
                    <div class="chart-card">
                        <div class="chart-header">
                            <h5>Pengajuan Cuti Terbaru</h5>
                        </div>
                        <div class="chart-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Jenis Cuti</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Durasi</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Cuti Tahunan</td>
                                            <td>2023-12-01</td>
                                            <td>2023-12-03</td>
                                            <td>3 hari</td>
                                            <td><span class="badge bg-warning">Menunggu</span></td>
                                        </tr>
                                        <tr>
                                            <td>Cuti Sakit</td>
                                            <td>2023-11-15</td>
                                            <td>2023-11-16</td>
                                            <td>2 hari</td>
                                            <td><span class="badge bg-success">Disetujui</span></td>
                                        </tr>
                                        <tr>
                                            <td>Cuti Penting</td>
                                            <td>2023-10-20</td>
                                            <td>2023-10-20</td>
                                            <td>1 hari</td>
                                            <td><span class="badge bg-success">Disetujui</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../../../layout/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="../../../assets/js/script.js"></script>
    <script>
        // Chart untuk riwayat cuti
        const ctx1 = document.getElementById('cutiChart').getContext('2d');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Hari Cuti',
                    data: [2, 0, 1, 3, 0, 1],
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Chart untuk status cuti
        const ctx2 = document.getElementById('statusChart').getContext('2d');
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Disetujui', 'Menunggu', 'Ditolak'],
                datasets: [{
                    data: [8, 2, 1],
                    backgroundColor: [
                        '#28a745',
                        '#ffc107',
                        '#dc3545'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
</body>
</html>
