
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

    <div class="sidebar-menu">
        <ul class="nav flex-column">
            <?php
            // Include menu function
            include_once 'function/menu.php';
            
            // Set default user role (you can get this from session)
            $userRole = 'admin'; // or 'karyawan' based on user session
            $currentPage = $_SERVER['PHP_SELF']; // Current page for active menu
            
            // Render sidebar menu
            echo renderSidebar($userRole, $currentPage);
            ?>
        </ul>

        <!-- Logout Section -->
        <div class="sidebar-logout">
            <a href="index.html" class="nav-link logout-link">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>
</div>
