<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soft UI Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="assets/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="dashboard-page ">
    <?php include 'layout/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        <?php include 'layout/navbar.php'; ?>

        <!-- Dashboard Content -->
        <div class="container-fluid py-3">
            <!-- Key Metrics Cards -->
            <div class="row mb-3">
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="metric-card">
                        <div class="metric-icon revenue">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="metric-content">
                            <h3 class="metric-value">₱12,234</h3>
                            <p class="metric-label">Revenue</p>
                            <div class="metric-trend positive">
                                <i class="fas fa-arrow-up"></i>
                                <span>25%</span>
                                <small>From last month</small>
                            </div>
                        </div>
                        <div class="metric-chart">
                            <canvas id="revenueChart" height="40"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="metric-card">
                        <div class="metric-icon costs">
                            <i class="fas fa-cog"></i>
                        </div>
                        <div class="metric-content">
                            <h3 class="metric-value">₱2,495</h3>
                            <p class="metric-label">Costs</p>
                            <div class="metric-trend negative">
                                <i class="fas fa-arrow-down"></i>
                                <span>5%</span>
                                <small>From last month</small>
                            </div>
                        </div>
                        <div class="metric-chart">
                            <canvas id="costsChart" height="40"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="metric-card">
                        <div class="metric-icon profits">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="metric-content">
                            <h3 class="metric-value">₱9,274</h3>
                            <p class="metric-label">Profits</p>
                            <div class="metric-trend positive">
                                <i class="fas fa-arrow-up"></i>
                                <span>15%</span>
                                <small>From last month</small>
                            </div>
                        </div>
                        <div class="metric-chart">
                            <canvas id="profitsChart" height="40"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="metric-card">
                        <div class="metric-icon shipments">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div class="metric-content">
                            <h3 class="metric-value">8,472</h3>
                            <p class="metric-label">Shipments</p>
                            <div class="metric-trend negative">
                                <i class="fas fa-arrow-down"></i>
                                <span>10%</span>
                                <small>From last month</small>
                            </div>
                        </div>
                        <div class="metric-chart">
                            <canvas id="shipmentsChart" height="40"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="row mb-3">
                <!-- Yearly Order Rate Chart -->
                <div class="col-lg-8 mb-3">
                    <div class="chart-card">
                        <div class="chart-header">
                            <h5>Monthly Performance Overview</h5>
                            <div class="chart-controls">
                                <div class="chart-legend">
                                    <span class="legend-item">
                                        <span class="legend-dot week"></span>
                                        Week
                                    </span>
                                    <span class="legend-item">
                                        <span class="legend-dot month"></span>
                                        Month
                                    </span>
                                </div>
                                <select class="form-select form-select-sm year-selector">
                                    <option>2023</option>
                                    <option>2022</option>
                                    <option>2021</option>
                                </select>
                            </div>
                        </div>
                        <div class="chart-body">
                            <canvas id="yearlyOrderChart" height="200"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Carrying Costs Chart -->
                <div class="col-lg-4 mb-3">
                    <div class="chart-card">
                        <div class="chart-header">
                            <h5>Weekly Analytics</h5>
                            <div class="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </div>
                        </div>
                        <div class="chart-body">
                            <div class="cost-summary">
                                <h3 class="cost-value">₱2,847.90</h3>
                                <div class="cost-trend positive">
                                    <i class="fas fa-arrow-up"></i>
                                    <span>25% from last week</span>
                                </div>
                            </div>
                            <div class="weekly-chart">
                                <canvas id="carryingCostsChart" height="120"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Section Placeholders -->
            <div class="row">
                <div class="col-lg-6 mb-3">
                                            <div class="placeholder-card">
                            <h5>User Activity</h5>
                            <div class="placeholder-content">
                                <i class="fas fa-users"></i>
                                <p>User engagement metrics and activity statistics</p>
                            </div>
                        </div>
                </div>

                <div class="col-lg-6 mb-3">
                                            <div class="placeholder-card">
                            <h5>System Health</h5>
                            <div class="placeholder-content">
                                <i class="fas fa-heartbeat"></i>
                                <p>System performance metrics and health indicators</p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'layout/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
    <!-- Dashboard JS -->
    <script src="assets/js/dashboard.js"></script>
</body>
</html>