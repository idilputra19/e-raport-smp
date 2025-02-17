<!-- Contoh integrasi Bootstrap di header -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Contoh integrasi Bootstrap di footer -->
<script src="js/bootstrap.min.js"></script>

<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
}
include '../db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Admin Dashboard</h2>
        <p>Welcome, Admin!</p>
        <a href="manage_users.php" class="btn btn-primary">Manage Users</a>
        <a href="manage_school_data.php" class="btn btn-primary">Manage School Data</a>
    </div>
</body>
</html>