
<?php
// function/menu.php
// Sistem menu berdasarkan struktur pages/

function getMenuItems($userRole = 'karyawan') {
    $menu = [];
    
    if ($userRole === 'admin') {
        $menu = [
            [
                'title' => 'Dashboard',
                'icon' => 'fas fa-tachometer-alt',
                'url' => 'pages/admin/dashboard/view.php',
                'active' => false
            ],
            [
                'title' => 'Manajemen Karyawan',
                'icon' => 'fas fa-users',
                'url' => '#',
                'active' => false,
                'submenu' => [
                    [
                        'title' => 'Lihat Karyawan',
                        'url' => 'pages/admin/karyawan/view.php'
                    ],
                    [
                        'title' => 'Tambah Karyawan',
                        'url' => 'pages/admin/karyawan/create.php'
                    ],
                    [
                        'title' => 'Edit Karyawan',
                        'url' => 'pages/admin/karyawan/update.php'
                    ]
                ]
            ],
            [
                'title' => 'Manajemen Departemen',
                'icon' => 'fas fa-building',
                'url' => '#',
                'active' => false,
                'submenu' => [
                    [
                        'title' => 'Lihat Departemen',
                        'url' => 'pages/admin/departemen/view.php'
                    ],
                    [
                        'title' => 'Tambah Departemen',
                        'url' => 'pages/admin/departemen/create.php'
                    ],
                    [
                        'title' => 'Edit Departemen',
                        'url' => 'pages/admin/departemen/update.php'
                    ]
                ]
            ],
            [
                'title' => 'Manajemen Cuti',
                'icon' => 'fas fa-calendar-check',
                'url' => '#',
                'active' => false,
                'submenu' => [
                    [
                        'title' => 'Daftar Pengajuan',
                        'url' => 'pages/admin/cuti/view.php'
                    ],
                    [
                        'title' => 'Buat Pengajuan',
                        'url' => 'pages/admin/cuti/create.php'
                    ],
                    [
                        'title' => 'Setujui Cuti',
                        'url' => 'pages/admin/cuti/setujui.php'
                    ],
                    [
                        'title' => 'Tolak Cuti',
                        'url' => 'pages/admin/cuti/tolak.php'
                    ]
                ]
            ],
            [
                'title' => 'Laporan',
                'icon' => 'fas fa-chart-bar',
                'url' => '#',
                'active' => false,
                'submenu' => [
                    [
                        'title' => 'Lihat Laporan',
                        'url' => 'pages/admin/laporan/view.php'
                    ],
                    [
                        'title' => 'Cetak Laporan',
                        'url' => 'pages/admin/laporan/cetak.php'
                    ],
                    [
                        'title' => 'Ekspor Data',
                        'url' => 'pages/admin/laporan/ekspor.php'
                    ]
                ]
            ],
            [
                'title' => 'Pengaturan',
                'icon' => 'fas fa-cog',
                'url' => '#',
                'active' => false,
                'submenu' => [
                    [
                        'title' => 'Pengaturan Umum',
                        'url' => 'pages/admin/pengaturan/view.php'
                    ],
                    [
                        'title' => 'Jenis Cuti',
                        'url' => 'pages/admin/pengaturan/jenis-cuti.php'
                    ],
                    [
                        'title' => 'Pengaturan Sistem',
                        'url' => 'pages/admin/pengaturan/sistem.php'
                    ]
                ]
            ]
        ];
    } else {
        // Menu untuk karyawan
        $menu = [
            [
                'title' => 'Dashboard',
                'icon' => 'fas fa-tachometer-alt',
                'url' => 'pages/karyawan/dashboard/view.php',
                'active' => false
            ],
            [
                'title' => 'Cuti',
                'icon' => 'fas fa-calendar-check',
                'url' => '#',
                'active' => false,
                'submenu' => [
                    [
                        'title' => 'Daftar Cuti',
                        'url' => 'pages/karyawan/cuti/view.php'
                    ],
                    [
                        'title' => 'Ajukan Cuti',
                        'url' => 'pages/karyawan/cuti/ajukan.php'
                    ],
                    [
                        'title' => 'Update Cuti',
                        'url' => 'pages/karyawan/cuti/update.php'
                    ]
                ]
            ],
            [
                'title' => 'Kalender',
                'icon' => 'fas fa-calendar',
                'url' => 'pages/karyawan/kalender/view.php',
                'active' => false
            ],
            [
                'title' => 'Riwayat Cuti',
                'icon' => 'fas fa-history',
                'url' => '#',
                'active' => false,
                'submenu' => [
                    [
                        'title' => 'Lihat Riwayat',
                        'url' => 'pages/karyawan/riwayat/view.php'
                    ],
                    [
                        'title' => 'Detail Riwayat',
                        'url' => 'pages/karyawan/riwayat/detail.php'
                    ]
                ]
            ],
            [
                'title' => 'Profil',
                'icon' => 'fas fa-user',
                'url' => '#',
                'active' => false,
                'submenu' => [
                    [
                        'title' => 'Lihat Profil',
                        'url' => 'pages/karyawan/profile/view.php'
                    ],
                    [
                        'title' => 'Edit Profil',
                        'url' => 'pages/karyawan/profile/update.php'
                    ]
                ]
            ]
        ];
    }
    
    return $menu;
}

function renderSidebar($userRole = 'karyawan', $currentPage = '') {
    $menuItems = getMenuItems($userRole);
    $html = '';
    
    foreach ($menuItems as $item) {
        $isActive = ($item['url'] === $currentPage || (isset($item['submenu']) && in_array($currentPage, array_column($item['submenu'], 'url'))));
        $activeClass = $isActive ? 'active' : '';
        
        if (isset($item['submenu'])) {
            // Menu dengan submenu
            $html .= '<li class="nav-item has-submenu ' . $activeClass . '">';
            $html .= '<a href="' . $item['url'] . '" class="nav-link">';
            $html .= '<i class="' . $item['icon'] . '"></i>';
            $html .= '<span>' . $item['title'] . '</span>';
            $html .= '<i class="fas fa-chevron-right ms-auto"></i>';
            $html .= '</a>';
            
            // Submenu
            $html .= '<ul class="submenu">';
            foreach ($item['submenu'] as $subitem) {
                $subActiveClass = ($subitem['url'] === $currentPage) ? 'active' : '';
                $html .= '<li><a href="' . $subitem['url'] . '" class="' . $subActiveClass . '">' . $subitem['title'] . '</a></li>';
            }
            $html .= '</ul>';
            $html .= '</li>';
        } else {
            // Menu tanpa submenu
            $html .= '<li class="nav-item ' . $activeClass . '">';
            $html .= '<a href="' . $item['url'] . '" class="nav-link">';
            $html .= '<i class="' . $item['icon'] . '"></i>';
            $html .= '<span>' . $item['title'] . '</span>';
            $html .= '</a>';
            $html .= '</li>';
        }
    }
    
    return $html;
}

function getBreadcrumb($currentPage, $userRole = 'karyawan') {
    $breadcrumbs = [
        // Admin breadcrumbs
        'pages/admin/dashboard/view.php' => ['Dashboard'],
        'pages/admin/karyawan/view.php' => ['Manajemen Karyawan', 'Lihat Karyawan'],
        'pages/admin/karyawan/create.php' => ['Manajemen Karyawan', 'Tambah Karyawan'],
        'pages/admin/karyawan/update.php' => ['Manajemen Karyawan', 'Edit Karyawan'],
        'pages/admin/departemen/view.php' => ['Manajemen Departemen', 'Lihat Departemen'],
        'pages/admin/departemen/create.php' => ['Manajemen Departemen', 'Tambah Departemen'],
        'pages/admin/departemen/update.php' => ['Manajemen Departemen', 'Edit Departemen'],
        'pages/admin/cuti/view.php' => ['Manajemen Cuti', 'Daftar Pengajuan'],
        'pages/admin/cuti/create.php' => ['Manajemen Cuti', 'Buat Pengajuan'],
        'pages/admin/cuti/setujui.php' => ['Manajemen Cuti', 'Setujui Cuti'],
        'pages/admin/cuti/tolak.php' => ['Manajemen Cuti', 'Tolak Cuti'],
        'pages/admin/laporan/view.php' => ['Laporan', 'Lihat Laporan'],
        'pages/admin/laporan/cetak.php' => ['Laporan', 'Cetak Laporan'],
        'pages/admin/laporan/ekspor.php' => ['Laporan', 'Ekspor Data'],
        'pages/admin/pengaturan/view.php' => ['Pengaturan', 'Pengaturan Umum'],
        'pages/admin/pengaturan/jenis-cuti.php' => ['Pengaturan', 'Jenis Cuti'],
        'pages/admin/pengaturan/sistem.php' => ['Pengaturan', 'Pengaturan Sistem'],
        
        // Karyawan breadcrumbs
        'pages/karyawan/dashboard/view.php' => ['Dashboard'],
        'pages/karyawan/cuti/view.php' => ['Cuti', 'Daftar Cuti'],
        'pages/karyawan/cuti/ajukan.php' => ['Cuti', 'Ajukan Cuti'],
        'pages/karyawan/cuti/update.php' => ['Cuti', 'Update Cuti'],
        'pages/karyawan/kalender/view.php' => ['Kalender'],
        'pages/karyawan/riwayat/view.php' => ['Riwayat Cuti', 'Lihat Riwayat'],
        'pages/karyawan/riwayat/detail.php' => ['Riwayat Cuti', 'Detail Riwayat'],
        'pages/karyawan/profile/view.php' => ['Profil', 'Lihat Profil'],
        'pages/karyawan/profile/update.php' => ['Profil', 'Edit Profil'],
    ];
    
    return isset($breadcrumbs[$currentPage]) ? $breadcrumbs[$currentPage] : ['Dashboard'];
}

function renderBreadcrumb($currentPage, $userRole = 'karyawan') {
    $breadcrumbs = getBreadcrumb($currentPage, $userRole);
    $html = '<nav aria-label="breadcrumb">';
    $html .= '<ol class="breadcrumb">';
    
    foreach ($breadcrumbs as $index => $crumb) {
        if ($index === count($breadcrumbs) - 1) {
            $html .= '<li class="breadcrumb-item active" aria-current="page">' . $crumb . '</li>';
        } else {
            $html .= '<li class="breadcrumb-item"><a href="#">' . $crumb . '</a></li>';
        }
    }
    
    $html .= '</ol>';
    $html .= '</nav>';
    
    return $html;
}

function getPageTitle($currentPage) {
    $titles = [
        // Admin titles
        'pages/admin/dashboard/view.php' => 'Dashboard Admin',
        'pages/admin/karyawan/view.php' => 'Daftar Karyawan',
        'pages/admin/karyawan/create.php' => 'Tambah Karyawan Baru',
        'pages/admin/karyawan/update.php' => 'Edit Data Karyawan',
        'pages/admin/departemen/view.php' => 'Daftar Departemen',
        'pages/admin/departemen/create.php' => 'Tambah Departemen Baru',
        'pages/admin/departemen/update.php' => 'Edit Data Departemen',
        'pages/admin/cuti/view.php' => 'Daftar Pengajuan Cuti',
        'pages/admin/cuti/create.php' => 'Buat Pengajuan Cuti',
        'pages/admin/cuti/setujui.php' => 'Persetujuan Cuti',
        'pages/admin/cuti/tolak.php' => 'Penolakan Cuti',
        'pages/admin/laporan/view.php' => 'Laporan Sistem',
        'pages/admin/laporan/cetak.php' => 'Cetak Laporan',
        'pages/admin/laporan/ekspor.php' => 'Ekspor Data',
        'pages/admin/pengaturan/view.php' => 'Pengaturan Sistem',
        'pages/admin/pengaturan/jenis-cuti.php' => 'Pengaturan Jenis Cuti',
        'pages/admin/pengaturan/sistem.php' => 'Konfigurasi Sistem',
        
        // Karyawan titles
        'pages/karyawan/dashboard/view.php' => 'Dashboard Karyawan',
        'pages/karyawan/cuti/view.php' => 'Daftar Cuti Saya',
        'pages/karyawan/cuti/ajukan.php' => 'Ajukan Cuti Baru',
        'pages/karyawan/cuti/update.php' => 'Update Pengajuan Cuti',
        'pages/karyawan/kalender/view.php' => 'Kalender Cuti',
        'pages/karyawan/riwayat/view.php' => 'Riwayat Cuti',
        'pages/karyawan/riwayat/detail.php' => 'Detail Riwayat Cuti',
        'pages/karyawan/profile/view.php' => 'Profil Saya',
        'pages/karyawan/profile/update.php' => 'Edit Profil',
    ];
    
    return isset($titles[$currentPage]) ? $titles[$currentPage] : 'Sistem Manajemen Cuti Karyawan';
}
?>
