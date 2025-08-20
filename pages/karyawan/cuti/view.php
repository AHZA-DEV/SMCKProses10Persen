
<?php
include_once '../../../function/auth.php';
requireLogin();

// Pastikan hanya karyawan yang bisa akses
if ($_SESSION['user_role'] !== 'karyawan') {
    header("Location: ../../login.php");
    exit;
}

// Include database connection
include_once '../../../config/koneksi.php';

// Ambil data karyawan yang login
$id_karyawan = $_SESSION['user_id'];
$query_karyawan = "SELECT k.*, d.nama_departemen FROM karyawan k 
                   JOIN departemen d ON k.id_departemen = d.id 
                   WHERE k.id = ?";
$stmt = mysqli_prepare($conn, $query_karyawan);
mysqli_stmt_bind_param($stmt, "i", $id_karyawan);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$karyawan = mysqli_fetch_assoc($result);

// Ambil data jenis cuti
$query_jenis_cuti = "SELECT * FROM jenis_cuti WHERE aktif = 1";
$jenis_cuti = mysqli_query($conn, $query_jenis_cuti);

// Ambil sisa cuti karyawan
$tahun = date('Y');
$query_sisa_cuti = "SELECT * FROM sisa_cuti_tahunan WHERE id_karyawan = ? AND tahun = ?";
$stmt_sisa = mysqli_prepare($conn, $query_sisa_cuti);
mysqli_stmt_bind_param($stmt_sisa, "ii", $id_karyawan, $tahun);
mysqli_stmt_execute($stmt_sisa);
$result_sisa = mysqli_stmt_get_result($stmt_sisa);
$sisa_cuti = mysqli_fetch_assoc($result_sisa);

// Ambil data cuti karyawan
$query_cuti = "SELECT c.*, jc.nama_jenis, jc.maksimal_hari 
               FROM cuti c 
               JOIN jenis_cuti jc ON c.id_jenis_cuti = jc.id 
               WHERE c.id_karyawan = ? 
               ORDER BY c.created_at DESC";
$stmt_cuti = mysqli_prepare($conn, $query_cuti);
mysqli_stmt_bind_param($stmt_cuti, "i", $id_karyawan);
mysqli_stmt_execute($stmt_cuti);
$result_cuti = mysqli_stmt_get_result($stmt_cuti);
?>

<div class="col-12">
    <div class="page-header mb-4">
        <h2>Pengajuan Cuti</h2>
        <p class="text-muted">Kelola pengajuan cuti Anda</p>
    </div>

    <!-- Info Sisa Cuti -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="stat-card bg-primary">
                <div class="stat-content">
                    <h3><?php echo $sisa_cuti ? $sisa_cuti['sisa_cuti'] : '0'; ?></h3>
                    <p>Sisa Cuti Tahunan</p>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card bg-success">
                <div class="stat-content">
                    <?php
                    $query_disetujui = "SELECT COUNT(*) as total FROM cuti WHERE id_karyawan = ? AND status = 'disetujui' AND YEAR(tanggal_mulai) = ?";
                    $stmt_disetujui = mysqli_prepare($conn, $query_disetujui);
                    mysqli_stmt_bind_param($stmt_disetujui, "ii", $id_karyawan, $tahun);
                    mysqli_stmt_execute($stmt_disetujui);
                    $result_disetujui = mysqli_stmt_get_result($stmt_disetujui);
                    $disetujui = mysqli_fetch_assoc($result_disetujui);
                    ?>
                    <h3><?php echo $disetujui['total']; ?></h3>
                    <p>Cuti Disetujui</p>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card bg-warning">
                <div class="stat-content">
                    <?php
                    $query_menunggu = "SELECT COUNT(*) as total FROM cuti WHERE id_karyawan = ? AND status = 'menunggu'";
                    $stmt_menunggu = mysqli_prepare($conn, $query_menunggu);
                    mysqli_stmt_bind_param($stmt_menunggu, "i", $id_karyawan);
                    mysqli_stmt_execute($stmt_menunggu);
                    $result_menunggu = mysqli_stmt_get_result($stmt_menunggu);
                    $menunggu = mysqli_fetch_assoc($result_menunggu);
                    ?>
                    <h3><?php echo $menunggu['total']; ?></h3>
                    <p>Menunggu Persetujuan</p>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Ajukan Cuti -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="chart-card">
                <div class="chart-header d-flex justify-content-between align-items-center">
                    <h5>Pengajuan Cuti Baru</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ajukanCutiModal">
                        <i class="fas fa-plus"></i> Ajukan Cuti
                    </button>
                </div>
                <div class="chart-body">
                    <p class="text-muted">Klik tombol "Ajukan Cuti" untuk membuat pengajuan cuti baru.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Pengajuan Cuti -->
    <div class="row">
        <div class="col-12">
            <div class="chart-card">
                <div class="chart-header">
                    <h5>Riwayat Pengajuan Cuti</h5>
                </div>
                <div class="chart-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Cuti</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Durasi</th>
                                    <th>Status</th>
                                    <th>Alasan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                if (mysqli_num_rows($result_cuti) > 0): 
                                    while ($row = mysqli_fetch_assoc($result_cuti)): 
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['nama_jenis']; ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($row['tanggal_mulai'])); ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($row['tanggal_selesai'])); ?></td>
                                    <td><?php echo $row['jumlah_hari']; ?> hari</td>
                                    <td>
                                        <?php
                                        $badge_class = '';
                                        switch($row['status']) {
                                            case 'disetujui':
                                                $badge_class = 'bg-success';
                                                break;
                                            case 'ditolak':
                                                $badge_class = 'bg-danger';
                                                break;
                                            default:
                                                $badge_class = 'bg-warning';
                                        }
                                        ?>
                                        <span class="badge <?php echo $badge_class; ?>"><?php echo ucfirst($row['status']); ?></span>
                                    </td>
                                    <td><?php echo substr($row['alasan'], 0, 50) . '...'; ?></td>
                                    <td>
                                        <?php if ($row['status'] == 'menunggu'): ?>
                                        <a href="dashboard.php?page=updatecuti&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="dashboard.php?page=batalkancuti&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-danger" 
                                           onclick="return confirm('Yakin ingin membatalkan pengajuan cuti ini?')">
                                            <i class="fas fa-times"></i> Batalkan
                                        </a>
                                        <?php else: ?>
                                        <span class="text-muted">Tidak dapat diubah</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php 
                                    endwhile; 
                                else: 
                                ?>
                                <tr>
                                    <td colspan="8" class="text-center">Belum ada pengajuan cuti</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ajukan Cuti -->
<div class="modal fade" id="ajukanCutiModal" tabindex="-1" aria-labelledby="ajukanCutiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajukanCutiModalLabel">Ajukan Cuti Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="dashboard.php?page=ajukancuti" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="id_jenis_cuti" class="form-label">Jenis Cuti</label>
                            <select class="form-select" id="id_jenis_cuti" name="id_jenis_cuti" required>
                                <option value="">Pilih Jenis Cuti</option>
                                <?php 
                                mysqli_data_seek($jenis_cuti, 0);
                                while ($jenis = mysqli_fetch_assoc($jenis_cuti)): 
                                ?>
                                <option value="<?php echo $jenis['id']; ?>" data-max="<?php echo $jenis['maksimal_hari']; ?>">
                                    <?php echo $jenis['nama_jenis']; ?> (Max: <?php echo $jenis['maksimal_hari']; ?> hari)
                                </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jumlah_hari" class="form-label">Jumlah Hari</label>
                            <input type="number" class="form-control" id="jumlah_hari" name="jumlah_hari" min="1" required>
                            <small class="text-muted">Akan dihitung otomatis berdasarkan tanggal</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alasan" class="form-label">Alasan Cuti</label>
                        <textarea class="form-control" id="alasan" name="alasan" rows="3" required placeholder="Jelaskan alasan pengajuan cuti..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ajukan Cuti</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tanggalMulai = document.getElementById('tanggal_mulai');
    const tanggalSelesai = document.getElementById('tanggal_selesai');
    const jumlahHari = document.getElementById('jumlah_hari');
    
    // Set tanggal minimum ke hari ini
    const today = new Date().toISOString().split('T')[0];
    tanggalMulai.min = today;
    tanggalSelesai.min = today;
    
    // Hitung jumlah hari otomatis
    function hitungJumlahHari() {
        if (tanggalMulai.value && tanggalSelesai.value) {
            const mulai = new Date(tanggalMulai.value);
            const selesai = new Date(tanggalSelesai.value);
            const diffTime = Math.abs(selesai - mulai);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
            jumlahHari.value = diffDays;
        }
    }
    
    tanggalMulai.addEventListener('change', function() {
        tanggalSelesai.min = this.value;
        hitungJumlahHari();
    });
    
    tanggalSelesai.addEventListener('change', hitungJumlahHari);
});
</script>
