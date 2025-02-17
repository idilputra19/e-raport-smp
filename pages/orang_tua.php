<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'orang_tua') {
    header("Location: ../login.php");
}
include '../db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orang Tua Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Orang Tua Dashboard</h2>
        <p>Welcome, Orang Tua!</p>
        <a href="pantau_nilai.php" class="btn btn-primary">Pantau Nilai Anak</a>
    </div>
</body>
</html>