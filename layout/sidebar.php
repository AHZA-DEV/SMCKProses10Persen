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
            <!-- Admin -->
            <?php if ($_SESSION['user_role'] == 'admin') : ?>
                <li class="nav-item">
                    <a href="dashboard.php?page=dashboard" class="nav-link <?php echo (!isset($_GET['page']) || $_GET['page'] == 'dashboard') ? 'active' : ''; ?>">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="dashboard.php?page=karyawan" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'karyawan') ? 'active' : ''; ?>">
                        <i class="fas fa-users"></i>
                        <span>Data Karyawan</span>
                        <i class="fas fa-chevron-right ms-auto"></i>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="dashboard.php?page=departemen" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'departemen') ? 'active' : ''; ?>">
                        <i class="fas fa-building"></i>
                        <span>Data Departemen</span>
                        <i class="fas fa-chevron-right ms-auto"></i>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="dashboard.php?page=cuti" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'cuti') ? 'active' : ''; ?>">
                        <i class="fas fa-calendar-check"></i>
                        <span>Manajemen Cuti</span>
                        <i class="fas fa-chevron-right ms-auto"></i>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="dashboard.php?page=laporan" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'laporan') ? 'active' : ''; ?>">
                        <i class="fas fa-chart-bar"></i>
                        <span>Laporan</span>
                        <i class="fas fa-chevron-right ms-auto"></i>
                    </a>
                </li>
                
                <div class="sidebar-category">
                    <h6>Pengaturan</h6>
                </div>
                
                <li class="nav-item">
                    <a href="dashboard.php?page=profile" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'profile') ? 'active' : ''; ?>">
                        <i class="fas fa-user-cog"></i>
                        <span>Profil Admin</span>
                        <i class="fas fa-chevron-right ms-auto"></i>
                    </a>
                </li>
            <?php else : ?>
                <!-- KARYAWAN -->
                <li class="nav-item">
                    <a href="dashboard.php?page=dashboard" class="nav-link <?php echo (!isset($_GET['page']) || $_GET['page'] == 'dashboard') ? 'active' : ''; ?>">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="dashboard.php?page=cuti-karyawan" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'cuti-karyawan') ? 'active' : ''; ?>">
                        <i class="fas fa-calendar-check"></i>
                        <span>Pengajuan Cuti</span>
                        <i class="fas fa-chevron-right ms-auto"></i>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="dashboard.php?page=kalender" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'kalender') ? 'active' : ''; ?>">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Kalender Cuti</span>
                        <i class="fas fa-chevron-right ms-auto"></i>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="dashboard.php?page=riwayat" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'riwayat') ? 'active' : ''; ?>">
                        <i class="fas fa-history"></i>
                        <span>Riwayat Cuti</span>
                        <i class="fas fa-chevron-right ms-auto"></i>
                    </a>
                </li>
                
                <div class="sidebar-category">
                    <h6>Profil</h6>
                </div>
                
                <li class="nav-item">
                    <a href="dashboard.php?page=profile" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'profile') ? 'active' : ''; ?>">
                        <i class="fas fa-user-circle"></i>
                        <span>Profil Saya</span>
                        <i class="fas fa-chevron-right ms-auto"></i>
                    </a>
                </li>
            <?php endif ?>
        </ul>

        <!-- Logout Section -->
        <div class="sidebar-logout">
            <a href="../../../logout.php" class="nav-link logout-link">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>
</div>