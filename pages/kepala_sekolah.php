<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'kepala_sekolah') {
    header("Location: ../login.php");
}
include '../db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kepala Sekolah Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Kepala Sekolah Dashboard</h2>
        <p>Welcome, Kepala Sekolah!</p>
        <a href="laporan_akademik.php" class="btn btn-primary">Laporan Akademik</a>
        <a href="analisis_nilai.php" class="btn btn-primary">Analisis Nilai</a>
    </div>
</body>
</html>