
<!-- Mobile Sidebar Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

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

    <div class="sidebar-category">
        <h6>Menu</h6>
        <ul class="nav flex-column">
            
            <?php if ($_SESSION['user_role'] == 'admin') : ?>
                <!-- Menu Admin -->
                <li class="nav-item">
                    <a href="dashboard.php?page=dashboard" class="nav-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="dashboard.php?page=karyawan" class="nav-link">
                        <i class="bi bi-people-fill"></i>
                        <span>Karyawan</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="dashboard.php?page=departemen" class="nav-link">
                        <i class="bi bi-building"></i>
                        <span>Departemen</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="dashboard.php?page=cuti" class="nav-link">
                        <i class="bi bi-calendar-check"></i>
                        <span>Cuti</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="dashboard.php?page=laporan" class="nav-link">
                        <i class="bi bi-bar-chart"></i>
                        <span>Laporan</span>
                    </a>
                </li>
                
            <?php else : ?>
                <!-- Menu Karyawan -->
                <li class="nav-item">
                    <a href="dashboard.php?page=dashboard" class="nav-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="dashboard.php?page=cuti-karyawan" class="nav-link">
                        <i class="bi bi-calendar-check"></i>
                        <span>Cuti Saya</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="dashboard.php?page=kalender" class="nav-link">
                        <i class="bi bi-calendar"></i>
                        <span>Kalender</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="dashboard.php?page=riwayat" class="nav-link">
                        <i class="bi bi-clock-history"></i>
                        <span>Riwayat Cuti</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="dashboard.php?page=profile" class="nav-link">
                        <i class="bi bi-person"></i>
                        <span>Profil Saya</span>
                    </a>
                </li>
                
            <?php endif ?>
        </ul>

        <!-- Logout Section -->
        <div class="sidebar-logout">
            <a href="logout.php" class="nav-link logout-link">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>
</div>
