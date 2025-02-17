<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'guru') {
    header("Location: ../login.php");
}
include '../db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guru Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Guru Dashboard</h2>
        <p>Welcome, Guru!</p>
        <a href="input_nilai.php" class="btn btn-primary">Input Nilai</a>
        <a href="input_absensi.php" class="btn btn-primary">Input Absensi</a>
    </div>
</body>
</html>