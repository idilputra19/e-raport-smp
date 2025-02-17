<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Raport Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">E-RAPORT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <?php if ($_SESSION['role'] == 'admin'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/manage_users.php">
                                <i class="fas fa-users-cog"></i> Manage Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/manage_school_data.php">
                                <i class="fas fa-school"></i> School Data
                            </a>
                        </li>
                    <?php elseif ($_SESSION['role'] == 'guru'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/input_nilai.php">
                                <i class="fas fa-edit"></i> Input Nilai
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/input_absensi.php">
                                <i class="fas fa-clipboard-list"></i> Absensi
                            </a>
                        </li>
                    <?php elseif ($_SESSION['role'] == 'siswa'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/lihat_nilai.php">
                                <i class="fas fa-chart-line"></i> Nilai
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/lihat_raport.php">
                                <i class="fas fa-file-pdf"></i> Raport
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Dashboard Header -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">
                            <?php
                            $role_icons = [
                                'admin' => 'fas fa-user-shield',
                                'guru' => 'fas fa-chalkboard-teacher',
                                'siswa' => 'fas fa-user-graduate',
                                'kepala_sekolah' => 'fas fa-user-tie',
                                'orang_tua' => 'fas fa-users'
                            ];
                            ?>
                            <i class="<?= $role_icons[$_SESSION['role']] ?>"></i>
                            Welcome, <?= ucfirst(str_replace('_', ' ', $_SESSION['role'])) ?> Dashboard
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="row">
            <?php if ($_SESSION['role'] == 'admin'): ?>
                <!-- Admin Widgets -->
                <div class="col-md-4 mb-4">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-users"></i> Total Users
                            </h5>
                            <?php
                            $result = $conn->query("SELECT COUNT(*) FROM users");
                            $count = $result->fetch_row()[0];
                            ?>
                            <h2 class="card-text"><?= $count ?></h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card text-white bg-info">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-school"></i> Kelas
                            </h5>
                            <?php
                            $result = $conn->query("SELECT COUNT(*) FROM kelas");
                            $count = $result->fetch_row()[0];
                            ?>
                            <h2 class="card-text"><?= $count ?></h2>
                        </div>
                    </div>
                </div>

            <?php elseif ($_SESSION['role'] == 'guru'): ?>
                <!-- Guru Widgets -->
                <div class="col-md-6 mb-4">
                    <div class="card bg-warning">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-book"></i> Mata Pelajaran
                            </h5>
                            <ul class="list-group">
                                <?php
                                $result = $conn->query("SELECT nama_pelajaran FROM mata_pelajaran LIMIT 5");
                                while ($row = $result->fetch_assoc()): ?>
                                    <li class="list-group-item"><?= $row['nama_pelajaran'] ?></li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>
                </div>

            <?php elseif ($_SESSION['role'] == 'siswa'): ?>
                <!-- Siswa Widgets -->
                <div class="col-md-6 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-chart-bar"></i> Nilai Rata-rata
                            </h5>
                            <?php
                            $siswa_id = $_SESSION['user_id'];
                            $result = $conn->query("SELECT AVG(nilai) FROM nilai WHERE siswa_id = $siswa_id");
                            $avg = $result->fetch_row()[0];
                            ?>
                            <h2 class="card-text"><?= number_format($avg, 2) ?></h2>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>