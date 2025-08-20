<!-- ======================================== -->
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="logo-container">
            <i class="fas fa-chart-line"></i>
            <span class="logo-text">Soft UI</span>
        </div>
        <div class="mobile-close d-lg-none">
            <i class="fas fa-times"></i>
        </div>
    </div>

    <div class="sidebar-menu">
        <ul class="nav flex-column">
            <?php if ($_SESSION['user_role'] == 'admin') : ?>
                <li class="nav-item">
                    <a href="dashboard.html" class="nav-link active">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="account.html" class="nav-link">
                        <i class="fas fa-user"></i>
                        <span>Your Account</span>
                        <i class="fas fa-chevron-right ms-auto"></i>
                    </a>
                </li>
            <?php else : ?>
                <!-- KARYAWAN -->
                <li class="nav-item">
                    <a href="users.html" class="nav-link active">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                        <i class="fas fa-chevron-right ms-auto"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="settings.html" class="nav-link">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                        <i class="fas fa-chevron-right ms-auto"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-chart-pie"></i>
                        <span>Reports</span>
                        <i class="fas fa-chevron-right ms-auto"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-bell"></i>
                        <span>Notifications</span>
                        <i class="fas fa-chevron-right ms-auto"></i>
                    </a>
                </li>
            <?php endif ?>
        </ul>

        <!-- Logout Section -->
        <div class="sidebar-logout">
            <a href="./logout.php" class="nav-link logout-link">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>
</div>