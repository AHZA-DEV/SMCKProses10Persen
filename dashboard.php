<?php
session_start();
include_once 'function/auth.php';

// Jika belum login, redirect ke login
if (!isLoggedIn()) {
    header("Location: login.php");
    exit;
}

// Include menu function untuk routing
include_once 'function/menu.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Cuti Karyawan</title>

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

<body class="dashboard-page">
    <?php include 'layout/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        <?php include 'layout/navbar.php'; ?>

        <!-- Page Content -->
        <div class="container-fluid py-3">
            <?php include_once 'function/menu.php'; ?>
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