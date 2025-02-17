<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'siswa') {
    header("Location: ../login.php");
}
include '../db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Siswa Dashboard</h2>
        <p>Welcome, Siswa!</p>
        <a href="lihat_nilai.php" class="btn btn-primary">Lihat Nilai</a>
        <a href="lihat_raport.php" class="btn btn-primary">Lihat Raport</a>
    </div>
</body>
</html>